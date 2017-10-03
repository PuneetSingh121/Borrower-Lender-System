<?php include_once 'header.php';
?>

<h2 style="
	color:blue;
	position:absolute;
	top:60px;
	left:600px;">Borrower Credit Request</h2>
	<div class="container2">
		<img id="img" src="men.png">
		<form method="POST" action="includes/bcsignup.php">
				<div class="font-input">
					<input type="text" name="borrowerName" placeholder="Name">
				</div>

				<div class="font-input">
					<input type="text" name="borrowerEmail" placeholder="E-mail">
				</div>

				<div class="font-input">
					<input type="password" name="borrowerPassword" placeholder="Password">
				</div>

				<div class="font-input">
					<input type="text" name="borrowerCredit" placeholder="Credit Rupee">
				</div>

				<div class="font-input">
					<input type="date" name="borrowerReplacement" placeholder="Replacement Date">
				</div>
				<input type="submit" name="submit" value="Request" class="btn-signup">
		</form>
	</div>
	
<?php include_once 'footer.php';?>