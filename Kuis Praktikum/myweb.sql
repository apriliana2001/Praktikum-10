-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 09:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `Id` int(5) NOT NULL,
  `Posted` date DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(75) DEFAULT NULL,
  `Address` varchar(75) DEFAULT NULL,
  `City` varchar(75) DEFAULT NULL,
  `Message` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`Id`, `Posted`, `Name`, `Email`, `Address`, `City`, `Message`) VALUES
(1654749543, '2022-06-11', 'Rahma', 'rahma@gmail.com', 'jalan merah jambu no 20', 'Surabaya', 0x6179616d2e6a706567),
(1654749669, '2022-06-11', 'Edwin', 'eeedwn@gmail.com', 'Jalan sawah no 33', 'Jakarta', 0x6d322e6a7067),
(1654750118, '2022-06-11', 'Lee', 'leeo@gmail.com', 'Jalan semangka no 50', 'Surabaya', 0x6d332e6a7067),
(1654751358, '2022-06-12', 'Zayn', 'zayn@gmail.com', 'Jalan  jambu no 19', 'Yogyakarta', 0x6d342e6a7067),
(1654751458, '2022-06-12', 'Mawar', 'mawarii@gmail.com', 'jalan melati no 50', 'Jakarta', 0x6d352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(5) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Homepage` varchar(50) DEFAULT NULL,
  `Username` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Address`, `Email`, `Homepage`, `Username`, `Password`) VALUES
(1, 'Ayu', 'Jalan Semangka no 2 surabaya', 'ayuayu@gmail.com', 'abcdefg', 'ayucans', 'Ayucans'),
(2, 'Leo', 'Jalan Harimau putih 88 Surakarta', 'leonardo@gmail.com', '12345678', 'Leonih', 'Leooo'),
(3, 'Kim', 'Jalan in aja yuk no 10 Bandung', 'kimikimi@gmail.com', '7654321', 'ini_kimi', 'K1m1'),
(4, 'Lia', 'Jalan Nanas no 15 Yogyakarta', 'lia555@gmail.com', '6237847', 'lialialia', 'lia555'),
(5, 'Bagas', 'Jalan Elang 24 Surabaya', 'bagas@gmail.com', '76542837', 'bagasssss', 'b4g4s'),
(6, 'Yudha', 'jalan angkasa no 25 Lampung', 'yudhaasek@gmail.com', '876634', 'yudha', 'yuuuu'),
(7, 'April', 'Jalan Bangsawan no 100 Solo', 'aprili@gmail.com', '8742836', 'aprillll', 'apr111'),
(8, 'Wendi', 'Jalan biru 77 Surabaya', 'wendi@gmail.com', '6552378', 'wendi12', 'w3nd1'),
(9, 'Brendi', 'jalan merah no 10 Sidoarjo', 'breeendi@gmail.com', '7836', 'brendi100', 'brendi'),
(10, 'Boy', 'Jalan coklat 50 Jakarta', 'boyboy@gmail.com', '783472', 'boy55', 'boyboy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1654751459;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
