<?php
class ExercisesController extends CController{
    public $active_tab = 2;
    
    public function actionIndex(){
        $this->render('index');
    }
    
    public function filters() {
        return array(
            'userInfo + getUserInfo, save, delete',
            array(
                'application.filters.FBAccessTokenFilter + getUserInfo, save, delete',
                'access_token' => isset($_REQUEST['access_token'])?$_REQUEST['access_token']:NULL,
                'user_id' => isset($_REQUEST['id'])?$_REQUEST['id']:NULL,
            ),
        );
    }
    
    public function filterUserInfo($filterChain){
        if(isset($_REQUEST['access_token']) && isset($_REQUEST['id'])){
            $filterChain->run();
        }
    }
    
    public function actionGetUserInfo(){
        date_default_timezone_set("America/New_York");
        $id = $_REQUEST['id'];
        
        $user = Users::model()->findByPk($id);
        
        $criteria = new CDbCriteria();
        $criteria->condition = "user_id=:ID";
        $criteria->params=array(':ID'=>$id);
        $criteria->order = 'time DESC';
        $criteria->limit = 20;        
        $exercises = Exercises::model()->findAll($criteria);
        
        
        $json = "{";
        $json_types = array();
        
        if($user == null){
            $json .= "\"new_user\":true,";
        }else{
            $json .= "\"new_user\":false,";
        }
        
        $cur_cal = 0;
        $max_cal = $user != null? $user->exc_goal:1000;
        
        foreach ($exercises as $exercise){
            if(date('m/d/Y', strtotime($exercise->time)) == date('m/d/Y')){
                $cur_cal += $exercise->calories;
            }
        }
        
        $json .= "\"cur_calories\":$cur_cal, \"exc_goal\":$max_cal,\"exercises\":[";
        
        foreach ($exercises as $exercise){
            $json .= $exercise->encodeJSON().",";
        }
        
        if(count($exercises) > 0){
            $json = substr($json, 0, strlen($json)-1);
        }
        
        $json .="]}";
        
        echo $json;
    }
    
    public function actionSave(){
        date_default_timezone_set("America/New_York"); 
        $exercise = new Exercises();
        
        if(isset($_REQUEST['exercise_id'])){
            $exercise->isNewRecord = false;
            $exercise->id = $_REQUEST['exercise_id'];
        }

        $exercise->created_at = date("Y-m-d H:i:s");
        $exercise->time = date("Y-m-d H:i:s", strtotime($_REQUEST['time']));
        $exercise->user_id = $_REQUEST['id'];
        $exercise->exercise = $_REQUEST['exercise'];
        $exercise->calories = $_REQUEST['calories'];
        $exercise->save();
        
        $resp = new stdClass();
        if(count($exercise->getErrors())==0){
            $resp->status = 'success';
            $resp->message = 'Exercise successfully saved';
        }else {
            $resp->status = 'fail';
            $resp->errors = $exercise->getErrors();
        }
        
        echo json_encode($resp);   
    }
    
    public function actionDelete(){
        $n = Exercises::model()->deleteByPk($_REQUEST['exercise_id']);
        $resp = new stdClass();
        if($n == 1){
            $resp->status = 'success';
            $resp->message = 'Exercise successfully deleted';
        }else{
            $resp->status = 'success';
        }
        echo json_encode($resp);
    }
}
