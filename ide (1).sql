-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2018 at 10:32 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ide`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `cni`, `passport`, `num_license`, `attachment`, `phone1`, `phone2`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Clt Alain ABREDAN', '12CI51a56d', '_', '_', '_', '58419180', '_', '2018-04-25 22:00:21', '2018-04-24 00:42:05', '2018-04-25 22:00:21'),
(2, 'Clt Jonatha Palinfo', '1245CI51545', '4150545CH225', '48azd5451', NULL, '58419180', NULL, '2018-04-25 21:55:15', '2018-04-25 21:52:03', '2018-04-25 21:55:15'),
(3, 'Clt John Bala', '_', '_', '_', NULL, '41819044', NULL, '2018-04-25 21:55:02', '2018-04-25 21:54:30', '2018-04-25 21:55:02'),
(4, 'Dada Gnahoua', NULL, NULL, NULL, NULL, '45689574', NULL, NULL, '2018-04-25 22:12:12', '2018-04-25 22:12:12'),
(5, 'Nono Dapa', NULL, NULL, NULL, NULL, '42156358', NULL, NULL, '2018-04-25 22:12:28', '2018-04-25 22:12:28'),
(10, 'ABREDAN Michael', '585941010', NULL, NULL, NULL, '54155648', NULL, NULL, '2018-04-26 05:57:49', '2018-04-26 05:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vehicle_rights` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_imm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_getting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_getting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reasons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goals` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `complaints_client_id_foreign` (`client_id`),
  KEY `complaints_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `client_id`, `user_id`, `vehicle_rights`, `brand`, `car_imm`, `date_getting`, `place_getting`, `state`, `reasons`, `goals`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Propriétaire', 'HONDA', '8907CU01', '2017-11-03', 'Petit toit rouge', 'pending', 'Poste auto\r\nPneu dégonflés\r\nPortières ouvertes', '_', NULL, '2018-04-26 02:17:48', '2018-04-26 02:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

