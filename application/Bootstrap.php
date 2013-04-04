<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initPlaceholders()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
        
        $view->headTitle('Zend App')
             ->setSeparator(' - '); 
        
        $view->headLink()->appendStylesheet('/zend-app/application/views/css/bootstrap/css/bootstrap.css');
    }

}

