<?php
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$URL="http://cs4750.cs.virginia.edu/~shp8xb/goodeats/restaurantadded.html";
	
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// Form the SQL query (an INSERT query)
	$sql="INSERT INTO `restaurants` (address, name, rid)
	VALUES('$_POST[address]','$_POST[name]','$_POST[rid]')";
	
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
	
	header ("Location: $URL");
?>