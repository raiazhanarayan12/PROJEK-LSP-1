<?php
include '../koneksi/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT nama FROM siswa WHERE id=$id");
$row = $result->fetch_assoc();
echo $row['nama'];
