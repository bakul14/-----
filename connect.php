<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($c = oci_connect("MISHA", "MISHA", "sql_server.g", "AL32UTF8")) {
    echo "Successfully connected to Oracle.\n";
} else {
    $err = oci_error();
    echo "Oracle Connect Error " . $err['message'];
}
?>