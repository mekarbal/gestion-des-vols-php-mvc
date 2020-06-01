-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 juin 2020 à 10:59
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vols_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `cin` varchar(10) DEFAULT NULL,
  `passport` varchar(10) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_user`, `first_name`, `last_name`, `cin`, `passport`, `nationality`, `email`, `password_user`, `phone`, `role`) VALUES
(1, 'Mehdi', 'KARBAL', 'HH241170', 'MAR134567', 'Morocco', 'admin@admin.com', 'admin123', '+21266578685', 'admin'),
(3, 'Elmahdi', 'KARBAL', '434333', 'ghghgh', 'morocco', 'me.karbal@gmail.com', 'AZ', '0697802293', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `flight`
--

CREATE TABLE `flight` (
  `id_flight` int(11) NOT NULL,
  `n_flight` varchar(50) DEFAULT NULL,
  `depart` varchar(80) DEFAULT NULL,
  `distination` varchar(80) DEFAULT NULL,
  `date_flight` date DEFAULT NULL,
  `hour_flight` int(200) NOT NULL,
  `minute_flight` int(10) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `total_places` int(4) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `flight`
--

INSERT INTO `flight` (`id_flight`, `n_flight`, `depart`, `distination`, `date_flight`, `hour_flight`, `minute_flight`, `price`, `total_places`, `is_active`) VALUES
(12, 'RAM', 'Safi', 'casa', '2020-05-23', 0, 0, 2333, 118, 1),
(13, 'Elmahdi KARBAL', 'Safi', 'Safi', '2020-05-12', 0, 0, 2333, 122, 0),
(14, 'Elmahdi KARBAL', 'Safi', 'Safi', '2020-05-16', 0, 0, 2333, 122, 0),
(15, 'Elmahdi KARBAL', 'Safi', 'Safi', '2020-05-20', 0, 0, 2333, 119, 1),
(16, 'az', 'SAFI', 'CASA', '2121-12-12', 2121, 2121, 12, 12, 127),
(17, 'Elmahdi KARBAL', 'Safi', 'Safi', '1212-12-12', 121, 212, 2333, 122, 0),
(18, 'az', '1', '21', '1222-12-12', 121, 122, 212, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `passagers`
--

CREATE TABLE `passagers` (
  `id_travler` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_flight` int(11) DEFAULT NULL,
  `id_resevation` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `passport` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `passagers`
--

INSERT INTO `passagers` (`id_travler`, `id_user`, `id_flight`, `id_resevation`, `first_name`, `last_name`, `passport`) VALUES
(8, 3, 15, 22, 'gdfxch', 'hgdsh', 'jhgjhg'),
(9, 3, 12, 23, 'Elmahdi', 'KARBAL', 'ghghgh'),
(10, 3, 12, 37, 'Elmahdi', 'KARBAL', 'ghghgh'),
(11, 1, 15, 60, 'Mehdi', 'KARBAL', 'MAR134567'),
(12, 1, 12, 61, 'Mehdi', 'KARBAL', 'MAR134567'),
(13, 1, 15, 63, 'Mehdi', 'KARBAL', 'MAR134567'),
(14, 1, 12, 64, 'Elmahdi', 'KARBAL', 'ghghgh');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_resevation` int(11) NOT NULL,
  `id_flight` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_resevation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_resevation`, `id_flight`, `id_user`, `date_resevation`) VALUES
(22, 15, 3, '2020-05-31 23:29:51'),
(23, 12, 3, '2020-05-31 23:30:49'),
(37, 12, 3, '2020-05-31 23:54:36'),
(60, 15, 1, '2020-06-01 09:25:40'),
(61, 12, 1, '2020-06-01 09:29:00'),
(63, 15, 1, '2020-06-01 09:34:42'),
(64, 12, 1, '2020-06-01 09:39:48');

--
-- Déclencheurs `reservation`
--
DELIMITER $$
CREATE TRIGGER `reservePlace` AFTER INSERT ON `reservation` FOR EACH ROW BEGIN
UPDATE Flight SET Flight.total_places = Flight.total_places - 1 WHERE Flight.id_flight = NEW.id_flight;
END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id_flight`);

--
-- Index pour la table `passagers`
--
ALTER TABLE `passagers`
  ADD PRIMARY KEY (`id_travler`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_flight` (`id_flight`),
  ADD KEY `id_resevation` (`id_resevation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_resevation`),
  ADD KEY `id_flight` (`id_flight`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `flight`
--
ALTER TABLE `flight`
  MODIFY `id_flight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `passagers`
--
ALTER TABLE `passagers`
  MODIFY `id_travler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_resevation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passagers`
--
ALTER TABLE `passagers`
  ADD CONSTRAINT `passagers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `clients` (`id_user`),
  ADD CONSTRAINT `passagers_ibfk_2` FOREIGN KEY (`id_flight`) REFERENCES `flight` (`id_flight`),
  ADD CONSTRAINT `passagers_ibfk_3` FOREIGN KEY (`id_resevation`) REFERENCES `reservation` (`id_resevation`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_flight`) REFERENCES `flight` (`id_flight`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `clients` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
