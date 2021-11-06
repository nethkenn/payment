<?php include 'layouts/header.php'; ?>

<form action="charge.php" method="post">
	<div class="content">
		<label>Amount to Pay:</label>
		<input style="margin-left:15px;" type="number" name="amount" required>
		<br>
		<label>Payment Method:</label>
		<select name="paymentMethod" required>
			<option value="paypal">Paypal</option>
			<option value="paymaya">Paymaya</option>
			<option value="gcash">Gcash</option>
			<option value="grabpay">GrabPay</option>
		</select>

			<br><br>
		<input class="payNow" type="submit" name="submit" value="Pay Now">
		<button class="primary"><a href="view.php">View</a></button>
	</div>
</form>
 
<?php include 'layouts/footer.php'; ?>
