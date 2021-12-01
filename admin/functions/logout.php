<?php
	session_start();
	
	unset($_SESSION['is_auth']);
	unset($_SESSION['user_name']);
	header("Location: /admin/");

?>