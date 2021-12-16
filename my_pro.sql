-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 02:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `zipcode` int(6) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `empimg` varchar(255) NOT NULL,
  `updated_at` datetime(6) DEFAULT NULL ON UPDATE current_timestamp(6),
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `ename`, `email`, `password`, `contact`, `dob`, `zipcode`, `gender`, `empimg`, `updated_at`, `created_at`) VALUES
(1, 'Aman', 'aman@gmail.com', '$2y$10$FOvE5kqkXnL7NSp61r2LE./0gixfmYPk9C/FeGkWDWfZyP.3oX0Ca', 1234567890, '2021-09-29', 282007, '1', '1635335880.jpg', '2021-10-28 18:05:31.265227', '2021-10-27 06:28:00.000000'),
(2, 'Aman', 'sdfabcd@sdf.com', '$2y$10$XCOgUsy3HSqjFxJQjmmzpe8E3BOaaHQc3.Oq4u5ZKxiFXre3.FFYG', 9876543211, '2021-10-01', 282007, '1', '1635336786.jpeg', '2021-10-27 12:13:07.000000', '2021-10-27 06:43:07.000000'),
(3, 'Aman', 'hello123@ab.com', '$2y$10$ygqzIDFQWGMMRNlBlPivy.WuzZOjJkNT1vnEOrpkNGhqTrQMNRrx2', 9997778881, '2021-09-28', 282007, '1', '1635337254.img2.jpg', '2021-10-27 12:20:54.000000', '2021-10-27 06:50:54.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tnc` varchar(3) NOT NULL,
  `updated_at` datetime(6) DEFAULT NULL ON UPDATE current_timestamp(6),
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `country`, `image`, `tnc`, `updated_at`, `created_at`) VALUES
(1, 'hello123', '$2y$10$XvH4UDzsfnLz/oMdsNrk9O24Bq/obFa2YawzkirSoWuDpDVyaaGsy', 'abcd@efgh.com', 'India', '', 'on', '2021-10-26 12:40:20.000000', '2021-10-26 07:10:20.000000'),
(2, 'abcde', '$2y$10$7pmX8EXTKgMJZY3Qhkw6fOI1BI7B7r2S84BQLghHxuPNHgBcILh6e', 'sdf@sdf.com', 'United States of America', '', 'on', '2021-10-27 06:11:46.000000', '2021-10-27 00:41:46.000000'),
(3, 'hello', '$2y$10$ZFlsuv5z16ENRlmFZ.EuLeb/bqCfjIkzvkTToUeHYq7IrW/Ex.zem', 'sdfabcd@sdf.com', 'India', '1635326536.jpg', 'on', '2021-10-27 09:22:17.000000', '2021-10-27 03:52:17.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
