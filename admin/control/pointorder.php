<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class pointorderControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "pointorder" );
				if ( $GLOBALS['setting_config']['points_isuse'] != 1 || $GLOBALS['setting_config']['pointprod_isuse'] != 1 )
				{
						showmessage( Language::get( "admin_pointorder_unavailable" ), "index.php?act=dashboard&op=welcome", "", "error" );
				}
		}

		public function pointorder_listOp( )
		{
				$condition_arr = array( );
				if ( trim( $_GET['pordersn'] ) )
				{
						$condition_arr['point_ordersn_like'] = trim( $_GET['pordersn'] );
				}
				if ( trim( $_GET['pbuyname'] ) )
				{
						$condition_arr['point_buyername_like'] = trim( $_GET['pbuyname'] );
				}
				if ( trim( $_GET['porderpayment'] ) )
				{
						$condition_arr['point_paymentcode'] = trim( $_GET['porderpayment'] );
				}
				if ( trim( $_GET['porderstate'] ) )
				{
						$condition_arr['point_orderstatetxt'] = trim( $_GET['porderstate'] );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$pointprod_model = model( "pointorder" );
				$order_list = $pointprod_model->getPointOrderList( $condition_arr, $page, "simple" );
				if ( is_array( $order_list ) && 0 < count( $order_list ) )
				{
						foreach ( $order_list as $k => $v )
						{
								$order_list[$k]['point_orderstatetext'] = $this->pointorder_state( $v['point_orderstate'] );
						}
				}
				$goldpayment_model = model( "gold_payment" );
				$payment_list = $goldpayment_model->getList( );
				Tpl::output( "payment_list", $payment_list );
				Tpl::output( "order_list", $order_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "pointorder.list" );
		}

		public function order_dropOp( )
		{
				$order_id = intval( $_GET['order_id'] );
				if ( !$order_id )
				{
						showmessage( Language::get( "admin_pointorder_parameter_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$pointorder_model = model( "pointorder" );
				$condition_arr = array( );
				$condition_arr['point_orderid_del'] = $order_id;
				$condition_arr['point_orderstate_in'] = "2";
				$result = $pointorder_model->dropPointOrder( $condition_arr );
				if ( $result )
				{
						$pointorder_model->dropPointOrderProd( array(
								"prod_orderid_del" => $order_id
						) );
						$pointorder_model->dropPointOrderAddress( array(
								"address_orderid_del" => $order_id
						) );
						showmessage( Language::get( "admin_pointorder_del_success" ), "index.php?act=pointorder&op=pointorder_list" );
				}
				else
				{
						showmessage( Language::get( "admin_pointorder_del_fail" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
		}

		public function order_changfeeOp( )
		{
				$order_id = intval( $_GET['id'] );
				if ( $order_id <= 0 )
				{
						showmessage( Language::get( "admin_pointorder_parameter_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$pointorder_model = model( "pointorder" );
				$condition_arr = array( );
				$condition_arr['point_orderid'] = "{$order_id}";
				$condition_arr['point_orderstate'] = "10";
				$condition_arr['point_shippingcharge'] = "1";
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['shippingfee'],
								"require" => "true",
								"validator" => "DoublePositive",
								"message" => Language::get( "admin_pointorder_changefee_freightprice_error" )
						);
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( Language::get( "error" ).$error, "index.php?act=pointorder&op=pointorder_list", "", "error" );
						}
						$pointorder_model->updatePointOrder( $condition_arr, array(
								"point_shippingfee" => $_POST['shippingfee'],
								"point_orderamount" => $_POST['shippingfee']
						) );
						showmessage( Language::get( "admin_pointorder_changefee_success" ), "index.php?act=pointorder&op=pointorder_list" );
				}
				else
				{
						$order_info = $pointorder_model->getPointOrderInfo( $condition_arr, "simple", "point_ordersn,point_buyername,point_shippingfee" );
						if ( is_array( $order_info ) && 0 < count( $order_info ) )
						{
								Tpl::output( "order_info", $order_info );
								Tpl::showpage( "pointorder.changefee" );
						}
						else
						{
								Tpl::output( "errormsg", Language::get( "admin_pointorderd_record_error" ) );
								Tpl::showpage( "pointorder.changefee" );
						}
				}
		}

		public function order_cancelOp( )
		{
				$order_id = intval( $_GET['id'] );
				if ( $order_id <= 0 )
				{
						showmessage( Language::get( "admin_pointorder_parameter_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$pointorder_model = model( "pointorder" );
				$condition_arr = array( );
				$condition_arr['point_orderid'] = "{$order_id}";
				$condition_arr['point_order_enablecancel'] = "1";
				$order_info = $pointorder_model->getPointOrderInfo( $condition_arr, "simple", "point_ordersn,point_buyerid,point_buyername,point_allpoint" );
				if ( !is_array( $order_info ) && count( $order_info ) <= 0 )
				{
						showmessage( Language::get( "admin_pointorderd_record_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$state = $pointorder_model->updatePointOrder( $condition_arr, array( "point_orderstate" => "2" ) );
				if ( $state )
				{
						$points_model = model( "points" );
						$insert_arr['pl_memberid'] = $order_info['point_buyerid'];
						$insert_arr['pl_membername'] = $order_info['point_buyername'];
						$insert_arr['pl_points'] = $order_info['point_allpoint'];
						$insert_arr['point_ordersn'] = $order_info['point_ordersn'];
						$insert_arr['pl_desc'] = Language::get( "admin_pointorder_cancel_tip1" ).$order_info['point_ordersn'].Language::get( "admin_pointorder_cancel_tip2" );
						$points_model->savePointsLog( "pointorder", $insert_arr, TRUE );
						$prod_list = $pointorder_model->getPointOrderProdList( array(
								"prod_orderid" => $order_id
						), "", "point_goodsid,point_goodsnum" );
						if ( is_array( $prod_list ) && 0 < count( $prod_list ) )
						{
								$pointprod_model = model( "pointprod" );
								foreach ( $prod_list as $v )
								{
										$update_arr = array( );
										$update_arr['pgoods_storage'] = array(
												"sign" => "increase",
												"value" => $v['point_goodsnum']
										);
										$update_arr['pgoods_salenum'] = array(
												"sign" => "decrease",
												"value" => $v['point_goodsnum']
										);
										$pointprod_model->updatePointProd( $update_arr, array(
												"pgoods_id" => $v['point_goodsid']
										) );
										unset( $update_arr );
								}
						}
						showmessage( Language::get( "admin_pointorder_cancel_success" ), "index.php?act=pointorder&op=pointorder_list" );
				}
				else
				{
						showmessage( Language::get( "admin_pointorder_cancel_fail" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
		}

		public function order_confirmpaidOp( )
		{
				$order_id = intval( $_GET['id'] );
				if ( $order_id <= 0 )
				{
						showmessage( Language::get( "admin_pointorder_parameter_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$pointorder_model = model( "pointorder" );
				$condition_arr = array( );
				$condition_arr['point_orderid'] = "{$order_id}";
				$condition_arr['point_orderstate'] = "11";
				$order_info = $pointorder_model->getPointOrderInfo( $condition_arr, "simple", "point_ordersn,point_buyerid" );
				if ( !is_array( $order_info ) && count( $order_info ) <= 0 )
				{
						showmessage( Language::get( "admin_pointorderd_record_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$state = $pointorder_model->updatePointOrder( $condition_arr, array( "point_orderstate" => "20" ) );
				if ( $state )
				{
						showmessage( Language::get( "admin_pointorder_confirmpaid_success" ), "index.php?act=pointorder&op=pointorder_list" );
				}
				else
				{
						showmessage( Language::get( "admin_pointorder_confirmpaid_fail" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
		}

		public function order_shipOp( )
		{
				$order_id = intval( $_GET['id'] );
				if ( $order_id <= 0 )
				{
						showmessage( Language::get( "admin_pointorder_parameter_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$pointorder_model = model( "pointorder" );
				$condition_arr = array( );
				$condition_arr['point_orderid'] = "{$order_id}";
				$condition_arr['point_orderstate_in'] = "20,30";
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['shippingcode'],
								"require" => "true",
								"message" => Language::get( "admin_pointorder_ship_code_nullerror" )
						);
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( Language::get( "error" ).$error, "index.php?act=pointorder&op=pointorder_list", "", "error" );
						}
						$update_arr = array( );
						$shippingtime = strtotime( trim( $_POST['shippingtime'] ) );
						if ( 0 < $shippingtime )
						{
								$update_arr['point_shippingtime'] = $shippingtime;
						}
						else
						{
								$update_arr['point_shippingtime'] = time( );
						}
						$update_arr['point_shippingcode'] = trim( $_POST['shippingcode'] );
						$update_arr['point_shippingdesc'] = trim( $_POST['shippingdesc'] );
						$update_arr['point_orderstate'] = "30";
						$state = $pointorder_model->updatePointOrder( $condition_arr, $update_arr );
						if ( $state )
						{
								showmessage( Language::get( "admin_pointorder_ship_success" ), "index.php?act=pointorder&op=pointorder_list" );
						}
						else
						{
								showmessage( Language::get( "admin_pointorder_ship_fail" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
						}
				}
				else
				{
						$order_info = $pointorder_model->getPointOrderInfo( $condition_arr, "simple", "point_ordersn,point_buyername,point_shippingtime,point_shippingcode,point_shippingdesc,point_orderstate" );
						if ( is_array( $order_info ) && 0 < count( $order_info ) )
						{
								Tpl::output( "order_info", $order_info );
								Tpl::showpage( "pointorder.ship" );
						}
						else
						{
								Tpl::output( "errormsg", Language::get( "admin_pointorderd_record_error" ) );
								Tpl::showpage( "pointorder.ship" );
						}
				}
		}

		public function order_infoOp( )
		{
				$order_id = intval( $_GET['order_id'] );
				if ( $order_id <= 0 )
				{
						showmessage( Language::get( "admin_pointorder_parameter_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$pointorder_model = model( "pointorder" );
				$condition_arr['point_orderid'] = $order_id;
				$order_info = $pointorder_model->getPointOrderInfo( $condition_arr, "all", "*" );
				if ( !is_array( $order_info ) && count( $order_info ) <= 0 )
				{
						showmessage( Language::get( "admin_pointorderd_record_error" ), "index.php?act=pointorder&op=pointorder_list", "", "error" );
				}
				$order_info['point_orderstatetext'] = $this->pointorder_state( $order_info['point_orderstate'] );
				$prod_list = $pointorder_model->getPointOrderProdList( array(
						"prod_orderid" => "{$order_id}"
				), $page );
				Tpl::output( "prod_list", $prod_list );
				Tpl::output( "order_info", $order_info );
				Tpl::showpage( "pointorder.info" );
		}

		public function pointorder_state( $order_step )
		{
				$log_array = array( );
				switch ( $order_step )
				{
				case 10 :
						$log_array['order_state'] = Language::get( "admin_pointorder_state_submit" );
						$log_array['change_state'] = Language::get( "admin_pointorder_state_waitpay" );
						return $log_array;
				case 11 :
						$log_array['order_state'] = Language::get( "admin_pointorder_state_paid" );
						$log_array['change_state'] = Language::get( "admin_pointorder_state_confirmpay" );
						return $log_array;
				case 2 :
						$log_array['order_state'] = Language::get( "admin_pointorder_state_canceled" );
						$log_array['change_state'] = "";
						return $log_array;
				case 20 :
						$log_array['order_state'] = Language::get( "admin_pointorder_state_confirmpaid" );
						$log_array['change_state'] = Language::get( "admin_pointorder_state_waitship" );
						return $log_array;
				case 30 :
						$log_array['order_state'] = Language::get( "admin_pointorder_state_shipped" );
						$log_array['change_state'] = Language::get( "admin_pointorder_state_waitreceiving" );
						return $log_array;
				case 40 :
						$log_array['order_state'] = Language::get( "admin_pointorder_state_finished" );
						$log_array['change_state'] = "";
						return $log_array;
				}
				$log_array['order_state'] = Language::get( "admin_pointorder_state_unknown" );
				$log_array['change_state'] = Language::get( "admin_pointorder_state_unknown" );
				return $log_array;
		}

}

?>
