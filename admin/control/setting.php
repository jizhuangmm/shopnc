<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class settingControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "setting" );
		}

		public function points_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['points_reg'] = intval( $_POST['points_reg'] ) ? $_POST['points_reg'] : 0;
						$update_array['points_login'] = intval( $_POST['points_login'] ) ? $_POST['points_login'] : 0;
						$update_array['points_comments'] = intval( $_POST['points_comments'] ) ? $_POST['points_comments'] : 0;
						$update_array['points_orderrate'] = intval( $_POST['points_orderrate'] ) ? $_POST['points_orderrate'] : 0;
						$update_array['points_ordermax'] = intval( $_POST['points_ordermax'] ) ? $_POST['points_ordermax'] : 0;
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( Language::get( "points_update_success" ) );
						}
						else
						{
								showmessage( Language::get( "points_update_fail" ) );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.points_setting" );
		}

		public function sina_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						if ( trim( $_POST['sina_isuse'] ) == "1" )
						{
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['sina_wb_akey'],
												"require" => "true",
												"message" => Language::get( "sina_wb_akey_error" )
										),
										array(
												"input" => $_POST['sina_wb_skey'],
												"require" => "true",
												"message" => Language::get( "sina_wb_skey_error" )
										)
								);
						}
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$update_array = array( );
								$update_array['sina_isuse'] = trim( $_POST['sina_isuse'] );
								$update_array['sina_wb_akey'] = trim( $_POST['sina_wb_akey'] );
								$update_array['sina_wb_skey'] = trim( $_POST['sina_wb_skey'] );
								$update_array['sina_appcode'] = trim( $_POST['sina_appcode'] );
								$result = $model_setting->updateSetting( $update_array );
								if ( $result === TRUE )
								{
										showmessage( Language::get( "sina_update_success" ) );
								}
								else
								{
										showmessage( Language::get( "sina_update_fail" ) );
								}
						}
				}
				$is_exist = function_exists( "curl_init" );
				if ( $is_exist )
				{
						$list_setting = $model_setting->getListSetting( );
						Tpl::output( "list_setting", $list_setting );
				}
				Tpl::output( "is_exist", $is_exist );
				Tpl::showpage( "setting.sina_setting" );
		}

		public function qq_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						if ( trim( $_POST['qq_isuse'] ) == "1" )
						{
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['qq_appid'],
												"require" => "true",
												"message" => Language::get( "qq_appid_error" )
										),
										array(
												"input" => $_POST['qq_appkey'],
												"require" => "true",
												"message" => Language::get( "qq_appkey_error" )
										)
								);
						}
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$update_array = array( );
								$update_array['qq_isuse'] = trim( $_POST['qq_isuse'] );
								$update_array['qq_appcode'] = trim( $_POST['qq_appcode'] );
								$update_array['qq_appid'] = trim( $_POST['qq_appid'] );
								$update_array['qq_appkey'] = trim( $_POST['qq_appkey'] );
								$result = $model_setting->updateSetting( $update_array );
								if ( $result === TRUE )
								{
										showmessage( Language::get( "qq_update_success" ) );
								}
								else
								{
										showmessage( Language::get( "qq_update_fail" ) );
								}
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.qq_setting" );
		}

		public function gold_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['gold_isuse'],
										"require" => "true",
										"message" => $lang['gold_isuse_check']
								),
								array(
										"input" => $_POST['gold_rmbratio'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['gold_rmbratio_isnum']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$update_array = array( );
								$update_array['promotion_allow'] = trim( $_POST['promotion_allow'] );
								$update_array['points_isuse'] = trim( $_POST['points_isuse'] );
								$update_array['gold_isuse'] = trim( $_POST['gold_isuse'] );
								$update_array['gold_rmbratio'] = trim( $_POST['gold_rmbratio'] );
								$update_array['predeposit_isuse'] = trim( $_POST['predeposit_isuse'] );
								$update_array['groupbuy_allow'] = trim( $_POST['groupbuy_allow'] );
								$update_array['pointshop_isuse'] = trim( $_POST['pointshop_isuse'] );
								$result = $model_setting->updateSetting( $update_array );
								if ( $result === TRUE )
								{
										showmessage( $lang['nc_common_save_succ'] );
								}
								else
								{
										showmessage( $lang['nc_common_save_fail'] );
								}
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.gold_setting" );
		}

		public function ztc_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['ztc_isuse'],
										"require" => "true",
										"message" => $lang['ztc_isuse_check']
								),
								array(
										"input" => $_POST['ztc_dayprod'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['ztc_dayprod_isnum']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								Language::read( "ztc" );
								$ztc_model = model( "ztc" );
								$ztc_model->updateZtcGoods( Language::get( "admin_ztc_glist_glog_desc" ) );
								$update_array = array( );
								$update_array['ztc_isuse'] = trim( $_POST['ztc_isuse'] );
								$update_array['ztc_dayprod'] = trim( $_POST['ztc_dayprod'] );
								$result = $model_setting->updateSetting( $update_array );
								if ( $result === TRUE )
								{
										showmessage( $lang['nc_common_save_succ'] );
								}
								else
								{
										showmessage( $lang['nc_common_save_fail'] );
								}
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.ztc_setting" );
		}

		public function image_settingOp( )
		{
				if ( chksubmit( ) )
				{
						$lang = Language::getlangcontent( );
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['image_max_filesize'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['upload_image_filesize_is_number']
								),
								array(
										"input" => trim( $_POST['image_allow_ext'] ),
										"require" => "true",
										"message" => $lang['image_allow_ext_not_null']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$model_setting = model( "setting" );
								$result = $model_setting->updateSetting( array(
										"image_dir_type" => intval( $_POST['image_dir_type'] ),
										"image_max_filesize" => intval( $_POST['image_max_filesize'] ),
										"image_allow_ext" => trim( $_POST['image_allow_ext'] ),
										"thumb_tiny_width" => intval( $_POST['thumb_tiny_width'] ),
										"thumb_tiny_height" => intval( $_POST['thumb_tiny_height'] ),
										"thumb_small_width" => intval( $_POST['thumb_small_width'] ),
										"thumb_small_height" => intval( $_POST['thumb_small_height'] ),
										"thumb_mid_width" => intval( $_POST['thumb_mid_width'] ),
										"thumb_mid_height" => intval( $_POST['thumb_mid_height'] ),
										"thumb_max_width" => intval( $_POST['thumb_max_width'] ),
										"thumb_max_height" => intval( $_POST['thumb_max_height'] )
								) );
								if ( $result )
								{
										showmessage( $lang['nc_common_save_succ'] );
								}
								else
								{
										showmessage( $lang['nc_common_save_fail'] );
								}
						}
				}
				$model_setting = model( "setting" );
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.image_setting" );
		}

		public function searchOp( )
		{
				if ( chksubmit( ) )
				{
						$lang = Language::getlangcontent( );
						$model_setting = model( "setting" );
						$comma = "，";
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$comma = Language::getgbk( $comma );
						}
						$result = $model_setting->updateSetting( array(
								"hot_search" => str_replace( $comma, ",", $_POST['hot_search'] )
						) );
						if ( $result )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$model_setting = model( "setting" );
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.search" );
		}

		public function performOp( )
		{
				if ( $_GET['type'] == "clear" )
				{
						$lang = Language::getlangcontent( );
						$cache = Cache::getinstance( c( "cache.type" ) );
						$cache->clear( );
						showmessage( $lang['nc_common_op_succ'] );
				}
				Tpl::showpage( "setting.perform_opt" );
		}

		public function base_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_COMMON );
						if ( !empty( $_FILES['default_goods_image']['name'] ) )
						{
								$thumb_width = c( "thumb_tiny_width" ).",".c( "thumb_small_width" ).",".c( "thumb_mid_width" ).",".c( "thumb_max_width" );
								$thumb_height = c( "thumb_tiny_height" ).",".c( "thumb_small_height" ).",".c( "thumb_mid_height" ).",".c( "thumb_max_height" );
								$upload->set( "thumb_width", $thumb_width );
								$upload->set( "thumb_height", $thumb_height );
								$upload->set( "thumb_ext", "_tiny,_small,_mid,_max" );
								$result = $upload->upfile( "default_goods_image" );
								if ( $result )
								{
										$GLOBALS['_POST']['default_goods_image'] = $upload->file_name;
								}
								else
								{
										showmessage( $upload->error, "", "", "error" );
								}
						}
						if ( !empty( $_FILES['default_store_logo']['name'] ) )
						{
								$upload->set( "file_name", "" );
								$upload->set( "thumb_width", 0 );
								$upload->set( "thumb_height", 0 );
								$upload->set( "thumb_ext", FALSE );
								$result = $upload->upfile( "default_store_logo" );
								if ( $result )
								{
										$GLOBALS['_POST']['default_store_logo'] = $upload->file_name;
								}
								else
								{
										showmessage( $upload->error, "", "", "error" );
								}
						}
						if ( !empty( $_FILES['default_user_portrait']['name'] ) )
						{
								$thumb_width = "32";
								$thumb_height = "32";
								$upload->set( "thumb_width", $thumb_width );
								$upload->set( "thumb_height", $thumb_height );
								$upload->set( "thumb_ext", "_small" );
								$upload->set( "file_name", "" );
								$result = $upload->upfile( "default_user_portrait" );
								if ( $result )
								{
										$GLOBALS['_POST']['default_user_portrait'] = $upload->file_name;
								}
								else
								{
										showmessage( $upload->error, "", "", "error" );
								}
						}
						$update_array = array( );
						$update_array['time_format_simple'] = trim( $_POST['time_format_simple'] );
						$update_array['time_format_complete'] = trim( $_POST['time_format_complete'] );
						if ( !empty( $_POST['default_goods_image'] ) )
						{
								$update_array['default_goods_image'] = $_POST['default_goods_image'];
						}
						if ( !empty( $_POST['default_store_logo'] ) )
						{
								$update_array['default_store_logo'] = $_POST['default_store_logo'];
						}
						if ( !empty( $_POST['default_user_portrait'] ) )
						{
								$update_array['default_user_portrait'] = $_POST['default_user_portrait'];
						}
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								if ( !empty( $_POST['old_goods_image'] ) || !empty( $_POST['default_goods_image'] ) )
								{
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_goods_image'] );
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_goods_image']."_small.".@get_image_type( $_POST['old_goods_image'] ) );
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_goods_image']."_tiny.".@get_image_type( $_POST['old_goods_image'] ) );
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_goods_image']."_mid.".@get_image_type( $_POST['old_goods_image'] ) );
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_goods_image']."_max.".@get_image_type( $_POST['old_goods_image'] ) );
								}
								if ( !empty( $_POST['old_store_logo'] ) || !empty( $_POST['default_store_logo'] ) )
								{
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_store_logo'] );
								}
								if ( !empty( $_POST['old_user_portrait'] ) || !empty( $_POST['default_user_portrait'] ) )
								{
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_user_portrait'] );
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_user_portrait']."_small.".@get_image_type( $_POST['old_user_portrait'] ) );
								}
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				$list_setting['time_zone'] = $list_setting['time_zone'] ? $list_setting['time_zone'] : "8";
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.system_set" );
		}

		public function base_informationOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_COMMON );
						if ( !empty( $_FILES['site_logo']['name'] ) )
						{
								$result = $upload->upfile( "site_logo" );
								if ( $result )
								{
										$GLOBALS['_POST']['site_logo'] = $upload->file_name;
								}
								else
								{
										showmessage( $upload->error, "", "", "error" );
								}
						}
						$update_array = array( );
						$update_array['time_zone'] = trim( $_POST['time_zone'] );
						$update_array['site_name'] = trim( $_POST['site_name'] );
						$update_array['site_phone'] = trim( $_POST['site_phone'] );
						$update_array['site_email'] = trim( $_POST['site_email'] );
						$update_array['statistics_code'] = trim( $_POST['statistics_code'] );
						if ( !empty( $_POST['site_logo'] ) )
						{
								$update_array['site_logo'] = $_POST['site_logo'];
						}
						$update_array['icp_number'] = trim( $_POST['icp_number'] );
						$update_array['site_status'] = trim( $_POST['site_status'] );
						$update_array['closed_reason'] = trim( $_POST['closed_reason'] );
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								if ( !empty( $_POST['old_site_logo'] ) || !empty( $_POST['site_logo'] ) )
								{
										@unlink( BasePath.DS.ATTACH_COMMON.DS.$_POST['old_site_logo'] );
								}
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.base_information" );
		}

		public function login_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$input = array( );
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_PATH."/login" );
						$upload->set( "thumb_ext", "" );
						$upload->set( "file_name", "1.jpg" );
						$upload->set( "ifremove", FALSE );
						if ( !empty( $_FILES['login_pic1']['name'] ) )
						{
								$result = $upload->upfile( "login_pic1" );
								if ( !$result )
								{
										showmessage( $upload->error, "", "", "error" );
								}
								else
								{
										$input[] = $upload->file_name;
								}
						}
						else if ( $_POST['old_login_pic1'] != "" )
						{
								$input[] = $_POST['old_login_pic1'];
						}
						$upload->set( "default_dir", ATTACH_PATH."/login" );
						$upload->set( "thumb_ext", "" );
						$upload->set( "file_name", "2.jpg" );
						$upload->set( "ifremove", FALSE );
						if ( !empty( $_FILES['login_pic2']['name'] ) )
						{
								$result = $upload->upfile( "login_pic2" );
								if ( !$result )
								{
										showmessage( $upload->error, "", "", "error" );
								}
								else
								{
										$input[] = $upload->file_name;
								}
						}
						else if ( $_POST['old_login_pic2'] != "" )
						{
								$input[] = $_POST['old_login_pic2'];
						}
						$upload->set( "default_dir", ATTACH_PATH."/login" );
						$upload->set( "thumb_ext", "" );
						$upload->set( "file_name", "3.jpg" );
						$upload->set( "ifremove", FALSE );
						if ( !empty( $_FILES['login_pic3']['name'] ) )
						{
								$result = $upload->upfile( "login_pic3" );
								if ( !$result )
								{
										showmessage( $upload->error, "", "", "error" );
								}
								else
								{
										$input[] = $upload->file_name;
								}
						}
						else if ( $_POST['old_login_pic3'] != "" )
						{
								$input[] = $_POST['old_login_pic3'];
						}
						$upload->set( "default_dir", ATTACH_PATH."/login" );
						$upload->set( "thumb_ext", "" );
						$upload->set( "file_name", "4.jpg" );
						$upload->set( "ifremove", FALSE );
						if ( !empty( $_FILES['login_pic4']['name'] ) )
						{
								$result = $upload->upfile( "login_pic4" );
								if ( !$result )
								{
										showmessage( $upload->error, "", "", "error" );
								}
								else
								{
										$input[] = $upload->file_name;
								}
						}
						else if ( $_POST['old_login_pic4'] != "" )
						{
								$input[] = $_POST['old_login_pic4'];
						}
						$update_array = array( );
						if ( 0 < count( $input ) )
						{
								$update_array['login_pic'] = serialize( $input );
						}
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								if ( !empty( $_POST['login_pic'] ) || !empty( $_POST['login_pic'] ) )
								{
										@unlink( BasePath.DS.ATTACH_PATH.DS.$_POST['login_pic'] );
								}
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				if ( $list_setting['login_pic'] != "" )
				{
						$list = unserialize( $list_setting['login_pic'] );
				}
				Tpl::output( "list", $list );
				Tpl::showpage( "setting.login_information" );
		}

		public function rewriteOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['rewrite_enabled'] = $_POST['rewrite_enabled'];
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				$list = model( "seo" )->select( );
				$seo = array( );
				foreach ( ( array )$list as $value )
				{
						$seo[$value['type']] = $value;
				}
				Tpl::output( "list_setting", $list_setting );
				Tpl::output( "seo", $seo );
				$category = ( $g = h( "goods_class" ) ) ? $g : h( "goods_class", TRUE );
				Tpl::output( "category", $category );
				Tpl::showpage( "setting.seo_setting" );
		}

		public function ajax_categoryOp( )
		{
				$model = model( "goods_class" );
				$list = $model->field( "gc_title,gc_keywords,gc_description" )->find( intval( $_GET['id'] ) );
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$list = Language::getutf8( $list );
				}
				echo json_encode( $list );
				exit( );
		}

		public function seo_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_seo = model( "seo" );
				if ( chksubmit( ) )
				{
						$update = array( );
						if ( is_array( $_POST['SEO'][0] ) )
						{
								$seo = $_POST['SEO'][0];
						}
						else
						{
								$seo = $_POST['SEO'];
						}
						foreach ( ( array )$seo as $key => $value )
						{
								$model_seo->where( array(
										"type" => $key
								) )->update( $value );
						}
						showmessage( $lang['nc_common_save_succ'] );
				}
				else
				{
						showmessage( $lang['nc_common_save_fail'] );
				}
		}

		public function seo_categoryOp( )
		{
				$lang = Language::getlangcontent( );
				if ( chksubmit( ) )
				{
						$input = array( );
						$input['gc_id'] = intval( $_POST['category'] );
						$input['gc_title'] = $_POST['cate_title'];
						$input['gc_keywords'] = $_POST['cate_keywords'];
						$input['gc_description'] = $_POST['cate_description'];
						if ( model( "goods_class" )->goodsClassUpdate( $input ) )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
				}
				showmessage( $lang['nc_common_save_fail'] );
		}

		public function email_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['email_enabled'] = trim( $_POST['email_enabled'] );
						$update_array['email_type'] = trim( $_POST['email_type'] );
						$update_array['email_host'] = trim( $_POST['email_host'] );
						$update_array['email_port'] = trim( $_POST['email_port'] );
						$update_array['email_addr'] = trim( $_POST['email_addr'] );
						$update_array['email_id'] = trim( $_POST['email_id'] );
						$update_array['email_pass'] = trim( $_POST['email_pass'] );
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.email_setting" );
		}

		public function captcha_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['captcha_status_login'] = trim( $_POST['captcha_status_login'] );
						$update_array['captcha_status_register'] = trim( $_POST['captcha_status_register'] );
						$update_array['captcha_status_goodsqa'] = trim( $_POST['captcha_status_goodsqa'] );
						$update_array['captcha_status_backend'] = trim( $_POST['captcha_status_backend'] );
						$update_array['guest_comment'] = trim( $_POST['guest_comment'] );
						$update_array['flea_isuse'] = trim( $_POST['flea_allow'] );
						$update_array['store_allow'] = trim( $_POST['store_allow'] );
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.captcha_setting" );
		}

		public function creditgradeOp( )
		{
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						if ( !empty( $_POST['credit'] ) || is_array( $_POST['credit'] ) )
						{
								$update_array['creditrule'] = serialize( $_POST['credit'] );
						}
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( Language::get( "nc_common_save_succ" ) );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ) );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				if ( $list_setting['creditrule'] != "" )
				{
						$list_setting['creditrule_arr'] = unserialize( $list_setting['creditrule'] );
				}
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.creditgrade" );
		}

		public function subdomain_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['enabled_subdomain'] = intval( $_POST['enabled_subdomain'] );
						$update_array['subdomain_suffix'] = trim( $_POST['subdomain_suffix'] );
						$update_array['subdomain_reserved'] = trim( $_POST['subdomain_reserved'] );
						$update_array['subdomain_length'] = trim( $_POST['subdomain_length'] );
						$update_array['subdomain_edit'] = intval( $_POST['subdomain_edit'] );
						$update_array['subdomain_times'] = intval( $_POST['subdomain_times'] );
						$subdomain_length = explode( "-", $update_array['subdomain_length'] );
						$subdomain_length[0] = intval( $subdomain_length[0] );
						$subdomain_length[1] = intval( $subdomain_length[1] );
						if ( $subdomain_length[0] < 1 || $subdomain_length[1] <= $subdomain_length[0] )
						{
								$update_array['subdomain_length'] = "3-12";
						}
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.subdomain_setting" );
		}

		public function font_settingOp( )
		{
				$dir_list = array( );
				readfilelist( BasePath.DS."resource".DS."font", $dir_list );
				if ( !empty( $dir_list ) || is_array( $dir_list ) )
				{
						$fontInfo = array( );
						include( BasePath.DS."resource".DS."font".DS."font.info.php" );
						foreach ( $dir_list as $value )
						{
								if ( !( strtolower( end( explode( ".", $value ) ) ) == "ttf" ) && !file_exists( $value ) )
								{
										$value = array_pop( explode( "/", $value ) );
										$tmp = explode( ".", $value );
										$file_list[$value] = $fontInfo[$tmp[0]];
								}
						}
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$file_list = Language::getgbk( $file_list );
						}
						Tpl::output( "file_list", $file_list );
				}
				Tpl::showpage( "setting.font_setting" );
		}

		public function ucenter_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['ucenter_status'] = trim( $_POST['ucenter_status'] );
						$update_array['ucenter_type'] = trim( $_POST['ucenter_type'] );
						$update_array['ucenter_app_id'] = trim( $_POST['ucenter_app_id'] );
						$update_array['ucenter_app_key'] = trim( $_POST['ucenter_app_key'] );
						$update_array['ucenter_ip'] = trim( $_POST['ucenter_ip'] );
						$update_array['ucenter_url'] = trim( $_POST['ucenter_url'] );
						$update_array['ucenter_connect_type'] = trim( $_POST['ucenter_connect_type'] );
						$update_array['ucenter_mysql_server'] = trim( $_POST['ucenter_mysql_server'] );
						$update_array['ucenter_mysql_username'] = trim( $_POST['ucenter_mysql_username'] );
						$update_array['ucenter_mysql_passwd'] = trim( $_POST['ucenter_mysql_passwd'] );
						$update_array['ucenter_mysql_name'] = trim( $_POST['ucenter_mysql_name'] );
						$update_array['ucenter_mysql_pre'] = trim( $_POST['ucenter_mysql_pre'] );
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( Language::get( "nc_common_save_succ" ) );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ) );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.ucenter_setting" );
		}

		public function ftp_settingOp( )
		{
				if ( chksubmit( ) )
				{
						$lang = Language::getlangcontent( );
						$model_setting = model( "setting" );
						$input = array( );
						$input = array(
								"ftp_open" => intval( $_POST['ftp_open'] )
						);
						if ( $_POST['ftp_open'] )
						{
								$info = array(
										"ftp_ssl_state" => intval( $_POST['ftp_ssl_state'] ),
										"ftp_server" => $_POST['ftp_server'],
										"ftp_password" => $_POST['ftp_password'],
										"ftp_username" => $_POST['ftp_username'],
										"ftp_pasv" => $_POST['ftp_pasv'],
										"ftp_port" => $_POST['ftp_port'],
										"ftp_attach_dir" => $_POST['ftp_attach_dir'],
										"ftp_access_url" => $_POST['ftp_access_url'],
										"ftp_timeout" => $_POST['ftp_timeout']
								);
								$input = array_merge( $input, $info );
						}
						$result = $model_setting->updateSetting( $input );
						if ( $result )
						{
								showmessage( $lang['nc_common_save_succ'] );
						}
						else
						{
								showmessage( $lang['nc_common_save_fail'] );
						}
				}
				$model_setting = model( "setting" );
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.ftp_setting" );
		}

		public function ftp_testOp( )
		{
				$lang = Language::getlangcontent( );
				$message = "";
				$testcontent = md5( "ShopNC".MD5_KEY.time( ) );
				$testfile = "test/shopnc_test.txt";
				$attach_dir = BasePath."/upload";
				@mkdir( $attach_dir."/test", 511 );
				if ( $fp = @fopen( $attach_dir."/".$testfile, "w" ) )
				{
						fwrite( $fp, $testcontent );
						fclose( $fp );
				}
				import( "function.ftp" );
				if ( !$message )
				{
						$GLOBALS['GLOBALS']['setting_config']['ftp_open'] = 1;
						$GLOBALS['GLOBALS']['setting_config']['ftp_server'] = $_POST['ftp_server'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_ssl_state'] = $_POST['ftp_ssl_state'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_port'] = $_POST['ftp_port'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_username'] = $_POST['ftp_username'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_password'] = $_POST['ftp_password'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_pasv'] = $_POST['ftp_pasv'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_attach_dir'] = $_POST['ftp_attach_dir'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_access_url'] = $_POST['ftp_access_url'];
						$GLOBALS['GLOBALS']['setting_config']['ftp_timeout'] = $_POST['ftp_timeout'];
						ftpcmd( "upload", "upload/".$testfile );
						$ftp = ftpcmd( "object" );
						if ( ftpcmd( "error" ) )
						{
								$message = $lang["ftp_error_".ftpcmd( "error" )];
						}
						if ( !$message )
						{
								$str = getremotefile( c( "ftp_access_url" )."/upload/".$testfile );
								if ( $str !== $testcontent )
								{
										$message = $lang['ftp_error_geterr'];
								}
						}
						if ( !$message )
						{
								ftpcmd( "delete", $testfile );
								ftpcmd( "delete", "test/index.html" );
								$ftp->ftp_rmdir( "test" );
								$str = getremotefile( c( "ftp_attach_dir" )."/".$testfile );
								if ( $str === $testcontent )
								{
										$message = $lang['ftp_error_delerr'];
								}
								@unlink( $attach_dir."/".$testfile );
								@rmdir( $attach_dir."test" );
						}
				}
				if ( !$message )
				{
						$message = $lang['ftp_test_ok'];
				}
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$message = Language::getutf8( $message );
				}
				showmessage( $message, "", "json" );
		}

		public function member_clearOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				$result = $model_setting->memberClear( );
				if ( $result )
				{
						showmessage( $lang['user_info_del_ok'] );
				}
				else
				{
						showmessage( $lang['user_info_del_fail'] );
				}
		}

		public function email_testingOp( )
		{
				$lang = Language::getlangcontent( );
				$email_type = trim( $_POST['email_type'] );
				$email_host = trim( $_POST['email_host'] );
				$email_port = trim( $_POST['email_port'] );
				$email_addr = trim( $_POST['email_addr'] );
				$email_id = trim( $_POST['email_id'] );
				$email_pass = trim( $_POST['email_pass'] );
				$email_test = trim( $_POST['email_test'] );
				$subject = $lang['test_email'];
				$site_url = SiteUrl;
				$site_title = $GLOBALS['setting_config']['site_name'];
				$message = "<p>".$lang['this_is_to']."<a href='".$site_url."' target='_blank'>".$site_title."</a>".$lang['test_email_send_ok']."</p>";
				if ( $email_type == "1" )
				{
						require_once( BasePath.DS."framework".DS."libraries".DS."email.php" );
						$obj_email = new Email( );
						$obj_email->set( "email_server", $email_host );
						$obj_email->set( "email_port", $email_port );
						$obj_email->set( "email_user", $email_id );
						$obj_email->set( "email_password", $email_pass );
						$obj_email->set( "email_from", $email_addr );
						$obj_email->set( "site_name", $site_title );
						$result = $obj_email->send( $email_test, $subject, $message );
				}
				else
				{
						$result = @mail( $email_test, $subject, $message );
				}
				if ( $result === FALSE )
				{
						$message = $lang['test_email_send_fail'];
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$message = Language::getutf8( $message );
						}
						showmessage( $message, "", "json" );
				}
				else
				{
						$message = $lang['test_email_send_ok'];
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$message = Language::getutf8( $message );
						}
						showmessage( $message, "", "json" );
				}
		}

		public function website_settingOp( )
		{
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['share_isuse'] = trim( $_POST['share_isuse'] );
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( Language::get( "nc_common_save_succ" ) );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ) );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.website_setting" );
		}

		public function pointshop_settingOp( )
		{
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array['pointprod_isuse'] = trim( $_POST['pointprod_isuse'] );
						$update_array['voucher_allow'] = trim( $_POST['voucher_allow'] );
						$result = $model_setting->updateSetting( $update_array );
						if ( $result === TRUE )
						{
								showmessage( Language::get( "nc_common_save_succ" ) );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ) );
						}
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.pointshop_setting" );
		}

}

?>
