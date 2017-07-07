<?php // index.php?page=CONTROLLER&action=METHOD
require_once('autoload.php');
$design = new Design();
/*
 * Get page request and params
 * Searching for page and action
 * @params bool
 **/
$page = $_GET['page'] ?? "home";
$action = $_GET['action'] ?? "index"; //$id = $func->_int($_GET['id']);

$design = new Design();
switch($page)
{
	case "words":
		$obj = new Words($action, $design);
		break;
	case "home":
	 default:
		$obj = new Homepage("index", $design);
		break;
}

$obj->design->display();