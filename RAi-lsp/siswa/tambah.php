<?php include '../config/sidebar.php'; ?>
<?php
include '../koneksi/db.php';
if ($_POST) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $conn->query("INSERT INTO siswa (nis, nama, kelas) VALUES ('$nis', '$nama', '$kelas')");
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Form Tambah Siswa</h2>
            <form method="POST" class="fs-5">
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
