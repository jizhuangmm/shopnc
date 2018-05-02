<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class pointslogControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "points" );
		}

		public function pointslogOp( )
		{
				$condition_arr = array( );
				$condition_arr['pl_membername_like'] = trim( $_GET['mname'] );
				$condition_arr['pl_adminname_like'] = trim( $_GET['aname'] );
				if ( $_GET['stage'] )
				{
						$condition_arr['pl_stage'] = trim( $_GET['stage'] );
				}
				$condition_arr['saddtime'] = strtotime( $_GET['stime'] );
				$condition_arr['eaddtime'] = strtotime( $_GET['etime'] );
				if ( 0 < $condition_arr['eaddtime'] )
				{
						$condition_arr['eaddtime'] += 86400;
				}
				$condition_arr['pl_desc_like'] = trim( $_GET['description'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$points_model = model( "points" );
				$list_log = $points_model->getPointsLogList( $condition_arr, $page, "*", "" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "list_log", $list_log );
				Tpl::showpage( "pointslog" );
		}

}

?>
