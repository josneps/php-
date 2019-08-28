/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-28 18:31:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for satisfied
-- ----------------------------
DROP TABLE IF EXISTS `satisfied`;
CREATE TABLE `satisfied` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_ip` varchar(15) DEFAULT NULL COMMENT '浏览人的ip',
  `a_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '设计师的mid',
  `a_questions_id` int(11) NOT NULL COMMENT '问题的id',
  `answer_id` int(10) NOT NULL DEFAULT '0' COMMENT '答案的id',
  `status` tinyint(1) DEFAULT NULL COMMENT '1表示满意、 2表示不满意',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COMMENT='设计师答题满意记录';

-- ----------------------------
-- Records of satisfied
-- ----------------------------
INSERT INTO `satisfied` VALUES ('1', '192.168.0.53', '1e77a447b0c0df612844af2594c5973d', '11', '5', '1', '2019-08-23 11:31:30');
INSERT INTO `satisfied` VALUES ('2', '192.168.0.53', '1e77a447b0c0df612844af2594c5973d', '11', '5', '2', '2019-08-23 11:31:39');
INSERT INTO `satisfied` VALUES ('3', '192.168.0.53', '761eca9862310ba4c9e81d7a77754711', '11', '4', '2', '2019-08-23 11:31:43');
INSERT INTO `satisfied` VALUES ('4', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '11', '6', '1', '2019-08-23 11:39:20');
INSERT INTO `satisfied` VALUES ('5', '127.0.0.1', '1e77a447b0c0df612844af2594c5973d', '11', '5', '1', '2019-08-23 11:43:12');
INSERT INTO `satisfied` VALUES ('6', '192.168.0.60', '761eca9862310ba4c9e81d7a77754711', '11', '6', '1', '2019-08-23 14:48:31');
INSERT INTO `satisfied` VALUES ('7', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '11', '5', '1', '2019-08-23 14:50:05');
INSERT INTO `satisfied` VALUES ('8', '192.168.0.60', '761eca9862310ba4c9e81d7a77754711', '11', '6', '2', '2019-08-23 14:50:08');
INSERT INTO `satisfied` VALUES ('9', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '11', '5', '2', '2019-08-23 14:50:12');
INSERT INTO `satisfied` VALUES ('10', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '51', '17', '1', '2019-08-23 17:04:37');
INSERT INTO `satisfied` VALUES ('11', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '51', '17', '2', '2019-08-23 17:05:26');
INSERT INTO `satisfied` VALUES ('12', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '50', '15', '1', '2019-08-23 17:07:13');
INSERT INTO `satisfied` VALUES ('13', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '50', '16', '2', '2019-08-23 17:08:11');
INSERT INTO `satisfied` VALUES ('14', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '11', '4', '1', '2019-08-24 10:30:37');
INSERT INTO `satisfied` VALUES ('15', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '53', '21', '1', '2019-08-24 10:49:43');
INSERT INTO `satisfied` VALUES ('16', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '51', '36', '1', '2019-08-24 17:52:56');
INSERT INTO `satisfied` VALUES ('17', '127.0.0.1', '1e77a447b0c0df612844af2594c5973d', '6', '2', '1', '2019-08-25 10:39:52');
INSERT INTO `satisfied` VALUES ('18', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '12', '7', '1', '2019-08-26 14:33:49');
INSERT INTO `satisfied` VALUES ('19', '192.168.0.60', '761eca9862310ba4c9e81d7a77754711', '12', '30', '1', '2019-08-26 14:34:01');
INSERT INTO `satisfied` VALUES ('20', '192.168.0.60', '761eca9862310ba4c9e81d7a77754711', '12', '29', '1', '2019-08-26 14:34:14');
INSERT INTO `satisfied` VALUES ('21', '127.0.0.1', '1e77a447b0c0df612844af2594c5973d', '6', '3', '1', '2019-08-26 14:50:46');
INSERT INTO `satisfied` VALUES ('22', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '6', '2', '2', '2019-08-26 14:51:06');
INSERT INTO `satisfied` VALUES ('23', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '6', '3', '1', '2019-08-26 14:51:14');
INSERT INTO `satisfied` VALUES ('24', '192.168.0.60', '761eca9862310ba4c9e81d7a77754711', '84', '40', '2', '2019-08-26 16:08:09');
INSERT INTO `satisfied` VALUES ('25', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '84', '40', '1', '2019-08-26 16:15:01');
INSERT INTO `satisfied` VALUES ('27', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '79', '41', '1', '2019-08-26 16:41:42');
INSERT INTO `satisfied` VALUES ('28', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '85', '42', '1', '2019-08-26 17:05:29');
INSERT INTO `satisfied` VALUES ('29', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '85', '43', '1', '2019-08-26 17:06:10');
INSERT INTO `satisfied` VALUES ('30', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '96', '46', '1', '2019-08-26 18:34:47');
INSERT INTO `satisfied` VALUES ('31', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '23', '50', '1', '2019-08-27 10:07:03');
INSERT INTO `satisfied` VALUES ('32', '192.168.0.60', 'ce97d0760f72592e689aaf48f943007f', '79', '49', '1', '2019-08-27 10:40:20');
INSERT INTO `satisfied` VALUES ('34', '127.0.0.1', '1e77a447b0c0df612844af2594c5973d', '23', '50', '1', '2019-08-27 10:47:14');
INSERT INTO `satisfied` VALUES ('35', '192.168.0.60', '1e77a447b0c0df612844af2594c5973d', '98', '55', '1', '2019-08-27 14:28:39');
INSERT INTO `satisfied` VALUES ('36', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '99', '63', '1', '2019-08-27 16:10:49');
INSERT INTO `satisfied` VALUES ('37', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '23', '20', '1', '2019-08-28 15:43:16');
INSERT INTO `satisfied` VALUES ('38', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '23', '19', '2', '2019-08-28 16:55:26');
INSERT INTO `satisfied` VALUES ('39', '127.0.0.1', '761eca9862310ba4c9e81d7a77754711', '95', '51', '2', '2019-08-28 17:08:45');
