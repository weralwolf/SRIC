<?php

/**
 * This is the model class for table "organizations".
 *
 * The followings are the available columns in table 'organizations':
 * @property string $id
 * @property string $cities_id
 * @property string $title
 * @property integer $approved
 */
class Organizations extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Organizations the static model class
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
		return 'organizations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('cities_id, title', 'required'),
		array('approved', 'numerical', 'integerOnly'=>true),
		array('cities_id', 'length', 'max'=>10),
		array('title', 'length', 'max'=>255),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('id, cities_id, title, approved', 'safe', 'on'=>'search'),
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
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'cities_id' => 'Cities',
			'title' => 'Title',
			'approved' => 'Approved',
		);
	}

	/**
	 * Suggests a list of existing values matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of names to be returned
	 * @return array list of matching lastnames
	 * @TODO Should take in account selceted city
	 */
	public function suggest($keyword, $limit = 20)
	{
		$models = $this->findAll(array(
			'condition' => 'title LIKE :keyword',
			'order' => 'title',
			'limit' => $limit,
			'params' => array(':keyword' => "%$keyword%")
		));
		$suggest = array();
		foreach($models as $model) {
			$suggest[] = array(
				'label' => $model->title, //.' - '.$model->code.' - '.$model->call_code,  // label for dropdown list
				'value' => $model->title,  // value for input field
				'id' => $model->id,       // return values from autocomplete
			);
		}
		return $suggest;
	}
	
	/**
	 * Resolve organization id by country name
	 * @param organization name
	 * @return organization id if it exists or -1 if no
	 */
	public function resolveID($name) {
	    $model = $this->find(array(
	        'condition' => 'title=:keyword',
	        'select' => 'id',
	        'params' => array(':keyword' => $name)
	    ));
	    return $model ? $model->id : -1;
	}

	static public function resolveName($id) {
	    $model = Organizations::model()->findByPk(intval($id));
	    return $model ? $model->title : '--unexisted--';
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
		$criteria->compare('cities_id',$this->cities_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('approved',$this->approved);
		return new CActiveDataProvider('Organizations', array(
			'criteria'=>$criteria,
		));
	}
}