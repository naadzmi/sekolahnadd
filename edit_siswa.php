<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "sekolahnad");

// Ambil ID siswa dari URL
$nis = $_GET['nis'];

// Ambil data siswa berdasarkan NIS
$query = $koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
$data = $query->fetch_assoc();
?>

<h2>Edit Data Siswa</h2>

<form action="update_siswa.php" method="POST">
    <input type="hidden" name="nis" value="<?php echo $data['nis']; ?>">

    <p>Nama Siswa:
        <input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>">
        </p>

<p>Jenis Kelamin:
    <select name="jenis_kelamin">
        <option value="P" <?php if($data['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
        <option value="L" <?php if($data['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
    </select>
</p>

<p>Tempat Lahir:
    <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>">
</p>

<p>Tanggal Lahir:
    <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>">
</p>

<p>Id Kelas:
    <input type="text" name="id_kelas" value="<?php echo $data['id_kelas']; ?>">
</p>

<p>Id Wali:
        <input type="text" name="id_wali" value="<?php echo $data['id_wali']; ?>">
    </p>

    <p><button type="submit">Update</button></p>
</form>
