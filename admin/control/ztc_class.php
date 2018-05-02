<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class ztc_classControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "ztc,setting" );
				if ( $_GET['ztc_open'] == 1 )
				{
						return TRUE;
				}
				if ( c( "gold_isuse" ) != 1 || c( "ztc_isuse" ) != 1 )
				{
						$url = array(
								array(
										"url" => "index.php?act=dashboard&op=welcome",
										"msg" => Language::get( "accessclose" )
								),
								array(
										"url" => "index.php?act=ztc_class&op=ztc_setting&ztc_open=1",
										"msg" => Language::get( "accessopen" )
								)
						);
						showmessage( Language::get( "admin_ztc_unavailable" ), $url, "html", "succ", 1, 6000 );
				}
		}

		public function ztc_settingOp( )
		{
				$lang = Language::getlangcontent( );
				$model_setting = model( "setting" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['ztc_isuse'],
										"require" => "true",
										"message" => $lang['ztc_isuse_check']
								),
								array(
										"input" => $_POST['ztc_dayprod'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['ztc_dayprod_isnum']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								Language::read( "ztc" );
								$ztc_model = model( "ztc" );
								$ztc_model->updateZtcGoods( Language::get( "admin_ztc_glist_glog_desc" ) );
								$update_array = array( );
								$update_array['ztc_isuse'] = trim( $_POST['ztc_isuse'] );
								$update_array['ztc_dayprod'] = trim( $_POST['ztc_dayprod'] );
								$result = $model_setting->updateSetting( $update_array );
								if ( $result === TRUE )
								{
										showmessage( $lang['edit_ztc_set_ok'] );
								}
								else
								{
										showmessage( $lang['edit_ztc_set_fail'] );
								}
						}
				}
				if ( $_GET['ztc_open'] == 1 )
				{
						$update_array = array( );
						$update_array['ztc_isuse'] = 1;
						$update_array['gold_isuse'] = 1;
						$model_setting->updateSetting( $update_array );
				}
				$list_setting = $model_setting->getListSetting( );
				Tpl::output( "list_setting", $list_setting );
				Tpl::showpage( "setting.ztc_setting" );
		}

		public function ztc_classOp( )
		{
				$condition_arr = array( );
				$sgoodsname = trim( $_GET['zg_name'] );
				if ( $sgoodsname )
				{
						$condition_arr['ztc_goodsname'] = $sgoodsname;
				}
				unset( $sgoodsname );
				if ( $_GET['zg_state'] )
				{
						$condition_arr['ztc_state'] = intval( $_GET['zg_state'] ) - 1;
				}
				if ( $_GET['zg_paystate'] )
				{
						$condition_arr['ztc_paystate'] = intval( $_GET['zg_paystate'] ) - 1;
				}
				if ( $_GET['zg_type'] )
				{
						$condition_arr['ztc_type'] = intval( $_GET['zg_type'] ) - 1;
				}
				$smembername = trim( $_GET['zg_membername'] );
				if ( $smembername )
				{
						$condition_arr['ztc_membername'] = $smembername;
				}
				unset( $smembername );
				$sstorename = trim( $_GET['zg_storename'] );
				if ( $sstorename )
				{
						$condition_arr['ztc_storename'] = $sstorename;
				}
				unset( $sstorename );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$ztc_model = model( "ztc" );
				$ztc_list = $ztc_model->getZtcList( $condition_arr, $page );
				Tpl::output( "ztc_list", $ztc_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "ztc_class.list" );
		}

		public function drop_ztcOp( )
		{
				$z_id = intval( $_GET['z_id'] );
				if ( !$z_id )
				{
						showmessage( Language::get( "admin_ztc_parameter_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				$ztc_model = model( "ztc" );
				$ztc_info = $ztc_model->getZtcInfo( array(
						"ztc_id" => $z_id
				) );
				if ( !is_array( $ztc_info ) && count( $ztc_info ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_record_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				if ( $ztc_info['ztc_state'] != 0 )
				{
						showmessage( Language::get( "admin_ztc_drop_reviewed_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				else if ( $ztc_info['ztc_paystate'] != 0 )
				{
						showmessage( Language::get( "admin_ztc_drop_paid_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				$result = $ztc_model->dropZtcById( $z_id );
				if ( $result )
				{
						showmessage( Language::get( "admin_ztc_drop_success" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				else
				{
						showmessage( Language::get( "admin_ztc_drop_fail" ), "index.php?act=ztc_class&op=ztc_class" );
				}
		}

		public function dropall_ztcOp( )
		{
				$z_id = $_POST['z_id'];
				if ( !$z_id )
				{
						showmessage( Language::get( "admin_ztc_parameter_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				$z_id = "'".implode( "','", $z_id )."'";
				$ztc_model = model( "ztc" );
				$ztc_list = $ztc_model->getZtcList( array(
						"ztc_id_in" => $z_id
				) );
				if ( !is_array( $ztc_list ) && count( $ztc_list ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_record_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				$z_idnew = array( );
				foreach ( $ztc_list as $k => $v )
				{
						if ( !( $v['ztc_state'] == 0 ) && !( $v['ztc_paystate'] == 0 ) )
						{
								$z_idnew[] = $v['ztc_id'];
						}
				}
				$result = TRUE;
				if ( is_array( $z_idnew ) && 0 < count( $z_idnew ) )
				{
						$z_id = "'".implode( "','", $z_idnew )."'";
						$result = $ztc_model->dropZtcByCondition( array(
								"ztc_id_in_del" => $z_id
						) );
				}
				if ( $result )
				{
						showmessage( Language::get( "admin_ztc_drop_success" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				else
				{
						showmessage( Language::get( "admin_ztc_drop_fail" ), "index.php?act=ztc_class&op=ztc_class" );
				}
		}

		public function edit_ztcOp( )
		{
				$z_id = intval( $_GET['z_id'] );
				if ( !$z_id )
				{
						showmessage( Language::get( "admin_ztc_parameter_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				$ztc_model = model( "ztc" );
				$ztc_info = $ztc_model->getZtcInfo( array(
						"ztc_id" => $z_id
				) );
				if ( !is_array( $ztc_info ) && count( $ztc_info ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_record_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				if ( $ztc_info['ztc_paystate'] == 0 )
				{
						showmessage( Language::get( "admin_ztc_edit_paid_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				if ( $ztc_info['ztc_state'] != 0 )
				{
						showmessage( Language::get( "admin_ztc_edit_reviewed_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				if ( $ztc_info['ztc_type'] != 0 )
				{
						showmessage( Language::get( "admin_ztc_edit_recharge_unedit_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						$starttime = strtotime( $_POST['ztc_stime'] );
						$datetime = date( "Y-m-d", time( ) );
						$datetime = strtotime( $datetime );
						$obj_validate = new Validate( );
						$validate_arr = array( );
						$validate_arr[] = array(
								"input" => $starttime,
								"require" => "true",
								"validator" => "Compare",
								"operator" => " >= ",
								"to" => $datetime,
								"message" => Language::get( "admin_ztc_edit_starttime_error" )
						);
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						$ztc_model = model( "ztc" );
						$goods_model = model( "goods" );
						$goods_info = $goods_model->checkGoods( array(
								"goods_id" => $ztc_info['ztc_goodsid']
						) );
						if ( !is_array( $goods_info ) && count( $goods_info ) <= 0 )
						{
								showmessage( Language::get( "admin_ztc_goodsrecord_error" ) );
						}
						if ( $_POST['ztc_state'] == 1 && $goods_info['goods_isztc'] == 1 )
						{
								showmessage( Language::get( "admin_ztc_edit_goodsztc_exist_error" ) );
						}
						$ztc_array = array( );
						$ztc_array['ztc_startdate'] = strtotime( $_POST['ztc_stime'] );
						$ztc_array['ztc_state'] = $_POST['ztc_state'];
						$result = $ztc_model->updateZtcOne( $ztc_array, array(
								"ztc_id" => $z_id
						) );
						if ( $result )
						{
								if ( $_POST['ztc_state'] == 1 )
								{
										$newgoods_goldnum = intval( $goods_info['goods_goldnum'] ) + intval( $ztc_info['ztc_gold'] );
										$g_up_arr = array( );
										$g_up_arr['goods_goldnum'] = $newgoods_goldnum;
										$g_up_arr['goods_isztc'] = 1;
										$g_up_arr['goods_ztcstartdate'] = strtotime( $_POST['ztc_stime'] );
										$g_up_arr['goods_ztclastdate'] = $g_up_arr['goods_ztcstartdate'] - 86400;
										$g_up_result = $goods_model->updateGoodsAllUser( $g_up_arr, $ztc_info['ztc_goodsid'] );
										unset( $g_up_arr );
										if ( $g_up_result )
										{
												$ztcgoldlog_model = model( "ztc_glodlog" );
												$logarr = array( );
												$logarr['glog_goodsid'] = $ztc_info['ztc_goodsid'];
												$logarr['glog_goodsname'] = $ztc_info['ztc_goodsname'];
												$logarr['glog_memberid'] = $ztc_info['ztc_memberid'];
												$logarr['glog_membername'] = $ztc_info['ztc_membername'];
												$logarr['glog_storeid'] = $ztc_info['ztc_storeid'];
												$logarr['glog_storename'] = $ztc_info['ztc_storename'];
												$logarr['glog_type'] = 1;
												$logarr['glog_goldnum'] = intval( $ztc_info['ztc_gold'] );
												$logarr['glog_addtime'] = time( );
												$logarr['glog_desc'] = Language::get( "admin_ztc_ztclog_addgold" );
												$ztcgoldlog_model->addlog( $logarr );
												unset( $logarr );
										}
								}
								if ( $_POST['ztc_state'] == 2 )
								{
										$member_model = model( "member" );
										$member_array = $member_model->infoMember( array(
												"member_id" => $ztc_info['ztc_memberid']
										) );
										$newmember_goldnum = intval( $member_array['member_goldnum'] ) + intval( $ztc_info['ztc_gold'] );
										$newmember_goldnumminus = intval( $member_array['member_goldnumminus'] ) - intval( $ztc_info['ztc_gold'] );
										$member_model->updateMember( array(
												"member_goldnum" => $newmember_goldnum,
												"member_goldnumminus" => $newmember_goldnumminus
										), $ztc_info['ztc_memberid'] );
										$goldlog_model = model( "gold_log" );
										$insert_goldlog = array( );
										$insert_goldlog['glog_memberid'] = $ztc_info['ztc_memberid'];
										$insert_goldlog['glog_membername'] = $ztc_info['ztc_membername'];
										$insert_goldlog['glog_storeid'] = $ztc_info['ztc_storeid'];
										$insert_goldlog['glog_storename'] = $ztc_info['ztc_storename'];
										$admininfo = $this->getAdminInfo( );
										$insert_goldlog['glog_adminid'] = $admininfo['id'];
										$insert_goldlog['glog_adminname'] = $admininfo['name'];
										$insert_goldlog['glog_goldnum'] = $ztc_info['ztc_gold'];
										$insert_goldlog['glog_method'] = 1;
										$insert_goldlog['glog_addtime'] = time( );
										$insert_goldlog['glog_desc'] = Language::get( "admin_ztc_edit_goldlog_addgold" );
										$insert_goldlog['glog_stage'] = "ztc";
										$goldlog_model->add( $insert_goldlog );
								}
								showmessage( Language::get( "admin_ztc_edit_success" ), "index.php?act=ztc_class&op=ztc_class" );
						}
						else
						{
								showmessage( Language::get( "admin_ztc_edit_fail" ), "index.php?act=ztc_class&op=ztc_class" );
						}
				}
				else
				{
						Tpl::output( "ztc_info", $ztc_info );
						Tpl::output( "nowdate", date( "Y-m-d", time( ) ) );
						Tpl::showpage( "ztc_class.form" );
				}
		}

		public function info_ztcOp( )
		{
				$z_id = intval( $_GET['z_id'] );
				if ( !$z_id )
				{
						showmessage( Language::get( "admin_ztc_parameter_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				$ztc_model = model( "ztc" );
				$ztc_info = $ztc_model->getZtcInfo( array(
						"ztc_id" => $z_id
				) );
				if ( !is_array( $ztc_info ) && count( $ztc_info ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_record_error" ), "index.php?act=ztc_class&op=ztc_class" );
				}
				Tpl::output( "ztc_info", $ztc_info );
				Tpl::showpage( "ztc_class.info" );
		}

		public function ztc_glistOp( )
		{
				$ztc_model = model( "ztc" );
				$ztc_model->updateZtcGoods( Language::get( "admin_ztc_glist_glog_desc" ) );
				$condition_arr = array( );
				$state = array(
						"goods_open" => array( "goods_show" => 1 ),
						"goods_close" => array( "goods_show" => "0" ),
						"goods_commend" => array( "goods_commend" => 1 ),
						"goods_ban" => array( "goods_state" => "0" )
				);
				$condition_arr = $state[trim( $_GET['goods_type'] )];
				$condition_arr['goods_isztc'] = "1";
				$condition_arr['keyword'] = trim( $_GET['zg_name'] );
				$condition_arr['like_store_name'] = trim( $_GET['zg_sname'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$condition_arr['order'] = " goods_goldnum ";
				$goods_model = model( "goods" );
				$list_goods = $goods_model->getGoods( $condition_arr, $page, "*", "store" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "list_goods", $list_goods );
				Tpl::showpage( "ztc_class.goodlist" );
		}

		public function ztc_glogOp( )
		{
				$condition_arr = array( );
				$condition_arr['glog_goodsname'] = trim( $_GET['zg_name'] );
				$condition_arr['glog_storename'] = trim( $_GET['zg_sname'] );
				if ( $_GET['zg_type'] )
				{
						$condition_arr['glog_type'] = $_GET['zg_type'];
				}
				$condition_arr['saddtime'] = strtotime( $_GET['zg_stime'] );
				$condition_arr['eaddtime'] = strtotime( $_GET['zg_etime'] );
				if ( 0 < $condition_arr['eaddtime'] )
				{
						$condition_arr['eaddtime'] += 86400;
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$ztcgoldlog_model = model( "ztc_glodlog" );
				$list_log = $ztcgoldlog_model->getLogList( $condition_arr, $page, "*", "" );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "list_log", $list_log );
				Tpl::showpage( "ztc_class.glog" );
		}

		public function ztc_gstateOp( )
		{
				$type_array = array( "open", "close" );
				if ( $_POST['gid'] )
				{
				}
				if ( !in_array( $_POST['type'], $type_array ) )
				{
						showmessage( Language::get( "admin_ztc_parameter_error" ), "index.php?act=ztc_class&op=ztc_glist" );
				}
				if ( count( $_POST['gid'] ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_gstate_choose_error" ), "index.php?act=ztc_class&op=ztc_glist" );
				}
				$id = $_POST['gid'];
				$goods_model = model( "goods" );
				$condition_arr = array( );
				$condition_arr['goods_id_in'] = "'".implode( "','", $id )."'";
				$goods_list = $goods_model->getGoods( $condition_arr, "", "*", "goods" );
				if ( !is_array( $goods_list ) && count( $goods_list ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_goodsrecord_error" ), "index.php?act=ztc_class&op=ztc_glist" );
				}
				$ztcstate = 2;
				if ( $_POST['type'] == "open" )
				{
						$ztcstate = 1;
				}
				$id_new = array( );
				foreach ( $goods_list as $v )
				{
						if ( $v['goods_ztcstate'] != $ztcstate )
						{
								$id_new[] = $v['goods_id'];
						}
				}
				if ( !is_array( $id_new ) && count( $id_new ) <= 0 )
				{
						showmessage( Language::get( "admin_ztc_gstate_success" ), "index.php?act=ztc_class&op=ztc_glist" );
				}
				$up_arr = array( );
				if ( $ztcstate == 2 )
				{
						$ztc_model = model( "ztc" );
						$ztc_model->updateZtcGoods( Language::get( "admin_ztc_glist_glog_desc" ), "", $id_new );
						$up_arr['goods_ztcstate'] = 2;
				}
				else
				{
						$up_arr['goods_ztcstate'] = 1;
						$datetime = date( "Y-m-d", time( ) );
						$datetime = strtotime( $datetime );
						$up_arr['goods_ztclastdate'] = $datetime;
				}
				$result = $goods_model->updateGoodsAllUser( $up_arr, $id_new );
				if ( $result )
				{
						showmessage( Language::get( "admin_ztc_gstate_success" ), "index.php?act=ztc_class&op=ztc_glist" );
				}
				else
				{
						showmessage( Language::get( "admin_ztc_gstate_fail" ), "index.php?act=ztc_class&op=ztc_glist" );
				}
		}

}

?>
