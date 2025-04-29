<?php

    session_start();
    include "connect.php";

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $lastname = $_POST['lastname'];
    $permission = $_POST['permission'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $countfio = strlen($firstname);
    $countlogin = strlen($login);
    if ($countfio !=0 && $countfio<40){
        if ($countlogin !=0 && $countlogin<20){
            if ($password === $password_confirm && !empty($password) && !empty($password_confirm)) {

                $select="SELECT * FROM users WHERE us_login = '$login'";

                $check_user = ociParse($c,$select);
                OCIExecute($check_user, OCI_DEFAULT);
                $row=ociFetch($check_user, OCI_ASSOC);

                    if($login == $row['US_LOGIN']){
                        $_SESSION['message'] = 'Пользователь существует!';
                        header('Location: reg.php'); 
                    }
                    else{
                        $password = md5($password);

                        $s = OCIParse($c, "INSERT INTO users (us_id, us_login, us_password, us_permission, us_firstname, us_surname, us_lastname, us_position) VALUES (NULL, '$login', '$password', '$permission', '$firstname', '$surname', '$lastname',NULL)");

                        OCIExecute($s, OCI_DEFAULT);
                        $_SESSION['message'] = 'Регистрация прошла успешно!';
                        header('Location: reg.php');
                    } 
            }
            else{
                $_SESSION['message'] = 'Пароль введен некорркетно!';
                header('Location: reg.php');
            }
        }
        else{
            $_SESSION['message'] = 'Логин введен некорректно!';
                header('Location: reg.php');
        }
    }
    else{
        $_SESSION['message'] = 'Имя введено некорректно!';
                header('Location: reg.php');
    }
    OCICommit($c);
    OCILogoff($c);
?>
