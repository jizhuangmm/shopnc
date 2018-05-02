<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class promotion_bundlingControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "promotion_bundling" );
				if ( intval( $_GET['promotion_allow'] ) !== 1 && intval( c( "promotion_allow" ) ) !== 1 && intval( c( "gold_isuse" ) ) !== 1 )
				{
						$url = array(
								array(
										"url" => "index.php?act=promotion_bundling&promotion_allow=1",
										"msg" => Language::get( "accessopen" )
								),
								array(
										"url" => "index.php?act=dashboard&op=welcome",
										"msg" => Language::get( "accessclose" )
								)
						);
						showmessage( Language::get( "promotion_unavailable" ), $url, "html", "succ", 1, 6000 );
				}
		}

		public function indexOp( )
		{
				if ( intval( $_GET['promotion_allow'] ) === 1 )
				{
						$model_setting = model( "setting" );
						$update_array = array( );
						$update_array['promotion_allow'] = 1;
						$update_array['gold_isuse'] = 1;
						$model_setting->updateSetting( $update_array );
				}
				$this->bundling_quotaOp( );
		}

		public function bundling_quotaOp( )
		{
				$model = model( );
				$where = "";
				if ( $_GET['store_name'] != "" )
				{
						$where .= " and store_name like '%".$_GET['store_name']."%'";
						Tpl::output( "store_name", trim( $_GET['store_name'] ) );
				}
				if ( is_numeric( $_GET['state'] ) )
				{
						$where .= " and bl_state = ".intval( $_GET['state'] );
						Tpl::output( "state", trim( $_GET['state'] ) );
				}
				$where = substr( $where, 4 );
				$bundling_quota_list = $model->table( "p_bundling_quota" )->where( $where )->order( "bl_quota_id desc" )->page( "10" )->select( );
				$page = $model->showpage( 2 );
				Tpl::output( "show_page", $page );
				Tpl::output( "list", $bundling_quota_list );
				Tpl::showpage( "promotion_bundling_quota.list" );
		}

		public function bundling_quota_editOp( )
		{
				$model = model( "p_bundling_quota" );
				if ( chksubmit( ) )
				{
						$data = array( );
						$data['bl_quota_id'] = $_POST['quota_id'];
						$data['bl_quota_endtime'] = strtotime( $_POST['quota_endtime'] );
						$data['bl_quota_state'] = time( ) < strtotime( $_POST['quota_endtime'] ) ? $_POST['quota_state'] : 0;
						$return = $model->update( $data );
						if ( $return )
						{
								showmessage( Language::get( "bundling_update_succ" ), "index.php?act=promotion_bundling&op=bundling_quota" );
						}
						else
						{
								showmessage( Language::get( "bundling_update_fail" ) );
						}
				}
				$quota_id = intval( $_GET['quota_id'] );
				if ( $quota_id <= 0 )
				{
						showmessage( Language::get( "miss_argument" ) );
				}
				$bundling_quota_info = $model->find( $quota_id );
				Tpl::output( "quota_info", $bundling_quota_info );
				Tpl::showpage( "promotion_bundling_quota.edit" );
		}

		public function bundling_listOp( )
		{
				$model = model( );
				$where = "";
				if ( $_GET['bundling_name'] != "" )
				{
						$where .= " and bl_name like '%".trim( $_GET['bundling_name'] )."%'";
						Tpl::output( "bundling_name", trim( $_GET['bundling_name'] ) );
				}
				if ( $_GET['store_name'] != "" )
				{
						$where .= " and store_name like '%".$_GET['store_name']."%'";
						Tpl::output( "store_name", trim( $_GET['store_name'] ) );
				}
				if ( is_numeric( $_GET['state'] ) )
				{
						$where .= " and bl_state = ".intval( $_GET['state'] );
						Tpl::output( "state", trim( $_GET['state'] ) );
				}
				$where = substr( $where, 4 );
				$bundling_count = $model->table( "p_bundling" )->where( $where )->count( );
				$bundling_list = $model->table( "p_bundling,p_bundling_goods" )->field( "count(p_bundling_goods.bl_id) as count,p_bundling.*" )->join( "left" )->on( "p_bundling.bl_id=p_bundling_goods.bl_id" )->where( $where )->group( "p_bundling.bl_id" )->order( "p_bundling.bl_id desc" )->page( 10, $bundling_count )->select( );
				$page = $model->showpage( 2 );
				Tpl::output( "show_page", $page );
				Tpl::output( "list", $bundling_list );
				Tpl::showpage( "promotion_bundling.list" );
		}

		public function bundling_settingOp( )
		{
				$model_setting = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['promotion_bundling_price'],
										"require" => "true",
										"validator" => "Number",
										"message" => Language::get( "bundling_price_error" )
								),
								array(
										"input" => $_POST['promotion_bundling_sum'],
										"require" => "true",
										"validator" => "Number",
										"message" => Language::get( "bundling_sum_error" )
								),
								array(
										"input" => $_POST['promotion_bundling_goods_sum'],
										"require" => "true",
										"validator" => "Number",
										"message" => Language::get( "bundling_goods_sum_error" )
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						$data['promotion_bundling_price'] = intval( $_POST['promotion_bundling_price'] );
						$data['promotion_bundling_sum'] = intval( $_POST['promotion_bundling_sum'] );
						$data['promotion_bundling_goods_sum'] = intval( $_POST['promotion_bundling_goods_sum'] );
						$return = $model_setting->updateSetting( $data );
						if ( $return )
						{
								showmessage( Language::get( "bundling_update_succ" ) );
						}
						else
						{
								showmessage( Language::get( "bundling_update_fail" ) );
						}
				}
				$setting = $model_setting->GetListSetting( );
				Tpl::output( "setting", $setting );
				Tpl::showpage( "promotion_bundling.setting" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "bl_state" :
						$model = model( "p_bundling" );
						$data = array( );
						$data['bl_id'] = $_GET['id'];
						$data[$_GET['column']] = $_GET['value'];
						$model->update( $data );
						echo "true";
						exit( );
				case "bl_quota_state" :
						$model = model( "p_bundling_quota" );
						$list = $model->where( "bl_quota_id=".$_GET['id']." and bl_quota_starttime<".time( )." and bl_quota_endtime>".time( ) )->select( );
						if ( empty( $list ) )
						{
								echo "false";
								exit( );
						}
						$data = array( );
						$data['bl_quota_id'] = $_GET['id'];
						$data[$_GET['column']] = $_GET['value'];
						$model->update( $data );
						echo "true";
						exit( );
				}
		}

}

?>
