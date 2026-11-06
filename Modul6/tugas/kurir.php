<?php
include("koneksi.php");

// ---------- CREATE ----------
if (isset($_POST['tambah'])) {
    $nama     = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO kurir(nama, nomor_hp) VALUES(?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $nama, $nomor_hp);
    mysqli_stmt_execute($stmt);

    header("Location: kurir.php");
    exit;
}

// ---------- UPDATE ----------
if (isset($_POST['update'])) {
    $id       = (int) $_POST['id'];
    $nama     = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];

    $stmt = mysqli_prepare($koneksi, "UPDATE kurir SET nama=?, nomor_hp=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $nama, $nomor_hp, $id);
    mysqli_stmt_execute($stmt);

    header("Location: kurir.php");
    exit;
}

// ---------- DELETE ----------
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM kurir WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    header("Location: kurir.php");
    exit;
}

// ---------- Mode edit ----------
$edit = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM kurir WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $edit = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
}

// ---------- READ ----------
$read = mysqli_query($koneksi, "SELECT * FROM kurir ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>CRUD Kurir</title></head>
<body>
    <?php include("nav.php"); ?>
    <h1>Data Kurir</h1>

    <h3><?php echo $edit ? "Edit Kurir" : "Tambah Kurir"; ?></h3>
    <form method="POST" action="kurir.php">
        <?php if ($edit) { ?>
            <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
        <?php } ?>
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $edit ? htmlspecialchars($edit['nama']) : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="nomor_hp" value="<?php echo $edit ? htmlspecialchars($edit['nomor_hp']) : ''; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php if ($edit) { ?>
                        <input type="submit" name="update" value="Update">
                        <a href="kurir.php">Batal</a>
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
            <th>Nomor HP</th>
            <th>Operasi</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($read)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['nomor_hp']); ?></td>
            <td>
                <a href="kurir.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                <a href="kurir.php?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
