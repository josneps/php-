/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-16 19:58:23
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='问题被浏览次数';

-- ----------------------------
-- Records of look_number
-- ----------------------------
INSERT INTO `look_number` VALUES ('1', '2', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-16 17:44:57');
INSERT INTO `look_number` VALUES ('2', '2', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-16 17:45:31');
INSERT INTO `look_number` VALUES ('3', '4', null, '127.0.0.1', '2019-08-16 17:46:00');
INSERT INTO `look_number` VALUES ('4', '2', null, '127.0.0.1', '2019-08-16 17:46:05');
INSERT INTO `look_number` VALUES ('5', '18', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-16 17:50:18');
INSERT INTO `look_number` VALUES ('6', '7', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-16 17:53:24');
INSERT INTO `look_number` VALUES ('7', '16', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-16 17:53:43');
