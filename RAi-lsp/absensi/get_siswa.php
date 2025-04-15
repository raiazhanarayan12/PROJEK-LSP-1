<?php
include '../koneksi/db.php';
$kelas = $_GET['kelas'];
$result = $conn->query("SELECT id, nis FROM siswa WHERE kelas='$kelas'");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
