<?php
session_start();

// Data user disimpan dalam array
$users = [
    [
        "username" => "admin",
        "password" => "admin123"
    ],
    [
        "username" => "mahasiswa",
        "password" => "mhs2023"
    ]
];

$error = false;

if (isset($_POST['login'])) {
    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] === $input_user && $user['password'] === $input_pass) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['last_login_time'] = time(); // Simpan timestamp login
            header("Location: index.php");
            exit();
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas - Login Array</title>
</head>
<body>
    <h2>Form Login (Array Check)</h2>
    <?php if ($error) : ?>
        <p style="color: red; italic;">Username / Password salah!</p>
    <?php endif; ?>

    <form action="" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>