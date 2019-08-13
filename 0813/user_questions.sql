/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-13 18:17:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_questions
-- ----------------------------
DROP TABLE IF EXISTS `user_questions`;
CREATE TABLE `user_questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `q_mid` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '业主的mid',
  `q_nickname` varchar(64) DEFAULT NULL COMMENT '个人用户昵称',
  `q_pic` varchar(256) DEFAULT '' COMMENT '用户头像',
  `q_title` varchar(100) NOT NULL COMMENT '问题标题',
  `q_title_content` varchar(255) NOT NULL COMMENT '问题内容',
  `q_access_device` tinyint(2) NOT NULL DEFAULT '1' COMMENT '访问设备 1 PC 2 安卓 3 IOS 4 其他',
  `q_status` tinyint(1) DEFAULT '1' COMMENT '0表示删除、 1表示未查看、 2表示未解答、 3表示已解答',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='用户提的问题';

-- ----------------------------
-- Records of user_questions
-- ----------------------------
INSERT INTO `user_questions` VALUES ('1', '56afc1b33187ada6bb67082ad03b1dca1', '张三', '5987d2dfd2b18.png', '新房漏水132', '家里新买的房子哥哥和认同和该找谁……', '1', '1', '2019-08-13 10:15:47', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('2', '56afc1b33187ada6bb67082ad03b1dca2', '李四', '5987d2dfd2b18.png', '新房漏水456', '家里新买的房子居按认购的法人兔兔的官方，该找谁……', '1', '1', '2019-08-13 10:15:48', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('3', '56afc1b33187ada6bb67082ad03b1dca3', '王五', '5987d2dfd2b18.png', '新房漏水789', '家里新买的房子居然发货奇偶的福晶科技漏水，该找谁……', '1', '1', '2019-08-13 10:15:50', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('4', '56afc1b33187ada6bb67082ad03b1dca4', '赵六', '5987d2dfd2b18.png', '新房漏水153', '家里新买的房子居挨个发打飞机微积分我就感觉的漏水，该找谁……', '1', '1', '2019-08-13 10:15:51', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('5', '56afc1b33187ada6bb67082ad03b1dca5', '老七', '5987d2dfd2b18.png', '新房漏水756', '家里新买的房子居经安徽省覅回单卡Hi好将刊发科技馆个偶见付款即然漏水，该找谁……', '1', '1', '2019-08-13 10:15:52', '2019-08-13 15:21:34');
