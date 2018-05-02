<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class predepositControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "predeposit" );
				if ( $GLOBALS['setting_config']['predeposit_isuse'] != 1 )
				{
						showmessage( Language::get( "admin_predeposit_unavailable" ), "index.php?act=dashboard&op=welcome", "", "error" );
				}
				$rechargestate = array(
						0 => Language::get( "admin_predeposit_rechargestate_auditing" ),
						1 => Language::get( "admin_predeposit_rechargestate_completed" ),
						2 => Language::get( "admin_predeposit_rechargestate_closed" )
				);
				$rechargepaystate = array(
						0 => Language::get( "admin_predeposit_rechargewaitpaying" ),
						1 => Language::get( "admin_predeposit_rechargepaysuccess" )
				);
				Tpl::output( "rechargestate", $rechargestate );
				Tpl::output( "rechargepaystate", $rechargepaystate );
				$cashstate = array(
						0 => Language::get( "admin_predeposit_cashstate_auditing" ),
						1 => Language::get( "admin_predeposit_cashstate_completed" ),
						2 => Language::get( "admin_predeposit_cashstate_closed" )
				);
				$cashpaystate = array(
						0 => Language::get( "admin_predeposit_cashwaitpaying" ),
						1 => Language::get( "admin_predeposit_cashpaysuccess" )
				);
				Tpl::output( "cashstate", $cashstate );
				Tpl::output( "cashpaystate", $cashpaystate );
		}

		public function predepositOp( )
		{
				$condition_arr = array( );
				$condition_arr['pdr_membername_like'] = trim( $_GET['mname'] );
				$condition_arr['pdr_payment'] = trim( $_GET['payment_search'] );
				if ( 0 < intval( $_GET['paystate_search'] ) )
				{
						$condition_arr['pdr_paystate'] = intval( $_GET['paystate_search'] ) - 1;
						$condition_arr['pdr_paystate'] = "{$condition_arr['pdr_paystate']}";
				}
				if ( 0 < intval( $_GET['state_search'] ) )
				{
						$condition_arr['pdr_state'] = intval( $_GET['state_search'] ) - 1;
						$condition_arr['pdr_state'] = "{$condition_arr['pdr_state']}";
				}
				$condition_arr['pdr_remittancename_like'] = trim( $_GET['huikuan_name'] );
				$condition_arr['pdr_remittancebank_like'] = trim( $_GET['huikuan_bank'] );
				$condition_arr['saddtime'] = strtotime( $_GET['stime'] );
				$condition_arr['eaddtime'] = strtotime( $_GET['etime'] );
				if ( 0 < $condition_arr['eaddtime'] )
				{
						$condition_arr['eaddtime'] += 86400;
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$predeposit_model = model( "predeposit" );
				$recharge_list = $predeposit_model->getRechargeList( $condition_arr, $page );
				$payment_array = $this->getPayment( );
				$payment_array_new = array( );
				if ( is_array( $payment_array ) && 0 < count( $payment_array ) )
				{
						foreach ( $payment_array as $k => $v )
						{
								if ( $v['payment_code'] != "predeposit" )
								{
										$payment_array_new[$v['payment_code']] = $v;
								}
						}
				}
				Tpl::output( "payment_array", $payment_array_new );
				Tpl::output( "recharge_list", $recharge_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "predeposit.list" );
		}

		public function rechargeeditOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						$id = intval( $_POST['id'] );
				}
				if ( $id <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_parameter_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				$predeposit_model = model( "predeposit" );
				$condition_arr = array( );
				$condition_arr['pdr_id'] = "{$id}";
				$condition_arr['pdr_state'] = "0";
				$info = $predeposit_model->getRechargeRow( $condition_arr );
				if ( !is_array( $info ) && count( $info ) < 0 )
				{
						showmessage( Language::get( "admin_predeposit_record_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				$goldpayment_model = model( "gold_payment" );
				$payment_info = $goldpayment_model->getRowByCode( $info['pdr_payment'] );
				if ( !is_array( $payment_info ) && count( $payment_info ) <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_payment_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						$update_arr = array( );
						if ( intval( $payment_info['payment_online'] ) === 0 )
						{
								if ( intval( $_POST['paystate'] ) != intval( $info['pdr_paystate'] ) && intval( $_POST['paystate'] ) === 0 && !$predeposit_model->predepositDecreaseCheck( $info['pdr_memberid'], $info['pdr_price'] ) )
								{
										showmessage( Language::get( "admin_predeposit_shortprice_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
								}
								$update_arr['pdr_paystate'] = intval( $_POST['paystate'] );
						}
						if ( $_POST['paystate_hidden'] == "1" && intval( $_POST['recordstate'] ) == "2" )
						{
								$update_arr['pdr_state'] = 0;
						}
						else if ( $_POST['paystate_hidden'] == "0" && intval( $_POST['recordstate'] ) == "1" )
						{
								$update_arr['pdr_state'] = 0;
						}
						else
						{
								$update_arr['pdr_state'] = intval( $_POST['recordstate'] );
						}
						$update_arr['pdr_adminremark'] = trim( $_POST['admin_remark'] );
						$admininfo = $this->getAdminInfo( );
						$update_arr['pdr_adminid'] = $admininfo['id'];
						$update_arr['pdr_adminname'] = $admininfo['name'];
						$result = $predeposit_model->rechargeUpdate( $condition_arr, $update_arr );
						if ( $result )
						{
								if ( intval( $payment_info['payment_online'] ) === 0 && intval( $_POST['paystate'] ) != intval( $info['pdr_paystate'] ) )
								{
										$log_arr['memberid'] = $info['pdr_memberid'];
										$log_arr['membername'] = $info['pdr_membername'];
										$log_arr['adminid'] = $admininfo['id'];
										$log_arr['adminname'] = $admininfo['name'];
										$log_arr['logtype'] = "0";
										if ( intval( $_POST['paystate'] ) == 1 )
										{
												$log_arr['price'] = $info['pdr_price'];
												$predeposit_model->savePredepositLog( "recharge", $log_arr );
										}
										else
										{
												$log_arr['price'] = 0 - $info['pdr_price'];
												$log_arr['desc'] = Language::get( "admin_predeposit_recharge_edit_logdesc" );
												$predeposit_model->savePredepositLog( "recharge", $log_arr );
										}
								}
								showmessage( Language::get( "admin_predeposit_recharge_edit_success" ), "index.php?act=predeposit&op=predeposit" );
						}
						else
						{
								showmessage( Language::get( "admin_predeposit_recharge_edit_fail" ), "index.php?act=predeposit&op=predeposit", "", "error" );
						}
				}
				else
				{
						Tpl::output( "payment_info", $payment_info );
						Tpl::output( "info", $info );
						Tpl::showpage( "predeposit.edit" );
				}
		}

		public function rechargeinfoOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_parameter_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				$predeposit_model = model( "predeposit" );
				$condition_arr = array( );
				$condition_arr['pdr_id'] = "{$id}";
				$info = $predeposit_model->getRechargeRow( $condition_arr );
				if ( !is_array( $info ) && count( $info ) < 0 )
				{
						showmessage( Language::get( "admin_predeposit_record_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				$goldpayment_model = model( "gold_payment" );
				$payment_info = $goldpayment_model->getRowByCode( $info['pdr_payment'] );
				if ( !is_array( $payment_info ) && count( $payment_info ) <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_payment_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				Tpl::output( "payment_info", $payment_info );
				Tpl::output( "info", $info );
				Tpl::showpage( "predeposit.info" );
		}

		public function rechargedelOp( )
		{
				$pdr_id = intval( $_GET['id'] );
				if ( $pdr_id <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_parameter_error" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
				$predeposit_model = model( "predeposit" );
				$condition_arr = array( );
				$condition_arr['pdr_id'] = "{$pdr_id}";
				$condition_arr['pdr_state'] = "2";
				$condition_arr['pdr_paystate'] = "0";
				$result = $predeposit_model->rechargeDel( $condition_arr );
				if ( $result )
				{
						showmessage( Language::get( "admin_predeposit_recharge_del_success" ), "index.php?act=predeposit&op=predeposit" );
				}
				else
				{
						showmessage( Language::get( "admin_predeposit_recharge_del_fail" ), "index.php?act=predeposit&op=predeposit", "", "error" );
				}
		}

		public function predepositlogOp( )
		{
				$condition_arr = array( );
				$condition_arr['pdlog_membername_like'] = trim( $_GET['mname'] );
				$condition_arr['pdlog_adminname_like'] = trim( $_GET['aname'] );
				if ( $_GET['stage'] )
				{
						$condition_arr['pdlog_stage'] = trim( $_GET['stage'] );
				}
				if ( 0 < intval( $_GET['recordtype'] ) )
				{
						$condition_arr['pdlog_type'] = intval( $_GET['recordtype'] ) - 1;
						$condition_arr['pdlog_type'] = "{$condition_arr['pdlog_type']}";
				}
				$condition_arr['saddtime'] = strtotime( $_GET['stime'] );
				$condition_arr['eaddtime'] = strtotime( $_GET['etime'] );
				if ( 0 < $condition_arr['eaddtime'] )
				{
						$condition_arr['eaddtime'] += 86400;
				}
				$condition_arr['pdlog_desc_like'] = trim( $_GET['description'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$predeposit_model = model( "predeposit" );
				$list_log = $predeposit_model->predepositLogList( $condition_arr, $page, "*", "" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "list_log", $list_log );
				Tpl::showpage( "predepositlog" );
		}

		public function cashlistOp( )
		{
				$condition_arr = array( );
				$condition_arr['pdcash_membername_like'] = trim( $_GET['mname'] );
				$condition_arr['pdcash_payment'] = trim( $_GET['payment_search'] );
				if ( 0 < intval( $_GET['paystate_search'] ) )
				{
						$condition_arr['pdcash_paystate'] = intval( $_GET['paystate_search'] ) - 1;
						$condition_arr['pdcash_paystate'] = "{$condition_arr['pdcash_paystate']}";
				}
				if ( 0 < intval( $_GET['state_search'] ) )
				{
						$condition_arr['pdcash_state'] = intval( $_GET['state_search'] ) - 1;
						$condition_arr['pdcash_state'] = "{$condition_arr['pdcash_state']}";
				}
				$condition_arr['pdcash_toname_like'] = trim( $_GET['shoukuan_name'] );
				$condition_arr['pdcash_tobank_like'] = trim( $_GET['shoukuan_bank'] );
				$condition_arr['saddtime'] = strtotime( $_GET['stime'] );
				$condition_arr['eaddtime'] = strtotime( $_GET['etime'] );
				if ( 0 < $condition_arr['eaddtime'] )
				{
						$condition_arr['eaddtime'] += 86400;
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$predeposit_model = model( "predeposit" );
				$cash_list = $predeposit_model->getCashList( $condition_arr, $page );
				$payment_array = $this->getPayment( );
				$payment_array_new = array( );
				if ( is_array( $payment_array ) && 0 < count( $payment_array ) )
				{
						foreach ( $payment_array as $k => $v )
						{
								if ( $v['payment_code'] != "predeposit" )
								{
										$payment_array_new[$v['payment_code']] = $v;
								}
						}
				}
				Tpl::output( "payment_array", $payment_array_new );
				Tpl::output( "cash_list", $cash_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "predepositcash.list" );
		}

		public function cashdelOp( )
		{
				$pdcash_id = intval( $_GET['id'] );
				if ( $pdcash_id <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_parameter_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				$predeposit_model = model( "predeposit" );
				$condition_arr = array( );
				$condition_arr['pdcash_id'] = "{$pdcash_id}";
				$condition_arr['pdcash_paystate'] = "0";
				$condition_arr['pdcash_state'] = "2";
				$result = $predeposit_model->cashDel( $condition_arr );
				if ( $result )
				{
						showmessage( Language::get( "admin_predeposit_cash_del_success" ), "index.php?act=predeposit&op=cashlist" );
				}
				else
				{
						showmessage( Language::get( "admin_predeposit_cash_del_fail" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
		}

		public function cashinfoOp( )
		{
				$pdcash_id = intval( $_GET['id'] );
				if ( $pdcash_id <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_parameter_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				$predeposit_model = model( "predeposit" );
				$condition_arr = array( );
				$condition_arr['pdcash_id'] = "{$pdcash_id}";
				$info = $predeposit_model->getCashRow( $condition_arr );
				if ( !is_array( $info ) && count( $info ) < 0 )
				{
						showmessage( Language::get( "admin_predeposit_record_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				$goldpayment_model = model( "gold_payment" );
				$payment_info = $goldpayment_model->getRowByCode( $info['pdcash_payment'] );
				if ( !is_array( $payment_info ) && count( $payment_info ) <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_payment_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				Tpl::output( "payment_info", $payment_info );
				Tpl::output( "info", $info );
				Tpl::showpage( "predepositcash.info" );
		}

		public function casheditOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						$id = intval( $_POST['id'] );
				}
				if ( $id <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_parameter_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				$predeposit_model = model( "predeposit" );
				$condition_arr = array( );
				$condition_arr['pdcash_id'] = "{$id}";
				$condition_arr['pdcash_state'] = "0";
				$info = $predeposit_model->getCashRow( $condition_arr );
				if ( !is_array( $info ) && count( $info ) < 0 )
				{
						showmessage( Language::get( "admin_predeposit_record_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				$goldpayment_model = model( "gold_payment" );
				$payment_info = $goldpayment_model->getRowByCode( $info['pdcash_payment'] );
				if ( !is_array( $payment_info ) && count( $payment_info ) <= 0 )
				{
						showmessage( Language::get( "admin_predeposit_payment_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						$update_arr = array( );
						if ( intval( $_POST['paystate'] ) != intval( $info['pdcash_paystate'] ) && intval( $_POST['paystate'] ) === 1 && !$predeposit_model->predepositDecreaseCheck( $info['pdcash_memberid'], $info['pdcash_price'], 1 ) )
						{
								showmessage( Language::get( "admin_predeposit_shortprice_error" ), "index.php?act=predeposit&op=cashlist", "", "error" );
						}
						$update_arr['pdcash_paystate'] = intval( $_POST['paystate'] );
						if ( $_POST['paystate_hidden'] == "1" && intval( $_POST['recordstate'] ) == "2" )
						{
								$update_arr['pdcash_state'] = 0;
						}
						else if ( $_POST['paystate_hidden'] == "0" && intval( $_POST['recordstate'] ) == "1" )
						{
								$update_arr['pdcash_state'] = 0;
						}
						else
						{
								$update_arr['pdcash_state'] = intval( $_POST['recordstate'] );
						}
						$update_arr['pdcash_adminremark'] = $_POST['admin_remark'];
						$update_arr['pdcash_remark'] = trim( $_POST['remark'] );
						$admininfo = $this->getAdminInfo( );
						$update_arr['pdcash_adminid'] = $admininfo['id'];
						$update_arr['pdcash_adminname'] = $admininfo['name'];
						$result = $predeposit_model->cashUpdate( $condition_arr, $update_arr );
						if ( $result )
						{
								if ( intval( $_POST['paystate'] ) != intval( $info['pdcash_paystate'] ) )
								{
										$log_arr['memberid'] = $info['pdcash_memberid'];
										$log_arr['membername'] = $info['pdcash_membername'];
										$log_arr['adminid'] = $admininfo['id'];
										$log_arr['adminname'] = $admininfo['name'];
										$log_arr['logtype'] = "1";
										if ( intval( $_POST['paystate'] ) == 1 )
										{
												$log_arr['price'] = 0 - $info['pdcash_price'];
												$log_arr['desc'] = Language::get( "admin_predeposit_cash_edit_reducefreezelogdesc" );
												$predeposit_model->savePredepositLog( "cash", $log_arr );
										}
										else
										{
												$log_arr['price'] = $info['pdcash_price'];
												$log_arr['desc'] = Language::get( "admin_predeposit_cash_edit_addfreezelogdesc" );
												$predeposit_model->savePredepositLog( "cash", $log_arr );
										}
								}
								showmessage( Language::get( "admin_predeposit_cash_edit_success" ), "index.php?act=predeposit&op=cashlist" );
						}
						else
						{
								showmessage( Language::get( "admin_predeposit_cash_edit_fail" ), "index.php?act=predeposit&op=cashlist", "", "error" );
						}
				}
				else
				{
						Tpl::output( "payment_info", $payment_info );
						Tpl::output( "info", $info );
						Tpl::showpage( "predepositcash.edit" );
				}
		}

		public function artificialOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['member_id'],
										"require" => "true",
										"message" => Language::get( "admin_predeposit_artificial_membername_error" )
								),
								array(
										"input" => $_POST['price'],
										"require" => "true",
										"validator" => "Compare",
										"operator" => " >= ",
										"to" => 1,
										"message" => Language::get( "admin_predeposit_artificial_pricemin_error" )
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error, "", "", "error" );
						}
						$obj_member = model( "member" );
						$member_info = $obj_member->infoMember( array(
								"member_id" => $_POST['member_id']
						) );
						if ( !is_array( $member_info ) && count( $member_info ) <= 0 )
						{
								showmessage( Language::get( "admin_predeposit_userrecord_error" ), "index.php?act=predeposit&op=artificial", "", "error" );
						}
						$predeposit_model = model( "predeposit" );
						$price = floatval( $_POST['price'] );
						$pricetype = intval( $_POST['pricetype'] ) - 1;
						if ( $_POST['operatetype'] == 2 && !$predeposit_model->predepositDecreaseCheck( $_POST['member_id'], $price, $pricetype ) )
						{
								if ( $pricetype == 1 )
								{
										showmessage( Language::get( "admin_predeposit_artificial_shortfreezeprice_error" ).$member_info['freeze_predeposit'], "index.php?act=predeposit&op=artificial", "", "error" );
								}
								else
								{
										showmessage( Language::get( "admin_predeposit_artificial_shortprice_error" ).$member_info['available_predeposit'], "index.php?act=predeposit&op=artificial", "", "error" );
								}
						}
						$log_arr['memberid'] = $member_info['member_id'];
						$log_arr['membername'] = $member_info['member_name'];
						$admininfo = $this->getAdminInfo( );
						$log_arr['adminid'] = $admininfo['id'];
						$log_arr['adminname'] = $admininfo['name'];
						$log_arr['logtype'] = $pricetype;
						if ( $_POST['operatetype'] == 2 )
						{
								$log_arr['price'] = 0 - $price;
						}
						else
						{
								$log_arr['price'] = $price;
						}
						if ( $_POST['remark'] )
						{
								$log_arr['desc'] = trim( $_POST['remark'] );
						}
						else
						{
								$log_arr['desc'] = Language::get( "predepositadmindesc" );
						}
						$result = $predeposit_model->savePredepositLog( "admin", $log_arr );
						if ( $result )
						{
								showmessage( Language::get( "admin_predeposit_artificial_success" ), "index.php?act=predeposit&op=predepositlog" );
						}
						else
						{
								showmessage( Language::get( "admin_predeposit_artificial_fail" ), "index.php?act=predeposit&op=artificial", "", "error" );
						}
				}
				else
				{
						Tpl::showpage( "predepositartificial" );
				}
		}

		public function checkmemberOp( )
		{
				$name = trim( $_GET['name'] );
				if ( !$name )
				{
						echo "";
						exit( );
				}
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$name = Language::getgbk( $name );
				}
				$obj_member = model( "member" );
				$member_info = $obj_member->infoMember( array(
						"member_name" => $name
				) );
				if ( is_array( $member_info ) && 0 < count( $member_info ) )
				{
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$member_info['member_name'] = Language::getutf8( $member_info['member_name'] );
						}
						echo json_encode( array(
								"id" => $member_info['member_id'],
								"name" => $member_info['member_name'],
								"availableprice" => $member_info['available_predeposit'],
								"freezeprice" => $member_info['freeze_predeposit']
						) );
				}
				else
				{
						echo "";
				}
				exit( );
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

}

?>
