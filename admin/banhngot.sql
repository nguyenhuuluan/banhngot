-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 07:50 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhngot`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userID` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userID`, `username`, `password`, `email`) VALUES
(3, 'admin', 'admin', 'admin@nk.org'),
(6, 'user45', 'user4', 'phucmai2401@gmail.com'),
(8, 'user123', 'user12', 'phucmai2401@gmail.com'),
(9, 'phucmai', 'phucmai', '123@gmail.com'),
(10, 'Phucsss', 'phuc', '123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `banh`
--

CREATE TABLE `banh` (
  `id` int(11) NOT NULL,
  `tenbanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giaban` float NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaibanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banh`
--

INSERT INTO `banh` (`id`, `tenbanh`, `giaban`, `mota`, `hinhanh`, `maloaibanh`) VALUES
(2, 'Bánh sinh nhật 02', 90, 'Bánh sinh nhật mứt dâu', 'bsn_02.jpg', 4),
(3, 'Bánh sinh nhật 03', 100000, 'Bánh sinh nhật mứt dâu', 'bsn_03.jpg', 1),
(4, 'Bánh sinh nhật 04', 110000, 'Bánh sinh nhật mứt dâu', 'bsn_04.jpg', 1),
(5, 'Bánh sinh nhật 05', 115000, 'Bánh sinh nhật mứt sầu riêng', 'bsn_05.jpg', 1),
(7, 'Bánh sinh nhật 07', 200000, 'Bánh sinh nhật đặc biệt', 'bsn_07.jpg', 1),
(8, 'banh demo', 1111110, 'ban banh', 'bsn_01.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `idbanh` int(11) NOT NULL,
  `tenbanh` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `idbanh`, `tenbanh`, `ngaybatdau`, `ngayketthuc`) VALUES
(2, 2, 'bánh sinh nhật 02', '2017-12-04', '2017-12-19'),
(3, 3, 'bánh sinh nhật 03', '2017-12-04', '2017-12-19'),
(4, 4, 'bánh sinh nhật 04', '2017-12-04', '2017-12-19'),
(5, 5, 'bánh sinh nhật 05', '2017-12-04', '2017-12-19'),
(7, 7, 'Bánh sinh nhật 07', '2017-12-04', '2017-12-28'),
(9, 8, 'banh demo', '2017-12-04', '2017-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `loaibanh`
--

CREATE TABLE `loaibanh` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaibanh`
--

INSERT INTO `loaibanh` (`id`, `tenloai`) VALUES
(1, 'Bánh sinh nhật'),
(4, 'Bánh trung thu1'),
(6, 'demo12356'),
(8, 'banh mi trung thu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `banh`
--
ALTER TABLE `banh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloaibanh` (`maloaibanh`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MB` (`idbanh`);

--
-- Indexes for table `loaibanh`
--
ALTER TABLE `loaibanh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `banh`
--
ALTER TABLE `banh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loaibanh`
--
ALTER TABLE `loaibanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banh`
--
ALTER TABLE `banh`
  ADD CONSTRAINT `banh_ibfk_1` FOREIGN KEY (`maloaibanh`) REFERENCES `loaibanh` (`id`);

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `FK_MB` FOREIGN KEY (`idbanh`) REFERENCES `banh` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
