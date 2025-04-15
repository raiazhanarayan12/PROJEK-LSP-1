<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: fungsi/login.php");
}
?>
<?php include 'config/sidebar.php'; ?>
<h2>Selamat Datang di Aplikasi Absensi</h2>
<p>Silakan pilih menu di sebelah kiri untuk mengelola data.</p>

<head><!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
