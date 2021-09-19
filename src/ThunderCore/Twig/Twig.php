<?php
namespace ThunderCore\Twig;

use ThunderCore\Logger\Interfaces\LoggerHelperInterface;
use ThunderCore\Logger\Traits\LoggerHelperTrait;
use Twig\Environment;
use Twig\Error\Error;

class Twig extends Environment implements LoggerHelperInterface
{
    use LoggerHelperTrait;

    /**
     * @param $name
     * @param array $context
     * @return string
     */
    public function render($name, array $context = array())
    {
        try {
            $page = parent::render($name, $context);
        } catch (Error $e) {
            $this->error('Twig_Error', (array)$e);
            $page = '';
        }
        return $page;
    }
}
