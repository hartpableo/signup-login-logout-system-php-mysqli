<?php
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$uid = $_POST['uid'];
		$password = $_POST['password'];
		$repeatPassword = $_POST['repeat-password'];

		$serverName = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbName = 'loginsystem';
		$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

		require_once 'dbh-inc.php';
		require_once 'functions-inc.php';

		if (emptyInputSignup($name, $email, $uid, $password, $repeatPassword) !== false) {
			header('Location: ../signup.php?error=emptyinput');
			exit();
		} 
		if (invalidUid($uid) !== false) {
			header('Location: ../signup.php?error=invaliduid');
			exit();
		} 
		if (invalidEmail($email) !== false) {
			header('Location: ../signup.php?error=invalidemail');
			exit();
		} 
		if (passwordMatch($password, $repeatPassword) !== false) {
			header('Location: ../signup.php?error=passwordsdontmatch');
			exit();
		} 
		if (uidExists($conn, $uid, $email) !== false) {
			header('Location: ../signup.php?error=uidtaken');
			exit();
		}

		createUser($conn, $name, $email, $uid, $password);
	} else {
		header('Location: ../signup.php');
		exit();
	};