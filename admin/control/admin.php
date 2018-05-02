<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class adminControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "admin" );
		}

		public function adminOp( )
		{
				$lang = Language::getlangcontent( );
				$model_admin = model( "admin" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( @in_array( 1, $_POST['del_id'] ) )
						{
								showmessage( $lang['admin_index_not_allow_del'] );
						}
						if ( !empty( $_POST['del_id'] ) )
						{
								if ( is_array( $_POST['del_id'] ) )
								{
										foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
										{
												$model_admin->delAdmin( intval( $v ) );
										}
								}
								showmessage( $lang['admin_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['admin_index_choose'] );
						}
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$admin_list = $model_admin->getAdminList( $condition, $page );
				Tpl::output( "admin_list", $admin_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "admin.index" );
		}

		public function admin_delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( !empty( $_GET['admin_id'] ) )
				{
						if ( $_GET['admin_id'] == 1 )
						{
								showmessage( $lang['admin_index_choose'] );
						}
						$model_admin = model( "admin" );
						$model_admin->delAdmin( intval( $_GET['admin_id'] ) );
						showmessage( $lang['admin_index_del_succ'] );
				}
				else
				{
						showmessage( $lang['admin_index_choose'] );
				}
		}

		public function admin_addOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['form_submit'] == "ok" )
				{
						$model_admin = model( "admin" );
						$param['admin_name'] = trim( $_POST['admin_name'] );
						$param['admin_password'] = md5( trim( $_POST['admin_password'] ) );
						if ( !empty( $_POST['permission'] ) || is_array( $_POST['permission'] ) )
						{
								$permission_str = "";
								foreach ( $GLOBALS['_POST']['permission'] as $k => $v )
								{
										$permission_array[] = $k;
								}
								$permission_str = implode( "|", $permission_array );
								unset( $permission_array );
						}
						else
						{
								showmessage( $lang['admin_index_add_allow'] );
						}
						$param['admin_permission'] = $permission_str ? $permission_str : "";
						$rs = $model_admin->addAdmin( $param );
						if ( $rs )
						{
								showmessage( $lang['admin_index_add_succ'], "index.php?act=admin&op=admin" );
						}
						else
						{
								showmessage( $lang['admin_index_add_fail'] );
						}
				}
				Tpl::output( "function_array", $this->get_permission_list( $lang ) );
				Tpl::showpage( "admin.add" );
		}

		public function admin_setOp( )
		{
				$lang = Language::getlangcontent( );
				$model_admin = model( "admin" );
				$admin_id = intval( $_GET['admin_id'] );
				$condition['admin_id'] = $admin_id;
				$admin_info = $model_admin->infoAdmin( $condition );
				if ( empty( $admin_info ) )
				{
						showmessage( $lang['admin_set_admin_not_exists'] );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( empty( $_POST['permission'] ) )
						{
								showmessage( $lang['admin_set_assign_right'] );
						}
						$permission_array = array( );
						foreach ( $GLOBALS['_POST']['permission'] as $k => $v )
						{
								$permission_array[] = $k;
						}
						$permission = implode( "|", $permission_array );
						$update_array = array( );
						$update_array['admin_id'] = $admin_id;
						$update_array['admin_permission'] = $permission;
						$rs = $model_admin->updateAdmin( $update_array );
						if ( $rs )
						{
								showmessage( $lang['admin_set_edit_succ'] );
						}
						else
						{
								showmessage( $lang['admin_set_edit_fail'] );
						}
				}
				$admin_array = $model_admin->getOneAdmin( $admin_id );
				if ( !empty( $admin_array ) )
				{
						$admin_array['admin_permission'] = explode( "|", $admin_array['admin_permission'] );
				}
				Tpl::output( "admin_array", $admin_array );
				Tpl::output( "admin_info", $admin_info );
				Tpl::output( "function_array", $this->get_permission_list( $lang ) );
				Tpl::showpage( "admin.set" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "check_admin_name" :
						$model_admin = model( "admin" );
						$condition['admin_name'] = trim( $_GET['admin_name'] );
						$list = $model_admin->infoAdmin( $condition );
						if ( !empty( $list ) )
						{
								echo "false";
								exit( );
						}
						echo "true";
						exit( );
				}
		}

		public function admin_editOp( )
		{
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( trim( $_POST['new_pw'] ) == "" )
						{
								showmessage( Language::get( "admin_edit_success" ), "index.php?act=admin&op=admin" );
						}
						if ( trim( $_POST['new_pw'] ) !== trim( $_POST['new_pw2'] ) )
						{
								showmessage( Language::get( "admin_edit_repeat_error" ), "index.php?act=admin&op=admin_edit&admin_id=".$_GET['admin_id'] );
						}
						$admin_model = model( "admin" );
						$new_pw = md5( trim( $_POST['new_pw'] ) );
						$result = $admin_model->updateAdmin( array(
								"admin_password" => $new_pw,
								"admin_id" => $_GET['admin_id']
						) );
						if ( $result )
						{
								showmessage( Language::get( "admin_edit_success" ), "index.php?act=admin&op=admin" );
						}
						else
						{
								showmessage( Language::get( "admin_edit_fail" ), "index.php?act=admin&op=admin" );
						}
				}
				else
				{
						$admin_model = model( "admin" );
						$admininfo = $admin_model->getOneAdmin( intval( $_GET['admin_id'] ) );
						if ( !is_array( $admininfo ) && count( $admininfo ) <= 0 )
						{
								showmessage( Language::get( "admin_edit_admin_error" ), "index.php?act=admin&op=admin" );
						}
						Tpl::output( "admininfo", $admininfo );
						Tpl::showpage( "admin.edit" );
				}
		}

		private function get_permission_list( $lang )
		{
				$array = require( BasePath.DS.ProjectName.DS."include".DS."menu.php" );
				$permission = array( );
				if ( is_array( $array['left'] ) )
				{
						foreach ( $array['left'] as $k => $v )
						{
								if ( $v['nav'] == "dashboard" || !is_array( $v['list'] ) )
								{
										$permission[$v['nav']][0] = $v['text'];
										$tmp = array( );
										foreach ( $v['list'] as $value )
										{
												$pms_name = explode( ",", $value['args'] );
												$tmp[$pms_name[1]] .= $value['text']." ";
										}
										foreach ( $tmp as $tk => $tv )
										{
												$permission[$v['nav']][] = array(
														$tk,
														$tv
												);
										}
								}
						}
				}
				return $permission;
		}

}

?>
