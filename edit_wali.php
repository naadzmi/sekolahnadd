<?php 
include 'koneksi.php';

if (isset($_GET['id'])){
    $id_wali = $_GET['id'];
    $query = "SELECT * FROM wali_murid WHERE id_wali = $id_wali";
    $result = mysqli_query($koneksi, $query);
    $wali_murid = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_wali = $_POST['nama_wali'];

    $query_update = "UPDATE wali_murid SET nama_wali = '$nama_wali' WHERE id_wali = $id_wali";

    if (mysqli_query($koneksi, $query_update)) {
        header("Location: kelola_wali.php");
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
    <title>Edit Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Edit Data Wali Murid</h2>

        <form method="POST" class="w-50">
            <div class="mb-3">
                <label class="form-label">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" value="<?php echo $wali_murid['nama_wali']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="kelola_wali.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
