<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class specControl extends SystemControl {
	public function __construct(){
		parent::__construct();
				$FN_-2147483647;
				Language::read( "spec" );
		}

		public function specOp( )
		{
				$lang = Language::getlangcontent( );
				$model_spec = model( "spec" );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$spec_list = $model_spec->specList( array( "order" => "sp_sort asc" ), $page );
				Tpl::output( "spec_list", $spec_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "spec.index" );
		}

		public function spec_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_spec = model( "spec" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['s_name'],
										"require" => "true",
										"message" => $lang['spec_add_name_no_null']
								),
								array(
										"input" => $_POST['s_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['spec_add_sort_no_null']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$spec = array( );
								$spec['sp_name'] = trim( $_POST['s_name'] );
								$spec['sp_format'] = $_POST['s_dtype'];
								$spec['sp_sort'] = trim( $_POST['s_sort'] );
								$spec['sp_value'] = "";
								$spec_val = array( );
								$spec_val = $_POST['s_value'];
								$return = $model_spec->apecAdd( $spec, $spec_val, $_FILES );
								if ( $return )
								{
										$url = array(
												array(
														"url" => "index.php?act=spec&op=spec_add",
														"msg" => $lang['spec_index_continue_to_dd']
												),
												array(
														"url" => "index.php?act=spec&op=spec",
														"msg" => $lang['spec_index_return_type_list']
												)
										);
										showmessage( $lang['spec_index_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['spec_index_add_fail'] );
								}
						}
				}
				Tpl::showpage( "spec.add" );
		}

		public function spec_editOp( )
		{
				if ( empty( $_GET['sp_id'] ) )
				{
						showmessage( $lang['wrong_argument'] );
				}
				$lang = Language::getlangcontent( );
				$model_spec = model( "spec" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['s_name'],
										"require" => "true",
										"message" => $lang['spec_add_name_no_null']
								),
								array(
										"input" => $_POST['s_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['spec_add_sort_no_null']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$string_value = "";
								$spec_val = $_POST['s_value'];
								if ( is_array( $spec_val ) && !empty( $spec_val ) )
								{
										$upload = new UploadFile( );
										$upload->set( "default_dir", ATTACH_SPEC );
										$upload->set( "ifremove", TRUE );
										$upload->set( "thumb_width", "16" );
										$upload->set( "thumb_height", "16" );
										$upload->set( "thumb_ext", "_small" );
										$del_array = array( );
										if ( !empty( $_POST['s_del'] ) )
										{
												$GLOBALS['_POST']['off_shelf'] = "1";
												$del_array = $_POST['s_del'];
										}
										foreach ( $spec_val as $k => $val )
										{
												$upload->set( "file_name", "" );
												$val['name'] = trim( $val['name'] );
												$val['sort'] = intval( $val['sort'] );
												if ( $val['name'] == "" )
												{
														$GLOBALS['_POST']['off_shelf'] = "1";
												}
												if ( isset( $val['form_submit'] ) && $val['form_submit'] == "ok" && !in_array( $k, $del_array ) )
												{
														if ( $_POST['s_dtype'] == "text" )
														{
																if ( isset( $val['image'] ) && $val['image'] != "" )
																{
																		@unlink( BasePath.DS.ATTACH_SPEC.DS.$val['image'] );
																}
																$val['image'] = "";
														}
														else if ( $_POST['s_dtype'] == "image" && !empty( $_FILES["s_value_".$k]['name'] ) )
														{
																if ( isset( $val['image'] ) && $val['image'] != "" )
																{
																		@unlink( BasePath.DS.ATTACH_SPEC.DS.$val['image'] );
																}
																$upload->error = "";
																$result = $upload->upfile( "s_value_".$k );
																if ( !$result )
																{
																		showmessage( $upload->error, "", "", "error" );
																}
																else
																{
																		$val['image'] = $upload->thumb_image;
																}
														}
														$return = $model_spec->specUpdate( array(
																"sp_value_name" => $val['name'],
																"sp_value_image" => $val['image'],
																"sp_value_sort" => $val['sort']
														), array(
																"sp_value_id" => $k,
																"sp_id" => intval( $_POST['sp_id'] )
														), "spec_value" );
														if ( !$return )
														{
																showmessage( $lang['spec_index_update_fail'] );
														}
														$string_value .= $val['name'].",";
												}
												else if ( isset( $val['form_submit'] ) && $val['form_submit'] == "" && !in_array( $k, $del_array ) )
												{
														if ( $_POST['s_dtype'] == "text" )
														{
																if ( isset( $val['image'] ) && $val['image'] != "" )
																{
																		@unlink( BasePath.DS.ATTACH_SPEC.DS.$val['image'] );
																		$return = $model_spec->specUpdate( array(
																				"sp_value_image" => ""
																		), array(
																				"sp_value_id" => $k,
																				"sp_id" => intval( $_POST['sp_id'] )
																		), "spec_value" );
																		if ( !$return )
																		{
																				showmessage( $lang['spec_index_update_fail'] );
																		}
																}
																$val['image'] = "";
														}
														$string_value .= $val['name'].",";
												}
												else if ( !in_array( $k, $del_array ) )
												{
														$val['image'] = "";
														if ( $_POST['s_dtype'] == "image" && !empty( $_FILES["s_value_".$k]['name'] ) )
														{
																$upload = new UploadFile( );
																$upload->set( "ifremove", TRUE );
																$upload->set( "default_dir", ATTACH_SPEC );
																$upload->set( "thumb_width", "16" );
																$upload->set( "thumb_height", "16" );
																$upload->set( "thumb_ext", "_small" );
																$upload->upfile( "s_value_".$k );
																$val['image'] = $upload->thumb_image;
														}
														$val_add = array( );
														$val_add['sp_value_name'] = trim( $val['name'] );
														$val_add['sp_id'] = intval( $_POST['s_id'] );
														$val_add['sp_value_image'] = $val['image'];
														$val_add['sp_value_sort'] = trim( $val['sort'] );
														$return = $model_spec->specValueAdd( $val_add );
														unset( $val_add );
														if ( !$return )
														{
																showmessage( $lang['spec_index_update_fail'] );
														}
														$string_value .= $val['name'].",";
												}
										}
										if ( !empty( $_POST['s_del'] ) )
										{
												$del_id = "\"".implode( "\",\"", $_POST['s_del'] )."\"";
												$model_spec->delSpec( "spec_value", array(
														"in_sp_value_id" => $del_id
												) );
												foreach ( $GLOBALS['_POST']['s_del'] as $val )
												{
														if ( !empty( $_POST['s_value'][$val]['image'] ) )
														{
																@unlink( BasePath.DS.ATTACH_SPEC.DS.$_POST['s_value'][$val]['image'] );
														}
												}
										}
								}
								$param = array( );
								$param['sp_name'] = trim( $_POST['s_name'] );
								$param['sp_format'] = $_POST['s_dtype'];
								$param['sp_value'] = rtrim( $string_value, "," );
								$param['sp_sort'] = intval( $_POST['s_sort'] );
								if ( $_POST['off_shelf'] == "1" )
								{
										$this->offTheShelfProducts( intval( $_POST['s_id'] ) );
								}
								$return = $model_spec->specUpdate( $param, array(
										"sp_id" => intval( $_POST['s_id'] )
								), "spec" );
								if ( $return )
								{
										$url = array(
												array(
														"url" => "index.php?act=spec&op=spec",
														"msg" => $lang['spec_index_return_type_list']
												)
										);
										showmessage( $lang['spec_index_update_succ'], $url );
								}
								else
								{
										showmessage( $lang['spec_index_update_fail'] );
								}
						}
				}
				$spec_list = $model_spec->specList( array(
						"sp_id" => intval( $_GET['sp_id'] )
				) );
				if ( !$spec_list )
				{
						showmessage( $lang['wrong_argument'] );
				}
				$sp_value = $model_spec->specValueList( array(
						"sp_id" => intval( $_GET['sp_id'] ),
						"order" => "sp_value_sort asc"
				) );
				Tpl::output( "sp_value", $sp_value );
				Tpl::output( "sp_list", $spec_list['0'] );
				Tpl::showpage( "spec.edit" );
		}

		public function spec_delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( empty( $_GET['del_id'] ) )
				{
						showmessage( $lang['wrong_argument'] );
				}
				$model_spec = model( "spec" );
				if ( is_array( $_GET['del_id'] ) )
				{
						$id = "'".implode( "','", $_GET['del_id'] )."'";
				}
				else
				{
						$id = intval( $_GET['del_id'] );
				}
				$spec_list = $model_spec->specList( array(
						"in_sp_id" => $id
				) );
				if ( is_array( $spec_list ) && !empty( $spec_list ) )
				{
						foreach ( $spec_list as $val )
						{
								if ( $val['sp_format'] == "image" )
								{
										$sp_value_list = $model_spec->specValueList( array(
												"in_sp_id" => $id
										) );
										if ( !is_array( $sp_value_list ) && empty( $sp_value_list ) )
										{
												foreach ( $sp_value_list as $val )
												{
														@unlink( BasePath.DS.ATTACH_SPEC.DS.$val['sp_value_image'] );
												}
										}
								}
						}
						$return = $model_spec->delSpec( "type_spec", array(
								"in_sp_id" => $id
						) );
						if ( !$return )
						{
								showmessage( $lang['spec_index_del_fail'] );
						}
						$return = $model_spec->delSpec( "spec_value", array(
								"in_sp_id" => $id
						) );
						if ( !$return )
						{
								showmessage( $lang['spec_index_del_fail'] );
						}
						$return = $model_spec->delSpec( "spec", array(
								"in_sp_id" => $id
						) );
						if ( !$return )
						{
								showmessage( $lang['spec_index_del_fail'] );
						}
						$this->offTheShelfProducts( $id );
						showmessage( $lang['spec_index_del_succ'] );
				}
				else
				{
						showmessage( $lang['wrong_argument'] );
				}
		}

		public function ajaxOp( )
		{
				$model_spec = model( "spec" );
				switch ( $_GET['branch'] )
				{
				case "sort" :
				case "name" :
						$return = $model_spec->specUpdate( array(
								$_GET['column'] => trim( $_GET['value'] )
						), array(
								"sp_id" => intval( $_GET['id'] )
						), "spec" );
						if ( $return )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				}
		}

		private function offTheShelfProducts( $s_id )
		{
				$lang = Language::getlangcontent( );
				$model_type = model( "type" );
				if ( is_array( $s_id ) )
				{
						$s_id = implode( ",", $s_id );
				}
				$goods_id_list = $model_type->typeRelatedList( "goods_spec_index", array(
						"in_sp_id" => $s_id
				), "goods_id" );
				if ( is_array( $goods_id_list ) && !empty( $goods_id_list ) )
				{
						$goods_id_array = array( );
						foreach ( $goods_id_list as $val )
						{
								$goods_id_array[] = $val['goods_id'];
						}
						$model_goods = model( "goods" );
						$model_goods->updateGoods( array(
								"goods_state" => "1",
								"goods_show" => "0",
								"goods_close_reason" => $lang['spec_edit_spec_goods_close_reason']
						), $goods_id_array );
				}
		}

}

?>
