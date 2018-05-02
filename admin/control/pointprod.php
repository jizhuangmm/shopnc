<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class pointprodControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "pointprod" );
				if ( $_GET['point_open'] == 1 )
				{
						return TRUE;
				}
				if ( c( "points_isuse" ) != 1 || c( "pointprod_isuse" ) != 1 )
				{
						$url = array(
								array(
										"url" => "index.php?act=dashboard&op=welcome",
										"msg" => Language::get( "accessclose" )
								),
								array(
										"url" => "index.php?act=pointprod&op=pointprod&point_open=1",
										"msg" => Language::get( "accessopen" )
								)
						);
						showmessage( Language::get( "admin_pointprod_unavailable" ), $url, "html", "succ", 1, 6000 );
				}
		}

		public function pointprodOp( )
		{
				$model_setting = model( "setting" );
				if ( $_GET['point_open'] == 1 )
				{
						$update_array = array( );
						$update_array['points_isuse'] = 1;
						$update_array['pointprod_isuse'] = 1;
						$model_setting->updateSetting( $update_array );
				}
				$condition_arr = array( );
				$pgoods_name = trim( $_GET['pg_name'] );
				if ( $pgoods_name )
				{
						$condition_arr['pgoods_name_like'] = $pgoods_name;
				}
				if ( $_GET['pg_state'] )
				{
						$condition_arr['pg_liststate'] = trim( $_GET['pg_state'] );
				}
				$condition_arr['order'] = " pgoods_sort asc,pgoods_id desc ";
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$pointprod_model = model( "pointprod" );
				$prod_list = $pointprod_model->getPointProdList( $condition_arr, $page );
				Tpl::output( "prod_list", $prod_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "pointprod.list" );
		}

		public function prod_addOp( )
		{
				$hourarr = array( "00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23" );
				$upload_model = model( "upload" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['goodsname'],
								"require" => "true",
								"message" => Language::get( "admin_pointprod_add_goodsname_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodsprice'],
								"require" => "true",
								"validator" => "DoublePositive",
								"message" => Language::get( "admin_pointprod_add_goodsprice_number_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodspoints'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_pointprod_add_goodspoint_number_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodsserial'],
								"require" => "true",
								"message" => Language::get( "admin_pointprod_add_goodsserial_null_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodsstorage'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_pointprod_add_storage_number_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['sort'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_pointprod_add_sort_number_error" )
						);
						if ( $_POST['islimit'] == 1 )
						{
								$validate_arr[] = array(
										"input" => $_POST['limitnum'],
										"validator" => "IntegerPositive",
										"message" => Language::get( "admin_pointprod_add_limitnum_digits_error" )
								);
						}
						if ( $_POST['freightcharge'] == 1 )
						{
								$validate_arr[] = array(
										"input" => $_POST['freightprice'],
										"validator" => "DoublePositive",
										"message" => Language::get( "admin_pointprod_add_freightprice_number_error" )
								);
						}
						if ( $_POST['islimittime'] )
						{
								$validate_arr[] = array(
										"input" => $_POST['starttime'],
										"require" => "true",
										"message" => Language::get( "admin_pointprod_add_limittime_null_error" )
								);
								$validate_arr[] = array(
										"input" => $_POST['endtime'],
										"require" => "true",
										"message" => Language::get( "admin_pointprod_add_limittime_null_error" )
								);
						}
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( Language::get( "error" ).$error, "", "", "error" );
						}
						$model_pointprod = model( "pointprod" );
						$goods_array = array( );
						$goods_array['pgoods_name'] = trim( $_POST['goodsname'] );
						$goods_array['pgoods_tag'] = trim( $_POST['goodstag'] );
						$goods_array['pgoods_price'] = trim( $_POST['goodsprice'] );
						$goods_array['pgoods_points'] = trim( $_POST['goodspoints'] );
						$goods_array['pgoods_serial'] = trim( $_POST['goodsserial'] );
						$goods_array['pgoods_storage'] = intval( $_POST['goodsstorage'] );
						$goods_array['pgoods_islimit'] = intval( $_POST['islimit'] );
						if ( $goods_array['pgoods_islimit'] == 1 )
						{
								$goods_array['pgoods_limitnum'] = intval( $_POST['limitnum'] );
						}
						else
						{
								$goods_array['pgoods_limitnum'] = 0;
						}
						$goods_array['pgoods_freightcharge'] = intval( $_POST['freightcharge'] );
						if ( $goods_array['pgoods_freightcharge'] == 1 )
						{
								$goods_array['pgoods_freightprice'] = trim( $_POST['freightprice'] );
						}
						else
						{
								$goods_array['pgoods_freightprice'] = 0;
						}
						$goods_array['pgoods_islimittime'] = intval( $_POST['islimittime'] );
						if ( $goods_array['pgoods_islimittime'] == 1 )
						{
								if ( trim( $_POST['starttime'] ) )
								{
										$starttime = trim( $_POST['starttime'] );
										$sdatearr = explode( "-", $starttime );
										$starttime = mktime( intval( $_POST['starthour'] ), 0, 0, $sdatearr[1], $sdatearr[2], $sdatearr[0] );
										unset( $sdatearr );
								}
								if ( trim( $_POST['endtime'] ) )
								{
										$endtime = trim( $_POST['endtime'] );
										$edatearr = explode( "-", $endtime );
										$endtime = mktime( intval( $_POST['endhour'] ), 0, 0, $edatearr[1], $edatearr[2], $edatearr[0] );
								}
								$goods_array['pgoods_starttime'] = $starttime;
								$goods_array['pgoods_endtime'] = $endtime;
						}
						else
						{
								$goods_array['pgoods_starttime'] = "";
								$goods_array['pgoods_endtime'] = "";
						}
						$goods_array['pgoods_show'] = trim( $_POST['showstate'] );
						$goods_array['pgoods_commend'] = trim( $_POST['commendstate'] );
						$goods_array['pgoods_add_time'] = time( );
						$goods_array['pgoods_state'] = trim( $_POST['forbidstate'] );
						$goods_array['pgoods_close_reason'] = trim( $_POST['forbidreason'] );
						$goods_array['pgoods_keywords'] = trim( $_POST['keywords'] );
						$goods_array['pgoods_description'] = trim( $_POST['description'] );
						$goods_array['pgoods_body'] = trim( $_POST['pgoods_body'] );
						$goods_array['pgoods_sort'] = intval( $_POST['sort'] );
						$indeximg_succ = FALSE;
						if ( !empty( $_FILES['goods_image']['name'] ) )
						{
								$upload = new UploadFile( );
								$upload->set( "default_dir", ATTACH_POINTPROD );
								$upload->set( "thumb_width", "160,300" );
								$upload->set( "thumb_height", "160,300" );
								$upload->set( "thumb_ext", "_small,_mid" );
								$result = $upload->upfile( "goods_image" );
								if ( $result )
								{
										$indeximg_succ = TRUE;
										$goods_array['pgoods_image'] = $upload->file_name;
								}
								else
								{
										showmessage( $upload->error, "", "", "error" );
								}
						}
						$state = $model_pointprod->addPointGoods( $goods_array );
						if ( $state )
						{
								if ( $indeximg_succ )
								{
										$insert_array = array( );
										$insert_array['file_name'] = $upload->file_name;
										$insert_array['file_thumb'] = $upload->thumb_image;
										$insert_array['upload_type'] = 5;
										$insert_array['file_size'] = filesize( "..".DS.ATTACH_POINTPROD.DS.$upload->file_name );
										$insert_array['item_id'] = $state;
										$insert_array['upload_time'] = time( );
										$upload_model->add( $insert_array );
								}
								$file_idstr = "";
								if ( is_array( $_POST['file_id'] ) && 0 < count( $_POST['file_id'] ) )
								{
										$file_idstr = "'".implode( "','", $_POST['file_id'] )."'";
								}
								$upload_model->updatebywhere( array(
										"item_id" => $state
								), array(
										"upload_type" => 6,
										"item_id" => "0",
										"upload_id_in" => "{$file_idstr}"
								) );
								showmessage( Language::get( "admin_pointprod_add_success" ), "index.php?act=pointprod&op=pointprod" );
						}
				}
				else
				{
						$condition['upload_type'] = "6";
						$condition['item_id'] = "0";
						$file_upload = $upload_model->getUploadList( $condition );
						if ( is_array( $file_upload ) )
						{
								foreach ( $file_upload as $k => $v )
								{
										$file_upload[$k]['upload_path'] = SiteUrl."/".ATTACH_POINTPROD."/".$file_upload[$k]['file_name'];
								}
						}
						Tpl::output( "file_upload", $file_upload );
						Tpl::output( "PHPSESSID", session_id( ) );
						Tpl::output( "hourarr", $hourarr );
				}
				Tpl::showpage( "pointprod.add" );
		}

		public function prod_editOp( )
		{
				$hourarr = array( "00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23" );
				$upload_model = model( "upload" );
				$pg_id = intval( $_GET['pg_id'] );
				if ( !$pg_id )
				{
						showmessage( Language::get( "admin_pointprod_parameter_error" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
				$model_pointprod = model( "pointprod" );
				$prod_info = $model_pointprod->getPointProdInfo( array(
						"pgoods_id" => $pg_id
				) );
				if ( !is_array( $prod_info ) && count( $prod_info ) <= 0 )
				{
						showmessage( Language::get( "admin_pointprod_record_error" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['goodsname'],
								"require" => "true",
								"message" => Language::get( "admin_pointprod_add_goodsname_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodsprice'],
								"require" => "true",
								"validator" => "DoublePositive",
								"message" => Language::get( "admin_pointprod_add_goodsprice_number_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodspoints'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_pointprod_add_goodspoint_number_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodsserial'],
								"require" => "true",
								"message" => Language::get( "admin_pointprod_add_goodsserial_null_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['goodsstorage'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_pointprod_add_storage_number_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['sort'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_pointprod_add_sort_number_error" )
						);
						if ( $_POST['islimit'] == 1 )
						{
								$validate_arr[] = array(
										"input" => $_POST['limitnum'],
										"validator" => "IntegerPositive",
										"message" => Language::get( "admin_pointprod_add_limitnum_digits_error" )
								);
						}
						if ( $_POST['freightcharge'] == 1 )
						{
								$validate_arr[] = array(
										"input" => $_POST['freightprice'],
										"validator" => "DoublePositive",
										"message" => Language::get( "admin_pointprod_add_freightprice_number_error" )
								);
						}
						if ( $_POST['islimittime'] )
						{
								$validate_arr[] = array(
										"input" => $_POST['starttime'],
										"require" => "true",
										"message" => Language::get( "admin_pointprod_add_limittime_null_error" )
								);
								$validate_arr[] = array(
										"input" => $_POST['endtime'],
										"require" => "true",
										"message" => Language::get( "admin_pointprod_add_limittime_null_error" )
								);
						}
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( Language::get( "error" ).$error, "", "", "error" );
						}
						$model_pointprod = model( "pointprod" );
						$goods_array = array( );
						$goods_array['pgoods_name'] = trim( $_POST['goodsname'] );
						$goods_array['pgoods_tag'] = trim( $_POST['goodstag'] );
						$goods_array['pgoods_price'] = trim( $_POST['goodsprice'] );
						$goods_array['pgoods_points'] = trim( $_POST['goodspoints'] );
						$goods_array['pgoods_serial'] = trim( $_POST['goodsserial'] );
						$goods_array['pgoods_storage'] = intval( $_POST['goodsstorage'] );
						$goods_array['pgoods_islimit'] = intval( $_POST['islimit'] );
						if ( $goods_array['pgoods_islimit'] == 1 )
						{
								$goods_array['pgoods_limitnum'] = intval( $_POST['limitnum'] );
						}
						else
						{
								$goods_array['pgoods_limitnum'] = 0;
						}
						$goods_array['pgoods_freightcharge'] = intval( $_POST['freightcharge'] );
						if ( $goods_array['pgoods_freightcharge'] == 1 )
						{
								$goods_array['pgoods_freightprice'] = trim( $_POST['freightprice'] );
						}
						else
						{
								$goods_array['pgoods_freightprice'] = 0;
						}
						$goods_array['pgoods_islimittime'] = intval( $_POST['islimittime'] );
						if ( $goods_array['pgoods_islimittime'] == 1 )
						{
								if ( trim( $_POST['starttime'] ) )
								{
										$starttime = trim( $_POST['starttime'] );
										$sdatearr = explode( "-", $starttime );
										$starttime = mktime( intval( $_POST['starthour'] ), 0, 0, $sdatearr[1], $sdatearr[2], $sdatearr[0] );
										unset( $sdatearr );
								}
								if ( trim( $_POST['endtime'] ) )
								{
										$endtime = trim( $_POST['endtime'] );
										$edatearr = explode( "-", $endtime );
										$endtime = mktime( intval( $_POST['endhour'] ), 0, 0, $edatearr[1], $edatearr[2], $edatearr[0] );
								}
								$goods_array['pgoods_starttime'] = $starttime;
								$goods_array['pgoods_endtime'] = $endtime;
						}
						else
						{
								$goods_array['pgoods_starttime'] = "";
								$goods_array['pgoods_endtime'] = "";
						}
						$goods_array['pgoods_show'] = trim( $_POST['showstate'] );
						$goods_array['pgoods_commend'] = trim( $_POST['commendstate'] );
						$goods_array['pgoods_state'] = trim( $_POST['forbidstate'] );
						$goods_array['pgoods_close_reason'] = trim( $_POST['forbidreason'] );
						$goods_array['pgoods_keywords'] = trim( $_POST['keywords'] );
						$goods_array['pgoods_description'] = trim( $_POST['description'] );
						$goods_array['pgoods_body'] = trim( $_POST['pgoods_body'] );
						$goods_array['pgoods_sort'] = intval( $_POST['sort'] );
						$indeximg_succ = FALSE;
						if ( !empty( $_FILES['goods_image']['name'] ) )
						{
								$upload = new UploadFile( );
								$upload->set( "default_dir", ATTACH_POINTPROD );
								$upload->set( "thumb_width", "160,300" );
								$upload->set( "thumb_height", "160,300" );
								$upload->set( "thumb_ext", "_small,_mid" );
								$result = $upload->upfile( "goods_image" );
								if ( $result )
								{
										$indeximg_succ = TRUE;
										$goods_array['pgoods_image'] = $upload->file_name;
								}
								else
								{
										showmessage( $upload->error, "", "", "error" );
								}
						}
						$state = $model_pointprod->updatePointProd( $goods_array, array(
								"pgoods_id" => $prod_info['pgoods_id']
						) );
						if ( $state )
						{
								if ( $indeximg_succ )
								{
										$upload_list = $upload_model->getUploadList( array(
												"upload_type" => 5,
												"item_id" => $prod_info['pgoods_id']
										) );
										if ( is_array( $upload_list ) && 0 < count( $upload_list ) )
										{
												$upload_idarr = array( );
												foreach ( $upload_list as $v )
												{
														@unlink( BasePath.DS.ATTACH_POINTPROD.DS.$v['file_name'] );
														@unlink( BasePath.DS.ATTACH_POINTPROD.DS.$v['file_thumb'] );
														$upload_idarr[] = $v['upload_id'];
												}
												$upload_model->dropUploadById( $upload_idarr );
										}
										$insert_array = array( );
										$insert_array['file_name'] = $upload->file_name;
										$insert_array['file_thumb'] = $upload->thumb_image;
										$insert_array['upload_type'] = 5;
										$insert_array['file_size'] = filesize( "..".DS.ATTACH_POINTPROD.DS.$upload->file_name );
										$insert_array['item_id'] = $prod_info['pgoods_id'];
										$insert_array['upload_time'] = time( );
										$upload_model->add( $insert_array );
								}
								showmessage( Language::get( "admin_pointprod_edit_success" ), "index.php?act=pointprod&op=pointprod" );
						}
				}
				else
				{
						$condition['upload_type'] = "6";
						$condition['item_id'] = $prod_info['pgoods_id'];
						$file_upload = $upload_model->getUploadList( $condition );
						if ( is_array( $file_upload ) )
						{
								foreach ( $file_upload as $k => $v )
								{
										$file_upload[$k]['upload_path'] = SiteUrl."/".ATTACH_POINTPROD."/".$file_upload[$k]['file_name'];
								}
						}
						Tpl::output( "file_upload", $file_upload );
						Tpl::output( "PHPSESSID", session_id( ) );
						Tpl::output( "hourarr", $hourarr );
						Tpl::output( "prod_info", $prod_info );
						Tpl::showpage( "pointprod.edit" );
				}
		}

		public function prod_dropOp( )
		{
				$pg_id = intval( $_GET['pg_id'] );
				if ( !$pg_id )
				{
						showmessage( Language::get( "admin_pointprod_parameter_error" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
				$model_pointprod = model( "pointprod" );
				$prod_info = $model_pointprod->getPointProdInfo( array(
						"pgoods_id" => $pg_id
				) );
				if ( !is_array( $prod_info ) && count( $prod_info ) <= 0 )
				{
						showmessage( Language::get( "admin_pointprod_record_error" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
				$result = $model_pointprod->dropPointProdById( $pg_id );
				if ( $result )
				{
						showmessage( Language::get( "admin_pointprod_del_success" ), "index.php?act=pointprod&op=pointprod" );
				}
				else
				{
						showmessage( Language::get( "admin_pointprod_del_fail" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
		}

		public function prod_dropallOp( )
		{
				$pg_id = $_POST['pg_id'];
				if ( !$pg_id )
				{
						showmessage( Language::get( "admin_pointprod_parameter_error" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
				$pg_id = "'".implode( "','", $pg_id )."'";
				$model_pointprod = model( "pointprod" );
				$prod_list = $model_pointprod->getPointProdList( array(
						"pgoods_id_in" => $pg_id
				) );
				if ( !is_array( $prod_list ) && count( $prod_list ) <= 0 )
				{
						showmessage( Language::get( "admin_pointprod_record_error" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
				$pg_idnew = array( );
				foreach ( $prod_list as $k => $v )
				{
						$pg_idnew[] = $v['pgoods_id'];
				}
				$result = TRUE;
				if ( is_array( $pg_idnew ) && 0 < count( $pg_idnew ) )
				{
						$result = $model_pointprod->dropPointProdById( $pg_idnew );
				}
				if ( $result )
				{
						showmessage( Language::get( "admin_pointprod_del_success" ), "index.php?act=pointprod&op=pointprod" );
				}
				else
				{
						showmessage( Language::get( "admin_pointprod_del_fail" ), "index.php?act=pointprod&op=pointprod", "", "error" );
				}
		}

		public function ajaxOp( )
		{
				$id = intval( $_GET['id'] );
				if ( $id <= 0 )
				{
						echo "false";
						exit( );
				}
				$model_pointprod = model( "pointprod" );
				$update_array = array( );
				$update_array[$_GET['column']] = trim( $_GET['value'] );
				$model_pointprod->updatePointProd( $update_array, array(
						"pgoods_id" => $id
				) );
				echo "true";
				exit( );
		}

		public function pointprod_iframe_uploadOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_POINTPROD );
						$result = $upload->upfile( "file" );
						if ( $result )
						{
								$GLOBALS['_POST']['pic'] = $upload->file_name;
						}
						else
						{
								echo "<script type='text/javascript'>alert('".$upload->error."');history.back();</script>";
								exit( );
						}
						$model_upload = model( "upload" );
						$insert_array = array( );
						$insert_array['file_name'] = trim( $_POST['pic'] );
						$insert_array['upload_type'] = "6";
						$insert_array['file_size'] = $_FILES['file']['size'];
						$insert_array['item_id'] = intval( $_POST['item_id'] );
						$insert_array['upload_time'] = time( );
						$result = $model_upload->add( $insert_array );
						if ( $result )
						{
								$data = array( );
								$data['file_id'] = $result;
								$data['file_name'] = trim( $_POST['pic'] );
								$data['file_path'] = trim( $_POST['pic'] );
								$output = json_encode( $data );
								echo "<script type='text/javascript'>window.parent.add_uploadedfile('".$output."');</script>";
						}
						else
						{
								echo "<script type='text/javascript'>alert('".Language::get( "admin_pointprod_add_iframe_uploadfail" )."');</script>";
						}
				}
				Tpl::output( "item_id", trim( $_GET['item_id'] ) );
				Tpl::showpage( "pointprod.iframe_upload", "blank_layout" );
		}

		public function ajaxdeluploadOp( )
		{
				if ( 0 < intval( $_GET['file_id'] ) )
				{
						$model_upload = model( "upload" );
						$file_array = $model_upload->getOneUpload( intval( $_GET['file_id'] ) );
						@unlink( BasePath.DS.ATTACH_POINTPROD.DS.$file_array['file_name'] );
						$model_upload->del( intval( $_GET['file_id'] ) );
						echo "true";
						exit( );
				}
				echo "false";
				exit( );
		}

}

?>
