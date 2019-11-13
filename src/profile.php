<?php
	session_start();

	if( isset( $_SESSION['valid'] ) ) {
	} else {

		header("Location: authenticate.php");
	}
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
        <br>
			    <h1>Profile Page</h1>
          <br>
          <h2>This is your profile page</h2>
			</header>
      <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
      <br>
      <a href="logout.php"><button type="submit" style="height: 50px; width: 200px; margin: 10px"><h3>Log out</h3></button></a>
      <br><br>
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
