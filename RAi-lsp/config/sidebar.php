<!-- sidebar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi Smk Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-light border-end" style="width: 220px; height: 100vh;">
        <div class="sidebar-heading p-3 d-flex align-items-center">
            <img src="/assets/logo.png" alt="Logo" width="30" height="30" class="me-2">
            <strong>Absensi Smk Indonesia</strong>
        </div>
        <div class="list-group list-group-flush">
            <a href="/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="/siswa/tambah.php" class="list-group-item list-group-item-action">Tambah Siswa</a>
            <a href="/siswa/data.php" class="list-group-item list-group-item-action">Data Siswa</a>
            <a href="/absensi/input.php" class="list-group-item list-group-item-action">Input Absensi</a>
            <a href="/absensi/laporan.php" class="list-group-item list-group-item-action">Laporan Absensi</a>
            <a href="/fungsi/logout.php" class="list-group-item list-group-item-action text-danger">Logout</a>
        </div>
    </div>

    <!-- Main content -->
    <div class="p-4" style="flex-grow: 1;">
