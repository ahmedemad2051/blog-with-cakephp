-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 01:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `parent`) VALUES
(18, 1, 4, 'fdsfsf', '2016-06-12 15:00:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `img_url`, `created_at`, `user_id`) VALUES
(4, 'post222', 'hgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdy ntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgf hfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytry\r\nhgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrs ytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytryshgfhfdyntrsytry', 'e7X4qCED.png', '2016-06-12 11:56:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `img_url`, `role`) VALUES
(1, 'ahmed emad', 'test@test.com', '$2y$10$PPm2fM8IUjZFxEDLNIT.b.Ys9PcOQJnybUNv4Wi6wjg9qnKpAh06a', 'person-flat.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
