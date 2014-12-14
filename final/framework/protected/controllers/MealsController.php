<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FoodController
 *
 * @author ivan
 */
class MealsController extends CController {

    //put your code here

    public $active_tab = 1;
    
    public function filters() {
        return array(
            'userInfo + getUserInfo, saveMeal, deleteMeal',
            array(
                'application.filters.FBAccessTokenFilter + getUserInfo, saveMeal, deleteMeal',
                'access_token' => isset($_REQUEST['access_token'])?$_REQUEST['access_token']:NULL,
                'user_id' => isset($_REQUEST['id'])?$_REQUEST['id']:NULL,
            ),
            'accessControl'
        );
    }
    
    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('saveMeal'),
                'verbs' => array('POST')
            ),
            array(
                'deny',
                'actions' => array('saveMeal'),
                'verbs' => array('*')
            ),
        );
    }

    public function actionIndex() {
        
        $this->render('index');
    }
    
    public function actionGetMealTypes(){
        $model = MealTypes::model()->findAll();
        
        $json = "[";
        foreach ($model as $row){
            $json .= json_encode($row->getAttributes()).",";
        }
        if(count($model) > 0){
            $json = substr($json, 0, strlen($json)-1);
        }
        $json .="]";
        
        echo $json;
    }
    
    public function actionDeleteMeal(){
        $n = Meals::model()->deleteByPk($_REQUEST['meal_id']);
        $resp = new stdClass();
        if($n == 1){
            $resp->status = 'success';
            $resp->message = 'Meal successfully deleted';
        }else{
            $resp->status = 'success';
        }
        echo json_encode($resp);
    }
    
    public function actionTest(){
        date_default_timezone_set("America/New_York");
        echo date("Y-m-d H:i:s", strtotime("12/09/2014 10:13 PM"));
    }

    //Test string: http://cs.newpaltz.edu/~fernandi2/WP2014/final/framework/index.php/meals/saveMeal/?date&names&calories&meal_type[id]=1&id=948221238541310&access_token=CAAWio8yGMicBAAtTp4qpV0LwDWwtKdiJwY2MwBLXaKEMjxsIl8w0Ne6wrCHTYZADINmJZCyF9ZBCMHzpyn0VveUXlNOMbe6sTHqAObQo3pAV87vSAH4VEfShVC4kYmN0QKI0SDH4ZBomHM9rEVmZBZC7VkOwlqTCknnpRZBB8RjUwazs9V3j9DFQh1KrRV94pzbS50XKyOw7oOu54m7Ai3k
    public function actionSaveMeal(){
        date_default_timezone_set("America/New_York"); 
        $meal = new Meals();
        
        if(isset($_REQUEST['meal_id'])){
            $meal->isNewRecord = false;
            $meal->id = $_REQUEST['meal_id'];
        }

        $meal->created_at = date("Y-m-d H:i:s");
        $meal->time = date("Y-m-d H:i:s", strtotime($_REQUEST['date']));
        $meal->user_id = $_REQUEST['id'];
        $meal->meal_type = $_REQUEST['meal_type']['id'];
        $meal->food = $_REQUEST['names'];
        $meal->calories = $_REQUEST['calories'];
        $meal->save();
        
        $resp = new stdClass();
        if(count($meal->getErrors())==0){
            $resp->status = 'success';
            $resp->message = 'Meal successfully saved';
        }else {
            $resp->status = 'fail';
            $resp->errors = $meal->getErrors();
        }
        
        echo json_encode($resp);   
    }
    
    
    public function filterUserInfo($filterChain){
        if(isset($_REQUEST['access_token']) && isset($_REQUEST['id'])){
            $filterChain->run();
        }
    }
    
    public function actionGetUserInfo() {
        $id = $_REQUEST['id'];
        
        $criteria = new CDbCriteria();
        $criteria->condition = "user_id=:ID";
        $criteria->params=array(':ID'=>$id);
        $criteria->order = 'time DESC';
        $criteria->limit = 20;
        $meals = Meals::model()->with('mealType')->findAll($criteria);
        
        $meals = $meals == NULL? array(): $meals;
        
        $json = "{";
        $json_types = array();
        
        $cur_cal = 0;
        $max_cal = 2000;
        foreach($meals as $meal){
            if (!isset($json_types[$meal->mealType->name])) {
                $json_types[$meal->mealType->name] = "";
            }
            $json_types[$meal->mealType->name] .= $meal->encodeJSON().",";
            $cur_cal += $meal->calories;
        }
        
        $json .= "\"cur_calories\":$cur_cal, \"max_calories\":$max_cal,\"meals\":[";
        
        foreach ($json_types as $k => $v){
            $v = substr($v, 0, strlen($v)-1);
            $json .= "{\"type\":\"$k\", \"foods\":[$v]},";
        }
        if(count($json_types) > 0){
            $json = substr($json, 0, strlen($json)-1);
        }
        
        $json .="]}";
        
        echo $json;
    }

}
