<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Сотрудники</title>
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
            <form action="employee.php" METHOD="POST">
                <div class="table">
                    <table>
                        <tr>
                            <td><center></td>
                            <td><center>id</td>	
                            <td><center>Фамилия</td>
                            <td><center>Имя</td>
                            <td><center>Отчество</td>
                            <td><center>Должность</td>   
                            <td><center>Права</td>
                            <td><center>Логин</td>
                        </tr>
                        <?php
                        include "connect.php";
                        $s = OCIParse($c, "SELECT * FROM users ORDER BY US_ID DESC");
                        OCIExecute($s, OCI_DEFAULT);
                        $radio=$_POST['radio'];
                        while (OCIFetch($s)) {
                            echo ("<tr><td><input type='radio' name='radio' value='".ociresult($s, "US_ID")."'></td><td>" .
                            	ociresult($s, "US_ID") ."</td><td>" .
                                ociresult($s, "US_LASTNAME") ."</td><td>" .
                                ociresult($s, "US_FIRSTNAME") . "</td>" . "<td>".
                                ociresult($s, "US_SURNAME") . "</td><td>".
                                ociresult($s, "US_POSITION") . "</td><td>".
                                ociresult($s, "US_PERMISSION") . "</td>" .
                                "<td>". ociresult($s, "US_LOGIN" )."</td></tr>");
                        }
                            
                            if(isset($_POST['delete'])){
                            	
                            	$d = OCIParse($c, "DELETE FROM users WHERE US_ID ='$radio'");
                        		OCIExecute($d, OCI_DEFAULT);
                        		header("Refresh:0");

                        		if($_SESSION['user']['id']==$_POST['radio']){
                        			include'logout.php';
                        		}
                            }
                            if(isset($_POST['change'])){

                            	header('Location: employee_chng.php?id='.$radio);

                            }
                        
                        OCICommit($c);
                        // Отключаемся от бд
                        OCILogoff($c);
                        ?>

                    </table>
                </div>

                <div class="table_buttons">
                        <input type="submit" value="Изменить"name="change" class="change_table">
                        <input type="submit" value="Удалить" name="delete" class="change_table">
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