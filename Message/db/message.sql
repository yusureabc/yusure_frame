/*
Navicat MySQL Data Transfer

Source Server         : Me
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : message

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-04-05 16:44:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for msg_message
-- ----------------------------
DROP TABLE IF EXISTS `msg_message`;
CREATE TABLE `msg_message` (
  `message_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言ID',
  `userid` int(11) unsigned NOT NULL COMMENT '发送用户ID',
  `username` varchar(50) NOT NULL COMMENT '发送用户名',
  `content` text COMMENT '留言内容',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='主留言 表';

-- ----------------------------
-- Records of msg_message
-- ----------------------------

-- ----------------------------
-- Table structure for msg_reply
-- ----------------------------
DROP TABLE IF EXISTS `msg_reply`;
CREATE TABLE `msg_reply` (
  `reply_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '回复自增ID',
  `message_id` int(11) unsigned NOT NULL COMMENT '主留言ID',
  `userid` int(11) unsigned NOT NULL COMMENT '发送用户ID',
  `username` varchar(50) NOT NULL COMMENT '发送用户名',
  `content` text COMMENT '留言内容',
  `receive_id` int(11) unsigned NOT NULL COMMENT '接收者ID',
  `receive_name` varchar(50) NOT NULL COMMENT '接收者用户名',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态  1、未读  2、已读',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `level` tinyint(255) unsigned NOT NULL DEFAULT '1' COMMENT '回复等级  1级直接回复留言，2级直接回复评论',
  `level_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级评论ID',
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言回复 表';

-- ----------------------------
-- Records of msg_reply
-- ----------------------------

-- ----------------------------
-- Table structure for msg_user
-- ----------------------------
DROP TABLE IF EXISTS `msg_user`;
CREATE TABLE `msg_user` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '性别  1男 2女',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of msg_user
-- ----------------------------
INSERT INTO `msg_user` VALUES ('2', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('3', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('4', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('5', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('6', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('7', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('8', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('9', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('10', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('11', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('12', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('13', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('14', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('15', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('16', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('17', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('18', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('19', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('20', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('21', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('22', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('23', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('24', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('25', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('26', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('27', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
INSERT INTO `msg_user` VALUES ('28', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
