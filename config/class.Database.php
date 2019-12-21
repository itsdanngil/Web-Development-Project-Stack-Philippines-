<?php
	class Database {
		protected $_conn;
		protected static $_instance;

		public function __construct() {
			$this->_conn = new PDO("mysql:host=127.0.0.1;dbname=stackph","stackph","stackph");
			$this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$this->_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
    		return $this;
		}

		public static function GetInstance() {
			if (!self::$_instance) {
				self::$_instance = new Self();
			}
			return self::$_instance;
		}

		public function GetConnection() {
			return $this->_conn;
		}
	}
?>