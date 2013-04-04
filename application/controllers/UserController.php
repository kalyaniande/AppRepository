<?php
class UserController extends Zend_Controller_Action {
    
    public function signupAction() {
         
        $request = $this->getRequest();
        
        $form    = new Application_Form_Signup();
        
        if ($this->getRequest()->isPost()) {
             
            if ($form->isValid($request->getPost())) {
            
                $username = $form_values['username'];
                
                $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini',
                                              'production');
                
                $options = $config->ldap->toArray();
                
                $ldap = new Zend_Ldap($options['server']);
                $rs = $ldap->getEntry('uid='.$username .','.$options['server']['baseDn'], array('displayname', 'mail','mobile','title','givenName'));
                print_r($rs);
                
                $form_values = $form->getValues(); 
                
                /*$users = new Application_Model_Users();
                $users->setUsername($form_values['username'])
                      ->setMobile($form_values['mobile'])
                      ->setEmail($form_values['email'])
                      ->setName($form_values['name'])
                      ->setPassword($form_values['password']);                 
                
                $users_mapper  = new Application_Model_UsersMapper();
                
                $user_id = $users_mapper->save($users); */
                                 
                $this->_redirect('index/home');
             }
         }
         $this->view->form = $form;
    }
}