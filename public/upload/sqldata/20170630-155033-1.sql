-- -----------------------------
-- Think MySQL Data Transfer 
-- 
-- Host     : 
-- Port     : 
-- Database : 
-- 
-- Part : #1
-- Date : 2017-06-30 15:50:33
-- -----------------------------

SET FOREIGN_KEY_CHECKS = 0;


-- -----------------------------
-- Table structure for `tp_post_category`
-- -----------------------------
DROP TABLE IF EXISTS `tp_post_category`;
CREATE TABLE `tp_post_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `name` varchar(90) NOT NULL DEFAULT '' COMMENT '商品分类名称',
  `is_open` tinyint(1) DEFAULT '0' COMMENT '是否推荐为热门分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `tp_post_category`
-- -----------------------------
INSERT INTO `tp_post_category` VALUES ('3', '品牌公关', '1');
INSERT INTO `tp_post_category` VALUES ('2', '市场运营', '1');
INSERT INTO `tp_post_category` VALUES ('4', '技术研发', '1');
INSERT INTO `tp_post_category` VALUES ('5', '产品设计', '1');
