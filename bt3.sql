-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2024 lúc 11:18 AM
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
-- Cơ sở dữ liệu: `bt3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu_tbl`
--

CREATE TABLE `chuc_vu_tbl` (
  `id_cv` int(255) NOT NULL,
  `chuc_vu` varchar(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu_tbl`
--

INSERT INTO `chuc_vu_tbl` (`id_cv`, `chuc_vu`, `ngay_them`) VALUES
(1, 'Project Manager', '2024-05-07 16:24:44'),
(2, 'Frontend Developer', '2024-04-23 15:12:02'),
(3, 'Backend Developer', '2024-04-23 15:11:03'),
(4, 'Tester', '2024-04-23 15:11:03'),
(5, 'Human Resources', '2024-04-23 15:11:03'),
(6, 'Accountant', '2024-04-23 15:11:03'),
(7, 'Business Analyst', '2024-04-23 15:11:03'),
(8, 'Marketing', '2024-04-23 15:11:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 1),
(2, 'nam@gmail.com', '0123456789', 2),
(3, 'thang@gmail.com', '0123456788', 2),
(4, 'thong@gmail.com', '0123456787', 2),
(5, 'vuong@gmail.com', '0123456786', 2),
(6, 'nhuan@gmail.com', '0123456785', 2),
(7, 'a@gmail.com', '0123456784', 2),
(8, 'b@gmail.com', '0123456783', 2),
(9, 'c@gmail.com', '0123456782', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong_tbl`
--

CREATE TABLE `luong_tbl` (
  `id_luong` int(255) NOT NULL,
  `id_nhanvien` int(255) NOT NULL,
  `luong_co_ban` bigint(255) NOT NULL,
  `phu_cap` bigint(255) NOT NULL,
  `tong_luong` bigint(255) NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ngay_cap_nhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `luong_tbl`
--

INSERT INTO `luong_tbl` (`id_luong`, `id_nhanvien`, `luong_co_ban`, `phu_cap`, `tong_luong`, `ngay_them`, `ngay_cap_nhat`) VALUES
(1, 2, 1000000, 20000000, 21000000, '2024-05-09 04:10:27', '2024-05-09'),
(2, 3, 60000000, 20000000, 80000000, '2024-05-09 04:14:17', '2024-05-09'),
(3, 4, 60000000, 10000000, 70000000, '2024-04-23 15:58:21', '2024-04-23'),
(4, 5, 2000000, 7000000, 9000000, '2024-05-09 04:13:50', '2024-05-09'),
(5, 6, 30000000, 5000000, 35000000, '2024-04-23 15:58:21', '2024-04-23'),
(6, 7, 40000000, 5000000, 45000000, '2024-04-23 15:58:21', '2024-04-23'),
(15, 11, 1000000, 1000000, 2000000, '2024-05-13 07:17:49', '2024-05-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghi_phep`
--

CREATE TABLE `nghi_phep` (
  `id` int(255) NOT NULL,
  `id_nhanvien` int(255) NOT NULL,
  `ly_do` varchar(255) NOT NULL,
  `chi_tiet` text NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `ngay_tao_don` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nghi_phep`
--

INSERT INTO `nghi_phep` (`id`, `id_nhanvien`, `ly_do`, `chi_tiet`, `ngay_bat_dau`, `ngay_ket_thuc`, `ngay_tao_don`, `trang_thai`) VALUES
(1, 2, 'Nghỉ ốm', 'Em bị sốt 39 độ 2 ngày nay rồi.', '2024-04-24', '2024-04-27', '2024-05-18 08:53:39', 1),
(2, 4, 'Nghỉ chăm vợ đẻ', 'Vợ em vừa mới sinh, em xin phép ở nhà chăm vợ mấy hôm.', '2024-04-25', '2024-04-29', '2024-05-17 12:11:26', 0),
(3, 2, 'Hôm nay tôi bị trùng lịch', 'Trùng lịch thực hành ATBM', '2024-05-02', '2024-05-04', '2024-05-13 10:04:50', 0),
(4, 4, 'Mai tôi đi du lịch', 'xin phép sếp nghỉ thứ 6 ạ', '2020-10-20', '2020-10-21', '2024-05-17 13:09:45', 0),
(5, 2, 'Mai tôi đi du lịch', 'Trùng lịch thực hành ATBM', '2020-10-20', '2020-10-21', '2024-05-18 07:36:03', 0),
(6, 3, 'Mai tôi đi du lịch', 'sam son', '2000-05-15', '2000-05-16', '2024-05-18 08:53:24', 0),
(7, 2, '18/5 bận đi workshop', 'hello world', '2024-05-19', '2024-05-20', '2024-05-18 08:00:18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien_tbl`
--

CREATE TABLE `nhan_vien_tbl` (
  `id_nv` int(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ngay_sinh` varchar(255) NOT NULL,
  `gioi_tinh` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `id_chuc_vu` int(11) NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `anh` varchar(255) NOT NULL DEFAULT 'default_avata.png',
  `ngay_cap_nhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien_tbl`
--

INSERT INTO `nhan_vien_tbl` (`id_nv`, `ten`, `ngay_sinh`, `gioi_tinh`, `so_dien_thoai`, `email`, `dia_chi`, `id_chuc_vu`, `ngay_vao_lam`, `ngay_them`, `anh`, `ngay_cap_nhat`) VALUES
(2, 'Phạm Hoài Nữ', '2003-08-01', 'Nam', '0123456788', 'nam@gmail.com', 'Quận Hoàng Mai, Hà Nội', 3, '2024-04-23', '2024-05-18 08:56:20', 'default_avatar.svg', '2024-04-23'),
(3, 'Nguyễn Quang Thắng', '2003-01-01', 'Nam', '0123456788', 'thang@gmail.com', 'Hà Đông, Hà Nội', 2, '2024-04-23', '2024-04-28 17:09:22', 'default_avatar.svg', '2024-04-23'),
(4, 'Đào Duy Thông', '2003-01-01', 'Nam', '0123456787', 'thong@gmail.com', 'Hà Đông, Hà Nội', 3, '2024-04-23', '2024-04-28 17:09:24', 'default_avatar.svg', '2024-04-23'),
(5, 'Lê Minh Vuong', '2003-01-01', 'Nam', '0123456786', 'vuong@gmail.com', 'Hà Đông, Hà Nội', 4, '2024-04-23', '2024-04-28 17:09:27', 'default_avatar.svg', '2024-04-23'),
(6, 'Hồ Văn Nhuận', '2003-01-01', 'Nam', '0123456785', 'nhuan@gmail.com', 'Hà Đông, Hà Nội', 5, '2024-04-23', '2024-04-28 17:09:29', 'default_avatar.svg', '2024-04-23'),
(7, 'Lê Văn A', '2003-01-01', 'Nam', '0123456784', 'a@gmail.com', 'Ba Đình, Hà Nội', 6, '2024-04-23', '2024-04-28 17:09:31', 'default_avatar.svg', '2024-04-23'),
(11, 'Lê Văn Minh', '2000-02-20', 'Nam', '0321598989', 'minh@gmail.com', 'Thành phố Thanh Hóa, Thanh Hóa', 3, '2020-10-20', '2024-05-13 07:14:30', 'default_avatar.svg', '2020-10-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuc_vu_tbl`
--
ALTER TABLE `chuc_vu_tbl`
  ADD PRIMARY KEY (`id_cv`);

--
-- Chỉ mục cho bảng `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luong_tbl`
--
ALTER TABLE `luong_tbl`
  ADD PRIMARY KEY (`id_luong`);

--
-- Chỉ mục cho bảng `nghi_phep`
--
ALTER TABLE `nghi_phep`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_vien_tbl`
--
ALTER TABLE `nhan_vien_tbl`
  ADD PRIMARY KEY (`id_nv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuc_vu_tbl`
--
ALTER TABLE `chuc_vu_tbl`
  MODIFY `id_cv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `luong_tbl`
--
ALTER TABLE `luong_tbl`
  MODIFY `id_luong` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nghi_phep`
--
ALTER TABLE `nghi_phep`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhan_vien_tbl`
--
ALTER TABLE `nhan_vien_tbl`
  MODIFY `id_nv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
