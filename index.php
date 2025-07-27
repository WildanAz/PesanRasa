<?php
include 'koneksi_crud.php';

// Ambil menu dari database
$result_makanan = mysqli_query($conn, "SELECT * FROM menu WHERE kategori = 'makanan'");
$result_minuman = mysqli_query($conn, "SELECT * FROM menu WHERE kategori = 'minuman'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PesanRasa</title>
    <link rel="stylesheet" href="dsa.css">
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="asset/banner.png" alt="Logo PesanRasa">
        <h2>PesanRasa</h2>
    </div>
    <div class="login">
        <a href="admin/login.php">Login</a>
    </div>
</div>

<div class="container">
    <div class="banner">
        <div class="banner-pesan">
            <h1>Selamat Datang di <span>PesanRasa</span></h1>
            <p>Platform pemesanan makanan & minuman cepat dan mudah.</p>
            <a href="#menu" class="btn">Lihat Menu</a>
        </div>
        <div class="banner-img">
            <img src="asset/banner.png" alt="Banner Image">
        </div>
    </div>

    <div class="container-menu" id="menu">
        <form action="pesan.php" method="POST">
            <h2>Form Pemesanan</h2>
            <label for="nama_pelanggan">Nama Pelanggan:</label><br>
            <input type="text" name="nama_pelanggan" required><br><br>

            <label for="nomor_meja">Nomor Meja:</label><br>
            <input type="number" name="nomor_meja" required><br><br>

            <!-- Menu Makanan -->
            <h2>Makanan</h2>
            <hr>
            <div class="menu-card">
                <?php while ($row = mysqli_fetch_assoc($result_makanan)): ?>
                    <div class="menu-items">
                        <img src="asset/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>">
                        <h3><?= htmlspecialchars($row['nama']) ?></h3>
                        <p>Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                        <input type="checkbox" id="<?= $row['id'] ?>" class="checkbox-tambah" name="makanan[]" value="<?= $row['nama'] ?>">
                        <label for="<?= $row['id'] ?>" class="btn-tambah">Pilih</label>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Menu Minuman -->
            <h2>Minuman</h2>
            <hr>
            <div class="menu-card">
                <?php while ($row = mysqli_fetch_assoc($result_minuman)): ?>
                    <div class="menu-items">
                        <img src="asset/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" >
                        <h3><?= htmlspecialchars($row['nama']) ?></h3>
                        <p>Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                        <input type="checkbox" id="<?= $row['id'] ?>" class="checkbox-tambah" name="minuman[]" value="<?= $row['nama'] ?>">
                        <label for="<?= $row['id'] ?>" class="btn-tambah">Pilih</label>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="btn-pesan">
                <button type="submit" class="btn">Pesan Sekarang</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
