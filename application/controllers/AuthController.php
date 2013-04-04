<?php
class AuthController extends Zend_Controller_Action {
    
    public function loginAction() {
        
        $request = $this->getRequest();
        
        $login_form = new Application_Form_Login();
        
        $this->view->loginForm = $login_form;
        
        if($request->getMethod() == 'POST') {
            if ($login_form->isValid($_POST)) {
                $username = $login_form->getValue('username');
                $password = $login_form->getValue('password');
                           
                $auth = Zend_Auth::getInstance();
 
                $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini',
                                              'production');
                
                $options = $config->ldap->toArray();
                $adapter = new Zend_Auth_Adapter_Ldap($options, $username,
                                      $password);
                               
                $result = $auth->authenticate($adapter);
                
                if ($result->isValid()) {
                    $user = $result->getIdentity(); 
                    $auth->getStorage()->write($user);
                    $this->_redirect('index/home');            
                }else {
                    echo $result->getCode();
                    switch ($result) {
                        case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                            $this->view->error_message =  'Username Incorrect!';
                        case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                            $this->view->error_message =  'Password Incorrect!';
                        default:
                            $this->view->error_message = 'Username or Password Incorrect!';
                            
                    }
                }

            }
        }
       
    }
    public function logoutAction() {
                        
        Zend_Auth::getInstance()->clearIdentity();
        
        $this->_redirect('auth/login');       
    }
    
}

?>
