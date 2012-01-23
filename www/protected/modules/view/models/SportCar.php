<?php

/**
 * This is the model class for table "view_sport_car".
 *
 * The followings are the available columns in table 'view_sport_car':
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $power
 */
class SportCar extends Car
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportCar the static model class
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
		return 'view_sport_car';
	}

    public function primaryKey() {
        return 'id';
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, power', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('type', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, power', 'safe', 'on'=>'search'),
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
		);
	}

    /*public function afterCreate() {
        if ($this->isNewRecord) {
            $data = new SportCarData;
            $data->car_id = $this->id;
            $data->save(false);
        }
    } */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'type' => 'Type',
			'power' => 'Power',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('power',$this->power);

		return new CActiveDataProvider('SportCar', array(
			'criteria'=>$criteria,
		));
	}
}
