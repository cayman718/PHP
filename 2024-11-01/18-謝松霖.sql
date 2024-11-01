-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-11-01 09:23:05
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `joumal`
--

-- --------------------------------------------------------

--
-- 資料表結構 `routine`
--

CREATE TABLE `routine` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(10) UNSIGNED NOT NULL,
  `classifly` varchar(16) NOT NULL,
  `item` varchar(32) NOT NULL,
  `remine` text NOT NULL,
  `payment` varchar(16) NOT NULL,
  `location` varchar(64) NOT NULL,
  `consumer` varchar(32) NOT NULL DEFAULT 'mack',
  `type` varchar(10) NOT NULL,
  `sub_classifly` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `routine`
--

INSERT INTO `routine` (`id`, `date`, `amount`, `classifly`, `item`, `remain`, `payment`, `location`, `consumer`, `type`, `sub_classifly`) VALUES 
(1, '2024-11-01 08:13:49', 50, '食', '早餐店', '', '現金', '桃園', 'lin', '支出', '早餐'),
(2, '2024-11-01 08:15:33', 150, '食', '便當', '', '現金', '桃園', 'lin', '支出', '午餐'),
(3, '2024-11-01 08:16:15', 200, '行', '油錢', '', '現金', '桃園', 'lin', '支出', '行'),
(4, '2024-11-01 08:16:55', 500, '衣', '衣服', '', '現金', '桃園', 'lin', '支出', '衣'),
(5, '2024-11-01 08:17:45', 200, '食', '便當', '', '現金', '桃園', 'lin', '支出', '晚餐'),
(6, '2024-11-01 08:18:53', 350, '娛樂', '電影', '', '現金', '桃園', 'lin', '支出', '娛樂'),
(7, '2024-11-01 08:19:44', 600, '衣', '牛仔褲', '', '現金', '桃園', 'lin', '支出', '衣'),
(8, '2024-11-01 08:20:41', 300, '食', '飲料', '', '現金', '', 'lin', '支出', '食'),
(9, '2024-11-01 08:21:19', 150, '衣', '帽子', '', '現金', '台北', 'lin', '支出', '衣'),
(10, '2024-11-01 08:22:12', 300, '食', '麥當勞', '', '現金', '桃園', 'lin', '支出', '午餐');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
