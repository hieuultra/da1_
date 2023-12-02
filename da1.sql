-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2023 lúc 06:09 PM
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
(147, 'admin', 'ha noi', '0363707561', 'admin@fpt.edu.vn', '6860', 1, 1, '2023-12-02 23:58:42', 41),
(148, 'jacson', 'usa', '344422323', 'jacson@gmail.com', '6860', 1, 3, '2023-12-02 23:59:25', 8),
(149, 'jacson', 'usa', '344422323', 'jacson@gmail.com', '31520', 3, 2, '2023-12-02 23:59:52', 8),
(151, 'hieubt', 'Hanoi', '0363707562', 'hieubtph32408@fpt.edu.vn', '56000', 2, 2, '2023-12-03 00:05:24', 1),
(152, 'hieubt', 'Hanoi', '0363707562', 'hieubtph32408@fpt.edu.vn', '81800', 1, 1, '2023-12-03 00:08:31', 1);

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
(217, '9bda540f-31c5-4ea1-8ef7-b13c99bf241a.jpg', ' shoes g ', 100, 100, 3, 42, 142, 8),
(218, 'tải xuống (9).jpg', ' hat mon ', 100000, 100000, 1, 45, 142, 8),
(219, 'Self-Taught Designer Tweets Photos Of All The Dresses She Made In 2020, And Her Thread Gets 337K Likes.jpg', ' dress gi ', 7000, 7000, 1, 51, 142, 8),
(225, 'Self-Taught Designer Tweets Photos Of All The Dresses She Made In 2020, And Her Thread Gets 337K Likes.jpg', ' dress gi ', 7000, 7000, 1, 51, 147, 41),
(226, 'Self-Taught Designer Tweets Photos Of All The Dresses She Made In 2020, And Her Thread Gets 337K Likes.jpg', ' dress gi ', 7000, 7000, 1, 51, 148, 8),
(227, 'Self-Taught Designer Tweets Photos Of All The Dresses She Made In 2020, And Her Thread Gets 337K Likes.jpg', ' dress gi ', 7000, 7000, 2, 51, 149, 8),
(228, '65bc84ee-4948-4372-9bef-9df9d9f48983.jpg', ' hat 5 ', 20000, 20000, 1, 32, 149, 8),
(229, '0a6c93bb-a3e1-4027-9ad5-60224fe0acaf.jpg', ' shoe a ', 3500, 3500, 2, 38, 150, 1),
(230, '1b685802-1193-4226-b2b1-02c51bbc76dd.jpg', ' bag shi ', 70000, 70000, 1, 44, 151, 1),
(231, 'tải xuống (6).jpg', ' shirt kk ', 40000, 40000, 2, 46, 152, 1),
(232, 'd9b74968-e7f7-4ad7-8bbd-249c09a18680.jpg', ' hat white ', 20000, 20000, 1, 49, 152, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(50) NOT NULL,
  `img_cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`, `img_cat`) VALUES
