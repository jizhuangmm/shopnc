<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class web_apiControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$GLOBALS['_GET'] = Language::getgbk( $_GET );
						$GLOBALS['_POST'] = Language::getgbk( $_POST );
				}
				Language::read( "web_config" );
		}

		public function category_listOp( )
		{
				$model_class = model( "goods_class" );
				$gc_parent_id = intval( $_GET['id'] );
				$gc_parent = $model_class->getOneGoodsClass( $gc_parent_id );
				$goods_class = $model_class->getClassList( array(
						"gc_parent_id" => $gc_parent_id,
						"gc_show" => 1
				) );
				Tpl::output( "gc_parent", $gc_parent );
				Tpl::output( "goods_class", $goods_class );
				Tpl::showpage( "web_goods_class", "null_layout" );
		}

		public function recommend_listOp( )
		{
				$model_goods = model( "goods" );
				$page = new Page( );
				$page->setEachNum( 6 );
				$page->setStyle( "admin" );
				$condition = array( );
				$condition['gc_id'] = intval( $_GET['id'] );
				$condition['keyword'] = trim( $_GET['goods_name'] );
				$condition['goods_show'] = "1";
				$condition['goods_state'] = "0";
				$condition['goods_store_state'] = "0";
				$goods_list = $model_goods->getGoods( $condition, $page, "goods.goods_id,goods.goods_name,goods.store_id,goods.goods_image,goods.goods_store_price", "goods" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "goods_list", $goods_list );
				Tpl::showpage( "web_goods.list", "null_layout" );
		}

		public function goods_listOp( )
		{
				$model_goods = model( "goods" );
				$page = new Page( );
				$page->setEachNum( 6 );
				$page->setStyle( "admin" );
				$condition = array( );
				$condition['gc_id'] = intval( $_GET['id'] );
				$condition['keyword'] = trim( $_GET['goods_name'] );
				$condition['goods_show'] = "1";
				$condition['goods_state'] = "0";
				$condition['goods_store_state'] = "0";
				$condition['order'] = "salenum desc,goods_id desc";
				if ( !empty( $_GET['goods_order'] ) )
				{
						$condition['order'] = $_GET['goods_order']." desc,goods_id desc";
				}
				$goods_list = $model_goods->getGoods( $condition, $page, "goods.goods_id,goods.goods_name,goods.store_id,goods.goods_image,goods.goods_store_price", "goods" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "goods_list", $goods_list );
				Tpl::showpage( "web_goods_order", "null_layout" );
		}

		public function brand_listOp( )
		{
				$model_brand = model( "brand" );
				$condition = array( );
				$condition['brand_apply'] = "1";
				$condition['order'] = " brand_sort,brand_id desc ";
				$page = new Page( );
				$page->setEachNum( 6 );
				$page->setStyle( "admin" );
				$brand_list = $model_brand->getBrandList( $condition, $page );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "brand_list", $brand_list );
				Tpl::showpage( "web_brand.list", "null_layout" );
		}

		public function code_updateOp( )
		{
				$code_id = intval( $_POST['code_id'] );
				$web_id = intval( $_POST['web_id'] );
				$model_web_config = model( "web_config" );
				$code = $model_web_config->getCodeRow( $code_id, $web_id );
				if ( !empty( $code ) )
				{
						$code_type = $code['code_type'];
						$var_name = $code['var_name'];
						$code_info = $_POST[$var_name];
						$code_info = $model_web_config->get_str( $code_info, $code_type );
						$state = $model_web_config->updateCode( array(
								"code_id" => $code_id
						), array(
								"code_info" => $code_info
						) );
				}
				if ( $state )
				{
						echo "1";
						exit( );
				}
				echo "0";
				exit( );
		}

		public function upload_picOp( )
		{
				$code_id = intval( $_POST['code_id'] );
				$web_id = intval( $_POST['web_id'] );
				$model_web_config = model( "web_config" );
				$code = $model_web_config->getCodeRow( $code_id, $web_id );
				if ( !empty( $code ) )
				{
						$code_type = $code['code_type'];
						$var_name = $code['var_name'];
						$code_info = $_POST[$var_name];
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_ADV );
						$upload->set( "fprefix", "web-".$web_id."-".$code_id );
						if ( !empty( $_FILES['pic']['name'] ) )
						{
								$result = $upload->upfile( "pic" );
								if ( $result )
								{
										$code_info['pic'] = ATTACH_ADV."/".$upload->file_name;
								}
						}
						Tpl::output( "var_name", $var_name );
						Tpl::output( "pic", $code_info['pic'] );
						Tpl::output( "type", $code_info['type'] );
						Tpl::output( "ap_id", $code_info['ap_id'] );
						$code_info = $model_web_config->get_str( $code_info, $code_type );
						$state = $model_web_config->updateCode( array(
								"code_id" => $code_id
						), array(
								"code_info" => $code_info
						) );
						Tpl::showpage( "web_upload_pic", "null_layout" );
				}
		}

}

?>
