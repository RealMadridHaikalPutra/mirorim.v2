-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 08:11 AM
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
-- Table structure for table `boxorder.id`
--

CREATE TABLE `boxorder.id` (
  `id_box` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `box` varchar(200) NOT NULL,
  `resi` varchar(200) NOT NULL,
  `qty.order` int(11) NOT NULL,
  `qty.count` int(11) NOT NULL,
  `kubik.order` float NOT NULL,
  `kubik.count` float NOT NULL,
  `note` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Not Approved',
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gudang.id`
--

CREATE TABLE `gudang.id` (
  `id_gudang` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `skug` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `role` enum('purchasing','super_gudang','gudang','admin','toko','super_admin','super_prepare','prepare') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order.id`
--

CREATE TABLE `order.id` (
  `id_order` int(11) NOT NULL,
  `id_box` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product.id`
--

CREATE TABLE `product.id` (
  `id_product` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `toko.id`
--

CREATE TABLE `toko.id` (
  `id_toko` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boxorder.id`
--
ALTER TABLE `boxorder.id`
  ADD PRIMARY KEY (`id_box`);

--
-- Indexes for table `gudang.id`
--
ALTER TABLE `gudang.id`
  ADD PRIMARY KEY (`id_gudang`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `order.id`
--
ALTER TABLE `order.id`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `id_box` (`id_box`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- Indexes for table `product.id`
--
ALTER TABLE `product.id`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `toko.id`
--
ALTER TABLE `toko.id`
  ADD PRIMARY KEY (`id_toko`),
  ADD UNIQUE KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boxorder.id`
--
ALTER TABLE `boxorder.id`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang.id`
--
ALTER TABLE `gudang.id`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order.id`
--
ALTER TABLE `order.id`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product.id`
--
ALTER TABLE `product.id`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toko.id`
--
ALTER TABLE `toko.id`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudang.id`
--
ALTER TABLE `gudang.id`
  ADD CONSTRAINT `gudang.id_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product.id` (`id_product`);

--
-- Constraints for table `order.id`
--
ALTER TABLE `order.id`
  ADD CONSTRAINT `order.id_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product.id` (`id_product`),
  ADD CONSTRAINT `order.id_ibfk_2` FOREIGN KEY (`id_box`) REFERENCES `boxorder.id` (`id_box`);

--
-- Constraints for table `toko.id`
--
ALTER TABLE `toko.id`
  ADD CONSTRAINT `toko.id_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product.id` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
