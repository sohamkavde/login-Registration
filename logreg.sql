-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 06:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `logindb`
--

CREATE TABLE `logindb` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `type` text NOT NULL COMMENT 'user,admin,client',
  `status` int(11) NOT NULL COMMENT 'Profile is Active or Deactive',
  `date` varchar(255) NOT NULL COMMENT 'Asia/Kolkata Time zone',
  `time` varchar(255) NOT NULL COMMENT 'Asia/Kolkata Time zone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindb`
--
ALTER TABLE `logindb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logindb`
--
ALTER TABLE `logindb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
