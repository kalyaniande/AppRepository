<?php

class Application_Form_Login extends Zend_Form
{
    public $usernameDecorators = array('ViewHelper',
        
                                      'Description',
        
                                      'Errors',
        
                                      array(array('data'=>'HtmlTag'), array('tag' => 'td')),

                                      array('Label', array('tag' => 'td')),

                                      array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'openOnly'=>true))  

                                      );
    public $passwordDecorators = array('ViewHelper',
        
                                       'Description',
        
                                       'Errors',
        
                                       array(array('data'=>'HtmlTag'), array('tag' => 'td')),

                                       array('Label', array('tag' => 'td')), 
        
                                       array(array('row'=>'HtmlTag'),array('tag'=>'tr'))

                                      );
    public $submitdecorators = array('ViewHelper',

                                     'Description',

                                     'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',

                                     'colspan'=>'2','align'=>'center')),

                                     array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'closeOnly'=>'true'))

                                     );

    public function init()
    {
        // Set the method for the display form to POST 
        $this->setMethod('post');
        
        // Add an Firstname element
        $this->addElement('text', 'username', array(
            'decorators' => $this->usernameDecorators,
            'label'   => 'Username:',
	    'required'   => true,
            'filters'    => array('StringTrim'),
            'attribs' => array('placeholder' => 'Enter User Name...'),
	    
	    ));
        $this->addElement('password', 'password', array(
            'decorators' => $this->passwordDecorators,
            'label'   => 'Password:',
	    'required'   => true,
            'filters'    => array('StringTrim'),
            'attribs' => array('placeholder' => 'Enter Password...'),
            ));	    
        
       $this->addElement('submit', 'submit', array(
              'ignore'   => true,
              'decorators' => $this->submitdecorators,
              'label'    => 'Login',
              'attribs' => array('class' => 'btn btn-info'),
              ));
       $this->setDecorators(array('FormElements',         

                            array(array('data'=>'HtmlTag'),array('tag'=>'table')),          

                            'Form'  

                          ));
        
    }


}

