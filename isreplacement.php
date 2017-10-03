<?php include_once 'header.php';
?>

<h2 style="
	color:blue;
	position:absolute;
	top:60px;
	left:600px;">Borrower Debit Rupee</h2>
	<div class="container3">
		<img id="img" src="men.png">
		<form method="POST" action="includes/isreplacement_done.php">
				<div class="font-input">
					<input type="text" name="lenderName" placeholder="Name">
				</div>

				<div class="font-input">
					<input type="text" name="lenderEmail" placeholder="E-mail">
				</div>

				<div class="font-input">
					<input type="password" name="lenderPassword" placeholder="Password">
				</div>


				<input type="submit" name="submit" value="Debit Done" class="btn-signup">
		</form>
	</div>
	
<?php include_once 'footer.php';?>