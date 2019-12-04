<?php
	session_start();

	if( isset( $_SESSION['valid'] ) ) {
		header("Location: index.php");
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
						<h1>Login</h1>
						<h2>Welcome back!</h2>
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
				  $sql = "SELECT username, password from users WHERE username = '" . $_POST['username'] . "'";
				  $sql2 = "SELECT accname, password from ownerAccount WHERE accname = '" . $_POST['username'] . "'";
				  $result = $con->query($sql);
				  $result2 = $con->query($sql2);
				  $username = $_POST["username"];
				  $password = $_POST["password"];
                  if ($result-> num_rows == 0 && $result2->num_rows == 0){
                    echo "<section>Incorrect username or password</section>";
				  } else {
					  //echo "<section>username found, now checking...</section>";
					while($row = $result->fetch_assoc()) {
						$db_password = $row['password'];
						//echo "<section>entered password: " . $password .  "...</section>";
						//echo "<section>hashed password: " . $db_password .  "...</section>";
							if (password_verify($password, $db_password)) {
								echo "<section>correct password</section>";
								$_SESSION['username'] = $_POST['username'];
								$_SESSION['valid'] = true;
								header("Location: index.php");
							} else {
								echo "<section>Incorrect password</section>";
							}
					}
					// this should work as long as there aren't identical accounts in the two tables
					while($row = $result2->fetch_assoc()) {
						$db_password = $row['password'];
						//echo "<section>entered password: " . $password .  "...</section>";
						//echo "<section>hashed password: " . $db_password .  "...</section>";
							if (password_verify($password, $db_password)) {
								echo "<section>correct password</section>";
								$_SESSION['username'] = $_POST['username'];
								$_SESSION['valid'] = true;
								header("Location: index.php");
							} else {
								echo "<section>Incorrect password</section>";
							}
					}
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
