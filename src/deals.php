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
						<h1>Current Deals</h1>
						<h2>Find deals at restaurants around Charlottesville.</h2>
					</div>
				</div>
			</header>
			<section class="restaurant-listing">
				<div class="content-wrap item-details">
					<h2>Regular Deals</h2>
					<p>These deals do not have a specified deadline and recur frequently.</p>
					<table style="width:100%">
						<tr>
					    <th>Item</th>
					    <th>Cost</th>
							<th>Description</th>
							<th>Recurs when</th>
					  </tr>
						<?php
							include_once("./library.php");// To connect to the database
							$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

							// Check connection
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							// Form the SQL query (an INSERT query)
							$sql="SELECT item_name, description, cost, rid, recurs_when FROM `regularDeal`";
							$result=mysqli_query($con,$sql);
							if (!$result){
								echo "Something went wrong when retrieving the results.";
								die('Error: ' . mysqli_error($con));
							}

							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td><h3><a href=\"view-restaurant.php?rid={$row["rid"]}\">{$row["item_name"]}</a></h3></td>";
								echo "<td><p>{$row["cost"]}</p></td>";
								echo "<td><p>{$row["description"]}</p></td>";
								echo "<td><p>{$row["recurs_when"]}</p></td></tr>";
							}

							mysqli_close($con);
						?>
					</table>
				</div>
        <div class="content-wrap item-details">
          <h2>Temporary Deals</h2>
          <p>These deals are temporary, claim these before the deadline.</p>
          <table style="width:100%">
            <tr>
              <th>Item</th>
              <th>Cost</th>
              <th>Description</th>
              <th>Starts</th>
              <th>Ends</th>
            </tr>
            <?php
              include_once("./library.php");// To connect to the database
              $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

              // Check connection
              if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }

              // Form the SQL query (an INSERT query)
              $sql="SELECT item_name, description, cost, rid, start_date, end_date FROM `tempDiscount`";
              $result=mysqli_query($con,$sql);
              if (!$result){
                echo "Something went wrong when retrieving the results.";
                die('Error: ' . mysqli_error($con));
              }

              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td><h3><a href=\"view-restaurant.php?rid={$row["rid"]}\">{$row["item_name"]}</a></h3></td>";
                echo "<td><p>{$row["cost"]}</p></td>";
                echo "<td><p>{$row["description"]}</p></td>";
                echo "<td><p>{$row["start_date"]}</p></td>";
                echo "<td><p>{$row["end_date"]}</p></td></tr>";
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
