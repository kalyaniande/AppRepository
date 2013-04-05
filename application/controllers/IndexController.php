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
        
        $usersmapper = new Application_Model_UsersMapper();
        
        $this->view->users = $usersmapper->fetchAll();
        
        $this->_helper->layout()->setLayout('homelayout');
        
        $this->view->user_name =  $user;
    }


}

