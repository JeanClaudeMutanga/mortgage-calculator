-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 10:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mortgage`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculations`
--

CREATE TABLE `calculations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `down` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `monthly` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calculations`
--

INSERT INTO `calculations` (`id`, `name`, `price`, `down`, `interest`, `length`, `monthly`, `date`) VALUES
(1, 'Claudes Systems', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-07 22:04:00'),
(2, 'Claudes Systems', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-07 22:22:00'),
(3, 'Jean-Claude Tashinga', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-08 09:57:00'),
(4, 'Jean-Claude Tashinga', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-08 09:59:00'),
(5, 'Jean-Claude Tashinga', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-08 10:00:00'),
(6, 'Jean-Claude Tashinga', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-08 10:02:00'),
(7, 'Claudes Systems', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-08 10:03:00'),
(8, 'Claudes Systems', '200000', '10 ', '6.5', '30', '1264.14', '2019-11-08 10:04:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
