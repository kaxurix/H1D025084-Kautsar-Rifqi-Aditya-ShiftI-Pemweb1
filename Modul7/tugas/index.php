<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

// Cek timeout (10 detik)
$timeout = 10;
if (isset($_SESSION['last_login_time'])) {
    $session_life = time() - $_SESSION['last_login_time'];
    if ($session_life > $timeout) {
        session_unset();
        session_destroy();
        header("Location: login.php?status=expired");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas - Halaman Utama</title>
    <!-- Automatic refresh/redirect ke login setelah 10 detik via Meta Tag -->
    <meta http-equiv="refresh" content="10;url=logout.php">
</head>
<body>
    <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Anda telah berhasil masuk ke sistem.</p>
    <p><strong>Catatan:</strong> Halaman ini akan otomatis keluar (logout) dan kembali ke halaman login dalam waktu 10 detik.</p>
    
    <a href="logout.php">Logout Manual</a>
</body>
</html>