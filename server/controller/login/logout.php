<?php
    if ( !defined('WEB') ) die("Access Denied");

    unset($_SESSION['user']);
    header('Location: '.SITE_PATH);
?>
