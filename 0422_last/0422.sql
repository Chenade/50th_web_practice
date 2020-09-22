-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 04:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0422`
--

-- --------------------------------------------------------

--
-- Table structure for table `11263`
--

CREATE TABLE `11263` (
  `id` int(11) NOT NULL,
  `side_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `side_detail` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'alive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `11263`
--

INSERT INTO `11263` (`id`, `side_name`, `side_detail`, `status`) VALUES
(1, 'science', 'E=mc2', 'alive'),
(3, 'math', '123456', 'alive');

-- --------------------------------------------------------

--
-- Table structure for table `abc`
--

CREATE TABLE `abc` (
  `id` int(11) NOT NULL,
  `side_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `side_detail` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'alive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `abc`
--

INSERT INTO `abc` (`id`, `side_name`, `side_detail`, `status`) VALUES
(1, 'math', '123456', 'alive'),
(2, 'science', 'E=mc2', 'alive'),
(3, 'english', 'abcdefg', 'alive');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `project` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `side` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `whom` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `total_member` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `project`, `side`, `title`, `detail`, `whom`, `total_member`, `total_score`, `time`) VALUES
(1, '<br />\r\n<b>Notice</b>:  Undefined index: project in <b>C:xampphtdocs\0422comment.php</b> on line <b>35</b><br />\r\n.\'', 'science', 'abc', 'ksjdkj', 'yangchi', 0, 0, '2020-04-23 00:33:40'),
(2, '11263.\'', 'science', 'abe', 'hhugguigiduv', 'yangchi', 0, 0, '2020-04-23 00:34:11'),
(3, '11263', 'science', 'abe', 'hhugguigiduv', 'yangchi', 2, 2, '2020-04-23 00:39:23'),
(4, '11263', 'science', '回覆第2則留言', '「hhugguigiduv」\r\nabcdefghijklmonpqrstu', 'yangchi', 2, 2, '2020-04-23 00:53:28'),
(5, '11263', 'science', 'test', 'full', 'yangchi', 2, 2, '2020-04-23 01:02:33'),
(6, '11263', 'science', 'fukk', 'abcdcawfefaefw', 'yangchi', 2, 0, '2020-04-23 01:09:27'),
(7, '11263', 'science', 'ssss', 'ss', 'yangchi', 2, 2, '2020-04-23 01:11:59'),
(8, '<br />\r\n<b>Notice</b>:  Undefined index: project in <b>C:xampphtdocs\0422comment.php</b> on line <b>49</b><br />\r\n', 'science', 'final', 'zxy', 'yangchi', 0, 0, '2020-04-23 01:13:01'),
(9, '11263', 'science', 'ssss', 'ss', 'yangchi', 2, 2, '2020-04-23 01:13:18'),
(10, '11263', 'science', 'final', 'sdfnksdnfenfnefklnefawef', 'yangchi', 2, 5, '2020-04-23 01:13:47'),
(11, '11263', 'science', 'ss', 'dd', 'yangchi', 2, 2, '2020-04-23 01:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `leader` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `member` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `total_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `detail`, `leader`, `member`, `total_member`) VALUES
(1, '11263', '4567897894564654', 'yangchi', 'admin;paul123;', 2),
(2, 'abc', 'sdjfsjdfjdskfhjdhfjhfjk', 'zoe', 'paul123;yangchi;', 2);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `project` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `side` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_no` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 1,
  `whom` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `states` text COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `project`, `side`, `comment_no`, `score`, `whom`, `states`) VALUES
(1, '11263', 'science', 9, 1, '11263', 'false'),
(2, '11263', 'science', 9, 1, 'abc', 'false'),
(3, '11263', 'science', 9, 1, 'admin', 'false'),
(4, '11263', 'science', 7, 1, 'admin', 'false'),
(5, '<br />\r\n<b>Notice</b>:  Undefined index: project in <b>C:xampphtdocs\0422comment.php</b> on line <b>49</b><br />\r\n', 'science', 8, 1, 'admin', 'false'),
(6, '11263', 'science', 9, 1, 'admin', 'false'),
(7, '11263', 'science', 10, 1, 'admin', 'false'),
(8, '11263', 'science', 10, 1, 'paul123', 'false'),
(9, '11263', 'science', 10, 3, 'yangchi', 'true'),
(10, '11263', 'science', 10, 1, 'zoe', 'false'),
(11, '11263', 'science', 11, 1, 'admin', 'false'),
(12, '11263', 'science', 11, 1, 'paul123', 'false'),
(13, '11263', 'science', 11, 5, 'yangchi', 'true'),
(14, '11263', 'science', 11, 1, 'zoe', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `auth` text COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `acc`, `pwd`, `auth`) VALUES
(1, 'admin', 'admin', '1234', 'manager'),
(3, 'paul123', 'user', 'user', 'member'),
(4, 'yangchi', 'yangchi', 'yangchi', 'member'),
(5, 'zoe', 'zoe', 'zoe', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `11263`
--
ALTER TABLE `11263`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abc`
--
ALTER TABLE `abc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `11263`
--
ALTER TABLE `11263`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `abc`
--
ALTER TABLE `abc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
