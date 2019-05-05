<?php 

if ( !defined('WEB') ) die('Access Denied');

if (isset($_GET['id']) && isset($_GET['status'])) {
	$id = intval(trim($_GET['id']));
	$st = intval(trim($_GET['status']));

	if ($st != 1 && $st != 0) die('2');


	require 'model/relay.class.php';
	$relayClass = new Relay;
	if ($relayClass->updateStatus($id, $st)) {
		echo '1';
	} else {
		echo '0';
	}
} else {
	echo '2';
}