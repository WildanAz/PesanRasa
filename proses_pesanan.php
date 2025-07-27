<?php
require 'koneksi_crud.php';
if (!isset($_POST['konfirmasi'])) {
    // Tampilkan halaman konfirmasi
    $nama = $_POST['nama_pelanggan'] ?? '';
    $meja = $_POST['nomor_meja'] ?? '';
    $makanan = $_POST['makanan'] ?? [];
    $minuman = $_POST['minuman'] ?? [];

    $makananList = implode(', ', $makanan);
    $minumanList = implode(', ', $minuman);
    $createdAt = date('Y-m-d H:i:s');

$query = "INSERT INTO pesanan (nama_pelanggan, makanan, minuman, nomor_meja, status, created_at)
          VALUES (?, ?, ?, ?, 'diterima', ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'sssis', $nama, $makananList, $minumanList, $meja, $createdAt);
$success = mysqli_stmt_execute($stmt);
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Konfirmasi Pesanan</title>
    </head>

    <body>
        <?php if ($success): ?>
            <h2>Terima kasih, <?= htmlspecialchars($nama) ?>!</h2>
            <p>Pesanan berhasil disimpan.</p>
        <?php else: ?>
            <p>Terjadi kesalahan saat menyimpan pesanan.</p>
        <?php endif; ?>
        <a href="index.php">Kembali ke Menu</a>
    </body>

    </html>

    <?php
    exit;
}
?>