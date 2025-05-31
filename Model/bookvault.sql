-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookvault`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `isbn`) VALUES
(1, 'Web', 'asdsa', 23144222);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'User ID increment automatically',
  `name` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `hobbie` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Users Information Table';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `gender`, `country`, `hobbie`, `role`) VALUES
(3, 'Jubayer', 'Jubayer@78', 'jubayer78@gmail.com', 'Male', 'USA', 'Sports', 'Writer'),
(5, 'Rx', 'rxrx', 'rx9@gmail.com', 'Male', 'Canada', 'Sports', 'Member'),
(6, 'jubu', 'jubu', 'jubu98@gmail.com', 'Male', 'UK', 'Reading,Sports,Music', 'Member'),
(8, 'Jack', 'Jack@90', 'jack90@gmail.com', 'Male', 'Japan', 'Sports', 'Writer'),
(9, 'Jack', 'Jack@90', 'jack90@gmail.com', 'Male', 'Japan', 'Array', 'Array'),
(10, 'Jack', 'Jack@90', 'jack90@gmail.com', 'Male', 'Japan', 'Sports', 'Writer'),
(11, 'tom', 'Tom@80', 'tom80@gmail.com', 'Male', 'Canada', 'Music', 'Member'),
(12, 'Amelia', 'Amelia@77', 'amelia77@gmail.com', 'Female', 'UK', 'Reading', 'Writer'),
(13, 'kk', 'kkkkkk', 'kk@gmail.com', 'Male', 'India', 'Sports', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID increment automatically', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
