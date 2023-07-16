<?php
include "config.php";
$editTask = $_POST['edit_task'];
$ID = $_POST['task_id'];

// Update data tugas dalam tabel
$query = "UPDATE tbltodo SET list = '$editTask' WHERE id = '$ID'";
$result = mysqli_query($con, $query);

if ($result) {
  // Jika berhasil, arahkan pengguna kembali ke halaman utama dengan pesan sukses
  header("Location: index.php?msg=Edit Tugas Berhasil");
} else {
  // Jika gagal, arahkan pengguna kembali ke halaman utama dengan pesan gagal
  header("Location: index.php?msg=Gagal edit tugas");
}
?>