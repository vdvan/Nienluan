<?php 
if ( !defined('WEB') ) die("Access Denied");

$act = 'login';

if (isset($_GET['act'])) {
	$act = strlen(trim($_GET['act'])) > 0 ? trim($_GET['act']) : 'login';
}

switch ($act) {
	case 'login':
		require 'controller/login/login.php';
		break;

	case 'logout':
		require 'controller/login/logout.php';
		break;

	default:
		break;
}