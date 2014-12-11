<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FBAccessTokenFilter
 *
 * @author ivan
 */
class FBAccessTokenFilter extends CFilter {
    public $access_token;
    public $user_id;
    
    public function preFilter($filterChain) {
        $respJSON = file_get_contents("https://graph.facebook.com/debug_token?input_token=$this->access_token&access_token=".Yii::app()->params['fb_app_id']."|".Yii::app()->params['fb_app_secret']."");
        $response = json_decode($respJSON);
        
        return isset($response->data) && isset($response->data->is_valid) && $response->data->is_valid && $response->data->user_id = $this->user_id;
    }
    
}
