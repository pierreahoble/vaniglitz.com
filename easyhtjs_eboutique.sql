-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 04 mars 2020 à 11:42
-- Version du serveur :  10.2.31-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `easyhtjs_eboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `carbacks`
--

CREATE TABLE `carbacks` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `state` varchar(191) NOT NULL,
  `damage` text DEFAULT NULL,
  `kilometrage` double DEFAULT NULL,
  `gasoline` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carbacks`
--

INSERT INTO `carbacks` (`id`, `reservation_id`, `leasing_id`, `state`, `damage`, `kilometrage`, `gasoline`, `created_at`, `updated_at`) VALUES
(1, 39, NULL, 'Bon', 'Petites fissures sur le capot', 20000, 4, '2019-03-11 17:07:31', '2019-03-11 17:07:31'),
(2, 39, NULL, 'Bon', 'Grandes fissures partout', 25000, 1, '2019-03-11 17:50:41', '2019-03-11 17:50:41'),
(3, 38, NULL, 'Bon', NULL, NULL, NULL, '2019-03-11 17:51:46', '2019-03-11 17:51:46'),
(4, 39, NULL, 'Bon', 'Grandes fissures partout', 25000, 1, '2019-03-11 18:13:03', '2019-03-11 18:13:03'),
(5, 37, NULL, 'Bon', NULL, NULL, NULL, '2019-03-11 18:13:33', '2019-03-11 18:13:33'),
(6, 37, NULL, 'Très fauché', 'Gros', 2000, 5, '2019-03-12 14:30:23', '2019-03-12 14:30:23'),
(7, 40, NULL, 'Fauché', 'Capot cassé', 1200, 10, '2019-03-12 14:31:43', '2019-03-12 14:31:43'),
(8, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:31:58', '2019-03-12 14:31:58'),
(9, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:32:34', '2019-03-12 14:32:34'),
(10, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:34:05', '2019-03-12 14:34:05'),
(11, 39, NULL, 'Bon', 'Grandes fissures partout', 25000, 1, '2019-03-12 14:35:37', '2019-03-12 14:35:37'),
(12, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:40:49', '2019-03-12 14:40:49'),
(13, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:43:03', '2019-03-12 14:43:03'),
(14, 40, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 14:46:23', '2019-03-12 14:46:23'),
(15, 36, NULL, 'Fauché', 'Capot completement ouvert', 1300, 2, '2019-03-12 15:01:38', '2019-03-12 15:01:38'),
(16, 36, NULL, 'Bon', 'Capot cassé en plusieurs morceaux', 1500, 0, '2019-03-13 10:12:02', '2019-03-13 10:12:02'),
(17, 32, NULL, 'Bon', 'Capot cassé en plusieurs morceaux', 1500, 0, '2019-03-13 10:12:39', '2019-03-13 10:12:39'),
(18, 31, NULL, 'Très fauché', NULL, NULL, NULL, '2019-03-13 10:18:51', '2019-03-13 10:18:51'),
(19, 30, NULL, 'Très fauché', 'Gros', 2000, 5, '2019-03-13 10:22:13', '2019-03-13 10:22:13'),
(20, 27, NULL, 'Bon', NULL, NULL, NULL, '2019-03-13 14:40:27', '2019-03-13 14:40:27'),
(21, NULL, 27, 'Bon', 'Pas conséquent', 100, 2, '2019-03-13 14:56:47', '2019-03-13 14:56:47');

-- --------------------------------------------------------

--
-- Structure de la table `carfiles`
--

CREATE TABLE `carfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carfiles`
--

INSERT INTO `carfiles` (`id`, `name`, `path`, `car_id`, `created_at`, `updated_at`) VALUES
(27, '1lv4OZEbBu3EaWRQKKvORtzD7VvcvBRLxPLnzm1w.jpeg', 'C:\\xampp\\tmp\\php92DD.tmp', 8, '2019-02-06 14:06:27', '2019-02-06 14:06:27'),
(28, 'eay269XPtgAhlKZPHlPXSMaitSdy8kki5KYfMYnw.jpeg', 'C:\\xampp\\tmp\\phpFBD9.tmp', 7, '2019-02-06 14:06:53', '2019-02-06 14:06:53'),
(33, 'R6Uby6AXDMaKIj0CVGKN5uPinexJA51El0BqPvIY.jpeg', 'C:\\xampp\\tmp\\phpCF50.tmp', 9, '2019-02-06 18:13:33', '2019-02-06 18:13:33'),
(37, 'fza59hmXOUbv2JveXIC1owcdRvPDelTT4JwZnNZp.jpeg', 'C:\\xampp\\tmp\\phpC818.tmp', 10, '2019-02-07 18:14:13', '2019-02-07 18:14:13'),
(52, '8aQ0Hmkwzla9emoo1AsxF818kWTzPZvWT82Dv2XX.jpeg', 'C:\\xampp\\tmp\\php4467.tmp', 12, '2019-02-19 12:37:44', '2019-02-19 12:37:44'),
(53, 'CSrDulavq6HVibFjR1LEZF8aMzpnau6yTT7MPDdc.jpeg', '0', 53, '2019-03-11 09:38:36', '2019-03-11 09:38:36'),
(54, 'Sh333kRsFZ6DrGEeimioHqRUrwGsGLBYdfHZHOtM.jpeg', '0', 54, '2019-03-11 09:47:06', '2019-03-11 09:47:06'),
(55, 'vRQdEKB4QgimtzLRcbwFww6oJschy3sA38CbgXNn.jpeg', '0', 55, '2019-05-03 15:57:17', '2019-05-03 15:57:17'),
(56, '37DgjuMQnaVo5emurRRJE85hyrko6uMdwBuKGa6f.jpeg', '0', 13, '2019-05-03 15:58:12', '2019-05-03 15:58:12'),
(57, 'wmP8Oag3BTEQCmV66eGTvn1soEuWCCoXsNhAubu1.jpeg', '0', 14, '2019-05-03 16:20:24', '2019-05-03 16:20:24'),
(58, 'EyMlCuE1T9yroLTpm5Oc5a9Vo9IUXxhrT1Uj1dsl.jpeg', '0', 15, '2019-05-03 16:25:26', '2019-05-03 16:25:26'),
(59, 'yAkMkZaAkASeFYiVkf2wDJV3prjcmb4lmdhVWQfp.jpeg', '0', 16, '2019-05-03 16:27:44', '2019-05-03 16:27:44'),
(60, '5S3NJeuoDp58YjQ7OEnJiOvAZtJzp0UQMKbaReJz.jpeg', '0', 17, '2019-05-03 16:51:27', '2019-05-03 16:51:27'),
(61, 'PakRF4BdwXai5VndlxVLgZCaEGNW7sY7qowYQAkH.jpeg', '0', 18, '2019-05-03 16:56:56', '2019-05-03 16:56:56'),
(62, 'g6z4OkNybOksOBwc2mgETYoasWJLOmR7y4xlRUwX.jpeg', '0', 19, '2019-05-03 16:59:49', '2019-05-03 16:59:49'),
(63, 'jAmORG5EM4366oO5VNMclXG0Ac0SsJh4UwN8BvcY.jpeg', '0', 20, '2019-05-03 17:04:44', '2019-05-03 17:04:44'),
(64, 'TZz45C9I2gkDRW45Tj0OAdSLaeWzsANJPCq7VH0N.jpeg', '0', 21, '2019-05-03 17:08:06', '2019-05-03 17:08:06'),
(65, 'Cni8Qbvorb00Jf5r1ykXNLhZBjYgdJbUWhDQCjuX.jpeg', '0', 22, '2019-05-03 17:10:11', '2019-05-03 17:10:11'),
(66, 'mtZWkSvDH4InSHcfJeTv85xfDj9pJcpUkyHdYSGq.jpeg', '0', 23, '2019-05-20 15:40:16', '2019-05-20 15:40:16'),
(67, 'pn8EHiCjVq8CJ5XfvaZIqL79725aD1v45Mtv2412.jpeg', '0', 24, '2019-08-21 10:56:09', '2019-08-21 10:56:09'),
(68, 'qfNSInvuvjyigagGybGP0hDfz4f1AVTqmF3hx6P2.jpeg', '0', 25, '2019-10-15 00:23:53', '2019-10-15 00:23:53'),
(69, 'f1e9MBpylU9fXTaOEzPOw4OCFv5H8n2IdgojQJmN.jpeg', '0', 26, '2019-10-17 11:33:44', '2019-10-17 11:33:44'),
(70, 'RF9Jx9UzMLqaXGloXTgimNch1gduWsQMwcpuGoub.jpeg', '0', 27, '2019-10-17 13:11:24', '2019-10-17 13:11:24'),
(78, 'ZbwkHU2wRIhArylcAdjgwlZ1jkEF0XYTFFsC3MzC.jpeg', '0', 2, '2019-10-24 13:57:00', '2019-10-24 13:57:00'),
(79, 'bEBZXUp53aV7npC32zlBoopa472Xs9wZEp3kFdOL.png', '0', 2, '2019-10-24 13:57:00', '2019-10-24 13:57:00'),
(80, 'yzvdUuDFzPwKOs5zM9Eluk3McE8brR85ta4OQrCj.jpeg', '0', 2, '2019-10-24 13:57:01', '2019-10-24 13:57:01'),
(83, 'v9HNmYm2QfT3IHJwvDa7vkS3JtOkFDE30mESnf5D.jpeg', '0', 3, '2019-10-24 14:23:45', '2019-10-24 14:23:45'),
(84, 'mVWHoYQHPtA5pxScC4DwoS3DH5kV98EOymBOE1dt.webp', '0', 4, '2019-10-24 14:28:52', '2019-10-24 14:28:52'),
(85, 'rhYP5vthq3k9Jd3JxDXhIxLIkGfAkNN3bFRgHPsz.jpeg', '/tmp/phpw1doSZ', 1, '2019-11-12 16:55:17', '2019-11-12 16:55:17'),
(86, '1a1RL3PA8rIdIFqtEAMVpeG2NNnsVD7T6k4gACZO.jpeg', '/tmp/phpyUcv1e', 1, '2019-11-12 16:55:17', '2019-11-12 16:55:17'),
(87, '49yHQS35BUXBS26mHpdd3IEW6tosDZOArCuuPsGo.jpeg', '/tmp/phpqnwr1Z', 5, '2019-11-12 16:56:27', '2019-11-12 16:56:27'),
(88, 'gifIIjFZpFHkm9LpyYf1JiDx816jn6LDKxBFbjQ9.jpeg', '/tmp/phpuUoOi5', 6, '2019-12-13 08:34:31', '2019-12-13 08:34:31');

-- --------------------------------------------------------

--
-- Structure de la table `carmodels`
--

CREATE TABLE `carmodels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carmodels`
--

INSERT INTO `carmodels` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tucson 2007', NULL, '2019-02-06 10:35:19', '2019-05-03 15:33:50'),
(2, 'Avensis', NULL, '2019-05-03 15:25:07', '2019-05-07 10:03:51'),
(3, 'Ministérielle', NULL, '2019-05-03 15:25:32', '2019-05-03 15:25:32'),
(4, 'Rav4 2003', NULL, '2019-05-03 15:27:01', '2019-05-03 15:27:01'),
(5, 'Corolla Verso 2005', NULL, '2019-05-03 15:27:20', '2019-05-03 16:50:09'),
(6, 'Yaris Verso 2002', NULL, '2019-05-03 15:27:57', '2019-05-03 16:50:29'),
(7, 'Quashqai 2016', NULL, '2019-05-03 15:28:36', '2019-05-03 15:28:36'),
(8, 'Sportage 2017', NULL, '2019-05-03 15:29:20', '2019-05-03 15:29:20'),
(9, 'Tiguan 2015', NULL, '2019-05-03 15:29:42', '2019-05-03 15:29:42'),
(10, 'serie 3 320d luxiry', NULL, '2019-05-03 15:30:30', '2019-05-03 15:30:30'),
(11, 'Autre', NULL, '2019-10-17 11:25:47', '2019-10-17 11:25:47');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartype_id` int(11) DEFAULT NULL,
  `carmodel_id` int(11) DEFAULT NULL,
  `carstate_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `baggage` int(11) DEFAULT NULL,
  `door` int(11) DEFAULT NULL,
  `kilometrage` double DEFAULT NULL,
  `fuel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gasoline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_hour` int(11) DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lome_accra` double(20,2) DEFAULT NULL,
  `lome_cotonou` double(20,2) DEFAULT NULL,
  `bail` double(20,2) DEFAULT NULL,
  `mark_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `name`, `cartype_id`, `carmodel_id`, `carstate_id`, `category_id`, `color`, `registration`, `available`, `active`, `amount`, `description`, `quantity`, `baggage`, `door`, `kilometrage`, `fuel`, `gasoline`, `damage`, `amount_hour`, `year`, `lome_accra`, `lome_cotonou`, `bail`, `mark_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'PC Lenovo i5', NULL, NULL, 2, 1, 'Grise', NULL, 1, 1, 150000.00, 'Superbe pc, autonomie 5h, neuf en carton', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-23 13:53:43', '2019-10-23 13:57:38'),
(2, 'IPhone 11 Pro Max', NULL, NULL, 2, 1, 'Or', NULL, 1, 1, 850000.00, '256 GB, Autonomie 2 jour, Caméra front 10 mpx | back 20 mpx', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-23 14:06:37', '2019-10-23 14:06:37'),
(3, 'Montre Rolex 4520', NULL, NULL, 2, 6, 'Or', NULL, 1, 1, 145000.00, 'Soyez élégant et faites plaisir à votre partenaire en en lui offrant une montre Rolex., Marque de luxe haut de gamme diamant montre de luxe stylistes ...', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-24 14:23:02', '2019-10-24 14:34:07'),
(4, 'Samsung TV', NULL, NULL, 2, 1, 'Noire', NULL, 1, 1, 550000.00, 'Des images Ultra HD magnifiques et des couleurs sublimes\r\n La Ultra HD offre 4x la résolution de la Full HD\r\n Une sensation d\'immersion unique que seule une TV Incurvée peut vous faire vivre.\r\n Auto Depth Enhancer', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-24 14:28:50', '2019-10-24 14:28:50'),
(5, 'Pince à épiler', NULL, NULL, 2, 6, 'Multicolor', NULL, 1, 1, 1000.00, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-12 16:56:08', '2019-11-12 16:56:08'),
(6, 'Rangement Vin', NULL, NULL, 2, 7, 'Verte', NULL, 1, 1, 10000.00, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-12 16:48:00', '2019-12-13 08:35:13');

-- --------------------------------------------------------

--
-- Structure de la table `carstates`
--

CREATE TABLE `carstates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carstates`
--

INSERT INTO `carstates` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Neuf', '2019-02-06 08:21:50', '2019-10-24 15:49:39'),
(3, 'Fauché', '2019-02-06 08:23:16', '2019-02-06 08:23:16'),
(4, 'Très fauché', '2019-02-06 08:23:46', '2019-02-06 08:23:46'),
(5, 'Très bon', '2019-02-06 08:24:29', '2019-02-06 08:24:29'),
(6, 'Pas mal', '2019-02-06 08:28:18', '2019-02-06 09:58:56'),
(8, 'Ca peut aller', '2019-02-06 10:14:01', '2019-02-06 10:14:01'),
(9, '2e main', '2019-10-24 15:50:48', '2019-10-24 15:50:48');

-- --------------------------------------------------------

--
-- Structure de la table `cartypes`
--

CREATE TABLE `cartypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cartypes`
--

INSERT INTO `cartypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prestige', '2019-02-06 10:59:48', '2019-05-20 22:03:57'),
(3, 'SUV', '2019-05-03 15:49:18', '2019-05-20 21:28:21'),
(4, 'Berline', '2019-05-03 15:50:05', '2019-05-20 21:28:13'),
(5, 'Citadine', '2019-05-03 15:50:19', '2019-05-20 21:27:59'),
(6, 'Familiale', '2019-05-20 22:11:43', '2019-05-20 22:11:43');

-- --------------------------------------------------------

--
-- Structure de la table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technologie', '2019-10-23 13:26:41', '2019-10-23 13:26:41'),
(2, 'Electroménager', '2019-10-23 13:27:01', '2019-10-23 13:27:01'),
(3, 'Beauté', '2019-10-23 13:27:13', '2019-10-23 13:27:13'),
(4, 'Nourriture', '2019-10-23 13:27:34', '2019-10-23 13:27:34'),
(5, 'Boisson', '2019-10-23 13:27:44', '2019-10-23 13:27:44'),
(6, 'Accessoires', '2019-10-24 14:20:13', '2019-10-24 14:20:13'),
(7, 'Déco - Meuble', '2019-12-12 14:47:33', '2019-12-12 14:47:33');

-- --------------------------------------------------------

--
-- Structure de la table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `telephone` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `telephone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Kendrick Lamar', '90929392', 'SKceseFGmaUuFWgXMp76ooWzxThFSjr9CTyHfvKj.jpeg', '2019-02-08 16:38:36', '2019-02-08 16:41:54'),
(2, 'Jaden Smith', '94959495', 'VLCRZfUtwU9styvuS5d15OlmOVGkm0kNlnDCqNrh.jpeg', '2019-02-08 16:39:13', '2019-02-08 16:39:13');

-- --------------------------------------------------------

--
-- Structure de la table `historics`
--

CREATE TABLE `historics` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `driver_amount` double DEFAULT NULL,
  `reduction_amount` double DEFAULT NULL,
  `tva_amount` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `ttc_amount` double DEFAULT NULL,
  `bail_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_back` timestamp NULL DEFAULT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numfac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `locater_paid` int(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `reservation_id`, `leasing_id`, `driver_amount`, `reduction_amount`, `tva_amount`, `amount`, `ttc_amount`, `bail_amount`, `total_amount`, `date_start`, `date_back`, `mode`, `receipt`, `numfac`, `payment_id`, `locater_paid`, `user_id`, `map`, `items`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 2000, 0, 3960, 20000, 25960, 0, 25960, '2019-10-21 12:00:45', '2019-10-18 18:04:00', 'tmoney', NULL, 'FAC-00020191021111150', NULL, 1, 0, NULL, '', '2019-10-21 11:11:50', '2019-10-21 12:00:45'),
(2, 7, NULL, 6000, 0, 17280, 90000, 113280, 0, 113280, '2019-10-21 12:01:43', '2019-10-20 11:37:00', 'tmoney', NULL, 'FAC-00020191021111451', NULL, 1, 0, NULL, '', '2019-10-21 11:14:51', '2019-10-21 12:01:43'),
(3, NULL, NULL, 2000, 0, 53460, 295000, 350460, NULL, 350460, NULL, NULL, NULL, NULL, 'FAC-00020191107144459', NULL, NULL, 24, NULL, '3,1', '2019-11-07 14:44:59', '2019-11-07 14:44:59'),
(4, NULL, NULL, 2000, 0, 252360, 1400000, 1654360, NULL, 1654360, NULL, NULL, NULL, NULL, 'FAC-00020191107150733', NULL, NULL, 24, NULL, '4,2', '2019-11-07 15:07:33', '2019-11-07 15:07:33'),
(5, NULL, NULL, 2000, 0, 305460, 1695000, 2002460, NULL, 2002460, NULL, NULL, NULL, NULL, 'FAC-00020191112173452', NULL, NULL, 24, NULL, '3,1,4,2', '2019-11-12 17:34:52', '2019-11-12 17:34:52'),
(6, NULL, NULL, 2000, 0, 540, 1000, 3540, NULL, 3540, NULL, NULL, NULL, NULL, 'FAC-00020191112175831', NULL, NULL, 24, NULL, '5', '2019-11-12 16:58:31', '2019-11-12 16:58:31');

-- --------------------------------------------------------

--
-- Structure de la table `leasings`
--

CREATE TABLE `leasings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date_back` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` double(8,2) DEFAULT NULL,
  `bail` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marks`
--

INSERT INTO `marks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '2019-08-14 11:45:49', '2019-08-14 11:45:49'),
(2, 'KIA', '2019-08-14 11:45:49', '2019-08-14 11:45:49'),
(3, 'Nissan', '2019-08-14 11:45:50', '2019-08-14 11:45:50'),
(4, 'Renault', '2019-08-14 11:45:50', '2019-08-14 11:45:50'),
(5, 'Citroën', '2019-08-14 11:45:50', '2019-08-14 11:45:50'),
(6, 'Peugeot', '2019-08-14 11:45:50', '2019-08-14 11:45:50'),
(7, 'Hyundai', '2019-08-14 11:45:50', '2019-08-14 11:45:50'),
(8, 'BMW', '2019-08-14 11:45:51', '2019-08-14 11:45:51'),
(9, 'Range Rover', '2019-08-14 11:45:51', '2019-08-14 11:45:51'),
(10, 'Ford', '2019-08-14 14:56:57', '2019-08-14 14:57:33'),
(11, 'Lamborghini', '2019-10-17 11:23:13', '2019-10-17 11:23:13'),
(12, 'Ferrari', '2019-10-17 11:23:26', '2019-10-17 11:23:26'),
(13, 'Porsche', '2019-10-17 11:23:37', '2019-10-17 11:23:37');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2019_02_05_120829_create_historic_table', 1),
(93, '2014_10_12_000000_create_users_table', 2),
(94, '2014_10_12_100000_create_password_resets_table', 2),
(95, '2019_02_05_115824_create_cars_table', 2),
(96, '2019_02_05_120051_create_carfiles_table', 2),
(97, '2019_02_05_120110_create_cartypes_table', 2),
(98, '2019_02_05_120144_create_carmodels_table', 2),
(99, '2019_02_05_120219_create_reservations_table', 2),
(100, '2019_02_05_120415_create_leasings_table', 2),
(101, '2019_02_05_120442_create_subcontractings_table', 2),
(102, '2019_02_05_120616_create_payments_table', 2),
(103, '2019_02_05_120650_create_invoices_table', 2),
(104, '2019_02_05_120829_create_historics_table', 2),
(105, '2019_02_05_183314_create_carstates_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `view` text DEFAULT NULL,
  `recommand` tinyint(4) DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `note`, `view`, `recommand`, `car_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pas mal', 1, 20, 24, '2019-10-08 16:01:42', '2019-10-08 16:01:42'),
(2, 4, 'J\'ai kiffé !', 1, 24, 24, '2019-10-09 15:49:49', '2019-10-09 15:49:49'),
(3, NULL, NULL, NULL, 23, 24, '2019-10-09 15:50:54', '2019-10-09 15:50:54'),
(4, 5, 'Parfait ! Rien à ajouter', 1, 22, 24, '2019-10-09 16:07:33', '2019-10-09 16:07:33'),
(5, 3, 'Plûtot pas mal', 1, 21, 24, '2019-10-09 16:19:04', '2019-10-09 16:19:04'),
(6, 2, 'Boff', NULL, 15, 24, '2019-10-09 16:24:40', '2019-10-09 16:24:40'),
(7, 3, NULL, 1, 25, 24, '2019-10-16 16:47:14', '2019-10-16 16:47:14'),
(8, 5, 'Véhicule fascinant', 1, 24, 30, '2019-10-16 13:08:59', '2019-10-16 13:08:59'),
(9, 5, 'Superbe !', 1, 26, 27, '2019-10-17 11:37:48', '2019-10-17 11:37:48'),
(10, NULL, NULL, NULL, 27, 26, '2019-10-17 13:14:30', '2019-10-17 13:14:30'),
(11, NULL, NULL, NULL, 27, 27, '2019-10-18 16:04:20', '2019-10-18 16:04:20');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('christianedorh@gmail.com', '$2y$10$HTu2afjaEnnKILCAmtx7vO2BN7WgwqIB8an4ivJ2Kknu.79urLu1K', '2019-07-29 22:14:11'),
('borisahiave@sparkcorporation.org', '$2y$10$H4gWtrH/CLLc9Rv79m6CcOw4yN3T.b5xJsvEZV/EhnL5JpGKsbSq2', '2019-08-19 19:26:52'),
('boriskovicci@gmail.com', '$2y$10$3W107IaR7gDv0/QhRntfGeiXrj/R.bhsCg6OQ8VR..5bTnzDwLKg6', '2019-12-12 13:07:18');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `subcontracting_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `id` int(11) NOT NULL,
  `code` varchar(191) NOT NULL,
  `durate` int(11) NOT NULL,
  `reduction` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promos`
--

INSERT INTO `promos` (`id`, `code`, `durate`, `reduction`, `created_at`, `updated_at`) VALUES
(2, 'VYhvoEyY', 10, 20.00, '2019-10-03 23:04:08', '2019-10-03 23:04:08'),
(3, 'Wxj2Doqh', 30, 10.00, '2019-10-03 23:04:39', '2019-10-03 23:04:39');

-- --------------------------------------------------------

--
-- Structure de la table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `tva` double(8,2) DEFAULT NULL,
  `reduction_rate` double(8,2) DEFAULT NULL,
  `no_driver_rate` double(8,2) DEFAULT NULL,
  `bail_rate` double(8,2) DEFAULT NULL,
  `kilometer` int(11) DEFAULT NULL,
  `sup_amount` double DEFAULT NULL,
  `admin_locater_rate` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rates`
--

INSERT INTO `rates` (`id`, `tva`, `reduction_rate`, `no_driver_rate`, `bail_rate`, `kilometer`, `sup_amount`, `admin_locater_rate`, `created_at`, `updated_at`) VALUES
(1, 18.00, 2000.00, 2000.00, 2000.00, 100, 5000, 10.00, '2019-10-16 14:31:06', '2019-10-16 14:31:06');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `date_back` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` double(8,2) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `express` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subcontractings`
--

CREATE TABLE `subcontractings` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `leasing_id` int(11) DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposal_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misspaid` double(8,2) DEFAULT NULL,
  `paid` int(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `role`, `telephone`, `cni`, `resource_name`, `resource_num`, `operator_num`, `address`, `photo`, `active`, `account_type`, `misspaid`, `paid`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'Admin', 'admin@spark.org', NULL, '$2y$10$df4I8aAMbgZ5yXiI88QiEuxCgqXNI4FYUGvGYK9fiuJEBMJob8hdG', NULL, 'admin', '90909090', NULL, NULL, NULL, NULL, 'Paris', 'avatar.png', 1, NULL, NULL, NULL, 'LT1d9UHi3oscjop6dhElwJmiKiS9BP1SFgW2i7GTrer6RSnT2U4ncnA5inJM', '2019-05-03 11:39:08', '2019-12-12 09:45:26'),
(25, 'test', 'test@sparkcorporation.org', NULL, '$2y$10$V9MRWbmhK.5Zk/uG79jSrOj6.eJq1.a2YbvyJe8Z9cRQF1xiMs1v2', 'physical', 'standard', '90909000', NULL, NULL, NULL, NULL, NULL, 'avatar.png', 1, NULL, NULL, NULL, NULL, '2019-05-21 16:38:32', '2019-05-21 16:38:32'),
(26, 'john doe', 'johndoe@gmail.com', NULL, '$2y$10$b63L6GUgxziht30gw1h8UOinMFScy8hRao.ywisB0Tm7sumK/0Vti', 'physical', 'standard', '909090909', '97984999595959', NULL, NULL, NULL, 'adidogomé', 'avatar.png', 1, NULL, NULL, NULL, 'Z0dp0hBtbvB2kPEmQRSjIdm8Io5DAa6NmbtRPBuSSC4UFdqJFpXRgM0dSL0f', '2019-07-29 21:06:20', '2019-07-29 21:06:20'),
(27, 'Bobo bobo', 'boriskovicci@gmail.com', NULL, '$2y$10$4mCDStfUDA891pGlEBD2s.ngKnQrIjxqhS2YzHlYzBqtlGwuoZRim', 'physical', 'standard', '929592929', '9789595959', NULL, NULL, NULL, 'adidogomé', 'avatar.png', 1, NULL, NULL, NULL, 'japQb0I6sf4ZDIafL4NZJAWRY1DRCNY2pxPy0CYRBcXTGBfj1aWiMB8AVZQH', '2019-07-29 21:17:56', '2019-07-29 21:17:56'),
(28, 'Christian', 'christianedorh@gmail.com', NULL, '$2y$10$P.7Qe0Xv6cJf.DCnLTY4H.eXc3pHogYjWE9lHLb6iY9Bk5fKm5Num', 'physical', 'standard', '92929292', '92929494', NULL, NULL, NULL, 'Nyekonakpoe', 'avatar.png', 1, NULL, NULL, NULL, 's2ceApOpDxb9iGHJLnDIUqo17Z02N5WuhXLzxkrJmgt7mju7NYfVrDeieOPK', '2019-07-29 22:13:40', '2019-07-29 22:13:40'),
(29, 'Boris', 'borisahiave@sparkcorporation.org', NULL, '$2y$10$jUhEsVFxcehxya1ZHUoJNOPs3vEs1DtSI8VVgRBZBE0uszqyCnZza', 'physical', 'standard', '92929292', '94999797', NULL, NULL, NULL, 'Nyekonakpoe', 'avatar.png', 1, NULL, NULL, NULL, '3yfZSsYG1bnF0w8TscKjHfguaqXMvZvzMJSEEACaNjMLVKrLDguhA1OzwP4o', '2019-07-30 18:24:03', '2019-07-30 18:24:03'),
(30, 'Donald Glover', 'donald@gmail.com', NULL, '$2y$10$BHZaeJcol2M/YntGRtxVrOnRIrDwkiMBdVGxwDuZwwu6TuvXuUKYG', 'locater', 'standard', '92929292', '25052232', NULL, NULL, NULL, 'Adidogomé', 'nMnsBo6sheJI5I71Npi0otNiynJx3mZgXfwFmRtE.jpeg', 1, 'Tmoney', 0.00, 0, 'GhPzANdoW3vSe7p7hGyUNYO45LIsnNtg7IQHXYm4trOUVcGnzlqfR427NdWl', '2019-10-03 16:33:47', '2019-10-21 12:02:12'),
(31, 'QuickSox', 'quicksox@gmail.com', NULL, '$2y$10$6yXt70E0amgyV5M.QBZhPONAMcBFYRtA4ROKTneQ1TM0BxJnentdy', 'locater', 'standard', '92949191', '2020', NULL, NULL, NULL, 'Abidjan, Cote d\'Ivoire', '7b3peFK3AQyWUCi94AOnvUTTOKQaXM0WH4agxErv.jpeg', 1, 'Tmoney', 125316.00, 1, 'o5PkzaHLoVCl388hn066wx5bz7FhoyrTRZvPmJ176sPRNmgxFeuW2G0vruYF', '2019-10-17 11:18:30', '2019-10-21 12:01:43'),
(32, 'Admin', 'admin@sparkcorporation.org', NULL, '$2y$10$jWdU1q0UPy3PE/2.CXx2Gu9ldCLVAB89T00NejUwAXi1myHrBt6L2', 'physical', 'standard', '90909090', '5050', NULL, NULL, NULL, 'Lomé', 'avatar.png', 1, NULL, NULL, NULL, '0ytGTGcaDYXRi4vHrmXNdLt0NcmHwQ8HuAYYvBIShk1PF27R4Tu7FoyxRdQL', '2019-10-25 11:34:51', '2019-10-25 11:34:51'),
(33, 'MANBLAGO', 'manblago@gmail.com', NULL, '$2y$10$LUtuMWYkfhI9dZppygypfe4e44h9vKLCxo9offH2mT0ZwG1nZ2lZq', 'admin', 'admin', '90154505', '0353-0006-123', NULL, NULL, NULL, 'Zossimé', 'avatar.png', 1, NULL, NULL, NULL, 'FDTGRJu2khAsk3RA3MU26oR4R5ethRecFpABViFYxeVX9cKyk9Vnj1TGWa6S', '2019-11-14 09:20:47', '2019-12-12 13:36:42'),
(34, 'Adzalla Krista Réeda', 'kreeda25@gmail.com', NULL, '$2y$10$ZngswylyxXr1s2KGv14GNebQcHhKvqRbEmGjyftBTm6zbNetNQpBq', 'physical', 'standard', '91773122', '712546698', NULL, NULL, NULL, 'lome', 'avatar.png', 1, NULL, NULL, NULL, NULL, '2019-11-14 10:19:30', '2019-11-14 10:19:30'),
(35, 'Solange soso', 'sosoengel693@gmail.com', NULL, '$2y$10$HoNLbphTkzQ/wlQWNo4H4.7gORPX1os.mGTfhdXT3Zs3hJoX8X.WW', 'physical', 'standard', '91418509', '33', NULL, NULL, NULL, 'avedji', 'avatar.png', 1, NULL, NULL, NULL, NULL, '2019-11-14 10:28:25', '2019-11-14 10:28:25'),
(36, 'Yehe', 'cr7@gmail.com', NULL, '$2y$10$QOqFKsIoX/A8x8eQ3KiWIO.r6d9eua40.CPdByDu.2GP50XYvSUBm', 'physical', 'standard', '909897969', '1234', NULL, NULL, NULL, 'Bdkr', 'avatar.png', 1, NULL, NULL, NULL, NULL, '2019-12-11 22:40:42', '2019-12-11 22:40:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carfiles`
--
ALTER TABLE `carfiles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carmodels`
--
ALTER TABLE `carmodels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carstates`
--
ALTER TABLE `carstates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartypes`
--
ALTER TABLE `cartypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historics`
--
ALTER TABLE `historics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `leasings`
--
ALTER TABLE `leasings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcontractings`
--
ALTER TABLE `subcontractings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carfiles`
--
ALTER TABLE `carfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `carmodels`
--
ALTER TABLE `carmodels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `carstates`
--
ALTER TABLE `carstates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `cartypes`
--
ALTER TABLE `cartypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `historics`
--
ALTER TABLE `historics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `leasings`
--
ALTER TABLE `leasings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subcontractings`
--
ALTER TABLE `subcontractings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
