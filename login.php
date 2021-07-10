<?php
	include ('header.php');
?>
	<section class="content" style="padding-bottom: 2em;">
		<h1 style="margin-bottom: 0.75em;">Login</h1>
		<form method="post" action="inc/login-inc.php" style="display: flex; flex-direction: column; width: 50%; margin: auto;">
			<input type="text" name="uid" placeholder="Username/Email..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<input type="password" name="password" placeholder="Password..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<button type="submit" name="submit" style="padding: 0.5em 1em; width: max-content; margin: 1em auto auto auto;">Login</button>
		</form>

		<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 'emptyinput') {
					echo '<p>Fill in all the fields.</p>';
				} elseif ($_GET['error'] == 'wronglogin') {
					echo '<p>Incorrect login information.</p>';
				}
			}
		?>
	</section>
<?php 
	include ('footer.php');
?>