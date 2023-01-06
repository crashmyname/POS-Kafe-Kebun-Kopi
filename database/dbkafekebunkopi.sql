-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 09:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkafekebunkopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `uid` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`uid`, `nm_user`, `username`, `password`, `role`) VALUES
(1, 'Ahmad Wildan', 'ojosmantap', '3702a64ecf3593ea4e4781164174cbf9', 'admin'),
(2, 'Wildan Wildan', 'wildan', 'af6b3aa8c3fcd651674359f500814679', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `tb_itempesanan`
--

CREATE TABLE `tb_itempesanan` (
  `id_item` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_itempesanan`
--

INSERT INTO `tb_itempesanan` (`id_item`, `id_pesanan`, `id_menu`, `harga`, `jumlah`) VALUES
(33, 29, 5, 48000, 1),
(34, 30, 10, 15000, 1),
(35, 31, 4, 22000, 1),
(36, 31, 5, 48000, 1),
(37, 32, 2, 21000, 1),
(38, 32, 3, 15000, 1),
(39, 33, 9, 48000, 1),
(40, 33, 9, 22000, 1),
(41, 34, 4, 22000, 1),
(42, 35, 11, 21000, 1),
(43, 35, 5, 48000, 1),
(44, 36, 5, 48000, 1),
(45, 36, 9, 22000, 1),
(112, 85, 5, 48000, 1),
(113, 85, 2, 22000, 2),
(114, 86, 5, 48000, 1),
(115, 86, 4, 22000, 2),
(116, 87, 5, 48000, 6),
(117, 87, 12, 18000, 4),
(118, 87, 4, 22000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(4) NOT NULL,
  `kapasitas` varchar(3) NOT NULL,
  `statusmeja` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`id_meja`, `no_meja`, `kapasitas`, `statusmeja`) VALUES
(1, '101', '4', 'Booking'),
(2, '102', '4', 'Booking'),
(3, '103', '2', 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis` varchar(8) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(12) NOT NULL,
  `stock_menu` int(12) NOT NULL,
  `foto_menu1` varchar(50) NOT NULL,
  `foto_menu2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `jenis`, `id_kategori`, `harga`, `stock_menu`, `foto_menu1`, `foto_menu2`) VALUES
(2, 'Americano', 'Ice', 2, 22000, 9, 'americano1.jpg', 'americano.jpg'),
(4, 'Caramel Latte', 'Ice', 2, 22000, 1, 'caramella.jpeg', 'caramel.jpeg'),
(5, 'Beef Sauce Barbeque', 'Hot', 1, 48000, 26, 'beef-steak-saus-bbq-foto-resep-utama.jpg', 'babeque1.jpg'),
(9, 'Onion Rings', 'Hot', 1, 22000, 0, 'onion.jpg', 'onion-ring-mozzarela.jpg'),
(10, 'French Fries', 'Hot', 3, 15000, 16, 'kentang1.jpg', 'kentang.jpg'),
(11, 'Kopi V60', 'Ice', 2, 21000, 18, 'V60-1.jpg', '320491568_190488516859224_207992084012648813_n.jpg'),
(12, 'Salted Egg', 'Hot', 3, 18000, 10, 'Salted-Eggs.jpg', 'eggeggeggg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` int(12) NOT NULL,
  `nm_user` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `bukti_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pesanan`, `tgl_bayar`, `total_bayar`, `nm_user`, `status`, `bukti_transaksi`) VALUES
(22, 0, '2022-12-01', 141000, 'Fadli azka prayogi', 'Selesai', 'fullcode.png'),
(23, 28, '2023-01-02', 44000, 'Fadli azka prayogi', 'Pending', 'Spinner-1s-197px.svg'),
(24, 29, '2023-01-02', 48000, 'Fadli azka prayogi', 'Selesai', 'usecsdiusulkanranggas.jpg'),
(25, 30, '2023-01-02', 15000, 'Fadli azka prayogi', 'Selesai', '320627946_1099244140702654_6855518752868124887_n.jpg'),
(26, 31, '2023-01-02', 70000, 'Fadli azka prayogi', 'Selesai', '320627946_1099244140702654_6855518752868124887_n.jpg'),
(27, 32, '2023-01-03', 87000, 'Fadli azka prayogi', 'Selesai', 'unnamed.png'),
(28, 33, '2023-01-03', 70000, 'Fadli azka prayogi', 'Pending', 'sdlogout (3).jpg'),
(29, 34, '2023-01-03', 22000, 'Fadli azka prayogi', 'Selesai', '318760183_1285558802264120_4845163607572469099_n.jpg'),
(30, 35, '2023-01-05', 159000, 'Fadli azka prayogi', 'Selesai', '320491568_190488516859224_207992084012648813_n.jpg'),
(31, 36, '2023-01-05', 162000, 'idan', 'Selesai', 'GRS.jpg'),
(72, 85, '2023-01-06', 92000, 'Estiyuni Rahma Wulan', 'Selesai', 'Bean Eater-0.4s-200px.svg'),
(73, 86, '2023-01-06', 92000, 'idan', 'Pending', '318682909_542210724147808_269815261600611748_n.jpg'),
(74, 87, '2023-01-06', 580000, 'idan', 'Pending', '318417202_829511314974104_7887908880171248245_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `nm_pesanan` varchar(50) NOT NULL,
  `hrg_pesanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_transaksi` varchar(20) NOT NULL,
  `bukti_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_user`, `nm_user`, `id_meja`, `nm_pesanan`, `hrg_pesanan`, `jumlah`, `total_harga`, `tgl_pesan`, `status_transaksi`, `bukti_transaksi`) VALUES
(35, 1, 'Fadli azka prayogi', 1, 'Beef Sauce Barbeque', 48000, 4, '192000', '2022-11-29 10:07:25', 'Pending', '318682909_542210724147808_269815261600611748_n.jpg'),
(38, 1, 'Fadli azka prayogi', 1, 'French Fries', 15000, 10, '150000', '2022-11-30 12:06:16', 'Pending', '318682909_542210724147808_269815261600611748_n.jpg'),
(45, 1, 'Fadli azka prayogi', 1, 'Kopi V60', 21000, 1, '21000', '2022-12-10 08:32:49', 'Pending', '318682909_542210724147808_269815261600611748_n.jpg'),
(46, 1, 'Fadli azka prayogi', 1, 'Kopi V60', 21000, 1, '21000', '2022-12-10 08:32:57', 'Pending', '318682909_542210724147808_269815261600611748_n.jpg'),
(73, 0, '', 0, '', 0, 0, '', '0000-00-00 00:00:00', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_user`, `id_meja`, `total_harga`, `tanggal_pesanan`) VALUES
(29, 1, 2, 48000, '2023-01-02 22:38:23'),
(30, 1, 2, 15000, '2023-01-02 22:40:44'),
(31, 1, 2, 70000, '2023-01-02 22:43:09'),
(32, 1, 2, 87000, '2023-01-03 12:26:23'),
(33, 1, 1, 70000, '2023-01-03 12:28:25'),
(34, 1, 1, 22000, '2023-01-03 12:30:48'),
(35, 1, 2, 159000, '2023-01-05 19:58:28'),
(36, 3, 2, 162000, '2023-01-05 21:43:11'),
(85, 2, 2, 92000, '2023-01-06 14:39:49'),
(86, 8, 3, 92000, '2023-01-06 15:29:13'),
(87, 8, 2, 580000, '2023-01-06 15:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `username`, `password`) VALUES
(1, 'Fadli azka prayogi', 'fervian', '3076b2dd83f8e906fd83717a8775512e'),
(2, 'Estiyuni Rahma Wulandari', 'esti', '0f511511d980a0998b35d8c159ef9bec'),
(8, 'idan', 'idan', 'a9b52e6b3d8c1198fcb74fea21a6191a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tb_itempesanan`
--
ALTER TABLE `tb_itempesanan`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_itempesanan`
--
ALTER TABLE `tb_itempesanan`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
