-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2018 at 02:37 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `selected_product`
--

CREATE TABLE `selected_product` (
  `selection_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `address`, `city`, `postcode`, `telephone`, `email`, `username`, `password`) VALUES
(5, 'Tomasz Szczygiel', 'Tulegatan', 'Sundbyberg', 17278, 701234567, 'tom@email.com', 'TomSygiel', '$2y$10$eIuzGFXnEhptImyD.n2CIeC7PY8O95FvIZYld1lzOZqyVY9Q2Fyxm'),
(6, 'Sofia', 'Fruängen', 'Stockholm', 12345, 701234567, 'sofia@mail.com', 'Sofia', '$2y$10$9lOy2Ef2EpVpzFrl5wOedOiWujMU1l3IfOS0pkCWOExzFLw3.Pyya'),
(7, 'Francesco', 'Via in Selci', 'Roma', 186, 2147483647, 'frannati81@gmail.com', 'frannati81', '$2y$10$0BPKjtPTW5Gw01Shj0eJVeAsOXT9rr0Sard7H9leR5bttTYK5dRlG'),
(8, 'Sandra', 'Götgatan', 'Stockholm', 12345, 701122345, 'sandra@email.com', 'SandyD', '$2y$10$xSUtaigdkDeFYFcgASGsMO4288nwuHtwGmL8eKj7NAiWz5UEBT9iK'),
(11, 'Julia Lahdo', 'Tulegatan 41', 'Stockholm', 16823, 765593277, 'julia@gmail.com', 'JuliaLahdo', '$2y$10$6BBYhXxBiB4SCWfuQGwM.Og/8QXVirgnim.CJC8ttGt2xw8B8HrI.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `selected_product`
--
ALTER TABLE `selected_product`
  ADD PRIMARY KEY (`selection_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `selected_product`
--
ALTER TABLE `selected_product`
  MODIFY `selection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
