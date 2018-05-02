<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class sns_sharesettingControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "sns_sharesetting" );
				$model = model( "sns_binding" );
				$this->app_arr = $model->getApps( );
		}

		public function sharesettingOp( )
		{
				$model_setting = model( "setting" );
				$list_setting = $model_setting->getListSetting( );
				if ( $list_setting['share_qqzone_isuse'] )
				{
						$this->app_arr['qqzone']['isuse'] = "1";
				}
				if ( $list_setting['share_qqweibo_isuse'] )
				{
						$this->app_arr['qqweibo']['isuse'] = "1";
				}
				if ( $list_setting['share_sinaweibo_isuse'] )
				{
						$this->app_arr['sinaweibo']['isuse'] = "1";
				}
				if ( $list_setting['share_renren_isuse'] )
				{
						$this->app_arr['renren']['isuse'] = "1";
				}
				Tpl::output( "app_arr", $this->app_arr );
				Tpl::showpage( "snssharesetting.index" );
		}

		public function setOp( )
		{
				$key = trim( $_GET['key'] );
				if ( !$key )
				{
						showmessage( Language::get( "wrong_argument" ) );
				}
				$app_key = array_keys( $this->app_arr );
				if ( empty( $app_key ) || !in_array( $key, $app_key ) )
				{
						showmessage( Language::get( "wrong_argument" ) );
				}
				$setting_model = model( "setting" );
				$update_array = array( );
				$key = "share_".$key."_isuse";
				$state = intval( $_GET['state'] ) == 1 ? 1 : 0;
				$update_array[$key] = $state;
				$result = $setting_model->updateSetting( $update_array );
				if ( $result )
				{
						showmessage( Language::get( "nc_common_op_succ" ) );
				}
				else
				{
						showmessage( Language::get( "nc_common_op_fail" ) );
				}
		}

		public function editOp( )
		{
				$key = trim( $_GET['key'] );
				if ( !$key )
				{
						showmessage( Language::get( "wrong_argument" ) );
				}
				$app_key = array_keys( $this->app_arr );
				if ( empty( $app_key ) || !in_array( $key, $app_key ) )
				{
						showmessage( Language::get( "wrong_argument" ) );
				}
				$setting_model = model( "setting" );
				if ( chksubmit( ) )
				{
						$update_array = array( );
						$update_array["share_".$key."_isuse"] = intval( $_POST['isuse'] ) == 1 ? 1 : 0;
						$update_array["share_".$key."_appid"] = $_POST['appid'];
						$update_array["share_".$key."_appkey"] = $_POST['appkey'];
						if ( isset( $_POST['appcode'] ) )
						{
								$update_array["share_".$key."_appcode"] = $_POST['appcode'];
						}
						if ( isset( $_POST['secretkey'] ) )
						{
								$update_array["share_".$key."_secretkey"] = $_POST['secretkey'];
						}
						$result = $setting_model->updateSetting( $update_array );
						if ( $result )
						{
								showmessage( Language::get( "nc_common_save_succ" ), "index.php?act=sns_sharesetting&op=sharesetting" );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ) );
						}
				}
				else
				{
						$list_setting = $setting_model->getListSetting( );
						$edit_arr = array( );
						$edit_arr = $this->app_arr[$key];
						$edit_arr['key'] = $key;
						$edit_arr['isuse'] = $list_setting["share_".$key."_isuse"];
						$edit_arr['appid'] = $list_setting["share_".$key."_appid"];
						$edit_arr['appkey'] = $list_setting["share_".$key."_appkey"];
						if ( in_array( $key, array( "qqzone", "sinaweibo" ) ) )
						{
								$edit_arr['appcode'] = "{$list_setting["share_".$key."_appcode"]}";
						}
						if ( $key == "renren" )
						{
								$edit_arr['secretkey'] = "{$list_setting["share_".$key."_secretkey"]}";
						}
						Tpl::output( "edit_arr", $edit_arr );
						Tpl::showpage( "snssharesetting.edit" );
				}
		}

}

?>
