-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2020 lúc 08:06 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_type` int(11) NOT NULL COMMENT '1: quan tri, 2 : quan ly, 3: giao vien',
  `adm_name` varchar(255) NOT NULL,
  `adm_login_name` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_type`, `adm_name`, `adm_login_name`, `adm_password`, `adm_email`, `adm_phone`) VALUES
(7, 1, 'Huy Pham', 'admin2', '123456', 'huypd12@gmail.com', ''),
(9, 2, 'quanly', 'quanly', '123456', 'quanly@gmail.com', ''),
(12, 1, 'Hoàng Minh Hiếu', 'hieuhm1', '123456', 'hieuhm12@gmail.com', ''),
(17, 1, 'admin1', 'hunghmd', '123456', 'hunghmd0710@gmail.com', ''),
(23, 3, 'giaovien', 'giaovien', '123456', 'giaovien123@gmail.com', ''),
(27, 3, 'Hoàng Minh Hiếu', 'hieuhm', '123456', 'hieuhm12@gmail.com', ''),
(28, 3, 'Nguyễn Thanh Bình', 'binhnt', '123456', 'binhnt@gmail.com', ''),
(29, 1, 'Nguyễn Văn Nam', 'namnv', '123456', 'namnv334@gmail.com', ''),
(30, 3, 'Nguyễn Quốc Trình', 'trinhnq', '123456', 'trinhnq123@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `maj_id` int(11) NOT NULL,
  `maj_name` varchar(255) NOT NULL,
  `maj_man` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`maj_id`, `maj_name`, `maj_man`) VALUES
(1, 'Công nghệ thông tin', 'A01'),
(3, 'Môi trường', 'A06'),
(4, 'Kỹ thuật công trình thủy', 'TLA101'),
(5, 'Kỹ thuật xây dựng', 'TLA104'),
(6, 'Kinh tế', 'TLA401');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `modules`
--

CREATE TABLE `modules` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(255) NOT NULL,
  `mod_parent_id` int(11) NOT NULL,
  `mod_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `new_title` varchar(255) NOT NULL,
  `new_intro` varchar(255) NOT NULL,
  `new_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_intro`, `new_author`) VALUES
(2, 'Thông tin 1', 'ffffffffffffffffffffffffffffffffffffffsdsdfdsf sklfsdfsifjsaldkf dsfjsdklfsdfk sdfjsdklf asfjsdaiofsdf sdkfsdkf sadkfsdkfsdfks adfsdifeifsjdkaf fdsaf sdfsadf dsfjksd sadkfsfweaisd sdfsdfhsda f', 'Nam Nguyễn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plans`
--

CREATE TABLE `plans` (
  `pla_id` int(11) NOT NULL,
  `pla_sub_id` int(11) NOT NULL,
  `pla_date` varchar(255) NOT NULL,
  `pla_did` varchar(255) NOT NULL,
  `pla_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `plans`
--

INSERT INTO `plans` (`pla_id`, `pla_sub_id`, `pla_date`, `pla_did`, `pla_time`) VALUES
(6, 8, '10-10-2019', '307B6', '10/10/2019 đến 30/12/2020'),
(7, 13, '10-10-2019', '208A4', '10/10/2019 đến 30/12/2020'),
(9, 9, '10-10-2019', '203B5', '10/10/2019 đến 30/12/2020'),
(10, 16, '07-10-2020', '309A1', '01/01/2019 đến 30/07/2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_maj_id` int(11) NOT NULL,
  `sub_tc` int(11) NOT NULL,
  `sub_man` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`, `sub_maj_id`, `sub_tc`, `sub_man`) VALUES
(8, 'Toán 1', 1, 3, 'tlut01'),
(9, 'Công nghệ web', 1, 3, 'cs485'),
(13, 'Tin đại cương', 1, 3, 'tdc12'),
(14, 'Đường lối Cách Mạng', 5, 2, 'dlcm565'),
(16, 'Thiết kế cấu tạo', 5, 3, 'tkct29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `use_id` int(11) NOT NULL,
  `use_name` varchar(255) NOT NULL,
  `use_login_name` varchar(255) NOT NULL,
  `use_password` varchar(255) NOT NULL,
  `use_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`maj_id`);

--
-- Chỉ mục cho bảng `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mod_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Chỉ mục cho bảng `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`pla_id`),
  ADD KEY `pla_sub_id` (`pla_sub_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `maj_id` (`sub_maj_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `majors`
--
ALTER TABLE `majors`
  MODIFY `maj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `modules`
--
ALTER TABLE `modules`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `plans`
--
ALTER TABLE `plans`
  MODIFY `pla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`pla_sub_id`) REFERENCES `subjects` (`sub_id`);

--
-- Các ràng buộc cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`sub_maj_id`) REFERENCES `majors` (`maj_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
