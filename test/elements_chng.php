<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
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
					<img src="files/img/robotlogored.png" height="100px">
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
						<li><a href="employee.php">Сотрудники</a></li>
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
			                        $s = oci_parse($c, "SELECT * FROM elements WHERE elem_id ='$id'");
			                        oci_execute($s, OCI_DEFAULT);
			                        oci_fetch($s);

			                        echo ("<tr><td><input type='text' class='input_chng' name='elem_name' value='".oci_result($s, "ELEM_NAME")."'></td><td>" .
			                        	"<input type='text' class='input_chng' name='nominal' value='".oci_result($s, "ELEM_NOMINAL")."'></td><td>".
			                            "<input type='text' class='input_chng' name='type' value='".oci_result($s, "ELEM_TYPE")."'></td><td>".
			                            "<input type='text' class='input_chng' name='provider' value='".oci_result($s, "ELEM_PROVIDER")."'></td><td>".
			                            "<input type='text' class='input_chng' name='op_id' value='".oci_result($s, "ELEM_OP_ID")."'></td></tr>");
			                        oci_commit($c);
			                        oci_close($c);
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
				                            	$s = oci_parse($c, "UPDATE elements SET elem_name = '$elem_name', elem_provider = '$provider', elem_nominal = '$nominal', elem_type = '$type', elem_op_id = '$op_id' WHERE elem_id = '$id' ");
				                        	}
				                        	else{
				                        		$s = oci_parse($c, "INSERT INTO elements (elem_id,elem_name,elem_provider, elem_nominal, elem_type, elem_op_id) VALUES (NULL, '$elem_name','$provider','$nominal', '$type', '$op_id')");
				                        	}
				                            oci_execute($s, OCI_DEFAULT);
				                            oci_commit($c);
				                            oci_close($c);
				                            header('Location: elements.php');
				                        }

			                        ?>
			                </div>
			            </FORM>

			</div>
		</div>
			<div class="footer">
				<div class="footermenu"></div>
				<div class="footertext">(c) Kenchadze Ilya IU4-81</div>
			</div>
		</div>

	</body>

</html>