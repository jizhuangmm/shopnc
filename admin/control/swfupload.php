<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class swfuploadControl
{

		public function article_pic_uploadOp( )
		{
				$upload = new UploadFile( );
				$upload->set( "default_dir", ATTACH_ARTICLE );
				$result = $upload->upfile( "Filedata" );
				if ( $result )
				{
						$GLOBALS['_POST']['pic'] = $upload->file_name;
				}
				else
				{
						echo "error";
						exit( );
				}
				$model_upload = model( "upload" );
				$insert_array = array( );
				$insert_array['file_name'] = $_POST['pic'];
				$insert_array['upload_type'] = "1";
				$insert_array['file_size'] = $_FILES['Filedata']['size'];
				$insert_array['upload_time'] = time( );
				$insert_array['item_id'] = intval( $_POST['item_id'] );
				$result = $model_upload->add( $insert_array );
				if ( $result )
				{
						$data = array( );
						$data['file_id'] = $result;
						$data['file_name'] = $_POST['pic'];
						$data['file_path'] = $_POST['pic'];
						$output = json_encode( $data );
						echo $output;
				}
		}

		public function document_pic_uploadOp( )
		{
				$upload = new UploadFile( );
				$upload->set( "default_dir", ATTACH_ARTICLE );
				$result = $upload->upfile( "Filedata" );
				if ( $result )
				{
						$GLOBALS['_POST']['pic'] = $upload->file_name;
				}
				else
				{
						echo "error";
						exit( );
				}
				$model_upload = model( "upload" );
				$insert_array = array( );
				$insert_array['file_name'] = $_POST['pic'];
				$insert_array['upload_type'] = "4";
				$insert_array['file_size'] = $_FILES['Filedata']['size'];
				$insert_array['item_id'] = intval( $_POST['item_id'] );
				$insert_array['upload_time'] = time( );
				$result = $model_upload->add( $insert_array );
				if ( $result )
				{
						$data = array( );
						$data['file_id'] = $result;
						$data['file_name'] = $_POST['pic'];
						$data['file_path'] = $_POST['pic'];
						$output = json_encode( $data );
						echo $output;
				}
		}

		public function pointprod_pic_uploadOp( )
		{
				$upload = new UploadFile( );
				$upload->set( "default_dir", ATTACH_POINTPROD );
				$result = $upload->upfile( "Filedata" );
				if ( $result )
				{
						$GLOBALS['_POST']['pic'] = $upload->file_name;
				}
				else
				{
						echo "error";
						exit( );
				}
				$model_upload = model( "upload" );
				$insert_array = array( );
				$insert_array['file_name'] = $_POST['pic'];
				$insert_array['upload_type'] = "6";
				$insert_array['file_size'] = $_FILES['Filedata']['size'];
				$insert_array['upload_time'] = time( );
				$insert_array['item_id'] = intval( $_POST['item_id'] );
				$result = $model_upload->add( $insert_array );
				if ( $result )
				{
						$data = array( );
						$data['file_id'] = $result;
						$data['file_name'] = $_POST['pic'];
						$data['file_path'] = $_POST['pic'];
						$output = json_encode( $data );
						echo $output;
				}
		}

}

if ( isset( $_POST['PHPSESSID'] ) )
{
		session_id( $_POST['PHPSESSID'] );
}
exit( );
?>
