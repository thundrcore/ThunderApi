<?php
namespace ThunderCore\Form\View\Helper;

use Zend\Form\FormInterface;
use Zend\Form\View\Helper\Form;

class FormStart extends Form
{
    public function render(FormInterface $form)
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }
        return $this->openTag($form);
    }
}
