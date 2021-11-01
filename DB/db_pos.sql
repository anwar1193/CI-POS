-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 02:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `nama`, `jenis_kelamin`, `telepon`, `alamat`, `created`, `updated`) VALUES
(1, 'Junaidi Surya', 'Laki-laki', '082293049402', 'Tebo', '2019-11-24 19:48:15', '0000-00-00 00:00:00'),
(2, 'Muhammad Nur', 'Laki-laki', '082192003849', 'Banjarsari', '2019-11-24 19:48:15', '0000-00-00 00:00:00'),
(3, 'Federial Marcos', 'Laki-laki', '081309942023', 'Tangerang', '2019-11-24 21:00:35', '0000-00-00 00:00:00'),
(4, 'Hendra', 'Laki-laki', '082122349054', 'Cimanggis, Depok', '2020-03-14 06:05:37', '0000-00-00 00:00:00'),
(5, 'Budi', 'Laki-laki', '087828293892', 'Cakung', '2020-05-09 07:44:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `gambar` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `barcode`, `nama_barang`, `id_kategori`, `id_unit`, `harga`, `stok`, `gambar`, `created`, `updated`) VALUES
(6, 'A9394', 'Indomie Soto', 1, 2, 2500, 4, 'item-191128-15f28fbc8c.png', '2019-11-29 04:02:43', NULL),
(7, 'A7485', 'Indomie Goreng', 1, 2, 3000, 70, 'item-191128-2e11fe8529.jpg', '2019-11-29 04:28:10', NULL),
(8, 'B9403', 'Yakult', 2, 2, 1500, 94, 'item-191128-863077711f.jpg', '2019-11-29 04:28:33', NULL),
(9, 'B0349', 'Fanta', 2, 2, 4000, 43, 'item-191128-766e428d1e.jpg', '2019-11-29 04:29:16', NULL),
(10, 'C9344', 'Gelang', 3, 2, 75000, 30, 'item-191128-8542516f88.jpg', '2019-11-29 04:29:49', NULL),
(11, 'C3495', 'Kalung', 3, 2, 150000, 32, 'item-191128-9b8f0779ba.jpg', '2019-11-29 04:31:33', NULL),
(13, 'D9302', 'Tulip', 3, 2, 55000, 0, 'item-200328-6a269e454c.jpg', '2020-03-27 17:02:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama`, `created`, `updated`) VALUES
(1, 'Makanan', '2019-11-25 04:05:44', '0000-00-00 00:00:00'),
(2, 'Minuman', '2019-11-25 04:05:44', '0000-00-00 00:00:00'),
(3, 'Aksesoris', '2019-11-25 05:10:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `invoice`, `id_customer`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `id_user`, `created`) VALUES
(9, 'TR2004260001', 0, 28000, 0, 28000, 30000, 2000, '', '2020-04-26', 1, '2020-04-26 13:36:59'),
(10, 'TR2004260002', 0, 22500, 0, 22500, 25000, 2500, '', '2020-04-26', 1, '2020-04-26 14:38:08'),
(11, 'TR2004260003', 0, 19000, 0, 19000, 20000, 1000, 'lunas', '2020-04-26', 1, '2020-04-26 17:28:22'),
(12, 'TR2004260004', 0, 16500, 0, 16500, 20000, 3500, 'lunas', '2020-04-26', 1, '2020-04-26 17:29:09'),
(13, 'TR2004260005', 0, 18000, 0, 18000, 20000, 2000, '', '2020-04-26', 1, '2020-04-26 17:29:44'),
(14, 'TR2004260006', 0, 24000, 0, 24000, 30000, 6000, '', '2020-04-26', 1, '2020-04-26 17:44:16'),
(15, 'TR2004260007', 0, 13500, 0, 13500, 20000, 6500, '', '2020-04-26', 1, '2020-04-26 21:54:30'),
(16, 'TR2005080001', 0, 15000, 0, 15000, 15000, 0, '', '2020-05-08', 1, '2020-05-08 22:29:15'),
(17, 'TR2005090001', 0, 20000, 0, 20000, 20000, 0, '', '2020-05-09', 1, '2020-05-09 08:14:55'),
(18, 'TR2005090002', 0, 22500, 0, 22500, 25000, 2500, '', '2020-05-09', 1, '2020-05-09 08:16:18'),
(19, 'TR2008210001', 0, 453000, 0, 453000, 500000, 47000, '', '2020-08-21', 1, '2020-08-21 01:27:47'),
(20, 'TR2104150001', 0, 2500, 0, 2500, 2500, 0, '', '2021-04-15', 1, '2021-04-15 21:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_detail`
--

CREATE TABLE `tbl_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_detail`
--

INSERT INTO `tbl_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(12, 9, 6, 2500, 4, 0, 10000),
(13, 9, 7, 3000, 6, 0, 18000),
(14, 10, 6, 2500, 3, 0, 7500),
(15, 10, 7, 3000, 5, 0, 15000),
(16, 11, 9, 4000, 1, 0, 4000),
(17, 11, 7, 3000, 5, 0, 15000),
(18, 12, 7, 3000, 3, 0, 9000),
(19, 12, 8, 1500, 5, 0, 7500),
(20, 13, 8, 1500, 6, 0, 9000),
(21, 13, 7, 3000, 3, 0, 9000),
(22, 14, 7, 3000, 4, 0, 12000),
(23, 14, 9, 4000, 3, 0, 12000),
(24, 15, 8, 1500, 1, 0, 1500),
(25, 15, 9, 4000, 3, 0, 12000),
(26, 16, 8, 1500, 2, 0, 3000),
(27, 16, 9, 4000, 3, 0, 12000),
(28, 17, 6, 2500, 2, 0, 5000),
(29, 17, 7, 3000, 5, 0, 15000),
(30, 18, 6, 2500, 3, 0, 7500),
(31, 18, 7, 3000, 5, 0, 15000),
(32, 19, 8, 1500, 2, 0, 3000),
(33, 19, 11, 150000, 3, 0, 450000),
(34, 20, 6, 2500, 1, 0, 2500);

--
-- Triggers `tbl_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tbl_sale_detail` FOR EACH ROW BEGIN
	UPDATE tbl_item SET stok = stok - NEW.qty
    WHERE id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockin`
--

CREATE TABLE `tbl_stockin` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stockin`
--

INSERT INTO `tbl_stockin` (`id`, `id_item`, `type`, `detail`, `id_supplier`, `qty`, `date`, `created`, `id_user`) VALUES
(1, 11, 'in', '', 5, 10, '2019-12-08', '2019-12-08 11:27:52', 1),
(2, 11, 'in', 'Kalung Canggil', 6, 5, '2020-03-13', '2020-03-13 16:02:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockout`
--

CREATE TABLE `tbl_stockout` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stockout`
--

INSERT INTO `tbl_stockout` (`id`, `id_item`, `type`, `detail`, `id_supplier`, `qty`, `date`, `created`, `id_user`) VALUES
(2, 6, 'out', 'Rusak', 3, 3, '2019-12-08', '2019-12-08 11:23:29', 1),
(3, 6, 'out', 'Kadaluarsa', 3, 5, '2019-12-08', '2019-12-08 11:24:18', 1),
(4, 6, 'out', 'Hilang', 3, 2, '2020-03-06', '2020-03-07 04:04:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `nama`, `telepon`, `alamat`, `deskripsi`, `created`, `updated`) VALUES
(5, 'Lainnya', '0', '-', '-', '2019-12-03 05:13:50', '0000-00-00 00:00:00'),
(6, 'Anwar Store', '085219063505', 'Ciseeng, Bogor', 'Produk Teknologi', '2020-03-13 16:02:05', '0000-00-00 00:00:00'),
(8, 'Yummy Store', '081921029300', 'Kebayoran, Jakarta Selatan', 'Produk Makanan', '2020-03-14 06:04:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `nama`, `created`, `updated`) VALUES
(1, 'Kilogram', '2019-11-26 04:57:14', '0000-00-00 00:00:00'),
(2, 'Pcs', '2019-11-26 04:57:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'Kasir', 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'kasir'),
(3, 'Shinta Purnama', 'shinta', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_detail`
--
ALTER TABLE `tbl_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tbl_stockin`
--
ALTER TABLE `tbl_stockin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_stockout`
--
ALTER TABLE `tbl_stockout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_sale_detail`
--
ALTER TABLE `tbl_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_stockin`
--
ALTER TABLE `tbl_stockin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stockout`
--
ALTER TABLE `tbl_stockout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id`),
  ADD CONSTRAINT `tbl_item_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `tbl_unit` (`id`);

--
-- Constraints for table `tbl_sale_detail`
--
ALTER TABLE `tbl_sale_detail`
  ADD CONSTRAINT `tbl_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`id`);

--
-- Constraints for table `tbl_stockin`
--
ALTER TABLE `tbl_stockin`
  ADD CONSTRAINT `tbl_stockin_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `tbl_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stockin_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id`),
  ADD CONSTRAINT `tbl_stockin_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
