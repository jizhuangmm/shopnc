<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class show_picsControl extends SystemControl
{

		public function indexOp( )
		{
				$type = trim( $_GET['type'] );
				if ( empty( $_GET['pics'] ) )
				{
						$this->goto_index( );
				}
				$pics = explode( "|", trim( $_GET['pics'] ) );
				$pic_path = "";
				switch ( $type )
				{
				case "inform" :
						$pic_path = SiteUrl."/upload/inform/";
						break;
				case "complain" :
						$pic_path = SiteUrl."/upload/complain/";
						break;
						$this->goto_index( );
				}
				Tpl::output( "pic_path", $pic_path );
				Tpl::output( "pics", $pics );
				Tpl::showpage( "show_pics", "blank_layout" );
		}

		private function goto_index( )
		{
				@header( "Location: index.php" );
				exit( );
		}

}

?>
