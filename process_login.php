<?php
    require 'config/session.php';

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = $_POST['password'];
    if(empty($email)) {
    	redirect_to("login.php");
    }
    $usr = new User();

    $user = $usr->GetUserByEmail($email);
    if(!$user) {
    	if(ajax()) {
    		$output['errors'] = "Email not found.";
    		echo json_encode($output);
    		exit;
    	}
    	else {
    		$_SESSION['message'] = "Email not found.";
    		redirect_to("login.php");
    	}
    }
    else if(password_verify($password, $user['password'])) {
    	$_SESSION['user_id'] = $user['id'];
		$_SESSION['user_name'] = $user['name'];
		$_SESSION['message'] = "Logged in successfully.";
    	if(ajax()) {
    		$output['redirect'] = "forum.php";
    		echo json_encode($output);
    		exit;
    	}
    	else {
    		redirect_to("forum.php");
    	}
    }
    else {
        if(ajax()) {
            $output['errors'] = "Wrong password.";
            echo json_encode($output);
            exit;
        }
        else {
            $_SESSION['message'] = "Wrong password.";
            redirect_to("login.php");
        }
    }
?>