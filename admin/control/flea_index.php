<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class flea_indexControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "setting,flea_index_setting" );
				if ( $GLOBALS['setting_config']['flea_isuse'] != "1" )
				{
						showmessage( Language::get( "flea_isuse_off_tips" ), "index.php?act=dashboard&op=welcome" );
				}
		}

		public function flea_indexOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$update_array = array( );
						$update_array['flea_site_name'] = trim( $_POST['flea_site_name'] );
						$update_array['flea_site_title'] = trim( $_POST['flea_site_title'] );
						$update_array['flea_site_description'] = trim( $_POST['flea_site_description'] );
						$update_array['flea_site_keywords'] = trim( $_POST['flea_site_keywords'] );
						$update_array['flea_hot_search'] = str_replace( "，", ",", trim( $_POST['flea_hot_search'] ) );
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
				Tpl::showpage( "setting.flea_index" );
		}

}

?>
