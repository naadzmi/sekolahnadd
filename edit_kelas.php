<?php 
include 'koneksi.php';

if (isset($_GET['id'])){
    $id_kelas = $_GET['id'];
    $query = "SELECT * FROM kelas WHERE id_kelas = $id_kelas";
    $result = mysqli_query($koneksi, $query);
    $kelas = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kelas = $_POST['nama_kelas'];

    $query_update = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = $id_kelas";

    if (mysqli_query($koneksi, $query_update)) {
        header("Location: kelola_kelas.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h2 class="mb-4">Edit Data Kelas</h2>

    <form method="POST" class="w-50">
        <div class="mb-3">
            <label class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="<?php echo $kelas['nama_kelas']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="kelola_kelas.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
