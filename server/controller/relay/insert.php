<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/device.class.php';
$deviceClass = new Device;

require_once 'model/relay.class.php';
$relayClass = new Relay;

$deviceList = $deviceClass->getList();

if (isset($_POST['action'])) {
	$relayClass->insert($_POST['relay_name'], $_POST['device_id'], $_POST['pin']);
	header('Location: '. SITE_PATH.'?mod=relay');
}

require 'view/pages/relay/insert.php';