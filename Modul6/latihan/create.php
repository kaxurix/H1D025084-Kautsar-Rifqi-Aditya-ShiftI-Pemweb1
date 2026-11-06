<?php
include("koneksi.php");
if (isset($_POST['tambah'])) {
    $judul  = $_POST['judul'];
    $konten = $_POST['konten'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO posts(judul, konten) VALUES(?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $judul, $konten);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Tambah Post</title></head>
<body>
    <h1>Tambah Post Berita!</h1>
    <a href="index.php">Batal</a>
    <br><br>
    <form action="create.php" method="POST">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" maxlength="100" required></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" rows="10" cols="40" maxlength="1000" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
