<?php 
if( !defined('WEB') ) die('Access Denied');

function encodePassword($password) {
	$code = 'phanngocaivi';
    return md5($password.$code);
}