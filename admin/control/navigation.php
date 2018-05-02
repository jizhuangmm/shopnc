<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class navigationControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "navigation" );
		}

		public function navigationOp( )
		{
				$lang = Language::getlangcontent( );
				$model_navigation = model( "navigation" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( is_array( $_POST['del_id'] ) && !empty( $_POST['del_id'] ) )
						{
								$del_str = implode( ",", $_POST['del_id'] );
								$where = "where nav_id in (".$del_str.")";
								Db::delete( "navigation", $where );
								showmessage( $lang['navigation_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['navigation_index_choose_del'] );
						}
				}
				$condition['like_nav_title'] = trim( $_GET['search_nav_title'] );
				$condition['nav_location'] = trim( $_GET['search_nav_location'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$navigation_list = $model_navigation->getNavigationList( $condition, $page );
				if ( is_array( $navigation_list ) )
				{
						foreach ( $navigation_list as $k => $v )
						{
								switch ( $v['nav_location'] )
								{
								case "0" :
										$navigation_list[$k]['nav_location'] = $lang['navigation_index_top'];
										break;
								case "1" :
										$navigation_list[$k]['nav_location'] = $lang['navigation_index_center'];
										break;
								case "2" :
										$navigation_list[$k]['nav_location'] = $lang['navigation_index_bottom'];
								}
								switch ( $v['nav_new_open'] )
								{
								case "0" :
										$navigation_list[$k]['nav_new_open'] = $lang['nc_no'];
										break;
								case "1" :
										$navigation_list[$k]['nav_new_open'] = $lang['nc_yes'];
								}
						}
				}
				Tpl::output( "navigation_list", $navigation_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::output( "search_nav_title", trim( $_GET['search_nav_title'] ) );
				Tpl::output( "search_nav_location", trim( $_GET['search_nav_location'] ) );
				Tpl::showpage( "navigation.index" );
		}

		public function navigation_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_navigation = model( "navigation" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['nav_title'],
										"require" => "true",
										"message" => $lang['navigation_add_partner_null']
								),
								array(
										"input" => $_POST['nav_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['navigation_add_sort_int']
								)
						);
						switch ( $_POST['nav_type'] )
						{
						case "0" :
						case "1" :
								$obj_validate->setValidate( array(
										"input" => $_POST['goods_class_id'],
										"require" => "true",
										"message" => $lang['navigation_add_goods_class_null']
								) );
								break;
						case "2" :
								$obj_validate->setValidate( array(
										"input" => $_POST['article_class_id'],
										"require" => "true",
										"message" => $lang['navigation_add_article_class_null']
								) );
								break;
						case "3" :
								$obj_validate->setValidate( array(
										"input" => $_POST['activity_id'],
										"require" => "true",
										"message" => $lang['navigation_add_activity_null']
								) );
						}
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$insert_array = array( );
								$insert_array['nav_type'] = trim( $_POST['nav_type'] );
								$insert_array['nav_title'] = trim( $_POST['nav_title'] );
								$insert_array['nav_location'] = trim( $_POST['nav_location'] );
								$insert_array['nav_new_open'] = trim( $_POST['nav_new_open'] );
								$insert_array['nav_sort'] = trim( $_POST['nav_sort'] );
								switch ( $_POST['nav_type'] )
								{
								case "0" :
										$insert_array['nav_url'] = trim( $_POST['nav_url'] );
										break;
								case "1" :
										$insert_array['item_id'] = intval( $_POST['goods_class_id'] );
										break;
								case "2" :
										$insert_array['item_id'] = intval( $_POST['article_class_id'] );
										break;
								case "3" :
										$insert_array['item_id'] = intval( $_POST['activity_id'] );
								}
								$result = $model_navigation->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=navigation&op=navigation_add",
														"msg" => $lang['navigation_add_again']
												),
												array(
														"url" => "index.php?act=navigation&op=navigation",
														"msg" => $lang['navigation_add_back_to_list']
												)
										);
										showmessage( $lang['navigation_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['navigation_add_fail'] );
								}
						}
				}
				$model_goods_class = model( "goods_class" );
				$goods_class_list = $model_goods_class->getTreeClassList( 3 );
				if ( is_array( $goods_class_list ) )
				{
						foreach ( $goods_class_list as $k => $v )
						{
								$goods_class_list[$k]['gc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['gc_name'];
						}
				}
				$model_article_class = model( "article_class" );
				$article_class_list = $model_article_class->getTreeClassList( 2 );
				if ( is_array( $article_class_list ) )
				{
						foreach ( $article_class_list as $k => $v )
						{
								$article_class_list[$k]['ac_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['ac_name'];
						}
				}
				$activity = model( "activity" );
				$activity_list = $activity->getList( array( "opening" => TRUE, "order" => "activity.activity_sort" ) );
				Tpl::output( "activity_list", $activity_list );
				Tpl::output( "goods_class_list", $goods_class_list );
				Tpl::output( "article_class_list", $article_class_list );
				Tpl::showpage( "navigation.add" );
		}

		public function navigation_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_navigation = model( "navigation" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['nav_title'],
										"require" => "true",
										"message" => $lang['navigation_add_partner_null']
								),
								array(
										"input" => $_POST['nav_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['navigation_add_sort_int']
								)
						);
						switch ( $_POST['nav_type'] )
						{
						case "0" :
						case "1" :
								$obj_validate->setValidate( array(
										"input" => $_POST['goods_class_id'],
										"require" => "true",
										"message" => $lang['navigation_add_goods_class_null']
								) );
								break;
						case "2" :
								$obj_validate->setValidate( array(
										"input" => $_POST['article_class_id'],
										"require" => "true",
										"message" => $lang['navigation_add_article_class_null']
								) );
						}
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$update_array = array( );
								$update_array['nav_id'] = intval( $_POST['nav_id'] );
								$update_array['nav_type'] = trim( $_POST['nav_type'] );
								$update_array['nav_title'] = trim( $_POST['nav_title'] );
								$update_array['nav_location'] = trim( $_POST['nav_location'] );
								$update_array['nav_new_open'] = trim( $_POST['nav_new_open'] );
								$update_array['nav_sort'] = trim( $_POST['nav_sort'] );
								switch ( $_POST['nav_type'] )
								{
								case "0" :
										$update_array['nav_url'] = trim( $_POST['nav_url'] );
										break;
								case "1" :
										$update_array['item_id'] = intval( $_POST['goods_class_id'] );
										break;
								case "2" :
										$update_array['item_id'] = intval( $_POST['article_class_id'] );
										break;
								case "3" :
										$update_array['item_id'] = intval( $_POST['activity_id'] );
								}
								$result = $model_navigation->update( $update_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=navigation&op=navigation_edit&nav_id=".intval( $_POST['nav_id'] ),
														"msg" => $lang['navigation_edit_again']
												),
												array(
														"url" => "index.php?act=navigation&op=navigation",
														"msg" => $lang['navigation_add_back_to_list']
												)
										);
										showmessage( $lang['navigation_edit_succ'], $url );
								}
								else
								{
										showmessage( $lang['navigation_edit_fail'] );
								}
						}
				}
				$navigation_array = $model_navigation->getOneNavigation( intval( $_GET['nav_id'] ) );
				if ( empty( $navigation_array ) )
				{
						showmessage( $lang['wrong_argument'] );
				}
				$model_goods_class = model( "goods_class" );
				$goods_class_list = $model_goods_class->getTreeClassList( 3 );
				if ( is_array( $goods_class_list ) )
				{
						foreach ( $goods_class_list as $k => $v )
						{
								$goods_class_list[$k]['gc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['gc_name'];
						}
				}
				$model_article_class = model( "article_class" );
				$article_class_list = $model_article_class->getTreeClassList( 2 );
				if ( is_array( $article_class_list ) )
				{
						foreach ( $article_class_list as $k => $v )
						{
								$article_class_list[$k]['ac_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['ac_name'];
						}
				}
				$activity = model( "activity" );
				$activity_list = $activity->getList( array( "opening" => TRUE, "order" => "activity.activity_sort" ) );
				Tpl::output( "activity_list", $activity_list );
				Tpl::output( "navigation_array", $navigation_array );
				Tpl::output( "goods_class_list", $goods_class_list );
				Tpl::output( "article_class_list", $article_class_list );
				Tpl::showpage( "navigation.edit" );
		}

		public function navigation_delOp( )
		{
				$lang = Language::getlangcontent( );
				$model_navigation = model( "navigation" );
				if ( 0 < intval( $_GET['nav_id'] ) )
				{
						$model_navigation->del( intval( $_GET['nav_id'] ) );
						showmessage( $lang['navigation_index_del_succ'], "index.php?act=navigation&op=navigation" );
				}
				else
				{
						showmessage( $lang['navigation_index_choose_del'], "index.php?act=navigation&op=navigation" );
				}
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "nav_sort" :
						$model_navigation = model( "navigation" );
						$update_array = array( );
						$update_array['nav_id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$result = $model_navigation->update( $update_array );
						echo "true";
						exit( );
				}
		}

}

?>
