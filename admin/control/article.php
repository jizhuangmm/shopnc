<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class articleControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "article" );
		}

		public function articleOp( )
		{
				$lang = Language::getlangcontent( );
				$model_article = model( "article" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( is_array( $_POST['del_id'] ) && !empty( $_POST['del_id'] ) )
						{
								$model_upload = model( "upload" );
								foreach ( $GLOBALS['_POST']['del_id'] as $k => $v )
								{
										$v = intval( $v );
										$condition['upload_type'] = "1";
										$condition['item_id'] = $v;
										$upload_list = $model_upload->getUploadList( $condition );
										if ( is_array( $upload_list ) )
										{
												foreach ( $upload_list as $k_upload => $v_upload )
												{
														$model_upload->del( $v_upload['upload_id'] );
														@unlink( BasePath.DS.ATTACH_ARTICLE.DS.$v_upload['file_name'] );
												}
										}
										$model_article->del( $v );
								}
								showmessage( $lang['article_index_del_succ'] );
						}
						else
						{
								showmessage( $lang['article_index_choose'] );
						}
				}
				$condition['ac_id'] = intval( $_GET['search_ac_id'] );
				$condition['like_title'] = trim( $_GET['search_title'] );
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$article_list = $model_article->getArticleList( $condition, $page );
				if ( is_array( $article_list ) )
				{
						$model_class = model( "article_class" );
						$class_list = $model_class->getClassList( $condition );
						$tmp_class_name = array( );
						if ( is_array( $class_list ) )
						{
								foreach ( $class_list as $k => $v )
								{
										$tmp_class_name[$v['ac_id']] = $v['ac_name'];
								}
						}
						foreach ( $article_list as $k => $v )
						{
								$article_list[$k]['article_time'] = date( "Y-m-d H:i:s", $v['article_time'] );
								if ( @array_key_exists( $v['ac_id'], $tmp_class_name ) )
								{
										$article_list[$k]['ac_name'] = $tmp_class_name[$v['ac_id']];
								}
						}
				}
				$model_class = model( "article_class" );
				$parent_list = $model_class->getTreeClassList( 2 );
				if ( is_array( $parent_list ) )
				{
						$unset_sign = FALSE;
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['ac_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['ac_name'];
						}
				}
				Tpl::output( "article_list", $article_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::output( "search_title", trim( $_GET['search_title'] ) );
				Tpl::output( "search_ac_id", intval( $_GET['search_ac_id'] ) );
				Tpl::output( "parent_list", $parent_list );
				Tpl::showpage( "article.index" );
		}

		public function article_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_article = model( "article" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['article_title'],
										"require" => "true",
										"message" => $lang['article_add_title_null']
								),
								array(
										"input" => $_POST['ac_id'],
										"require" => "true",
										"message" => $lang['article_add_class_null']
								),
								array(
										"input" => $_POST['article_content'],
										"require" => "true",
										"message" => $lang['article_add_content_null']
								),
								array(
										"input" => $_POST['article_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['article_add_sort_int']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$insert_array = array( );
								$insert_array['article_title'] = trim( $_POST['article_title'] );
								$insert_array['ac_id'] = intval( $_POST['ac_id'] );
								$insert_array['article_url'] = trim( $_POST['article_url'] );
								$insert_array['article_show'] = trim( $_POST['article_show'] );
								$insert_array['article_sort'] = trim( $_POST['article_sort'] );
								$insert_array['article_content'] = trim( $_POST['article_content'] );
								$insert_array['article_time'] = time( );
								$result = $model_article->add( $insert_array );
								if ( $result )
								{
										$model_upload = model( "upload" );
										if ( is_array( $_POST['file_id'] ) )
										{
												foreach ( $GLOBALS['_POST']['file_id'] as $k => $v )
												{
														$v = intval( $v );
														$update_array = array( );
														$update_array['upload_id'] = $v;
														$update_array['item_id'] = $result;
														$model_upload->update( $update_array );
														unset( $update_array );
												}
										}
										$url = array(
												array(
														"url" => "index.php?act=article&op=article",
														"msg" => "{$lang['article_add_tolist']}"
												),
												array(
														"url" => "index.php?act=article&op=article_add&ac_id=".intval( $_POST['ac_id'] ),
														"msg" => "{$lang['article_add_continueadd']}"
												)
										);
										showmessage( "{$lang['article_add_ok']}", $url );
								}
								else
								{
										showmessage( "{$lang['article_add_fail']}" );
								}
						}
				}
				$model_class = model( "article_class" );
				$parent_list = $model_class->getTreeClassList( 2 );
				if ( is_array( $parent_list ) )
				{
						$unset_sign = FALSE;
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['ac_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['ac_name'];
						}
				}
				$model_upload = model( "upload" );
				$condition['upload_type'] = "1";
				$condition['item_id'] = "0";
				$file_upload = $model_upload->getUploadList( $condition );
				if ( is_array( $file_upload ) )
				{
						foreach ( $file_upload as $k => $v )
						{
								$file_upload[$k]['upload_path'] = SiteUrl."/".ATTACH_ARTICLE."/".$file_upload[$k]['file_name'];
						}
				}
				Tpl::output( "PHPSESSID", session_id( ) );
				Tpl::output( "ac_id", intval( $_GET['ac_id'] ) );
				Tpl::output( "parent_list", $parent_list );
				Tpl::output( "file_upload", $file_upload );
				Tpl::showpage( "article.add" );
		}

		public function article_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_article = model( "article" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['article_title'],
										"require" => "true",
										"message" => $lang['article_add_title_null']
								),
								array(
										"input" => $_POST['ac_id'],
										"require" => "true",
										"message" => $lang['article_add_class_null']
								),
								array(
										"input" => $_POST['article_content'],
										"require" => "true",
										"message" => $lang['article_add_content_null']
								),
								array(
										"input" => $_POST['article_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['article_add_sort_int']
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
								$update_array['article_id'] = intval( $_POST['article_id'] );
								$update_array['article_title'] = trim( $_POST['article_title'] );
								$update_array['ac_id'] = intval( $_POST['ac_id'] );
								$update_array['article_url'] = trim( $_POST['article_url'] );
								$update_array['article_show'] = trim( $_POST['article_show'] );
								$update_array['article_sort'] = trim( $_POST['article_sort'] );
								$update_array['article_content'] = trim( $_POST['article_content'] );
								$result = $model_article->update( $update_array );
								if ( $result )
								{
										$model_upload = model( "upload" );
										if ( is_array( $_POST['file_id'] ) )
										{
												foreach ( $GLOBALS['_POST']['file_id'] as $k => $v )
												{
														$update_array = array( );
														$update_array['upload_id'] = intval( $v );
														$update_array['item_id'] = intval( $_POST['article_id'] );
														$model_upload->update( $update_array );
														unset( $update_array );
												}
										}
										$url = array(
												array(
														"url" => "index.php?act=article&op=article",
														"msg" => $lang['article_edit_back_to_list']
												),
												array(
														"url" => "index.php?act=article&op=article_edit&article_id=".intval( $_POST['article_id'] ),
														"msg" => $lang['article_edit_edit_again']
												)
										);
										showmessage( $lang['article_edit_succ'], $url );
								}
								else
								{
										showmessage( $lang['article_edit_fail'] );
								}
						}
				}
				$article_array = $model_article->getOneArticle( intval( $_GET['article_id'] ) );
				if ( empty( $article_array ) )
				{
						showmessage( $lang['wrong_argument'] );
				}
				$model_class = model( "article_class" );
				$parent_list = $model_class->getTreeClassList( 2 );
				if ( is_array( $parent_list ) )
				{
						$unset_sign = FALSE;
						foreach ( $parent_list as $k => $v )
						{
								$parent_list[$k]['ac_name'] = str_repeat( "&nbsp;", $v['deep'] * 2 ).$v['ac_name'];
						}
				}
				$model_upload = model( "upload" );
				$condition['upload_type'] = "1";
				$condition['item_id'] = $article_array['article_id'];
				$file_upload = $model_upload->getUploadList( $condition );
				if ( is_array( $file_upload ) )
				{
						foreach ( $file_upload as $k => $v )
						{
								$file_upload[$k]['upload_path'] = SiteUrl."/".ATTACH_ARTICLE."/".$file_upload[$k]['file_name'];
						}
				}
				Tpl::output( "PHPSESSID", session_id( ) );
				Tpl::output( "file_upload", $file_upload );
				Tpl::output( "parent_list", $parent_list );
				Tpl::output( "article_array", $article_array );
				Tpl::showpage( "article.edit" );
		}

		public function article_iframe_uploadOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['form_submit'] == "ok" )
				{
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_ARTICLE );
						$result = $upload->upfile( "file" );
						if ( $result )
						{
								$GLOBALS['_POST']['pic'] = $upload->file_name;
						}
						else
						{
								echo "<script type='text/javascript'>alert('".$upload->error."');history.back();</script>";
								exit( );
						}
						$model_upload = model( "upload" );
						$insert_array = array( );
						$insert_array['file_name'] = trim( $_POST['pic'] );
						$insert_array['upload_type'] = "1";
						$insert_array['file_size'] = $_FILES['file']['size'];
						$insert_array['item_id'] = intval( $_POST['article_id'] );
						$insert_array['upload_time'] = time( );
						$result = $model_upload->add( $insert_array );
						if ( $result )
						{
								$data = array( );
								$data['file_id'] = $result;
								$data['file_name'] = trim( $_POST['pic'] );
								$output = json_encode( $data );
								echo "<script type='text/javascript'>window.parent.add_uploadedfile('".$output."');</script>";
						}
						else
						{
								echo "<script type='text/javascript'>alert('".$lang['article_iframe_uploadfail']."');</script>";
						}
				}
				Tpl::output( "article_id", intval( $_GET['article_id'] ) );
				Tpl::showpage( "article.iframe_upload", "blank_layout" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "del_file_upload" :
						if ( 0 < intval( $_GET['file_id'] ) )
						{
								$model_upload = model( "upload" );
								$file_array = $model_upload->getOneUpload( intval( $_GET['file_id'] ) );
								@unlink( BasePath.DS.ATTACH_ARTICLE.DS.$file_array['file_name'] );
								$model_upload->del( intval( $_GET['file_id'] ) );
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				}
		}

}

?>
