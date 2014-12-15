<?php

/**
 * This is the model class for table "ftrack_exercises".
 *
 * The followings are the available columns in table 'ftrack_exercises':
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $user_id
 * @property string $time
 * @property string $exercise
 * @property integer $calories
 */
class Exercises extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ftrack_exercises';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created_at, user_id, time, exercise, calories', 'required'),
            array('calories', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, created_at, updated_at, user_id, time, exercise, calories', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User',
            'time' => 'Time',
            'exercise' => 'Exercise',
            'calories' => 'Calories',
        );
    }
    
    public function encodeJSON(){
        date_default_timezone_set("America/New_York");
        return "{\"id\" : $this->id,\"time\" : \"".date('m/d/Y g:i A', strtotime($this->time))."\", \"exercise\": \"$this->exercise\", \"calories\": $this->calories}";
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('exercise', $this->exercise, true);
        $criteria->compare('calories', $this->calories);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Exercises the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
