-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 juin 2023 à 14:40
-- Version du serveur : 8.0.32
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sns-project`
--

-- --------------------------------------------------------

--
-- Structure de la table `artisans`
--

DROP TABLE IF EXISTS `artisans`;
CREATE TABLE IF NOT EXISTS `artisans` (
  `artisan_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`artisan_id`),
  KEY `artisans_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artisans`
--

INSERT INTO `artisans` (`artisan_id`, `user_id`, `company_name`, `company_address`, `description`, `profile_picture`, `created_at`, `updated_at`) VALUES
(11, 1, 'John Doe', '123 Main St', 'Experienced plumber specializing in residential plumbing repairs.', 'https://www.expert-chantier.fr/assets/components/phpthumbof/cache/Definir-taux-horaire-artisan-btp.f0e06343dbddff9666ef083d1ba8f9d4.jpg', '2023-06-11 21:24:46', '2023-06-11 21:24:46'),
(12, 2, 'Jane Smith', '456 Elm St', 'Skilled electrician providing electrical installation and repair services.', 'https://www.expert-chantier.fr/assets/components/phpthumbof/cache/Definir-taux-horaire-artisan-btp.f0e06343dbddff9666ef083d1ba8f9d4.jpg', '2023-06-11 21:24:46', '2023-06-11 21:24:46'),
(13, 3, 'Mark Johnson', '789 Oak St', 'Expert carpenter offering custom woodworking and furniture making.', 'https://www.expert-chantier.fr/assets/components/phpthumbof/cache/Definir-taux-horaire-artisan-btp.f0e06343dbddff9666ef083d1ba8f9d4.jpg', '2023-06-11 21:24:46', '2023-06-11 21:24:46');

-- --------------------------------------------------------

--
-- Structure de la table `artisan_services`
--

DROP TABLE IF EXISTS `artisan_services`;
CREATE TABLE IF NOT EXISTS `artisan_services` (
  `artisan_id` int UNSIGNED NOT NULL,
  `service_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`artisan_id`,`service_id`),
  KEY `artisan_services_service_id_foreign` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artisan_services`
--

INSERT INTO `artisan_services` (`artisan_id`, `service_id`, `created_at`, `updated_at`) VALUES
(11, 2, '2023-06-12 02:22:43', '2023-06-12 02:22:43'),
(11, 4, '2023-06-12 11:41:44', '2023-06-12 11:41:44'),
(11, 5, '2023-06-12 02:18:39', '2023-06-12 02:18:39'),
(11, 7, NULL, NULL),
(11, 8, '2023-06-12 11:49:05', '2023-06-12 11:49:05'),
(12, 7, NULL, NULL),
(13, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
CREATE TABLE IF NOT EXISTS `availabilities` (
  `availability_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `artisan_id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`availability_id`),
  KEY `availabilities_artisan_id_foreign` (`artisan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(48, '2014_10_12_000000_create_users_table', 1),
(49, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(50, '2019_08_19_000000_create_failed_jobs_table', 1),
(51, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(52, '2023_06_11_022502_create_artisans_table', 1),
(53, '2023_06_11_023052_create_services_table', 1),
(54, '2023_06_11_023247_create_availabilities_table', 1),
(55, '2023_06_11_023422_create_requests_table', 1),
(56, '2023_06_11_195733_create_artisan_services_table', 1),
(57, '2023_06_11_222445_create_reviews_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 1, 'main', 'c00b4ac9a38e5257f8d080f6b2270c30b7f522e77eaffab93ec33a20c98ff4cc', '[\"*\"]', '2023-06-12 01:05:00', NULL, '2023-06-12 01:04:59', '2023-06-12 01:05:00');

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `service_id` int UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_requested` date NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`request_id`),
  KEY `requests_user_id_foreign` (`user_id`),
  KEY `requests_service_id_foreign` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `artisan_id` int UNSIGNED NOT NULL,
  `rating` double(8,2) NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reviewed` date NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_artisan_id_foreign` (`artisan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `artisan_id`, `rating`, `review_text`, `date_reviewed`) VALUES
(1, 1, 11, 4.50, 'Great service!', '2023-06-01'),
(2, 2, 12, 3.50, 'Average workmanship.', '2023-06-02'),
(3, 3, 13, 5.00, 'Highly recommended!', '2023-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_description`, `created_at`, `updated_at`) VALUES
(1, 'Plumbing', 'Expert plumbing services for residential and commercials.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(2, 'Electrical Repair', 'Professional electrical repair and installation services.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(3, 'Carpentry', 'Skilled carpentry services for construction and furniture.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(4, 'Painting', 'High-quality painting services for interiors and exteriors.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(5, 'Landscaping', 'Beautiful landscaping services for gardens and outdoor spaces.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(6, 'Cleaning', 'Thorough cleaning services for homes and offices.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(7, 'Home Renovation', 'Complete home renovation and remodeling services.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(8, 'Roofing', 'Professional services for residential and commercial.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(9, 'HVAC Installation', 'Efficient HVAC installation and repair services.', '2023-06-11 20:20:05', '2023-06-11 20:20:05'),
(10, 'Interior Design', 'Creative interior design services for homes and businesses.', '2023-06-11 20:20:05', '2023-06-11 20:20:05');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sami Agourram', 'agourram.ma@gmail.com', NULL, '$2y$10$Dd3xRnpr0jOcJ/v0PmsKCudM09Teje4bp.jREz0ZYbl9q/o7pA.xG', NULL, '2023-06-11 18:26:52', '2023-06-11 18:26:52'),
(2, 'MEHDI AGOURRAM', 'Sami.AGOURRAM@um6p.ma', NULL, '$2y$10$2YJctmyAVI5i6AMo.Tk6c.Cf4Y53I.JlpN6Xea98KOWd0AOYtqBKC', NULL, '2023-06-11 19:23:05', '2023-06-11 19:23:05'),
(3, 'MOHAMMED AGOURRAM', 'agourramed6@gmail.com', NULL, '$2y$10$BB03DiYXqWo2xoJwGWxZDuJAAkz3wbgSnx609s7Ll6/puRnzLVcn6', NULL, '2023-06-11 19:23:46', '2023-06-11 19:23:46');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artisans`
--
ALTER TABLE `artisans`
  ADD CONSTRAINT `artisans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `artisan_services`
--
ALTER TABLE `artisan_services`
  ADD CONSTRAINT `artisan_services_artisan_id_foreign` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`artisan_id`),
  ADD CONSTRAINT `artisan_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Contraintes pour la table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_artisan_id_foreign` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`artisan_id`);

--
-- Contraintes pour la table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_artisan_id_foreign` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`artisan_id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
