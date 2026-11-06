<?php
include("koneksi.php");

// ---------- CREATE ----------
if (isset($_POST['tambah'])) {
    $nama     = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat   = $_POST['alamat'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO pembeli(nama, nomor_hp, alamat) VALUES(?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $nomor_hp, $alamat);
    mysqli_stmt_execute($stmt);

    header("Location: pembeli.php");
    exit;
}

// ---------- UPDATE ----------
if (isset($_POST['update'])) {
    $id       = (int) $_POST['id'];
    $nama     = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat   = $_POST['alamat'];

    $stmt = mysqli_prepare($koneksi, "UPDATE pembeli SET nama=?, nomor_hp=?, alamat=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $nomor_hp, $alamat, $id);
    mysqli_stmt_execute($stmt);

    header("Location: pembeli.php");
    exit;
}

// ---------- DELETE ----------
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM pembeli WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    header("Location: pembeli.php");
    exit;
}

// ---------- Mode edit ----------
$edit = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM pembeli WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $edit = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
}

// ---------- READ ----------
$read = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head><title>CRUD Pembeli</title></head>
<body>
    <?php include("nav.php"); ?>
    <h1>Data Pembeli</h1>

    <h3><?php echo $edit ? "Edit Pembeli" : "Tambah Pembeli"; ?></h3>
    <form method="POST" action="pembeli.php">
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
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $edit ? htmlspecialchars($edit['alamat']) : ''; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php if ($edit) { ?>
                        <input type="submit" name="update" value="Update">
                        <a href="pembeli.php">Batal</a>
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
            <th>Alamat</th>
            <th>Operasi</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($read)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['nomor_hp']); ?></td>
            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
            <td>
                <a href="pembeli.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                <a href="pembeli.php?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
