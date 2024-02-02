-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 11:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb_hachie_pct`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ac_id` int(11) NOT NULL,
  `ac_name` varchar(225) DEFAULT NULL,
  `ac_phonenumber` varchar(10) DEFAULT NULL,
  `ac_address` varchar(225) DEFAULT NULL,
  `ac_role` set('admin','user') NOT NULL DEFAULT 'user',
  `ac_email` varchar(255) NOT NULL,
  `ac_password` varchar(225) NOT NULL,
  `ac_otp` varchar(6) DEFAULT NULL,
  `ac_date_otp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ac_id`, `ac_name`, `ac_phonenumber`, `ac_address`, `ac_role`, `ac_email`, `ac_password`, `ac_otp`, `ac_date_otp`) VALUES
(1, 'Phạm Công Thụ', '0783639343', '290 Lê Duẩn', 'admin', 'pct1101@gmail.com', 'pct1101', '0', NULL),
(2, 'Phạm Công Hưởng', '0934092700', NULL, 'user', 'thupcps35120@gmail.com', '$2y$10$G3JdwHeomTOf5DQSg6sg4.Xt5aTKKP5YcNU4WktGf74WcJOhkjyue', '0', NULL),
(3, 'Phạm Công Thụ', '0123456789', NULL, 'user', 'cnt@gmail.com', 'pct1101', '0', NULL),
(4, 'Phạm Công Thụ', '0321654987', NULL, 'user', '123@gmail.com', 'pct1101', '0', NULL),
(5, 'Phạm Công', '0934092700', NULL, 'user', 'thupcps35120@fpt.edu.vn', 'pct1101', '573918', NULL),
(6, 'Phạm Công Hưởng', '0934092700', NULL, 'user', 'pct110103@gmail.com', 'pct1101', '0', NULL),
(7, 'Phạm Công Hưởng', '0934092700', NULL, 'user', '369@gmail.com', '$2y$10$vcIuF.YbuQsXDbnezFI29u4Q6z58fHuKPALhXM912FsdwPb7PaSEe', '0', NULL),
(8, 'Phạm Công Thụ', '0124578963', NULL, 'user', 'phamcongthu110101@gmail.com', '$2y$10$WZXfsvQQtjsEn5Yf1UzbdeHtHBTFkQ2UYtz.Eoiw2DnP07G2LDSb6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordercart`
--

CREATE TABLE `ordercart` (
  `od_id` int(11) NOT NULL,
  `od_dayorder` datetime NOT NULL DEFAULT current_timestamp(),
  `od_num_pd` int(11) NOT NULL DEFAULT 0,
  `od_total_pay` int(11) NOT NULL DEFAULT 0,
  `od_vc_id` varchar(50) DEFAULT NULL,
  `od_ac_id` int(11) NOT NULL,
  `od_status` set('gio-hang','cho-xac-nhan','chuan-bi','dang-giao','thanh-cong','huy-don') NOT NULL DEFAULT 'gio-hang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordercart`
--

INSERT INTO `ordercart` (`od_id`, `od_dayorder`, `od_num_pd`, `od_total_pay`, `od_vc_id`, `od_ac_id`, `od_status`) VALUES
(1, '2024-01-21 00:44:17', 0, 0, NULL, 1, 'gio-hang');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `dt_od_id` int(11) NOT NULL,
  `dt_pd_id` int(11) NOT NULL,
  `dt_quantity` int(11) NOT NULL DEFAULT 1,
  `dt_price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`dt_od_id`, `dt_pd_id`, `dt_quantity`, `dt_price`) VALUES
(1, 1, 4, 0),
(1, 3, 1, 0),
(1, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int(11) NOT NULL,
  `pd_name` varchar(255) DEFAULT NULL,
  `pd_img` varchar(255) DEFAULT NULL,
  `pd_price` int(11) NOT NULL DEFAULT 0,
  `pd_quantity` int(11) NOT NULL DEFAULT 0,
  `pd_status` set('best-saler','hot','new','normal','flashsale') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `pd_name`, `pd_img`, `pd_price`, `pd_quantity`, `pd_status`) VALUES
(1, 'iPhone 15 Pro Max 1TB', 'iphone-15-pro-max-gold-thumbtz-650x650.png', 46590000, 50, 'flashsale'),
(2, 'iPhone 15 Pro Max 512GB', 'iphone-15-pro-max-black-thumbtz-650x650.png', 39090000, 50, 'flashsale'),
(3, 'iPhone 15 Pro 512GB', 'iphone-15-pro-blue-thumbtz-650x650.png', 37090000, 50, 'flashsale'),
(4, 'iPhone 15 Plus 512GB', 'iphone-15-plus-green-thumbtz-650x650.png', 33490000, 50, 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `vc_id` varchar(50) NOT NULL,
  `vc_number` int(11) DEFAULT NULL,
  `vc_per` int(11) DEFAULT NULL,
  `vc_max` int(11) DEFAULT NULL,
  `vc_quantity` int(11) NOT NULL DEFAULT 1,
  `vc_daystart` datetime DEFAULT NULL,
  `vc_dayend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `od_ac_id` (`od_ac_id`),
  ADD KEY `od_vc_id` (`od_vc_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`dt_od_id`,`dt_pd_id`),
  ADD KEY `dt_pd_id` (`dt_pd_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`vc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ordercart`
--
ALTER TABLE `ordercart`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD CONSTRAINT `ordercart_ibfk_1` FOREIGN KEY (`od_ac_id`) REFERENCES `account` (`ac_id`),
  ADD CONSTRAINT `ordercart_ibfk_2` FOREIGN KEY (`od_vc_id`) REFERENCES `voucher` (`vc_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`dt_od_id`) REFERENCES `ordercart` (`od_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`dt_pd_id`) REFERENCES `products` (`pd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
