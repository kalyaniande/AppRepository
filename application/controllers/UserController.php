<?php
class UserController extends Zend_Controller_Action {
    
    public function signupAction() {
         
        $request = $this->getRequest();
        
        $form    = new Application_Form_Signup();
        
        if ($this->getRequest()->isPost()) {
             
            if ($form->isValid($request->getPost())) {
            
                
                
                $form_values = $form->getValues(); 
                
                $users = new Application_Model_Users();
                $users->setUsername($form_values['username'])
                      ->setMobile($form_values['mobile'])
                      ->setEmail($form_values['email'])
                      ->setName($form_values['name'])
                      ->setPassword($form_values['password']);                 
                
                $users_mapper  = new Application_Model_UsersMapper();
                
                $user_id = $users_mapper->save($users); 
                
                $auth = Zend_Auth::getInstance();
                
                $auth->getStorage()->write($form_values['username']);
                                 
                $this->_redirect('index/home');
             }
         }
         $this->view->form = $form;
    }
    public function getldapuserAction() {
        
        $request = $this->getRequest();
        
        $data = $request->getPost();
        
        $username = $data['username'];
        
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini',
                                      'production');

        $options = $config->ldap->toArray();

        $ldap = new Zend_Ldap($options['server']);
        $result = $ldap->getEntry('uid='.$username .','.$options['server']['baseDn'], array('displayname', 'mail','mobile','title','givenName'));
        
        $output = array('name'   => $result['displayname'][0],
                        'mail'   => $result['mail'][0],
                        'mobile' => $result['mobile'][0],
                        'title' => $result['title'][0]);
        echo json_encode($output);
        exit();
                
        
    }
}