<?php

/**
 * This is the model class for table "ftrack_users".
 *
 * The followings are the available columns in table 'ftrack_users':
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $gender
 * @property integer $age
 * @property integer $height
 * @property integer $weight
 * @property integer $diet_goal
 * @property double $activity_level
 * @property integer $cal_limit
 * @property integer $exc_goal
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ftrack_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, created_at, gender, age, height, weight, diet_goal, activity_level, cal_limit, exc_goal', 'required'),
			array('age, height, weight, diet_goal, cal_limit, exc_goal', 'numerical', 'integerOnly'=>true),
			array('activity_level', 'numerical'),
			array('id', 'length', 'max'=>20),
			array('gender', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_at, updated_at, gender, age, height, weight, diet_goal, activity_level, cal_limit, exc_goal', 'safe', 'on'=>'search'),
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
        
        public function encodeJSON(){
            return "{\"id\" : $this->id, \"age\":$this->age,\"gender\":\"$this->gender\", \"height\" : $this->height, \"weight\":$this->weight, \"diet_goal\": $this->diet_goal, \"activity_level\": $this->activity_level, \"cal_limit\": $this->cal_limit, \"exc_goal\": $this->exc_goal}";
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'gender' => 'Gender',
			'age' => 'Age',
			'height' => 'Height',
			'weight' => 'Weight',
			'diet_goal' => 'Diet Goal',
			'activity_level' => 'Activity Level',
			'cal_limit' => 'Cal Limit',
			'exc_goal' => 'Exc Goal',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('height',$this->height);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('diet_goal',$this->diet_goal);
		$criteria->compare('activity_level',$this->activity_level);
		$criteria->compare('cal_limit',$this->cal_limit);
		$criteria->compare('exc_goal',$this->exc_goal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
