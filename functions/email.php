
<?php

	include __DIR__.'/../constants/settings.php';

	if ($_POST['email'] != null && strpos($_POST['email'], '@') === true) {
		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);
		$query = "INSERT INTO mail(mail) VALUES ('".$_POST['email']."')";
		mysqli_query($conn, $query);
		mail($email, "Привет", "Дорова2Э");
	}

?>