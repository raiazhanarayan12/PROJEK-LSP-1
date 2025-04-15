<?php
include '../koneksi/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus dulu data absensi yang berkaitan
    $conn->query("DELETE FROM absensi WHERE siswa_id = '$id'");

    // Lalu hapus siswa
    $hapus = $conn->query("DELETE FROM siswa WHERE id = '$id'");

    if ($hapus) {
        header("Location: data.php");
        exit;
    } else {
        echo "Gagal menghapus data siswa.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
