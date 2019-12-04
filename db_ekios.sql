-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 03:38 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

CREATE TABLE `tbl_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_menu_id` int(11) DEFAULT NULL,
  `detail_menu_nama` varchar(100) DEFAULT NULL,
  `detail_harjul` double DEFAULT NULL,
  `detail_porsi` int(11) DEFAULT NULL,
  `detail_diskon_id` int(11) NOT NULL,
  `detail_nama_diskon` varchar(100) NOT NULL,
  `detail_a_diskon` int(11) NOT NULL,
  `detail_subtotal` double DEFAULT NULL,
  `detail_inv_no` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `detail_menu_id`, `detail_menu_nama`, `detail_harjul`, `detail_porsi`, `detail_diskon_id`, `detail_nama_diskon`, `detail_a_diskon`, `detail_subtotal`, `detail_inv_no`) VALUES
(73, 15, 'Coca Cola Dingin', 10000, 1, 0, '', 0, 10000, 'INV171019000002'),
(74, 3, 'Sate Madura', 18000, 3, 0, '', 0, 54000, 'INV171019000002'),
(75, 17, 'Kopi Latte Moca', 7500, 2, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 15000, 'INV171019000003'),
(76, 14, 'Es Semangka', 12000, 1, 0, '', 0, 12000, 'INV171019000003'),
(77, 4, 'Burger', 18000, 4, 2, 'Diskon Toko', 10, 72000, 'INV171019000004'),
(78, 17, 'Kopi Latte Moca', 7500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 7500, 'INV171019000004'),
(79, 17, 'Kopi Latte Moca', 7500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 7500, 'INV171019000005'),
(80, 4, 'Burger', 18000, 4, 2, 'Diskon Toko', 10, 72000, 'INV171019000005'),
(81, 3, 'Sate Madura', 18000, 1, 0, '', 0, 18000, 'INV171019000005'),
(82, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV171019000006'),
(83, 17, 'Kopi Latte Moca', 7500, 3, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 22500, 'INV171019000006'),
(84, 16, 'Kopi Latte', 14000, 1, 0, '', 0, 14000, 'INV171019000006'),
(85, 17, 'Kopi Latte Moca', 7500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 7500, 'INV171019000007'),
(86, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV171019000007'),
(87, 3, 'Sate Madura', 18000, 1, 0, '', 0, 18000, 'INV171019000007'),
(88, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV171019000008'),
(91, 5, 'Pizza', 17000, 10, 0, '', 0, 170000, 'INV191019000001'),
(92, 6, 'Menu 5', 20000, 1, 0, '', 0, 20000, 'INV191019000001'),
(93, 11, 'Coklat Hangat', 12000, 1, 0, '', 0, 12000, 'INV191019000001'),
(94, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV191019000001'),
(95, 15, 'Coca Cola Dingin', 10000, 1, 0, '', 0, 10000, 'INV191019000001'),
(96, 3, 'Sate Madura', 18000, 1, 0, '', 0, 18000, 'INV191019000002'),
(97, 13, 'Ice Lemon', 12000, 1, 0, '', 0, 12000, 'INV191019000002'),
(98, 15, 'Coca Cola Dingin', 10000, 1, 0, '', 0, 10000, 'INV191019000002'),
(99, 3, 'Sate Madura', 18000, 50, 0, '', 0, 900000, 'INV191019000003'),
(100, 3, 'Sate Madura', 18000, 1, 0, '', 0, 18000, 'INV191019000004'),
(101, 4, 'Burger', 18000, 3, 2, 'Diskon Toko', 10, 54000, 'INV191019000004'),
(102, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV201019000001'),
(103, 5, 'Pizza', 8500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 8500, 'INV201019000001'),
(104, 6, 'Menu 5', 20000, 1, 0, '', 0, 20000, 'INV201019000002'),
(105, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV201019000002'),
(106, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV201019000002'),
(107, 5, 'Pizza', 8500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 8500, 'INV201019000002'),
(108, 15, 'Coca Cola Dingin', 10000, 1, 0, '', 0, 10000, 'INV201019000002'),
(109, 3, 'Sate Madura', 16200, 2, 2, 'Diskon Toko', 10, 32400, 'INV201019000003'),
(110, 17, 'Kopi Latte Moca', 7500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 7500, 'INV201019000004'),
(111, 3, 'Sate Madura', 16200, 10, 2, 'Diskon Toko', 10, 162000, 'INV211019000001'),
(112, 5, 'Pizza', 8500, 10, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 85000, 'INV211019000001'),
(113, 13, 'Ice Lemon', 12000, 1, 0, '', 0, 12000, 'INV211019000001'),
(114, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV211019000001'),
(115, 16, 'Kopi Latte', 14000, 1, 0, '', 0, 14000, 'INV211019000001'),
(116, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV211019000002'),
(117, 3, 'Sate Madura', 16200, 10, 2, 'Diskon Toko', 10, 162000, 'INV211019000003'),
(118, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV211019000004'),
(119, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV211019000004'),
(120, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV211019000005'),
(121, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV211019000005'),
(122, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV211019000006'),
(123, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV211019000006'),
(124, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV211019000007'),
(125, 4, 'Burger', 18000, 10, 2, 'Diskon Toko', 10, 180000, 'INV211019000007'),
(126, 5, 'Pizza', 8500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 8500, 'INV211019000007'),
(127, 13, 'Ice Lemon', 12000, 1, 0, '', 0, 12000, 'INV211019000007'),
(128, 11, 'Coklat Hangat', 12000, 1, 0, '', 0, 12000, 'INV211019000007'),
(129, 11, 'Coklat Hangat', 12000, 11, 0, '', 0, 132000, 'INV211019000008'),
(130, 4, 'Burger', 18000, 10, 2, 'Diskon Toko', 10, 180000, 'INV211019000009'),
(131, 5, 'Pizza', 8500, 1, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 8500, 'INV211019000009'),
(132, 6, 'Menu 5', 10000, 6, 1, 'Diskon Mulai Tanggal 27 s/d 31 Oktober', 50, 60000, 'INV211019000010'),
(133, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV211019000011'),
(134, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV221019000001'),
(135, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV221019000001'),
(136, 5, 'Pizza', 13600, 1, 1, 'Diskon Tanggal Tua', 20, 13600, 'INV221019000001'),
(137, 6, 'Menu 5', 20000, 1, 0, '', 0, 20000, 'INV221019000001'),
(138, 13, 'Ice Lemon', 12000, 1, 0, '', 0, 12000, 'INV221019000001'),
(139, 17, 'Kopi Torabika', 10400, 10, 1, 'Diskon Tanggal Tua', 20, 104000, 'INV221019000002'),
(140, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV221019000002'),
(141, 3, 'Sate Madura', 16200, 1, 2, 'Diskon Toko', 10, 16200, 'INV231019000003'),
(142, 4, 'Burger', 18000, 1, 2, 'Diskon Toko', 10, 18000, 'INV231019000003'),
(143, 5, 'Pizza', 13600, 1, 1, 'Diskon Tanggal Tua', 20, 13600, 'INV231019000003'),
(144, 13, 'Ice Lemon', 12000, 1, 0, '', 0, 12000, 'INV231019000003'),
(145, 3, 'Sate Madura', 14400, 1, 1, 'Diskon Tanggal Muda', 20, 14400, 'INV241019000001'),
(146, 4, 'Burger', 20000, 1, 0, '', 0, 20000, 'INV241019000001'),
(147, 5, 'Pizza', 13600, 1, 1, 'Diskon Tanggal Muda', 20, 13600, 'INV241019000001'),
(148, 11, 'Coklat Hangat', 9600, 10, 1, 'Diskon Tanggal Muda', 20, 96000, 'INV241019000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskon`
--

CREATE TABLE `tbl_diskon` (
  `diskon_id` int(11) NOT NULL,
  `nama_diskon` varchar(100) DEFAULT NULL,
  `a_diskon` int(11) DEFAULT NULL,
  `mulai_diskon` date DEFAULT NULL,
  `exp_diskon` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diskon`
--

INSERT INTO `tbl_diskon` (`diskon_id`, `nama_diskon`, `a_diskon`, `mulai_diskon`, `exp_diskon`) VALUES
(0, NULL, NULL, NULL, NULL),
(1, 'Diskon Tanggal Muda', 60, '2019-10-15', '2019-10-31'),
(2, 'Diskon Toko', 10, '2019-10-17', '2019-11-01'),
(3, 'diskon xp', 20, '2019-10-10', '2019-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `inv_no` varchar(15) NOT NULL,
  `inv_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inv_plg_id` int(11) DEFAULT NULL,
  `inv_plg_nama` varchar(80) DEFAULT NULL,
  `inv_total` double DEFAULT NULL,
  `inv_bayar` int(11) DEFAULT NULL,
  `inv_kembali` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`inv_no`, `inv_tanggal`, `inv_plg_id`, `inv_plg_nama`, `inv_total`, `inv_bayar`, `inv_kembali`) VALUES
('INV171019000002', '2019-10-17 03:18:02', 28, 'Imam asri', 64000, 65000, '1000'),
('INV171019000003', '2019-10-17 03:36:41', 28, 'Imam asri', 27000, 30000, '3000'),
('INV171019000004', '2019-10-17 03:51:00', 28, 'Imam asri', 79500, 80000, '500'),
('INV171019000005', '2019-10-17 04:39:05', 28, 'Imam asri', 97500, 100000, '2500'),
('INV171019000006', '2019-10-17 05:49:43', 28, 'Imam asri', 54500, 55000, '500'),
('INV171019000007', '2019-10-17 05:53:19', 28, 'Imam asri', 43500, 45000, '1500'),
('INV171019000008', '2019-10-17 06:34:01', 28, 'Imam asri', 18000, 20000, '2000'),
('INV191019000001', '2019-10-19 03:20:28', 28, 'Imam asri', 230000, 240000, '10000'),
('INV191019000002', '2019-10-19 07:40:29', 28, 'Imam asri', 40000, 40000, '0'),
('INV191019000003', '2019-10-19 10:18:55', 28, 'Imam asri', 900000, 900000, '0'),
('INV191019000004', '2019-10-19 11:08:48', 28, 'Imam asri', 72000, 75000, '3000'),
('INV201019000001', '2019-10-20 04:12:24', 28, 'Imam asri', 26500, 27000, '500'),
('INV201019000002', '2019-10-20 08:57:20', 28, 'Imam asri', 72700, 73000, '300'),
('INV201019000003', '2019-10-20 10:08:34', 28, 'Imam asri', 32400, 33000, '600'),
('INV201019000004', '2019-10-20 14:54:10', 28, 'Imam asri', 7500, 8000, '500'),
('INV211019000001', '2019-10-21 02:08:43', 28, 'Imam asri', 291000, 300000, '9000'),
('INV211019000002', '2019-10-21 02:09:49', 28, 'Imam asri', 16200, 17000, '800'),
('INV211019000003', '2019-10-21 02:10:19', 28, 'Imam asri', 162000, 170000, '8000'),
('INV211019000004', '2019-10-21 02:10:57', 28, 'Imam asri', 34200, 35000, '800'),
('INV211019000005', '2019-10-21 02:11:23', 28, 'Imam asri', 34200, 35000, '800'),
('INV211019000006', '2019-10-21 02:16:41', 28, 'Imam asri', 34200, 35000, '800'),
('INV211019000007', '2019-10-21 04:24:57', 28, 'Imam asri', 228700, 230000, '1300'),
('INV211019000008', '2019-10-21 04:27:24', 28, 'Imam asri', 132000, 133000, '1000'),
('INV211019000009', '2019-10-21 07:03:16', 28, 'Imam asri', 188500, 190000, '1500'),
('INV211019000010', '2019-10-21 07:04:33', 28, 'Imam asri', 60000, 60000, '0'),
('INV211019000011', '2019-10-21 08:31:13', 28, 'Imam asri', 16200, 17000, '800'),
('INV221019000001', '2019-10-22 20:09:19', 29, 'Imam asri 02', 79800, 80000, '200'),
('INV221019000002', '2019-10-22 21:53:47', 28, 'Imam asri', 122000, 123000, '1000'),
('INV231019000003', '2019-10-23 01:10:56', 29, 'Imam asri 02', 59800, 60000, '200'),
('INV241019000001', '2019-10-24 01:00:40', 29, 'Imam asri 02', 144000, 150000, '6000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(7, 'Cemilan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_nama` varchar(100) DEFAULT NULL,
  `menu_harga_lama` double DEFAULT NULL,
  `menu_harga_baru` double DEFAULT NULL,
  `menu_kategori_id` int(11) DEFAULT NULL,
  `menu_kategori_nama` varchar(30) DEFAULT NULL,
  `menu_id_diskon` int(11) NOT NULL,
  `menu_nama_diskon` varchar(100) DEFAULT NULL,
  `menu_a_diskon` int(11) NOT NULL,
  `menu_qty` int(11) DEFAULT NULL,
  `menu_gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_nama`, `menu_harga_lama`, `menu_harga_baru`, `menu_kategori_id`, `menu_kategori_nama`, `menu_id_diskon`, `menu_nama_diskon`, `menu_a_diskon`, `menu_qty`, `menu_gambar`) VALUES
(3, 'Sate Madura', 20000, 18000, 1, 'Makanan', 1, 'Diskon Tanggal Muda', 60, 166, 'file_1481423323.jpg'),
(4, 'Burger', NULL, 20000, 1, 'Makanan', 1, 'Diskon Tanggal Muda', 60, 173, 'file_1481423391.jpg'),
(5, 'Pizza', 20000, 17000, 1, 'Makanan', 1, 'Diskon Tanggal Muda', 60, 344, 'file_1481423407.jpg'),
(6, 'Kue telur', NULL, 20000, 1, 'Makanan', 1, 'Diskon Tanggal Muda', 60, 10, 'file_1481423428.jpg'),
(11, 'Coklat Hangat', NULL, 12000, 2, 'Minuman', 1, 'Diskon Tanggal Muda', 60, 64, 'file_1494160941.jpg'),
(12, 'Es Coklat Mint', 16000, 15000, 2, 'Minuman', 0, '', 0, 10, 'file_1494160974.jpg'),
(13, 'Ice Lemon', NULL, 12000, 2, 'Minuman', 0, '', 0, 93, 'file_1494161014.jpg'),
(14, 'Es Semangka', NULL, 12000, 2, 'Minuman', 0, '', 0, 88, 'file_1494161073.jpg'),
(15, 'Coca Cola Dingin', NULL, 10000, 2, 'Minuman', 1, 'Diskon Tanggal Muda', 60, 32, 'file_1494161100.jpg'),
(16, 'Kopi Latte', 14000, 13000, 1, 'Makanan', 0, '', 0, 305, 'file_1494161133.jpg'),
(17, 'Kopi Torabika', 15000, 13000, 2, 'Minuman', 1, 'Diskon Tanggal Muda', 60, 78, 'file_1494161156.jpg'),
(18, 'Kopi Torabika setia', 5000, 4000, 2, 'Minuman', 0, '', 0, 88, 'file_1571879041.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `plg_id` int(11) NOT NULL,
  `plg_nama` varchar(80) DEFAULT NULL,
  `plg_jenkel` varchar(20) DEFAULT NULL,
  `plg_notelp` varchar(30) DEFAULT NULL,
  `plg_email` varchar(40) DEFAULT NULL,
  `plg_photo` varchar(20) DEFAULT NULL,
  `plg_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `plg_password` varchar(35) DEFAULT NULL,
  `plg_level` enum('Kasir','Admin') DEFAULT NULL,
  `plg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`plg_id`, `plg_nama`, `plg_jenkel`, `plg_notelp`, `plg_email`, `plg_photo`, `plg_register`, `plg_password`, `plg_level`, `plg_status`) VALUES
(28, 'Imam asri', 'Laki Laki', '089664080645', 'Imamasri@outlook.com', 'file_1571835232.jpg', '2019-09-01 22:18:55', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 0),
(29, 'Imam asri 02', 'Perempuan', '089666440365', 'Imamasri02@outlook.com', 'file_1571878970.jpg', '2019-10-22 07:48:31', '21232f297a57a5a743894a0e4a801fc3', 'Kasir', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_inv_no` (`detail_inv_no`),
  ADD KEY `detail_menu_id` (`detail_menu_id`);

--
-- Indexes for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD PRIMARY KEY (`diskon_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`inv_no`),
  ADD KEY `inv_plg_id` (`inv_plg_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_kategori_id` (`menu_kategori_id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`plg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  MODIFY `diskon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `plg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `tbl_detail_ibfk_1` FOREIGN KEY (`detail_inv_no`) REFERENCES `tbl_invoice` (`inv_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_ibfk_2` FOREIGN KEY (`detail_menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`inv_plg_id`) REFERENCES `tbl_pelanggan` (`plg_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `tbl_menu_ibfk_1` FOREIGN KEY (`menu_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
