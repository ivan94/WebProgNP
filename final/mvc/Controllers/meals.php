<?php

ini_set("display_errors", 1);

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_SERVER['HTTP_METHOD']) ? $_SERVER['HTTP_METHOD'] : 'GET';
$view = null;
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';

$nav = "nav-main.php";
$active_tab = 1;
$model = array();

switch ($action . '_' . $method) {
    case 'create_GET' :
        $view = "meals/create.php";
        break;
    case 'create_POST' :
        break;
    case 'update_POST' :
        $view = "meals/index.php";
        break;
    case 'delete_GET' :
        break;
    case 'delete_POST' :
        $view = "meals/index.php";
        break;
    case 'index_GET' :
    default :
        $model = array('id' => 0, 'cur_calories' => 1000, 'max_calories' => 2000, 'meals' => array( array('type' => 'Breakfast', 'foods' => array( array('date' => '2014-10-19 18:19:44', 'names' => 'Cheese Burguer, French Fries', 'calories' => '637 cal'), array('date' => '2014-11-03 09:30:00', 'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli', 'calories' => '518 cal'), array('date' => '2014-10-19 18:19:44', 'names' => 'Cheese Burguer, French Fries', 'calories' => '637 cal'), array('date' => '2014-11-03 09:30:00', 'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli', 'calories' => '518 cal'), )), array('type' => 'Lunch', 'foods' => array( array('date' => '2014-10-19 18:19:44', 'names' => 'Cheese Burguer, French Fries', 'calories' => '637 cal'), array('date' => '2014-11-03 09:30:00', 'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli', 'calories' => '518 cal'), array('date' => '2014-10-19 18:19:44', 'names' => 'Cheese Burguer, French Fries', 'calories' => '637 cal'), array('date' => '2014-11-03 09:30:00', 'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli', 'calories' => '518 cal'), )), array('type' => 'Dinner', 'foods' => array( array('date' => '2014-10-19 18:19:44', 'names' => 'Cheese Burguer, French Fries', 'calories' => '637 cal'), array('date' => '2014-11-03 09:30:00', 'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli', 'calories' => '518 cal'), array('date' => '2014-10-19 18:19:44', 'names' => 'Cheese Burguer, French Fries', 'calories' => '637 cal'), array('date' => '2014-11-03 09:30:00', 'names' => 'Rice, Beans, Chicken, Mashed Potatoes, Broccoli', 'calories' => '518 cal'), )), ));
        $view = "meals/index.php";
        break;
}

switch ($format) {
    case 'json' :
        echo json_encode($model);
        break;
    case 'plain' :
        include __DIR__ . "/../Views/$view";
        break;
    case 'web' :
    default :
        include __DIR__ . "/../Views/shared/_main_template.php";
        break;
}
