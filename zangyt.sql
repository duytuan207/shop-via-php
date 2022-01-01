/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : shopclone

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 12/12/2020 13:23:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `stk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chi_nhanh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES (4, '0347078958', 'MB BANK', 'TRAN LONG GIANG', 'HA NAM');

-- ----------------------------
-- Table structure for bank_auto
-- ----------------------------
DROP TABLE IF EXISTS `bank_auto`;
CREATE TABLE `bank_auto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `amount` int NULL DEFAULT 0,
  `cusum_balance` int NULL DEFAULT 0,
  `time` datetime NULL DEFAULT NULL,
  `bank_sub_acc_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank_auto
-- ----------------------------

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loaithe` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menhgia` int NOT NULL,
  `thucnhan` int NULL DEFAULT 0,
  `seri` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pin` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cards
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `pin` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `display` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'show',
  `money` int NOT NULL DEFAULT 0,
  `badge` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (30, 'CLONEVERRYPHONE', 'clone', 'CLONE VERRY PHONE', '', 'show', 1000, 'New');
INSERT INTO `category` VALUES (32, 'GMAIL01', 'gmail', 'NICK GMAIL', '', 'show', 1000, 'Hàng mới!');
INSERT INTO `category` VALUES (33, 'HOTMAIL01', 'hotmail', 'HOTMAIL GIÁ RẺ', '', 'show', 200, 'New');
INSERT INTO `category` VALUES (34, 'NICKTDSRAND1', 'traodoisub', 'NICK TDS RANDOM 1M - 2M XU', '', 'show', 30000, 'Random 1.000.000 - 2.000.000 xu');
INSERT INTO `category` VALUES (35, 'CLONEVERYMAIL', 'clone', 'CLONE VERY MAIL', '<p>Định dạng tài khoản: ID|PASS|2FA|COOKIE|TOKEN</p><p>Đã check live trước khi mua, không bảo hành login...</p>', 'show', 100, 'Hàng mới up!');

-- ----------------------------
-- Table structure for giftcode
-- ----------------------------
DROP TABLE IF EXISTS `giftcode`;
CREATE TABLE `giftcode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `dieukien` int NULL DEFAULT 0,
  `soluong` int NULL DEFAULT 0,
  `sudung` int NULL DEFAULT 0,
  `createdate` datetime NULL DEFAULT NULL,
  `money` float NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of giftcode
-- ----------------------------

-- ----------------------------
-- Table structure for lang
-- ----------------------------
DROP TABLE IF EXISTS `lang`;
CREATE TABLE `lang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `msg1` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg2` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg3` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg4` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg5` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg6` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg7` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg8` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg9` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg10` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg11` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg12` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `msg13` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `14` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `15` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `16` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `17` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `18` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `19` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `20` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side1` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side2` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side3` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side4` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side5` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side6` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side7` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side8` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `side9` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lang
-- ----------------------------
INSERT INTO `lang` VALUES (1, 'Vui lòng điền vào ô trống !', 'Tài khoản không tồn tại trong hệ thống !', 'Địa chỉ Email đã tồn tại !', 'IP này đã đạt giới hạn tạo tài khoản!', 'Đăng ký tài khoản thành công !', 'Vui lòng điền vào ô trống !', 'Tài khoản không tồn tại trong hệ thống !', 'Mật khẩu không chính xác', 'Đăng nhập thành công !', 'Vui lòng điền vào ô trống !', 'Địa chỉ email không hợp lệ !', 'Địa chỉ email không có trong hệ thống !', 'Vui lòng kiểm tra hòm thư Email của bạn!', 'Vui lòng đăng nhập để tiếp tục', 'Số lượng tối thiểu là 1 tài khoản !', 'Số lượng tối đa khi mua 1 lần là 10.000 !', 'Loại tài khoản không tồn tại !', 'Số tài khoản trong hệ thống không đủ !', 'Số dư không đủ thanh toán!', 'Số lượng tài khoản không đủ, vui lòng thử lại', 'Home', 'Mua Tài Khoản', 'Nạp Tiền', 'Lịch Sử Đơn Hàng', 'Công Cụ', 'Giftcode', 'Cộng Tác Viên', 'Yêu Cầu Hỗ Trợ', 'Liên Hệ Facebook');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (1, '', 'Thực hiện đăng nhập vào hệ thống ! ', '2020-12-08 15:54:06');
INSERT INTO `log` VALUES (2, 'admin', 'Thực hiện dọn dẹp lịch sử đơn hàng ! ', '2020-12-08 18:26:49');
INSERT INTO `log` VALUES (3, '', 'Thực hiện đăng nhập vào hệ thống ! ', '2020-12-09 00:26:50');
INSERT INTO `log` VALUES (4, 'admin', 'Mua 111 tài khoản NICK GMAIL với giá 99.900đ. ', '2020-12-09 00:36:20');

-- ----------------------------
-- Table structure for log_die
-- ----------------------------
DROP TABLE IF EXISTS `log_die`;
CREATE TABLE `log_die`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `loai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `uid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `createdate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_die
-- ----------------------------

