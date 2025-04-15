<?php include '../config/sidebar.php'; ?>
<?php
include '../koneksi/db.php';

// Simpan data absensi
if ($_POST) {
    $siswa_id = $_POST['siswa_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    $conn->query("INSERT INTO absensi (siswa_id, tanggal, status) VALUES ('$siswa_id', '$tanggal', '$status')");
    
    // Redirect ke dashboard setelah berhasil simpan
    header("Location: ../absensi/laporan.php");
    exit;
}

// Ambil kelas unik
$kelas_result = $conn->query("SELECT DISTINCT kelas FROM siswa");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-4">Input Absensi</h2>
    <form method="POST" class="fs-5">
        <!-- Kelas -->
        <div class="mb-3">
            <label class="form-label">Pilih Kelas:</label>
            <select name="kelas" id="kelas" class="form-select" onchange="getSiswaByKelas(this.value)">
                <option value="">-- Pilih --</option>
                <?php while ($k = $kelas_result->fetch_assoc()) {
                    echo "<option value='{$k['kelas']}'>{$k['kelas']}</option>";
                } ?>
            </select>
        </div>

        <!-- NIS -->
        <div class="mb-3">
            <label class="form-label">Pilih NIS:</label>
            <select name="siswa_id" id="nis-dropdown" class="form-select" onchange="getNama(this.value)">
                <option value="">-- Pilih --</option>
            </select>
        </div>

        <!-- Nama -->
        <div class="mb-3">
            <label class="form-label">Nama Siswa:</label>
            <div id="nama-siswa" class="form-control">-</div>
        </div>

        <!-- Tanggal -->
        <div class="mb-3">
            <label class="form-label">Tanggal:</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select name="status" class="form-select" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>

        <button class="btn btn-primary w-100">Simpan Absensi</button>
    </form>
</div>

<script>
function getSiswaByKelas(kelas) {
    fetch('get_siswa.php?kelas=' + kelas)
    .then(response => response.json())
    .then(data => {
        let dropdown = document.getElementById('nis-dropdown');
        dropdown.innerHTML = '<option value="">-- Pilih --</option>';
        data.forEach(siswa => {
            dropdown.innerHTML += `<option value="${siswa.id}">${siswa.nis}</option>`;
        });
        document.getElementById('nama-siswa').innerText = '-';
    });
}

function getNama(siswa_id) {
    fetch('get_nama.php?id=' + siswa_id)
    .then(response => response.text())
    .then(nama => {
        document.getElementById('nama-siswa').innerText = nama;
    });
}
</script>
