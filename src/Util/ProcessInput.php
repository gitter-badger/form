<?php

namespace Swobble\Form\Util;

use Swobble\Form\Exception\FormException;
use Symfony\Component\HttpFoundation\Request;

class ProcessInput {
    public function isSent() {
        //proof if form-instance is sent
        //csrf-protection
        
        return true;
    }
    
    private function sanitize() {
        //we should use symfony/request...
        //http://symfony.com/doc/current/components/http_foundation/introduction.html#installation
        
        $request = Request::createFromGlobals();
        
        if (isset($_POST['Submit'])) {
            foreach ($this->formElements as $key => $value) {
                if (isset($_POST[$key])) {
                    if ($_POST[$key] == '') {
                        //unset...
                    }
                    return $_POST[$key];
                }
            }
        }
        
        throw new FormException('Keine Daten vorhanden');
    }
}