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
		<title>Комплектующие</title>
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
			            <form target="elements_chng.php" METHOD="POST">
			                <div class="table">
			                    <table>
			                        <tr>
			                        	<td><center>Наименование</td>
			                            <td><center>Номинал</td>
			                            <td><center>Материал</td>
			                            <td><center>Производитель</td>
			                            <td><center>Номер операции</td>
			                        </tr>
			                        <?php
			                        include "connect.php";
			                        $id=$_GET['id'];
			                        $s = OCIParse($c, "SELECT * FROM elements WHERE elem_id ='$id'");
			                        OCIExecute($s, OCI_DEFAULT);
			                        OCIFetch($s);

			                        echo "<tr><td><input type='text' class='input_chng' name='elem_name' value='".ociresult($s, "ELEM_NAME")."'></td><td>" .
			                        	"<input type='text' class='input_chng' name='nominal' value='".ociresult($s, "ELEM_NOMINAL")."'></td><td>".
			                            "<input type='text' class='input_chng' name='type' value='".ociresult($s, "ELEM_TYPE")."'></td><td>".
			                            "<input type='text' class='input_chng' name='provider' value='".ociresult($s, "ELEM_PROVIDER")."'></td>";
										
									echo "<td><select class='input_chng' name='op_id'>";
									$s2 = OCIParse($c, "SELECT op_id, op_desc FROM operations ORDER BY OP_ID ASC");
									OCIExecute($s2, OCI_DEFAULT);
									while (OCIFetch($s2)) {
										if (ociresult($s, "ELEM_OP_ID") == ociresult($s2, "OP_ID")) {
											echo "<option selected value=".ociresult($s2, "OP_ID").">".ociresult($s2, "OP_DESC")."</option>";
										} else {
											echo "<option value=".ociresult($s2, "OP_ID").">".ociresult($s2, "OP_DESC")."</option>";
										}
										
									}
									echo "</select></td></tr>";
									
			                        OCICommit($c);
			                        OCILogoff($c);
			                        ?>

			                    </table>
			                </div>

			                <div class="table_buttons">
			                        <?php

				                        if ($id!=0){
				                       		echo"<input type='submit' value='Изменить' name='change' class='change_table'>";
				                       	}
				                       	else{
				                       		echo"<input type='submit' value='Добавить' name='change' class='change_table'>";
				                       	}

				                       	$elem_name=$_POST['elem_name'];
			                        	$nominal=$_POST['nominal'];
			                            $type=$_POST['type'];
			                            $provider=$_POST['provider'];
			                            $op_id=$_POST['op_id'];

				                        if(isset($_POST['change'])){
				                        	if ($id!=0){
				                            	$s = OCIParse($c, "UPDATE elements SET elem_name = '$elem_name', elem_provider = '$provider', elem_nominal = '$nominal', elem_type = '$type', elem_op_id = '$op_id' WHERE elem_id = '$id' ");
				                        	}
				                        	else{
				                        		$s = OCIParse($c, "INSERT INTO elements (elem_id,elem_name,elem_provider, elem_nominal, elem_type, elem_op_id) VALUES (NULL, '$elem_name','$provider','$nominal', '$type', '$op_id')");
				                        	}
				                            OCIExecute($s, OCI_DEFAULT);
				                            OCICommit($c);
				                            OCILogoff($c);
				                            header('Location: elements.php');
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