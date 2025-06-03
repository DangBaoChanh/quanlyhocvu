-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2025 lúc 12:06 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `truonghoc_iuh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_ad` int(10) NOT NULL,
  `hotenadmin` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_ad`, `hotenadmin`, `user_id`) VALUES
(1, 'Đặng Bảo Chánh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitaplythuyet`
--

CREATE TABLE `baitaplythuyet` (
  `id_btlt` int(10) NOT NULL,
  `tieude` varchar(50) DEFAULT NULL,
  `filebt` varchar(50) DEFAULT NULL,
  `batdaunop` varchar(50) DEFAULT NULL,
  `ketthucnop` varchar(50) DEFAULT NULL,
  `ngaydang` varchar(50) DEFAULT NULL,
  `id_giangday` int(10) DEFAULT NULL,
  `id_hocphan` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baitaplythuyet`
--

INSERT INTO `baitaplythuyet` (`id_btlt`, `tieude`, `filebt`, `batdaunop`, `ketthucnop`, `ngaydang`, `id_giangday`, `id_hocphan`) VALUES
(18, 'Thường Kì 3', NULL, '2025-05-14', '2025-05-14', NULL, NULL, 247),
(22, 'OK ', NULL, '2025-05-20', '2025-05-20', NULL, NULL, 252),
(24, 'Cuối kỳ', NULL, '2025-05-24', '2025-05-29', NULL, NULL, 248),
(26, 'Thường Kì 1', NULL, '2025-05-27', '2025-05-29', NULL, NULL, 248);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyennganh`
--

CREATE TABLE `chuyennganh` (
  `id_chuyennganh` int(10) NOT NULL,
  `machuyennganh` varchar(50) NOT NULL,
  `tenchuyennganh` varchar(50) NOT NULL,
  `id_khoa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyennganh`
--

INSERT INTO `chuyennganh` (`id_chuyennganh`, `machuyennganh`, `tenchuyennganh`, `id_khoa`) VALUES
(56, 'HTTT', 'Hệ Thống Thông Tin', 40),
(57, 'CNTT', 'Công Nghệ Thông Tin', 40),
(58, 'KHMT', 'Khoa Học Máy Tính', 40),
(59, 'KTPM', 'Kỹ Thuật Phần Mềm', 40),
(60, 'QTKD', 'Quản Trị Kinh Doanh', 41),
(61, 'QTNNL', 'Quản Trị Nguồn Nhân Lực', 41),
(62, 'ELAW', 'Luật Kinh Tế', 42),
(63, 'ILAW', 'Luật Quốc Tế', 42),
(74, 'KeT', 'Kế Toán', 45),
(75, 'KiT', 'Kiểm Toán', 45),
(76, 'KTHH', 'Kỹ Thuật Hóa Học', 48),
(77, 'HPT', 'Hóa Phân Tích', 48),
(86, 'SHYD', 'Sinh Học Y Dược', 56),
(87, 'SHNN', 'Sinh Học Nông Nghiệp', 56),
(88, 'SHTM', 'Sinh Học Thẩm Mỹ', 56),
(89, 'YDP', 'Y Dược Phẩm', 56);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congno`
--

CREATE TABLE `congno` (
  `id_congno` int(55) NOT NULL,
  `id_sinhvien` int(55) NOT NULL,
  `mahocphan` varchar(255) NOT NULL,
  `tenhocphan` varchar(255) NOT NULL,
  `sotinchi` varchar(55) NOT NULL,
  `trangthai` varchar(55) NOT NULL DEFAULT '0',
  `tongtien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congno`
--

INSERT INTO `congno` (`id_congno`, `id_sinhvien`, `mahocphan`, `tenhocphan`, `sotinchi`, `trangthai`, `tongtien`) VALUES
(8, 90, '4203003191', 'Công Nghệ Mới Trong Phát Triển Ứng Dụng CNTT', '3', '0', '1,300,000 VNĐ'),
(9, 90, '4203003192', 'Lập Trình Phân Tích Dữ Liệu 1', '3', '0', '1,300,000 VNĐ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hocphan`
--

CREATE TABLE `ct_hocphan` (
  `id_chitiethp` int(10) NOT NULL,
  `id_hocphan` int(10) NOT NULL,
  `loaihp` varchar(50) DEFAULT NULL,
  `soTC` int(10) DEFAULT NULL,
  `TCLT` int(10) DEFAULT NULL,
  `TCTH` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_hocphan`
--

INSERT INTO `ct_hocphan` (`id_chitiethp`, `id_hocphan`, `loaihp`, `soTC`, `TCLT`, `TCTH`) VALUES
(44, 247, 'LT & TH', 3, 2, 1),
(45, 248, 'LT & TH', 3, 1, 2),
(46, 249, 'LT & TH', 3, 1, 2),
(47, 250, 'LT & TH', 3, 2, 1),
(48, 251, 'LT & TH', 3, 1, 2),
(49, 252, 'LT & TH', 3, 1, 2),
(50, 253, 'LT & TH', 3, 1, 2),
(51, 254, 'LT', 3, 3, 0),
(52, 255, 'LT', 3, 3, 0),
(53, 256, 'LT', 3, 3, 0),
(54, 257, 'LT', 3, 3, 0),
(55, 258, 'LT', 2, 2, 0),
(56, 259, 'LT', 3, 3, 0),
(57, 260, 'LT', 3, 3, 0),
(73, 276, 'LT', 3, 0, 0),
(77, 280, 'LT', 3, 0, 0),
(82, 285, 'LT', 4, 4, 0),
(83, 286, 'LT', 3, 3, 0),
(84, 287, 'LT', 3, 3, 0),
(85, 288, 'LT', 3, 3, 0),
(86, 289, 'LT', 3, 3, 0),
(87, 290, 'LT', 3, 3, 0),
(88, 291, 'LT', 2, 2, 0),
(90, 293, 'LT', 3, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id_diem` int(10) NOT NULL,
  `TK1` varchar(50) NOT NULL,
  `TK2` varchar(50) NOT NULL,
  `TK3` varchar(50) NOT NULL,
  `GK` varchar(50) NOT NULL,
  `TH1` varchar(50) NOT NULL,
  `TH2` varchar(50) NOT NULL,
  `TH3` varchar(50) NOT NULL,
  `CK` varchar(50) NOT NULL,
  `diemtb` varchar(50) DEFAULT NULL,
  `id_lophocphan` int(10) NOT NULL,
  `id_sinhvien` int(10) NOT NULL,
  `id_hocphan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`id_diem`, `TK1`, `TK2`, `TK3`, `GK`, `TH1`, `TH2`, `TH3`, `CK`, `diemtb`, `id_lophocphan`, `id_sinhvien`, `id_hocphan`) VALUES
(6, '9', '4.3', '4.7', '10', '8', '9', '9', '10', '9.47', 8, 98, 248),
(7, '6', '7.5', '7', '5.5', '7', '9', '7', '7', '6.6', 8, 90, 248),
(8, '6', '5.2', '7', '7', '5', '7', '8', '8', '7.37', 8, 94, 248),
(9, '8', '7', '', '6', '8', '5', '8', '7.5', '6.99', 8, 110, 248),
(10, '3', '7', '', '8', '9', '9', '7', '9.5', '8.55', 8, 95, 248),
(11, '10', '9', '9', '9', '9', '9', '9', '9', '9.03', 8, 111, 248);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkhp`
--

CREATE TABLE `dkhp` (
  `id_dkhp` int(10) NOT NULL,
  `id_sinhvien` varchar(10) NOT NULL,
  `id_hocphan` varchar(10) NOT NULL,
  `ngaydk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dkhp`
--

INSERT INTO `dkhp` (`id_dkhp`, `id_sinhvien`, `id_hocphan`, `ngaydk`) VALUES
(162, '96', '247', '2025-04-22 00:21:40'),
(163, '97', '247', '2025-04-22 00:21:40'),
(164, '90', '247', '2025-04-22 00:21:40'),
(165, '98', '247', '2025-04-22 00:21:40'),
(166, '111', '247', '2025-04-22 00:21:40'),
(167, '112', '247', '2025-04-22 00:21:40'),
(168, '96', '248', '2025-04-22 00:21:40'),
(170, '93', '248', '2025-04-22 00:21:40'),
(171, '94', '250', '2025-04-21 02:38:18'),
(172, '', '247', '2025-04-21 16:09:24'),
(173, '91', '247', '2025-04-22 00:21:40'),
(174, '96', '250', '2025-04-22 00:21:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `filenopbtlt`
--

CREATE TABLE `filenopbtlt` (
  `id_filenopbtlt` int(10) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `filenop` varchar(50) NOT NULL,
  `ngaynop` varchar(50) NOT NULL,
  `id_btlt` int(10) NOT NULL,
  `id_sinhvien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `filenopbtlt`
--

INSERT INTO `filenopbtlt` (`id_filenopbtlt`, `tieude`, `filenop`, `ngaynop`, `id_btlt`, `id_sinhvien`) VALUES
(15, 'Thường Kì 1', 'chinh.docx', '2025-05-15 13:46:39', 17, 96),
(22, 'sdfsdfsd', 'testbaomat.rar', '2025-05-22 16:49:10', 11, 90),
(37, 'hihi', 'up web.docx', '2025-05-25 17:30:35', 23, 90),
(40, 'Cuối kỳ', 'file_sach.txt', '2025-05-27 20:15:14', 24, 90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangday`
--

CREATE TABLE `giangday` (
  `id_giangday` int(10) NOT NULL,
  `id_giangvien` int(10) DEFAULT NULL,
  `id_giangvienTH1` int(10) DEFAULT NULL,
  `id_giangvienTH2` int(10) DEFAULT NULL,
  `id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giangday`
--

INSERT INTO `giangday` (`id_giangday`, `id_giangvien`, `id_giangvienTH1`, `id_giangvienTH2`, `id`) VALUES
(124, 7, 8, 0, 5),
(125, 7, 8, 0, 5),
(126, 10, 10, 0, 13),
(127, 8, 7, 0, 17),
(128, 9, 9, 0, 31),
(129, 7, 7, 9, 12),
(130, 7, 8, 10, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `id_giangvien` int(10) NOT NULL,
  `magiangvien` varchar(50) DEFAULT NULL,
  `hotengiangvien` varchar(50) DEFAULT NULL,
  `gioitinh` varchar(50) DEFAULT NULL,
  `sdt` varchar(50) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `hocvi` varchar(50) DEFAULT NULL,
  `quatrinhcongtac` varchar(1000) DEFAULT NULL,
  `cosogiangday` varchar(50) DEFAULT NULL,
  `chungchi` varchar(50) DEFAULT NULL,
  `chungchikhac` varchar(1000) DEFAULT NULL,
  `congtrinhkhoahoctieubieu` varchar(1000) DEFAULT NULL,
  `id_chuyennganh` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `trangthai` int(55) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`id_giangvien`, `magiangvien`, `hotengiangvien`, `gioitinh`, `sdt`, `diachi`, `hocvi`, `quatrinhcongtac`, `cosogiangday`, `chungchi`, `chungchikhac`, `congtrinhkhoahoctieubieu`, `id_chuyennganh`, `user_id`, `trangthai`) VALUES
(7, 'TT@#123', 'ĐẶNG BẢO CHÁNH', 'Nam', '0324536212', 'Số 12, Nguyễn Thị Minh Khai, Q1, TP.HCM', 'Thạc Sĩ', 'Đang cập nhật...', 'Cơ Sở 1 ( TP.HCM )', 'IELTS 6.0', 'Chứng chỉ ATTT', 'Đang cập nhật...', 56, 437, 0),
(8, 'TV@123!', 'NGUYỄN THÀNH KHÁNH', 'Nữ', '0986543782', 'Q.Gò Vấp, TP.HCM', 'Thạc Sĩ', 'Đang cập nhật...', 'Cơ Sở 1 ( TP.HCM )', 'Đang cập nhật...', 'Đang cập nhật...', 'Đang cập nhật...', 56, 438, 1),
(9, 'AT!@#234', 'LÊ THỊ DUNG', 'Nữ', '0786843432', 'Q12, TP.HCM', 'Thạc sĩ', '2018 : Đà Nẵng', 'Cơ Sở 1 ( TP.HCM )', 'Đang cập nhật...', 'Đang cập nhật...', 'Đang cập nhật...', 57, 439, 1),
(10, 'HK#!@65', 'TRỊNH PHƯƠNG THẢO', 'Nữ', '0437428435', 'H.Hóc Môn, TP.HCM', 'Giáo Sư', 'Đang cập nhật...', 'Cơ Sở 1 ( TP.HCM )', 'Đang cập nhật...', 'Đang cập nhật...', 'Đang cập nhật...', 58, 440, 1),
(14, 'TB@432', 'NGUYỄN HOÀI PHÁT', 'Nam', '0324332423', 'H.Bình Chánh, TP.HCM', 'Thạc Sĩ', 'Đang cập nhật...', 'Cơ Sở 1 ( TP.HCM )', 'Đang cập nhật...', 'Đang cập nhật...', 'Đang cập nhật...', 60, 444, 1),
(15, 'VH#!@564', 'PHẠM HUY HOÀNG', 'Nam', '0437343438', 'Q.7, TP.HCM', 'Tiến Sĩ', 'Đang cập nhật...', 'Cơ Sở 1 ( TP.HCM )', 'Đang cập nhật...', 'Đang cập nhật...', 'Đang cập nhật...', 62, 445, 1),
(27, 'q', 'q', 'Nữ', 'q', 'q', NULL, NULL, NULL, NULL, NULL, NULL, 63, 479, 0),
(28, '1', 'Như', 'Nữ', 'q', 'q', 'Thạc sĩ', '2018 : Đà Nẵng', NULL, 'I8', ' ', NULL, 76, 481, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `id_hocphan` int(10) NOT NULL,
  `mahocphan` varchar(50) NOT NULL,
  `tenhocphan` varchar(50) NOT NULL,
  `id_khoa` int(10) NOT NULL,
  `trangthai` int(55) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`id_hocphan`, `mahocphan`, `tenhocphan`, `id_khoa`, `trangthai`) VALUES
(247, '4203003190', 'Hoạch Định Tài Nguyên Doanh Nghiệp', 40, 1),
(248, '4203003191', 'Công Nghệ Mới Trong Phát Triển Ứng Dụng CNTT', 40, 1),
(249, '4203003192', 'Lập Trình Phân Tích Dữ Liệu 1', 40, 1),
(250, '4203003193', 'Các Hệ Thống Thông Minh Doanh Nghiệp', 40, 0),
(251, '4203003194', 'Hệ Quản Trị Cơ Sở Dữ Liệu', 40, 0),
(252, '4203003195', 'Lập Trình Phân Tích Dữ Liệu 2', 40, 1),
(253, '4203003196', 'Phân Tích Thiết Kế Hệ Thống', 40, 0),
(254, '4203003197', 'Quản Lý Dự Án', 40, 0),
(255, '4203003198', 'Quản Trị Tác Nghiệp TMĐT', 40, 0),
(256, '4203003300', 'Tư Tưởng Hồ Chí Minh', 42, 0),
(257, '4203003301', 'Đường Lối Cách Mạng Của Đảng Cộng Sản Việt Nam', 42, 0),
(258, '4203003302', 'Pháp Luật Đại Cương', 42, 0),
(259, '4203003303', 'Luật Kinh Tế Chính Trị', 42, 0),
(260, '4203003304', 'Luật Môi Trường', 42, 0),
(285, '4203003401', 'Quản Trị Chuỗi Cung Ứng', 41, 0),
(286, '4203003402', 'Quản Trị Bán Hàng', 41, 0),
(287, '4203003403', 'Hành Vi Tổ Chức', 41, 0),
(288, '4203003404', 'Quản Trị Nguồn Nhân Lực', 41, 0),
(289, '4203003405', 'Quản Trị Doanh Nghiệp', 41, 0),
(290, '4203003406', 'Giao Tiếp Kinh Doanh', 41, 0),
(291, '4203003407', 'Quản Trị Chiến Lược', 41, 0),
(293, '4203003408', 'Kinh Tế Vĩ Mô', 41, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoctap`
--

CREATE TABLE `hoctap` (
  `id_hoctap` int(10) NOT NULL,
  `id_sinhvien` int(10) DEFAULT NULL,
  `id_giangvienTH` int(10) DEFAULT NULL,
  `id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoctap`
--

INSERT INTO `hoctap` (`id_hoctap`, `id_sinhvien`, `id_giangvienTH`, `id`) VALUES
(40, 97, 8, 5),
(42, 98, 8, 5),
(43, 111, 8, 5),
(44, 112, 8, 5),
(47, 93, 7, 12),
(48, 94, 9, 31),
(49, 0, 8, 5),
(50, 91, 8, 5),
(73, 96, 8, 11),
(86, 90, 8, 11),
(87, 90, 8, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoavien`
--

CREATE TABLE `khoavien` (
  `id_khoa` int(10) NOT NULL,
  `makhoa` varchar(50) NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoavien`
--

INSERT INTO `khoavien` (`id_khoa`, `makhoa`, `tenkhoa`) VALUES
(40, 'CNTT', 'Công Nghệ Thông Tin'),
(41, 'QTKD', 'Quản Trị Kinh Doanh'),
(42, 'LAW', 'Luật'),
(44, 'CNTP', 'Công Nghệ Thực Phẩm'),
(45, 'KTKT', 'Kế Toán - Kiểm Toán'),
(46, 'TCNH', 'Tài Chính Ngân Hàng'),
(47, 'TMDL', 'Thương Mại Du Lịch'),
(48, 'CNHH', 'Công Nghệ Hóa Học'),
(54, 'CNDM', 'Công Nghệ Dệt May'),
(55, 'QHCC', 'Quan Hệ Công Chúng'),
(56, 'CNSH', 'Công Nghệ Sinh Học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `id_lophocphan` int(10) NOT NULL,
  `malophocphan` varchar(50) DEFAULT NULL,
  `tenlophocphan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`id_lophocphan`, `malophocphan`, `tenlophocphan`) VALUES
(8, '420300319001', 'DHHTTT17B'),
(13, '420300319002', 'DHHTTT17C'),
(14, '420300319101', 'DHHTTT17A'),
(15, '420300319102', 'DHHTTT17B'),
(16, '420300319202', 'DHKHDL17B'),
(17, '420300319201', 'DHKHDL17A'),
(19, '420300319501', 'DHCNTT17A'),
(20, '420300319502', 'DHHTTT17A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monlop`
--

CREATE TABLE `monlop` (
  `id` int(10) NOT NULL,
  `thuhocLT` varchar(50) DEFAULT NULL,
  `thuhocTH` varchar(50) DEFAULT NULL,
  `tietbatdauLT` varchar(50) DEFAULT NULL,
  `tietketthucLT` varchar(50) DEFAULT NULL,
  `tietbatdauTH` varchar(50) DEFAULT NULL,
  `tietketthucTH` varchar(50) DEFAULT NULL,
  `phonghocLT` varchar(50) DEFAULT NULL,
  `phonghocTH` varchar(50) DEFAULT NULL,
  `id_hocphan` int(10) DEFAULT NULL,
  `id_lophocphan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monlop`
--

INSERT INTO `monlop` (`id`, `thuhocLT`, `thuhocTH`, `tietbatdauLT`, `tietketthucLT`, `tietbatdauTH`, `tietketthucTH`, `phonghocLT`, `phonghocTH`, `id_hocphan`, `id_lophocphan`) VALUES
(1, '2', '5', '4', '6', '4', '6', 'V9.05', 'H4.01', 247, 14),
(11, '6', '4', '4', '6', '7', '9', 'X11.09', 'H4.02', 248, 15),
(13, '7', '3', '4', '6', '10', '12', 'A1.03', 'H4.01', 249, 16),
(17, '2', '6', '1', '3', '7', '9', 'X8.04', 'V11.03', 252, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id_sinhvien` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `tensinhvien` varchar(50) DEFAULT NULL,
  `masosinhvien` varchar(10) DEFAULT NULL,
  `gioitinh` varchar(50) DEFAULT NULL,
  `ngaysinh` varchar(50) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ngaycap` varchar(50) DEFAULT NULL,
  `noicap` varchar(50) DEFAULT NULL,
  `diachilienhe` varchar(50) DEFAULT NULL,
  `hokhauthuongtru` varchar(50) DEFAULT NULL,
  `ngayvaotruong` varchar(50) DEFAULT NULL,
  `khoa` varchar(50) DEFAULT NULL,
  `lopCN` varchar(50) DEFAULT NULL,
  `cosodaotao` varchar(50) DEFAULT NULL,
  `trangthai` varchar(50) DEFAULT NULL,
  `id_chuyennganh` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id_sinhvien`, `user_id`, `tensinhvien`, `masosinhvien`, `gioitinh`, `ngaysinh`, `sdt`, `ngaycap`, `noicap`, `diachilienhe`, `hokhauthuongtru`, `ngayvaotruong`, `khoa`, `lopCN`, `cosodaotao`, `trangthai`, `id_chuyennganh`) VALUES
(90, 403, 'ĐẶNG BẢO CHÁNH', '21071141', 'Nam', '2001-07-14', '0328864730', '2023-02-02', 'Nghệ An', 'Nam Đàn,Nghệ An', 'Nghệ An', '2019-08-14', '    2019-2023 ', 'DH_CN_A', 'Cơ Sở 1 ( TP.HCM )', '1', 56),
(91, 404, 'NGUYỄN THỊ DUNG', '21071142', 'Nữ', '2001-08-16', '0432564215', '2022-12-01', 'TP.HCM', 'Quận 2, TP.HCM', 'TP.HCM', '2019-08-13', '2019-2023', 'DH_CN_B', 'Cơ Sở 1 ( TP.HCM )', '1', 57),
(92, 405, 'NGUYỄN HOÀI PHÁT', '21071143', 'Nam', '2000-12-13', '0523745463', '2021-05-03', 'Bình Dương', 'Bến Cát, Bình Dương', 'Bình Dương', '2018-08-14', '2018-2022', 'DH_CN_C', 'Cơ Sở 1 ( TP.HCM )', '1', 59),
(93, 406, 'LÊ THÙY TRANG', '21071144', 'Nữ', '1999-09-01', '0754462513', '2023-06-04', 'Thanh Hóa', 'Triệu Sơn, Thanh Hóa', 'Thanh Hóa', '2017-08-13', '2017-2021', 'DH_CN_D', 'Cơ Sở 1 ( TP.HCM )', '1', 63),
(94, 407, 'TRỊNH PHƯƠNG DUNG', '21071145', 'Nữ', '2003-03-12', '0767415644', '2023-07-05', 'Nghệ An', 'Vinh,Nghệ An', 'Nghệ An', '2021-08-20', '2021-2025', 'DH_CN_E', 'Cơ Sở 1 ( TP.HCM )', '1', 60),
(95, 408, 'TRỊNH VIỆT ANH', '21071146', 'Nam', '2002-05-06', '0356276432', '2022-03-04', 'Hà Tĩnh', 'Đức Thọ, Hà Tĩnh', 'Hà Tĩnh', '2020-08-15', '2020-2024', 'DH_CN_F', 'Cơ Sở 1 ( TP.HCM )', '1', 61),
(96, 409, 'PHẠM HUY HÙNG', '21071147', 'Nam', '2001-12-09', '0325927624', '2023-03-02', 'Đà Nẵng', 'Ngũ Hành Sơn,Đà Nẵng', 'Đà Nẵng', '2019-07-22', '2019-2023', 'DHHTTT15A', 'Cơ Sở 1 ( TP.HCM )', '1', 56),
(97, 410, 'ĐẶNG XUÂN HÙNG', '21071148', 'Nam', '2001-08-15', '', '2021-08-01', 'Thanh Hóa', 'Thọ Xuân, Thanh Hóa', 'Thanh Hóa', '2019-08-16', '2019-2023', 'DHHTTT15A', 'Cơ Sở 1 ( TP.HCM )', '1', 56),
(98, 411, 'LÊ HOÀI SANG', '12345678', 'Nữ', '2001-08-16', '0234543217', '2021-03-02', 'Sóc Trăng', 'Sóc Trăng', 'Sóc Trăng', '2019-08-14', '2019-2023', 'DH_CN_G', 'Cơ Sở 1 ( TP.HCM )', '1', 56),
(99, 412, 'LÊ NGUYỄN VÂN ANH', '13543212', 'Nữ', '2000-11-10', '0132474348', '2020-04-01', 'Trà Vinh', 'Trà Vinh', 'Trà Vinh', '2020-08-17', '2020-2024', 'DH_CN_H', 'Cơ Sở 1 ( TP.HCM )', '1', 69),
(110, 453, 'PHẠM THỊ MAI HOA', '19234762', 'Nam', '2001-07-16', '0364249437', '2021-04-02', 'Đà Nẵng', 'Đà Nẵng', 'Đà Nẵng', '2019-08-14', '2019-2023', 'DH_CN_I', 'Cơ Sở 1 ( TP.HCM )', '1', 74),
(111, 454, 'NGUYỄN NHẬT TÂN', '18934251', 'Nam', '2001-07-16', '0324756438', '2021-07-16', 'update...', 'update...', 'update...', '2021-07-16', 'update...', 'update...', 'update...', '1', 56),
(112, 459, 'ĐẶNG THỊ VÂN ANH', '16534214', 'Nữ', '2001-07-02', '0546282488', '2021-07-13', 'update...', 'update...', 'update...', '2021-07-16', 'update...', 'update...', 'update...', '1', 56),
(113, 460, 'TRẦN MINH QUANG', '16754633', 'Nam', '2023-12-13', '0473432575', '2023-12-13', '', '', '', '2023-12-13', '', '', '', '1', 74),
(114, 461, 'NGUYỄN MAI THƯƠNG', '18964327', 'Nữ', '2023-12-13', '0327432844', '2023-12-13', '', '', '', '2023-12-13', '', '', '', '1', 63),
(115, 464, 'Nguyễn A', '5', 'Nữ', NULL, '999', NULL, NULL, 'Nam Trung', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(116, 470, '8', '8', 'Nam', NULL, '8', NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(117, 478, 'Bảo', '0', 'Nam', NULL, '853', NULL, NULL, 'ko ko', NULL, NULL, NULL, NULL, NULL, '1', 63),
(118, 480, 'quỳnh', '12', 'Nữ', NULL, '88555', NULL, NULL, 'qưe', NULL, NULL, NULL, NULL, NULL, '1', 87);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_code` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `vaitro` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cccd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_code`, `matkhau`, `vaitro`, `email`, `cccd`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'e10adc3949ba59abbe56e057f20f883e', '2', 'baochanh@gmail.com', '0462010001691'),
(403, '4c240e8dbd41980d8cdbd786b8417c8d', 'e10adc3949ba59abbe56e057f20f883e', '0', 'aa@gmail.com', '123456543213'),
(404, '9a1f222192ee14c380b02f33e033993e', 'e10adc3949ba59abbe56e057f20f883e', '0', 'cdf@gmail.com', '234543212346'),
(405, '8df27168494143b5ed2aa3156dbe1175', 'e10adc3949ba59abbe56e057f20f883e', '0', 'ngh@gmail.com', '564327891653'),
(406, 'd6b7b70b51516604bf6e0f56fdf6cf09', 'e10adc3949ba59abbe56e057f20f883e', '0', 'dscav123@gmail.com', '202134759732'),
(407, 'a8647283d26f791e048433fe04630a2a', 'e10adc3949ba59abbe56e057f20f883e', '0', 'csd@gmail.com', '468392273299'),
(408, 'bace732f59e7586a4fbfac02e17aab7c', 'e10adc3949ba59abbe56e057f20f883e', '0', 'hyd@gmail.com', '374393232329'),
(409, '169887e761ba65487d57f2a03deba94a', 'e10adc3949ba59abbe56e057f20f883e', '0', 'until@gmail.com', '0462010001692'),
(410, 'f185bb8802c3a0ab567640a25488064d', 'e10adc3949ba59abbe56e057f20f883e', '0', 'caobinhuy@gmail.com', '123456543212'),
(411, '25d55ad283aa400af464c76d713c07ad', 'e10adc3949ba59abbe56e057f20f883e', '0', 'nnh@gmail.com', '434267846575'),
(412, 'b7eca66772ae7f9c87850b22198956ee', 'e10adc3949ba59abbe56e057f20f883e', '0', 'ntv@gmail.com', '743643937534'),
(437, '354f31b1031ca6dddf783514597ab0b2', 'e10adc3949ba59abbe56e057f20f883e', '1', 'ntx@gmail.com', '034521678543'),
(438, '03248bac15a680f70d8e40491890805e', 'e10adc3949ba59abbe56e057f20f883e', '1', 'tv@gmail.com', '032453628163'),
(439, '228e9061edbaf03310f27808291591ef', 'e10adc3949ba59abbe56e057f20f883e', '1', 'at@gmail.com', '065748362746'),
(440, 'bba72ca3dd728f039abd56f3e8a1c6a7', 'e10adc3949ba59abbe56e057f20f883e', '1', 'hk@gmail.com', '098563333732'),
(444, 'ff18fc2eabec6ddb5ed492fd0483e062', 'e10adc3949ba59abbe56e057f20f883e', '1', 'tb@gmail.com', '000326323200'),
(445, '9e0c8c7b39444e4c928e1e05de87f793', 'e10adc3949ba59abbe56e057f20f883e', '1', 'vh@gmail..com', '046343200434'),
(453, '8020461cbd8d99ed35c2b2ddedd0523f', 'e10adc3949ba59abbe56e057f20f883e', '0', 'ttt@gmail.com', '364343248344'),
(454, '626fd80919df0b3cbd8c0442a83b9ee5', 'e10adc3949ba59abbe56e057f20f883e', '0', 'nnn@gmail.com', 'update...'),
(457, '164f258dcdc72961d72160d641499f31', 'e10adc3949ba59abbe56e057f20f883e', '1', '', ''),
(458, '1354f521e62b1191c350c1038721b374', 'e10adc3949ba59abbe56e057f20f883e', '1', '', ''),
(459, '680646901bca4bdc422ae47b92970e85', 'e10adc3949ba59abbe56e057f20f883e', '0', 'nhm@gmail.com', 'update...'),
(460, '3edc05bc1d20693595179d4fa27b39dd', 'e10adc3949ba59abbe56e057f20f883e', '0', 'ttm@gmail.com', ''),
(461, '666e29b189a83367706d31d8f62bab54', 'e10adc3949ba59abbe56e057f20f883e', '0', 'ntt@gmail.com', ''),
(478, 'cfcd208495d565ef66e7dff9f98764da', 'cfcd208495d565ef66e7dff9f98764da', '0', '', ''),
(479, '7694f4a66316e53c8cdd9d9954bd611d', '7694f4a66316e53c8cdd9d9954bd611d', '1', '', ''),
(480, 'c20ad4d76fe97759aa27a0c99bff6710', 'c20ad4d76fe97759aa27a0c99bff6710', '0', '', ''),
(481, 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', '1', '', ''),
(482, '1', '1', '1', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_ad`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `baitaplythuyet`
--
ALTER TABLE `baitaplythuyet`
  ADD PRIMARY KEY (`id_btlt`),
  ADD KEY `id_giangday` (`id_giangday`);

--
-- Chỉ mục cho bảng `chuyennganh`
--
ALTER TABLE `chuyennganh`
  ADD PRIMARY KEY (`id_chuyennganh`),
  ADD KEY `id_khoa` (`id_khoa`),
  ADD KEY `id_khoa_2` (`id_khoa`);

--
-- Chỉ mục cho bảng `congno`
--
ALTER TABLE `congno`
  ADD PRIMARY KEY (`id_congno`);

--
-- Chỉ mục cho bảng `ct_hocphan`
--
ALTER TABLE `ct_hocphan`
  ADD PRIMARY KEY (`id_chitiethp`),
  ADD KEY `id_hocphan` (`id_hocphan`),
  ADD KEY `id_hocphan_2` (`id_hocphan`),
  ADD KEY `id_hocphan_3` (`id_hocphan`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id_diem`),
  ADD KEY `id_sinhvien` (`id_sinhvien`),
  ADD KEY `id_hocphan` (`id_hocphan`),
  ADD KEY `id_lophocphan` (`id_lophocphan`);

--
-- Chỉ mục cho bảng `dkhp`
--
ALTER TABLE `dkhp`
  ADD PRIMARY KEY (`id_dkhp`),
  ADD KEY `id_sinhvien` (`id_sinhvien`,`id_hocphan`);

--
-- Chỉ mục cho bảng `filenopbtlt`
--
ALTER TABLE `filenopbtlt`
  ADD PRIMARY KEY (`id_filenopbtlt`),
  ADD KEY `id_btlt` (`id_btlt`,`id_sinhvien`);

--
-- Chỉ mục cho bảng `giangday`
--
ALTER TABLE `giangday`
  ADD PRIMARY KEY (`id_giangday`),
  ADD KEY `id_giangvien` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id_giangvien`),
  ADD KEY `id_taikhoan` (`user_id`),
  ADD KEY `id_chuyennganh` (`id_chuyennganh`);

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`id_hocphan`),
  ADD KEY `id_khoa` (`id_khoa`),
  ADD KEY `id_khoa_2` (`id_khoa`);

--
-- Chỉ mục cho bảng `hoctap`
--
ALTER TABLE `hoctap`
  ADD PRIMARY KEY (`id_hoctap`),
  ADD KEY `id_sinhvien` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Chỉ mục cho bảng `khoavien`
--
ALTER TABLE `khoavien`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`id_lophocphan`);

--
-- Chỉ mục cho bảng `monlop`
--
ALTER TABLE `monlop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hocphan` (`id_hocphan`,`id_lophocphan`),
  ADD KEY `id_lophocphan` (`id_lophocphan`),
  ADD KEY `id_hocphan_2` (`id_hocphan`),
  ADD KEY `id_hocphan_3` (`id_hocphan`),
  ADD KEY `id_lophocphan_2` (`id_lophocphan`),
  ADD KEY `id_lophocphan_3` (`id_lophocphan`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id_sinhvien`),
  ADD UNIQUE KEY `id_taikhoan_3` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `id_taikhoan` (`user_id`),
  ADD KEY `id_taikhoan_2` (`user_id`),
  ADD KEY `id_taikhoan_4` (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `user_id_4` (`user_id`),
  ADD KEY `user_id_5` (`user_id`),
  ADD KEY `user_id_6` (`user_id`),
  ADD KEY `id_chuyennganh_3` (`id_chuyennganh`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_ad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `baitaplythuyet`
--
ALTER TABLE `baitaplythuyet`
  MODIFY `id_btlt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `chuyennganh`
--
ALTER TABLE `chuyennganh`
  MODIFY `id_chuyennganh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `congno`
--
ALTER TABLE `congno`
  MODIFY `id_congno` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ct_hocphan`
--
ALTER TABLE `ct_hocphan`
  MODIFY `id_chitiethp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id_diem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `dkhp`
--
ALTER TABLE `dkhp`
  MODIFY `id_dkhp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT cho bảng `filenopbtlt`
--
ALTER TABLE `filenopbtlt`
  MODIFY `id_filenopbtlt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `giangday`
--
ALTER TABLE `giangday`
  MODIFY `id_giangday` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id_giangvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  MODIFY `id_hocphan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT cho bảng `hoctap`
--
ALTER TABLE `hoctap`
  MODIFY `id_hoctap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `khoavien`
--
ALTER TABLE `khoavien`
  MODIFY `id_khoa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `id_lophocphan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `monlop`
--
ALTER TABLE `monlop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id_sinhvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
