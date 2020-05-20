-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3307
-- 產生時間： 2020-04-29 09:06:17
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
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `Acct` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passwd` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Names` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`Acct`, `Passwd`, `Names`, `Phone`, `Email`) VALUES
('A1234', 'a4321', '兔子A', '0911222333', 'A1234@gmail.com'),
('A1234e12e', '1e12e', '兔兔12', '0977777777', '11121@mail.com'),
('a44444', 'a1234', '兔兔', '0977777777', '111@mail.com'),
('B5645', 'b5645', '兔子B', '0911255333', 'B6667@gmail.com'),
('C0993', 'c0993', '兔子C', '0911115333', 'B1023@gmail.com'),
('Q1234', 'q4321', '兔子', '0933322211', 'Q1234@gmail.com');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Acct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
