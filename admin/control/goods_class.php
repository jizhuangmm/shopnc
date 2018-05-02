<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class goods_classControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "goods_class" );
		}

		public function goods_classOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( $_POST['submit_type'] == "del" )
						{
								if ( !empty( $_POST['check_gc_id'] ) )
								{
										if ( is_array( $_POST['check_gc_id'] ) )
										{
												$del_array = $model_class->getChildClass( $_POST['check_gc_id'] );
												if ( is_array( $del_array ) )
												{
														foreach ( $del_array as $k => $v )
														{
																$model_class->del( $v['gc_id'] );
																$this->offTheShelfProducts( intval( $_GET['gc_id'] ) );
																$model_class_tag = model( "goods_class_tag" );
																$model_class_tag->delByCondition( array(
																		"gc_condition" => $v['gc_id']
																) );
														}
												}
										}
										showmessage( $lang['goods_class_index_del_succ'] );
								}
								else
								{
										showmessage( $lang['goods_class_index_choose_del'] );
								}
						}
						if ( $_POST['submit_type'] == "index_show" || $_POST['submit_type'] == "index_hide" )
						{
								if ( !empty( $_POST['check_gc_id'] ) )
								{
										if ( is_array( $_POST['check_gc_id'] ) )
										{
												$param = array( );
												$param['gc_index_show'] = $_POST['submit_type'] == "index_show" ? "1" : "0";
												foreach ( $GLOBALS['_POST']['check_gc_id'] as $k => $v )
												{
														$param['gc_id'] = intval( $v );
														$model_class->goodsClassUpdate( $param );
												}
										}
										showmessage( $lang['goods_class_index_in_homepage'].( $_POST['submit_type'] == "index_show" ? $lang['goods_class_index_display'] : $lang['goods_class_index_hide'] ).$lang['goods_class_index_succ'] );
								}
								else
								{
										showmessage( $lang['goods_class_index_choose_in_homepage'].( $_POST['submit_type'] == "index_show" ? $lang['goods_class_index_display'] : $lang['goods_class_index_hide'] ).$lang['goods_class_index_content'] );
								}
						}
				}
				$parent_id = $_GET['gc_parent_id'] ? intval( $_GET['gc_parent_id'] ) : 0;
				$tmp_list = $model_class->getTreeClassList( 3 );
				if ( is_array( $tmp_list ) )
				{
						foreach ( $tmp_list as $k => $v )
						{
								if ( $v['gc_parent_id'] == $parent_id )
								{
										if ( $v['deep'] < $tmp_list[$k + 1]['deep'] )
										{
												$v['have_child'] = 1;
										}
										$class_list[] = $v;
								}
						}
				}
				if ( $_GET['ajax'] == "1" )
				{
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$class_list = Language::getutf8( $class_list );
						}
						$output = json_encode( $class_list );
						print_r( $output );
						exit( );
				}
				Tpl::output( "class_list", $class_list );
				Tpl::showpage( "goods_class.index" );
		}

		public function goods_class_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['gc_name'],
										"require" => "true",
										"message" => $lang['goods_class_add_name_null']
								),
								array(
										"input" => $_POST['gc_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['goods_class_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$insert_array = array( );
								$insert_array['gc_name'] = trim( $_POST['gc_name'] );
								$insert_array['type_id'] = intval( $_POST['t_id'] );
								$insert_array['type_name'] = trim( $_POST['t_name'] );
								$insert_array['gc_parent_id'] = intval( $_POST['gc_parent_id'] );
								$insert_array['gc_sort'] = intval( $_POST['gc_sort'] );
								$insert_array['gc_show'] = intval( $_POST['gc_show'] );
								$insert_array['gc_index_show'] = intval( $_POST['gc_index_show'] );
								$insert_array['gc_keywords'] = $_POST['gc_keywords'];
								$insert_array['gc_description'] = $_POST['gc_description'];
								$result = $model_class->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=goods_class&op=goods_class_add&gc_parent_id=".$_POST['gc_parent_id'],
														"msg" => $lang['goods_class_add_again']
												),
												array(
														"url" => "index.php?act=goods_class&op=goods_class",
														"msg" => $lang['goods_class_add_back_to_list']
												)
										);
										showmessage( $lang['goods_class_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['goods_class_add_fail'] );
								}
						}
				}
				$parent_list = $model_class->getTreeClassList( 2 );
				if ( is_array( $parent_list ) )
				{
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['gc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['gc_name'];
						}
				}
				$model_type = model( "type" );
				$type_list = $model_type->typeList( array( "order" => "type_sort asc" ), "", "type_id,type_name" );
				Tpl::output( "type_list", $type_list );
				Tpl::output( "gc_parent_id", $_GET['gc_parent_id'] );
				Tpl::output( "parent_list", $parent_list );
				Tpl::showpage( "goods_class.add" );
		}

		public function goods_class_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['gc_name'],
										"require" => "true",
										"message" => $lang['goods_class_add_name_null']
								),
								array(
										"input" => $_POST['gc_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['goods_class_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						if ( $_POST['t_sign'] == "ok" )
						{
								$this->offTheShelfProducts( intval( $_POST['gc_id'] ) );
						}
						$update_array = array( );
						$update_array['gc_id'] = intval( $_POST['gc_id'] );
						$update_array['gc_name'] = trim( $_POST['gc_name'] );
						$update_array['type_id'] = intval( $_POST['t_id'] );
						$update_array['type_name'] = trim( $_POST['t_name'] );
						$update_array['gc_sort'] = intval( $_POST['gc_sort'] );
						$update_array['gc_show'] = intval( $_POST['gc_show'] );
						$update_array['gc_index_show'] = intval( $_POST['gc_index_show'] );
						$update_array['gc_keywords'] = $_POST['gc_keywords'];
						$update_array['gc_description'] = $_POST['gc_description'];
						$result = $model_class->goodsClassUpdate( $update_array );
						if ( !$result )
						{
								showmessage( $lang['goods_class_batch_edit_fail'] );
						}
						if ( isset( $_POST['t_associated'] ) && $_POST['t_associated'] == "1" )
						{
								$gc_id_list = $model_class->getChildClass( $_POST['gc_id'] );
								if ( is_array( $gc_id_list ) && !empty( $gc_id_list ) )
								{
										$gc_id_str = "";
										foreach ( $gc_id_list as $val )
										{
												$gc_id_str .= $val['gc_id'].",";
										}
										$gc_id_str = rtrim( $gc_id_str, "," );
										$this->offTheShelfProducts( $gc_id_str );
										$model_class->updateWhere( array(
												"type_id" => intval( $_POST['t_id'] ),
												"type_name" => trim( $_POST['t_name'] )
										), array(
												"in_gc_id" => $gc_id_str
										) );
								}
						}
						$url = array(
								array(
										"url" => "index.php?act=goods_class&op=goods_class_edit&gc_id=".intval( $_POST['gc_id'] ),
										"msg" => $lang['goods_class_batch_edit_again']
								),
								array(
										"url" => "index.php?act=goods_class&op=goods_class",
										"msg" => $lang['goods_class_add_back_to_list']
								)
						);
						showmessage( $lang['goods_class_batch_edit_ok'], $url );
				}
				$class_array = $model_class->getOneGoodsClass( intval( $_GET['gc_id'] ) );
				if ( empty( $class_array ) )
				{
						showmessage( $lang['goods_class_batch_edit_paramerror'] );
				}
				$model_type = model( "type" );
				$type_list = $model_type->typeList( array( "order" => "type_sort asc" ), "", "type_id,type_name" );
				Tpl::output( "type_list", $type_list );
				Tpl::output( "class_array", $class_array );
				Tpl::showpage( "goods_class.edit" );
		}

		public function goods_class_importOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$file_type = end( explode( ".", $_FILES['csv']['name'] ) );
						if ( !empty( $_FILES['csv'] ) || !empty( $_FILES['csv']['name'] ) || $file_type == "csv" )
						{
								$fp = @fopen( $_FILES['csv']['tmp_name'], "rb" );
								$parent_id_1 = 0;
								while ( !feof( $fp ) )
								{
										$data = fgets( $fp, 4096 );
										switch ( strtoupper( $_POST['charset'] ) )
										{
										case "UTF-8" :
												if ( !( strtoupper( CHARSET ) !== "UTF-8" ) )
												{
														break;
												}
												$data = iconv( "UTF-8", strtoupper( CHARSET ), $data );
												break;
										case "GBK" :
												if ( strtoupper( CHARSET ) !== "GBK" )
												{
														break;
												}
												$data = iconv( "GBK", strtoupper( CHARSET ), $data );
										}
										if ( !empty( $data ) )
										{
												$data = str_replace( "\"", "", $data );
												$tmp_array = array( );
												$tmp_array = explode( ",", $data );
												if ( !( $tmp_array[0] == "sort_order" ) )
												{
														$tmp_deep = "parent_id_".( count( $tmp_array ) - 1 );
														$insert_array = array( );
														$insert_array['gc_sort'] = $tmp_array[0];
														$insert_array['gc_parent_id'] = $$tmp_deep;
														$insert_array['gc_name'] = $tmp_array[count( $tmp_array ) - 1];
														$gc_id = $model_class->add( $insert_array );
														$tmp = "parent_id_".count( $tmp_array );
														$$tmp = $gc_id;
												}
										}
								}
								showmessage( $lang['goods_class_import_succ'], "index.php?act=goods_class&op=goods_class" );
						}
						else
						{
								showmessage( $lang['goods_class_import_csv_null'] );
						}
				}
				Tpl::showpage( "goods_class.import" );
		}

		public function goods_class_exportOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						$model_class = model( "goods_class" );
						$class_list = $model_class->getTreeClassList( );
						@header( "Content-type: application/unknown" );
						@header( "Content-Disposition: attachment; filename=goods_class.csv" );
						if ( is_array( $class_list ) )
						{
								foreach ( $class_list as $k => $v )
								{
										$tmp = array( );
										$tmp['gc_sort'] = $v['gc_sort'];
										$i = 1;
										for ( ;	$i <= $v['deep'] - 1;	++$i	)
										{
												$tmp[] = "";
										}
										$tmp['gc_name'] = $v['gc_name'];
										if ( strtoupper( CHARSET ) == "UTF-8" )
										{
												switch ( $_POST['if_convert'] )
												{
												case "1" :
														$tmp_line = iconv( "UTF-8", "GB2312//IGNORE", join( ",", $tmp ) );
														break;
												case "0" :
														$tmp_line = join( ",", $tmp );
												}
										}
										else
										{
												$tmp_line = join( ",", $tmp );
										}
										$tmp_line = str_replace( "\r\n", "", $tmp_line );
										echo $tmp_line."\r\n";
								}
						}
						exit( );
				}
				Tpl::showpage( "goods_class.export" );
		}

		public function goods_class_delOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				if ( 0 < intval( $_GET['gc_id'] ) )
				{
						$model_class->del( intval( $_GET['gc_id'] ) );
						$model_class_tag = model( "goods_class_tag" );
						$model_class_tag->delByCondition( array(
								"gc_condition" => intval( $_GET['gc_id'] )
						) );
						$this->offTheShelfProducts( intval( $_GET['gc_id'] ) );
						showmessage( $lang['goods_class_index_del_succ'], "index.php?act=goods_class&op=goods_class" );
				}
				else
				{
						showmessage( $lang['goods_class_index_choose_del'], "index.php?act=goods_class&op=goods_class" );
				}
		}

		public function goods_class_tagOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class_tag = model( "goods_class_tag" );
				if ( $_POST['form_submit'] == "ok" && $_POST['submit_type'] == "del" )
				{
						if ( is_array( $_POST['tag_id'] ) && !empty( $_POST['tag_id'] ) )
						{
								$id = "\"".implode( "\",\"", $_POST['tag_id'] )."\"";
								$model_class_tag->delTag( $id );
								showmessage( $lang['goods_class_tag_del_succ'] );
						}
						else
						{
								showmessage( $lang['goods_class_tag_del_fail'] );
						}
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$tag_list = $model_class_tag->getTagList( array( ), $page );
				Tpl::output( "tag_list", $tag_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "goods_class_tag.index" );
		}

		public function reset_tagOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				$model_class_tag = model( "goods_class_tag" );
				$return = $model_class_tag->clearTag( );
				if ( !$return )
				{
						showmessage( $lang['goods_class_reset_tag_fail'], "index.php?act=goods_class&op=goods_class_tag" );
				}
				$goods_class = $model_class->getTreeClassList( 3, array( "order" => "gc_parent_id asc,gc_sort asc,gc_id asc" ) );
				if ( is_array( $goods_class ) && !empty( $goods_class ) )
				{
						$goods_class_array = array( );
						foreach ( $goods_class as $val )
						{
								if ( $val['gc_parent_id'] == 0 )
								{
										$goods_class_array[$val['gc_id']]['gc_name'] = $val['gc_name'];
										$goods_class_array[$val['gc_id']]['gc_id'] = $val['gc_id'];
										$goods_class_array[$val['gc_id']]['type_id'] = $val['type_id'];
								}
								else if ( isset( $goods_class_array[$val['gc_parent_id']] ) )
								{
										$goods_class_array[$val['gc_parent_id']]['sub_class'][$val['gc_id']]['gc_name'] = $val['gc_name'];
										$goods_class_array[$val['gc_parent_id']]['sub_class'][$val['gc_id']]['gc_id'] = $val['gc_id'];
										$goods_class_array[$val['gc_parent_id']]['sub_class'][$val['gc_id']]['gc_parent_id'] = $val['gc_parent_id'];
										$goods_class_array[$val['gc_parent_id']]['sub_class'][$val['gc_id']]['type_id'] = $val['type_id'];
								}
								else
								{
										foreach ( $goods_class_array as $v )
										{
												if ( isset( $v['sub_class'][$val['gc_parent_id']] ) )
												{
														$goods_class_array[$v['sub_class'][$val['gc_parent_id']]['gc_parent_id']]['sub_class'][$val['gc_parent_id']]['sub_class'][$val['gc_id']]['gc_name'] = $val['gc_name'];
														$goods_class_array[$v['sub_class'][$val['gc_parent_id']]['gc_parent_id']]['sub_class'][$val['gc_parent_id']]['sub_class'][$val['gc_id']]['gc_id'] = $val['gc_id'];
														$goods_class_array[$v['sub_class'][$val['gc_parent_id']]['gc_parent_id']]['sub_class'][$val['gc_parent_id']]['sub_class'][$val['gc_id']]['type_id'] = $val['type_id'];
												}
										}
								}
						}
						$return = $model_class_tag->tagAdd( $goods_class_array );
						if ( $return )
						{
								showmessage( $lang['goods_class_reset_tag_succ'], "index.php?act=goods_class&op=goods_class_tag" );
						}
						else
						{
								showmessage( $lang['goods_class_reset_tag_fail'], "index.php?act=goods_class&op=goods_class_tag" );
						}
				}
				else
				{
						showmessage( $lang['goods_class_reset_tag_fail_no_class'], "index.php?act=goods_class&op=goods_class_tag" );
				}
		}

		public function update_tag_nameOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "goods_class" );
				$model_class_tag = model( "goods_class_tag" );
				$tag_list = $model_class_tag->getTagList( array( ), "", "gc_tag_id,gc_id_1,gc_id_2,gc_id_3" );
				if ( is_array( $tag_list ) && !empty( $tag_list ) )
				{
						foreach ( $tag_list as $val )
						{
								$in_gc_id = "";
								if ( $val['gc_id_1'] != "0" )
								{
										$in_gc_id .= "'".$val['gc_id_1']."',";
								}
								if ( $val['gc_id_2'] != "0" )
								{
										$in_gc_id .= "'".$val['gc_id_2']."',";
								}
								if ( $val['gc_id_3'] != "0" )
								{
										$in_gc_id .= "'".$val['gc_id_3']."',";
								}
								$in_gc_id = trim( $in_gc_id, "," );
								$gc_list = $model_class->getClassList( array(
										"in_gc_id" => $in_gc_id
								) );
								$update_tag = array( );
								if ( isset( $gc_list['0']['gc_id'] ) && $gc_list['0']['gc_id'] != "0" )
								{
										$update_tag['gc_id_1'] = $gc_list['0']['gc_id'];
										$update_tag['gc_tag_name'] .= $gc_list['0']['gc_name'];
								}
								if ( isset( $gc_list['1']['gc_id'] ) && $gc_list['1']['gc_id'] != "0" )
								{
										$update_tag['gc_id_2'] = $gc_list['1']['gc_id'];
										$update_tag['gc_tag_name'] .= "&nbsp;&gt;&nbsp;".$gc_list['1']['gc_name'];
								}
								if ( isset( $gc_list['2']['gc_id'] ) && $gc_list['2']['gc_id'] != "0" )
								{
										$update_tag['gc_id_3'] = $gc_list['2']['gc_id'];
										$update_tag['gc_tag_name'] .= "&nbsp;&gt;&nbsp;".$gc_list['2']['gc_name'];
								}
								unset( $gc_list );
								$update_tag['gc_tag_id'] = $val['gc_tag_id'];
								$return = $model_class_tag->updateTag( $update_tag );
								if ( !$return )
								{
										showmessage( $lang['goods_class_update_tag_fail'], "index.php?act=goods_class&op=goods_class_tag" );
								}
						}
						showmessage( $lang['goods_class_update_tag_succ'], "index.php?act=goods_class&op=goods_class_tag" );
				}
				else
				{
						showmessage( $lang['goods_class_update_tag_fail_no_class'], "index.php?act=goods_class&op=goods_class_tag" );
				}
		}

		public function tag_delOp( )
		{
				$id = intval( $_GET['tag_id'] );
				$lang = Language::getlangcontent( );
				$model_class_tag = model( "goods_class_tag" );
				if ( 0 < $id )
				{
						$model_class_tag->delTag( $id );
						showmessage( $lang['goods_class_tag_del_succ'] );
				}
				else
				{
						showmessage( $lang['goods_class_tag_del_fail'] );
				}
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "goods_class_name" :
						$model_class = model( "goods_class" );
						$class_array = $model_class->getOneGoodsClass( intval( $_GET['id'] ) );
						$condition['gc_name'] = trim( $_GET['value'] );
						$condition['gc_parent_id'] = $class_array['gc_parent_id'];
						$condition['no_gc_id'] = intval( $_GET['id'] );
						$class_list = $model_class->getClassList( $condition );
						if ( empty( $class_list ) )
						{
								$update_array = array( );
								$update_array['gc_id'] = intval( $_GET['id'] );
								$update_array['gc_name'] = trim( $_GET['value'] );
								$model_class->goodsClassUpdate( $update_array );
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "goods_class_sort" :
				case "goods_class_show" :
				case "goods_class_index_show" :
						$model_class = model( "goods_class" );
						$update_array = array( );
						$update_array['gc_id'] = $_GET['id'];
						$update_array[$_GET['column']] = $_GET['value'];
						$model_class->goodsClassUpdate( $update_array );
						echo "true";
						exit( );
				case "check_class_name" :
						$model_class = model( "goods_class" );
						$condition['gc_name'] = trim( $_GET['gc_name'] );
						$condition['gc_parent_id'] = intval( $_GET['gc_parent_id'] );
						$condition['no_gc_id'] = intval( $_GET['gc_id'] );
						$class_list = $model_class->getClassList( $condition );
						if ( empty( $class_list ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "goods_class_tag_value" :
						$model_class_tag = model( "goods_class_tag" );
						$update_array = array( );
						$update_array['gc_tag_id'] = intval( $_GET['id'] );
						$comma = "，";
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$comma = Language::getgbk( $comma );
						}
						$update_array[$_GET['column']] = trim( str_replace( $comma, ",", $_GET['value'] ) );
						$model_class_tag->updateTag( $update_array );
						echo "true";
						exit( );
				}
		}

		private function offTheShelfProducts( $gc_id_str )
		{
				$lang = Language::getlangcontent( );
				$model_goods = model( "goods" );
				$model_goods->updateGoodsWhere( array(
						"goods_state" => "1",
						"goods_close_reason" => $lang['goods_class_edit_goods_close_reason']
				), array(
						"gc_id_in" => $gc_id_str
				) );
		}

}

?>
