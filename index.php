<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Judul Halaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h1 class="mb-4">Data Anak</h1>
        <a href="kelola_kelas.php" class="btn btn-primary mb-2">Kelola Kelas</a>
        <a href="kelola_wali.php" class="btn btn-primary mb-2">Kelola Wali Murid</a>
        <a href="tambah_siswa.php" class="btn btn-success mb-4">Tambah Siswa</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Wali Murid</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    <?php
    include 'koneksi.php';

    $sql = "SELECT siswa.*, kelas.nama_kelas, wali_murid.nama_wali FROM siswa 
    LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
    LEFT JOIN wali_murid ON siswa.id_wali = wali_murid.id_wali";

    $result = mysqli_query($koneksi, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$data['nis']}</td>
            <td>{$data['nama_siswa']}</td>
            <td>{$data['jenis_kelamin']}</td>
            <td>{$data['tempat_lahir']}</td>
            <td>{$data['tanggal_lahir']}</td>
            <td>{$data['nama_kelas']}</td>
            <td>{$data['nama_wali']}</td>
            <td>
                <a href='edit_siswa.php?nis={$data['nis']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='hapus.php?nis={$data['nis']}' onclick='return confirm(\"Yakin mau hapus?\")' class='btn btn-danger btn-sm'>Hapus</a>
            </td>
        </tr>";
    }
    ?>
</tbody>

        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
