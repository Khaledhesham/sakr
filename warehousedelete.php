<?php
$mysqli = new mysqli("localhost","root","","warehouse");
$id = $_GET["name"];
$query = "Delete from warehouse where WarehouseName = '$id'";
if($mysqli->query($query))
	echo 1;
else
	echo 0;
?>