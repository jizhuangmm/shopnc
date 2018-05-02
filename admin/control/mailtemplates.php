<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class mailtemplatesControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "mailtemplates" );
		}

		public function mailtemplatesOp( )
		{
				$model_templates = model( "mail_templates" );
				$condition['type'] = "0";
				$templates_list = $model_templates->getTemplatesList( $condition );
				Tpl::output( "templates_list", $templates_list );
				Tpl::showpage( "mail_templates.index" );
		}

		public function mailtemplates_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_templates = model( "mail_templates" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['code'],
										"require" => "true",
										"message" => $lang['mailtemplates_edit_no_null']
								),
								array(
										"input" => $_POST['title'],
										"require" => "true",
										"message" => $lang['mailtemplates_edit_title_null']
								),
								array(
										"input" => $_POST['content'],
										"require" => "true",
										"message" => $lang['mailtemplates_edit_content_null']
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
								$update_array['code'] = trim( $_POST['code'] );
								$update_array['title'] = trim( $_POST['title'] );
								$update_array['content'] = trim( $_POST['content'] );
								$result = $model_templates->update( $update_array );
								if ( $result === TRUE )
								{
										showmessage( $lang['mailtemplates_edit_succ'], "index.php?act=mailtemplates&op=mailtemplates" );
								}
								else
								{
										showmessage( $lang['mailtemplates_edit_fail'] );
								}
						}
				}
				if ( empty( $_GET['code'] ) )
				{
						showmessage( $lang['mailtemplates_edit_code_null'] );
				}
				$templates_array = $model_templates->getOneTemplates( trim( $_GET['code'] ) );
				Tpl::output( "templates_array", $templates_array );
				Tpl::showpage( "mail_templates.edit" );
		}

		public function msgtemplatesOp( )
		{
				$model_templates = model( "mail_templates" );
				$condition['type'] = "1";
				$templates_list = $model_templates->getTemplatesList( $condition );
				Tpl::output( "templates_list", $templates_list );
				Tpl::showpage( "msg_templates.index" );
		}

		public function msgtemplates_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_templates = model( "mail_templates" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['code'],
										"require" => "true",
										"message" => $lang['mailtemplates_msg_edit_no_null']
								),
								array(
										"input" => $_POST['content'],
										"require" => "true",
										"message" => $lang['mailtemplates_msg_edit_content_null']
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
								$update_array['code'] = trim( $_POST['code'] );
								$update_array['content'] = trim( $_POST['content'] );
								$result = $model_templates->update( $update_array );
								if ( $result === TRUE )
								{
										showmessage( $lang['mailtemplates_edit_succ'], "index.php?act=mailtemplates&op=msgtemplates" );
								}
								else
								{
										showmessage( $lang['mailtemplates_edit_fail'] );
								}
						}
				}
				if ( empty( $_GET['code'] ) )
				{
						showmessage( $lang['mailtemplates_edit_code_null'] );
				}
				$templates_array = $model_templates->getOneTemplates( trim( $_GET['code'] ) );
				Tpl::output( "templates_array", $templates_array );
				Tpl::showpage( "msg_templates.edit" );
		}

		public function ajaxOp( )
		{
				$lang = Language::getlangcontent( );
				$model_templates = model( "mail_templates" );
				if ( $_POST['form_submit'] == "ok" && ( $_POST['submit_type'] == "mail_switchON" || $_POST['submit_type'] == "mail_switchOFF" ) )
				{
						if ( is_array( $_POST['del_id'] ) )
						{
								$param = array( );
								$param['mail_switch'] = $_POST['submit_type'] == "mail_switchON" ? "1" : "0";
								foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
								{
										$param['code'] = $v;
										$model_templates->update( $param );
								}
								showmessage( $lang['mailtemplates_index_succ'] );
						}
						else
						{
								showmessage( $lang['mailtemplates_index_fail'] );
						}
				}
				if ( $_GET['branch'] == "mail_switch" )
				{
						$update_array = array( );
						$update_array['code'] = trim( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$model_templates->update( $update_array );
						echo "true";
						exit( );
				}
		}

}

?>
