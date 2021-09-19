<?php
namespace ThunderCore\Utils;


use ThunderCore\Config\Config;
use ThunderCore\Config\ConfigurableFactoryInterface;
use League\Container\ContainerInterface;
use League\Container\Exception\NotFoundException;
use League\Container\ImmutableContainerAwareInterface;
use League\Container\ImmutableContainerAwareTrait;
use League\Container\ImmutableContainerInterface;

class ServiceManager implements ImmutableContainerInterface
{
    use ImmutableContainerAwareTrait;

    /**
     * @var array
     */
    protected $factories = array();
    /**
     * @var array
     */
    protected $configDimensions = array();
    /**
     * @var
     */
    private $cache;
    /**
     * @var bool
     */
    private $configured = false;

    /**
     * ServiceManager constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @param Config $config
     */
    public function configure(Config $config)
    {
        if (!$this->configured) {
            $this->factories = ArrayUtils::merge($this->factories, $config->get('factories', array()));
            $this->configDimensions = ArrayUtils::merge($this->configDimensions, $config->get('configDimensions', array()));
            $this->configured = true;
        }
    }

    /**
     * @param string $alias
     * @return mixed|null
     */
    public function get($alias)
    {
        if (!$this->has($alias)) {
            throw new NotFoundException(
                sprintf('Alias (%s) is not an existing class and therefore cannot be resolved', $alias)
            );
        }
        $factory = $this->container->get($this->factories[$alias]);
        $obj = $this->_get($factory, $alias);
        if (!$obj) {
            $obj = $this->_build($factory, $alias);
        }

        return $obj;
    }

    /**
     * @param string $alias
     * @return bool
     */
    public function has($alias)
    {
        if (array_key_exists($alias, $this->factories)) {
            if ($this->container->has($this->factories[$alias])) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param ConfigurableFactoryInterface $factory
     * @param $alias
     * @return ConfigurableFactoryInterface
     */
    protected function configureFactory(ConfigurableFactoryInterface $factory, $alias)
    {
        if (array_key_exists($alias, $this->configDimensions)) {
            $config = $this->_getConfig($alias);
            $factory->configure($config);
        }
        return $factory;
    }

    /**
     * @param $alias
     * @return Config
     */
    private function _getConfig($alias)
    {
        return $this->container->get(Config::class)->fromDimension($this->configDimensions[$alias]);
    }

    /**
     * @param $factory
     * @param $alias
     * @return null
     */
    private function _get($factory, $alias)
    {
        $hash = $this->_hash($factory, $alias);
        if (!empty($this->cache[$alias][$hash])) {
            return $this->cache[$alias][$hash];
        }
        return null;
    }

    /**
     * @param InvokableFactoryInterface $factory
     * @param $alias
     * @return mixed
     */
    private function _build(InvokableFactoryInterface $factory, $alias)
    {
        $hash = $this->_hash($factory, $alias);
        if ($factory instanceof ImmutableContainerAwareInterface) {
            $factory->setContainer($this->container);
        }
        if ($factory instanceof ConfigurableFactoryInterface) {
            $factory = $this->configureFactory($factory, $alias);
        }
        $obj = $factory();
        $this->cache[$alias][$hash] = $obj;

        return $obj;
    }

    /**
     * @param $factory
     * @param $alias
     * @return string
     */
    private function _hash($factory, $alias)
    {
        $config = array();
        if ($factory instanceof ConfigurableFactoryInterface) {
            $config = $this->_getConfig($alias)->get();
        }
        return hash('sha256', json_encode($config));
    }
}