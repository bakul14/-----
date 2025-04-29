<?php

$array = array(
	"foo" => "bar",
	"bar" => "foo",
);
echo $array["foo"];
?>

<?php
session_start();
$_SESSION['user'] = array(
	"id" => "1dfdf"
	,
	"permission" => "2"
	,
	"firstname" => "3"
	,
	"lastname" => "4"
);
echo $_SESSION["user"]["id"];
?>