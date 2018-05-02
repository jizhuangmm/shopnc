<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class flea_classControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "flea_class" );
				if ( $GLOBALS['setting_config']['flea_isuse'] != "1" )
				{
						showmessage( Language::get( "flea_isuse_off_tips" ), "index.php?act=dashboard&op=welcome" );
				}
		}

		public function indexOp( )
		{
				$this->flea_classOp( );
		}

		public function goods_classOp( )
		{
				$this->flea_classOp( );
		}

		public function flea_classOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "flea_class" );
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
						if ( $_POST['submit_type'] == "brach_edit" )
						{
								if ( !empty( $_POST['check_gc_id'] ) )
								{
										Tpl::output( "id", implode( ",", $_POST['check_gc_id'] ) );
										Tpl::showpage( "flea_class.brach_edit" );
								}
								else
								{
										showmessage( $lang['goods_class_index_choose_edit'] );
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
														$param['gc_id'] = $v;
														$model_class->update( $param );
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
				$parent_id = $_GET['gc_parent_id'] ? $_GET['gc_parent_id'] : 0;
				$tmp_list = $model_class->getTreeClassList( 4 );
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
				Tpl::showpage( "flea_class.index" );
		}

		public function brach_edit_saveOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['gc_show'] == "-1" )
				{
						showmessage( $lang['goods_class_batch_edit_succ'], "index.php?act=flea_class&op=flea_class" );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						$model_class = model( "flea_class" );
						$array = explode( ",", $_POST['id'] );
						if ( is_array( $array ) )
						{
								foreach ( $array as $k => $v )
								{
										$update_array = array( );
										$update_array['gc_id'] = $v;
										$update_array['gc_show'] = $_POST['gc_show'];
										$model_class->update( $update_array );
								}
								showmessage( $lang['goods_class_batch_edit_succ'] );
						}
						else
						{
								showmessage( $lang['goods_class_batch_edit_wrong_content'] );
						}
				}
				else
				{
						showmessage( $lang['goods_class_batch_edit_wrong_content'] );
				}
		}

		public function goods_class_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "flea_class" );
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
						else
						{
								$insert_array = array( );
								$insert_array['gc_name'] = $_POST['gc_name'];
								$insert_array['gc_parent_id'] = $_POST['gc_parent_id'];
								$insert_array['gc_sort'] = $_POST['gc_sort'];
								$insert_array['gc_show'] = $_POST['gc_show'];
								$insert_array['gc_index_show'] = $_POST['gc_index_show'];
								$result = $model_class->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=flea_class&op=goods_class_add&gc_parent_id=".$_POST['gc_parent_id'],
														"msg" => $lang['goods_class_add_again']
												),
												array(
														"url" => "index.php?act=flea_class&op=flea_class",
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
				$parent_list = $model_class->getTreeClassList( 3 );
				if ( is_array( $parent_list ) )
				{
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['gc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['gc_name'];
						}
				}
				Tpl::output( "gc_parent_id", $_GET['gc_parent_id'] );
				Tpl::output( "parent_list", $parent_list );
				Tpl::showpage( "flea_class.add" );
		}

		public function goods_class_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "flea_class" );
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
						else
						{
								$update_array = array( );
								$update_array['gc_id'] = $_POST['gc_id'];
								$update_array['gc_name'] = $_POST['gc_name'];
								$update_array['gc_parent_id'] = $_POST['gc_parent_id'];
								$update_array['gc_sort'] = $_POST['gc_sort'];
								$update_array['gc_show'] = $_POST['gc_show'];
								$update_array['gc_index_show'] = $_POST['gc_index_show'];
								$result = $model_class->update( $update_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=flea_class&op=goods_class_edit&gc_id=".$_POST['gc_id'],
														"msg" => $lang['goods_class_batch_edit_again']
												),
												array(
														"url" => "index.php?act=flea_class&op=flea_class",
														"msg" => $lang['goods_class_add_back_to_list']
												)
										);
										showmessage( $lang['goods_class_batch_edit_ok'], $url );
								}
								else
								{
										showmessage( $lang['goods_class_batch_edit_fail'] );
								}
						}
				}
				$class_array = $model_class->getOneGoodsClass( $_GET['gc_id'] );
				if ( empty( $class_array ) )
				{
						showmessage( $lang['goods_class_batch_edit_paramerror'] );
				}
				$parent_list = $model_class->getTreeClassList( 3 );
				if ( is_array( $parent_list ) )
				{
						$unset_sign = FALSE;
						foreach ( $parent_list as $k => $v )
						{
								if ( $v['gc_id'] == $class_array['gc_id'] )
								{
										$deep = $v['deep'];
										$unset_sign = TRUE;
								}
								if ( $unset_sign )
								{
										if ( $v['deep'] == $deep && $v['gc_id'] != $class_array['gc_id'] )
										{
												$unset_sign = FALSE;
										}
										if ( !( $deep < $v['deep'] ) || !( $v['gc_id'] == $class_array['gc_id'] ) )
										{
												unset( $parent_list[$k] );
										}
								}
								else
								{
										$parent_list[$k]['gc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['gc_name'];
								}
						}
				}
				Tpl::output( "parent_list", $parent_list );
				Tpl::output( "class_array", $class_array );
				Tpl::showpage( "flea_class.edit" );
		}

		public function goods_class_importOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "flea_class" );
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
								showmessage( $lang['goods_class_import_succ'], "index.php?act=flea_class&op=flea_class" );
						}
						else
						{
								showmessage( $lang['goods_class_import_csv_null'] );
						}
				}
				Tpl::showpage( "flea_class.import" );
		}

		public function goods_class_exportOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						$model_class = model( "flea_class" );
						$class_list = $model_class->getTreeClassList( );
						@header( "Content-type: application/unknown" );
						@header( "Content-Disposition: attachment; filename=flea_class.csv" );
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
				Tpl::showpage( "flea_class.export" );
		}

		public function goods_class_delOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "flea_class" );
				if ( 0 < intval( $_GET['gc_id'] ) )
				{
						$model_class->del( $_GET['gc_id'] );
						showmessage( $lang['goods_class_index_del_succ'], "index.php?act=flea_class&op=flea_class" );
				}
				else
				{
						showmessage( $lang['goods_class_index_choose_del'], "index.php?act=flea_class&op=flea_class" );
				}
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "goods_class_name" :
						$model_class = model( "flea_class" );
						$class_array = $model_class->getOneGoodsClass( $_GET['id'] );
						$condition['gc_name'] = $_GET['value'];
						$condition['gc_parent_id'] = $class_array['gc_parent_id'];
						$condition['no_gc_id'] = $_GET['id'];
						$class_list = $model_class->getClassList( $condition );
						if ( empty( $class_list ) )
						{
								$update_array = array( );
								$update_array['gc_id'] = $_GET['id'];
								$update_array['gc_name'] = $_GET['value'];
								$model_class->update( $update_array );
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "goods_class_sort" :
				case "goods_class_show" :
				case "goods_class_index_show" :
						$model_class = model( "flea_class" );
						$update_array = array( );
						$update_array['gc_id'] = $_GET['id'];
						$update_array[$_GET['column']] = $_GET['value'];
						$model_class->update( $update_array );
						echo "true";
						exit( );
				case "check_class_name" :
						$model_class = model( "flea_class" );
						$condition['gc_name'] = $_GET['gc_name'];
						$condition['gc_parent_id'] = $_GET['gc_parent_id'];
						$condition['no_gc_id'] = $_GET['gc_id'];
						$class_list = $model_class->getClassList( $condition );
						if ( empty( $class_list ) )
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
