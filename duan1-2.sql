-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 11, 2024 lúc 04:00 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `tieude_banner` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hinhanh_banner` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `tieude_banner`, `hinhanh_banner`, `trangthai`) VALUES
(13, 'banner dep', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_general_ci NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1',
  `ngay_dang` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `trang_thai`, `ngay_dang`) VALUES
(3, 3, 14, 'Sản phẩm này rất tốt!', 1, '2024-11-16 12:00:00'),
(8, 3, 14, 'Sản phẩm này rất tốt!', 1, '2024-11-16 12:00:00'),
(9, 3, 16, 'Sản phẩm này rất tốt!', 1, '2024-11-16 12:00:00'),
(10, 6, 16, 'aaa', 1, '2024-11-24 19:01:45'),
(11, 3, 16, '1234', 1, '2024-11-24 19:02:40'),
(12, 3, 14, 'a', 1, '2024-11-24 19:20:35'),
(14, 1, 14, 'aaaaaaaaaaa', 1, '2024-11-25 16:18:33'),
(15, 1, 16, '123', 1, '2024-11-25 23:17:23'),
(16, 1, 16, '123', 1, '2024-11-26 15:50:29'),
(17, 2, 16, 'đẹp', 1, '2024-11-26 15:57:53'),
(18, 1, 16, 'jjjj', 1, '2024-11-26 16:51:55'),
(19, 4, 14, 'a', 1, '2024-12-01 02:00:39'),
(20, 1, 14, 'a', 1, '2024-12-11 22:36:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` int NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` int NOT NULL,
  `ma_don_hang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`, `ma_don_hang`) VALUES
(1, 2, 2, 100, 100, 10000, '0'),
(24, 11, 1, 55500, 210, 145643, '0'),
(25, 1, 2, 70000, 510, 643232, '0'),
(26, 14, 3, 255555, 240, 15446543, '0'),
(27, 4, 4, 65000, 140, 8450000, '0'),
(28, 5, 5, 35000, 240, 8050000, '0'),
(29, 3, 6, 46000, 110, 8450000, '0'),
(30, 1, 7, 76000, 130, 8450000, '0'),
(31, 6, 8, 25000, 150, 8450000, '0'),
(32, 4, 9, 81000, 160, 8450000, '0'),
(34, 3, 10, 46000, 110, 3430000, '0'),
(35, 1, 11, 76000, 130, 8450700, '0'),
(36, 6, 12, 25000, 150, 8455000, '0'),
(37, 4, 13, 81000, 160, 850000, '0'),
(39, 3, 14, 46000, 110, 3430000, '0'),
(40, 1, 15, 76000, 130, 8450700, '0'),
(41, 9, 16, 25000, 150, 8455000, '0'),
(42, 4, 1, 81000, 160, 850000, '0'),
(44, 8, 2, 46000, 110, 3430000, '0'),
(45, 10, 3, 76000, 130, 8450700, '0'),
(46, 11, 4, 25000, 150, 8455000, '0'),
(47, 12, 5, 81000, 160, 850000, '0'),
(49, 3, 6, 46000, 110, 3430000, '0'),
(50, 16, 7, 76000, 130, 8450700, '0'),
(51, 1, 8, 76000, 130, 8450700, '0'),
(52, 5, 9, 76000, 130, 8450700, '0'),
(53, 6, 1, 32000, 160, 8450060, '0'),
(54, 6, 1, 32000, 160, 8450060, '0'),
(55, 39, 1, 300, 2, 600, '0'),
(56, 44, 1, 300, 1, 300, 'DH-894'),
(57, 45, 1, 300, 1, 300, 'DH-328'),
(58, 46, 1, 300, 5, 1500, 'DH-257'),
(59, 47, 1, 300, 5, 1500, 'DH-914'),
(60, 47, 2, 400, 1, 400, 'DH-914'),
(61, 48, 1, 300, 6, 1800, 'DH-731'),
(62, 49, 1, 300, 6, 1800, 'DH-290'),
(63, 49, 4, 800, 1, 800, 'DH-290'),
(64, 50, 1, 300, 4, 1200, 'DH-998'),
(65, 51, 5, 500, 4, 2000, 'DH-973'),
(66, 52, 5, 500, 4, 2000, 'DH-579'),
(67, 53, 5, 500, 4, 2000, 'DH-344'),
(68, 54, 1, 300, 3, 900, 'DH-258'),
(69, 55, 1, 300, 1, 300, 'DH-831'),
(70, 55, 2, 400, 1, 400, 'DH-831'),
(71, 56, 4, 300000, 1, 300000, 'DH-537');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_general_ci,
  `diem_so` int DEFAULT NULL,
  `ngay_danh_gia` datetime DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `diem_so`, `ngay_danh_gia`, `trang_thai`) VALUES
(1, 11, 13, 'dsadasdas', 2, '2024-11-19 03:06:46', 1),
(2, 11, 14, 'vnckvncxkjvncx', 3, '2024-11-19 03:07:04', 1),
(6, 32, 1, 'dsadasdasaa', 3, '2024-11-19 03:06:46', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `trang_thai`) VALUES
(1, 'Giày đen ', 1),
(2, 'Giày trắng', 1),
(3, 'Giày thể thao', 1),
(10, 'Giày cổ cao', 1),
(14, 'Giày tây', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `dia_chi_nguoi_nhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_general_ci NOT NULL,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(37, 'DH-316', 14, 'Minh Quangn 0987', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-11-30', 31000.00, '', 1, 7),
(47, 'DH-914', 14, 'Minh Quang 0987654321', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 31900.00, '', 1, 1),
(48, 'DH-731', 14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 31800.00, '', 1, 1),
(49, 'DH-290', 14, 'Minh Quang1', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 32600.00, '', 1, 5),
(50, 'DH-998', 14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 31200.00, '', 1, 1),
(51, 'DH-973', 14, 'Minh Quang qqqqq', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 32000.00, '', 1, 7),
(52, 'DH-579', 14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 32000.00, '', 1, 1),
(53, 'DH-344', 14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 32000.00, '', 1, 1),
(54, 'DH-258', 14, 'Minh Quang thu', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 30900.00, '', 1, 1),
(55, 'DH-831', 14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-03', 30700.00, '', 1, 7),
(56, 'DH-537', 14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 'Hoài Đức, Hà Nội', '2024-12-11', 330000.00, '', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` int NOT NULL,
  `ten_khuyen_mai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_general_ci,
  `discount_value` int NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `trang_thai` enum('active','expired','suspended') COLLATE utf8mb4_general_ci DEFAULT 'active',
  `ma_khuyen_mai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`id`, `ten_khuyen_mai`, `mo_ta`, `discount_value`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `ma_khuyen_mai`) VALUES
(1, 'Giày giá rẻ!!', 'Siêu giảm có 102', 11, '2024-11-03', '2025-03-02', 'active', 'GIAY0000'),
(2, 'Sốc', 'Giảm 100%', 100, '4222-03-12', '0022-03-23', 'active', 'SOC'),
(3, 'Quá ok', 'Free', 100, '0333-03-31', '0033-03-31', 'active', 'OKOK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `email`, `noi_dung`, `ngay_tao`, `trang_thai`) VALUES
(8, 'quangnmph49685@gmail.com', 'Anh quang ', '2024-11-09', 1),
(16, 'nmph49685@gmail.com', 'qqq', '2024-11-12', 1),
(22, 'quangnmph49685@gmail.com', 'đã xong form liên hệ', '2024-11-20', 1),
(24, 'nmph49685@gmail.com', 'thử xem được chưa', '2024-11-21', 0),
(26, 'GIAYO011@gmail.com', 'GIAYO011', '2024-11-23', 0),
(27, 'quangnmph49685@gmail.com', 'thái đần', '2024-11-28', 1),
(28, 'quangnmph49685@gmail.com', 'thử thử', '2024-12-03', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `so_dien_thoai` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `vai_tro` enum('admin','user') DEFAULT 'user',
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ten_nguoi_dung`, `email`, `so_dien_thoai`, `trang_thai`, `mat_khau`, `vai_tro`, `dia_chi`) VALUES
(14, 'Minh Quang', 'quangnmph49685@gmail.com', '0945961262', 1, '$2y$10$5CY6f811VOPDboMV.N60Sex7cIWxd/6rLjqRLyE2iL7IzlROYNvDi', 'admin', 'Hoài Đức, Hà Nội'),
(16, 'Duy Thái ', 'nmph49685@gmail.com', '09999999999', 1, '$2y$10$3Xk8fCV5afvGTg9Qtf19.ewXTBBt1o0CTesUHxBCNAp1LZlNg1xLu', 'user', 'Hoài Đức, Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'Thanh toán VNPay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ql_tintuc`
--

CREATE TABLE `ql_tintuc` (
  `id` int NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ngay_tao` date NOT NULL,
  `Trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ql_tintuc`
--

INSERT INTO `ql_tintuc` (`id`, `tieude`, `noidung`, `image`, `ngay_tao`, `Trangthai`) VALUES
(13, 'Khuyến mãi HOT Mùa Đông 2024', '<p><em><strong>App TokyoLife tưng bừng Ch&agrave;o Bạn Mới - TẶNG MIỄN PH&Iacute; Nước xịt k&iacute;nh si&ecirc;u sạch TokyoLife, &aacute;p dụng cho h&oacute;a đơn bất kỳ từ 799.000đ! Ưu đ&atilde;i d&agrave;nh ri&ecirc;ng Kh&aacute;ch h&agrave;ng lần đầu c&agrave;i App, duy nhất từ 22/11 &ndash; 15/12. C&agrave;i App ngay h&ocirc;m nay kẻo lỡ nh&eacute;!</strong></em></p>\r\n<h2><a name=\"1-tang-mien-phi-sieu-tro-thu-don-nha\"></a><strong>1. Tặng Miễn Ph&iacute; Si&ecirc;u Trợ Thủ Dọn Nh&agrave;</strong></h2>\r\n<p>🎁 Mở Kho&aacute; Ưu Đ&atilde;i Ngay H&ocirc;m Nay: App TokyoLife Ch&agrave;o Bạn Mới &ndash; Th&acirc;n tặng<strong> MIỄN PH&Iacute; Nước xịt k&iacute;nh si&ecirc;u sạch 650ml</strong> &aacute;p dụng cho h&oacute;a đơn bất kỳ từ <strong>799.000đ</strong>!</p>\r\n<p>Dọn nh&agrave; cuối năm kh&ocirc;ng thể thiếu si&ecirc;u trợ thủ Nước rửa k&iacute;nh TokyoLife: Với c&ocirc;ng thức ti&ecirc;n tiến v&agrave; hương lavender dịu m&aacute;t, bề mặt k&iacute;nh kh&ocirc;ng chỉ sạch bong m&agrave; c&ograve;n chống b&aacute;m bụi hiệu quả, mang lại cảm gi&aacute;c tươi mới cho ng&ocirc;i nh&agrave; của bạn.</p>\r\n<p>Qu&agrave;<strong> </strong>Miễn Ph&iacute;<strong> </strong>d&agrave;nh ri&ecirc;ng <strong>Kh&aacute;ch h&agrave;ng lần đầu c&agrave;i App</strong>, duy nhất <strong>22/11 &ndash; 15/12/2024</strong>! <strong>Rủ bạn c&agrave;i APP</strong> ngay h&ocirc;m nay để kh&ocirc;ng bỏ lỡ đặc quyền nh&eacute;!</p>\r\n<p><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320998615611505.jpg\" width=\"701\" height=\"467\"></p>\r\n<p><strong>Hướng dẫn sử dụng code:</strong></p>\r\n<ul>\r\n<li>Hạn sử dụng code: <strong>17.12.2024</strong></li>\r\n<li>01 code &aacute;p dụng cho 01 h&oacute;a đơn mua sắm từ 799.000đ bất kỳ, kể cả giảm gi&aacute;.</li>\r\n<li>KH&Ocirc;NG &aacute;p dụng c&ugrave;ng c&aacute;c chương tr&igrave;nh code/ voucher/ qu&agrave; tặng kh&aacute;c.</li>\r\n</ul>\r\n<h2 class=\"has-medium-font-size\"><a name=\"2-chi-3-giay-cai-app-nhan-ngay-qua-ban-moi\"></a><strong>2. Chỉ 3 gi&acirc;y c&agrave;i App nhận ngay qu&agrave; bạn mới</strong></h2>\r\n<p>&nbsp;</p>\r\n<p>Sở hữu ngay qu&agrave; tặng Miễn ph&iacute; <strong>Nước xịt k&iacute;nh si&ecirc;u sạch TokyoLife</strong><strong>&nbsp;</strong>d&agrave;nh ri&ecirc;ng Th&agrave;nh vi&ecirc;n App mới chỉ với 2 bước v&ocirc; c&ugrave;ng đơn giản dưới đ&acirc;y:</p>\r\n<p><strong>Bước 1:</strong> Tải App TokyoLife GooglePlay hoặc App store v&agrave; Đăng k&iacute; Th&agrave;nh vi&ecirc;n: <a href=\"https://tokyolife.vn/blog/post/bit.ly/Cai_AppTokyoLife\">bit.ly/Cai_AppTokyoLife</a></p>\r\n<p>&nbsp;</p>\r\n<div class=\"wp-block-image\"><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320999262967043.jpg\" width=\"550\" height=\"550\"></div>\r\n<div class=\"wp-block-image\"><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320999475847514.jpg\" width=\"551\" height=\"551\"></div>\r\n<p><strong>Bước 2:</strong> Nhận Code qu&agrave; Miễn ph&iacute; tại Th&ocirc;ng b&aacute;o c&aacute; nh&acirc;n tr&ecirc;n App ngay sau khi đăng k&yacute; t&agrave;i khoản App th&agrave;nh c&ocirc;ng. Lấy m&atilde; code tại th&ocirc;ng b&aacute;o c&aacute; nh&acirc;n v&agrave; đưa cho thu ng&acirc;n để hưởng ưu đ&atilde;i v&agrave; mua sắm tại TokyoLife.</p>\r\n<div class=\"wp-block-image\"><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320999894812822.jpg\" width=\"551\" height=\"551\"></div>\r\n<p>&nbsp;</p>', 'anh2.jpg', '2024-11-24', 1),
(27, 'SALE 12/12', '<p><em><strong>Tokyo Black Friday</strong> &ndash; Đại tiệc mua sắm được mong chờ nhất, X2 ưu đ&atilde;i vừa giảm gi&aacute; vừa tặng qu&agrave;! Thời trang &ndash; Phụ kiện giảm tới <strong>50%</strong>, qu&agrave; tặng đặc biệt t&uacute;i Tote Naruto cực hấp dẫn kh&ocirc;ng thể bỏ lỡ. Duy nhất <strong>22/11 - 15/12</strong>, tới TokyoLife săn ngay nh&eacute;!</em></p>\r\n<p><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320911453122640.jpg\" width=\"702\" height=\"448\"></p>\r\n<h2><a name=\"1-giam-toi-50-top-sieu-pham-thoi-trang-phu-kien\"></a>1. GIẢM tới 50% Top si&ecirc;u phẩm Thời trang &ndash; Phụ kiện</h2>\r\n<ul>\r\n<li><strong>GIẢM 50%</strong> To&agrave;n bộ &aacute;o thun Naruto, tự h&agrave;o Việt Nam mềm mại, năng động.</li>\r\n<li><strong>GIẢM 50% </strong>Phụ kiện mix g&igrave; cũng đẹp: Gi&agrave;y thể thao, balo, t&uacute;i v&iacute;, d&acirc;y lưng, khăn qu&agrave;ng thời trang, tất ch&acirc;n giữ ấm&hellip;</li>\r\n<li><strong>GIẢM 50% </strong>Đ&egrave;n x&ocirc;ng tinh dầu, đ&egrave;n đa năng, cốc sứ, trang sức, son TokyoLife&hellip;</li>\r\n<li><strong>GIẢM 30% </strong>Bốt nữ, gi&agrave;y cao g&oacute;t, gi&agrave;y da nam, t&uacute;i đa năng, d&eacute;p b&ocirc;ng, găng tay&hellip;</li>\r\n</ul>\r\n<p><em>(Chương tr&igrave;nh ưu đ&atilde;i &aacute;p dụng theo danh mục tại hệ thống cửa h&agrave;ng TokyoLife to&agrave;n Việt Nam)</em></p>\r\n<h2><a name=\"2-hot-nhat-black-friday-mua-la-tang\"></a>2. HOT nhất: Black Friday MUA L&Agrave; TẶNG</h2>\r\n<p>Nhận Miễn ph&iacute; ngay 1 <strong>T&uacute;i Tote Naruto</strong> thiết kế độc quyền khi mua h&oacute;a đơn bất kỳ từ <strong>799K</strong>. Cơ hội săn sale nhận qu&agrave; chỉ c&oacute; tại <strong>Tokyo Black Friday</strong>, chớp ngay th&ocirc;i!</p>\r\n<p><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320989789202337.JPG\" width=\"503\" height=\"756\"></p>\r\n<h2><a name=\"3-ao-am-thong-minh-gia-dac-biet-chi-tu-249k\"></a><strong>3. &Aacute;o ấm th&ocirc;ng minh Gi&aacute; Đặc Biệt</strong> chỉ từ <strong>249K:</strong></h2>\r\n<ul>\r\n<li><strong>249K</strong> &Aacute;o l&ocirc;ng cừu trẻ em si&ecirc;u mềm, si&ecirc;u ấm (Gny 299K)</li>\r\n<li><strong>299K</strong> &Aacute;o l&ocirc;ng cừu nam/ nữ Vua giữ ấm (Gny 349K)</li>\r\n<li><strong>349K</strong> &Aacute;o phao si&ecirc;u nhẹ trẻ em ngăn gi&oacute; r&eacute;t, mưa nhẹ (Gny 399K)</li>\r\n<li><strong>449K</strong> &Aacute;o phao si&ecirc;u nhẹ nam/ nữ th&aacute;ch thức mọi gi&aacute; lạnh m&ugrave;a đ&ocirc;ng (Gny 499K).</li>\r\n</ul>\r\n<p><img src=\"https://hcm.fstorage.vn/gppm2/prod/cms/17320994430617530.jpg\" width=\"503\" height=\"534\"></p>\r\n<p>Chương tr&igrave;nh<strong> Black Friday Sale upto 50% </strong>&aacute;p dụng theo danh mục từ<strong> 22/11 - 15/12 </strong>tại hệ thống cửa h&agrave;ng TokyoLife to&agrave;n Việt Nam. K&iacute;nh mời Qu&yacute; Kh&aacute;ch đến hệ thống cửa h&agrave;ng TokyoLife lựa chọn v&agrave; mua sắm những sản phẩm ưng &yacute; nhất.</p>\r\n<p>Xem hệ thống cửa h&agrave;ng TokyoLife</p>', 'anh8.jpg', '2024-11-12', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `danh_muc_id` int NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_general_ci,
  `gia_ban` decimal(15,3) NOT NULL,
  `gia_nhap` decimal(15,3) NOT NULL,
  `gia_khuyen_mai` decimal(15,3) DEFAULT NULL,
  `so_luong` int NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trang_thai` enum('active','inactive') COLLATE utf8mb4_general_ci DEFAULT 'active',
  `ngay_nhap` date DEFAULT NULL,
  `luot_xem` int DEFAULT '0',
  `mo_ta_chi_tiet` text COLLATE utf8mb4_general_ci,
  `img_array` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id`, `danh_muc_id`, `ten_san_pham`, `mo_ta`, `gia_ban`, `gia_nhap`, `gia_khuyen_mai`, `so_luong`, `hinh_anh`, `trang_thai`, `ngay_nhap`, `luot_xem`, `mo_ta_chi_tiet`, `img_array`) VALUES
(1, 14, 'Giày Hoa', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 500000.000, 400000.000, 450000.000, 33, 'giay1.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(2, 3, 'Giày MMA', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 700000.000, 600000.000, 650000.000, 13, 'giay2.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(3, 14, 'Giày Pink', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 300000.000, 100000.000, 299000.000, 66, 'giay3.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(4, 1, 'Giày đen QQ', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 300000.000, 150000.000, 200000.000, 13, 'giay4.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(5, 2, 'Giày AF', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 150000.000, 50000.000, 140000.000, 1000, 'giay5.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(6, 2, 'Giày DonCL', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 1400000.000, 1000000.000, 1300000.000, 77, 'giay6.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(7, 10, 'Giày Pink Nhạt', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 1290000.000, 1000000.000, 1200000.000, 88, 'giay7.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(8, 14, 'Giày 7 Sắc', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 1890000.000, 1500000.000, 1800000.000, 764, 'giay8.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(9, 10, 'Giày Yellow', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 2400000.000, 2000000.000, 2450000.000, 14, 'giay9.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(10, 10, 'Giày CaoWhite', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 2650000.000, 2000000.000, 2600000.000, 34, 'giay10.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(11, 1, 'Giày Lai', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 1550000.000, 1400000.000, 1500000.000, 88, 'giay11.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(12, 2, 'Giày Xlim Pro', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 2300000.000, 2100000.000, 2200000.000, 77, 'giay12.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(13, 1, 'Giày bạc đen', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 2800000.000, 2500000.000, 2700000.000, 45, 'giay13.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(14, 3, 'Giày Adidas1', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 3999999.000, 3000000.000, 3999000.000, 67, 'giay14.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(15, 3, 'Giày Adidas Gold', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 5999999.000, 5000000.000, 5999000.000, 23, 'giay15.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(16, 2, 'Giày VIP', 'Giày là một loại phụ kiện không thể thiếu trong cuộc sống hàng ngày, được thiết kế để bảo vệ và mang lại sự thoải mái cho đôi chân. Chúng không chỉ phục vụ mục đích bảo vệ chân khỏi các tác nhân bên ngoài như bụi bẩn, nước, hoặc va đập, mà còn góp phần thể hiện phong cách và cá tính của người mang. Giày có nhiều loại, kiểu dáng, và chất liệu khác nhau, phù hợp với từng mục đích sử dụng như giày thể thao, giày da, giày cao gót, hoặc giày casual. Chúng thường được làm từ các chất liệu như da, vải, cao su, hoặc tổng hợp, đáp ứng đa dạng nhu cầu từ thời trang, thể thao cho đến công việc hàng ngày. Một đôi giày chất lượng không chỉ mang lại cảm giác êm ái mà còn giúp tăng sự tự tin và phong cách trong từng bước chân.', 3333000.000, 2999999.000, 3330000.000, 45, 'giay16.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(17, 3, 'Giày Blue Sky', 'Giày là phụ kiện thời trang quan trọng, vừa bảo vệ đôi chân vừa thể hiện phong cách cá nhân. Với đa dạng kiểu dáng, chất liệu và mục đích sử dụng, giày không chỉ mang lại sự thoải mái khi di chuyển mà còn là điểm nhấn hoàn thiện cho mọi trang phục. Từ giày thể thao năng động, giày da lịch lãm đến giày cao gót tinh tế, mỗi loại đều đáp ứng nhu cầu cụ thể, giúp người dùng tự tin và nổi bật trong mọi hoàn cảnh.', 1400000.000, 1200000.000, 1300000.000, 98, 'giay18.webp', 'active', '2024-12-11', 0, NULL, NULL),
(18, 10, 'Giày Conver', 'Giày là phụ kiện thời trang quan trọng, vừa bảo vệ đôi chân vừa thể hiện phong cách cá nhân. Với đa dạng kiểu dáng, chất liệu và mục đích sử dụng, giày không chỉ mang lại sự thoải mái khi di chuyển mà còn là điểm nhấn hoàn thiện cho mọi trang phục. Từ giày thể thao năng động, giày da lịch lãm đến giày cao gót tinh tế, mỗi loại đều đáp ứng nhu cầu cụ thể, giúp người dùng tự tin và nổi bật trong mọi hoàn cảnh.', 2400000.000, 2200000.000, 2330000.000, 87, 'giay19.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(19, 14, 'Giày SuperTay', 'Giày là phụ kiện thời trang quan trọng, vừa bảo vệ đôi chân vừa thể hiện phong cách cá nhân. Với đa dạng kiểu dáng, chất liệu và mục đích sử dụng, giày không chỉ mang lại sự thoải mái khi di chuyển mà còn là điểm nhấn hoàn thiện cho mọi trang phục. Từ giày thể thao năng động, giày da lịch lãm đến giày cao gót tinh tế, mỗi loại đều đáp ứng nhu cầu cụ thể, giúp người dùng tự tin và nổi bật trong mọi hoàn cảnh.', 1990000.000, 1000000.000, 1900000.000, 76, 'giay20.jpg', 'active', '2024-12-11', 0, NULL, NULL),
(20, 1, 'Giày Lười', 'Giày là phụ kiện thời trang quan trọng, vừa bảo vệ đôi chân vừa thể hiện phong cách cá nhân. Với đa dạng kiểu dáng, chất liệu và mục đích sử dụng, giày không chỉ mang lại sự thoải mái khi di chuyển mà còn là điểm nhấn hoàn thiện cho mọi trang phục. Từ giày thể thao năng động, giày da lịch lãm đến giày cao gót tinh tế, mỗi loại đều đáp ứng nhu cầu cụ thể, giúp người dùng tự tin và nổi bật trong mọi hoàn cảnh.', 2700000.000, 2500000.000, 2650000.000, 78, 'giày17.webp', 'active', '2024-12-11', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_images`
--

CREATE TABLE `san_pham_images` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `image_paths` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham_images`
--

INSERT INTO `san_pham_images` (`id`, `san_pham_id`, `image_paths`) VALUES
(43, 1, 'uploads/1733927977giay1.jpg'),
(44, 2, 'uploads/1733928184giay2.jpg'),
(45, 3, 'uploads/1733928265giay3.jpg'),
(46, 4, 'uploads/1733928330giay4.jpg'),
(47, 5, 'uploads/1733928392giay5.jpg'),
(48, 6, 'uploads/1733928505giay6.jpg'),
(49, 7, 'uploads/1733928617giay7.jpg'),
(50, 8, 'uploads/1733928807giay8.jpg'),
(51, 9, 'uploads/1733928973giay9.jpg'),
(52, 10, 'uploads/1733929077giay10.jpg'),
(53, 11, 'uploads/1733929222giay11.jpg'),
(54, 12, 'uploads/1733929324giay12.jpg'),
(55, 13, 'uploads/1733929477giay13.jpg'),
(56, 14, 'uploads/1733929590giay14.jpg'),
(57, 15, 'uploads/1733929699giay15.jpg'),
(58, 16, 'uploads/1733929836giay16.jpg'),
(60, 17, 'uploads/1733930563giay18.webp'),
(61, 18, 'uploads/1733930658giay19.jpg'),
(62, 19, 'uploads/1733930760giay20.jpg'),
(63, 20, 'uploads/1733931104giày17.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chờ Xác Nhận '),
(2, 'Đã Xác Nhận'),
(3, 'Đang giao'),
(4, 'Đã giao'),
(5, 'Giao hàng thành công'),
(6, 'Giao hàng thất bại'),
(7, 'Đã hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hangs_ibfk_1` (`san_pham_id`),
  ADD KEY `don_hang_id` (`don_hang_id`);

--
-- Chỉ mục cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Chỉ mục cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`),
  ADD KEY `don_hangs_ibfk_3` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`);

--
-- Chỉ mục cho bảng `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ql_tintuc`
--
ALTER TABLE `ql_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham_images`
--
ALTER TABLE `san_pham_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Chỉ mục cho bảng `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ql_tintuc`
--
ALTER TABLE `ql_tintuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `san_pham_images`
--
ALTER TABLE `san_pham_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `san_pham_images`
--
ALTER TABLE `san_pham_images`
  ADD CONSTRAINT `san_pham_images_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
