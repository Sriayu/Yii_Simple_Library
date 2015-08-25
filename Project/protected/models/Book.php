<?php

/**
 * This is the model class for table "books".
 *
 * The followings are the available columns in table 'books':
 * @property string $id
 * @property string $author_id
 * @property string $publisher_id
 * @property string $isbn
 * @property string $title
 * @property string $year
 * @property string $description
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Authors $author
 * @property Publishers $publisher
 * @property Copies[] $copies
 */
class Book extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Book the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'books';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('author_id, publisher_id', 'length', 'max' => 10),
            array('isbn', 'length', 'max' => 16),
            array('title', 'length', 'max' => 64),
            array('year', 'length', 'max' => 4),
            array('description', 'safe'),
            array('image','file','types'=>'jpg, gif, png'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, author_id, publisher_id, isbn, title, year, description, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function searchWithAuthor($_author_id) {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('author_id', $_author_id, true);
        $criteria->compare('publisher_id', $this->publisher_id, true);
        $criteria->compare('isbn', $this->isbn, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('year', $this->year);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'author' => array(self::BELONGS_TO, 'Authors', 'author_id'),
            'author' => array(self::BELONGS_TO, 'Author', 'author_id'),
            //'publisher' => array(self::BELONGS_TO, 'Publishers', 'publisher_id'),
            'publisher' => array(self::BELONGS_TO, 'Publisher', 'publisher_id'),
            //'copies' => array(self::HAS_MANY, 'Copies', 'book_id'),
            'copies' => array(self::HAS_MANY, 'Copy', 'book_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'author_id' => 'Author',
            'publisher_id' => 'Publisher',
            'isbn' => 'Isbn',
            'title' => 'Title',
            'year' => 'Year',
            'description' => 'Description',
            'image'=>'image',
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
        $criteria->compare('author_id', $this->author_id, true);
        $criteria->compare('publisher_id', $this->publisher_id, true);
        $criteria->compare('isbn', $this->isbn, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image', $this->image,true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
//    public function searchWithAuthor($_author_id){
//           $criteria = new CDbCriteria;
//           
//           $criteria->compare('id',$this->id,true);
//           $criteria->compare('author_id',$_author_id,true);
//           $criteria->compare('publisher_id',$this->publisher_id,true);
//           $criteria->compare('isbn',  $this->isbn,true);
//           $criteria->compare('title',$this->title,true);
//           $criteria->compare('year',  $this->year);
//           
//         return new CActiveDataProvider($this,array('criteria'=>$criteria,
//             ));
//           
//           
//        }

}