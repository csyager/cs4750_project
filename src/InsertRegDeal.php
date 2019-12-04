<?php
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$URL="dealadded.php";

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Form the SQL query (an INSERT query)$
	$sql="INSERT INTO `regularDeal` (item_name, description, cost, rid, recurs_when)
	VALUES('$_POST[name]','$_POST[desc]','$_POST[cost]', '$_POST[rid]', '$_POST[recurs_when]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

	header ("Location: $URL");
?>
