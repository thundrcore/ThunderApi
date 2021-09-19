<?php

namespace ThunderCore\Utils;

use \Exception;
use League\Route\Http\Exception\MethodNotAllowedException;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Http\Exception as HttpException;
use League\Route\Http\Exception\UnauthorizedException;
use League\Route\Route;
use League\Route\Strategy\StrategyInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;
use ThunderCore\Factory;
use ThunderCore\Logger\Interfaces\LoggerHelperInterface;
use ThunderCore\Logger\Traits\LoggerHelperTrait;
use ThunderCore\Route\Router;
use Twig\Environment;

class ApplicationStrategy implements StrategyInterface, LoggerHelperInterface
{
    use LoggerHelperTrait;

    /**
     * @var string
     */
    private $content_type = 'text/html';
    /**
     * @var \Twig\Environment
     */
    protected $twig;
    /**
     * @var Router
     */
    protected $router;

    /**
     * Base constructor.
     * @param \Twig\Environment $twig
     * @param Router $router
     * @param LoggerInterface|null $logger
     */
    public function __construct(Environment $twig, Router $router, LoggerInterface $logger = null)
    {
        $this->twig = $twig;
        $this->router = $router;
        if ($logger) {
            $this->setLogger($logger);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCallable(Route $route, array $vars)
    {
        return function (ServerRequestInterface $request, ResponseInterface $response, callable $next) use ($route, $vars) {
            $response = call_user_func_array($route->getCallable(), array($request, $response, $vars));

            if (! $response instanceof ResponseInterface) {
                throw new RuntimeException(
                    'Route callables must return an instance of (Psr\Http\Message\ResponseInterface)'
                );
            }

            $response = $this->setHeader($response);

            return $next($request, $response);
        };
    }

    /**
     * {@inheritdoc}
     */
    public function getNotFoundDecorator(NotFoundException $exception)
    {
        return function /** @noinspection PhpUnusedParameterInspection */(ServerRequestInterface $request, ResponseInterface $response) use ($exception) {
            $config = Factory::fromNames(array('jwt'), true);
            if($config->get(array('jwt','key'),null) == null){
                $response = $response->withStatus(404);
                $params = array(
                    'title' => $response->getStatusCode(),
                    'block' => array(
                        'title' => $response->getReasonPhrase(),
                    ),
                );
                $response->getBody()->write($this->twig->render('errors.html.twig', $params));
            }else{
                $apiResponseBuilder = new APIResponseBuilder(404,"Method not found");
                $response->getBody()->write($apiResponseBuilder->build());
            }

            return $this->setHeader($response);
        };
    }

    /**
     * {@inheritdoc}
     */
    public function getMethodNotAllowedDecorator(MethodNotAllowedException $exception)
    {
        return function /** @noinspection PhpUnusedParameterInspection */(ServerRequestInterface $request, ResponseInterface $response) use ($exception) {
            $config = Factory::fromNames(array('jwt'), true);
            if($config->get(array('jwt','key'),null) == null) {
                $response = $response->withStatus(405);
                $params = array(
                    'title' => $response->getStatusCode(),
                    'block' => array(
                        'title' => $response->getReasonPhrase(),
                    ),
                );
                $response->getBody()->write($this->twig->render('errors.html.twig', $params));
            }else{
                $apiResponseBuilder = new APIResponseBuilder(405,"Method not allowed");
                $response->getBody()->write($apiResponseBuilder->build());
            }
            return $this->setHeader($response);
        };
    }

    /**
     * {@inheritdoc}
     */
    public function getExceptionDecorator(Exception $exception)
    {
        return function /** @noinspection PhpUnusedParameterInspection */(ServerRequestInterface $request, ResponseInterface $response) use ($exception) {
            $config = Factory::fromNames(array('jwt'), true);
            $response = $this->setHeader($response);

            if ($exception instanceof UnauthorizedException) {
                if($config->get(array('jwt','key'),null) == null) {
                    $response = $response->withHeader('Location', $this->router->getRealUrl($this->router->getNamedRoute('login')->getPath()));
                }else{
                    $apiResponseBuilder = new APIResponseBuilder(401,"Unauthorized");
                    $response->getBody()->write($apiResponseBuilder->build());
                }
                return $response;
            }

            if ($exception instanceof HttpException) {
                $response = $response->withStatus($exception->getStatusCode(), strtok($exception->getMessage(), "\n"));
                if($config->get(array('jwt','key'),null) == null) {
                    $params = array(
                        'title' => $response->getStatusCode(),
                        'block' => array(
                            'title' => $response->getReasonPhrase(),
                            'contents' => json_decode(strtok("\n"), true),
                        ),
                    );
                    $response->getBody()->write($this->twig->render('errors.html.twig', $params));
                }else{
                    $data = array();
                    $message = $exception->getMessage();
                    try {
                        $jsonDecodeMessage = json_decode($exception->getMessage(),true);
                        $data = $jsonDecodeMessage["data"];
                        $message = $jsonDecodeMessage["message"];
                    }catch (Exception $e){
                    }
                    $apiResponseBuilder = new APIResponseBuilder($exception->getStatusCode(),$message,$data);
                    $response->getBody()->write($apiResponseBuilder->build());
                }

                return $response;
            }
            if($config->get(array('jwt','key'),null) == null) {
                $response = $response->withStatus(500);
                $params = array(
                    'title' => $response->getStatusCode(),
                    'block' => array(
                        'title' => $response->getReasonPhrase(),
                    ),
                );
                $response->getBody()->write($this->twig->render('errors.html.twig', $params));
            }else{
                $apiResponseBuilder = new APIResponseBuilder(500,"Internal server error");
                $response->getBody()->write($apiResponseBuilder->build());
            }

            $this->emergency('exception', (array)$exception);
            return $response;
        };
    }

    /**
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function setHeader(ResponseInterface $response)
    {
        if (! $response->hasHeader('content-type')) {
            $response = $response->withHeader('content-type', $this->content_type);
        }
        return $response;
    }
}
