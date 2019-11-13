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
		<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script>
		</script>
	</head>
	<body>
		<main>
			<header>
				<div class="navbar">
					<a href="/goodeats/index.php">Home</a>
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
						<h1>Submit a restaurant</h1>
						<h2>Help others find new restaurants.</h2>
					</div>
				</div>
			</header>
			<section class="restaurant-listing">
				<div class="content-wrap item-details">
				  <h2>Submit a place</h2>
						<form action="InsertRestaurant.php" method="post">
						<section>
							Restaurant name: <input type="text" name="name">
						</section>
						<br>
						<section>
							Address: <input type="text" name="address">
						</section>
						<br>
						<input type="Submit">
						<br>
					</form>
				</div>
			</section>
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
