<?php
	session_start();
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$URL="restaurantadded.php";
	$URLinvalid="index.php";

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

	if(!isset($_GET['rid']))
	{
		header ("Location: $URLinvalid");
	}
	$rid = $_GET['rid'];

	// Form the SQL query (an INSERT query)$
	$sql='UPDATE `restaurants`
	SET address ="' . $_POST[address] . '", name = "' . $_POST[name] . '"
	WHERE rid ="' . $_GET['rid'] . '"';

	// echo $sql;

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

	header ("Location: $URL");
?>
