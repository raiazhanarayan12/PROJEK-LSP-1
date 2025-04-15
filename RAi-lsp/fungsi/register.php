<?php
include '../koneksi/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah digunakan
    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";
        if ($conn->query($sql)) {
            $success = "Registrasi berhasil. <a href='login.php'>Login sekarang</a>";
        } else {
            $error = "Registrasi gagal: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .register-box {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        .register-box h2 {
            margin-bottom: 24px;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: 0.3s;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #43e97b;
            outline: none;
        }
        button {
            background: #43e97b;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        button:hover {
            background: #38f9d7;
        }
        .message {
            margin-bottom: 16px;
            font-size: 14px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        .login-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .login-link a {
            color: #43e97b;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun Baru</h2>
        <?php if (isset($error)) echo "<div class='message error'>$error</div>"; ?>
        <?php if (isset($success)) echo "<div class='message success'>$success</div>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Buat Username" required>
            <input type="password" name="password" placeholder="Buat Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>
