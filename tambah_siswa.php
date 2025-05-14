<?php 
include 'koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $id_wali = $_POST['id_wali'];

    $sql = "INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, id_kelas, id_wali)
    VALUES ('$nis', '$nama_siswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$id_kelas', '$id_wali')";

    if(mysqli_query($koneksi, $sql)){
        echo "<script>alert('Data siswa berhasil disimpan'); window.location='index.php'</script>";
    } else {
        echo "<script>alert('Data siswa gagal disimpan');</script>";
    }
}

$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
$wali = mysqli_query($koneksi, "SELECT * FROM wali_murid");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h2 class="mb-4">Tambah Siswa</h2>

    <form method="POST" class="row g-3">

        <div class="col-md-6">
            <label class="form-label">NIS:</label>
            <input type="text" name="nis" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Nama Siswa:</label>
            <input type="text" name="nama_siswa" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Kelas:</label>
            <select name="id_kelas" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                <?php while($data = mysqli_fetch_assoc($kelas)): ?>
                    <option value="<?= $data['id_kelas']; ?>"><?= $data['nama_kelas']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Wali Murid:</label>
            <select name="id_wali" class="form-select" required>
                <option value="">-- Pilih Wali --</option>
                <?php while($data = mysqli_fetch_assoc($wali)): ?>
                    <option value="<?= $data['id_wali']; ?>"><?= $data['nama_wali']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </div>

    </form>

</body>
</html>
