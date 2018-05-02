<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class fleaControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "flea_index,goods" );
				if ( $GLOBALS['setting_config']['flea_isuse'] != 1 )
				{
						showmessage( Language::get( "flea_index_unable" ), "index.php?act=dashboard&op=welcome" );
				}
		}

		public function fleaOp( )
		{
				$lang = Language::getlangcontent( );
				$model_goods = model( "flea" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['del_id'] ) )
						{
								$model_goods->dropGoods( implode( ",", $_POST['del_id'] ) );
								showmessage( $lang['goods_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['goods_index_choose_del'] );
						}
						showmessage( $lang['goods_index_argument_invalid'] );
				}
				$condition['keyword'] = trim( $_GET['search_goods_name'] );
				$condition['like_member_name'] = trim( $_GET['search_store_name'] );
				$condition['brand_id'] = intval( $_GET['search_brand_id'] );
				$condition['gc_id'] = intval( $_GET['cate_id'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$goods_list = $model_goods->listGoods( $condition, $page );
				$model_class = model( "flea_class" );
				$goods_class = $model_class->getTreeClassList( 1 );
				Tpl::output( "search", $_GET );
				Tpl::output( "goods_class", $goods_class );
				Tpl::output( "goods_list", $goods_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "flea.index" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "goods_name" :
						$model_goods = model( "flea" );
						$update_array = array( );
						$update_array[$_GET['column']] = $_GET['value'];
						$model_goods->updateGoods( $update_array, $_GET['id'] );
						echo "true";
						exit( );
				}
		}

}

?>
