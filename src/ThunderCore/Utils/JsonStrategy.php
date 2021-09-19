<?php

namespace ThunderCore\Utils;

use \Exception;
use League\Route\Http\Exception\MethodNotAllowedException;
use League\Route\Http\Exception\NotFoundException;
use League\Route\Http\Exception as HttpException;
use League\Route\Route;
use League\Route\Strategy\StrategyInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RuntimeException;

class JsonStrategy implements StrategyInterface
{
    private $content_type = 'application/json';

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
            return $this->setHeader($response)->withStatus(404);
        };
    }

    /**
     * {@inheritdoc}
     */
    public function getMethodNotAllowedDecorator(MethodNotAllowedException $exception)
    {
        return function /** @noinspection PhpUnusedParameterInspection */(ServerRequestInterface $request, ResponseInterface $response) use ($exception) {
            return $this->setHeader($response)->withStatus(405);
        };
    }

    /**
     * {@inheritdoc}
     */
    public function getExceptionDecorator(Exception $exception)
    {
        return function /** @noinspection PhpUnusedParameterInspection */(ServerRequestInterface $request, ResponseInterface $response) use ($exception) {
            $response = $this->setHeader($response);

            if ($exception instanceof HttpException) {
                return $response->withStatus($exception->getStatusCode(), strtok($exception->getMessage(), "\n"));
            }

            return $response->withStatus(500, strtok($exception->getMessage(), "\n"));
        };
    }

    public function setHeader(ResponseInterface $response)
    {
        if (! $response->hasHeader('content-type')) {
            $response = $response->withHeader('content-type', $this->content_type);
        }
        return $response;
    }
}
