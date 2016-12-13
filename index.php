<?php

echo"<!DOCTYPE html>
<html>
<head>
	<title>Throw-a-Coin-in-the-Fountain</title>
	<script type='text/javascript'>

	function displayFountain(box){
	
	var fountainPics = new Array(5)
	fountainPics[0] = 'resources/fountain1.png';
	fountainPics[1] = 'resources/fountain2.png';
	fountainPics[2] = 'resources/fountain3.png';
	document.getElementById('fountainPic').src = fountainPics[parseInt(box.value)];
	}
	</script>
</head>
<body>
	<h1>Coin-In-Fountain Wish</h1>
	<table>
<tr>
<td>

<form name='fountainSelections'>

<h2>Fountain Selections</h2>

<input type='radio' name='chook' value='0' checked='checked' onclick='displayFountain(this);''>Fountain 1
<br />
<input type='radio' name='chook' value='1' onclick='displayFountain(this);'>Fountain 2
<br />
<input type='radio' name='chook' value='2' onclick='displayFountain(this);'>Fountain 3

	</form>
	</td>
	<td>
	<img src='resources/fountain1.png' name='fountainPic' id='fountainPic' />
	</td>
	</tr>
	</table>


	<form name='details' action='models/formAction.php'>
	<label name = 'userWish'>Enter your wish</label>
	<input type='text' name='wish'><br>
	<label name = 'userEmail'>Enter your email</label>
	<input type='text' name='userEmail'><br>
	<label name = 'payMethod'>Payment Method</label>
	<input type='text' name='method'><br>
	<label>Friends Email</label>
	<input type='text' name='friendEmails'><br>
	</form>

	<?php require_once('/config/config.php'); ?>
<form action='models/charge.php' method='post'>
  <script src='https://checkout.stripe.com/checkout.js' class='stripe-button'
          data-key='pk_test_mfDmFaNUG5FaS8zNKTg3VKAF'
          data-description='Access for a year'
          data-amount='5000'
          data-locale='auto'></script>
</form>
</body>
</html>";




?>
