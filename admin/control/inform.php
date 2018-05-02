<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class informControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "inform" );
		}

		public function indexOp( )
		{
				$this->inform_listOp( );
		}

		public function inform_listOp( )
		{
				$this->get_inform_list( 1, "inform.list", "inform_list" );
		}

		public function inform_handled_listOp( )
		{
				$this->get_inform_list( 2, "inform_handled.list", "inform_handled_list" );
		}

		private function get_inform_list( $type, $template, $op )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model_inform = model( "inform" );
				$condition = array( );
				$condition['inform_goods_name'] = trim( $_GET['input_inform_goods_name'] );
				$condition['inform_member_name'] = trim( $_GET['input_inform_member_name'] );
				$condition['inform_type'] = trim( $_GET['input_inform_type'] );
				$condition['inform_subject'] = trim( $_GET['input_inform_subject'] );
				$condition['inform_datetime_start'] = strtotime( $_GET['input_inform_datetime_start'] );
				$condition['inform_datetime_end'] = strtotime( $_GET['input_inform_datetime_end'] );
				if ( $condition['inform_datetime_end'] < $condition['inform_datetime_start'] )
				{
						showmessage( Language::get( "para_error" ), "" );
				}
				if ( $type === 1 )
				{
						$condition['order'] = "inform_id asc";
				}
				else
				{
						$condition['order'] = "inform_id desc";
				}
				$condition['inform_state'] = $type;
				$inform_list = $model_inform->getInform( $condition, $page );
				$this->show_menu( $op );
				Tpl::output( "list", $inform_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( $template );
		}

		public function inform_subject_type_listOp( )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model_inform_subject_type = model( "inform_subject_type" );
				$inform_type_list = $model_inform_subject_type->getActiveInformSubjectType( $page );
				$this->show_menu( "inform_subject_type_list" );
				Tpl::output( "list", $inform_type_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "inform_subject_type.list" );
		}

		public function inform_subject_listOp( )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model_inform_subject = model( "inform_subject" );
				$condition = array( );
				$condition['order'] = "inform_subject_id asc";
				$condition['inform_subject_type_id'] = trim( $_GET['inform_subject_type_id'] );
				$condition['inform_subject_state'] = 1;
				$inform_subject_list = $model_inform_subject->getInformSubject( $condition, $page );
				$model_inform_subject_type = model( "inform_subject_type" );
				$type_list = $model_inform_subject_type->getActiveInformSubjectType( );
				$this->show_menu( "inform_subject_list" );
				Tpl::output( "list", $inform_subject_list );
				Tpl::output( "type_list", $type_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "inform_subject.list" );
		}

		public function inform_subject_type_addOp( )
		{
				$this->show_menu( "inform_subject_type_add" );
				Tpl::showpage( "inform_subject_type.add" );
		}

		public function inform_subject_type_saveOp( )
		{
				$input['inform_type_name'] = trim( $_POST['inform_type_name'] );
				$input['inform_type_desc'] = trim( $_POST['inform_type_desc'] );
				$obj_validate = new Validate( );
				$obj_validate->validateparam = array(
						array(
								"input" => $input['inform_type_name'],
								"require" => "true",
								"validator" => "Length",
								"min" => "1",
								"max" => "50",
								"message" => Language::get( "inform_type_null" )
						),
						array(
								"input" => $input['inform_type_desc'],
								"require" => "true",
								"validator" => "Length",
								"min" => "1",
								"max" => "100",
								"message" => Language::get( "inform_type_desc_null" )
						)
				);
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( $error );
				}
				else
				{
						$input['inform_type_state'] = 1;
						$model_inform_subject_type = model( "inform_subject_type" );
						$model_inform_subject_type->saveInformSubjectType( $input );
						showmessage( Language::get( "inform_type_add_success" ), "index.php?act=inform&op=inform_subject_type_list" );
				}
		}

		public function inform_subject_type_dropOp( )
		{
				$inform_type_id = trim( $_POST['inform_type_id'] );
				if ( empty( $inform_type_id ) )
				{
						showmessage( Language::get( "para_error" ), "index.php?act=inform" );
				}
				$model_inform_subject_type = model( "inform_subject_type" );
				$update_array = array( );
				$update_array['inform_type_state'] = 2;
				$where_array = array( );
				$where_array['in_inform_type_id'] = $inform_type_id;
				$model_inform_subject_type->updateInformSubjectType( $update_array, $where_array );
				$model_inform_subject = model( "inform_subject" );
				$update_subject_array = array( );
				$update_subject_array['inform_subject_state'] = 2;
				$where_subject_array = array( );
				$where_subject_array['in_inform_subject_type_id'] = $inform_type_id;
				$model_inform_subject->updateInformSubject( $update_subject_array, $where_subject_array );
				showmessage( Language::get( "inform_type_delete_success" ), "index.php?act=inform&op=inform_subject_type_list" );
		}

		public function inform_subject_addOp( )
		{
				$model_inform_subject_type = model( "inform_subject_type" );
				$inform_type_list = $model_inform_subject_type->getActiveInformSubjectType( );
				if ( empty( $inform_type_list ) )
				{
						showmessage( Language::get( "inform_type_error" ) );
				}
				$this->show_menu( "inform_subject_add" );
				Tpl::output( "list", $inform_type_list );
				Tpl::showpage( "inform_subject.add" );
		}

		public function inform_subject_saveOp( )
		{
				list(  ) = explode( ",", trim( $_POST['inform_subject_type'] ) );
				$input['inform_subject_type_name'] = trim( $_POST['inform_subject_type'] );
				list(  ) = explode( ",", trim( $_POST['inform_subject_type'] ) );
				$input['inform_subject_type_id'] = trim( $_POST['inform_subject_type'] );
				$input['inform_subject_content'] = trim( $_POST['inform_subject_content'] );
				$obj_validate = new Validate( );
				$obj_validate->validateparam = array(
						array(
								"input" => $input['inform_subject_type_name'],
								"require" => "true",
								"validator" => "Length",
								"min" => "1",
								"max" => "50",
								"message" => Language::get( "inform_subject_null" )
						),
						array(
								"input" => $input['inform_subject_content'],
								"require" => "true",
								"validator" => "Length",
								"min" => "1",
								"max" => "50",
								"message" => Language::get( "inform_content_null" )
						),
						array(
								"input" => $input['inform_subject_type_id'],
								"require" => "true",
								"validator" => "Number",
								"message" => Language::get( "para_error" )
						)
				);
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( $error );
				}
				else
				{
						$input['inform_subject_state'] = 1;
						$model_inform_subject = model( "inform_subject" );
						$model_inform_subject->saveInformSubject( $input );
						showmessage( Language::get( "inform_subject_add_success" ), "index.php?act=inform&op=inform_subject_list" );
				}
		}

		public function inform_subject_dropOp( )
		{
				$inform_subject_id = trim( $_POST['inform_subject_id'] );
				if ( empty( $inform_subject_id ) )
				{
						showmessage( Language::get( "para_error" ), "index.php?act=inform" );
				}
				$model_inform_subject = model( "inform_subject" );
				$update_array = array( );
				$update_array['inform_subject_state'] = 2;
				$where_array = array( );
				$where_array['in_inform_subject_id'] = $inform_subject_id;
				$model_inform_subject->updateInformSubject( $update_array, $where_array );
				showmessage( Language::get( "inform_subject_delete_success" ), "index.php?act=inform&op=inform_subject_list" );
		}

		public function show_handle_pageOp( )
		{
				$this->show_menu( "inform_list" );
				$inform_id = intval( $_GET['inform_id'] );
				$inform_goods_name = urldecode( $_GET['inform_goods_name'] );
				if ( strtoupper( CHARSET ) == "GBK" )
				{
						$inform_goods_name = Language::getgbk( $inform_goods_name );
				}
				TPL::output( "inform_id", $inform_id );
				TPL::output( "inform_goods_name", $inform_goods_name );
				Tpl::showpage( "inform.handle" );
		}

		public function inform_handleOp( )
		{
				$inform_id = intval( $_POST['inform_id'] );
				$inform_handle_type = intval( $_POST['inform_handle_type'] );
				$inform_handle_message = trim( $_POST['inform_handle_message'] );
				if ( empty( $inform_id ) || empty( $inform_handle_type ) )
				{
						showmessage( Language::get( "para_error" ), "" );
				}
				$obj_validate = new Validate( );
				$obj_validate->validateparam = array(
						array(
								"input" => $inform_handle_message,
								"require" => "true",
								"validator" => "Length",
								"min" => "1",
								"max" => "100",
								"message" => Language::get( "inform_handle_message_null" )
						)
				);
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( $error );
				}
				$model_inform = model( "inform" );
				$inform_info = $model_inform->getoneInform( $inform_id );
				if ( empty( $inform_info ) || intval( $inform_info['inform_state'] ) === 2 )
				{
						showmessage( Language::get( "para_error" ) );
				}
				$update_array = array( );
				$where_array = array( );
				switch ( $inform_handle_type )
				{
				case 1 :
						$where_array['inform_id'] = $inform_id;
						break;
				case 2 :
						$where_array['inform_member_id'] = $inform_info['inform_member_id'];
						$this->denyMemberInform( $inform_info['inform_member_id'] );
						break;
				case 3 :
						$where_array['inform_id'] = $inform_id;
						$this->denyGoods( $inform_info['inform_goods_id'] );
						break;
						showmessage( Language::get( "para_error" ) );
				}
				$update_array['inform_state'] = 2;
				$update_array['inform_handle_type'] = $inform_handle_type;
				$update_array['inform_handle_message'] = $inform_handle_message;
				$update_array['inform_handle_datetime'] = time( );
				$admin_info = $this->getAdminInfo( );
				$update_array['inform_handle_member_id'] = $admin_info['id'];
				$where_array['inform_state'] = 1;
				if ( $model_inform->updateInform( $update_array, $where_array ) )
				{
						showmessage( Language::get( "inform_handle_success" ), "index.php?act=inform&op=inform_list" );
				}
				else
				{
						showmessage( Language::get( "inform_handle_fail" ) );
				}
		}

		private function denyMemberInform( $member_id )
		{
				$model_member = model( "member" );
				$param = array( );
				$param['inform_allow'] = 2;
				return $model_member->updateMember( $param, $member_id );
		}

		private function denyGoods( $goods_id )
		{
				$model_recommend = model( "recommend" );
				$model_recommend->delRecommendGoods( "", $goods_id );
				$model_goods = model( "goods" );
				$param = array( );
				$param['goods_state'] = 1;
				$param['goods_show'] = 0;
				return $model_goods->updateGoods( $param, $goods_id );
		}

		private function show_menu( $menu_key )
		{
				$menu_array = array(
						"inform_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "inform_state_unhandle" ),
								"menu_url" => "index.php?act=inform&op=inform_list"
						),
						"inform_handled_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "inform_state_handled" ),
								"menu_url" => "index.php?act=inform&op=inform_handled_list"
						),
						"inform_subject_type_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "inform_type" ),
								"menu_url" => "index.php?act=inform&op=inform_subject_type_list"
						),
						"inform_subject_type_add" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "inform_type_add" ),
								"menu_url" => "index.php?act=inform&op=inform_subject_type_add"
						),
						"inform_subject_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "inform_subject" ),
								"menu_url" => "index.php?act=inform&op=inform_subject_list"
						),
						"inform_subject_add" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "inform_subject_add" ),
								"menu_url" => "index.php?act=inform&op=inform_subject_add"
						)
				);
				$menu_array[$menu_key]['menu_type'] = "text";
				Tpl::output( "menu", $menu_array );
		}

}

?>
