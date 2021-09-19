<?php
namespace ThunderCore\Form\View\Helper;


use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormRow as BaseFormRow;

class FormRow extends BaseFormRow
{

    /**
     * The class that is added to element that have errors
     *
     * @var string
     */
    protected $inputErrorClass = 'is-invalid';
    protected $hintClass = 'form-text';

    public function __invoke(
        ElementInterface $element = null,
        $labelPosition = null,
        $renderErrors = null,
        $partial = null
    ) {
        return $this->render($element, $labelPosition);
    }

    public function render(ElementInterface $element, $labelPosition = null)
    {
//        $element->getOption('label_groupped');
        if ($element->getOption('label_groupped')) {
            $element->setOption('label_text', $element->getLabel());
            $element->setLabel('');
            $labelPosition = $element->getOption('label_position');
            if (!$labelPosition) {
                $labelPosition = self::LABEL_PREPEND;
                $element->setOption('label_position', $labelPosition);
            }
        }


        $inputErrorClass = $this->getInputErrorClass();
        // Does this element have errors ?
        if ($element->getMessages() && $inputErrorClass) {
            if ($element->getOption('add-on-prepend') || $element->getOption('add-on-append')) {
                $element->setAttribute('inputErrorClass', $inputErrorClass);
            }
        }
        $elementString = parent::render($element, $labelPosition);
        if ($element->getAttribute('type') == 'multi_checkbox') {
            $legend_attributes = $element->getOption('legend_attributes');
            $elementString = str_replace(array('<fieldset>','</fieldset>','<legend>','</legend>'), array('','',$this->getLabelHelper()->openTag($legend_attributes),'</label>'), $elementString);
        }
        if ($element->getOption('hint')) {
            $elementString .= sprintf('<small class="%s">'.$element->getOption('hint').'</small>', $this->hintClass);
        }
        if ($element->getAttribute('type')=='hidden') {
            return $elementString;
        }
        if ($element->getOption('input-wrapper-class')) {
            $elementString .= '</div>';
        }

        $grid = 'col';
        if ($element->hasAttribute('grid')) {
            $grid = $element->getAttribute('grid');
        }
        $rowOptions = $element->getOption('row');
        $rowClass = isset($rowOptions['class']) && $rowOptions['class'] ? $rowOptions['class'] : '';
        $rowStart = isset($rowOptions['continuing']) && $rowOptions['continuing'] ? '' : sprintf('<div class="form-row %s">', $rowClass);
        $rowEnd = isset($rowOptions['continue']) && $rowOptions['continue'] ? '' : '</div>';
        return sprintf('%s<div class="form-group %s">%s</div>%s', $rowStart, $grid, $elementString, $rowEnd);
    }
}