-- ----------------------------
-- Table structure for log_giftcode
-- ----------------------------
DROP TABLE IF EXISTS `log_giftcode`;
CREATE TABLE `log_giftcode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT '0',
  `money` int NOT NULL,
  `createdate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_giftcode
-- ----------------------------

-- ----------------------------
-- Table structure for ls_mua
-- ----------------------------
DROP TABLE IF EXISTS `ls_mua`;
CREATE TABLE `ls_mua`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `createdate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ls_mua
-- ----------------------------
INSERT INTO `ls_mua` VALUES (1, 'adm*****', 'Vừa mua 11 tài khoản NICK GMAIL với giá 9.900đ', '2021-07-31 00:36:20');

-- ----------------------------
-- Table structure for momo
-- ----------------------------
DROP TABLE IF EXISTS `momo`;
CREATE TABLE `momo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_id` varchar(64) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL DEFAULT NULL,
  `tranId` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL,
  `partnerId` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL,
  `partnerName` text CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NULL,
  `amount` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `time` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `username` varchar(32) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL DEFAULT NULL,
  `status` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT 'xuly',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of momo
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ID_BUY` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `soluong` int NULL DEFAULT 0,
  `money` int NULL DEFAULT 0,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `createdate` datetime NULL DEFAULT NULL,
  `live` int NULL DEFAULT 0,
  `type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `display` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT 'show',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for reply_ticket
-- ----------------------------
DROP TABLE IF EXISTS `reply_ticket`;
CREATE TABLE `reply_ticket`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ticket` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `createdate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reply_ticket
-- ----------------------------
INSERT INTO `reply_ticket` VALUES (1, 'z4k2maovHcC6', 'admin', 'trst', '2021-07-31 15:34:17');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_domain` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_favicon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_tenweb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_tukhoa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_baotri` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'OFF',
  `site_api_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_api_card` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_ck_card` int NULL DEFAULT 0,
  `site_callback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_gmail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_sdt_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_ten_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_qr_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_noidung_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_gmail_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_pass_momo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_show_soluong` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ON',
  `site_thong_bao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `birthday` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `carousel_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `carousel_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `carousel_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_show_carousel` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ON',
  `SECURE_TOKEN` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `MEMO_PREFIX` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `color` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DirectChatLink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tuyetroi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ON',
  `gdganday` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ON',
  `ck_ref` int NULL DEFAULT 0,
  `facebook` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `display_daban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ON',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, '/img/cover.png', 'https://zangyt.xyz/', '/img/logo.png', '/upload/logo.png', 'ZANG YT', 'ZANG YT | SHOP CLONE - VIA CHẤT LƯỢNG UY TÍN', 'shop clone, shop via, shop bm, clone gia re, muabm, mua clone', 'OFF', '', '', 10, '', '', '0347078958', 'TRAN LONG GIANG', '', 'NAPTIEN', '', '', 'ON', '<p><b>Lưu Ý:</b></p><p>- Clone đã được check live trước khi mua, chúng tôi không hỗ trợ bảo hành trường hợp sử dụng làm DIE.</p><p>- Nạp tiền qua ví MOMO, CARD tự động trong vài giây đến vài phút.</p>', '', NULL, '/upload/carousel_1.png', '/upload/carousel_2.png', '/upload/carousel_3.png', '', '', 'naptien', '#110d49', 'https://tawk.to/chat/5fbab5f8920fc91564c9878b/default', 'ON', 'ON', 10, '', 'ON');

-- ----------------------------
-- Table structure for taikhoan
-- ----------------------------
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ID_BUY` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `id_fb` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createdate` datetime NULL DEFAULT NULL,
  `status` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'live',
  `gender` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `friends` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `name` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL,
  `updated_time` datetime NULL DEFAULT NULL,
  `birthday` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of taikhoan
-- ----------------------------

-- ----------------------------
-- Table structure for thongbao
-- ----------------------------
DROP TABLE IF EXISTS `thongbao`;
CREATE TABLE `thongbao`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` longtext CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NULL,
  `createdate` datetime NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of thongbao
-- ----------------------------
INSERT INTO `thongbao` VALUES (7, '<p>Nội dung thông báo #1</p>', '2020-11-19 04:18:23', 'Tiêu đề thông báo #1');
INSERT INTO `thongbao` VALUES (8, '<p>Nội dung thông báo #2</p>', '2020-11-19 04:18:32', 'Tiêu đề thông báo #2');

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket` VALUES (1, 'admin', 'z4k2maovHcC6', 'test', 'aaaadda', '2020-12-08 15:34:13', 'hoantat');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  `money` int NOT NULL DEFAULT 0,
  `total_nap` int NOT NULL DEFAULT 0,
  `level` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  `ck` float NULL DEFAULT 0,
  `createdate` datetime NULL DEFAULT NULL,
  `ip` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `banned` int NOT NULL DEFAULT 0,
  `fullname` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  `ref` varchar(64) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'XS9T5WV8OQQQ', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 888100, 1000000, 'admin', 10, '2020-07-16 14:43:56', '::1', 0, 'CMSNT.CO', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
