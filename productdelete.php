<?php
include('db_connect.php');
global $mysqli;

$id = $_GET["id"];
$query = "Delete FROM product where SerialNumber = $id";
if($mysqli->query($query))
	echo 1;
else
	echo 0;
?>