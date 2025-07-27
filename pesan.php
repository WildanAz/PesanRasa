<?php
include 'koneksi_crud.php';

// Ambil data dari POST (dikirim dari index.php)
$nama = $_POST['nama_pelanggan'] ?? '';
$meja = $_POST['nomor_meja'] ?? '';
$makanan = $_POST['makanan'] ?? [];
$minuman = $_POST['minuman'] ?? [];

$makananList = implode(', ', $makanan);
$minumanList = implode(', ', $minuman);
$createdAt = date('Y-m-d H:i:s');

$success = null;

// Proses konfirmasi
if (isset($_POST['konfirmasi'])) {
    if (empty($nama) || empty($meja)) {
        $error = "Nama dan nomor meja wajib diisi.";
    } else {
        $query = "INSERT INTO pesanan (nama_pelanggan, makanan, minuman, nomor_meja, status, created_at)
                  VALUES (?, ?, ?, ?, 'diterima', ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssis', $nama, $makananList, $minumanList, $meja, $createdAt);
        $success = mysqli_stmt_execute($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pesanan</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .box { max-width: 600px; margin: auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-kembali {
            background-color: #2ecc71;
            text-decoration: none;
        }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="box">
        <?php if ($success === true): ?>
            <h2>Pesanan Berhasil!</h2>
            <p>Terima kasih, <strong><?= htmlspecialchars($nama) ?></strong>!</p>
            <p><strong>Meja:</strong> <?= htmlspecialchars($meja) ?></p>
            <p><strong>Makanan:</strong> <?= $makananList ?: '-' ?></p>
            <p><strong>Minuman:</strong> <?= $minumanList ?: '-' ?></p>
            <a href="index.php" class="btn btn-kembali">Kembali ke Menu</a>

        <?php elseif ($success === false): ?>
            <h2>Gagal Menyimpan Pesanan</h2>
            <p>Terjadi kesalahan saat menyimpan pesanan Anda.</p>
            <a href="index.php" class="btn btn-kembali">Kembali ke Menu</a>

        <?php else: ?>
            <h2>Konfirmasi Pesanan</h2>
            <?php if (!empty($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
            <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
            <p><strong>Meja:</strong> <?= htmlspecialchars($meja) ?></p>
            <p><strong>Makanan:</strong> <?= $makananList ?: '-' ?></p>
            <p><strong>Minuman:</strong> <?= $minumanList ?: '-' ?></p>

            <form method="post" action="pesan.php">
                <!-- Kirim data kembali agar bisa diproses -->
                <input type="hidden" name="nama_pelanggan" value="<?= htmlspecialchars($nama) ?>">
                <input type="hidden" name="nomor_meja" value="<?= htmlspecialchars($meja) ?>">
                <?php foreach ($makanan as $m): ?>
                    <input type="hidden" name="makanan[]" value="<?= htmlspecialchars($m) ?>">
                <?php endforeach; ?>
                <?php foreach ($minuman as $m): ?>
                    <input type="hidden" name="minuman[]" value="<?= htmlspecialchars($m) ?>">
                <?php endforeach; ?>

                <input type="submit" name="konfirmasi" value="Konfirmasi Pesanan" class="btn">
                <a href="index.php" class="btn btn-kembali">Kembali ke Menu</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
