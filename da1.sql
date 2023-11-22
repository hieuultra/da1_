-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 04:56 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `address_user` varchar(50) NOT NULL,
  `phone_user` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `payment_method` int(11) NOT NULL DEFAULT 1 COMMENT '1.thanh toan truc tiep, 2.chuyen khoan. 3.thanh toan online',
  `id_status_bill` int(1) NOT NULL DEFAULT 1 COMMENT '1.dang xu ly,2.da xac nhan,3.dang giao hang,4.da giao hang',
  `date_order` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `name_user`, `address_user`, `phone_user`, `email_user`, `total_price`, `payment_method`, `id_status_bill`, `date_order`, `id_user`) VALUES
(74, 'jacson', 'usa', '344422323', 'jacson@gmail.com', '94228.15', 3, 2, '2023-11-20 19:52:38', 8),
(81, 'hieubt', 'Hanoi', '0363707562', 'hieubtph32408@fpt.edu.vn', '119633301', 3, 1, '2023-11-22 22:04:40', 1),
(82, 'hieubt', 'Hanoi', '0363707562', 'hieubtph32408@fpt.edu.vn', '99087.52', 2, 1, '2023-11-22 22:09:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(200) NOT NULL,
  `img_br` varchar(255) NOT NULL,
  `shows_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id_brand`, `name_brand`, `img_br`, `shows_menu`) VALUES
(2, 'WP', 'vendor-8.jpg', 0),
(3, 'AM', 'vendor-6.jpg', 0),
(4, 'FZ', 'vendor-4.jpg', 0),
(5, 'BP', 'vendor-3.jpg', 0),
(6, 'TC', 'vendor-5.jpg', 0),
(7, 'DX', 'vendor-2.jpg', 0),
(8, 'IT', 'vendor-7.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `image_pro` varchar(255) NOT NULL,
  `name_pro` varchar(200) NOT NULL,
  `price_pro` float NOT NULL,
  `total` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `image_pro`, `name_pro`, `price_pro`, `total`, `quantity`, `id_pro`, `id_bill`, `id_user`) VALUES
(119, 'tải xuống (13).jpg', ' bag yellow ', 29899, 29899, 2, 16, 73, 1),
(120, 'OIP (34).jpg', ' dress cuoi ', 78999, 78999, 1, 20, 74, 8),
(121, 'OIP (4).jpg', 'quan tt', 19999, 19999, 1, 1, 74, 8),
(128, 'OIP (6).jpg', ' hoddie ', 41111100, 41111100, 3, 7, 81, 1),
(129, 'OIP (17).jpg', ' hat vf ', 23888, 23888, 2, 14, 82, 1),
(130, 'OIP (29).jpg', ' hat brown ', 35000, 35000, 2, 29, 82, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(50) NOT NULL,
  `img_cat` varchar(200) NOT NULL,
  `number_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`, `img_cat`, `number_order`) VALUES
