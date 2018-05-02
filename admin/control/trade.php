<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class tradeControl extends SystemControl
{

		public function order_manageOp( )
		{
				Language::read( "trade" );
				$lang = Language::getlangcontent( );
				$condition = array( );
				$filterd = FALSE;
				if ( trim( $_GET['search_name'] ) != "" && trim( $_GET['field'] ) != "" )
				{
						$condition[$_GET['field']] = trim( $_GET['search_name'] );
						$filterd = TRUE;
				}
				if ( in_array( $_GET['status'], array( "0", "10", "11", "20", "30", "40", "50" ) ) )
				{
						$condition['status'] = $_GET['status'];
						$filterd = TRUE;
				}
				if ( trim( $_GET['add_time_from'] ) != "" )
				{
						$add_time_from = strtotime( trim( $_GET['add_time_from'] ) );
						if ( $add_time_from !== FALSE )
						{
								$condition['add_time_from'] = $add_time_from;
								unset( $add_time_from );
								$filterd = TRUE;
						}
				}
				if ( trim( $_GET['add_time_to'] ) != "" )
				{
						$add_time_to = strtotime( trim( $_GET['add_time_to'] ) );
						if ( $add_time_to !== FALSE )
						{
								$condition['add_time_to'] = $add_time_to + 86400;
								unset( $add_time_to );
								$filterd = TRUE;
						}
				}
				if ( trim( $_GET['order_amount_from'] ) != "" )
				{
						$condition['order_amount_from'] = trim( $_GET['order_amount_from'] );
						$filterd = TRUE;
				}
				if ( trim( $_GET['order_amount_to'] ) != "" )
				{
						$condition['order_amount_to'] = trim( $_GET['order_amount_to'] );
						$filterd = TRUE;
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$order = model( "order" );
				$order_list = $order->getOrderList( $condition, $page );
				Tpl::output( "order_list", $order_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "search", $_GET );
				Tpl::output( "filterd", $filterd );
				Tpl::showpage( "order.index" );
		}

		public function show_orderOp( )
		{
				Language::read( "trade" );
				$lang = Language::getlangcontent( );
				if ( empty( $_GET['order_id'] ) )
				{
						showmessage( $lang['miss_order_number'] );
				}
				$order_id = intval( $_GET['order_id'] );
				$order = model( "order" );
				$list = $order->OrderGoodsList( array(
						"order_id" => $order_id
				) );
				Tpl::output( "list", $list );
				Tpl::showpage( "order.view" );
		}

}

?>
