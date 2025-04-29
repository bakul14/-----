<?php
session_start();
if (!$_SESSION['user']) {
	header('Location: login.php');
}
if ($_SESSION['user']['permission'] == "employee") {
	header('Location: elements.php');
}
?>

<html>

<head>
	<meta charset="UTF-8">
	<title>Изделия</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="shortcut icon" href="files/favicon/favicon.ico">

<body>

	<div class="bodycontainer">

		<div class="header">
			<div class="logo">
				<img src="files/img/robotlogored.png" height="100px">
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
				<form target="products_chng.php" METHOD="POST">
					<div class="table">
						<table>
							<tr>
								<td>
									<center>Дата создания
								</td>
								<td>
									<center>Название изделия
								</td>
								<td>
									<center>Состояние изделия
								</td>
								<td>
									<center>Номер операции
								</td>
							</tr>
							<?php
							include "connect.php";
							$id = $_GET['id'];
							$s = oci_parse($c, "SELECT * FROM products WHERE prod_id ='$id'");
							oci_execute($s, OCI_DEFAULT);
							oci_fetch($s);

							echo "<tr><td><input type='text' class='input_chng' name='prod_date' value='" . oci_result($s, "PROD_DATE") . "'></td><td>" .
								"<input type='text' class='input_chng' name='prod_name' value='" . oci_result($s, "PROD_NAME") . "'></td><td>" .
								"<input type='text' class='input_chng' name='prod_condition' value='" . oci_result($s, "PROD_CONDITION") . "'></td>";

							echo "<td><select class='input_chng' name='op_id'>";
							$s2 = oci_parse($c, "SELECT op_id, op_desc FROM operations ORDER BY OP_ID ASC");
							oci_execute($s2, OCI_DEFAULT);
							while (oci_fetch($s2)) {
								if (oci_result($s, "PROD_OP_ID") == oci_result($s2, "OP_ID")) {
									echo "<option selected value=" . oci_result($s2, "OP_ID") . ">" . oci_result($s2, "OP_DESC") . "</option>";
								} else {
									echo "<option value=" . oci_result($s2, "OP_ID") . ">" . oci_result($s2, "OP_DESC") . "</option>";
								}

							}
							echo "</select></td></tr>";

							//    "<td><input type='text' class='input_chng' name='op_id' value='".oci_result($s, "PROD_OP_ID")."'></td></tr>";
							oci_commit($c);
							oci_close($c);
							?>

						</table>
					</div>

					<div class="table_buttons">
						<?php

						if ($id != 0) {
							echo "<input type='submit' value='Изменить' name='change' class='change_table'>";
						} else {
							echo "<input type='submit' value='Добавить' name='change' class='change_table'>";
						}

						$date = $_POST['prod_date'];
						$name = $_POST['prod_name'];
						$condition = $_POST['prod_condition'];
						$op_id = $_POST['op_id'];

						if (isset($_POST['change'])) {
							if ($id != 0) {
								$s = oci_parse($c, "UPDATE products SET prod_date = '$date', prod_name = '$name', prod_condition = '$condition', prod_op_id = '$op_id' WHERE prod_id = '$id' ");
							} else {
								$s = oci_parse($c, "INSERT INTO products (prod_id,prod_date,prod_condition,prod_name, prod_op_id) VALUES (NULL,'$date','$condition','$name','$op_id')");
							}
							oci_execute($s, OCI_DEFAULT);
							oci_commit($c);
							oci_close($c);
							header('Location: products.php');
						}

						?>
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