<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class cacheControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "cache" );
		}

		public function clearOp( )
		{
				$lang = Language::getlangcontent( );
				if ( chksubmit( ) )
				{
						if ( $_POST['cls_full'] == 1 )
						{
								h( "setting", TRUE );
								h( "goods_class", TRUE );
								h( "link", TRUE );
								h( "seo", TRUE );
								h( "goods_class_seo", TRUE );
								h( "class_tag", TRUE );
								h( "groupbuy", TRUE );
								h( "nav", TRUE );
								h( "express", TRUE );
								h( "store_class", TRUE );
								h( "store_grade", TRUE );
								model( "adv" )->cls( );
								delcachefile( "fields" );
								delcachefile( "index" );
								showmessage( $lang['cache_cls_ok'] );
								exit( );
						}
						if ( @in_array( "setting", $_POST['cache'] ) )
						{
								h( "setting", TRUE );
						}
						if ( @in_array( "goodsclass", $_POST['cache'] ) )
						{
								h( "goods_class", TRUE );
								h( "class_tag", TRUE );
						}
						if ( @in_array( "adv", $_POST['cache'] ) )
						{
								model( "adv" )->cls( );
						}
						if ( @in_array( "groupbuy", $_POST['cache'] ) )
						{
								h( "groupbuy", TRUE );
						}
						if ( @in_array( "nav", $_POST['cache'] ) )
						{
								h( "nav", TRUE );
						}
						if ( @in_array( "link", $_POST['cache'] ) )
						{
								h( "link", TRUE );
						}
						if ( @in_array( "index", $_POST['cache'] ) )
						{
								delcachefile( "index" );
						}
						if ( @in_array( "table", $_POST['cache'] ) )
						{
								delcachefile( "fields" );
						}
						if ( @in_array( "seo", $_POST['cache'] ) )
						{
								h( "seo", TRUE );
								h( "goods_class_seo", TRUE );
						}
						if ( @in_array( "express", $_POST['cache'] ) )
						{
								h( "express", TRUE );
						}
						if ( @in_array( "store_class", $_POST['cache'] ) )
						{
								h( "store_class", TRUE );
						}
						if ( @in_array( "store_grade", $_POST['cache'] ) )
						{
								h( "store_grade", TRUE );
						}
						showmessage( $lang['cache_cls_ok'] );
				}
				Tpl::showpage( "cache.clear" );
		}

}

?>
