<?php

class LoginController extends CController{
    public function actionIndex(){
        $this->layout = 'login';
        $this->render('index');
    }
}

