<?php

echo "<!DOCTYPE html>
<html>
<head>
	<title>Throw-a-Coin-in-the-Fountain</title>
</head>
<body>
	<h1>Coin-In-Fountain Wish</h1>
	<form name='details' action='models/formAction.php'>
	<label name = 'paymethod'>Payment Method</label>
	<input type='text' name='method'><br>
	<label>Friends Email</label>
	<input type='text' name='emails'><br>
	<input type='submit' name='Submit'>
	</form>
	<form name = 'test' action='models/charge.php' method='POST'>
	  <script
	    src='https://checkout.stripe.com/checkout.js' class='stripe-button'
	    data-key='pk_test_mfDmFaNUG5FaS8zNKTg3VKAF'
	    data-description='Download Script ($15.00)''
	    data-amount='1500'>
	  </script>
	</form>
</body>
</html>";