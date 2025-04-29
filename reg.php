<?php
session_start();
if (!$_SESSION['user']) {
	header('Location: login.php');
} else if ($_SESSION['user']['permission'] != "admin") {
	if ($_SESSION['user']['permission'] = "employee") {
		header('Location: operations.php');
	}
	if ($_SESSION['user']['permission'] = "boss") {
		header('Location: employee.php');
	}
}
?>

<html>

<head>
	<meta charset="UTF-8">
	<title>Создание пользователя</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/reg.css">
	<link rel="shortcut icon" href="files/favicon/favicon.ico">

<body>

	<div class="bodycontainer">

		<div class="header">
			<div class="logo">
				<img src="files/img/logocolor.png" height="100px">
			</div>

			<div class="headprofile">
				<form>
					<p>Имя: <?php echo $_SESSION['user']['firstname']; ?></p>
					<p>Права: <?php echo $_SESSION['user']['permission']; ?></p>
					<p><a href="logout.php" class="exit_button">Выход</a></p>
				</form>
			</div>

		</div>

		<div class="middlecontainer">
			<div class="menu">
				<ul class="menu">
					<li><a href="employee.php">Сотрудники</a></li>
					<li><a href="operations.php">Операции</a></li>
					<li><a href="elements.php">Комплектующие</a></li>
					<li><a href="equipment.php">Оборудование</a></li>
					<li><a href="products.php">Изделия</a></li>
					<?php
					if ($_SESSION['user']['permission'] == "admin") {
						echo "<li><a href=" . "reg.php" . ">Создание пользователя</a></li>";
					}
					?>

				</ul>
			</div>
			<div class="content">

				<div class="reg">
					<form action="signup.php" method="post" enctype="multipart/form-data">
						<label>Фамилия</label><br>
						<input type="text" name="lastname" placeholder="Введите фамилию"><br>
						<label>Имя</label><br>
						<input type="text" name="firstname" placeholder="Введите имя"><br>
						<label>Отчество</label><br>
						<input type="text" name="surname" placeholder="Введите отчество"><br>
						<label>Права</label><br>
						<div class="radioreg">
							<input type="radio" name="permission" value="admin"> admin<br>
							<input type="radio" name="permission" value="boss"> boss<br>
							<input type="radio" name="permission" value="employee"> employee<br>
						</div>
						<label>Логин</label><br>
						<input type="text" name="login" placeholder="Введите логин"><br>
						<label>Пароль</label><br>
						<input type="password" name="password" placeholder="Введите пароль"><br>
						<label>Подтверждение пароля</label><br>
						<input type="password" name="password_confirm" placeholder="Подтвердите пароль"><br>
						<button type="submit">Зарегистрировать пользователя</button>

						<?php
						include 'connect.php';
						if (!empty($_SESSION['message']) && $_SESSION['message'] == 'Пароль введен некорркетно!' || $_SESSION['message'] == 'Логин введен некорректно!' || $_SESSION['message'] == 'Пользователь существует!' || $_SESSION['message'] == 'Неверный логин или пароль!' || $_SESSION['message'] == 'Имя введено некорректно!') {
							echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
							unset($_SESSION['message']);
						}
						if (!empty($_SESSION['message']) && $_SESSION['message'] == 'Регистрация прошла успешно!') {
							echo '<p class="msg_green"> ' . $_SESSION['message'] . ' </p>';
							unset($_SESSION['message']);
						}
						unset($_SESSION['message']);
						?>

					</form>
				</div>

			</div>
		</div>
		<div class="footer">
			<div class="footermenu"></div>
			<div class="footertext">Two-digit counter corp.</div>
		</div>
	</div>

</body>

</html>