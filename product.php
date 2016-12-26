<!DOCTYPE html>
<html>
<head>
<title>ALUSAKR</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<div class="row">

<form method="get" action="http://localhost/Database/product.php">
	<div class="input-group">
	    <span class="input-group-addon">Search</span>
	    <input id="msg" type="text" class="form-control" name="search">
	</div>
	<button class="AddButton" type="button">Add</button>
</form>
<table class="table table-hover">
<tr>
	<th>#</th>
	<th>Name</th>
	<th>Supplier</th>
	<th>Price</th>
	<th>Quantity</th>
	<th></th>
</tr>
<?php

$mysqli = new mysqli("localhost","root","","warehouse");
if (!isset($_GET["search"]))
	$_GET["search"] = "";
$query = "SELECT * FROM product where name like '%$_GET[search]%';";

$result = $mysqli->query($query);
$sakr = array();
while ($row = $result->fetch_assoc()) {
	$query = "select count,WarehouseN from located_in INNER JOIN warehouse ON located_in.warehouseN = warehouse.WarehouseName where serialnumber = $row[SerialNumber];";
	$resultt = $mysqli->query($query);
	$count = 0;
	$i = 0;
	while ($roww = $resultt->fetch_assoc()) {
		$sakr[$row["Name"]][$i] = $roww;
		$count += $roww["count"];
		$i++;
	}
	$str = "";
	if ($count == 0)
		$str = "ProductNotExist";
	?>
	<tr id="<?php echo $row["SerialNumber"]; ?>" class="ProductRow <?php echo $str; ?>">
		<td data-toggle="modal" data-target="#<?php echo $row["Name"]; ?>"><?php echo $row["SerialNumber"]; ?></td>
		<td id="name" data-toggle="modal" data-target="#<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></td>
		<td data-toggle="modal" data-target="#<?php echo $row["Name"]; ?>"><?php echo $row["SName"]; ?></td>
		<td data-toggle="modal" data-target="#<?php echo $row["Name"]; ?>"><?php echo $row["Price"]; ?></td>
		<td data-toggle="modal" data-target="#<?php echo $row["Name"]; ?>"><?php echo $count; ?></td>
		<td><button class="EditButton" type="button">Edit</button></td>
		<td><button class="DeleteButton" type="button">Delete</button></td>
	</tr>
<?php
}
?>
</table>
</div>
</body>
</html>