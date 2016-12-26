<?php
$mysqli = new mysqli("localhost","root","","warehouse");
$id = $_GET["id"];
$query = "Delete FROM product where SerialNumber = $id";
if($mysqli->query($query))
	echo 1;
else
	echo 0;
?>