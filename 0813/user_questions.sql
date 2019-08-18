/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.243
Source Server Version : 50627
Source Host           : 192.168.0.243:3306
Source Database       : thd

Target Server Type    : MYSQL
Target Server Version : 50627
File Encoding         : 65001

Date: 2019-08-15 18:42:12
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
  `q_title` varchar(255) NOT NULL COMMENT '问题标题',
  `q_title_content` varchar(255) DEFAULT NULL COMMENT '问题内容',
  `q_access_device` tinyint(2) NOT NULL DEFAULT '1' COMMENT '访问设备 1 PC 2 安卓 3 IOS 4 其他',
  `q_status` tinyint(1) DEFAULT '1' COMMENT '1表示未查看、 2表示未解答、 3表示已解答',
  `q_del` tinyint(1) DEFAULT '1' COMMENT '1表示显示、0表示删除',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='用户提的问题';

-- ----------------------------
-- Records of user_questions
-- ----------------------------
INSERT INTO `user_questions` VALUES ('1', '0a050cd6c513b864fbd4c611d06472a4', '张三', '5987d2dfd2b18.png', '新房漏水132', '家里新买的房子哥哥和认同和该找谁……', '1', '1', '1', '2019-08-14 13:51:47', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('2', '0a050cd6c513b864fbd4c611d06472a4', '李四', '5987d2dfd2b18.png', '新房漏水456', '', '1', '1', '1', '2019-08-13 10:15:48', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('3', '0a050cd6c513b864fbd4c611d06472a4', '王五', '5987d2dfd2b18.png', '新房漏水789', '家里新买的房子居然发货奇偶的福晶科技漏水，该找谁……', '1', '1', '1', '2019-08-13 10:15:50', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('4', '0a050cd6c513b864fbd4c611d06472a4', '赵六', '5987d2dfd2b18.png', '新房漏水153', '家里新买的房子居挨个发打飞机微积分我就感觉的漏水，该找谁……', '1', '1', '1', '2019-08-13 10:15:51', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('5', '0a050cd6c513b864fbd4c611d06472a4', '老七', '5987d2dfd2b18.png', '新房漏水756', '家里新买的房子居经安徽省覅回单卡Hi好将刊发科技馆个偶见付款即然漏水，该找谁……', '1', '1', '1', '2019-07-01 10:15:52', '2019-08-13 15:21:34');
INSERT INTO `user_questions` VALUES ('6', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '失误失误', '', '1', '1', '1', '2019-08-15 17:45:42', '2019-08-15 17:45:42');
INSERT INTO `user_questions` VALUES ('7', '0a050cd6c513b864fbd4c611d06472a4', '陈达解决计', '5add85477318e.JPG', '测试', '', '1', '1', '1', '2019-08-15 17:48:20', '2019-08-15 17:48:20');
