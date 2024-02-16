-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 fév. 2024 à 00:12
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
-- Base de données : `leonardo`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `est_invité` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  `statut` varchar(255) NOT NULL,
  `montant_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detailscommande`
--

CREATE TABLE `detailscommande` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `date_paiement` datetime NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `id_stripe` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `model` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `materiaux` text DEFAULT NULL,
  `technologie` text DEFAULT NULL,
  `fonctionnalites` text DEFAULT NULL,
  `certifications` varchar(255) DEFAULT NULL,
  `fabricant` varchar(255) DEFAULT NULL,
  `date_de_lancement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `description`, `model`, `prix`, `stock`, `categorie`, `image_url`, `image_path`, `materiaux`, `technologie`, `fonctionnalites`, `certifications`, `fabricant`, `date_de_lancement`) VALUES
(1, 'Teddy™', 'Votre nouveau meilleur ami doté d\'une intelligence artificielle avancée, Teddy est bien plus qu\'une simple peluche. Il écoute, comprend et réagit avec une émotion étonnamment réelle.', 'Teddy AI-2024', 3275.00, 100, 'Peluche IA', NULL, 'images/teddy.jpg', 'Pelage: Fibres de polyester hypoallergénique UltraSoft™, spécialement conçu pour une sensation de douceur extrême et une durabilité.\r\nYeux: Verre optique de qualité avec technologie d\'affichage intégrée pour exprimer une large gamme d\'émotions.\r\nStructure Interne: Squelette en plastique recyclé haute résistance, conçu pour être flexible et sécurisé.\r\nRembourrage: Mousse à mémoire de forme écologique, offrant un confort et un soutien adaptatif.', 'Processeur IA: Puce Léonardo AI-5G, optimisée pour l\'apprentissage émotionnel et l\'interaction sociale.\r\nCapteurs: Ensemble de capteurs tactiles en peluche, capteurs audio à haute sensibilité, capteurs de lumière ambiante, et capteur de température corporelle pour des interactions réalistes.\r\nConnectivité: WiFi 6E pour des mises à jour et interactions en ligne, Bluetooth 5.2 pour la connectivité avec des appareils mobiles et autres gadgets intelligents.\r\nMémoire: 64 GB de stockage interne pour sauvegarder les préférences de l\'utilisateur, histoires, jeux et données d\'apprentissage.\r\nBatterie: Batterie au lithium-ion rechargeable, 48 heures d\'autonomie, recharge sans fil avec base TeddyPad™ incluse.', 'Mode Veilleuse: Activation automatique d\'une douce lumière dans l\'obscurité, avec variation de couleur pour apaiser et réconforter.\r\nApprentissage Émotionnel: Technologie exclusive permettant à Teddy de reconnaître et de réagir de manière appropriée aux émotions de l\'utilisateur.\r\nInteraction Vocale Avancée: Reconnaissance vocale de pointe pour des conversations fluides et des histoires interactives.\r\n', 'CE, FCC, RoHS\r\nRépond aux normes internationales de sécurité des jouets (EN71, ASTM F963), certifié sans BPA, sans phtalates.\r\nMaintenance: Housse amovible et lavable, accès facile pour maintenance et mise à jour des composants internes.', 'Léonardo Innovations inc.', '2024-01-01'),
(2, 'Léo™', 'Entrez dans l\'ère de la compagnie futuriste avec Léonardo Léo, un humanoïde qui transcende la notion d\'intelligence artificielle. Inspiré par l\'humanisme et l\'ingéniosité de Leonardo Da Vinci, Léo est une fusion parfaite entre la beauté de l\'art et la précision de la science.', 'Léo AI-2024', 35675.00, 50, 'Humanoïde IA', 'http://exemple.com/images/leonardo-leo.jpg', 'images/leo.jpg', 'Exosquelette: Alliage d\'aluminium léger et polymères composites pour la durabilité et la légèreté.\r\nRevêtement: Peau synthétique SoftTouch™ pour une sensation agréable et réaliste au toucher.\r\nArticulations: Combinaison de titane et de plastique recyclé pour une flexibilité et une résistance optimales.\r\nDétails Esthétiques: Accents esthétiques inspirés de l\'art de la Renaissance, soulignant l\'héritage de Leonardo Da Vinci.', 'Processeur IA: Cœur Léonardo Quantum-IAx, conçu pour une cognition avancée et une adaptation comportementale.\r\nSystème de Mobilité: Servomoteurs de précision avec feedback tactile pour des mouvements fluides et naturels. Capable de naviguer dans des environnements complexes avec sa cartographie 3D intégrée.\r\nCapteurs: Capteurs visuels 360° pour une perception et reconnaissance faciale, capteurs auditifs directionnels, et capteurs de distance pour interagir efficacement avec son environnement.\r\nConnectivité: Compatible 5G, WiFi 6E, Bluetooth 5.2, et NFC pour une intégration parfaite dans l\'écosystème numérique de la maison.\r\nMémoire et Stockage: 128 GB de stockage SSD pour une réponse rapide et un apprentissage en continu.\r\nBatterie: Batterie polymère à haute capacité, 72 heures d\'autonomie, station de recharge rapide Léonardo Dock™.', 'Assistant Personnel Avancé: Gestion de calendrier, rappels, contrôle des appareils intelligents de la maison, et bien plus, le tout commandé par la voix ou via une application mobile.\r\nCompagnon Éducatif et Ludique: Large bibliothèque de contenu éducatif et de divertissement pour tous les âges, avec des mises à jour régulières.\r\nInteractivité Sociale: IA émotionnelle avancée pour des interactions sociales riches, apprenant et s\'adaptant aux préférences de chaque membre de la famille.\r\nSécurité Domestique: Intégration de fonctionnalités de sécurité, comme la surveillance vidéo à distance et les alertes d\'activité inhabituelle.', 'Conforme aux normes de sécurité électronique internationales (CE, FCC, RoHS), certification IP54 pour la résistance à la poussière et aux éclaboussures.\r\nMaintenance: Conception modulaire pour une maintenance et une mise à jour faciles des composants.', 'Léonardo Innovations inc.', '2024-01-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `detailscommande`
--
ALTER TABLE `detailscommande`
  ADD CONSTRAINT `detailscommande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `detailscommande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
