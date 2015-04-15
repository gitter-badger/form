<?php

namespace Swobble\Form;

use Swobble\Form\Collection\ArrayCollection;
use Swobble\Form\FormField;
use Swobble\Form\Util\ProcessInput;

class FormInstance extends ArrayCollection {    
    //private $sanitizeFilter = array();
    //public $optionElements = array();
    
    private $formId;
    private $formElements;
    private $formOptions;
    private $processInput;
    
    public function __construct($options = array()) {
        $this->formOptions = new ArrayCollection(array_merge(
            array(
                'method' => 'POST',
                'name' => 'AllInclForm',
                'id' => 'all-incl-form-' . uniqid(),
                'class' => 'AllInclForm'
            ),
            $options
        ));
        
        $this->formId = $this->formOptions['id'];
        $this->formElements = new ArrayCollection();
    }
    
    public function getId() {
        return $this->formId;
    }
    
    public function setProcessInput(ProcessInput $processInput) {
        $this->processInput = $processInput;
        return $this;
    }
    
    public function add($options = array()) {
        $formField = new FormField($options);
        $this->formElements->append($formField);
        return $this;
    }
    
    public function render() {
        $formAttributes = array();
        
        $iterator = $this->formOptions->getIterator();
        while($iterator->valid()) {
            $formAttributes[] = $iterator->key().'="'.$iterator->current().'"';
            $iterator->next();
        }
        
        $form = '<form '.implode(' ', $formAttributes).'>' . PHP_EOL;
        
        $iterator = $this->formElements->getIterator();
        while($iterator->valid()) {
            $form .= $iterator->current()->render() . PHP_EOL;
            $iterator->next();
        }
        
        $form .= '</form>' . PHP_EOL;
        return $form;
    }
}