-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 19 Octobre 2012 à 10:50
-- Version du serveur: 5.1.63
-- Version de PHP: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `peanut2i18n`
--

-- --------------------------------------------------------

--
-- Structure de la table `peanut_item`
--

CREATE TABLE IF NOT EXISTS `peanut_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu` bigint(20) NOT NULL,
  `author` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'draft',
  `relation` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` bigint(20) DEFAULT NULL,
  `seo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peanut_item_position_sortable_idx` (`position`,`menu`),
  KEY `peanut_item_type_idx` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `peanut_item`
--

INSERT INTO `peanut_item` (`id`, `type`, `menu`, `author`, `status`, `relation`, `created_at`, `updated_at`, `position`, `seo_id`) VALUES
(1, 'page', 1, 1, 'publish', NULL, '2011-04-04 00:00:00', '2011-06-15 23:18:22', 1, 1),
(2, 'link', 1, 1, 'draft', 1, '2011-04-04 00:00:00', '2011-06-15 23:18:29', 2, 2),
(3, 'link', 2, 1, 'draft', 2, '2011-04-04 00:00:00', '2011-06-15 23:18:37', 1, 3),
(4, 'link', 2, 1, 'draft', 3, '2011-04-12 00:00:00', '2011-06-15 23:18:40', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `peanut_item_translation`
--

CREATE TABLE IF NOT EXISTS `peanut_item_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `excerpt` longtext COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `peanut_item_translation_sluggable_idx` (`slug`,`lang`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `peanut_item_translation`
--

INSERT INTO `peanut_item_translation` (`id`, `title`, `content`, `excerpt`, `url`, `lang`, `slug`) VALUES
(1, 'Accueil', '<p>\r\n	Bonjour à tous,</p>\r\n<p>\r\n	Vous trouverez ici une démonstration des différents modules de peanut à travers leurs fonctionnalités. Le moteur est actuellement à considérer en version 4.1.1 et subit un refactoring complet. peanut est proposé sous la license MIT permettant à tous de modifier le code, exploiter le code et même changer de license sans contraintes.</p>\r\n<p>\r\n	peanut possède un backoffice complet, accessible avec identifiant et mot de passe permettant à tous, même néophyte, de pouvoir exploiter un site Internet. Chacun des modules est également présenté, documenté et testé afin de garantir un bon fonctionnement.</p>\r\n<p>\r\n	L&#39;ensemble du code est accessible en libre téléchargement sur le repository GIT du projet. Vous pouvez également suivre l&#39;évolution de peanut à travers le blog de l&#39;auteur. Enfin, peanut est livré en l&#39;état, sans garantie de fonctionnement et/ou de fiabilité. Cela n&#39;empêche cependant pas de faire de mon mieux pour ne pas livrer quelque chose d&#39;inutilisable.</p>\r\n<p>\r\n	Bien entendu, cette démonstration s&#39;agrémentera de fonctionnalités avec le temps alors en attendant, n&#39;hésitez pas à explorer le code !</p>\r\n', '', NULL, 'fr', 'accueil'),
(2, 'contact', '', NULL, 'http://www.google.com', 'fr', 'contact'),
(3, 'peanut.fr', '', NULL, 'http://www.peanut.fr', 'fr', 'peanut'),
(4, 'github', '', NULL, 'http://www.github.com/pocky', 'fr', 'github');

-- --------------------------------------------------------

--
-- Structure de la table `peanut_menu`
--

CREATE TABLE IF NOT EXISTS `peanut_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `root_id` bigint(20) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `level` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peanut_menu_sluggable_idx` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `peanut_menu`
--

INSERT INTO `peanut_menu` (`id`, `slug`, `root_id`, `lft`, `rgt`, `level`) VALUES
(1, 'topmenu', 1, 1, 4, 0),
(2, 'footermenu', 2, 1, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `peanut_menu_translation`
--

CREATE TABLE IF NOT EXISTS `peanut_menu_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `peanut_menu_translation_sluggable_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `peanut_menu_translation`
--

INSERT INTO `peanut_menu_translation` (`id`, `name`, `lang`, `slug`) VALUES
(1, 'TopMenu', 'fr', 'topmenu'),
(2, 'FooterMenu', 'fr', 'footermenu');

-- --------------------------------------------------------

--
-- Structure de la table `peanut_seo`
--

CREATE TABLE IF NOT EXISTS `peanut_seo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_indexable` bigint(20) NOT NULL DEFAULT '1',
  `is_followable` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `peanut_seo`
--

INSERT INTO `peanut_seo` (`id`, `is_indexable`, `is_followable`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `peanut_seo_translation`
--

CREATE TABLE IF NOT EXISTS `peanut_seo_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(195) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `peanut_seo_translation`
--

INSERT INTO `peanut_seo_translation` (`id`, `title`, `description`, `keywords`, `lang`) VALUES
(1, '', '', '', 'fr'),
(2, '', '', '', 'fr'),
(3, '', '', '', 'fr'),
(4, '', '', '', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `peanut_settings`
--

CREATE TABLE IF NOT EXISTS `peanut_settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Contenu de la table `peanut_settings`
--

INSERT INTO `peanut_settings` (`id`, `name`, `value`) VALUES
(1, 'site_name', 'peanut2 i18n'),
(2, 'meteo', 'Paris, France'),
(3, 'society', 'La blackroom'),
(4, 'url', 'http://www.lablackroom.com'),
(5, 'adr', ''),
(6, 'tel', ''),
(7, 'geo', ''),
(8, 'google_mail', ''),
(9, 'google_password', ''),
(10, 'google_tracking', ''),
(11, 'google_guid_wt', ''),
(12, 'news_feed', 'https://github.com/pocky/peanut2/commits/master.atom'),
(13, 'meta_title', ''),
(14, 'meta_description', ''),
(15, 'meta_keywords', ''),
(16, 'meta_language', 'fr_FR'),
(17, 'meta_robots', 'index, follow'),
(18, 'lang', 'a:2:{s:4:"lang";a:1:{i:0;s:2:"FR";}s:4:"trad";s:9:"Français";}'),
(19, 'firstlang', 'FR'),
(20, 'contact_from', 'noreply@peanut2.local'),
(21, 'webmaster_name', 'webmaster'),
(22, 'webmaster_mail', 'webmaster@peanut2.local'),
(23, 'subject', 'Nouveau message de peanut2.local'),
(24, 'map_name', 'googlemap'),
(25, 'map_center', 'Paris'),
(26, 'map_address', '77 boulebard Exelmans 75016 Paris'),
(27, 'map_zoom', '13'),
(28, 'map_size', '512x288'),
(29, 'google_guid_ga', ''),
(30, 'domain_name', 'peanut.local');

-- --------------------------------------------------------

--
-- Structure de la table `peanut_xfn`
--

CREATE TABLE IF NOT EXISTS `peanut_xfn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `me` tinyint(1) DEFAULT '0',
  `friendship` longtext COLLATE utf8_unicode_ci,
  `physical` longtext COLLATE utf8_unicode_ci,
  `professional` longtext COLLATE utf8_unicode_ci,
  `geographical` longtext COLLATE utf8_unicode_ci,
  `family` longtext COLLATE utf8_unicode_ci,
  `romantic` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `peanut_xfn`
--

INSERT INTO `peanut_xfn` (`id`, `me`, `friendship`, `physical`, `professional`, `geographical`, `family`, `romantic`) VALUES
(1, 0, 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";'),
(2, 0, 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";'),
(3, 0, 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";', 's:0:"";');

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sf_guard_forgot_password`
--


-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', 'Le groupe des administrateurs', '2011-03-15 12:05:45', '2011-03-15 12:05:45'),
(2, 'Contributeurs', 'Groupe rassemblant les différents contributeurs au site Internet', '2011-08-17 15:36:57', '2012-03-07 11:47:37'),
(3, 'Rédacteurs', 'Groupe rassemblant les différents rédacteurs au site Internet', '2011-10-25 10:23:22', '2012-03-07 11:48:16');

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2011-10-24 16:01:27', '2011-10-24 16:01:27'),
(1, 5, '2011-10-24 16:01:27', '2011-10-24 16:01:27'),
(1, 6, '2011-10-24 16:01:27', '2011-10-24 16:01:27'),
(2, 2, '2011-10-24 16:01:35', '2011-10-24 16:01:35'),
(3, 3, '2012-03-07 11:48:16', '2012-03-07 11:48:16');

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Droit de lecture', 'Autorise l''accès aux articles en tant que lecteur', '2011-10-14 11:13:05', '2012-03-07 11:41:59'),
(2, 'Droit de contribution', 'Cette permission permet d''écrire des articles mais n''autorise pas la suppression ou l''interaction avec l''organisation générale du site', '2011-10-14 11:13:38', '2012-03-07 11:43:53'),
(3, 'Droit de rédaction', 'Cette permission autorise le rédacteur à interagir avec l''organisation éditoriale du site', '2011-10-21 00:00:00', '2012-03-07 11:44:48'),
(4, 'Droit de direction', 'Cette permission permet au dirigeant d''interagir avec certains paramètres de son site', '2011-10-14 11:19:40', '2012-03-07 11:45:27'),
(5, 'Webmaster du site', 'Cette permission est à destination du webmaster (interlocuteur technique)', '2011-10-14 11:17:32', '2011-10-20 16:12:18'),
(6, 'Accès à l''interface d''administration', 'Cette permission permet d''autoriser l''accès à l''interface d''administration', '2011-10-14 15:17:33', '2012-03-07 11:45:41');

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `algorithm` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Alexandre', 'Balmes', 'admin@peanut.local', 'admin', 'sha1', '3c3afa21a276fba177c831a322e70d50', '3839b69b30c4c941953544f3bcf25d1063f8d241', 1, 1, '2012-10-19 10:30:40', '2011-03-15 12:06:22', '2012-10-19 10:30:40');

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2011-10-25 10:08:12', '2011-10-25 10:08:12'),
(1, 3, '2011-10-25 10:23:36', '2011-10-25 10:23:36');

-- --------------------------------------------------------

--
-- Structure de la table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sf_guard_user_permission`
--

INSERT INTO `sf_guard_user_permission` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2012-03-07 11:49:36', '2012-03-07 11:49:36'),
(1, 2, '2012-03-07 11:49:36', '2012-03-07 11:49:36'),
(1, 3, '2012-03-07 11:49:36', '2012-03-07 11:49:36'),
(1, 4, '2011-10-24 16:03:00', '2011-10-24 16:03:03'),
(1, 5, '2011-10-21 17:03:00', '2011-10-21 17:03:00'),
(1, 6, '2011-10-21 17:05:00', '2011-10-21 17:05:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `peanut_item_translation`
--
ALTER TABLE `peanut_item_translation`
  ADD CONSTRAINT `peanut_item_translation_id_peanut_item_id` FOREIGN KEY (`id`) REFERENCES `peanut_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `peanut_menu_translation`
--
ALTER TABLE `peanut_menu_translation`
  ADD CONSTRAINT `peanut_menu_translation_id_peanut_menu_id` FOREIGN KEY (`id`) REFERENCES `peanut_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `peanut_seo_translation`
--
ALTER TABLE `peanut_seo_translation`
  ADD CONSTRAINT `peanut_seo_translation_id_peanut_seo_id` FOREIGN KEY (`id`) REFERENCES `peanut_seo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;
