<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/device.class.php';
$deviceClass = new Device;
$deviceList = $deviceClass->getList();

require_once 'model/relay.class.php';
$relayClass = new Relay;

$id = intval(trim($_GET['id']));
$relay = $relayClass->getItem($id);

if (isset($_POST['action'])) {
	$relayClass->update($_POST['relay_name'], $_POST['device_id'], $_POST['pin'], $_POST['id']);
	header('Location: '. SITE_PATH.'?mod=relay');
}

require 'view/pages/relay/update.php';