<?php
include '../koneksi/db.php';

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM absensi WHERE id = $id");
$data = $query->fetch_assoc();

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $update = $conn->query("UPDATE absensi SET tanggal='$tanggal', status='$status' WHERE id=$id");

    if ($update) {
        header("Location: laporan.php"); // Ganti sesuai nama halaman utama
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Edit Absensi</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Hadir" <?= $data['status'] == 'Hadir' ? 'selected' : '' ?>>Hadir</option>
                <option value="Izin" <?= $data['status'] == 'Izin' ? 'selected' : '' ?>>Izin</option>
                <option value="Sakit" <?= $data['status'] == 'Sakit' ? 'selected' : '' ?>>Sakit</option>
                <option value="Alpha" <?= $data['status'] == 'Alpha' ? 'selected' : '' ?>>Alpha</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="laporan.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
