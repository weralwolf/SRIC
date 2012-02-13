<?php

/**
 * This is the model class for table "texts_content".
 *
 * The followings are the available columns in table 'texts_content':
 * @property string $texts_id
 * @property string $content
 * @property string $language
 */
class TextsContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TextsContent the static model class
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
		return 'texts_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('texts_id, content', 'required'),
			array('texts_id', 'length', 'max'=>10),
			array('language', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('texts_id, content, language', 'safe', 'on'=>'search'),
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
			'texts' => array(self::HAS_ONE, 'Texts', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'texts_id' => 'Texts',
			'content' => 'Content',
			'language' => 'Language',
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

		$criteria->compare('texts_id',$this->texts_id,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('language',$this->language,true);

		return new CActiveDataProvider('TextsContent', array(
			'criteria'=>$criteria,
		));
	}
}