create database casazanusso;
use casazanusso;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 nov. 2024 à 23:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `casazanusso`
--

-- --------------------------------------------------------

--
-- Structure de la table `marches`
--

CREATE TABLE `marches` (
  `id_marche` int(11) NOT NULL,
  `ville_marche` text NOT NULL,
  `adresse_marche` text NOT NULL,
  `jour_marche` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche') NOT NULL,
  `frequence_marche` enum('Hebdomadaire','Exceptionnel','','') NOT NULL,
  `date_marche` date DEFAULT NULL,
  `evenement_marche` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `marches`
--

INSERT INTO `marches` (`id_marche`, `ville_marche`, `adresse_marche`, `jour_marche`, `frequence_marche`, `date_marche`, `evenement_marche`) VALUES
(5, 'Lezat/Leze', 'Centre historique', 'Lundi', 'Hebdomadaire', NULL, NULL),
(8, 'Caujac', 'Place du village', 'Mardi', 'Hebdomadaire', NULL, NULL),
(9, 'Auterive', 'La Madeleine', 'Samedi', 'Exceptionnel', '2024-10-31', 'Halloween'),
(11, 'Mazamet', 'Place de la république', 'Lundi', 'Exceptionnel', '2024-10-30', 'Foire au potiron'),
(13, 'Roques/Garonne', 'Place de la république', 'Lundi', 'Exceptionnel', '2024-10-31', 'Marché de Noël'),
(14, 'Mauressac', 'Face à l&#039;église', 'Lundi', 'Exceptionnel', '2024-12-14', 'Marché de Noël'),
(15, 'Mazères', 'Avenue des peupliers', 'Mercredi', 'Hebdomadaire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id_plat` int(11) NOT NULL,
  `nom_plat` text NOT NULL,
  `image_plat` text NOT NULL,
  `description_plat` text NOT NULL,
  `detail_plat` text NOT NULL,
  `prix_plat` decimal(4,2) NOT NULL,
  `nb_pers_plat` int(11) NOT NULL,
  `id_sorteplat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id_plat`, `nom_plat`, `image_plat`, `description_plat`, `detail_plat`, `prix_plat`, `nb_pers_plat`, `id_sorteplat`) VALUES
(6, 'Cannellonis à la tomate', 'cannelloni.jpg', 'Cannellonis à la tomate ', 'Prix par personne', 12.20, 12, 1),
(7, 'Cochon de lait grillé', 'Cochon grillé.JPG', 'Cochon grillé à la broche. Poids compris entre 25 et 35Kg. Servi découpé ou pas selon vos envies.', 'Prix par personne', 26.70, 25, 1),
(8, 'Pates aux écrevisses', 'Pates aux ecrevisses.JPG', 'Pates à la sauce mozzarella assortie aux écrevisses.', 'Prix par personne', 18.00, 12, 1),
(9, 'Pates aux gambas', 'Pates pesto au gambas.JPG', 'Pates à la sauce pesto assortie de 3 gambas.', 'Prix par personne', 19.90, 6, 1),
(10, 'Hamburger di Napoli', 'Hamburger.JPG', 'Hamburger au steak ,épice, mozzarella ,oignons.', 'Prix par personne', 8.90, 6, 1),
(11, 'Plateau Charcuterie', 'plat_italien.jpg', 'Plateau Charcuterie italienne.', 'Prix au kilo', 26.65, 6, 1),
(12, 'Pannacota', 'pannacota.jpg', 'Crème fraiche accompagné de gélatine au coulis de fruits rouges.', 'Prix par personne', 7.00, 10, 2),
(13, 'Tiramisu au citron', 'Tiramisu_citron.JPG', 'Tiramisu à la crème fraîche aux aromes de citron', 'Prix par personne', 6.50, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sorte`
--

CREATE TABLE `sorte` (
  `id_sorte` int(11) NOT NULL,
  `nom_sorte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sorte`
--

INSERT INTO `sorte` (`id_sorte`, `nom_sorte`) VALUES
(1, 'Plat'),
(2, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `mail`, `password`) VALUES
(2, 'alexzanusso@admin.fr', 'olivia');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `marches`
--
ALTER TABLE `marches`
  ADD PRIMARY KEY (`id_marche`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `FK_plat_sorte` (`id_sorteplat`);

--
-- Index pour la table `sorte`
--
ALTER TABLE `sorte`
  ADD PRIMARY KEY (`id_sorte`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `marches`
--
ALTER TABLE `marches`
  MODIFY `id_marche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `sorte`
--
ALTER TABLE `sorte`
  MODIFY `id_sorte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plats`
--
ALTER TABLE `plats`
  ADD CONSTRAINT `FK_plat_sorte` FOREIGN KEY (`id_sorteplat`) REFERENCES `sorte` (`id_sorte`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
