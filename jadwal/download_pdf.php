<?php
include "../config/database.php";
require('../fpdf/fpdf.php');

$data = mysqli_query($conn, "
    SELECT a.*, k.nama_klien
    FROM tbl_agenda a
    JOIN tbl_klien k ON a.kode_klien = k.kode_klien
    ORDER BY a.tanggal DESC
");

// Inisialisasi FPDF
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Data Jadwal Visit',0,1,'C');
$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,'Tanggal',1,0,'C');
$pdf->Cell(30,10,'Kode Klien',1,0,'C');
$pdf->Cell(50,10,'Nama Klien',1,0,'C');
$pdf->Cell(50,10,'Kegiatan',1,0,'C');
$pdf->Cell(30,10,'Keterangan',1,1,'C'); 

// Data tabel
$pdf->SetFont('Arial','',12);
while ($d = mysqli_fetch_assoc($data)) {
    $pdf->Cell(30,10,$d['tanggal'],1,0,'C');
    $pdf->Cell(30,10,$d['kode_klien'],1,0,'C');
    $pdf->Cell(50,10,$d['nama_klien'],1,0,'C');
    $pdf->Cell(50,10,$d['kegiatan'],1,0,'C');
    $pdf->Cell(30,10,$d['keterangan'],1,1,'C');
}

// Output file PDF
$pdf->Output('D','Data_Jadwal_Visit.pdf'); 
