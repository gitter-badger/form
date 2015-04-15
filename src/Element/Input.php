<?php

namespace Swobble\Form\Element;

use Swobble\Form\Collection\ArrayCollection;

class Input {
    private $fieldOptions;
    
    public function __construct($options = array()) {
        $this->fieldOptions = new ArrayCollection(
            array_merge(
                array(
                    'name' => 'default',
                    'type' => 'text'
                ),
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
        
        return '<input '.implode(' ', $fieldAttributes).' />';
    }
}