<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
$arr = array(
		"top" => array(
				0 => array(
						"args" => "dashboard",
						"text" => $lang['nc_console']
				),
				1 => array(
						"args" => "setting",
						"text" => $lang['nc_config']
				),
				2 => array(
						"args" => "goods",
						"text" => $lang['nc_goods']
				),
				3 => array(
						"args" => "store",
						"text" => $lang['nc_store']
				),
				4 => array(
						"args" => "member",
						"text" => $lang['nc_member']
				),
				5 => array(
						"args" => "trade",
						"text" => $lang['nc_trade']
				),
				6 => array(
						"args" => "website",
						"text" => $lang['nc_website']
				),
				7 => array(
						"args" => "operation",
						"text" => $lang['nc_operation']
				),
				8 => array(
						"args" => "tool",
						"text" => $lang['nc_tool']
				)
		),
		"left" => array(
				0 => array(
						"nav" => "dashboard",
						"text" => $lang['nc_normal_handle'],
						"list" => array(
								array(
										"args" => "welcome,dashboard,dashboard",
										"text" => $lang['nc_welcome_page']
								),
								array(
										"args" => "aboutus,dashboard,dashboard",
										"text" => $lang['nc_aboutus']
								),
								array(
										"args" => "base_information,setting,dashboard",
										"text" => $lang['nc_web_set']
								),
								array(
										"args" => "member,member,dashboard",
										"text" => $lang['nc_member_manage']
								),
								array(
										"args" => "store,store,dashboard",
										"text" => $lang['nc_store_manage']
								),
								array(
										"args" => "goods,goods,dashboard",
										"text" => $lang['nc_goods_manage']
								),
								array(
										"args" => "order_manage,trade,dashboard",
										"text" => $lang['nc_order_manage']
								),
								array(
										"args" => "web_config,web_config,dashboard",
										"text" => $lang['nc_web_config_style']
								)
						)
				),
				1 => array(
						"nav" => "setting",
						"text" => $lang['nc_web_config'],
						"list" => array(
								array(
										"args" => "base_information,setting,setting",
										"text" => $lang['nc_web_set']
								),
								array(
										"args" => "image_setting,setting,setting",
										"text" => $lang['nc_upload_set']
								),
								array(
										"args" => "rewrite,setting,setting",
										"text" => $lang['nc_seo_set']
								),
								array(
										"args" => "email_setting,setting,setting",
										"text" => $lang['nc_email_set']
								),
								array(
										"args" => "gold_payment,gold_payment,setting",
										"text" => $lang['nc_pay_method']
								),
								array(
										"args" => "mailtemplates,mailtemplates,setting",
										"text" => $lang['nc_notice_template']
								),
								array(
										"args" => "admin,admin,setting",
										"text" => $lang['nc_admin_manage']
								),
								array(
										"args" => "index,express,setting",
										"text" => $lang['nc_admin_express_set']
								)
						)
				),
				2 => array(
						"nav" => "goods",
						"text" => $lang['nc_goods'],
						"list" => array(
								array(
										"args" => "goods_class,goods_class,goods",
										"text" => $lang['nc_class_manage']
								),
								array(
										"args" => "brand,brand,goods",
										"text" => $lang['nc_brand_manage']
								),
								array(
										"args" => "goods,goods,goods",
										"text" => $lang['nc_goods_manage']
								),
								array(
										"args" => "type,type,goods",
										"text" => $lang['nc_type_manage']
								),
								array(
										"args" => "spec,spec,goods",
										"text" => $lang['nc_spec_manage']
								),
								array(
										"args" => "recommend,recommend,goods",
										"text" => $lang['nc_recommend_type']
								)
						)
				),
				3 => array(
						"nav" => "store",
						"text" => $lang['nc_store'],
						"list" => array(
								array(
										"args" => "store,store,store",
										"text" => $lang['nc_store_manage']
								),
								array(
										"args" => "store_grade,store_grade,store",
										"text" => $lang['nc_store_grade']
								),
								array(
										"args" => "store_class,store_class,store",
										"text" => $lang['nc_store_class']
								),
								array(
										"args" => "subdomain_setting,setting,store",
										"text" => $lang['nc_domain_manage']
								)
						)
				),
				4 => array(
						"nav" => "member",
						"text" => $lang['nc_member'],
						"list" => array(
								array(
										"args" => "member,member,member",
										"text" => $lang['nc_member_manage']
								),
								array(
										"args" => "notice,notice,member",
										"text" => $lang['nc_member_notice']
								),
								array(
										"args" => "addpoints,points,member",
										"text" => $lang['nc_member_pointsmanage']
								),
								array(
										"args" => "pointslog,pointslog,member",
										"text" => $lang['nc_member_pointslog']
								),
								array(
										"args" => "predeposit,predeposit,member",
										"text" => $lang['nc_member_predepositmanage']
								),
								array(
										"args" => "predepositlog,predeposit,member",
										"text" => $lang['nc_member_predepositlog']
								)
						)
				),
				5 => array(
						"nav" => "trade",
						"text" => $lang['nc_trade'],
						"list" => array(
								array(
										"args" => "order_manage,trade,trade",
										"text" => $lang['nc_order_manage']
								),
								array(
										"args" => "consulting,consulting,trade",
										"text" => $lang['nc_consult_manage']
								),
								array(
										"args" => "inform_list,inform,trade",
										"text" => $lang['nc_inform_config']
								),
								array(
										"args" => "evalgoods_list,evaluate,trade",
										"text" => $lang['nc_goods_evaluate']
								),
								array(
										"args" => "complain_new_list,complain,trade",
										"text" => $lang['nc_complain_config']
								)
						)
				),
				6 => array(
						"nav" => "website",
						"text" => $lang['nc_website'],
						"list" => array(
								array(
										"args" => "website_setting,setting,website",
										"text" => $lang['nc_website_setting']
								),
								array(
										"args" => "article_class,article_class,website",
										"text" => $lang['nc_article_class']
								),
								array(
										"args" => "article,article,website",
										"text" => $lang['nc_article_manage']
								),
								array(
										"args" => "document,document,website",
										"text" => $lang['nc_document']
								),
								array(
										"args" => "link,link,website",
										"text" => $lang['nc_partner']
								),
								array(
										"args" => "navigation,navigation,website",
										"text" => $lang['nc_navigation']
								),
								array(
										"args" => "web_config,web_config,website",
										"text" => $lang['nc_web_config_style']
								),
								array(
										"args" => "sharesetting,sns_sharesetting,website",
										"text" => $lang['nc_binding_manage']
								),
								array(
										"args" => "tracelist,snstrace,website",
										"text" => $lang['nc_snstrace']
								)
						)
				),
				7 => array(
						"nav" => "operation",
						"text" => $lang['nc_operation'],
						"list" => array(
								array(
										"args" => "gold_setting,setting,operation",
										"text" => $lang['nc_operation_set']
								),
								array(
										"args" => "points_setting,setting,operation",
										"text" => $lang['nc_points_set']
								),
								array(
										"args" => "groupbuy_template_list,groupbuy,operation",
										"text" => $lang['nc_groupbuy_manage']
								),
								array(
										"args" => "gold_buy,gold_buy,operation",
										"text" => $lang['nc_gold_buy']
								),
								array(
										"args" => "ztc_setting,ztc_class,operation",
										"text" => $lang['nc_ztc_manage']
								),
								array(
										"args" => "adv,adv,operation",
										"text" => $lang['nc_adv_manage']
								),
								array(
										"args" => "activity,activity,operation",
										"text" => $lang['nc_activity_manage']
								),
								array(
										"args" => "xianshi_apply,promotion_xianshi,operation",
										"text" => $lang['nc_promotion_xianshi']
								),
								array(
										"args" => "mansong_apply,promotion_mansong,operation",
										"text" => $lang['nc_promotion_mansong']
								),
								array(
										"args" => "bundling_apply,promotion_bundling,operation",
										"text" => $lang['nc_promotion_bundling']
								),
								array(
										"args" => "coupon,coupon,operation",
										"text" => $lang['nc_coupon_manage'],
										"parent" => "coupon",
										"parenttext" => $lang['nc_coupon']
								),
								array(
										"args" => "coupon_class,coupon_class,operation",
										"text" => $lang['nc_coupon_class_manage'],
										"parent" => "coupon",
										"parenttext" => $lang['nc_coupon']
								),
								array(
										"args" => "pointshop_setting,setting,operation",
										"text" => $lang['nc_pointshop_setting'],
										"parent" => "pointshop",
										"parenttext" => $lang['nc_pointshop']
								),
								array(
										"args" => "pointprod,pointprod,operation",
										"text" => $lang['nc_pointprod'],
										"parent" => "pointshop",
										"parenttext" => $lang['nc_pointshop']
								),
								array(
										"args" => "voucher_apply,voucher,operation",
										"text" => $lang['nc_voucher_price_manage'],
										"parent" => "pointshop",
										"parenttext" => $lang['nc_pointshop']
								)
						)
				),
				9 => array(
						"nav" => "tool",
						"text" => $lang['nc_tool'],
						"list" => array(
								array(
										"args" => "clear,cache,tool",
										"text" => $lang['nc_admin_clear_cache']
								),
								array(
										"args" => "liststat,updatestat,tool",
										"text" => $lang['nc_updatestat']
								),
								array(
										"args" => "db,db,tool",
										"text" => $lang['nc_db']
								),
								array(
										"args" => "perform,setting,tool",
										"text" => $lang['nc_admin_perform_opt']
								),
								array(
										"args" => "search,setting,tool",
										"text" => $lang['nc_admin_search_set']
								)
						)
				)
		)
);
if ( c( "flea_isuse" ) == 1 )
{
		$arr['top'][] = array(
				"args" => "flea",
				"text" => $lang['nc_flea']
		);
		$arr['left'][] = array(
				"nav" => "flea",
				"text" => $lang['nc_flea'],
				"list" => array(
						0 => array(
								"args" => "flea_index,flea_index,flea",
								"text" => $lang['nc_flea_seo_manage']
						),
						1 => array(
								"args" => "flea_class,flea_class,flea",
								"text" => $lang['nc_flea_class_manage']
						),
						2 => array(
								"args" => "flea_class_index,flea_class_index,flea",
								"text" => $lang['nc_flea_index_class_manage']
						),
						3 => array(
								"args" => "flea,flea,flea",
								"text" => $lang['nc_flea_manage']
						),
						4 => array(
								"args" => "flea_region,flea_region,flea",
								"text" => $lang['nc_flea_area_manage']
						)
				)
		);
}
return $arr;
?>
