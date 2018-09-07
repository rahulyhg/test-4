CREATE TABLE `cmf_opus_photo` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '图片作品ID',
  `publisherid` INT(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '发布者ID',
  `sheyingid` INT(11) UNSIGNED DEFAULT '0' COMMENT '图片作品作者表ID',
  `madouid` INT(11) UNSIGNED DEFAULT '0' COMMENT '麻豆ID',
  `huazhuangid` INT(11) UNSIGNED DEFAULT '0' COMMENT '化妆师ID',
  `houqiid` INT(11) UNSIGNED DEFAULT '0' COMMENT '后期制作人ID',
  `copyrightid` INT(11) UNSIGNED DEFAULT '0' COMMENT '版权类型ID',
  `exif` VARCHAR(256) DEFAULT '' COMMENT '图片exif',
  `title` VARCHAR(120) DEFAULT '' COMMENT '图片作品的标题',
  `desc` VARCHAR(600) DEFAULT '' COMMENT '图片作品介绍',
  `pathname` CHAR(64) NOT NULL DEFAULT '' COMMENT '图片路径',
  `count_view` INT(11) NOT NULL DEFAULT '0' COMMENT '浏览量统计',
  `score` INT(11) NOT NULL DEFAULT '0' COMMENT '图片作品得分',
  `scoreid` INT(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '图片作品得分表ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='图片作品表';



CREATE TABLE `cmf_copyright` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '内容',
  `mark` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '标志',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='版权信息表';


CREATE TABLE `cmf_art_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '艺术家角色名称',
  `order` float NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='艺术家角色表';


CREATE TABLE `cmf_user_follow` (
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `uid_follow` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '被关注的用户ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  UNIQUE KEY `uid_2` (`uid`,`uid_follow`),
  KEY `uid` (`uid`),
  KEY `uid_follow` (`uid_follow`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户关注和好友表';
