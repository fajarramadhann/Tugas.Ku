<?php
$host = "localhost"; // nama host
$user = "root"; // nama pengguna
$pass = "jarss"; // kata sandi
$dbname = "tugasku"; // nama database

// Membuat koneksi
$con = mysqli_connect($host, $user, $pass, $dbname);

// // Memeriksa koneksi
// if (!$con) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi apa";
?>