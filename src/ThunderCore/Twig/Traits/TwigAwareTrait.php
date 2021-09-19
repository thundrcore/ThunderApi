<?php


namespace ThunderCore\Twig\Traits;

use Twig\Environment;

trait TwigAwareTrait
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @param Environment $twig
     */
    public function setTwig(Environment $twig)
    {
        $this->twig = $twig;
    }
}
