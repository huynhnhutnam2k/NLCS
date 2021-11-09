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

 Date: 09/11/2021 20:35:11
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
  `created_at` datetime(6) NULL DEFAULT NULL,
  `updated_at` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categories_ibfk_1`(`cate_author_id`) USING BTREE,
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`cate_author_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (7, 'CURNON', 1, 'hnam', 1, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (8, 'DYOSS', 1, 'hnam', 1, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (9, 'VIWAT', 1, 'hnam', 1, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (10, 'YORS', 1, 'hnam', 1, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (11, 'KLASERN', 1, 'hnam', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`  (
  `oder_detail_id` int NOT NULL AUTO_INCREMENT,
  `od_order_id` int NULL DEFAULT NULL,
  `od_pro_id` int NULL DEFAULT NULL,
  `od_user_id` int NULL DEFAULT NULL,
  `od_pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `od_pro_qty` int NULL DEFAULT NULL,
  `od_pro_price` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `od_created_at` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`oder_detail_id`) USING BTREE,
  INDEX `order_detail_ibfk_8`(`od_user_id`) USING BTREE,
  INDEX `order_detail_ibfk_4`(`od_pro_id`) USING BTREE,
  INDEX `order_detail_ibfk_7`(`od_order_id`) USING BTREE,
  CONSTRAINT `order_detail_ibfk_4` FOREIGN KEY (`od_pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_6` FOREIGN KEY (`od_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_7` FOREIGN KEY (`od_order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_8` FOREIGN KEY (`od_user_id`) REFERENCES `transactions` (`tr_user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES (9, 8, 11, 1, 'M-53', 3, '3099000', NULL);

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
  `created_at` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `or_transaction_id`(`or_transaction_id`) USING BTREE,
  INDEX `orders_ibfk_1`(`or_user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`or_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (8, 23, NULL, 8, 1, 'Đang chờ xử lý', '9,297,000.00', NULL);

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_order_id` int NULL DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_time` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES (1, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (2, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (3, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (4, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (5, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (6, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (7, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (8, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);

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
  `created_at` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_ibfk_2`(`pro_author_id`) USING BTREE,
  INDEX `products_ibfk_3`(`pro_category_id`) USING BTREE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`pro_author_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`pro_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (9, 'STERLING', 7, 3099000, 1, 1, b'1', 'images/sterling352.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (10, 'SHARP', 7, 2299000, 1, 1, NULL, 'images/sharp576.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (11, 'M-53', 7, 3099000, 1, 1, NULL, 'images/detroit711.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (12, 'HERBERT', 7, 2299000, 1, 1, NULL, 'images/herbert597.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (13, 'GATSPY', 8, 3100000, 1, 1, b'1', 'images/GATSPY915.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (14, 'ICONIC', 7, 2990000, 1, 1, NULL, 'images/ICONIC243.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (15, 'ROYAL', 7, 2990000, 1, 1, b'1', 'images/ROYAL336.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (16, 'MYSTIQUE', 7, 3100000, 1, 1, NULL, 'images/MYSTIQUE774.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (18, 'VIWAT XANH', 7, 1199000, 1, 1, b'1', 'images/XANHDATROI257.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (19, 'VIWAT DEN', 7, 1199000, 1, 1, NULL, 'images/NATODEN670.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (20, 'VIWAT ĐỎ ĐẬM', 7, 1199000, 1, 1, b'1', 'images/DODAM216.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (21, 'NO1 NAVY', 10, 2350000, 1, 1, NULL, 'images/NO1NAVY281.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (22, 'NO1 GRAY', 7, 2850000, 1, 1, b'1', 'images/NO1GRAY68.png', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (23, 'áda', 7, 123123, 1, 1, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (24, 'đâsdad', 7, 123123, 1, 1, NULL, '', NULL, NULL, NULL, NULL);
INSERT INTO `products` VALUES (25, 'đâsdad', 9, 123123, 1, 1, NULL, '', NULL, NULL, NULL, NULL);

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
  INDEX `transactions_ibfk_1`(`tr_user_id`) USING BTREE,
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`tr_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (23, 1, 'hnam', 'hnam4527@gmail.com', NULL, NULL, 'CẦN THƠ', 949115014, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT ' ',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` bit(1) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'hnam', 'e8f3378dd65dd6c4f8b8f4baafb942d4', NULL, NULL, NULL, 'hnam4527@gmail.com', '0949115014');

SET FOREIGN_KEY_CHECKS = 1;
