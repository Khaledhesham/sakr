<?php
include('db_connect.php');
global $mysqli;
$id = $_POST["id"];
$name = $_POST["name"];
$address = $_POST["address"];
$success = 0;

$query = "Update Supplier SET Name='$name', Address='$address' where Name = '$id'";

if ($mysqli->query($query))
	$success = 1;

echo $success;
?>