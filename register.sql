-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 04:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeat21`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`) VALUES
(1, 'Jeremy Denk', 'JeremyDenk@gmail.com'),
(2, 'Jeff Yang', 'Jeff@gmail.com'),
(3, 'Evan Ross Katz', 'evan@gmail.com'),
(4, 'Andrew Kane', 'andrew@gmail.com'),
(5, 'Russ Ramsey', 'russ@gmail.com'),
(6, 'Kevin Moore', 'kevin@gmail.com'),
(7, 'Shelley Shepard Gray', 'Shelley@gmail.com'),
(8, 'Karen Kingsbury', 'karen@gmail.com'),
(9, 'Jamie Millen', 'jamie@gmail.com'),
(10, 'Sean Oswald', 'sean@gmail.com'),
(11, 'Katherine Applegate', 'Katherinegmail.com'),
(12, 'Author Amish', 'amish@gmail.com'),
(13, 'tardiswift', 'tardiswift@gmail.com'),
(14, 'Penguin Middle School', 'penguin@gmail.com'),
(15, 'Bloomsbury Publishing', 'Bloomsburry@gmail.com'),
(16, 'Scholastic', 'scholastic@gmail.com'),
(17, 'St. Martin\'s Publishing Group', 'martins@gmail.com'),
(18, 'Academic Studies Press', 'academic@gmail.com'),
(19, 'AEVITAS', 'awvitas@gmail.com'),
(20, 'AIP PUBLISHING LLC', 'aipsss@gmail.com'),
(21, 'AFB PRESS', 'afb@gmail.com'),
(22, 'AIAA', 'aiaa@gmail.com'),
(23, 'Allworth press', 'allworth@gmail.com'),
(24, 'ALLIANCE', 'alliance@gmail.com'),
(25, 'ALEXANDER', 'alexander@gmail.com'),
(26, 'ANAPHORA', 'anaphora@gmail.com'),
(27, 'Tina Chang', 'Tinasss@gmail.com'),
(28, 'Amanda Gorman', 'amanda@gmail.com'),
(29, 'Ada Limón', 'ada@gmail.com'),
(30, 'Seamus Heaney', 'seamus@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
