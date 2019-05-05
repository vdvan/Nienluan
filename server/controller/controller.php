<?php 
if ( !defined('WEB') ) die("Access Denied");

$mod = 'home';
if (isset($_GET['mod'])) {
	$mod = strlen(trim($_GET['mod'])) > 0 ? trim($_GET['mod']) : 'home';
}

if ($mod == 'api' && !empty($_GET['token'])) {
	// check token	
	require_once 'model/device.class.php';
	$deviceClass = new Device;
	
	$token = trim($_GET['token']);

	$device = $deviceClass->getDeviceByToken($token);
	if (!$device) $mod = 'login';

} else if (!isset($_SESSION['user']) && $mod != 'login') {
	//header('Location: '.SITE_PATH.'?mod=login');
	$mod = 'login';

} else if (isset($_SESSION['user']) && $mod == 'login') {
	header('Location: '.SITE_PATH);
	//$mod = 'home';
}

$mod_file = 'controller'.DIRECTORY_SEPARATOR.$mod.DIRECTORY_SEPARATOR.'controller.php';

if (!file_exists($mod_file)) {
 	$mod_file = 'controller'.DIRECTORY_SEPARATOR.'home'.DIRECTORY_SEPARATOR.'controller.php';
}

if ($mod == 'login') {
	require $mod_file;

} else {
	$out_html = $mod == 'api' || $mod == 'test_function' ? false : true;

	$SITE_SCRIPTS = '';

	if ($out_html) {
		require 'view/pages/header.php';
		require 'view/pages/sidebar.php';
		require $mod_file;
		require 'view/pages/footer.php';

	} else {
		require $mod_file;
	}
}