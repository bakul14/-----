<?php
session_start();
if (!$_SESSION['user']) {
	header('Location: login.php');
}
?>

<html>

<head>
	<meta charset="UTF-8">
	<title>Операции</title>
	<link rel="stylesheet" href="css/main.css">
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

					<?php
					if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss") {
						echo "<li><a href=" . "employee.php" . ">Сотрудники</a></li>";
					}
					?>
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
				<form action="operations.php" METHOD="POST">
					<div class="table">
						<table>
							<tr>
								<?php
								if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss") {
									echo "<td><center></td>";
								}
								?>
								<td>
									<center>id
								</td>
								<td>
									<center>Название операции
								</td>
								<td>
									<center>Описание операции
								</td>
								<td>
									<center>Тип операции
								</td>
								<td>
									<center>Стоимость операции
								</td>
								<td>
									<center>Длительность операции
								</td>
								<td>
									<center>Должность Сотрудника
								</td>
							</tr>
							<?php
							include "connect.php";
							$s = oci_parse($c, "SELECT * FROM operations ORDER BY OP_ID");
							oci_execute($s, OCI_DEFAULT);
							$radio = $_POST['radio'];
							while (oci_fetch($s)) {

								if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss") {
									echo ("<tr><td><input type='radio' name='radio' value='" . oci_result($s, "OP_ID") . "'></td><td>" .
										oci_result($s, "OP_ID") . "</td><td>" .
										oci_result($s, "OP_NAME") . "</td><td>" .
										oci_result($s, "OP_DESC") . "</td><td>" .
										oci_result($s, "OP_TYPE") . "</td><td>" .
										oci_result($s, "OP_COST") . "</td><td>" .
										oci_result($s, "OP_DUR") . "</td><td>" .
										oci_result($s, "OP_US_POSITION") . "</td></tr>");
								} else {
									echo ("<tr><td>" .
									oci_result($s, "OP_ID") . "</td><td>" .
									oci_result($s, "OP_NAME") . "</td><td>" .
									oci_result($s, "OP_DESC") . "</td><td>" .
										oci_result($s, "OP_TYPE") . "</td><td>" .
										oci_result($s, "OP_COST") . "</td><td>" .
										oci_result($s, "OP_DUR") . "</td><td>" .
										oci_result($s, "OP_US_POSITION") . "</td></tr>");
								}
							}
							if (isset($_POST['add'])) {

								header('Location: operations_chng.php');

							}

							if (isset($_POST['delete'])) {

								$d = oci_parse($c, "DELETE FROM operations WHERE op_id ='$radio'");
								oci_execute($d, OCI_DEFAULT);
								header("Refresh:0");

							}
							if (isset($_POST['change'])) {

								header('Location: operations_chng.php?id=' . $radio);

							}

							oci_commit($c);
							// Отключаемся от бд
							oci_close($c);
							?>
					</div>
					<tr>
						<?php if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss") {
							echo ("<td></td>");
						}
						?>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Σ =
							<?php
							include "connect.php";
							$s = oci_parse($c, "SELECT SUM (op_cost) FROM operations");
							oci_execute($s, OCI_DEFAULT);
							while (oci_fetch($s)) {
								echo (oci_result($s, 1));
							}
							oci_commit($c);
							oci_close($c);

							?>
						</td>
						<td>Σ =
							<?php
							include "connect.php";
							$s = oci_parse($c, "SELECT SUM (op_dur) FROM operations");
							oci_execute($s, OCI_DEFAULT);
							while (oci_fetch($s)) {
								echo (oci_result($s, 1));
							}
							oci_commit($c);
							oci_close($c);

							?>
						</td>
						<td></td>
					</tr>
					</table>
			</div>
			<div class="table_buttons">

				<?php
				if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss") {
					echo "<input type='submit' value='Добавить'name='add' class='change_table'>";
					echo "<input type='submit' value='Изменить'name='change' class='change_table'>";
					echo "<input type='submit' value='Удалить' name='delete' class='change_table'>";
				}
				?>

				<a href="pdf/create_pdf.php" class="change_table" style="line-height: 30px;">PDF</a>
			</div>
			</FORM>

		</div>
	</div>

	<div class="footer">
		<div class="footermenu"></div>
		<div class="footertext">Two-digit counter corp.</div>
	</div>
	</div>

</body>

</html>