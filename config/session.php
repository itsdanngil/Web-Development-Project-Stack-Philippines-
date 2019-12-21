<?php
	session_start();
	date_default_timezone_set('Asia/Manila');

	function __autoload($class_name) {
		require 'class.' . $class_name . '.php';
	}

	function message() {
		if(isset($_SESSION['message'])) {
			$output = $_SESSION['message'];
			unset($_SESSION['message']);
			return $output;
		}
		else {
			return "&nbsp;";
		}
	}

	function redirect_to($location) {
		header("Location: " . $location);
		exit;
	}
	
	function ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	}
?>