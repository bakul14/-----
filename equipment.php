<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Оборудование</title>
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
		                <li><a href="elements.php">Комплектующие</a></li>
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
				<form action="equipment.php" METHOD="POST">
				                <div class="table">
				                    <table>
				                        <tr>
				                            <?php 
			               						if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss"){
			                    					echo "<td><center></td>"; 
							                    }
							                ?>
				                            <td><center>id</td>
				                            <td><center>Название оборудования</td>
				                            <td><center>Тип оборудования</td>
				                            <td><center>Номер операции</td>
				                        </tr>
				                        <?php
				                        include "connect.php";
				                        $s = OCIParse($c, "SELECT * FROM equipment ORDER BY equip_id ASC");
				                        OCIExecute($s, OCI_DEFAULT);
	                       				$radio=$_POST['radio'];
				                        while (OCIFetch($s)) {

				                        	if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss"){
					                            echo ("<tr><td><input type='radio' name='radio' value='".ociresult($s, "EQUIP_ID")."'></td><td>" .
					                                ociresult($s, "EQUIP_ID") ."</td><td>" .
					                                ociresult($s, "EQUIP_NAME") . "</td><td>".
					                                ociresult($s, "EQUIP_TYPE") . "</td><td>". 
					                                ociresult($s, "EQUIP_OP_ID" )."</td></tr>");
				                        	}
				                        	else{
				                        		echo ("<tr><td>" .
					                                ociresult($s, "EQUIP_ID") ."</td><td>" .
					                                ociresult($s, "EQUIP_NAME") . "</td><td>".
					                                ociresult($s, "EQUIP_TYPE") . "</td><td>". 
					                                ociresult($s, "EQUIP_OP_ID" )."</td></tr>");
				                        	}
				                        }

				                        	if(isset($_POST['add'])){
	                            	
	                            				header('Location: equipment_chng.php');

	                            			}
				                            
				                            if(isset($_POST['delete'])){
				                            	
				                            	$d = OCIParse($c, "DELETE FROM equipment WHERE equip_id ='$radio'");
				                        		OCIExecute($d, OCI_DEFAULT);
				                        		header("Refresh:0");
				                            }

				                            if(isset($_POST['change'])){

				                            	header('Location: equipment_chng.php?id='.$radio);

				                            }
				                        
				                        OCICommit($c);
				                        // Отключаемся от бд
				                        OCILogoff($c);
				                        ?>

				                    </table>
				                </div>

				                <div class="table_buttons">
				                								
									<?php
								    	if ($_SESSION['user']['permission'] == "admin" || $_SESSION['user']['permission'] == "boss"){
								       		echo "<input type='submit' value='Добавить'name='add' class='change_table'>";
								       		echo "<input type='submit' value='Изменить'name='change' class='change_table'>";
								       		echo "<input type='submit' value='Удалить' name='delete' class='change_table'>";
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