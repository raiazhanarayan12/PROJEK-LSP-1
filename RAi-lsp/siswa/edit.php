<?php
include '../koneksi/db.php';

// Ambil data siswa berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $siswa = $conn->query("SELECT * FROM siswa WHERE id = $id")->fetch_assoc();
}

// Proses update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $conn->query("UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas' WHERE id=$id");
    header("Location: data.php");
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Edit Data Siswa</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" value="<?= $siswa['nis'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" value="<?= $siswa['kelas'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="data.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