(13, 'shirt', 'tải xuống (14).jpg', 1),
(14, 'trousers', 'OIP (28).jpg', 1),
(16, 'hat', 'OIP (1).jpg', 1),
(17, 'shoes', 'OIP (23).jpg', 1),
(22, 'bag', 'OIP (30).jpg', 1),
(44, 'dress', 'OIP (33).jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_com` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_com` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_com`, `content`, `date_com`, `id_user`, `id_pro`) VALUES
(29, 'hgjj', '2023-11-15 08:32:40', 1, 24),
(30, 'hkjhgkj\r\n', '2023-11-15 22:56:37', 3, 24),
(31, 'hha', '2023-11-18 23:01:02', 3, 27),
(32, 'new shoes', '2023-11-19 23:19:54', 3, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_pro`
--

CREATE TABLE `favorite_pro` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone_user` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `id_status_fb` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name_user`, `email_user`, `phone_user`, `subject_name`, `content`, `created_at`, `id_status_fb`) VALUES
(10, 'buitrunghieu ', 'hieubtph32408@fpt.edu.vn', '0363707561', 'Giày thể thao cao cấp ', 'hoi chat', '2023-11-16 20:37:33', 1),
(11, 'dattran', 'adminh@fpt.edu.vn', '0363707561', 'ao ', 'qua rong', '2023-11-20 21:24:53', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id_img` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `update_at` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `news_name`, `content`, `news_img`, `update_at`, `create_at`) VALUES
(1, 'Khám phá bộ sưu tập phụ kiện bằng da xịn xò của DOLO Men', 'Thời trang cho các quý ông thực thụ\" chính là tôn chỉ của DOLO Men, một trong những thương hiệu thời trang phụ kiện nam bằng da cao cấp nổi bật trong làng thời trang Việt. Trong suốt hành trình của mình, DOLO Men không ngừng sáng tạo, khơi nguồn cảm hứng ', 'banner-thoi-trang-dep-nhat_113856413.png', '2023-11-18 15:28:22', '2023-11-18 15:28:22'),
(2, 'Hermes Xuân Hè 2022: Khi nhà mốt số một ưa chuộng những con so', 'Cho mùa Xuân - Hè 2023, NTK Véronique Nichanian đã đem tới một BST thật sự lạc quan, bất chấp tiết trời ẩm ướt của mùa xuân ôn đới.\r\nHermès Xuân Hè 2022: Khi nhà mốt số một ưa chuộng những số “2” - Ảnh 1.\r\nBST thời trang nam mới từ Herme tiết chế đến kho ', 'OIP (27).jpg', '2023-11-18 15:39:37', '2023-11-18 15:39:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(200) NOT NULL,
  `img` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` float NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `id_size` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `img`, `thumbnail`, `description`, `discount`, `price`, `view`, `id_size`, `id_cat`, `id_brand`) VALUES
(1, 'quan tt', 'OIP (4).jpg', '', 'mua di', 12, 19999, 12, 1, 14, 2),
(2, ' ao zf ', 'OIP (15).jpg', '', 'vasvsavdasv', 22, 124900000, 3, 2, 13, 3),
(3, ' giay ads ', 'OIP (10).jpg', '', 'cdsacda', 11, 7900000, 13, 2, 17, 4),
(5, ' hat vg ', 'tải xuống (5).jpg', '', 'dcvdwv', 22, 123999, 2, 3, 16, 4),
(6, ' hat bb ', 'OIP (7).jpg', '', 'vssgeger', 34, 123333, 4, 4, 16, 5),
(7, ' hoddie ', 'OIP (6).jpg', '', 'ewger', 3, 41111100, 2, 2, 13, 6),
(8, ' bag pink ', 'OIP (9).jpg', '', 'fefewfe', 45, 99866, 16, 3, 22, 7),
(9, ' bag ss ', 'OIP (8).jpg', '', 'dvdsv ', 22, 29999, 2, 1, 22, 7),
(10, ' shirt whis ', 'OIP (14).jpg', '', 'ahahaha', 22, 239999, 3, 1, 13, 6),
(12, ' vest ', 'OIP (13).jpg', '', 'sdvsvasdv', 11, 23999, 8, 3, 13, 5),
(13, ' bag klm', 'OIP (19).jpg', '', 'fdfwe', 2, 34999, 4, 4, 22, 6),
(14, ' hat vf ', 'OIP (17).jpg', '', 'vdasvbab', 23, 23888, 10, 2, 16, 3),
(15, ' shoes boot ', 'OIP (24).jpg', '', 'saca', 11, 123444, 11, 2, 17, 2),
(16, ' bag yellow ', 'tải xuống (13).jpg', '', 'ewfdsvcds', 3, 29899, 28, 4, 22, 2),
(17, ' bag hhh ', 'OIP (18).jpg', '', 'sbsab', 34, 343434, 11, 3, 22, 3),
(19, ' vest girl ', 'OIP (25).jpg', '', 'fdvdsv  fwfw', 3, 23999, 17, 2, 13, 4),
(20, ' dress cuoi ', 'OIP (34).jpg', '', 'dwcdwcwee e', 3, 78999, 11, 4, 44, 5),
(21, ' shoes nike ', 'OIP (35).jpg', '', 'evef f ewrferfrefer', 34, 23445, 8, 2, 17, 6),
(22, ' shoes blak ', 'tải xuống (15).jpg', '', 'fadsds', 23, 13214, 9, 3, 17, 7),
(23, ' dress1 ', 'OIP (38).jpg', '', 'fwdw wefe', 33, 213123, 4, 2, 44, 7),
(24, ' dress2 ', 'tải xuống (17).jpg', '', 'eefef', 22, 212131, 17, 2, 44, 6),
(25, ' dress3 ', 'tải xuống (16).jpg', '', 'esf', 2, 3121210, 8, 2, 44, 2),
(26, ' ao dai vn ', 'OIP (22).jpg', '', 'afsdafa', 22, 21431, 1, 2, 13, 7),
(27, ' quan ngan ', 'tải xuống.jpg', '', 'edewf e wf', 22, 21323, 5, 1, 14, 2),
(28, ' giay sport ', 'OIP (36).jpg', '', 'dcxdsc', 22, 250000, 6, 0, 17, 3),
(29, ' hat brown ', 'OIP (29).jpg', '', 'vsdvdsv', 11, 35000, 2, 0, 16, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id_pro_detail` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `quantity_bought` int(11) NOT NULL,
  `quantity_have` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `name_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `name_size`) VALUES
(1, 'm'),
(2, 'l'),
(3, 's'),
(4, 'xl');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `img_slider` varchar(255) NOT NULL,
  `name_slider` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id_slider`, `img_slider`, `name_slider`) VALUES
(4, 'OIP (20).jpg', 'slider shirt'),
(5, 'OIP (21).jpg', 'slider shoes'),
(6, 'tải xuống (10).jpg', 'slider shorts'),
(7, 'tải xuống (11).jpg', 'slider hat'),
(10, 'th.jpg', 'slider bag');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_bill`
--

CREATE TABLE `status_bill` (
  `id_status_bill` int(11) NOT NULL,
  `name_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `status_bill`
--

INSERT INTO `status_bill` (`id_status_bill`, `name_status`) VALUES
(1, 'dang xu ly'),
(2, 'da xac nhan'),
(3, 'dang giao hang'),
(4, 'giao hang thanh cong'),
(5, 'da huy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_fb`
--

CREATE TABLE `status_fb` (
  `id_status_fb` int(1) NOT NULL,
  `name_fb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `status_fb`
--

INSERT INTO `status_fb` (`id_status_fb`, `name_fb`) VALUES
(1, 'chua xac nhan'),
(2, 'da xac nhan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_role` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `address`, `phone`, `email`, `image`, `id_role`) VALUES
(1, 'hieubt', '123', 'Buitrunghieu ', 'Hanoi', '0363707562', 'hieubtph32408@fpt.edu.vn', 'a.jpg', 1),
(3, 'hieuvip', '321', 'buitrunghieu ', 'Thai Binh', '0363707561', 'user@gmail.com', 'r.jpg', 2),
(4, 'dattc', '111', 'trancongdat', 'nam dinh', '4323214', 'dattc@gmail.com', 'cf2a122a156546850b3ef7e1bfbaed5d.jpg', 2),
(8, 'jacson', '1212', 'm.jacson', 'usa', '344422323', 'jacson@gmail.com', '686418.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_com`);

--
-- Chỉ mục cho bảng `favorite_pro`
--
ALTER TABLE `favorite_pro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_img`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id_pro_detail`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `status_bill`
--
ALTER TABLE `status_bill`
  ADD PRIMARY KEY (`id_status_bill`);

--
-- Chỉ mục cho bảng `status_fb`
--
ALTER TABLE `status_fb`
  ADD PRIMARY KEY (`id_status_fb`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `favorite_pro`
--
ALTER TABLE `favorite_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id_pro_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `status_bill`
--
ALTER TABLE `status_bill`
  MODIFY `id_status_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `status_fb`
--
ALTER TABLE `status_fb`
  MODIFY `id_status_fb` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
