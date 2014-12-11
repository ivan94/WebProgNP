<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteController
 *
 * @author ivan
 */
class SiteController extends CController{
    public function actionIndex(){
        $this->redirect(Yii::app()->createUrl("meals"));
    }
}
