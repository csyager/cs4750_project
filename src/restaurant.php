<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Good Eats</title>
		<link href="https://fonts.googleapis.com/css?family=Caveat|Montserrat:400,600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<main>
			<header>
			    <div class="content-wrap">
					<div class="black-box">
						<h1>Good Eats</h1>
						<h2>Charlottesville Restaurants and Deals</h2>
						<p><a href="http://cs4750.cs.virginia.edu/~shp8xb/goodeats/restaurantform.html">Submit a place</a></p>
						<p>Submit a review</p>
					</div>
				</div>
			</header>
			<section class="restaurant-listing">
				<div class="content-wrap item-details">
					<?php
						include_once("./library.php");// To connect to the database
						$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
						
						// Check connection
						if (mysqli_connect_errno()){
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						
						// Form the SQL query (an INSERT query)
						$sql="SELECT name, address FROM `restaurants` WHERE rid=" . $_GET["rid"];
						$result=mysqli_query($con,$sql);
						if (!result){
							echo "Something went wrong when retrieving the results.";
							die('Error: ' . mysqli_error($con));
						}
						
						while($row = mysqli_fetch_assoc($result)) {
							echo "<h2>{$row["name"]}</h2>";
							echo "<p>{$row["address"]}</p>";
							echo "<p>?/5 rating (0 reviews)</p>";
						}
						
						mysqli_close($con);
					?>
				</div>
			</section>
			<div class="content-wrap item-details">
					<form action="addComment.php" method="post">
						<section>
							Rating <br>
							<input type="radio" name="rating" value="5"> 5 <br>
							<input type="radio" name="rating" value="4"> 4 <br>
							<input type="radio" name="rating" value="3"> 3 <br>
							<input type="radio" name="rating" value="2"> 2 <br>
							<input type="radio" name="rating" value="1"> 1 <br>
						</section>
						<br>
						<section>
							Comment<br>
							<textarea name="comment">Enter comment here</textarea>
						</section>
						<br>
						<input type="Submit">
						<br>
					</form>
				</div>
			<footer>
				<div class="content-wrap">
					<h2>Contact us! (Don't actually)</h2>
					    <ul class="contact-list">
							<li><a href="mailto:email@example.com">email@example.com</a></li>
							<li>(434) 123-4567</li>
						</ul>
				</div>
			</footer>
		</main>
	</body>
</html>