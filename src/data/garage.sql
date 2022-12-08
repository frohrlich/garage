-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2022 at 11:16 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `acte`
--

CREATE TABLE `acte` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `prestation_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acte`
--

INSERT INTO `acte` (`id`, `user_id`, `client_id`, `prestation_id`, `date`) VALUES
(21, 19, 9, 14, '2022-11-18 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `vehicle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `address`, `zipcode`, `created_at`, `vehicle`) VALUES
(9, 'Hugues', 'LeClient', '25 rue des Clients', 87100, '2022-11-28 23:51:50', 'Citroën C3'),
(10, 'Samantha', 'Clientesse', '45 rue des Super-clientesses', 87200, '2022-11-28 23:52:44', 'Renault Dacia'),
(11, 'Hans', 'Kunde', '23 Lüdwig Strasse', 68000, '2022-11-28 23:54:13', 'Volkswagen'),
(12, 'Jean-Pierre', 'Exemple', '25 rue des Clients Heureux', 87000, '2022-11-29 00:00:29', 'Peugeot 206');

-- --------------------------------------------------------

--
-- Table structure for table `prestation`
--

CREATE TABLE `prestation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_ht` decimal(10,2) NOT NULL,
  `hours` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prestation`
--

INSERT INTO `prestation` (`id`, `name`, `price_ht`, `hours`) VALUES
(12, 'Changer les pneus', '90.00', '0.50'),
(13, 'Vidange', '50.00', '1.00'),
(14, 'Changement essuie-glaces', '30.00', '0.25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `social_sec` bigint(15) DEFAULT NULL,
  `date_entry` date DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `worktime_week` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `email`, `password`, `birthdate`, `social_sec`, `date_entry`, `contract_type`, `role`, `worktime_week`, `last_login`) VALUES
(6, NULL, NULL, 'admin@pistonsetboulons.com', '$2y$10$DVBY/yGk3QOaqhg73ngXnuamKxErr5JvcYVOPF12GDP0rfKYMGL66', NULL, NULL, NULL, NULL, 'ROLE_ADMIN', NULL, '2022-11-28 23:31:27'),
(19, 'Pierre', 'Exemple', 'pierre@exemple.fr', '$2y$10$OBanmy9TCKRag1pCc2/vxOhroUm27EFFwroFSjpxrfcWMVFnDEBFG', '2022-11-08', 111111111111111, '2022-11-08', 'Alternance', 'ROLE_USER', '12', '2022-11-28 23:47:23'),
(20, 'Martine', 'De L\'Exemplarité', 'martine@exemple.com', '$2y$10$ll/SUOJWA40MHE4MajDZROkSsC3bUeWkt9vSiVijDtDNpNFqgROSK', '2022-11-11', 123456789012456, '2022-11-07', 'Autre', 'ROLE_USER', '66', '2022-11-28 23:39:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acte`
--
ALTER TABLE `acte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `prestation_id` (`prestation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestation`
--
ALTER TABLE `prestation`
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
-- AUTO_INCREMENT for table `acte`
--
ALTER TABLE `acte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acte`
--
ALTER TABLE `acte`
  ADD CONSTRAINT `acte_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_ibfk_2` FOREIGN KEY (`prestation_id`) REFERENCES `prestation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
