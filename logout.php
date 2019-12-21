<?php
	require 'config/session.php';

	if (ajax()) {
		if (isset($_SESSION['user_id']) && isset($_GET['auth']) && $_GET['auth'] == 'logout') {
			unset($_SESSION['user_id']);
			unset($_SESSION['user_name']);
			$_SESSION['message'] = "You have logged out.";
			$output['redirect'] = 'login.php';
			echo json_encode($output);
			exit;
		}
	}
	else {
		if (isset($_SESSION['user_id'])) {
			unset($_SESSION['user_id']);
			unset($_SESSION['user_name']);
			$_SESSION['message'] = "You have logged out.";
			redirect_to("login.php");
		}
	}
?>