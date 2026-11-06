<?php
require 'koneksi.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if ($password !== $konfirmasi_password) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
    } else {
        $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
        if (mysqli_num_rows($cek_user) > 0) {
            echo "<script>alert('Username sudah terdaftar!');</script>";
        } else {
            $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
            } else {
                echo "<script>alert('Registrasi gagal!');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Register</title>
</head>
<body>
    <h2>Halaman Registrasi Akun Mahasiswa</h2>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" required>
            </li>
            <br>
            <li>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required>
            </li>
            <br>
            <li>
                <label for="konfirmasi_password">Konfirmasi Password</label><br>
                <input type="password" name="konfirmasi_password" id="konfirmasi_password" required>
            </li>
            <br>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>
    <a href="login.php">Sudah memiliki akun?</a>
</body>
</html>