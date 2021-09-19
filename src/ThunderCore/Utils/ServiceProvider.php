<?php

namespace ThunderCore\Utils;

use ThunderCore\Config\Config;
use ThunderCore\Html;
use GuzzleHttp\Psr7\ServerRequest;
use League\Container\Container;
use League\Container\ImmutableContainerAwareInterface;
use League\Container\ReflectionContainer;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use ThunderCore\Logger;

class ServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var Config
     */
    protected $config;
    /**
     * @var ServerRequestInterface
     */
    protected $request;
    /**
     * @var array
     */
    protected $provides = array(
        Config::class,
        LoggerInterface::class,
        ServerRequestInterface::class,
    );

    public function __construct(Config $config, ServerRequestInterface $request = null)
    {
        $this->config = $config;
        if (!$request) {
            $request = ServerRequest::fromGlobals();
        }
        if ($this->config->has(array('routing','basepath'))) {
            $request = Html::removePathPrefix($request, $this->config->get(array('routing', 'basepath')));
        }
        $this->request = $request;
    }

    public function boot()
    {
        /** @var Container $container */
        $container = $this->getContainer();

        $container
            ->inflector(ImmutableContainerAwareInterface::class)
            ->invokeMethod('setContainer', array('container'=>$container));

        $serviceManager = new ServiceManager($this->getContainer());
        $serviceManager->configure($this->config->fromDimension('services'));
        $container->delegate($serviceManager);

        $container->delegate(new ReflectionContainer());
    }

    public function register()
    {
        $this->getContainer()->share(LoggerInterface::class, ($this->logger instanceof LoggerInterface ? $this->logger : new Logger('ThunderCore')));
        $this->getContainer()->share(ServerRequestInterface::class, $this->request);
        $this->getContainer()->share(Config::class, $this->config);
    }
}