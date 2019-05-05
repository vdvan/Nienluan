
<?php 
define('WEB', TRUE);

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
ob_start();

require 'inc/inc.php';

require 'library/function.php';

require 'model/database.class.php';

require 'controller/controller.php';

ob_flush();