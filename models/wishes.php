<?php
define('FPDF_FONTPATH','vendor/setasign/fpdf/font');
require('fpdf.php'); 
$id = $_REQUEST['transId'];

$conn = mysqli_connect("localhost", "root", "", "Wishes");

$stmt = mysqli_prepare($conn, "SELECT fountain, color, country, wish FROM Wish where id = ?");
$stmt->bind_param('i', $id);
mysqli_stmt_execute($stmt);
$stmt->bind_result($fountain, $color, $country, $wish);
$stmt->fetch();

//create pdf with variables from db
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','', 24);
$pdf->Cell(40,10,'A recent wish was made into our '.$color. ' '.$fountain.'  based in '.$country'.\n\n
We hope the wish for '.$wish. ' comes true!');
$pdf->Output('wishInfo.pdf', 'I'); 
?>
