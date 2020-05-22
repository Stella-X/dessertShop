-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-22 08:46:40
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
-- 資料表結構 `memberdata`
--

CREATE TABLE `memberdata` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_passwd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_sex` enum('男','女') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_birthday` date NOT NULL,
  `m_level` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `m_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_login` int(11) UNSIGNED NOT NULL,
  `m_logintime` datetime DEFAULT NULL,
  `m_jointime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `memberdata`
--

INSERT INTO `memberdata` (`m_id`, `m_username`, `m_passwd`, `m_name`, `m_sex`, `m_birthday`, `m_level`, `m_email`, `m_url`, `m_phone`, `m_address`, `m_login`, `m_logintime`, `m_jointime`) VALUES
(3, 'testacct000', '$2y$10$isvbPym.LKltJTtvykm/dOVX736FVVXadfF62SF8bYn9VYRPkqIhi', 'test', '女', '2020-05-22', 'member', '19104@gmail.com', '', '0912345678', '10500 Quivira Rd, Overland Park, KS 66215, United States', 3, '2020-05-22 14:26:06', '2020-05-22 14:15:02');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `memberdata`
--
ALTER TABLE `memberdata`
  ADD PRIMARY KEY (`m_username`),
  ADD KEY `m_id` (`m_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberdata`
--
ALTER TABLE `memberdata`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
