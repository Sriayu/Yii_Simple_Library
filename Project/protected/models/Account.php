<?php

/**
 * This is the model class for table "accounts".
 *
 * The followings are the available columns in table 'accounts':
 * @property string $id
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Members[] $members
 */
class Account extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Account the static model class
     */
    // overrides the CModel::beforeSave()
    public function beforeSave() {
        $this->password = self::hashPassword($this->password);
        return (parent::beforeSave());
    }
    public function actionBuildAuthItems($id) {
        try {
            $auth = Yii::app()->authManager;

            $auth->assign('member', $id);
            echo('Built successfully. This is a one-time execution. Please remove or comment this action.');
        } catch (CDbException $cdbe) {
            throw new CException('You already have the auth items declared. Please remove or comment this action.');
        }
    }
// a password hashing method
    public static function hashPassword($_password) {
        return (MD5($_password));
    }

// to compare this model's password wirh a given password
    public function comparePassword($_password) {
        return($this->password === $this->hashPassword($_password));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'accounts';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password', 'required'),
            array('username, password', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'members' => array(self::HAS_MANY, 'Member', 'account_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}