<?php
include("koneksi.php");
$read = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Post News Ter-Update!</title></head>
<body>
    <h1>Post News Ter-Update!</h1>
    <a href="create.php"><button>Tambah Post</button></a>
    <?php
    $no = 1;
    while ($post = mysqli_fetch_array($read)) {
        echo "<h2>" . $no++ . ". " . htmlspecialchars($post['judul']) . "</h2>";
        echo "<a href='update.php?id=$post[id]'>Edit</a> | ";
        echo "<a href='delete.php?id=$post[id]' onclick=\"return confirm('Hapus post ini?')\">Delete</a>";

        // pisahkan konten menjadi paragraf berdasarkan baris kosong
        $paragraf = preg_split('/\R\s*\R/', trim($post['konten']));
        foreach ($paragraf as $p) {
            echo "<p>" . nl2br(htmlspecialchars($p)) . "</p>";
        }
    }
    ?>
</body>
</html>
