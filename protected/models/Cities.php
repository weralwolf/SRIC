<?php

/**
 * This is the model class for table "cities".
 *
 * The followings are the available columns in table 'cities':
 * @property string $id
 * @property string $countries_id
 * @property string $name
 * @property integer $approved
 */
class Cities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cities the static model class
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
		return 'cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('countries_id, name', 'required'),
		array('approved', 'numerical', 'integerOnly'=>true),
		array('countries_id', 'length', 'max'=>10),
		array('name', 'length', 'max'=>255),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('id, countries_id, name, approved', 'safe', 'on'=>'search'),
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
			'countries' => array(self::BELONGS_TO, 'Countries', 'countries_id'),
			'organizations' => array(self::HAS_MANY, 'Organizations', 'cities_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'countries_id' => 'Countries',
			'name' => 'Name',
			'approved' => 'Approved',
		);
	}

	/**
	 * Suggests a list of existing values matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of names to be returned
	 * @return array list of matching lastnames
	 * @TODO Should take in account selceted country 
	 */
	public function suggest($keyword, $limit = 20)
	{
		$models = $this->findAll(array(
			'condition' => 'name LIKE :keyword',
			'order' => 'name',
			'limit' => $limit,
			'params' => array(':keyword' => "%$keyword%")
		));
		$suggest = array();
		foreach($models as $model) {
			$suggest[] = array(
				'label' => $model->name, //.' - '.$model->code.' - '.$model->call_code,  // label for dropdown list
				'value' => $model->name,  // value for input field
				'id' => $model->id,       // return values from autocomplete
			);
		}
		return $suggest;
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
		$criteria->compare('countries_id',$this->countries_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('approved',$this->approved);
		return new CActiveDataProvider('Cities', array(
			'criteria'=>$criteria,
		));
	}
}