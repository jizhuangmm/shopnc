<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class coupon_classControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "coupon" );
		}

		public function indexOp( )
		{
				$this->listOp( );
		}

		public function coupon_classOp( )
		{
				$this->listOp( );
		}

		public function listOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_REQUEST['form_submit'] == "ok" )
				{
						$id = "";
						if ( empty( $_REQUEST['class_id'] ) )
						{
								showmessage( Language::get( "coupon_class_del" ) );
						}
						if ( is_array( $_POST['class_id'] ) )
						{
								$id = "'".implode( "','", $_POST['class_id'] )."'";
						}
						else
						{
								$id = intval( $_GET['class_id'] );
						}
						$coupon_class = model( "coupon_class" );
						$condition = array( );
						$condition['class_id_in'] = $id;
						$list = array( );
						$list = $coupon_class->getCouponClass( array(
								"class_id_in" => $condition['class_id_in']
						), "", "join" );
						$num = 0;
						if ( !empty( $list ) )
						{
								foreach ( $list as $val )
								{
										$num += $val['num'];
								}
						}
						if ( 0 < $num )
						{
								showmessage( Language::get( "coupon_class_del_error" ) );
						}
						if ( $coupon_class->delCouponClass( $condition ) )
						{
								showmessage( Language::get( "coupon_del_success" ) );
						}
						showmessage( Language::get( "coupon_del_fail" ) );
				}
				$page = new Page( );
				$page->setEachNum( 8 );
				$page->setStyle( "admin" );
				$model_coupon_class = model( "coupon_class" );
				$class_list = $model_coupon_class->getCouponClass( array( "order" => "class_sort asc,class_id desc" ), $page );
				Tpl::output( "list", $class_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "coupon_class.list" );
		}

		public function updateOp( )
		{
				$lang = Language::getlangcontent( );
				$coupon_class = model( "coupon_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$update = array( );
						$update['class_name'] = trim( $_POST['class_name'] );
						$update['class_sort'] = intval( $_POST['class_sort'] );
						$update['class_show'] = $_POST['class_show'];
						$validate = new Validate( );
						$validate->validateparam = array(
								array(
										"input" => trim( $_POST['class_name'] ),
										"require" => TRUE,
										"message" => Language::get( "coupon_class_name_null" )
								),
								array(
										"input" => $_POST['class_sort'],
										"require" => TRUE,
										"validator" => "Range",
										"min" => 0,
										"max" => 255,
										"message" => Language::get( "coupon_class_sort_null" )
								)
						);
						$error = $validate->validate( );
						if ( $error )
						{
								showmessage( $error );
						}
						if ( 0 < intval( $_POST['class_id'] ) )
						{
								$list = $coupon_class->getCouponClass( array(
										"class_id" => intval( $_POST['class_id'] )
								), "", "join" );
								if ( $_POST['class_show'] == 0 && 0 < $list[0]['num'] )
								{
										showmessage( Language::get( "coupon_class_edit_error" ) );
								}
								$rs = $coupon_class->updateCouponClass( $update, array(
										"class_id" => intval( $_POST['class_id'] )
								) );
						}
						else
						{
								$rs = $coupon_class->addCouponClass( $update );
						}
						$rs ? showmessage( Language::get( "coupon_class_success" ), "index.php?act=coupon_class" ) : showmessage( Language::get( "coupon_class_fail" ) );
				}
				if ( 0 < intval( $_GET['class_id'] ) )
				{
						$class_detail = $coupon_class->getCouponClass( array(
								"class_id" => intval( $_GET['class_id'] )
						) );
						if ( is_array( $class_detail ) && !empty( $class_detail ) )
						{
								Tpl::output( "class", $class_detail[0] );
								Tpl::output( "type", "edit" );
								Tpl::showpage( "coupon_class.detail" );
						}
						else
						{
								showmessage( Language::get( "coupon_class_null_error" ) );
								exit( );
						}
				}
				Tpl::output( "type", "add" );
				Tpl::showpage( "coupon_class.detail" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "coupon_class_name" :
						if ( trim( $_GET['class_name'] ) == trim( $_GET['old_name'] ) )
						{
								echo "true";
								exit( );
						}
						$model_class = model( "coupon_class" );
						$class_array = $model_class->getCouponClass( array(
								"class_name" => $_GET['class_name']
						) );
						if ( empty( $class_array ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				}
		}

}

?>
