-- -----------------------------
-- Think MySQL Data Transfer 
-- 
-- Host     : 
-- Port     : 
-- Database : 
-- 
-- Part : #1
-- Date : 2017-06-30 16:08:04
-- -----------------------------

SET FOREIGN_KEY_CHECKS = 0;


-- -----------------------------
-- Table structure for `tp_ad_position`
-- -----------------------------
DROP TABLE IF EXISTS `tp_ad_position`;
CREATE TABLE `tp_ad_position` (
  `position_id` int(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `position_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告位置名称',
  `ad_width` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位宽度',
  `ad_height` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位高度',
  `position_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '广告描述',
  `position_style` text COMMENT '模板',
  `is_open` tinyint(1) DEFAULT '0' COMMENT '0关闭1开启',
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51317 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `tp_ad_position`
-- -----------------------------
INSERT INTO `tp_ad_position` VALUES ('1', '首页最顶部大块广告', '1200', '400', '首页顶部的广告位刚打开时弹出来过一会自动缩回去.', '', '0');
INSERT INTO `tp_ad_position` VALUES ('2', '首页banner广告轮播980*400', '980', '400', '首页banner广告轮播980*400', '', '0');
INSERT INTO `tp_ad_position` VALUES ('3', '首页中间1200*160广告条', '1200', '160', '', '', '0');
INSERT INTO `tp_ad_position` VALUES ('4', '首页底部1200*160广告条', '1200', '160', '首页底部的广告位', '', '0');
INSERT INTO `tp_ad_position` VALUES ('5', '团购页面底部广告1200*160', '1200', '160', '团购页面底部广告1200*160', '', '0');
INSERT INTO `tp_ad_position` VALUES ('6', '促销商品底部广告1200*160', '1200', '160', '团购页面底部广告1200*160', '', '0');
INSERT INTO `tp_ad_position` VALUES ('7', '首页公告上方广告位', '270', '310', '首页公告上方的广告位位置', '', '0');
INSERT INTO `tp_ad_position` VALUES ('8', '首页公告下方广告位', '278', '312', '首页公告下方广告位', '', '0');
INSERT INTO `tp_ad_position` VALUES ('9', 'User页面自动增加广告位 9 ', '0', '0', 'User页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('10', 'Index页面自动增加广告位 10 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('11', 'Channel页面自动增加广告位 11 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('12', 'Index页面自动增加广告位 12 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('13', 'Index页面自动增加广告位 13 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('14', 'Index页面自动增加广告位 14 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('15', 'Index页面自动增加广告位 15 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('50', 'Index页面自动增加广告位 50 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('51', 'Index页面自动增加广告位 51 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('52', 'Index页面自动增加广告位 52 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('53', 'Index页面自动增加广告位 53 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('54', 'Index页面自动增加广告位 54 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('55', 'Index页面自动增加广告位 55 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('56', 'Index页面自动增加广告位 56 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('57', 'Index页面自动增加广告位 57 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('58', 'Index页面自动增加广告位 58 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('59', 'Index页面自动增加广告位 59 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('60', 'Index页面自动增加广告位 60 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('61', 'Index页面自动增加广告位 61 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('70', 'Index页面自动增加广告位 70 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('71', 'Index页面自动增加广告位 71 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('72', 'Index页面自动增加广告位 72 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('81', 'Index页面自动增加广告位 81 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('82', 'Index页面自动增加广告位 82 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('83', 'Index页面自动增加广告位 83 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('84', 'Index页面自动增加广告位 84 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('85', 'Index页面自动增加广告位 85 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('86', 'Index页面自动增加广告位 86 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('87', 'Index页面自动增加广告位 87 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('99', 'Index页面自动增加广告位 99 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('100', 'Index页面自动增加广告位 100 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('101', 'Index页面自动增加广告位 101 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('102', 'Index页面自动增加广告位 102 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('200', 'Channel页面自动增加广告位 200 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('201', 'Channel页面自动增加广告位 201 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('203', 'Channel页面自动增加广告位 203 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('204', 'Channel页面自动增加广告位 204 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('205', 'Channel页面自动增加广告位 205 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('206', 'Channel页面自动增加广告位 206 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('207', 'Channel页面自动增加广告位 207 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('208', 'Activity页面自动增加广告位 208 ', '0', '0', 'Activity页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('209', 'Channel页面自动增加广告位 209 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('210', 'Channel页面自动增加广告位 210 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('211', 'Channel页面自动增加广告位 211 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('212', 'Channel页面自动增加广告位 212 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('213', 'Channel页面自动增加广告位 213 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('214', 'Channel页面自动增加广告位 214 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('216', 'Channel页面自动增加广告位 216 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('221', 'Channel页面自动增加广告位 221 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('227', 'Channel页面自动增加广告位 227 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('232', 'Channel页面自动增加广告位 232 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('255', 'Index页面自动增加广告位 800 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('300', 'Index页面自动增加广告位 300 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('301', 'Index页面自动增加广告位 301 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('302', 'Index页面自动增加广告位 302 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('303', 'Index页面自动增加广告位 303 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('304', 'Index页面自动增加广告位 304 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('305', 'Index页面自动增加广告位 305 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('306', 'Index页面自动增加广告位 306 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('307', 'Index页面自动增加广告位 307 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('308', 'Index页面自动增加广告位 308 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('309', 'Index页面自动增加广告位 309 ', '0', '0', 'Index页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('400', 'Goods页面自动增加广告位 400 ', '0', '0', 'Goods页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('502', 'Channel页面自动增加广告位 502 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('503', 'Channel页面自动增加广告位 503 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('511', 'Channel页面自动增加广告位 511 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('512', 'Channel页面自动增加广告位 512 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('513', 'Channel页面自动增加广告位 513 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('514', 'Channel页面自动增加广告位 514 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('522', 'Channel页面自动增加广告位 522 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5011', 'Channel页面自动增加广告位 5011 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5012', 'Channel页面自动增加广告位 5012 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5013', 'Channel页面自动增加广告位 5013 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5014', 'Channel页面自动增加广告位 5014 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5015', 'Channel页面自动增加广告位 5015 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5021', 'Channel页面自动增加广告位 5021 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5022', 'Channel页面自动增加广告位 5022 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5023', 'Channel页面自动增加广告位 5023 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5024', 'Channel页面自动增加广告位 5024 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5025', 'Channel页面自动增加广告位 5025 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5031', 'Channel页面自动增加广告位 5031 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5032', 'Channel页面自动增加广告位 5032 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5033', 'Channel页面自动增加广告位 5033 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5034', 'Channel页面自动增加广告位 5034 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5035', 'Channel页面自动增加广告位 5035 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5111', 'Channel页面自动增加广告位 5111 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5113', 'Channel页面自动增加广告位 5113 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5114', 'Channel页面自动增加广告位 5114 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5123', 'Channel页面自动增加广告位 5123 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5124', 'Channel页面自动增加广告位 5124 ', '0', '0', 'Channel页面', '', '1');
INSERT INTO `tp_ad_position` VALUES ('5136', 'Channel页面自动增加广告位 5136 ', '0', '0', 'Channel页面', '', '1');
