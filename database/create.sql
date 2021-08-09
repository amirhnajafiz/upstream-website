-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3440
-- Generation Time: Aug 09, 2021 at 09:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_stream`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(1023) NOT NULL,
  `uploader` varchar(255) DEFAULT NULL,
  `isprivate` tinyint(4) NOT NULL DEFAULT 0,
  `uploaddate` date NOT NULL DEFAULT current_timestamp(),
  `download` int(11) NOT NULL DEFAULT 0,
  `type` varchar(15) NOT NULL,
  `size` int(11) NOT NULL DEFAULT 0,
  `expiredate` date DEFAULT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `currentUse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `maxFileUpload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `isadmin` tinyint(4) DEFAULT 0,
  `canconfirm` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `password`, `status`, `isadmin`, `canconfirm`) VALUES
('Amirhossein', '1234', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`) USING HASH;

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`maxFileUpload`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `file` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
