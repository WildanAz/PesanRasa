<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PesanRasa</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo-area">
                <img src="../asset/logo.png" alt="Logo" class="logo-img">
                <h3>PesanRasa</h3>
            </div>
            <nav class="nav-menu">
                <p>Menu</p>
                <ul>
                    <li><a href="#">Dashboard Pemesanan</a></li>
                    <li><a href="#">Data Pemesanan</a></li>
                    <li><a href="#">Data Menu Makanan</a></li>
                    <li><a href="#">Data Menu Minuman</a></li>
                </ul>
            </nav>
        </div>

        <!-- Mainbar -->
        <div class="mainbar">
            <div class="topbar">
                <p>Selamat datang, Wildan <span class="icon-user">👤</span></p>
            </div>

            <div class="status-boxes">
                <div class="status-card pending">
                    <p>Pesanan Pending</p>
                    <h2>10</h2>
                </div>
                <div class="status-card selesai">
                    <p>Pesanan Selesai</p>
                    <h2>5</h2>
                </div>
            </div>

            <div class="table-section">
                <h3>Tabel Pemesanan</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Makanan</th>
                            <th>Minuman</th>
                            <th>Nomor Meja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td></td><td></td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td><td></td></tr>
                        <!-- Tambah baris lainnya -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
