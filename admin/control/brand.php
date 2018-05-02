<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class brandControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "brand" );
		}

		public function brandOp( )
		{
				$lang = Language::getlangcontent( );
				$model_brand = model( "brand" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['del_brand_id'] ) )
						{
								if ( is_array( $_POST['del_brand_id'] ) )
								{
										foreach ( $GLOBALS['_POST']['del_brand_id'] as $k => $v )
										{
												$v = intval( $v );
												$brand_array = $model_brand->getOneBrand( $v );
												if ( !empty( $brand_array['brand_pic'] ) )
												{
														@unlink( BasePath.DS.ATTACH_BRAND.DS.$brand_array['brand_pic'] );
												}
												$model_brand->del( $v );
												unset( $brand_array );
										}
								}
								showmessage( $lang['brand_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['brand_index_choose'] );
						}
				}
				$condition['like_brand_name'] = trim( $_GET['search_brand_name'] );
				$condition['like_brand_class'] = trim( $_GET['search_brand_class'] );
				$condition['brand_apply'] = "1";
				$condition['order'] = " brand_id desc ";
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$brand_list = $model_brand->getBrandList( $condition, $page );
				Tpl::output( "page", $page->show( ) );
				Tpl::output( "brand_list", $brand_list );
				Tpl::output( "search_brand_name", trim( $_GET['search_brand_name'] ) );
				Tpl::output( "search_brand_class", trim( $_GET['search_brand_class'] ) );
				Tpl::showpage( "brand.index" );
		}

		public function brand_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_brand = model( "brand" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['brand_name'],
										"require" => "true",
										"message" => $lang['brand_add_name_null']
								),
								array(
										"input" => $_POST['brand_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['brand_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$upload = new UploadFile( );
								$upload->set( "default_dir", ATTACH_BRAND );
								if ( !empty( $_FILES['brand_pic']['name'] ) )
								{
										$result = $upload->upfile( "brand_pic" );
										if ( $result )
										{
												$GLOBALS['_POST']['brand_pic'] = $upload->file_name;
										}
										else
										{
												showmessage( $upload->error, "", "", "error" );
										}
								}
								$insert_array = array( );
								$insert_array['brand_name'] = trim( $_POST['brand_name'] );
								$insert_array['brand_class'] = trim( $_POST['brand_class'] );
								$insert_array['brand_pic'] = trim( $_POST['brand_pic'] );
								$insert_array['brand_recommend'] = trim( $_POST['brand_recommend'] );
								$insert_array['brand_sort'] = intval( $_POST['brand_sort'] );
								$result = $model_brand->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=brand&op=brand_add",
														"msg" => $lang['brand_add_again']
												),
												array(
														"url" => "index.php?act=brand&op=brand",
														"msg" => $lang['brand_add_back_to_list']
												)
										);
										showmessage( $lang['brand_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['brand_add_fail'] );
								}
						}
				}
				Tpl::showpage( "brand.add" );
		}

		public function brand_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_brand = model( "brand" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['brand_name'],
										"require" => "true",
										"message" => $lang['brand_add_name_null']
								),
								array(
										"input" => $_POST['brand_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['brand_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$upload = new UploadFile( );
								$upload->set( "default_dir", ATTACH_BRAND );
								if ( !empty( $_FILES['brand_pic']['name'] ) )
								{
										$result = $upload->upfile( "brand_pic" );
										if ( $result )
										{
												$GLOBALS['_POST']['brand_pic'] = $upload->file_name;
										}
										else
										{
												showmessage( $upload->error, "", "", "error" );
										}
								}
								$update_array = array( );
								$update_array['brand_id'] = intval( $_POST['brand_id'] );
								$update_array['brand_name'] = trim( $_POST['brand_name'] );
								$update_array['brand_class'] = trim( $_POST['brand_class'] );
								if ( !empty( $_POST['brand_pic'] ) )
								{
										$update_array['brand_pic'] = $_POST['brand_pic'];
								}
								$update_array['brand_recommend'] = intval( $_POST['brand_recommend'] );
								$update_array['brand_sort'] = intval( $_POST['brand_sort'] );
								$result = $model_brand->update( $update_array );
								if ( $result )
								{
										if ( !empty( $_POST['brand_pic'] ) || !empty( $_POST['old_brand_pic'] ) )
										{
												@unlink( BasePath.DS.ATTACH_BRAND.DS.$_POST['old_brand_pic'] );
										}
										$url = array(
												array(
														"url" => "index.php?act=brand&op=brand_edit&brand_id=".intval( $_POST['brand_id'] ),
														"msg" => $lang['brand_edit_again']
												),
												array(
														"url" => "index.php?act=brand&op=brand",
														"msg" => $lang['brand_add_back_to_list']
												)
										);
										showmessage( $lang['brand_edit_succ'], $url );
								}
								else
								{
										showmessage( $lang['brand_edit_fail'] );
								}
						}
				}
				$brand_array = $model_brand->getOneBrand( intval( $_GET['brand_id'] ) );
				if ( empty( $brand_array ) )
				{
						showmessage( $lang['wrong_argument'] );
				}
				Tpl::output( "brand_array", $brand_array );
				Tpl::showpage( "brand.edit" );
		}

		public function brand_delOp( )
		{
				$lang = Language::getlangcontent( );
				$model_brand = model( "brand" );
				if ( 0 < intval( $_GET['del_brand_id'] ) )
				{
						$brand_array = $model_brand->getOneBrand( intval( $_GET['del_brand_id'] ) );
						if ( !empty( $brand_array['brand_pic'] ) )
						{
								@unlink( BasePath.DS.ATTACH_BRAND.DS.$brand_array['brand_pic'] );
						}
						$model_brand->del( intval( $_GET['del_brand_id'] ) );
						unset( $brand_array );
						showmessage( $lang['brand_index_del_succ'], "index.php?act=brand&op=brand" );
				}
				else
				{
						showmessage( $lang['brand_index_choose'], "index.php?act=brand&op=brand" );
				}
		}

		public function brand_applyOp( )
		{
				$lang = Language::getlangcontent( );
				$model_brand = model( "brand" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['del_id'] ) )
						{
								switch ( $_POST['type'] )
								{
								case "pass" :
										foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
										{
												$update_array = array( );
												$update_array['brand_id'] = intval( $v );
												$update_array['brand_apply'] = 1;
												$model_brand->update( $update_array );
										}
										showmessage( $lang['brand_apply_passed'] );
										break;
								case "refuse" :
										foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
										{
												$v = intval( $v );
												$brand_array = $model_brand->getOneBrand( $v );
												if ( !empty( $brand_array['brand_pic'] ) )
												{
														@unlink( BasePath.DS.ATTACH_BRAND.DS.$brand_array['brand_pic'] );
												}
												$result = $model_brand->del( $v );
												if ( $result )
												{
														$msg_code = "msg_toseller_brand_refused_notify";
														$param = array(
																"brand_name" => $brand_array['brand_name'],
																"reason" => $lang['brand_apply_wrong']
														);
														$model_store = model( "store" );
														$store_info = $model_store->shopStore( array(
																"store_id" => $brand_array['store_id']
														) );
														self::send_notice( $store_info['member_id'], $msg_code, $param );
												}
												unset( $brand_array );
										}
										showmessage( $lang['brand_index_del_succ'] );
										break;
								default :
										showmessage( $lang['brand_apply_invalid_argument'] );
								}
						}
						else
						{
								showmessage( $lang['brand_index_choose'] );
						}
				}
				$condition['like_brand_name'] = trim( $_POST['search_brand_name'] );
				$condition['like_brand_class'] = trim( $_POST['search_brand_class'] );
				$condition['brand_apply'] = "0";
				$brand_list = $model_brand->getBrandList( $condition );
				Tpl::output( "brand_list", $brand_list );
				Tpl::output( "search_brand_name", trim( $_POST['search_brand_name'] ) );
				Tpl::output( "search_brand_class", trim( $_POST['search_brand_class'] ) );
				Tpl::showpage( "brand.apply" );
		}

		public function brand_apply_setOp( )
		{
				$model_brand = model( "brand" );
				if ( 0 < intval( $_GET['brand_id'] ) )
				{
						switch ( $_GET['state'] )
						{
						case "pass" :
								$update_array = array( );
								$update_array['brand_id'] = intval( $_GET['brand_id'] );
								$update_array['brand_apply'] = 1;
								$result = $model_brand->update( $update_array );
								if ( $result === TRUE )
								{
										$brand_info = $model_brand->getOneBrand( intval( $_GET['brand_id'] ) );
										$msg_code = "msg_toseller_brand_passed_notify";
										$param = array(
												"brand_name" => $brand_info['brand_name']
										);
										$model_store = model( "store" );
										$store_info = $model_store->shopStore( array(
												"store_id" => $brand_info['store_id']
										) );
										self::send_notice( $store_info['member_id'], $msg_code, $param );
										showmessage( Language::get( "brand_apply_pass" ) );
										break;
								}
								else
								{
										showmessage( Language::get( "brand_apply_fail" ) );
								}
						case "refuse" :
								$brand_array = $model_brand->getOneBrand( intval( $_GET['brand_id'] ) );
								if ( !empty( $brand_array['brand_pic'] ) )
								{
										@unlink( BasePath.DS.ATTACH_BRAND.DS.$brand_array['brand_pic'] );
								}
								$model_brand->del( intval( $_GET['brand_id'] ) );
								unset( $brand_array );
								showmessage( Language::get( "brand_apply_delok" ) );
						default :
								do
								{
										showmessage( Language::get( "brand_apply_paramerror" ) );
								} while ( 0 );
						}
				}
				else
				{
						showmessage( Language::get( "brand_apply_brandparamerror" ) );
				}
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "brand_name" :
						$model_brand = model( "brand" );
						$condition['brand_name'] = trim( $_GET['value'] );
						$condition['no_brand_id'] = intval( $_GET['id'] );
						$result = $model_brand->getBrandList( $condition );
						if ( empty( $result ) )
						{
								$update_array = array( );
								$update_array['brand_id'] = intval( $_GET['id'] );
								$update_array['brand_name'] = trim( $_GET['value'] );
								$model_brand->update( $update_array );
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "brand_class" :
				case "brand_sort" :
				case "brand_recommend" :
						$model_brand = model( "brand" );
						$update_array = array( );
						$update_array['brand_id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_brand->update( $update_array );
						echo "true";
						exit( );
				case "check_brand_name" :
						$model_brand = model( "brand" );
						$condition['brand_name'] = trim( $_GET['brand_name'] );
						$condition['no_brand_id'] = intval( $_GET['id'] );
						$result = $model_brand->getBrandList( $condition );
						if ( empty( $result ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				}
		}

}

?>
