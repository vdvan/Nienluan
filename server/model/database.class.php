<?php 

if ( !defined('WEB') ) die("Access Denied");

class Database {
	private static $db = null;

	function __construct() { }

	public static function getDB() {
		if (self::$db === null) {
			// connect database
			$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
			try {
				self::$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
							  DB_USERNAME,
							  DB_PASSWORD,
							  $options);
			} catch(PDOException $e) {
				echo '(Model) '.$e->getMessage();
			}

			return self::$db;
		} else {
			return self::$db;
		}
	}
}