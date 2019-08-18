/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-15 18:41:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for look_number
-- ----------------------------
DROP TABLE IF EXISTS `look_number`;
CREATE TABLE `look_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `a_questions_id` int(11) NOT NULL COMMENT '问题id',
  `user_id` varchar(64) DEFAULT NULL COMMENT '浏览人的id',
  `user_ip` varchar(15) DEFAULT NULL COMMENT '浏览人的ip',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='问题被浏览次数';

-- ----------------------------
-- Records of look_number
-- ----------------------------
INSERT INTO `look_number` VALUES ('1', '1', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-13 17:44:33');
INSERT INTO `look_number` VALUES ('2', '1', null, '127.0.0.1', '2019-08-13 17:45:11');
INSERT INTO `look_number` VALUES ('3', '2', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-15 14:03:44');
INSERT INTO `look_number` VALUES ('4', '3', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-15 14:31:42');
INSERT INTO `look_number` VALUES ('5', '3', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-15 14:36:35');
INSERT INTO `look_number` VALUES ('6', '1', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-15 14:42:45');
INSERT INTO `look_number` VALUES ('7', '2', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-15 14:42:50');
INSERT INTO `look_number` VALUES ('8', '4', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-15 14:48:22');
INSERT INTO `look_number` VALUES ('9', '5', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-15 15:42:05');
INSERT INTO `look_number` VALUES ('10', '5', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-15 16:00:24');
INSERT INTO `look_number` VALUES ('11', '4', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-15 16:01:02');
INSERT INTO `look_number` VALUES ('12', '6', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-15 16:05:02');
INSERT INTO `look_number` VALUES ('13', '2', null, '127.0.0.1', '2019-08-15 16:29:54');
INSERT INTO `look_number` VALUES ('14', '4', null, '127.0.0.1', '2019-08-15 16:36:56');
INSERT INTO `look_number` VALUES ('15', '6', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-15 16:38:48');
