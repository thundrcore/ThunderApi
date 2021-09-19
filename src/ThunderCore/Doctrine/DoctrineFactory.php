<?php
namespace ThunderCore\Doctrine;


use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\EventManager;
use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use Exception;
use ThunderCore\Config\Config;
use ThunderCore\Config\ConfigurableFactoryInterface;
use ThunderCore\Config\ConfigurableFactoryTrait;
use ThunderCore\Logger;
use ThunderCore\Utils\InvokableFactoryInterface;
use ThunderCore\Utils\PdoFactory;
use League\Container\ImmutableContainerAwareInterface;
use League\Container\ImmutableContainerAwareTrait;
use PDO;

class DoctrineFactory implements InvokableFactoryInterface, ConfigurableFactoryInterface, ImmutableContainerAwareInterface
{
    use ConfigurableFactoryTrait;
    use ImmutableContainerAwareTrait;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @return EntityManager
     * @throws DBALException
     * @throws ORMException
     * @throws Exception
     */
    public function __invoke()
    {
        $this->logger = new Logger('DOCTRINE');

        if (!$this->config instanceof Config) {
            $this->logger->error('Factory', (array)" can't work without configuration");
            throw new Exception(__CLASS__ . " can't work without configuration");
        }

        $this->preparePDO();

        $isDevMode = $this->config->get('devMode', false);
        $paths = $this->config->get('paths', array());

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        $this->setSQLLogger($config);
        $this->addNamespaces($config);
        $this->addFunctions($config);
        $this->setProxy($config);

        $dbParams = $this->config->get('dbParams');
        try {
            $connection = DriverManager::getConnection($dbParams, $config);
        } catch (DBALException $e) {
            $this->logger->error('Doctrine', array($e->getMessage()));
            throw $e;
        }

        $eventManager = new EventManager;
        $this->addEventListeners($eventManager);
        $this->addEventSubscribers($eventManager);

        $entityManager = new \ThunderCore\Doctrine\EntityManager($connection, $config, $eventManager);

        $this->addTypes();
        $this->addTypeMappings($entityManager);
        $this->registerAutoloadNamespaces();


        return $entityManager;
    }

    /**
     * @throws Exception
     */
    private function preparePDO()
    {
        if (!$this->config->has('dbParams')) {
            $pdo = null;
            if ($this->container->has(PDO::class)) {
                $pdo = $this->container->get(PDO::class);
            } elseif ($this->config->has('pdo')) {
                $factory = $this->container->get(PdoFactory::class);
                $factory->configure($this->config->fromDimension('pdo'));
                try {
                    $pdo = $factory();
                } catch (Exception $e) {
                    $this->logger->error('Doctrine', array($e->getMessage()));
                    throw $e;
                }
            }
            if ($pdo instanceof PDO) {
                $this->config->set(
                    array('dbParams'),
                    array(
                        'pdo' => $pdo,
                    )
                );
            }
        }
    }

    /**
     * @param Configuration $config
     */
    private function setSQLLogger(Configuration $config)
    {
        if ($this->config->get('debug', false)) {
            //$config->setSQLLogger(new SQLLogger($this->config, $this->logger));
        }
    }

    /**
     * @param Configuration $config
     */
    private function addNamespaces(Configuration $config)
    {
        $namespaces = $this->config->get('namespaces', array());
        foreach ($namespaces as $alias => $namespace) {
            $config->addEntityNamespace($alias, $namespace);
        }
    }

    /**
     * @param Configuration $config
     * @throws ORMException
     */
    private function addFunctions(Configuration $config)
    {
        if (!empty($this->config->get('functions', array()))) {
            foreach ($this->config->get('functions') as $type => $functions) {
                foreach ($functions as $name => $className) {
                    try {
                        switch (mb_strtolower($type)) {
                            case 'string': $config->addCustomStringFunction($name, $className); break;
                            case 'numeric': $config->addCustomNumericFunction($name, $className); break;
                            case 'datetime': $config->addCustomDatetimeFunction($name, $className); break;
                        }
                    } catch (ORMException $e) {
                        $this->logger->error('Doctrine', array($e->getMessage()));
                        throw $e;
                    }
                }
            }
        }
    }

    /**
     * @param Configuration $config
     */
    private function setProxy(Configuration $config)
    {
        $proxyCfg = $this->config->get('proxy', array());
        if (!empty($proxyCfg)) {
            foreach ($proxyCfg as $key => $val) {
                switch ($key) {
                    case 'mode':
                        $config->setAutoGenerateProxyClasses($val);
                        break;
                    case 'dir':
                        $config->setProxyDir(rtrim($val, '/\\') . DIRECTORY_SEPARATOR);
                        break;
                    case 'namespace':
                        $config->setProxyNamespace($val);
                        break;
                }
            }
        }
    }

