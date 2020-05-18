-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 18 mai 2020 à 01:04
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clone_instagram`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photos_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(39) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `photos_id`, `users_id`, `comment`, `created_at`, `ip_address`) VALUES
(4, 4, 2, 'test', '2020-05-14 16:35:23', '127.0.0.1'),
(5, 2, 3, 'test2', '2020-05-14 16:47:52', '127.0.0.1'),
(6, 5, 3, 'test 2 dsqd qs', '2020-05-14 17:00:05', '127.0.0.1'),
(7, 4, 2, 'Test comment 2', '2020-05-14 19:37:49', '127.0.0.1'),
(8, 4, 4, 'test comment  new index', '2020-05-15 15:11:41', '127.0.0.1'),
(10, 4, 4, 'TEST2 new index ', '2020-05-15 15:13:58', '127.0.0.1'),
(11, 5, 4, 'test 2', '2020-05-15 17:10:57', '127.0.0.1'),
(12, 4, 2, 'Test limit count foreach', '2020-05-16 02:50:16', '127.0.0.1'),
(13, 4, 2, 'again test limit count foreach', '2020-05-16 03:04:27', '127.0.0.1'),
(14, 2, 2, 'test de qualité', '2020-05-16 03:04:40', '127.0.0.1'),
(15, 4, 2, 'retest add comment', '2020-05-16 03:08:29', '127.0.0.1'),
(16, 5, 2, 'test other id', '2020-05-16 03:08:39', '127.0.0.1'),
(17, 2, 2, 'test again other other id', '2020-05-16 03:08:50', '127.0.0.1'),
(18, 4, 2, 'reretest add comment', '2020-05-16 03:09:31', '127.0.0.1'),
(19, 2, 2, 'rereretest add comment', '2020-05-16 03:09:40', '127.0.0.1'),
(20, 2, 2, 'test move header ', '2020-05-16 04:14:06', '127.0.0.1'),
(21, 2, 2, 'test move header 2', '2020-05-16 04:14:26', '127.0.0.1'),
(22, 5, 2, 'azeazeazea', '2020-05-16 20:36:27', '127.0.0.1'),
(23, 5, 2, 'test index add comment ', '2020-05-16 20:39:16', '127.0.0.1'),
(24, 5, 2, 'test photo.php add comment', '2020-05-16 20:45:19', '127.0.0.1'),
(25, 5, 2, 'TEST header http_referer', '2020-05-16 20:47:22', '127.0.0.1'),
(26, 8, 2, 'nice pic!', '2020-05-18 02:17:42', '127.0.0.1'),
(27, 8, 3, 'I agree !!!', '2020-05-18 02:18:09', '127.0.0.1'),
(28, 8, 4, 'WOW!!', '2020-05-18 02:18:44', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `photos_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `ipaddress` varchar(39) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `photos_id`, `users_id`, `ipaddress`) VALUES
(8, 4, 2, '127.0.0.1'),
(9, 2, 2, '127.0.0.1'),
(10, 5, 2, '127.0.0.1'),
(11, 5, 3, '127.0.0.1'),
(12, 4, 3, '127.0.0.1'),
(13, 2, 3, '127.0.0.1'),
(15, 4, 4, '127.0.0.1'),
(19, 2, 4, '127.0.0.1'),
(21, 8, 3, '127.0.0.1'),
(22, 8, 4, '127.0.0.1'),
(23, 10, 4, '127.0.0.1'),
(25, 10, 5, '127.0.0.1'),
(26, 8, 5, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `urlphoto` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `caption` text NOT NULL,
  `ip_address` varchar(39) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `urlphoto`, `created_at`, `caption`, `ip_address`) VALUES
(2, 2, 'PP_2020.jpg', '2020-05-14 09:37:24', 'test', '127.0.0.1'),
(4, 3, '69029572_895764220797920_2027796923938766848_n.jpg', '2020-05-14 11:54:32', 'test other user', '127.0.0.1'),
(5, 2, '2005.JPG', '2020-05-14 12:10:10', 'test profile-user', '127.0.0.1'),
(8, 2, 'street.jpg', '2020-05-17 20:23:38', 'S T R E E T', '127.0.0.1'),
(10, 4, 'IMG_20200303_042250_139.jpg', '2020-05-18 02:19:46', 'A view from Spain - Lloret de Mar', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(39) NOT NULL,
  `profile_photo` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `mail`, `created_at`, `ip_address`, `profile_photo`) VALUES
(2, 'mat', '83c8a39e15a22c92107ee1232ab30d20108a1f8e', 'matthias.pellacoeur@hotmail.com', '2020-05-12 14:34:03', '127.0.0.1', '0'),
(3, 'loann', '8cb2237d0679ca88db6464eac60da96345513964', 'loann.benoit@hotmail.com', '2020-05-14 11:40:27', '127.0.0.1', '0'),
(4, 'nathan', '5a6f06db0bd8a8c95c41e825df3de1588c7569ed', 'nathan.pellacoeur@hotmail.com', '2020-05-15 13:18:26', '127.0.0.1', '0'),
(5, 'Vero', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'VFsimplon@gmail.com', '2020-05-18 02:22:10', '127.0.0.1', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos` (`photos_id`),
  ADD KEY `users` (`users_id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos` (`photos_id`),
  ADD KEY `users` (`users_id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`photos_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`photos_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
