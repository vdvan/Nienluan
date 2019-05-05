<?php 

if ( !defined('WEB') ) die("Access Denied");

require 'model/relay.class.php';

$relayClass = new Relay;

$relayList = $relayClass->getList();

$SITE_SCRIPTS = '<script src="'.SITE_PATH.'/view/scripts/control.js"></script>';
require 'view/pages/home/home.php';