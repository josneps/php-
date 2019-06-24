-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: TIME
-- 服务器版本： 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Database: `DBNAME`
--

-- --------------------------------------------------------

--
-- 表的结构 `TABLENAME`
--

CREATE TABLE `TABLENAME` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL COMMENT '名称',
  `icon` varchar(64) NOT NULL COMMENT '图标（暂未使用）',
  `sort` int(11) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL COMMENT '状态1正常；0禁用；9删除',
  `add_time` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='TABLECOMMENT';

--
-- 转存表中的数据 `TABLENAME`
--

INSERT INTO `TABLENAME` (`id`, `name`, `icon`, `sort`, `status`, `add_time`) VALUES
(1, '综合电商', '', 0, 1, 1549536282),
(2, '区块链', '', 0, 1, 1549536325),
(3, '医疗健康', '', 0, 1, 1549536394),
(4, '教育', '', 0, 1, 1549543003),
(5, '求职招聘', '', 0, 1, 1549543018),
(6, '物联网', '', 0, 1, 1549543031),
(7, '餐饮', '', 0, 1, 1549543049),
(8, '企业信息化', '', 0, 1, 1549543906),
(9, '物流', '', 0, 1, 1549543994),
(10, '金融', '', 0, 1, 1549544011),
(11, '网约车', '', 0, 1, 1549544020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TABLENAME`
--
ALTER TABLE `TABLENAME`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `TABLENAME`
--
ALTER TABLE `TABLENAME`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
