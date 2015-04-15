<?php

namespace Swobble\Form\Element;

use Swobble\Form\Collection\ArrayCollection;

class Button {
    private $fieldOptions;
    
    public function __construct($options = array()) {
        $this->fieldOptions = new ArrayCollection(
            array_merge(
                array(),
                $options
            )
        );
    }
    
    public function render() {
        $fieldAttributes = array();
        
        $iterator = $this->fieldOptions->getIterator();
        while($iterator->valid()) {
            $fieldAttributes[] = $iterator->key().'="'.$iterator->current().'"';
            $iterator->next();
        }
        
        return '<button '.implode(' ', $fieldAttributes).'></button>';
    }
}