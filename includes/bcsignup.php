
<?php


if (isset($_POST['submit'])) {

	include_once 'db_connection.php';

	$borrowerName = mysqli_real_escape_string($conn, $_POST['borrowerName']);
	$borrowerEmail = mysqli_real_escape_string($conn, $_POST['borrowerEmail']);
	$borrowerPassword = mysqli_real_escape_string($conn, $_POST['borrowerPassword']);
	$borrowerCredit= mysqli_real_escape_string($conn, $_POST['borrowerCredit']);
	$borrowerReplacement= mysqli_real_escape_string($conn, $_POST['borrowerReplacement']);

	echo "$borrowerReplacement";
	//Error handlers
	//Check for empty fields
	if (empty($borrowerName) || empty($borrowerEmail) || empty($borrowerPassword)) {
		header("Location: ../bcs.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $borrowerName)) {
			header("Location: ../bcs.php?signup=invalid");
			exit();
		}  else {
			//Check if email is valid
			if (!filter_var($borrowerEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../bcs.php?signup=email");
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
				$limit;$id;
    		while($row = $result->fetch_assoc()) {
        	$limit = $row['credit_limit'];
        	$id = $row['id'];
    		}
			} else {
    			echo "0 results";
}
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		}
		else {
			if($borrowerCredit < $limit){
			 	$limit -= $borrowerCredit;
				$update="UPDATE borrower SET credit_limit='$limit' WHERE id = $id";
				mysqli_query($conn, $update);
				$insert="INSERT INTO borrower_credit VALUES ('id','$id','payment_done','$borrowerCredit','$borrowerReplacement')";
				mysqli_query($conn, $insert);
					header("Location: ../index.php?signup=success");
					exit();
			}
			else{
				echo " Failure please insert value lower than your credit_limit";
			}
		}
					
					//header("Location: ../index.php?signup=success");
					//exit();
				}
}
}

}
     else {
	      header("Location: ../bcs.php?error");
	exit();
}
?>