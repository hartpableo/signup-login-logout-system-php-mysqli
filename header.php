<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Basic Login System</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Blog</a></li>
				<?php 
					if (isset($_SESSION['useruid'])) {
						echo '<li><a href="profile.php">My Profile</a></li>';
						echo '<li><a href="inc/logout-inc.php">Logout</a></li>';
					} else {
						echo '<li><a href="signup.php">Sign Up</a></li>';
						echo '<li><a href="login.php">Login</a></li>';
					}
				?>
			</ul>
		</nav>
	</header>