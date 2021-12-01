<?php
	
	include __DIR__.'/../../constants/settings.php'; 

	if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['shortText']) && !empty($_POST['shortText']) && isset($_POST['content']) && !empty($_POST['content'])) {
		
		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);
		if ($_POST['id'] == null) {
			$query = 'INSERT INTO articles (nameArticles, shortText, content) VALUES ("'.$_POST['name'].'","'.$_POST['shortText'].'","'.$_POST['content'].'")';
		}
		else {
			$query = 'UPDATE articles SET nameArticles = "'.$_POST['name'].'", shortText = "'.$_POST['shortText'].'", content = "'.$_POST['content'].'" WHERE id = '.$_POST['id'];
		}
		

		mysqli_query($conn, $query);
		header("Location: /admin/articles.php");
		

	}

	function get_articles_for_admin() {
		
		if ($_GET['id'] != null && $_GET['action'] == 'update') {

			global $servername;
			global $database;
			global $username;
			global $password;

			$conn = mysqli_connect($servername, $username, $password, $database);

			$query = "SELECT nameArticles, shortText, content, id FROM articles WHERE id = ".$_GET['id'];
			$result = mysqli_query($conn, $query);
			$data = $result->fetch_row();
			return $data;
		} 
	}

	if ($_GET['action'] == 'delete') {
		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);

		$query = 'DELETE FROM articles WHERE id='.$_GET['id'];
		mysqli_query($conn, $query);
		header("Location: /admin/articles.php");
		
	}
?>