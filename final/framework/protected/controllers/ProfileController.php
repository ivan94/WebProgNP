<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileController
 *
 * @author ivan
 */
class ProfileController extends CController{
    public $active_tab = 3;
    public function filters() {
        return array(
            'userInfo + getUserInfo, save',
            array(
                'application.filters.FBAccessTokenFilter + getUserInfo, save',
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
    
    public function actionIndex(){
        $this->render('index');
    }
    
    public function actionGetUserInfo(){
        $id = $_REQUEST['id'];
        $user = Users::model()->findByPk($id);
        
        $resp = "{";
        if($user == null){
            $resp .= "\"new_user\":true}";
        }else{
            $resp .= "\"new_user\":false,";
            $resp .= "\"user\":".$user->encodeJSON();
            $resp .= "}";
        }
        
        echo $resp;
    }
    
    public function actionSave(){
        date_default_timezone_set("America/New_York"); 
        $user = new Users();
        
        $user->isNewRecord = $_REQUEST['new_user'];
        $user->id = $_REQUEST['id'];
        $user->created_at = date("Y-m-d H:i:s");
        $user->gender = $_REQUEST['gender'];
        $user->age = $_REQUEST['age'];
        $user->height = $_REQUEST['height'];
        $user->weight = $_REQUEST['weight'];
        $user->diet_goal = $_REQUEST['diet_goal'];
        $user->activity_level = $_REQUEST['activity_level'];
        $user->cal_limit = $_REQUEST['cal_limit'];
        $user->exc_goal = $_REQUEST['exc_goal'];
        
        $user->save();
        
        $resp = new stdClass();
        if(count($user->getErrors())==0){
            $resp->status = 'success';
            $resp->message = 'User profile successfully saved';
        }else {
            $resp->status = 'fail';
            $resp->errors = $user->getErrors();
        }
        
        echo json_encode($resp);
        
    }
    
}
