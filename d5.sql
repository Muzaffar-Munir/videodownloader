-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 10:18 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d5`
--

-- --------------------------------------------------------

--
-- Table structure for table `filetable`
--

CREATE TABLE `filetable` (
  `fid` int(100) NOT NULL,
  `fdescription` varchar(200) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `fileextension` varchar(10) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filetable`
--

INSERT INTO `filetable` (`fid`, `fdescription`, `owner_id`, `filepath`, `fileextension`, `upload_time`) VALUES
(108, '', 7, '15278449792700130398', 'jpg', '2018-06-01 09:22:59'),
(107, '', 7, '15278449732809922080', 'jpg', '2018-06-01 09:22:53'),
(105, '', 9, '152784400548035952', 'png', '2018-06-01 09:06:45'),
(106, '', 7, '1527844968882930066', 'jpg', '2018-06-01 09:22:48'),
(104, '', 7, '1527843951326373698', 'mkv', '2018-06-01 09:05:51'),
(103, '', 8, '152784390251624635', 'png', '2018-06-01 09:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `s_file_table`
--

CREATE TABLE `s_file_table` (
  `id` int(100) NOT NULL,
  `owner_id` int(100) NOT NULL,
  `to_share_id` int(100) NOT NULL,
  `shared_file_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_file_table`
--

INSERT INTO `s_file_table` (`id`, `owner_id`, `to_share_id`, `shared_file_id`) VALUES
(190, 7, 4, 108),
(189, 7, 9, 108),
(188, 7, 8, 108),
(187, 7, 9, 108),
(186, 7, 8, 108),
(185, 7, 6, 108),
(184, 7, 5, 108),
(183, 7, 4, 108),
(182, 7, 3, 108),
(181, 7, 2, 108),
(180, 7, 1, 108),
(179, 7, 9, 104),
(178, 9, 8, 105),
(177, 9, 7, 105),
(176, 7, 8, 104),
(175, 8, 7, 103);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `uname`, `password`, `email`) VALUES
(1, 'abc', 'avc', 'dsfsa', '147', 'falaksher141@yahoo.com'),
(2, 'falak', 'dsfas', 'dsfas', 'dsf', 'falaksher00852@gmail.com'),
(3, 'ali sher', 'sherr', 'alisher', 'ali', 'ali@gmail.com'),
(4, 'Falak', 'Sher', 'f', 'sdfds', 'falaksher00852@gmail.com'),
(5, 'P', 'P', 'p', 'p', 'ali@gmail.com'),
(6, 'Falak ', 'Sher', 'fs', '1122', 'falaksher00852@gmail.com'),
(7, 'Zain', 'Ali', 'z', 'z', 'zain@gail.com'),
(8, 'Bilal', 'Ali', 'abcd', '123', 'adil12@yahoo.com'),
(9, 'ali', 'sher', 'i', 'i', 'adil12@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filetable`
--
ALTER TABLE `filetable`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `s_file_table`
--
ALTER TABLE `s_file_table`
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
-- AUTO_INCREMENT for table `filetable`
--
ALTER TABLE `filetable`
  MODIFY `fid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `s_file_table`
--
ALTER TABLE `s_file_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
