<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/device.class.php';
$deviceClass = new Device;

$id = intval(trim($_GET['id']));
$device = $deviceClass->getDeviceById($id);

if (isset($_POST['action'])) {
	$deviceClass->update($_POST['device_name'], $_POST['id']);
	header('Location: '. SITE_PATH.'?mod=device');
}

require 'view/pages/device/update.php';