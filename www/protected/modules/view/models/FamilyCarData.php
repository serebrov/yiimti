<?php

/**
 * This is the model class for table "family_car_data".
 *
 * The followings are the available columns in table 'family_car_data':
 * @property integer $car_id
 * @property integer $seats
 */
class FamilyCarData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FamilyCarData the static model class
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
		return 'family_car_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('car_id, seats', 'required'),
			array('car_id, seats', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('car_id, seats', 'safe', 'on'=>'search'),
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
			'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'car_id' => 'Car',
			'seats' => 'Seats',
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

		$criteria->compare('car_id',$this->car_id);

		$criteria->compare('seats',$this->seats);

		return new CActiveDataProvider('FamilyCarData', array(
			'criteria'=>$criteria,
		));
	}
}