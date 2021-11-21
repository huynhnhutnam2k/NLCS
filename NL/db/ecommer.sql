/*
 Navicat Premium Data Transfer

 Source Server         : Ecommer
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : ecommer

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 21/11/2021 17:02:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'hnam4527@gmail.com', 'hnam', 'hnam', '4932u5');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cate_active` int NULL DEFAULT NULL,
  `cate_name_author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cate_author_id` int NULL DEFAULT NULL,
  `cate_images` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `update_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cate_author_id`(`cate_author_id`) USING BTREE,
  CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`cate_author_id`) REFERENCES `admin` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `categories_ibfk_3` FOREIGN KEY (`cate_author_id`) REFERENCES `admin` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'CURNON', 1, 'hnam', 1, NULL, '2021-11-21 10:24:18.605046', '2021-11-21 10:24:18.605046');
INSERT INTO `categories` VALUES (2, 'DYOSS', 1, 'hnam', 1, NULL, '2021-11-21 10:24:33.936548', '2021-11-21 10:24:33.936548');
INSERT INTO `categories` VALUES (3, 'VIWAT', 1, 'hnam', 1, NULL, '2021-11-21 10:24:36.686166', '2021-11-21 10:24:36.686166');
INSERT INTO `categories` VALUES (4, 'YORS', 1, 'hnam', 1, NULL, '2021-11-21 10:24:39.390323', '2021-11-21 10:24:39.390323');
INSERT INTO `categories` VALUES (5, 'KLASERN', 1, 'hnam', 1, NULL, '2021-11-21 10:24:41.495759', '2021-11-21 10:24:41.495759');

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`  (
  `orer_detail_id` int NOT NULL AUTO_INCREMENT,
  `od_order_id` int NULL DEFAULT NULL,
  `od_pro_id` int NULL DEFAULT NULL,
  `od_user_id` int NULL DEFAULT NULL,
  `od_pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `od_pro_qty` int NULL DEFAULT NULL,
  `od_pro_price` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `od_created_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`orer_detail_id`) USING BTREE,
  INDEX `od_order_id`(`od_order_id`) USING BTREE,
  INDEX `od_pro_id`(`od_pro_id`) USING BTREE,
  INDEX `od_user_id`(`od_user_id`) USING BTREE,
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`od_order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`od_pro_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`od_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `or_transaction_id` int NULL DEFAULT NULL,
  `or_product_id` int NULL DEFAULT NULL,
  `or_payment_id` int NULL DEFAULT NULL,
  `or_user_id` int NULL DEFAULT NULL,
  `or_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `or_total` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `or_transaction_id`(`or_transaction_id`) USING BTREE,
  INDEX `or_user_id`(`or_user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`or_transaction_id`) REFERENCES `transactions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`or_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_category_id` int NULL DEFAULT NULL,
  `pro_price` int NULL DEFAULT NULL,
  `pro_author_id` int NULL DEFAULT NULL,
  `pro_active` int NULL DEFAULT NULL,
  `pro_hot` bit(1) NULL DEFAULT NULL,
  `pro_view` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_number` int NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pro_category_id`(`pro_category_id`) USING BTREE,
  INDEX `pro_author_id`(`pro_author_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pro_category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`pro_author_id`) REFERENCES `admin` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'NATO CAM', 2, 1199000, 1, 1, b'1', 'images/herbert714.png', NULL, NULL, 3, '2021-11-21 16:31:53.468722');
INSERT INTO `products` VALUES (2, 'NOVA', 1, 2850000, 1, 1, NULL, 'images/nova199.png', NULL, NULL, 10, '2021-11-21 10:38:39.775885');
INSERT INTO `products` VALUES (3, 'DOROTHY', 1, 2499000, 1, 1, NULL, 'images/dorothy28.png', NULL, NULL, 5, '2021-11-21 10:39:32.036027');
INSERT INTO `products` VALUES (4, 'CHARM', 1, 2299000, 1, 1, NULL, 'images/charm111.png', NULL, NULL, 5, '2021-11-21 10:40:08.077334');
INSERT INTO `products` VALUES (5, 'MISTYQUE', 2, 3100000, 1, 1, NULL, 'images/MYSTIQUE134.jpg', NULL, NULL, 2, '2021-11-21 10:41:36.901557');
INSERT INTO `products` VALUES (6, 'NATO CAM', 3, 1199000, 1, 1, b'1', 'images/nam_vai_cam_3_v2_large850.webp', NULL, NULL, 3, '2021-11-21 10:52:07.209869');
INSERT INTO `products` VALUES (8, 'NATO HỒNG', 3, 1199000, 1, 1, NULL, 'images/nu-dahiendai-hong-v2_fcbc7a20cfa741a9886afd612080b043_large963.png', NULL, NULL, 3, '2021-11-21 10:46:10.106573');
INSERT INTO `products` VALUES (9, 'NAVI', 4, 2350000, 1, 1, b'1', 'images/NAVI996.png', NULL, NULL, 2, '2021-11-21 10:52:02.748463');
INSERT INTO `products` VALUES (10, 'MOT 01- BLACK', 5, 1199000, 1, 1, NULL, 'images/mot-01-black_360x769.png', NULL, NULL, 4, '2021-11-21 10:50:34.547843');
INSERT INTO `products` VALUES (11, 'MOT 02 - TAN STRAP', 5, 1199000, 1, 1, b'1', 'images/mot-02-tan_9fc4a26b-ff25-4c95-bf56-2f2568fb7341_360x70.png', NULL, NULL, 1, '2021-11-21 10:52:04.182988');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tr_user_id` int NULL DEFAULT NULL,
  `tr_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tr_email_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tr_total` int NULL DEFAULT NULL,
  `tr_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tr_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tr_phone` decimal(11, 0) NULL DEFAULT NULL,
  `tr_status` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tr_user_id`(`tr_user_id`) USING BTREE,
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`tr_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` int NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'nam', '4e29244e92ace4a6bc7d4c08c36a6d2b', NULL, NULL, '2021-11-21 11:36:20.071726', 'hnam@gmail.com', '01246465500');

SET FOREIGN_KEY_CHECKS = 1;
