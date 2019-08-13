/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-13 18:15:33
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='问题被浏览次数';

-- ----------------------------
-- Records of look_number
-- ----------------------------
INSERT INTO `look_number` VALUES ('1', '1', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-13 17:44:33');
INSERT INTO `look_number` VALUES ('2', '1', null, '127.0.0.1', '2019-08-13 17:45:11');
