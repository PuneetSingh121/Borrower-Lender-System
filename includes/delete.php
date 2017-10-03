<?php
	include_once 'db_connection.php';

		if(isset($_GET['id']))
{
	$tid = $_GET['id'];
	$result = mysqli_query($conn,"Select * FROM borrower_credit WHERE id=".$tid);
$amount;
$bid;
	while($row = $result->fetch_assoc())
	{
		$bid = $row['b_id'];
		$amount = $row['amount'];
	}

	mysqli_query($conn,"UPDATE borrower_credit SET amount=0, payment_done=1 WHERE id=".$tid);
	$result = mysqli_query($conn,"Select * FROM borrower WHERE id=".$bid);
	$credit;
while($row = $result->fetch_assoc())
	{
		$credit = $row['credit_limit'];
	}

	$credit += $amount;

	mysqli_query($conn,"UPDATE borrower SET credit_limit=$credit WHERE id=".$bid);

	      header("Location: ../isreplacement.php");





}
else
echo "error";

?>
