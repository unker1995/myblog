<?php include __DIR__."/../functions/articles.php";?>
<?php include __DIR__."/functions/insert-article.php";?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/admin/css/style.css">
	<title>Admin</title>
</head>
<body>
	<div>
		<span>Избенко Дмитрий Викторович</span>
		<a href="/admin/">Выйти</a>
	</div>
	<div>
		<table>
			<tr>
				<th>id</th>
				<th>Название статьи</th>
				<th>Дата публикации</th>
				<th>Сокращенный текст</th>
				<th colspan="2">Опции</th>
			</tr>	
			<?php
				$article = get_articles();
				foreach ($article as $value) {
					echo '<tr>';
							echo '<td>'.$value[0].'</td>';
							echo '<td>'.$value[1].'</td>';
							echo '<td>'.$value[2].'</td>';
							echo '<td>'.$value[3].'</td>';
							echo '<td><a href="articles.php/?action=update&id='.$value[0].'"><img src="/../assets/img/png/pencil-striped-symbol-for-interface-edit-buttons_icon-icons.com_56782.png" alt="Р"></a></td>';
							echo '<td><a href="articles.php/?action=delete&id='.$value[0].'"><img src="/../assets/img/png/cancel-cross_icon-icons.com_71726.png" alt="Х"></a></td>';	
						echo '</tr>';
				}

			php?>
		</table>					
	</div>
	<br>
	<br>
	<div>
		<form action="/admin/articles.php" method="post">
		<?php
			$data = get_articles_for_admin();
			echo '<input type="text" name="name" placeholder="Название статьи" value="'.$data[0].'"><br><br>';
			echo '<input type="text" name="shortText" placeholder="Сокращенный текст статьи" value="'.$data[1].'"><br><br>';
			echo '<textarea name="content" placeholder="Полный текст статьи">'.$data[2].'</textarea><br><br>';
			echo '<input type="hidden" name="id" value="'.$data[3].'">';
		?>
			<input type="submit" value="Сохранить"><br><br>
		</form>
	</div>	
</body>
</html>