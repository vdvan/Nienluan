<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/relay.class.php';
$relayClass = new Relay;

if (isset($_GET['id'])) {
	$id = intval(trim($_GET['id']));
	$relayClass->delete($id);
}

header('Location: '. SITE_PATH.'?mod=relay');