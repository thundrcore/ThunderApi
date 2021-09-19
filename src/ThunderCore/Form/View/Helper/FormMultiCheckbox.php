<?php

namespace ThunderCore\Form\View\Helper;

class FormMultiCheckbox extends \Zend\Form\View\Helper\FormMultiCheckbox
{
    /**
     * {@inheritdoc}
     */
    public function getInlineClosingBracket()
    {
        return '><span class="checkmark"></span>';
    }
}
