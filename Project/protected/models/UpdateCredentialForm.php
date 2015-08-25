<?php

class UpdateCredentialForm extends CFormModel {

// attributes
// for credential
    public $username;
    public $password;
    public $newpassword;
    public $repassword;
    private $_identity;

// applied rules for validation
    public function rules() {
        return array(
// safe attributes are assigned-able in all scenario types
            //array('username', 'required'),
            array('password', 'required'),
            array('repassword', 'required', 'on' => 'register'),
            array('password', 'compare', 'compareAttribute' => 'repassword', 'on' => 'register'),
            array('newpassword', 'compare', 'compareAttribute' => 'newpassword', 'on' => 'repassword'),
            array('newpassword', 'required'),
        );
    }

// sets attribute labels for view labeling
    public function attributeLabels() {
        return array(
            //'username' => 'Username',
            'password' => 'Old Password',
            'newpassword' => 'New Password',
            'repassword' => 'Retype New password',
        );
    }

    public function check() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        } if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            return true;
        }
        else
            return false;
    }

}

?>