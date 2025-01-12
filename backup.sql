-- MySQL dump 10.13  Distrib 9.1.0, for Win64 (x86_64)
--
-- Host: localhost    Database: uye
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@uye.test|127.0.0.1','i:1;',1735811001),('admin@uye.test|127.0.0.1:timer','i:1735811001;',1735811001),('taufikhamid@gmail.com|127.0.0.1','i:1;',1734682041),('taufikhamid@gmail.com|127.0.0.1:timer','i:1734682041;',1734682041);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Food','food','2024-12-19 22:46:27','2024-12-19 22:46:27'),(2,'Services','services','2024-12-19 22:46:27','2024-12-19 22:46:27'),(3,'Merchandise','merchandise','2024-12-19 22:46:27','2024-12-19 22:46:27'),(5,'at',NULL,'2024-12-20 00:25:22','2024-12-20 00:25:22'),(6,'dolorum',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(7,'libero',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(8,'et',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(9,'doloribus',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(10,'dignissimos',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(11,'quibusdam',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(12,'incidunt',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(13,'quidem',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(14,'consequatur',NULL,'2024-12-20 00:25:23','2024-12-20 00:25:23');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `photos` json DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listings_user_id_foreign` (`user_id`),
  KEY `listings_category_id_foreign` (`category_id`),
  CONSTRAINT `listings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (2,'Enim autem at harum modi.','Unde aliquam magnam dolore. Quod ipsa necessitatibus ipsa quaerat omnis sit id. Eveniet sit rerum vel explicabo voluptatibus perferendis.',119.35,1,'[\"https://via.placeholder.com/640x480.png/002255?text=cupiditate\"]',4,5,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(3,'Rerum rerum quaerat rerum qui in.','Debitis officiis quasi nobis maxime quo nemo magnam. Id molestiae debitis optio et fugit. Qui esse molestiae quisquam sapiente est aliquam. Deserunt possimus dolores dolorem natus.',56.16,1,'[\"https://via.placeholder.com/640x480.png/007788?text=est\"]',5,6,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(4,'Et explicabo inventore sint officiis et et consequuntur.','Ab repellendus occaecati nemo qui provident illum. Autem vero vitae alias qui iste aut et. Similique ea eius quia ipsum et id.',287.62,1,'[\"https://via.placeholder.com/640x480.png/0077bb?text=dolorum\"]',6,7,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(5,'Sit ut dolores voluptatem.','Itaque neque facere provident enim non ipsa. Ut omnis perspiciatis aut nihil blanditiis ratione. In quasi in ab veniam et.',522.51,1,'[\"https://via.placeholder.com/640x480.png/0088bb?text=blanditiis\"]',7,8,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(6,'Voluptas itaque earum exercitationem saepe veritatis ut.','Sunt perspiciatis error autem nihil. Et laudantium quos veniam vel est. Voluptatem itaque porro soluta molestiae. Est ut fuga facere neque excepturi.',332.63,1,'[\"https://via.placeholder.com/640x480.png/0000bb?text=magnam\"]',8,9,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(7,'Iste id officia quia qui.','Aut ea et maiores ex voluptatum dolor. Voluptatibus nisi velit ratione ab rerum voluptate. Sint repellat dicta ipsum doloribus voluptates corporis. Blanditiis quibusdam provident totam officiis nulla nobis.',668.52,1,'[\"https://via.placeholder.com/640x480.png/000077?text=aspernatur\"]',9,10,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(8,'Perspiciatis eos error rerum aut quae dolor nihil.','Laboriosam qui et qui similique nemo omnis numquam. Nam possimus nostrum minus earum nobis dolor voluptatibus. Qui dignissimos et fugit maiores qui recusandae accusantium. Amet officiis nam veniam odio rerum fugiat minus. Quis laborum ullam earum quasi vero optio.',14.84,1,'[\"https://via.placeholder.com/640x480.png/0044dd?text=inventore\"]',10,11,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(9,'Vero sed cum odio ut nisi voluptatem.','Molestiae magni voluptate molestiae explicabo quis. Nemo autem omnis est vel rerum ea placeat maiores. Saepe ea corrupti corporis rerum tempore praesentium suscipit.',336.29,1,'[\"https://via.placeholder.com/640x480.png/00aa11?text=molestiae\"]',11,12,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(10,'Tempora accusamus sint quaerat laborum enim aut est.','Omnis molestiae alias dolores possimus nobis voluptatibus dolores in. Possimus temporibus quas harum voluptatem. Culpa veniam quae accusamus possimus et. Consequatur impedit sint assumenda laboriosam.',830.32,1,'[\"https://via.placeholder.com/640x480.png/00cccc?text=rerum\"]',12,13,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(11,'Minus sapiente voluptas iusto error saepe.','Minima cumque quia velit quo minima. Debitis et consequatur aut provident dolores fugit in et. Est id quidem eos dolor. Atque consequatur sunt aut.',963.63,1,'[\"https://via.placeholder.com/640x480.png/00cc44?text=alias\"]',13,14,'2024-12-20 00:25:23','2024-12-20 00:25:23'),(12,'asd','asd',123.12,1,NULL,3,1,'2024-12-20 01:58:09','2024-12-20 01:58:09');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (10,'2024_12_19_085420_add_photos_to_listings_table',1),(20,'0001_01_01_000000_create_users_table',2),(21,'0001_01_01_000001_create_cache_table',2),(22,'0001_01_01_000002_create_jobs_table',2),(23,'2024_12_13_085041_add_role_to_users_table',2),(24,'2024_12_13_151509_add_profile_fields_to_users_table',2),(25,'2024_12_17_032125_add_country_code_to_user_table',2),(26,'2024_12_17_042749_drop_country_code_from_users_table',2),(27,'2024_12_19_083945_create_categories_table',2),(28,'2024_12_19_084817_create_listings_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('dmJkGV5vw1RDJBUO2XxQGfPi4IqcbYKqIjbmyPk8',15,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT3BydXVxNDBKWGljeUl3VUZQY0lLU1gwT0ZwNmFLVnJOVVRrbTU0dyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vdXllLnRlc3QvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTU7fQ==',1736671835),('IlESOaZQPbG59FcfxyzWUgv6pF1x6rmHB7Nikpwd',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.14.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTJxeEZKdGtMS291VzRRM2pLb2QwYWcyMTdkQ0JkUmZQR3pwbEpYTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vdXllLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1736682047),('oheeJbfNL1sn5WzkEppOz7gwjNIBLI2D57GwkOga',14,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFBtMzdFdUJ4MHNZREY5Y0RrRUFRUXRoV2J1MXZHdE53U01qeU1kdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vdXllLnRlc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTQ7fQ==',1736682081);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Test User',NULL,'test@example.com',NULL,NULL,'2024-12-20 00:08:00','$2y$12$gYBz6aXkMQXUtAzULHv79.xufmtK5N9tt0wJ/nVKrMrqfvwFzSdA2','student','IrhVTP7wAK','2024-12-20 00:08:00','2024-12-20 00:08:00'),(4,'Daisy Kovacek',NULL,'ykautzer@example.com',NULL,NULL,'2024-12-20 00:25:22','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','LIC9OXuKc7','2024-12-20 00:25:22','2024-12-20 00:25:22'),(5,'Ivory Will',NULL,'jgerlach@example.com',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','Dpt5vCGPc1','2024-12-20 00:25:23','2024-12-20 00:25:23'),(6,'Dr. Nils Glover',NULL,'kconn@example.org',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','iH4JDhYtSK','2024-12-20 00:25:23','2024-12-20 00:25:23'),(7,'Assunta Walsh',NULL,'sammie.parker@example.net',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','3JW3CCvpaT','2024-12-20 00:25:23','2024-12-20 00:25:23'),(8,'Miss Aiyana Braun',NULL,'aida82@example.org',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','NTuny0eqaV','2024-12-20 00:25:23','2024-12-20 00:25:23'),(9,'Prof. Gregg Hartmann MD',NULL,'charity.mclaughlin@example.net',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','TmLLYggPoo','2024-12-20 00:25:23','2024-12-20 00:25:23'),(10,'Helena Barrows',NULL,'jonathon60@example.net',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','FWYJ6HCFia','2024-12-20 00:25:23','2024-12-20 00:25:23'),(11,'Abdiel Oberbrunner',NULL,'greyson41@example.com',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','dkyBeWgEmi','2024-12-20 00:25:23','2024-12-20 00:25:23'),(12,'Johathan Cummerata',NULL,'jimmie.hane@example.org',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','aLwestZ6xT','2024-12-20 00:25:23','2024-12-20 00:25:23'),(13,'Floy Mraz',NULL,'sydnie.frami@example.net',NULL,NULL,'2024-12-20 00:25:23','$2y$12$hLDZGR4sFIt8aeS.Mb.3.OgRN2bCgTks2h0oRLmoLn5xFxt64KN7K','student','74dkaZi2Ne','2024-12-20 00:25:23','2024-12-20 00:25:23'),(14,'taufik',NULL,'taufik@taufik.com','0183686074',NULL,NULL,'$2y$12$oOiFeL6xn4fY.vt1owAIo.KiKhKW7LmJ1ilCAQARHmHKcKiIV6UPy','student','J4VOTyO3QjROOPBCsGHHFEs6FIqFLzdMdM2LgIbQS9cOoMrwN5FMcGS3Z8e7','2025-01-11 19:58:44','2025-01-11 19:58:44'),(15,'taufik',NULL,'taufik1@taufik.com','123456789',NULL,NULL,'$2y$12$eZV4Ft1j8M7uMrt4IqsgSOZZTcHJvhJ.UZ6W9u.EQXPRA8RLPd.Ea','student',NULL,'2025-01-11 20:19:15','2025-01-11 20:19:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-12 20:24:18
