-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 06:29 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riasec_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `riasec`
--

CREATE TABLE `riasec` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `r_count` int(11) NOT NULL,
  `i_count` int(11) NOT NULL,
  `a_count` int(11) NOT NULL,
  `s_count` int(11) NOT NULL,
  `e_count` int(11) NOT NULL,
  `c_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `riasec`
--

INSERT INTO `riasec` (`id`, `username`, `r_count`, `i_count`, `a_count`, `s_count`, `e_count`, `c_count`) VALUES
(1, 'admin', 3, 3, 3, 3, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `id` int(11) NOT NULL,
  `identity` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `age` int(2) NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `ethnicity` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `qualification` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `yoc` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`, `id`, `identity`, `age`, `phone_number`, `ethnicity`, `qualification`, `yoc`) VALUES
('admin', 'admin', 'Zhong Ming', 'Tan', 'admin@riasecqiup.tk', 1, '', 0, '', '', '', 0),
('seb123', 'seb321', 'Ho', 'Jin Heng', 'seb@mail.com', 2, 'IC001', 13, '0123456789', 'Chinese', 'Foundation', 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riasec`
--
ALTER TABLE `riasec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riasec`
--
ALTER TABLE `riasec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riasec`
--
ALTER TABLE `riasec`
  ADD CONSTRAINT `riasec_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
