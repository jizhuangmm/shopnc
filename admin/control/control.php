<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class SystemControl
{

		private $admin_info = NULL;

		public function __construct( )
		{
						$FN_-2147483647;
				Language::read( "common,layout" );
				$this->admin_info = $this->systemLogin( );
				if ( $this->admin_info['id'] != 1 )
				{
						$this->checkPermission( $_GET['act'] ? $_GET['act'] : $_POST['act'] );
				}
				if ( ( $_GET['branch'] != "" || $_GET['op'] == "ajax" ) && strtoupper( CHARSET ) == "GBK" )
				{
						$GLOBALS['_GET'] = Language::getgbk( $_GET );
				}
		}

		protected function getAdminInfo( )
		{
				return $this->admin_info;
		}

		protected function setAdminInfo( $param )
		{
				return $this->admin_info = $param;
		}

		private function systemLogin( )
		{
				$authkey = md5( c( "setup_date" ).MD5_KEY );
				$tmp = unserialize( decrypt( cookie( "sys_key" ), $authkey ) );
				if ( empty( $tmp ) || empty( $tmp['name'] ) || empty( $tmp['id'] ) )
				{
						@header( "Location: index.php?act=login&op=login" );
						exit( );
				}
				$this->systemSetKey( $tmp['name'], $tmp['id'] );
				return $tmp;
		}

		private function systemSetKey( $name, $id )
		{
				$tmp = array(
						"name" => $name,
						"id" => $id
				);
				$authkey = md5( c( "setup_date" ).MD5_KEY );
				setnccookie( "sys_key", encrypt( serialize( $tmp ), $authkey ) );
				return TRUE;
		}

		public function checkPermission( $act = "index" )
		{
				$model_admin = model( "admin" );
				$admin_array = $model_admin->getOneAdmin( $this->admin_info['id'] );
				if ( $admin_array['admin_is_super'] == 1 )
				{
						return TRUE;
				}
				$permission = explode( "|", $admin_array['admin_permission'] );
				if ( @in_array( "web_config", $permission ) )
				{
						$permission[] = "web_api";
				}
				$tmp = array( "index", "dashboard", "login" );
				$permission = array_merge( $permission, $tmp );
				if ( @in_array( $act, $permission ) )
				{
						return TRUE;
				}
				showmessage( Language::get( "nc_assign_right" ), "", "html", "succ", 0 );
		}

		public function send_notice( $receiver_id, $tpl_code, $param )
		{
				$mail_tpl_model = model( "mail_templates" );
				$mail_tpl = $mail_tpl_model->getOneTemplates( $tpl_code );
				if ( empty( $mail_tpl ) || $mail_tpl['mail_switch'] == 0 )
				{
						return FALSE;
				}
				$member_model = model( "member" );
				$receiver = $member_model->infoMember( array(
						"member_id" => $receiver_id
				) );
				if ( empty( $receiver ) )
				{
						return FALSE;
				}
				$subject = ncreplacetext( $mail_tpl['title'], $param );
				$message = ncreplacetext( $mail_tpl['content'], $param );
				$result = FALSE;
				switch ( $mail_tpl['type'] )
				{
				case "0" :
						$email = new Email( );
						$result = $email->send_sys_email( $receiver['member_email'], $subject, $message );
						break;
				case "1" :
						$model_message = model( "message" );
						$param = array(
								"member_id" => $receiver_id,
								"to_member_name" => $receiver['member_name'],
								"msg_content" => $message,
								"message_type" => 1
						);
						$result = $model_message->saveMessage( $param );
				}
				return $result;
		}

		public function getNav( $permission = "", &$top_nav, &$left_nav, &$map_nav )
		{
				$model_admin = model( "admin" );
				$admin_array = $model_admin->getOneAdmin( $this->admin_info['id'] );
				$permission = explode( "|", $admin_array['admin_permission'] );
				$tmp = array( "index", "dashboard", "login" );
				$permission = array_merge( $permission, $tmp );
				Language::read( "common" );
				$lang = Language::getlangcontent( );
				$array = require( BasePath.DS.ProjectName.DS."include".DS."menu.php" );
				$map_nav = $array['left'];
				unset( $map_nav[0] );
				$model_nav = "<li><a class=\"link actived\" id=\"nav__nav_\" href=\"javascript:;\" onclick=\"openItem('_args_');\"><span>_text_</span></a></li>\n";
				$top_nav = "";
				foreach ( $array['top'] as $k => $v )
				{
						$v['nav'] = $v['args'];
						$top_nav .= str_ireplace( array( "_args_", "_text_", "_nav_" ), $v, $model_nav );
				}
				$top_nav = str_ireplace( "\n<li><a class=\"link actived\"", "\n<li><a class=\"link\"", $top_nav );
				$model_nav = "\r\n          <ul id=\"sort__nav_\">\r\n            <li>\r\n              <dl>\r\n                <dd>\r\n                  <ol>\r\n                    list_body\r\n                  </ol>\r\n                </dd>\r\n              </dl>\r\n            </li>\r\n          </ul>\n";
				$left_nav = "";
				foreach ( $array['left'] as $k => $v )
				{
						$left_nav .= str_ireplace( array(
								"_nav_"
						), array(
								$v['nav']
						), $model_nav );
						$model_list = "<li nc_type='_pkey_'><a href=\"JavaScript:void(0);\" name=\"item__op_\" id=\"item__op_\" onclick=\"openItem('_args_');\">_text_</a></li>";
						$tmp_list = "";
						$current_parent = "";
						foreach ( $v['list'] as $key => $value )
						{
								$model_list_parent = "";
								$args = explode( ",", $value['args'] );
								if ( $admin_array['admin_is_super'] != 1 && !@in_array( $args[1], $permission ) )
								{
								}
								else
								{
										if ( !empty( $value['parent'] ) )
										{
												if ( empty( $current_parent ) || $current_parent != $value['parent'] )
												{
														$model_list_parent = "<li nc_type='parentli' dataparam='".$value['parent']."'><dt>{$value['parenttext']}</dt><dd style='display:block;'></dd></li>";
												}
												$current_parent = $value['parent'];
										}
										$value['op'] = $args[0];
										$tmp_list .= str_ireplace( array(
												"_args_",
												"_text_",
												"_op_",
												"_pkey_"
										), array(
												$value['args'],
												$value['text'],
												$value['op'],
												$value['parent']
										), $model_list_parent.$model_list );
								}
						}
						$left_nav = str_replace( "list_body", $tmp_list, $left_nav );
				}
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
