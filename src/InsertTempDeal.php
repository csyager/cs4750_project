<?php
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$URL="dealadded.php";

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Form the SQL query (an INSERT query)$
	$sql="INSERT INTO `tempDiscount` (item_name, description, cost, rid, start_date, end_date)
	VALUES('$_POST[name]','$_POST[desc]','$_POST[cost]', '$_POST[rid]', '$_POST[start]', '$_POST[end]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

	header ("Location: $URL");
?>
