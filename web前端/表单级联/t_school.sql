/*
MySQL Data Transfer
Source Host: localhost
Source Database: myframe
Target Host: localhost
Target Database: myframe
Date: 2018/1/5 9:44:33
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for t_school
-- ----------------------------
CREATE TABLE `t_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '学校名',
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT '年级',
  `class` int(11) NOT NULL DEFAULT '0' COMMENT '班级',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unid` (`class`,`grade`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `t_school` VALUES ('2', '', '2', '2', '');
INSERT INTO `t_school` VALUES ('3', '', '3', '1', '');
