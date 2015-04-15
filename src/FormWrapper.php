<?php

namespace Swobble\Form;

use Swobble\Form\Collection\ArrayCollection;
use Swobble\Form\Util\ProcessInput;

class FormWrapper extends ArrayCollection {
    /**
     * create
     * @options containing form specific option attributes
     * @return vectoholic\Utils\FormInstance
     * @description registers a new kernel in wrapper container
     */
    public function create($options = array()) {
        $k = new FormInstance($options);
        $this->append($k);
        return $k;
    }
    
    /**
     * close
     * @instance contains closing vectoholic\Utils\FormInstance
     * @return vectoholic\Utils\FormWrapper
     * @description close existing form instance if possible
     */
    public function close(FormInstance $instance) {
        //@todo: add csrf-protection in instance
        $formRendered = $instance->render();
        
        $processInput = new ProcessInput();
        if($processInput->isSent()) {
            $instance->setProcessInput($processInput);
            $processInput->getSanitizedInput();
        }
        
        $iterator = $this->getIterator();
        while($iterator->valid()) {
            if($iterator->current() == $instance) $iterator->offsetUnset($iterator->key());
            $iterator->next();
        }
        
        return $formRendered;
    }
}