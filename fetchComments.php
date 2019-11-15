<?php
	session_start();
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$rid = $_GET['rid'];

	$sql = "INSERT INTO comment('username', 'rid', 'text', 'rating') VALUES ($username, $rid, $text, $rating)";
	$result=mysqli_query($con,$sql);
	header("Location: view-restaurant.php?rid=" . $rid);
?>