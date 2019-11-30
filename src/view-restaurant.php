<?php
	session_start()
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
					<a href="/goodeats/index.php">Home</a>
					<form action="/goodeats/search.php">
						<input type="text" placeholder="Search..." name="search">
						<button type="submit">Submit</button>
					</form>
					<?php if (isset($_SESSION['valid'])): ?>
						<div class="topnav-right">
							<a href="profile.php">Profile</a>
							<a href="logout.php">Logout</a>
						</div>
					<?php else: ?>
						<div class="topnav-right">
							<a href="login.php">Login</a>
						</div>
					<?php endif; ?>
				</div>
		    <div class="content-wrap">
					<div class="black-box">
						<h1>Good Eats</h1>
						<h2>Charlottesville Restaurants and Deals</h2>
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
						if (!$result){
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
							<input type="radio" name="rating" value="5" required> 5 <br>
							<input type="radio" name="rating" value="4"> 4 <br>
							<input type="radio" name="rating" value="3"> 3 <br>
							<input type="radio" name="rating" value="2"> 2 <br>
							<input type="radio" name="rating" value="1"> 1 <br>
						</section>
						<br>
						<section>
							Comment<br>
							<textarea name="text" rows="4" cols="50" placeholder="Enter comment here"></textarea>
							<!-- hidden field for passing rid to addComment -->
							<input name="rid" type="hidden" value="<?php echo $_GET['rid']; ?>">
						</section>
						<br>
						<input type="Submit">
						<br>
					</form>
				</div>
			<div class="content-wrap item-details">
				<?php
					include_once("./library.php");// To connect to the database
					$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

					// Check connection
					if (mysqli_connect_errno()){
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}

					// Form the SQL query (an INSERT query)
					$sql="SELECT * FROM `comment` WHERE rid=" . $_GET["rid"];
					$result=mysqli_query($con,$sql);
					while($row = $result->fetch_array()){
						echo "<b>" . $row['username'] . "</b><br>";
						echo $row['text'];
						echo "<hr>";
					}
					if (!$result){
						echo "Something went wrong when retrieving the results.";
						die('Error: ' . mysqli_error($con));
					}
					mysqli_close($con);
				?>

			</div>
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
