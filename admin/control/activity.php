<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class activityControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "activity" );
		}

		public function indexOp( )
		{
				$this->activityOp( );
		}

		public function activityOp( )
		{
				$activity = model( "activity" );
				$condition_arr = array( );
				$condition_arr['activity_type'] = "1";
				if ( !empty( $_GET['searchstate'] ) )
				{
						$state = intval( $_GET['searchstate'] ) - 1;
						$condition_arr['activity_state'] = "{$state}";
				}
				if ( !empty( $_GET['searchtitle'] ) )
				{
						$condition_arr['activity_title'] = $_GET['searchtitle'];
				}
				if ( !empty( $_GET['searchstartdate'] ) || !empty( $_GET['searchenddate'] ) )
				{
						$condition_arr['activity_daterange']['startdate'] = strtotime( $_GET['searchstartdate'] );
						$condition_arr['activity_daterange']['enddate'] = strtotime( $_GET['searchenddate'] );
						if ( 0 < $condition_arr['activity_daterange']['enddate'] )
						{
								$condition_arr['activity_daterange']['enddate'] += 86400;
						}
				}
				$condition_arr['order'] = "activity_sort asc";
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$list = $activity->getList( $condition_arr, $page );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "list", $list );
				Tpl::showpage( "activity.index" );
		}

		public function newOp( )
		{
				if ( $_POST['form_submit'] != "ok" )
				{
						Tpl::showpage( "activity.add" );
						exit( );
				}
				$obj_validate = new Validate( );
				$validate_arr[] = array(
						"input" => $_POST['activity_title'],
						"require" => "true",
						"message" => Language::get( "activity_new_title_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_start_date'],
						"require" => "true",
						"message" => Language::get( "activity_new_startdate_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_end_date'],
						"require" => "true",
						"validator" => "Compare",
						"operator" => ">",
						"to" => "{$_POST['activity_start_date']}",
						"message" => Language::get( "activity_new_enddate_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_style'],
						"require" => "true",
						"message" => Language::get( "activity_new_style_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_type'],
						"require" => "true",
						"message" => Language::get( "activity_new_type_null" )
				);
				$validate_arr[] = array(
						"input" => $_FILES['activity_banner']['name'],
						"require" => "true",
						"message" => Language::get( "activity_new_banner_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_desc'],
						"require" => "true",
						"message" => Language::get( "activity_new_desc_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_sort'],
						"require" => "true",
						"validator" => "Range",
						"min" => 0,
						"max" => 255,
						"message" => Language::get( "activity_new_sort_error" )
				);
				$obj_validate->validateparam = $validate_arr;
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( Language::get( "error" ).$error, "", "", "error" );
				}
				$upload = new UploadFile( );
				$upload->set( "default_dir", ATTACH_ACTIVITY );
				$result = $upload->upfile( "activity_banner" );
				if ( !$result )
				{
						showmessage( $upload->error );
				}
				$input = array( );
				$input['activity_title'] = trim( $_POST['activity_title'] );
				$input['activity_type'] = "1";
				$input['activity_banner'] = $upload->file_name;
				$input['activity_style'] = trim( $_POST['activity_style'] );
				$input['activity_desc'] = trim( $_POST['activity_desc'] );
				$input['activity_sort'] = intval( trim( $_POST['activity_sort'] ) );
				$input['activity_start_date'] = strtotime( trim( $_POST['activity_start_date'] ) );
				$input['activity_end_date'] = strtotime( trim( $_POST['activity_end_date'] ) );
				$input['activity_state'] = intval( $_POST['activity_state'] );
				$activity = model( "activity" );
				$result = $activity->add( $input );
				if ( $result )
				{
						showmessage( Language::get( "activity_new_add_succ" ), "index.php?act=activity&op=activity" );
				}
				else
				{
						@unlink( BasePath.DS.ATTACH_ACTIVITY.DS.$upload->file_name );
						showmessage( Language::get( "activity_new_add_fail" ) );
				}
		}

		public function ajaxOp( )
		{
				if ( in_array( $_GET['branch'], array( "activity_title", "activity_sort" ) ) )
				{
						$activity = model( "activity" );
						$update_array = array( );
						switch ( $_GET['branch'] )
						{
						case "activity_title" :
								if ( !( trim( $_GET['value'] ) == "" ) )
								{
										break;
								}
								exit( );
						case "activity_sort" :
								if ( !( preg_match( "/^\\d+\$/", trim( $_GET['value'] ) ) <= 0 ) || !( intval( trim( $_GET['value'] ) ) < 0 ) || !( 255 < intval( trim( $_GET['value'] ) ) ) )
								{
										break;
								}
								exit( );
						default :
								exit( );
						}
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						echo "true";
				}
				else if ( $activity->update( $update_array, intval( $_GET['id'] ) ) && in_array( $_GET['branch'], array( "activity_detail_sort" ) ) )
				{
						$activity_detail = model( "activity_detail" );
						$update_array = array( );
						switch ( $_GET['branch'] )
						{
						case "activity_detail_sort" :
								if ( !( preg_match( "/^\\d+\$/", trim( $_GET['value'] ) ) <= 0 ) || !( intval( trim( $_GET['value'] ) ) < 0 ) || !( 255 < intval( trim( $_GET['value'] ) ) ) )
								{
										break;
								}
								exit( );
						default :
								exit( );
						}
						$update_array[$_GET['column']] = trim( $_GET['value'] );
						if ( $activity_detail->update( $update_array, intval( $_GET['id'] ) ) )
						{
								echo "true";
						}
				}
		}

		public function delOp( )
		{
				$id = "";
				if ( empty( $_REQUEST['activity_id'] ) )
				{
						showmessage( Language::get( "activity_del_choose_activity" ) );
				}
				if ( is_array( $_POST['activity_id'] ) )
				{
						try
						{
								foreach ( $GLOBALS['_POST']['activity_id'] as $v )
								{
										$this->delBanner( intval( $v ) );
								}
						}
						catch ( Exception $e )
						{
								showmessage( $e->getMessage( ) );
						}
						$id = "'".implode( "','", $_POST['activity_id'] )."'";
				}
				else
				{
						$this->delBanner( intval( $_GET['activity_id'] ) );
						$id = intval( $_GET['activity_id'] );
				}
				$activity = model( "activity" );
				$activity_detail = model( "activity_detail" );
				$condition_arr = array( );
				$condition_arr['activity_state'] = "0";
				$condition_arr['activity_enddate_greater_or'] = time( );
				$condition_arr['activity_id_in'] = $id;
				$activity_list = $activity->getList( $condition_arr );
				if ( empty( $activity_list ) )
				{
						showmessage( Language::get( "activity_del_succ" ) );
				}
				$id_arr = array( );
				foreach ( $activity_list as $v )
				{
						$id_arr[] = $v['activity_id'];
				}
				$id_new = "'".implode( "','", $id_arr )."'";
				if ( $activity_detail->del( $id_new ) && $activity->del( $id_new ) )
				{
						showmessage( Language::get( "activity_del_succ" ) );
				}
				showmessage( Language::get( "activity_del_fail" ) );
		}

		public function editOp( )
		{
				if ( $_POST['form_submit'] != "ok" )
				{
						if ( empty( $_GET['activity_id'] ) )
						{
								showmessage( $lang['miss_argument'] );
						}
						$activity = model( "activity" );
						$row = $activity->getOneById( intval( $_GET['activity_id'] ) );
						Tpl::output( "activity", $row );
						Tpl::showpage( "activity.edit" );
						exit( );
				}
				$obj_validate = new Validate( );
				$validate_arr[] = array(
						"input" => $_POST['activity_title'],
						"require" => "true",
						"message" => Language::get( "activity_new_title_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_start_date'],
						"require" => "true",
						"message" => Language::get( "activity_new_startdate_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_end_date'],
						"require" => "true",
						"validator" => "Compare",
						"operator" => ">",
						"to" => "{$_POST['activity_start_date']}",
						"message" => Language::get( "activity_new_enddate_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_style'],
						"require" => "true",
						"message" => Language::get( "activity_new_style_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_type'],
						"require" => "true",
						"message" => Language::get( "activity_new_type_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_desc'],
						"require" => "true",
						"message" => Language::get( "activity_new_desc_null" )
				);
				$validate_arr[] = array(
						"input" => $_POST['activity_sort'],
						"require" => "true",
						"validator" => "Range",
						"min" => 0,
						"max" => 255,
						"message" => Language::get( "activity_new_sort_error" )
				);
				$obj_validate->validateparam = $validate_arr;
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( Language::get( "error" ).$error, "", "", "error" );
				}
				$input = array( );
				if ( $_FILES['activity_banner']['name'] != "" )
				{
						$upload = new UploadFile( );
						$upload->set( "default_dir", ATTACH_ACTIVITY );
						$result = $upload->upfile( "activity_banner" );
						if ( !$result )
						{
								showmessage( $upload->error );
						}
						$input['activity_banner'] = $upload->file_name;
				}
				$input['activity_title'] = trim( $_POST['activity_title'] );
				$input['activity_type'] = trim( $_POST['activity_type'] );
				$input['activity_style'] = trim( $_POST['activity_style'] );
				$input['activity_desc'] = trim( $_POST['activity_desc'] );
				$input['activity_sort'] = intval( trim( $_POST['activity_sort'] ) );
				$input['activity_start_date'] = strtotime( trim( $_POST['activity_start_date'] ) );
				$input['activity_end_date'] = strtotime( trim( $_POST['activity_end_date'] ) );
				$input['activity_state'] = intval( $_POST['activity_state'] );
				$activity = model( "activity" );
				$row = $activity->getOneById( intval( $_POST['activity_id'] ) );
				$result = $activity->update( $input, intval( $_POST['activity_id'] ) );
				if ( $result )
				{
						if ( $_FILES['activity_banner']['name'] != "" )
						{
								@unlink( BasePath.DS.ATTACH_ACTIVITY.DS.$row['activity_banner'] );
						}
						showmessage( Language::get( "activity_edit_succ" ), "index.php?act=activity&op=activity" );
				}
				else
				{
						if ( $_FILES['activity_banner']['name'] != "" )
						{
								@unlink( BasePath.DS.ATTACH_ACTIVITY.DS.$upload->file_name );
						}
						showmessage( Language::get( "activity_edit_fail" ) );
				}
		}

		public function detailOp( )
		{
				$activity_id = intval( $_GET['id'] );
				if ( $activity_id <= 0 )
				{
						showmessage( Language::get( "miss_argument" ) );
				}
				$condition_arr = array( );
				$condition_arr['activity_id'] = $activity_id;
				if ( !empty( $_GET['searchstate'] ) )
				{
						$state = intval( $_GET['searchstate'] ) - 1;
						$condition_arr['activity_detail_state'] = "{$state}";
				}
				if ( !empty( $_GET['searchstore'] ) )
				{
						$condition_arr['store_name'] = $_GET['searchstore'];
				}
				if ( !empty( $_GET['searchgoods'] ) )
				{
						$condition_arr['item_name'] = $_GET['searchgoods'];
				}
				$condition_arr['order'] = "activity_detail.activity_detail_state asc,activity_detail.activity_detail_sort asc";
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$activitydetail_model = model( "activity_detail" );
				$list = $activitydetail_model->getList( $condition_arr, $page );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::output( "list", $list );
				Tpl::showpage( "activity_detail.index" );
		}

		public function dealOp( )
		{
				if ( empty( $_REQUEST['activity_detail_id'] ) )
				{
						showmessage( Language::get( "activity_detail_del_choose_detail" ) );
				}
				$id = "";
				if ( is_array( $_POST['activity_detail_id'] ) )
				{
						$id = "'".implode( "','", $_POST['activity_detail_id'] )."'";
				}
				else
				{
						$id = intval( $_GET['activity_detail_id'] );
				}
				$activity_detail = model( "activity_detail" );
				if ( $activity_detail->update( array(
						"activity_detail_state" => intval( $_GET['state'] )
				), $id ) )
				{
						showmessage( Language::get( "activity_detail_deal_succ" ) );
				}
				else
				{
						showmessage( Language::get( "activity_detail_deal_fail" ) );
				}
		}

		public function del_detailOp( )
		{
				if ( empty( $_REQUEST['activity_detail_id'] ) )
				{
						showmessage( Language::get( "activity_detail_del_choose_detail" ) );
				}
				$id = "";
				if ( is_array( $_POST['activity_detail_id'] ) )
				{
						$id = "'".implode( "','", $_POST['activity_detail_id'] )."'";
				}
				else
				{
						$id = "'".intval( $_GET['activity_detail_id'] )."'";
				}
				$activity_detail = model( "activity_detail" );
				$condition_arr = array( );
				$condition_arr['activity_detail_id_in'] = $id;
				$condition_arr['activity_detail_state_in'] = "'0','2'";
				if ( $activity_detail->delList( $condition_arr ) )
				{
						showmessage( Language::get( "activity_detail_del_succ" ) );
				}
				else
				{
						showmessage( Language::get( "activity_detail_del_fail" ) );
				}
		}

		private function delBanner( $id )
		{
				$activity = model( "activity" );
				$row = $activity->getOneById( $id );
				@unlink( BasePath.DS.ATTACH_ACTIVITY.DS.$row['activity_banner'] );
		}

}

?>
