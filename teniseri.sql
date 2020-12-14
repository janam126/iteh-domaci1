-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teniseri`
--

-- --------------------------------------------------------

--
-- Table structure for table `teniser`
--

CREATE TABLE `teniser` (
  `teniserID` int(20) NOT NULL,
  `imePrezime` varchar(60) NOT NULL,
  `datumRodjenja` date NOT NULL,
  `drzavaPorekla` varchar(60) NOT NULL,
  `brojTitula` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teniser`
--

INSERT INTO `teniser` (`teniserID`, `imePrezime`, `datumRodjenja`, `drzavaPorekla`, `brojTitula`) VALUES
(0, 'Novak Djokovic', '1987-05-22', 'Srbija', 81),
(1, 'Rafael Nadal', '1986-06-03', 'Spanija', 86),
(2, 'Dominic Thiem', '1993-09-03', 'Austrija', 17),
(14, 'Roger Federer', '1981-08-08', 'Švajcarska', 103);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'Jana', 'jana'),
(2, 'Jana', 'jana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teniser`
--
ALTER TABLE `teniser`
  ADD PRIMARY KEY (`teniserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teniser`
--
ALTER TABLE `teniser`
  MODIFY `teniserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
