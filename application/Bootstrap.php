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
        
        $view->headLink()->appendStylesheet('/zend-app/application/views/css/foundation-4.1.1/css/foundation.css');
    }
    public function _initNavigation() {
        
        $this->bootstrap('view');
        
        $view = $this->getResource('view');
        
        $auth = Zend_Auth::getInstance();

        if(Zend_Auth::getInstance()->hasIdentity()) {
            $pages = array(
                        array(
                            'label' => 'Home',
                            'controller' => 'index',
                            'action' => 'home',

                        ),
                        array(
                            'label' => 'Logout',
                            'controller' => 'auth',
                            'action' => 'logout',

                        ),
                 
                 );
        }else {
            $pages = array(
                        array(
                            'label' => 'Home',
                            'controller' => 'index',
                            'action' => 'home',

                        ),
                        array(
                            'label' => 'Login',
                            'controller' => 'auth',
                            'action' => 'login',

                        ),
                 
                 );
        }    
        
        $nav = new Zend_Navigation($pages);   
                
        $view->navigation($nav);
        
    }

}

