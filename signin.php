<?php

    session_start();
    include "connect.php";
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    $select="SELECT * FROM users WHERE us_login ='$login' AND us_password ='$password'";

    $check_user = oci_parse($c,$select);
    oci_execute($check_user, OCI_DEFAULT);
    $row=oci_fetch($check_user, OCI_ASSOC);

    if (oci_num_rows($check_user)==1) {
        $_SESSION['user'] = array(
        	"id" => oci_result($check_user, "US_ID")
        	,"permission" => oci_result($check_user, "US_PERMISSION")
        	,"firstname" => oci_result($check_user, "US_FIRSTNAME")
        	,"lastname" => oci_result($check_user, "US_LASTNAME")
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
        //echo oci_num_rows($check_user);
    }
    oci_commit($c);
    oci_close($c);
    
?>
