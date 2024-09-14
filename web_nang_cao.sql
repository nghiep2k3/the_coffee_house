-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:4306
-- Thời gian đã tạo: Th9 14, 2024 lúc 10:35 AM
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
-- Cơ sở dữ liệu: `web_nang_cao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`) VALUES
(1, 'nghiep1320', 'Nghiep2k3!', 'admin'),
(3, 'vinhmom123', '123456', 'admin'),
(4, 'nghiep2k3', '123456', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_item` int(100) NOT NULL,
  `money` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `username`, `tel`, `address`, `total_item`, `money`) VALUES
(1, 'Nguyễn Thiện Nghiệp', '11111', 'Thái bình', 6, '600000'),
(2, '', 's', '1', 0, '300000'),
(3, '', 's', '1', 0, '3'),
(4, '', 's', '1', 0, '3'),
(5, '', 's', '1', 0, '3'),
(6, '', 's', '1', 0, '3'),
(7, '', 's', '1', 0, '3'),
(8, '', 'Nghiệp', '123456', 0, '3'),
(9, 'Nghiệp', '123456', 'Hưng hà', 3, '300000'),
(10, 'Nghiệp', '123456', 'Hưng hà', 3, '300000'),
(11, 'Nghiệp', '123456', 'Hưng hà', 3, '300000'),
(12, '', '', '', 0, ''),
(13, 'Nghiệp6', '123456', 'Tây Mỗ city', 1, '100000'),
(14, '', '', '', 0, ''),
(15, '', '', '', 0, ''),
(16, '', '', '', 0, ''),
(17, 'Nguyễn Thiện Nghiệp', '12345678', 'Thái Bình', 3, '270000'),
(18, '', '', '', 0, ''),
(19, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `id_account` int(100) NOT NULL,
  `name_account` varchar(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_account`, `name_account`, `id_product`, `quantity`) VALUES
(1, 1, 'nghiep1320', 1, 5),
(3, 1, 'nghiep1320', 2, 8),
(5, 3, 'vinhmom123', 3, 3),
(6, 3, 'vinhmom123', 1, 1),
(7, 3, 'vinhmom123', 2, 2),
(8, 1, 'nghiep1320', 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `CateName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `CateName`) VALUES
(1, 'Cà phê'),
(2, 'Trà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` double NOT NULL,
  `create_id` varchar(100) NOT NULL,
  `id_product` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `username`, `quantity`, `total`, `create_id`, `id_product`) VALUES
(14, 'test_user', 1, 100000, '1718545407', 1),
(135, 'nghiep2k3', 3, 270000, '1719030261', 3),
(136, 'nghiep1320', 1, 80000, '1724113230', 2),
(137, 'vinhmom123', 2, 200000, '1726245388', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `unit_price` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `src_img` varchar(1000) DEFAULT NULL,
  `idCategory` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `unit_price`, `description`, `src_img`, `idCategory`) VALUES
(1, 'Cà phê', 1, '100000', 'Đường Đen Marble Latte êm dịu cực hấp dẫn bởi vị cà phê đắng nhẹ hoà quyện cùng vị đường đen ngọt th', 'https://product.hstatic.net/1000075078/product/1686716532_dd-suada_c180c6187e644babbac7019a2070231e_large.jpg', 1),
(2, 'Trà sữa', 1, '80000', 'Tận hưởng hương vị Oolong nướng đậm đà được Nhà rang kỹ càng, quyện cùng sữa thơm béo, càng thêm hấp', 'https://product.hstatic.net/1000075078/product/1716811640_oolong-suong-sao_810f3f7504aa45fca9f7ab6eed7a9f89_large.jpg', 2),
(3, 'Đường đen đá', 1, '90000', 'Nếu chuộng vị cà phê đậm đà, bùng nổ và thích vị đường đen ngọt thơm, Đường Đen Sữa Đá đích thị là t', 'https://product.hstatic.net/1000075078/product/1686716532_dd-suada_c180c6187e644babbac7019a2070231e_large.jpg', 1),
(4, 'Đường Đen Marble Latte', 4, '55000', 'Đường Đen Marble Latte êm dịu cực hấp dẫn bởi vị cà phê đắng nhẹ hoà quyện cùng vị đường đen ngọt th', 'https://product.hstatic.net/1000075078/product/1686716537_dd-latte_785591205184481597a2a79b9331e03b.jpg', 1),
(5, 'Caramel Macchiato Đá', 3, '45000', 'Khuấy đều trước khi sử dụng Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo c', 'https://product.hstatic.net/1000075078/product/caramel-macchiato_143623_0e070a39d0e54e808db4d91049430b51.jpg', 1),
(6, 'Espresso Nóng', 5, '30000', 'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân ', 'https://product.hstatic.net/1000075078/product/espressonong_612688_41d0812d5efb47aaaebaea91a3b206db.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b` (`id_account`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `b` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
