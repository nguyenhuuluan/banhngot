-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2017 lúc 10:39 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhngot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `userID` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`userID`, `username`, `password`, `email`, `diachi`, `hoten`, `phonenumber`) VALUES
(1, 'admin', 'admin', 'phucmai2401@gmail.com', '123 ad', 'admin123456', '011111111'),
(2, 'user1233', 'user1233', 'phucmai2@vanlanguni.vn', '1234lqd', 'Mai Hoang Phuc', '01245781245'),
(3, 'user1', 'user1', 'phu@gmail.com', '123lqd', 'Mai 123', '01234567878'),
(4, 'google', 'google', 'google@gmail.com', '315 lqd', 'Mai Phúc Th?ng', '01212983799');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banh`
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
-- Đang đổ dữ liệu cho bảng `banh`
--

INSERT INTO `banh` (`id`, `tenbanh`, `giaban`, `mota`, `hinhanh`, `maloaibanh`) VALUES
(2, 'Bánh sinh nhật 02', 90, 'Bánh sinh nhật mứt dâu', 'bsn_02.jpg', 4),
(3, 'Bánh sinh nhật 03', 100000, 'Bánh sinh nhật mứt dâu', 'bsn_03.jpg', 1),
(5, 'Bánh sinh nhật 05', 115000, 'Bánh sinh nhật mứt sầu riêng', 'bsn_05.jpg', 1),
(7, 'Bánh sinh nhật 07', 200000, 'Bánh sinh nhật đặc biệt', 'bsn_07.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `idbanh` int(11) NOT NULL,
  `tenbanh` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `idbanh`, `tenbanh`, `ngaybatdau`, `ngayketthuc`) VALUES
(4, 4, 'bánh sinh nhật 04', '2017-12-04', '2017-12-19'),
(5, 5, 'bánh sinh nhật 05', '2017-12-04', '2017-12-19'),
(7, 7, 'Bánh sinh nhật 07', '2017-12-04', '2017-12-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaibanh`
--

CREATE TABLE `loaibanh` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaibanh`
--

INSERT INTO `loaibanh` (`id`, `tenloai`) VALUES
(1, 'Bánh sinh nhật'),
(4, 'Bánh trung thu1'),
(6, 'demo12356'),
(8, 'demodemo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userID`);

--
-- Chỉ mục cho bảng `banh`
--
ALTER TABLE `banh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloaibanh` (`maloaibanh`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MB` (`idbanh`);

--
-- Chỉ mục cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `banh`
--
ALTER TABLE `banh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banh`
--
ALTER TABLE `banh`
  ADD CONSTRAINT `banh_ibfk_1` FOREIGN KEY (`maloaibanh`) REFERENCES `loaibanh` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
