<?php 
if ( !defined('WEB') ) die("Access Denied");

$act = 'home';

if (isset($_GET['act'])) {
	$act = strlen(trim($_GET['act'])) > 0 ? trim($_GET['act']) : 'home';
}

switch ($act) {
	case 'home':
		require 'controller/device/home.php';
		break;

	case 'insert':
		require 'controller/device/insert.php';
		break;

	case 'update':
		require 'controller/device/update.php';
		break;

	case 'delete':
		require 'controller/device/delete.php';
		break;

	default:
		break;
}