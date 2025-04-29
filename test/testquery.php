<?php
$res="result";
$query="<input type='text' value='".oci_result($s, "US_FIRSTNAME")."'>";
echo $query;
?>