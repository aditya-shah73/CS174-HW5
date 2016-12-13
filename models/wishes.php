<?php
define('FPDF_FONTPATH','../vendor/setasign/fpdf/font');
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
$pdf->AddPage("P");
$pdf->SetFont('Times','', 20);
$pdf->Cell(0,10,'A recent wish was made into our '.$color. ' '.$fountain.' based in '.$country, 0, 1);
$pdf->Cell(0,10,'We hope your wish for '.$wish.' comes true! ',0,1);
$pdf->Output('wishInfo.pdf', 'I'); 
?>
