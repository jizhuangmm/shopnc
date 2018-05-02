<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class memberControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "member" );
		}

		public function memberOp( )
		{
				$lang = Language::getlangcontent( );
				$model_member = model( "member" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$model_admin = model( "admin" );
						$admin_list = $model_admin->getAdminList( $condition, $page );
						if ( is_array( $admin_list ) )
						{
								foreach ( $admin_list as $k => $v )
								{
										if ( @in_array( $v['member_id'], $_POST['del_id'] ) )
										{
												showmessage( $lang['member_index_is_admin'] );
										}
								}
						}
						if ( !empty( $_POST['del_id'] ) )
						{
								if ( $GLOBALS['setting_config']['ucenter_status'] == "1" )
								{
										$model_ucenter = model( "ucenter" );
								}
								if ( is_array( $_POST['del_id'] ) )
								{
										foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
										{
												$v = intval( $v );
												$rs = TRUE;
												if ( $rs )
												{
														$member = $model_member->infoMember( array(
																"member_id" => $v
														) );
														$model_store = model( "store" );
														$model_goods = model( "goods" );
														$model_order = model( "order" );
														$model_store->del( $member['store_id'] );
														$model_goods->dropGoodsByStore( $member['store_id'] );
														$model_member->del( $v );
												}
										}
								}
								showmessage( $lang['member_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['member_index_choose_del'] );
						}
				}
				switch ( $_GET['search_field_name'] )
				{
				case "member_name" :
						$condition['like_member_name'] = trim( $_GET['search_field_value'] );
						break;
				case "member_email" :
						$condition['like_member_email'] = trim( $_GET['search_field_value'] );
						break;
				case "member_truename" :
						$condition['like_member_truename'] = trim( $_GET['search_field_value'] );
				}
				switch ( $_GET['search_state'] )
				{
				case "no_informallow" :
						$condition['inform_allow'] = "2";
						break;
				case "no_isbuy" :
						$condition['is_buy'] = "0";
						break;
				case "no_isallowtalk" :
						$condition['is_allowtalk'] = "0";
						break;
				case "no_memberstate" :
						$condition['member_state'] = "0";
				}
				$condition['order'] = trim( $_GET['search_sort'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$member_list = $model_member->getMemberList( $condition, $page );
				if ( is_array( $member_list ) )
				{
						foreach ( $member_list as $k => $v )
						{
								$member_list[$k]['member_time'] = $v['member_time'] ? date( "Y-m-d H:i:s", $v['member_time'] ) : "";
								$member_list[$k]['member_login_time'] = $v['member_login_time'] ? date( "Y-m-d H:i:s", $v['member_login_time'] ) : "";
						}
				}
				Tpl::output( "search_sort", trim( $_GET['search_sort'] ) );
				Tpl::output( "search_field_name", trim( $_GET['search_field_name'] ) );
				Tpl::output( "search_field_value", trim( $_GET['search_field_value'] ) );
				Tpl::output( "member_list", $member_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "member.index" );
		}

		public function member_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_member = model( "member" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['member_email'],
										"require" => "true",
										"validator" => "Email",
										"message" => $lang['member_edit_valid_email']
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
								$upload->set( "default_dir", ATTACH_AVATAR );
								if ( !empty( $_FILES['member_avatar']['name'] ) )
								{
										$result = $upload->upfile( "member_avatar" );
										if ( $result )
										{
												$GLOBALS['_POST']['member_avatar'] = $upload->file_name;
										}
										else
										{
												showmessage( $upload->error, "", "", "error" );
										}
								}
								$update_array = array( );
								$update_array['member_id'] = intval( $_POST['member_id'] );
								if ( !empty( $_POST['member_passwd'] ) )
								{
										$update_array['member_passwd'] = md5( $_POST['member_passwd'] );
								}
								$update_array['member_email'] = trim( $_POST['member_email'] );
								$update_array['member_truename'] = trim( $_POST['member_truename'] );
								$update_array['member_sex'] = trim( $_POST['member_sex'] );
								$update_array['member_qq'] = trim( $_POST['member_qq'] );
								$update_array['member_ww'] = trim( $_POST['member_ww'] );
								$update_array['member_msn'] = trim( $_POST['member_msn'] );
								$update_array['inform_allow'] = trim( $_POST['inform_allow'] );
								$update_array['is_buy'] = trim( $_POST['isbuy'] );
								$update_array['is_allowtalk'] = trim( $_POST['allowtalk'] );
								$update_array['member_state'] = trim( $_POST['memberstate'] );
								if ( !empty( $_POST['member_avatar'] ) )
								{
										$update_array['member_avatar'] = $_POST['member_avatar'];
								}
								$result = $model_member->updateMember( $update_array, intval( $_POST['member_id'] ) );
								if ( $result )
								{
										if ( !empty( $_POST['member_avatar'] ) || !empty( $_POST['old_member_avatar'] ) )
										{
												@unlink( BasePath.DS.ATTACH_AVATAR.DS.$_POST['old_member_avatar'] );
										}
										$url = array(
												array(
														"url" => "index.php?act=member&op=member",
														"msg" => $lang['member_edit_back_to_list']
												),
												array(
														"url" => "index.php?act=member&op=member_edit&member_id=".intval( $_POST['member_id'] ),
														"msg" => $lang['member_edit_again']
												)
										);
										if ( $GLOBALS['setting_config']['ucenter_status'] == "1" )
										{
												$model_ucenter = model( "ucenter" );
												if ( !empty( $_POST['member_passwd'] ) )
												{
														$array_uc = array(
																"login_name" => trim( $_POST['member_name'] ),
																"password" => trim( $_POST['member_passwd'] ),
																"email" => trim( $_POST['member_email'] )
														);
												}
												else
												{
														$array_uc = array(
																"login_name" => trim( $_POST['member_name'] ),
																"email" => trim( $_POST['member_email'] )
														);
												}
												$model_ucenter->userEdit( $array_uc );
										}
										showmessage( $lang['member_edit_succ'], $url );
								}
								else
								{
										showmessage( $lang['member_edit_fail'] );
								}
						}
				}
				$condition['member_id'] = intval( $_GET['member_id'] );
				$member_array = $model_member->infoMember( $condition );
				Tpl::output( "member_array", $member_array );
				Tpl::showpage( "member.edit" );
		}

		public function member_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_member = model( "member" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['member_email'],
										"require" => "true",
										"validator" => "Email",
										"message" => $lang['member_edit_valid_email']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								if ( !empty( $_FILES['member_avatar']['name'] ) )
								{
										$upload = new UploadFile( );
										$upload->set( "default_dir", ATTACH_AVATAR );
										$result = $upload->upfile( "member_avatar" );
										if ( $result )
										{
												$GLOBALS['_POST']['member_avatar'] = $upload->file_name;
										}
										else
										{
												showmessage( $upload->error, "", "", "error" );
										}
								}
								$insert_array = array( );
								if ( $GLOBALS['setting_config']['ucenter_status'] == "1" )
								{
										$model_ucenter = model( "ucenter" );
										$uid = $model_ucenter->addUser( trim( $_POST['member_name'] ), trim( $_POST['member_passwd'] ), trim( $_POST['member_email'] ) );
										$insert_array['member_id'] = $uid;
								}
								$insert_array['member_name'] = trim( $_POST['member_name'] );
								$insert_array['member_passwd'] = trim( $_POST['member_passwd'] );
								$insert_array['member_email'] = trim( $_POST['member_email'] );
								$insert_array['member_truename'] = trim( $_POST['member_truename'] );
								$insert_array['member_sex'] = trim( $_POST['member_sex'] );
								$insert_array['member_qq'] = trim( $_POST['member_qq'] );
								$insert_array['member_ww'] = trim( $_POST['member_ww'] );
								$insert_array['member_msn'] = trim( $_POST['member_msn'] );
								$insert_array['inform_allow'] = "1";
								if ( !empty( $_POST['member_avatar'] ) )
								{
										$insert_array['member_avatar'] = trim( $_POST['member_avatar'] );
								}
								$result = $model_member->addMember( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=member&op=member",
														"msg" => $lang['member_add_back_to_list']
												),
												array(
														"url" => "index.php?act=member&op=member_add",
														"msg" => $lang['member_add_again']
												)
										);
										showmessage( $lang['member_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['member_add_fail'] );
								}
						}
				}
				Tpl::showpage( "member.add" );
		}

		public function member_delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( !empty( $_GET['member_id'] ) )
				{
						$model_member = model( "member" );
						$condition['member_id'] = intval( $_GET['member_id'] );
						$member_array = $model_member->infoMember( $condition );
						$rs = $model_member->del( intval( $_GET['member_id'] ) );
						if ( $rs )
						{
								$model_store = model( "store" );
								$model_goods = model( "goods" );
								$model_order = model( "order" );
								$model_store->del( $member_array['store_id'] );
								$model_goods->dropGoodsByStore( $member_array['store_id'] );
						}
						if ( $GLOBALS['setting_config']['ucenter_status'] == "1" )
						{
								$model_ucenter = model( "ucenter" );
						}
						showmessage( $lang['member_index_del_succ'] );
				}
				else
				{
						showmessage( $lang['member_index_choose_del'] );
				}
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "check_user_name" :
						$model_member = model( "member" );
						$condition['member_name'] = trim( $_GET['member_name'] );
						$condition['no_member_id'] = intval( $_GET['member_id'] );
						$list = $model_member->infoMember( $condition );
						if ( empty( $list ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "check_email" :
						$model_member = model( "member" );
						$condition['member_email'] = trim( $_GET['member_email'] );
						$condition['no_member_id'] = intval( $_GET['member_id'] );
						$list = $model_member->infoMember( $condition );
						if ( empty( $list ) )
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
