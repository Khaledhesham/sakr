<?php
include('db_connect.php');
global $mysqli;

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$supplier = $_POST["supplier"];
$success = 0;

$query = "Update Product SET Name='$name',Price='$price', SName = '$supplier' where SerialNumber = $id";

if ($mysqli->query($query))
	$success = 1;


$query = "SELECT * FROM warehouse";
$result = $mysqli->query($query);
$i=0;
while ($row = $result->fetch_assoc()) {
	$wname = $row["WarehouseName"];
	$quantity =  $_POST["quantity" . $i];
	$query = "Update located_in SET Count = '$quantity' WHERE WarehouseN = '$wname' AND SerialNumber = '$id'";
	if ($mysqli->query($query))
		$success = 1;
	else {
		$success = 0;
		break;
	}
	$i++;
}
echo $success;
?>