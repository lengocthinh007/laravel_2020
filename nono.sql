-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 18, 2020 lúc 09:57 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nono`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Thịnh Lê', 'admin@abc', NULL, NULL, 1, '$2y$10$eESookUL5Je9.riyUOu4ce3/53h4z4OENitFtsb99tgsy8GGyDXmW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại đẹp', 'dien-thoai-dep', 2, 0, 'fd', 'fds', '2020-01-02 20:03:41', '2020-01-02 20:03:41'),
(2, 'Iphone 2', 'iphone-2', 1, 1, 'Iphone 2', 'Iphone 2', '2020-01-06 02:03:26', '2020-01-06 02:03:26'),
(3, 'SamSung', 'samsung', 2, 0, 'SamSung', 'SamSung', '2020-01-06 02:03:52', '2020-01-06 02:03:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_content` text COLLATE utf8mb4_unicode_ci,
  `c_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `c_name`, `c_email`, `c_title`, `c_content`, `c_status`, `created_at`, `updated_at`) VALUES
(5, 'Lê Tú', 'nobita@abc', 'Chào Admin', 'Tốt lắm', 1, '2020-02-13 08:52:54', '2020-02-13 08:53:21'),
(6, 'Văn Lê', 'nobita@abc', 'Help me', 'Không có gì', 1, '2020-02-13 08:54:15', '2020-02-13 08:54:24'),
(7, 'Hống Ân', 'nobita@abc', 'Hihi', 'Chào', 1, '2020-02-13 08:55:27', '2020-02-13 08:55:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_06_025848_cates', 1),
(19, '2019_12_06_030322_products', 1),
(20, '2019_12_06_032107_product_images', 1),
(21, '2020_01_02_091118_after_product', 2),
(22, '2020_01_20_144913_contact', 3),
(23, '2020_01_21_150650_transaction', 4),
(24, '2020_01_21_150729_order', 4),
(25, '2020_01_21_150757_after_product_2', 4),
(26, '2020_01_27_101736_rating', 5),
(27, '2020_01_27_101809_after_product_3', 5),
(28, '2020_02_02_100431_admin', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `qty` tinyint(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `pro_sale` int(11) NOT NULL DEFAULT '0',
  `pro_active` tinyint(4) NOT NULL DEFAULT '1',
  `pro_hot` tinyint(4) NOT NULL DEFAULT '0',
  `pro_view` int(11) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pro_title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_content` longtext COLLATE utf8mb4_unicode_ci,
  `pro_pay` tinyint(4) NOT NULL DEFAULT '0',
  `pro_number` tinyint(4) NOT NULL DEFAULT '0',
  `pro_total_rating` int(11) NOT NULL DEFAULT '0' COMMENT 'Tổng số đánh giá',
  `pro_total_number` int(11) NOT NULL DEFAULT '0' COMMENT 'Tổng số điểm đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `pro_sale`, `pro_active`, `pro_hot`, `pro_view`, `image`, `keywords_seo`, `description`, `description_seo`, `user_id`, `cate_id`, `created_at`, `updated_at`, `pro_title_seo`, `pro_content`, `pro_pay`, `pro_number`, `pro_total_rating`, `pro_total_number`) VALUES
