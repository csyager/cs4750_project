<?php
	session_start();
	include_once("./library.php");// To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$rid = $_POST['rid'];
	$rating = $_POST['rating'];
	$username = $_SESSION['username'];
	$text = $_POST['text'];

	$sql = "INSERT INTO `comment` (username, rid, text, rating) VALUES ('$username', '$rid', '$text', '$rating')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header("Location: view-restaurant.php?rid=" . $rid);

?>