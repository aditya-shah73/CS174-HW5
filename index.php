<?php
require_once("config/createDB.php");
echo "
<!DOCTYPE html>
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
				<input type='radio' name='f1' value='luxury fountain' checked='checked' onclick='displayFountain(this);''>Fountain 1 <br/>
				<input type='radio' name='f1' value='classy fountain' onclick='displayFountain(this);'>Fountain 2 <br />
				<input type='radio' name='f1' value='trashy fountain' onclick='displayFountain(this);'>Fountain 3
				</form>
			</td>
			<td>
				<img src='resources/fountain1.png' name='fountainPic' id='fountainPic' />
			</td>
		</tr>
	</table>

	<form name='details' action='models/charge.php' method='post'>
		<label>Enter your wish</label>
		<input type='text' name = 'userWish'><br>
		<label>Enter your email</label>
		<input type='text' name='userEmail'><br>
		<label>Payment Method</label>
		<input type='text' name='payment'><br>
		<label>Friends Email</label>
		<input type='text' name='friendEmail'><br>
		<script src='https://checkout.stripe.com/checkout.js' class='stripe-button'
	          data-key='pk_test_mfDmFaNUG5FaS8zNKTg3VKAF'
	          data-description='Access for a year'
	          data-amount='50'
	          data-locale='auto'>
		</script>
	</form>
	<?php require_once('/config/config.php'); ?>
</body>
</html>";