-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 08:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour and travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `username`, `password`) VALUES
(1, 'gaurav_s27', 'google');

-- --------------------------------------------------------

--
-- Table structure for table `applied_users`
--

CREATE TABLE `applied_users` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(40) NOT NULL,
  `car_id` varchar(100) NOT NULL,
  `driver_id` varchar(20) NOT NULL DEFAULT 'null',
  `date_from` varchar(20) NOT NULL,
  `date_to` varchar(20) NOT NULL,
  `place_from` varchar(30) NOT NULL,
  `place_to` varchar(30) NOT NULL,
  `no_of_travellers` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `inWishlist` varchar(10) NOT NULL,
  `booking_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_users`
--

INSERT INTO `applied_users` (`id`, `customer_id`, `mobile`, `email`, `location`, `car_id`, `driver_id`, `date_from`, `date_to`, `place_from`, `place_to`, `no_of_travellers`, `status`, `payment_method`, `inWishlist`, `booking_time`) VALUES
(5, '1', '9087753739', 'gauravsharma.mvp@gmail.com', 'delhi', '5', 'null', '01-03-2017', '07-03-2017', 'delhi', 'banglore', '5', 'null', '', '1', '27/03/17 01:03:21am'),
(11, '1', '9087753739', 'gauravsharma.mvp@gmail.com', 'delhi', '4', 'null', '01-03-2017', '07-03-2017', 'delhi', 'goa', '4', 'null', '', '1', '27/03/17 04:28:13pm'),
(13, '1', '9087753739', 'gauravsharma.mvp@gmail.com', 'delhi', '12', '10', '20-03-2017', '26-03-2017', 'delhi', 'goa', '1', 'confirmed', 'cc', '0', '27/03/17 10:35:33pm'),
(14, '1', '9087753739', 'gauravsharma.mvp@gmail.com', 'delhi north', '8', '12', '04-03-2017', '05-03-2017', 'delhi', 'chennai', '1', 'confirmed', 'coc', '0', '27/03/17 10:35:58pm'),
(15, '1', '9087753739', 'gauravsharma.mvp@gmail.com', 'delhi', '15', 'null', '05-03-2017', '07-03-2017', 'delhi', 'banglore', '15', 'null', '', '1', '27/03/17 11:47:34pm');

-- --------------------------------------------------------

--
-- Table structure for table `cars_available`
--

CREATE TABLE `cars_available` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `model` varchar(40) NOT NULL,
  `Available` varchar(10) NOT NULL,
  `booked_till` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars_available`
--

INSERT INTO `cars_available` (`id`, `type`, `model`, `Available`, `booked_till`) VALUES
(1, 'standard', 'Maruti Suzuki Alto 8', 'yes', 'null'),
(2, 'standard', 'Maruti Suzuki Wagon ', 'yes', 'null'),
(3, 'standard', 'Hyundai i20 Sport', 'yes', 'null'),
(4, 'standard', 'Hyundai Carlino', 'yes', 'null'),
(5, 'standard', 'Honda Brio SUV', 'yes', 'null'),
(6, 'luxury', ' Audi A4', 'yes', 'null'),
(7, 'luxury', 'BMW 750', 'yes', 'null'),
(8, 'luxury', 'Jaguar XF', 'yes', 'null'),
(9, 'luxury', 'Mercedes-Benz S-Class', 'yes', 'null'),
(10, 'luxury', ' Lexus LS 460', 'yes', 'null'),
(11, 'economy', 'Ford Figo', 'yes', 'null'),
(12, 'economy', 'Ford Mustang', 'yes', 'null'),
(13, 'economy', 'Fiat Linea', 'yes', 'null'),
(14, 'economy', 'Fiat Abarth Punto', 'yes', 'null'),
(15, 'economy', 'Skoda Octavia', 'yes', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `driver_available`
--

CREATE TABLE `driver_available` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `Available` varchar(10) NOT NULL,
  `booked_till` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_available`
--

INSERT INTO `driver_available` (`driver_id`, `driver_name`, `img`, `Available`, `booked_till`) VALUES
(1, 'naruto', '1.png', 'yes', 'null'),
(2, 'goku', '1.png', 'yes', 'null'),
(9, 'gohan', '1.png', 'yes', 'null'),
(10, 'ross', 'ross.png', 'no', '26-03-2017'),
(11, 'chandler', 'chandler.png', 'yes', 'null'),
(12, 'joey', 'joey.png', 'no', '05-03-2017'),
(13, 'sauske', '1.png', 'yes', 'null'),
(14, 'vegeta', '1.png', 'yes', 'null'),
(15, 'harvey', 'harvey.png', 'yes', 'null'),
(17, 'mike', 'mike.png', 'yes', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL,
  `create_at` varchar(30) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`, `create_at`, `avatar`) VALUES
(1, 'gaurav sharma', 'gauravsharma.mvp@gmail.com', '9087753739', 'c822c1b63853ed273b89687ac505f9fa', '26/03/17 09:16:32pm', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_users`
--
ALTER TABLE `applied_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_available`
--
ALTER TABLE `cars_available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_available`
--
ALTER TABLE `driver_available`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applied_users`
--
ALTER TABLE `applied_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cars_available`
--
ALTER TABLE `cars_available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `driver_available`
--
ALTER TABLE `driver_available`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
