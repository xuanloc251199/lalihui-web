-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2024 lúc 01:03 PM
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
-- Cơ sở dữ liệu: `lalihui_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `detail`) VALUES
(1, 'Sản phẩm làm sạch', ''),
(2, 'Kem Face Ngày', ''),
(3, 'Sản phẩm chăn sóc Body', ''),
(4, 'Sảm phẩm chăm sóc phục hồi Face', ''),
(5, 'Sảm phẩm chăm sóc Tóc', ''),
(6, 'Sản phẩm chăm sóc vùng nhạy cảm', ''),
(7, 'Nước hoa cơ thể', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `hotline` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `link_page` varchar(50) NOT NULL,
  `link_map` varchar(50) NOT NULL,
  `time_work` varchar(50) NOT NULL,
  `date_work` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `time_upload` datetime NOT NULL,
  `writer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prd_image`
--

CREATE TABLE `prd_image` (
  `id` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `prd_image`
--

INSERT INTO `prd_image` (`id`, `id_prd`, `name`) VALUES
(1, 3, 'sua-rua-mat-keo-ong (1).png'),
(2, 3, 'sua-rua-mat-keo-ong (2).png'),
(3, 3, 'sua-rua-mat-keo-ong (3).png'),
(4, 3, 'sua-rua-mat-keo-ong (4).png'),
(5, 4, 'sua-rua-mat-keo-ong (5).png'),
(6, 5, 'sua-rua-mat-keo-ong (6).png'),
(7, 3, 'sua-rua-mat-keo-ong (7).png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prd_name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `id_category` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `detail` text NOT NULL,
  `description` text NOT NULL,
  `announcement_form` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `prd_name`, `price`, `quantity`, `thumbnail`, `rate`, `id_category`, `size`, `origin`, `date`, `detail`, `description`, `announcement_form`) VALUES
(1, 'Dầu tẩy trang', 230000, 10, '12.png', 5, 1, 0, '', '0000-00-00', 'Sản phẩm tẩy trang giúp làm Sạch lớp bụi bẩn, chất nhờn trên da mặt, góp phần ngăn ngừa mụn, giúp làn da trông sáng hơn.', '', ''),
(3, 'Sửa rửa mặt keo ong', 290000, 10, '8.png', 5, 1, 0, '', '0000-00-00', 'Sản phẩm giúp làm sạch lớp bụi bẩn, chất nhờn trên da mặt, góp phần: hạn chế mụn, duy trì độ ẩm, cho làn da trông sáng hơn.', '', ''),
(4, 'Toner keo ong', 390000, 10, '1.png', 5, 1, 0, '', '0000-00-00', 'Da đổ nhiều dầu,lỗ chân lông to, Da thâm sạm,không đều màu da, Da nhạy cảm, Da mới đi nặn mụn về.\r\n', '', ''),
(5, 'Supper Peel', 0, 10, '1.png', 5, 1, 0, '', '0000-00-00', '', '', ''),
(6, 'Kem tuyết', 0, 0, '1.png', 5, 2, 0, '', '0000-00-00', '', '', ''),
(7, 'Kem chống nắng', 0, 0, '1.png', 5, 2, 0, '', '0000-00-00', '', '', ''),
(8, 'Bột tắm trắng thảo mộc ', 0, 0, '1.png', 5, 3, 0, '', '0000-00-00', '', '', ''),
(9, 'Sữa tắm gội 4 in1 ', 0, 0, '1.png', 5, 3, 0, '', '0000-00-00', '', '', ''),
(10, 'Oil body BHA ', 0, 0, '1.png', 5, 3, 0, '', '0000-00-00', '', '', ''),
(11, 'Kem body', 0, 0, '1.png', 5, 3, 0, '', '0000-00-00', '', '', ''),
(12, 'Kem tái sinh', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(13, 'dầu phục hồi oil repail', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(14, 'serum phục hồi plasma', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(15, 'kem tuyết', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(16, 'serum n20', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(17, 'serum m15', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(18, 'serum r5', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(19, 'serum c35%', 0, 0, '1.png', 5, 4, 0, '', '0000-00-00', '', '', ''),
(20, 'bộ dầu gội gừng', 0, 0, '', 5, 5, 0, '', '0000-00-00', '', '', ''),
(21, 'dầu gội phủ đen', 0, 0, '', 5, 5, 0, '', '0000-00-00', '', '', ''),
(22, 'nước hoa vùng v', 0, 0, '', 5, 6, 0, '', '0000-00-00', '', '', ''),
(23, 'Ngọc nữ xuân hồng', 0, 0, '', 5, 6, 0, '', '0000-00-00', '', '', ''),
(24, 'nước hoa nam', 0, 0, '', 5, 7, 0, '', '0000-00-00', '', '', ''),
(25, 'Nước hoa nữ', 0, 0, '', 5, 7, 0, '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `slide_image` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `id_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prd_image`
--
ALTER TABLE `prd_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `prd_image`
--
ALTER TABLE `prd_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
