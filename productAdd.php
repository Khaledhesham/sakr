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
<form id="khaledform" method="post" action="pr.php">
	<div class="form-group">
	  <label for="id">ID:</label>
	  <input type="text" class="form-control" id="id" name="id">
	</div>
	<div class="form-group">
	  <label for="name">Name:</label>
	  <input type="text" class="form-control" id="name" name="name">
	</div>
	<div class="form-group">
	  <label for="price">Price:</label>
	  <input type="text" class="form-control" id="price" name="price">
	</div>
	<div class="form-group">
	  <label for="supplier">Supplier:</label>
	  <select class="form-control" id="supplier" name="supplier">
	  	<?php 
include('db_connect.php');
global $mysqli;

		  	$query = "SELECT * FROM Supplier";
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) {
	  	?>
	    <option><?php echo $row["Name"]?></option>
	  	<?php } ?>
	  </select>
	</div>
	<?php 
	  	$query = "SELECT * FROM warehouse";
		$result = $mysqli->query($query);
		$i=0;
		while ($row = $result->fetch_assoc()) {
  	?>
  	<div class="form-group">
	  <label for="quantity"><?php echo $row["WarehouseName"] ?> quantity:</label>
	  <input type="text" class="form-control" id="quantity" name="quantity<?php echo $i ?>">
	</div>
  	<?php $i++; } ?>
  	<div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        Submit
      </button>
    </div>
</form>
</body>
</html>