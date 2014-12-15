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
class SiteController extends CController {

    public $active_tab = 0;

    public function filters() {
        return array(
            'userInfo + getUserInfo, save, delete',
            array(
                'application.filters.FBAccessTokenFilter + getUserInfo, save, delete',
                'access_token' => isset($_REQUEST['access_token']) ? $_REQUEST['access_token'] : NULL,
                'user_id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL,
            ),
        );
    }

    public function filterUserInfo($filterChain) {
        if (isset($_REQUEST['access_token']) && isset($_REQUEST['id'])) {
            $filterChain->run();
        }
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionGetUserInfo() {
        date_default_timezone_set("America/New_York");
        $id = $_REQUEST['id'];

        $user = Users::model()->findByPk($id);

        $resp = new stdClass();
        $resp->new_user = $user == null;
        if (!$resp->new_user) {
            $resp->user = $user->getAttributes();

            $criteria = new CDbCriteria();
            $criteria->condition = "user_id=:ID";
            $criteria->params = array(':ID' => $id);
            $criteria->order = 'time DESC';
            $meals = Meals::model()->with('mealType')->findAll($criteria);
            $exercises = Exercises::model()->findAll($criteria);

            $resp->meals = array();
            $resp->exercises = array();
            $resp->cur_cal_intake = 0;
            $resp->cur_cal_spent = 0;

            $avg_consumed = array();
            $avg_spent = array();
            $resp->avg_per_meal = 0;

            foreach ($meals as $meal) {
                $attr = $meal->getAttributes();
                $attr['meal_type'] = $meal->mealType->name;
                $attr['time'] = date('m/d/Y g:i A', strtotime($meal->time));

                $resp->avg_per_meal += $meal->calories;

                $day = date('m/d/Y', strtotime($meal->time));
                if (!isset($avg_consumed[$day])) {
                    $avg_consumed[$day] = 0;
                }
                $avg_consumed[$day] += $meal->calories;
                if(date('m/d/Y', strtotime($meal->time)) == date('m/d/Y')){
                    $resp->cur_cal_intake += $meal->calories;
                }

                $resp->meals[] = $attr;
            }

            $resp->avg_per_meal = count($meals) == 0 ? 0 : $resp->avg_per_meal / count($meals);

            foreach ($exercises as $exercise) {
                $attr = $exercise->getAttributes();
                $attr['time'] = date('m/d/Y g:i A', strtotime($exercise->time));

                $day = date('m/d/Y', strtotime($exercise->time));
                if (!isset($avg_spent[$day])) {
                    $avg_spent[$day] = 0;
                }
                $avg_spent[$day] += $exercise->calories;
                
                if(date('m/d/Y', strtotime($exercise->time)) == date('m/d/Y')){
                    $resp->cur_cal_spent += $exercise->calories;
                }

                $resp->exercises[] = $attr;
            }

            $resp->avg_consumed = 0;
            foreach ($avg_consumed as $k => $v) {
                $resp->avg_consumed += $v;
            }
            $resp->avg_consumed = count($avg_consumed) == 0 ? 0 : $resp->avg_consumed / count($avg_consumed);

            $resp->avg_spent = 0;
            foreach ($avg_spent as $k => $v) {
                $resp->avg_spent += $v;
            }
            $resp->avg_spent = count($avg_spent) == 0 ? 0 : $resp->avg_spent / count($avg_spent);
        }
        echo json_encode($resp);
    }

}
