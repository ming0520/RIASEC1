-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql208.byetcluster.com
-- Generation Time: May 13, 2019 at 05:44 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_23895090_riasec_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `riasec`
--

CREATE TABLE IF NOT EXISTS `riasec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `r_count` int(11) NOT NULL,
  `i_count` int(11) NOT NULL,
  `a_count` int(11) NOT NULL,
  `s_count` int(11) NOT NULL,
  `e_count` int(11) NOT NULL,
  `c_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `riasec`
--

INSERT INTO `riasec` (`id`, `username`, `r_count`, `i_count`, `a_count`, `s_count`, `e_count`, `c_count`) VALUES
(1, 'admin', 3, 4, 3, 3, 2, 2),
(2, 'chock', 1, 2, 2, 2, 2, 1),
(3, 'ming0520', 2, 1, 2, 0, 1, 2),
(4, 'Penny', 5, 7, 6, 4, 4, 6),
(5, 'ming05201', 3, 4, 4, 2, 0, 3),
(6, 'seb123', 2, 1, 1, 3, 2, 2),
(7, 'chock123', 2, 2, 2, 2, 2, 2),
(8, 'alice', 3, 0, 4, 2, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `age` int(2) NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `ethnicity` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `qualification` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `yoc` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`, `id`, `identity`, `age`, `phone_number`, `ethnicity`, `qualification`, `yoc`) VALUES
('admin', 'TANZHONGMING19990520', 'Zhong Ming', 'Tan', 'admin@riasecqiup.tk', 1, '', 0, '', '', '', 0),
('seb123', 'seb321', 'Ho', 'Jin Heng', 'seb@mail.com', 2, 'IC001', 13, '0123456789', 'Chinese', 'Foundation', 2017),
('username', 'password', 'Dr', 'Chokulingam', 'cho@mail.com', 3, 'IC001', 17, '0123456789', 'Indian', 'Phd', 1988),
('chock', 'i2018', 'Chockalingam', 'Letchumanan', 'mail2chock@gmail.com', 4, 'T210942', 35, '0169016342', 'Indian', 'Plus teo', 2018),
('admin1', 'admin1', 'admin', 'admin', 'admin@mail.com', 5, 'admin', 17, '0123456789', 'Kadazan', 'A-Level', 2003),
('ming0520', 'ming123', 'Tan', 'Zhang Ming', 'mongmail@mIl.com', 6, 'T123466', 28, '013594255', 'Chinese', 'Foundations ', 2019),
('Penny', 'w0ngbe1nee', 'Bei Nee', 'Wong ', 'pennywongbeinee@gmail.com', 7, '991126086330', 20, '0186639100', 'Chinese', 'Foundation ', 2017),
('abc123', 'abc321', 'Tan', 'Minf', 'abhg@mfial.clm', 8, 'Ahidve1-168', 50, '9640163701', 'Chinese', 'Foundations ', 2017),
('ming05201', 'ming123', 'Tan123', 'Zhang Ming', 'mongmail@mIl.com', 9, '990520123', 12, '01236486', 'Chinese', 'Diploma', 2014),
('Haha ', 'wonghaha', 'Haha', 'Wong ', 'hahawong@gmail.com', 10, '12345678', 12, '0181234567', 'Chinese', 'SPM', 2017),
('chock123', 'i123', 'Chockalingam', 'L', 'vonnleong@gmail.com', 11, 'W2199', 12, '0123456888', 'Chinese', 'Diploma', 2018),
('alice', '123', 'Alice', 'Lee', 'shuchin.lee@qiup.edu.my', 12, '631119086376', 19, '016111111', 'Chinese', 'Matriculation', 2018);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
