<?php include '../config/sidebar.php'; ?>
<?php
include '../koneksi/db.php';
$result = $conn->query("SELECT a.id, s.nama, s.kelas, a.tanggal, a.status 
                        FROM absensi a 
                        JOIN siswa s ON a.siswa_id = s.id");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-4">Laporan Absensi</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <button onclick="window.print()" class="btn btn-success mt-3">Cetak Laporan</button>
</div>
