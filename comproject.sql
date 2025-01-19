-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 02:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `usertag` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `dob`, `username`, `usertag`, `password`) VALUES
(1, 'Prasis Karki', 'prasis.12kar@yahoo.com', '2024-02-13', 'prasispro', 4523, '1234567'),
(2, 'Ramesh Sah', 'ramo34sah@gmail.com', '2024-02-08', 'rameshnoob', 1234, '12345678'),
(5, 'Terry Clark', 'terrclack104@gmail.com', '2006-02-15', 'terrygang', 1904, 'terrywithmerry');

-- --------------------------------------------------------

--
-- Table structure for table `quizdb`
--

CREATE TABLE `quizdb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `usertag` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizdb`
--

INSERT INTO `quizdb` (`id`, `username`, `usertag`, `score`) VALUES
(2, 'prasispro', 4523, 40),
(3, 'rameshnoob', 1234, 45),
(4, 'terrygang', 1904, 68);

-- --------------------------------------------------------

--
-- Table structure for table `snakedb`
--

CREATE TABLE `snakedb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `usertag` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `snakedb`
--

INSERT INTO `snakedb` (`id`, `username`, `usertag`, `score`) VALUES
(2, 'prasispro', 4523, 25),
(3, 'rameshnoob', 1234, 90),
(4, 'terrygang', 1904, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `quizdb`
--
ALTER TABLE `quizdb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `snakedb`
--
ALTER TABLE `snakedb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizdb`
--
ALTER TABLE `quizdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `snakedb`
--
ALTER TABLE `snakedb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
