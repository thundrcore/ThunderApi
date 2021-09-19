<?php


namespace ThunderCore\Form\View\Helper;

class FormElementErrors extends \Zend\Form\View\Helper\FormElementErrors
{
    protected $messageCloseString     = '</div></div>';
    protected $messageOpenFormat      = '<div class="invalid-feedback"><div class="alert alert-danger" role="alert">';
    protected $messageSeparatorString = '</div><div class="alert alert-danger" role="alert">';
}
