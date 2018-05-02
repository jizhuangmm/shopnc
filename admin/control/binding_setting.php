<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class binding_settingControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
		}

		public function indexOp( )
		{
				$api_arr = array( );
				$api_arr['qqzone'] = array( "name" => "QQ空间", "url" => "http://qzone.qq.com" );
				$api_arr['qqweibo'] = array( "name" => "腾讯微博", "url" => "http://t.qq.com" );
				$api_arr['sinaweibo'] = array( "name" => "新浪微博", "url" => "http://www.weibo.com" );
				$api_arr['renren'] = array( "name" => "人人网", "url" => "http://www.renren.com" );
				$model_setting = model( "setting" );
				$list_setting = $model_setting->getListSetting( );
				if ( $list_setting['qqzone_isuse'] )
				{
						$api_arr['qqzone']['isuse'] = "1";
				}
				if ( $list_setting['qqweibo_isuse'] )
				{
						$api_arr['qqweibo']['isuse'] = "1";
				}
				if ( $list_setting['sinaweibo_isuse'] )
				{
						$api_arr['sinaweibo']['isuse'] = "1";
				}
				if ( $list_setting['renren_isuse'] )
				{
						$api_arr['renren']['isuse'] = "1";
				}
				Tpl::output( "api_arr", $api_arr );
				Tpl::showpage( "binding_setting" );
		}

		public function sina_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
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

}

?>
