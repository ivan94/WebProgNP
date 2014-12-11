<?php

/**
 * This is the model class for table "ftrack_meals".
 *
 * The followings are the available columns in table 'ftrack_meals':
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $time
 * @property integer $user_id
 * @property integer $meal_type
 * @property string $food
 * @property integer $calories
 *
 * The followings are the available model relations:
 * @property FtrackMealType $mealType
 */
class Meals extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'ftrack_meals';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created_at, updated_at, time, user_id, meal_type, food, calories', 'required'),
            array('meal_type, calories', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, created_at, updated_at, time, user_id, meal_type, food, calories', 'safe', 'on'=>'search'),
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
            'mealType' => array(self::BELONGS_TO, 'MealTypes', 'meal_type'),
        );
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
            'time' => 'Time',
            'user_id' => 'User',
            'meal_type' => 'Meal Type',
            'food' => 'Food',
            'calories' => 'Calories',
        );
    }
    
    public function encodeJSON(){
        date_default_timezone_set("America/New_York");
        return "{\"id\" : $this->id, \"meal_type\": \"$this->meal_type\",\"date\" : \"".date('m/d/Y g:i A', strtotime($this->time))."\", \"names\": \"$this->food\", \"calories\": $this->calories}";
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

        $criteria->compare('id',$this->id);
        $criteria->compare('created_at',$this->created_at,true);
        $criteria->compare('updated_at',$this->updated_at,true);
        $criteria->compare('time',$this->time,true);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('meal_type',$this->meal_type);
        $criteria->compare('food',$this->food,true);
        $criteria->compare('calories',$this->calories);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Meals the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
