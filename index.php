<?php
require('fpdf.php');

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


</body>
</html>";



$wishPDF = createPDF($wish)

function createPDF($wishDetails){
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Times New Roman', '', 24);
	$pdf->Cell(0, 50, $wishDetails, 0, 1, 'C');
	return $pdf;
}


