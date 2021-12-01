<?php

	include __DIR__.'/../constants/settings.php'; 

	function get_articles() {

		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);

		$query =<<< SQL
		SELECT id, nameArticles, dateArticle, shortText, content
		FROM articles
		ORDER BY dateArticle DESC
SQL;
		$result = mysqli_query($conn, $query);
		$data = $result->fetch_all();

		return $data;
	}


	function get_article() {

		global $servername;
		global $database;
		global $username;
		global $password;
		$conn = mysqli_connect($servername, $username, $password, $database);
		$query = "SELECT nameArticles, dateArticle, content FROM articles WHERE id = ".$_GET['id'];
		$result = mysqli_query($conn, $query);
		$data = $result->fetch_row();

		return $data;
	}
?>