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
<form method="get" action="http://localhost/Database/warehouse.php">
	<div class="input-group">
	    <span class="input-group-addon">Search</span>
	    <input id="msg" type="text" class="form-control" name="search">
	</div>
	<button class="WRAddButton" type="button">Add</button>
</form>
<table class="table table-hover">
<tr>
	<th>Name</th>
	<th>Address</th>
	<th></th>
	<th></th>
</tr>
<?php

include('db_connect.php');
global $mysqli;
if (!isset($_GET["search"]))
	$_GET["search"] = "";
$query = "SELECT * FROM warehouse where WarehouseName like '%$_GET[search]%';";

$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
	?>
	<tr id="<?php echo $row["WarehouseName"]; ?>" class="SupplierRow">
		<td><?php echo $row["WarehouseName"]; ?></td>
		<td><?php echo $row["Address"]; ?></td>
		<td><button class="WREditButton" type="button">Edit</button></td>
		<td><button class="WRDeleteButton" type="button">Delete</button></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>