    /**
     * @throws DBALException
     */
    private function addTypes()
    {
        $types = $this->config->get('types', array());
        if (!empty($types)) {
            foreach ($types as $name => $className) {
                try {
                    if (Type::hasType($name)) {
                        Type::overrideType($name, $className);
                    } else {
                        Type::addType($name, $className);
                    }
                } catch (DBALException $e) {
                    $this->logger->error('Doctrine:types', array('name'=>$name, 'class'=>$className, 'e'=>$e->getMessage()));
                    throw $e;
                }
            }
        }
    }

    /**
     * @param EntityManager $entityManager
     * @throws DBALException
     */
    private function addTypeMappings(EntityManager $entityManager)
    {
        $typeMappings = $this->config->get('typeMappings', array());
        if (!empty($typeMappings)) {
            foreach ($typeMappings as $dbType => $doctrineType) {
                try {
                    $entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping($dbType, $doctrineType);
                } catch (DBALException $e) {
                    $this->logger->error('Doctrine:typeMappings', array('dbType'=>$dbType, 'doctrineType'=>$doctrineType, 'e'=>$e->getMessage()));
                    throw $e;
                }
            }
        }
    }

    /**
     * @param EventManager $eventManager
     * @throws Exception
     */
    private function addEventListeners(EventManager $eventManager)
    {
        $eventListeners = $this->config->get('eventListeners', array());
        if (!empty($eventListeners)) {
            foreach ($eventListeners as $eventListener) {
                if (is_array($eventListener) && empty(array_diff(array('event', 'class'), array_keys($eventListener)))) {
                    if (is_string($eventListener['event']) && is_string($eventListener['class'])) {
                        if ($this->container->has($eventListener['class'])) {
                            try {
                                $eventListenerObject = $this->container->get($eventListener['class']);
                            } catch (Exception $e) {
                                $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventListener['class'], 'e'=>$e->getMessage()));
                                throw $e;
                            }
                        } else {
                            if (class_exists($eventListener['class'])) {
                                try {
                                    $eventListenerObject = new $eventListener['class'];
                                } catch (Exception $e) {
                                    $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventListener['class'], 'e'=>$e->getMessage()));
                                    throw $e;
                                }
                            } else {
                                $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventListener['class'], 'e'=>'not exists'));
                                throw new Exception("{$eventListener['class']} not exists");
                            }
                        }
                        $eventManager->addEventListener($eventListener['event'], $eventListenerObject);
                    }
                }
            }
        }
    }

    /**
     * @param EventManager $eventManager
     * @throws Exception
     */
    private function addEventSubscribers(EventManager $eventManager)
    {
        $eventSubscribers = $this->config->get('eventSubscribers', array());
        if (!empty($eventSubscribers)) {
            foreach ($eventSubscribers as $eventSubscriber) {
                if (is_string($eventSubscriber)) {
                    if ($this->container->has($eventSubscriber)) {
                        try {
                            $eventSubscriberObject = $this->container->get($eventSubscriber);
                        } catch (Exception $e) {
                            $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventSubscriber, 'e'=>$e->getMessage()));
                            throw $e;
                        }
                    } else {
                        if (class_exists($eventSubscriber)) {
                            try {
                                $eventSubscriberObject = new $eventSubscriber;
                            } catch (Exception $e) {
                                $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventSubscriber, 'e'=>$e->getMessage()));
                                throw $e;
                            }
                        } else {
                            $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventSubscriber, 'e'=>'not exists'));
                            throw new Exception("{$eventSubscriber} not exists");
                        }
                    }
                    if ($eventSubscriberObject instanceof EventSubscriber) {
                        $eventManager->addEventSubscriber($eventSubscriberObject);
                    } else {
                        $this->logger->error('Doctrine:eventSubscribers', array('class'=>$eventSubscriber, 'e'=>'not instance of Doctrine\\Common\\EventSubscriber'));
                        throw new Exception("{$eventSubscriber} not instance of Doctrine\\Common\\EventSubscriber");
                    }
                }
            }
        }
    }

    /**
     *
     */
    private function registerAutoloadNamespaces()
    {
        $namespaces = $this->config->get('autoloadNamespaces', array());
        if (!empty($namespaces)) {
            AnnotationRegistry::registerAutoloadNamespaces($namespaces);
        }
    }
}
