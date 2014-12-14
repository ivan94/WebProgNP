<?php
class ExercisesController extends CController{
    public $active_tab = 2;
    public function actionIndex(){
        $this->render('index');
    }
}
