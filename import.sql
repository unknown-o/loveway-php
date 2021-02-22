-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-02-18 21:50:01
-- 服务器版本： 5.7.33-log
-- PHP 版本： 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `loveway`
--

-- --------------------------------------------------------

--
-- 表的结构 `loveway_config`
--

CREATE TABLE `loveway_config` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `loveway_config`
--

INSERT INTO `loveway_config` (`id`, `name`, `value`) VALUES
(216039, 'title', '未知表白墙'),
(345445, 'about', '关于本站'),
(385031, 'more', '开发初衷'),
(393564, 'about_content', '欢迎来到由吴先森开发的表白墙！<br />本站使用MDUI开发<br /><br />另外...说一下本表白墙的服务条款吧...<br />1.发言请遵守当地法律法规和学校规章制度，吴先森的表白墙保留对于发布不良信息和人身攻击的自然人追究法律责任的权利。<br />2.如发现有消息对个人生活产生困扰或想要获取告白者的联系方式，请联系网站管理员。<br />3.让我当大号电灯泡和吃点狗粮吧，23333333333'),
(572965, 'submit', '去表白'),
(578760, 'keywords', '未知表白墙,Kagamine'),
(782431, 'description', '本表白墙献给最可爱的镜音双子！'),
(878767, 'audio', 'https://static.llilii.cn/music/キミペディア.mp3'),
(928519, 'more_content', '其实....开发这个表白墙的初衷...<br>\r\n        其实是主要是为了让更多人知道镜音双子，233<br>\r\n        （你应该发现了整个表白墙的图片都是镜音连和镜音铃的，且这些图片都没有更换的设置，2333，要你手动改代码<br>\r\n        虽然现在镜音双子基本上活成了小透明，连B站某些V家爱好者自己办的节目，都一首双子的歌都没有（虽然其他一些不知名虚拟歌姬好像也没有的也没有），5555555，只有双子和初音、GUMI的绘师作品集<br>\r\n        另外吐槽一下B站，把VTB和虚拟歌姬混为一谈，有些VTB还自称“虚拟歌姬”，真的是...无语了，真的想回到那个有一首初音或其他虚拟歌姬的歌就能全站沸腾的局面了<br>\r\n        现在甚至希望B站不要破圈，不要引入那些乱七八糟的流量明星进来（虽然叔叔我呀，最讨厌不能赚钱的东西了）<br>');

-- --------------------------------------------------------

--
-- 表的结构 `loveway_data`
--

CREATE TABLE `loveway_data` (
  `id` int(11) NOT NULL,
  `confessor` text NOT NULL,
  `contact` text NOT NULL,
  `time` text NOT NULL,
  `to_who` text NOT NULL,
  `introduction` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `loveway_config`
--
ALTER TABLE `loveway_config`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `loveway_data`
--
ALTER TABLE `loveway_data`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
