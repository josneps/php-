/*
Navicat MySQL Data Transfer

Source Server         : 91数据库
Source Server Version : 50627
Source Host           : 106.75.210.206:3306
Source Database       : 91thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-23 18:25:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for win_farmcard
-- ----------------------------
DROP TABLE IF EXISTS `win_farmcard`;
CREATE TABLE `win_farmcard` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `card_name` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '卡名（不能重）',
  `card_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '卡类:0-渲染卡1-设计师账户升级赠送卡|2-设计师邀请后赠送卡|3-设计师充值区渲染卡',
  `card_num` int(11) NOT NULL COMMENT '卡含点数',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '购买该卡所需要金额',
  `discern` smallint(4) NOT NULL COMMENT '卡识别标识4位。',
  `validity_days` smallint(4) NOT NULL DEFAULT '0' COMMENT '有效天数',
  `already_create` int(11) NOT NULL DEFAULT '0' COMMENT '已生成数量',
  `last_create` smallint(4) NOT NULL DEFAULT '0' COMMENT '最后一次生成数量',
  `last_time` datetime DEFAULT NULL COMMENT '最后一次生成时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:0-已删除|1-有效',
  `create_time` datetime NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of win_farmcard
-- ----------------------------
INSERT INTO `win_farmcard` VALUES ('1', 'test001', '0', '200', '0.00', '8917', '365', '15', '5', '2017-08-29 16:45:51', '1', '2017-08-29 10:46:41');
INSERT INTO `win_farmcard` VALUES ('2', '测试卡', '0', '100', '0.00', '3721', '365', '100', '100', '2017-08-29 14:45:35', '1', '2017-08-29 14:12:04');
INSERT INTO `win_farmcard` VALUES ('3', 'VIP渲染卡', '0', '50', '0.00', '1608', '100', '10', '10', '2017-09-19 15:29:16', '1', '2017-09-19 15:29:06');
INSERT INTO `win_farmcard` VALUES ('4', '白银渲染卡', '0', '100', '0.00', '7783', '180', '200', '200', '2017-09-20 16:06:44', '1', '2017-09-20 16:06:27');
INSERT INTO `win_farmcard` VALUES ('5', '测试卡1', '0', '3', '0.00', '8439', '366', '30', '30', '2017-10-11 09:35:47', '1', '2017-10-11 09:35:32');
INSERT INTO `win_farmcard` VALUES ('6', '渲染卡', '0', '100', '0.00', '4709', '366', '500', '500', '2017-11-24 16:24:55', '1', '2017-11-24 16:24:41');
INSERT INTO `win_farmcard` VALUES ('7', '渲染卡', '0', '200', '0.00', '9738', '366', '100', '100', '2017-12-12 15:56:24', '1', '2017-12-12 15:56:13');
INSERT INTO `win_farmcard` VALUES ('8', '内部渲染卡', '0', '50', '0.00', '8722', '366', '100', '100', '2018-01-03 17:11:32', '1', '2018-01-03 17:11:21');
INSERT INTO `win_farmcard` VALUES ('9', '黑金渲染卡', '0', '100', '0.00', '6206', '366', '100', '100', '2018-04-23 15:45:34', '1', '2018-04-23 15:43:47');
INSERT INTO `win_farmcard` VALUES ('11', '渲染优惠卡', '1', '100', '0.00', '7583', '365', '63', '0', null, '1', '2018-05-15 11:13:25');
INSERT INTO `win_farmcard` VALUES ('15', '邀请注册赠送卡', '2', '100', '0.00', '5644', '180', '20', '0', null, '1', '2018-05-22 16:49:29');
INSERT INTO `win_farmcard` VALUES ('16', '渲染金卡', '3', '200', '799.00', '7380', '365', '1', '0', null, '1', '2018-11-26 17:26:56');
INSERT INTO `win_farmcard` VALUES ('17', '渲染白金卡', '3', '500', '1799.00', '3934', '365', '1', '0', null, '1', '2018-11-26 17:27:13');
INSERT INTO `win_farmcard` VALUES ('18', '超级VIP', '0', '2000', '0.00', '1055', '100', '0', '0', null, '0', '2018-12-05 10:23:49');
INSERT INTO `win_farmcard` VALUES ('19', '超级VIP', '3', '2000', '2500.00', '4298', '100', '6', '0', null, '1', '2018-12-05 10:24:50');
INSERT INTO `win_farmcard` VALUES ('20', '渲染小卡', '3', '20', '99.00', '4575', '365', '107', '100', '2019-07-27 14:00:42', '1', '2019-07-23 10:42:11');
INSERT INTO `win_farmcard` VALUES ('23', '151212', '0', '10', '0.00', '6917', '10', '0', '0', null, '1', '2019-08-23 16:01:04');
