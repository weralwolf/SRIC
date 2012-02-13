<?php

/**
 * This is the model class for table "reports".
 *
 * The followings are the available columns in table 'reports':
 * @property string $id
 * @property string $participants_id
 * @property string $conferences_id
 * @property string $sections_id
 * @property integer $files_id
 * @property string $title
 * @property string $autors
 */
class Reports extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Reports the static model class
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
		return 'reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('participants_id, conferences_id, sections_id, title, autors', 'required'),
			array('files_id', 'numerical', 'integerOnly'=>true),
			array('participants_id, conferences_id, sections_id', 'length', 'max'=>10),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, participants_id, conferences_id, sections_id, files_id, title, autors', 'safe', 'on'=>'search'),
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
			'participants' => array(self::BELONGS_TO, 'Participants', 'participants_id'),
			'sections' => array(self::BELONGS_TO, 'Sections', 'sections_id'),
			'conferences' => array(self::BELONGS_TO, 'Conferences', 'conferences_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'participants_id' => 'Participants',
			'conferences_id' => 'Conferences',
			'sections_id' => 'Sections',
			'files_id' => 'Files',
			'title' => 'Title',
			'autors' => 'Autors',
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

		$criteria->compare('participants_id',$this->participants_id,true);

		$criteria->compare('conferences_id',$this->conferences_id,true);

		$criteria->compare('sections_id',$this->sections_id,true);

		$criteria->compare('files_id',$this->files_id);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('autors',$this->autors,true);

		return new CActiveDataProvider('Reports', array(
			'criteria'=>$criteria,
		));
	}
}