<?php
include "../config/database.php";
require('../fpdf/fpdf.php');

// data klien
$data = mysqli_query($conn, "SELECT * FROM tbl_klien ORDER BY kode_klien ASC");

// Inisialisasi FPDF
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Data Klien',0,1,'C');
$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Kode Klien',1,0,'C');
$pdf->Cell(130,10,'Nama Klien',1,1,'C');

// Data tabel
$pdf->SetFont('Arial','',12);
while ($row = mysqli_fetch_assoc($data)) {
    $pdf->Cell(50,10,$row['kode_klien'],1,0,'C');
    $pdf->Cell(130,10,$row['nama_klien'],1,1,'C');
}

// Output PDF
$pdf->Output('D','Data_Klien.pdf');
