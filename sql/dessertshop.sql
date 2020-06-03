-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3307
-- 產生時間： 2020-06-03 08:39:55
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- 資料表的匯出資料 `cakes`
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
  `m_login` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `m_logintime` datetime DEFAULT NULL,
  `m_jointime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `memberdata`
--

INSERT INTO `memberdata` (`m_id`, `m_name`, `m_username`, `m_passwd`, `m_sex`, `m_birthday`, `m_level`, `m_email`, `m_url`, `m_phone`, `m_address`, `m_login`, `m_logintime`, `m_jointime`) VALUES
(1, '系統管理員', 'admin', '$2y$10$FO70lc.3/vTeE0Vaf7O3Jes.UArylzLnnxfZffTF7410vndnvhScm', '男', NULL, 'admin', NULL, NULL, NULL, NULL, 26, '2020-05-22 18:46:24', '2008-10-20 16:36:15'),
(14, '瑪雅', 'testacct000', '$2y$10$vCepYOMWhaN.5ljEy86Qceo85C2qxoF7K.0zFZt2xIx/mD26g1nxy', '女', '2020-05-22', 'member', '10000@gmail.com', NULL, '11111111', '10000 Quivira Rd, Overland Park, KS 66215, United States', 8, '2020-06-03 12:56:50', '2020-05-22 18:36:53'),
(15, 'Kevin', 'testacct001', '$2y$10$aiL/xpQEx2qgO3aaE/vSFOqUT5CAAME.SOQrj8H5l0ANCHcaVYseO', '男', '2016-06-16', 'member', 'gihnd4v3i1n@gmail.com', '', '0977756123', '10500 Quivira Rd, Overland Park, KS 66200, United States', 1, '2020-05-22 18:44:40', '2020-05-22 18:44:14'),
(16, '欣瑩', 'testacct002', '$2y$10$rFDfEt21MRD.pKZZMBFYWe87qpFtPl6GGrNn/a6JswP4LNPi9Sl0i', '女', '2011-11-16', 'member', 'shina043v@gmail.com', '', '0912345444', 'Tiwan', 1, '2020-05-22 18:51:18', '2020-05-22 18:51:10');

--
-- 已匯出資料表的索引
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
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `memberdata`
--
ALTER TABLE `memberdata`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
