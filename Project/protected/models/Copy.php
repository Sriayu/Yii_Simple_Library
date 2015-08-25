<?php

/**
 * This is the model class for table "copies".
 *
 * The followings are the available columns in table 'copies':
 * @property string $id
 * @property string $book_id
 * @property string $call_number
 * @property string $year
 * @property integer $availability
 * @property integer $loanable
 *
 * The followings are the available model relations:
 * @property Books $book
 * @property Loans[] $loans
 */
class Copy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Copy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'copies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('book_id, call_number', 'required'),
			array('availability, loanable', 'numerical', 'integerOnly'=>true),
			array('book_id', 'length', 'max'=>10),
			array('call_number', 'length', 'max'=>16),
			array('year', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, book_id, call_number, year, availability, loanable', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'book' => array(self::BELONGS_TO, 'Books', 'book_id'),
			'loans' => array(self::HAS_MANY, 'Loans', 'copy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'book_id' => 'Book',
			'call_number' => 'Call Number',
			'year' => 'Year',
			'availability' => 'Availability',
			'loanable' => 'Loanable',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('book_id',$this->book_id,true);
		$criteria->compare('call_number',$this->call_number,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('availability',$this->availability);
		$criteria->compare('loanable',$this->loanable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}