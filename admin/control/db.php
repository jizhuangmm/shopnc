<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class dbControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "db" );
		}

		public function dbOp( )
		{
				$lang = Language::getlangcontent( );
				$model_db = model( "db" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( intval( $_POST['file_size'] ) < 10 )
						{
								showmessage( $lang['db_index_min_size'] );
						}
						if ( is_dir( BasePath.DS."sql_back".DS.$_POST['backup_name'] ) )
						{
								showmessage( $lang['db_index_name_exists'] );
						}
						if ( $_POST['backup_type'] == "all" )
						{
								$table_list = $model_db->getTableList( );
						}
						if ( $_POST['backup_type'] == "custom" )
						{
								if ( empty( $_POST['tables'] ) )
								{
										showmessage( $lang['db_index_choose'] );
								}
								if ( is_array( $_POST['tables'] ) )
								{
										foreach ( $GLOBALS['_POST']['tables'] as $k => $v )
										{
												$table_list[] = $v;
										}
								}
						}
						$_SESSION['db_backup'] = array( );
						$_SESSION['db_backup']['size'] = intval( $_POST['file_size'] ) * 1024;
						$_SESSION['db_backup']['table_name'] = "";
						$_SESSION['db_backup']['op'] = "create";
						$_SESSION['db_backup']['back_file'] = $_POST['backup_name'];
						$_SESSION['db_backup']['backup_tables'] = $table_list;
						$_SESSION['db_backup']['limit'] = 0;
						$_SESSION['db_backup']['md5'] = substr( md5( microtime( TRUE ) ), 0, 5 );
						showmessage( $lang['db_index_backup_to_wait'], "index.php?act=db&op=db&step=1" );
				}
				if ( 1 <= intval( $_GET['step'] ) )
				{
						$model_db->backUp( intval( $_GET['step'] ) );
						if ( $_SESSION['db_backup']['op'] == "insert" && $_SESSION['db_backup']['backup_tables'][count( $_SESSION['db_backup']['backup_tables'] ) - 1] == $_SESSION['db_backup']['table_name'] && 1 < intval( $_GET['step'] ) && $_SESSION['db_backup']['limit'] == 0 )
						{
								unset( $_SESSION['db_backup'] );
								$url = array(
										array(
												"url" => "index.php?act=db&op=db",
												"msg" => $lang['db_index_back_to_db']
										)
								);
								showmessage( $lang['db_index_backup_succ'], $url );
						}
						else
						{
								$url = array(
										array(
												"url" => "index.php?act=db&op=db&step=".( intval( $_GET['step'] ) + 1 ),
												"msg" => $lang['db_index_backuping']
										)
								);
								showmessage( $lang['db_index_backup_succ1'].intval( $_GET['step'] ).$lang['db_index_backup_succ2'], $url );
						}
				}
				$table_list = $model_db->getTableList( );
				$back_dir = $model_db->getBackDir( );
				Tpl::output( "back_dir", $back_dir );
				Tpl::output( "table_list", $table_list );
				Tpl::showpage( "db.index" );
		}

		public function db_restoreOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['dir_name'] ) || is_array( $_POST['dir_name'] ) )
						{
								$dir = BasePath.DS."sql_back";
								foreach ( $GLOBALS['_POST']['dir_name'] as $k => $v )
								{
										if ( file_exists( BasePath.DS."sql_back".DS.$v ) )
										{
												$file_list = array( );
												readfilelist( $dir.DS.$v, $file_list );
												if ( is_array( $file_list ) )
												{
														foreach ( $file_list as $k_file => $v_file )
														{
																@unlink( $dir.DS.$v.DS.$v_file );
														}
												}
												@rmdir( $dir.DS.$v );
										}
										else
										{
												showmessage( $lang['db_restore_file_not_exists'] );
										}
								}
								showmessage( $lang['db_restore_del_succ'] );
						}
						else
						{
								showmessage( $lang['db_restore_choose_file_to_del'] );
						}
				}
				$tmp_list = readdirlist( BasePath.DS."sql_back" );
				$dir_list = array( );
				if ( is_array( $tmp_list ) )
				{
						foreach ( $tmp_list as $k => $v )
						{
								$dir_list[$k]['name'] = $v;
								$dir_list[$k]['make_time'] = date( "Y-m-d H:i:s", filemtime( BasePath.DS."sql_back".DS.$v ) );
								$dir_list[$k]['size'] = number_format( getdirsize( BasePath.DS."sql_back".DS.$v ) / 1024, 2 )."KB";
								$dir_list[$k]['file_num'] = count( glob( BasePath.DS."sql_back".DS.$v.DS."*.sql" ) );
						}
				}
				Tpl::output( "dir_list", $dir_list );
				Tpl::showpage( "db.restore" );
		}

		public function db_importOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_GET['dir_name'] != "" && file_exists( BasePath.DS."sql_back".DS.$_GET['dir_name'] ) )
				{
						$model_db = model( "db" );
						$result = $model_db->import( $_GET['dir_name'], intval( $_GET['step'] ) );
						if ( $result == "succ" )
						{
								$url = array(
										array(
												"url" => "index.php?act=db&op=db_restore",
												"msg" => $lang['db_import_back_to_list']
										)
								);
								showmessage( $lang['db_import_succ'], $url );
						}
						if ( $result == "continue" )
						{
								$url = array(
										array(
												"url" => "index.php?act=db&op=db_import&dir_name=".$_GET['dir_name']."&step=".( intval( $_GET['step'] ) + 1 ),
												"msg" => $lang['db_import_going']
										)
								);
								showmessage( $lang['db_index_backup_succ1'].intval( $_GET['step'] ).$lang['db_import_succ2'], $url );
						}
						if ( !$result )
						{
								showmessage( $lang['db_import_fail'] );
						}
				}
				else
				{
						showmessage( $lang['db_import_file_not_exists'] );
				}
		}

		public function db_delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_GET['dir_name'] != "" && file_exists( BasePath.DS."sql_back".DS.$_GET['dir_name'] ) )
				{
						$dir = BasePath.DS."sql_back".DS.$_GET['dir_name'];
						$file_list = array( );
						readfilelist( $dir, $file_list );
						if ( is_array( $file_list ) )
						{
								foreach ( $file_list as $k => $v )
								{
										@unlink( $v );
								}
						}
						@rmdir( BasePath.DS."sql_back".DS.$_GET['dir_name'] );
						showmessage( $lang['db_del_succ'] );
				}
				else
				{
						showmessage( $lang['db_restore_file_not_exists'] );
				}
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "db_file" :
						if ( $_GET['dir_name'] != "." && $_GET['dir_name'] != ".." && is_dir( BasePath.DS."sql_back".DS.$_GET['dir_name'] ) )
						{
								$dir = BasePath.DS."sql_back".DS.$_GET['dir_name'];
								$tmp = array( );
								readfilelist( $dir, $tmp );
								if ( is_array( $tmp ) )
								{
										$file_list = array( );
										foreach ( $tmp as $k => $v )
										{
												$file_list[$k]['name'] = $v;
												$file_list[$k]['make_time'] = date( "Y-m-d H:i:s", filemtime( $dir.DS.$v ) );
												$file_list[$k]['size'] = number_format( filesize( $dir.DS.$v ) / 1024, 2 )."KB";
										}
										$output = json_encode( $file_list );
										print_r( $output );
								}
								exit( );
						}
						echo "false";
						exit( );
				}
		}

}

?>
