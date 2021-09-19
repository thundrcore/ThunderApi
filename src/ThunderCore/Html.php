<?php
namespace ThunderCore;


use DOMDocument;
use function GuzzleHttp\Psr7\parse_header;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Html
{

    /**
     * @param ServerRequestInterface $request
     * @param $base_path
     * @return ServerRequestInterface
     */
    public static function removePathPrefix(ServerRequestInterface $request, $base_path)
    {
        $path_prefix = trim($base_path, '/');
        if (!empty($path_prefix)) {
            $uri = $request->getUri();
            $path = trim($uri->getPath(), '/');
            $path_parts = explode('/', $path);
            $prefix_parts = explode('/', $path_prefix);
            do {
                if (empty($prefix_parts) || empty($path_parts) || $prefix_parts[0] != $path_parts[0]) {
                    break;
                }
                array_shift($path_parts);
                array_shift($prefix_parts);
            } while (true);
            $path = '/' . implode('/', $path_parts);
            $uri = $uri->withPath($path);
            $request = $request->withUri($uri, true);
        }
        return $request;
    }

    /**
     * @param ServerRequestInterface $serverRequest
     * @throws InvalidArgumentException
     */
    public static function parseRequest(ServerRequestInterface &$serverRequest)
    {
        $method = $serverRequest->getMethod();
        switch ($method) {
            case 'POST': case 'PATCH': case 'PUT':
            $contentType = Html::getContentType($serverRequest);
            switch ($contentType) {
                case 'application/x-www-form-urlencoded':
                    if ($method != 'POST') {
                        parse_str($serverRequest->getBody()->getContents(), $body);
                        $serverRequest = $serverRequest->withParsedBody($body);
                    }
                    break;
                case 'application/json':
                    $serverRequest = $serverRequest->withParsedBody(Html::getJsonBody($serverRequest));
                    break;
                case 'application/xml':
                    $serverRequest = $serverRequest->withParsedBody(Html::getXmlBody($serverRequest));
                    break;
            }
            $serverRequest = $serverRequest->withQueryParams(array_merge($serverRequest->getQueryParams(), (array)$serverRequest->getParsedBody()));
            break;
        }
    }

    /**
     * @param ResponseInterface $response
     * @return mixed The response
     */
    public static function response(ResponseInterface $response)
    {
        header('HTTP/'
            . $response->getProtocolVersion() . ' '
            . $response->getStatusCode() . ' '
            . $response->getReasonPhrase());
        foreach ($response->getHeaders() as $name => $values) {
            header("{$name}: " . implode(', ', $values));
        }

        return $response->getBody();
    }

    /**
     * @param ServerRequestInterface $serverRequest
     * @return mixed
     */
    public static function getContentType(ServerRequestInterface $serverRequest)
    {
        $contentType = parse_header($serverRequest->getHeader('Content-Type'));
        return empty($contentType[0][0]) ? '' : $contentType[0][0];
    }

    /**
     * @param ServerRequestInterface $serverRequest
     * @throws InvalidArgumentException
     * @return array|null
     */
    public static function getJsonBody(ServerRequestInterface $serverRequest)
    {
        $body = json_decode($serverRequest->getBody(), true);
        if (!$body && json_last_error()) {
            throw new InvalidArgumentException();
        }
        return $body;
    }

    /**
     * @param ServerRequestInterface $serverRequest
     * @throws InvalidArgumentException
     * @return DOMDocument|null
     */
    public static function getXmlBody(ServerRequestInterface $serverRequest)
    {
        $body = new DOMDocument();
        $body->loadXML($serverRequest->getBody());
        if ($body === false) {
            throw new InvalidArgumentException();
        }
        return $body;
    }
}
