/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-13 18:16:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for designer_answer
-- ----------------------------
DROP TABLE IF EXISTS `designer_answer`;
CREATE TABLE `designer_answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `a_questions_id` int(11) NOT NULL COMMENT '问题的id',
  `a_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '设计师的mid',
  `a_nickname` varchar(64) DEFAULT NULL COMMENT '个人用户昵称',
  `a_pic` varchar(256) DEFAULT '' COMMENT '用户头像',
  `a_answer` varchar(255) NOT NULL COMMENT '设计师的答案',
  `a_access_device` tinyint(2) NOT NULL DEFAULT '1' COMMENT '访问设备 1 PC 2 安卓 3 IOS 4 其他',
  `a_status` tinyint(1) DEFAULT '1' COMMENT '0表示删除、 1表示未查看、 2表示未采纳、 3表示已采纳',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COMMENT='设计师的回答';

-- ----------------------------
-- Records of designer_answer
-- ----------------------------
INSERT INTO `designer_answer` VALUES ('1', '1', '56afc1b33187ada6bb67082ad03b1dca①', '小宝', '5987d2dfd2b18.png', 'Home to buy a new house brother and identity and who to find...\n\n', '1', '1', '2019-08-13 10:16:26', '2019-08-13 10:16:26');
INSERT INTO `designer_answer` VALUES ('2', '3', '56afc1b33187ada6bb67082ad03b1dca②', '大宝', '5987d2dfd2b18.png', 'The house that buys newly in the home delivers goods unexpectedly even fu jing technology leaks, who should seek...', '1', '1', '2019-08-13 10:16:29', '2019-08-13 10:16:29');
INSERT INTO `designer_answer` VALUES ('3', '1', '56afc1b33187ada6bb67082ad03b1dca', '程旭辕', '5987d2dfd2b18.png', 'The house that buys newly in the home unexpectedly leaks, who should seek...', '1', '1', '2019-08-13 10:18:58', '2019-08-13 10:18:58');
INSERT INTO `designer_answer` VALUES ('17', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '2', '2019-08-13 15:03:19', '2019-08-13 15:23:34');
INSERT INTO `designer_answer` VALUES ('18', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '2', '2019-08-13 15:03:39', '2019-08-13 16:43:10');
INSERT INTO `designer_answer` VALUES ('19', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:40', '2019-08-13 15:04:40');
INSERT INTO `designer_answer` VALUES ('20', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:47', '2019-08-13 15:04:47');
INSERT INTO `designer_answer` VALUES ('21', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:47', '2019-08-13 15:04:47');
INSERT INTO `designer_answer` VALUES ('22', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:48', '2019-08-13 15:04:48');
INSERT INTO `designer_answer` VALUES ('23', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:48', '2019-08-13 15:04:48');
INSERT INTO `designer_answer` VALUES ('24', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:48', '2019-08-13 15:04:48');
INSERT INTO `designer_answer` VALUES ('25', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:04:48', '2019-08-13 15:04:48');
INSERT INTO `designer_answer` VALUES ('26', '1', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '1', '2019-08-13 15:05:18', '2019-08-13 15:05:18');
INSERT INTO `designer_answer` VALUES ('27', '2', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '巴拉巴拉巴贝拉拉不拉了波兰', '1', '2', '2019-08-13 16:37:59', '2019-08-13 16:49:24');
