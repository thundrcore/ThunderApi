<?php


namespace ThunderCore\Form\View\Helper;

use InvalidArgumentException;
use LogicException;
use ThunderCore\Factory;
use ThunderCore\Twig\Interfaces\TwigAwareInterface;
use ThunderCore\Twig\Traits\TwigAwareTrait;
use Traversable;
use Zend\Form\Element\Button;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement as BaseFormElement;

class FormElement extends BaseFormElement implements TwigAwareInterface
{
    use TwigAwareTrait;
    // @var string
    protected static $addonFormat = '<%s class="%s" %s><span class="input-group-text">%s</span></%s>';
    // @var string
    protected static $inputGroupFormat = '<div class="input-group %s" %s>%s</div>';
    // @var string
    protected static $inputWrapperFormat = '<div class="%s">%s';

    public function render(ElementInterface $element)
    {
//        $req = '';
//        if ($element->getOption('required')) {
//            $req = 'required';
//        }
//        return sprintf('<div class="%s">%s</div>', $req, parent::render($element));
        if (!in_array($element->getAttribute('type'), array('button', 'submit', 'reset', 'hidden'))) {
            $class = explode(' ', $element->getAttribute('class'));
            if ($element->getAttribute('type') != "checkbox") {
                $class[] = 'form-control';
            }
            $class = implode(' ', array_unique($class));
            $element->setAttribute('class', $class);
        }

        $elementString = parent::render($element);

        // Addon prepend
        if ($aAddOnPrepend = $element->getOption('add-on-prepend')) {
            $elementString = $this->renderAddOn($aAddOnPrepend) . $elementString;
        }
        // Addon append
        if ($aAddOnAppend = $element->getOption('add-on-append')) {
            $elementString .= $this->renderAddOn($aAddOnAppend, 'append');
        }
        if ($inputWrapperClass = $element->getOption('input-wrapper-class')) {
            return sprintf(self::$inputWrapperFormat, $inputWrapperClass, $elementString);
        }
        if ($aAddOnAppend || $aAddOnPrepend) {
            $sSpecialClass = '';
            // Input size
            if ($sElementClass = $element->getAttribute('class')) {
                if (preg_match('/(\s|^)input-lg(\s|$)/', $sElementClass)) {
                    $sSpecialClass .= ' input-group-lg';
                } elseif (preg_match('/(\s|^)input-sm(\s|$)/', $sElementClass)) {
                    $sSpecialClass .= ' input-group-sm';
                }
            }


            $sSpecialAttributes = '';
            // Input group attributes
            if (is_array($element->getOption('input-group'))) {
                $aInputGroup = $element->getOption('input-group');
                // Input group class
                if (! empty($aInputGroup['class'])) {
                    $sSpecialClass .= ' ' . $aInputGroup['class'];
                }
                // Input group other attributes
                if (is_array($aInputGroup['attributes'])) {
                    foreach ($aInputGroup['attributes'] as $name => $value) {
                        $sSpecialAttributes .= $name . '="' . $value . '" ';
                    }
                    $sSpecialAttributes = trim($sSpecialAttributes);
                }
            }

            $inputErrorClass = $element->getAttribute('inputErrorClass');
            if ($element->getMessages() && $inputErrorClass) {
                $sSpecialClass .= ' ' . $inputErrorClass;
            }
            // Add a sprintf directive for correct render of errors
            return $elementString = sprintf(
                static::$inputGroupFormat,
                trim($sSpecialClass),
                $sSpecialAttributes,
                $elementString
            );
        }

        if ($element->getOption('label_groupped')) {
            $options = array();
            if($element->getOption('label_attributes')) {
                foreach ($element->getOption('label_attributes') as $key => $val) {
                    $options[] = $key . " = '" . $val . "'";
                }
            }
            $label = sprintf("<label for='%s' %s>%s</label>", $element->getAttribute('id'), implode(" ",$options), $element->getOption('label_text'));
            $order = $element->getOption('label_position') == 'append' ? '%2$s%1$s' : '%1$s%2$s';
            return sprintf(
                $order,
                $label,
                $elementString
            );
        }
        return $elementString;
    }
    /**
     * renderAddOn
     * Render addo-on markup
     *
     * @param  ElementInterface|array|string $aAddOnOptions
     * @param  string                        $sPosition
     * @throws InvalidArgumentException
     * @throws LogicException
     * @access protected
     * @return string
     */
    protected function renderAddOn($aAddOnOptions, $sPosition = 'prepend')
    {
        if (empty($aAddOnOptions)) {
            throw new InvalidArgumentException('Addon options are empty');
        }
        if ($aAddOnOptions instanceof ElementInterface) {
            $aAddOnOptions = array('element' => $aAddOnOptions);
        } elseif (is_scalar($aAddOnOptions)) {
            $aAddOnOptions = array('text' => $aAddOnOptions);
        } elseif (! is_array($aAddOnOptions)) {
            throw new InvalidArgumentException(sprintf(
                'Addon options expects an array or a scalar value, "%s" given',
                is_object($aAddOnOptions) ? get_class($aAddOnOptions) : gettype($aAddOnOptions)
            ));
        }
        $sMarkup       = '';
        $sAddonTagName = 'div';
        $sAddonClass   = '';
        if (! empty($aAddOnOptions['text'])) {
            if (! is_scalar($aAddOnOptions['text'])) {
                throw new InvalidArgumentException(sprintf(
                    '"text" option expects a scalar value, "%s" given',
                    is_object($aAddOnOptions['text']) ? get_class($aAddOnOptions['text']) : gettype($aAddOnOptions['text'])
                ));
            } else {
                $sMarkup .= $aAddOnOptions['text'];
            }
            $sAddonClass .= ('prepend' == $sPosition) ? ' input-group-prepend' : 'input-group-append';
        } elseif (! empty($aAddOnOptions['element'])) {
            if (is_array($aAddOnOptions['element']) ||
                ($aAddOnOptions['element'] instanceof Traversable &&
                    ! ($aAddOnOptions['element'] instanceof ElementInterface))
            ) {
                $oFactory = new Factory();
                $aAddOnOptions['element'] = $oFactory->create($aAddOnOptions['element']);
            } elseif (! ($aAddOnOptions['element'] instanceof ElementInterface)) {
                throw new LogicException(sprintf(
                    '"element" option expects an instanceof Laminas\Form\ElementInterface, "%s" given',
                    is_object($aAddOnOptions['element']) ? get_class($aAddOnOptions['element']) : gettype($aAddOnOptions['element'])
                ));
            }
            $aAddOnOptions['element']->setOptions(array_merge(
                $aAddOnOptions['element']->getOptions(),
                array('disable-twbs' => true)
            ));
            $sMarkup .= $this->render($aAddOnOptions['element']);
            //Element is a button, so add-on container must be a "div"
            if ($aAddOnOptions['element'] instanceof Button) {
                $sAddonClass .= ' input-group-btn';
                $sAddonTagName = 'div';
            } else {
                $sAddonClass .= ' input-group-addon';
            }
        }

        $sAttributes = '';
        if (! empty($aAddOnOptions['attributes'])) {
            foreach ($aAddOnOptions['attributes'] as $name => $value) {
                $sAttributes .= $name .'="' . $value . '" ';
            }
            $sAttributes = rtrim($sAttributes);
        }
        return sprintf(static::$addonFormat, $sAddonTagName, trim($sAddonClass), $sAttributes, $sMarkup, $sAddonTagName);
    }
}
