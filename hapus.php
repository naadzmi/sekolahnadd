<?php
// koneksi ke database
include 'koneksi.php';

$nis = $_GET['nis'];

// Ambil NIS dari URL
$sql = "DELETE FROM siswa WHERE nis = '$nis'";

// Eksekusi query
if (mysqli_query($koneksi, $sql)) {
    // Jika berhasil, redirect kembali ke halaman index
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}


?>