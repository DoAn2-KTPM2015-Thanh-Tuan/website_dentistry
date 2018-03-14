<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	class Database {
		public static $db;
		public static $dsn = 'mysql:host=localhost;dbname=website_dentistry';
		public static $username = 'root';
		public static $passwd = '';

		public static function connect() {

			if (!isset(self::$db)) {
				try {
					self::$db = new PDO(self::$dsn, self::$username, self::$passwd);
					self::$db->exec('set names utf8');
				} catch (PDOException $err) {
					echo $err->getMessage();
					echo "loi database";
					return $err->getMessage();
				}
				return self::$db;
			}
		}
		public static function db_close()
	    {
	        return self::$db = null;
	    }
	}
?>
