<?php
include("koneksi.php");

if (isset($_POST['update'])) {
    $id     = (int) $_POST['id'];
    $judul  = $_POST['judul'];
    $konten = $_POST['konten'];

    $stmt = mysqli_prepare($koneksi, "UPDATE posts SET judul=?, konten=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $judul, $konten, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];
$stmt = mysqli_prepare($koneksi, "SELECT judul, konten FROM posts WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);
if (!$data) {
    die("Post tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Edit Post</title></head>
<body>
    <h1>Edit Post Berita!</h1>
    <a href="index.php">Batal</a>
    <br><br>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" maxlength="100" value="<?php echo htmlspecialchars($data['judul']); ?>" required></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" rows="10" cols="40" maxlength="1000" required><?php echo htmlspecialchars($data['konten']); ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
