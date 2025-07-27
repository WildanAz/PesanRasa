-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 07:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesanrasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'wildan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kategori` enum('makanan','minuman','snack') DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `kategori`, `harga`, `gambar`) VALUES
(1, 'Nasi Goreng', 'makanan', 15000, 'nasi_goreng.jpeg'),
(2, 'Mie Ayam', 'makanan', 12000, 'mie_ayam.jpeg'),
(3, 'Es Teh', 'minuman', 9000, 'es_teh.jpeg'),
(4, 'Jus Jeruk', 'minuman', 7000, 'jus_jeruk.jpeg'),
(6, 'Bakso', 'makanan', 18000, 'bakso.jpeg'),
(7, 'Soto Ayam', 'makanan', 17000, 'soto_ayam.jpeg'),
(8, 'Ayam Geprek', 'makanan', 16000, 'ayam_geprek.jpeg'),
(9, 'Teh Tarik', 'minuman', 10000, 'teh_tarik.jpeg'),
(10, 'Kopi Hitam', 'minuman', 8000, 'kopi_hitam.jpeg'),
(11, 'Air Mineral', 'minuman', 5000, 'air_mineral.jpeg'),
(12, 'Ayam Penyet', 'makanan', 23000, 'ayam_penyet.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `makanan` text DEFAULT NULL,
  `minuman` text DEFAULT NULL,
  `snack` text DEFAULT NULL,
  `nomor_meja` int(11) DEFAULT NULL,
  `status` enum('diterima','diproses','diantar','selesai','dibatalkan') DEFAULT 'diterima',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pelanggan`, `makanan`, `minuman`, `snack`, `nomor_meja`, `status`, `created_at`) VALUES
(9, 'wildan', 'Nasi Goreng, Mie Ayam', 'Jus Jeruk', NULL, 2, 'diproses', '2025-07-26 13:41:18'),
(10, 'fauzan', 'Nasi Goreng', 'Es Teh', NULL, 4, 'diterima', '2025-07-26 13:43:10'),
(11, 'adi', 'Nasi Goreng, Mie Ayam', 'Es Teh, Jus Jeruk', NULL, 2, 'selesai', '2025-07-26 16:52:46'),
(12, 'zaki', 'Mie Ayam, Ayam Geprek', 'Kopi Hitam, Air Mineral', NULL, 8, 'diproses', '2025-07-26 17:12:33'),
(13, 'tedi', 'Soto Ayam, Ayam Geprek', '', NULL, 11, 'diterima', '2025-07-26 17:15:47'),
(14, 'budi', 'Ayam Geprek, Ayam Penyet', 'Kopi Hitam, Air Mineral', NULL, 17, 'diterima', '2025-07-26 22:52:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
