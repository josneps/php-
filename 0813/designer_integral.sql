/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-15 18:42:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for designer_integral
-- ----------------------------
DROP TABLE IF EXISTS `designer_integral`;
CREATE TABLE `designer_integral` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `a_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '设计师的mid',
  `a_questions_id` int(11) NOT NULL COMMENT '问题的id',
  `number` int(10) NOT NULL DEFAULT '0' COMMENT '设计师积分',
  `status` tinyint(1) DEFAULT NULL COMMENT '1表示解答、 2表示被采纳',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='设计师答题积分表';

-- ----------------------------
-- Records of designer_integral
-- ----------------------------
INSERT INTO `designer_integral` VALUES ('1', '0a050cd6c513b864fbd4c611d06472a4', '1', '2', '1', '2019-08-13 15:05:18');
INSERT INTO `designer_integral` VALUES ('2', '0a050cd6c513b864fbd4c611d06472a4', '1', '10', '2', '2019-08-13 15:23:34');
INSERT INTO `designer_integral` VALUES ('3', '0a050cd6c513b864fbd4c611d06472a4', '2', '2', '1', '2019-08-13 16:37:59');
INSERT INTO `designer_integral` VALUES ('4', '0a050cd6c513b864fbd4c611d06472a4', '2', '10', '2', '2019-08-13 16:49:24');
