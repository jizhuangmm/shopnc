<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class noticeControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "notice" );
		}

		public function noticeOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						$content = trim( $_POST['content1'] );
						$send_type = intval( $_POST['send_type'] );
						$obj_validate = new Validate( );
						switch ( $send_type )
						{
						case 1 :
								$obj_validate->setValidate( array(
										"input" => $_POST['user_name'],
										"require" => "true",
										"message" => Language::get( "notice_index_member_list_null" )
								) );
								break;
						case 2 :
						case 3 :
								$obj_validate->setValidate( array(
										"input" => $_POST['store_grade'],
										"require" => "true",
										"message" => Language::get( "notice_index_store_grade_null" )
								) );
								break;
						case 4 :
						}
						$obj_validate->setValidate( array(
								"input" => $content,
								"require" => "true",
								"message" => Language::get( "notice_index_content_null" )
						) );
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$memberid_list = array( );
								if ( $send_type == 1 )
								{
										$model_member = model( "member" );
										$tmp = explode( "\n", $_POST['user_name'] );
										if ( !empty( $tmp ) )
										{
												foreach ( $tmp as $k => $v )
												{
														$tmp[$k] = trim( $v );
												}
												$membername_str = "'".implode( "','", $tmp )."'";
												$member_list = $model_member->getMemberList( array(
														"in_member_name" => $membername_str
												) );
												unset( $membername_str );
												if ( !empty( $member_list ) )
												{
														foreach ( $member_list as $k => $v )
														{
																$memberid_list[] = $v['member_id'];
														}
												}
												unset( $member_list );
										}
										unset( $tmp );
								}
								if ( $send_type == 3 )
								{
										$model_store = model( "store" );
										if ( !empty( $_POST['store_grade'] ) )
										{
												$storegradeid_str = "'".implode( "','", $_POST['store_grade'] )."'";
												$store_list = $model_store->getStoreList( array(
														"grade_id_in" => $storegradeid_str
												) );
												unset( $storegradeid_str );
												if ( !empty( $store_list ) )
												{
														foreach ( $store_list as $v )
														{
																$memberid_list[] = $v['member_id'];
														}
												}
												unset( $store_list );
										}
								}
								if ( $send_type == 4 )
								{
										$model_store = model( "store" );
										$store_list = $model_store->getStoreList( array( ) );
										if ( !empty( $store_list ) )
										{
												foreach ( $store_list as $k => $v )
												{
														$memberid_list[] = $v['member_id'];
												}
										}
								}
								if ( empty( $memberid_list ) && $send_type != 2 )
								{
										showmessage( Language::get( "notice_index_member_error" ), "", "html", "error" );
								}
								$array = array( );
								$array['send_mode'] = 1;
								$array['user_name'] = $memberid_list;
								$array['content'] = $content;
								$model_message = model( "message" );
								$insert_arr = array( );
								$insert_arr['from_member_id'] = 0;
								if ( $send_type == 2 )
								{
										$insert_arr['member_id'] = "all";
								}
								else
								{
										$insert_arr['member_id'] = ",".implode( ",", $memberid_list ).",";
								}
								$insert_arr['msg_content'] = $content;
								$insert_arr['message_type'] = 1;
								$insert_arr['message_ismore'] = 1;
								$model_message->saveMessage( $insert_arr );
								showmessage( Language::get( "notice_index_send_succ" ), "index.php?act=notice&op=notice" );
						}
				}
				$model_store_grade = model( "store_grade" );
				$grade_list = $model_store_grade->getGradeList( $condition );
				Tpl::output( "grade_list", $grade_list );
				Tpl::showpage( "notice.add" );
		}

}

?>
