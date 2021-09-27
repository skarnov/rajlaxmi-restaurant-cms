-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2017 at 03:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_raj_laxmi_resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@evis.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(5) NOT NULL,
  `menu_name` varchar(150) NOT NULL,
  `menu_price` float(10,2) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  `menu_summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_name`, `menu_price`, `menu_image`, `menu_summary`) VALUES
(1, 'Indian', 0.00, 'upload/menu_image/1.jpg', ''),
(2, 'Indian', 0.00, 'upload/menu_image/2.jpg', ''),
(3, 'Indian', 0.00, 'upload/menu_image/3.jpg', ''),
(4, 'Indian', 0.00, 'upload/menu_image/4.jpg', ''),
(5, 'Indian', 0.00, 'upload/menu_image/5.jpg', ''),
(6, 'Indian', 0.00, 'upload/menu_image/6.jpg', ''),
(7, 'Indian', 0.00, 'upload/menu_image/7.jpg', ''),
(8, 'Indian', 0.00, 'upload/menu_image/8.jpg', ''),
(9, 'Indian', 0.00, 'upload/menu_image/9.jpg', ''),
(10, 'Indian', 0.00, 'upload/menu_image/10.jpg', ''),
(11, 'Indian', 0.00, 'upload/menu_image/11.jpg', ''),
(12, 'Indian', 0.00, 'upload/menu_image/12.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
