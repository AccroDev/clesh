-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 22 jan. 2026 à 18:30
-- Version du serveur : 8.4.7
-- Version de PHP : 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clesh`
--

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE `composant` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `fields` json NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Auth` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `composant`
--

INSERT INTO `composant` (`id`, `name`, `title`, `category`, `fields`, `created_at`, `updated_at`, `Auth`) VALUES
(1, 'formation', 'formation', 'formation', '[{\"name\": \"title\", \"type\": \"Text\", \"label\": \"Titre du champ\", \"multiline\": false}, {\"name\": \"content\", \"type\": \"HTMLText\", \"label\": \"Titre du champ\"}]', '2026-01-12 21:01:19', '2026-01-12 21:01:19', 1),
(2, 'newcomponent', 'componenet new', 'formation', '[{\"name\": \"members\", \"type\": \"Repeater\", \"label\": \"Liste des membres\", \"fields\": [{\"name\": \"fullname\", \"type\": \"Text\", \"label\": \"Nom complet\"}, {\"name\": \"photo\", \"type\": \"Image\", \"label\": \"Photo de profil\"}], \"addLabel\": \"Ajouter un membre\", \"collapsed\": \"fullname\"}]', '2026-01-12 21:02:01', '2026-01-12 21:02:01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `accreditation` int NOT NULL,
  `contenue` text COLLATE utf8mb4_bin NOT NULL,
  `autheur` int NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `structure_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `description`, `accreditation`, `contenue`, `autheur`, `date`, `structure_type`, `path`) VALUES
(1, 'title', 'description', 2, '', 1, '2026-01-11 14:17:07', '', ''),
(2, 'lorem upsom', '1222', 1, '[\n  {\n    \"title\": \"dd\",\n    \"content\": \"<p>dd</p>\",\n    \"_name\": \"formation\"\n  }\n]', 1, '2026-01-21 12:29:52', 'unique', 'lorem'),
(3, 'lorem upsom', '1222', 1, '[]', 1, '2026-01-21 12:32:03', 'unique', 'lorem-upsom'),
(4, 'allarticles', 'rrr', 1, '[]', 1, '2026-01-21 14:42:24', 'group', 'articles/[slug:*]');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `accreditation` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `accreditation`) VALUES
(1, 'Joseph Emrys', 'accrodev@gmail.com', '1223', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
