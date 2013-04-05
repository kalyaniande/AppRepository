<?php

class Application_Form_Signup extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST 
        $this->setMethod('post');
        
        // Add an Firstname element
        $this->addElement('text', 'name', array(
            'label'   => 'Name:',
	    'required'   => true,
            'filters'    => array('StringTrim'),
	    'validators' => array(array('validator' =>
            'StringLength','options' => array(0, 164))
	    )
            ));
        
        $this->addElement('text', 'mobile', array(
            'label'   => 'Mobile Number:',
	    'required'   => true,
            'filters'    => array('StringTrim'),
	    'validators' => array(array('validator' =>
            'StringLength','options' => array(0, 25))
	    )
            ));
         $this->addElement('text', 'email', array(
            'label'   => 'Email:',
	    'required'   => true,
            'filters'    => array('StringTrim'),
	    'validators' => array(
             'EmailAddress',
	    )
            ));
         $this->addElement('text', 'username', array(
            'label'   => 'User Name:',
	    'required'   => true,
            'attribs' => array('onkeyup' => 'getuser();'),
            'filters'    => array('StringTrim'),
	    'validators' => array(array('validator' =>
            'StringLength','options' => array(0, 30))
	    )
            ));
         $this->addElement('password', 'password', array(
            'label'   => 'Password:',
	    //'required'   => true,
            'filters'    => array('StringTrim'),
	    'validators' => array(array('validator' =>
            'StringLength','options' => array(0, 30))
	    )
            ));
         
          $this->addElement('submit', 'submit', array(
              'ignore'   => true,
              'label'    => 'Sign Up',
              'attribs'  => array('class' => 'btn btn-info'),
              ));
        
    }


}

