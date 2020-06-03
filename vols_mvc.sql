-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 juin 2020 à 00:02
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
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_user`, `first_name`, `last_name`, `cin`, `passport`, `address`, `email`, `password_user`, `phone`, `role`) VALUES
(1, 'Mehdi', 'KARBAL', 'HH241170', 'MAR134567', 'Morocco', 'admin@admin.com', 'admin123', '+21266578685', 'admin'),
(3, 'Elmahdi', 'KARBAL', '434333', 'ghghgh', 'morocco', 'me.karbal@gmail.com', 'AZ', '0697802293', 'user'),
(4, 'az', 'zz', 'HDGFJH', 'HJDGFJHGDJ', 'JHFQJG', 'cc@cc.com', 'AZ', '12121', 'user'),
(5, 'yas', 'yas', 'GHHGH', 'HGHG', 'GHGH', 'yas@yas.com', 'cc8c0a97c2dfcd73caff160b65aa39e2', '12121', 'user'),
(6, 'fname', 'lname', 'address', 'pap', 'cin', 'email.email.com', '93279e3308bdbbeed946fc965017f67a', 'az', 'user'),
(7, 'elmahdi', 'karbal', 'address', '1222222', 'GHHGH', 'me.karbal@gmail.com', 'de872154ffbf91a5dcc0e539dd2d5106', 'AZ', 'user');

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
  `statut` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `flight`
--

INSERT INTO `flight` (`id_flight`, `n_flight`, `depart`, `distination`, `date_flight`, `hour_flight`, `minute_flight`, `price`, `total_places`, `statut`, `created_at`) VALUES
(12, 'RAM', 'Safi', 'casa', '2020-05-23', 0, 0, 2333, 111, 1, '2020-06-03 20:05:48'),
(13, 'Elmahdi KARBAL', 'Safi', 'Safi', '2020-05-12', 0, 0, 2333, 122, 0, '2020-06-03 20:05:48'),
(14, 'Elmahdi KARBAL', 'Safi', 'Safi', '2020-05-16', 0, 0, 2333, 122, 0, '2020-06-03 20:05:48'),
(15, 'Elmahdi KARBAL', 'Safi', 'Safi', '2020-05-20', 0, 0, 2333, 112, 1, '2020-06-03 20:06:26'),
(16, 'az', 'SAFI', 'CASA', '2121-12-12', 21, 21, 12, 12, 0, '2020-06-03 21:05:56'),
(17, 'Elmahdi KARBAL', 'Safi', 'Safi', '1212-12-12', 121, 212, 2333, 122, 1, '2020-06-03 20:05:48'),
(18, 'az', '1', '21', '1222-12-12', 121, 122, 212, 12, 0, '2020-06-03 20:05:48'),
(19, 'cazazzazz', 'SAFI', 'PARIS', '1222-12-12', 12, 12, 12, 12, 1, '2020-06-03 20:05:48'),
(20, 'Elmahdi KARBAL', 'Safi', 'Safi', '1212-12-12', 12, 12, 12, 12, 1, '2020-06-03 20:10:40');

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
(14, 1, 12, 64, 'Elmahdi', 'KARBAL', 'ghghgh'),
(15, 1, 15, 65, 'Mehdi', 'KARBAL', 'MAR134567'),
(16, 1, 12, 66, 'hhhhhh', 'hhhhhhh', '1111'),
(17, 3, 15, 67, 'Elmahdi', 'KARBAL', 'ghghgh'),
(18, 1, 12, 68, 'Elmahdi', 'KARBAL', 'ghghgh'),
(19, 1, 12, 72, 'Mehdi', 'KARBAL', 'MAR134567'),
(20, 3, 15, 73, 'MEHDI', 'hgdsh', '1111'),
(21, 4, 15, 74, 'az', 'zz', 'HJDGFJHGDJ'),
(22, 1, 15, 75, 'Mehdi', 'KARBAL', 'MAR134567'),
(23, 3, 12, 76, 'Elmahdi', 'KARBAL', 'ghghgh'),
(24, 7, 15, 77, 'elmahdi', 'karbal', '1222222'),
(25, 7, 15, 78, 'elmahdi', 'karbal', '1222222');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_resevation` int(11) NOT NULL,
  `id_flight` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_resevation` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_resevation`, `id_flight`, `id_user`, `date_resevation`) VALUES
(22, 15, 3, '2020-05-31'),
(23, 12, 3, '2020-05-31'),
(37, 12, 3, '2020-05-31'),
(60, 15, 1, '2020-06-01'),
(61, 12, 1, '2020-06-01'),
(63, 15, 1, '2020-06-01'),
(64, 12, 1, '2020-06-01'),
(65, 15, 1, '2020-06-02'),
(66, 12, 1, '2020-06-02'),
(67, 15, 3, '2020-06-02'),
(68, 12, 1, '2020-06-02'),
(69, 12, 1, '2020-06-02'),
(70, 12, 1, '2020-06-02'),
(71, 12, 1, '2020-06-02'),
(72, 12, 1, '2020-06-02'),
(73, 15, 3, '2020-06-03'),
(74, 15, 4, '2020-06-03'),
(75, 15, 1, '2020-06-03'),
(76, 12, 3, '2020-06-03'),
(77, 15, 7, '2020-06-03'),
(78, 15, 7, '2020-06-03');

--
-- Déclencheurs `reservation`
--
DELIMITER $$
CREATE TRIGGER `reserve_Place` AFTER INSERT ON `reservation` FOR EACH ROW BEGIN
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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `flight`
--
ALTER TABLE `flight`
  MODIFY `id_flight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `passagers`
--
ALTER TABLE `passagers`
  MODIFY `id_travler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_resevation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
