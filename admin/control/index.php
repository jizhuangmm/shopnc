<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class indexControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "index" );
		}

		public function indexOp( )
		{
				Tpl::output( "admin_info", $this->getAdminInfo( ) );
				$this->getNav( "", $top_nav, $left_nav, $map_nav );
				Tpl::output( "top_nav", $top_nav );
				Tpl::output( "left_nav", $left_nav );
				Tpl::output( "map_nav", $map_nav );
				if ( is_file( BasePath.DS.ProjectName.DS."include".DS."menu.php" ) )
				{
						require( BasePath.DS.ProjectName.DS."include".DS."menu.php" );
				}
				Tpl::showpage( "index", "index_layout" );
		}

		public function logoutOp( )
		{
				setnccookie( "sys_key", "", -1 );
				@header( "Location: index.php" );
				exit( );
		}

		public function modifypwOp( )
		{
				if ( chksubmit( ) )
				{
						if ( trim( $_POST['new_pw'] ) !== trim( $_POST['new_pw2'] ) )
						{
								showmessage( Language::get( "index_modifypw_repeat_error" ) );
						}
						$admininfo = $this->getAdminInfo( );
						$admin_model = model( "admin" );
						$admininfo = $admin_model->getOneAdmin( $admininfo['id'] );
						if ( !is_array( $admininfo ) && count( $admininfo ) <= 0 )
						{
								showmessage( Language::get( "index_modifypw_admin_error" ) );
						}
						if ( $admininfo['admin_password'] != md5( trim( $_POST['old_pw'] ) ) )
						{
								showmessage( Language::get( "index_modifypw_oldpw_error" ) );
						}
						$new_pw = md5( trim( $_POST['new_pw'] ) );
						$result = $admin_model->updateAdmin( array(
								"admin_password" => $new_pw,
								"admin_id" => $admininfo['admin_id']
						) );
						if ( $result )
						{
								showmessage( Language::get( "index_modifypw_success" ) );
						}
						else
						{
								showmessage( Language::get( "index_modifypw_fail" ) );
						}
				}
				else
				{
						Language::read( "admin" );
						Tpl::showpage( "admin.modifypw" );
				}
		}

		public function goods_commodity_scanningOp( )
		{
				if ( c( "cron_product" ) != 1 )
				{
						return FALSE;
				}
				$model_goods = model( "goods" );
				$model_goods->updateGoodsWhere( array(
						"goods_show" => 1
				), array(
						"gt_goods_starttime" => time( ),
						"lt_goods_endtime" => time( )
				) );
				$model_goods->updateGoodsWhere( array(
						"goods_starttime" => time( ),
						"goods_endtime" => array(
								"sign" => "calc",
								"value" => time( )."+`goods_indate`*86400"
						)
				), array(
						"gt_goods_endtime" => time( ),
						"goods_show" => 1
				) );
		}

		public function shops_shut_downOp( )
		{
				$model_store = model( "store" );
				$model_goods = model( "goods" );
				$store_list = $model_store->getStoreList( array(
						"lt_store_end_time" => time( ),
						"store_state" => "1",
						"field" => "store_id,member_id"
				) );
				if ( !empty( $store_list ) || is_array( $store_list ) )
				{
						foreach ( $store_list as $val )
						{
								$model_goods->updateGoodsStoreStateByStoreId( $val['store_id'], "close" );
								$model_store->shoreUpdate( array(
										"store_state" => "0",
										"store_id" => $val['store_id']
								) );
								$msg_code = "msg_toseller_store_expired_closed_notify";
								$param = array( );
								$this->send_notice( $val['member_id'], $msg_code, $param );
						}
				}
		}

}

?>
