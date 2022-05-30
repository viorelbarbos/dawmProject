-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 11:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectdawm`
--

-- --------------------------------------------------------

--
-- Table structure for table `judete`
--

CREATE TABLE `judete` (
  `id` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `judete`
--

INSERT INTO `judete` (`id`, `code`, `name`) VALUES
(1, 'DJ', 'Dolj'),
(2, 'BC', 'Bacău'),
(3, 'HR', 'Harghita'),
(4, 'BN', 'Bistrița-Năsăud'),
(5, 'DB', 'Dâmbovița'),
(6, 'SV', 'Suceava'),
(7, 'BT', 'Botoșani'),
(8, 'BV', 'Brașov'),
(9, 'B', 'București'),
(10, 'BR', 'Brăila'),
(11, 'HD', 'Hunedoara'),
(12, 'TR', 'Teleorman'),
(13, 'CV', 'Covasna'),
(14, 'TL', 'Tulcea'),
(15, 'TM', 'Timiș'),
(16, 'BZ', 'Buzău'),
(17, 'PH', 'Prahova'),
(18, 'IF', 'Ilfov'),
(19, 'NT', 'Neamț'),
(20, 'CJ', 'Cluj'),
(21, 'AB', 'Alba'),
(22, 'GR', 'Giurgiu'),
(23, 'AG', 'Argeș'),
(24, 'CL', 'Călărași'),
(25, 'BH', 'Bihor'),
(26, 'IS', 'Iași'),
(27, 'VL', 'Vâlcea'),
(28, 'VN', 'Vrancea'),
(29, 'AR', 'Arad'),
(30, 'IL', 'Ialomița'),
(31, 'CS', 'Caraș-Severin'),
(32, 'GL', 'Galați'),
(33, 'GJ', 'Gorj'),
(34, 'CT', 'Constanța'),
(35, 'SM', 'Satu Mare'),
(36, 'MM', 'Maramureș'),
(37, 'MH', 'Mehedinți'),
(38, 'SJ', 'Sălaj'),
(39, 'VS', 'Vaslui'),
(40, 'MS', 'Mureș'),
(41, 'SB', 'Sibiu'),
(42, 'OT', 'Olt');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pg_name` varchar(20) NOT NULL,
  `nume_meniu` varchar(17) NOT NULL,
  `tip_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pg_name`, `nume_meniu`, `tip_user`) VALUES
(1, 'index.php', 'Acasa', 2),
(2, 'adminPanel.php', 'Admin panel', 1),
(8, 'my-account.php', 'Contul meu', 2),
(9, 'category.php?pg=1', 'Forum', 2),
(10, 'logout.php', 'Deconecteaza-te', 2);

-- --------------------------------------------------------

--
-- Table structure for table `raspunsuri`
--

CREATE TABLE `raspunsuri` (
  `id` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_util` int(11) NOT NULL,
  `raspuns` varchar(600) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `id_jud` int(11) NOT NULL,
  `id_util` int(11) NOT NULL,
  `numetopic` varchar(255) NOT NULL,
  `descriere` varchar(255) NOT NULL DEFAULT 'Fara descriere',
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `tip` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`, `tip`) VALUES
(1, 'viorelbarbos', 'viorelaugustin2001@gmail.com', 'c193ef999c0aa38e5fb7303e6f641597', '2022-05-20 21:15:43', 0),
(2, 'admin', 'admin@admin.ro', '21232f297a57a5a743894a0e4a801fc3', '2022-05-23 07:49:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judete`
--
ALTER TABLE `judete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `account_county_52094d6e` (`name`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`tip_user`);

--
-- Indexes for table `raspunsuri`
--
ALTER TABLE `raspunsuri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topicid` (`id_topic`),
  ADD KEY `utiltopic` (`id_util`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idjud` (`id_jud`),
  ADD KEY `idutil` (`id_util`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tip` (`tip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judete`
--
ALTER TABLE `judete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `raspunsuri`
--
ALTER TABLE `raspunsuri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `raspunsuri`
--
ALTER TABLE `raspunsuri`
  ADD CONSTRAINT `raspunsuri_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raspunsuri_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`id_jud`) REFERENCES `judete` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
