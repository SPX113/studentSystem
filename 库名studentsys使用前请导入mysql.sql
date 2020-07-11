-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-07-11 17:50:41
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `studentsys`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_course`
--

CREATE TABLE `tb_course` (
  `id` bigint(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `teacher` varchar(20) DEFAULT NULL,
  `coursetime` varchar(50) DEFAULT NULL,
  `redit` int(11) NOT NULL,
  `period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `tb_course`
--

INSERT INTO `tb_course` (`id`, `course`, `teacher`, `coursetime`, `redit`, `period`) VALUES
(19909901, 'web开发', '余温娥', '周一 3-4', 4, 36),
(19909902, '电子商务', '马云', '周二 5-7', 2, 48),
(19909903, '大数据', '马化腾', '周三 1-2', 4, 24),
(19909904, '离散数学', '华罗庚', '周四 5-7', 4, 36),
(19909905, '常微分', '冯不一', '周五 5-7', 4, 72),
(19909906, 'c++', '孔丽英', '周一 5-7', 4, 36),
(19909907, '传统礼仪文化习俗', '王殊莹', '周一 8-9', 2, 16),
(19909908, '大学英语', '孔文', '周五 1-2', 4, 24),
(19909909, '体育', '彭武', '周五 5-6', 4, 24),
(19909910, '人类进化论', '陈立明', '周三 8-9', 2, 16),
(19909911, '宇宙物理', '牛顿', '周三 7-8', 2, 16),
(19909912, '电影鉴赏', '周星驰', '周日 4-5', 2, 16),
(19909913, '社会心理学', '蔡英文', '周六 1-2', 2, 16),
(19909914, '幸福心理学', '特兰普', '周五 7-8', 2, 16),
(19909915, '高等数学', '乔布斯', '周一 5-7', 2, 24);

-- --------------------------------------------------------

--
-- 表的结构 `tb_notice`
--

CREATE TABLE `tb_notice` (
  `message` varchar(500) DEFAULT NULL,
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `tb_notice`
--

INSERT INTO `tb_notice` (`message`, `create_time`) VALUES
('今天天气很好', '2020-06-17 10:12:55');

-- --------------------------------------------------------

--
-- 表的结构 `tb_studentcourse`
--

CREATE TABLE `tb_studentcourse` (
  `id` bigint(20) NOT NULL,
  `courseid` bigint(20) NOT NULL,
  `scores` int(11) DEFAULT NULL,
  `CreateTime` datetime DEFAULT current_timestamp() COMMENT '创建时间',
  `point` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `tb_studentcourse`
--

INSERT INTO `tb_studentcourse` (`id`, `courseid`, `scores`, `CreateTime`, `point`) VALUES
(10101011, 19909901, NULL, '2020-06-11 23:19:40', NULL),
(10101011, 19909902, NULL, '2020-06-11 23:19:40', NULL),
(10101011, 19909906, NULL, '2020-06-11 23:19:40', NULL),
(10101011, 19909910, NULL, '2020-06-11 23:19:40', NULL),
(10101011, 19909911, NULL, '2020-06-11 23:19:40', NULL),
(1137893057, 19909901, NULL, '2020-06-12 09:37:26', NULL),
(1137893057, 19909903, NULL, '2020-06-12 09:37:26', NULL),
(1137893057, 19909908, NULL, '2020-06-12 09:37:26', NULL),
(201724073167, 19909905, NULL, '2020-06-16 13:02:08', NULL),
(201724073167, 19909901, 85, '2020-06-16 13:27:42', '3.5'),
(201724073167, 19909902, 87, '2020-06-16 13:27:42', '3.7'),
(201724073167, 19909904, NULL, '2020-06-16 13:27:42', NULL),
(201724073167, 19909906, NULL, '2020-06-16 13:27:42', NULL),
(201724073167, 19909907, NULL, '2020-06-16 13:27:42', NULL),
(201724073167, 19909908, NULL, '2020-06-16 13:27:42', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(4) DEFAULT '男',
  `major` varchar(20) DEFAULT NULL,
  `adm` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `dept`, `password`, `gender`, `major`, `adm`) VALUES
(44444, 'dasda', '经济与管理学院', 'aaaaa', '男', 'aaa', 0),
(111111, 'wada', '经济与管理学院', 'aaa', '男', 'aaa', 0),
(10101011, '吴亦凡', '文学院', '000000', '男', '加拿大电鳗', 0),
(123456789, '吴亦凡', '教育学院', '000000', '男', 'rap', 0),
(1137893057, '孙悟空', '教育学院', '123456', '男', '取西经', 0),
(1234564656, '大苏打', '经济与管理学院', '123456789', '男', 'asdasd', 0),
(201724033157, '刘美', '经济与管理学院', '789789', '女', '金融', 0),
(201724073101, '吴权清', '教育学院', '123456', '男', 'CS:GO', 0),
(201724073102, '鲁迅', '文学院', '123456789', '男', '师范', 0),
(201724073167, '苏佩轩', '数学与统计学院', '000000', '男', '信息与计算科学', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
