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
	<form name = 'test' action='config/config.php' method='POST'>
	  <script
	    src='https://checkout.stripe.com/checkout.js' class='stripe-button'
	    data-key='pk_test_mfDmFaNUG5FaS8zNKTg3VKAF'
	    data-description='Make a wish ($0.50)'
	    data-amount='50'>
	  </script>
	</form>
</body>
</html>";