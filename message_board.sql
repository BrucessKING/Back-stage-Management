/*
 Navicat Premium Data Transfer

 Source Server         : wamp
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : student_manage

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 15/10/2019 16:22:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for message_board
-- ----------------------------
DROP TABLE IF EXISTS `message_board`;
CREATE TABLE `message_board`  (
  `楼` int(11) NOT NULL AUTO_INCREMENT COMMENT '楼号',
  `留言者：` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '留言者昵称',
  `邮箱` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '留言者邮箱',
  `留言内容` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '留言内容',
  `留言时间：` date NOT NULL COMMENT '留言时间',
  PRIMARY KEY (`楼`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of message_board
-- ----------------------------
INSERT INTO `message_board` VALUES (1, 'admin', '1439638243@qq.com', 'This is a test', '2017-08-08');
INSERT INTO `message_board` VALUES (2, 'guest', '1111@qq.com', 'Hello, World世界', '2018-01-01');

SET FOREIGN_KEY_CHECKS = 1;
