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
					$sql = "SELECT * FROM borrower WHERE email='$borrowerName' OR name='$borrowerName' OR password='$hashedPwd'";
					$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($result->num_rows > 0) {
 		   // output data of each row
			$id;
    		while($row = $result->fetch_assoc()) {
        	$id = $row['id'];
    		}
			} else {
    			echo "no id selected";
}
					mysqli_query($conn, $sql);
					$query="SELECT * FROM borrower_credit WHERE b_id=$id";
					$result=mysqli_query($conn, $query);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo "id: " . $row["id"]. " - Amount: " . $row["amount"]. " - ReplacementDate " . $row["replacement_date"]." - Payment_done " . $row["payment_done"] . "<br>";
					    }
					} else {
					    echo "You doesn't have any list of credit taken.";
					}
				}
}
}

}
     else {
	      header("Location: ../index.php");
	exit();
}

