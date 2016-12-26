<?php
$mysqli = new mysqli("localhost","root","","warehouse");
$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$supplier = $_POST["supplier"];
$success = 0;

$query = "INSERT INTO Product (SerialNumber, Name, Price, SName) VALUES('$id', '$name', '$price', '$supplier')";

if ($mysqli->query($query))
	$success = 1;


$query = "SELECT * FROM warehouse";
$result = $mysqli->query($query);
$i=0;
while ($row = $result->fetch_assoc()) {
	$wname = $row["WarehouseName"];
	$quantity =  $_POST["quantity" . $i];
	if (!$quantity)
		$quantity = 0;
	$query = "INSERT INTO located_in (WarehouseN, SerialNumber, Count) VALUES('$wname', '$id', '$quantity')";
	if ($mysqli->query($query))
		$success = 1;
	else 
		$success = 0;
	$i++;
}
echo $success;
?>