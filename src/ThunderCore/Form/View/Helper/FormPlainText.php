<?php


namespace ThunderCore\Form\View\Helper;


use Zend\Form\ElementInterface;
use Zend\View\Helper\AbstractHelper;

class FormPlainText extends AbstractHelper
{
    public function render(ElementInterface $element)
    {
        return $element->getValue();
    }

    public function __invoke(ElementInterface $element = null)
    {
        return $this->render($element);
    }
}
