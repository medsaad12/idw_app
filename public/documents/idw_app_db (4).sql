-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 04:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idw_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendriers`
--

CREATE TABLE `calendriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Ferier` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendriers`
--

INSERT INTO `calendriers` (`id`, `created_at`, `updated_at`, `Ferier`, `Date`) VALUES
(10, '2023-04-27 09:44:28', '2023-04-27 09:44:28', 'Dolore adipisci volu', '1976-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `entretiens`
--

CREATE TABLE `entretiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entretiens`
--

INSERT INTO `entretiens` (`id`, `created_at`, `updated_at`, `nom`, `date`, `telephone`, `heure`) VALUES
(18, '2023-04-20 11:39:11', '2023-04-20 11:39:11', 'Aut possimus cupida', '1983-12-23', '+1 (589) 265-6796', '12:21:00'),
(19, '2023-04-20 11:39:17', '2023-04-20 11:39:17', 'Optio a quasi nesci', '2012-08-19', '+1 (392) 192-6501', '03:09:00'),
(23, '2023-04-20 12:33:51', '2023-04-20 12:33:51', 'siham', '2023-04-20', '+1 (567) 459-9899', '12:33:00'),
(24, '2023-04-25 08:56:26', '2023-04-25 08:56:26', 'saad', '2023-04-25', 'med', '09:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipes`
--

CREATE TABLE `equipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chef` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`agents`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipes`
--

INSERT INTO `equipes` (`id`, `name`, `chef`, `agents`, `created_at`, `updated_at`) VALUES
(11, 'gb', 'ziko', '[\"4\",\"17\",\"18\",\"19\"]', '2023-04-28 14:29:12', '2023-04-28 14:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objectifs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_entre` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `nom`, `telephone`, `status`, `objectifs`, `created_at`, `updated_at`, `date_entre`, `date_sortie`) VALUES
(10, '02-Jan-2015', '+1 (868) 474-5452', 'Agent', '4', '2023-04-20 16:01:24', '2023-04-20 16:02:36', '2003-11-07', '1977-08-25'),
(11, '12-Mar-1976', '+1 (961) 502-6748', NULL, NULL, '2023-04-20 16:03:53', '2023-04-20 16:03:53', '1975-07-04', '1987-05-02'),
(12, '24-Oct-1974', '+1 (546) 314-8991', 'Validé', '3', '2023-04-25 08:13:31', '2023-04-25 08:13:41', '2007-02-22', '1977-07-23'),
(13, 'ass', 'ssass', 'Non Validé', '4', '2023-04-25 08:54:52', '2023-04-25 08:55:06', '2023-04-25', '2026-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(60, 'Formulaire energie', '2023-04-20 15:34:55', '2023-04-20 15:34:55'),
(61, 'produit 2', '2023-04-25 08:49:03', '2023-04-25 08:49:03'),
(62, 'form 33', '2023-04-29 17:22:04', '2023-04-29 17:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `form_id`, `label`, `type`, `created_at`, `updated_at`, `options`) VALUES
(72, 60, 'nom', 'text', '2023-04-20 15:34:55', '2023-04-20 15:34:55', NULL),
(73, 60, 'prenom', 'text', '2023-04-20 15:34:55', '2023-04-20 15:34:55', NULL),
(74, 60, 'age', 'number', '2023-04-20 15:34:55', '2023-04-20 15:34:55', NULL),
(75, 60, 'type_de_chaufage', 'radio', '2023-04-20 15:34:55', '2023-04-20 15:34:55', '[\"gaz\",\"fuel\",\"electricite\"]'),
(76, 61, 'nom', 'text', '2023-04-25 08:49:03', '2023-04-25 08:49:03', NULL),
(77, 61, 'prenom', 'text', '2023-04-25 08:49:03', '2023-04-25 08:49:03', NULL),
(78, 61, 'nombre', 'number', '2023-04-25 08:49:03', '2023-04-25 08:49:03', NULL),
(79, 61, 'sexe_d\'utulisateur', 'radio', '2023-04-25 08:49:03', '2023-04-25 08:49:03', '[\"homme\",\"femme\"]'),
(80, 61, 'type_', 'checkbox', '2023-04-25 08:49:03', '2023-04-25 08:49:03', '[\"1\",\"2\",\"3\"]'),
(81, 62, 'nom', 'text', '2023-04-29 17:22:04', '2023-04-29 17:22:04', NULL),
(82, 62, 'sexe', 'radio', '2023-04-29 17:22:04', '2023-04-29 17:22:04', '[\"hoe\",\"f\"]');

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `form_id`, `data`, `created_at`, `updated_at`, `agent_id`) VALUES
(14, 60, '[{\"label\":\"nom\",\"reponse\":\"Sifeddine\"},{\"label\":\"prenom\",\"reponse\":\"reg\"},{\"label\":\"age\",\"reponse\":\"33\"},{\"label\":\"type_de_chaufage\",\"reponse\":\"gaz\"}]', '2023-04-20 15:36:10', '2023-04-20 15:36:10', 1),
(15, 60, '[{\"label\":\"nom\",\"reponse\":\"Est saepe eius aute\"},{\"label\":\"prenom\",\"reponse\":\"Est laborum Alias v\"},{\"label\":\"age\",\"reponse\":\"7\"},{\"label\":\"type_de_chaufage\",\"reponse\":\"electricite\"}]', '2023-04-20 15:36:27', '2023-04-20 15:36:27', 1),
(16, 61, '[{\"label\":\"nom\",\"reponse\":\"jsckline\"},{\"label\":\"prenom\",\"reponse\":\"frokline\"},{\"label\":\"nombre\",\"reponse\":\"4\"},{\"label\":\"sexe_d\'utulisateur\",\"reponse\":\"homme\"},{\"label\":\"type_\",\"reponse\":\"3\"}]', '2023-04-25 08:49:40', '2023-04-25 08:49:40', 16),
(17, 61, '[{\"label\":\"nom\",\"reponse\":\"Nostrud molestias el\"},{\"label\":\"prenom\",\"reponse\":\"reg\"},{\"label\":\"nombre\",\"reponse\":\"4\"},{\"label\":\"sexe_d\'utulisateur\",\"reponse\":\"femme\"},{\"label\":\"type_\",\"reponse\":\"1\"}]', '2023-04-25 08:53:14', '2023-04-25 08:53:14', 4),
(18, 62, '[{\"label\":\"nom\",\"reponse\":\"sof\"},{\"label\":\"sexe\",\"reponse\":\"hoe\"}]', '2023-04-29 17:22:37', '2023-04-29 17:22:37', 4);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(10, 'groupe', '2023-04-12 15:39:18', '2023-04-12 15:39:18'),
(11, 'team', '2023-04-12 15:47:49', '2023-04-12 15:47:49'),
(13, 'agents', '2023-04-13 15:52:38', '2023-04-13 15:52:38'),
(14, 'team', '2023-04-29 17:18:45', '2023-04-29 17:18:45'),
(15, 'ddd', '2023-04-29 17:18:54', '2023-04-29 17:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `group_agents`
--

CREATE TABLE `group_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_messages`
--

INSERT INTO `group_messages` (`id`, `sender_id`, `group_id`, `message`, `document_path`, `created_at`, `updated_at`, `sender_name`) VALUES
(135, 1, 10, 'hii', NULL, '2023-04-25 08:44:28', '2023-04-25 08:44:28', 'admin'),
(136, 4, 10, 'hello', NULL, '2023-04-25 08:44:36', '2023-04-25 08:44:36', 'agent'),
(137, 4, 10, NULL, 'remplis.png', '2023-04-25 08:44:44', '2023-04-25 08:44:44', 'agent'),
(138, 1, 15, 'cvcc', NULL, '2023-04-29 17:19:00', '2023-04-29 17:19:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`) VALUES
(10, 1),
(11, 1),
(13, 1),
(14, 1),
(15, 1),
(10, 2),
(11, 2),
(13, 2),
(14, 2),
(15, 2),
(10, 3),
(11, 3),
(13, 3),
(15, 3),
(10, 4),
(13, 4),
(15, 4),
(14, 16),
(14, 17),
(15, 17),
(14, 18);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `document_path`, `created_at`, `updated_at`) VALUES
(340, 2, 4, 'cc', NULL, '2023-04-25 10:47:32', '2023-04-25 10:47:32'),
(341, 4, 2, 'wee', NULL, '2023-04-25 10:47:37', '2023-04-25 10:47:37'),
(342, 4, 2, 'cc', NULL, '2023-04-25 12:01:18', '2023-04-25 12:01:18'),
(343, 3, 2, 'cc', NULL, '2023-04-29 17:07:12', '2023-04-29 17:07:12'),
(344, 2, 3, 'oui', NULL, '2023-04-29 17:12:34', '2023-04-29 17:12:34'),
(345, 2, 3, 'oui', NULL, '2023-04-29 17:12:47', '2023-04-29 17:12:47'),
(346, 2, 3, 'oui', NULL, '2023-04-29 17:13:00', '2023-04-29 17:13:00'),
(347, 3, 2, NULL, 'table.png', '2023-04-29 17:13:09', '2023-04-29 17:13:09'),
(348, 4, 3, 'cc', NULL, '2023-05-02 12:58:15', '2023-05-02 12:58:15'),
(349, 3, 4, NULL, 'table (1).png', '2023-05-02 12:58:24', '2023-05-02 12:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_08_182000_create_permission_tables', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(7, '2023_04_09_162707_create_messages_table', 3),
(13, '2023_04_11_113848_create_groups_table', 4),
(14, '2023_04_11_114155_create_group_has_user_table', 4),
(15, '2023_04_11_124605_modify_group_id_column_in_group_messages_table', 5),
(16, '2023_04_11_145240_create_groups_table', 6),
(17, '2023_04_11_145421_create_group_has_user_table', 6),
(18, '2023_04_11_150057_create_group_messages_table', 7),
(19, '2023_04_11_152357_add_sender_name_column_to_group_messages_table', 8),
(20, '2023_04_17_141942_create_forms_table', 9),
(21, '2023_04_17_142917_create_form_fields_table', 10),
(22, '2023_04_17_153132_add_options_column_form_fields_table', 11),
(24, '2023_04_17_160126_create_form_submissions_table', 12),
(25, '2023_04_18_114652_add_agent_id_column_in_form_submissions_table', 12),
(26, '2023_04_18_133251_create_presence_table', 13),
(27, '2023_04_18_134401_create_user_presence_table', 13),
(28, '2023_04_18_141945_add_attendance_id_column_in_user_presence_table', 14),
(29, '2023_04_19_122733_add_hours_column_to_presence_user_table', 15),
(30, '2023_04_19_143430_add_timetamps_columns_to_presence_user_table', 16),
(31, '2023_04_19_150738_create_entretiens_table', 17),
(32, '2023_04_19_150933_add_column_to_entretiens_table', 18),
(33, '2023_04_19_160528_add_hour_column_to_entretiens_table', 19),
(34, '2023_04_20_113723_change_heure_column_type_from_entretiens_table', 20),
(35, '2023_04_20_131145_create_formations_table', 21),
(36, '2023_04_20_133411_change_objectif_and_status_columns_in_formations_table', 22),
(37, '2023_04_20_154840_add_dates_column_to_formations_table', 23),
(38, '2023_04_25_143822_create_group_agents_table', 24),
(39, '2023_04_25_150725_create_notifications_table', 25),
(42, '2023_04_25_152459_add_recue_column_to_notifications_table', 26),
(43, '2023_04_25_154059_add_notifiable_column_to_notifications_table', 27),
(44, '2023_04_25_160805_create_notifications_table', 28),
(49, '2023_04_27_113030_create_equipes_table', 29),
(54, '2023_04_27_131956_create_tableuax_table', 30),
(55, '2023_04_27_135134_create_tableau_rows_table', 30),
(56, '2023_04_28_105603_change_columns_in_tableau_rows_table', 31),
(57, '2023_04_28_152430_add_date_to_tableau_rows', 32);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(68, 'App\\Models\\User', 16),
(73, 'App\\Models\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('03a171cd-eed0-4856-b841-52dc7e7f8705', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Norif 1\"]', NULL, '2023-05-02 12:45:06', '2023-05-02 12:45:06'),
('077ee251-6aba-4e98-bc13-7e06e851d2ee', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"vsdvs\"]', NULL, '2023-04-27 08:55:07', '2023-04-27 08:55:07'),
('0a945f8d-bab1-42f9-ba2d-a01c95b43949', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Vitae ipsam et amet\"]', '2023-05-02 12:36:39', '2023-04-27 09:08:07', '2023-05-02 12:36:39'),
('0aa74e50-7b97-4476-8684-4a27cbb9b1ef', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Et quasi voluptas ma\"]', '2023-05-02 12:55:00', '2023-05-02 12:47:03', '2023-05-02 12:55:00'),
('0ee4d82f-2cdc-46c2-9de3-03c614dbd2bd', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Ea aspernatur deseru\"]', '2023-05-02 12:54:58', '2023-05-02 12:48:00', '2023-05-02 12:54:58'),
('0feaeece-3192-4b98-a934-ce319a6ef779', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"notif 1\"]', '2023-04-27 09:02:19', '2023-04-27 08:52:33', '2023-04-27 09:02:19'),
('11fb0777-3e47-43bd-a98d-5b304f8bb630', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Est quae quia quis\"]', NULL, '2023-04-27 09:32:47', '2023-04-27 09:32:47'),
('17734f61-3f4f-4d3b-a9cc-cd186e4cee8b', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"notif 1\"]', '2023-04-27 10:40:08', '2023-04-27 08:52:33', '2023-04-27 10:40:08'),
('1da0dfb6-4487-46dc-a925-376c83b6c58e', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 17, '[\"Expedita nulla dolor\"]', NULL, '2023-05-02 12:47:46', '2023-05-02 12:47:46'),
('20f50769-35ad-4ea5-8b3e-3d66413d7263', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Dolorem consequat Q\"]', NULL, '2023-05-02 12:48:06', '2023-05-02 12:48:06'),
('24635a1c-e0dd-477f-9745-18dda4b6d712', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 18, '[\"Expedita nulla dolor\"]', NULL, '2023-05-02 12:47:46', '2023-05-02 12:47:46'),
('31786364-5cec-4879-b9b4-7ab1707984bc', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Et quasi voluptas ma\"]', NULL, '2023-05-02 12:47:03', '2023-05-02 12:47:03'),
('3da0474f-c5fd-4427-82aa-2afdc78d892a', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Ea aspernatur deseru\"]', NULL, '2023-05-02 12:48:00', '2023-05-02 12:48:00'),
('3fa87fda-7b2c-4730-84ea-5b84db975039', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Dolorem consequat Q\"]', NULL, '2023-05-02 12:48:06', '2023-05-02 12:48:06'),
('46424bf8-725a-4185-904a-9303d584e665', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Expedita nulla dolor\"]', NULL, '2023-05-02 12:47:46', '2023-05-02 12:47:46'),
('4727f0ea-3a0f-4ee2-bf19-aafda93c18cb', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Et quasi voluptas ma\"]', '2023-05-02 12:47:13', '2023-05-02 12:47:03', '2023-05-02 12:47:13'),
('507b7b94-5f4f-44c3-9d17-1be95c597128', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Sapiente voluptates\"]', NULL, '2023-04-27 09:06:42', '2023-04-27 09:06:42'),
('5f802848-1b56-4c12-991f-0dee70d11614', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Et quasi voluptas ma\"]', NULL, '2023-05-02 12:47:03', '2023-05-02 12:47:03'),
('608238b1-5701-40d3-81b6-4f6b34c57d57', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Norif 1\"]', '2023-05-02 12:47:15', '2023-05-02 12:45:06', '2023-05-02 12:47:15'),
('656f0e05-17a4-409d-a15b-ba4afe4da7fa', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 17, '[\"Et quasi voluptas ma\"]', NULL, '2023-05-02 12:47:03', '2023-05-02 12:47:03'),
('6acac879-d64d-41ab-b5c8-e96fc1791d0a', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"notif 1\"]', NULL, '2023-04-27 08:52:33', '2023-04-27 08:52:33'),
('758e468a-5528-432c-a732-52b58530ff9f', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Dolorem consequat Q\"]', '2023-05-02 12:54:57', '2023-05-02 12:48:06', '2023-05-02 12:54:57'),
('7d5ff747-3ab8-4ca6-a1d4-f268156dfd77', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Sapiente voluptates\"]', '2023-04-27 09:06:49', '2023-04-27 09:06:42', '2023-04-27 09:06:49'),
('82d3c5a7-5d2d-4769-b97b-d4e8f9ee2b51', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Ea aspernatur deseru\"]', '2023-05-02 12:53:34', '2023-05-02 12:48:00', '2023-05-02 12:53:34'),
('83733f24-96d3-4b2c-8d38-073817b04bee', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 18, '[\"Dolorem consequat Q\"]', NULL, '2023-05-02 12:48:06', '2023-05-02 12:48:06'),
('85b00c10-5779-4d61-8386-8f190d5be24f', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Expedita nulla dolor\"]', '2023-05-02 12:47:53', '2023-05-02 12:47:46', '2023-05-02 12:47:53'),
('86328eea-6c60-4c44-a873-860cb95271df', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"vsdvs\"]', '2023-04-27 08:55:11', '2023-04-27 08:55:07', '2023-04-27 08:55:11'),
('8a07caad-f2ba-4f1a-967a-80597cdc48a1', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 18, '[\"Ea aspernatur deseru\"]', NULL, '2023-05-02 12:48:00', '2023-05-02 12:48:00'),
('8fe14199-142a-4c68-b56a-bb897527e8c9', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Est quae quia quis\"]', '2023-04-28 10:33:37', '2023-04-27 09:32:47', '2023-04-28 10:33:37'),
('96abc31b-52a3-4228-8d01-5f702975aa43', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Sapiente voluptates\"]', '2023-04-27 10:40:12', '2023-04-27 09:06:42', '2023-04-27 10:40:12'),
('9aa6588a-0cf3-45a6-8520-5fd6abcba29e', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 17, '[\"Ea aspernatur deseru\"]', NULL, '2023-05-02 12:48:00', '2023-05-02 12:48:00'),
('9bb7a025-aeb3-40ba-8c1e-5d206ef9b91f', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Dolorem consequat Q\"]', '2023-05-02 12:53:36', '2023-05-02 12:48:06', '2023-05-02 12:53:36'),
('a177b67f-b908-496e-a514-2651083e680e', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Vitae ipsam et amet\"]', '2023-04-27 10:40:13', '2023-04-27 09:08:07', '2023-04-27 10:40:13'),
('ab4063cd-8405-4d29-9b88-82001cf95841', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 17, '[\"Norif 1\"]', NULL, '2023-05-02 12:45:06', '2023-05-02 12:45:06'),
('b6ca114b-9b66-43d0-8d94-a5ab1eb799df', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Norif 1\"]', '2023-05-02 12:55:02', '2023-05-02 12:45:06', '2023-05-02 12:55:02'),
('b85e6c69-ecb6-4696-bebc-cec46632df91', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Sapiente voluptates\"]', '2023-04-28 10:33:38', '2023-04-27 09:06:42', '2023-04-28 10:33:38'),
('b89b31c5-c039-4394-b4af-4a821125b256', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Vitae ipsam et amet\"]', NULL, '2023-04-27 09:08:07', '2023-04-27 09:08:07'),
('c1b0957b-5ff9-4301-90e6-1b36e8a2b03a', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 18, '[\"Et quasi voluptas ma\"]', NULL, '2023-05-02 12:47:03', '2023-05-02 12:47:03'),
('c692db92-e952-4a9d-a4e5-f3e87a38f97e', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Est quae quia quis\"]', '2023-04-27 10:40:15', '2023-04-27 09:32:47', '2023-04-27 10:40:15'),
('cebc470e-d3da-4456-9b51-ab67a908a3ea', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 17, '[\"Dolorem consequat Q\"]', NULL, '2023-05-02 12:48:06', '2023-05-02 12:48:06'),
('d0db06d6-bae1-4dad-9b62-85f0685ecf7d', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 4, '[\"Est quae quia quis\"]', '2023-05-02 12:36:37', '2023-04-27 09:32:47', '2023-05-02 12:36:37'),
('d8d8b338-837d-499d-ae94-c7c94e82e40e', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Expedita nulla dolor\"]', NULL, '2023-05-02 12:47:46', '2023-05-02 12:47:46'),
('de874a5b-f72e-4ae2-8e62-5c51f7767712', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 18, '[\"Norif 1\"]', NULL, '2023-05-02 12:45:06', '2023-05-02 12:45:06'),
('e747ae92-6bb8-4a86-8d07-f0f5df7750fc', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 16, '[\"Norif 1\"]', NULL, '2023-05-02 12:45:06', '2023-05-02 12:45:06'),
('e8d8b45e-bee6-46f0-9794-cdf15be86d4f', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"vsdvs\"]', '2023-04-28 10:33:34', '2023-04-27 08:55:07', '2023-04-28 10:33:34'),
('ec4e7805-82e7-4a9c-84ac-6ff89e3b8c3b', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"vsdvs\"]', '2023-04-27 10:40:10', '2023-04-27 08:55:07', '2023-04-27 10:40:10'),
('efe941f0-2870-4f58-805c-cdc0bf176e62', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Vitae ipsam et amet\"]', '2023-04-28 10:33:36', '2023-04-27 09:08:07', '2023-04-28 10:33:36'),
('f7a335c7-b948-4871-89d4-d209dc20b9a7', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"Ea aspernatur deseru\"]', NULL, '2023-05-02 12:48:00', '2023-05-02 12:48:00'),
('f9326f22-0e8d-4b8b-aea2-8e6a4a597720', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 1, '[\"notif 1\"]', '2023-04-28 10:33:33', '2023-04-27 08:52:33', '2023-04-28 10:33:33'),
('fc52e74e-0f7a-4cb0-9436-5431bacb147a', 'App\\Notifications\\NotificationRh', 'App\\Models\\User', 3, '[\"Expedita nulla dolor\"]', '2023-05-02 12:54:59', '2023-05-02 12:47:46', '2023-05-02 12:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(68, 'chat', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(69, 'G-utilisateurs', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(70, 'G-groupes', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(71, 'G-conversations', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(72, 'G-formulaires', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(73, 'remplissage-fromulaire', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(74, 'G-présence', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(75, 'G-entretiens', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(76, 'G-formations', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(80, 'statistique-agent', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(81, 'G-codes', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(82, 'Tableau-agents', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(83, 'Tableau-RDV', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(84, 'G-notifications', 'web', '2023-04-17 15:16:43', '2023-04-17 15:16:43'),
(85, 'G-calendrier', 'web', NULL, NULL),
(86, 'calcule', 'web', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presence`
--

CREATE TABLE `presence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presence`
--

INSERT INTO `presence` (`id`, `date`, `created_at`, `updated_at`) VALUES
(60, '2023-04-19', '2023-04-19 14:47:09', '2023-04-19 14:47:09'),
(61, '2000-04-19', '2023-04-19 14:47:38', '2023-04-19 14:47:38'),
(62, '2023-04-19', '2023-04-19 14:58:56', '2023-04-19 14:58:56'),
(63, '2019-08-19', '2023-04-20 11:05:16', '2023-04-20 11:05:16'),
(64, '2023-04-25', '2023-04-25 08:55:48', '2023-04-25 08:55:48'),
(65, '2023-05-02', '2023-05-02 10:06:48', '2023-05-02 10:06:48'),
(66, '1987-03-30', '2023-05-02 10:42:44', '2023-05-02 10:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `presence_user`
--

CREATE TABLE `presence_user` (
  `presence_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `presence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `hours` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `justificatif` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presence_user`
--

INSERT INTO `presence_user` (`presence_id`, `user_id`, `presence`, `id`, `hours`, `created_at`, `updated_at`, `justificatif`) VALUES
(60, 1, 'present', 215, NULL, '2023-04-19 14:47:09', '2023-04-19 14:47:09', NULL),
(60, 2, 'absent', 216, NULL, '2023-04-19 14:47:09', '2023-04-19 14:47:09', NULL),
(60, 3, 'en-retard', 217, 3, '2023-04-19 14:47:09', '2023-04-19 14:47:09', NULL),
(60, 4, 'décharge', 218, 4, '2023-04-19 14:47:09', '2023-04-19 14:47:09', NULL),
(61, 1, 'present', 219, NULL, '2023-04-19 14:47:38', '2023-04-19 14:47:38', NULL),
(61, 2, 'absent', 220, NULL, '2023-04-19 14:47:38', '2023-04-19 14:47:38', NULL),
(61, 3, 'en-retard', 221, 2, '2023-04-19 14:47:38', '2023-04-19 14:47:38', NULL),
(61, 4, 'décharge', 222, 4, '2023-04-19 14:47:38', '2023-04-19 14:47:38', NULL),
(62, 1, 'present', 223, NULL, '2023-04-19 14:58:56', '2023-04-19 14:58:56', NULL),
(62, 2, 'absent', 224, NULL, '2023-04-19 14:58:56', '2023-04-19 14:58:56', NULL),
(62, 3, 'en-retard', 225, 2, '2023-04-19 14:58:56', '2023-04-19 14:58:56', NULL),
(62, 4, 'absent', 226, 2, '2023-04-19 14:58:56', '2023-04-19 14:58:56', NULL),
(63, 1, 'absent', 227, NULL, '2023-04-20 11:05:16', '2023-04-20 11:05:16', NULL),
(63, 2, 'present', 228, NULL, '2023-04-20 11:05:16', '2023-04-20 11:05:16', NULL),
(63, 3, 'absent', 229, NULL, '2023-04-20 11:05:16', '2023-04-20 11:05:16', NULL),
(63, 4, 'present', 230, 16, '2023-04-20 11:05:16', '2023-04-20 11:05:16', NULL),
(64, 1, 'present', 231, NULL, '2023-04-25 08:55:48', '2023-04-25 08:55:48', NULL),
(64, 2, 'en-retard', 232, 1, '2023-04-25 08:55:48', '2023-04-25 08:55:48', NULL),
(64, 3, 'present', 233, NULL, '2023-04-25 08:55:48', '2023-04-25 08:55:48', NULL),
(64, 4, 'décharge', 234, 1, '2023-04-25 08:55:48', '2023-04-25 08:55:48', NULL),
(64, 16, 'décharge', 235, 2, '2023-04-25 08:55:48', '2023-04-25 08:55:48', NULL),
(66, 2, 'en-retard', 236, 50, '2023-05-02 10:42:44', '2023-05-02 10:42:44', NULL),
(66, 3, 'en-retard', 237, 90, '2023-05-02 10:42:44', '2023-05-02 10:42:44', NULL),
(66, 4, 'absent', 238, 3, '2023-05-02 10:42:44', '2023-05-02 10:42:44', NULL),
(66, 16, 'décharge', 239, 86, '2023-05-02 10:42:44', '2023-05-02 10:42:44', NULL),
(66, 17, 'en-retard', 240, 9, '2023-05-02 10:42:44', '2023-05-02 10:42:44', NULL),
(66, 18, 'décharge', 241, 87, '2023-05-02 10:42:44', '2023-05-02 10:42:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'web', '2023-04-08 18:25:29', '2023-04-08 18:25:29'),
(2, 'RH', 'web', '2023-04-08 18:25:29', '2023-04-08 18:25:29'),
(3, 'CE', 'web', '2023-04-08 18:25:29', '2023-04-08 18:25:29'),
(4, 'AGENT', 'web', '2023-04-08 18:25:29', '2023-04-08 18:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(68, 1),
(68, 2),
(68, 3),
(68, 4),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(73, 4),
(74, 2),
(75, 2),
(76, 2),
(80, 2),
(81, 3),
(82, 3),
(83, 3),
(84, 2),
(85, 2),
(86, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salaires`
--

CREATE TABLE `salaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(127) NOT NULL,
  `date` date NOT NULL,
  `salaire` int(127) NOT NULL,
  `assuidité` int(127) NOT NULL,
  `prime` int(127) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaires`
--

INSERT INTO `salaires` (`id`, `agent_id`, `date`, `salaire`, `assuidité`, `prime`, `created_at`, `updated_at`) VALUES
(1, 4, '2023-04-01', 1770, 500, 2000, '2023-04-28 14:02:25', '2023-04-28 14:02:25'),
(6, 4, '2023-05-31', 7668, 500, 2000, '2023-05-02 10:58:03', '2023-05-02 10:58:03'),
(7, 4, '2023-06-30', 17693, 500, 2000, '2023-05-02 10:58:25', '2023-05-02 10:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `tableaux`
--

CREATE TABLE `tableaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipe_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tableaux`
--

INSERT INTO `tableaux` (`id`, `equipe_id`, `date`, `created_at`, `updated_at`) VALUES
(40, 11, '2023-04-28', '2023-04-28 14:29:35', '2023-04-28 14:29:35'),
(41, 11, '1980-09-30', '2023-04-28 14:32:11', '2023-05-02 10:01:31'),
(42, 11, '2023-05-02', '2023-05-02 09:23:45', '2023-05-02 09:23:45'),
(43, 11, '2023-05-03', '2023-05-02 09:27:36', '2023-05-02 09:27:36'),
(44, 11, '2023-05-04', '2023-05-02 09:27:47', '2023-05-02 09:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `tableau_rows`
--

CREATE TABLE `tableau_rows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tableau_id` bigint(20) UNSIGNED NOT NULL,
  `agent` bigint(20) UNSIGNED NOT NULL,
  `Rdv_brut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rdv_confirme_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rdv_ouverture_de_porte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rdv_annuler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tableau_rows`
--

INSERT INTO `tableau_rows` (`id`, `tableau_id`, `agent`, `Rdv_brut`, `Rdv_confirme_telephone`, `Rdv_ouverture_de_porte`, `Rdv_annuler`, `created_at`, `updated_at`, `date`) VALUES
(74, 40, 4, '2', '2', '2', '2', '2023-04-28 14:29:35', '2023-04-28 14:29:35', '2023-04-28'),
(75, 40, 17, '3', '3', '3', '3', '2023-04-28 14:29:35', '2023-04-28 14:29:35', '2023-04-28'),
(76, 40, 18, '4', '4', '4', '4', '2023-04-28 14:29:35', '2023-04-28 14:29:35', '2023-04-28'),
(78, 41, 4, '7', '19', '71', '52', '2023-04-28 14:32:11', '2023-04-28 14:32:11', '1980-09-30'),
(79, 41, 17, '28', '67', '26', '38', '2023-04-28 14:32:11', '2023-04-28 14:32:11', '1980-09-30'),
(80, 41, 18, '36', '100', '25', '39', '2023-04-28 14:32:11', '2023-04-28 14:32:11', '1980-09-30'),
(82, 42, 4, '1', '1', '1', '1', '2023-05-02 09:23:45', '2023-05-02 09:23:45', '2023-05-02'),
(83, 42, 17, '1', '1', '1', '1', '2023-05-02 09:23:45', '2023-05-02 09:23:45', '2023-05-02'),
(84, 42, 18, '1', '1', '1', '1', '2023-05-02 09:23:45', '2023-05-02 09:23:45', '2023-05-02'),
(86, 43, 4, '1', '1', '1', '1', '2023-05-02 09:27:36', '2023-05-02 09:27:36', '2023-05-03'),
(87, 43, 17, '1', '1', '1', '1', '2023-05-02 09:27:36', '2023-05-02 09:27:36', '2023-05-03'),
(88, 43, 18, '1', '1', '1', '1', '2023-05-02 09:27:36', '2023-05-02 09:27:36', '2023-05-03'),
(90, 44, 4, '1', '1', '1', '1', '2023-05-02 09:27:47', '2023-05-02 09:27:47', '2023-05-04'),
(91, 44, 17, '1', '1', '1', '1', '2023-05-02 09:27:47', '2023-05-02 09:27:47', '2023-05-04'),
(92, 44, 18, '1', '1', '1', '1', '2023-05-02 09:27:47', '2023-05-02 09:27:47', '2023-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$uYUNNG.vsLY8PzllYe8QjOrtbS6snNuQ0jtpsSjn7a2U1c71Vb5Uy', NULL, NULL, NULL, NULL, '2023-04-08 18:57:06', '2023-04-08 18:57:06'),
(2, 'rh', 'rh@gmail.com', NULL, '$2y$10$aAdoPgzfAy1KTZCIylvG7O/Cosgq4BeKIYVCiS1bpwk2uv9AGeLfO', NULL, NULL, NULL, NULL, '2023-04-08 18:57:06', '2023-04-08 18:57:06'),
(3, 'chef', 'chef@gmail.com', NULL, '$2y$10$ubOWUHrt6jtDDY2nSY1TrOSccBA/1DuEf1ri4FDSpr4yRxIGvPinm', NULL, NULL, NULL, NULL, '2023-04-08 18:57:06', '2023-04-08 18:57:06'),
(4, 'agent', 'agent@gmail.com', NULL, '$2y$10$TG4See.AiqzGO.6mgJ2obOkPwumjKHwXr4DeLo.Tmgkc522Z2Bl3S', NULL, NULL, NULL, NULL, '2023-04-08 18:57:06', '2023-04-08 18:57:06'),
(16, 'Loading', 'Loading@gmail.com', NULL, '$2y$10$ljkxp2pFYXWvN396o6aHE.y4vTTPJtrmeni9c3L35p5vFuLVWuAE6', NULL, NULL, NULL, NULL, '2023-04-25 08:46:25', '2023-04-25 08:46:59'),
(17, 'Ima Gates', 'rimupijo@mailinator.com', NULL, '$2y$10$vMxhpLouq3m1bTbo.4ZJNOCykyhkzJyW/AW211NQeXJV60vI.2Wvi', NULL, NULL, NULL, NULL, '2023-04-28 08:58:11', '2023-04-28 08:58:11'),
(18, 'Dennis Noble', 'wupuhyr@mailinator.com', NULL, '$2y$10$u4ia0iv.3C8MxWYTnbd8x.vWBTFB0f7b3oV4S2pHElskEvbzjdLSa', NULL, NULL, NULL, NULL, '2023-04-28 08:58:44', '2023-04-28 08:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendriers`
--
ALTER TABLE `calendriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entretiens`
--
ALTER TABLE `entretiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_fields_form_id_foreign` (`form_id`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_submissions_form_id_foreign` (`form_id`),
  ADD KEY `form_submissions_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_agents`
--
ALTER TABLE `group_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_messages_group_id_foreign` (`group_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `group_has_user_group_id_foreign` (`group_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presence_user`
--
ALTER TABLE `presence_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_presence_prensence_id_foreign` (`presence_id`),
  ADD KEY `user_presence_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaires`
--
ALTER TABLE `salaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableaux`
--
ALTER TABLE `tableaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tableaux_equipe_id_foreign` (`equipe_id`);

--
-- Indexes for table `tableau_rows`
--
ALTER TABLE `tableau_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tableau_rows_tableau_id_foreign` (`tableau_id`),
  ADD KEY `tableau_rows_agent_foreign` (`agent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendriers`
--
ALTER TABLE `calendriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `entretiens`
--
ALTER TABLE `entretiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `group_agents`
--
ALTER TABLE `group_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `presence_user`
--
ALTER TABLE `presence_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaires`
--
ALTER TABLE `salaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tableaux`
--
ALTER TABLE `tableaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tableau_rows`
--
ALTER TABLE `tableau_rows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD CONSTRAINT `form_fields_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD CONSTRAINT `form_submissions_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_submissions_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD CONSTRAINT `group_messages_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_has_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_has_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presence_user`
--
ALTER TABLE `presence_user`
  ADD CONSTRAINT `user_presence_prensence_id_foreign` FOREIGN KEY (`presence_id`) REFERENCES `presence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_presence_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tableaux`
--
ALTER TABLE `tableaux`
  ADD CONSTRAINT `tableaux_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tableau_rows`
--
ALTER TABLE `tableau_rows`
  ADD CONSTRAINT `tableau_rows_agent_foreign` FOREIGN KEY (`agent`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tableau_rows_tableau_id_foreign` FOREIGN KEY (`tableau_id`) REFERENCES `tableaux` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
