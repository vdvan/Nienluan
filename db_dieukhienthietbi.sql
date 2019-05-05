-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2019 at 01:35 PM
-- Server version: 5.6.30
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dieukhienthietbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE IF NOT EXISTS `tb_account` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`id`, `username`, `password`) VALUES
(1, 'admin', '5efe2e6c6ced4e9e4e9b12f824b3dad4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE IF NOT EXISTS `tb_device` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`id`, `name`, `token`) VALUES
(1, 'NodeMCU ESP8266', 'tHLP6qU5MGoJj8gPkIlG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_relay_status`
--

CREATE TABLE IF NOT EXISTS `tb_relay_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `device_id` int(11) NOT NULL,
  `pin` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_relay_status`
--

INSERT INTO `tb_relay_status` (`id`, `name`, `device_id`, `pin`, `status`) VALUES
(2, 'Đèn 1', 1, 'D5', 1),
(3, 'Đèn 2', 1, 'D6', 1),
(4, 'Đèn 3', 1, 'D7', 1),
(5, 'Đèn 4', 1, 'D8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `tb_relay_status`
--
ALTER TABLE `tb_relay_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `device_id` (`device_id`,`pin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_relay_status`
--
ALTER TABLE `tb_relay_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_relay_status`
--
ALTER TABLE `tb_relay_status`
  ADD CONSTRAINT `tb_relay_status_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
