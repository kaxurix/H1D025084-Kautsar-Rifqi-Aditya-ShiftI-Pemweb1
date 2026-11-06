<?php
include("koneksi.php");

// Gabungkan 3 tabel berdasarkan ID yang sama
$sql = "SELECT b.id, b.nama AS nama_barang, p.nama AS nama_pembeli, k.nama AS nama_kurir
        FROM barang b
        LEFT JOIN pembeli p ON p.id = b.id
        LEFT JOIN kurir k ON k.id = b.id
        ORDER BY b.id ASC";
$read = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Index COD Barang</title></head>
<body>
    <?php include("nav.php"); ?>
    <h1>Menampilkan data dari database!</h1>
    <table border="1" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Nama Pembeli</th>
            <th>Nama Kurir</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($read)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
            <td><?php echo htmlspecialchars($row['nama_pembeli'] ?? '-'); ?></td>
            <td><?php echo htmlspecialchars($row['nama_kurir'] ?? '-'); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
