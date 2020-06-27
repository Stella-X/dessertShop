-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-27 22:38:41
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dessertshop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cakes`
--

CREATE TABLE `cakes` (
  `Name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Introduction` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cakes`
--

INSERT INTO `cakes` (`Name`, `price`, `Quantity`, `Introduction`) VALUES
('冰淇淋莓果蛋糕', 200, 10, '好吃的冰淇淋莓果蛋糕'),
('大甲芋泥蛋糕', 890, 1, '永遠吃不膩的經典\r\n新鮮大甲芋頭與牧場鮮奶綿密的交織融合\r\n香濃的芋香在口中蔓延開來\r\n還夾帶著或大或小的芋頭顆粒\r\n是最難忘情的滋味!\r\n底層結合法國傳統布列塔尼酥餅\r\n更增添口感層次與香氣'),
('柚香黑烏龍乳酪蛋糕', 650, 1, '\r\n嚴選日本人氣100%柚子酒及黑烏龍茶葉製作，飄散濃郁焙茶及柚子清香，風味雙乘！\r\n\r\n内裏濃郁的澳洲乳酪，乳脂含量達60%以上，口感似冰淇淋，醇厚承香。'),
('玫瑰伯爵蛋糕', 490, 1, '伯爵茶葉經烘焙後散發淡淡的佛手柑香，搭配草莓巧克力醬與浪漫玫瑰花圈，整體多了份柔嫩的甜美女孩感。'),
('玫瑰香頌乳酪慕斯', 650, 1, '山形玫瑰乳酪結合珍貴的馬達加斯加波本香草籽，沐浴在芬芳花香與濃郁的香草甜香中，以酥脆的草莓巴芮脆餅作為甜蜜結尾，浪漫經典。'),
('生酮蛋糕', 329, 1, '母親節限定'),
('草莓黑森林蛋糕', 100, 30, '好吃的蛋糕');

-- --------------------------------------------------------

--
-- 資料表結構 `memberdata`
--

