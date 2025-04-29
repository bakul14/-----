<?php
session_start();

    if (isset($_SESSION['user'])) {
        header('Location: operations.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="files/favicon/favicon.ico">
</head>
<body>
	<div class="login">
		<img src="files/img/logo.png" width="400" height="300">
	    <form action="signin.php" method="post">
	        <label>Логин</label>
	        <input type="text" name="login" placeholder="Введите логин">
	        <label>Пароль</label>
	        <input type="password" name="password" placeholder="Введите пароль">
	        <button type="submit">Войти</button>

	        <?php
                if (!empty($_SESSION['message']) && $_SESSION['message']=='Неверный логин или пароль!') {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                    unset($_SESSION['message']);
                }
	        ?>
	    </form>
	</div>
<footer>
    Two-digit counter corp.
</footer>

</body>
</html>