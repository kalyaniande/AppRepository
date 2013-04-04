<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    public function homeAction() {
        
        $auth = Zend_Auth::getInstance();
        
        $user = $auth->getIdentity();
        
        $this->view->user_name =  $user;
    }


}

