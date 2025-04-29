<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($c = OCILogon("SCOTT", "TIGER", "orcl","AL32UTF8")) {
   //echo "Successfully connected to Oracle.\n";
} 
else {
    $err = OCIError();
    echo "Oracle Connect Error " . $err['message'];
}
?>