(13, 'shirt', 'Men 1pc Random Pop Art Print Stripe Trim Bomber Jacket.jpg'),
(14, 'trousers', '84269917-1f8b-40a4-852e-30b895e5a36f.jpg'),
(16, 'hat', 'ji,.jpg'),
(17, 'shoes', 'OIP (23).jpg'),
(22, 'bag', 'OIP (30).jpg'),
(44, 'dress', 'Premium Photo _ Dress on a mannequin generative ai.jpg');

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
(37, 'hihi', '2023-12-02 23:48:29', 3, 37),
(38, 'hihh cj', '2023-12-02 23:49:42', 8, 37),
(39, 'mua cd\r\n\r\n', '2023-12-03 00:01:43', 1, 38);

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
(10, 'buitrunghieu ', 'hieubtph32408@fpt.edu.vn', '0363707561', 'Giày thể thao cao cấp ', 'hoi chat', '2023-11-16 20:37:33', 2),
(11, 'dattran', 'adminh@fpt.edu.vn', '0363707561', 'ao ', 'qua rong', '2023-11-20 21:24:53', 1),
(12, 'phubt', 'phuongbt@gmail.com', '3242443242', 'mu ', 'mau dep va bat mat can mua them', '2023-11-29 22:20:16', 2),
(13, 'dattran', 'adminh@fpt.edu.vn', '4323214', 'ao ', 'csdsdf', '2023-12-01 20:18:11', 1);

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
(32, ' hat 5 ', '65bc84ee-4948-4372-9bef-9df9d9f48983.jpg', 'fdd1b1f6-30d1-4812-8575-43d852bae377.jpg', 'dcxc', 11, 20000, 20, 0, 16, 7),
(34, ' shirt6 ', '953b9010-f5e2-4eba-b085-ded519da5124.jpg', '5580ce6d-49bf-4666-aafb-f451cccd7b80.jpg', 'wdd', 22, 12900, 22, 0, 13, 5),
(35, ' trouser ninja ', 'Tactical utility pants.jpg', '84269917-1f8b-40a4-852e-30b895e5a36f.jpg', 'bdkfabdk hfdsfi gdfkh dsf', 30, 999000, 6, 0, 14, 7),
(36, ' dress12 ', 'Reup art by AnimeHinata.jpg', 'e4e82cd2-e886-4c48-b9c5-ed35ae6f7447.jpg', 'sfasd dsf ds', 34, 6800, 11, 0, 44, 8),
(37, ' shirt1 ', '↟.jpg', '9896663d-ae95-4088-aac2-590244539a06.jpg', 'dfd fddfd', 11, 29999, 7, 0, 13, 8),
(38, ' shoe a ', '0a6c93bb-a3e1-4027-9ad5-60224fe0acaf.jpg', 'cc9c0c24-bdcc-43e9-8781-76c1d49c9763.jpg', 'efwd dfdwf', 22, 3500, 4, 0, 17, 5),
(39, ' bag b ', 'Asge Backpack for Girls Kids Schoolbag Children Bookbag Women Casual Daypack.jpg', 'Hey Yoo HY760 Cute Casual Hiking Daypack Waterproof Bookbag School Bag Backpack for Girls Women.jpg', 'efwf dfdwf', 33, 3000, 3, 0, 22, 3),
(40, ' dress b ', '6f6b8541-2f53-4e05-ba26-c9aafc2b9eff.jpg', 'A-Line Prom Dresses Sparkle & Shine Dress Wedding Party Sweep _ Brush Train Sleeveless Sequined with Crystals Sequin Ruffles - Custom Size _ Black.jpg', 'dsf dfdf', 2, 200, 3, 0, 44, 8),
(41, ' trouser dx ', '006c8bdf-9090-4d21-9768-5c526cd8d203.jpg', '84269917-1f8b-40a4-852e-30b895e5a36f.jpg', 'wfdew dfd', 33, 8700, 2, 0, 14, 4),
(42, ' shoes g ', '9bda540f-31c5-4ea1-8ef7-b13c99bf241a.jpg', 'tải xuống (11).jpg', 'wddwf dfdw', 3, 100, 3, 0, 17, 3),
(43, ' bag baby ', 'ac1e08b0-9445-47bb-921f-4816bf1e7dd0.jpg', '🧚🏼_♀️ 𝓕𝐚𝐢𝐫𝐲𝐭𝐨𝐩𝐢𝐚 🧚.jpg', 'dwfd dfd', 22, 50000, 2, 0, 22, 8),
(44, ' bag shi ', '1b685802-1193-4226-b2b1-02c51bbc76dd.jpg', 'Asge Backpack for Girls Kids Schoolbag Children Bookbag Women Casual Daypack.jpg', 'dfd dfdf', 20, 70000, 2, 0, 22, 8),
(45, ' hat mon ', 'tải xuống (9).jpg', '4e2b057c-a5cd-4f52-82a9-1fc43be1624c.jpg', 'ddf dfdsf dfds', 40, 100000, 2, 0, 16, 2),
(46, ' shirt kk ', 'tải xuống (6).jpg', 'tải xuống (7).jpg', 'dfdsf dfds', 22, 40000, 3, 0, 13, 2),
(47, ' dress19 ', 'tải xuống (12).jpg', '1ad588fd-19d6-4618-9580-84a8f6b60ec8.jpg', 'dfdsf dsfdsf dsfs', 25, 190000, 2, 0, 44, 6),
(49, ' hat white ', 'd9b74968-e7f7-4ad7-8bbd-249c09a18680.jpg', 'Ear Decor Fuzzy Bucket Hat.jpg', 'dssdds d', 3, 20000, 1, 0, 16, 8),
(50, ' hat pink ', '🩷.jpg', '0657255e-2026-4c46-a2cf-098be56c47df.jpg', 'dd dsd ds ', 23, 79000, 1, 0, 16, 6),
(51, ' dress gi ', 'Self-Taught Designer Tweets Photos Of All The Dresses She Made In 2020, And Her Thread Gets 337K Likes.jpg', 'e4b58558-4f39-424d-a934-5152e3046062.jpg', 'sd dsfds dsf ds', 2, 7000, 1, 0, 44, 2),
(53, ' vest man ', '3e95730f-a958-496d-b600-5bfac04c3d3b.jpg', 'Mens Jacket Trench Long Coat Casual Fashion Double Breast Coat Luxury Black Tweed Long Overcoat Long Jackets.jpg', 'dds dsfdsf sd', 2, 6500, 1, 0, 13, 2);

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
(4, 'dattc', '111', 'trancongdat', 'nam dinh', '4323214', 'dattc@gmail.com', 'cf2a122a156546850b3ef7e1bfbaed5d.jpg', 1),
(8, 'jacson', '1212', 'm.jacson', 'usa', '344422323', 'jacson@gmail.com', '686418.jpg', 1),
(9, 'phubt', '111', 'phudatvan', 'ha nam', '3424343243', 'phuongbt@gmail.com', 'b23e5566cc93eeff46c0d4277cceea6d.jpg', 1),
(41, 'admin', '', 'admin1', 'ha noi', '0363707561', 'admin@fpt.edu.vn', '', 1);

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
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
