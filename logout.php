<?php
	session_start();

	if(isset($_SESSION['logged_in'])) {
		unset($_SESSION['logged_in']);
	}

	if(isset($_SESSION['logged_in_user'])) {
		unset($_SESSION['logged_in_user']);
	}
	
	if(isset($_SESSION['logged_in_user_id'])) {
		unset($_SESSION['logged_in_user_id']);
	}
	
	if(isset($_SESSION['logged_in_user_access'])) {
		unset($_SESSION['logged_in_user_access']);
	}
	
	if(isset($_SESSION['logged_in_user_fn'])) {
		unset($_SESSION['logged_in_user_fn']);
	}
	
	if(isset($_SESSION['logged_in_user_ln'])) {
		unset($_SESSION['logged_in_user_ln']);
	}
	
	header("Location: home.php");
?>