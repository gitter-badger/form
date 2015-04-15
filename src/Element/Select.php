<?php

namespace Swobble\Form\Element;

use Swobble\Form\Collection\ArrayCollection;

class Select {
    private $fieldOptions;
    
    public function __construct($options = array()) {
        //kill option attr...
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
        
        return '<select '.implode(' ', $fieldAttributes).'></select>';
    }
}