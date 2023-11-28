-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 28 nov. 2023 à 14:20
-- Version du serveur : 10.11.4-MariaDB-1~deb12u1
-- Version de PHP : 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qcouzinet_hackathon`
--

-- --------------------------------------------------------

--
-- Structure de la table `hackathon`
--

CREATE TABLE `hackathon` (
  `id` int(11) NOT NULL,
  `nbPlacesMax` int(11) NOT NULL,
  `dateLimiteInscription` datetime NOT NULL,
  `titre` varchar(128) NOT NULL,
  `ville` varchar(128) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `rue` varchar(128) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hackathon`
--

INSERT INTO `hackathon` (`id`, `nbPlacesMax`, `dateLimiteInscription`, `titre`, `ville`, `codePostal`, `rue`, `dateDebut`, `dateFin`, `heureDebut`, `heureFin`) VALUES
(1, 50, '2023-11-30 00:00:00', 'ByteBurst Challenge: Explosez les octets, créez le futur', 'Marseille', 12345, 'Street A', '2023-12-01', '2023-12-03', '09:00:00', '17:00:00'),
(2, 30, '2023-11-25 00:00:00', 'InnoHacks: Révolutionnez l\'innovation', 'Paris', 67890, 'Street B', '2023-12-05', '2023-12-07', '10:00:00', '18:00:00'),
(3, 40, '2023-12-10 00:00:00', 'FutureFusion: Fusionnez les idées, forgez le futur du tech', 'Reims', 13579, 'Street C', '2023-12-15', '2023-12-17', '11:00:00', '19:00:00'),
(4, 20, '2023-12-05 00:00:00', 'CodeXplosion: Développez l\'avenir du code', 'Le Mans', 72100, 'Street D', '2023-12-08', '2023-12-10', '13:00:00', '21:00:00'),
(5, 60, '2023-12-20 00:00:00', 'QuantumQuest: Explorez les frontières de la programmation quantique', 'Lyon', 97531, 'Street E', '2023-12-25', '2023-12-27', '14:00:00', '22:00:00'),
(6, 25, '2023-12-15 00:00:00', 'CyberForge: Forgez la sécurité numérique de demain', 'Les Sables d\'Olonne', 85100, 'Street F', '2023-12-18', '2023-12-20', '15:00:00', '23:00:00'),
(7, 35, '2023-12-01 00:00:00', 'DataDive: Plongez dans le monde des données', 'La Roche surYon', 75319, 'Street G', '2023-12-05', '2023-12-07', '16:00:00', '00:00:00'),
(8, 45, '2023-12-08 00:00:00', 'CodeCrafters Challenge: Sculptez votre code, modelez l\'avenir', 'Angers', 49000, 'Street H', '2023-12-10', '2023-12-12', '17:00:00', '01:00:00'),
(9, 55, '2023-12-18 00:00:00', 'TechTitans Hack: Affrontez les titans de la technologie', 'Nantes', 44000, 'Street I', '2023-12-22', '2023-12-24', '18:00:00', '02:00:00'),
(10, 15, '2023-12-12 00:00:00', 'RoboRush: Construisez des bots, dominez l\'arène', 'Bordeaux', 42086, 'Street J', '2023-12-15', '2023-12-17', '19:00:00', '03:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hackathon`
--
ALTER TABLE `hackathon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hackathon`
--
ALTER TABLE `hackathon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
