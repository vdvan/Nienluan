<?php
if ( !defined('WEB') ) die("Access Denied");

$error = array();

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    require_once 'model/account.class.php';
    $accountClass = new Account;

    $_POST['username'] = trim($_POST['username']);
    $_POST['password'] = ($_POST['password']);

    $user = $accountClass->getAccountByUsername($_POST['username']);
    
    if ($user) {
        $passwordCheck = encodePassword($_POST['password']);

        if ($passwordCheck === $user['password']) {
            $_SESSION['user'] = $user;
            header('Location: '.SITE_PATH);

        } else {
            $error['success'] = '<small class="text-danger">Sai mật khẩu</small>';

        }
    } else {
        $error['success'] = '<small class="text-danger">Sai thông tin đăng nhập</small>';

    }
}

require_once 'view/pages/login/login.php';
?>
