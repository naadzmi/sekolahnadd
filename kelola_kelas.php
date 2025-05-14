<?php
include 'koneksi.php';

$query = "SELECT * FROM kelas";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kelas</title>
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h2 class="mb-4">Data Kelas</h2>

    <div class="mb-3">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
        <a href="tambah_siswa.php" class="btn btn-primary">Tambah Siswa</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id_kelas']; ?></td>
                <td><?= $row['nama_kelas']; ?></td>
                <td>
                    <a href="edit_kelas.php?id=<?= $row['id_kelas']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus_kelas.php?id=<?= $row['id_kelas']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>
