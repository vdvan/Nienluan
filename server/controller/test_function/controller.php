<?php 
if ( !defined('WEB') ) die("Access Denied");

$act = 'home';

if (isset($_GET['act'])) {
	$act = strlen(trim($_GET['act'])) > 0 ? trim($_GET['act']) : 'home';
}

switch ($act) {
	case 'home':
		require 'controller/test_function/home.php';
		break;

	default:
		break;
}