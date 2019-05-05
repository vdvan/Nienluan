<?php 

if ( !defined('WEB') ) die("Access Denied");

require_once 'model/device.class.php';
$deviceClass = new Device;

$deviceList = $deviceClass->getList();

require 'view/pages/device/home.php';