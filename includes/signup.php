<?php

if (isset($_POST['submit'])) {

	include_once 'db_connection.php';

	$borrowerName = mysqli_real_escape_string($conn, $_POST['borrowerName']);
	$borrowerEmail = mysqli_real_escape_string($conn, $_POST['borrowerEmail']);
	$borrowerPassword = mysqli_real_escape_string($conn, $_POST['borrowerPassword']);

	//Error handlers
	//Check for empty fields
	if (empty($borrowerName) || empty($borrowerEmail) || empty($borrowerPassword)) {
		header("Location: ../index.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $borrowerName)) {
			header("Location: ../index.php?signup=invalid");
			exit();
		}  else {
			//Check if email is valid
			if (!filter_var($borrowerEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../index.php?signup=email");
				exit();
			}
			else {
					//Hashing the password
					$hashedPwd = password_hash($borrowerPassword, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO borrower (name, email, password) VALUES ('$borrowerName', '$borrowerEmail', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../index.php?signup=success");
					exit();
				}
}
}

}
     else {
	      header("Location: ../index.php");
	exit();
}

