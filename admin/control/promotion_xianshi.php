<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class promotion_xianshiControl extends SystemControl
{

		const APPLY_STATE_NEW = 1;
		const APPLY_STATE_VERIFY = 2;
		const APPLY_STATE_CANCEL = 3;
		const APPLY_STATE_FAIL = 4;
		const QUOTA_STATE_ACTIVITY = 1;
		const QUOTA_STATE_CANCEL = 2;
		const QUOTA_STATE_EXPIRE = 3;
		const XIANSHI_STATE_UNPUBLISHED = 1;
		const XIANSHI_STATE_PUBLISHED = 2;
		const XIANSHI_STATE_CANCEL = 3;
		const XIANSHI_STATE_INVADITATION = 4;
		const XIANSHI_STATE_END = 5;
		const XIANSHI_GOODS_STATE_NORMAL = 1;
		const XIANSHI_GOODS_STATE_CANCEL = 2;
		const SECONDS_OF_30DAY = 2592000;
		const LINK_APPLY_LIST = "index.php?act=promotion_xianshi&op=xianshi_apply";
		const LINK_QUOTA_LIST = "index.php?act=promotion_xianshi&op=xianshi_quota";
		const LINK_XIANSHI_LIST = "index.php?act=promotion_xianshi&op=xianshi_list";

public function __construct(){
        parent::__construct();
				$FN_-2147483647;
				Language::read( "promotion_xianshi" );
				if ( intval( $GLOBALS['setting_config']['gold_isuse'] ) !== 1 )
				{
						showmessage( Language::get( "gold_unavailable" ), "index.php?act=setting&op=gold_setting", "html", "succ", 1, 2000 );
				}
				if ( intval( $_GET['promotion_allow'] ) !== 1 && intval( c( "promotion_allow" ) ) !== 1 && intval( c( "gold_isuse" ) ) !== 1 )
				{
						$url = array(
								array(
										"url" => "index.php?act=promotion_xianshi&promotion_allow=1",
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
				$this->xianshi_applyOp( );
		}

		public function xianshi_applyOp( )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model = model( "p_xianshi_apply" );
				$param = array( );
				$param['order'] = "state asc,apply_id asc";
				$list = $model->getList( $param, $page );
				Tpl::output( "show_page", $page->show( ) );
				$this->show_menu( "xianshi_apply" );
				Tpl::output( "list", $list );
				Tpl::showpage( "promotion_xianshi_apply.list" );
		}

		public function xianshi_apply_verifyOp( )
		{
				$apply_id = intval( $_POST['object_id'] );
				if ( $apply_id === 0 )
				{
						showmessage( Language::get( "param_error" ), "", "", "error" );
				}
				$model_xianshi_apply = model( "p_xianshi_apply" );
				$xianshi_apply = $model_xianshi_apply->getOne( $apply_id );
				if ( empty( $xianshi_apply ) )
				{
						showmessage( Language::get( "param_error" ), "", "", "error" );
				}
				if ( intval( $xianshi_apply['state'] ) !== self::APPLY_STATE_NEW )
				{
						showmessage( Language::get( "param_error" ), "", "", "error" );
				}
				$current_price = intval( $GLOBALS['setting_config']['promotion_xianshi_price'] );
				$times_limit = intval( $GLOBALS['setting_config']['promotion_xianshi_times_limit'] );
				$goods_limit = intval( $GLOBALS['setting_config']['promotion_xianshi_goods_limit'] );
				$flag = TRUE;
				$model_member = model( "member" );
				$member_info = $model_member->infoMember( array(
						"member_id" => $xianshi_apply['member_id']
				) );
				if ( empty( $member_info ) )
				{
						$flag = FALSE;
				}
				$apply_price = intval( $xianshi_apply['apply_quantity'] ) * $current_price;
				if ( intval( $member_info['member_goldnum'] ) < $apply_price )
				{
						$flag = FALSE;
				}
				if ( $flag )
				{
						$update_array = array( );
						$update_array['member_goldnum'] = array(
								"sign" => "decrease",
								"value" => $apply_price
						);
						$update_array['member_goldnumminus'] = array(
								"sign" => "increase",
								"value" => $apply_price
						);
						$result = $model_member->updateMember( $update_array, $xianshi_apply['member_id'] );
						$admin_info = $this->getAdminInfo( );
						$model_gold_log = model( "gold_log" );
						$param = array( );
						$param['glog_memberid'] = $xianshi_apply['member_id'];
						$param['glog_membername'] = $xianshi_apply['member_name'];
						$param['glog_storeid'] = $xianshi_apply['store_id'];
						$param['glog_storename'] = $xianshi_apply['store_name'];
						$param['glog_adminid'] = $admin_info['id'];
						$param['glog_adminname'] = $admin_info['name'];
						$param['glog_goldnum'] = $apply_price;
						$param['glog_method'] = 2;
						$param['glog_addtime'] = time( );
						$param['glog_desc'] = sprintf( Language::get( "xianshi_apply_verify_success_glog_desc" ), $xianshi_apply['apply_quantity'], $current_price, $apply_price );
						$param['glog_stage'] = "xianshi";
						$model_gold_log->add( $param );
						$model_xianshi_quota = model( "p_xianshi_quota" );
						$param = array( );
						$param['store_id'] = $xianshi_apply['store_id'];
						$param['order'] = "end_time desc";
						$param['state'] = self::QUOTA_STATE_ACTIVITY;
						$param['limit'] = 1;
						$last_xianshi_quota = $model_xianshi_quota->getList( $param );
						$start_time = time( );
						if ( !empty( $last_xianshi_quota ) )
						{
								$last_end_time = intval( $last_xianshi_quota[0]['end_time'] ) + 1;
								if ( $start_time < $last_end_time )
								{
										$start_time = $last_end_time;
								}
						}
						$param = array( );
						$param['member_id'] = $xianshi_apply['member_id'];
						$param['member_name'] = $xianshi_apply['member_name'];
						$param['store_id'] = $xianshi_apply['store_id'];
						$param['store_name'] = $xianshi_apply['store_name'];
						$param['times_limit'] = $times_limit;
						$param['goods_limit'] = $goods_limit;
						$param['state'] = 1;
						$param['apply_id'] = $xianshi_apply['apply_id'];
						$apply_quantity = intval( $xianshi_apply['apply_quantity'] );
						$param_array = array( );
						if ( $result )
						{
								$i = 0;
								for ( ;	$i < $apply_quantity;	++$i	)
								{
										$end_time = $start_time + self::SECONDS_OF_30DAY - 1;
										$param['start_time'] = $start_time;
										$param['end_time'] = $end_time;
										$param_array[] = $param;
										$start_time += self::SECONDS_OF_30DAY;
								}
								$model_xianshi_quota->save_array( $param_array );
						}
						else
						{
								$flag = FALSE;
						}
				}
				$message = "";
				$update_array = array( );
				if ( $flag )
				{
						$update_array['state'] = self::APPLY_STATE_VERIFY;
						$message = sprintf( Language::get( "xianshi_apply_verify_success_message" ), $xianshi_apply['apply_quantity'], $current_price, $apply_price );
				}
				else
				{
						$update_array['state'] = self::APPLY_STATE_FAIL;
						$message = Language::get( "xianshi_apply_verify_fail_message" );
				}
				$where_array = array( );
				$where_array['apply_id'] = $apply_id;
				$model_xianshi_apply->update( $update_array, $where_array );
				$this->send_message( $xianshi_apply['member_id'], $xianshi_apply['member_name'], $message );
				if ( $flag )
				{
						showmessage( Language::get( "xianshi_apply_verify_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "xianshi_apply_verify_fail" ), "", "", "error" );
				}
		}

		public function xianshi_apply_cancelOp( )
		{
				$apply_id = intval( $_POST['object_id'] );
				if ( $apply_id === 0 )
				{
						showmessage( Language::get( "param_error" ), "", "", "error" );
				}
				$model_xianshi_apply = model( "p_xianshi_apply" );
				$update_array = array( );
				$update_array['state'] = self::APPLY_STATE_CANCEL;
				$where_array = array( );
				$where_array['apply_id'] = $apply_id;
				if ( $model_xianshi_apply->update( $update_array, $where_array ) )
				{
						showmessage( Language::get( "xianshi_apply_cancel_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "xianshi_apply_cancel_fail" ), "" );
				}
		}

		public function xianshi_quotaOp( )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model = model( "p_xianshi_quota" );
				$model->update( array(
						"state" => self::QUOTA_STATE_EXPIRE
				), array(
						"greater_than_end_time" => time( ),
						"state" => self::QUOTA_STATE_ACTIVITY
				) );
				$param = array( );
				$param['store_name'] = trim( $_GET['store_name'] );
				$param['state'] = intval( $_GET['state'] );
				$param['order'] = "quota_id desc";
				$list = $model->getList( $param, $page );
				Tpl::output( "show_page", $page->show( ) );
				$this->output_xianshi_quota_state_list( );
				Tpl::output( "xianshi_quota_state_activity", self::QUOTA_STATE_ACTIVITY );
				$this->show_menu( "xianshi_quota" );
				Tpl::output( "list", $list );
				Tpl::showpage( "promotion_xianshi_quota.list" );
		}

		public function xianshi_quota_cancelOp( )
		{
				$quota_id = $_POST['object_id'];
				if ( empty( $quota_id ) )
				{
						showmessage( Language::get( "para_error" ), "index.php?act=promotion_xianshi" );
				}
				$model_xianshi_quota = model( "p_xianshi_quota" );
				$update_array = array( );
				$update_array['state'] = self::QUOTA_STATE_CANCEL;
				$where_array = array( );
				$where_array['in_quota_id'] = $quota_id;
				$where_array['state'] = self::QUOTA_STATE_ACTIVITY;
				if ( $model_xianshi_quota->update( $update_array, $where_array ) )
				{
						showmessage( Language::get( "xianshi_quota_cancel_success" ), self::LINK_QUOTA_LIST );
				}
				else
				{
						showmessage( Language::get( "xianshi_quota_cancel_fail" ), self::LINK_QUOTA_LIST, "", "error" );
				}
		}

		public function xianshi_listOp( )
		{
				$model_xianshi = model( "p_xianshi" );
				$model_xianshi->update( array(
						"state" => self::XIANSHI_STATE_END
				), array(
						"greater_than_end_time" => time( ),
						"state" => self::XIANSHI_STATE_PUBLISHED
				) );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$param = array( );
				$param['xianshi_name'] = trim( $_GET['xianshi_name'] );
				$param['store_name'] = trim( $_GET['store_name'] );
				$param['state'] = trim( $_GET['state'] );
				$param['order'] = "state asc,xianshi_id asc";
				$xianshi_list = $model_xianshi->getList( $param, $page );
				Tpl::output( "list", $xianshi_list );
				Tpl::output( "xianshi_state_published", self::XIANSHI_STATE_PUBLISHED );
				$this->output_xianshi_state_list( );
				Tpl::output( "show_page", $page->show( ) );
				$this->show_menu( "xianshi_list" );
				Tpl::showpage( "promotion_xianshi.list" );
		}

		public function xianshi_invaditationOp( )
		{
				$xianshi_id = intval( $_GET['xianshi_id'] );
				$xianshi_info = $this->get_xianshi_info( $xianshi_id );
				$model_xianshi_goods = model( "p_xianshi_goods" );
				$update = array( );
				$update['state'] = self::XIANSHI_GOODS_STATE_CANCEL;
				$where = array( );
				$where['xianshi_id'] = $xianshi_id;
				$model_xianshi_goods->update( $update, $where );
				$update['state'] = self::XIANSHI_STATE_INVADITATION;
				$where['state'] = self::XIANSHI_STATE_PUBLISHED;
				$model_xianshi = model( "p_xianshi" );
				if ( $model_xianshi->update( $update, $where ) )
				{
						showmessage( Language::get( "xianshi_invaditation_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "xianshi_invaditation_fail" ), "", "", "error" );
				}
		}

		public function xianshi_detailOp( )
		{
				$xianshi_id = intval( $_GET['xianshi_id'] );
				$xianshi_info = $this->get_xianshi_info( $xianshi_id );
				Tpl::output( "xianshi_info", $xianshi_info );
				$this->output_xianshi_state_list( );
				$model_xianshi_goods = model( "p_xianshi_goods" );
				$xianshi_goods_count = $model_xianshi_goods->getCount( array(
						"xianshi_id" => $xianshi_id
				) );
				Tpl::output( "xianshi_goods_count", $xianshi_goods_count );
				if ( 0 < intval( $xianshi_goods_count ) )
				{
						$param = array( );
						$param['xianshi_id'] = $xianshi_id;
						$goods_list = $model_xianshi_goods->getList( $param );
						if ( is_array( $goods_list ) )
						{
								foreach ( $goods_list as $key => $val )
								{
										$goods_list[$key]['goods_image'] = cthumb( $val['goods_image'], "tiny", $xianshi_info['store_id'] );
								}
						}
						$this->output_xianshi_goods_state_list( );
				}
				else
				{
						$goods_list = array( );
				}
				Tpl::output( "list", $goods_list );
				$this->show_menu( "xianshi_detail" );
				Tpl::showpage( "promotion_xianshi.detail" );
		}

		public function xianshi_settingOp( )
		{
				$model_setting = model( "setting" );
				$setting = $model_setting->GetListSetting( );
				Tpl::output( "setting", $setting );
				$this->show_menu( "xianshi_setting" );
				Tpl::showpage( "promotion_xianshi.setting" );
		}

		public function xianshi_setting_saveOp( )
		{
				$promotion_xianshi_price = intval( $_POST['promotion_xianshi_price'] );
				if ( $promotion_xianshi_price === 0 )
				{
						$promotion_xianshi_price = 20;
				}
				$promotion_xianshi_times_limit = intval( $_POST['promotion_xianshi_times_limit'] );
				if ( $promotion_xianshi_times_limit === 0 )
				{
						$promotion_xianshi_times_limit = 20;
				}
				$promotion_xianshi_goods_limit = intval( $_POST['promotion_xianshi_goods_limit'] );
				if ( $promotion_xianshi_goods_limit === 0 )
				{
						$promotion_xianshi_goods_limit = 20;
				}
				$model_setting = model( "setting" );
				$update_array = array( );
				$update_array['promotion_xianshi_price'] = $promotion_xianshi_price;
				$update_array['promotion_xianshi_times_limit'] = $promotion_xianshi_times_limit;
				$update_array['promotion_xianshi_goods_limit'] = $promotion_xianshi_goods_limit;
				$result = $model_setting->updateSetting( $update_array );
				if ( $result === TRUE )
				{
						showmessage( Language::get( "setting_save_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "setting_save_fail" ), "" );
				}
		}

		private function send_message( $member_id, $member_name, $message )
		{
				$param = array( );
				$param['from_member_id'] = 0;
				$param['member_id'] = $member_id;
				$param['to_member_name'] = $member_name;
				$param['message_type'] = "1";
				$param['msg_content'] = $message;
				$model_message = model( "message" );
				return $model_message->saveMessage( $param );
		}

		private function output_xianshi_quota_state_list( )
		{
				$state_list = array(
						0 => Language::get( "all_state" ),
						self::QUOTA_STATE_ACTIVITY => Language::get( "nc_normal" ),
						self::QUOTA_STATE_CANCEL => Language::get( "nc_cancel" ),
						self::QUOTA_STATE_EXPIRE => Language::get( "nc_end" )
				);
				Tpl::output( "xianshi_quota_state_list", $state_list );
		}

		private function output_xianshi_state_list( )
		{
				$state_list = array(
						0 => Language::get( "all_state" ),
						self::XIANSHI_STATE_UNPUBLISHED => Language::get( "xianshi_state_unpublished" ),
						self::XIANSHI_STATE_PUBLISHED => Language::get( "xianshi_state_published" ),
						self::XIANSHI_STATE_CANCEL => Language::get( "nc_cancel" ),
						self::XIANSHI_STATE_INVADITATION => Language::get( "nc_invalidation" ),
						self::XIANSHI_STATE_END => Language::get( "nc_end" )
				);
				Tpl::output( "state_list", $state_list );
		}

		private function output_xianshi_goods_state_list( )
		{
				$state_list = array(
						self::XIANSHI_GOODS_STATE_NORMAL => Language::get( "text_normal" ),
						self::XIANSHI_GOODS_STATE_CANCEL => Language::get( "nc_cancel" )
				);
				Tpl::output( "xianshi_goods_state_list", $state_list );
		}

		private function get_xianshi_info( $xianshi_id )
		{
				if ( $xianshi_id === 0 )
				{
						showmessage( Language::get( "param_error" ), "", "", "error" );
				}
				$model_xianshi = model( "p_xianshi" );
				$xianshi_info = $model_xianshi->getOne( $xianshi_id );
				if ( empty( $xianshi_info ) )
				{
						showmessage( Language::get( "param_error" ), "", "", "error" );
				}
				return $xianshi_info;
		}

		private function show_menu( $menu_key )
		{
				$menu_array = array(
						"xianshi_apply" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "xianshi_apply" ),
								"menu_url" => "index.php?act=promotion_xianshi&op=xianshi_apply"
						),
						"xianshi_quota" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "xianshi_quota" ),
								"menu_url" => "index.php?act=promotion_xianshi&op=xianshi_quota"
						),
						"xianshi_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "xianshi_list" ),
								"menu_url" => "index.php?act=promotion_xianshi&op=xianshi_list"
						),
						"xianshi_detail" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "xianshi_detail" ),
								"menu_url" => "index.php?act=promotion_xianshi&op=xianshi_detail"
						),
						"xianshi_setting" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "xianshi_setting" ),
								"menu_url" => "index.php?act=promotion_xianshi&op=xianshi_setting"
						)
				);
				if ( $menu_key != "xianshi_detail" )
				{
						unset( $menu_array['xianshi_detail'] );
				}
				$menu_array[$menu_key]['menu_type'] = "text";
				Tpl::output( "menu", $menu_array );
		}

}

?>
