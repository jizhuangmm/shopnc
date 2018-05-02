<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class gold_buyControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "gold_buy" );
		}

		public function gold_buyOp( )
		{
				$condition = array( );
				if ( trim( $_GET['storename'] ) != "" )
				{
						$condition['storename_like'] = trim( $_GET['storename'] );
				}
				if ( trim( $_GET['membername'] ) != "" )
				{
						$condition['membername_like'] = trim( $_GET['membername'] );
				}
				if ( trim( $_GET['payment'] ) != "" )
				{
						$condition['gbuy_check_type'] = trim( $_GET['payment'] );
				}
				if ( trim( $_GET['ispay'] ) != "" )
				{
						$condition['gbuy_ispay'] = trim( $_GET['ispay'] );
				}
				if ( trim( $_GET['add_time_from'] ) != "" )
				{
						$add_time_from = strtotime( trim( $_GET['add_time_from'] ) );
						if ( $add_time_from !== FALSE )
						{
								$condition['add_time_from'] = $add_time_from;
						}
				}
				if ( trim( $_GET['add_time_to'] ) != "" )
				{
						$add_time_to = strtotime( trim( $_GET['add_time_to'] ) );
						if ( $add_time_to !== FALSE )
						{
								$condition['add_time_to'] = $add_time_to + 86400;
						}
				}
				$condition['order'] = "gbuy_ispay asc,gbuy_id desc";
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$payment_array = $this->getPayment_name( );
				Tpl::output( "payment_array", $payment_array );
				$model_gbuy = model( "gold_buy" );
				$gbuy_list = $model_gbuy->getList( $condition, $page );
				Tpl::output( "gbuy_list", $gbuy_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "search", $_GET );
				Tpl::showpage( "gold_buy.index" );
		}

		public function gold_logOp( )
		{
				$condition = array( );
				if ( trim( $_GET['storename'] ) != "" )
				{
						$condition['storename_like'] = trim( $_GET['storename'] );
				}
				if ( trim( $_GET['membername'] ) != "" )
				{
						$condition['membername_like'] = trim( $_GET['membername'] );
				}
				if ( trim( $_GET['add_time_from'] ) != "" )
				{
						$add_time_from = strtotime( trim( $_GET['add_time_from'] ) );
						if ( $add_time_from !== FALSE )
						{
								$condition['add_time_from'] = $add_time_from;
						}
				}
				if ( trim( $_GET['add_time_to'] ) != "" )
				{
						$add_time_to = strtotime( trim( $_GET['add_time_to'] ) );
						if ( $add_time_to !== FALSE )
						{
								$condition['add_time_to'] = $add_time_to + 86400;
						}
				}
				if ( trim( $_GET['method'] ) != "" )
				{
						$condition['glog_method'] = $_GET['method'];
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model_log = model( "gold_log" );
				$glog_list = $model_log->getList( $condition, $page );
				Tpl::output( "glog_list", $glog_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "search", $_GET );
				Tpl::showpage( "gold_log.index" );
		}

		public function editOp( )
		{
				$model_gbuy = model( "gold_buy" );
				$member_model = model( "member" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$gbuy_id = intval( $_POST['gbuy_id'] );
						$gbuy_ispay = intval( $_POST['gbuy_ispay'] );
						$gbuy_num = intval( $_POST['gbuy_num'] );
						$gold_buy = $model_gbuy->getRow( $gbuy_id );
						$member_id = $gold_buy['gbuy_mid'];
						$condition = array( );
						$condition['gbuy_id'] = $gbuy_id;
						$condition['gbuy_ispay'] = "0";
						$admin_info = $this->getAdminInfo( );
						$gbuy_array = array( );
						$gbuy_array['gbuy_num'] = $gbuy_num;
						$gbuy_array['gbuy_adminid'] = $admin_info['id'];
						$gbuy_array['gbuy_sys_remark'] = trim( $_POST['gbuy_sys_remark'] );
						if ( $gbuy_ispay == "1" )
						{
								$member_array = array( );
								$member_array['member_goldnum'] = array(
										"value" => $gbuy_num,
										"sign" => "increase"
								);
								$member_array['member_goldnumcount'] = array(
										"value" => $gbuy_num,
										"sign" => "increase"
								);
								$state = $member_model->updateMember( $member_array, $member_id );
								if ( $state )
								{
										$model_glog = model( "gold_log" );
										$gold_log = array( );
										$gold_log['glog_memberid'] = $gold_buy['gbuy_mid'];
										$gold_log['glog_membername'] = $gold_buy['gbuy_membername'];
										$gold_log['glog_storeid'] = $gold_buy['gbuy_storeid'];
										$gold_log['glog_storename'] = $gold_buy['gbuy_storename'];
										$gold_log['glog_adminid'] = $admin_info['id'];
										$gold_log['glog_adminname'] = $admin_info['name'];
										$gold_log['glog_method'] = "1";
										$gold_log['glog_addtime'] = time( );
										$gold_log['glog_goldnum'] = $gbuy_num;
										$gold_log['glog_stage'] = "system";
										$gold_log['glog_desc'] = Language::get( "gbuy_add_success" );
										$model_glog->add( $gold_log );
								}
								else
								{
										$gbuy_ispay = "0";
								}
						}
						$gbuy_array['gbuy_ispay'] = $gbuy_ispay;
						$model_gbuy->update( $condition, $gbuy_array );
						showmessage( Language::get( "gbuy_edit_success" ), "index.php?act=gold_buy&op=gold_buy" );
				}
				$gbuy_id = intval( $_GET['gbuy_id'] );
				if ( 0 < $gbuy_id )
				{
						$gold_buy = $model_gbuy->getRow( $gbuy_id );
						$member_array = $member_model->infoMember( array(
								"member_id" => $gold_buy['gbuy_mid']
						) );
						Tpl::output( "member_goldnum", $member_array['member_goldnum'] );
						Tpl::output( "gold_buy", $gold_buy );
				}
				Tpl::showpage( "gold_buy.edit" );
		}

		public function delOp( )
		{
				$gbuy_id = intval( $_GET['gbuy_id'] );
				if ( 0 < $gbuy_id )
				{
						$model_gbuy = model( "gold_buy" );
						$condition = array( );
						$condition['gbuy_id'] = $gbuy_id;
						$condition['gbuy_ispay'] = "0";
						$model_gbuy->del( $condition );
				}
				showmessage( Language::get( "gbuy_del_success" ), "index.php?act=gold_buy&op=gold_buy" );
		}

		private function getPayment( $payment_state = "" )
		{
				$model_payment = model( "gold_payment" );
				$condition = array( );
				if ( 0 < $payment_state )
				{
						$condition['payment_state'] = "1";
				}
				$payment_list = $model_payment->getList( $condition );
				return $payment_list;
		}

		private function getPayment_name( )
		{
				$payment_list = $this->getPayment( );
				$payment_array = array( );
				foreach ( $payment_list as $k => $v )
				{
						$payment_code = $v['payment_code'];
						$payment_array[$payment_code] = $v['payment_name'];
				}
				return $payment_array;
		}

}

?>
