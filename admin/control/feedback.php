<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class feedbackControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "mobile" );
		}

		public function flistOp( )
		{
				$lang = Language::getlangcontent( );
				$model_link = model( "feedback" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( is_array( $_POST['del_id'] ) && !empty( $_POST['del_id'] ) )
						{
								foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
								{
										$model_link->del( $v );
								}
								showmessage( $lang['feedback_del_succ'] );
						}
						else
						{
								showmessage( $lang['feedback_del_fiald'] );
						}
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$list = $model_link->getList( array( ), $page );
				Tpl::output( "list", $list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "feedback.index" );
		}

		public function delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( 0 < intval( $_GET['id'] ) )
				{
						$model_link = model( "feedback" );
						$model_link->del( intval( $_GET['id'] ) );
						showmessage( $lang['feedback_del_succ'], "index.php?act=feedback&op=flist" );
				}
				else
				{
						showmessage( $lang['feedback_del_fiald'], "index.php?act=feedback&op=flist" );
				}
		}

}

?>
