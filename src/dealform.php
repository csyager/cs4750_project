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
						<h1>Submit a deal</h1>
						<h2>Help others find local deals.</h2>
					</div>
				</div>
			</header>
			<section class="restaurant-listing">
				<div class="content-wrap item-details">
				  <h2>Submit a recurring deal</h2>
					<form action="InsertRegDeal.php" method="post">
						<section>
							Item name: <input type="text" name="name">
						</section>
                        <br>
                        <section>
							Description: <input type="text" name="desc">
						</section>
						<br>
						<section>
							Cost: <input type="number" name="cost">
						</section>
                        <br>
                        <section>
							RID: <input type="number" name="rid">
						</section>
                        <br>
                        <section>
							Recurs when: <input type="text" name="recurs_when">
						</section>
						<br>
							<input type="Submit">
						<br>
                    </form>
                    <h2>Submit a temporary deal</h2>
					<form action="InsertTempDeal.php" method="post">
						<section>
							Item name: <input type="text" name="name">
						</section>
                        <br>
                        <section>
							Description: <input type="text" name="desc">
						</section>
						<br>
						<section>
							Cost: <input type="number" name="cost">
						</section>
                        <br>
                        <section>
							RID: <input type="number" name="rid">
						</section>
                        <br>
                        <section>
							Start date: <input type="date" name="start">
						</section>
                        <br>
                        <section>
							End date: <input type="date" name="end">
						</section>
						<br>
							<input type="Submit">
						<br>
                    </form>
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
