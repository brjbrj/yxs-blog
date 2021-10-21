DROP TABLE IF EXISTS `brj_user`;
create table `brj_user` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(32) NOT NULL,
`password` varchar(32) NOT NULL,
`state` varchar(32) NOT NULL,
`date` varchar(32) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `brj_color`;
create table `brj_color` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`type` varchar(32) NOT NULL,
`title` varchar(32) NOT NULL,
`value` varchar(8) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `brj_admin`;
create table `brj_admin` (
`k` varchar(32) NOT NULL,
`v` text,
PRIMARY KEY (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `brj_article`;
create table `brj_article` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`user` varchar(32) NOT NULL,
`state` varchar(32) NOT NULL,
`title` text,
`content` text,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `brj_emoji`;
create table `brj_emoji` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`title` text,
`state` text,
`alt` text,
`url` text,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `brj_admin` VALUES ('username', 'admin');
INSERT INTO `brj_admin` VALUES ('password', '123456');
INSERT INTO `brj_admin` VALUES ('usernum', '100');
INSERT INTO `brj_admin` VALUES ('title', '影小薯博客系统');
INSERT INTO `brj_admin` VALUES ('qq', '773867006');
INSERT INTO `brj_admin` VALUES ('mail_smtp', 'smtp.qq.com');
INSERT INTO `brj_admin` VALUES ('mail_port', '587');
INSERT INTO `brj_admin` VALUES ('mail_name', '@qq.com');
INSERT INTO `brj_admin` VALUES ('mail_pwd', '****');
INSERT INTO `brj_admin` VALUES ('yzm_reg', '0');
INSERT INTO `brj_admin` VALUES ('yzm_login', '0');
INSERT INTO `brj_admin` VALUES ('yzm_len', '4');
INSERT INTO `brj_admin` VALUES ('yzm_time', '60');
INSERT INTO `brj_admin` VALUES ('yzm_mod_reg', '');
INSERT INTO `brj_admin` VALUES ('yzm_mod_login', '');
INSERT INTO `brj_admin` VALUES ('yzm_mod_login_head', '');
INSERT INTO `brj_admin` VALUES ('yzm_mod_reg_head', '');
INSERT INTO `brj_admin` VALUES ('yzm_mod_find_head', '');
INSERT INTO `brj_admin` VALUES ('yzm_mod_find', '');
INSERT INTO `brj_admin` VALUES ('yzm_find', '0');
INSERT INTO `brj_admin` VALUES ('notice_num', '0');
INSERT INTO `brj_admin` VALUES ('notice_1', '0');
INSERT INTO `brj_admin` VALUES ('notice_2', '0');
INSERT INTO `brj_admin` VALUES ('notice_3', '0');
INSERT INTO `brj_admin` VALUES ('notice_4', '0');
INSERT INTO `brj_admin` VALUES ('notice_5', '0');
INSERT INTO `brj_admin` VALUES ('notice_width', '80%');
INSERT INTO `brj_admin` VALUES ('notice_height', '35%');
INSERT INTO `brj_admin` VALUES ('notice_interval', '2000');
INSERT INTO `brj_admin` VALUES ('notice_autoplay', 'true');
INSERT INTO `brj_admin` VALUES ('notice_indicator', '0');
INSERT INTO `brj_admin` VALUES ('notice_arrow', '0');
INSERT INTO `brj_admin` VALUES ('notice_anim', '0');
INSERT INTO `brj_admin` VALUES ('notice_6', '0');
INSERT INTO `brj_admin` VALUES ('edit_height', '500');
INSERT INTO `brj_admin` VALUES ('edit_tool', '');
INSERT INTO `brj_admin` VALUES ('edit_base64', 'true');
INSERT INTO `brj_admin` VALUES ('edit_linkimg', 'true');
INSERT INTO `brj_admin` VALUES ('edit_upload', 'true');
INSERT INTO `brj_admin` VALUES ('edit_color', '');
INSERT INTO `brj_admin` VALUES ('edit_full', 'true');
INSERT INTO `brj_admin` VALUES ('edit_EA', 'KB');
INSERT INTO `brj_admin` VALUES ('edit_val', '10');
INSERT INTO `brj_admin` VALUES ('edit_imgurl', 'true');
INSERT INTO `brj_admin` VALUES ('edit_imgalt', 'true');
INSERT INTO `brj_admin` VALUES ('edit_type', '');
INSERT INTO `brj_admin` VALUES ('edit_fontsize', '');
INSERT INTO `brj_admin` VALUES ('edit_lineheight', '');
INSERT INTO `brj_admin` VALUES ('edit_localvideo', 'true');
INSERT INTO `brj_admin` VALUES ('edit_linkvideo', 'true');
INSERT INTO `brj_admin` VALUES ('edit_EA2', 'KB');
INSERT INTO `brj_admin` VALUES ('edit_val2', '10');
INSERT INTO `brj_admin` VALUES ('edit_type2', '');
INSERT INTO `brj_color` VALUES ( '', 'admin', '菜单背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '界面背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '表头背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '标签背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '表头字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '标签字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '侧边菜单悬浮背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '侧边菜单选中背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '侧边菜单标记色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '侧边菜单字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '侧边菜单悬浮选中字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '侧边菜单划分线色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '按钮背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '按钮字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '按钮悬浮背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '按钮悬浮字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本框背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本框悬浮选中背景色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本框字体色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本框字体悬浮选中色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本边框色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本边框悬浮选中色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '后台的滚轮条色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', '文本框滚轮条色','#000000');
INSERT INTO `brj_color` VALUES ( '', 'admin', 'LOGO色','#000000');
