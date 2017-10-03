<?php

if (isset($_POST['submit'])) {

	include_once 'db_connection.php';

	$lenderName = mysqli_real_escape_string($conn, $_POST['lenderName']);
	$lenderEmail = mysqli_real_escape_string($conn, $_POST['lenderEmail']);
	$lenderPassword = mysqli_real_escape_string($conn, $_POST['lenderPassword']);
	//Error handlers
	//Check for empty fields
	if (empty($lenderName) || empty($lenderEmail) || empty($lenderPassword)) {
		header("Location: ../isreplacement_done.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $lenderName)) {
			header("Location: ../isreplacement_done.php?signup=invalid");
			exit();
		}  else {
			//Check if email is valid
			if (!filter_var($lenderEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../isreplacement_done.php?signup=email");
				exit();
			}
			else {
					//Hashing the password
					$hashedPwd = password_hash($lenderPassword, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "SELECT * FROM lender WHERE email='$lenderName' OR name='$lenderName' OR password='$hashedPwd'";
				$result = mysqli_query($conn, $sql);
					
					mysqli_query($conn, $sql);
					$query="SELECT * FROM borrower_credit";
					$result=mysqli_query($conn, $query);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo "id: " . $row["id"]. " - Amount: " . $row["amount"]. " - ReplacementDate " . $row["replacement_date"]." - Payment_done " . $row["payment_done"] ;
					   	echo "<button class='delete'>"; echo "<a href='delete.php?id="; echo $row['id']."''>"; echo "Paid</a></button>"; echo  "<br>";
					    }
					} else {
					    echo "0 results";
					}
				}
}
} 

}


     else {
	      header("Location: ../index.php");
	exit();
}


