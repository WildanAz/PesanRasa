<?php
include 'koneksi_crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    // Pastikan folder uploads/ ada
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $upload = move_uploaded_file($tmp_name, $folder . $gambar);

    if ($upload) {
        $query = "INSERT INTO menu (nama, kategori, harga, gambar) VALUES ('$nama', '$kategori', '$harga', '$gambar')";
        if (mysqli_query($conn, $query)) {
            header("Location: tabelmenu.php");
            exit();
        } else {
            echo "Gagal menambahkan menu: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
</head>
<body>
    <h2>Tambah Menu Baru</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Nama Menu:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kategori:</label><br>
        <select name="kategori" required>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
        </select><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Gambar:</label><br>
        <input type="file" name="gambar" accept="*" required><br><br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="tabelmenu.php">Kembali ke Daftar Menu</a>
</body>
</html>
