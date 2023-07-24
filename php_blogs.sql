-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2023 at 08:40 AM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `path`) VALUES
(1, 'News', '0001'),
(2, 'Sports', '0002');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `posting_time` date NOT NULL,
  `post_id` int NOT NULL,
  `creator_id` int NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `path_length` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `posting_time`, `post_id`, `creator_id`, `path`, `path_length`) VALUES
(2, 'aaa', '2023-04-30', 1, 2, '0002', 0),
(3, 'pat', '2023-04-30', 1, 5, '0002.0001', 1),
(4, 'binh luan post2', '2023-04-30', 1, 2, '0003', 0),
(5, 'cmt5', '2023-04-30', 1, 6, '0002.0002', 1),
(20, 'len3', '2023-05-10', 1, 1, '0002.0001.0001', 2),
(21, 'ss', '2023-05-11', 1, 1, '0002.0003', 1),
(24, 'aaa', '2023-05-15', 1, 1, '0002.0001.0002', 2),
(40, 'hop ly', '2023-05-23', 66, 1, '0004', 0),
(58, 'ai', '2023-05-28', 66, 1, '0004.0002', 1),
(59, 'end', '2023-05-28', 67, 1, '0001', 0),
(60, 'fin<br />\n', '2023-06-12', 68, 1, '0001', 0),
(61, 'end<br />\n', '2023-06-12', 68, 1, '0001.0001', 1),
(62, 'sing', '2023-06-12', 68, 1, '0001.0002', 1),
(63, 'test 2', '2023-06-12', 69, 14, '0001', 0),
(64, 'test 3', '2023-06-12', 69, 14, '0001.0001', 1),
(65, 'test 4<br />\n', '2023-06-12', 69, 14, '0001.0001.0001', 2),
(66, '                                        test                                    6', '2023-06-12', 69, 14, '0001.0001.0001.0001', 3),
(67, 'test 9<br />\n', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001', 4),
(68, 'test', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001', 5),
(69, 'a', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001', 6),
(70, 'c', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001.0001', 7),
(71, 'g', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001.0001.0001', 8),
(72, 'y', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001.0001.0001.0001', 9),
(73, '8', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001.0001.0001.0001.0001', 10),
(74, 's', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001.0001.0001.0001.0001.0001', 11),
(75, 'frfr', '2023-06-12', 69, 14, '0001.0001.0001.0001.0001.0001.0001.0001.0001.0001.0001.0001.0001', 12);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `object_id` int DEFAULT NULL,
  `type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `object_id`, `type_id`) VALUES
(111, 2, 1, 1),
(112, 1, 1, 1),
(113, 5, 1, 1),
(114, 6, 1, 1),
(188, 1, 2, 2),
(189, 1, 3, 2),
(191, 1, 61, 1),
(192, 1, 64, 1),
(206, 1, 66, 1),
(210, 1, 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `posting_time` date NOT NULL,
  `creator_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `photo`, `posting_time`, `creator_id`, `category_id`) VALUES
(1, 'Mình đang ở Đà Nẵng.<br />\r\n..n..', '1212.png', '2023-04-30', 1, 1),
(3, 'ssssdawaf', '1212.png', '2023-04-30', 2, 1),
(5, 'Con đường', '1212.png', '2023-04-30', 1, 2),
(53, 'Món ăn ngon vcl :v', '168411616949221.jpg', '2023-05-28', 1, 1),
(61, 'a<br />\r\nb<br />\r\nc<br />\r\n', '', '2023-05-09', 1, 1),
(64, 'india and ocean', '168408975029252.png', '2023-05-15', 1, 1),
(65, 'aa', '168411338144504.jpg', '2023-05-15', 1, 1),
(66, 'a', '168412640097196.jpg', '2023-05-15', 1, 1),
(67, 'a<br />\r\nbsdaw<br />\r\nc<br />\r\nd', '', '2023-05-28', 1, 1),
(68, 'an', '', '2023-06-12', 1, 2),
(69, 'fix dùm cái', '168658675369786.png', '2023-06-12', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_like`
--

CREATE TABLE `type_like` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_like`
--

INSERT INTO `type_like` (`id`, `name`) VALUES
(1, 'posts'),
(2, 'comments');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Le Thai An', 'leanh', '1'),
(2, 'Nguyen Phu', 'nguyenphu', '1'),
(5, 'Phung Tu', 'phungtu', '1'),
(6, 'Nguyen Dai', 'nguyendai', '1'),
(9, 'Tran Thanh', 'thanh', '1'),
(10, 'a', 'a', 'a'),
(11, 'Le An', '123', '123'),
(12, 'Le An', '123', '123'),
(14, 'tranthanhtu', 'thanhtu', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`object_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `type_like`
--
ALTER TABLE `type_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `type_like`
--
ALTER TABLE `type_like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type_like` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
