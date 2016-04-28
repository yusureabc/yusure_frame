/*
Navicat MySQL Data Transfer

Source Server         : Me
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : message

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-04-05 22:01:46
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='主留言 表';

-- ----------------------------
-- Records of msg_message
-- ----------------------------
INSERT INTO `msg_message` VALUES ('23', '28', 'yusure', '昨天和一个读者微信交流。', '1459863303');
INSERT INTO `msg_message` VALUES ('24', '28', 'yusure', '她：“我男朋友人特别好，跟我特别合，我们也互相很喜欢对方。我真觉得他就是我的Mr.right。但他离过婚，这让我很苦恼。我自己条件挺好的，实在不想让别人说我挑来挑去，最后却找了个离婚的。”', '1459863322');
INSERT INTO `msg_message` VALUES ('25', '28', 'yusure', '“时间不长，就五个多月，也没孩子，离婚是因为他们没感情，他本来不想结，但他妈觉得那个姑娘好，逼他，那时候他妈身体不好，因为他不想结婚，气得脑梗住院，差点过世，他无奈之下答应的。这些情况当时我就听说过，当然那时候我们还不太认识。谈恋爱以后，我去他家，他妈见了我就哭，说自己以前太糊涂了，儿子明明不愿意还那么逼他，结果闹成这样。”', '1459863340');
INSERT INTO `msg_message` VALUES ('26', '28', 'yusure', '“是我前男友啊。”', '1459863351');

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
INSERT INTO `msg_user` VALUES ('28', 'yusure', 'e10adc3949ba59abbe56e057f20f883e', '1', 'http://frame.message.com/Public/upload/avatar/avatar_799bad5a3b514f096e69bbc4a7896cd9.jpg');
