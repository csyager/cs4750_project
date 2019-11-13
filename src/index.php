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
						<h1>Good Eats</h1>
						<h2>Charlottesville Restaurants and Deals</h2>
						<p>Find new restaurants, great deals, and ratings on restaurants in Charlottesville, Virginia.</p>
					</div>
				</div>
			</header>
			<div class="center-items">
				<div class="menu-box">
					<h2>
						<a href="restaurantform.php" style="display:block;height:100%;width:100%">Submit a place</a>
					</h2>
				</div>
				<div class="menu-box">
					<h2>
						<a href="restaurants.php" style="display:block;height:100%;width:100%">View Restaurants</a>
					</h2>
				</div>
				<div class="menu-box">
					<h2>
						<a href="deals.php" style="display:block;height:100%;width:100%">View Deals</a>
					</h2>
				</div>
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
