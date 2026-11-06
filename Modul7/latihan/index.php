<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
</head>
<body>
    <h2>Hallo <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>Selamat Datang Di Halaman Latihan Belajar Session dan User Authenthication!</p>
    <p>Password anda adalah: <?php echo htmlspecialchars($_SESSION['password']); ?></p>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>