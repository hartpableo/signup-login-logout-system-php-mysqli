<?php 
	function emptyInputSignup($name, $email, $uid, $password, $repeatPassword) {
		$result;
		if (empty($name) || empty($email) || empty($uid) || empty($password) || empty($repeatPassword)) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}

	function invalidUid($uid) {
		$result;
		if (!preg_match('/^[a-zA-Z0-9]*$/', $uid)) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}

	function invalidEmail($email) {
		$result;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}

	function passwordMatch($password, $repeatPassword) {
		$result;
		if ($password !== $repeatPassword) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}

	function uidExists($conn, $uid, $email) {
		$sql = 'SELECT * FROM users  WHERE usersUid = ? OR usersEmail = ?;';
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header('Location: ../signup.php?error=stmtfailed');
			exit();
		}

		mysqli_stmt_bind_param($stmt, 'ss', $uid, $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		} else {
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}

	function createUser($conn, $name, $email, $uid, $password) {
		$sql = 'INSERT INTO users (usersName, usersEmail, UsersUid, UsersPassword) VALUES (?, ?, ?, ?);';
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header('Location: ../signup.php?error=stmtfailed');
			exit();
		}

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $uid, $hashedPassword);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header('Location: ../signup.php?error=none');
		exit();
	}

	function emptyInputLogin($uid, $password) {
		$result;
		if (empty($uid) || empty($password)) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}

	function loginUser($conn, $uid, $password) {
		$uidExists = uidExists($conn, $uid, $uid);

		if ($uidExists === false) {
			header('Location: ../login.php?error=wronglogin');
			exit();
		}

		$passwordHashed = $uidExists['usersPassword'];
		$checkPassword = password_verify($password, $passwordHashed);

		if ($checkPassword === false) {
			header('Location: ../login.php?error=wronglogin');
			exit();
		} elseif ($checkPassword === true) {
			session_start();
			$_SESSION['userid'] = $uidExists['usersId'];	
			$_SESSION['useruid'] = $uidExists['usersUid'];
			header('Location: ../index.php');
			exit();		
		}
	}