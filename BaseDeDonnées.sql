-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 02 mai 2021 à 01:17
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contact`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` int(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `tel`, `photo`, `users_id`) VALUES
(2, 'Sall', 'Ousmane', 775621575, '607284cf2df3b6.71221864.jpg', 2),
(6, 'Thiam', 'Halil', 778957812, '607391983365b0.55596928.jpg', 2),
(10, 'Diop', 'Ibrahima', 765213512, '6074daf3b1f613.46596224.jpg', 4),
(11, 'Fall', 'Awa', 762541986, '6074db8ec73358.50188104.jpg', 4),
(12, 'Noba', 'Mouhamed', 775410124, '6074dbb0b3c5f6.48236294.jpg', 4),
(14, 'Diagne', 'Gora', 775241365, '6074dc4af1f420.84745986.jpg', 3),
(15, 'Petit', 'Fata', 775462589, '6074dc8d4d3522.19726554.jpg', 4),
(17, 'Mbow', 'Serign', 778569743, '6074ff02e40ef6.80543061.jpg', 1),
(18, 'Sane', 'Pape', 775632145, '607501df731e05.68408421.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `pass`) VALUES
(1, 'Thiam', 'Salif', 'salif@gmail.com', '$2y$10$o.4VbF8EhnSbpiIgNScg5eN0qlCQPnsq8m/8ApxV1r0/8JXnjJuze'),
(2, 'kasse', 'pape', 'kasse@gmail.com', '$2y$10$9jCjlii/S3e0mpu7Y056G..L1Vg.Imrfggwa5D6Y9pu022T5LMjdS'),
(3, 'Ndiaye', 'Fallou', 'fallou@gmail.com', '$2y$10$.L7pMMFOJmu8CEq1/C2JhOt00ZIsbHYtSnr8J5dLoXkhbhBsoLHJm'),
(4, 'Dupont', 'Alain', 'AlainDupont@gmail.com', '$2y$10$7HF8LkddXDSUH0JROQIJ7.HZ0ZEGmCXxRsAEAkFJs8LR2seXi7Wy6'),
(5, '', '', '', '$2y$10$bz6M5v6w/K2YXWIEAT4zgefqgAhtwQ19GbULrlMNHJViQYtCbJAjq'),
(6, 'Ndiaye', 'Mamadou', 'mamadou@gmail.com', '$2y$10$ExvRR.aBH7ijvBPXxz7cO.r1CBf32ps3LUvxczVBnpv6BV8wWpQ.q');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
