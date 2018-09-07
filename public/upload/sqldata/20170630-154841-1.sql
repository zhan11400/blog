-- -----------------------------
-- Think MySQL Data Transfer 
-- 
-- Host     : 
-- Port     : 
-- Database : 
-- 
-- Part : #1
-- Date : 2017-06-30 15:48:41
-- -----------------------------

SET FOREIGN_KEY_CHECKS = 0;


-- -----------------------------
-- Table structure for `tp_navigation`
-- -----------------------------
DROP TABLE IF EXISTS `tp_navigation`;
CREATE TABLE `tp_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '前台导航表',
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '' COMMENT '导航名称',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `is_new` tinyint(1) DEFAULT '1' COMMENT '是否新窗口',
  `sort` smallint(6) DEFAULT '50' COMMENT '排序',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- -----------------------------
-- Records of `tp_navigation`
-- -----------------------------
INSERT INTO `tp_navigation` VALUES ('1', '首页', '1', '0', '8', '/');
INSERT INTO `tp_navigation` VALUES ('2', '关于我们', '1', '0', '7', '/home/about/index');
INSERT INTO `tp_navigation` VALUES ('3', '下载APP', '1', '0', '6', '/home/download/index');
INSERT INTO `tp_navigation` VALUES ('4', '加入我们', '1', '0', '5', '/home/join/index');
INSERT INTO `tp_navigation` VALUES ('6', '共享', '1', '0', '5', '/home/index/share');
INSERT INTO `tp_navigation` VALUES ('8', '事件', '1', '0', '4', '/home/index/event');
INSERT INTO `tp_navigation` VALUES ('9', '家庭', '1', '0', '3', '/home/index/family');
INSERT INTO `tp_navigation` VALUES ('10', '活动', '1', '0', '2', '/home/index/activity');
