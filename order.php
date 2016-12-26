<?php
include('db_connect.php');

if (isset($_POST['call'])) {
	global $mysqli;

	if ($_POST['call'] == "SendOrder") {
		if (QuantityExists($_POST['list']))
			exit('success');
		else
			exit('error');
	} elseif ($_POST['call'] == "SendOrderConfirm") {
		$query = mysqli_query($mysqli, "SELECT * FROM customer WHERE `CID` = $_POST[CustId]");

	    if (mysqli_num_rows($query) == 0)
	    	exit('customer');

		if (!QuantityExists($_POST['list']))
			exit('error');

		$price = 0;

		$query = "INSERT INTO orders (`CID`) VALUES ($_POST[CustId])";
		$result = $mysqli->query($query);
		if (!$result)
			exit('error');
		$i = $mysqli->insert_id;
		foreach ($_POST['list'] as $item) {
			$query = "SELECT price FROM Product WHERE SerialNumber = $item[id]";
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) {
				$price += $row["price"] * $item["count"];
			}

			$query = "INSERT INTO lists (`OrderNumber`, `SerialNumber`, `Quantity`) VALUES ($i, $item[id], $item[count])";

			$result = $mysqli->query($query);
			if (!$result)
				exit('error');

			$query = "SELECT count, warehouseN FROM located_in WHERE SerialNumber = $item[id];";
			$result = $mysqli->query($query);
			$count = $item["count"];

			while ($row = $result->fetch_assoc()) {
				if ($count < $row["count"]){
					$newCount = $row["count"] - $count;
					$count = 0;
					$query = "UPDATE located_in SET `count` = $newCount WHERE SerialNumber = $item[id] AND warehouseN = '$row[warehouseN]';";

					$result = $mysqli->query($query);

					if (!$result)
						exit('error');

					break;
				} else {
					$count -= $row["count"];

					$query = "DELETE FROM located_in WHERE SerialNumber = $item[id] AND warehouseN = $row[warehouseN];";

					$result = $mysqli->query($query);
					if (!$result)
						exit('error');
				}
			}


		}

		echo $price;
		exit();
	}
}

function QuantityExists($list) {
	global $mysqli;

	foreach ($list as $item) {
		$query = "SELECT count FROM located_in WHERE SerialNumber = $item[id];";
		$result = $mysqli->query($query);
		$count = 0;

		while ($row = $result->fetch_assoc()) {
			$count += $row["count"];
		}

		if ($count < $item["count"])
			return false;
	}

	return true;
}
?>