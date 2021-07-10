<?php
	include ('header.php');
?>
	<section class="content" style="padding-bottom: 2em; text-align: center;">
		<h1 style="margin-bottom: 0.75em;">Sign Up</h1>
		<form method="post" action="inc/signup-inc.php" style="display: flex; flex-direction: column; width: 50%; margin: auto;">
			<input type="text" name="name" placeholder="Name..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<input type="email" name="email" placeholder="Email..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<input type="text" name="uid" placeholder="Username..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<input type="password" name="password" placeholder="Password..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<input type="password" name="repeat-password" placeholder="Repeat Password..." style="margin-bottom: 0.5em; padding: 0.5em;">
			<button type="submit" name="submit" style="padding: 0.5em 1em; width: max-content; margin: 1em auto auto auto;">Sign Up</button>
		</form>

		<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 'emptyinput') {
					echo '<p>Fill in all the fields.</p>';
				} elseif ($_GET['error'] == 'invaliduid') {
					echo '<p>Choose a proper username ID.</p>';
				} elseif ($_GET['error'] == 'invalidemail') {
					echo '<p>Choose a proper Email.</p>';
				} elseif ($_GET['error'] == 'passwordsdontmatch') {
					echo '<p>Passswords do not match.</p>';
				} elseif ($_GET['error'] == 'stmtfailed') {
					echo '<p>Something went wrong.</p>';
				} elseif ($_GET['error'] == 'uidtaken') {
					echo '<p>Username already taken.</p>';
				} elseif ($_GET['error'] == 'none') {
					echo '<p>You have signed up!</p>';
				}
			}
		?>
	</section>
<?php 
	include ('footer.php');
?>