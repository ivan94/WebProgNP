<?php

ini_set("display_errors", 1);

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_SERVER['HTTP_METHOD']) ? $_SERVER['HTTP_METHOD'] : 'GET';
$view = null;
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';

$nav = "nav-cover.php";

switch ($action . '_' . $method) {
	case 'create_POST':
		break;
	case 'update_POST':
		$view = "cover/index.php";
		break;
	case 'delete_GET':
		break;
	case 'delete_POST':
		$view = "cover/index.php";
		break;
	case 'index_GET':
	default:
		$view = "cover/index.php";
		break;
}

switch ($format) {
	case 'json':
		//	To be implemented
		break;
	case 'plain':
		include __DIR__ . "/../Views/$view";		
		break;		
	case 'web':
	default:
		include __DIR__ . "/../Views/shared/_main_template.php";		
		break;
}