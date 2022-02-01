-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 01 fév. 2022 à 16:34
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `Borrow`
--

CREATE TABLE `Borrow` (
  `id` int(11) NOT NULL,
  `livre_id` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

CREATE TABLE `Livre` (
  `id` int(11) NOT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_ISBN` int(11) NOT NULL,
  `exemplaire_dispo` int(11) NOT NULL,
  `exemplaire_emprunte` int(11) NOT NULL,
  `Author_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`id`, `editor_id`, `title`, `resume`, `num_ISBN`, `exemplaire_dispo`, `exemplaire_emprunte`, `Author_id`, `stock`) VALUES
(1, 3, 'reyreeeeeeeeeeeee', 'rgevdeeeeeeeeeeeeeee', 4, 6, 4, 3, 0),
(2, 3, 'reyr', 'rgevd', 2, 4, 1, 3, 0),
(4, 3, 'sa marche', 'yeyssssssssssssssssssssyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyssssssssssssssssss', 4, 24, 4, 3, 50);

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `id` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `livre_id` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Note`
--

INSERT INTO `Note` (`id`, `note`, `comment`, `livre_id`, `User_id`) VALUES
(1, 4, 'test', 1, 3),
(2, 4, 'test', 1, 3),
(3, 2, 'testeeeeeeeeeeeeeeeeeeeeeeee', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `firstname`, `mail`) VALUES
(3, 'test', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Borrow`
--
ALTER TABLE `Borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5277AD8668D3EA09` (`User_id`),
  ADD KEY `IDX_5277AD8637D925CB` (`livre_id`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6DA2609D6995AC4C` (`editor_id`),
  ADD KEY `IDX_6DA2609D748471B8` (`Author_id`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F8F552A68D3EA09` (`User_id`),
  ADD KEY `IDX_6F8F552A37D925CB` (`livre_id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Note`
--
ALTER TABLE `Note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Borrow`
--
ALTER TABLE `Borrow`
  ADD CONSTRAINT `FK_5277AD8637D925CB` FOREIGN KEY (`livre_id`) REFERENCES `Livre` (`id`),
  ADD CONSTRAINT `FK_5277AD8668D3EA09` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD CONSTRAINT `FK_6DA2609D6995AC4C` FOREIGN KEY (`editor_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `FK_6DA2609D748471B8` FOREIGN KEY (`Author_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `FK_6F8F552A37D925CB` FOREIGN KEY (`livre_id`) REFERENCES `Livre` (`id`),
  ADD CONSTRAINT `FK_6F8F552A68D3EA09` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
