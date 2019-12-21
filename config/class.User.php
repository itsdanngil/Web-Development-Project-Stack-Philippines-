<?php
	class User {
		protected $_conn;

		public function __construct() {
			$db = Database::GetInstance();
			$this->_conn = $db->GetConnection();
			return $this;
		}

		public function GetUserByEmail($email) {
			$e = $this->_conn->quote($email);
			$query  = "SELECT * FROM users WHERE email = {$e}";
			$result = $this->_conn->query($query);
			if ($result->rowCount() > 0) {
				return $result->fetch(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
	}
?>