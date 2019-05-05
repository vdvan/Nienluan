<?php 
if ( !defined('WEB') ) die("Access Denied");

$act = 'insert';

if (isset($_GET['act'])) {
	$act = strlen(trim($_GET['act'])) > 0 ? trim($_GET['act']) : 'insert';
}

switch ($act) {
	case 'get-status':
		require 'controller/api/get_status.php';
		break;

	case 'update':
		require 'controller/api/update.php';
		break;

	default:
		break;
}