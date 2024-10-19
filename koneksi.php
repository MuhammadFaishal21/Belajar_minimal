


<?php
$host = "localhost"; // Biasanya localhost
$user = "root"; // Ganti dengan username database
$pass = ""; // Ganti dengan password database
$db = "crud"; // Ganti dengan nama database

// Membuat koneksi
$con = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$con) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
