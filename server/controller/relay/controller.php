<?php 
if ( !defined('WEB') ) die("Access Denied");

$act = 'home';

if (isset($_GET['act'])) {
	$act = strlen(trim($_GET['act'])) > 0 ? trim($_GET['act']) : 'home';
}

switch ($act) {
	case 'home':
		require 'controller/relay/home.php';
		break;

	case 'insert':
		require 'controller/relay/insert.php';
		break;

	case 'update':
		require 'controller/relay/update.php';
		break;

	case 'delete':
		require 'controller/relay/delete.php';
		break;

	default:
		break;
}