<?php

namespace ThunderCore\Form\View\Helper;

class FormCheckbox extends \Zend\Form\View\Helper\FormCheckbox
{
    /**
     * {@inheritdoc}
     */
    public function getInlineClosingBracket()
    {
        return '><span class="checkmark"></span>';
    }
}
