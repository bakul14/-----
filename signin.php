<?php

    session_start();
    include "connect.php";
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    $select="SELECT * FROM users WHERE us_login ='$login' AND us_password ='$password'";

    $check_user = ociparse($c,$select);
    OCIExecute($check_user, OCI_DEFAULT);
    $row=ociFetch($check_user, OCI_ASSOC);

    if (ocirowcount($check_user)==1) {
        $_SESSION['user'] = array(
        	"id" => ociresult($check_user, "US_ID")
        	,"permission" => ociresult($check_user, "US_PERMISSION")
        	,"firstname" => ociresult($check_user, "US_FIRSTNAME")
        	,"lastname" => ociresult($check_user, "US_LASTNAME")
        );
        if($_SESSION['user']['permission']=="admin"){
        	header('Location: reg.php');
        }
        if($_SESSION['user']['permission']=="boss"){
        	header('Location: employee.php');
        }
        if($_SESSION['user']['permission']=="employee"){
        	header('Location: elements.php');
        }
    } 
   else {
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: login.php');
        //echo ocirowcount($check_user);
    }
    OCICommit($c);
    OCILogoff($c);
    
?>
