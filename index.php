<?php include_once 'header.php';
?>
	<h2>Borrower Sign Up</h2>
	<div class="container">
		
		<img src="men.png">
		<form method="POST" action="includes/signup.php">
				<div class="font-input">
					<input type="text" name="borrowerName" placeholder="Name">
				</div>

				<div class="font-input">
					<input type="text" name="borrowerEmail" placeholder="E-mail">
				</div>

				<div class="font-input">
					<input type="password" name="borrowerPassword" placeholder="Password">
				</div>
				<input type="submit" name="submit" value="Sign Up" class="btn-signup">
		</form>
	</div>
	<button class="button"><a href="bcs.php">Credit Request</a></button>
	<button class="button1"><a href="details.php">Credit Details</a></button>
	<button class="button2"><a href="isreplacement.php">Repayment</a></button>

	<h2 class="right1">Lender Sign Up</h2>
	<div class="container1">
		
		<img src="men.png">
		<form method="POST" action="includes/lender_signup.php">
				<div class="font-input">
					<input type="text" name="lenderName" placeholder="Name">
				</div>

				<div class="font-input">
					<input type="text" name="lenderEmail" placeholder="E-mail">
				</div>

				<div class="font-input">
					<input type="password" name="lenderPassword" placeholder="Password">
				</div>
				<input type="submit" name="submit" value="Sign Up" class="btn-signup">
		</form>
	</div>
<?php include_once 'footer.php';?>
