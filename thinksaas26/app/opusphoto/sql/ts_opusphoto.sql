CREATE TABLE `ts_opus_photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `publisherid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布者ID',
  `authorsid` int(11) unsigned DEFAULT '0' COMMENT '图片作品作者表ID',
  `exifid` int(11) unsigned DEFAULT '0' COMMENT '图片数据表ID',
  `name` varchar(128) NOT NULL DEFAULT '' COMMENT '图片名称',
  `type` char(32) NOT NULL DEFAULT '' COMMENT '图片类型',
  `path` char(32) NOT NULL DEFAULT '' COMMENT '图片路径',
  `url` varchar(64) NOT NULL DEFAULT '' COMMENT '图片地址',
  `title` varchar(120) DEFAULT '' COMMENT '图片作品的标题',
  `desc` varchar(600) DEFAULT '' COMMENT '图片介绍',
  `other` varchar(600) DEFAULT '' COMMENT '其它补充说明',
  `count_view` int(11) NOT NULL DEFAULT '0' COMMENT '统计浏览量',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '图片作品得分',
  `addtime` datetime NOT NULL DEFAULT '1970-01-01 00:00:01' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='图片作品表';

CREATE TABLE `ts_opus_authors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '作者表ID',
  `kindid` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '作品的种类ID',
  `authorid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者ID',
  `worker` varchar(128) NOT NULL DEFAULT '0' COMMENT '所做的工作描述',
  `addtime` datetime NOT NULL DEFAULT '1970-01-01 00:00:01' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='文章、视频、图片作品参与者表';


CREATE TABLE `ts_opus_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '作品角色ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '角色名称',
  `desc` varchar(200) DEFAULT '''''' COMMENT '角色描述',
  `addtime` datetime NOT NULL DEFAULT '1970-01-01 00:00:01' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='作品角色分类表';



