<?php
	session_start();

	if( isset( $_SESSION['valid'] ) ) {
		header("Location: profile.php");
	} else {
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
            <form method="POST" action="login.php">
  						<section>
  							Username <input type="text" name="username">
  						</section>
  						<section>
  							Password <input type="password" name="password">
  						</section>
              <br>
              <section>
                <button type="submit" name="submit">Submit</button>
              </section>
              <?php
                include_once("./library.php");// To connect to the database
                if(isset($_POST['submit'])){
                  //mysqli object and error handling
                  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                  if ($con -> connect_errno) {
                    echo "Error:  Failed to make a MySQL connection \n";
                    echo "Errno: " . $con->connect_errno . "\n";
                    echo "Error: " . $con->connect_error . "\n";
                  }
                  // MySQL query
                  $sql = "SELECT username, password from users WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
                  $result = $con->query($sql);
                  if ($result-> num_rows == 0){
                    echo "<section>Incorrect username or password</section>";
                  } else {
                    $_SESSION['username'] = $_POST['username'];
										$_SESSION['valid'] = true;
                    header("Location: profile.php");
                  }
                }
            	?>
            </form>
					</div>
				</div>
			</header>
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
