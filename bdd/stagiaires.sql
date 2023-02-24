-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 fév. 2023 à 09:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stagiaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `ID_FORMATEUR` int(11) NOT NULL,
  `ID_SALLE` int(11) NOT NULL,
  `NOM_FORMATEUR` varchar(20) DEFAULT NULL,
  `PRENOM_FORMATEUR` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`ID_FORMATEUR`, `ID_SALLE`, `NOM_FORMATEUR`, `PRENOM_FORMATEUR`) VALUES
(1, 2, 'quoi', 'feur'),
(2, 1, 'moi', 'moi'),
(7, 4, 'bob', 'bob'),
(8, 3, 'jean', 'durand');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `ID_FORM` int(11) NOT NULL,
  `LIBELLE_FORM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`ID_FORM`, `LIBELLE_FORM`) VALUES
(1, 'web-truc'),
(2, 'dev'),
(3, 'web-market'),
(4, 'la reponse d');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

CREATE TABLE `nationalite` (
  `ID_NATION` int(11) NOT NULL,
  `LIBELLE_NATION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nationalite`
--

INSERT INTO `nationalite` (`ID_NATION`, `LIBELLE_NATION`) VALUES
(1, 'français'),
(2, 'itailien'),
(3, 'espagne'),
(4, 'russe');

-- --------------------------------------------------------

--
-- Structure de la table `persone`
--

CREATE TABLE `persone` (
  `ID_PERSONE` int(11) NOT NULL,
  `ID_NATION` int(11) NOT NULL,
  `ID_FORM` int(11) NOT NULL,
  `PRENOM` varchar(20) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `persone`
--

INSERT INTO `persone` (`ID_PERSONE`, `ID_NATION`, `ID_FORM`, `PRENOM`, `NOM`) VALUES
(98, 2, 3, 'ghdf', 'kjh'),
(99, 1, 1, 'azeazeazeazeaze', 'saazeaze');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `ID_SALLE` int(11) NOT NULL,
  `LIBELLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`ID_SALLE`, `LIBELLE`) VALUES
(1, '1992'),
(2, '666'),
(3, '2005'),
(4, '1');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire_formateur`
--

CREATE TABLE `stagiaire_formateur` (
  `id_stagiaire_formateur` int(11) NOT NULL,
  `ID_PERSONE` int(11) NOT NULL,
  `ID_FORMATEUR` int(11) DEFAULT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagiaire_formateur`
--

INSERT INTO `stagiaire_formateur` (`id_stagiaire_formateur`, `ID_PERSONE`, `ID_FORMATEUR`, `DATE_DEBUT`, `DATE_FIN`) VALUES
(15288, 98, 8, '2023-02-02', '2023-02-02'),
(15291, 99, 1, '2023-02-11', '2023-03-10'),
(15292, 99, 2, '2023-02-13', '2023-03-12');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation_formateur`
--

CREATE TABLE `type_formation_formateur` (
  `ID_FORM` int(11) NOT NULL,
  `ID_FORMATEUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_formation_formateur`
--

INSERT INTO `type_formation_formateur` (`ID_FORM`, `ID_FORMATEUR`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 8),
(4, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`ID_FORMATEUR`),
  ADD KEY `ID_SALLE` (`ID_SALLE`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`ID_FORM`);

--
-- Index pour la table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`ID_NATION`);

--
-- Index pour la table `persone`
--
ALTER TABLE `persone`
  ADD PRIMARY KEY (`ID_PERSONE`),
  ADD KEY `ID_NATION` (`ID_NATION`),
  ADD KEY `ID_FORM` (`ID_FORM`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`ID_SALLE`);

--
-- Index pour la table `stagiaire_formateur`
--
ALTER TABLE `stagiaire_formateur`
  ADD PRIMARY KEY (`id_stagiaire_formateur`),
  ADD KEY `ID_PERSONE` (`ID_PERSONE`),
  ADD KEY `ID_FORMATEUR` (`ID_FORMATEUR`);

--
-- Index pour la table `type_formation_formateur`
--
ALTER TABLE `type_formation_formateur`
  ADD PRIMARY KEY (`ID_FORM`,`ID_FORMATEUR`),
  ADD KEY `ID_FORMATEUR` (`ID_FORMATEUR`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `ID_FORMATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `ID_FORM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `ID_NATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `persone`
--
ALTER TABLE `persone`
  MODIFY `ID_PERSONE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `ID_SALLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `stagiaire_formateur`
--
ALTER TABLE `stagiaire_formateur`
  MODIFY `id_stagiaire_formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15293;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD CONSTRAINT `formateur_ibfk_1` FOREIGN KEY (`ID_SALLE`) REFERENCES `salle` (`ID_SALLE`);

--
-- Contraintes pour la table `persone`
--
ALTER TABLE `persone`
  ADD CONSTRAINT `persone_ibfk_1` FOREIGN KEY (`ID_NATION`) REFERENCES `nationalite` (`ID_NATION`),
  ADD CONSTRAINT `persone_ibfk_2` FOREIGN KEY (`ID_FORM`) REFERENCES `formation` (`ID_FORM`);

--
-- Contraintes pour la table `stagiaire_formateur`
--
ALTER TABLE `stagiaire_formateur`
  ADD CONSTRAINT `stagiaire_formateur_ibfk_1` FOREIGN KEY (`ID_PERSONE`) REFERENCES `persone` (`ID_PERSONE`),
  ADD CONSTRAINT `stagiaire_formateur_ibfk_2` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `formateur` (`ID_FORMATEUR`);

--
-- Contraintes pour la table `type_formation_formateur`
--
ALTER TABLE `type_formation_formateur`
  ADD CONSTRAINT `type_formation_formateur_ibfk_1` FOREIGN KEY (`ID_FORM`) REFERENCES `formation` (`ID_FORM`),
  ADD CONSTRAINT `type_formation_formateur_ibfk_2` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `formateur` (`ID_FORMATEUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
