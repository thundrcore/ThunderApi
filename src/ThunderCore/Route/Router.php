<?php


namespace ThunderCore\Route;

use ThunderCore\Config\ConfigurableFactoryInterface;
use ThunderCore\Config\ConfigurableFactoryTrait;
use GuzzleHttp\Psr7\Response;
use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use ThunderCore\Logger\Interfaces\LoggerHelperInterface;
use ThunderCore\Logger\Traits\LoggerHelperTrait;

class Router extends RouteCollection implements LoggerHelperInterface, ConfigurableFactoryInterface
{
    use LoggerHelperTrait;
    use ConfigurableFactoryTrait;

    /**
     * @var array
     */
    protected $customPatterns = array();

    /**
     * @var array
     */
    private $valid_ContentTypes = array(
        'application/x-www-form-urlencoded',
        'application/json',
        'application/xml',
    );

    /**
     * @var RouteValidatorInterface
     */
    private $validator;

    /**
     * @return Router
     */
    public function buildRoutes()
    {
        if (!empty($this->customPatterns)) {
            foreach ($this->customPatterns as $name => $pattern) {
                $this->addPatternMatcher($name, $pattern);
            }
        }

        $cfg = $this->config->get();
        if ($this->config->has('strategy')) {
            $strategyClass = $this->config->get('strategy');
            if ($this->container->has($strategyClass)) {
                $this->setStrategy($this->container->get($strategyClass));
            }
        }
        if ($this->config->has('paths')) {
            $this->addPaths($this->config->get('paths'), $cfg);
        }

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function go()
    {
        return parent::dispatch($this->container->get(ServerRequestInterface::class), $this->container->get(Response::class));
    }

    /**
     * @return ServerRequestInterface|null
     */
    public function getRequest()
    {
        return $this->container->get(ServerRequestInterface::class);
    }

    /**
     * @param RouteValidatorInterface $validator
     * @return Router
     */
    public function setValidator(RouteValidatorInterface$validator)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @param $paths
     * @param $data
     */
    public static function mergePaths(&$paths, $data)
    {
        foreach ($data as $path => $options) {
            if (empty($paths[$path])) {
                $paths[$path] = $options;
            } else {
                if (!empty($options['methods'])) {
                    foreach ($options['methods'] as $method => $params) {
                        $paths[$path]['methods'][$method] = $params;
                    }
                }
                if (!empty($options['paths'])) {
                    foreach ($options['paths'] as $sub => $sub_data) {
                        if (!isset($paths[$path]['paths'][$sub])) {
                            $paths[$path]['paths'][$sub] = array();
                        }
                        self::mergePaths($paths[$path]['paths'], array($sub=>$sub_data));
                    }
                }
            }
        }
    }

    /**
     * @param array $paths
     * @param array $cfg
     * @param string $pre
     */
    private function addPaths(array $paths, array $cfg, $pre = '')
    {
        foreach ($paths as $path => $data) {
            if (!empty($data['methods'])) {
                foreach ($data['methods'] as $method => $options) {
                    $map = $this->map($method, rtrim($pre, '/') . '/' . trim($path, '/'), $options['callable']);
                    if (!empty($options['strategy']) && is_callable(array($options['strategy'], 'getExceptionDecorator'))) {
                        $map->setStrategy($this->container->get($options['strategy']));
                    }
                    if (!empty($options['name'])) {
                        $map->setName($options['name']);
                    }
                    $requires = $this->requires(
                        $cfg,
                        $options,
                        rtrim($pre, '/') . '/' . trim($path, '/'),
                        array(
                            'required_fields' => array(),
                            'required_headers' => array(),
                            'required_ContentType' => '',
                            'require_auth' => false,
                            'require_permissions' => array(),
                        )
                    );
                    $options['valid_ContentTypes'] = $this->valid_ContentTypes;
                    $options['method'] = $method;

                    if ($this->validator instanceof RouteValidatorInterface) {
                        $validator = $this->validator;
                        $map = $validator->validate($map, $requires, $options);
                    }
                    $this->debug('strategy', array('path' => rtrim($pre, '/') . '/' . trim($path, '/'), 'method' => $method, 'name' => $map->getName(), 'strategy' => $map->getStrategy()));
                }
            }
            if (!empty($data['paths'])) {
                $this->addPaths($data['paths'], $cfg, rtrim($pre, '/') . '/' . trim($path, '/'));
            }
        }
    }

    /**
     * @param array $cfg
     * @param array $options
     * @param string $pre
     * @param $requires
     * @return array
     */
    private function requires(array $cfg, array $options, $pre, $requires)
    {
        $keys = array_keys($requires);

        foreach ($keys as $key) {
            if (isset($cfg[$key])) {
                $requires[$key] = $cfg[$key];
            }
        }

        $paths = explode('/', $pre);
        $path = '/' . trim(array_shift($paths), '/');
        $cfg = $cfg['paths'][$path];
        foreach ($keys as $key) {
            if (isset($cfg[$key])) {
                $requires[$key] = $cfg[$key];
            }
        }

        while (!empty($paths)) {
            $path = trim(array_shift($paths), '/');
            if ($path) {
                $path = '/' . $path;
                $cfg = $cfg['paths'][$path];
                foreach ($keys as $key) {
                    if (isset($cfg[$key])) {
                        $requires[$key] = $cfg[$key];
                    }
                }
            }
        }

        foreach ($keys as $key) {
            if (isset($options[$key])) {
                $requires[$key] = $options[$key];
            }
        }

        return $requires;
    }

    public function getBasepath()
    {
        return $this->config->get('basepath', '/');
    }

    /**
     * @param $url
     * @return string
     */
    public function getRealUrl($url)
    {
        $basepath = rtrim($this->getBasepath(), '/');
        return implode('/', array($basepath, ltrim($url, '/')));
    }
}
