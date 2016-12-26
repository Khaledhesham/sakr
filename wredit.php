<?php
include('db_connect.php');
global $mysqli;

$id = $_POST["id"];
$name = $_POST["name"];
$address = $_POST["address"];
$success = 0;

$query = "Update Warehouse SET WarehouseName='$name', Address='$address' where WarehouseName = '$id'";

if ($mysqli->query($query))
	$success = 1;

echo $success;
?>