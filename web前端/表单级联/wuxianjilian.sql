/*
MySQL Data Transfer
Source Host: localhost
Source Database: test
Target Host: localhost
Target Database: test
Date: 2018/1/2 17:49:15
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for wuxianjilian
-- ----------------------------
CREATE TABLE `wuxianjilian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `text` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `wuxianjilian` VALUES ('1', '0', 'A0');
INSERT INTO `wuxianjilian` VALUES ('2', '0', 'B0');
INSERT INTO `wuxianjilian` VALUES ('3', '1', 'C1');
INSERT INTO `wuxianjilian` VALUES ('4', '1', 'D1');
INSERT INTO `wuxianjilian` VALUES ('5', '1', 'E1');
INSERT INTO `wuxianjilian` VALUES ('6', '2', 'F2');
INSERT INTO `wuxianjilian` VALUES ('7', '2', 'G2');
INSERT INTO `wuxianjilian` VALUES ('8', '3', 'H3');
INSERT INTO `wuxianjilian` VALUES ('9', '3', 'I3');
INSERT INTO `wuxianjilian` VALUES ('10', '3', 'J3');
INSERT INTO `wuxianjilian` VALUES ('11', '3', 'K3');
INSERT INTO `wuxianjilian` VALUES ('12', '4', 'L4');
INSERT INTO `wuxianjilian` VALUES ('13', '4', 'M4');
INSERT INTO `wuxianjilian` VALUES ('14', '8', 'N8');
INSERT INTO `wuxianjilian` VALUES ('15', '9', 'N9');
INSERT INTO `wuxianjilian` VALUES ('16', '14', 'O14');
INSERT INTO `wuxianjilian` VALUES ('17', '14', 'P14');
INSERT INTO `wuxianjilian` VALUES ('18', '14', 'Q14');
INSERT INTO `wuxianjilian` VALUES ('19', '17', 'R17');
INSERT INTO `wuxianjilian` VALUES ('20', '17', 'S18');
INSERT INTO `wuxianjilian` VALUES ('21', '20', 'T20');
