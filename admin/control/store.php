<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class storeControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "store" );
		}

		public function storeOp( )
		{
				$lang = Language::getlangcontent( );
				$model_store = model( "store" );
				$condition['like_owner_and_name'] = trim( $_GET['owner_and_name'] );
				$condition['like_store_name'] = trim( $_GET['store_name'] );
				$condition['grade_id'] = intval( $_GET['grade_id'] );
				Tpl::output( "owner_and_name", trim( $_GET['owner_and_name'] ) );
				Tpl::output( "store_name", trim( $_GET['store_name'] ) );
				Tpl::output( "grade_id", intval( $_GET['grade_id'] ) );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition['store_audit'] = "1";
				$store_list = $model_store->getStoreList( $condition, $page );
				$model_grade = model( "store_grade" );
				$grade_list = $model_grade->getGradeList( $condition );
				if ( !empty( $grade_list ) )
				{
						$search_grade_list = array( );
						foreach ( $grade_list as $k => $v )
						{
								$search_grade_list[$v['sg_id']] = $v['sg_name'];
						}
				}
				if ( !empty( $store_list ) )
				{
						foreach ( $store_list as $k => $v )
						{
								$store_list[$k]['grade_name'] = $search_grade_list[$v['grade_id']];
								$store_list[$k]['state'] = $v['store_state'] == 1 ? $lang['open'] : $lang['close'];
								$store_list[$k]['store_end_time'] = $v['store_end_time'] ? date( "Y-m-d", $v['store_end_time'] ) : $lang['no_limit'];
						}
				}
				Tpl::output( "grade_list", $grade_list );
				Tpl::output( "store_list", $store_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "store.index" );
		}

		public function store_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_store = model( "store" );
				if ( chksubmit( ) )
				{
						if ( $_POST['step'] == "one" )
						{
								$obj_validate = new Validate( );
								$obj_validate->setValidate( array(
										"input" => $_POST['member_name'],
										"require" => "true",
										"message" => $lang['user_name_no_null']
								) );
								if ( $_POST['need_password'] == 1 )
								{
										$obj_validate->setValidate( array(
												"input" => $_POST['member_passwd'],
												"require" => "true",
												"message" => $lang['pwd_no_null']
										) );
								}
								$error = $obj_validate->validate( );
								if ( $error != "" )
								{
										showmessage( $error );
								}
								else
								{
										$model_member = model( "member" );
										$condition['member_name'] = trim( $_POST['member_name'] );
										$member_array = $model_member->infoMember( $condition );
										if ( 0 < $member_array['store_id'] )
										{
												showmessage( $lang['user_open_store'] );
										}
										if ( empty( $member_array ) )
										{
												showmessage( $lang['user_no_exist'] );
										}
										if ( $_POST['need_password'] == 1 && $member_array['member_passwd'] !== md5( $_POST['member_passwd'] ) )
										{
												showmessage( $lang['pwd_fail'] );
										}
										$model_grade = model( "store_grade" );
										$grade_list = $model_grade->getGradeList( $condition );
										$model_store_class = model( "store_class" );
										$parent_list = $model_store_class->getTreeClassList( 2 );
										if ( is_array( $parent_list ) )
										{
												foreach ( $parent_list as $k => $v )
												{
														$parent_list[$k]['sc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['sc_name'];
												}
										}
										Tpl::output( "class_list", $parent_list );
										Tpl::output( "grade_list", $grade_list );
										Tpl::output( "member_array", $member_array );
										Tpl::showpage( "store.add_two" );
								}
						}
						if ( $_POST['step'] == "two" )
						{
								$obj_validate = new Validate( );
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['store_name'],
												"require" => "true",
												"message" => $lang['please_input_store_name_p']
										)
								);
								$error = $obj_validate->validate( );
								if ( $error != "" )
								{
										showmessage( $error );
								}
								else
								{
										$model_grade = model( "store_grade" );
										$grade_array = $model_grade->getOneGrade( intval( $_POST['grade_id'] ) );
										if ( empty( $grade_array ) )
										{
												showmessage( $lang['please_input_store_level'] );
										}
										if ( trim( $_POST['end_time'] ) != "" )
										{
												$time = strtotime( $_POST['end_time'] );
										}
										$insert_array = array( );
										$insert_array['member_name'] = trim( $_POST['member_name'] );
										$insert_array['member_id'] = intval( $_POST['member_id'] );
										$insert_array['store_owner_card'] = trim( $_POST['store_owner_card'] );
										$insert_array['store_name'] = trim( $_POST['store_name'] );
										$insert_array['sc_id'] = intval( $_POST['sc_id'] );
										$insert_array['area_id'] = intval( $_POST['area_id'] );
										$insert_array['area_info'] = trim( $_POST['area_info'] );
										$insert_array['store_address'] = trim( $_POST['store_address'] );
										$insert_array['store_zip'] = trim( $_POST['store_zip'] );
										$insert_array['store_tel'] = trim( $_POST['store_tel'] );
										$insert_array['grade_id'] = intval( $_POST['grade_id'] );
										$insert_array['store_end_time'] = $time;
										$insert_array['store_time'] = time( );
										$insert_array['store_state'] = trim( $_POST['store_state'] );
										if ( $_POST['store_state'] == "0" )
										{
												$insert_array['store_close_info'] = $_POST['store_close_info'];
												$insert_array['store_recommend'] = 0;
										}
										else
										{
												$insert_array['store_recommend'] = trim( $_POST['store_recommend'] );
										}
										$insert_array['name_auth'] = trim( $_POST['name_auth'] );
										$insert_array['store_auth'] = trim( $_POST['store_auth'] );
										$insert_array['store_sort'] = intval( $_POST['store_sort'] );
										if ( $grade_array['sg_confirm'] == 1 )
										{
												$insert_array['store_audit'] = 0;
										}
										else
										{
												$insert_array['store_audit'] = 1;
										}
										$insert_array['store_sort'] = intval( $_POST['store_sort'] );
										$insert_array['store_audit'] = $grade_array['sg_confirm'] == 1 ? 0 : 1;
										$store_info = $model_store->shopStore( array(
												"store_name" => $insert_array['store_name']
										) );
										if ( 0 < $store_info['store_id'] )
										{
												showmessage( $lang['store_name_exists'] );
										}
										$result = $model_store->add( $insert_array );
										if ( $result )
										{
												$model_member = model( "member" );
												$update_array = array( );
												$update_array['store_id'] = $result;
												$model_member->updateMember( $update_array, intval( $_POST['member_id'] ) );
												require_once( BasePath.DS."resource".DS."phpqrcode".DS."index.php" );
												$PhpQRCode = new PhpQRCode( );
												$PhpQRCode->set( "date", SiteUrl.DS.ncurl( array(
														"act" => "show_store",
														"id" => $result
												), "store" ) );
												$PhpQRCode->set( "pngTempDir", BasePath.DS.ATTACH_STORE.DS );
												$model_store->storeUpdate( array(
														"store_code" => $PhpQRCode->init( ),
														"store_id" => $result
												) );
												$album_model = model( "album" );
												$album_arr = array( );
												$album_arr['aclass_name'] = Language::get( "store_save_defaultalbumclass_name" );
												$album_arr['store_id'] = $result;
												$album_arr['aclass_des'] = "";
												$album_arr['aclass_sort'] = "255";
												$album_arr['aclass_cover'] = "";
												$album_arr['upload_time'] = time( );
												$album_arr['is_default'] = "1";
												$album_model->addClass( $album_arr );
												$url = array(
														array(
																"url" => "index.php?act=store&op=store",
																"msg" => $lang['back_store_list']
														),
														array(
																"url" => "index.php?act=store&op=store_add",
																"msg" => $lang['countinue_add_store']
														)
												);
												showmessage( $lang['add_store_ok'], $url );
										}
										else
										{
												showmessage( $lang['add_fail_fail'] );
										}
								}
						}
				}
				Tpl::showpage( "store.add_one" );
		}

		public function store_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_store = model( "store" );
				if ( chksubmit( ) )
				{
						$model_grade = model( "store_grade" );
						$grade_array = $model_grade->getOneGrade( intval( $_POST['grade_id'] ) );
						if ( empty( $grade_array ) )
						{
								showmessage( $lang['please_input_store_level'] );
						}
						$time = "";
						if ( trim( $_POST['end_time'] ) != "" )
						{
								$time = strtotime( $_POST['end_time'] );
						}
						$update_array = array( );
						$update_array['store_id'] = intval( $_POST['store_id'] );
						$update_array['store_owner_card'] = trim( $_POST['store_owner_card'] );
						$update_array['store_name'] = trim( $_POST['store_name'] );
						$update_array['sc_id'] = intval( $_POST['sc_id'] );
						$update_array['area_id'] = intval( $_POST['area_id'] );
						$update_array['area_info'] = trim( $_POST['area_info'] );
						$update_array['store_address'] = trim( $_POST['store_address'] );
						$update_array['store_zip'] = trim( $_POST['store_zip'] );
						$update_array['store_tel'] = trim( $_POST['store_tel'] );
						$update_array['grade_id'] = intval( $_POST['grade_id'] );
						$update_array['store_end_time'] = $time;
						$update_array['store_state'] = intval( $_POST['store_state'] );
						$store_info = $model_store->shopStore( array(
								"store_name" => $update_array['store_name']
						) );
						if ( 0 < $store_info['store_id'] && $store_info['store_id'] != $update_array['store_id'] )
						{
								showmessage( $lang['store_name_exists'] );
						}
						if ( $_POST['store_state'] == "0" )
						{
								$model_goods = model( "goods" );
								$model_goods->updateGoodsStoreStateByStoreId( $update_array['store_id'], "close" );
								$update_array['store_close_info'] = trim( $_POST['store_close_info'] );
								$update_array['store_recommend'] = 0;
						}
						else
						{
								$update_array['store_close_info'] = "";
								$update_array['store_recommend'] = intval( $_POST['store_recommend'] );
						}
						$update_array['name_auth'] = intval( $_POST['name_auth'] );
						$update_array['store_auth'] = intval( $_POST['store_auth'] );
						$update_array['store_sort'] = intval( $_POST['store_sort'] );
						$update_array['store_audit'] = intval( $_POST['store_audit'] );
						$result = $model_store->storeUpdate( $update_array );
						if ( $result )
						{
								if ( $_POST['store_state'] == 0 )
								{
										$store_info = $model_store->shopStore( array(
												"store_id" => $_POST['store_id']
										) );
										$msg_code = "msg_toseller_store_closed_notify";
										$param = array(
												"reason" => $_POST['store_close_info']
										);
										self::send_notice( $store_info['member_id'], $msg_code, $param );
								}
								$url = array(
										array(
												"url" => "index.php?act=store&op=store",
												"msg" => $lang['back_store_list']
										),
										array(
												"url" => "index.php?act=store&op=store_edit&store_id=".intval( $_POST['store_id'] ),
												"msg" => $lang['countinue_add_store']
										)
								);
								showmessage( $lang['update_store_ok'], $url );
						}
						else
						{
								showmessage( $lang['update_fail_fail'] );
						}
				}
				$condition['store_id'] = intval( $_GET['store_id'] );
				$store_array = $model_store->shopStore( $condition );
				if ( empty( $store_array ) )
				{
						showmessage( $lang['store_no_exist'] );
				}
				$store_array['store_end_time'] = $store_array['store_end_time'] ? date( "Y-m-d", $store_array['store_end_time'] ) : "";
				$model_store_class = model( "store_class" );
				$parent_list = $model_store_class->getTreeClassList( 2 );
				if ( is_array( $parent_list ) )
				{
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['sc_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['sc_name'];
						}
				}
				$model_grade = model( "store_grade" );
				$grade_list = $model_grade->getGradeList( );
				Tpl::output( "grade_list", $grade_list );
				Tpl::output( "class_list", $parent_list );
				Tpl::output( "store_array", $store_array );
				Tpl::showpage( "store.edit" );
		}

		public function store_auditOp( )
		{
				$lang = Language::getlangcontent( );
				$model_store = model( "store" );
				if ( $_GET['type'] == "del" )
				{
						$model_member = model( "member" );
						$v = intval( $_GET['id'] );
						if ( 0 < $v )
						{
								$condition['store_id'] = $v;
								$store_array = $model_store->shopStore( $condition );
								$model_store->del( $v );
								$result = $model_member->updateMember( array( "store_id" => 0 ), $store_array['member_id'] );
								if ( $result )
								{
										$msg_code = "msg_toseller_store_refused_notify";
										$param = array(
												"reason" => $lang['store_no_meet']
										);
										self::send_notice( $store_array['member_id'], $msg_code, $param );
								}
						}
						showmessage( $lang['operation_ok'] );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['del_id'] ) )
						{
								if ( $_POST['type'] == "ok" )
								{
										foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
										{
												$v = intval( $v );
												$update_array = array( );
												$update_array['store_id'] = $v;
												$update_array['store_audit'] = 1;
												$result = $model_store->storeUpdate( $update_array );
												if ( $result )
												{
														$store_info = $model_store->shopStore( array(
																"store_id" => $v
														) );
														$msg_code = "msg_toseller_store_passed_notify";
														$param = array( );
														self::send_notice( $store_info['member_id'], $msg_code, $param );
												}
										}
										unset( $model_store );
								}
								showmessage( $lang['operation_ok'] );
						}
						else
						{
								showmessage( $lang['please_sel_store'] );
						}
				}
				$condition['like_owner_and_name'] = trim( $_GET['owner_and_name'] );
				$condition['like_store_name'] = trim( $_GET['store_name'] );
				$condition['grade_id'] = intval( $_GET['grade_id'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition['store_audit'] = "0";
				$store_list = $model_store->getStoreList( $condition, $page );
				$model_grade = model( "store_grade" );
				$grade_list = $model_grade->getGradeList( $condition );
				if ( !empty( $grade_list ) )
				{
						$search_grade_list = array( );
						foreach ( $grade_list as $k => $v )
						{
								$search_grade_list[$v['sg_id']] = $v['sg_name'];
						}
				}
				if ( !empty( $store_list ) )
				{
						foreach ( $store_list as $k => $v )
						{
								$store_list[$k]['grade_name'] = $search_grade_list[$v['grade_id']];
								$store_list[$k]['state'] = $v['store_state'] == 1 ? $lang['open'] : $lang['close'];
								$store_list[$k]['store_end_time'] = $v['store_end_time'] ? date( "Y-m-d", $v['store_end_time'] ) : $lang['no_limit'];
						}
				}
				Tpl::output( "grade_list", $grade_list );
				Tpl::output( "store_list", $store_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "store.audit" );
		}

		public function store_delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( 0 < intval( $_GET['store_id'] ) )
				{
						$model_store = model( "store" );
						$model_goods = model( "goods" );
						$model_member = model( "member" );
						$model_album = model( "album" );
						$condition['store_id'] = intval( $_GET['store_id'] );
						$store_array = $model_store->shopStore( $condition );
						$update_array = array( );
						$update_array['store_id'] = 0;
						$model_member->updateMember( $update_array, $store_array['member_id'] );
						$model_store->del( intval( $_GET['store_id'] ) );
						$model_goods->dropGoodsByStore( intval( $_GET['store_id'] ) );
						$model_store->favorites_store_del( intval( $_GET['store_id'] ) );
						$model_album->delAlbum( $_GET['store_id'] );
						$msg_code = "msg_toseller_store_droped_notify";
						$param = array( );
						self::send_notice( $store_array['member_id'], $msg_code, $param );
						showmessage( $lang['del_store_ok'] );
				}
				else
				{
						showmessage( $lang['please_sel_del_store'] );
				}
		}

		public function store_batch_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_store = model( "store" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->setValidate( array(
								"input" => $_POST['id'],
								"require" => "true",
								"message" => $lang['please_sel_edit_store']
						) );
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$id_array = explode( "|", $_POST['id'] );
								if ( empty( $id_array ) )
								{
										showmessage( $lang['please_sel_edit_store'], "index.php?act=store&op=store" );
								}
								$update_array = array( );
								if ( !empty( $_POST['area_id'] ) )
								{
										$update_array['area_id'] = intval( $_POST['area_id'] );
										$update_array['area_info'] = trim( $_POST['area_info'] );
								}
								if ( !empty( $_POST['grade_id'] ) )
								{
										$update_array['grade_id'] = intval( $_POST['grade_id'] );
								}
								if ( $_POST['certification'] == 1 )
								{
										$update_array['name_auth'] = intval( $_POST['name_auth'] );
										$update_array['store_auth'] = intval( $_POST['store_auth'] );
								}
								if ( 0 <= $_POST['store_recommend'] )
								{
										$update_array['store_recommend'] = intval( $_POST['store_recommend'] );
								}
								if ( !empty( $_POST['store_sort'] ) )
								{
										$update_array['store_sort'] = intval( $_POST['store_sort'] );
								}
								if ( is_array( $id_array ) )
								{
										foreach ( $id_array as $k => $v )
										{
												$update_array['store_id'] = $v;
												$model_store->storeUpdate( $update_array );
										}
								}
								showmessage( $lang['store_batch_del_ok'], "index.php?act=store&op=store" );
						}
				}
				if ( empty( $_GET['id'] ) )
				{
						showmessage( $lang['please_sel_edit_store'] );
				}
				$model_grade = model( "store_grade" );
				$grade_list = $model_grade->getGradeList( $condition );
				Tpl::output( "grade_list", $grade_list );
				Tpl::output( "id", $_GET['id'] );
				Tpl::showpage( "store.batch_edit" );
		}

		public function store_domainOp( )
		{
				$lang = Language::getlangcontent( );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition = array( );
				$condition['store_audit'] = "1";
				$condition['store_domain_not_null'] = "1";
				$condition['like_store_name'] = trim( $_GET['store_name'] );
				$condition['like_store_domain'] = trim( $_GET['store_domain'] );
				$model_store = model( "store" );
				$store_list = $model_store->getStoreList( $condition, $page );
				if ( !empty( $store_list ) )
				{
						foreach ( $store_list as $k => $v )
						{
								$store_list[$k]['state'] = $v['store_state'] == 1 ? $lang['open'] : $lang['close'];
						}
				}
				Tpl::output( "store_list", $store_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "store_domain.index" );
		}

		public function store_domain_editOp( )
		{
				$condition = array( );
				$condition['store_id'] = intval( $_GET['store_id'] );
				$model_store = model( "store" );
				$store_array = $model_store->shopStore( $condition );
				$setting_config = $GLOBALS['setting_config'];
				$subdomain_times = intval( $setting_config['subdomain_times'] );
				$subdomain_length = explode( "-", $setting_config['subdomain_length'] );
				$subdomain_length[0] = intval( $subdomain_length[0] );
				$subdomain_length[1] = intval( $subdomain_length[1] );
				if ( $subdomain_length[0] < 1 || $subdomain_length[1] <= $subdomain_length[0] )
				{
						$subdomain_length[0] = 3;
						$subdomain_length[1] = 12;
				}
				Tpl::output( "subdomain_length", $subdomain_length );
				if ( $_POST['form_submit'] == "ok" )
				{
						$store_domain_times = intval( $_POST['store_domain_times'] );
						$store_domain = trim( $_POST['store_domain'] );
						$store_id = intval( $_POST['store_id'] );
						$store_domain = strtolower( $store_domain );
						$param = array( );
						$param['store_id'] = $store_id;
						$param['store_domain_times'] = $store_domain_times;
						$param['store_domain'] = "";
						if ( !empty( $store_domain ) )
						{
								$store_domain_count = strlen( $store_domain );
								if ( $store_domain_count < $subdomain_length[0] || $subdomain_length[1] < $store_domain_count )
								{
										showmessage( Language::get( "store_domain_length_error" ).": ".$setting_config['subdomain_length'] );
								}
								if ( !preg_match( "/^[\\w-]+\$/i", $store_domain ) )
								{
										showmessage( Language::get( "store_domain_invalid" ) );
								}
								$store_info = $model_store->shopStore( array(
										"store_domain" => $store_domain
								) );
								if ( !empty( $store_info ) || $store_id != $store_info['store_id'] )
								{
										showmessage( Language::get( "store_domain_exists" ) );
								}
								$subdomain_reserved = @explode( ",", $setting_config['subdomain_reserved'] );
								if ( !empty( $subdomain_reserved ) || is_array( $subdomain_reserved ) && in_array( $store_domain, $subdomain_reserved ) )
								{
										showmessage( Language::get( "store_domain_sys" ) );
								}
								$param['store_domain'] = $store_domain;
						}
						$model_store->storeUpdate( $param );
						showmessage( Language::get( "store_domain_edit_success" ), "index.php?act=store&op=store_domain" );
				}
				Tpl::output( "store_array", $store_array );
				Tpl::showpage( "store_domain.edit" );
		}

		public function del_authOp( )
		{
				if ( intval( $_GET['store_id'] ) === "" || trim( $_GET['key'] ) == "" )
				{
						return FALSE;
				}
				$model_store = model( "store" );
				$get_store = $model_store->shopStore( array(
						"store_id" => intval( $_GET['store_id'] )
				) );
				$path = BasePath.DS.ATTACH_AUTH.DS.$get_store[$_GET['key']];
				if ( @!unlink( $path ) || file_exists( $path ) )
				{
						return FALSE;
				}
				$result = $model_store->storeUpdate( array(
						"store_id" => intval( $_GET['store_id'] ),
						""
				) );
				if ( !$result )
				{
						return FALSE;
				}
				echo "true";
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "store_sort" :
						$model_store = model( "store" );
						$update_array['store_id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_store->storeUpdate( $update_array );
						echo "true";
						exit( );
				case "store_recommend" :
						$model_store = model( "store" );
						$update_array['store_id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_store->storeUpdate( $update_array );
						echo "true";
						exit( );
				}
		}

}

?>
