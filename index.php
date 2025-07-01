<?php
include 'koneksi_crud.php';
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PesanRasa</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="asset/banner.png" alt="Logo PesanRasa">
            <h2>PesanRasa</h2>
        </div>
        <!-- <div class="waktu">
            <p><?php echo date("H:i:s"); ?></p>
        </div> -->
        <div class="login">
            <a href="admin/login.php">Login</a>
        </div>
    </div>
    <div class="container">
        <div class="banner">
            <div class="banner-pesan">
                <h1>Selamat Datang di <span>PesanRasa</span></h1>
                <p>PesanRasa adalah platform untuk memesan makanan dan minuman secara cepat dan mudah.</p>
                <a href="#menu" class="btn">Lihat Menu</a>
            </div>
            <div class="banner-img">
                <img src="asset/banner.png" alt="">
            </div>
        </div>
    </div>
    <div class="container-menu" id="menu">
        <div class="menu-makanan">
            <h2>Menu Makanan</h2>
            <hr />
            <div class="menu-card">
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-minuman">
            <h2>Menu Minuman</h2>
            <hr />
            <div class="menu-card">
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
                <div class="menu-items">
                    <img src="asset/makanan1.png" alt="Makanan 1">
                    <h3>Nasi Goreng Spesial</h3>
                    <p>Rp. 20.000</p>
                    <div class="tambah-pesanan">
                        <button class="btn-tambah">Tambah Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-pesan">
        <a href="pesan.php" class="btn">Pesan Sekarang</a>
    </div>
</body>