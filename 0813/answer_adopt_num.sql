/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-16 19:57:19
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
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='设计师解答&被采纳个数';

-- ----------------------------
-- Records of answer_adopt_num
-- ----------------------------
INSERT INTO `answer_adopt_num` VALUES ('1', '761eca9862310ba4c9e81d7a77754711', '12', '0', '2019-08-16 09:13:45', '2019-08-16 09:13:48');
INSERT INTO `answer_adopt_num` VALUES ('2', 'ff8c35e26b91ac79ebdc9dad1e6fe73f', '2', '0', '2019-08-16 09:14:11', '2019-08-16 09:14:14');
