<?php

/**
 * This is the model class for table "reports_authors".
 *
 * The followings are the available columns in table 'reports_authors':
 * @property string $id
 * @property string $reports_id
 * @property string $authors
 * @property string $department
 */
class ReportAuthors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ReportAuthors the static model class
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
		return 'reports_authors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reports_id, authors, department', 'required'),
			array('reports_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, reports_id, authors, department', 'safe', 'on'=>'search'),
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
				'report'     => array(self::BELONGS_TO, 'Reports', 'reports_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		$m = Yii::app()->messages;
		return array(
			'id' => 'Id',
			'reports_id' => 'Reports',
			'authors'    => $m->translate('Reports', 'autors'),
			'department' => $m->translate('Participants', 'organizations_id'),
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

		$criteria->compare('reports_id',$this->reports_id,true);

		$criteria->compare('authors',$this->authors,true);

		$criteria->compare('department',$this->department,true);

		return new CActiveDataProvider('ReportAuthors', array(
			'criteria'=>$criteria,
		));
	}
}