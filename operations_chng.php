<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
if ($_SESSION['user']['permission'] == "employee"){
    header('Location: elements.php');
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
						<p>Имя: <?php echo $_SESSION['user']['firstname'];?></p>
	        			<p>Права: <?php echo $_SESSION['user']['permission'];?></p>
	       				<p><a href="logout.php" class="exit_button">Выход</a></p>
       				</form>
				</div>

			</div>

			<div class="middlecontainer">
				<div class="menu">
					<ul class="menu">

		               <?php 
		                    if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss"){
		                        echo "<li><a href="."employee.php".">Сотрудники</a></li>"; 
		                    }
		                ?>
						<li><a href="operations.php">Операции</a></li>
						<li><a href="elements.php">Комплетующие</a></li>
						<li><a href="equipment.php">Оборудование</a></li>
						<li><a href="products.php">Изделия</a></li>
						<?php
						    if ($_SESSION['user']['permission'] == "admin"){
						        echo"<li><a href="."reg.php".">Создание пользователя</a></li>";
						    }
						?>

					</ul>
				</div>
				<div class="content">
			            <form target="opertions_chng.php" METHOD="POST">
			                <div class="table">
			                    <table>
			                        <tr>
	                            		<td><center>Название операции</td>
		                            	<td><center>Описание операции</td>
		                            	<td><center>Тип операции</td>
			                            <td><center>Стоимость операции</td>
			                            <td><center>Длительность операции</td>
			                            <td><center>Должность Сотрудника</td>
			                        </tr>
			                        <?php
			                        include "connect.php";
			                        $id=$_GET['id'];
			                        $s = oci_parse($c, "SELECT * FROM operations WHERE op_id ='$id'");
			                        oci_execute($s, OCI_DEFAULT);
			                        oci_fetch($s);

			                        echo ("<tr><td><input type='text' class='input_chng' name='opname' value='".oci_result($s, "OP_NAME")."'></td><td>" .
			                            "<input type='text' class='input_chng' name='opdesc' value='".oci_result($s, "OP_DESC")."'></td><td>".
			                            "<input type='text' class='input_chng' name='optype' value='".oci_result($s, "OP_TYPE")."'></td><td>".
			                            "<input type='text' class='input_chng' name='opcost' value='".oci_result($s, "OP_COST")."'></td><td>".
			                            "<input type='text' class='input_chng' name='opdur' value='".oci_result($s, "OP_DUR")."'></td>");
									
									echo "<td><select class='input_chng' name='opuspos'>";
									$s2 = oci_parse($c, "SELECT us_position FROM users ORDER BY US_ID ASC");
									oci_execute($s2, OCI_DEFAULT);
									while (oci_fetch($s2)) {
										if (oci_result($s, "OP_US_POSITION") == oci_result($s2, "US_POSITION")) {
											echo "<option selected>".oci_result($s2, "US_POSITION")."</option>";
										} else {
											echo "<option>".oci_result($s2, "US_POSITION")."</option>";
										}
										
									}
									
									echo "</select></td></tr>";
									//echo "<input type='text' class='input_chng' name='opuspos' value='".oci_result($s, "OP_US_POSITION")."'></td></tr>";
			                        oci_commit($c);
			                        oci_close($c);
			                        ?>

			                    </table>
			                </div>

			                <div class="table_buttons">
			                        <?php

				                        if ($id != 0){
				                       		echo"<input type='submit' value='Изменить' name='change' class='change_table'>";
				                       	}
				                       	else{
				                       		echo"<input type='submit' value='Добавить' name='change' class='change_table'>";
				                       	}
				                       	
				                       	$opname = $_POST['opname'];
				                       	$opdesc = $_POST['opdesc'];
				                       	$optype = $_POST['optype'];
				                       	$opcost = $_POST['opcost'];
				                       	$opdur = $_POST['opdur'];
				                       	$opuspos = $_POST['opuspos'];

				                        if(isset($_POST['change'])){
				                        	if ($id != 0){
				                            	$s = oci_parse($c, "UPDATE operations SET op_cost = '$opcost', op_dur = '$opdur', op_name = '$opname', op_desc = '$opdesc', op_type = '$optype', op_us_position = '$opuspos' WHERE op_id = '$id' ");
				                        	}
				                        	else{
				                        		$s = oci_parse($c, "INSERT INTO operations (op_id, op_cost, op_dur, op_name,
				                        		 op_desc, op_type, op_us_position) VALUES (NULL, '$opcost', '$opdur', '$opname', 
				                        		 '$opdesc', '$optype', '$opuspos')");
				                        	}
				                            oci_execute($s, OCI_DEFAULT);
				                            oci_commit($c);
				                            oci_close($c);
				                            header('Location: operations.php');
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