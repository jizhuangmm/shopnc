<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class gold_paymentControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "gold_payment,payment" );
		}

		public function gold_paymentOp( )
		{
				$model_payment = model( "gold_payment" );
				$payment_list = $model_payment->getList( );
				Tpl::output( "payment_list", $payment_list );
				Tpl::showpage( "gold_payment.index" );
		}

		public function setOp( )
		{
				$obj_validate = new Validate( );
				$payment_id = intval( $_GET['payment_id'] );
				$state = $_GET['state'];
				$obj_validate->validateparam = array(
						array(
								"input" => $payment_id,
								"require" => "true",
								"message" => Language::get( "wrong_argument" )
						)
				);
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( $error );
				}
				else
				{
						$param = array( );
						$param['payment_state'] = $state;
						$model_payment = model( "gold_payment" );
						$model_payment->update( $payment_id, $param );
						showmessage( Language::get( "payment_config_success" ), "index.php?act=gold_payment&op=gold_payment" );
				}
		}

		public function editOp( )
		{
				$obj_validate = new Validate( );
				$model_payment = model( "gold_payment" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$payment_id = intval( $_POST['payment_id'] );
						$state = trim( $_POST['payment_state'] );
						$obj_validate->validateparam = array(
								array(
										"input" => $payment_id,
										"require" => "true",
										"message" => Language::get( "wrong_argument" )
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$param = array( );
								$param['payment_state'] = $state;
								$param['payment_info'] = trim( $_POST['payment_info'] );
								$payment_config = "";
								$config_array = explode( ",", $_POST['config_name'] );
								if ( is_array( $config_array ) && !empty( $config_array ) )
								{
										$config_info = array( );
										foreach ( $config_array as $k )
										{
												$config_info[$k] = trim( $_POST[$k] );
										}
										$payment_config = serialize( $config_info );
								}
								$param['payment_config'] = $payment_config;
								$model_payment->update( $payment_id, $param );
								showmessage( Language::get( "payment_edit_success" ), "index.php?act=gold_payment&op=gold_payment" );
						}
				}
				$payment_id = intval( $_GET['payment_id'] );
				$payment = $model_payment->getRow( $payment_id );
				$payment_config = $payment['payment_config'];
				if ( $payment['payment_online'] == "1" && $payment_config != "" )
				{
						$config_array = unserialize( $payment_config );
						Tpl::output( "config_array", $config_array );
				}
				Tpl::output( "payment", $payment );
				Tpl::showpage( "gold_payment.edit" );
		}

		public function paymentOp( )
		{
				$model_payment = model( "payment" );
				$payment_list = $model_payment->getPaymentList( );
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$payment_list = Language::getgbk( $payment_list );
				}
				if ( file_exists( BasePath.DS."api".DS."payment".DS."payment.inc.php" ) )
				{
						require_once( BasePath.DS."api".DS."payment".DS."payment.inc.php" );
				}
				Tpl::output( "payment_inc", $payment_inc );
				Tpl::output( "payment_list", $payment_list );
				Tpl::showpage( "payment.index" );
		}

		public function payment_setOp( )
		{
				$lang = Language::getlangcontent( );
				$obj_validate = new Validate( );
				$obj_validate->validateparam = array(
						array(
								"input" => $_GET['code'],
								"require" => "true",
								"message" => $lang['payment_index_null']
						)
				);
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( $error );
				}
				else
				{
						switch ( $_GET['state'] )
						{
						case "open" :
								$state = "open";
								$msg = $lang['payment_index_enabled'];
								break;
						case "close" :
								$state = "close";
								$msg = $lang['payment_index_disabled'];
								break;
						default :
								showmessage( $lang['payment_index_error'] );
						}
						$model_payment = model( "payment" );
						$model_payment->setPaymentInc( trim( $_GET['code'] ), trim( $_GET['state'] ) );
						showmessage( $msg );
				}
		}

}

?>
