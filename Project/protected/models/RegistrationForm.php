<?php

class RegistrationForm extends CFormModel {

// attributes
// for bio
    public $first_name;
    public $last_name;
    public $e_mail;
    public $address;
// for credential
    public $username;
    public $password;
    public $repassword;

// applied rules for validation
    public function rules() {
        return array(
// safe attributes are assigned-able in all scenario types
            array('first_name','required'),
            array('first_name','length','max'=>16),
            array('last_name','length','max'=>16),
            array('address','length','max'=>64),
            array('e_mail', 'email'),
            array('e_mail', 'required'),
            array('username','required'),
            array('password','required'),
            array('repassword','required','on'=>'register'),
            array('password', 'compare', 'compareAttribute'=>'repassword', 'on'=>'register'),
            
        );
    }
    
// sets attribute labels for view labeling
    public function attributeLabels() {
        return array(
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'address' => 'Address',
            'e_mail' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'repassword' => 'Retype password',
        );
    }

}

?>