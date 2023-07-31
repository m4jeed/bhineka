/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : bhineka

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 31/07/2023 14:36:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES (8, 2, 'PR01', 'Ban Luar', '034/TD/XII/2023', 'PCS', '10', '2300000', '23000000', '2023-07-31 03:07:28', '2023-07-31 03:07:28');
INSERT INTO `invoice` VALUES (9, 2, 'PR02', 'Baut Ukuran 18', '034/TD/XII/2023', 'Dus', '5', '110000', '550000', '2023-07-31 03:08:19', '2023-07-31 03:08:19');
INSERT INTO `invoice` VALUES (10, 2, 'PR03', 'Oli Mesin', '034/TD/XII/2023', 'Liter', '19', '125000', '2375000', '2023-07-31 03:09:22', '2023-07-31 03:09:22');
INSERT INTO `invoice` VALUES (11, 2, 'PR003', 'Baut Ukuran 15', '034/TD/XII/2023', 'PCS', '5', '20000', '100000', '2023-07-31 05:12:11', '2023-07-31 05:12:11');
INSERT INTO `invoice` VALUES (12, 2, 'PR009', 'Baut Ukuran 19', '034/TD/XII/2023', 'PCS', '-1', '30000', '-30000', '2023-07-31 05:22:12', '2023-07-31 05:22:12');
INSERT INTO `invoice` VALUES (13, 2, 'PR011', 'Baut Ukuran 20', '034/TD/XII/2023', 'PCS', '-1', '30000', '-30000', '2023-07-31 05:23:05', '2023-07-31 05:23:05');
INSERT INTO `invoice` VALUES (14, 2, 'PR19', 'ban luar dalam', '034/TD/XII/2023', 'PCS', '-1', '30000', '-30000', '2023-07-31 05:28:24', '2023-07-31 05:28:24');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_07_29_020055_create_invoice_table', 2);
INSERT INTO `migrations` VALUES (10, '2023_07_29_044705_add_total_harga_to_invoice_table', 3);
INSERT INTO `migrations` VALUES (11, '2023_07_29_070341_add_alamat_to_users_table', 4);
INSERT INTO `migrations` VALUES (12, '2023_07_29_071022_add_alamat_column_to_users_table', 5);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Superadmin', 'superadmin@gmail.com', '2023-07-29 05:24:53', '$2y$10$6ULS8HZZVHH2X9Am6OLo3u0NaShfB0AhQWpIdWHXMJmYTasBXxvWG', 'PT.Bhineka', NULL, NULL, '2023-07-29 05:24:53', '2023-07-29 05:24:53');
INSERT INTO `users` VALUES (2, 'Robert', 'robert@gmail.com', '2023-07-29 12:25:55', '$2y$10$6ULS8HZZVHH2X9Am6OLo3u0NaShfB0AhQWpIdWHXMJmYTasBXxvWG', 'PT. SENTOSA', 'Jl. Baypass Cirebon', NULL, '2023-07-29 05:24:53', '2023-07-29 05:24:53');
INSERT INTO `users` VALUES (5, 'Yayah Inayah S.', 'yayahInayahs@gmail.com', '2023-07-30 13:32:04', '$2y$10$t4vdRrY7oYfg9u.Ibjo96u1sTI8vZk0rLVAHWjNPIHfM7GmuAmafy', 'PT. Empat Lima Enam', 'Jakarta Selatan', NULL, '2023-07-30 13:15:35', '2023-07-30 13:32:04');

SET FOREIGN_KEY_CHECKS = 1;
