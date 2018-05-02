
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `shopnc_activity`;
CREATE TABLE `shopnc_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `activity_title` varchar(255) NOT NULL COMMENT '标题',
  `activity_type` enum('1','2') DEFAULT NULL COMMENT '活动类型 1:商品 2:团购',
  `activity_banner` varchar(255) NOT NULL COMMENT '活动横幅大图片',
  `activity_style` varchar(255) NOT NULL COMMENT '活动页面模板样式标识码',
  `activity_desc` varchar(1000) NOT NULL COMMENT '描述',
  `activity_start_date` int(10) NOT NULL COMMENT '开始时间',
  `activity_end_date` int(10) DEFAULT NULL COMMENT '结束时间',
  `activity_sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `activity_state` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '活动状态 0为关闭 1为开启',
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='活动表';

DROP TABLE IF EXISTS `shopnc_activity_detail`;
CREATE TABLE `shopnc_activity_detail` (
  `activity_detail_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `activity_id` int(11) NOT NULL COMMENT '活动编号',
  `item_id` int(11) NOT NULL COMMENT '商品或团购的编号',
  `item_name` varchar(255) NOT NULL COMMENT '商品或团购名称',
  `store_id` int(11) NOT NULL COMMENT '店铺编号',
  `store_name` varchar(255) NOT NULL COMMENT '店铺名称',
  `activity_detail_state` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '审核状态 0:(默认)待审核 1:通过 2:未通过 3:再次申请',
  `activity_detail_sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`activity_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='活动细节表';

DROP TABLE IF EXISTS `shopnc_address`;
CREATE TABLE `shopnc_address` (
  `address_id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址ID',
  `member_id` mediumint(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `true_name` varchar(50) NOT NULL COMMENT '会员姓名',
  `area_id` mediumint(10) unsigned NOT NULL DEFAULT '0' COMMENT '地区ID',
  `city_id` mediumint(9) DEFAULT NULL COMMENT '市级ID',
  `area_info` varchar(255) NOT NULL DEFAULT '' COMMENT '地区内容',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `zip_code` char(6) DEFAULT NULL COMMENT '邮编',
  `tel_phone` varchar(20) DEFAULT NULL COMMENT '座机电话',
  `mob_phone` varchar(15) DEFAULT NULL COMMENT '手机电话',
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='买家地址信息表';

DROP TABLE IF EXISTS `shopnc_admin`;
CREATE TABLE `shopnc_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_permission` varchar(3000) DEFAULT NULL COMMENT '管理权限',
  `admin_name` varchar(20) NOT NULL COMMENT '管理员名称',
  `admin_password` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `admin_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `admin_login_num` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `admin_is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  PRIMARY KEY (`admin_id`),
  KEY `member_id` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

DROP TABLE IF EXISTS `shopnc_adv`;
CREATE TABLE `shopnc_adv` (
  `adv_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告自增标识编号',
  `ap_id` int(10) unsigned NOT NULL COMMENT '广告位id',
  `adv_title` varchar(255) NOT NULL COMMENT '广告内容描述',
  `adv_content` varchar(1000) NOT NULL COMMENT '广告内容',
  `adv_start_date` int(10) DEFAULT NULL COMMENT '广告开始时间',
  `adv_end_date` int(10) DEFAULT NULL COMMENT '广告结束时间',
  `slide_sort` int(10) unsigned NOT NULL COMMENT '幻灯片排序',
  `member_id` int(11) NOT NULL COMMENT '会员ID',
  `member_name` varchar(50) NOT NULL COMMENT '会员用户名',
  `click_num` int(10) unsigned NOT NULL COMMENT '广告点击率',
  `is_allow` smallint(1) unsigned NOT NULL COMMENT '会员购买的广告是否通过审核0未审核1审核已通过2审核未通过',
  `buy_style` varchar(10) NOT NULL COMMENT '购买方式',
  `goldpay` int(10) unsigned NOT NULL COMMENT '购买所支付的金币',
  PRIMARY KEY (`adv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='广告表';

DROP TABLE IF EXISTS `shopnc_adv_click`;
CREATE TABLE `shopnc_adv_click` (
  `adv_id` int(10) unsigned NOT NULL COMMENT '广告id',
  `ap_id` int(10) unsigned NOT NULL COMMENT '所属广告位id',
  `click_year` int(4) unsigned NOT NULL COMMENT '点击年份',
  `click_month` int(2) unsigned NOT NULL COMMENT '点击月份',
  `click_num` int(10) unsigned NOT NULL COMMENT '点击率',
  `adv_name` varchar(100) NOT NULL COMMENT '广告名称',
  `ap_name` varchar(100) NOT NULL COMMENT '广告位名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告点击率表';

DROP TABLE IF EXISTS `shopnc_adv_position`;
CREATE TABLE `shopnc_adv_position` (
  `ap_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位置id',
  `ap_name` varchar(100) NOT NULL COMMENT '广告位置名',
  `ap_intro` varchar(1000) NOT NULL COMMENT '广告位简介',
  `ap_class` smallint(1) unsigned NOT NULL COMMENT '广告类别：0图片1文字2幻灯3Flash',
  `ap_display` smallint(1) unsigned NOT NULL COMMENT '广告展示方式：0幻灯片1多广告展示2单广告展示',
  `is_use` smallint(1) unsigned NOT NULL COMMENT '广告位是否启用：0不启用1启用',
  `ap_width` int(10) NOT NULL COMMENT '广告位宽度',
  `ap_height` int(10) NOT NULL COMMENT '广告位高度',
  `ap_price` int(10) unsigned NOT NULL COMMENT '广告位单价',
  `adv_num` int(10) unsigned NOT NULL COMMENT '拥有的广告数',
  `click_num` int(10) unsigned NOT NULL COMMENT '广告位点击率',
  `default_content` varchar(100) NOT NULL COMMENT '广告位默认内容',
  PRIMARY KEY (`ap_id`)
) ENGINE=MyISAM AUTO_INCREMENT=373 DEFAULT CHARSET=utf8 COMMENT='广告位表';

DROP TABLE IF EXISTS `shopnc_album_class`;
CREATE TABLE `shopnc_album_class` (
  `aclass_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '相册id',
  `aclass_name` varchar(100) NOT NULL COMMENT '相册名称',
  `store_id` int(10) unsigned NOT NULL COMMENT '所属店铺id',
  `aclass_des` varchar(255) NOT NULL COMMENT '相册描述',
  `aclass_sort` tinyint(3) unsigned NOT NULL COMMENT '排序',
  `aclass_cover` varchar(255) NOT NULL COMMENT '相册封面',
  `upload_time` int(10) unsigned NOT NULL COMMENT '图片上传时间',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为默认相册,1代表默认',
  PRIMARY KEY (`aclass_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='相册表';

DROP TABLE IF EXISTS `shopnc_album_pic`;
CREATE TABLE `shopnc_album_pic` (
  `apic_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '相册图片表id',
  `apic_name` varchar(100) NOT NULL COMMENT '图片名称',
  `apic_tag` varchar(255) NOT NULL COMMENT '图片标签',
  `aclass_id` int(10) unsigned NOT NULL COMMENT '相册id',
  `apic_cover` varchar(255) NOT NULL COMMENT '图片路径',
  `apic_size` int(10) unsigned NOT NULL COMMENT '图片大小',
  `apic_spec` varchar(100) NOT NULL COMMENT '图片规格',
  `store_id` int(10) unsigned NOT NULL COMMENT '所属店铺id',
  `upload_time` int(10) unsigned NOT NULL COMMENT '图片上传时间',
  PRIMARY KEY (`apic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COMMENT='相册图片表';

DROP TABLE IF EXISTS `shopnc_article`;
CREATE TABLE `shopnc_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `ac_id` int(11) DEFAULT NULL COMMENT '分类id',
  `article_url` varchar(100) DEFAULT NULL COMMENT '跳转链接',
  `article_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示，0为否，1为是，默认为1',
  `article_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `article_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `article_content` text COMMENT '内容',
  `article_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='文章表';

DROP TABLE IF EXISTS `shopnc_article_class`;
CREATE TABLE `shopnc_article_class` (
  `ac_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `ac_code` varchar(255) DEFAULT NULL COMMENT '分类标识码',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `ac_sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`ac_id`),
  KEY `ac_parent_id` (`ac_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

DROP TABLE IF EXISTS `shopnc_attribute`;
CREATE TABLE `shopnc_attribute` (
  `attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '属性id',
  `attr_name` varchar(100) NOT NULL COMMENT '属性名称',
  `type_id` int(10) unsigned NOT NULL COMMENT '所属类型id',
  `attr_value` text NOT NULL COMMENT '属性值列',
  `attr_show` tinyint(1) unsigned NOT NULL COMMENT '是否显示。0为不显示、1为显示',
  `attr_sort` tinyint(1) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`attr_id`),
  KEY `attr_id` (`attr_id`,`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='商品属性表';

DROP TABLE IF EXISTS `shopnc_attribute_value`;
CREATE TABLE `shopnc_attribute_value` (
  `attr_value_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '属性值id',
  `attr_value_name` varchar(100) NOT NULL COMMENT '属性值名称',
  `attr_id` int(10) unsigned NOT NULL COMMENT '所属属性id',
  `attr_value_sort` tinyint(1) unsigned NOT NULL COMMENT '属性值排序',
  PRIMARY KEY (`attr_value_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='商品属性值表';

DROP TABLE IF EXISTS `shopnc_brand`;
CREATE TABLE `shopnc_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `brand_name` varchar(100) DEFAULT NULL COMMENT '品牌名称',
  `brand_class` varchar(100) DEFAULT NULL COMMENT '类别名称',
  `brand_pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `brand_sort` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `brand_recommend` tinyint(1) DEFAULT '0' COMMENT '推荐，0为否，1为是，默认为0',
  `store_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID',
  `brand_apply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '品牌申请，0为申请中，1为通过，默认为1，申请功能是会员使用，系统后台默认为1',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='品牌表';

DROP TABLE IF EXISTS `shopnc_cache_store`;
CREATE TABLE `shopnc_cache_store` (
  `store_id` mediumint(8) unsigned NOT NULL COMMENT '店铺ID',
  `num_sales` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '店铺总销量',
  `num_selling` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上架在售的商品数',
  `num_storage` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '仓库中待上架的商品数',
  `num_wg` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '违规下架的商品',
  `num_ordering` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '交易中的订单',
  `num_accused` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '被投诉数',
  `num_sales_jq` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '近期售出(三个月内)',
  `num_collect` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '被收藏数',
  `goods_str1` varchar(200) NOT NULL DEFAULT '' COMMENT '店铺列表8个展示商品',
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺信息缓存表';

DROP TABLE IF EXISTS `shopnc_cart`;
CREATE TABLE `shopnc_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `member_id` int(11) NOT NULL COMMENT '会员id',
  `store_id` int(11) NOT NULL COMMENT '店铺id',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `spec_id` int(11) NOT NULL COMMENT '规格id',
  `spec_info` text NOT NULL COMMENT '规格内容',
  `goods_store_price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `goods_num` int(11) NOT NULL COMMENT '购买商品数量',
  `goods_images` varchar(100) NOT NULL COMMENT '商品图片',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物车数据表';

DROP TABLE IF EXISTS `shopnc_complain`;
CREATE TABLE `shopnc_complain` (
  `complain_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投诉id',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `order_goods_count` int(11) NOT NULL COMMENT '订单商品数量',
  `complain_goods_count` int(11) NOT NULL COMMENT '投诉商品数量',
  `accuser_id` int(11) NOT NULL COMMENT '原告id',
  `accuser_name` varchar(50) NOT NULL COMMENT '原告名称',
  `accused_id` int(11) NOT NULL COMMENT '被告id',
  `accused_name` varchar(50) NOT NULL COMMENT '被告名称',
  `complain_subject_content` varchar(50) NOT NULL COMMENT '投诉主题',
  `complain_subject_id` int(11) NOT NULL COMMENT '投诉主题id',
  `complain_content` varchar(255) NOT NULL COMMENT '投诉内容',
  `complain_pic1` varchar(100) NOT NULL COMMENT '投诉图片1',
  `complain_pic2` varchar(100) NOT NULL COMMENT '投诉图片2',
  `complain_pic3` varchar(100) NOT NULL COMMENT '投诉图片3',
  `complain_datetime` int(11) NOT NULL COMMENT '投诉时间',
  `complain_handle_datetime` int(11) NOT NULL COMMENT '投诉处理时间',
  `complain_handle_member_id` int(11) NOT NULL COMMENT '投诉处理人id',
  `appeal_message` varchar(255) NOT NULL COMMENT '申诉内容',
  `appeal_datetime` int(11) NOT NULL COMMENT '申诉时间',
  `appeal_pic1` varchar(100) NOT NULL COMMENT '申诉图片1',
  `appeal_pic2` varchar(100) NOT NULL COMMENT '申诉图片2',
  `appeal_pic3` varchar(100) NOT NULL COMMENT '申诉图片3',
  `final_handle_message` varchar(255) NOT NULL COMMENT '最终处理意见',
  `final_handle_datetime` int(11) NOT NULL COMMENT '最终处理时间',
  `final_handle_member_id` int(11) NOT NULL COMMENT '最终处理人id',
  `complain_type` tinyint(4) NOT NULL COMMENT '投诉类型(1-买家投诉/2-卖家投诉)',
  `complain_state` tinyint(4) NOT NULL COMMENT '投诉状态(10-新投诉/20-投诉通过转给被投诉人/30-被投诉人已申诉/40-提交仲裁/99-已关闭)',
  `complain_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '投诉是否通过平台审批(1未通过/2通过)',
  PRIMARY KEY (`complain_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投诉表';

DROP TABLE IF EXISTS `shopnc_complain_goods`;
CREATE TABLE `shopnc_complain_goods` (
  `complain_goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投诉商品序列id',
  `complain_id` int(11) NOT NULL COMMENT '投诉id',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `spec_id` int(11) NOT NULL COMMENT '规格id',
  `spec_info` varchar(50) NOT NULL DEFAULT '' COMMENT '规格描述',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `goods_num` int(11) NOT NULL COMMENT '商品数量',
  `goods_image` varchar(100) NOT NULL DEFAULT '' COMMENT '商品图片',
  `evaluation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评价类型: 1好评 2中评 3差评',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '评论',
  `complain_message` varchar(100) NOT NULL COMMENT '被投诉商品的问题描述',
  PRIMARY KEY (`complain_goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投诉商品表';

DROP TABLE IF EXISTS `shopnc_complain_subject`;
CREATE TABLE `shopnc_complain_subject` (
  `complain_subject_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '举报主题id',
  `complain_subject_content` varchar(50) NOT NULL COMMENT '举报主题',
  `complain_subject_desc` varchar(100) NOT NULL COMMENT '举报主题描述',
  `complain_subject_type` tinyint(4) NOT NULL COMMENT '举报主题类型(1-买家/2-卖家)',
  `complain_subject_state` tinyint(4) NOT NULL COMMENT '举报主题状态(1-有效/2-失效)',
  PRIMARY KEY (`complain_subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='举报主题表';

DROP TABLE IF EXISTS `shopnc_complain_talk`;
CREATE TABLE `shopnc_complain_talk` (
  `talk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投诉对话id',
  `complain_id` int(11) NOT NULL COMMENT '投诉id',
  `talk_member_id` int(11) NOT NULL COMMENT '发言人id',
  `talk_member_name` varchar(50) NOT NULL COMMENT '发言人名称',
  `talk_member_type` varchar(10) NOT NULL COMMENT '发言人类型(1-投诉人/2-被投诉人/3-平台)',
  `talk_content` varchar(255) NOT NULL COMMENT '发言内容',
  `talk_state` tinyint(4) NOT NULL COMMENT '发言状态(1-显示/2-不显示)',
  `talk_admin` int(11) NOT NULL DEFAULT '0' COMMENT '对话管理员，屏蔽对话人的id',
  `talk_datetime` int(11) NOT NULL COMMENT '对话发表时间',
  PRIMARY KEY (`talk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投诉对话表';

DROP TABLE IF EXISTS `shopnc_consult`;
CREATE TABLE `shopnc_consult` (
  `consult_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '咨询编号',
  `goods_id` int(11) DEFAULT '0' COMMENT '商品编号',
  `cgoods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '咨询发布者会员编号(0：游客)',
  `cmember_name` varchar(100) DEFAULT NULL COMMENT '会员名称',
  `seller_id` int(11) NOT NULL COMMENT '卖家编号',
  `email` varchar(255) DEFAULT NULL COMMENT '咨询发布者邮箱',
  `consult_content` varchar(4000) DEFAULT NULL COMMENT '咨询内容',
  `consult_addtime` int(10) DEFAULT NULL COMMENT '咨询发布时间',
  `consult_reply` varchar(4000) DEFAULT NULL COMMENT '咨询回复内容',
  `consult_reply_time` int(10) DEFAULT NULL COMMENT '咨询回复时间',
  `isanonymous` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示不匿名 1表示匿名',
  PRIMARY KEY (`consult_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品咨询表';

DROP TABLE IF EXISTS `shopnc_coupon`;
CREATE TABLE `shopnc_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `coupon_title` varchar(255) NOT NULL COMMENT '优惠券名称',
  `coupon_type` enum('1','2') DEFAULT NULL,
  `coupon_pic` varchar(255) NOT NULL,
  `coupon_desc` varchar(1000) NOT NULL COMMENT '优惠券描述',
  `coupon_start_date` int(10) NOT NULL COMMENT '优惠券开始日期',
  `coupon_end_date` int(10) NOT NULL COMMENT '优惠券截止日期',
  `coupon_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠金额',
  `coupon_limit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额限制',
  `store_id` int(11) DEFAULT NULL COMMENT '店铺id',
  `coupon_state` enum('1','2') DEFAULT '1' COMMENT '上架与下架状态',
  `coupon_storage` int(11) NOT NULL DEFAULT '0' COMMENT '总共数量',
  `coupon_usage` int(11) NOT NULL DEFAULT '0' COMMENT '使用数量',
  `coupon_lock` enum('1','2') NOT NULL DEFAULT '1' COMMENT '是否锁定',
  `coupon_add_date` int(10) NOT NULL COMMENT '添加日期',
  `coupon_class_id` int(11) NOT NULL COMMENT '分类',
  `coupon_click` int(11) NOT NULL DEFAULT '1' COMMENT '点击次数',
  `coupon_print_style` varchar(255) NOT NULL DEFAULT '4STYLE' COMMENT '4STYLE STANDS FOR 4 COUPONS PER A4 PAGE, AND 8STYLE STANDS FOR 8 COUPONS PER A4 PAGE',
  `coupon_recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0不推荐 1推荐到首页',
  `coupon_allowstate` tinyint(1) unsigned DEFAULT '1' COMMENT '审核状态 0为待审核 1已通过 2未通过',
  `coupon_allowremark` varchar(255) DEFAULT NULL COMMENT '审核备注',
  PRIMARY KEY (`coupon_id`),
  KEY `store_id` (`store_id`),
  KEY `coupon_title` (`coupon_title`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='优惠券';

DROP TABLE IF EXISTS `shopnc_coupon_class`;
CREATE TABLE `shopnc_coupon_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '优惠券分类id',
  `class_parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类id',
  `class_name` varchar(100) NOT NULL COMMENT '分类名称',
  `class_sort` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `class_show` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否显示',
  PRIMARY KEY (`class_id`),
  KEY `class_parent_id` (`class_parent_id`),
  KEY `class_sort` (`class_sort`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='优惠券分类';

DROP TABLE IF EXISTS `shopnc_daddress`;
CREATE TABLE `shopnc_daddress` (
  `address_id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址ID',
  `store_id` mediumint(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID',
  `seller_name` varchar(50) NOT NULL DEFAULT '' COMMENT '联系人',
  `area_id` mediumint(10) unsigned NOT NULL DEFAULT '0' COMMENT '地区ID',
  `city_id` mediumint(9) DEFAULT NULL COMMENT '市级ID',
  `area_info` varchar(255) NOT NULL DEFAULT '' COMMENT '地区内容',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `zip_code` char(6) DEFAULT NULL COMMENT '邮编',
  `tel_phone` varchar(20) DEFAULT NULL COMMENT '座机电话',
  `mob_phone` varchar(15) DEFAULT NULL COMMENT '手机电话',
  `company` varchar(255) NOT NULL COMMENT '公司',
  `content` text COMMENT '备注',
  `is_default` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否默认1是',
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='卖家发货地址信息表';

DROP TABLE IF EXISTS `shopnc_document`;
CREATE TABLE `shopnc_document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `doc_code` varchar(255) NOT NULL COMMENT '调用标识码',
  `doc_title` varchar(255) NOT NULL COMMENT '标题',
  `doc_content` text NOT NULL COMMENT '内容',
  `doc_time` int(10) unsigned NOT NULL COMMENT '添加时间/修改时间',
  PRIMARY KEY (`doc_id`),
  UNIQUE KEY `doc_code` (`doc_code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='系统文章表';

DROP TABLE IF EXISTS `shopnc_evaluate_goods`;
CREATE TABLE `shopnc_evaluate_goods` (
  `geval_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价ID',
  `geval_orderid` int(11) NOT NULL COMMENT '订单表自增ID',
  `geval_orderno` varchar(100) NOT NULL COMMENT '订单编号',
  `geval_ordergoodsid` int(11) NOT NULL COMMENT '订单商品表编号',
  `geval_goodsid` int(11) NOT NULL COMMENT '商品表编号',
  `geval_goodsname` varchar(100) NOT NULL COMMENT '商品名称',
  `geval_specinfo` varchar(50) DEFAULT NULL COMMENT '规格描述',
  `geval_goodsprice` decimal(10,2) DEFAULT NULL COMMENT '商品价格',
  `geval_scores` tinyint(1) NOT NULL COMMENT '1代表好评 0代表中评 -1代表差评',
  `geval_content` varchar(500) DEFAULT NULL COMMENT '信誉评价内容',
  `geval_isanonymous` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示不是 1表示是匿名评价',
  `geval_addtime` int(11) NOT NULL COMMENT '评价时间',
  `geval_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `geval_storename` varchar(100) NOT NULL COMMENT '店铺名称',
  `geval_frommemberid` int(11) NOT NULL COMMENT '评价人编号',
  `geval_frommembername` varchar(100) NOT NULL COMMENT '评价人名称',
  `geval_tomemberid` int(11) NOT NULL COMMENT '接收人编号',
  `geval_tomembername` varchar(100) NOT NULL COMMENT '接收人用户名',
  `geval_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评价信息的状态 0为正常 1为禁止显示',
  `geval_remark` varchar(500) DEFAULT NULL COMMENT '管理员对评价的处理备注',
  `geval_explain` varchar(500) DEFAULT NULL COMMENT '解释内容',
  `geval_bothstate` tinyint(1) NOT NULL DEFAULT '1' COMMENT '评价互评状态 1单方评价2双方互评',
  `geval_showtime` int(11) NOT NULL COMMENT '评价展示时间统计等都以该值为准',
  `geval_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '评价类型 1买家评价 2卖家评价',
  PRIMARY KEY (`geval_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='信誉评价表';

DROP TABLE IF EXISTS `shopnc_evaluate_goodsstat`;
CREATE TABLE `shopnc_evaluate_goodsstat` (
  `gevalstat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `gevalstat_storeid` int(11) NOT NULL COMMENT '店铺ID',
  `gevalstat_type` tinyint(1) NOT NULL COMMENT '统计类型 1最近一周 2最近一月 3最近半年 4半年以前 5总记录',
  `gevalstat_level1num` int(11) NOT NULL DEFAULT '0' COMMENT '好评次数',
  `gevalstat_level2num` int(11) NOT NULL DEFAULT '0' COMMENT '中评次数',
  `gevalstat_level3num` int(11) NOT NULL DEFAULT '0' COMMENT '差评次数',
  PRIMARY KEY (`gevalstat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品评价统计表';

DROP TABLE IF EXISTS `shopnc_evaluate_store`;
CREATE TABLE `shopnc_evaluate_store` (
  `seval_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价ID',
  `seval_orderid` int(11) NOT NULL COMMENT '订单ID',
  `seval_orderno` varchar(100) NOT NULL COMMENT '订单编号',
  `seval_type` tinyint(1) NOT NULL COMMENT '评价类型  1表示宝贝与描述相符度 2表示卖家服务态度 3表示卖家发货速度',
  `seval_scores` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评价分数',
  `seval_addtime` int(11) NOT NULL COMMENT '评价时间',
  `seval_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `seval_storename` varchar(100) NOT NULL COMMENT '店铺名称',
  `seval_memberid` int(11) NOT NULL COMMENT '买家编号',
  `seval_membername` varchar(100) NOT NULL COMMENT '买家名称',
  PRIMARY KEY (`seval_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺评分表';

DROP TABLE IF EXISTS `shopnc_evaluate_storestat`;
CREATE TABLE `shopnc_evaluate_storestat` (
  `evalstat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '统计ID',
  `evalstat_storeid` int(11) NOT NULL COMMENT '店铺ID',
  `evalstat_type` tinyint(1) NOT NULL COMMENT '统计类型 1表示宝贝与描述相符度 2表示卖家服务态度 3表示卖家发货速度',
  `evalstat_average` float NOT NULL DEFAULT '0' COMMENT '平均分',
  `evalstat_timesnum` int(11) NOT NULL DEFAULT '0' COMMENT '评价次数',
  `evalstat_onenum` int(11) NOT NULL DEFAULT '0' COMMENT '一星次数',
  `evalstat_twonum` int(11) NOT NULL DEFAULT '0' COMMENT '二星次数',
  `evalstat_threenum` int(11) NOT NULL DEFAULT '0' COMMENT '三星次数',
  `evalstat_fournum` int(11) NOT NULL DEFAULT '0' COMMENT '四星次数',
  `evalstat_fivenum` int(11) NOT NULL DEFAULT '0' COMMENT '五星次数',
  PRIMARY KEY (`evalstat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺评价统计表';

DROP TABLE IF EXISTS `shopnc_express`;
CREATE TABLE `shopnc_express` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `e_name` varchar(50) NOT NULL COMMENT '公司名称',
  `e_state` enum('0','1') NOT NULL DEFAULT '1' COMMENT '状态',
  `e_code` varchar(50) NOT NULL COMMENT '编号',
  `e_letter` char(1) NOT NULL COMMENT '首字母',
  `e_order` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1常用2不常用',
  `e_url` varchar(100) NOT NULL COMMENT '公司网址',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='快递公司';

DROP TABLE IF EXISTS `shopnc_favorites`;
CREATE TABLE `shopnc_favorites` (
  `member_id` int(10) unsigned NOT NULL COMMENT '会员ID',
  `fav_id` int(10) unsigned NOT NULL COMMENT '收藏ID',
  `fav_type` varchar(20) NOT NULL COMMENT '收藏类型',
  `fav_time` varchar(10) NOT NULL COMMENT '收藏时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='买家收藏表';

DROP TABLE IF EXISTS `shopnc_flowstat_1`;
CREATE TABLE `shopnc_flowstat_1` (
  `date` int(8) unsigned NOT NULL COMMENT '访问日期',
  `clicknum` int(11) unsigned NOT NULL COMMENT '访问量',
  `store_id` int(11) unsigned NOT NULL COMMENT '店铺ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问量统计表';

DROP TABLE IF EXISTS `shopnc_flowstat_2`;
CREATE TABLE `shopnc_flowstat_2` (
  `date` int(8) unsigned NOT NULL COMMENT '访问日期',
  `clicknum` int(11) unsigned NOT NULL COMMENT '访问量',
  `store_id` int(11) unsigned NOT NULL COMMENT '店铺ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问量统计表';

DROP TABLE IF EXISTS `shopnc_flowstat_3`;
CREATE TABLE `shopnc_flowstat_3` (
  `date` int(8) unsigned NOT NULL COMMENT '访问日期',
  `clicknum` int(11) unsigned NOT NULL COMMENT '访问量',
  `store_id` int(11) unsigned NOT NULL COMMENT '店铺ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问量统计表';

DROP TABLE IF EXISTS `shopnc_flowstat_4`;
CREATE TABLE `shopnc_flowstat_4` (
  `date` int(8) unsigned NOT NULL COMMENT '访问日期',
  `clicknum` int(11) unsigned NOT NULL COMMENT '访问量',
  `store_id` int(11) unsigned NOT NULL COMMENT '店铺ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问量统计表';

DROP TABLE IF EXISTS `shopnc_flowstat_5`;
CREATE TABLE `shopnc_flowstat_5` (
  `date` int(8) unsigned NOT NULL COMMENT '访问日期',
  `clicknum` int(11) unsigned NOT NULL COMMENT '访问量',
  `store_id` int(11) unsigned NOT NULL COMMENT '店铺ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问量统计表';

DROP TABLE IF EXISTS `shopnc_gold_buy`;
CREATE TABLE `shopnc_gold_buy` (
  `gbuy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `gbuy_mid` int(11) NOT NULL COMMENT '购买会员编号',
  `gbuy_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `gbuy_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `gbuy_storename` varchar(50) NOT NULL COMMENT '店铺名称',
  `gbuy_num` int(11) NOT NULL DEFAULT '0' COMMENT '购买金币数额',
  `gbuy_price` decimal(10,2) NOT NULL COMMENT '购买金币所需金额',
  `gbuy_addtime` int(11) NOT NULL COMMENT '购买记录添加时间',
  `gbuy_ispay` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已经支付 0 未支付 1已支付',
  `gbuy_adminid` int(11) DEFAULT NULL COMMENT '操作记录管理员编号',
  `gbuy_sys_remark` varchar(500) DEFAULT NULL COMMENT '操作备注',
  `gbuy_user_remark` varchar(500) DEFAULT NULL COMMENT '用户备注',
  `gbuy_check_type` varchar(100) DEFAULT NULL COMMENT '购买金币的支付类型',
  PRIMARY KEY (`gbuy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='金币购买记录表';

DROP TABLE IF EXISTS `shopnc_gold_log`;
CREATE TABLE `shopnc_gold_log` (
  `glog_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `glog_memberid` int(11) NOT NULL COMMENT '会员编号',
  `glog_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `glog_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `glog_storename` varchar(50) NOT NULL COMMENT '店铺名称',
  `glog_adminid` int(11) NOT NULL COMMENT '管理员编号，如果没有管理员则该项为0',
  `glog_adminname` varchar(20) NOT NULL COMMENT '管理员名称',
  `glog_goldnum` int(11) NOT NULL DEFAULT '0' COMMENT '金币数',
  `glog_method` tinyint(4) NOT NULL DEFAULT '1' COMMENT '金币增减方式 1增加 2减少',
  `glog_addtime` int(11) NOT NULL COMMENT '添加时间',
  `glog_desc` varchar(500) DEFAULT NULL COMMENT '操作描述',
  `glog_stage` varchar(20) NOT NULL DEFAULT 'system' COMMENT '操作类型',
  PRIMARY KEY (`glog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='金币日志表';

DROP TABLE IF EXISTS `shopnc_gold_payment`;
CREATE TABLE `shopnc_gold_payment` (
  `payment_id` tinyint(1) unsigned NOT NULL COMMENT '支付索引id',
  `payment_code` char(10) NOT NULL COMMENT '支付代码名称',
  `payment_name` varchar(20) NOT NULL COMMENT '支付名称',
  `payment_info` varchar(255) DEFAULT NULL COMMENT '支付接口介绍',
  `payment_config` text COMMENT '支付接口配置信息',
  `payment_online` tinyint(1) unsigned DEFAULT '0' COMMENT '是否为在线接口，1是，0否',
  `payment_state` tinyint(1) unsigned DEFAULT '1' COMMENT '接口状态，1可用，2不可用',
  `payment_sort` tinyint(1) unsigned DEFAULT '3' COMMENT '支付排序',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='金币支付方式表';

DROP TABLE IF EXISTS `shopnc_goods`;
CREATE TABLE `shopnc_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品索引id',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `gc_id` int(10) unsigned NOT NULL COMMENT '商品分类id',
  `gc_name` varchar(200) NOT NULL COMMENT '商品分类名称',
  `brand_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品品牌id',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型id',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺id',
  `spec_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品规格开启状态，1开启，0关闭',
  `spec_id` int(11) NOT NULL COMMENT '商品默认对应的规格id',
  `spec_name` varchar(255) NOT NULL DEFAULT '' COMMENT '规格名称',
  `goods_image` varchar(100) NOT NULL COMMENT '商品默认封面图片',
  `goods_image_more` text COMMENT '商品多图',
  `goods_store_price` decimal(10,2) NOT NULL COMMENT '商品店铺价格',
  `goods_store_price_interval` varchar(30) NOT NULL DEFAULT '' COMMENT '商品价格区间',
  `goods_serial` varchar(50) NOT NULL DEFAULT '' COMMENT '商品货号',
  `goods_show` tinyint(1) NOT NULL COMMENT '商品上架',
  `goods_click` int(11) NOT NULL DEFAULT '1' COMMENT '商品浏览数',
  `goods_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品状态，0开启，1违规下架',
  `goods_commend` tinyint(1) NOT NULL COMMENT '商品推荐',
  `goods_add_time` varchar(10) NOT NULL COMMENT '商品添加时间',
  `goods_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '商品关键字',
  `goods_description` varchar(255) NOT NULL DEFAULT '' COMMENT '商品描述',
  `goods_body` text NOT NULL COMMENT '商品详细内容',
  `goods_attr` text COMMENT '商品属性',
  `goods_spec` text COMMENT '商品规格',
  `goods_col_img` text COMMENT '颜色自定义图片',
  `goods_indate` tinyint(1) unsigned NOT NULL DEFAULT '7' COMMENT '发布有效期',
  `goods_starttime` varchar(10) DEFAULT NULL COMMENT '发布开始时间',
  `goods_endtime` varchar(10) DEFAULT NULL COMMENT '发布结束时间',
  `goods_form` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '商品类型,1为全新、2为二手',
  `transport_id` mediumint(8) unsigned DEFAULT '0' COMMENT '运费模板ID，不使用运费模板值为0',
  `py_price` decimal(10,2) DEFAULT '0.00' COMMENT '平邮',
  `kd_price` decimal(10,2) DEFAULT '0.00' COMMENT '快递',
  `es_price` decimal(10,2) DEFAULT '0.00' COMMENT 'EMS',
  `city_id` mediumint(8) unsigned DEFAULT '0' COMMENT '商品所在地(市)',
  `province_id` mediumint(8) unsigned DEFAULT '0' COMMENT '商品所在地(省)',
  `goods_close_reason` varchar(255) DEFAULT NULL COMMENT '商品违规下架原因',
  `goods_store_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品所在店铺状态 0开启 1关闭',
  `commentnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论次数',
  `salenum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '售出数量',
  `goods_collect` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品收藏数量',
  `goods_goldnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '直通车剩余金币额',
  `goods_isztc` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是直通车商品 0不是 1是直通车商品',
  `goods_ztcstate` tinyint(1) NOT NULL DEFAULT '1' COMMENT '直通车状态  1表示开启 2表示中止',
  `goods_ztcstartdate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `goods_ztclastdate` int(10) unsigned DEFAULT NULL COMMENT '最后消费金币的时间 如果没有设置的话则按照没有减金币情况',
  `group_flag` tinyint(1) unsigned DEFAULT '0' COMMENT '团购标识(团购1/非团购0)',
  `group_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '团购价格',
  `xianshi_flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '限时折扣商品标志(1-是/0-不是)',
  `xianshi_discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '限时折扣率',
  `goods_transfee_charge` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '商品运费承担方式 默认 0为买家承担 1为卖家承担',
  PRIMARY KEY (`goods_id`),
  KEY `goods_name` (`goods_name`,`gc_id`,`store_id`),
  KEY `spec_id` (`spec_id`),
  KEY `store_id` (`store_id`),
  KEY `gc_id` (`gc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COMMENT='商品表';

DROP TABLE IF EXISTS `shopnc_goods_attr_index`;
CREATE TABLE `shopnc_goods_attr_index` (
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `gc_id` int(10) unsigned NOT NULL COMMENT '商品分类id',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `attr_id` int(10) unsigned NOT NULL COMMENT '属性id',
  `attr_value_id` int(10) unsigned NOT NULL COMMENT '属性值id',
  PRIMARY KEY (`goods_id`,`gc_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品与属性对应表';

DROP TABLE IF EXISTS `shopnc_goods_class`;
CREATE TABLE `shopnc_goods_class` (
  `gc_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `gc_name` varchar(100) NOT NULL COMMENT '分类名称',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `type_name` varchar(100) NOT NULL COMMENT '类型名称',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID，0为系统后台发布',
  `gc_parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `gc_sort` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `gc_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '前台显示，0为否，1为是，默认为1',
  `gc_index_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '首页显示 1：默认 显示 0：不显示',
  `gc_title` varchar(200) NOT NULL COMMENT '名称',
  `gc_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `gc_description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`gc_id`),
  KEY `store_id` (`store_id`,`gc_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=344 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

DROP TABLE IF EXISTS `shopnc_goods_class_staple`;
CREATE TABLE `shopnc_goods_class_staple` (
  `staple_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '常用分类id',
  `staple_name` varchar(255) NOT NULL COMMENT '常用分类名称',
  `gc_id` int(10) unsigned NOT NULL COMMENT '分类id',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `store_id` int(10) unsigned NOT NULL COMMENT '所属店铺id',
  PRIMARY KEY (`staple_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺常用分类表';

DROP TABLE IF EXISTS `shopnc_goods_class_tag`;
CREATE TABLE `shopnc_goods_class_tag` (
  `gc_tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'TAGid',
  `gc_id_1` int(10) unsigned NOT NULL COMMENT '一级分类id',
  `gc_id_2` int(10) unsigned NOT NULL COMMENT '二级分类id',
  `gc_id_3` int(10) unsigned NOT NULL COMMENT '三级分类id',
  `gc_tag_name` varchar(255) NOT NULL COMMENT '分类TAG名称',
  `gc_tag_value` text NOT NULL COMMENT '分类TAG值',
  `gc_id` int(10) unsigned NOT NULL COMMENT '商品分类id',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  PRIMARY KEY (`gc_tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=282 DEFAULT CHARSET=utf8 COMMENT='商品分类TAG表';

DROP TABLE IF EXISTS `shopnc_goods_group`;
CREATE TABLE `shopnc_goods_group` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '团购ID',
  `group_name` varchar(255) NOT NULL COMMENT '活动名称',
  `template_id` int(10) unsigned NOT NULL COMMENT '团购活动编号',
  `template_name` varchar(50) NOT NULL COMMENT '团购活动名称',
  `group_help` varchar(255) DEFAULT NULL COMMENT '活动说明',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_name` varchar(200) NOT NULL COMMENT '商品名称',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `spec_price` varchar(255) NOT NULL COMMENT '规格价格',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品原价',
  `groupbuy_price` decimal(10,2) NOT NULL COMMENT '团购价格',
  `limit_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '限制类型 1.按照人数 2.按照件数',
  `virtual_quantity` int(10) unsigned NOT NULL COMMENT '虚拟购买数量',
  `buyer_count` int(10) unsigned NOT NULL COMMENT '已购买人数',
  `def_quantity` int(10) NOT NULL DEFAULT '0' COMMENT '已订购数',
  `min_quantity` int(10) NOT NULL DEFAULT '0' COMMENT '最小团购数量',
  `sale_quantity` int(10) NOT NULL DEFAULT '0' COMMENT '每人限购数量',
  `max_num` int(10) NOT NULL DEFAULT '0' COMMENT '最高件数',
  `group_intro` text COMMENT '本团介绍',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '团购状态 1.未发布 2.已取消 3.进行中 4.已完成 5.已结束',
  `recommended` tinyint(1) unsigned NOT NULL COMMENT '是否推荐 0.未推荐 1.已推荐',
  `published` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发布 1.未发布 2.已发布',
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `cancel_intro` varchar(255) DEFAULT NULL COMMENT '取消说明',
  `class_id` int(10) unsigned NOT NULL COMMENT '团购类别编号',
  `area_id` int(10) unsigned NOT NULL COMMENT '团购地区编号',
  `group_pic` varchar(100) NOT NULL COMMENT '团购图片',
  `rebate` decimal(10,2) NOT NULL COMMENT '折扣率',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='团购商品表';

DROP TABLE IF EXISTS `shopnc_goods_spec`;
CREATE TABLE `shopnc_goods_spec` (
  `spec_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品规格索引id',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `spec_name` varchar(255) NOT NULL COMMENT '规格名称',
  `spec_goods_price` decimal(10,2) NOT NULL COMMENT '规格商品价格',
  `spec_goods_storage` int(11) NOT NULL COMMENT '规格商品库存',
  `spec_salenum` int(11) NOT NULL DEFAULT '0' COMMENT '售出数量',
  `spec_goods_color` varchar(20) NOT NULL COMMENT '规格商品颜色',
  `spec_goods_serial` varchar(50) NOT NULL COMMENT '规格商品编号',
  `spec_goods_spec` text NOT NULL COMMENT '商品规格序列化',
  PRIMARY KEY (`spec_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COMMENT='商品规格表';

DROP TABLE IF EXISTS `shopnc_goods_spec_index`;
CREATE TABLE `shopnc_goods_spec_index` (
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `gc_id` int(10) unsigned NOT NULL COMMENT '商品分类id',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `sp_id` int(10) unsigned NOT NULL COMMENT '规格id',
  `sp_value_id` int(10) unsigned NOT NULL COMMENT '规格值id',
  `sp_value_name` varchar(100) DEFAULT NULL COMMENT '规格值名称',
  PRIMARY KEY (`goods_id`,`gc_id`,`sp_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品与规格对应表';

DROP TABLE IF EXISTS `shopnc_groupbuy_area`;
CREATE TABLE `shopnc_groupbuy_area` (
  `area_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地区编号',
  `area_name` varchar(50) NOT NULL COMMENT '地区名称',
  `area_parent_id` int(10) unsigned NOT NULL COMMENT '父地区编号',
  `area_sort` tinyint(1) unsigned NOT NULL COMMENT '排序',
  `area_deep` tinyint(1) unsigned NOT NULL COMMENT '深度',
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='团购地区表';

DROP TABLE IF EXISTS `shopnc_groupbuy_class`;
CREATE TABLE `shopnc_groupbuy_class` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别编号',
  `class_name` varchar(20) NOT NULL COMMENT '类别名称',
  `class_parent_id` int(10) unsigned NOT NULL COMMENT '父类别编号',
  `sort` tinyint(1) unsigned NOT NULL COMMENT '排序',
  `deep` tinyint(1) unsigned NOT NULL COMMENT '深度',
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='团购类别表';

DROP TABLE IF EXISTS `shopnc_groupbuy_price_range`;
CREATE TABLE `shopnc_groupbuy_price_range` (
  `range_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '价格区间编号',
  `range_name` varchar(20) NOT NULL COMMENT '区间名称',
  `range_start` int(10) unsigned NOT NULL COMMENT '区间下限',
  `range_end` int(10) unsigned NOT NULL COMMENT '区间上限',
  PRIMARY KEY (`range_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='团购价格区间表';

DROP TABLE IF EXISTS `shopnc_groupbuy_template`;
CREATE TABLE `shopnc_groupbuy_template` (
  `template_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '团购活动编号',
  `template_name` varchar(50) NOT NULL COMMENT '团购活动能够名称',
  `start_time` int(10) unsigned NOT NULL COMMENT '活动开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '活动结束时间',
  `join_end_time` int(10) unsigned NOT NULL COMMENT '活动报名截至时间',
  `state` tinyint(1) unsigned NOT NULL COMMENT '状态(1-可报名/2-已过期)',
  PRIMARY KEY (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='团购活动表';

DROP TABLE IF EXISTS `shopnc_inform`;
CREATE TABLE `shopnc_inform` (
  `inform_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '举报id',
  `inform_member_id` int(11) NOT NULL COMMENT '举报人id',
  `inform_member_name` varchar(50) NOT NULL COMMENT '举报人会员名',
  `inform_goods_id` int(11) NOT NULL COMMENT '被举报的商品id',
  `inform_goods_name` varchar(100) NOT NULL COMMENT '被举报的商品名称',
  `inform_subject_id` int(11) NOT NULL COMMENT '举报主题id',
  `inform_subject_content` varchar(50) NOT NULL COMMENT '举报主题',
  `inform_content` varchar(100) NOT NULL COMMENT '举报信息',
  `inform_pic1` varchar(100) NOT NULL COMMENT '图片1',
  `inform_pic2` varchar(100) NOT NULL COMMENT '图片2',
  `inform_pic3` varchar(100) NOT NULL COMMENT '图片3',
  `inform_datetime` int(11) NOT NULL COMMENT '举报时间',
  `inform_store_id` int(11) NOT NULL COMMENT '被举报商品的店铺id',
  `inform_state` tinyint(4) NOT NULL COMMENT '举报状态(1未处理/2已处理)',
  `inform_handle_type` tinyint(4) NOT NULL COMMENT '举报处理结果(1无效举报/2恶意举报/3有效举报)',
  `inform_handle_message` varchar(100) NOT NULL COMMENT '举报处理信息',
  `inform_handle_datetime` int(11) NOT NULL DEFAULT '0' COMMENT '举报处理时间',
  `inform_handle_member_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员id',
  PRIMARY KEY (`inform_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='举报表';

DROP TABLE IF EXISTS `shopnc_inform_subject`;
CREATE TABLE `shopnc_inform_subject` (
  `inform_subject_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '举报主题id',
  `inform_subject_content` varchar(100) NOT NULL COMMENT '举报主题内容',
  `inform_subject_type_id` int(11) NOT NULL COMMENT '举报类型id',
  `inform_subject_type_name` varchar(50) NOT NULL COMMENT '举报类型名称 ',
  `inform_subject_state` tinyint(11) NOT NULL COMMENT '举报主题状态(1可用/2失效)',
  PRIMARY KEY (`inform_subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='举报主题表';

DROP TABLE IF EXISTS `shopnc_inform_subject_type`;
CREATE TABLE `shopnc_inform_subject_type` (
  `inform_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '举报类型id',
  `inform_type_name` varchar(50) NOT NULL COMMENT '举报类型名称 ',
  `inform_type_desc` varchar(100) NOT NULL COMMENT '举报类型描述',
  `inform_type_state` tinyint(4) NOT NULL COMMENT '举报类型状态(1有效/2失效)',
  PRIMARY KEY (`inform_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='举报类型表';

DROP TABLE IF EXISTS `shopnc_link`;
CREATE TABLE `shopnc_link` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `link_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `link_url` varchar(100) DEFAULT NULL COMMENT '链接',
  `link_pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `link_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='合作伙伴表';

DROP TABLE IF EXISTS `shopnc_mail_msg_temlates`;
CREATE TABLE `shopnc_mail_msg_temlates` (
  `name` varchar(100) NOT NULL COMMENT '模板名称',
  `title` varchar(100) DEFAULT NULL COMMENT '模板标题',
  `code` varchar(100) NOT NULL COMMENT '模板调用代码',
  `content` text NOT NULL COMMENT '模板内容',
  `type` tinyint(1) NOT NULL COMMENT '模板类别，0为邮件，1为短信息，默认为0',
  `mail_switch` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否开启',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邮件模板表';

DROP TABLE IF EXISTS `shopnc_map`;
CREATE TABLE `shopnc_map` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地图ID',
  `member_id` int(11) NOT NULL COMMENT '会员ID',
  `member_name` varchar(20) NOT NULL COMMENT '会员名称',
  `area_id` int(11) NOT NULL COMMENT '地区ID',
  `area_info` varchar(50) NOT NULL COMMENT '地区内容',
  `address` varchar(50) DEFAULT NULL COMMENT '地址',
  `point_lng` float NOT NULL DEFAULT '0' COMMENT '地理经度',
  `point_lat` float NOT NULL DEFAULT '0' COMMENT '地理纬度',
  `store_name` varchar(20) DEFAULT NULL COMMENT '店铺名称',
  `store_id` int(11) DEFAULT '0' COMMENT '店铺ID',
  `map_api` char(9) NOT NULL DEFAULT 'baidu' COMMENT '地图API(暂时只有baidu)',
  PRIMARY KEY (`map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='地图表';

DROP TABLE IF EXISTS `shopnc_member`;
CREATE TABLE `shopnc_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `member_name` varchar(50) NOT NULL COMMENT '会员名称',
  `member_truename` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `store_id` int(11) NOT NULL COMMENT '店铺id',
  `member_avatar` varchar(50) DEFAULT NULL COMMENT '会员头像',
  `member_sex` tinyint(1) DEFAULT NULL COMMENT '会员性别',
  `member_birthday` date DEFAULT NULL COMMENT '生日',
  `member_passwd` varchar(32) NOT NULL COMMENT '会员密码',
  `member_email` varchar(100) NOT NULL COMMENT '会员邮箱',
  `member_qq` varchar(100) DEFAULT NULL COMMENT 'qq',
  `member_msn` varchar(100) DEFAULT NULL COMMENT 'msn',
  `member_ww` varchar(100) DEFAULT NULL COMMENT '阿里旺旺',
  `member_login_num` int(11) NOT NULL DEFAULT '1' COMMENT '登录次数',
  `member_time` varchar(10) NOT NULL COMMENT '会员注册时间',
  `member_login_time` varchar(10) NOT NULL COMMENT '当前登录时间',
  `member_old_login_time` varchar(10) NOT NULL COMMENT '上次登录时间',
  `member_login_ip` varchar(20) DEFAULT NULL COMMENT '当前登录ip',
  `member_old_login_ip` varchar(20) DEFAULT NULL COMMENT '上次登录ip',
  `member_goldnum` int(11) NOT NULL DEFAULT '0' COMMENT '金币数',
  `member_goldnumcount` int(11) NOT NULL DEFAULT '0' COMMENT '曾经拥有购买金币数',
  `member_goldnumminus` int(11) NOT NULL DEFAULT '0' COMMENT '已经消费金币数',
  `member_qqopenid` varchar(100) DEFAULT NULL COMMENT 'qq互联id',
  `member_qqinfo` text COMMENT 'qq账号相关信息',
  `member_sinaopenid` varchar(100) DEFAULT NULL COMMENT '新浪微博登录id',
  `member_sinainfo` text COMMENT '新浪账号相关信息序列化值',
  `member_points` int(11) NOT NULL DEFAULT '0' COMMENT '会员积分',
  `available_predeposit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '预存款可用金额',
  `freeze_predeposit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '预存款冻结金额',
  `inform_allow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许举报(1可以/2不可以)',
  `is_buy` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员是否有购买权限 1为开启 0为关闭',
  `is_allowtalk` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员是否有咨询和发送站内信的权限 1为开启 0为关闭',
  `member_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员的开启状态 1为开启 0为关闭',
  `member_credit` int(11) NOT NULL DEFAULT '0' COMMENT '会员信用',
  `member_snsvisitnum` int(11) NOT NULL DEFAULT '0' COMMENT 'sns空间访问次数',
  `member_areaid` int(11) DEFAULT NULL COMMENT '地区ID',
  `member_cityid` int(11) DEFAULT NULL COMMENT '城市ID',
  `member_provinceid` int(11) DEFAULT NULL COMMENT '省份ID',
  `member_areainfo` varchar(255) DEFAULT NULL COMMENT '地区内容',
  PRIMARY KEY (`member_id`),
  KEY `member_name` (`member_name`,`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='会员表';

DROP TABLE IF EXISTS `shopnc_message`;
CREATE TABLE `shopnc_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '短消息索引id',
  `message_parent_id` int(11) NOT NULL COMMENT '回复短消息message_id',
  `from_member_id` int(11) NOT NULL COMMENT '短消息发送人',
  `to_member_id` varchar(1000) NOT NULL COMMENT '短消息接收人',
  `message_title` varchar(50) DEFAULT NULL COMMENT '短消息标题',
  `message_body` varchar(255) NOT NULL COMMENT '短消息内容',
  `message_time` varchar(10) NOT NULL COMMENT '短消息发送时间',
  `message_update_time` varchar(10) DEFAULT NULL COMMENT '短消息回复更新时间',
  `message_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '短消息打开状态',
  `message_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '短消息状态，0为正常状态，1为发送人删除状态，2为接收人删除状态',
  `message_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为普通信、1为系统消息、2为CRM消息',
  `read_member_id` varchar(1000) DEFAULT NULL COMMENT '已经读过该消息的会员id',
  `del_member_id` varchar(1000) DEFAULT NULL COMMENT '已经删除该消息的会员id',
  `message_ismore` tinyint(1) NOT NULL DEFAULT '0' COMMENT '站内信是否为一条发给多个用户 0为否 1为多条 ',
  `from_member_name` varchar(100) DEFAULT NULL COMMENT '发信息人用户名',
  `to_member_name` varchar(100) DEFAULT NULL COMMENT '接收人用户名',
  PRIMARY KEY (`message_id`),
  KEY `from_member_id` (`from_member_id`),
  KEY `to_member_id` (`to_member_id`(333)),
  KEY `message_ismore` (`message_ismore`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短消息';

DROP TABLE IF EXISTS `shopnc_navigation`;
CREATE TABLE `shopnc_navigation` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `nav_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类别，0自定义导航，1商品分类，2文章导航，3活动导航，默认为0',
  `nav_title` varchar(100) DEFAULT NULL COMMENT '导航标题',
  `nav_url` varchar(255) DEFAULT NULL COMMENT '导航链接',
  `nav_location` tinyint(1) NOT NULL DEFAULT '0' COMMENT '导航位置，0头部，1中部，2底部，默认为0',
  `nav_new_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否以新窗口打开，0为否，1为是，默认为0',
  `nav_sort` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类别ID，对应着nav_type中的内容，默认为0',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='页面导航表';

DROP TABLE IF EXISTS `shopnc_order`;
CREATE TABLE `shopnc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单索引id',
  `order_sn` varchar(100) NOT NULL COMMENT '订单编号，商城内部使用',
  `seller_id` int(11) NOT NULL COMMENT '卖家id',
  `store_id` int(11) NOT NULL COMMENT '卖家店铺id',
  `store_name` varchar(50) NOT NULL COMMENT '卖家店铺名称',
  `buyer_id` int(11) NOT NULL COMMENT '买家id',
  `buyer_name` varchar(50) NOT NULL COMMENT '买家姓名',
  `buyer_email` varchar(100) NOT NULL COMMENT '买家电子邮箱',
  `add_time` varchar(10) NOT NULL COMMENT '订单生成时间',
  `order_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单类型 0.普通 1.团购',
  `payment_id` int(11) NOT NULL COMMENT '支付方式id',
  `payment_name` varchar(50) NOT NULL COMMENT '支付方式名称',
  `payment_code` varchar(50) NOT NULL COMMENT '支付方式名称代码',
  `payment_direct` char(1) DEFAULT '1' COMMENT '支付类型:1是即时到帐,2是担保交易',
  `out_sn` varchar(100) NOT NULL COMMENT '订单编号，外部支付时使用，有些外部支付系统要求特定的订单编号',
  `payment_time` varchar(10) DEFAULT NULL COMMENT '支付(付款)时间',
  `pay_message` text COMMENT '支付留言',
  `shipping_time` varchar(10) DEFAULT NULL COMMENT '配送时间',
  `shipping_express_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配送公司ID',
  `shipping_code` varchar(50) DEFAULT NULL COMMENT '物流单号',
  `out_payment_code` varchar(255) DEFAULT NULL COMMENT '外部交易平台单独使用的标识字符串',
  `finnshed_time` varchar(10) DEFAULT NULL COMMENT '订单完成时间',
  `invoice` varchar(100) DEFAULT NULL COMMENT '发票信息',
  `goods_amount` decimal(10,2) NOT NULL COMMENT '商品总价格',
  `discount` decimal(10,2) DEFAULT NULL COMMENT '折扣价格',
  `order_amount` decimal(10,2) NOT NULL COMMENT '订单总价格',
  `shipping_fee` decimal(10,2) DEFAULT NULL COMMENT '运费价格',
  `shipping_name` char(3) DEFAULT '' COMMENT '配送方式',
  `evaluation_status` tinyint(1) DEFAULT NULL COMMENT '评价状态 0为评价，1已评价',
  `evaluation_time` varchar(10) DEFAULT NULL COMMENT '评价时间',
  `evalseller_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '卖家是否已评价买家',
  `evalseller_time` int(11) DEFAULT NULL COMMENT '卖家评价买家的时间',
  `order_message` varchar(300) DEFAULT NULL COMMENT '订单留言',
  `order_state` int(11) NOT NULL DEFAULT '10' COMMENT '订单状态：10(默认):未付款;20:已付款;30:已发货;40:已收货;50:已提交;60已确认;',
  `order_pointscount` int(11) NOT NULL DEFAULT '0' COMMENT '订单赠送积分',
  `voucher_id` int(11) DEFAULT NULL COMMENT '代金券id',
  `voucher_price` int(11) DEFAULT NULL COMMENT '代金券面额',
  `voucher_code` varchar(32) DEFAULT NULL COMMENT '代金券编码',
  `refund_state` tinyint(1) unsigned DEFAULT '0' COMMENT '退款状态:0是无退款,1是部分退款,2是全部退款',
  `return_state` tinyint(1) unsigned DEFAULT '0' COMMENT '退货状态:0是无退货,1是部分退货,2是全部退货',
  `refund_amount` decimal(10,2) DEFAULT '0.00' COMMENT '退款金额',
  `return_num` int(10) unsigned DEFAULT '0' COMMENT '退货数量',
  `group_id` int(10) unsigned DEFAULT '0' COMMENT '团购编号(非团购订单为0)',
  `group_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '团购数量',
  `xianshi_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT ' 限时折扣编号',
  `xianshi_explain` varchar(100) NOT NULL DEFAULT '' COMMENT '限时折扣说明',
  `mansong_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '满就送编号',
  `mansong_explain` varchar(200) NOT NULL DEFAULT '' COMMENT '满就送说明',
  `bundling_id` int(10) DEFAULT NULL COMMENT '搭配套餐id',
  `bundling_explain` varchar(100) DEFAULT NULL COMMENT '搭配套餐说明',
  `order_from` enum('1','2') DEFAULT '1' COMMENT '1PC2手机端',
  `deliver_explain` text COMMENT '发货备注',
  `daddress_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '发货地址ID',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单表';

DROP TABLE IF EXISTS `shopnc_order_address`;
CREATE TABLE `shopnc_order_address` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `true_name` varchar(50) NOT NULL COMMENT '收货人姓名',
  `area_id` int(11) NOT NULL COMMENT '地区id',
  `area_info` varchar(100) NOT NULL COMMENT '地区内容',
  `address` varchar(200) NOT NULL COMMENT '详细地址',
  `zip_code` varchar(20) NOT NULL COMMENT '邮政编码',
  `tel_phone` varchar(20) NOT NULL COMMENT '电话号码',
  `mob_phone` varchar(20) NOT NULL COMMENT '手机号码',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单配送信息表';

DROP TABLE IF EXISTS `shopnc_order_goods`;
CREATE TABLE `shopnc_order_goods` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单商品表索引id',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `spec_id` int(11) NOT NULL COMMENT '规格id',
  `spec_info` varchar(50) DEFAULT NULL COMMENT '规格描述',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `goods_num` int(11) NOT NULL COMMENT '商品数量',
  `goods_image` varchar(100) DEFAULT NULL COMMENT '商品图片',
  `goods_returnnum` int(10) unsigned DEFAULT '0' COMMENT '退货数量',
  `stores_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '店铺ID',
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单商品表';

DROP TABLE IF EXISTS `shopnc_order_log`;
CREATE TABLE `shopnc_order_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单处理历史索引id',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `order_state` varchar(20) NOT NULL COMMENT '订单状态信息',
  `change_state` varchar(20) NOT NULL COMMENT '下一步订单状态信息',
  `state_info` varchar(20) NOT NULL COMMENT '订单状态描述',
  `log_time` varchar(10) NOT NULL COMMENT '处理时间',
  `operator` varchar(50) NOT NULL COMMENT '操作人',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单处理历史表';

DROP TABLE IF EXISTS `shopnc_p_bundling`;
CREATE TABLE `shopnc_p_bundling` (
  `bl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '组合ID',
  `bl_name` varchar(50) NOT NULL COMMENT '组合名称',
  `store_id` int(11) NOT NULL COMMENT '店铺名称',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `bl_img_more` varchar(1000) NOT NULL COMMENT '商品多图',
  `bl_discount_price` decimal(10,2) NOT NULL COMMENT '组合价格',
  `bl_freight_choose` tinyint(1) NOT NULL COMMENT '运费承担方式',
  `bl_freight` decimal(10,2) NOT NULL COMMENT '运费',
  `bl_desc` text NOT NULL COMMENT '组合描述',
  `bl_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '组合状态 0-关闭/1-开启',
  PRIMARY KEY (`bl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='组合销售活动表';

DROP TABLE IF EXISTS `shopnc_p_bundling_goods`;
CREATE TABLE `shopnc_p_bundling_goods` (
  `bl_goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '组合商品id',
  `bl_id` int(11) NOT NULL COMMENT '组合id',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goods_name` varchar(50) NOT NULL COMMENT '商品名称',
  PRIMARY KEY (`bl_goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='组合销售活动商品表';

DROP TABLE IF EXISTS `shopnc_p_bundling_quota`;
CREATE TABLE `shopnc_p_bundling_quota` (
  `bl_quota_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '套餐ID',
  `store_id` int(11) NOT NULL COMMENT '店铺id',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `member_id` int(11) NOT NULL COMMENT '会员id',
  `member_name` varchar(50) NOT NULL COMMENT '会员名称',
  `bl_quota_month` tinyint(3) unsigned NOT NULL COMMENT '购买数量（单位月）',
  `bl_quota_starttime` varchar(10) NOT NULL COMMENT '套餐开始时间',
  `bl_quota_endtime` varchar(10) NOT NULL COMMENT '套餐结束时间',
  `bl_quota_state` tinyint(1) unsigned NOT NULL COMMENT '套餐状态：0关闭，1开启。默认为 1',
  `bl_pay_gold` int(10) unsigned NOT NULL COMMENT '花费金币数量',
  PRIMARY KEY (`bl_quota_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='组合销售套餐表';

DROP TABLE IF EXISTS `shopnc_p_mansong`;
CREATE TABLE `shopnc_p_mansong` (
  `mansong_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '满送活动编号',
  `mansong_name` varchar(50) NOT NULL COMMENT '活动名称',
  `quota_id` int(10) unsigned NOT NULL COMMENT '套餐编号',
  `start_time` int(10) unsigned NOT NULL COMMENT '活动开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '活动结束时间',
  `member_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺编号',
  `member_name` varchar(50) NOT NULL COMMENT '用户名',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `state` tinyint(1) unsigned NOT NULL COMMENT '活动状态(1-未发布/2-正常/3-取消/4-失效/5-结束)',
  `remark` varchar(200) NOT NULL COMMENT '备注',
  PRIMARY KEY (`mansong_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='满就送活动表';

DROP TABLE IF EXISTS `shopnc_p_mansong_apply`;
CREATE TABLE `shopnc_p_mansong_apply` (
  `apply_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '申请编号',
  `member_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `member_name` varchar(50) NOT NULL COMMENT '用户名',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺编号',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `apply_quantity` tinyint(1) unsigned NOT NULL COMMENT '申请数量',
  `apply_date` int(10) unsigned NOT NULL COMMENT '申请时间',
  `state` tinyint(1) unsigned NOT NULL COMMENT '状态(1-新申请/2-审核通过/3-已取消/4-审核失败)',
  PRIMARY KEY (`apply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='满就送套餐申请表';

DROP TABLE IF EXISTS `shopnc_p_mansong_quota`;
CREATE TABLE `shopnc_p_mansong_quota` (
  `quota_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '满就送套餐编号',
  `apply_id` int(10) unsigned NOT NULL COMMENT '申请编号',
  `member_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺编号',
  `member_name` varchar(50) NOT NULL COMMENT '用户名',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `start_time` int(10) unsigned NOT NULL COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '结束时间',
  `state` tinyint(1) unsigned NOT NULL COMMENT '配额状态(1-可用/2-取消/3-结束)',
  PRIMARY KEY (`quota_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='满就送套餐表';

DROP TABLE IF EXISTS `shopnc_p_mansong_rule`;
CREATE TABLE `shopnc_p_mansong_rule` (
  `rule_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则编号',
  `mansong_id` int(10) unsigned NOT NULL COMMENT '活动编号',
  `level` tinyint(1) unsigned NOT NULL COMMENT '规则级别(1/2/3)',
  `price` int(10) unsigned NOT NULL COMMENT '级别价格',
  `shipping_free` tinyint(1) unsigned NOT NULL COMMENT '免邮标志(0-不免邮/1-免邮费)',
  `discount` int(10) unsigned NOT NULL COMMENT '减现金优惠金额',
  `gift_name` varchar(50) NOT NULL COMMENT '礼品名称',
  `gift_link` varchar(100) NOT NULL COMMENT '礼品链接',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='满就送活动规则表';

DROP TABLE IF EXISTS `shopnc_p_xianshi`;
CREATE TABLE `shopnc_p_xianshi` (
  `xianshi_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '限时编号',
  `goods_limit` int(10) unsigned NOT NULL COMMENT '商品限制',
  `xianshi_name` varchar(50) NOT NULL COMMENT '活动名称',
  `quota_id` int(10) unsigned NOT NULL COMMENT '套餐编号',
  `start_time` int(10) unsigned NOT NULL COMMENT '活动开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '活动结束时间',
  `member_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺编号',
  `member_name` varchar(50) NOT NULL COMMENT '用户名',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `discount` decimal(10,2) NOT NULL COMMENT '活动折扣',
  `buy_limit` int(10) unsigned NOT NULL COMMENT '购买限制',
  `state` tinyint(1) unsigned NOT NULL COMMENT '活动状态(1-未发布/2-正常/3-取消/4-失效/5-结束)',
  PRIMARY KEY (`xianshi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='限时折扣活动表';

DROP TABLE IF EXISTS `shopnc_p_xianshi_apply`;
CREATE TABLE `shopnc_p_xianshi_apply` (
  `apply_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '申请编号',
  `member_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `member_name` varchar(50) NOT NULL COMMENT '用户名',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺编号',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `apply_quantity` tinyint(1) unsigned NOT NULL COMMENT '申请数量',
  `apply_date` int(10) unsigned NOT NULL COMMENT '申请时间',
  `state` tinyint(1) unsigned NOT NULL COMMENT '状态(1-新申请/2-审核通过/3-已取消/4-审核失败)',
  PRIMARY KEY (`apply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='限时折扣套餐申请表';

DROP TABLE IF EXISTS `shopnc_p_xianshi_goods`;
CREATE TABLE `shopnc_p_xianshi_goods` (
  `xianshi_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '限时折扣商品表',
  `xianshi_id` int(10) unsigned NOT NULL COMMENT '限时活动编号',
  `xianshi_name` varchar(50) NOT NULL COMMENT '活动名称',
  `quota_id` int(10) unsigned NOT NULL COMMENT '套餐编号',
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品编号',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `goods_store_price` decimal(10,2) NOT NULL COMMENT '店铺价格',
  `discount` decimal(10,2) NOT NULL COMMENT '折扣',
  `buy_limit` int(10) unsigned NOT NULL COMMENT '购买限额',
  `xianshi_price` decimal(10,2) NOT NULL COMMENT '限时折扣价格',
  `goods_image` varchar(100) NOT NULL COMMENT '商品图片',
  `state` tinyint(1) unsigned NOT NULL COMMENT '状态(1-可用/2-取消)',
  PRIMARY KEY (`xianshi_goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='限时折扣商品表';

DROP TABLE IF EXISTS `shopnc_p_xianshi_quota`;
CREATE TABLE `shopnc_p_xianshi_quota` (
  `quota_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '限时折扣套餐编号',
  `apply_id` int(10) unsigned NOT NULL COMMENT '申请编号',
  `member_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺编号',
  `member_name` varchar(50) NOT NULL COMMENT '用户名',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `start_time` int(10) unsigned NOT NULL COMMENT '套餐开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '套餐结束时间',
  `times_limit` int(10) unsigned NOT NULL COMMENT '套餐时间限制',
  `published_times` int(10) unsigned NOT NULL COMMENT '已发布次数',
  `goods_limit` int(10) unsigned NOT NULL COMMENT '活动商品数限制',
  `state` tinyint(1) unsigned NOT NULL COMMENT '配额状态(1-可用/2-取消/3-结束)',
  PRIMARY KEY (`quota_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='限时折扣套餐表';

DROP TABLE IF EXISTS `shopnc_payment`;
CREATE TABLE `shopnc_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店铺支付索引id',
  `payment_code` varchar(50) NOT NULL COMMENT '支付代码名称',
  `payment_name` varchar(50) NOT NULL COMMENT '支付名称',
  `payment_info` varchar(255) DEFAULT NULL COMMENT '支付接口介绍',
  `payment_config` text NOT NULL COMMENT '支付接口配置信息',
  `store_id` int(11) NOT NULL COMMENT '对应的店铺id',
  `payment_online` tinyint(1) NOT NULL COMMENT '是否为在线接口，1是，0否',
  `payment_state` tinyint(1) NOT NULL COMMENT '接口状态，1可用，2不可用',
  `payment_sort` int(11) NOT NULL COMMENT '支付排序',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='店铺支付接口数据表';

DROP TABLE IF EXISTS `shopnc_points_cart`;
CREATE TABLE `shopnc_points_cart` (
  `pcart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `pmember_id` int(11) NOT NULL COMMENT '会员编号',
  `pgoods_id` int(11) NOT NULL COMMENT '积分礼品序号',
  `pgoods_name` varchar(100) NOT NULL COMMENT '积分礼品名称',
  `pgoods_points` int(11) NOT NULL COMMENT '积分礼品兑换积分',
  `pgoods_choosenum` int(11) NOT NULL COMMENT '选择积分礼品数量',
  `pgoods_image` varchar(100) DEFAULT NULL COMMENT '积分礼品图片',
  PRIMARY KEY (`pcart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分礼品兑换购物车';

DROP TABLE IF EXISTS `shopnc_points_goods`;
CREATE TABLE `shopnc_points_goods` (
  `pgoods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '积分礼品索引id',
  `pgoods_name` varchar(100) NOT NULL COMMENT '积分礼品名称',
  `pgoods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '积分礼品原价',
  `pgoods_points` int(11) NOT NULL COMMENT '积分礼品兑换所需积分',
  `pgoods_image` varchar(100) NOT NULL COMMENT '积分礼品默认封面图片',
  `pgoods_tag` varchar(100) NOT NULL COMMENT '积分礼品标签',
  `pgoods_serial` varchar(50) NOT NULL COMMENT '积分礼品货号',
  `pgoods_storage` int(11) NOT NULL DEFAULT '0' COMMENT '积分礼品库存数',
  `pgoods_show` tinyint(1) NOT NULL COMMENT '积分礼品上架 0表示下架 1表示上架',
  `pgoods_commend` tinyint(1) NOT NULL COMMENT '积分礼品推荐',
  `pgoods_add_time` int(11) NOT NULL COMMENT '积分礼品添加时间',
  `pgoods_keywords` varchar(100) DEFAULT NULL COMMENT '积分礼品关键字',
  `pgoods_description` varchar(200) DEFAULT NULL COMMENT '积分礼品描述',
  `pgoods_body` text NOT NULL COMMENT '积分礼品详细内容',
  `pgoods_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '积分礼品状态，0开启，1禁售',
  `pgoods_close_reason` varchar(255) DEFAULT NULL COMMENT '积分礼品禁售原因',
  `pgoods_salenum` int(11) NOT NULL DEFAULT '0' COMMENT '积分礼品售出数量',
  `pgoods_view` int(11) NOT NULL DEFAULT '0' COMMENT '积分商品浏览次数',
  `pgoods_islimit` tinyint(1) NOT NULL COMMENT '是否限制每会员兑换数量',
  `pgoods_limitnum` int(11) DEFAULT NULL COMMENT '每会员限制兑换数量',
  `pgoods_freightcharge` tinyint(1) NOT NULL DEFAULT '0' COMMENT '运费承担方式 0表示卖家承担 1表示买家承担',
  `pgoods_freightprice` decimal(10,2) DEFAULT NULL COMMENT '运费价格',
  `pgoods_islimittime` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否限制兑换时间 0为不限制 1为限制',
  `pgoods_starttime` int(11) DEFAULT NULL COMMENT '兑换开始时间',
  `pgoods_endtime` int(11) DEFAULT NULL COMMENT '兑换结束时间',
  `pgoods_sort` int(11) NOT NULL DEFAULT '0' COMMENT '礼品排序',
  PRIMARY KEY (`pgoods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='积分礼品表';

DROP TABLE IF EXISTS `shopnc_points_log`;
CREATE TABLE `shopnc_points_log` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '积分日志编号',
  `pl_memberid` int(11) NOT NULL COMMENT '会员编号',
  `pl_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `pl_adminid` int(11) DEFAULT NULL COMMENT '管理员编号',
  `pl_adminname` varchar(100) DEFAULT NULL COMMENT '管理员名称',
  `pl_points` int(11) NOT NULL DEFAULT '0' COMMENT '积分数负数表示扣除',
  `pl_addtime` int(11) NOT NULL COMMENT '添加时间',
  `pl_desc` varchar(100) NOT NULL COMMENT '操作描述',
  `pl_stage` varchar(50) NOT NULL COMMENT '操作阶段',
  PRIMARY KEY (`pl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员积分日志表';

DROP TABLE IF EXISTS `shopnc_points_order`;
CREATE TABLE `shopnc_points_order` (
  `point_orderid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兑换订单编号',
  `point_ordersn` varchar(100) NOT NULL COMMENT '兑换订单编号',
  `point_buyerid` int(11) NOT NULL COMMENT '兑换会员id',
  `point_buyername` varchar(50) NOT NULL COMMENT '兑换会员姓名',
  `point_buyeremail` varchar(100) NOT NULL COMMENT '兑换会员email',
  `point_addtime` int(11) NOT NULL COMMENT '兑换订单生成时间',
  `point_paymentid` int(11) NOT NULL COMMENT '支付方式id',
  `point_paymentname` varchar(50) NOT NULL COMMENT '支付方式名称',
  `point_paymentcode` varchar(50) NOT NULL COMMENT '支付方式名称代码',
  `point_paymentdirect` tinyint(1) DEFAULT '1' COMMENT '支付类型:1是即时到帐,2是但保交易',
  `point_outsn` varchar(100) NOT NULL COMMENT '订单编号，外部支付时使用，有些外部支付系统要求特定的订单编号',
  `point_paymenttime` int(11) DEFAULT NULL COMMENT '支付(付款)时间',
  `point_paymessage` varchar(300) DEFAULT NULL COMMENT '支付留言',
  `point_shippingtime` int(11) DEFAULT NULL COMMENT '配送时间',
  `point_shippingcode` varchar(50) DEFAULT NULL COMMENT '物流单号',
  `point_shippingdesc` varchar(500) DEFAULT NULL COMMENT '发货描述',
  `point_outpaymentcode` varchar(255) DEFAULT NULL COMMENT '外部交易平台单独使用的标识字符串',
  `point_finnshedtime` int(11) DEFAULT NULL COMMENT '订单完成时间',
  `point_allpoint` int(11) NOT NULL DEFAULT '0' COMMENT '兑换总积分',
  `point_orderamount` decimal(10,2) NOT NULL COMMENT '兑换订单总金额',
  `point_shippingcharge` tinyint(1) NOT NULL DEFAULT '0' COMMENT '运费承担方式 0表示卖家 1表示买家',
  `point_shippingfee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '运费金额',
  `point_ordermessage` varchar(300) DEFAULT NULL COMMENT '订单留言',
  `point_orderstate` int(11) NOT NULL DEFAULT '10' COMMENT '订单状态：10(默认):未付款;11已付款;20:确认付款;30:已发货;40:已收货;50已完成;2已取消',
  PRIMARY KEY (`point_orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兑换订单表';

DROP TABLE IF EXISTS `shopnc_points_orderaddress`;
CREATE TABLE `shopnc_points_orderaddress` (
  `point_oaid` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `point_orderid` int(11) NOT NULL COMMENT '订单id',
  `point_truename` varchar(50) NOT NULL COMMENT '收货人姓名',
  `point_areaid` int(11) NOT NULL COMMENT '地区id',
  `point_areainfo` varchar(100) NOT NULL COMMENT '地区内容',
  `point_address` varchar(200) NOT NULL COMMENT '详细地址',
  `point_zipcode` varchar(20) NOT NULL COMMENT '邮政编码',
  `point_telphone` varchar(20) NOT NULL COMMENT '电话号码',
  `point_mobphone` varchar(20) NOT NULL COMMENT '手机号码',
  PRIMARY KEY (`point_oaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兑换订单地址表';

DROP TABLE IF EXISTS `shopnc_points_ordergoods`;
CREATE TABLE `shopnc_points_ordergoods` (
  `point_recid` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单礼品表索引',
  `point_orderid` int(11) NOT NULL COMMENT '订单id',
  `point_goodsid` int(11) NOT NULL COMMENT '礼品id',
  `point_goodsname` varchar(100) NOT NULL COMMENT '礼品名称',
  `point_goodspoints` int(11) NOT NULL COMMENT '礼品兑换积分',
  `point_goodsnum` int(11) NOT NULL COMMENT '礼品数量',
  `point_goodsimage` varchar(100) DEFAULT NULL COMMENT '礼品图片',
  PRIMARY KEY (`point_recid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兑换订单商品表';

DROP TABLE IF EXISTS `shopnc_predeposit_cash`;
CREATE TABLE `shopnc_predeposit_cash` (
  `pdcash_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `pdcash_sn` varchar(100) NOT NULL COMMENT '记录唯一标示',
  `pdcash_memberid` int(11) NOT NULL COMMENT '会员编号',
  `pdcash_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `pdcash_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `pdcash_payment` varchar(50) NOT NULL COMMENT '支付方式',
  `pdcash_paymentaccount` varchar(100) DEFAULT NULL COMMENT '支付账号',
  `pdcash_toname` varchar(100) DEFAULT NULL COMMENT '收款人姓名',
  `pdcash_tobank` varchar(100) DEFAULT NULL COMMENT '收款银行',
  `pdcash_memberremark` varchar(1000) DEFAULT NULL COMMENT '会员提现备注',
  `pdcash_addtime` int(11) NOT NULL COMMENT '添加时间',
  `pdcash_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0为申请 1为完成 2为关闭',
  `pdcash_paystate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '提现支付状态 0为未支付 1为支付',
  `pdcash_adminid` int(11) DEFAULT NULL COMMENT '管理员编号',
  `pdcash_adminname` varchar(100) DEFAULT NULL COMMENT '管理员姓名',
  `pdcash_adminremark` varchar(1000) DEFAULT NULL COMMENT '管理员备注',
  `pdcash_remark` varchar(1000) DEFAULT NULL COMMENT '管理员和会员都可查看的备注',
  PRIMARY KEY (`pdcash_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='预存款提现记录表';

DROP TABLE IF EXISTS `shopnc_predeposit_log`;
CREATE TABLE `shopnc_predeposit_log` (
  `pdlog_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `pdlog_memberid` int(11) NOT NULL COMMENT '会员编号',
  `pdlog_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `pdlog_adminid` int(11) DEFAULT NULL COMMENT '管理员编号',
  `pdlog_adminname` varchar(50) DEFAULT NULL COMMENT '管理员名称',
  `pdlog_stage` enum('system','recharge','cash','order','admin','income','') NOT NULL DEFAULT '' COMMENT '日志类型 枚举 system 系统自动 recharge 充值 cash 提现 order 订单 admin 管理员手动修改 income收入',
  `pdlog_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '日志类型 0表示可用金额 1表示冻结金额',
  `pdlog_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `pdlog_addtime` int(11) NOT NULL COMMENT '添加时间',
  `pdlog_desc` varchar(1000) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`pdlog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='预存款日志表';

DROP TABLE IF EXISTS `shopnc_predeposit_recharge`;
CREATE TABLE `shopnc_predeposit_recharge` (
  `pdr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `pdr_sn` varchar(100) NOT NULL COMMENT '记录唯一标示',
  `pdr_memberid` int(11) NOT NULL COMMENT '会员编号',
  `pdr_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `pdr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '充值金额',
  `pdr_payment` varchar(50) DEFAULT NULL COMMENT '支付方式',
  `pdr_onlinecode` varchar(100) DEFAULT NULL COMMENT '线上支付的交易流水号',
  `pdr_remittancename` varchar(100) DEFAULT NULL COMMENT '汇款人姓名',
  `pdr_remittancebank` varchar(100) DEFAULT NULL COMMENT '汇款银行',
  `pdr_remittancedate` int(11) DEFAULT NULL COMMENT '汇款日期',
  `pdr_memberremark` varchar(1000) DEFAULT NULL COMMENT '会员备注',
  `pdr_addtime` int(11) NOT NULL COMMENT '添加时间',
  `pdr_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '充值状态 0 表示申请中 1表示完成 2表示关闭',
  `pdr_paystate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付状态 0表示未支付 1表示支付',
  `pdr_adminid` int(11) DEFAULT NULL COMMENT '管理员编号',
  `pdr_adminname` varchar(100) DEFAULT NULL COMMENT '管理员名称',
  `pdr_adminremark` varchar(1000) DEFAULT NULL COMMENT '管理员备注',
  PRIMARY KEY (`pdr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='预存款充值信息表';

DROP TABLE IF EXISTS `shopnc_recommend`;
CREATE TABLE `shopnc_recommend` (
  `recommend_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `recommend_name` varchar(50) DEFAULT NULL COMMENT '名称',
  `recommend_code` varchar(255) NOT NULL COMMENT '推荐标识码',
  `recommend_desc` varchar(255) NOT NULL COMMENT '推荐描述',
  `recommend_config` varchar(255) DEFAULT NULL COMMENT '配置信息',
  PRIMARY KEY (`recommend_id`),
  UNIQUE KEY `recommend_code` (`recommend_code`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='推荐类型表';

DROP TABLE IF EXISTS `shopnc_recommend_goods`;
CREATE TABLE `shopnc_recommend_goods` (
  `recommend_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '推荐ID',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`recommend_id`,`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐商品表';

DROP TABLE IF EXISTS `shopnc_refund_log`;
CREATE TABLE `shopnc_refund_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '退款记录ID',
  `order_id` int(10) unsigned NOT NULL COMMENT '订单ID',
  `refund_sn` varchar(100) NOT NULL COMMENT '退款编号',
  `order_sn` varchar(100) NOT NULL COMMENT '订单编号',
  `seller_id` int(10) unsigned NOT NULL COMMENT '卖家ID',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺ID',
  `store_name` varchar(20) NOT NULL COMMENT '店铺名称',
  `buyer_id` int(10) unsigned NOT NULL COMMENT '买家ID',
  `buyer_name` varchar(50) NOT NULL COMMENT '买家会员名',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `order_amount` decimal(10,2) NOT NULL COMMENT '订单金额',
  `order_refund` decimal(10,2) NOT NULL COMMENT '退款金额',
  `refund_paymentname` varchar(50) NOT NULL COMMENT '支付方式名称',
  `refund_paymentcode` varchar(50) NOT NULL COMMENT '支付方式代码',
  `refund_message` varchar(300) DEFAULT NULL COMMENT '退款备注',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退款表';

DROP TABLE IF EXISTS `shopnc_return`;
CREATE TABLE `shopnc_return` (
  `return_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '退货记录ID',
  `order_id` int(10) unsigned NOT NULL COMMENT '订单ID',
  `return_sn` varchar(100) NOT NULL COMMENT '退货编号',
  `order_sn` varchar(100) NOT NULL COMMENT '订单编号',
  `seller_id` int(10) unsigned NOT NULL COMMENT '卖家ID',
  `store_id` int(10) unsigned NOT NULL COMMENT '店铺ID',
  `store_name` varchar(20) NOT NULL COMMENT '店铺名称',
  `buyer_id` int(10) unsigned NOT NULL COMMENT '买家ID',
  `buyer_name` varchar(50) NOT NULL COMMENT '买家会员名',
  `return_goodsnum` int(10) unsigned NOT NULL COMMENT '退货数量',
  `add_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `return_message` varchar(300) DEFAULT NULL COMMENT '退货备注',
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退货表';

DROP TABLE IF EXISTS `shopnc_return_goods`;
CREATE TABLE `shopnc_return_goods` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '退货商品记录ID',
  `return_id` int(10) unsigned NOT NULL COMMENT '退货记录ID',
  `order_id` int(10) unsigned NOT NULL COMMENT '订单ID',
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `spec_id` int(10) unsigned NOT NULL COMMENT '规格ID',
  `spec_info` varchar(50) DEFAULT NULL COMMENT '规格描述',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `goods_num` int(10) unsigned NOT NULL COMMENT '商品数量',
  `goods_returnnum` int(10) unsigned NOT NULL COMMENT '退货数量',
  `goods_image` varchar(100) DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='退货商品表';

DROP TABLE IF EXISTS `shopnc_salenum`;
CREATE TABLE `shopnc_salenum` (
  `date` int(8) unsigned NOT NULL COMMENT '销售日期',
  `salenum` int(11) unsigned NOT NULL COMMENT '销量',
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品ID',
  `store_id` int(11) unsigned NOT NULL COMMENT '店铺ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='销量统计表';

DROP TABLE IF EXISTS `shopnc_seo`;
CREATE TABLE `shopnc_seo` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `keywords` varchar(255) NOT NULL COMMENT '关键词',
  `description` text NOT NULL COMMENT '描述',
  `type` varchar(20) NOT NULL COMMENT '类型',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='SEO信息存放表';

DROP TABLE IF EXISTS `shopnc_setting`;
CREATE TABLE `shopnc_setting` (
  `name` varchar(50) NOT NULL COMMENT '名称',
  `value` text COMMENT '值',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统设置表';

DROP TABLE IF EXISTS `shopnc_sns_binding`;
CREATE TABLE `shopnc_sns_binding` (
  `snsbind_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `snsbind_memberid` int(11) NOT NULL COMMENT '会员编号',
  `snsbind_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `snsbind_appsign` varchar(50) NOT NULL COMMENT '应用标志',
  `snsbind_updatetime` int(11) NOT NULL COMMENT '绑定更新时间',
  `snsbind_openid` varchar(100) NOT NULL COMMENT '应用用户编号',
  `snsbind_openinfo` text COMMENT '应用用户信息',
  `snsbind_accesstoken` varchar(100) NOT NULL COMMENT '访问第三方资源的凭证',
  `snsbind_expiresin` int(11) NOT NULL COMMENT 'accesstoken过期时间，以返回的时间的准，单位为秒，注意过期时提醒用户重新授权',
  `snsbind_refreshtoken` varchar(100) DEFAULT NULL COMMENT '刷新token',
  PRIMARY KEY (`snsbind_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分享应用用户绑定记录表';

DROP TABLE IF EXISTS `shopnc_sns_comment`;
CREATE TABLE `shopnc_sns_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `comment_memberid` int(11) NOT NULL COMMENT '会员ID',
  `comment_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `comment_memberavatar` varchar(100) DEFAULT NULL COMMENT '会员头像',
  `comment_originalid` int(11) NOT NULL COMMENT '原帖ID',
  `comment_originaltype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '原帖类型 0表示动态信息 1表示分享商品 默认为0',
  `comment_content` varchar(500) NOT NULL COMMENT '评论内容',
  `comment_addtime` int(11) NOT NULL COMMENT '添加时间',
  `comment_ip` varchar(50) NOT NULL COMMENT '来源IP',
  `comment_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0正常 1屏蔽',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

DROP TABLE IF EXISTS `shopnc_sns_friend`;
CREATE TABLE `shopnc_sns_friend` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id值',
  `friend_frommid` int(11) NOT NULL COMMENT '会员id',
  `friend_frommname` varchar(100) DEFAULT NULL COMMENT '会员名称',
  `friend_frommavatar` varchar(100) DEFAULT NULL COMMENT '会员头像',
  `friend_tomid` int(11) NOT NULL COMMENT '朋友id',
  `friend_tomname` varchar(100) NOT NULL COMMENT '好友会员名称',
  `friend_tomavatar` varchar(100) DEFAULT NULL COMMENT '朋友头像',
  `friend_addtime` int(11) NOT NULL COMMENT '添加时间',
  `friend_followstate` tinyint(1) NOT NULL DEFAULT '1' COMMENT '关注状态 1为单方关注 2为双方关注',
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='好友数据表';

DROP TABLE IF EXISTS `shopnc_sns_goods`;
CREATE TABLE `shopnc_sns_goods` (
  `snsgoods_goodsid` int(11) NOT NULL COMMENT '商品ID',
  `snsgoods_goodsname` varchar(100) NOT NULL COMMENT '商品名称',
  `snsgoods_goodsimage` varchar(100) DEFAULT NULL COMMENT '商品图片',
  `snsgoods_goodsprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `snsgoods_storeid` int(11) NOT NULL COMMENT '店铺ID',
  `snsgoods_storename` varchar(100) NOT NULL COMMENT '店铺名称',
  `snsgoods_addtime` int(11) NOT NULL COMMENT '添加时间',
  `snsgoods_likenum` int(11) NOT NULL DEFAULT '0' COMMENT '喜欢数',
  `snsgoods_likemember` text COMMENT '喜欢过的会员ID，用逗号分隔',
  `snsgoods_sharenum` int(11) NOT NULL DEFAULT '0' COMMENT '分享数',
  UNIQUE KEY `snsgoods_goodsid` (`snsgoods_goodsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SNS商品表';

DROP TABLE IF EXISTS `shopnc_sns_sharegoods`;
CREATE TABLE `shopnc_sns_sharegoods` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `share_goodsid` int(11) NOT NULL COMMENT '商品ID',
  `share_memberid` int(11) NOT NULL COMMENT '所属会员ID',
  `share_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `share_content` varchar(500) DEFAULT NULL COMMENT '描述内容',
  `share_addtime` int(11) NOT NULL COMMENT '分享操作时间',
  `share_likeaddtime` int(11) NOT NULL DEFAULT '0' COMMENT '喜欢操作时间',
  `share_privacy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',
  `share_commentcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `share_isshare` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否分享 0为未分享 1为分享',
  `share_islike` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否喜欢 0为未喜欢 1为喜欢',
  PRIMARY KEY (`share_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享商品表';

DROP TABLE IF EXISTS `shopnc_sns_sharestore`;
CREATE TABLE `shopnc_sns_sharestore` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `share_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `share_storename` varchar(100) NOT NULL COMMENT '店铺名称',
  `share_memberid` int(11) NOT NULL COMMENT '所属会员ID',
  `share_membername` varchar(100) NOT NULL COMMENT '所属会员名称',
  `share_content` varchar(500) DEFAULT NULL COMMENT '描述内容',
  `share_addtime` int(11) NOT NULL COMMENT '添加时间',
  `share_privacy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',
  PRIMARY KEY (`share_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='共享店铺表';

DROP TABLE IF EXISTS `shopnc_sns_tracelog`;
CREATE TABLE `shopnc_sns_tracelog` (
  `trace_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `trace_originalid` int(11) NOT NULL DEFAULT '0' COMMENT '原动态ID 默认为0',
  `trace_originalmemberid` int(11) NOT NULL DEFAULT '0' COMMENT '原帖会员编号',
  `trace_originalstate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '原帖的删除状态 0为正常 1为删除',
  `trace_memberid` int(11) NOT NULL COMMENT '会员ID',
  `trace_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `trace_memberavatar` varchar(100) DEFAULT NULL COMMENT '会员头像',
  `trace_title` varchar(500) DEFAULT NULL COMMENT '动态标题',
  `trace_content` text NOT NULL COMMENT '动态内容',
  `trace_addtime` int(11) NOT NULL COMMENT '添加时间',
  `trace_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态  0正常 1为禁止显示 默认为0',
  `trace_privacy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '隐私可见度 0所有人可见 1好友可见 2仅自己可见',
  `trace_commentcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `trace_copycount` int(11) NOT NULL DEFAULT '0' COMMENT '转发数',
  `trace_orgcommentcount` int(11) NOT NULL DEFAULT '0' COMMENT '原帖评论次数',
  `trace_orgcopycount` int(11) NOT NULL DEFAULT '0' COMMENT '原帖转帖次数',
  PRIMARY KEY (`trace_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='动态信息表';

DROP TABLE IF EXISTS `shopnc_sns_visitor`;
CREATE TABLE `shopnc_sns_visitor` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `v_mid` int(11) NOT NULL COMMENT '访客会员ID',
  `v_mname` varchar(100) NOT NULL COMMENT '访客会员名称',
  `v_mavatar` varchar(100) DEFAULT NULL COMMENT '访客会员头像',
  `v_ownermid` int(11) NOT NULL COMMENT '主人会员ID',
  `v_ownermname` varchar(100) NOT NULL COMMENT '主人会员名称',
  `v_ownermavatar` varchar(100) DEFAULT NULL COMMENT '主人会员头像',
  `v_addtime` int(11) NOT NULL COMMENT '访问时间',
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='sns访客表';

DROP TABLE IF EXISTS `shopnc_spec`;
CREATE TABLE `shopnc_spec` (
  `sp_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '规格id',
  `sp_name` varchar(100) NOT NULL COMMENT '规格名称',
  `sp_format` enum('text','image') NOT NULL COMMENT '显示类型',
  `sp_value` text NOT NULL COMMENT '规格值列',
  `sp_sort` tinyint(1) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品规格表';

DROP TABLE IF EXISTS `shopnc_spec_value`;
CREATE TABLE `shopnc_spec_value` (
  `sp_value_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '规格值id',
  `sp_value_name` varchar(100) NOT NULL COMMENT '规格值名称',
  `sp_id` int(10) unsigned NOT NULL COMMENT '所属规格id',
  `sp_value_image` varchar(100) DEFAULT NULL COMMENT '规格图片',
  `sp_value_sort` tinyint(1) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`sp_value_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='商品规格值表';

DROP TABLE IF EXISTS `shopnc_store`;
CREATE TABLE `shopnc_store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店铺索引id',
  `store_name` varchar(50) NOT NULL COMMENT '店铺名称',
  `store_auth` tinyint(1) DEFAULT '0' COMMENT '店铺认证',
  `name_auth` tinyint(1) DEFAULT '0' COMMENT '店主认证',
  `grade_id` int(11) NOT NULL COMMENT '店铺等级',
  `member_id` int(11) NOT NULL COMMENT '会员id',
  `member_name` varchar(50) NOT NULL COMMENT '会员名称',
  `store_owner_card` varchar(50) NOT NULL COMMENT '身份证',
  `sc_id` int(11) NOT NULL COMMENT '店铺分类',
  `area_id` int(11) NOT NULL COMMENT '地区id',
  `area_info` varchar(100) NOT NULL COMMENT '地区内容，冗余数据',
  `store_address` varchar(100) NOT NULL COMMENT '详细地区',
  `store_zip` varchar(10) NOT NULL COMMENT '邮政编码',
  `store_tel` varchar(50) NOT NULL COMMENT '电话号码',
  `store_image` varchar(100) DEFAULT NULL COMMENT '证件上传',
  `store_image1` varchar(100) DEFAULT NULL COMMENT '执照上传',
  `store_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '店铺状态',
  `store_close_info` varchar(255) DEFAULT NULL COMMENT '店铺关闭原因',
  `store_sort` int(11) NOT NULL DEFAULT '0' COMMENT '店铺排序',
  `store_time` varchar(10) NOT NULL COMMENT '店铺时间',
  `store_end_time` varchar(10) DEFAULT NULL COMMENT '店铺关闭时间',
  `store_label` varchar(255) DEFAULT NULL COMMENT '店铺logo',
  `store_banner` varchar(255) DEFAULT NULL COMMENT '店铺横幅',
  `store_logo` varchar(255) DEFAULT NULL COMMENT '店标',
  `store_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '店铺seo关键字',
  `store_description` varchar(255) NOT NULL DEFAULT '' COMMENT '店铺seo描述',
  `store_qq` varchar(50) DEFAULT NULL COMMENT 'QQ',
  `store_ww` varchar(50) DEFAULT NULL COMMENT '阿里旺旺',
  `store_msn` varchar(50) DEFAULT NULL COMMENT 'MSN',
  `description` text COMMENT '店铺简介',
  `store_zy` text COMMENT '主营商品',
  `store_domain` varchar(50) DEFAULT NULL COMMENT '店铺二级域名',
  `store_domain_times` tinyint(1) unsigned DEFAULT '0' COMMENT '二级域名修改次数',
  `store_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐，0为否，1为是，默认为0',
  `store_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '店铺审核，0为未通过，1为通过，默认为0',
  `store_theme` varchar(50) NOT NULL DEFAULT 'default' COMMENT '店铺当前主题',
  `store_credit` int(10) NOT NULL DEFAULT '0' COMMENT '店铺信用',
  `praise_rate` float NOT NULL DEFAULT '0' COMMENT '店铺好评率',
  `store_desccredit` float NOT NULL DEFAULT '0' COMMENT '描述相符度分数',
  `store_servicecredit` float NOT NULL DEFAULT '0' COMMENT '服务态度分数',
  `store_deliverycredit` float NOT NULL DEFAULT '0' COMMENT '发货速度分数',
  `store_code` varchar(255) NOT NULL DEFAULT 'default_qrcode.png' COMMENT '店铺二维码',
  `store_collect` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺收藏数量',
  `store_slide` text COMMENT '店铺幻灯片',
  `store_slide_url` text COMMENT '店铺幻灯片链接',
  `store_center_quicklink` text COMMENT '卖家中心的常用操作快捷链接',
  `store_stamp` varchar(200) DEFAULT NULL COMMENT '店铺印章',
  `store_printdesc` varchar(500) DEFAULT NULL COMMENT '打印订单页面下方说明文字',
  PRIMARY KEY (`store_id`),
  KEY `store_name` (`store_name`),
  KEY `sc_id` (`sc_id`),
  KEY `area_id` (`area_id`),
  KEY `store_state` (`store_state`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='店铺数据表';

DROP TABLE IF EXISTS `shopnc_store_class`;
CREATE TABLE `shopnc_store_class` (
  `sc_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `sc_name` varchar(100) NOT NULL COMMENT '分类名称',
  `sc_parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `sc_sort` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`sc_id`),
  KEY `sc_parent_id` (`sc_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COMMENT='店铺分类表';

DROP TABLE IF EXISTS `shopnc_store_class_goods`;
CREATE TABLE `shopnc_store_class_goods` (
  `stc_id` int(11) NOT NULL COMMENT '店铺商品分类id',
  `goods_id` int(11) NOT NULL COMMENT '商品id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品店铺分类存储表';

DROP TABLE IF EXISTS `shopnc_store_extend`;
CREATE TABLE `shopnc_store_extend` (
  `store_id` mediumint(8) unsigned NOT NULL COMMENT '店铺ID',
  `express` text COMMENT '快递公司ID的组合',
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺信息扩展表';

DROP TABLE IF EXISTS `shopnc_store_goods_class`;
CREATE TABLE `shopnc_store_goods_class` (
  `stc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `stc_name` varchar(50) NOT NULL COMMENT '店铺商品分类名称',
  `stc_parent_id` int(11) NOT NULL COMMENT '父级id',
  `stc_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '店铺商品分类状态',
  `store_id` int(11) NOT NULL DEFAULT '0' COMMENT '店铺id',
  `stc_sort` int(11) NOT NULL DEFAULT '0' COMMENT '商品分类排序',
  PRIMARY KEY (`stc_id`),
  KEY `stc_parent_id` (`stc_parent_id`,`stc_sort`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='店铺商品分类表';

DROP TABLE IF EXISTS `shopnc_store_grade`;
CREATE TABLE `shopnc_store_grade` (
  `sg_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `sg_name` varchar(100) DEFAULT NULL COMMENT '等级名称',
  `sg_goods_limit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '允许发布的商品数量',
  `sg_space_limit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传空间大小，单位MB',
  `sg_template_number` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '选择店铺模板套数',
  `sg_template` varchar(255) DEFAULT NULL COMMENT '模板内容',
  `sg_price` varchar(100) DEFAULT NULL COMMENT '费用',
  `sg_confirm` tinyint(1) NOT NULL DEFAULT '1' COMMENT '审核，0为否，1为是，默认为1',
  `sg_description` text COMMENT '申请说明',
  `sg_function` varchar(255) DEFAULT NULL COMMENT '附加功能',
  `sg_sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '级别，数目越大级别越高',
  PRIMARY KEY (`sg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='店铺等级表';

DROP TABLE IF EXISTS `shopnc_store_gradelog`;
CREATE TABLE `shopnc_store_gradelog` (
  `gl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '等级日志自增编号',
  `gl_shopid` int(11) NOT NULL COMMENT '店铺编号',
  `gl_shopname` varchar(50) NOT NULL COMMENT '店铺名称',
  `gl_memberid` int(11) NOT NULL COMMENT '会员编号',
  `gl_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `gl_sgid` int(11) NOT NULL COMMENT '等级编号',
  `gl_sgname` varchar(100) NOT NULL COMMENT '等级名称',
  `gl_sgconfirm` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否需要审核 0不需要 1需要',
  `gl_sgsort` tinyint(3) NOT NULL COMMENT '级别',
  `gl_addtime` int(11) NOT NULL COMMENT '添加时间',
  `gl_allowstate` tinyint(1) NOT NULL COMMENT '审核状态 0为审核 1审核通过 2 审核未通过',
  `gl_allowadminid` int(11) NOT NULL DEFAULT '0' COMMENT '管理员编号 默认为0 ',
  `gl_allowadminname` varchar(100) NOT NULL DEFAULT 'system' COMMENT '管理员名称 默认为system 表示系统自动审核',
  `gl_allowremark` varchar(500) NOT NULL COMMENT '审核备注',
  PRIMARY KEY (`gl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺升级申请记录表';

DROP TABLE IF EXISTS `shopnc_store_navigation`;
CREATE TABLE `shopnc_store_navigation` (
  `sn_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航ID',
  `sn_title` varchar(50) NOT NULL COMMENT '导航名称',
  `sn_store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '卖家店铺ID',
  `sn_content` text COMMENT '导航内容',
  `sn_sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '导航排序',
  `sn_if_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '导航是否显示',
  `sn_add_time` int(10) NOT NULL COMMENT '导航',
  `sn_url` varchar(255) DEFAULT NULL COMMENT '店铺导航的外链URL',
  `sn_new_open` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '店铺导航外链是否在新窗口打开：0不开新窗口1开新窗口，默认是0',
  PRIMARY KEY (`sn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='卖家店铺导航信息表';

DROP TABLE IF EXISTS `shopnc_store_partner`;
CREATE TABLE `shopnc_store_partner` (
  `sp_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '店铺合作伙伴ID',
  `sp_store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID',
  `sp_title` varchar(100) NOT NULL COMMENT '店铺合作伙伴标题',
  `sp_link` varchar(255) NOT NULL COMMENT '店铺合作伙伴链接',
  `sp_logo` varchar(255) DEFAULT NULL COMMENT '店铺合作伙伴LOGO',
  `sp_sort` tinyint(1) unsigned NOT NULL DEFAULT '255' COMMENT '店铺合作伙伴排序',
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='卖家店铺合作伙伴表';

DROP TABLE IF EXISTS `shopnc_store_watermark`;
CREATE TABLE `shopnc_store_watermark` (
  `wm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '水印id',
  `jpeg_quality` int(3) NOT NULL DEFAULT '90' COMMENT 'jpeg图片质量',
  `wm_image_name` varchar(255) DEFAULT NULL COMMENT '水印图片的路径以及文件名',
  `wm_image_pos` tinyint(1) NOT NULL DEFAULT '1' COMMENT '水印图片放置的位置',
  `wm_image_transition` int(3) NOT NULL DEFAULT '20' COMMENT '水印图片与原图片的融合度 ',
  `wm_text` text COMMENT '水印文字',
  `wm_text_size` int(3) NOT NULL DEFAULT '20' COMMENT '水印文字大小',
  `wm_text_angle` tinyint(1) NOT NULL DEFAULT '4' COMMENT '水印文字角度',
  `wm_text_pos` tinyint(1) NOT NULL DEFAULT '3' COMMENT '水印文字放置位置',
  `wm_text_font` varchar(50) DEFAULT NULL COMMENT '水印文字的字体',
  `wm_text_color` varchar(7) NOT NULL DEFAULT '#CCCCCC' COMMENT '水印字体的颜色值',
  `wm_is_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '水印是否开启 0关闭 1开启',
  `store_id` int(11) DEFAULT NULL COMMENT '店铺id',
  PRIMARY KEY (`wm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店铺水印图片表';

DROP TABLE IF EXISTS `shopnc_transport`;
CREATE TABLE `shopnc_transport` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '运费模板ID',
  `title` varchar(120) DEFAULT NULL COMMENT '运费模板名称',
  `send_tpl_id` mediumint(8) unsigned DEFAULT NULL COMMENT '发货地区模板ID',
  `member_id` mediumint(8) unsigned DEFAULT NULL COMMENT '会员ID',
  `update_time` int(10) unsigned DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='运费模板';

DROP TABLE IF EXISTS `shopnc_transport_extend`;
CREATE TABLE `shopnc_transport_extend` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '运费模板扩展ID',
  `type` char(2) DEFAULT NULL COMMENT '平邮py 快递kd EMS es',
  `area_id` text COMMENT '市级地区ID组成的串，以，隔开，两端也有，',
  `top_area_id` text COMMENT '省级地区ID组成的串，以，隔开，两端也有，',
  `area_name` text COMMENT '地区name组成的串，以，隔开',
  `snum` mediumint(8) unsigned DEFAULT '1' COMMENT '首件数量',
  `sprice` decimal(10,2) DEFAULT '0.00' COMMENT '首件运费',
  `xnum` mediumint(8) unsigned DEFAULT '1' COMMENT '续件数量',
  `xprice` decimal(10,2) DEFAULT '0.00' COMMENT '续件运费',
  `is_default` enum('1','2') DEFAULT '2' COMMENT '是否默认运费1是2否',
  `transport_id` mediumint(8) unsigned NOT NULL COMMENT '运费模板ID',
  `transport_title` varchar(120) DEFAULT NULL COMMENT '运费模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='运费模板扩展表';

DROP TABLE IF EXISTS `shopnc_type`;
CREATE TABLE `shopnc_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `type_name` varchar(100) NOT NULL COMMENT '类型名称',
  `type_sort` tinyint(1) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='商品类型表';

DROP TABLE IF EXISTS `shopnc_type_brand`;
CREATE TABLE `shopnc_type_brand` (
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `brand_id` int(10) unsigned NOT NULL COMMENT '品牌id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品类型与品牌对应表';

DROP TABLE IF EXISTS `shopnc_type_spec`;
CREATE TABLE `shopnc_type_spec` (
  `type_id` int(10) unsigned NOT NULL COMMENT '类型id',
  `sp_id` int(10) unsigned NOT NULL COMMENT '规格id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品类型与规格对应表';

DROP TABLE IF EXISTS `shopnc_upload`;
CREATE TABLE `shopnc_upload` (
  `upload_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `file_name` varchar(100) DEFAULT NULL COMMENT '文件名',
  `file_thumb` varchar(100) DEFAULT NULL COMMENT '缩微图片',
  `file_wm` varchar(100) DEFAULT NULL COMMENT '水印图片',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID，0为管理员',
  `upload_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文件类别，0为无，1为文章图片，默认为0，2为商品切换图片，3为商品内容图片，4为系统文章图片，5为积分礼品切换图片，6为积分礼品内容图片',
  `upload_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '信息ID',
  PRIMARY KEY (`upload_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='上传文件表';

DROP TABLE IF EXISTS `shopnc_voucher`;
CREATE TABLE `shopnc_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '代金券编号',
  `voucher_code` varchar(32) NOT NULL COMMENT '代金券编码',
  `voucher_t_id` int(11) NOT NULL COMMENT '代金券模版编号',
  `voucher_title` varchar(50) NOT NULL COMMENT '代金券标题',
  `voucher_desc` varchar(255) NOT NULL COMMENT '代金券描述',
  `voucher_start_date` int(11) NOT NULL COMMENT '代金券有效期开始时间',
  `voucher_end_date` int(11) NOT NULL COMMENT '代金券有效期结束时间',
  `voucher_price` int(11) NOT NULL COMMENT '代金券面额',
  `voucher_limit` decimal(10,2) NOT NULL COMMENT '代金券使用时的订单限额',
  `voucher_store_id` int(11) NOT NULL COMMENT '代金券的店铺id',
  `voucher_state` tinyint(4) NOT NULL COMMENT '代金券状态(1-未用,2-已用,3-过期,4-收回)',
  `voucher_active_date` int(11) NOT NULL COMMENT '代金券发放日期',
  `voucher_type` tinyint(4) NOT NULL COMMENT '代金券类别',
  `voucher_owner_id` int(11) NOT NULL COMMENT '代金券所有者id',
  `voucher_owner_name` varchar(50) NOT NULL COMMENT '代金券所有者名称',
  `voucher_order_id` int(11) DEFAULT NULL COMMENT '使用该代金券的订单编号',
  PRIMARY KEY (`voucher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='代金券表';

DROP TABLE IF EXISTS `shopnc_voucher_apply`;
CREATE TABLE `shopnc_voucher_apply` (
  `apply_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '申请编号',
  `apply_memberid` int(11) NOT NULL COMMENT '会员编号',
  `apply_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `apply_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `apply_storename` varchar(100) NOT NULL COMMENT '店铺名称',
  `apply_quantity` int(11) NOT NULL COMMENT '申请数量',
  `apply_datetime` int(11) NOT NULL COMMENT '申请时间',
  `apply_state` tinyint(1) NOT NULL COMMENT '状态(1-新申请/2-审核通过/3-已取消)',
  PRIMARY KEY (`apply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='代金券套餐申请表';

DROP TABLE IF EXISTS `shopnc_voucher_price`;
CREATE TABLE `shopnc_voucher_price` (
  `voucher_price_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '代金券面值编号',
  `voucher_price_describe` varchar(255) NOT NULL COMMENT '代金券描述',
  `voucher_price` int(11) NOT NULL COMMENT '代金券面值',
  `voucher_defaultpoints` int(11) NOT NULL DEFAULT '0' COMMENT '代金劵默认的兑换所需积分可以为0',
  PRIMARY KEY (`voucher_price_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='代金券面额表';

DROP TABLE IF EXISTS `shopnc_voucher_quota`;
CREATE TABLE `shopnc_voucher_quota` (
  `quota_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '套餐编号',
  `quota_applyid` int(11) NOT NULL COMMENT '申请编号',
  `quota_memberid` int(11) NOT NULL COMMENT '会员编号',
  `quota_membername` varchar(100) NOT NULL COMMENT '会员名称',
  `quota_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `quota_storename` varchar(100) NOT NULL COMMENT '店铺名称',
  `quota_starttime` int(11) NOT NULL COMMENT '开始时间',
  `quota_endtime` int(11) NOT NULL COMMENT '结束时间',
  `quota_timeslimit` int(11) NOT NULL DEFAULT '0' COMMENT '活动次数限制',
  `quota_publishedtimes` int(11) NOT NULL DEFAULT '0' COMMENT '活动已使用次数',
  `quota_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态(1-可用/2-取消/3-结束)',
  PRIMARY KEY (`quota_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='代金券套餐表';

DROP TABLE IF EXISTS `shopnc_voucher_template`;
CREATE TABLE `shopnc_voucher_template` (
  `voucher_t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '代金券模版编号',
  `voucher_t_title` varchar(50) NOT NULL COMMENT '代金券模版名称',
  `voucher_t_desc` varchar(255) NOT NULL COMMENT '代金券模版描述',
  `voucher_t_start_date` int(11) NOT NULL COMMENT '代金券模版有效期开始时间',
  `voucher_t_end_date` int(11) NOT NULL COMMENT '代金券模版有效期结束时间',
  `voucher_t_price` int(11) NOT NULL COMMENT '代金券模版面额',
  `voucher_t_limit` decimal(10,2) NOT NULL COMMENT '代金券使用时的订单限额',
  `voucher_t_store_id` int(11) NOT NULL COMMENT '代金券模版的店铺id',
  `voucher_t_storename` varchar(100) DEFAULT NULL COMMENT '店铺名称',
  `voucher_t_creator_id` int(11) NOT NULL COMMENT '代金券模版的创建者id',
  `voucher_t_state` tinyint(4) NOT NULL COMMENT '代金券模版状态(1-有效,2-失效)',
  `voucher_t_total` int(11) NOT NULL COMMENT '模版可发放的代金券总数',
  `voucher_t_giveout` int(11) NOT NULL COMMENT '模版已发放的代金券数量',
  `voucher_t_used` int(11) NOT NULL COMMENT '模版已经使用过的代金券',
  `voucher_t_add_date` int(11) NOT NULL COMMENT '模版的创建时间',
  `voucher_t_quotaid` int(11) NOT NULL COMMENT '套餐编号',
  `voucher_t_points` int(11) NOT NULL DEFAULT '0' COMMENT '兑换所需积分',
  `voucher_t_eachlimit` int(11) NOT NULL DEFAULT '1' COMMENT '每人限领张数',
  `voucher_t_styleimg` varchar(200) DEFAULT NULL COMMENT '样式模版图片',
  `voucher_t_customimg` varchar(200) DEFAULT NULL COMMENT '自定义代金券模板图片',
  PRIMARY KEY (`voucher_t_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='代金券模版表';

DROP TABLE IF EXISTS `shopnc_web`;
CREATE TABLE `shopnc_web` (
  `web_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模块ID',
  `web_name` varchar(20) DEFAULT '' COMMENT '模块名称',
  `style_name` varchar(20) DEFAULT 'orange' COMMENT '风格名称',
  `web_page` varchar(10) DEFAULT 'index' COMMENT '所在页面(暂时只有index)',
  `update_time` int(10) unsigned NOT NULL COMMENT '更新时间',
  `web_sort` tinyint(1) unsigned DEFAULT '9' COMMENT '排序',
  `web_show` tinyint(1) unsigned DEFAULT '1' COMMENT '是否显示，0为否，1为是，默认为1',
  `web_html` text COMMENT '模块html代码',
  PRIMARY KEY (`web_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='页面模块表';

DROP TABLE IF EXISTS `shopnc_web_code`;
CREATE TABLE `shopnc_web_code` (
  `code_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '内容ID',
  `web_id` int(10) unsigned NOT NULL COMMENT '模块ID',
  `code_type` varchar(10) NOT NULL DEFAULT 'array' COMMENT '数据类型:array,html,json',
  `var_name` varchar(20) NOT NULL COMMENT '变量名称',
  `code_info` text COMMENT '内容数据',
  `show_name` varchar(20) DEFAULT '' COMMENT '页面名称',
  PRIMARY KEY (`code_id`),
  KEY `web_id` (`web_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COMMENT='模块内容表';

DROP TABLE IF EXISTS `shopnc_ztc_glodlog`;
CREATE TABLE `shopnc_ztc_glodlog` (
  `glog_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `glog_goodsid` int(11) NOT NULL COMMENT '商品编号',
  `glog_goodsname` varchar(100) NOT NULL COMMENT '商品名称',
  `glog_memberid` int(11) NOT NULL COMMENT '会员编号',
  `glog_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `glog_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `glog_storename` varchar(50) NOT NULL COMMENT '店铺名称',
  `glog_type` tinyint(4) NOT NULL COMMENT '金币日志类型 1增加 2减少',
  `glog_goldnum` int(11) NOT NULL DEFAULT '0' COMMENT '金币额',
  `glog_addtime` int(11) NOT NULL COMMENT '添加时间',
  `glog_desc` varchar(500) NOT NULL COMMENT '操作描述',
  PRIMARY KEY (`glog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='直通车金币日志表';

DROP TABLE IF EXISTS `shopnc_ztc_goods`;
CREATE TABLE `shopnc_ztc_goods` (
  `ztc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增编号',
  `ztc_goodsid` int(11) NOT NULL COMMENT '商品编号',
  `ztc_goodsname` varchar(100) NOT NULL COMMENT '商品名称',
  `ztc_goodsimage` varchar(100) NOT NULL COMMENT '商品图片',
  `ztc_memberid` int(11) NOT NULL COMMENT '会员编号',
  `ztc_membername` varchar(50) NOT NULL COMMENT '会员名称',
  `ztc_storeid` int(11) NOT NULL COMMENT '店铺编号',
  `ztc_storename` varchar(50) NOT NULL COMMENT '店铺名称',
  `ztc_gold` int(11) NOT NULL COMMENT '加入直通车分配的金币额',
  `ztc_remark` varchar(200) NOT NULL COMMENT '备注信息',
  `ztc_addtime` int(11) NOT NULL COMMENT '添加时间',
  `ztc_startdate` int(11) DEFAULT NULL COMMENT '直通车开始时间，没设置表明即刻开始',
  `ztc_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态 0未审核 1审核通过 2 审核未通过',
  `ztc_paystate` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付状态 0未支付 1已支付',
  `ztc_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '充值类型 0表示新申请记录 1表示充值记录，不经过审核直接给直通车加金币',
  PRIMARY KEY (`ztc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='直通车申请表';

