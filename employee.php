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
    <title>Сотрудники</title>
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
                <form action="employee.php" METHOD="POST">
                    <div class="table">
                        <table>
                            <tr>
                                <td>
                                    <center>
                                </td>
                                <td>
                                    <center>id
                                </td>
                                <td>
                                    <center>Фамилия
                                </td>
                                <td>
                                    <center>Имя
                                </td>
                                <td>
                                    <center>Отчество
                                </td>
                                <td>
                                    <center>Должность
                                </td>
                                <td>
                                    <center>Права
                                </td>
                                <td>
                                    <center>Логин
                                </td>
                            </tr>
                            <?php
                            include "connect.php";
                            $s = oci_parse($c, "SELECT * FROM users ORDER BY US_ID ASC");
                            oci_execute($s, OCI_DEFAULT);
                            $radio = $_POST['radio'];
                            while (oci_fetch($s)) {
                                echo ("<tr><td><input type='radio' name='radio' value='" . oci_result($s, "US_ID") . "'></td><td>" .
                                    oci_result($s, "US_ID") . "</td><td>" .
                                    oci_result($s, "US_LASTNAME") . "</td><td>" .
                                    oci_result($s, "US_FIRSTNAME") . "</td>" . "<td>" .
                                    oci_result($s, "US_SURNAME") . "</td><td>" .
                                    oci_result($s, "US_POSITION") . "</td><td>" .
                                    oci_result($s, "US_PERMISSION") . "</td>" .
                                    "<td>" . oci_result($s, "US_LOGIN") . "</td></tr>");
                            }

                            if (isset($_POST['delete'])) {

                                $d = oci_parse($c, "DELETE FROM users WHERE US_ID ='$radio'");
                                oci_execute($d, OCI_DEFAULT);
                                header("Refresh:0");

                                if ($_SESSION['user']['id'] == $_POST['radio']) {
                                    include 'logout.php';
                                }
                            }
                            if (isset($_POST['change'])) {

                                header('Location: employee_chng.php?id=' . $radio);

                            }

                            oci_commit($c);
                            // Отключаемся от бд
                            oci_close($c);
                            ?>

                        </table>
                    </div>

                    <div class="table_buttons">
                        <input type="submit" value="Изменить" name="change" class="change_table">
                        <input type="submit" value="Удалить" name="delete" class="change_table">
                    </div>
                </FORM>

            </div>

        </div>
        <div class="footer">
            <div class="footermenu"></div>
            <div class="footertext">(c) Two-digit counter corp.</div>
        </div>
    </div>

</body>

</html>