DROP TABLE IF EXISTS `criterias`;
CREATE TABLE IF NOT EXISTS `criterias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `criterias_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `code`, `label`, `is_enabled`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'phares', 'Phares', 1, NULL, '2018-04-26 00:16:14', '2018-04-26 00:16:14'),
(2, 'feux-avant', 'Feux avant', 1, NULL, '2018-04-26 00:16:31', '2018-04-26 00:16:31'),
(3, 'feux-arrieres', 'Feux arrières', 1, NULL, '2018-04-26 00:24:11', '2018-04-26 00:24:11'),
(4, 'retroviseur-interieur', 'Retroviseur intérieur', 1, NULL, '2018-04-26 00:24:39', '2018-04-26 00:24:39'),
(5, 'retroviseurs-exterieurs', 'Retroviseurs exterieurs', 1, NULL, '2018-04-26 01:04:08', '2018-04-26 01:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_repairs`
--

DROP TABLE IF EXISTS `criteria_repairs`;
CREATE TABLE IF NOT EXISTS `criteria_repairs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `criteria_id` int(10) UNSIGNED NOT NULL,
  `repair_id` int(10) UNSIGNED NOT NULL,
  `yes` tinyint(1) NOT NULL DEFAULT '0',
  `number` int(11) DEFAULT '0',
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `criteria_repairs_criteria_id_foreign` (`criteria_id`),
  KEY `criteria_repairs_repair_id_foreign` (`repair_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteria_repairs`
--

INSERT INTO `criteria_repairs` (`id`, `criteria_id`, `repair_id`, `yes`, `number`, `comments`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 1, 4, 1, 2, 'Pas mal', NULL, '2018-04-26 06:33:54', '2018-04-26 06:33:54'),
(18, 2, 4, 0, NULL, NULL, NULL, '2018-04-26 06:33:54', '2018-04-26 06:33:54'),
(19, 3, 4, 1, 4, NULL, NULL, '2018-04-26 06:33:54', '2018-04-26 06:33:54'),
(20, 4, 4, 1, 1, NULL, NULL, '2018-04-26 06:33:54', '2018-04-26 06:33:54'),
(21, 5, 4, 0, NULL, NULL, NULL, '2018-04-26 06:33:54', '2018-04-26 06:33:54'),
(22, 1, 6, 0, 0, NULL, NULL, '2018-04-27 23:10:14', '2018-04-27 23:10:14'),
(23, 2, 6, 0, 0, NULL, NULL, '2018-04-27 23:10:14', '2018-04-27 23:10:14'),
(24, 3, 6, 0, 0, NULL, NULL, '2018-04-27 23:10:14', '2018-04-27 23:10:14'),
(25, 4, 6, 0, 0, NULL, NULL, '2018-04-27 23:10:14', '2018-04-27 23:10:14'),
(26, 5, 6, 0, 0, NULL, NULL, '2018-04-27 23:10:14', '2018-04-27 23:10:14'),
(27, 1, 7, 1, 4, NULL, NULL, '2018-05-03 11:27:56', '2018-05-03 11:27:56'),
(28, 2, 7, 0, 0, NULL, NULL, '2018-05-03 11:27:56', '2018-05-03 11:27:56'),
(29, 3, 7, 0, 0, NULL, NULL, '2018-05-03 11:27:56', '2018-05-03 11:27:56'),
(30, 4, 7, 1, 1, NULL, NULL, '2018-05-03 11:27:56', '2018-05-03 11:27:56'),
(31, 5, 7, 0, 0, NULL, NULL, '2018-05-03 11:27:56', '2018-05-03 11:27:56'),
(32, 1, 8, 1, 2, NULL, NULL, '2018-05-03 11:59:26', '2018-05-03 11:59:26'),
(33, 2, 8, 1, 2, NULL, NULL, '2018-05-03 11:59:26', '2018-05-03 11:59:26'),
(34, 3, 8, 1, 2, NULL, NULL, '2018-05-03 11:59:26', '2018-05-03 11:59:26'),
(35, 4, 8, 1, 2, NULL, NULL, '2018-05-03 11:59:26', '2018-05-03 11:59:26'),
(36, 5, 8, 1, 2, NULL, NULL, '2018-05-03 11:59:26', '2018-05-03 11:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `logs_code_unique` (`code`),
  KEY `logs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_100000_create_password_resets_table', 1),
(63, '2018_04_12_211706_create_clients_table', 1),
(64, '2018_04_12_211928_create_wreckers_table', 1),
(65, '2018_04_12_212153_create_complaints_table', 1),
(66, '2018_04_12_212841_create_transactions_table', 1),
(67, '2018_04_12_213255_create_peopletypes_table', 1),
(68, '2018_04_12_213536_create_vehiclecategories_table', 1),
(69, '2018_04_13_080415_create_criterias_table', 1),
(70, '2018_04_13_080605_create_logs_table', 1),
(71, '2018_04_13_080954_create_pricegettings_table', 1),
(72, '2018_04_13_081314_create_pricepenalyties_table', 1),
(73, '2018_04_13_081556_create_repairs_table', 1),
(74, '2018_04_13_082432_create_criteria_repairs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peopletypes`
--

DROP TABLE IF EXISTS `peopletypes`;
CREATE TABLE IF NOT EXISTS `peopletypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peopletypes_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peopletypes`
--

INSERT INTO `peopletypes` (`id`, `code`, `label`, `is_enabled`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'normal', 'Normal', '1', NULL, '2018-04-26 02:35:53', '2018-04-26 02:35:53'),
(2, 'police', 'Police', '1', NULL, '2018-04-26 02:36:01', '2018-04-26 02:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `pricegettings`
--

DROP TABLE IF EXISTS `pricegettings`;
CREATE TABLE IF NOT EXISTS `pricegettings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehiclecategory_id` int(10) UNSIGNED NOT NULL,
  `peopletype_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_day` int(11) NOT NULL,
  `price_night` int(11) NOT NULL,
  `per_kg` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pricegettings_code_unique` (`code`),
  KEY `pricegettings_vehiclecategory_id_foreign` (`vehiclecategory_id`),
  KEY `pricegettings_peopletype_id_foreign` (`peopletype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricegettings`
--

INSERT INTO `pricegettings` (`id`, `vehiclecategory_id`, `peopletype_id`, `code`, `price_day`, `price_night`, `per_kg`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '180426030448', 45000, 54000, 0, NULL, '2018-04-26 02:55:09', '2018-04-26 03:04:49'),
(3, 2, 1, '180426030244', 53000, 62000, 0, NULL, '2018-04-26 03:02:57', '2018-04-26 03:02:57'),
(4, 3, 1, '180426030703', 30, 36, 1, NULL, '2018-04-26 03:07:16', '2018-04-26 03:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `pricepenalyties`
--

DROP TABLE IF EXISTS `pricepenalyties`;
CREATE TABLE IF NOT EXISTS `pricepenalyties` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehiclecategory_id` int(10) UNSIGNED NOT NULL,
  `peopletype_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penality_per_day` int(11) NOT NULL,
  `per_kg` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pricepenalyties_code_unique` (`code`),
  KEY `pricepenalyties_vehiclecategory_id_foreign` (`vehiclecategory_id`),
  KEY `pricepenalyties_peopletype_id_foreign` (`peopletype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricepenalyties`
--

INSERT INTO `pricepenalyties` (`id`, `vehiclecategory_id`, `peopletype_id`, `code`, `penality_per_day`, `per_kg`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '180426031356', 2000, 0, NULL, '2018-04-26 03:14:05', '2018-04-26 03:14:05'),
(2, 2, 1, '180426031407', 3000, 0, NULL, '2018-04-26 03:14:16', '2018-04-26 03:14:16'),
(3, 3, 1, '180426032148', 50, 1, NULL, '2018-04-26 03:21:01', '2018-04-26 03:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

DROP TABLE IF EXISTS `repairs`;
CREATE TABLE IF NOT EXISTS `repairs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `wrecker_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `vehiclecategory_id` int(10) UNSIGNED NOT NULL,
  `peopletype_id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reasons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_getting` date NOT NULL,
  `place_getting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour_getting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchanger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kg` int(11) NOT NULL DEFAULT '0',
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tvs_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci,
  `luggage` tinyint(1) NOT NULL DEFAULT '0',
  `car_license` tinyint(1) NOT NULL DEFAULT '0',
  `car_keys` tinyint(1) NOT NULL DEFAULT '0',
  `car_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_imm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `date_release` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `repairs_reference_unique` (`reference`),
  KEY `repairs_client_id_foreign` (`client_id`),
  KEY `repairs_wrecker_id_foreign` (`wrecker_id`),
  KEY `repairs_vehiclecategory_id_foreign` (`vehiclecategory_id`),
  KEY `repairs_peopletype_id_foreign` (`peopletype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`id`, `wrecker_id`, `client_id`, `vehiclecategory_id`, `peopletype_id`, `reference`, `reasons`, `date_getting`, `place_getting`, `hour_getting`, `exchanger`, `counter`, `kms`, `kg`, `extension`, `charge`, `pc`, `scope`, `tvs_place`, `others`, `luggage`, `car_license`, `car_keys`, `car_brand`, `car_imm`, `state`, `date_release`, `total_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, 10, 1, 1, 'REF-KELZSXAQ', 'Panne seche', '2018-04-18', 'Carrefour Faya', '05:17', NULL, NULL, '15000', 0, NULL, '2000', NULL, NULL, NULL, NULL, 0, 0, 0, 'MAZDA', '4138EF01', 'closed', '2018-04-26', 64900, NULL, '2018-04-26 05:57:49', '2018-04-27 01:17:11'),
(6, 3, 5, 3, 1, 'REF-TA39XNJ4', 'STATIONNEMENT DANGEREUX', '2018-04-22', 'ABOBO PK 18', '15:08', NULL, NULL, '10000', 500, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 'TOYOTA', '4589EF01', 'closed', '2018-04-30', 165200, NULL, '2018-04-27 23:10:14', '2018-04-30 13:33:53'),
(7, 1, 10, 1, 1, 'REF-BMH2BRQN', 'ACCIDENT DE LA CIRCULATION', '2018-05-02', 'YOPOUGON SICOGI', '10:05', '_', '_', '_', 0, '_', '_', '_', '_', '_', '_', 1, 0, 0, 'BMW M3', '5481EF01', 'closed', '2018-05-03', 53100, NULL, '2018-05-03 11:27:56', '2018-05-03 11:41:02'),
(8, 3, 4, 1, 1, 'REF-WKZ79A6K', 'PANNE MECANIQUE', '2018-04-26', 'SOGEFIA', '17:52', '_', '_', '_', 0, '_', '_', '_', '_', '_', '_', 1, 1, 1, 'TOYOTA', '7894EF01', 'closed', '2018-05-03', 62540, NULL, '2018-05-03 11:59:26', '2018-05-03 12:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `way_of` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `type`, `amount`, `desc`, `way_of`, `num_transaction`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'outcome', 150000, 'Facture d’électricité du mois de Janvier 2018', 'CHEQUE', '458456413548', NULL, '2018-04-26 01:49:22', '2018-04-26 01:49:22'),
(2, 4, 'income', 67260, 'Règlement de la facture N°REF-KELZSXAQ d\'un montant de 67.260 FCFA', 'CHEQUE', '458456413548', NULL, '2018-04-27 01:17:11', '2018-04-27 01:17:11'),
(3, 4, 'income', 165200, 'Règlement de la facture N°REF-TA39XNJ4 d\'un montant de 165.200 FCFA', 'ORANGE MONEY', '14521/964RM001', NULL, '2018-04-30 13:33:52', '2018-04-30 13:33:52'),
(4, 2, 'income', 53100, 'Règlement de la facture N°REF-BMH2BRQN d\'un montant de 53.100 FCFA', 'CHEQUE', '4584195632258', NULL, '2018-05-03 11:41:02', '2018-05-03 11:41:02'),
(5, 4, 'income', 62540, 'Règlement de la facture N°REF-WKZ79A6K d\'un montant de 62.540 FCFA', 'ESPECES', '_', NULL, '2018-05-03 12:00:55', '2018-05-03 12:00:55'),
(6, 4, 'outcome', 350000, 'NOUVEAU BUREAU', 'CHEQUE', '48952616513124', NULL, '2018-05-03 12:02:50', '2018-05-03 12:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'facturier',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `is_enabled`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Alain ABREDAN', 'alainabredan@gmail.com', '$2y$10$XWKIz69wqpyxzrHUgyQRYuI61BONmFWIX0HPChuUR/8yRbODVDI46', NULL, 'facturier', 1, '1tSrz4yynqZxy4Roo6gQ844qoDS4Od4BuIj4pUl9JAby0Ifa5PiFuVSrYRPA', NULL, '2018-04-13 21:31:58', '2018-04-25 22:42:08'),
(2, 'Caisse', 'caisse@gmail.com', '$2y$10$zJK1oK5tuDgf6ZumvzRb3etlz7DCclPbC5oluTy8x3oHSQGMCVQaW', '41418191', 'caissiere', 1, 'Z5TCPWtbTqUYJJPZJ1CG6tTm84doUL7lv3y1BwypyGCS70Vi4KDI9VbbQtHI', NULL, '2018-04-25 22:19:45', '2018-04-25 22:42:29'),
(3, 'Comptable', 'comptable@gmail.com', '$2y$10$ckvdvfSWzwttPi6ypzxRHeZK4znMItWqcGhd3g5yk9Na4W2a6cRai', '54659878', 'comptable', 1, 'N7fMrZHqiDx0CIEn1nNWyhofrO6YIgpzWvhyEPm8lFSDOCy8PsuKMctoDTuu', NULL, '2018-04-25 22:21:16', '2018-04-25 22:42:41'),
(4, 'Gérant', 'gerant@gmail.com', '$2y$10$3WGDyn5LZy63C5naA2u6bOnQJ15t2Fl13fW.0X.TGXeMy73hbSKne', '65987458', 'gerant', 1, 't2dLnIw1BMkxygONmhjpmBteG94am9IcR9La2q8qNIMKEVCEtvdv3U4Jj6bs', NULL, '2018-04-25 22:23:24', '2018-04-25 22:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecategories`
--

DROP TABLE IF EXISTS `vehiclecategories`;
CREATE TABLE IF NOT EXISTS `vehiclecategories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehiclecategories_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehiclecategories`
--

INSERT INTO `vehiclecategories` (`id`, `code`, `type`, `desc`, `is_enabled`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Véhicule Particulier', 'PTAC < 1.5T', 1, NULL, '2018-04-25 23:01:56', '2018-04-25 23:01:56'),
(2, 'B', 'Véhicule Utilitaire', '1.5 T < PTAC < 2.5T', 1, NULL, '2018-04-25 23:02:29', '2018-04-25 23:02:29'),
(3, 'F1', 'Objets, Produits et marchandises en vrac et/ou en conventionnel', 'Tarif en fonction du kilogramme transporté', 1, NULL, '2018-04-26 03:06:42', '2018-04-26 03:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `wreckers`
--

DROP TABLE IF EXISTS `wreckers`;
CREATE TABLE IF NOT EXISTS `wreckers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_imm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wreckers`
--

INSERT INTO `wreckers` (`id`, `code`, `car_imm`, `label`, `is_enabled`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'G1', '5841EH97', 'Petit Camion', 1, NULL, '2018-04-25 23:45:43', '2018-04-25 23:45:43'),
(2, 'G2', '4129GH01', 'Remorque large', 1, NULL, '2018-04-25 23:46:09', '2018-04-25 23:46:09'),
(3, 'G3', '7941EF01', 'Remorque 4X4 et limousine', 1, NULL, '2018-04-26 00:01:55', '2018-04-26 00:01:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `criteria_repairs`
--
ALTER TABLE `criteria_repairs`
  ADD CONSTRAINT `criteria_repairs_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`),
  ADD CONSTRAINT `criteria_repairs_repair_id_foreign` FOREIGN KEY (`repair_id`) REFERENCES `repairs` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pricegettings`
--
ALTER TABLE `pricegettings`
  ADD CONSTRAINT `pricegettings_peopletype_id_foreign` FOREIGN KEY (`peopletype_id`) REFERENCES `peopletypes` (`id`),
  ADD CONSTRAINT `pricegettings_vehiclecategory_id_foreign` FOREIGN KEY (`vehiclecategory_id`) REFERENCES `vehiclecategories` (`id`);

--
-- Constraints for table `pricepenalyties`
--
ALTER TABLE `pricepenalyties`
  ADD CONSTRAINT `pricepenalyties_peopletype_id_foreign` FOREIGN KEY (`peopletype_id`) REFERENCES `peopletypes` (`id`),
  ADD CONSTRAINT `pricepenalyties_vehiclecategory_id_foreign` FOREIGN KEY (`vehiclecategory_id`) REFERENCES `vehiclecategories` (`id`);

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `repairs_peopletype_id_foreign` FOREIGN KEY (`peopletype_id`) REFERENCES `peopletypes` (`id`),
  ADD CONSTRAINT `repairs_vehiclecategory_id_foreign` FOREIGN KEY (`vehiclecategory_id`) REFERENCES `vehiclecategories` (`id`),
  ADD CONSTRAINT `repairs_wrecker_id_foreign` FOREIGN KEY (`wrecker_id`) REFERENCES `wreckers` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
