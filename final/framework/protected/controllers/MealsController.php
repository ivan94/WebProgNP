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

    public function actionIndex() {
        $this->render('index');
    }

    public function actionGet() {
        $model = array(
            'id' => 0,
            'cur_calories' => 1000,
            'max_calories' => 2000,
            'meals' => array(
                array(
                    'type' => 'Breakfast',
                    'foods' => array(
                        array(
                            'date' => '2014-10-19 18:19:44',
                            'names' => 'Cheese Burguer, French Fries',
                            'calories' => '637 cal'
                        ),
                        array(
                            'date' => '2014-11-03 09:30:00',
                            'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli',
                            'calories' => '518 cal'
                        ),
                        array(
                            'date' => '2014-10-19 18:19:44',
                            'names' => 'Cheese Burguer, French Fries',
                            'calories' => '637 cal'
                        ),
                        array(
                            'date' => '2014-11-03 09:30:00',
                            'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli',
                            'calories' => '518 cal'
                        ),
                    ),
                ),
                array(
                    'type' => 'Lunch',
                    'foods' => array(
                        array(
                            'date' => '2014-10-19 18:19:44',
                            'names' => 'Cheese Burguer, French Fries',
                            'calories' => '637 cal'
                        ),
                        array(
                            'date' => '2014-11-03 09:30:00',
                            'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli',
                            'calories' => '518 cal'
                        ),
                        array(
                            'date' => '2014-10-19 18:19:44',
                            'names' => 'Cheese Burguer, French Fries',
                            'calories' => '637 cal'
                        ),
                        array(
                            'date' => '2014-11-03 09:30:00',
                            'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli',
                            'calories' => '518 cal'
                        ),
                    ),
                ),
                array('type' => 'Dinner', 'foods' =>
                    array(
                        array(
                            'date' => '2014-10-19 18:19:44',
                            'names' => 'Cheese Burguer, French Fries',
                            'calories' => '637 cal'
                        ),
                        array(
                            'date' => '2014-11-03 09:30:00',
                            'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli',
                            'calories' => '518 cal'
                        ),
                        array(
                            'date' => '2014-10-19 18:19:44',
                            'names' => 'Cheese Burguer, French Fries',
                            'calories' => '637 cal'
                        ),
                        array(
                            'date' => '2014-11-03 09:30:00',
                            'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli',
                            'calories' => '518 cal'
                        ),
                    ),
                ),
            ),
        );
        
        echo json_encode($model);
    }

}
