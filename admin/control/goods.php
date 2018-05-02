<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class goodsControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "goods" );
		}

		public function goodsOp( )
		{
				$lang = Language::getlangcontent( );
				$model_goods = model( "goods" );
				if ( chksubmit( ) )
				{
						switch ( $_POST['type'] )
						{
						case "recommend" :
								if ( !empty( $_POST['del_id'] ) )
								{
										@header( "Location: index.php?act=goods&op=goods_recommend&goods_id=".@implode( ",", $_POST['del_id'] ) );
										exit( );
								}
								showmessage( $lang['goods_index_choose_recommend'] );
								break;
						case "edit" :
								if ( !empty( $_POST['del_id'] ) )
								{
										if ( $_POST['goods_state'] == "0" )
										{
												@header( "Location: index.php?act=goods&op=goods_edit&goods_id=".@implode( ",", $_POST['del_id'] )."&goods_state=0" );
												exit( );
										}
										@header( "Location: index.php?act=goods&op=goods_edit&goods_id=".@implode( ",", $_POST['del_id'] ) );
										exit( );
								}
								showmessage( $lang['goods_index_choose_edit'] );
								exit( );
						case "del" :
								if ( !empty( $_POST['del_id'] ) )
								{
										if ( !empty( $_POST['del_id'] ) || is_array( $_POST['del_id'] ) )
										{
												foreach ( $GLOBALS['_POST']['del_id'] as $goods_id )
												{
														$goods_id = intval( $goods_id );
														$goods_info = $model_goods->getGoods( array(
																"goods_id" => $goods_id
														) );
														$msg_code = "msg_toseller_goods_droped_notify";
														$param = array(
																"goods_name" => $goods_info[0]['goods_name'],
																"reason" => $lang['goods_index_goods_vialotion']
														);
														$model_store = model( "store" );
														$store_info = $model_store->shopStore( array(
																"store_id" => $goods_info[0]['store_id']
														) );
														self::send_notice( $store_info['member_id'], $msg_code, $param );
												}
										}
										$model_goods->dropGoods( implode( ",", $_POST['del_id'] ) );
										showmessage( $lang['goods_index_del_succ'] );
								}
								else
								{
										showmessage( $lang['goods_index_choose_del'] );
										break;
								}
						default :
								showmessage( $lang['goods_index_argument_invalid'] );
						}
				}
				$condition['keyword'] = trim( $_GET['search_goods_name'] );
				$condition['like_store_name'] = trim( $_GET['search_store_name'] );
				$condition['brand_id'] = intval( $_GET['search_brand_id'] );
				$condition['gc_id'] = intval( $_GET['cate_id'] );
				if ( $_GET['search_show'] == "0" || $_GET['search_show'] == "1" )
				{
						$condition['goods_show'] = $_GET['search_show'];
				}
				if ( $_GET['search_lock'] == "0" || $_GET['search_lock'] == "1" )
				{
						$condition['goods_state'] = $_GET['search_lock'];
				}
				if ( $_GET['goods_state'] == "1" )
				{
						$condition['goods_state'] = "1";
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$goods_list = $model_goods->getGoodsList( $condition, $page );
				$model_class = model( "goods_class" );
				$goods_class = $model_class->getTreeClassList( 1 );
				$model_brand = model( "brand" );
				$condition['brand_apply'] = "1";
				$brand_list = $model_brand->getBrandList( $condition );
				Tpl::output( "search", $_GET );
				Tpl::output( "goods_class", $goods_class );
				Tpl::output( "goods_list", $goods_list );
				Tpl::output( "brand_list", $brand_list );
				Tpl::output( "page", $page->show( ) );
				if ( $_GET['goods_state'] == "1" )
				{
						Tpl::showpage( "goods.close" );
				}
				else
				{
						Tpl::showpage( "goods.index" );
				}
		}

		public function goods_recommendOp( )
		{
				$lang = Language::getlangcontent( );
				$model_recommend = model( "recommend" );
				$model_goods = model( "goods" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['recommend_id'],
										"require" => "true",
										"message" => $lang['goods_recommend_choose_type']
								),
								array(
										"input" => $_POST['goods_id'],
										"require" => "true",
										"message" => $lang['goods_recommend_goods_null']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$tmp = explode( ",", $_POST['goods_id'] );
								if ( is_array( $tmp ) )
								{
										foreach ( $tmp as $k => $v )
										{
												$count = $model_recommend->getCount( array(
														"recommend_id" => $_POST['recommend_id'],
														"goods_id" => $v
												) );
												if ( $count <= 0 )
												{
														$insert_array = array( );
														$insert_array['recommend_id'] = $_POST['recommend_id'];
														$insert_array['goods_id'] = $v;
														$model_recommend->addRecommendGoods( $insert_array );
														unset( $insert_array );
												}
										}
								}
								showmessage( $lang['goods_recommend_succ'], "index.php?act=goods&op=goods" );
						}
				}
				if ( empty( $_GET['goods_id'] ) )
				{
						showmessage( $lang['goods_recommend_choose_goods'] );
				}
				$recommend_list = $model_recommend->getRecommendList( $condition );
				if ( empty( $recommend_list ) )
				{
						showmessage( $lang['goods_recommend_type_null'], "index.php?act=recommend&op=recommend_add" );
				}
				Tpl::output( "recommend_list", $recommend_list );
				Tpl::output( "goods_id", $_GET['goods_id'] );
				Tpl::showpage( "goods.recommend" );
		}

		public function goods_editOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( empty( $_POST['goods_id'] ) )
						{
								showmessage( $lang['goods_edit_goods_null'] );
						}
						$model_goods = model( "goods" );
						$tmp = explode( ",", $_POST['goods_id'] );
						if ( is_array( $tmp ) )
						{
								$update_array = array( );
								if ( !empty( $_POST['cate_id'] ) )
								{
										$update_array['gc_id'] = $_POST['cate_id'];
										$update_array['gc_name'] = $_POST['cate_name'];
								}
								if ( !empty( $_POST['brand_id'] ) )
								{
										$update_array['brand_id'] = $_POST['brand_id'];
								}
								if ( 0 <= $_POST['set_goods_state'] )
								{
										$update_array['goods_state'] = $_POST['set_goods_state'];
										$update_array['goods_close_reason'] = "";
										if ( $_POST['set_goods_state'] == 1 )
										{
												$update_array['goods_close_reason'] = $_POST['goods_close_reason'];
												$update_array['goods_show'] = "0";
										}
								}
								if ( !empty( $update_array ) )
								{
										foreach ( $tmp as $k => $v )
										{
												$model_goods->updateGoods( $update_array, $v );
										}
								}
						}
						if ( $_POST['goods_state'] == "0" )
						{
								showmessage( $lang['goods_edit_batch_succ'], "index.php?act=goods&op=goods&goods_state=0" );
						}
						else
						{
								showmessage( $lang['goods_edit_batch_succ'], "index.php?act=goods&op=goods" );
						}
				}
				if ( empty( $_GET['goods_id'] ) )
				{
						showmessage( $lang['goods_edit_goods_null'] );
				}
				$model_class = model( "goods_class" );
				$goods_class = $model_class->getTreeClassList( 1 );
				$model_brand = model( "brand" );
				$condition['brand_apply'] = "1";
				$brand_list = $model_brand->getBrandList( $condition );
				Tpl::output( "goods_class", $goods_class );
				Tpl::output( "brand_list", $brand_list );
				Tpl::output( "goods_id", $_GET['goods_id'] );
				Tpl::output( "goods_state", $_GET['goods_state'] );
				Tpl::showpage( "goods.edit" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "goods_name" :
						$model_goods = model( "goods" );
						$update_array = array( );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_goods->updateGoods( $update_array, intval( $_GET['id'] ) );
						echo "true";
						exit( );
				case "goods_show" :
						$model_goods = model( "goods" );
						$update_array = array( );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_goods->updateGoods( $update_array, intval( $_GET['id'] ) );
						echo "true";
						exit( );
				case "goods_state" :
						$model_goods = model( "goods" );
						$update_array = array( );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						if ( $_GET['value'] == 1 )
						{
								$update_array['goods_show'] = "0";
						}
						$model_goods->updateGoods( $update_array, intval( $_GET['id'] ) );
						echo "true";
						exit( );
				}
		}

}

?>
