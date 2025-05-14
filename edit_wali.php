
<?php 
include 'koneksi.php';

if (isset($_GET['id'])){
    $id_wali = $_GET ['id'];
    $query = "SELECT * FROM wali_murid WHERE id_wali = $id_wali";
    $result = mysqli_query($koneksi, $query);
    $wali_murid = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_wali = $_POST['nama_wali'];

    $query_update = "UPDATE wali_murid SET nama_wali = '$nama_wali' WHERE id_wali=$id_wali";

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
    <title> Edit Kelas </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4" >
    <h2> Edit Data Wali </h2>
    <form method="POST">
        <label >Nama Kelas </label>
        <input type="text" name="nama_wali" value ="<?php echo $wali_murid['nama_wali']; ?>" required>
    </div>
    <button type="submit">Update</button>
    <a href="index.php">Batal</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</html>