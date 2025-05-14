<?php
include 'koneksi.php';

$nis = $_GET['nis'] ?? '';

// Validasi input
if (!$nis) {
    echo "NIS tidak ditemukan!";
    exit;
}

// Ambil data siswa
$query = $koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$data = $query->fetch_assoc();

// Ambil data kelas & wali untuk dropdown
$kelas = $koneksi->query("SELECT * FROM kelas");
$wali = $koneksi->query("SELECT * FROM wali_murid");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Data Siswa</h2>
    <form action="update_siswa.php" method="POST">

        <input type="hidden" name="nis" value="<?php echo $data['nis']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" required>
                <option value="L" <?php if($data['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
                <option value="P" <?php if($data['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="id_kelas" class="form-select" required>
                <?php while($row = $kelas->fetch_assoc()): ?>
                    <option value="<?= $row['id_kelas']; ?>" <?php if($data['id_kelas'] == $row['id_kelas']) echo 'selected'; ?>>
                        <?= $row['nama_kelas']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Wali Murid</label>
            <select name="id_wali" class="form-select" required>
                <?php while($row = $wali->fetch_assoc()): ?>
                    <option value="<?= $row['id_wali']; ?>" <?php if($data['id_wali'] == $row['id_wali']) echo 'selected'; ?>>
                        <?= $row['nama_wali']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
