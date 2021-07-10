<?php
	include ('header.php');
?>
	<section class="content">
		<?php 
			if (isset($_SESSION['useruid'])) {
				echo "<p>Hello there "."<strong>".$_SESSION['useruid']."</strong>"."!</p>";
			}
		?>
		<h1>Introduction</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</section>
<?php 
	include ('footer.php');
?>