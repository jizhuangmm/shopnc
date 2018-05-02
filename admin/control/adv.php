<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class advControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "adv" );
		}

		public function adv_cache_refreshOp( )
		{
				$lang = Language::getlangcontent( );
				$time = time( );
				$adv = model( "adv" );
				$dirName = BasePath.DS."cache".DS."adv";
				$handle = opendir( $dirName );
				while ( ( $file = readdir( $handle ) ) !== FALSE )
				{
						if ( !( $file != "." ) && !( $file != ".." ) && !( $file != ".svn" ) )
						{
								$file = BasePath.DS."cache".DS."adv".DS.$file;
								unlink( $file );
						}
				}
				closedir( $handle );
				$adv_info = $adv->getList( "" );
				$ap_array = array( );
				foreach ( $adv_info as $k => $v )
				{
						$ap_array[$v['ap_id']][] = $v;
						if ( $time < $v['adv_end_date'] && $v['is_allow'] == "1" )
						{
								$adv->makeAdvCache( $v );
						}
						else
						{
								$adv->deladcache( $v['adv_id'], "adv" );
						}
				}
				$ap_info = $adv->getApList( );
				foreach ( $ap_info as $k => $v )
				{
						$adv->makeApCache( $v, $ap_array[$v['ap_id']] );
				}
				$url = array(
						array(
								"url" => "index.php?act=adv&op=adv",
								"msg" => $lang['goback_adv_manage']
						)
				);
				showmessage( $lang['adv_cache_refresh_done'], $url );
		}

		public function adv_checkOp( )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				if ( $_GET['do'] == "check" )
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$condition['adv_id'] = intval( $_GET['adv_id'] );
						$adv_list = $adv->getList( $condition );
						$adv_list = $adv_list[0];
						$ap_info = $adv->getApList( );
						foreach ( $ap_info as $ap_k => $ap_v )
						{
								if ( !( $adv_list['ap_id'] == $ap_v['ap_id'] ) )
								{
										continue;
								}
								$ap_info = $ap_v;
								break;
						}
						Tpl::output( "adv_list", $adv_list );
						Tpl::output( "ap_info", $ap_info );
						Tpl::showpage( "adv_check_view" );
				}
				if ( $_GET['savecheck'] == "yes" )
				{
						$param['is_allow'] = "1";
						$getadvinfo['adv_id'] = intval( $_GET['adv_id'] );
						$advinfo = $adv->getList( $getadvinfo );
						$advinfo = $advinfo['0'];
						if ( $advinfo['buy_style'] == "change" )
						{
								$cache_file = BasePath.DS."cache".DS."adv_change".DS."adv_".intval( $_GET['adv_id'] ).".change.php";
								include( $cache_file );
								$param['adv_content'] = $content;
								unlink( $cache_file );
						}
						$param['adv_id'] = intval( $_GET['adv_id'] );
						$result = $adv->update( $param );
						$adv->makeAdvCache( intval( $_GET['adv_id'] ) );
						$adv->makeApCache( intval( $_GET['ap_id'] ) );
						if ( $result )
						{
								$url = array(
										array(
												"url" => "index.php?act=adv&op=adv_check",
												"msg" => $lang['goback_to_adv_check']
										)
								);
								showmessage( $lang['adv_check_ok'], $url );
						}
						else
						{
								showmessage( $lang['adv_check_failed'] );
						}
				}
				if ( $_GET['savecheck'] == "no" )
				{
						$getadvinfo['adv_id'] = intval( $_GET['adv_id'] );
						$advinfo = $adv->getList( $getadvinfo );
						$advinfo = $advinfo['0'];
						if ( $advinfo['buy_style'] == "change" )
						{
								$param['is_allow'] = "1";
								$param['adv_id'] = intval( $_GET['adv_id'] );
								$result = $adv->update( $param );
								$cache_file = BasePath.DS."cache".DS."adv_change".DS."adv_".intval( $_GET['adv_id'] ).".change.php";
								unlink( $cache_file );
								$result2 = TRUE;
								$result3 = TRUE;
						}
						else
						{
								$param['is_allow'] = "2";
								$param['adv_id'] = intval( $_GET['adv_id'] );
								$result = $adv->update( $param );
								$member_model = model( "member" );
								$member_array = $member_model->infoMember( array(
										"member_name" => $advinfo['member_name']
								) );
								$goldpay = $advinfo['goldpay'];
								$newmember_goldnum = intval( $member_array['member_goldnum'] ) + $goldpay;
								$newmember_goldnumcount = intval( $member_array['member_goldnumcount'] ) + $goldpay;
								$result2 = $member_model->updateMember( array(
										"member_goldnum" => $newmember_goldnum,
										"member_goldnumcount" => $newmember_goldnumcount
								), $member_array['member_id'] );
								$goldlog_model = model( "gold_log" );
								$insert_goldlog = array( );
								$insert_goldlog['glog_memberid'] = $member_array['member_id'];
								$insert_goldlog['glog_membername'] = $member_array['member_name'];
								$insert_goldlog['glog_storeid'] = $member_array['store_id'];
								$insert_goldlog['glog_storename'] = $member_array['store_name'];
								$insert_goldlog['glog_adminid'] = 0;
								$insert_goldlog['glog_adminname'] = "";
								$insert_goldlog['glog_goldnum'] = $goldpay;
								$insert_goldlog['glog_method'] = 1;
								$insert_goldlog['glog_addtime'] = time( );
								$insert_goldlog['glog_desc'] = $lang['return_goldpay'];
								$insert_goldlog['glog_stage'] = "adv_buy";
								$result3 = $goldlog_model->add( $insert_goldlog );
						}
						if ( $result && $result2 && $result3 )
						{
								$url = array(
										array(
												"url" => "index.php?act=adv&op=adv_check",
												"msg" => $lang['goback_to_adv_check']
										)
								);
								showmessage( $lang['adv_check_ok'], $url );
						}
						else
						{
								showmessage( $lang['adv_check_failed'] );
						}
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition = array( );
				$condition['is_allow'] = "0";
				switch ( $_GET['style'] )
				{
				case "buy" :
						$condition['buy_style'] = "buy";
						break;
				case "order" :
						$condition['buy_style'] = "order";
						break;
				case "change" :
						$condition['buy_style'] = "change";
						break;
				case "noallow" :
						$condition['is_allow'] = "2";
				}
				$limit = "";
				$orderby = "";
				if ( $_GET['search_name'] != "" )
				{
						$condition['adv_title'] = trim( $_GET['search_name'] );
				}
				if ( $_GET['add_time_from'] != "" )
				{
						$condition['add_time_from'] = $this->getunixtime( trim( $_GET['add_time_from'] ) );
				}
				if ( $_GET['add_time_to'] != "" )
				{
						$condition['add_time_to'] = $this->getunixtime( trim( $_GET['add_time_to'] ) );
				}
				$adv_info = $adv->getList( $condition, $page, $limit, $orderby );
				$ap_info = $adv->getApList( );
				Tpl::output( "adv_info", $adv_info );
				Tpl::output( "ap_info", $ap_info );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "adv_check.index" );
		}

		public function adv_addOp( )
		{
				if ( $_POST['form_submit'] != "ok" )
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$ap_list = $adv->getApList( );
						Tpl::output( "ap_list", $ap_list );
						Tpl::showpage( "adv_add" );
				}
				else
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$upload = new UploadFile( );
						$obj_validate = new Validate( );
						$validate_arr = array( );
						$validate_arr[] = array(
								"input" => $_POST['adv_name'],
								"require" => "true",
								"message" => $lang['adv_can_not_null']
						);
						$validate_arr[] = array(
								"input" => $_POST['aptype_hidden'],
								"require" => "true",
								"message" => $lang['must_select_ap']
						);
						$validate_arr[] = array(
								"input" => $_POST['ap_id'],
								"require" => "true",
								"message" => $lang['must_select_ap']
						);
						$validate_arr[] = array(
								"input" => $_POST['adv_start_time'],
								"require" => "true",
								"message" => $lang['must_select_start_time']
						);
						$validate_arr[] = array(
								"input" => $_POST['adv_end_time'],
								"require" => "true",
								"message" => $lang['must_select_end_time']
						);
						if ( $_POST['aptype_hidden'] == "1" )
						{
								$validate_arr[] = array(
										"input" => $_POST['adv_word'],
										"require" => "true",
										"message" => $lang['textadv_null_error']
								);
						}
						else if ( $_POST['aptype_hidden'] == "2" )
						{
								$validate_arr[] = array(
										"input" => $_FILES['adv_slide_pic']['name'],
										"require" => "true",
										"message" => $lang['slideadv_null_error']
								);
								$validate_arr[] = array(
										"input" => $_POST['adv_slide_sort'],
										"require" => "true",
										"message" => $lang['slideadv_sortnull_error']
								);
						}
						else if ( $_POST['aptype_hidden'] == "3" )
						{
								$validate_arr[] = array(
										"input" => $_FILES['flash_swf']['name'],
										"require" => "true",
										"message" => $lang['flashadv_null_error']
								);
						}
						else
						{
								$validate_arr[] = array(
										"input" => $_FILES['adv_pic']['name'],
										"require" => "true",
										"message" => $lang['picadv_null_error']
								);
						}
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$insert_array['adv_title'] = trim( $_POST['adv_name'] );
								$insert_array['ap_id'] = intval( $_POST['ap_id'] );
								$insert_array['adv_start_date'] = $this->getunixtime( $_POST['adv_start_time'] );
								$insert_array['adv_end_date'] = $this->getunixtime( $_POST['adv_end_time'] );
								$insert_array['is_allow'] = "1";
								switch ( CHARSET )
								{
								case "UTF-8" :
										$charrate = 3;
										break;
								case "GBK" :
										$charrate = 2;
								}
								if ( $_POST['aptype_hidden'] == "0" )
								{
										$upload->set( "default_dir", ATTACH_ADV );
										$result = $upload->upfile( "adv_pic" );
										if ( !$result )
										{
												showmessage( $upload->error, "", "", "error" );
										}
										$ac = array(
												"adv_pic" => $upload->file_name,
												"adv_pic_url" => trim( $_POST['adv_pic_url'] )
										);
										$ac = serialize( $ac );
										$insert_array['adv_content'] = $ac;
								}
								if ( $_POST['aptype_hidden'] == "1" )
								{
										if ( $_POST['adv_word_len'] * $charrate < strlen( $_POST['adv_word'] ) )
										{
												$error = $lang['wordadv_toolong'];
												showmessage( $error );
												exit( );
										}
										$ac = array(
												"adv_word" => trim( $_POST['adv_word'] ),
												"adv_word_url" => trim( $_POST['adv_word_url'] )
										);
										$ac = serialize( $ac );
										$insert_array['adv_content'] = $ac;
								}
								if ( $_POST['aptype_hidden'] == "2" )
								{
										$upload->set( "default_dir", ATTACH_ADV );
										$upload->upfile( "adv_slide_pic" );
										$ac = array(
												"adv_slide_pic" => $upload->file_name,
												"adv_slide_url" => trim( $_POST['adv_slide_url'] )
										);
										$ac = serialize( $ac );
										$insert_array['adv_content'] = $ac;
										$insert_array['slide_sort'] = trim( $_POST['adv_slide_sort'] );
								}
								if ( $_POST['aptype_hidden'] == "3" )
								{
										$upload->set( "default_dir", ATTACH_ADV );
										$upload->upfile( "flash_swf" );
										$ac = array(
												"flash_swf" => $upload->file_name,
												"flash_url" => trim( $_POST['flash_url'] )
										);
										$ac = serialize( $ac );
										$insert_array['adv_content'] = $ac;
								}
								$result = $adv->adv_add( $insert_array );
								$condition['ap_id'] = intval( $_POST['ap_id'] );
								$ap_list = $adv->getApList( $condition );
								$ap_list = $ap_list['0'];
								$adv_num = $ap_list['adv_num'];
								$param['ap_id'] = intval( $_POST['ap_id'] );
								$param['adv_num'] = $adv_num + 1;
								$result2 = $adv->ap_update( $param );
								$adv_info = $adv->getList( "", "", "", "adv_id desc" );
								$adv_info = $adv_info['0'];
								$adv->makeAdvCache( $adv_info['adv_id'] );
								$adv->makeApCache( intval( $_POST['ap_id'] ) );
								if ( $result && $result2 )
								{
										$url = array(
												array(
														"url" => "index.php?act=adv&op=adv",
														"msg" => $lang['goback_adv_manage']
												),
												array(
														"url" => "index.php?act=adv&op=adv_add",
														"msg" => $lang['resume_adv_add']
												)
										);
										showmessage( $lang['adv_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['adv_add_fail'] );
								}
						}
				}
		}

		public function ap_manageOp( )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				if ( $_GET['do'] == "stat_change" )
				{
						if ( $_GET['stat'] == "1" )
						{
								$param['is_use'] = "0";
						}
						else
						{
								$param['is_use'] = "1";
						}
						$where = "where ap_id = ".intval( $_GET['ap_id'] );
						$result = Db::update( "adv_position", $param, $where );
						$adv->makeApCache( intval( $_GET['ap_id'] ) );
						if ( !$result )
						{
								$url = array(
										array(
												"url" => "index.php?act=adv&op=adv",
												"msg" => $lang['goback_adv_manage']
										),
										array(
												"url" => "index.php?act=adv&op=ap_manage",
												"msg" => $lang['goback_ap_manage']
										)
								);
								showmessage( $lang['ap_stat_edit_fail'], $url );
								exit( );
						}
				}
				if ( $_GET['do'] == "del" )
				{
						$result = $adv->ap_del( intval( $_GET['ap_id'] ) );
						if ( !$result )
						{
								$url = array(
										array(
												"url" => "index.php?act=adv&op=adv",
												"msg" => $lang['goback_adv_manage']
										),
										array(
												"url" => "index.php?act=adv&op=ap_manage",
												"msg" => $lang['goback_ap_manage']
										)
								);
								showmessage( $lang['ap_del_fail'], $url );
								exit( );
						}
						showmessage( $lang['ap_del_succ'], $url );
						exit( );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['del_id'] ) )
						{
								$in_array_id = implode( ",", $_POST['del_id'] );
								$where = "where ap_id in (".$in_array_id.")";
								Db::delete( "adv_position", $where );
						}
						$url = array(
								array(
										"url" => trim( $_POST['ref_url'] ),
										"msg" => $lang['goback_ap_manage']
								)
						);
						showmessage( $lang['ap_del_succ'], $url );
				}
				$condition = array( );
				$orderby = "";
				if ( $_GET['search_name'] != "" )
				{
						$condition['ap_name'] = trim( $_GET['search_name'] );
				}
				if ( $_GET['order'] == "clicknum" )
				{
						$orderby = "click_num desc";
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$ap_list = $adv->getApList( $condition, $page, $orderby );
				$adv_list = $adv->getList( );
				$click_list = $adv->getClickList( );
				Tpl::output( "ap_list", $ap_list );
				Tpl::output( "adv_list", $adv_list );
				Tpl::output( "click_list", $click_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "ap_manage" );
		}

		public function ap_copyOp( )
		{
				Tpl::showpage( "ap_copy", "null_layout" );
		}

		public function ap_editOp( )
		{
				if ( $_POST['form_submit'] != "ok" )
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$condition['ap_id'] = intval( $_GET['ap_id'] );
						$ap_list = $adv->getApList( $condition );
						Tpl::output( "ref_url", getreferer( ) );
						Tpl::output( "ap_list", $ap_list );
						Tpl::showpage( "ap_edit" );
				}
				else
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$upload = new UploadFile( );
						$obj_validate = new Validate( );
						if ( $_POST['ap_class'] == "1" )
						{
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['ap_name'],
												"require" => "true",
												"message" => $lang['ap_can_not_null']
										),
										array(
												"input" => $_POST['ap_price'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_price_must_num']
										),
										array(
												"input" => $_POST['ap_width'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_width_must_num']
										)
								);
						}
						else
						{
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['ap_name'],
												"require" => "true",
												"message" => $lang['ap_can_not_null']
										),
										array(
												"input" => $_POST['ap_price'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_price_must_num']
										),
										array(
												"input" => $_POST['ap_width'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_width_must_num']
										),
										array(
												"input" => $_POST['ap_height'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_height_must_num']
										)
								);
						}
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$param['ap_id'] = intval( $_GET['ap_id'] );
								$param['ap_name'] = trim( $_POST['ap_name'] );
								$param['ap_intro'] = trim( $_POST['ap_intro'] );
								$param['ap_price'] = intval( trim( $_POST['ap_price'] ) );
								$param['ap_width'] = intval( trim( $_POST['ap_width'] ) );
								$param['ap_height'] = intval( trim( $_POST['ap_height'] ) );
								if ( $_POST['ap_display'] != "" )
								{
										$param['ap_display'] = intval( $_POST['ap_display'] );
								}
								if ( $_POST['is_use'] != "" )
								{
										$param['is_use'] = intval( $_POST['is_use'] );
								}
								if ( $_FILES['default_pic']['name'] != "" )
								{
										$upload->set( "default_dir", ATTACH_ADV );
										$result = $upload->upfile( "default_pic" );
										if ( !$result )
										{
												showmessage( $upload->error, "", "", "error" );
										}
										$param['default_content'] = $upload->file_name;
								}
								if ( $_POST['default_word'] != "" )
								{
										$param['default_content'] = trim( $_POST['default_word'] );
								}
								$result = $adv->ap_update( $param );
								$adv->makeApCache( intval( $_GET['ap_id'] ) );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=adv&op=adv",
														"msg" => $lang['goback_adv_manage']
												),
												array(
														"url" => trim( $_POST['ref_url'] ),
														"msg" => $lang['goback_ap_manage']
												)
										);
										showmessage( $lang['ap_change_succ'], $url );
								}
								else
								{
										showmessage( $lang['ap_change_fail'], $url );
								}
						}
				}
		}

		public function ap_addOp( )
		{
				if ( $_POST['form_submit'] != "ok" )
				{
						$lang = Language::getlangcontent( );
						Tpl::showpage( "ap_add" );
				}
				else
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$upload = new UploadFile( );
						$obj_validate = new Validate( );
						if ( $_POST['ap_class'] == "1" )
						{
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['ap_name'],
												"require" => "true",
												"message" => $lang['ap_can_not_null']
										),
										array(
												"input" => $_POST['ap_price'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_price_must_num']
										),
										array(
												"input" => $_POST['ap_width_word'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_wordwidth_must_num']
										),
										array(
												"input" => $_POST['default_word'],
												"require" => "true",
												"message" => $lang['default_word_can_not_null']
										)
								);
						}
						else
						{
								$obj_validate->validateparam = array(
										array(
												"input" => $_POST['ap_name'],
												"require" => "true",
												"message" => $lang['ap_can_not_null']
										),
										array(
												"input" => $_POST['ap_price'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_price_must_num']
										),
										array(
												"input" => $_POST['ap_width_media'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_width_must_num']
										),
										array(
												"input" => $_POST['ap_height'],
												"require" => "true",
												"validator" => "Number",
												"message" => $lang['ap_height_must_num']
										),
										array(
												"input" => $_FILES['default_pic'],
												"require" => "true",
												"message" => $lang['default_pic_can_not_null']
										)
								);
						}
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$insert_array['ap_name'] = trim( $_POST['ap_name'] );
								$insert_array['ap_intro'] = trim( $_POST['ap_intro'] );
								$insert_array['ap_class'] = intval( $_POST['ap_class'] );
								$insert_array['ap_display'] = intval( $_POST['ap_display'] );
								$insert_array['is_use'] = intval( $_POST['is_use'] );
								if ( $_POST['ap_width_media'] != "" )
								{
										$insert_array['ap_width'] = intval( trim( $_POST['ap_width_media'] ) );
								}
								if ( $_POST['ap_width_word'] != "" )
								{
										$insert_array['ap_width'] = intval( trim( $_POST['ap_width_word'] ) );
								}
								if ( $_POST['default_word'] != "" )
								{
										$insert_array['default_content'] = trim( $_POST['default_word'] );
								}
								if ( $_FILES['default_pic']['name'] != "" )
								{
										$upload->set( "default_dir", ATTACH_ADV );
										$result = $upload->upfile( "default_pic" );
										if ( !$result )
										{
												showmessage( $upload->error, "", "", "error" );
										}
										$insert_array['default_content'] = $upload->file_name;
								}
								$insert_array['ap_height'] = intval( trim( $_POST['ap_height'] ) );
								$insert_array['ap_price'] = intval( trim( $_POST['ap_price'] ) );
								$result = $adv->ap_add( $insert_array );
								$ap_info = $adv->getApList( "", "", "ap_id desc" );
								$ap_info = $ap_info['0'];
								$ap_id = $ap_info['ap_id'];
								$adv->makeApCache( $ap_id );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=adv&op=ap_manage",
														"msg" => $lang['goback_ap_manage']
												),
												array(
														"url" => "index.php?act=adv&op=ap_add",
														"msg" => $lang['resume_ap_add']
												)
										);
										showmessage( $lang['ap_add_succ'], $url, "html", "succ", 1, 4000 );
								}
								else
								{
										showmessage( $lang['ap_add_fail'] );
								}
						}
				}
		}

		public function advOp( )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( is_array( $_POST['del_id'] ) && !empty( $_POST['del_id'] ) )
						{
								$in_array_id = "'".implode( "','", $_POST['del_id'] )."'";
								$where = "where adv_id in (".$in_array_id.")";
								Db::delete( "adv", $where );
						}
						$url = array(
								array(
										"url" => getreferer( ),
										"msg" => $lang['goback_adv_manage']
								)
						);
						showmessage( $lang['adv_del_succ'], $url );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition = array( );
				$condition['is_allow'] = "1";
				$limit = "";
				$orderby = "";
				if ( $_GET['overtime'] == "1" )
				{
						$condition['adv_end_date'] = "over";
				}
				if ( $_GET['overtime'] == "0" )
				{
						$condition['adv_end_date'] = "notover";
				}
				if ( $_GET['search_name'] != "" )
				{
						$condition['adv_title'] = trim( $_GET['search_name'] );
				}
				if ( $_GET['add_time_from'] != "" )
				{
						$condition['add_time_from'] = $this->getunixtime( trim( $_GET['add_time_from'] ) );
				}
				if ( $_GET['add_time_to'] != "" )
				{
						$condition['add_time_to'] = $this->getunixtime( trim( $_GET['add_time_to'] ) );
				}
				if ( $_GET['order'] == "clicknum" )
				{
						$orderby = "click_num desc";
				}
				$adv_info = $adv->getList( $condition, $page, $limit, $orderby );
				$ap_info = $adv->getApList( );
				$click_info = $adv->getClickList( );
				Tpl::output( "adv_info", $adv_info );
				Tpl::output( "ap_info", $ap_info );
				Tpl::output( "click_info", $click_info );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "adv.index" );
		}

		public function adv_editOp( )
		{
				if ( $_POST['form_submit'] != "ok" )
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$condition['adv_id'] = intval( $_GET['adv_id'] );
						$adv_list = $adv->getList( $condition );
						$ap_info = $adv->getApList( );
						Tpl::output( "ref_url", getreferer( ) );
						Tpl::output( "adv_list", $adv_list );
						Tpl::output( "ap_info", $ap_info );
						Tpl::showpage( "adv.edit" );
				}
				else
				{
						$lang = Language::getlangcontent( );
						$adv = model( "adv" );
						$upload = new UploadFile( );
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['adv_name'],
										"require" => "true",
										"message" => $lang['ap_can_not_null']
								),
								array(
										"input" => $_POST['adv_start_date'],
										"require" => "true",
										"message" => $lang['must_select_start_time']
								),
								array(
										"input" => $_POST['adv_end_date'],
										"require" => "true",
										"message" => $lang['must_select_end_time']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$param['adv_id'] = intval( $_GET['adv_id'] );
								$param['adv_title'] = trim( $_POST['adv_name'] );
								$param['adv_start_date'] = $this->getunixtime( trim( $_POST['adv_start_date'] ) );
								$param['adv_end_date'] = $this->getunixtime( trim( $_POST['adv_end_date'] ) );
								if ( $_POST['mark'] == "0" )
								{
										if ( $_FILES['adv_pic']['name'] != "" )
										{
												$upload->set( "default_dir", ATTACH_ADV );
												$result = $upload->upfile( "adv_pic" );
												if ( !$result )
												{
														showmessage( $upload->error, "", "", "error" );
												}
												$ac = array(
														"adv_pic" => $upload->file_name,
														"adv_pic_url" => trim( $_POST['adv_pic_url'] )
												);
												$ac = serialize( $ac );
												$param['adv_content'] = $ac;
										}
										else
										{
												$ac = array(
														"adv_pic" => trim( $_POST['pic_ori'] ),
														"adv_pic_url" => trim( $_POST['adv_pic_url'] )
												);
												$ac = serialize( $ac );
												$param['adv_content'] = $ac;
										}
								}
								if ( $_POST['mark'] == "1" )
								{
										switch ( CHARSET )
										{
										case "UTF-8" :
												$charrate = 3;
												break;
										case "GBK" :
												$charrate = 2;
										}
										if ( $_POST['adv_word_len'] * $charrate < strlen( $_POST['adv_word'] ) )
										{
												$error = $lang['wordadv_toolong'];
												showmessage( $error );
												exit( );
										}
										$ac = array(
												"adv_word" => trim( $_POST['adv_word'] ),
												"adv_word_url" => trim( $_POST['adv_word_url'] )
										);
										$ac = serialize( $ac );
										$param['adv_content'] = $ac;
								}
								if ( $_POST['mark'] == "2" )
								{
										if ( $_FILES['adv_slide_pic']['name'] != "" )
										{
												$upload->set( "default_dir", ATTACH_ADV );
												$result = $upload->upfile( "adv_slide_pic" );
												$ac = array(
														"adv_slide_pic" => $upload->file_name,
														"adv_slide_url" => trim( $_POST['adv_slide_url'] )
												);
												$ac = serialize( $ac );
												$param['adv_content'] = $ac;
												$param['slide_sort'] = trim( $_POST['adv_slide_sort'] );
										}
										else
										{
												$ac = array(
														"adv_slide_pic" => trim( $_POST['pic_ori'] ),
														"adv_slide_url" => trim( $_POST['adv_slide_url'] )
												);
												$ac = serialize( $ac );
												$param['adv_content'] = $ac;
												$param['slide_sort'] = trim( $_POST['adv_slide_sort'] );
										}
								}
								if ( $_POST['mark'] == "3" )
								{
										if ( $_FILES['flash_swf']['name'] != "" )
										{
												$upload->set( "default_dir", ATTACH_ADV );
												$result = $upload->upfile( "flash_swf" );
												$ac = array(
														"flash_swf" => $upload->file_name,
														"flash_url" => trim( $_POST['flash_url'] )
												);
												$ac = serialize( $ac );
												$param['adv_content'] = $ac;
										}
										else
										{
												$ac = array(
														"flash_swf" => trim( $_POST['flash_ori'] ),
														"flash_url" => trim( $_POST['flash_url'] )
												);
												$ac = serialize( $ac );
												$param['adv_content'] = $ac;
										}
								}
								$result = $adv->update( $param );
								$adv->makeAdvCache( intval( $_GET['adv_id'] ) );
								$condition['adv_id'] = intval( $_GET['adv_id'] );
								$adv_info = $adv->getList( $condition );
								$adv_info = $adv_info['0'];
								$adv->makeApCache( $adv_info['ap_id'] );
								if ( $result )
								{
										$url = array(
												array(
														"url" => trim( $_POST['ref_url'] ),
														"msg" => $lang['goback_ap_manage']
												)
										);
										showmessage( $lang['adv_change_succ'], $url );
								}
								else
								{
										showmessage( $lang['adv_change_fail'], $url );
								}
						}
				}
		}

		public function adv_delOp( )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				$condition['adv_id'] = intval( $_GET['adv_id'] );
				$adv_info = $adv->getList( $condition );
				$adv_info = $adv_info['0'];
				$result = $adv->adv_del( intval( $_GET['adv_id'] ) );
				$adv->makeApCache( $adv_info['ap_id'] );
				if ( !$result )
				{
						$url = array(
								array(
										"url" => "index.php?act=adv&op=adv",
										"msg" => $lang['goback_adv_manage']
								),
								array(
										"url" => "index.php?act=adv&op=ap_manage",
										"msg" => $lang['goback_ap_manage']
								)
						);
						showmessage( $lang['adv_del_fail'], $url );
						exit( );
				}
				showmessage( $lang['adv_del_succ'], $url );
				exit( );
		}

		public function click_chartOp( )
		{
				$lang = Language::getlangcontent( );
				$adv = model( "adv" );
				if ( !empty( $_POST['formsubmit'] ) || $_POST['formsubmit'] == "ok" )
				{
						$adv_id = $_POST['adv_id'];
						$year = $_POST['year'];
				}
				else
				{
						$adv_id = $_GET['adv_id'];
						$date = date( "Y-m-d", time( ) );
						$date = explode( "-", $date );
						$year = $date['0'];
				}
				$condition['adv_id'] = $adv_id;
				$condition['click_year'] = $year;
				$click_info = $adv->getclickinfo( $condition );
				if ( empty( $click_info ) )
				{
						$msg = $lang['adv_chart_nothing_left'].$year.$lang['adv_chart_nothing_right'];
						showmessage( $msg );
						exit( );
				}
				$adv->makexml( "resource", $click_info );
				$param['adv_id'] = $_GET['adv_id'];
				$adv_list = $adv->getList( $param );
				$adv_list = $adv_list['0'];
				Tpl::output( "year", $year );
				Tpl::output( "adv_title", $adv_list['adv_title'] );
				Tpl::output( "adv_id", $_GET['adv_id'] );
				Tpl::showpage( "adv_click_chart" );
		}

		public function getunixtime( $time )
		{
				$array = explode( "-", $time );
				$unix_time = mktime( 0, 0, 0, $array[1], $array[2], $array[0] );
				return $unix_time;
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "is_use" :
						$adv = model( "adv" );
						$param[trim( $_GET['column'] )] = intval( $_GET['value'] );
						$param['ap_id'] = intval( $_GET['id'] );
						$adv->ap_update( $param );
						echo "true";
						exit( );
				}
		}

}

?>
