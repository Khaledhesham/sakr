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
<form id="khaledform" method="post" action="cr.php">
	<div class="form-group">
	  <label for="name">Name:</label>
	  <input type="text" class="form-control" id="name" name="name">
	</div>
	<div class="form-group">
	  <label for="address">Address:</label>
	  <input type="text" class="form-control" id="address" name="address">
	</div>
	<div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        Submit
      </button>
    </div>
</form>
</body>
</html>