<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class consultingControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "consulting" );
		}

		public function consultingOp( )
		{
				$condition = array( );
				if ( $_GET['form_submit'] == "ok" )
				{
						if ( trim( $_GET['member_name'] != "" ) )
						{
								$condition['member_name'] = trim( $_GET['member_name'] );
						}
						if ( trim( $_GET['consult_content'] != "" ) )
						{
								$condition['consult_content'] = trim( $_GET['consult_content'] );
						}
						Tpl::output( "form_submit", trim( $_GET['form_submit'] ) );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$consult = model( "consult" );
				$consult_list = $consult->getConsultList( $condition, $page, "admin" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "consult_list", $consult_list );
				Tpl::showpage( "consulting.index" );
		}

		public function deleteOp( )
		{
				if ( empty( $_REQUEST['consult_id'] ) )
				{
						showmessage( Language::get( "consulting_del_choose" ) );
				}
				$array_id = array( );
				if ( !empty( $_GET['consult_id'] ) )
				{
						$array_id[] = intval( $_GET['consult_id'] );
				}
				if ( !empty( $_POST['consult_id'] ) )
				{
						$array_id = $_POST['consult_id'];
				}
				$id = array( );
				$id = "'".implode( "','", $array_id )."'";
				$consult = model( "consult" );
				if ( $consult->dropConsult( $id ) )
				{
						showmessage( Language::get( "consulting_del_succ" ) );
				}
				else
				{
						showmessage( Language::get( "consulting_del_fail" ) );
				}
		}

}

?>
