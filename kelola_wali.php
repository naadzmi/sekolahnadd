<?php
include 'koneksi.php';

$query = "SELECT * FROM wali_murid ";
$result = mysqli_query($koneksi, $query);

?>

<html>
    <head>
            <tittle>Data Wali Murid</tittle>
    </head>
    <body>
        <a href="index.php"> Kembali</a>
        <a href="tambah_siswa.php"> Tambah Siswa </a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Wali</th>
                    <th>Nama Wali</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id_wali'] ?></td>
                    <td><?php echo $row['nama_wali'] ?></td>
                    <td><?php echo $row['kontak'] ?></td>
                    <td>
                        <a href="edit_wali.php?id=<?php echo $row['id_wali']; ?>">Edit</a>
                        <a href="#">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody
        </table>
    </body>
</html>