CREATE TABLE `memberdata` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_passwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `m_birthday` date DEFAULT NULL,
  `m_level` enum('admin','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `m_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_login` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `m_logintime` datetime DEFAULT NULL,
  `m_jointime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `memberdata`
--

INSERT INTO `memberdata` (`m_id`, `m_name`, `m_username`, `m_passwd`, `m_sex`, `m_birthday`, `m_level`, `m_email`, `m_url`, `m_phone`, `m_address`, `m_login`, `m_logintime`, `m_jointime`) VALUES
(1, '系統管理員', 'admin', '$2y$10$FO70lc.3/vTeE0Vaf7O3Jes.UArylzLnnxfZffTF7410vndnvhScm', '男', NULL, 'admin', NULL, NULL, NULL, NULL, 26, '2020-05-22 18:46:24', '2008-10-20 16:36:15'),
(14, '瑪雅', 'testacct000', '$2y$10$vCepYOMWhaN.5ljEy86Qceo85C2qxoF7K.0zFZt2xIx/mD26g1nxy', '女', '2020-05-22', 'member', '10000@gmail.com', NULL, '11111111', '10000 Quivira Rd, Overland Park, KS 66215, United States', 10, '2020-06-28 04:04:59', '2020-05-22 18:36:53'),
(15, 'Kevin', 'testacct001', '$2y$10$aiL/xpQEx2qgO3aaE/vSFOqUT5CAAME.SOQrj8H5l0ANCHcaVYseO', '男', '2016-06-16', 'member', 'gihnd4v3i1n@gmail.com', '', '0977756123', '10500 Quivira Rd, Overland Park, KS 66200, United States', 2, '2020-06-28 03:22:20', '2020-05-22 18:44:14'),
(16, '欣瑩', 'testacct002', '$2y$10$rFDfEt21MRD.pKZZMBFYWe87qpFtPl6GGrNn/a6JswP4LNPi9Sl0i', '女', '2011-11-16', 'member', 'shina043v@gmail.com', '', '0912345444', 'Tiwan', 1, '2020-05-22 18:51:18', '2020-05-22 18:51:10');

-- --------------------------------------------------------

--
-- 資料表結構 `orderlist_cake`
--

CREATE TABLE `orderlist_cake` (
  `id` int(11) NOT NULL,
  `acct` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orderlist_cake`
--

INSERT INTO `orderlist_cake` (`id`, `acct`, `order_id`, `name`, `quantity`, `price`, `price_total`, `order_date`) VALUES
(25, 'testacct001', 1, '玫瑰伯爵蛋糕', 1, 490, 490, '2020-06-28 04:00:18'),
(26, 'testacct001', 1, '生酮蛋糕', 2, 329, 658, '2020-06-28 04:00:18'),
(27, 'testacct001', 1, '冰淇淋莓果蛋糕', 2, 200, 400, '2020-06-28 04:00:18'),
(28, 'testacct001', 2, '大甲芋泥蛋糕', 3, 890, 2670, '2020-06-28 04:02:04'),
(29, 'testacct001', 2, '玫瑰香頌乳酪慕斯', 2, 650, 1300, '2020-06-28 04:02:04'),
(30, 'testacct001', 2, '草莓黑森林蛋糕', 1, 100, 100, '2020-06-28 04:02:04'),
(31, 'testacct001', 3, '柚香黑烏龍乳酪蛋糕', 10, 650, 6500, '2020-06-28 04:02:20'),
(32, 'testacct000', 4, '冰淇淋莓果蛋糕', 1, 200, 200, '2020-06-28 04:05:22'),
(33, 'testacct000', 4, '大甲芋泥蛋糕', 2, 890, 1780, '2020-06-28 04:05:22'),
(34, 'testacct000', 4, '柚香黑烏龍乳酪蛋糕', 1, 650, 650, '2020-06-28 04:05:22'),
(35, 'testacct000', 5, '玫瑰香頌乳酪慕斯', 1, 650, 650, '2020-06-28 04:07:12'),
(36, 'testacct000', 5, '冰淇淋莓果蛋糕', 2, 200, 400, '2020-06-28 04:07:12'),
(37, 'testacct000', 5, '玫瑰伯爵蛋糕', 3, 490, 1470, '2020-06-28 04:07:12'),
(38, 'testacct000', 5, '生酮蛋糕', 4, 329, 1316, '2020-06-28 04:07:12'),
(39, 'testacct000', 5, '草莓黑森林蛋糕', 5, 100, 500, '2020-06-28 04:07:12'),
(40, 'testacct000', 5, '玫瑰香頌乳酪慕斯', 6, 650, 3900, '2020-06-28 04:07:12'),
(41, 'testacct000', 5, '大甲芋泥蛋糕', 7, 890, 6230, '2020-06-28 04:07:12'),
(42, 'testacct000', 5, '柚香黑烏龍乳酪蛋糕', 8, 650, 5200, '2020-06-28 04:07:12'),
(43, 'testacct000', 6, '冰淇淋莓果蛋糕', 10, 200, 2000, '2020-06-28 04:13:28'),
(44, 'testacct000', 7, '柚香黑烏龍乳酪蛋糕', 6, 650, 3900, '2020-06-28 04:13:58');

-- --------------------------------------------------------

--
-- 資料表結構 `orderlist_member`
--

CREATE TABLE `orderlist_member` (
  `id` int(11) NOT NULL,
  `acct` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_staus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `pickup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orderlist_member`
--

INSERT INTO `orderlist_member` (`id`, `acct`, `member_name`, `phone`, `order_id`, `order_price`, `order_address`, `remarks`, `order_staus`, `order_date`, `pickup_date`) VALUES
(21, 'testacct001', 'Kevin', '0977756123', 1, 1548, '分店2 - 自取', 'CMMD', '未完成', '2020-06-28 04:00:18', '2020-07-09'),
(22, 'testacct001', 'Kevin', '0977756123', 2, 4070, '分店1 - 自取', 'AML', '未完成', '2020-06-28 04:02:04', '2020-07-07'),
(23, 'testacct001', 'Kevin', '0977756123', 3, 6500, '本店 - 自取', 'ND', '未完成', '2020-06-28 04:02:20', '2020-07-11'),
(24, 'testacct000', '瑪雅', '11111111', 4, 2630, '本店 - 自取', 'NDD', '未完成', '2020-06-28 04:05:22', '2020-07-08'),
(25, 'testacct000', '瑪雅', '11111111', 5, 19666, '分店1 - 自取', 'AMM', '未完成', '2020-06-28 04:07:12', '2020-07-08'),
(26, 'testacct000', '瑪雅', '11111111', 6, 2000, '本店 - 自取', 'MDD', '未完成', '2020-06-28 04:13:28', '2020-07-22'),
(27, 'testacct000', '瑪雅', '11111111', 7, 3900, '分店1 - 自取', 'POK', '未完成', '2020-06-28 04:13:58', '2020-06-30');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`Name`);

--
-- 資料表索引 `memberdata`
--
ALTER TABLE `memberdata`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_username` (`m_username`);

--
-- 資料表索引 `orderlist_cake`
--
ALTER TABLE `orderlist_cake`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orderlist_member`
--
ALTER TABLE `orderlist_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberdata`
--
ALTER TABLE `memberdata`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderlist_cake`
--
ALTER TABLE `orderlist_cake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderlist_member`
--
ALTER TABLE `orderlist_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