(2, 'Điện Thoại Vsmart Star - Hàng chính hãng', 'dien-thoai-vsmart-star-hang-chinh-hang', 2000000, 30, 1, 0, 0, 'xwBv_view_3.jpg', NULL, 'i', 'hhhhhhhh', 1, 3, '2020-02-02 07:55:45', '2020-02-13 09:09:26', 'b', 'a', 0, 10, 4, 13),
(3, 'Điện Thoại Samsung Galaxy Note 10 Plus (256GB/12GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử', 'dien-thoai-samsung-galaxy-note-10-plus-256gb-12gb-hang-chinh-hang-da-kich-hoat-bao-hanh-dien-tu', 3000000, 60, 1, 0, 0, 'view_2.jpg', NULL, 'i', 'u', 1, 3, '2020-02-07 03:59:06', '2020-02-07 03:59:06', 'Điện Thoại Samsung Galaxy Note 10 Plus (256GB/12GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử', 'hg', 0, 10, 0, 0),
(4, 'Điện Thoại Xiaomi Redmi 7A (2GB/16GB) - Hàng Chính Hãng', 'dien-thoai-xiaomi-redmi-7a-2gb-16gb-hang-chinh-hang', 5000000, 0, 1, 0, 0, 'review_1.jpg', NULL, 'u', 'Điện Thoại Xiaomi Redmi 7A (2GB/16GB) - Hàng Chính Hãng', 1, 3, '2020-02-07 04:00:13', '2020-02-07 04:00:13', 'Điện Thoại Xiaomi Redmi 7A (2GB/16GB) - Hàng Chính Hãng', 'u', 0, 10, 0, 0),
(5, 'Điện Thoại iPhone 11 128GB - Hàng Chính Hãng', 'dien-thoai-iphone-11-128gb-hang-chinh-hang', 10000000, 20, 1, 0, 0, 'fcuN_best_1.png', NULL, 'g', 'fd', 1, 3, '2020-02-07 04:01:23', '2020-02-07 04:01:23', 'fd', 'fgd', 0, 10, 0, 0),
(6, 'Điện Thoại iPhone 8 Plus - Hàng Chính Hãng VN/A', 'dien-thoai-iphone-8-plus-hang-chinh-hang-vn-a', 7000000, 0, 1, 0, 0, 'banner_product.png', NULL, 'gf', 'f', 1, 3, '2020-02-07 04:01:59', '2020-02-07 04:01:59', 'g', 'gf', 0, 10, 0, 0),
(7, 'Điện Thoại iPhone 11 Pro Max 64GB - Hàng Nhập Khẩu', 'dien-thoai-iphone-11-pro-max-64gb-hang-nhap-khau', 6000000, 50, 1, 0, 0, 'featured_1.png', NULL, 'ff', 'd', 1, 3, '2020-02-07 04:02:42', '2020-02-07 04:02:42', 'fd', 'd', 0, 10, 0, 0),
(8, 'Điện Thoại iPhone 11 Pro 64GB - Hàng Chính Hãng', 'dien-thoai-iphone-11-pro-64gb-hang-chinh-hang', 4000000, 20, 1, 0, 0, 'featured_6.png', NULL, 'df', 'd', 1, 3, '2020-02-07 04:03:22', '2020-02-07 04:03:22', 'df', 'fds', 0, 10, 0, 0),
(9, 'Điện Thoại iPhone 10 128GB - Hàng Chính Hãng', 'dien-thoai-iphone-10-128gb-hang-chinh-hang', 9000000, 20, 1, 0, 0, 'new_6.jpg', NULL, 'ds', 'yt', 1, 3, '2020-02-07 04:04:23', '2020-02-07 04:04:23', 'd', 'fsd', 0, 20, 0, 0),
(10, 'Điện Thoại iPhone 11 158GB - Hàng Chính Hãng', 'dien-thoai-iphone-11-158gb-hang-chinh-hang', 5000000, 20, 1, 0, 0, 'new_2.jpg', NULL, 'fds', 'fd', 1, 3, '2020-02-07 04:05:04', '2020-02-07 04:05:04', 'fds', 'fsd', 0, 10, 0, 0),
(11, 'Điện Thoại iPhone 01 128GB - Hàng Chính Hãng', 'dien-thoai-iphone-01-128gb-hang-chinh-hang', 7500000, 20, 1, 0, 0, 'new_7.jpg', NULL, 'fd', 'f', 1, 3, '2020-02-07 04:05:41', '2020-02-07 04:05:41', 'g', 'gdf', 0, 10, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `number` tinyint(4) NOT NULL DEFAULT '0',
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `number`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(34, 2, 3, 'đẹp', 1, '2020-02-02 08:46:19', '2020-02-02 08:46:19'),
(35, 2, 4, 'dsadsdsds', 9, '2020-02-13 09:02:19', '2020-02-13 09:02:19'),
(36, 2, 3, 'gâu', 9, '2020-02-13 09:07:45', '2020-02-13 09:07:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '1',
  `total_pay` int(11) DEFAULT '0',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `code_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone`, `address`, `about`, `avatar`, `active`, `total_pay`, `code`, `time_code`, `code_active`, `time_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'xeko', '$2y$10$IyuT3SzWkzDUTI.a0t7hzerURyudFBZmxeOnif66TVrML./Z/MLx.', 'xeko@abc', 90124538, 'bến tre', 'hay', NULL, 1, 2, '$2y$10$WfqqceqTqBj0EWHRfIzTKu0rs4e6WNPXUXow4.LDD7EKvLRs6CLUy', '2020-02-05 03:22:12', NULL, NULL, 'UrYNbQipa6wd8ymemj47l52mOcX5KbGLWTWoS4T5cLJ1qX26QLAf51nlaBQV', '2020-01-21 04:07:30', '2020-02-05 03:22:12'),
(9, 'Hao Le', '$2y$10$.aiq5yDSBeBlWUZxaaOBBus61/xBSgLXkKMGSgGceLyxF6G74xXqG', 'lengocthinh004@gmail.com', 45646546, NULL, NULL, NULL, 2, 0, '$2y$10$vGG8kjZvIBGfzgFR3pnAYeHT1UU32gsspx0k88d8VspzjRsqjOq1a', '2020-02-06 07:50:18', '$2y$10$rYlc9lpslyoeRK3ixqGDsu9jnizXkTnQvdMtxl2Td4talcebbNbSu', '2020-02-06 07:47:54', 'aeB5SHR3v4YzIFyrVU0FtvT9K8HbtnphiDzebMlXNcKa0GZsGh3FLFIxuH2O', '2020-02-06 07:47:54', '2020-02-06 07:50:55'),
(10, 'tung', '$2y$10$BXS85aLwb/aBIHoK4bK9n.m4U8CTzRT3gtlwiiv/MydrMGHsqrsRa', 'xbvsdgfd@fsdfds', 4224525, NULL, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$DYCOH7APYEAFEiqCsavtOOtxkVLDHAn1Z/gGwVuZantKzv2SQX0BO', '2020-02-14 03:21:25', NULL, '2020-02-14 03:21:25', '2020-02-14 03:21:25'),
(11, 'nobita', '$2y$10$6ga4.gkXV7lKpXI4MMADqubHEZcG2BLRnmH.AmyQzbDvLnWWl4tPW', 'nobita@abc', 2424345, NULL, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$pejKLzo3NFkc8MdcYVvwZeNve5LG0FF7fZSkkaGfaysKePiDzixt.', '2020-02-14 03:21:43', NULL, '2020-02-14 03:21:43', '2020-02-14 03:21:43'),
(12, 'dsd', '$2y$10$/J5mm4YItWy3DjN7xzQHMOgYwx28Sb/UXppzUXrx2inPvyDOmfL7K', 'nobita@abc', 524524524, NULL, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$xt6X9nkqvAupXmhbMFIYRufOjR7IjS/Eq2MNtgd29gnZU2cykytAa', '2020-02-14 03:26:13', NULL, '2020-02-14 03:26:13', '2020-02-14 03:26:13'),
(13, 'dsad', '$2y$10$Ww0xiMTNvF7JX27Bh9XN7utC6srq2eovjYvwcUnhxYUctGAwYHTFO', 'fsd@dsa', 12042, NULL, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$2YVrs9u4LPrFg1.ay2q2c.Ax2ds4r0PvWbkdsjHELLKEwV7B7FfOq', '2020-02-15 08:59:31', NULL, '2020-02-15 08:59:31', '2020-02-15 08:59:31'),
(14, 'fsdfsdf', '$2y$10$FivIhcXxO5R02QtF02/Hqu0h2bAXhhD/nMguuRwX7wbUAdt825VFO', 'xbvsdgfd@fsdfds', 2524, NULL, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$5fOL4InIy9yqU0fcCFSigeJ.r39wKpyF3tTG9EIrRL2ilchT1xUfK', '2020-02-15 08:59:48', NULL, '2020-02-15 08:59:47', '2020-02-15 08:59:48'),
(15, 'fsdfsd', '$2y$10$uIMCoNIEBAL.jl./MWNDw.VrOe6OHfUx/ZExZvsD1SsmkVpqiWE5W', 'lengocthinh004@gmail.com', 252524, NULL, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$0Ha0taQ6.kkWgoXSWdrScOKUxjO0siCXg.QZEZa6VW3QGKAFci0dy', '2020-02-15 09:00:28', NULL, '2020-02-15 09:00:28', '2020-02-15 09:00:28'),
(16, 'ds', 'dsdsad', 'dsads@dsdsds', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'dasds', 'dsadds', 'dssadds@dsdsa', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dsdsa', 'dasdsd', 'dsdasd@ddssdsdsa', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'dasd', 'dsds', 'dsadsdsd@dsdasd', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_active_index` (`active`);

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_transaction_id_index` (`transaction_id`),
  ADD KEY `order_product_id_index` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_alias_index` (`alias`),
  ADD KEY `products_pro_active_index` (`pro_active`),
  ADD KEY `products_user_id_index` (`user_id`),
  ADD KEY `products_cate_id_index` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_product_id_index` (`product_id`),
  ADD KEY `rating_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_user_id_index` (`user_id`),
  ADD KEY `transaction_status_index` (`status`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`name`),
  ADD KEY `code` (`code`),
  ADD KEY `code_active` (`code_active`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
