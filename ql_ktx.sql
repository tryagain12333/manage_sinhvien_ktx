-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2017 lúc 11:22 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien`
--

CREATE TABLE `dien` (
  `MaPhong` int(11) NOT NULL,
  `ThangGhiSo` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ChiSoDau` double NOT NULL,
  `ChiSoCuoi` double NOT NULL,
  `DonGiaID` int(225) NOT NULL,
  `TienDien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dien`
--

INSERT INTO `dien` (`MaPhong`, `ThangGhiSo`, `ChiSoDau`, `ChiSoCuoi`, `DonGiaID`, `TienDien`) VALUES
(1, '2017-09', 0, 15, 10, 18000),
(1, '2017-10', 15, 66, 10, 61200),
(1, '2017-11', 66, 80, 10, 16800),
(2, '2017-09', 0, 66, 10, 79200),
(2, '2017-10', 66, 68, 10, 2400),
(2, '2017-11', 68, 90, 10, 26400),
(3, '2017-11', 0, 20, 10, 24000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongia`
--

CREATE TABLE `dongia` (
  `DonGiaID` int(50) NOT NULL,
  `Loai` int(5) NOT NULL,
  `DonGia` double NOT NULL,
  `NgayCapNhat` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongia`
--

INSERT INTO `dongia` (`DonGiaID`, `Loai`, `DonGia`, `NgayCapNhat`) VALUES
(1, 2, 2500, '2017-10-23'),
(2, 1, 2200, '2017-10-24'),
(3, 1, 2300, '2017-10-22'),
(4, 1, 2400, '2017-10-24'),
(5, 1, 1000, '2017-10-24'),
(6, 2, 2500, '2017-10-24'),
(7, 2, 2000, '2017-10-25'),
(8, 2, 1000, '2017-10-25'),
(9, 2, 2500, '2017-10-25'),
(10, 1, 1200, '2017-10-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `SoHoaDon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaPhong` int(255) NOT NULL,
  `ThangGhiSo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`SoHoaDon`, `NgayLap`, `MaPhong`, `ThangGhiSo`, `TongTien`) VALUES
('HD010917', '2017-10-29 09:10:46', 1, '2017-09', '58000'),
('HD011017', '2017-10-29 09:11:03', 1, '2017-10', '158700'),
('HD011117', '2017-12-05 07:37:56', 1, '2017-11', '104300'),
('HD020917', '2017-10-29 09:10:52', 2, '2017-09', '216700'),
('HD021017', '2017-10-29 09:11:09', 2, '2017-10', '64900');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLop` int(255) NOT NULL,
  `TenLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`) VALUES
(1, 'CNTT-15'),
(2, 'TADL1-16'),
(3, 'DVPL1-15'),
(4, 'DVPL2-15'),
(5, 'DVPL1-16'),
(6, 'DVPL2-16'),
(7, 'CNTT-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nuoc`
--

CREATE TABLE `nuoc` (
  `MaPhong` int(11) NOT NULL,
  `ThangGhiSo` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ChiSoDau` double NOT NULL,
  `ChiSoCuoi` double NOT NULL,
  `DonGiaID` int(225) NOT NULL,
  `TienNuoc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nuoc`
--

INSERT INTO `nuoc` (`MaPhong`, `ThangGhiSo`, `ChiSoDau`, `ChiSoCuoi`, `DonGiaID`, `TienNuoc`) VALUES
(1, '2017-09', 0, 16, 9, 40000),
(1, '2017-10', 16, 55, 9, 97500),
(1, '2017-11', 55, 90, 9, 87500),
(2, '2017-09', 0, 55, 9, 137500),
(2, '2017-10', 55, 80, 9, 62500),
(2, '2017-11', 80, 90, 9, 25000),
(3, '2017-11', 0, 25, 9, 62500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MaPhong` int(255) NOT NULL,
  `TenPhong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoNguoi` int(255) NOT NULL,
  `TinhTrangPhong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`, `SoNguoi`, `TinhTrangPhong`) VALUES
(1, 'T1_101', 4, 1),
(2, 'T1_102', 1, 0),
(3, 'T1_103', 0, 0),
(4, 'T1_104', 0, 0),
(5, 'T2_201', 0, 0),
(6, 'T2_202', 0, 0),
(7, 'T2_203', 0, 0),
(8, 'T2_204', 0, 0),
(9, 'T3_201', 0, 0),
(10, 'T3_202', 0, 0),
(11, 'T3_203', 0, 0),
(12, 'T3_204', 0, 0),
(13, 'T4_201', 0, 0),
(14, 'T4_202', 0, 0),
(15, 'T4_203', 0, 0),
(16, 'T4_203', 0, 0),
(17, 'T4_204', 0, 0),
(18, 'T4_401', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` int(255) NOT NULL,
  `MaPhong` int(255) NOT NULL,
  `NoiSinhID` int(255) NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `HoTen`, `MaLop`, `MaPhong`, `NoiSinhID`, `GioiTinh`, `NgaySinh`, `Sdt`) VALUES
('151183404101', 'Phan Anh Vui', 1, 1, 2, 'Nam', '1997-08-04', '0905.111.333'),
('151183404102', 'Huỳnh Văn Duy', 4, 2, 1, 'Nam', '1997-08-04', '0905.444.666'),
('151183404103', 'Nguyễn tấn nguyên', 1, 1, 4, 'Nam', '1997-11-07', '0905.444.666'),
('151183404104', 'Nguyễn Quỳnh Dao', 2, 1, 26, 'Nữ', '1997-08-07', '0904.111.111'),
('151183404105', 'Lê Quốc Hoàng', 6, 1, 14, 'Nam', '1998-08-04', '0905 444 666');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhthanh`
--

CREATE TABLE `tinhthanh` (
  `IDTinhThanh` int(255) NOT NULL,
  `TenTinhThanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhthanh`
--

INSERT INTO `tinhthanh` (`IDTinhThanh`, `TenTinhThanh`) VALUES
(1, 'Thành Phố Hà Nội'),
(2, 'Tỉnh Hà Giang'),
(4, 'Tỉnh Cao Bằng'),
(6, 'Tỉnh Bắc Kạn'),
(8, 'Tỉnh Tuyên Quang'),
(10, 'Tỉnh Lào Cai'),
(11, 'Tỉnh Điện Biên'),
(12, 'Tỉnh Lai Châu'),
(14, 'Tỉnh Sơn La'),
(15, 'Tỉnh Yên Bái'),
(17, 'Tỉnh Hoà Bình'),
(19, 'Tỉnh Thái Nguyên'),
(20, 'Tỉnh Lạng Sơn'),
(22, 'Tỉnh Quảng Ninh'),
(24, 'Tỉnh Bắc Giang'),
(25, 'Tỉnh Phú Thọ'),
(26, 'Tỉnh Vĩnh Phúc'),
(27, 'Tỉnh Bắc Ninh'),
(30, 'Tỉnh Hải Dương'),
(31, 'Thành phố Hải Phòng'),
(33, 'Tỉnh Hưng Yên'),
(34, 'Tỉnh Thái Bình'),
(35, 'Tỉnh Hà Nam'),
(36, 'Tỉnh Nam Định'),
(37, 'Tỉnh Ninh Bình'),
(38, 'Tỉnh Thanh Hóa'),
(40, 'Tỉnh Nghệ An'),
(42, 'Tỉnh Hà Tĩnh'),
(44, 'Tỉnh Quảng Bình'),
(45, 'Tỉnh Quảng Trị'),
(46, 'Tỉnh Thừa Thiên Huế'),
(48, 'Thành phố Đà Nẵng'),
(49, 'Tỉnh Quảng Nam'),
(51, 'Tỉnh Quảng Ngãi'),
(52, 'Tỉnh Bình Định'),
(54, 'Tỉnh Phú Yên'),
(56, 'Tỉnh Khánh Hòa'),
(58, 'Tỉnh Ninh Thuận'),
(62, 'Tỉnh Kon Tum'),
(64, 'Tỉnh Gia Lai'),
(66, 'Tỉnh Đắk Lắk'),
(67, 'Tỉnh Đắk Nông'),
(68, 'Tỉnh Lâm Đồng'),
(70, 'Tỉnh Bình Phước'),
(72, 'Tỉnh Tây Ninh'),
(74, 'Tỉnh Bình Dương'),
(75, 'Tỉnh Đồng Nai'),
(77, 'Tỉnh Bà Rịa - Vũng Tàu'),
(79, 'Thành phố Hồ Chí Minh'),
(80, 'Tỉnh Long An'),
(82, 'Tỉnh Tiền Giang'),
(83, 'Tỉnh Bến Tre'),
(84, 'Tỉnh Trà Vinh'),
(86, 'Tỉnh Vĩnh Long'),
(87, 'Tỉnh Đồng Tháp'),
(89, 'Tỉnh An Giang'),
(91, 'Tỉnh Kiên Giang'),
(92, 'Thành phố Cần Thơ'),
(93, 'Tỉnh Hậu Giang'),
(94, 'Tỉnh Sóc Trăng'),
(95, 'Tỉnh Bạc Liêu'),
(96, 'Tỉnh Cà Mau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Password2` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CapQuyen` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserName`, `Password`, `Password2`, `Name`, `CapQuyen`) VALUES
('admin', '1234', 'asdasd', 'Quản Trị Viên', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dien`
--
ALTER TABLE `dien`
  ADD PRIMARY KEY (`MaPhong`,`ThangGhiSo`);

--
-- Chỉ mục cho bảng `dongia`
--
ALTER TABLE `dongia`
  ADD PRIMARY KEY (`DonGiaID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`SoHoaDon`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  ADD PRIMARY KEY (`MaPhong`,`ThangGhiSo`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Chỉ mục cho bảng `tinhthanh`
--
ALTER TABLE `tinhthanh`
  ADD PRIMARY KEY (`IDTinhThanh`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dongia`
--
ALTER TABLE `dongia`
  MODIFY `DonGiaID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `MaLop` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `MaPhong` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
