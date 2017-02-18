-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-18 16:54:14
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`id`, `title`, `author`, `tags`, `description`, `content`, `viewnum`, `image`, `articletypeid`, `posttime`, `commentcount`) VALUES
(1, '雨下一整晚', '钧辉', '雨，夜', '', '&lt;p&gt;雨下一整晚，失眠一整夜。&lt;/p&gt;', NULL, NULL, 1, '2015-09-07 11:21:09', 2);

--
-- 转存表中的数据 `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `pid`, `articleid`, `articletitle`, `name`, `email`, `ccontent`, `ctime`, `cip`, `pidname`) VALUES
(20, 0, 1, '雨下一整晚', '一一', 'yiyi@qq.com', '人生路，美梦此路长，路里风霜，风霜扑面干', '2015-09-10 09:31:19', '14.23.110.190', ''),
(21, 20, 1, '雨下一整晚', '离落', 'liluo@gmail.com', '君不见，满川红叶，尽是离人眼中血.', '2015-09-18 10:08:17', '14.23.110.190', '一一');

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`id`, `userid`, `username`, `password`, `email`, `createtime`, `status`, `logintime`, `loginip`, `logincount`, `type_id`, `introduce`) VALUES
(1, 2012113113, '钧辉', '6f2a84597fc1bf6fa5702858f9c92c83', 'themaxjokers@163.com', '2015-08-28 11:16:37', 1, '2015-12-19 10:13:26', '202.104.67.195', 13, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
