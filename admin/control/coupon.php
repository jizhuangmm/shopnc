<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class couponControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "coupon" );
				switch ( $_POST['submit_type'] )
				{
				case "del" :
						$this->delOp( );
						break;
				case "recommend" :
						$this->recommendOp( );
				}
		}

		public function couponOp( )
		{
				$this->listOp( );
		}

		public function listOp( )
		{
				$lang = Language::getlangcontent( );
				$search = array( );
				if ( trim( $_GET['search_coupon_name'] ) != "" )
				{
						$search['coupon_name_like'] = trim( $_GET['search_coupon_name'] );
				}
				if ( trim( $_GET['search_store_name'] ) != "" )
				{
						$search['store_name'] = trim( $_GET['search_store_name'] );
				}
				if ( $_GET['time_from'] != "" )
				{
						$time = explode( "-", $_GET['time_from'] );
						$search['time_from'] = mktime( 0, 0, 0, $time[1], $time[2], $time[0] );
				}
				if ( $_GET['time_to'] != "" )
				{
						$time = explode( "-", $_GET['time_to'] );
						$search['time_to'] = mktime( 0, 0, 0, $time[1], $time[2], $time[0] );
				}
				if ( $_GET['time_to'] != "" && $_GET['time_from'] != "" && $search['time_to'] < $search['time_from'] )
				{
						$GLOBALS['_GET']['time_from'] = $GLOBALS['_GET']['time_to'] = "";
						showmessage( Language::get( "coupon_time_error" ) );
				}
				if ( $_GET['coupon_class'] != "" )
				{
						$search['coupon_class'] = $_GET['coupon_class'];
				}
				$model_coupon = model( "coupon" );
				$model_coupon->update_coupon( array( "coupon_state" => "1", "coupon_recommend" => 0 ), array( "coupon_state" => "2", "coupon_novalid" => TRUE ) );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition = array( );
				$condition['coupon_allowstate'] = "1";
				$condition = array_merge( $condition, $search );
				$list = $model_coupon->getCoupon( $condition, $page, "store" );
				unset( $condition );
				Tpl::output( "search", $search );
				unset( $search );
				$model_class = model( "coupon_class" );
				$class_list = array( );
				$class_list = $model_class->getCouponClass( array( "order" => "class_sort asc" ) );
				Tpl::output( "class_list", $class_list );
				Tpl::output( "list", $list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "coupon.list" );
		}

		public function applyOp( )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model_coupon = model( "coupon" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$coupon_id = $_POST['coupon_id'];
						if ( is_array( $coupon_id ) && !empty( $coupon_id ) )
						{
								$id = "'".implode( "','", $coupon_id )."'";
								$coupon_array = array( );
								$coupon_array['coupon_allowstate'] = intval( $_POST['coupon_allowstate'] );
								$model_coupon->update_coupon( $coupon_array, array(
										"coupon_id_in" => $id
								) );
								showmessage( Language::get( "coupon_update_success" ), "index.php?act=coupon&op=apply" );
						}
				}
				$condition = array( );
				$condition['coupon_allowstate2'] = "1";
				$list = $model_coupon->getCoupon( $condition, $page, "store" );
				Tpl::output( "list", $list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "coupon_apply.list" );
		}

		public function apply_editOp( )
		{
				$model_coupon = model( "coupon" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$coupon_id = intval( $_POST['coupon_id'] );
						if ( 0 < $coupon_id )
						{
								$coupon_array = array( );
								$coupon_array['coupon_allowstate'] = intval( $_POST['coupon_allowstate'] );
								$coupon_array['coupon_state'] = intval( $_POST['coupon_state'] );
								$coupon_array['coupon_recommend'] = intval( $_POST['coupon_recommend'] );
								$coupon_array['coupon_allowremark'] = $_POST['coupon_allowremark'];
								$model_coupon->update_coupon( $coupon_array, array(
										"coupon_id" => $coupon_id
								) );
								showmessage( Language::get( "coupon_update_success" ), "index.php?act=coupon&op=apply" );
						}
				}
				$coupon_id = intval( $_GET['coupon_id'] );
				$model_coupon = model( "coupon" );
				$coupon_detail = $model_coupon->getOneById( $coupon_id );
				$model_store = model( "store" );
				$store = $model_store->getStoreList( array(
						"store_id" => trim( $coupon_detail['store_id'] )
				) );
				$coupon_detail['store_name'] = $store[0]['store_name'];
				$model_coupon_class = model( "coupon_class" );
				$coupon_class = $model_coupon_class->getCouponClass( array(
						"class_id" => $coupon_detail['coupon_class_id']
				) );
				Tpl::output( "class_name", $coupon_class[0]['class_name'] );
				Tpl::output( "coupon", $coupon_detail );
				Tpl::showpage( "coupon_apply.edit" );
		}

		public function delOp( )
		{
				$lang = Language::getlangcontent( );
				$id = "";
				if ( empty( $_REQUEST['coupon_id'] ) )
				{
						showmessage( Language::get( "coupon_choose" ) );
				}
				if ( is_array( $_POST['coupon_id'] ) )
				{
						$id = "'".implode( "','", $_POST['coupon_id'] )."'";
				}
				else
				{
						$id = intval( $_GET['coupon_id'] );
				}
				$coupon = model( "coupon" );
				$condition = array( );
				$condition['coupon_state'] = "1";
				$condition['coupon_id_in'] = $id;
				if ( $coupon->del_coupon( $condition ) )
				{
						showmessage( Language::get( "coupon_del_success" ) );
				}
				showmessage( Language::get( "coupon_del_fail" ) );
		}

		public function editOp( )
		{
				$id = "";
				if ( empty( $_REQUEST['coupon_id'] ) )
				{
						showmessage( Language::get( "coupon_choose" ) );
				}
				if ( !chksubmit( ) )
				{
						$id = $_REQUEST['coupon_id'];
						$coupon = model( "coupon" );
						$coupon_detail = $coupon->getOneById( $id );
						$model_store = model( "store" );
						$store = $model_store->getStoreList( array(
								"store_id" => trim( $coupon_detail['store_id'] )
						) );
						$coupon_detail['store_name'] = $store[0]['store_name'];
						$model_coupon_class = model( "coupon_class" );
						$coupon_class = $model_coupon_class->getCouponClass( array(
								"class_id" => $coupon_detail['coupon_class_id']
						) );
						Tpl::output( "class_name", $coupon_class[0]['class_name'] );
						Tpl::output( "coupon", $coupon_detail );
						Tpl::showpage( "coupon.edit" );
						exit( );
				}
				$input = array( );
				$input['coupon_state'] = intval( trim( $_POST['coupon_state'] ) );
				if ( $input['coupon_state'] == 1 )
				{
						$input['coupon_recommend'] = 0;
				}
				else
				{
						$input['coupon_recommend'] = trim( $_POST['coupon_recommend'] );
				}
				$coupon = model( "coupon" );
				$result = $coupon->update_coupon( $input, array(
						"coupon_id" => intval( $_POST['coupon_id'] )
				) );
				if ( $result )
				{
						showmessage( Language::get( "coupon_update_success" ), "index.php?act=coupon&op=list" );
				}
				else
				{
						showmessage( Language::get( "coupon_update_fail" ) );
				}
		}

		public function ajaxOp( )
		{
				$branch = trim( $_GET['branch'] );
				switch ( $branch )
				{
				case "check_store_name" :
						$model_store = model( "store" );
						$store = $model_store->getStoreList( array(
								"store_name" => trim( $_GET['store_name'] )
						) );
						if ( is_array( $store ) && !empty( $store ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				}
		}

		public function recommendOp( )
		{
				if ( !is_array( $_POST['coupon_id'] ) && count( $_POST['coupon_id'] ) <= 0 )
				{
						showmessage( Language::get( "coupon_recommend_chooseerror" ), "index.php?act=coupon&op=coupon" );
				}
				$up_arr = array( );
				switch ( $_POST['submit_type'] )
				{
				case "recommend" :
						$up_arr['coupon_recommend'] = 1;
				}
				$coupon_model = model( "coupon" );
				$condition_arr = array( );
				$condition_arr['coupon_id_in'] = "'".implode( "','", $_POST['coupon_id'] )."'";
				$result = $coupon_model->update_coupon( $up_arr, array(
						"coupon_id_in" => $condition_arr['coupon_id_in'],
						"coupon_state" => 2
				) );
				if ( $result )
				{
						showmessage( Language::get( "coupon_recommend_success" ), "index.php?act=coupon&op=coupon" );
				}
				else
				{
						showmessage( Language::get( "coupon_recommend_fail" ), "index.php?act=coupon&op=coupon" );
				}
		}

}

?>
