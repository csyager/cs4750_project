<?php
	session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Good Eats</title>
		<link href="https://fonts.googleapis.com/css?family=Caveat|Montserrat:400,600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div class="page-container">
		<div class="footer-wrap">
		<main>
			<header>
				<div class="navbar">
					<a href="index.php">Home</a>
					<form action="search.php">
						<input type="text" placeholder="Search..." name="search">
						<button type="submit">Submit</button>
					</form>
					<?php if (isset($_SESSION['valid'])): ?>
						<div class="topnav-right">
							<a href="logout.php">Logout</a>
						</div>
					<?php else: ?>
						<div class="topnav-right">
							<a href="register.php">Register</a>
							<a href="login.php">Login</a>
						</div>
					<?php endif; ?>
				</div>
		    <div class="content-wrap">
					<div class="black-box">
						<h1>Search Restaurants</h1>
						<h2>Find new local places to eat at.</h2>
					</div>
				</div>
			</header>
			<section class="restaurant-listing">
				<div class="content-wrap item-details">
					<h2>Search Restaurants</h2>
					<table style="width:100%">
						<tr>
					    <th>Name</th>
					    <th>Address</th>
							<th>Ratings</th>
							<th>Area</th>
					  </tr>
						<?php
							include_once("./library.php");// To connect to the database
							$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

							// Check connection
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							if($_GET['search'] != "") {
								// Form the SQL query (an INSERT query)
								$sql="SELECT name, address, rid FROM `restaurants` WHERE name LIKE '%" . $_GET['search'] . "%'";
								$result=mysqli_query($con,$sql);
								if (!$result){
									echo "Something went wrong when retrieving the results.";
									die('Error: ' . mysqli_error($con));
								}

								$count = 0;

								while($row = mysqli_fetch_assoc($result)) {
									$sqlratings="SELECT rid, rating FROM `comment` WHERE rid=" . $row["rid"];
									$resultratings=mysqli_query($con,$sqlratings);
									$sum = 0;
									$count = 0;

									while($rowrating = mysqli_fetch_assoc($resultratings)) {
										$sum = $sum + intval($rowrating["rating"]);
										$count = $count + 1;
									}

									$rating = number_format(($sum / $count),2);
									echo "<tr><td><h3><a href=\"view-restaurant.php?rid={$row["rid"]}\">{$row["name"]}</a></h3></td>";
									// address
									echo "<td><p>{$row["address"]}</p></td>";
									// rating
									if ($count == 0) {
										echo "<td><p>No ratings</p></td>";
									} else {
										echo "<td><p>{$rating}/5.00 rating ({$count} reviews)</p></td>";
									}
									// get area
									$sql2="SELECT area_name FROM `isIn` WHERE rid=" . $row["rid"] . "";
									$result2=mysqli_query($con,$sql2);
									if (!$result2){
										echo "Something went wrong when retrieving the results.";
										die('Error: ' . mysqli_error($con));
									}
									if ($result2-> num_rows == 0){
										echo "<td> </td></tr>";
									} else {
										while ($row2 = mysqli_fetch_assoc($result2)) {
											echo "<td><p>{$row2["area_name"]}</p></td></tr>";
										}
									}
									$count = 1 + $count;
								}
								echo "<p>" . $count . " results retrieved.";
							} else {
								echo "<p>No restaurants retrieved due to no search query. Please retry again.</p>";
							}

							mysqli_close($con);
						?>
					</table>
				</div>
			</section>
		</main>
		</div>
		<footer>
			<h2>Contact us! (Don't actually)</h2>
				<ul class="contact-list">
				<li><a href="mailto:email@example.com">email@example.com</a></li>
				<li>(434) 123-4567</li>
				</ul>
		</footer>
		</div>
	</body>
</html>
