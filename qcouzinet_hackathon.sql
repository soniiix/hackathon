-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 22 déc. 2023 à 12:52
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
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231128155510', '2023-11-28 15:57:19', 96),
('DoctrineMigrations\\Version20231205154007', '2023-12-05 15:50:16', 12);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` varchar(32) NOT NULL,
  `salle` varchar(32) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nbParticipants` int(11) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `idIntervenant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `libelle`, `date`, `heure`, `duree`, `salle`, `type`, `nbParticipants`, `theme`, `idIntervenant`) VALUES
(1, 'Atelier sur le leadership', '2023-12-08', '16:44:00', '2', 'B009', 'atelier', 25, NULL, NULL),
(2, 'Blockchain : Applications et implications futures', '2023-12-08', '14:47:00', '4', 'G934', 'conference', NULL, 'Cryptomonnaies', 2),
(3, 'Sécurité informatique : Pratiques avancées', '2023-12-16', '15:57:00', '2', 'C890', 'atelier', 33, NULL, NULL),
(4, 'Conférence sur l\'IA', '2023-12-08', '14:08:00', '2', 'M260', 'conference', NULL, 'Intelligence artificielle', 3),
(5, 'Atelier de design thinking pour les développeurs', '2023-12-20', '14:03:00', '3', 'E802', 'atelier', 10, NULL, NULL);

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
(1, 50, '2023-11-30 00:00:00', 'ByteBurst Challenge : Explosez les octets, créez le futur', 'Marseille', 13000, '3 Impasse Fedeli', '2023-12-01', '2023-12-03', '09:00:00', '17:00:00'),
(2, 30, '2023-11-25 00:00:00', 'InnoHacks : Révolutionnez l\'innovation', 'Paris', 75002, '18 Passage du Grand-Cerf', '2023-12-05', '2023-12-07', '10:00:00', '18:00:00'),
(3, 40, '2023-12-10 00:00:00', 'FutureFusion : Fusionnez les idées, forgez le futur du tech', 'Reims', 51454, '4 Rue Aimee Wilbert', '2023-12-15', '2023-12-17', '11:00:00', '19:00:00'),
(4, 20, '2023-12-05 00:00:00', 'CodeXplosion : Développez l\'avenir du code', 'Le Mans', 72000, '42 Rue du 11 Novembre', '2023-12-08', '2023-12-10', '13:00:00', '21:00:00'),
(5, 60, '2023-12-20 00:00:00', 'QuantumQuest : Explorez les frontières de la programmation quantique', 'Lyon', 69000, '75 Rue Louis Dansard', '2023-12-25', '2023-12-27', '14:00:00', '22:00:00'),
(6, 25, '2023-12-15 00:00:00', 'CyberForge : Forgez la sécurité numérique de demain', 'Les Sables d\'Olonne', 85100, '69 Rue de l\'Enfer', '2023-12-18', '2023-12-20', '15:00:00', '23:00:00'),
(7, 35, '2023-12-01 00:00:00', 'DataDive : Plongez dans le monde des données', 'La Roche surYon', 85000, '19 Boulevard Branly', '2023-12-05', '2023-12-07', '16:00:00', '00:00:00'),
(8, 45, '2023-12-08 00:00:00', 'CodeCrafters Challenge : Sculptez votre code, modelez l\'avenir', 'Angers', 49000, '23 Rue Robert Bryan', '2023-12-10', '2023-12-12', '17:00:00', '01:00:00'),
(9, 55, '2023-12-18 00:00:00', 'TechTitans Hack : Affrontez les titans de la technologie', 'Nantes', 44000, '10 Allée Gutenberg', '2023-12-22', '2023-12-24', '18:00:00', '02:00:00'),
(10, 15, '2023-12-12 00:00:00', 'RoboRush : Construisez des bots, dominez l\'arène', 'Bordeaux', 42086, '86 Passage Patrick Henriette', '2023-12-15', '2023-12-17', '19:00:00', '03:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `hackathon_evenement`
--

CREATE TABLE `hackathon_evenement` (
  `hackathon_id` int(11) NOT NULL,
  `evenement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hackathon_evenement`
--

INSERT INTO `hackathon_evenement` (`hackathon_id`, `evenement_id`) VALUES
(1, 5),
(2, 3),
(3, 1),
(4, 1),
(5, 5),
(6, 3),
(7, 3),
(8, 5),
(9, 2),
(10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `inscription_atelier`
--

CREATE TABLE `inscription_atelier` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `idAtelier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscription_atelier`
--

INSERT INTO `inscription_atelier` (`id`, `nom`, `prenom`, `mail`, `idAtelier`) VALUES
(1, 'Boggish', 'Berne', 'bboggish0@toplist.cz', 1),
(2, 'Hempel', 'Marcus', 'mhempel1@weather.com', 1),
(3, 'Stringer', 'Otto', 'ostringer2@homestead.com', 2),
(4, 'Cardew', 'Mabel', 'mcardew3@salon.com', 2),
(5, 'Aitcheson', 'Dickie', 'daitcheson4@geocities.jp', 3),
(6, 'Dreinan', 'Corny', 'cdreinan5@toplist.cz', 3),
(7, 'Bogie', 'Una', 'ubogie6@gizmodo.com', 4),
(8, 'Immins', 'Thelma', 'timmins7@networksolutions.com', 4),
(9, 'Skaife', 'Marius', 'mskaife8@chronoengine.com', 5),
(10, 'Garbert', 'Gerard', 'ggarbert9@msn.com', 5);

-- --------------------------------------------------------

--
-- Structure de la table `inscription_hackathon`
--

CREATE TABLE `inscription_hackathon` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `idParticipant` int(11) NOT NULL,
  `idHackathon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscription_hackathon`
--

INSERT INTO `inscription_hackathon` (`id`, `date`, `idParticipant`, `idHackathon`) VALUES
(1, '2023-11-15', 16, 2),
(2, '2023-11-30', 20, 3),
(3, '2023-11-01', 8, 7),
(4, '2023-11-23', 22, 5),
(5, '2023-12-11', 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`id`, `nom`, `prenom`) VALUES
(1, 'Rentcome', 'Sylvie'),
(2, 'Foker', 'Gérald'),
(3, 'Rodman', 'Christophe');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `prenom` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `tel` int(11) NOT NULL,
  `dateNaissance` date NOT NULL,
  `lienPortfolio` varchar(128) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id`, `nom`, `prenom`, `mail`, `tel`, `dateNaissance`, `lienPortfolio`, `mdp`, `roles`) VALUES
