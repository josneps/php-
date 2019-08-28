/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-28 18:31:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for invitation_answer
-- ----------------------------
DROP TABLE IF EXISTS `invitation_answer`;
CREATE TABLE `invitation_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `a_questions_id` int(11) NOT NULL COMMENT '问题id',
  `a_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '设计师的mid',
  `status` tinyint(1) DEFAULT '0' COMMENT '0表示未解答， 1表示已解答',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='邀请设计师回答表';

-- ----------------------------
-- Records of invitation_answer
-- ----------------------------
INSERT INTO `invitation_answer` VALUES ('1', '79', '761eca9862310ba4c9e81d7a77754711', '1', '2019-08-26 14:39:35', '2019-08-26 14:39:35');
INSERT INTO `invitation_answer` VALUES ('2', '79', 'ce97d0760f72592e689aaf48f943007f', '1', '2019-08-26 14:44:33', '2019-08-26 14:44:33');
INSERT INTO `invitation_answer` VALUES ('3', '79', '7b350d574ad81167a40c8aaa042017e4', '0', '2019-08-26 15:04:06', '2019-08-26 15:04:06');
INSERT INTO `invitation_answer` VALUES ('4', '84', '761eca9862310ba4c9e81d7a77754711', '1', '2019-08-26 16:02:10', '2019-08-26 16:02:10');
INSERT INTO `invitation_answer` VALUES ('5', '86', '761eca9862310ba4c9e81d7a77754711', '1', '2019-08-26 17:15:02', '2019-08-26 17:15:02');
INSERT INTO `invitation_answer` VALUES ('6', '23', '1e77a447b0c0df612844af2594c5973d', '1', '2019-08-26 17:18:47', '2019-08-26 17:18:47');
INSERT INTO `invitation_answer` VALUES ('7', '23', '761eca9862310ba4c9e81d7a77754711', '1', '2019-08-26 17:18:56', '2019-08-26 17:18:56');
INSERT INTO `invitation_answer` VALUES ('8', '96', '761eca9862310ba4c9e81d7a77754711', '1', '2019-08-26 17:42:06', '2019-08-26 17:42:06');
INSERT INTO `invitation_answer` VALUES ('9', '23', 'c8a383646579212fad7e3945850a3991', '0', '2019-08-26 17:43:48', '2019-08-26 17:43:48');
INSERT INTO `invitation_answer` VALUES ('10', '24', '1e77a447b0c0df612844af2594c5973d', '0', '2019-08-27 14:35:40', '2019-08-27 14:35:40');
INSERT INTO `invitation_answer` VALUES ('11', '80', '1e77a447b0c0df612844af2594c5973d', '0', '2019-08-27 14:35:48', '2019-08-27 14:35:48');
INSERT INTO `invitation_answer` VALUES ('12', '99', '761eca9862310ba4c9e81d7a77754711', '1', '2019-08-27 16:10:25', '2019-08-27 16:10:25');
