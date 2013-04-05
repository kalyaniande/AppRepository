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
        
//        $sess = new Zend_Session_Namespace('user');
//        
        $this->bootstrap('view');
        
        $view = $this->getResource('view');
        
        $auth = Zend_Auth::getInstance();
        
        
//                
//        
//        if(!empty($sess->id)) {
//            
//            $role = $sess->role;    
//            
//            $pages = array(
//                    array(
//                        'label' => 'Home',
//                        'controller' => 'index',
//                        'action' => 'home',
//                        'visible' => $aclobject->getAcl($role, 'default-index', 'home'),
//                    ),
//
//                    array(
//                        'label' => 'Profile',
//                        'controller' => 'users',
//                        'action' => 'userprofile',
//                        'visible' => $aclobject->getAcl($role, 'default-users', 'userprofile'),
//                    ),
//                    array(
//                        'label' => 'Users',
//                        'controller' => 'users',
//                        'action' => 'view',
//                        'visible' => $aclobject->getAcl($role, 'default-users', 'view'),
//                    ),
//                    array(
//                        'label' => 'UsersLog',
//                        'controller' => 'users',
//                        'action' => 'userslog',
//                        'visible' => $aclobject->getAcl($role, 'default-users', 'userslog'),
//                    ),
//                    array(
//                            'label' => 'Previlages',
//                            'controller' => 'users',
//                            'action' => 'previlages',
//                            'visible' => $aclobject->getAcl($role, 'default-users', 'previlages'),
//                   ),
//                   array(
//                            'label' => 'Articles',
//                            'controller' => 'search',
//                            'action' => 'searcharticles',
//                            'visible' => $aclobject->getAcl($role, 'default-search', 'searcharticles'),
//                   ),
//                    
//                 );
//                
//                               
//        }else {
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
             
            
//        }
        
        $nav = new Zend_Navigation($pages);   
                
        $view->navigation($nav);
        
    }

}

