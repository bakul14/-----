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
    <title>Изменение</title>
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
            <form target="employee_chng.php" METHOD="POST">
                <div class="table">
                    <table>
                        <tr>
                            <td><center>Фамилия</td>
                            <td><center>Имя</td>
                            <td><center>Отчество</td>
                            <td><center>Должность</td>
                            <td><center>Права</td>
                            <td><center>Логин</td>
                        </tr>
                        <?php
                        include "connect.php";
                        $id=$_GET['id'];
                        $s = oci_parse($c, "SELECT * FROM users  WHERE us_id ='$id'");
                        oci_execute($s, OCI_DEFAULT);
                        oci_fetch($s);
                        $adm_rad=" ";
                        $boss_rad=" ";
                        $empl_rad=" ";
                        
                        if(oci_result($s, "US_PERMISSION")=="admin"){
                            $adm_rad="checked";
                        }
                        if(oci_result($s, "US_PERMISSION")=="boss"){
                            $boss_rad="checked";
                        }
                        if(oci_result($s, "US_PERMISSION")=="employee"){
                           $empl_rad="checked"; 
                        }

                        echo ("<tr><td><input type='text' class='input_chng' name='lastname' value='".oci_result($s, "US_LASTNAME")."'></td><td>" .
                            "<input type='text' class='input_chng' name='firstname' value='".oci_result($s, "US_FIRSTNAME")."'></td><td>".
                            "<input type='text' class='input_chng' name='surname' value='".oci_result($s, "US_SURNAME")."'></td><td>".
                            "<input type='text' class='input_chng' name='position' value='".oci_result($s, "US_POSITION")."'></td><td>".
                            "<input type='radio' class='input_chng_radio1' name='permission' value='admin'".$adm_rad."> admin<br>".
                            "<input type='radio' class='input_chng_radio2' name='permission' value='boss'".$boss_rad."> boss<br>".
                            "<input type='radio' class='input_chng_radio3' name='permission' value='employee'".$empl_rad."> employee<br>"."</td><td>".
                            "<input type='text' class='input_chng' name='login' value='".oci_result($s, "US_LOGIN")."'></td></tr>");
                        oci_commit($c);
                        oci_close($c);
                        ?>

                    </table>
                </div>

                <div class="table_buttons">
                        <input type="submit" value="Изменить" name="change" class="change_table">
                        <?php

                        if(isset($_POST['change'])){
                            include"connect.php";
                            $lastname=$_POST['lastname'];
                            $firstname=$_POST['firstname'];
                            $surname=$_POST['surname'];
                            $position=$_POST['position'];
                            $permission=$_POST['permission'];
                            $login=$_POST['login'];
                            $s = oci_parse($c, "UPDATE users SET us_lastname = '$lastname', us_firstname = '$firstname', us_surname = '$surname', us_permission = '$permission', us_login = '$login', us_position = '$position' WHERE us_id = '$id' ");
                            oci_execute($s, OCI_DEFAULT);
                            oci_commit($c);
                            oci_close($c);
                            if($_SESSION['user']['id']==$id){
                                $_SESSION['user']['lastname']=$lastname;
                                $_SESSION['user']['firstname']=$firstname;
                                $_SESSION['user']['permission']=$permission;
                            }
                            header('Location: employee.php');
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