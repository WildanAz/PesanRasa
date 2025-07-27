<?php
include 'koneksi_crud.php';

if (isset($_POST['edit_id'])) {
    // Ambil data menu berdasarkan ID
    $id = $_POST['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $menu = $stmt->get_result()->fetch_assoc();
} elseif (isset($_POST['update'])) {
    // Update data menu
    $stmt = $conn->prepare("UPDATE menu SET nama = ?, kategori = ?, harga = ? WHERE id = ?");
    $stmt->bind_param("ssii", $_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['id']);
    $stmt->execute();
    header("Location: tabelmenu.php");
    exit;
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Menu</title>
</head>
<body>
    <h2>Edit Menu</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $menu['id'] ?>">
        <label>Nama</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($menu['nama']) ?>"><br>
        <label>Kategori</label><br>
        <input type="text" name="kategori" value="<?= htmlspecialchars($menu['kategori']) ?>"><br>
        <label>Harga</label><br>
        <input type="number" name="harga" value="<?= htmlspecialchars($menu['harga']) ?>"><br><br>
        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</body>
</html>
