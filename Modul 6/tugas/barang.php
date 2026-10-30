<?php
include("koneksi.php");

// ---------- CREATE ----------
if (isset($_POST['tambah'])) {
    $nama  = $_POST['nama'];
    $harga = (int) $_POST['harga'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO barang(nama, harga) VALUES(?, ?)");
    mysqli_stmt_bind_param($stmt, "si", $nama, $harga);
    mysqli_stmt_execute($stmt);

    header("Location: barang.php");
    exit;
}

// ---------- UPDATE ----------
if (isset($_POST['update'])) {
    $id    = (int) $_POST['id'];
    $nama  = $_POST['nama'];
    $harga = (int) $_POST['harga'];

    $stmt = mysqli_prepare($koneksi, "UPDATE barang SET nama=?, harga=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sii", $nama, $harga, $id);
    mysqli_stmt_execute($stmt);

    header("Location: barang.php");
    exit;
}

// ---------- DELETE ----------
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM barang WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    header("Location: barang.php");
    exit;
}

// ---------- Mode edit: ambil data yang akan diubah ----------
$edit = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM barang WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $edit = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
}

// ---------- READ ----------
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>CRUD Barang</title></head>
<body>
    <?php include("nav.php"); ?>
    <h1>Data Barang</h1>

    <h3><?php echo $edit ? "Edit Barang" : "Tambah Barang"; ?></h3>
    <form method="POST" action="barang.php">
        <?php if ($edit) { ?>
            <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
        <?php } ?>
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $edit ? htmlspecialchars($edit['nama']) : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" value="<?php echo $edit ? $edit['harga'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php if ($edit) { ?>
                        <input type="submit" name="update" value="Update">
                        <a href="barang.php">Batal</a>
                    <?php } else { ?>
                        <input type="submit" name="tambah" value="Tambah">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>

    <br>
    <table border="1" cellpadding="4">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Operasi</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($read)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="barang.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                <a href="barang.php?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
