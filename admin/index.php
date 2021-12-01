<?php session_start(); ?>
<?php include __DIR__.'/functions/auth.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/admin/css/style.css">
	<title>Admin</title>
</head>
<body>
	<?php if(isset($_SESSION['is_auth']) and $_SESSION['is_auth'] == true) {?>
	<div class="content">
		<div class="hed"><?php echo $_SESSION['user_name'] ?> <a href="/admin/functions/logout.php">Выйти</a></div>
		<div class="modules">
			<ul>
				<li><a href="/admin/articles.php">Статьи</a></li>
				<li><a href=""></a></li>
				<li><a href=""></a></li>
			</ul>
		</div>
	</div>
	<?php } else { ?>
	<div class="content">
		<form action="/admin/" method="POST">
			<input type="text" placeholder="Введите логин или номер телефона" name="login"><br>
			<input type="password" placeholder="Введите пароль" name="password"><br>
			<input type="submit" value="Войти"><br>
		</form>
	</div>
	<?php } ?>
</body>
</html>