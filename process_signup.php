<?php
	require 'config/session.php';
	$db = Database::GetInstance();
	$conn = $db->GetConnection();

	$output = array();
	$name = isset($_POST['display_name']) ? ucwords($_POST['display_name']) : '';
	if(empty($name)) {
		redirect_to("signup.php");
	}
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeat_password = $_POST['repeat_password'];
	if ($password == $repeat_password) {
		$query  = "INSERT INTO users (name, email, password) ";
		$query .= "VALUES (?,?,?);";
		$res = $conn->prepare($query);

		$data = array(
			$name,
			$email,
			password_hash($password, PASSWORD_BCRYPT, ['cost' => 8])
		);
		if($res->execute($data)) {
			$user = new User();
			$reg = $user->GetUserByEmail($email);
			$_SESSION['user_id'] = $reg['id'];
			$_SESSION['user_name'] = $reg['name'];
			$_SESSION['message'] = htmlentities($name) . ' registered successfully.';
			if (ajax()) {
				$output['redirect'] = 'forum.php';
				echo json_encode($output);
				exit;
			}
			else {
				redirect_to("forum.php");
			}
		}
	}
	else {
		if(ajax()) {
			$output['errors'] = 'Passwords do not match.';
			echo json_encode($output);
			exit;
		}
		else {
			$_SESSION['message'] = 'Passwords do not match.';
			redirect("signup.php");
		}
	}
?>