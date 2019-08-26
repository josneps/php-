/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-23 18:25:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for answer_adopt_num
-- ----------------------------
DROP TABLE IF EXISTS `answer_adopt_num`;
CREATE TABLE `answer_adopt_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `a_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '设计师的mid',
  `answer` int(6) NOT NULL DEFAULT '0' COMMENT '解答',
  `adopt` int(6) NOT NULL DEFAULT '0' COMMENT '被采纳',
  `integral` int(6) DEFAULT '0' COMMENT '设计师总积分',
  `consumption_integral` int(6) DEFAULT '0' COMMENT '积分消费记录',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='设计师解答&被采纳个数';

-- ----------------------------
-- Records of answer_adopt_num
-- ----------------------------
INSERT INTO `answer_adopt_num` VALUES ('1', '761eca9862310ba4c9e81d7a77754711', '11', '0', '60', '0', '2019-08-23 10:30:05', '2019-08-23 15:24:28');
INSERT INTO `answer_adopt_num` VALUES ('2', '1e77a447b0c0df612844af2594c5973d', '6', '0', '83', '480', '2019-08-23 10:38:35', '2019-08-23 16:37:27');
