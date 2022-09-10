-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 09:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `intentory_name`
--

CREATE TABLE `intentory_name` (
  `uid` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intentory_name`
--

INSERT INTO `intentory_name` (`uid`, `id`, `Category`, `Name`, `Price`) VALUES
(97, 45, '123', '232', 11),
(98, 45, '123', '232', 11),
(102, 44, 'c1', 'I2', 10.89),
(105, NULL, 'ali', 'fiad', 10),
(110, 44, '436', '346', 10.12),
(111, 44, '436', '346', 10.56),
(117, 44, 'asd', 'fsdg', 12),
(118, 44, '24r', 'ewte', 124.56);

-- --------------------------------------------------------

--
-- Table structure for table `user_information_for_shop`
--

CREATE TABLE `user_information_for_shop` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information_for_shop`
--

INSERT INTO `user_information_for_shop` (`id`, `first_name`, `last_name`, `user_name`, `email_address`, `password`, `status`) VALUES
(44, 'AliRuddro420', '151617', '123', 'a@gmail.com', '123', '1'),
(45, 'rashid', 'fiad', '12', '', '123', '1'),
(49, 'qq', 'qq', '456', 'qq@gmail.com', 'qqq', '1'),
(51, 'asd', 'aafa', 'rud', 'ali420@gmail.com', '123', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intentory_name`
--
ALTER TABLE `intentory_name`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `intentory_name_ibfk_2` (`id`);

--
-- Indexes for table `user_information_for_shop`
--
ALTER TABLE `user_information_for_shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intentory_name`
--
ALTER TABLE `intentory_name`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `user_information_for_shop`
--
ALTER TABLE `user_information_for_shop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `intentory_name`
--
ALTER TABLE `intentory_name`
  ADD CONSTRAINT `intentory_name_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_information_for_shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intentory_name_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user_information_for_shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
