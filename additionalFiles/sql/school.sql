-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 sep. 2018 à 14:21
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `school`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendars`
--

DROP TABLE IF EXISTS `calendars`;
CREATE TABLE IF NOT EXISTS `calendars` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_all_day` tinyint(1) NOT NULL DEFAULT '0',
  `background_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000',
  `repeated` tinyint(1) NOT NULL DEFAULT '0',
  `holiday` tinyint(1) NOT NULL DEFAULT '0',
  `repeated_type` tinyint(3) UNSIGNED DEFAULT '0',
  `role` tinyint(4) NOT NULL,
  `end_repeated_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `calendar_teatchification`
--

DROP TABLE IF EXISTS `calendar_teatchification`;
CREATE TABLE IF NOT EXISTS `calendar_teatchification` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teatchification_id` int(10) UNSIGNED NOT NULL,
  `calendar_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calendar_teatchification_teatchification_id_index` (`teatchification_id`),
  KEY `calendar_teatchification_calendar_id_index` (`calendar_id`),
  KEY `calendar_teatchification_year_id_index` (`year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `callings`
--

DROP TABLE IF EXISTS `callings`;
CREATE TABLE IF NOT EXISTS `callings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `required` tinyint(1) NOT NULL,
  `caller_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `object` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time1` datetime NOT NULL,
  `time2` datetime NOT NULL,
  `time3` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `agree` tinyint(1) NOT NULL DEFAULT '0',
  `timeChoosenComming` tinyint(4) DEFAULT NULL,
  `otherTimeComming` datetime DEFAULT NULL,
  `disagrement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `terminated` tinyint(1) NOT NULL DEFAULT '0',
  `result` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `callings_caller_id_index` (`caller_id`),
  KEY `callings_parent_id_index` (`parent_id`),
  KEY `callings_year_id_index` (`year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categoryships`
--

DROP TABLE IF EXISTS `categoryships`;
CREATE TABLE IF NOT EXISTS `categoryships` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categoryships`
--

INSERT INTO `categoryships` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Père', NULL, NULL),
(2, 'Mère', NULL, NULL),
(3, 'Grand Père', NULL, NULL),
(4, 'Grand Mère', NULL, NULL),
(5, 'Tante', NULL, NULL),
(6, 'Oncle', NULL, NULL),
(7, 'Frère', NULL, NULL),
(8, 'Soeur', NULL, NULL),
(9, 'Cousin', NULL, NULL),
(10, 'Cousine', NULL, NULL),
(11, 'Autre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameSetting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `configs`
--

INSERT INTO `configs` (`id`, `slug`, `nameSetting`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site-name', 'site name', 'Fatima Azzahrae', 'text', '2018-09-02 11:52:43', NULL),
(2, 'description', 'Description', 'C\'est un site pour la gestion d\'ecole fatima azzahrae à Allal tazi', 'textarea', '2018-09-02 11:52:43', NULL),
(3, 'licence', 'licence', '012/042', 'text', '2018-09-02 11:52:43', NULL),
(4, 'company', 'company', 'Fatima Azzahrae', 'text', '2018-09-02 11:52:43', NULL),
(5, 'by', 'by', 'Idda tech', 'text', '2018-09-02 11:52:43', NULL),
(6, 'url-by', 'company', 'https://it2018.wixsite.com/it18', 'url', '2018-09-02 11:52:43', NULL),
(7, 'mobile-number', 'phone number', '+212 06 63 22 60 32', 'tel', '2018-09-02 11:52:43', NULL),
(8, 'fix-number', 'fix number', '+212 06 69 48 93 69', 'tel', '2018-09-02 11:52:43', NULL),
(9, 'adress', 'adress', 'N°211 Lot el houda', 'textarea', '2018-09-02 11:52:43', NULL),
(10, 'city', 'city', 'Allal tazi', 'text', '2018-09-02 11:52:43', NULL),
(11, 'zip_code', 'zip code', '14052', 'text', '2018-09-02 11:52:43', NULL),
(12, 'email', 'Adress email', 'fatimaazzahraeschool@gmail.com', 'email', '2018-09-02 11:52:43', NULL),
(13, 'youtube', 'Youtube chanel', 'UClZ8x36HHgUlaCGAKmixxEg', 'text', '2018-09-02 11:52:43', NULL),
(14, 'twitter', 'Twitter account', 'FatimaAzzahrae6v', 'text', '2018-09-02 11:52:43', NULL),
(15, 'facebook', 'Facebook Page', 'Fatima-azzahrae-185877205288816', 'text', '2018-09-02 11:52:43', NULL),
(16, 'github', 'Git account', 'git', 'text', '2018-09-02 11:52:43', NULL),
(17, 'google-plus', 'Google account', 'Fatima-azzahrae-185877205288816', 'text', '2018-09-02 11:52:43', NULL),
(18, 'lat', 'Latitude', '34,521380', 'text', '2018-09-02 11:52:43', NULL),
(19, 'lng', 'Langitude', '-6,323930', 'text', '2018-09-02 11:52:43', NULL),
(20, 'paypal', 'Paypal account', 'paypal', 'text', '2018-09-02 11:52:43', NULL),
(21, 'tags', 'Tags', 'tag1|tag2', 'textarea', '2018-09-02 11:52:43', NULL),
(22, 'no-image', 'No image', 'no-image.jpg', 'file', '2018-09-02 11:52:43', NULL),
(23, 'logo', 'Logo', '1535440397_logo.png', 'file', '2018-09-02 11:52:43', NULL),
(24, 'test-language', 'Test Language', 'ar-TN', 'text', '2018-09-02 11:52:43', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaser_text` text COLLATE utf8mb4_unicode_ci,
  `teaser_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teaser_type` tinyint(4) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_created_by_index` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `courseyearsubclasses`
--

DROP TABLE IF EXISTS `courseyearsubclasses`;
CREATE TABLE IF NOT EXISTS `courseyearsubclasses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED DEFAULT NULL,
  `teatcher_id` int(10) UNSIGNED DEFAULT NULL,
  `req_publish` tinyint(1) NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courseyearsubclasses_subject_the_class_id_index` (`subject_the_class_id`),
  KEY `courseyearsubclasses_subject_id_index` (`subject_id`),
  KEY `courseyearsubclasses_the_class_id_index` (`the_class_id`),
  KEY `courseyearsubclasses_course_id_index` (`course_id`),
  KEY `courseyearsubclasses_year_id_index` (`year_id`),
  KEY `courseyearsubclasses_teatcher_id_index` (`teatcher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `course_subcourse`
--

DROP TABLE IF EXISTS `course_subcourse`;
CREATE TABLE IF NOT EXISTS `course_subcourse` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int(10) UNSIGNED NOT NULL,
  `subcourse_id` int(10) UNSIGNED NOT NULL,
  `sorting` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_subcourse_course_id_index` (`course_id`),
  KEY `course_subcourse_subcourse_id_index` (`subcourse_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demandefournitures`
--

DROP TABLE IF EXISTS `demandefournitures`;
CREATE TABLE IF NOT EXISTS `demandefournitures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fourniture_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `howmany` smallint(5) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `totalmoney` double(8,2) UNSIGNED NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demandefournitures_fourniture_id_index` (`fourniture_id`),
  KEY `demandefournitures_parent_id_index` (`parent_id`),
  KEY `demandefournitures_student_id_index` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etages`
--

DROP TABLE IF EXISTS `etages`;
CREATE TABLE IF NOT EXISTS `etages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etages_number_unique` (`number`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etages`
--

INSERT INTO `etages` (`id`, `number`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, NULL),
(2, 1, NULL, NULL),
(3, 2, NULL, NULL),
(4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fourniturations`
--

DROP TABLE IF EXISTS `fourniturations`;
CREATE TABLE IF NOT EXISTS `fourniturations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `the_class_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `fourniture_id` int(10) UNSIGNED NOT NULL,
  `exist` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fourniturations_the_class_id_index` (`the_class_id`),
  KEY `fourniturations_year_id_index` (`year_id`),
  KEY `fourniturations_student_id_index` (`student_id`),
  KEY `fourniturations_fourniture_id_index` (`fourniture_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournitures`
--

DROP TABLE IF EXISTS `fournitures`;
CREATE TABLE IF NOT EXISTS `fournitures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` tinyint(1) NOT NULL,
  `average_price` double(8,2) DEFAULT NULL,
  `got` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournitures`
--

INSERT INTO `fournitures` (`id`, `name`, `additional_info`, `for`, `required`, `average_price`, `got`, `created_at`, `updated_at`) VALUES
(1, 'Stylo bleu', NULL, 'Ecriture', 1, 1.50, 100, NULL, NULL),
(2, 'Stylo vert', NULL, 'Ecriture', 1, 1.50, 1000, NULL, NULL),
(3, 'Stylo noire', NULL, 'Ecriture', 0, 1.50, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fourniture_the_class`
--

DROP TABLE IF EXISTS `fourniture_the_class`;
CREATE TABLE IF NOT EXISTS `fourniture_the_class` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fourniture_id` int(10) UNSIGNED NOT NULL,
  `the_class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fourniture_the_class_fourniture_id_index` (`fourniture_id`),
  KEY `fourniture_the_class_the_class_id_index` (`the_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_link` int(10) UNSIGNED NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden_note` text COLLATE utf8mb4_unicode_ci,
  `by_admin` int(10) UNSIGNED DEFAULT NULL,
  `by-user` int(10) UNSIGNED DEFAULT NULL,
  `by-exterior-name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `by-exterior-info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `category_history_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `histories_by_admin_index` (`by_admin`),
  KEY `histories_by_user_index` (`by-user`),
  KEY `histories_category_history_id_index` (`category_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `history_categories`
--

DROP TABLE IF EXISTS `history_categories`;
CREATE TABLE IF NOT EXISTS `history_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `history_categories`
--

INSERT INTO `history_categories` (`id`, `name`, `model`, `icon`, `kind`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Payement d\'un éleve ( + avec un benefits):', 'User', 'money-bill-alt', 2, 4, NULL, NULL),
(2, 'Enregistrement d\'un éleve :', 'User', 'graduation-cap', 1, 4, NULL, NULL),
(3, 'Enregistrement d\'un parent:', 'User', 'user-plus', 1, 4, NULL, NULL),
(4, 'Enregistrement d\'un Maitre:', 'User', 'user-plus', 1, 4, NULL, NULL),
(5, 'Enregistrement d\'un Secretaire:', 'User', 'user-plus', 1, 5, NULL, NULL),
(6, 'Enregistrement d\'un Administrateur:', 'User', 'user-plus', 1, 6, NULL, NULL),
(7, 'Enregistrement d\'un Master:', 'User', 'user-plus', 1, 6, NULL, NULL),
(8, 'Payement effectuée pour un Maitre: ( - avec une deficit)', 'User', 'user-plus', 0, 4, NULL, NULL),
(9, 'Payement effectuée pour un Secretaire: ( - avec une deficit)', 'User', 'user-plus', 0, 5, NULL, NULL),
(10, 'Payement effectuée pour un Administrateur: ( - avec une deficit)', 'User', 'user-plus', 0, 6, NULL, NULL),
(11, 'Payement effectuée pour un Master: ( - avec une deficit)', 'User', 'user-plus', 0, 6, NULL, NULL),
(12, 'Ajout dune matiére:', 'Subject', 'edit', 1, 3, NULL, NULL),
(13, 'Liaison dune matiére avec une class:', 'Subject', 'edit', 1, 1, NULL, NULL),
(14, 'Payement d\'un éleve ( - avec une deficit):', 'User', 'money-bill-alt', 0, 4, NULL, NULL),
(15, 'Payement d\'un éleve ( 0 ):', 'User', 'money-bill-alt', 1, 4, NULL, NULL),
(16, 'Payement effectuée pour un Maitre: ( + avec un benefits)', 'User', 'user-plus', 2, 4, NULL, NULL),
(17, 'Payement effectuée pour un Secretaire: ( + avec un benefits)', 'User', 'user-plus', 2, 5, NULL, NULL),
(18, 'Payement effectuée pour un Administrateur: ( + avec un benefits)', 'User', 'user-plus', 2, 6, NULL, NULL),
(19, 'Payement effectuée pour un Master: ( + avec un benefits)', 'User', 'user-plus', 2, 6, NULL, NULL),
(20, 'Payement effectuée pour un Maitre: ( 0 )', 'User', 'user-plus', 1, 4, NULL, NULL),
(21, 'Payement effectuée pour un Secretaire: ( 0 )', 'User', 'user-plus', 1, 5, NULL, NULL),
(22, 'Payement effectuée pour un Administrateur: ( 0 )', 'User', 'user-plus', 1, 6, NULL, NULL),
(23, 'Payement effectuée pour un Master: ( 0 )', 'User', 'user-plus', 1, 6, NULL, NULL),
(24, 'Un test a était a jouté:', 'Test', 'file', 1, 3, NULL, NULL),
(25, 'Un test a était a linké a une class et une matiére:', 'Test', 'file', 1, 1, NULL, NULL),
(26, 'Liaison dune fourniture avec une class:', 'Fourniture', 'edit', 1, 1, NULL, NULL),
(27, 'Un cours a était ajouté:', 'Course', 'book', 1, 1, NULL, NULL),
(28, 'Un subcour a etait crée est ajouté a un coure:', 'Subcourse', 'book', 1, 1, NULL, NULL),
(29, 'Un subcour a etait linké a un coure:', 'Subcourse', 'book', 1, 1, NULL, NULL),
(30, 'Un subcour a etait linké a un coure:', 'Teatchification', 'pen', 1, 1, NULL, NULL),
(31, 'Une demande a etait effectué:', 'Demande', 'angle-double-right', 1, 2, NULL, NULL),
(32, 'Une demande a etait Accepté:', 'Demande', 'check', 2, 1, NULL, NULL),
(33, 'Une Emploi du temps a etait linké maitre - matiére:', 'Calendarteatchification', 'calendar', 1, 1, NULL, NULL),
(34, 'Une Emploi du temps a etait créé:', 'Calendar', 'calendar', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `meetingpopulatingratings`
--

DROP TABLE IF EXISTS `meetingpopulatingratings`;
CREATE TABLE IF NOT EXISTS `meetingpopulatingratings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meetingpopulating_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetingpopulatingratings_meetingpopulating_id_index` (`meetingpopulating_id`),
  KEY `meetingpopulatingratings_user_id_index` (`user_id`),
  KEY `meetingpopulatingratings_rating_id_index` (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `meetingpopulatings`
--

DROP TABLE IF EXISTS `meetingpopulatings`;
CREATE TABLE IF NOT EXISTS `meetingpopulatings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(10) UNSIGNED DEFAULT NULL,
  `invited_id` int(10) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `present` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetingpopulatings_meeting_id_index` (`meeting_id`),
  KEY `meetingpopulatings_creator_id_index` (`creator_id`),
  KEY `meetingpopulatings_invited_id_index` (`invited_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
CREATE TABLE IF NOT EXISTS `meetings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meetingtype_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetings_meetingtype_id_index` (`meetingtype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `meetingtypes`
--

DROP TABLE IF EXISTS `meetingtypes`;
CREATE TABLE IF NOT EXISTS `meetingtypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `meetingtypes_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_15_225009_create_the_classes_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_04_12_133049_create_configs_table', 1),
(5, '2018_04_13_074932_create_ratings_table', 1),
(6, '2018_04_17_103528_create_months_table', 1),
(7, '2018_04_17_141418_create_years_table', 1),
(8, '2018_04_21_194638_create_students_payments_table', 1),
(9, '2018_04_22_140221_create_history_categories_table', 1),
(10, '2018_04_23_115924_create_histories_table', 1),
(11, '2018_05_08_154038_create_categoryships_table', 1),
(12, '2018_05_09_152854_create_relashionships_table', 1),
(13, '2018_05_13_133640_create_userspayments_table', 1),
(14, '2018_05_16_090507_create_subjects_table', 1),
(15, '2018_05_16_090906_create_subject_the_class_table', 1),
(16, '2018_05_16_090908_create_tests_table', 1),
(17, '2018_05_16_090910_create_testyearsubclasses_table', 1),
(18, '2018_05_17_090909_create_notes_table', 1),
(19, '2018_05_28_074912_create_fournitures_table', 1),
(20, '2018_05_28_091346_create_fourniture_the_class_table', 1),
(21, '2018_05_31_055159_create_fourniturations_table', 1),
(22, '2018_06_05_060934_create_rooms_table', 1),
(23, '2018_06_05_120946_create_observations_table', 1),
(24, '2018_06_05_121152_create_courses_table', 1),
(25, '2018_06_05_121424_create_courseyearsubclasses_table', 1),
(26, '2018_06_05_130937_create_objcts_table', 1),
(27, '2018_06_05_230221_create_calendars_table', 1),
(28, '2018_06_11_143200_create_callings_table', 1),
(29, '2018_06_12_070441_create_meetingtypes_table', 1),
(30, '2018_06_13_070112_create_meetings_table', 1),
(31, '2018_06_13_070251_create_meetingpopulatings_table', 1),
(32, '2018_06_13_075901_create_meetingpopulating_rating_table', 1),
(33, '2018_06_13_090919_create_subcourses_table', 1),
(34, '2018_07_07_201520_create_course_subcourse_table', 1),
(35, '2018_07_16_030120_create_schoolconfigs_table', 1),
(36, '2018_07_28_174014_create_teatchifications_table', 1),
(37, '2018_08_01_055908_create_demandefournitures_table', 1),
(38, '2018_08_04_020638_create_calendar_teatchification_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE IF NOT EXISTS `months` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `months`
--

INSERT INTO `months` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'January', NULL, NULL),
(2, 'February', NULL, NULL),
(3, 'March', NULL, NULL),
(4, 'April', NULL, NULL),
(5, 'May', NULL, NULL),
(6, 'June', NULL, NULL),
(7, 'July', NULL, NULL),
(8, 'August', NULL, NULL),
(9, 'September', NULL, NULL),
(10, 'October', NULL, NULL),
(11, 'November', NULL, NULL),
(12, 'December', NULL, NULL),
(13, 'Enregistrement', NULL, NULL),
(14, 'Assurance', NULL, NULL),
(15, 'Assurance trasport', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `testyearsubclass_id` int(10) UNSIGNED DEFAULT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `teatcher_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `test_passed_fine` tinyint(1) NOT NULL DEFAULT '0',
  `note` double(8,2) DEFAULT NULL,
  `done_minutes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notes_testyearsubclass_id_index` (`testyearsubclass_id`),
  KEY `notes_year_id_index` (`year_id`),
  KEY `notes_the_class_id_index` (`the_class_id`),
  KEY `notes_subject_id_index` (`subject_id`),
  KEY `notes_subject_the_class_id_index` (`subject_the_class_id`),
  KEY `notes_teatcher_id_index` (`teatcher_id`),
  KEY `notes_student_id_index` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objcts`
--

DROP TABLE IF EXISTS `objcts`;
CREATE TABLE IF NOT EXISTS `objcts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `state` tinyint(4) NOT NULL,
  `objctype_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `objcts_objctype_id_index` (`objctype_id`),
  KEY `objcts_room_id_index` (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objctypes`
--

DROP TABLE IF EXISTS `objctypes`;
CREATE TABLE IF NOT EXISTS `objctypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `objctypes_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `objctypes`
--

INSERT INTO `objctypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Table deux personne', NULL, NULL),
(2, 'Tableaux noire', NULL, NULL),
(3, 'Imprimante canon ir2420', NULL, NULL),
(4, 'Chaise blanche', NULL, NULL),
(5, 'Buraux', NULL, NULL),
(6, 'Chaise de fer', NULL, NULL),
(7, 'Histoire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `observations`
--

DROP TABLE IF EXISTS `observations`;
CREATE TABLE IF NOT EXISTS `observations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `observer_id` int(10) UNSIGNED NOT NULL,
  `observed_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `observations_observer_id_index` (`observer_id`),
  KEY `observations_observed_id_index` (`observed_id`),
  KEY `observations_year_id_index` (`year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `star` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ratings_star_unique` (`star`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `star`, `created_at`, `updated_at`) VALUES
(1, 0.00, NULL, NULL),
(2, 0.50, NULL, NULL),
(3, 1.00, NULL, NULL),
(4, 1.50, NULL, NULL),
(5, 2.00, NULL, NULL),
(6, 2.50, NULL, NULL),
(7, 3.00, NULL, NULL),
(8, 3.50, NULL, NULL),
(9, 4.00, NULL, NULL),
(10, 4.50, NULL, NULL),
(11, 5.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `relashionships`
--

DROP TABLE IF EXISTS `relashionships`;
CREATE TABLE IF NOT EXISTS `relashionships` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `categoryship_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relashionships_student_id_index` (`student_id`),
  KEY `relashionships_parent_id_index` (`parent_id`),
  KEY `relashionships_categoryship_id_index` (`categoryship_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `roomtype_id` int(10) UNSIGNED NOT NULL,
  `etage_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_roomtype_id_index` (`roomtype_id`),
  KEY `rooms_etage_id_index` (`etage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roomtypes`
--

DROP TABLE IF EXISTS `roomtypes`;
CREATE TABLE IF NOT EXISTS `roomtypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roomtypes_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toilette', NULL, NULL),
(2, 'Class', NULL, NULL),
(3, 'Bureau', NULL, NULL),
(4, 'Bibliothéque', NULL, NULL),
(5, 'Sale de sport', NULL, NULL),
(6, 'Salle de recreation', NULL, NULL),
(7, 'Buffet', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `schoolconfigs`
--

DROP TABLE IF EXISTS `schoolconfigs`;
CREATE TABLE IF NOT EXISTS `schoolconfigs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameSetting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schoolconfigs`
--

INSERT INTO `schoolconfigs` (`id`, `slug`, `nameSetting`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'price-month-primary', 'Price monthly for primary school', '350', 'number', '2018-09-02 11:52:43', NULL),
(2, 'price-saving-primary', 'Price saving for primary school', '250', 'number', '2018-09-02 11:52:43', NULL),
(3, 'price-assurence-primary', 'Price assurence for primary school', '250', 'number', '2018-09-02 11:52:43', NULL),
(4, 'min-price-monthly-trans', 'Price minimum monthly for transport', '200', 'number', '2018-09-02 11:52:43', NULL),
(5, 'min-price-assurence-trans', 'Price minimum assurence for transport', '200', 'number', '2018-09-02 11:52:43', NULL),
(6, 'price-add-courses', 'Price  for additional courses', '100', 'number', '2018-09-02 11:52:43', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `students_payments`
--

DROP TABLE IF EXISTS `students_payments`;
CREATE TABLE IF NOT EXISTS `students_payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `the_class_id` int(10) UNSIGNED NOT NULL,
  `month_id` int(10) UNSIGNED NOT NULL,
  `should_pay` int(11) NOT NULL DEFAULT '350',
  `transport_pay` int(11) NOT NULL DEFAULT '0',
  `add_classes_pay` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `payment_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_payments_user_id_index` (`user_id`),
  KEY `students_payments_year_id_index` (`year_id`),
  KEY `students_payments_the_class_id_index` (`the_class_id`),
  KEY `students_payments_month_id_index` (`month_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subcourses`
--

DROP TABLE IF EXISTS `subcourses`;
CREATE TABLE IF NOT EXISTS `subcourses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `language` tinyint(4) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `finishing_time` int(11) NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_grasp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, NULL),
(2, 'Informatique', NULL, NULL),
(3, 'Sport', NULL, NULL),
(4, 'Mathématique', NULL, NULL),
(5, 'الرياضيات', NULL, NULL),
(6, 'التربية الفنية', NULL, NULL),
(7, 'النشاط العلمي', NULL, NULL),
(8, 'التربية الإسلامية', NULL, NULL),
(9, 'اللغة العربية - القراءة', NULL, NULL),
(10, 'اللغة العربية - الإملاء', NULL, NULL),
(11, 'اللغة العربية - الشكل', NULL, NULL),
(12, 'اللغة العربية - التراكيب', NULL, NULL),
(13, 'اللغة العربية - الصرف والتحويل', NULL, NULL),
(14, 'اللغة العربية - فهم المقروء', NULL, NULL),
(15, 'اللغة العربية - إنشاء', NULL, NULL),
(16, 'الاجتماعيات - التاريخ', NULL, NULL),
(17, 'الاجتماعيات - الجغرافية', NULL, NULL),
(18, 'الاجتماعيات - التربية على المواطنة', NULL, NULL),
(19, 'Français - Activités de prod. écrite', NULL, NULL),
(20, 'Français - Lexique', NULL, NULL),
(21, 'Français - Grammaire', NULL, NULL),
(22, 'Français - Conjugaison', NULL, NULL),
(23, 'Français - Orthographe/Dictée', NULL, NULL),
(24, 'Français - Activités de Lecture', NULL, NULL),
(25, 'Français - communication et actes de langage', NULL, NULL),
(26, 'Français - Poésie/lecture/diction', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `subject_the_class`
--

DROP TABLE IF EXISTS `subject_the_class`;
CREATE TABLE IF NOT EXISTS `subject_the_class` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `the_class_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `parameter` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_the_class_subject_id_index` (`subject_id`),
  KEY `subject_the_class_the_class_id_index` (`the_class_id`),
  KEY `subject_the_class_year_id_index` (`year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `teatchifications`
--

DROP TABLE IF EXISTS `teatchifications`;
CREATE TABLE IF NOT EXISTS `teatchifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_the_class_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teatchifications_subject_the_class_id_index` (`subject_the_class_id`),
  KEY `teatchifications_user_id_index` (`user_id`),
  KEY `teatchifications_year_id_index` (`year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `answers` text DEFAULT NULL,
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `time_minutes` int(10) UNSIGNED NOT NULL DEFAULT '60',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tests_title_unique` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `testyearsubclasses`
--

DROP TABLE IF EXISTS `testyearsubclasses`;
CREATE TABLE IF NOT EXISTS `testyearsubclasses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `test_id` int(10) UNSIGNED DEFAULT NULL,
  `year_id` int(10) UNSIGNED DEFAULT NULL,
  `teatcher_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `req_publish` tinyint(1) NOT NULL DEFAULT '0',
  `end` date DEFAULT NULL,
  `navigator` tinyint(1) NOT NULL DEFAULT '1',
  `is_exercise` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testyearsubclasses_subject_the_class_id_index` (`subject_the_class_id`),
  KEY `testyearsubclasses_subject_id_index` (`subject_id`),
  KEY `testyearsubclasses_the_class_id_index` (`the_class_id`),
  KEY `testyearsubclasses_test_id_index` (`test_id`),
  KEY `testyearsubclasses_year_id_index` (`year_id`),
  KEY `testyearsubclasses_teatcher_id_index` (`teatcher_id`),
  KEY `testyearsubclasses_course_id_index` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `the_classes`
--

DROP TABLE IF EXISTS `the_classes`;
CREATE TABLE IF NOT EXISTS `the_classes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `the_classes`
--

INSERT INTO `the_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CP-1', NULL, NULL),
(2, 'CE1-1', NULL, NULL),
(3, 'CE2-1', NULL, NULL),
(4, 'CM1-1', NULL, NULL),
(5, 'CmM2-1', NULL, NULL),
(6, 'CE6-1', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `num` int(10) UNSIGNED DEFAULT NULL,
  `massarid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arabic_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arabic_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` double(8,2) NOT NULL DEFAULT '0.00',
  `the_class_id` int(10) UNSIGNED DEFAULT NULL,
  `transport` tinyint(1) NOT NULL DEFAULT '0',
  `additional_classes` tinyint(1) NOT NULL DEFAULT '0',
  `fill_payment` tinyint(1) NOT NULL DEFAULT '0',
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_situation` tinyint(1) DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnss` tinyint(1) DEFAULT NULL,
  `cnss_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_num_unique` (`num`),
  UNIQUE KEY `users_massarid_unique` (`massarid`),
  KEY `users_the_class_id_index` (`the_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `num`, `massarid`, `name`, `last_name`, `arabic_name`, `arabic_last_name`, `gender`, `birth_date`, `birth_place`, `city`, `zip_code`, `adress`, `phone`, `phone2`, `phone3`, `fix`, `facebook`, `whatsapp`, `email`, `password`, `img`, `role`, `the_class_id`, `transport`, `additional_classes`, `fill_payment`, `cin`, `profession`, `family_situation`, `cv`, `cnss`, `cnss_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'master', 'amine', NULL, NULL, 1, '2018-09-02', 'rabat', 'rabat', '14000', 'kenitra', '0606060606', '0606060606', '0606060606', '0606060606', NULL, NULL, 'master@app.com', '$2y$10$53M7AKTYO3gRK3CMRWhQfOnuAcJMA6ee/NdVvmkJlrBfub3VUSMoW', 'profile.png', 6.00, NULL, 0, 0, 0, 'G620912', NULL, NULL, NULL, 1, 'CNSS11111', 'TLsulaW0iv', NULL, NULL),
(7, NULL, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@app.com', '$2y$10$4u8pR44AwKR5HEnPfy6c4.577nmxjkG5ZOczXbPm4vvRIa8y7oBcC', 'profile.png', 0.00, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'RovJ64PaRw', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `userspayments`
--

DROP TABLE IF EXISTS `userspayments`;
CREATE TABLE IF NOT EXISTS `userspayments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `month_id` int(10) UNSIGNED NOT NULL,
  `should_be_payed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cnss_payment` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `payment_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userspayments_user_id_index` (`user_id`),
  KEY `userspayments_year_id_index` (`year_id`),
  KEY `userspayments_month_id_index` (`month_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `userspayments`
--

INSERT INTO `userspayments` (`id`, `user_id`, `year_id`, `month_id`, `should_be_payed`, `cnss_payment`, `payment`, `payment_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10000, 1000, 0, 0, '2018-09-02 11:52:44', '2018-09-02 11:52:44'),
(2, 1, 1, 2, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(3, 1, 1, 3, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(4, 1, 1, 4, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(5, 1, 1, 5, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(6, 1, 1, 6, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(7, 1, 1, 9, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(8, 1, 1, 10, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(9, 1, 1, 11, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45'),
(10, 1, 1, 12, 10000, 1000, 0, 0, '2018-09-02 11:52:45', '2018-09-02 11:52:45');

-- --------------------------------------------------------

--
-- Structure de la table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` year(4) NOT NULL,
  `max` year(4) NOT NULL,
  `full` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `years`
--

INSERT INTO `years` (`id`, `name`, `min`, `max`, `full`, `created_at`, `updated_at`) VALUES
(1, '2017/2018', 2017, 2018, 0, NULL, NULL),
(2, '2018/2019', 2018, 2019, 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
