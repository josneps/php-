/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-23 18:26:58
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COMMENT='问题被浏览次数';

-- ----------------------------
-- Records of look_number
-- ----------------------------
INSERT INTO `look_number` VALUES ('1', '5', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 10:13:36');
INSERT INTO `look_number` VALUES ('2', '6', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 10:23:04');
INSERT INTO `look_number` VALUES ('3', '6', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-23 10:25:14');
INSERT INTO `look_number` VALUES ('4', '8', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-23 10:26:04');
INSERT INTO `look_number` VALUES ('5', '6', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-23 10:26:23');
INSERT INTO `look_number` VALUES ('6', '8', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 10:27:27');
INSERT INTO `look_number` VALUES ('7', '9', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 10:33:56');
INSERT INTO `look_number` VALUES ('8', '6', null, '192.168.0.60', '2019-08-23 10:34:30');
INSERT INTO `look_number` VALUES ('9', '7', null, '192.168.0.60', '2019-08-23 10:34:34');
INSERT INTO `look_number` VALUES ('10', '10', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 10:36:50');
INSERT INTO `look_number` VALUES ('11', '11', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 10:56:45');
INSERT INTO `look_number` VALUES ('12', '11', 'f2cf52a89e60fd16a73ee4e9f2c77702', null, '2019-08-23 11:06:01');
INSERT INTO `look_number` VALUES ('13', '18', 'f2cf52a89e60fd16a73ee4e9f2c77702', null, '2019-08-23 11:06:12');
INSERT INTO `look_number` VALUES ('14', '12', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 11:12:39');
INSERT INTO `look_number` VALUES ('15', '11', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 11:11:27');
INSERT INTO `look_number` VALUES ('16', '19', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 11:21:37');
INSERT INTO `look_number` VALUES ('17', '11', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-23 11:22:27');
INSERT INTO `look_number` VALUES ('18', '11', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-23 11:24:47');
INSERT INTO `look_number` VALUES ('19', '11', null, '192.168.0.53', '2019-08-23 11:29:29');
INSERT INTO `look_number` VALUES ('20', '19', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 11:28:35');
INSERT INTO `look_number` VALUES ('21', '12', null, '192.168.0.53', '2019-08-23 11:33:46');
INSERT INTO `look_number` VALUES ('22', '12', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-23 11:38:06');
INSERT INTO `look_number` VALUES ('23', '11', null, '127.0.0.1', '2019-08-23 11:39:09');
INSERT INTO `look_number` VALUES ('24', '12', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-23 11:47:03');
INSERT INTO `look_number` VALUES ('25', '12', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 11:47:33');
INSERT INTO `look_number` VALUES ('26', '19', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-23 14:28:28');
INSERT INTO `look_number` VALUES ('27', '17', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 15:06:32');
INSERT INTO `look_number` VALUES ('28', '18', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 15:06:47');
INSERT INTO `look_number` VALUES ('29', '23', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 15:16:19');
INSERT INTO `look_number` VALUES ('30', '50', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 15:20:10');
INSERT INTO `look_number` VALUES ('31', '50', 'f2cf52a89e60fd16a73ee4e9f2c77702', null, '2019-08-23 15:21:37');
INSERT INTO `look_number` VALUES ('32', '51', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 15:23:57');
INSERT INTO `look_number` VALUES ('33', '51', 'f2cf52a89e60fd16a73ee4e9f2c77702', null, '2019-08-23 15:24:23');
INSERT INTO `look_number` VALUES ('34', '51', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-23 15:31:31');
INSERT INTO `look_number` VALUES ('35', '22', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-23 16:36:59');
INSERT INTO `look_number` VALUES ('36', '22', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-23 16:37:53');
INSERT INTO `look_number` VALUES ('37', '51', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-23 17:04:26');
INSERT INTO `look_number` VALUES ('38', '37', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-23 17:05:35');
INSERT INTO `look_number` VALUES ('39', '50', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-23 17:07:06');
