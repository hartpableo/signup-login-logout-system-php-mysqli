<?php  
	if (isset($_POST['submit'])) {
		$uid = $_POST['uid'];
		$password = $_POST['password'];
		$serverName = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbName = 'loginsystem';
		$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

		require_once 'dbh-inc.php';
		require_once 'functions-inc.php';

		if (emptyInputLogin($uid, $password) !== false) {
			header('Location: ../login.php?error=emptyinput');
			exit();
		} 
		loginUser($conn, $uid, $password);
	} else {
			header('Location: ../login.php?loggedin');
			exit();
		}