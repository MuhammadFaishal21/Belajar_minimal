<?php
require('./fpdf/fpdf.php');

// Membuat objek PDF dengan orientasi Landscape (L), satuan mm, dan ukuran A4
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();

// Judul laporan
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN SEMUA DATA PESERTA', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');

// Header tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'ID', 1, 0);
$pdf->Cell(50, 6, 'NAMA', 1, 0);
$pdf->Cell(50, 6, 'SEKOLAH', 1, 0);
$pdf->Cell(50, 6, 'JURUSAN', 1, 0);
$pdf->Cell(30, 6, 'NO HP', 1, 0);
$pdf->Cell(50, 6, 'ALAMAT', 1, 1);

// Mengatur font untuk isi tabel
$pdf->SetFont('Arial', '', 10);

// Koneksi ke database
include './koneksi.php'; // Pastikan path sesuai dengan lokasi file koneksi.php

// Cek koneksi
if (!$con) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data peserta
$result = mysqli_query($con, "SELECT * FROM peserta");

// Cek apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($con));
}

// Looping untuk menampilkan data peserta dalam tabel
while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 10, $data['id_peserta'], 1);
    $pdf->Cell(50, 10, $data['nama'], 1);
    $pdf->Cell(50, 10, $data['sekolah'], 1);
    $pdf->Cell(50, 10, $data['jurusan'], 1);
    $pdf->Cell(30, 10, $data['no_hp'], 1);
    $pdf->Cell(50, 10, $data['alamat'], 1, 1);
}

// Output file PDF
$pdf->Output();
?>
