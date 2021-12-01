
<?php
	session_start();

	include __DIR__.'/../../constants/settings.php';

	if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
		$login = $_POST['login'];
		$user_password = $_POST['password'];
		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);
		$query = 'SELECT * FROM auth WHERE login = "'.$login.'" AND password = "'.md5($user_password).'" OR telephone = "'.$login.'" AND password = "'.md5($user_password).'"';
		$result = mysqli_query($conn, $query);
		$data = $result->fetch_row();
		if ($data != null) {
			$_SESSION['is_auth'] = true;
			$_SESSION['user_name'] = $data[3];	
		}
		header("Location: /admin");	
}

?>



