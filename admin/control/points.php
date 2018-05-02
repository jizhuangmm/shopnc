<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class pointsControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "points" );
				if ( $GLOBALS['setting_config']['points_isuse'] != 1 )
				{
						showmessage( Language::get( "admin_points_unavailable" ), "index.php?act=dashboard&op=welcome", "", "error" );
				}
		}

		public function addpointsOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['member_id'],
										"require" => "true",
										"message" => Language::get( "admin_points_member_error_again" )
								),
								array(
										"input" => $_POST['pointsnum'],
										"require" => "true",
										"validator" => "Compare",
										"operator" => " >= ",
										"to" => 1,
										"message" => Language::get( "admin_points_points_min_error" )
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error, "", "", "error" );
						}
						$obj_member = model( "member" );
						$member_id = intval( $_POST['member_id'] );
						$member_info = $obj_member->infoMember( array(
								"member_id" => "{$member_id}"
						) );
						if ( !is_array( $member_info ) && count( $member_info ) <= 0 )
						{
								showmessage( Language::get( "admin_points_userrecord_error" ), "index.php?act=points&op=addpoints", "", "error" );
						}
						$pointsnum = intval( $_POST['pointsnum'] );
						if ( $_POST['operatetype'] == 2 && intval( $member_info['member_points'] ) < $pointsnum )
						{
								showmessage( Language::get( "admin_points_points_short_error" ).$member_info['member_points'], "index.php?act=points&op=addpoints", "", "error" );
						}
						$obj_points = model( "points" );
						$insert_arr['pl_memberid'] = $member_info['member_id'];
						$insert_arr['pl_membername'] = $member_info['member_name'];
						$admininfo = $this->getAdminInfo( );
						$insert_arr['pl_adminid'] = $admininfo['id'];
						$insert_arr['pl_adminname'] = $admininfo['name'];
						if ( $_POST['operatetype'] == 2 )
						{
								$insert_arr['pl_points'] = 0 - $_POST['pointsnum'];
						}
						else
						{
								$insert_arr['pl_points'] = $_POST['pointsnum'];
						}
						if ( $_POST['pointsdesc'] )
						{
								$insert_arr['pl_desc'] = trim( $_POST['pointsdesc'] );
						}
						else
						{
								$insert_arr['pl_desc'] = Language::get( "admin_points_system_desc" );
						}
						$result = $obj_points->savePointsLog( "system", $insert_arr, TRUE );
						if ( $result )
						{
								showmessage( Language::get( "admin_points_add_success" ), "index.php?act=points&op=addpoints" );
						}
						else
						{
								showmessage( Language::get( "admin_points_add_fail" ), "index.php?act=points&op=addpoints", "", "error" );
						}
				}
				else
				{
						Tpl::showpage( "points.add" );
				}
		}

		public function checkmemberOp( )
		{
				$name = trim( $_GET['name'] );
				if ( !$name )
				{
						echo "";
						exit( );
				}
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$name = Language::getgbk( $name );
				}
				$obj_member = model( "member" );
				$member_info = $obj_member->infoMember( array(
						"member_name" => $name
				) );
				if ( is_array( $member_info ) && 0 < count( $member_info ) )
				{
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$member_info['member_name'] = Language::getutf8( $member_info['member_name'] );
						}
						echo json_encode( array(
								"id" => $member_info['member_id'],
								"name" => $member_info['member_name'],
								"points" => $member_info['member_points']
						) );
				}
				else
				{
						echo "";
				}
				exit( );
		}

}

?>
