<?php
require('fpdf/fpdf.php');

// Retrieve data passed via POST
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$booktitle = $_POST['booktitle'];
$amount = $_POST['amount'];

// Create PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Transaction Receipt', 0, 1, 'C');

// Line break
$pdf->Ln(10);

// Add transaction details
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'User ID: ' . $user_id, 0, 1);
$pdf->Cell(0, 10, 'Username: ' . $username, 0, 1);
$pdf->Cell(0, 10, 'Book Title: ' . $booktitle, 0, 1);
$pdf->Cell(0, 10, 'Amount: $' . $amount, 0, 1);

// Output PDF
$pdf->Output('D', 'receipt.pdf');
?>
