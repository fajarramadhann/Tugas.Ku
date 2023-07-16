<?php
include "./config.php";

// Mendapatkan nilai dari input pada modal
$_LIST = mysqli_real_escape_string($con, $_POST['list']);

// Validasi input
if (empty($_LIST)) {
    $msg = "Nama tugas tidak boleh kosong!";
} else {
    // Menjalankan perintah SQL INSERT
    $sql = "INSERT INTO tbltodo (list) VALUES ('$_LIST')";

    if (mysqli_query($con, $sql)) {
        $msg = "Tugas berhasil ditambahkan";
    } else {
        $msg = "Terjadi kesalahan: " . mysqli_error($con);
    }
}

// Menutup koneksi
mysqli_close($con);

// Redirect ke halaman utama
header("location:index.php?msg=" . urlencode($msg));
?>