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
            'userInfo + getUserInfo, saveMeal',
            array(
                'application.filters.FBAccessTokenFilter + getUserInfo, saveMeal',
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
        $json = substr($json, 0, strlen($json)-1);
        $json .="]";
        
        echo $json;
    }
    
    public function actionSaveMeal(){
        echo var_dump($_POST);
    }
    
    
    public function filterUserInfo($filterChain){
        if(isset($_REQUEST['access_token']) && isset($_REQUEST['id'])){
            $filterChain->run();
        }
    }
    
    public function actionGetUserInfo() {
        $id = $_REQUEST['id'];
        
        $meals = Meals::model()->with('mealType')->findAll("user_id=:ID", array(':ID'=>$id));
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
        if(count($json_types) > 0)
            $json = substr($json, 0, strlen($json)-1);
        
        $json .="]}";
        
        echo $json;
    }

}
