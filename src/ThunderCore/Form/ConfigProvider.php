<?php

namespace ThunderCore\Form;

use ThunderCore\Form\View\Helper\FormElement;
use ThunderCore\Utils\ArrayUtils;
use Zend\ServiceManager\Factory\InvokableFactory;

class ConfigProvider extends \Zend\Form\ConfigProvider
{
    private $config = array(
        'aliases' => array(
            'formcollection'             => View\Helper\FormCollection::class,
            'form_collection'            => View\Helper\FormCollection::class,
            'formCollection'             => View\Helper\FormCollection::class,
            'FormCollection'             => View\Helper\FormCollection::class,
            'formrow'                    => View\Helper\FormRow::class,
            'form_row'                   => View\Helper\FormRow::class,
            'formRow'                    => View\Helper\FormRow::class,
            'FormRow'                    => View\Helper\FormRow::class,
            'form_element'               => View\Helper\FormElement::class,
            'formelement'                => View\Helper\FormElement::class,
            'formElement'                => View\Helper\FormElement::class,
            'FormElement'                => View\Helper\FormElement::class,
            'form_element_errors'        => View\Helper\FormElementErrors::class,
            'formelementerrors'          => View\Helper\FormElementErrors::class,
            'formElementErrors'          => View\Helper\FormElementErrors::class,
            'FormElementErrors'          => View\Helper\FormElementErrors::class,
            'formstart'                  => View\Helper\FormStart::class,
            'form_start'                 => View\Helper\FormStart::class,
            'formStart'                  => View\Helper\FormStart::class,
            'FormStart'                  => View\Helper\FormStart::class,
            'formend'                    => View\Helper\FormEnd::class,
            'form_end'                   => View\Helper\FormEnd::class,
            'formEnd'                    => View\Helper\FormEnd::class,
            'FormEnd'                    => View\Helper\FormEnd::class,
            'formcheckbox'               => View\Helper\FormCheckbox::class,
            'form_checkbox'              => View\Helper\FormCheckbox::class,
            'formCheckbox'               => View\Helper\FormCheckbox::class,
            'FormCheckbox'               => View\Helper\FormCheckbox::class,
            'formmulticheckbox'          => View\Helper\FormMultiCheckbox::class,
            'form_multi_checkbox'        => View\Helper\FormMultiCheckbox::class,
            'formMultiCheckbox'          => View\Helper\FormMultiCheckbox::class,
            'FormMultiCheckbox'          => View\Helper\FormMultiCheckbox::class,
            'form_plain_text'            => View\Helper\FormPlainText::class,
            'formplaintext'              => View\Helper\FormPlainText::class,
            'formPlainText'              => View\Helper\FormPlainText::class,
            'FormPlainText'              => View\Helper\FormPlainText::class,
        ),
        'factories' => array(
            View\Helper\FormCollection::class      => InvokableFactory::class,
            View\Helper\FormStart::class           => InvokableFactory::class,
            View\Helper\FormEnd::class             => InvokableFactory::class,
            View\Helper\FormRow::class             => InvokableFactory::class,
            View\Helper\FormElement::class         => InvokableFactory::class,
            View\Helper\FormElementErrors::class   => InvokableFactory::class,
            View\Helper\FormCheckbox::class        => InvokableFactory::class,
            View\Helper\FormMultiCheckbox::class   => InvokableFactory::class,
            View\Helper\FormPlainText::class       => InvokableFactory::class,
        ),
    );

    public function getViewHelperConfig()
    {
        $config = ArrayUtils::merge(parent::getViewHelperConfig(), $this->config);
        $config['initializers'][FormElement::class] = function (/** @noinspection PhpUnusedParameterInspection */ $context, $object) {
            if ($object instanceof FormElement) {
                $object->addType('plaintext', 'formPlainText');
            }
        };
        return $config;
    }
}
