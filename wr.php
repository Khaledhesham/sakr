<?php
include('db_connect.php');
global $mysqli;
$address = $_POST["address"];
$name = $_POST["name"];
$success = 0;

$query = "INSERT INTO Warehouse (WarehouseName, Address) VALUES('$name', '$address')";

if ($mysqli->query($query))
	$success = 1;

echo $success;
?>