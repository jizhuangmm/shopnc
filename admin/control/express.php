<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class expressControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "express" );
		}

		public function indexOp( )
		{
				$lang = Language::getlangcontent( );
				$model = model( "express" );
				if ( chksubmit( ) )
				{
						if ( !empty( $_POST['del_brand_id'] ) )
						{
								showmessage( $lang['brand_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['brand_index_choose'] );
						}
				}
				$list = $model->page( 10 )->order( "e_order,e_state desc,id" )->select( );
				Tpl::output( "page", $model->showpage( ) );
				Tpl::output( "list", $list );
				Tpl::showpage( "express.index" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "state" :
						$model_brand = model( "express" );
						$update_array = array( );
						$update_array['id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_brand->update( $update_array );
						echo "true";
						exit( );
				case "order" :
						$GLOBALS['_GET']['value'] = $_GET['value'] == 0 ? 2 : 1;
						$model_brand = model( "express" );
						$update_array = array( );
						$update_array['id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_brand->update( $update_array );
						echo "true";
						exit( );
				}
		}

}

?>
