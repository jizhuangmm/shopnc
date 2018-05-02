<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class documentControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "document" );
		}

		public function indexOp( )
		{
				$this->documentOp( );
				exit( );
		}

		public function documentOp( )
		{
				$model_doc = model( "document" );
				$doc_list = $model_doc->getList( );
				Tpl::output( "doc_list", $doc_list );
				Tpl::showpage( "document.index" );
		}

		public function editOp( )
		{
				$lang = Language::getlangcontent( );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['doc_title'],
										"require" => "true",
										"message" => $lang['document_index_title_null']
								),
								array(
										"input" => $_POST['doc_content'],
										"require" => "true",
										"message" => $lang['document_index_content_null']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$param = array( );
								$param['doc_id'] = intval( $_POST['doc_id'] );
								$param['doc_title'] = trim( $_POST['doc_title'] );
								$param['doc_content'] = trim( $_POST['doc_content'] );
								$param['doc_time'] = time( );
								$model_doc = model( "document" );
								$result = $model_doc->update( $param );
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
														$update_array['item_id'] = intval( $_POST['doc_id'] );
														$model_upload->update( $update_array );
														unset( $update_array );
												}
										}
										$url = array(
												array(
														"url" => "index.php?act=document&op=document",
														"msg" => $lang['document_edit_back_to_list']
												),
												array(
														"url" => "index.php?act=document&op=edit&doc_id=".intval( $_POST['doc_id'] ),
														"msg" => $lang['document_edit_again']
												)
										);
										showmessage( $lang['document_edit_succ'], $url );
								}
								else
								{
										showmessage( $lang['document_edit_fail'] );
								}
						}
				}
				if ( empty( $_GET['doc_id'] ) )
				{
						showmessage( $lang['miss_argument'] );
				}
				$model_doc = model( "document" );
				$doc = $model_doc->getOneById( intval( $_GET['doc_id'] ) );
				$model_upload = model( "upload" );
				$condition['upload_type'] = "4";
				$condition['item_id'] = $doc['doc_id'];
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
				Tpl::output( "doc", $doc );
				Tpl::showpage( "document.edit" );
		}

		public function document_iframe_uploadOp( )
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
						$insert_array['file_name'] = $_POST['pic'];
						$insert_array['upload_type'] = "4";
						$insert_array['file_size'] = $_FILES['file']['size'];
						$insert_array['upload_time'] = time( );
						$result = $model_upload->add( $insert_array );
						if ( $result )
						{
								$data = array( );
								$data['file_id'] = $result;
								$data['file_name'] = $_POST['pic'];
								$output = json_encode( $data );
								echo "<script type='text/javascript'>window.parent.add_uploadedfile('".$output."');</script>";
						}
						else
						{
								echo "<script type='text/javascript'>alert('".$lang['document_iframe_upload_fail']."');</script>";
						}
				}
				Tpl::output( "doc_id", intval( $_GET['doc_id'] ) );
				Tpl::showpage( "document.iframe_upload", "blank_layout" );
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