(1, 'Harrigan', 'Inessa', 'iharrigan0@furl.net', 995589524, '2003-12-02', 'http://purevolume.com/vestibulum/velit/id/pretium/iaculis.json?quis=lectus&turpis=aliquam&eget=sit&elit=amet&sodales=diam&sceler', '$2y$10$11pN5BARnF.uNr5tWnOxue6Kk/kDkCLzpACFTF2XiFrjuBksPPtOS', ''),
(2, 'Quarrie', 'Donielle', 'dquarrie1@blogger.com', 791957453, '1995-09-16', 'https://ucoz.com/sapien/a/libero.js?congue=curabitur&etiam=gravida&justo=nisi&etiam=at&pretium=nibh&iaculis=in&justo=hac&in=habi', '$2y$10$cxS3QTJS/V/.Nsy4u6xV2OILHYr8V/9Eg6aov75JsveQ46as5mSFy', ''),
(3, 'Elfleet', 'Florida', 'felfleet2@sfgate.com', 656891255, '1998-05-06', 'http://theguardian.com/mus/vivamus.json?lacinia=et&nisi=eros&venenatis=vestibulum&tristique=ac&fusce=est&congue=lacinia&diam=nis', '$2y$10$O4.3hqIKbqDIstAOvjvB.eiQIDLGgRxyovZ44nJTrNxoBhYTxZple', ''),
(4, 'Dorow', 'Wallis', 'wdorow3@instagram.com', 605092868, '1992-03-03', 'http://google.de/porttitor/id/consequat/in/consequat/ut.png?nulla=dui&eget=maecenas&eros=tristique&elementum=est&pellentesque=et', '$2y$10$axrQD/3fFfh3gzd1gnhvfO2PbZHRY9.Z3SZfpOp9S5tcS9pgiPw22', ''),
(5, 'Vockings', 'Ruy', 'rvockings4@upenn.edu', 225100930, '2004-05-29', 'https://boston.com/phasellus/id/sapien.html?turpis=ultrices&nec=aliquet&euismod=maecenas&scelerisque=leo&quam=odio&turpis=condim', '$2y$10$Pu4Ry.VfM/CL2ULUZ5l1f.ljBDLwHOyaGMARSdw7wtNWBA.oc/wcu', ''),
(6, 'Depka', 'Meghann', 'mdepka5@163.com', 148685038, '1991-02-13', 'http://theguardian.com/sapien/sapien/non/mi.json?tempus=quam&semper=sollicitudin&est=vitae&quam=consectetuer&pharetra=eget&magna', '$2y$10$jGNN3cNmXLeLD5cZvrdIDeqpy/7Gbkb16UdAmvyY3a8eFsjtDpWFe', ''),
(7, 'O\'Hartnett', 'Guido', 'gohartnett6@myspace.com', 770702078, '1997-04-10', 'https://stumbleupon.com/accumsan/tellus/nisi/eu/orci.html?placerat=orci&praesent=vehicula&blandit=condimentum&nam=curabitur&null', '$2y$10$/tEEdbCyBtdPrQ/7ttwS6OlSSsHDkgpomKThnjL4RXp/6S8ZhwdE2', ''),
(8, 'Meyrick', 'Dorita', 'dmeyrick7@myspace.com', 276188864, '1992-03-08', 'http://newyorker.com/tristique/est/et/tempus/semper.html?primis=nulla&in=dapibus&faucibus=dolor&orci=vel&luctus=est&et=donec&ult', '$2y$10$TC9AZm6gOfNeFdiOVrF95uczANbaXXPlkYW32/4j5c4prOASP.zYy', ''),
(16, 'Constantinou', 'Atlante', 'aconstantinouf@wunderground.com', 15889123, '1995-04-06', 'https://zimbio.com/fusce/congue/diam/id/ornare/imperdiet.html?orci=massa&nullam=volutpat&molestie=convallis&nibh=morbi&in=odio&l', '$2y$10$ZkL/z89FTw/Q/qVaY6Al/eYkS/K7gnX7mfICsfYY6HzVoL/HMdIMS', ''),
(20, 'Brandi', 'Gianina', 'gbrandij@statcounter.com', 638457140, '1992-11-12', 'http://soup.io/nulla.html?nisl=ultrices&nunc=posuere&rhoncus=cubilia&dui=curae&vel=donec&sem=pharetra&sed=magna&sagittis=vestibu', '$2y$10$ArNqs3Pnkelfod3zs6lIzu60aykPsHBOT38qjyVEfbNz8X8FHOUf.', ''),
(21, 'Schiersch', 'Aleda', 'aschierschk@berkeley.edu', 114723746, '2003-10-06', 'https://tmall.com/sed/vel/enim.aspx?in=ipsum&faucibus=integer&orci=a&luctus=nibh&et=in', '$2y$10$WLtqZ9sL8gSouiPlq2BXTeQF0DfCN7zBF7fBukyhseOYPn2vufkOK', ''),
(22, 'Sawdy', 'Bernarr', 'bsawdyl@biglobe.ne.jp', 705501307, '1997-07-22', 'http://rediff.com/nulla/elit/ac/nulla/sed/vel/enim.xml?justo=ut&eu=erat&massa=id&donec=mauris&dapibus=vulputate&duis=elementum&a', '$2y$10$zh0lL9i.z4ncSzdeqAc28eEMCwx7Iv5dHmLT8yIhO.AS1YtDkpT.O', ''),
(28, 'Chadd', 'Monti', 'mchaddr@shinystat.com', 395458013, '1998-04-14', 'https://mozilla.org/ipsum/dolor/sit/amet/consectetuer/adipiscing.html?consequat=nisl&varius=nunc&integer=nisl&ac=duis&leo=bibend', '$2y$10$u4fw12dqWdLWaLOY2auvMun.81dBOyAB61U4EYHVVRqk1aTURgXei', ''),
(29, 'Sykora', 'Fleurette', 'fsykoras@ameblo.jp', 755808733, '1992-03-26', 'https://ow.ly/ante/vivamus/tortor/duis/mattis/egestas.html?vitae=in&ipsum=imperdiet&aliquam=et&non=commodo&mauris=vulputate&morb', '$2y$10$vGxbDUEkihmPMGS1EUU0ruFiJwAc.44Btvu9SDdXILwdjzui/8fAK', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evenement_intervenant` (`idIntervenant`);

--
-- Index pour la table `hackathon`
--
ALTER TABLE `hackathon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hackathon_evenement`
--
ALTER TABLE `hackathon_evenement`
  ADD PRIMARY KEY (`hackathon_id`,`evenement_id`),
  ADD KEY `IDX_52FBDE83996D90CF` (`hackathon_id`),
  ADD KEY `IDX_52FBDE83FD02F13` (`evenement_id`);

--
-- Index pour la table `inscription_atelier`
--
ALTER TABLE `inscription_atelier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscription_atelier_evenement` (`idAtelier`);

--
-- Index pour la table `inscription_hackathon`
--
ALTER TABLE `inscription_hackathon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D2F345797C29469` (`idParticipant`),
  ADD KEY `IDX_2D2F345777D0DD19` (`idHackathon`);

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `hackathon`
--
ALTER TABLE `hackathon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `inscription_atelier`
--
ALTER TABLE `inscription_atelier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `inscription_hackathon`
--
ALTER TABLE `inscription_hackathon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_evenement_intervenant` FOREIGN KEY (`idIntervenant`) REFERENCES `intervenant` (`id`);

--
-- Contraintes pour la table `hackathon_evenement`
--
ALTER TABLE `hackathon_evenement`
  ADD CONSTRAINT `FK_52FBDE83996D90CF` FOREIGN KEY (`hackathon_id`) REFERENCES `hackathon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_52FBDE83FD02F13` FOREIGN KEY (`evenement_id`) REFERENCES `evenement` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscription_atelier`
--
ALTER TABLE `inscription_atelier`
  ADD CONSTRAINT `fk_inscription_atelier_evenement` FOREIGN KEY (`idAtelier`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `inscription_hackathon`
--
ALTER TABLE `inscription_hackathon`
  ADD CONSTRAINT `FK_2D2F345777D0DD19` FOREIGN KEY (`idHackathon`) REFERENCES `hackathon` (`id`),
  ADD CONSTRAINT `FK_2D2F345797C29469` FOREIGN KEY (`idParticipant`) REFERENCES `participant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
