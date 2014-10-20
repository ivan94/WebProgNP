<?php
ini_set("display_errors", 1);


$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_SERVER['HTTP_METHOD']) ? $_SERVER['HTTP_METHOD'] : 'GET';
$view = null;
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';

switch ($action . '_' . $method) {
	case 'create_GET':
		
		break;
	case 'create_POST':
		
		break;
	case 'update_GET':
			
		break;
	case 'update_POST':
		
		break;
	case 'delete_GET':
		
		break;
	case 'delete_POST':
		
		break;
	case 'index_GET':
	default:
		
		break;
}

echo '<pre>';
print_r($action);
//print_r($_ENV);
print_r($format);
echo '</pre>';
