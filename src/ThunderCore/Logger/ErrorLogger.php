<?php


namespace ThunderCore\Logger;


use ThunderCore\Logger\Interfaces\LoggerHelperInterface;
use ThunderCore\Logger\Traits\LoggerHelperTrait;
use Psr\Log\LoggerInterface;

class ErrorLogger implements LoggerHelperInterface
{
    use LoggerHelperTrait;

    public function __construct(LoggerInterface $logger)
    {
        $this->setLogger($logger);
        $this->setLogDebug(true);
    }

    /**
     * @param $severity
     * @param $message
     * @param $file
     * @param $line
     * @return bool
     * @throws \ErrorException
     */
    public function myErrorHandler($severity, $message, $file, $line)
    {
        switch ($severity) {
            case E_ERROR:
            case E_PARSE:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            case E_RECOVERABLE_ERROR:
                $this->error($severity, array($message, $file, $line));
                throw new \ErrorException($message, 0, $severity, $file, $line);
                break;
            case E_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_USER_WARNING:
            case E_DEPRECATED:
            case E_USER_DEPRECATED:
                $this->warning($severity, array($message, $file, $line));
                break;
            case E_NOTICE:
            case E_USER_NOTICE:
            case E_STRICT:
                $this->notice($severity, array($message, $file, $line));
                break;
            default:
                $this->debug($severity, array($message, $file, $line));
                break;
        }
        return false;
    }

    /**
     *
     */
    public function myShutdownFunction()
    {
        $error = error_get_last();

        switch ($error['type']) {
            case E_ERROR:
            case E_PARSE:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            case E_RECOVERABLE_ERROR:
                $this->error($error['type'], $error);
                break;
        }
    }
}
