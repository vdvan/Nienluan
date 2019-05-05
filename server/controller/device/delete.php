<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/device.class.php';
$deviceClass = new Device;

if (isset($_GET['id'])) {
	$id = intval(trim($_GET['id']));
	$deviceClass->delete($id);
}

header('Location: '. SITE_PATH.'?mod=device');