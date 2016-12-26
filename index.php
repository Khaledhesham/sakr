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
<div class="col-sm-9">
<form method="get" action="http://localhost/Database/index.php">
	<div class="input-group">
	    <span class="input-group-addon">Search</span>
	    <input id="msg" type="text" class="form-control" name="search">
	</div>
	<button class="CRAddButton" type="button">Add</button>
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
		<td><button class="AddButton" type="button">Add to List</button></td>
	</tr>
<?php
}
?>
</table>
<?php foreach ($sakr as $key=> $value) { ?>

<div id="<?php echo $key ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $key ?></h4>
      </div>
      <div class="modal-body">
      	<?php foreach ($value as $k=> $array) { ?>
        <p>it exists in <?php echo $array["WarehouseN"] ?> with a quantity of <?php echo $array["count"] ?></p>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
<!-- #es7a_llkalam @5lsana -->
  </div>
</div>
<?php } ?>
</div>
<div class="col-sm-3 sakr">
	
    <button type="button" id="OrderSendBtn" class="btn btn-default">Order</button>
</div>
</div>
</body>
</html>