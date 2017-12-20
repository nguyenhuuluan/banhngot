-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2017 lúc 11:34 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
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
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`userID`, `username`, `password`, `email`, `diachi`, `phone`, `reset_token`) VALUES
(3, 'admin', 'admin', 'admin@nk.org', '', '', ''),
(26, 'huuluanpy', '$2y$11$Omtd.DtoustjgSdLKSH33.cZJq7we2LZzcx36WeufWyjNNl3rbbsm', 'huuluanpy@gmail.com', '56 nguy?n Th?i H?c', '0123123', '395ea62457ba1302a696ef4bf8c3ebec74b6f0ac');

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
(4, 'Bánh sinh nhật 04', 110000, 'Bánh sinh nhật mứt dâu', 'bsn_04.jpg', 1),
(5, 'Bánh sinh nhật 05', 115000, 'Bánh sinh nhật mứt sầu riêng', 'bsn_05.jpg', 1),
(7, 'Bánh sinh nhật 07', 200000, 'Bánh sinh nhật đặc biệt', 'bsn_07.jpg', 1),
(8, 'banh demo', 1111110, 'ban banh', 'bsn_01.jpg', 6),
(11, 'dsadas', 80, 'dsadas', 'dsadas', 1),
(12, 'banh update', 10000, 'đâs', 'đâs', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(11) NOT NULL,
  `mahd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `mahd`, `masp`, `soluong`, `dongia`) VALUES
(7, 14, 3, 10, 0),
(8, 14, 4, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `makh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `tongtien`, `ngaytao`, `makh`) VALUES
(14, 0, '2017-12-04 19:04:23', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `idbanh` int(11) NOT NULL,
  `tenbanh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giakhuyenmai` float NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `idbanh`, `tenbanh`, `giakhuyenmai`, `mota`, `ngaybatdau`, `ngayketthuc`) VALUES
(2, 2, 'bánh sinh nhật 02', 0, 'Noel', '2017-12-04', '2017-12-19'),
(3, 3, 'bánh sinh nhật 03', 0, 'Noel', '2017-12-04', '2017-12-19'),
(4, 4, 'bánh sinh nhật 04', 0, 'Noel', '2017-12-04', '2017-12-19'),
(5, 5, 'bánh sinh nhật 05', 0, 'Noel', '2017-12-04', '2017-12-19'),
(7, 7, 'Bánh sinh nhật 07', 0, 'Noel', '2017-12-04', '2017-12-28'),
(9, 8, 'banh demo', 0, 'Noel', '2017-12-04', '2017-12-18'),
(11, 2, 'Bánh sinh nhật 02', 2312310, '3dasdas', '2017-12-09', '2017-12-16'),
(12, 5, 'Bánh sinh nhật 05', 30000, 'Noel', '2017-12-06', '2017-12-14'),
(13, 2, 'Bánh sinh nhật 02', 321312, 'dsadas', '2017-12-14', '2017-12-29'),
(14, 2, 'Bánh sinh nhật 02', 321312, 'đá', '2017-12-01', '2017-12-09'),
(15, 2, 'Bánh sinh nhật 02', 321312, 'saddasdas', '2017-12-01', '2017-12-15');

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
(6, 'demo uupdate'),
(8, 'banh mi trung thu');

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
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `banh`
--
ALTER TABLE `banh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `FK_MB` FOREIGN KEY (`idbanh`) REFERENCES `banh` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
