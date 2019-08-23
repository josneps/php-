/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-23 18:26:34
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COMMENT='设计师答题积分表';

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
