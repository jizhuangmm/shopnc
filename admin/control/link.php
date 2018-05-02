<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class linkControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "link" );
		}

		public function linkOp( )
		{
				$lang = Language::getlangcontent( );
				$model_link = model( "link" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( is_array( $_POST['del_id'] ) && !empty( $_POST['del_id'] ) )
						{
								foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
								{
										$v = intval( $v );
										$tmp = $model_link->getOneLink( $v );
										if ( !empty( $tmp['link_pic'] ) )
										{
												@unlink( BasePath.DS.ATTACH_LINK.DS.$tmp['link_pic'] );
										}
										unset( $tmp );
										$model_link->del( $v );
								}
								showmessage( $lang['link_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['link_index_choose_del'] );
						}
				}
				$condition['like_link_title'] = $_GET['search_link_title'];
				Tpl::output( "search_link_title", $_GET['search_link_title'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				if ( $_GET['type'] == "0" )
				{
						$condition['link_pic'] = "yes";
				}
				if ( $_GET['type'] == "1" )
				{
						$condition['link_pic'] = "no";
				}
				$link_list = $model_link->getLinkList( $condition, $page );
				if ( is_array( $link_list ) )
				{
						foreach ( $link_list as $k => $v )
						{
								if ( !empty( $v['link_pic'] ) )
								{
										$link_list[$k]['link_pic'] = SiteUrl."/".ATTACH_LINK."/".$v['link_pic'];
								}
						}
				}
				Tpl::output( "link_list", $link_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "link.index" );
		}

		public function link_delOp( )
		{
				$lang = Language::getlangcontent( );
				if ( 0 < intval( $_GET['link_id'] ) )
				{
						$model_link = model( "link" );
						$tmp = $model_link->getOneLink( intval( $_GET['link_id'] ) );
						if ( !empty( $tmp['link_pic'] ) )
						{
								@unlink( BasePath.DS.ATTACH_LINK.DS.$tmp['link_pic'] );
						}
						$model_link->del( $tmp['link_id'] );
						showmessage( $lang['link_index_del_succ'], "index.php?act=link&op=link" );
				}
				else
				{
						showmessage( $lang['link_index_choose_del'], "index.php?act=link&op=link" );
				}
		}

		public function link_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_link = model( "link" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['link_title'],
										"require" => "true",
										"message" => $lang['link_add_title_null']
								),
								array(
										"input" => $_POST['link_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['link_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								if ( $_FILES['link_pic']['name'] != "" )
								{
										$upload = new UploadFile( );
										$upload->set( "default_dir", ATTACH_LINK );
										$result = $upload->upfile( "link_pic" );
										if ( $result )
										{
												$GLOBALS['_POST']['link_pic'] = $upload->file_name;
										}
										else
										{
												showmessage( $upload->error );
										}
								}
								$insert_array = array( );
								$insert_array['link_title'] = trim( $_POST['link_title'] );
								$insert_array['link_url'] = trim( $_POST['link_url'] );
								$insert_array['link_pic'] = trim( $_POST['link_pic'] );
								$insert_array['link_sort'] = trim( $_POST['link_sort'] );
								$result = $model_link->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=link&op=link_add",
														"msg" => $lang['link_add_again']
												),
												array(
														"url" => "index.php?act=link&op=link",
														"msg" => $lang['link_add_back_to_list']
												)
										);
										showmessage( $lang['link_add_succ'], $url );
								}
								else
								{
										showmessage( $lang['link_add_fail'] );
								}
						}
				}
				Tpl::showpage( "link.add" );
		}

		public function link_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_link = model( "link" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['link_title'],
										"require" => "true",
										"message" => $lang['link_add_title_null']
								),
								array(
										"input" => $_POST['link_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['link_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								if ( $_FILES['link_pic']['name'] != "" )
								{
										$upload = new UploadFile( );
										$upload->set( "default_dir", ATTACH_LINK );
										$result = $upload->upfile( "link_pic" );
										if ( $result )
										{
												$GLOBALS['_POST']['link_pic'] = $upload->file_name;
										}
										else
										{
												showmessage( $upload->error );
										}
								}
								$update_array = array( );
								$update_array['link_id'] = intval( $_POST['link_id'] );
								$update_array['link_title'] = trim( $_POST['link_title'] );
								$update_array['link_url'] = trim( $_POST['link_url'] );
								if ( $_POST['link_pic'] )
								{
										$update_array['link_pic'] = $_POST['link_pic'];
								}
								$update_array['link_sort'] = trim( $_POST['link_sort'] );
								$result = $model_link->update( $update_array );
								if ( $result )
								{
										if ( !empty( $_POST['link_pic'] ) || !empty( $_POST['old_link_pic'] ) )
										{
												@unlink( BasePath.DS.ATTACH_LINK.DS.$_POST['old_link_pic'] );
										}
										$url = array(
												array(
														"url" => "index.php?act=link&op=link_edit&link_id=".intval( $_POST['link_id'] ),
														"msg" => $lang['link_edit_again']
												),
												array(
														"url" => "index.php?act=link&op=link",
														"msg" => $lang['link_add_back_to_list']
												)
										);
										showmessage( $lang['link_edit_succ'], $url );
								}
								else
								{
										showmessage( $lang['link_edit_fail'] );
								}
						}
				}
				$link_array = $model_link->getOneLink( intval( $_GET['link_id'] ) );
				if ( empty( $link_array ) )
				{
						showmessage( $lang['wrong_argument'] );
				}
				Tpl::output( "link_array", $link_array );
				Tpl::showpage( "link.edit" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "link_sort" :
						$model_link = model( "link" );
						$update_array = array( );
						$update_array['link_id'] = intval( $_GET['id'] );
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						$result = $model_link->update( $update_array );
						echo "true";
						exit( );
				}
		}

}

?>
