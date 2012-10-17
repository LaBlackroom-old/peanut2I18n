-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 10 Octobre 2012 à 17:56
-- Version du serveur: 5.1.63
-- Version de PHP: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mh`
--

-- --------------------------------------------------------

--
-- Structure de la table `media_album`
--

CREATE TABLE IF NOT EXISTS `media_album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_album_position_sortable_idx` (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `media_album`
--


-- --------------------------------------------------------

--
-- Structure de la table `media_album_translation`
--

CREATE TABLE IF NOT EXISTS `media_album_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `media_album_translation_sluggable_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `media_album_translation`
--


-- --------------------------------------------------------

--
-- Structure de la table `media_object`
--

CREATE TABLE IF NOT EXISTS `media_object` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `album` bigint(20) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_object_position_sortable_idx` (`position`,`album`),
  KEY `media_object_type_idx` (`type`),
  KEY `album_idx` (`album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `media_object`
--


-- --------------------------------------------------------

--
-- Structure de la table `media_object_translation`
--

CREATE TABLE IF NOT EXISTS `media_object_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `alternative` text COLLATE utf8_unicode_ci,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `media_object_translation_sluggable_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `media_object_translation`
--


-- --------------------------------------------------------

--
-- Structure de la table `nd_categories`
--

CREATE TABLE IF NOT EXISTS `nd_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `root_id` bigint(20) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `level` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `nd_categories`
--


-- --------------------------------------------------------

--
-- Structure de la table `nd_categories_translation`
--

CREATE TABLE IF NOT EXISTS `nd_categories_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `nd_categories_translation_sluggable_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nd_categories_translation`
--


-- --------------------------------------------------------

--
-- Structure de la table `nd_portfolio`
--

CREATE TABLE IF NOT EXISTS `nd_portfolio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album` bigint(20) DEFAULT NULL,
  `category` bigint(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` bigint(20) DEFAULT NULL,
  `seo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nd_portfolio_position_sortable_idx` (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `nd_portfolio`
--


-- --------------------------------------------------------

--
-- Structure de la table `nd_portfolio_translation`
--

CREATE TABLE IF NOT EXISTS `nd_portfolio_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `nd_portfolio_translation_sluggable_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nd_portfolio_translation`
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
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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

INSERT INTO `peanut_item` (`id`, `type`, `menu`, `author`, `status`, `url`, `relation`, `created_at`, `updated_at`, `position`, `seo_id`) VALUES
(1, 'page', 1, 1, 'publish', NULL, NULL, '2011-04-04 00:00:00', '2011-06-15 23:18:22', 1, 1),
(2, 'link', 1, 1, 'draft', 'http://www.google.com', 1, '2011-04-04 00:00:00', '2011-06-15 23:18:29', 2, 2),
(3, 'link', 2, 1, 'draft', 'http://www.peanut.fr', 2, '2011-04-04 00:00:00', '2011-06-15 23:18:37', 1, 3),
(4, 'link', 2, 1, 'draft', 'http://www.github.com/pocky', 3, '2011-04-12 00:00:00', '2011-06-15 23:18:40', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `peanut_item_translation`
--

CREATE TABLE IF NOT EXISTS `peanut_item_translation` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `excerpt` longtext COLLATE utf8_unicode_ci,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`),
  UNIQUE KEY `peanut_item_translation_sluggable_idx` (`slug`,`lang`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `peanut_item_translation`
--

INSERT INTO `peanut_item_translation` (`id`, `title`, `content`, `excerpt`, `lang`, `slug`) VALUES
(1, 'Accueil', '<p>\r\n	Bonjour à tous,</p>\r\n<p>\r\n	Vous trouverez ici une démonstration des différents modules de peanut à travers leurs fonctionnalités. Le moteur est actuellement à considérer en version 4.1.1 et subit un refactoring complet. peanut est proposé sous la license MIT permettant à tous de modifier le code, exploiter le code et même changer de license sans contraintes.</p>\r\n<p>\r\n	peanut possède un backoffice complet, accessible avec identifiant et mot de passe permettant à tous, même néophyte, de pouvoir exploiter un site Internet. Chacun des modules est également présenté, documenté et testé afin de garantir un bon fonctionnement.</p>\r\n<p>\r\n	L&#39;ensemble du code est accessible en libre téléchargement sur le repository GIT du projet. Vous pouvez également suivre l&#39;évolution de peanut à travers le blog de l&#39;auteur. Enfin, peanut est livré en l&#39;état, sans garantie de fonctionnement et/ou de fiabilité. Cela n&#39;empêche cependant pas de faire de mon mieux pour ne pas livrer quelque chose d&#39;inutilisable.</p>\r\n<p>\r\n	Bien entendu, cette démonstration s&#39;agrémentera de fonctionnalités avec le temps alors en attendant, n&#39;hésitez pas à explorer le code !</p>\r\n', '', 'en', 'accueil'),
(2, 'contact', '', NULL, 'en', 'contact'),
(3, 'peanut.fr', '', NULL, 'en', 'peanut'),
(4, 'github', '', NULL, 'en', 'github');

-- --------------------------------------------------------

--
-- Structure de la table `peanut_menu`
--

CREATE TABLE IF NOT EXISTS `peanut_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `root_id` bigint(20) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `level` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `peanut_menu`
--

INSERT INTO `peanut_menu` (`id`, `root_id`, `lft`, `rgt`, `level`) VALUES
(1, 1, 1, 4, 0),
(2, 2, 1, 2, 0);

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
(1, 'TopMenu', 'en', 'topmenu'),
(2, 'FooterMenu', 'en', 'footermenu');

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
(1, '', '', '', 'en'),
(2, '', '', '', 'en'),
(3, '', '', '', 'en'),
(4, '', '', '', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `peanut_settings`
--

CREATE TABLE IF NOT EXISTS `peanut_settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `peanut_settings`
--

INSERT INTO `peanut_settings` (`id`, `name`, `value`) VALUES
(1, 'site_name', 'peanut'),
(2, 'meteo', 'Paris, France'),
(3, 'society', 'La blackroom'),
(4, 'url', 'http://www.lablackroom.com'),
(5, 'adr', ''),
(6, 'tel', ''),
(7, 'geo', ''),
(8, 'google_mail', ''),
(9, 'google_password', ''),
(10, 'google_tracking', ''),
(11, 'google_guid', ''),
(12, 'news_feed', 'https://github.com/pocky/peanut2/commits/master.atom'),
(13, 'meta_title', ''),
(14, 'meta_description', ''),
(15, 'meta_keywords', ''),
(16, 'meta_language', 'fr_FR'),
(17, 'meta_robots', 'index, follow'),
(18, 'lang', ''),
(19, 'firstlang', 'FR'),
(20, 'project_per_page', '2'),
(21, 'interface', 'a:2:{s:5:"title";s:18:"Peanut2 Revolution";s:5:"color";s:7:"#f0017a";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', 'Le groupe des administrateurs', '2011-03-15 12:05:45', '2011-03-15 12:05:45');

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
(1, 1, '2011-03-15 12:05:45', '2011-03-15 12:05:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'La permissions permettant d''accéder au backoffice', '2011-03-15 12:04:12', '2011-03-15 12:04:12');

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
(1, 'Alexandre', 'Balmes', 'admin@peanut.local', 'admin', 'sha1', 'baba31155ff078e4a869d7e2c88c8cca', '5cf270d479fe4ab2cc747e704e68e572850caee7', 1, 1, '2012-10-10 17:53:35', '2011-03-15 12:06:22', '2012-10-10 17:53:35');

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
(1, 1, '2011-03-15 12:06:22', '2011-03-15 12:06:22');

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
(1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_triple` tinyint(1) DEFAULT NULL,
  `triple_namespace` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `triple_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `triple_value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name_idx` (`name`),
  KEY `triple1_idx` (`triple_namespace`),
  KEY `triple2_idx` (`triple_key`),
  KEY `triple3_idx` (`triple_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tag`
--


-- --------------------------------------------------------

--
-- Structure de la table `tagging`
--

CREATE TABLE IF NOT EXISTS `tagging` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) NOT NULL,
  `taggable_model` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taggable_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_idx` (`tag_id`),
  KEY `taggable_idx` (`taggable_model`,`taggable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tagging`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `media_album_translation`
--
ALTER TABLE `media_album_translation`
  ADD CONSTRAINT `media_album_translation_id_media_album_id` FOREIGN KEY (`id`) REFERENCES `media_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media_object`
--
ALTER TABLE `media_object`
  ADD CONSTRAINT `media_object_album_media_album_id` FOREIGN KEY (`album`) REFERENCES `media_album` (`id`);

--
-- Contraintes pour la table `media_object_translation`
--
ALTER TABLE `media_object_translation`
  ADD CONSTRAINT `media_object_translation_id_media_object_id` FOREIGN KEY (`id`) REFERENCES `media_object` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `nd_categories_translation`
--
ALTER TABLE `nd_categories_translation`
  ADD CONSTRAINT `nd_categories_translation_id_nd_categories_id` FOREIGN KEY (`id`) REFERENCES `nd_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `nd_portfolio_translation`
--
ALTER TABLE `nd_portfolio_translation`
  ADD CONSTRAINT `nd_portfolio_translation_id_nd_portfolio_id` FOREIGN KEY (`id`) REFERENCES `nd_portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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