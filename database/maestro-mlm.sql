/*
 Navicat Premium Data Transfer

 Source Server         : Z-99-Localhost
 Source Server Type    : MySQL
 Source Server Version : 80035 (8.0.35)
 Source Host           : localhost:3306
 Source Schema         : maestro-mlm

 Target Server Type    : MySQL
 Target Server Version : 80035 (8.0.35)
 File Encoding         : 65001

 Date: 25/01/2024 00:17:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'admin', 'admin@admin.com', '$2y$12$lGwZjlIuHDeoAoQEUUlVmedehp5G5IRSihPai0D4CMFfsjaACl2tK', 0, NULL, '2023-12-30 19:04:39', '2023-12-30 19:04:39');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `parent_category_id` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Normal', NULL, '2024-01-21 23:26:11', NULL);
INSERT INTO `categories` VALUES (2, 'Basic', NULL, '2024-01-21 23:26:20', NULL);
INSERT INTO `categories` VALUES (3, 'Premium', NULL, '2024-01-21 23:26:25', NULL);
INSERT INTO `categories` VALUES (4, 'Gold', NULL, '2024-01-21 23:26:28', NULL);
INSERT INTO `categories` VALUES (5, 'Business', NULL, '2024-01-21 23:26:35', NULL);
INSERT INTO `categories` VALUES (6, 'Global', NULL, '2024-01-21 23:26:40', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_12_30_100344_create_admins_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_12_30_100604_create_vendors_table', 1);
INSERT INTO `migrations` VALUES (7, '2014_10_12_100000_create_password_resets_table', 2);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `field_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `field_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('L1 Commission', '0');
INSERT INTO `settings` VALUES ('L2 Commission', '50');
INSERT INTO `settings` VALUES ('L3 Commission', '25');
INSERT INTO `settings` VALUES ('L4 Commission', '15');
INSERT INTO `settings` VALUES ('L5 Commission', '10');

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
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Test', 'test@test.com', NULL, '$2y$12$msPh3vyQwKHELq7IsgA/1O7zt3wAJhlgpBTryRTF9i4EefJh/3DEK', NULL, '2023-12-30 15:25:53', '2023-12-30 15:25:53');
INSERT INTO `users` VALUES (2, 'admin', 'admin@admin.com', NULL, '$2y$12$o4sFC13HzoATu5.SN4ouMuR1KXCX7mavYibCZjj4cra3R4cw1qgne', NULL, '2023-12-30 17:18:08', '2023-12-30 17:18:08');

-- ----------------------------
-- Table structure for vendor_claims
-- ----------------------------
DROP TABLE IF EXISTS `vendor_claims`;
CREATE TABLE `vendor_claims`  (
  `vendor_claim_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` int UNSIGNED NOT NULL,
  `claim_amount` int NULL DEFAULT NULL,
  `claim_status` enum('Approved','Pending','Rejected','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Pending',
  `updated_by` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vendor_claim_id`) USING BTREE,
  INDEX `vendor_id`(`vendor_id` ASC) USING BTREE,
  CONSTRAINT `vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendor_claims
-- ----------------------------
INSERT INTO `vendor_claims` VALUES (1, 1, 10, 'Approved', NULL, '2024-01-09 01:13:12', '2024-01-09 01:57:29');
INSERT INTO `vendor_claims` VALUES (2, 1, 50, 'Rejected', NULL, '2024-01-09 01:14:23', '2024-01-09 01:57:23');
INSERT INTO `vendor_claims` VALUES (3, 1, 30, 'Approved', NULL, '2024-01-09 02:19:15', '2024-01-12 15:13:30');
INSERT INTO `vendor_claims` VALUES (4, 1, 55, 'Rejected', NULL, '2024-01-09 02:19:55', '2024-01-12 15:13:34');

-- ----------------------------
-- Table structure for vendor_commission
-- ----------------------------
DROP TABLE IF EXISTS `vendor_commission`;
CREATE TABLE `vendor_commission`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int NOT NULL,
  `shop_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shop_level` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `commission_amount` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendor_commission
-- ----------------------------
INSERT INTO `vendor_commission` VALUES (35, 1, '2', 'L2', 50, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (36, 1, '3', 'L2', 50, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (37, 1, '4', 'L3', 25, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (38, 1, '5', 'L3', 25, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (39, 1, '6', 'L3', 25, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (40, 1, '7', 'L3', 25, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (41, 1, '8', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (42, 1, '9', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (43, 1, '10', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (44, 1, '11', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (45, 1, '12', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (46, 1, '13', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (47, 1, '14', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (48, 1, '15', 'L4', 15, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (49, 1, '16', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (50, 1, '17', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (51, 1, '18', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (52, 1, '19', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (53, 1, '20', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (54, 1, '21', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (55, 1, '22', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (56, 1, '23', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (57, 1, '24', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (58, 1, '25', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (59, 1, '26', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (60, 1, '27', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (61, 1, '28', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (62, 1, '29', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (63, 1, '30', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (64, 1, '31', 'L5', 10, '2024-01-08 05:46:46', NULL);
INSERT INTO `vendor_commission` VALUES (66, 3, '34', 'L2', 50, '2024-01-08 05:49:12', NULL);
INSERT INTO `vendor_commission` VALUES (67, 4, '36', 'L2', 50, '2024-01-08 05:51:15', NULL);

-- ----------------------------
-- Table structure for vendor_shops
-- ----------------------------
DROP TABLE IF EXISTS `vendor_shops`;
CREATE TABLE `vendor_shops`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int NOT NULL,
  `shop_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shop_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shop_owner_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `shop_owner_phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 0,
  `shop_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `expiration_date` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendor_shops
-- ----------------------------
INSERT INTO `vendor_shops` VALUES (1, 1, 'shp-01', 'sh-01', NULL, '03213213213210', 1, 'L1', '2025-01-01 02:55:08', NULL, '2024-01-12 15:17:23');
INSERT INTO `vendor_shops` VALUES (2, 1, 'sh2', 'sh2', NULL, NULL, 0, 'L2', '2025-01-07 02:54:12', NULL, '2024-01-08 03:09:16');
INSERT INTO `vendor_shops` VALUES (3, 1, 'shop-03', 'shp-any', NULL, '03213213560', 0, 'L2', '2025-01-07 02:54:24', NULL, '2024-01-12 15:09:11');
INSERT INTO `vendor_shops` VALUES (4, 1, 'sh4', 'sh4', NULL, NULL, 1, 'L3', '2025-01-07 04:03:28', NULL, '2024-01-07 23:04:31');
INSERT INTO `vendor_shops` VALUES (5, 1, 'sh5', 'sh5', NULL, NULL, 0, 'L3', '2025-01-07 04:04:34', NULL, '2024-01-08 03:27:58');
INSERT INTO `vendor_shops` VALUES (6, 1, 'sh6', 'sh6', NULL, NULL, 1, 'L3', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (7, 1, 'sh7', 'sh7', NULL, NULL, 1, 'L3', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (8, 1, 'sh8', 'sh8', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (9, 1, 'sh9', 'sh9', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (10, 1, 'sh10', 'sh10', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (11, 1, 'sh11', 'sh11', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (12, 1, 'sh12', 'sh12', NULL, NULL, 0, 'L4', '2025-01-01 02:55:08', NULL, '2024-01-08 03:27:56');
INSERT INTO `vendor_shops` VALUES (13, 1, 'sh13', 'sh13', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (14, 1, 'sh14', 'sh14', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (15, 1, 'sh15', 'sh15', NULL, NULL, 1, 'L4', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (16, 1, 'sh16', 'sh16', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (17, 1, 'sh17', 'sh17', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (18, 1, 'sh18', 'sh18', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (19, 1, 'sh19', 'sh19', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (20, 1, 'sh20', 'sh20', NULL, NULL, 0, 'L5', '2025-01-01 02:55:08', NULL, '2024-01-08 03:27:54');
INSERT INTO `vendor_shops` VALUES (21, 1, 'sh21', 'sh21', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (22, 1, 'sh22', 'sh22', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (23, 1, 'sh23', 'sh23', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (24, 1, 'sh-024', 'sh00924', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, '2024-01-11 20:38:36');
INSERT INTO `vendor_shops` VALUES (25, 1, 'sh25', 'sh25', NULL, NULL, 0, 'L5', '2025-01-01 02:55:08', NULL, '2024-01-08 03:27:52');
INSERT INTO `vendor_shops` VALUES (26, 1, 'sh26', 'sh26', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (27, 1, 'sh27', 'sh27', NULL, NULL, 1, 'L5', '2025-01-01 02:55:08', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (28, 1, 'sh28', 'sh28', NULL, NULL, 1, 'L5', '2025-01-07 02:56:50', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (29, 1, 'sh29', 'sh29', NULL, NULL, 1, 'L5', '2025-01-07 02:56:12', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (30, 1, 'sh30', 'shp-30', NULL, '123-234', 0, 'L5', '2025-01-07 02:57:18', NULL, '2024-01-08 03:08:30');
INSERT INTO `vendor_shops` VALUES (31, 1, 'sh31', 'shopid-0031', NULL, NULL, 1, 'L5', '2025-01-07 02:55:46', NULL, NULL);
INSERT INTO `vendor_shops` VALUES (33, 3, 'shopname001', 'shopid-001', NULL, NULL, 0, 'L1', '2025-01-04 07:48:25', '2024-01-05 02:48:25', '2024-01-08 00:54:10');
INSERT INTO `vendor_shops` VALUES (34, 3, 'shopname001', 'shopidv3-001', NULL, NULL, 0, 'L2', '2025-01-07 05:47:38', NULL, '2024-01-08 00:54:11');
INSERT INTO `vendor_shops` VALUES (35, 4, 'v4-shp01', 'v4shp-001', NULL, NULL, 1, 'L1', '2025-01-07 05:50:54', '2024-01-08 05:50:54', NULL);
INSERT INTO `vendor_shops` VALUES (36, 4, 'v4-shp02', 'v4shp-002', NULL, NULL, 1, 'L2', '2025-01-07 05:51:11', '2024-01-08 05:51:11', '2024-01-08 05:51:15');
INSERT INTO `vendor_shops` VALUES (37, 3, 'shopid-thr2', 'shopid-thr2', NULL, NULL, 0, 'L2', '2025-01-07 05:52:56', '2024-01-08 00:52:56', '2024-01-08 00:52:56');
INSERT INTO `vendor_shops` VALUES (38, 5, 'sadf sadf', 'shop5-243', NULL, NULL, 1, 'L1', '2025-01-07 08:17:33', '2024-01-08 03:17:33', '2024-01-08 03:18:03');
INSERT INTO `vendor_shops` VALUES (39, 6, 'ab-shop-o', 'ab-shp-001', NULL, NULL, 0, 'L1', '2025-01-07 08:26:38', '2024-01-08 03:26:38', '2024-01-08 03:27:01');
INSERT INTO `vendor_shops` VALUES (40, 3, 'sh-30', 'shopid-as001', NULL, NULL, 0, 'L3', '2025-01-08 03:44:10', '2024-01-08 22:44:10', '2024-01-08 22:44:10');
INSERT INTO `vendor_shops` VALUES (41, 7, 'any-shop', 'any-shop', NULL, NULL, 1, 'L1', '2025-01-11 20:10:14', '2024-01-12 15:10:14', '2024-01-12 15:10:41');

-- ----------------------------
-- Table structure for vendors
-- ----------------------------
DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_vendor` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NULL DEFAULT 1,
  `category_id` int NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unclaimed_amount` int NULL DEFAULT 0,
  `pending_claim_amount` int NULL DEFAULT 0,
  `claimed_amount` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `vendors_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendors
-- ----------------------------
INSERT INTO `vendors` VALUES (1, 'vendor test 1', 'vendor@vendor.com', '$2y$12$EBTU6p0AItOEBU2iIwYbG.TVGZeqqnEAfbh02sgTCHg/czzkpY18W', '0321321321321', 'Big Bank', 'Big0000345', 1, 1, 1, NULL, 480, NULL, NULL, '2023-12-30 20:28:10', '2024-01-21 23:25:52');
INSERT INTO `vendors` VALUES (2, 'vendor test 2', 'vendor2@vendor.com', '$2y$12$EBTU6p0AItOEBU2iIwYbG.TVGZeqqnEAfbh02sgTCHg/czzkpY18W', '0321321321321', 'Big Bank', 'Big0000123', 1, 1, 2, NULL, 10, NULL, NULL, NULL, '2024-01-21 23:25:53');
INSERT INTO `vendors` VALUES (3, 'vendor - thr', 'vendor-a@vendor.com', '$2y$12$mlp2Zpk65N8IpafJT4eRHe1uvFQbsLcAU25psSKnWCLA4U4/CuTKO', '0321321321321', 'Big Bank', 'Big0000345', 1, 1, 3, NULL, 50, NULL, NULL, '2024-01-05 01:23:32', '2024-01-21 23:25:54');
INSERT INTO `vendors` VALUES (4, 'vendor - 4fr', 'vendor-b@vendor.com', '$2y$12$tbZuzNfj1AMFDD2bvD1f6.3ZJit2ICz/1nO5mbhxtyurgI.S2Vqz2', '0321321321321', 'Big Bank', 'Big0000123', 1, 1, 4, NULL, 50, NULL, NULL, '2024-01-05 01:24:38', '2024-01-21 23:25:55');
INSERT INTO `vendors` VALUES (5, 'vendor - five', 'vendor-5@vendor.com', '$2y$12$tbZuzNfj1AMFDD2bvD1f6.3ZJit2ICz/1nO5mbhxtyurgI.S2Vqz2', '0321321321321', 'Big Bank', 'Big0000123', 1, 1, 1, NULL, 0, 0, 0, '2024-01-08 05:48:52', '2024-01-21 23:25:57');
INSERT INTO `vendors` VALUES (6, 'ab-vendor', 'ab@vendor.com', '$2y$12$wDfus4bWxUNffocFg.k9CO42PUTDB3WuIGKv./5LbQQ.z4JuRyMY6', '03213213200', 'bak-pka', 'bnk-pk-0010020', 1, 1, 1, NULL, 0, 0, 0, '2024-01-08 03:25:37', '2024-01-22 00:33:19');
INSERT INTO `vendors` VALUES (7, 'the-vendor', 'thevendor@vendor.com', '$2y$12$ULK2d6mgjTbjDDpd3lxRr.NW1.ISrDArWWiMPW3pcIZMTbfiUxkRi', '28374893274', 'any bank', '21398476', 1, 1, 2, NULL, 0, 0, 0, '2024-01-12 15:08:06', '2024-01-22 00:33:23');
INSERT INTO `vendors` VALUES (8, 'Global Vendor', 'gvendor@gvendor.com', '$2y$12$B/Dtlk/hl5bZJaJh.9kJSOZMlukE3.V7/MwNKQB40IMVyFLQ2RYxa', '1231235124', 'bank name', 'bank1-11243', 1, 1, 6, NULL, 0, 0, 0, '2024-01-21 19:15:49', '2024-01-22 00:33:08');

-- ----------------------------
-- Triggers structure for table vendor_commission
-- ----------------------------
DROP TRIGGER IF EXISTS `tgr_vendor_commission_after_insert`;
delimiter ;;
CREATE TRIGGER `tgr_vendor_commission_after_insert` AFTER INSERT ON `vendor_commission` FOR EACH ROW BEGIN
	-- UPDATE COMMISSION AMOUNT IN VENDORS TABLE -- 
	UPDATE `vendors` SET `unclaimed_amount` = unclaimed_amount + NEW.commission_amount WHERE `id` = NEW.vendor_id;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table vendor_shops
-- ----------------------------
DROP TRIGGER IF EXISTS `tgr_shop_before_insert`;
delimiter ;;
CREATE TRIGGER `tgr_shop_before_insert` BEFORE INSERT ON `vendor_shops` FOR EACH ROW BEGIN
	DECLARE v_shop_count int(11) DEFAULT 0;
	DECLARE v_level VARCHAR(25) DEFAULT 'L1';
	DECLARE v_vendor_commission INT(11) DEFAULT 0;

	SELECT COUNT(id) AS shop_count, shop_level into v_shop_count, v_level FROM vendor_shops where vendor_id = NEW.vendor_id GROUP BY `shop_level` ORDER BY shop_level DESC LIMIT 1;
		
	SET NEW.shop_level = 'L1';
	SET NEW.expiration_date = NOW() + INTERVAL 365 DAY;
	
	IF (v_shop_count = 1 AND v_level = 'L1') THEN
		SET NEW.shop_level = 'L2';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L2 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	END IF;
	
	IF (v_shop_count = 1 AND v_level = 'L2') THEN
		SET NEW.shop_level = 'L2';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L2 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	ELSEIF (v_shop_count = 2 AND v_level = 'L2') THEN
		SET NEW.shop_level = 'L3';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L3 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	END IF;
		
	IF (v_shop_count < 4 AND v_level = 'L3') THEN
		SET NEW.shop_level = 'L3';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L3 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	ELSEIF (v_shop_count = 4 AND v_level = 'L3') THEN
		SET NEW.shop_level = 'L4';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L4 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	END IF;
		
	IF (v_shop_count < 8 AND v_level = 'L4') THEN
		SET NEW.shop_level = 'L4';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L4 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	ELSEIF (v_shop_count = 8 AND v_level = 'L4') THEN
		SET NEW.shop_level = 'L5';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L5 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	END IF;
		
	IF (v_shop_count < 16 AND v_level = 'L5') THEN
		SET NEW.shop_level = 'L5';
		IF(NEW.is_active = 1) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L5 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
		END IF;
	ELSEIF (v_shop_count = 16 AND v_level = 'L5') THEN
		SET NEW.shop_level = '0';
	END IF;
	
	
	
	

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table vendor_shops
-- ----------------------------
DROP TRIGGER IF EXISTS `tgr_shop_before_update`;
delimiter ;;
CREATE TRIGGER `tgr_shop_before_update` BEFORE UPDATE ON `vendor_shops` FOR EACH ROW BEGIN
	DECLARE v_shop_count int(11) DEFAULT 0;
	DECLARE v_level VARCHAR(25) DEFAULT 'L1';
	DECLARE v_vendor_commission INT(11) DEFAULT 0;
	DECLARE v_commissioned INT(11) DEFAULT 0;
	
	SELECT id INTO v_commissioned FROM vendor_commission WHERE shop_id = OLD.id AND vendor_id = OLD.vendor_id AND shop_level = OLD.shop_level;
	
	IF(OLD.expiration_date IS NULL AND NEW.is_active = 1) THEN
		SET NEW.expiration_date = NOW() + INTERVAL 365 DAY;
	END IF;
		
	IF (OLD.shop_level = 'L2' AND NEW.is_active = 1 AND v_commissioned < 1 ) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L2 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
	END IF;	
	
	IF (OLD.shop_level = 'L3' AND NEW.is_active = 1 AND v_commissioned < 1 ) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L3 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
	END IF;	
	
	IF (OLD.shop_level = 'L4' AND NEW.is_active = 1 AND v_commissioned < 1 ) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L4 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
	END IF;	
	
	IF (OLD.shop_level = 'L5' AND NEW.is_active = 1 AND v_commissioned < 1 ) THEN
			SELECT field_value INTO v_vendor_commission FROM settings WHERE field_name IN ('L5 Commission');
			INSERT INTO `vendor_commission` (`vendor_id`, `shop_id`, `shop_level`, `commission_amount`) VALUES (NEW.vendor_id, NEW.id, NEW.shop_level, v_vendor_commission);
	END IF;
	
	
	

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
