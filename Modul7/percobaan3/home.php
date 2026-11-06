<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Percobaan 3</title>
</head>

<body>
    <?php echo "<h1> Hallo " . $_SESSION["nama"] . ",</h1>"; ?>
    <h3> Selamat Datang Di Situs Kami </h3>

    <?php
    echo "Umur: " . $_SESSION["umur"] . " tahun <BR>";
    echo "Alamat email: " . $_SESSION["email"] . "<BR>";
    ?> <BR>
</body>

</html>