<?php
class Application_Model_Users
{
    protected $_username;
    protected $_password; 
    protected $_name;
    protected $_email;
    protected $_mobile;
    protected $_id;
 
    public function __construct(array $options = null) {
        if(is_array($options)) {
            $this->setOptions($options);
        }
    }
    public function __set($name, $value) {
        $method = 'set'.$name;
        if(('mapper' == $name) || !method_exists($this, $method)) {
           throw new Exception('Invalid User property'); 
        }
        $this->$method($value);
    }
    public function __get($name) {
       $method = 'get'.$name;
       if('mapper' == $name || !method_exists($this, $method)) {
           throw new Exception('Invalid User property');
       }
       $this->$method();
   }
   public function setOptions(array $options) {
       $methods = get_class_methods($this);
       foreach ($options as $key => $value) {
           $method = 'set' . ucfirst($key);
           if (in_array($method, $methods)) {
               $this->$method($value);
           }
       }
       return $this;
   }
 
   public function setId($id) { 
       $this->_id = $id;
       return $this;
   }
   public function getId() {
       return $this->_id;
   }
 
   public function setUsername($name) {
       $this->_username = $name;
       return $this;
   }
   public function getUsername() {
       return $this->_username;
   }
 
   public function setPassword($password) {
       $this->_password = $password;
       return $this;
   }
   public function getPassword() {
       return $this->_password;
   }
    
   public function setName($name) {
       $this->_name = $name;
       return $this;
   }
   public function getName() {
       return $this->_name;
   }
   public function setEmail($email) {
       $this->_email = $email;
       return $this;
   }
   public function getEmail() {
       return $this->_email;
   }
   public function setMobile($mobile) {
       $this->_mobile = $mobile;
       return $this;
   }
   public function getMobile() {
       return $this->_mobile;
   }
   
} 
?>