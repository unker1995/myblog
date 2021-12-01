<?php

	include __DIR__.'/../constants/settings.php';

	function get_menu() {
		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);
		$query = "SELECT * FROM menu";
		$result = mysqli_query($conn, $query);
		$data = $result->fetch_all();
		return $data;
	}


?>
