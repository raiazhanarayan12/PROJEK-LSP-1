<?php include '../config/sidebar.php'; ?>
<?php
include '../koneksi/db.php';
$result = $conn->query("SELECT * FROM siswa");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-3">Daftar Siswa</h2>
    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Siswa</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nis']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['kelas']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus siswa ini?')\">Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
