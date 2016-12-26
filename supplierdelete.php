<?php
include('db_connect.php');
global $mysqli;

$id = $_GET["name"];
$query = "Delete from supplier where Name = '$id'";
if($mysqli->query($query))
	echo 1;
else
	echo 0;
?>