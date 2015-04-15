<?php

namespace Swobble\Form;

class FormField {
    private $fieldType;
    private $fieldOptions;
    private $field;
    
    public function __construct($fieldType = 'input', $options = array()) {
        $this->fieldOptions = $options;
        
        switch($this->fieldType = $fieldType) {
            case 'textarea':
                $this->field = new Element\Textarea($this->fieldOptions);
                break;
            case 'select':
                $this->field = new Element\Select($this->fieldOptions);
                break;
            case 'button':
                $this->field = new Element\Button($this->fieldOptions);
                break;
            case 'input':
            default:
                $this->field = new Element\Input($this->fieldOptions);
                break;
        }
    }
    
    public function render() {
        return $this->field->render();
    }
}