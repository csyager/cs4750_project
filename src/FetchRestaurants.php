<?php
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$URL="http://cs4750.cs.virginia.edu/~shp8xb/goodeats/";
	
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// Form the SQL query (an INSERT query)
	$sql="SELECT name, address FROM `restaurants`";
	
	echo "Hello World";
		
	$result = mysqli_query($con,$sql)
	
	echo "Hello World";
	
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	

	
	while($row = mysqli_fetch_assoc($result)) {
		echo"<h3>{$row['name']}</h3>";
		echo"<p>{$row['address']}</p>";
		echo"<p>?/5 rating (0 reviews)</p>";
	}
	
	mysqli_close($con);
	
	// header ("Location: $URL");
?>