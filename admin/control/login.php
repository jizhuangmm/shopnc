<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
class LoginControl extends SystemControl
{

		public function __construct( )
		{
				Language::read( "common,layout,login" );
				$lang = Language::getlangcontent( );
				if ( chksubmit( ) )
				{
						Security::checktoken( );
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['user_name'],
										"require" => "true",
										"message" => $lang['login_index_username_null']
								),
								array(
										"input" => $_POST['password'],
										"require" => "true",
										"message" => $lang['login_index_password_null']
								),
								array(
										"input" => $_POST['captcha'],
										"require" => "true",
										"message" => $lang['login_index_checkcode_null']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $lang['error'].$error );
						}
						else
						{
								if ( !checkseccode( $_POST['nchash'], $_POST['captcha'] ) )
								{
										showmessage( $lang['login_index_checkcode_wrong'].$error );
								}
								$model_admin = model( "admin" );
								$array = array( );
								$array['admin_name'] = trim( $_POST['user_name'] );
								$array['admin_password'] = md5( trim( $_POST['password'] ) );
								$admin_info = $model_admin->infoAdmin( $array );
								if ( is_array( $admin_info ) && !empty( $admin_info ) )
								{
										$login_array = array( );
										$login_array['name'] = $admin_info['admin_name'];
										$login_array['id'] = $admin_info['admin_id'];
										$this->setAdminInfo( $login_array );
										$this->checkPermission( "login" );
										$authkey = md5( c( "setup_date" ).MD5_KEY );
										setnccookie( "sys_key", encrypt( serialize( $login_array ), $authkey ) );
										$update_info = array(
												"admin_id" => $admin_info['admin_id'],
												"admin_login_num" => $admin_info['admin_login_num'] + 1,
												"admin_login_time" => time( )
										);
										$model_admin->updateAdmin( $update_info );
										@header( "Location: index.php" );
										exit( );
								}
								showmessage( $lang['login_index_username_password_wrong'], "index.php?act=login&op=login" );
						}
				}
				Tpl::output( "nchash", substr( md5( SiteUrl.$_GET['act'].$_GET['op'] ), 0, 8 ) );
				Tpl::output( "html_title", $lang['login_index_need_login'] );
				Tpl::showpage( "login", "login_layout" );
		}

		public function loginOp( )
		{
		}

		public function indexOp( )
		{
		}

}

?>
