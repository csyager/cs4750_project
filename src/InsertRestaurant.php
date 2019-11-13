<?php
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$URL="restaurantadded.php";

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$fetch_sql="SELECT rid FROM `restaurants`";
	$result=mysqli_query($con,$fetch_sql);
	if (!$result){
		echo "Something went wrong when retrieving the results.";
		die('Error: ' . mysqli_error($con));
	}

	$rid = 0;

	while($row = mysqli_fetch_assoc($result)) {
		if ($row["rid"] > $rid)
		$rid = $row["rid"];
	}

	$rid = $rid + 1;

	// Form the SQL query (an INSERT query)$
	$sql="INSERT INTO `restaurants` (address, name, rid)
	VALUES('$_POST[address]','$_POST[name]','$rid')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

	header ("Location: $URL");
?>
