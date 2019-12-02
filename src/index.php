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
