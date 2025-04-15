<?php
include '../koneksi/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM absensi WHERE id = $id";
    if ($conn->query($query)) {
        header("Location: laporan.php"); // Ganti sesuai nama halaman utama
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
