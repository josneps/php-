/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-28 18:24:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for designer_integral
-- ----------------------------
DROP TABLE IF EXISTS `designer_integral`;
CREATE TABLE `designer_integral` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `a_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '设计师的mid',
  `a_questions_id` int(11) DEFAULT NULL COMMENT '问题id',
  `details` varchar(255) DEFAULT NULL COMMENT '记录积分详情',
  `number` int(10) NOT NULL DEFAULT '0' COMMENT '设计师积分',
  `status` tinyint(1) DEFAULT NULL COMMENT '1表示解答、 2表示被采纳、 3表示消费',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COMMENT='设计师答题积分表';

-- ----------------------------
-- Records of designer_integral
-- ----------------------------
INSERT INTO `designer_integral` VALUES ('1', '761eca9862310ba4c9e81d7a77754711', '8', null, '2', '1', '2019-08-23 10:30:05');
INSERT INTO `designer_integral` VALUES ('2', '1e77a447b0c0df612844af2594c5973d', '6', null, '2', '1', '2019-08-23 10:38:35');
INSERT INTO `designer_integral` VALUES ('3', '1e77a447b0c0df612844af2594c5973d', '6', null, '10', '2', '2019-08-23 10:47:02');
INSERT INTO `designer_integral` VALUES ('4', '761eca9862310ba4c9e81d7a77754711', '11', null, '3', '1', '2019-08-23 11:26:00');
INSERT INTO `designer_integral` VALUES ('5', '1e77a447b0c0df612844af2594c5973d', '11', null, '3', '1', '2019-08-23 11:26:26');
INSERT INTO `designer_integral` VALUES ('6', '1e77a447b0c0df612844af2594c5973d', '12', null, '3', '1', '2019-08-23 11:47:22');
INSERT INTO `designer_integral` VALUES ('7', '761eca9862310ba4c9e81d7a77754711', '12', null, '3', '1', '2019-08-23 11:47:53');
INSERT INTO `designer_integral` VALUES ('8', '1e77a447b0c0df612844af2594c5973d', '12', null, '10', '2', '2019-08-23 11:48:25');
INSERT INTO `designer_integral` VALUES ('9', '761eca9862310ba4c9e81d7a77754711', '19', null, '3', '1', '2019-08-23 14:15:07');
INSERT INTO `designer_integral` VALUES ('10', '761eca9862310ba4c9e81d7a77754711', '11', null, '10', '2', '2019-08-23 14:56:46');
INSERT INTO `designer_integral` VALUES ('11', '761eca9862310ba4c9e81d7a77754711', '18', null, '3', '1', '2019-08-23 15:06:58');
INSERT INTO `designer_integral` VALUES ('12', '761eca9862310ba4c9e81d7a77754711', '18', null, '10', '2', '2019-08-23 15:07:26');
INSERT INTO `designer_integral` VALUES ('13', '761eca9862310ba4c9e81d7a77754711', '50', null, '3', '1', '2019-08-23 15:20:37');
INSERT INTO `designer_integral` VALUES ('14', '761eca9862310ba4c9e81d7a77754711', '50', null, '10', '2', '2019-08-23 15:21:43');
INSERT INTO `designer_integral` VALUES ('15', '761eca9862310ba4c9e81d7a77754711', '51', null, '3', '1', '2019-08-23 15:24:05');
INSERT INTO `designer_integral` VALUES ('16', '761eca9862310ba4c9e81d7a77754711', '51', null, '10', '2', '2019-08-23 15:24:28');
INSERT INTO `designer_integral` VALUES ('17', '1e77a447b0c0df612844af2594c5973d', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-23 16:26:59');
INSERT INTO `designer_integral` VALUES ('18', '1e77a447b0c0df612844af2594c5973d', '22', null, '3', '1', '2019-08-23 16:37:27');
INSERT INTO `designer_integral` VALUES ('19', '761eca9862310ba4c9e81d7a77754711', '23', null, '3', '1', '2019-08-24 09:47:13');
INSERT INTO `designer_integral` VALUES ('20', '761eca9862310ba4c9e81d7a77754711', '53', null, '3', '1', '2019-08-24 10:48:55');
INSERT INTO `designer_integral` VALUES ('21', '761eca9862310ba4c9e81d7a77754711', '53', null, '10', '2', '2019-08-24 10:50:01');
INSERT INTO `designer_integral` VALUES ('22', '761eca9862310ba4c9e81d7a77754711', '25', null, '3', '1', '2019-08-24 11:30:29');
INSERT INTO `designer_integral` VALUES ('23', '761eca9862310ba4c9e81d7a77754711', '28', null, '3', '1', '2019-08-25 10:00:37');
INSERT INTO `designer_integral` VALUES ('24', '1e77a447b0c0df612844af2594c5973d', '8', null, '3', '1', '2019-08-26 14:24:29');
INSERT INTO `designer_integral` VALUES ('25', '761eca9862310ba4c9e81d7a77754711', '8', null, '10', '2', '2019-08-26 14:38:26');
INSERT INTO `designer_integral` VALUES ('26', '1e77a447b0c0df612844af2594c5973d', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-26 15:01:04');
INSERT INTO `designer_integral` VALUES ('27', '761eca9862310ba4c9e81d7a77754711', '84', null, '3', '1', '2019-08-26 16:05:45');
INSERT INTO `designer_integral` VALUES ('28', '761eca9862310ba4c9e81d7a77754711', '79', null, '3', '1', '2019-08-26 16:29:48');
INSERT INTO `designer_integral` VALUES ('29', '761eca9862310ba4c9e81d7a77754711', '85', null, '3', '1', '2019-08-26 17:05:05');
INSERT INTO `designer_integral` VALUES ('30', '761eca9862310ba4c9e81d7a77754711', '19', null, '10', '2', '2019-08-26 17:13:01');
INSERT INTO `designer_integral` VALUES ('31', '761eca9862310ba4c9e81d7a77754711', '88', null, '3', '1', '2019-08-26 17:13:45');
INSERT INTO `designer_integral` VALUES ('32', '761eca9862310ba4c9e81d7a77754711', '86', null, '3', '1', '2019-08-26 17:14:42');
INSERT INTO `designer_integral` VALUES ('33', '761eca9862310ba4c9e81d7a77754711', '96', null, '3', '1', '2019-08-26 17:46:35');
INSERT INTO `designer_integral` VALUES ('34', '761eca9862310ba4c9e81d7a77754711', '96', null, '10', '2', '2019-08-26 17:47:05');
INSERT INTO `designer_integral` VALUES ('35', '761eca9862310ba4c9e81d7a77754711', '90', null, '3', '1', '2019-08-26 17:55:47');
INSERT INTO `designer_integral` VALUES ('36', '761eca9862310ba4c9e81d7a77754711', '98', null, '3', '1', '2019-08-27 08:38:53');
INSERT INTO `designer_integral` VALUES ('37', '761eca9862310ba4c9e81d7a77754711', '98', null, '10', '2', '2019-08-27 09:47:17');
INSERT INTO `designer_integral` VALUES ('38', 'ce97d0760f72592e689aaf48f943007f', '79', null, '3', '1', '2019-08-27 09:51:55');
INSERT INTO `designer_integral` VALUES ('39', '1e77a447b0c0df612844af2594c5973d', '23', null, '3', '1', '2019-08-27 09:57:53');
INSERT INTO `designer_integral` VALUES ('40', '761eca9862310ba4c9e81d7a77754711', '95', null, '3', '1', '2019-08-27 10:02:44');
INSERT INTO `designer_integral` VALUES ('41', '761eca9862310ba4c9e81d7a77754711', '95', null, '10', '2', '2019-08-27 10:03:11');
INSERT INTO `designer_integral` VALUES ('42', '1e77a447b0c0df612844af2594c5973d', '23', null, '10', '2', '2019-08-27 10:08:00');
INSERT INTO `designer_integral` VALUES ('43', '761eca9862310ba4c9e81d7a77754711', '93', null, '3', '1', '2019-08-27 10:10:44');
INSERT INTO `designer_integral` VALUES ('44', '761eca9862310ba4c9e81d7a77754711', '94', null, '3', '1', '2019-08-27 10:11:29');
INSERT INTO `designer_integral` VALUES ('45', '761eca9862310ba4c9e81d7a77754711', '94', null, '10', '2', '2019-08-27 10:12:13');
INSERT INTO `designer_integral` VALUES ('46', '761eca9862310ba4c9e81d7a77754711', '93', null, '10', '2', '2019-08-27 10:12:21');
INSERT INTO `designer_integral` VALUES ('47', '1e77a447b0c0df612844af2594c5973d', '98', null, '3', '1', '2019-08-27 14:28:14');
INSERT INTO `designer_integral` VALUES ('48', '761eca9862310ba4c9e81d7a77754711', '84', null, '10', '2', '2019-08-27 16:08:55');
INSERT INTO `designer_integral` VALUES ('49', '761eca9862310ba4c9e81d7a77754711', '99', null, '3', '1', '2019-08-27 16:10:41');
INSERT INTO `designer_integral` VALUES ('50', '761eca9862310ba4c9e81d7a77754711', '99', null, '10', '2', '2019-08-27 16:10:52');
INSERT INTO `designer_integral` VALUES ('55', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:18:23');
INSERT INTO `designer_integral` VALUES ('56', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:20:21');
INSERT INTO `designer_integral` VALUES ('57', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:33:41');
INSERT INTO `designer_integral` VALUES ('58', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:33:59');
INSERT INTO `designer_integral` VALUES ('59', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:35:19');
INSERT INTO `designer_integral` VALUES ('60', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:35:55');
INSERT INTO `designer_integral` VALUES ('61', '1e77a447b0c0df612844af2594c5973d', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:37:31');
INSERT INTO `designer_integral` VALUES ('62', '1e77a447b0c0df612844af2594c5973d', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:39:06');
INSERT INTO `designer_integral` VALUES ('63', '1e77a447b0c0df612844af2594c5973d', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:39:41');
INSERT INTO `designer_integral` VALUES ('64', '1e77a447b0c0df612844af2594c5973d', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:41:31');
INSERT INTO `designer_integral` VALUES ('65', '1e77a447b0c0df612844af2594c5973d', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:42:02');
INSERT INTO `designer_integral` VALUES ('66', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:43:02');
INSERT INTO `designer_integral` VALUES ('67', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 16:49:30');
INSERT INTO `designer_integral` VALUES ('68', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:57:11');
INSERT INTO `designer_integral` VALUES ('69', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 16:58:37');
INSERT INTO `designer_integral` VALUES ('70', '761eca9862310ba4c9e81d7a77754711', null, '兑换30渲染点扣除480积分', '480', '3', '2019-08-27 17:03:27');
INSERT INTO `designer_integral` VALUES ('71', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:04:17');
INSERT INTO `designer_integral` VALUES ('72', '761eca9862310ba4c9e81d7a77754711', null, '兑换30渲染点扣除480积分', '480', '3', '2019-08-27 17:06:01');
INSERT INTO `designer_integral` VALUES ('73', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:07:08');
INSERT INTO `designer_integral` VALUES ('74', '761eca9862310ba4c9e81d7a77754711', null, '兑换30渲染点扣除480积分', '480', '3', '2019-08-27 17:07:27');
INSERT INTO `designer_integral` VALUES ('75', '761eca9862310ba4c9e81d7a77754711', null, '兑换30渲染点扣除480积分', '480', '3', '2019-08-27 17:07:43');
INSERT INTO `designer_integral` VALUES ('76', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:08:58');
INSERT INTO `designer_integral` VALUES ('77', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:09:07');
INSERT INTO `designer_integral` VALUES ('78', '761eca9862310ba4c9e81d7a77754711', null, '兑换30渲染点扣除480积分', '480', '3', '2019-08-27 17:09:23');
INSERT INTO `designer_integral` VALUES ('79', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:09:25');
INSERT INTO `designer_integral` VALUES ('80', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:09:28');
INSERT INTO `designer_integral` VALUES ('81', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:09:33');
INSERT INTO `designer_integral` VALUES ('82', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:09:35');
INSERT INTO `designer_integral` VALUES ('83', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:10:32');
INSERT INTO `designer_integral` VALUES ('84', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:26:51');
INSERT INTO `designer_integral` VALUES ('85', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:50:48');
INSERT INTO `designer_integral` VALUES ('86', 'ce97d0760f72592e689aaf48f943007f', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:52:36');
INSERT INTO `designer_integral` VALUES ('87', 'ce97d0760f72592e689aaf48f943007f', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:53:33');
INSERT INTO `designer_integral` VALUES ('88', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:56:02');
INSERT INTO `designer_integral` VALUES ('89', '761eca9862310ba4c9e81d7a77754711', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 17:57:00');
INSERT INTO `designer_integral` VALUES ('90', '761eca9862310ba4c9e81d7a77754711', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 17:57:07');
INSERT INTO `designer_integral` VALUES ('91', 'ce97d0760f72592e689aaf48f943007f', null, '兑换20渲染点扣除350积分', '350', '3', '2019-08-27 18:02:55');
INSERT INTO `designer_integral` VALUES ('92', 'ce97d0760f72592e689aaf48f943007f', null, '兑换30渲染点扣除480积分', '480', '3', '2019-08-27 18:03:02');
INSERT INTO `designer_integral` VALUES ('93', 'ce97d0760f72592e689aaf48f943007f', null, '兑换10渲染点扣除200积分', '200', '3', '2019-08-27 18:03:19');
