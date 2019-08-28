/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-28 18:25:25
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
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COMMENT='问题被浏览次数';

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
INSERT INTO `look_number` VALUES ('40', '6', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-24 08:58:41');
INSERT INTO `look_number` VALUES ('41', '12', null, '127.0.0.1', '2019-08-24 09:12:26');
INSERT INTO `look_number` VALUES ('42', '23', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-24 09:43:05');
INSERT INTO `look_number` VALUES ('43', '23', null, '127.0.0.1', '2019-08-24 10:08:07');
INSERT INTO `look_number` VALUES ('44', '53', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-24 10:47:01');
INSERT INTO `look_number` VALUES ('45', '53', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-24 10:48:07');
INSERT INTO `look_number` VALUES ('46', '10', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-24 11:00:29');
INSERT INTO `look_number` VALUES ('47', '21', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-24 11:00:34');
INSERT INTO `look_number` VALUES ('48', '32', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-24 11:00:40');
INSERT INTO `look_number` VALUES ('49', '25', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-24 11:02:20');
INSERT INTO `look_number` VALUES ('50', '25', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-24 11:28:09');
INSERT INTO `look_number` VALUES ('51', '22', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-24 15:01:58');
INSERT INTO `look_number` VALUES ('52', '53', null, '127.0.0.1', '2019-08-24 15:31:29');
INSERT INTO `look_number` VALUES ('53', '13', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-24 17:43:10');
INSERT INTO `look_number` VALUES ('54', '51', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-24 17:52:49');
INSERT INTO `look_number` VALUES ('55', '54', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-25 09:52:30');
INSERT INTO `look_number` VALUES ('56', '28', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-25 09:59:02');
INSERT INTO `look_number` VALUES ('57', '22', null, '192.168.0.60', '2019-08-26 08:56:58');
INSERT INTO `look_number` VALUES ('58', '58', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 09:24:37');
INSERT INTO `look_number` VALUES ('59', '58', null, '127.0.0.1', '2019-08-26 10:21:45');
INSERT INTO `look_number` VALUES ('60', '54', null, '127.0.0.1', '2019-08-26 10:21:59');
INSERT INTO `look_number` VALUES ('61', '54', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 10:27:30');
INSERT INTO `look_number` VALUES ('62', '62', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 10:43:59');
INSERT INTO `look_number` VALUES ('63', '63', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 10:44:05');
INSERT INTO `look_number` VALUES ('64', '70', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 10:53:44');
INSERT INTO `look_number` VALUES ('65', '72', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 10:55:22');
INSERT INTO `look_number` VALUES ('66', '79', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 11:15:11');
INSERT INTO `look_number` VALUES ('67', '8', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-26 13:55:39');
INSERT INTO `look_number` VALUES ('68', '70', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 14:19:20');
INSERT INTO `look_number` VALUES ('69', '18', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-26 14:32:41');
INSERT INTO `look_number` VALUES ('70', '51', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-26 14:36:18');
INSERT INTO `look_number` VALUES ('71', '8', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-26 14:38:17');
INSERT INTO `look_number` VALUES ('72', '6', 'ce97d0760f72592e689aaf48f943007f', null, '2019-08-26 14:42:44');
INSERT INTO `look_number` VALUES ('73', '6', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 14:50:44');
INSERT INTO `look_number` VALUES ('74', '6', '676fb5161b52e0920229f4df44c5a10e', null, '2019-08-26 14:51:03');
INSERT INTO `look_number` VALUES ('75', '84', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 16:02:02');
INSERT INTO `look_number` VALUES ('76', '84', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 16:04:49');
INSERT INTO `look_number` VALUES ('77', '84', null, '192.168.0.60', '2019-08-26 16:08:03');
INSERT INTO `look_number` VALUES ('78', '8', null, '127.0.0.1', '2019-08-26 16:19:26');
INSERT INTO `look_number` VALUES ('79', '84', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 16:21:15');
INSERT INTO `look_number` VALUES ('80', '2', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 16:29:21');
INSERT INTO `look_number` VALUES ('81', '79', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 16:29:41');
INSERT INTO `look_number` VALUES ('82', '79', null, '127.0.0.1', '2019-08-26 16:30:12');
INSERT INTO `look_number` VALUES ('83', '6', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 16:51:03');
INSERT INTO `look_number` VALUES ('84', '79', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 16:51:34');
INSERT INTO `look_number` VALUES ('85', '79', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 16:55:58');
INSERT INTO `look_number` VALUES ('86', '84', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 16:58:10');
INSERT INTO `look_number` VALUES ('87', '11', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 16:58:45');
INSERT INTO `look_number` VALUES ('88', '85', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 17:04:56');
INSERT INTO `look_number` VALUES ('89', '85', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 17:05:25');
INSERT INTO `look_number` VALUES ('90', '85', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 17:04:36');
INSERT INTO `look_number` VALUES ('91', '19', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 17:05:22');
INSERT INTO `look_number` VALUES ('92', '79', null, '192.168.0.60', '2019-08-26 17:08:26');
INSERT INTO `look_number` VALUES ('93', '19', null, '192.168.0.60', '2019-08-26 17:09:16');
INSERT INTO `look_number` VALUES ('94', '88', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 17:13:29');
INSERT INTO `look_number` VALUES ('95', '88', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 17:13:38');
INSERT INTO `look_number` VALUES ('96', '86', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 17:14:35');
INSERT INTO `look_number` VALUES ('97', '86', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-26 17:14:55');
INSERT INTO `look_number` VALUES ('98', '88', null, '192.168.0.53', '2019-08-26 17:16:34');
INSERT INTO `look_number` VALUES ('99', '84', null, '192.168.0.53', '2019-08-26 17:17:04');
INSERT INTO `look_number` VALUES ('100', '79', null, '192.168.0.53', '2019-08-26 17:17:37');
INSERT INTO `look_number` VALUES ('101', '96', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 17:42:01');
INSERT INTO `look_number` VALUES ('102', '79', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-26 17:46:18');
INSERT INTO `look_number` VALUES ('103', '96', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 17:46:19');
INSERT INTO `look_number` VALUES ('104', '90', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 17:55:17');
INSERT INTO `look_number` VALUES ('105', '90', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-26 17:55:32');
INSERT INTO `look_number` VALUES ('106', '87', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-26 17:57:04');
INSERT INTO `look_number` VALUES ('107', '96', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-26 18:34:42');
INSERT INTO `look_number` VALUES ('108', '98', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-27 08:38:23');
INSERT INTO `look_number` VALUES ('109', '97', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-27 08:56:30');
INSERT INTO `look_number` VALUES ('110', '96', null, '192.168.0.53', '2019-08-27 08:59:17');
INSERT INTO `look_number` VALUES ('111', '92', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-27 09:00:49');
INSERT INTO `look_number` VALUES ('112', '98', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-27 09:46:44');
INSERT INTO `look_number` VALUES ('113', '79', 'ce97d0760f72592e689aaf48f943007f', null, '2019-08-27 09:50:53');
INSERT INTO `look_number` VALUES ('114', '23', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 09:54:19');
INSERT INTO `look_number` VALUES ('115', '95', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-27 10:02:27');
INSERT INTO `look_number` VALUES ('116', '95', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-27 10:03:03');
INSERT INTO `look_number` VALUES ('117', '23', '676fb5161b52e0920229f4df44c5a10e', null, '2019-08-27 10:03:37');
INSERT INTO `look_number` VALUES ('118', '95', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 10:04:39');
INSERT INTO `look_number` VALUES ('119', '93', null, '127.0.0.1', '2019-08-27 10:10:24');
INSERT INTO `look_number` VALUES ('120', '93', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-27 10:10:36');
INSERT INTO `look_number` VALUES ('121', '94', null, '127.0.0.1', '2019-08-27 10:11:11');
INSERT INTO `look_number` VALUES ('122', '94', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-27 10:11:21');
INSERT INTO `look_number` VALUES ('123', '94', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-27 10:12:07');
INSERT INTO `look_number` VALUES ('124', '93', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-27 10:12:17');
INSERT INTO `look_number` VALUES ('125', '94', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 10:14:00');
INSERT INTO `look_number` VALUES ('126', '98', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-27 10:18:02');
INSERT INTO `look_number` VALUES ('127', '87', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 10:33:08');
INSERT INTO `look_number` VALUES ('128', '90', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 10:33:14');
INSERT INTO `look_number` VALUES ('129', '79', '676fb5161b52e0920229f4df44c5a10e', null, '2019-08-27 10:39:40');
INSERT INTO `look_number` VALUES ('130', '23', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-27 10:40:20');
INSERT INTO `look_number` VALUES ('131', '12', null, '192.168.0.60', '2019-08-27 14:25:51');
INSERT INTO `look_number` VALUES ('132', '98', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 14:27:50');
INSERT INTO `look_number` VALUES ('133', '24', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-27 14:35:36');
INSERT INTO `look_number` VALUES ('134', '80', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-27 14:35:45');
INSERT INTO `look_number` VALUES ('135', '96', '1e77a447b0c0df612844af2594c5973d', null, '2019-08-27 15:20:02');
INSERT INTO `look_number` VALUES ('136', '7', 'ea65a5b835f2ba0bddc9b1926d1ab05c', null, '2019-08-27 15:27:42');
INSERT INTO `look_number` VALUES ('137', '84', null, '127.0.0.1', '2019-08-27 16:08:20');
INSERT INTO `look_number` VALUES ('138', '95', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-27 16:09:36');
INSERT INTO `look_number` VALUES ('139', '99', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-27 16:10:22');
INSERT INTO `look_number` VALUES ('140', '99', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-27 16:10:32');
INSERT INTO `look_number` VALUES ('141', '99', null, '127.0.0.1', '2019-08-27 17:05:54');
INSERT INTO `look_number` VALUES ('142', '99', '074e9766d9576fec8c69277a1121f9d8', null, '2019-08-27 17:33:41');
INSERT INTO `look_number` VALUES ('143', '106', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-27 17:58:39');
INSERT INTO `look_number` VALUES ('144', '106', '761eca9862310ba4c9e81d7a77754711', null, '2019-08-28 08:30:01');
INSERT INTO `look_number` VALUES ('145', '99', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-28 08:47:38');
INSERT INTO `look_number` VALUES ('146', '98', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-28 09:40:40');
INSERT INTO `look_number` VALUES ('147', '98', null, '127.0.0.1', '2019-08-28 10:17:11');
INSERT INTO `look_number` VALUES ('148', '23', '0a050cd6c513b864fbd4c611d06472a4', null, '2019-08-28 12:53:53');
INSERT INTO `look_number` VALUES ('149', '99', null, '192.168.0.60', '2019-08-28 14:00:01');
INSERT INTO `look_number` VALUES ('150', '106', null, '192.168.0.60', '2019-08-28 14:00:39');
INSERT INTO `look_number` VALUES ('151', '93', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-28 15:49:07');
INSERT INTO `look_number` VALUES ('152', '88', 'b9335151424fa382a84ecf6e3c46bc10', null, '2019-08-28 17:18:29');
