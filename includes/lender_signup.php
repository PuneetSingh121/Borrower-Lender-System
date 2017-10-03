<?php

if (isset($_POST['submit'])) {

	include_once 'db_connection.php';

	$lenderName = mysqli_real_escape_string($conn, $_POST['lenderName']);
	$lenderEmail = mysqli_real_escape_string($conn, $_POST['lenderEmail']);
	$lenderPassword = mysqli_real_escape_string($conn, $_POST['lenderPassword']);

	//Error handlers
	//Check for empty fields
	if (empty($lenderName) || empty($lenderEmail) || empty($lenderPassword)) {
		header("Location: ../index.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $lenderName)) {
			header("Location: ../index.php?signup=invalid");
			exit();
		}  else {
			//Check if email is valid
			if (!filter_var($lenderEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../index.php?signup=email");
				exit();
			}
			else {
					//Hashing the password
					$hashedPwd = password_hash($lenderPassword, PASSWORD_DEFAULT);
					//Insert the user into the database
					
					$sql="SELECT * FROM lender";
					$result = $conn->query($sql);
						if ($result->num_rows > 0) {
								header("Location: ../index.php?sorry");	    	     	
						     	exit();
						    }
						    else{
							$sql = "INSERT INTO lender (name, email, password) VALUES ('$lenderName', '$lenderEmail', '$hashedPwd');";	    	
						    }

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

