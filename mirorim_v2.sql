-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 12:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirorim.v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `boxorder_id`
--

CREATE TABLE `boxorder_id` (
  `id_box` int(11) NOT NULL,
  `id_delivery` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `resi` varchar(200) NOT NULL,
  `box` varchar(200) NOT NULL,
  `box_order` int(11) NOT NULL,
  `kubik_order` float NOT NULL,
  `status_box` varchar(200) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxorder_id`
--

INSERT INTO `boxorder_id` (`id_box`, `id_delivery`, `invoice`, `resi`, `box`, `box_order`, `kubik_order`, `status_box`) VALUES
(1, 1, '66666', '6666', '666', 6, 6.6, 'Approved'),
(2, 1, '55555', '5555', '555', 5, 5.5, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_id`
--

CREATE TABLE `delivery_id` (
  `id_delivery` int(11) NOT NULL,
  `box_total` int(11) NOT NULL,
  `kubik_total` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengiriman` varchar(200) NOT NULL,
  `status_delivery` varchar(200) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_id`
--

INSERT INTO `delivery_id` (`id_delivery`, `box_total`, `kubik_total`, `date`, `pengiriman`, `status_delivery`) VALUES
(1, 11, 11, '2023-04-04 16:59:58', 'By Ship', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_id`
--

CREATE TABLE `gudang_id` (
  `id_gudang` int(11) NOT NULL,
  `sku_gudang` varchar(200) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `lokasi_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang_id`
--

INSERT INTO `gudang_id` (`id_gudang`, `sku_gudang`, `id_product`, `quantity`, `lokasi_gudang`) VALUES
(32, 'K1B3', 1, 0, 1),
(33, 'K2B4', 1, 800, 1),
(34, 'M1B1', 15, -89, 3),
(35, 'M1B6', 15, 400, 3),
(36, 'N1N1', 17, 1200, 3),
(37, 'N1N7', 17, 700, 3),
(38, 'N8N8', 19, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hutang_id`
--

CREATE TABLE `hutang_id` (
  `id_hutang` int(11) NOT NULL,
  `id_komponen_hutang` int(11) NOT NULL,
  `quantity_hutang` int(11) NOT NULL,
  `status_hutang` varchar(200) NOT NULL DEFAULT 'Belum',
  `date_hutang` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutang_id`
--

INSERT INTO `hutang_id` (`id_hutang`, `id_komponen_hutang`, `quantity_hutang`, `status_hutang`, `date_hutang`) VALUES
(3, 1, 0, 'Lunas', '2023-04-21 16:33:39'),
(4, 1, 0, 'Lunas', '2023-04-21 16:33:39'),
(5, 1, 80, 'Belum', '2023-04-28 10:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `item_id`
--

CREATE TABLE `item_id` (
  `id_item` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_box` int(11) NOT NULL,
  `quantity_count` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL,
  `status_item` varchar(200) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_id`
--

INSERT INTO `item_id` (`id_item`, `id_product`, `id_box`, `quantity_count`, `quantity_order`, `status_item`) VALUES
(1, 1, 1, 0, 400, 'Approved'),
(2, 2, 1, 0, 500, 'Approved'),
(3, 3, 1, 300, 600, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `list_komponen`
--

CREATE TABLE `list_komponen` (
  `id_list_komponen` int(11) NOT NULL,
  `id_product_finish` int(11) NOT NULL,
  `id_komponen` int(11) NOT NULL,
  `quantity_komponen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_komponen`
--

INSERT INTO `list_komponen` (`id_list_komponen`, `id_product_finish`, `id_komponen`, `quantity_komponen`) VALUES
(15, 15, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `username`, `password`, `nama_user`, `role`) VALUES
(1, 'gudang', 'gudang', 'Dimas', 'gudang'),
(2, 'toko', 'toko', 'toko', 'toko'),
(3, 'pre', 'pre', 'pre', 'preparation'),
(4, 'pur', 'pur', 'pur', 'purchase');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_id`
--

CREATE TABLE `mutasi_id` (
  `id_mutasi` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `skug_lama` varchar(200) NOT NULL,
  `skug_baru` varchar(200) NOT NULL,
  `quantity_out` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_mutasi` varchar(200) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi_id`
--

INSERT INTO `mutasi_id` (`id_mutasi`, `id_gudang`, `skug_lama`, `skug_baru`, `quantity_out`, `datetime`, `status_mutasi`) VALUES
(19, 32, 'K1B1', 'K1B3', 200, '2023-04-19 08:48:45', 'Approved'),
(20, 33, 'K2B2', 'K2B3', 300, '2023-04-19 08:48:45', 'Approved'),
(21, 32, 'K1B3', 'K2B3', 100, '2023-04-19 09:10:30', 'Approved'),
(22, 33, 'K2B3', 'K2B3', 300, '2023-04-19 09:10:30', 'Approved'),
(23, 33, 'K2B3', 'K2B3', 700, '2023-04-19 09:14:58', 'Approved'),
(24, 37, 'N1N2', 'N1N7', 700, '2023-04-19 09:14:58', 'Approved'),
(25, 33, 'K2B3', 'K2B4', 500, '2023-04-19 10:37:27', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `product_id`
--

CREATE TABLE `product_id` (
  `id_product` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_id`
--

INSERT INTO `product_id` (`id_product`, `image`, `nama`, `jenis`) VALUES
(1, '7efa07b62a080fc5be8c775cefb3d549.jpg', 'Adaptor - 4S . 8V', 'Mentah'),
(15, '916dac5cbed90a77717854f40f1dd307.png', 'Batre - Hold', 'Mateng'),
(17, '916dac5cbed90a77717854f40f1dd307.png', 'Batre - Holder', 'Mateng'),
(19, '916dac5cbed90a77717854f40f1dd307.png', 'Batre - Hold', 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `request_id`
--

CREATE TABLE `request_id` (
  `id_request` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `quantity_req` int(11) NOT NULL,
  `quantity_count` int(11) NOT NULL,
  `type_req` varchar(200) NOT NULL,
  `status_req` varchar(200) NOT NULL,
  `picker` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `requester` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_id`
--

INSERT INTO `request_id` (`id_request`, `id_toko`, `quantity_req`, `quantity_count`, `type_req`, `status_req`, `picker`, `date`, `requester`) VALUES
(10, 19, 800, 800, 'request', 'Approved', 'Dimas', '2023-04-21 20:16:33', 'toko'),
(11, 19, 200, 200, 'refill', 'Approved', 'Dimas', '2023-04-21 20:29:31', 'toko');

-- --------------------------------------------------------

--
-- Table structure for table `request_prepare`
--

CREATE TABLE `request_prepare` (
  `id_prepare` int(11) NOT NULL,
  `id_product_finish` int(11) NOT NULL,
  `quantity_req` int(11) NOT NULL,
  `quantity_matang` int(11) NOT NULL,
  `quantity_reject` int(11) NOT NULL,
  `type_req` varchar(200) NOT NULL,
  `status_prepare` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `worker` varchar(200) NOT NULL,
  `requester` varchar(200) NOT NULL,
  `date_receiver` datetime NOT NULL,
  `date_start` datetime NOT NULL,
  `date_finish` datetime NOT NULL,
  `gudang_in` varchar(200) NOT NULL,
  `gudang_out` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_prepare`
--

INSERT INTO `request_prepare` (`id_prepare`, `id_product_finish`, `quantity_req`, `quantity_matang`, `quantity_reject`, `type_req`, `status_prepare`, `receiver`, `worker`, `requester`, `date_receiver`, `date_start`, `date_finish`, `gudang_in`, `gudang_out`) VALUES
(54, 15, 10, 8, 2, 'P', 'Diterima', 'pre', 'pre', 'Dimas', '2023-04-21 18:38:00', '2023-04-21 18:38:05', '2023-04-21 18:38:23', '34', '34'),
(58, 15, 5, 3, 2, 'P', 'Diterima', 'pre', 'pre', 'Dimas', '2023-04-21 18:38:00', '2023-04-21 18:38:08', '2023-04-21 18:38:23', '34', '34'),
(60, 15, 2, 0, 0, 'P', 'Unprocess', '', '', 'Dimas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '34');

-- --------------------------------------------------------

--
-- Table structure for table `request_total`
--

CREATE TABLE `request_total` (
  `id_total` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `quantity_tambah` int(11) NOT NULL,
  `status_total` varchar(200) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_total`
--

INSERT INTO `request_total` (`id_total`, `id_request`, `id_gudang`, `quantity_tambah`, `status_total`) VALUES
(62, 11, 34, 100, 'Approved'),
(63, 11, 35, 100, 'Approved'),
(64, 10, 34, 600, 'Approved'),
(65, 10, 35, 200, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `toko_id`
--

CREATE TABLE `toko_id` (
  `id_toko` int(11) NOT NULL,
  `sku_toko` varchar(200) NOT NULL DEFAULT '-',
  `id_product` int(11) NOT NULL,
  `quantity_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko_id`
--

INSERT INTO `toko_id` (`id_toko`, `sku_toko`, `id_product`, `quantity_toko`) VALUES
(18, '4K1', 1, 0),
(19, '5K2', 15, 0),
(20, '6K3', 17, 0),
(21, '-', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_req`
--

CREATE TABLE `total_req` (
  `id_total` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_req`
--

INSERT INTO `total_req` (`id_total`, `id_toko`, `quantity`, `hari`) VALUES
(4, 2, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boxorder_id`
--
ALTER TABLE `boxorder_id`
  ADD PRIMARY KEY (`id_box`),
  ADD KEY `id_delivery` (`id_delivery`);

--
-- Indexes for table `delivery_id`
--
ALTER TABLE `delivery_id`
  ADD PRIMARY KEY (`id_delivery`);

--
-- Indexes for table `gudang_id`
--
ALTER TABLE `gudang_id`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `hutang_id`
--
ALTER TABLE `hutang_id`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `id_komponen_hutang` (`id_komponen_hutang`);

--
-- Indexes for table `item_id`
--
ALTER TABLE `item_id`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_box` (`id_box`);

--
-- Indexes for table `list_komponen`
--
ALTER TABLE `list_komponen`
  ADD PRIMARY KEY (`id_list_komponen`),
  ADD KEY `id_komponen` (`id_komponen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `mutasi_id`
--
ALTER TABLE `mutasi_id`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `product_id`
--
ALTER TABLE `product_id`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `request_id`
--
ALTER TABLE `request_id`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `request_prepare`
--
ALTER TABLE `request_prepare`
  ADD PRIMARY KEY (`id_prepare`),
  ADD KEY `id_product_finish` (`id_product_finish`);

--
-- Indexes for table `request_total`
--
ALTER TABLE `request_total`
  ADD PRIMARY KEY (`id_total`),
  ADD KEY `id_request` (`id_request`);

--
-- Indexes for table `toko_id`
--
ALTER TABLE `toko_id`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_toko` (`sku_toko`);

--
-- Indexes for table `total_req`
--
ALTER TABLE `total_req`
  ADD PRIMARY KEY (`id_total`),
  ADD UNIQUE KEY `id_toko` (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boxorder_id`
--
ALTER TABLE `boxorder_id`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_id`
--
ALTER TABLE `delivery_id`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gudang_id`
--
ALTER TABLE `gudang_id`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `hutang_id`
--
ALTER TABLE `hutang_id`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_id`
--
ALTER TABLE `item_id`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_komponen`
--
ALTER TABLE `list_komponen`
  MODIFY `id_list_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mutasi_id`
--
ALTER TABLE `mutasi_id`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_id`
--
ALTER TABLE `product_id`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `request_id`
--
ALTER TABLE `request_id`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request_prepare`
--
ALTER TABLE `request_prepare`
  MODIFY `id_prepare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `request_total`
--
ALTER TABLE `request_total`
  MODIFY `id_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `toko_id`
--
ALTER TABLE `toko_id`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `total_req`
--
ALTER TABLE `total_req`
  MODIFY `id_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudang_id`
--
ALTER TABLE `gudang_id`
  ADD CONSTRAINT `gudang_id_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_id` (`id_product`);

--
-- Constraints for table `hutang_id`
--
ALTER TABLE `hutang_id`
  ADD CONSTRAINT `hutang_id_ibfk_1` FOREIGN KEY (`id_komponen_hutang`) REFERENCES `list_komponen` (`id_komponen`);

--
-- Constraints for table `item_id`
--
ALTER TABLE `item_id`
  ADD CONSTRAINT `item_id_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_id` (`id_product`),
  ADD CONSTRAINT `item_id_ibfk_2` FOREIGN KEY (`id_box`) REFERENCES `boxorder_id` (`id_box`);

--
-- Constraints for table `list_komponen`
--
ALTER TABLE `list_komponen`
  ADD CONSTRAINT `list_komponen_ibfk_2` FOREIGN KEY (`id_komponen`) REFERENCES `product_id` (`id_product`);

--
-- Constraints for table `mutasi_id`
--
ALTER TABLE `mutasi_id`
  ADD CONSTRAINT `mutasi_id_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `gudang_id` (`id_gudang`);

--
-- Constraints for table `request_id`
--
ALTER TABLE `request_id`
  ADD CONSTRAINT `request_id_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko_id` (`id_toko`);

--
-- Constraints for table `request_prepare`
--
ALTER TABLE `request_prepare`
  ADD CONSTRAINT `request_prepare_ibfk_1` FOREIGN KEY (`id_product_finish`) REFERENCES `product_id` (`id_product`);

--
-- Constraints for table `request_total`
--
ALTER TABLE `request_total`
  ADD CONSTRAINT `request_total_ibfk_1` FOREIGN KEY (`id_request`) REFERENCES `request_id` (`id_request`);

--
-- Constraints for table `toko_id`
--
ALTER TABLE `toko_id`
  ADD CONSTRAINT `toko_id_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_id` (`id_product`);

--
-- Constraints for table `total_req`
--
ALTER TABLE `total_req`
  ADD CONSTRAINT `total_req_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko_id` (`id_toko`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
