<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/relay.class.php';
$relayClass = new Relay;

$relayList = $relayClass->getList();

require 'view/pages/relay/home.php';