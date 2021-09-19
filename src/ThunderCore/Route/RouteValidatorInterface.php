<?php
namespace ThunderCore\Route;

use League\Route\Route;

interface RouteValidatorInterface
{
    /**
     * @param Route $map
     * @param array $requires
     * @param array $options
     * @return Route
     */
    public function validate(Route $map, array $requires, array $options);
}
