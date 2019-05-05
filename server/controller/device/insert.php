<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/device.class.php';
$deviceClass = new Device;

if (isset($_POST['action'])) {
	$token = md5(uniqid(rand(), true));
	$deviceClass->insert($_POST['device_name'], $token);
	header('Location: '. SITE_PATH.'?mod=device');
}

require 'view/pages/device/insert.php';