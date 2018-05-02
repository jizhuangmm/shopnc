<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class store_classControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "store_class" );
		}

		public function store_classOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "store_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['check_sc_id'] ) )
						{
								if ( is_array( $_POST['check_sc_id'] ) )
								{
										$del_array = $model_class->getChildClass( $_POST['check_sc_id'] );
										if ( is_array( $del_array ) )
										{
												foreach ( $del_array as $k => $v )
												{
														$model_class->del( $v['sc_id'] );
												}
										}
								}
								showmessage( $lang['del_store_class_ok'] );
						}
						else
						{
								showmessage( $lang['sel_del'] );
						}
				}
				$parent_id = $_GET['sc_parent_id'] ? intval( $_GET['sc_parent_id'] ) : 0;
				$tmp_list = $model_class->getTreeClassList( 2 );
				if ( is_array( $tmp_list ) )
				{
						foreach ( $tmp_list as $k => $v )
						{
								if ( $v['sc_parent_id'] == $parent_id )
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
				Tpl::showpage( "store_class.index" );
		}

		public function store_class_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "store_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['sc_name'],
										"require" => "true",
										"message" => $lang['store_class_name_no_null']
								),
								array(
										"input" => $_POST['sc_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['store_class_sort_only_number']
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
								$insert_array['sc_name'] = trim( $_POST['sc_name'] );
								$insert_array['sc_parent_id'] = intval( $_POST['sc_parent_id'] );
								$insert_array['sc_sort'] = trim( $_POST['sc_sort'] );
								$result = $model_class->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=store_class&op=store_class_add&sc_parent_id=".intval( $_POST['sc_parent_id'] ),
														"msg" => $lang['continue_add_store_class']
												),
												array(
														"url" => "index.php?act=store_class&op=store_class",
														"msg" => $lang['back_store_class_list']
												)
										);
										showmessage( $lang['add_store_class_ok'], $url );
								}
								else
								{
										showmessage( $lang['add_store_class_fail'] );
								}
						}
				}
				$parent_list = $model_class->getTreeClassList( 1 );
				if ( is_array( $parent_list ) )
				{
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['sc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['sc_name'];
						}
				}
				Tpl::output( "sc_parent_id", intval( $_GET['sc_parent_id'] ) );
				Tpl::output( "parent_list", $parent_list );
				Tpl::showpage( "store_class.add" );
		}

		public function store_class_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "store_class" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['sc_name'],
										"require" => "true",
										"message" => $lang['store_class_name_no_null']
								),
								array(
										"input" => $_POST['sc_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['store_class_sort_only_number']
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
								$update_array['sc_id'] = intval( $_POST['sc_id'] );
								$update_array['sc_name'] = trim( $_POST['sc_name'] );
								$update_array['sc_sort'] = trim( $_POST['sc_sort'] );
								$result = $model_class->update( $update_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=store_class&op=store_class_edit&sc_id=".intval( $_POST['sc_id'] ),
														"msg" => $lang['re_edit_store_class']
												),
												array(
														"url" => "index.php?act=store_class&op=store_class",
														"msg" => $lang['back_store_class_list']
												)
										);
										showmessage( $lang['update_store_class_ok'], $url );
								}
								else
								{
										showmessage( $lang['update_store_class_fail'] );
								}
						}
				}
				$class_array = $model_class->getOneClass( intval( $_GET['sc_id'] ) );
				if ( empty( $class_array ) )
				{
						showmessage( $lang['illegal_parameter'] );
				}
				Tpl::output( "class_array", $class_array );
				Tpl::showpage( "store_class.edit" );
		}

		public function store_class_delOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "store_class" );
				if ( 0 < intval( $_GET['sc_id'] ) )
				{
						$array = array(
								intval( $_GET['sc_id'] )
						);
						$del_array = $model_class->getChildClass( $array );
						if ( is_array( $del_array ) )
						{
								foreach ( $del_array as $k => $v )
								{
										$model_class->del( $v['sc_id'] );
								}
						}
						showmessage( $lang['del_store_class_ok'], "index.php?act=store_class&op=store_class" );
				}
				else
				{
						showmessage( $lang['del_store_class_fail'], "index.php?act=store_class&op=store_class" );
				}
		}

		public function store_class_importOp( )
		{
				$lang = Language::getlangcontent( );
				$model_class = model( "store_class" );
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
														$insert_array['sc_sort'] = $tmp_array[0];
														$insert_array['sc_parent_id'] = $$tmp_deep;
														$insert_array['sc_name'] = $tmp_array[count( $tmp_array ) - 1];
														$sc_id = $model_class->add( $insert_array );
														$tmp = "parent_id_".count( $tmp_array );
														$$tmp = $sc_id;
												}
										}
								}
								showmessage( $lang['import_ok'], "index.php?act=store_class&op=store_class" );
						}
						else
						{
								showmessage( $lang['import_csv_no_null'] );
						}
				}
				Tpl::showpage( "store_class.import" );
		}

		public function store_class_exportOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['form_submit'] == "ok" )
				{
						$model_class = model( "store_class" );
						$class_list = $model_class->getTreeClassList( );
						@header( "Content-type: application/unknown" );
						@header( "Content-Disposition: attachment; filename=store_class.csv" );
						if ( is_array( $class_list ) )
						{
								foreach ( $class_list as $k => $v )
								{
										$tmp = array( );
										$tmp['sc_sort'] = $v['sc_sort'];
										$i = 1;
										for ( ;	$i <= $v['deep'] - 1;	++$i	)
										{
												$tmp[] = "";
										}
										$tmp['sc_name'] = replacespecialchar( $v['sc_name'] );
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
				Tpl::showpage( "store_class.export" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "store_class_name" :
						$model_class = model( "store_class" );
						$class_array = $model_class->getOneClass( intval( $_GET['id'] ) );
						$condition['sc_name'] = trim( $_GET['value'] );
						$condition['sc_parent_id'] = $class_array['sc_parent_id'];
						$condition['no_sc_id'] = intval( $_GET['id'] );
						$class_list = $model_class->getClassList( $condition );
						if ( empty( $class_list ) )
						{
								$update_array = array( );
								$update_array['sc_id'] = intval( $_GET['id'] );
								$update_array['sc_name'] = trim( $_GET['value'] );
								$model_class->update( $update_array );
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "store_class_sort" :
						$model_class = model( "store_class" );
						$update_array = array( );
						$update_array['sc_id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$result = $model_class->update( $update_array );
						echo "true";
						exit( );
				case "check_class_name" :
						$model_class = model( "store_class" );
						$condition['sc_name'] = trim( $_GET['sc_name'] );
						$condition['sc_parent_id'] = intval( $_GET['sc_parent_id'] );
						$condition['no_sc_id'] = intval( $_GET['sc_id'] );
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
