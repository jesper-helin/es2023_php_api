-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15.09.2022 klo 14:10
-- Palvelimen versio: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concerts`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `concert`
--

CREATE TABLE `concert` (
  `id` int(11) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `concert`
--

INSERT INTO `concert` (`id`, `artist`, `location_id`) VALUES
(1, 'Bilderbuch', 1),
(2, 'Wanda', 2),
(3, 'Opus', 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Oper Graz'),
(2, 'Messe Congr');

-- --------------------------------------------------------

--
-- Rakenne taululle `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `seat_rows_id` int(11) NOT NULL,
  `reserved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `seats`
--

INSERT INTO `seats` (`id`, `number`, `seat_rows_id`, `reserved`) VALUES
(1, 1, 1, NULL),
(2, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `seat_rows`
--

CREATE TABLE `seat_rows` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `show_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `seat_rows`
--

INSERT INTO `seat_rows` (`id`, `name`, `show_id`) VALUES
(1, 'Floor 1', 1),
(2, 'Floor 2', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `concert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `shows`
--

INSERT INTO `shows` (`id`, `start`, `end`, `concert_id`) VALUES
(1, '2022-09-22 09:00:00', '2022-09-22 11:00:00', 1),
(2, '2022-09-07 06:00:00', '2022-09-07 10:00:00', 1),
(3, '2022-09-22 00:00:00', '2022-09-22 02:00:00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seat_rows_id` (`seat_rows_id`);

--
-- Indexes for table `seat_rows`
--
ALTER TABLE `seat_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concert_id` (`concert_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seat_rows`
--
ALTER TABLE `seat_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `location_id` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Rajoitteet taululle `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seat_rows_id` FOREIGN KEY (`seat_rows_id`) REFERENCES `seat_rows` (`id`);

--
-- Rajoitteet taululle `seat_rows`
--
ALTER TABLE `seat_rows`
  ADD CONSTRAINT `show_id` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`);

--
-- Rajoitteet taululle `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `concert_id` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
