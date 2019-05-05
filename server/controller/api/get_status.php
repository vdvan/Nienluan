<?php 

if ( !defined('WEB') ) die('Access Denied');

require_once 'model/relay.class.php';

$relayClass = new Relay;

$relayStatus = $relayClass->getRelayListByDeviceId($device['id']);

$result = '';
foreach($relayStatus as $relay) {
	$result .= $relay['pin'] . '-' . $relay['status'] . '#';
}
$result = substr($result, 0, strlen($result) - 1) . '$';

echo $result;