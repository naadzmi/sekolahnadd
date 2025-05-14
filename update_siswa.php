<?php
include 'koneksi.php';

if (isset($_POST['nis'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $id_wali = $_POST['id_wali'];

    $query = "UPDATE siswa SET 
                nama_siswa='$nama_siswa',
                jenis_kelamin='$jenis_kelamin',
                tempat_lahir='$tempat_lahir',
                tanggal_lahir='$tanggal_lahir',
                id_kelas='$id_kelas',
                id_wali='$id_wali' ";

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: index.php"); // balik ke data siswa
    } else {
        echo "Gagal update data!";
    }
}else {
    echo "NIS tidak ditemukan!";
}
?>