<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class groupbuyControl extends SystemControl
{

		const STATE_ALL = 0;
		const STATE_VERIFY = 1;
		const STATE_CANCEL = 2;
		const STATE_PROGRESS = 3;
		const STATE_VERIFY_FAIL = 4;
		const STATE_CLOSE = 5;
		const TEMPLATE_STATE_ACTIVE = 1;
		const TEMPLATE_STATE_UNACTIVE = 2;
		const GROUP_FLAG = 1;

   public function __construct(){
       parent::__construct();
				$FN_-2147483647;
				Language::read( "groupbuy" );
				if ( $_GET['groupbuy_open'] == 1 )
				{
						return TRUE;
				}
				if ( c( "groupbuy_allow" ) != 1 )
				{
						$url = array(
								array(
										"url" => "index.php?act=dashboard&op=welcome",
										"msg" => Language::get( "accessclose" )
								),
								array(
										"url" => "index.php?act=groupbuy&op=groupbuy_template_list&groupbuy_open=1",
										"msg" => Language::get( "accessopen" )
								)
						);
						showmessage( Language::get( "admin_groupbuy_unavailable" ), $url, "html", "succ", 1, 6000 );
				}
		}

		public function indexOp( )
		{
				$this->groupbuy_template_listOp( );
		}

		public function groupbuy_template_listOp( )
		{
				if ( $_GET['groupbuy_open'] == 1 )
				{
						$model_setting = model( "setting" );
						$update_array = array( );
						$update_array['groupbuy_allow'] = 1;
						$model_setting->updateSetting( $update_array );
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model = model( "groupbuy_template" );
				$param = array( );
				$param['order'] = "template_id desc";
				$list = $model->getList( $param, $page );
				Tpl::output( "show_page", $page->show( ) );
				$this->show_menu( "groupbuy_template_list" );
				Tpl::output( "list", $list );
				Tpl::showpage( "groupbuy_template.list" );
		}

		public function groupbuy_template_addOp( )
		{
				$model = model( "groupbuy_template" );
				$max_end_time = $model->getMaxEndTime( );
				Tpl::output( "max_end_time", $max_end_time );
				$this->show_menu( "groupbuy_template_add" );
				$this->get_hour_list( );
				Tpl::showpage( "groupbuy_template.add" );
		}

		public function groupbuy_template_saveOp( )
		{
				$param = array( );
				$param['template_name'] = trim( $_POST['template_name'] );
				$param['start_time'] = strtotime( $_POST['start_time'] ) + intval( $_POST['start_time_hour'] ) * 3600;
				$param['end_time'] = strtotime( $_POST['end_time'] ) + intval( $_POST['end_time_hour'] ) * 3600;
				$param['join_end_time'] = strtotime( $_POST['join_end_time'] ) + intval( $_POST['join_end_time_hour'] ) * 3600;
				$param['state'] = self::TEMPLATE_STATE_ACTIVE;
				if ( $param['end_time'] < $param['start_time'] )
				{
						showmessage( Language::get( "end_time_error" ), "", "", "error" );
				}
				$obj_validate = new Validate( );
				$obj_validate->validateparam = array(
						array(
								"input" => $param['template_name'],
								"require" => "true",
								"message" => Language::get( "template_name_error" )
						)
				);
				$error = $obj_validate->validate( );
				if ( $error != "" )
				{
						showmessage( $error, "" );
				}
				$model = model( "groupbuy_template" );
				$max_end_time = $model->getMaxEndTime( );
				if ( $param['start_time'] < $max_end_time )
				{
						showmessage( Language::get( "start_time_overlap" ), "", "", "error" );
				}
				if ( $model->save( $param ) )
				{
						showmessage( Language::get( "groupbuy_template_add_success" ), "index.php?act=groupbuy" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_template_add_fail" ), "", "", "error" );
				}
		}

		public function groupbuy_template_dropOp( )
		{
				$template_id = trim( $_POST['template_id'] );
				if ( empty( $template_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model = model( "groupbuy_template" );
				$param = array( );
				$param['in_template_id'] = $template_id;
				if ( $model->drop( $param ) )
				{
						$model_group = model( "goods_group" );
						$model_group->drop( $param );
						showmessage( Language::get( "groupbuy_tempalte_drop_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_template_drop_fail" ), "" );
				}
		}

		public function groupbuy_template_closeOp( )
		{
				$template_id = intval( $_GET['template_id'] );
				if ( empty( $template_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				if ( $this->change_groupbuy_template_state( $template_id, self::TEMPLATE_STATE_UNACTIVE ) )
				{
						$this->change_groupbuy_state( array(
								"template_id" => $template_id
						), self::STATE_CLOSE );
						showmessage( Language::get( "groupbuy_tempalte_close_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_template_close_fail" ), "" );
				}
		}

		public function groupbuy_verify_listOp( )
		{
				$this->groupbuy_list( self::STATE_VERIFY, "groupbuy_verify" );
		}

		public function groupbuy_progress_listOp( )
		{
				$this->groupbuy_list( self::STATE_PROGRESS, "groupbuy_progress" );
		}

		public function groupbuy_close_listOp( )
		{
				$this->groupbuy_list( self::STATE_CLOSE, "groupbuy_close" );
		}

		private function groupbuy_list( $state, $flag )
		{
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$param = array( );
				$param['state'] = $state;
				$param['template_id'] = intval( $_GET['template_id'] );
				$model_goods_group = model( "goods_group" );
				$group_list = $model_goods_group->getList( $param, $page );
				$this->show_menu2( $flag, $param['template_id'] );
				$this->get_groupbuy_state_list( );
				Tpl::output( "list", $group_list );
				Tpl::output( "show_page", $page->show( ) );
				Tpl::showpage( "group.index" );
		}

		private function get_groupbuy_state_list( )
		{
				$state_list = array(
						self::STATE_ALL => Language::get( "groupbuy_state_all" ),
						self::STATE_VERIFY => Language::get( "groupbuy_state_verify" ),
						self::STATE_CANCEL => Language::get( "groupbuy_state_cancel" ),
						self::STATE_PROGRESS => Language::get( "groupbuy_state_progress" ),
						self::STATE_VERIFY_FAIL => Language::get( "groupbuy_state_fail" ),
						self::STATE_CLOSE => Language::get( "groupbuy_state_close" )
				);
				Tpl::output( "state_list", $state_list );
		}

		private function get_hour_list( )
		{
				$hour_list = array( );
				$i = 0;
				for ( ;	$i <= 23;	++$i	)
				{
						$hour_list[$i] = $i;
				}
				Tpl::output( "hour_list", $hour_list );
		}

		public function groupbuy_verify_successOp( )
		{
				$group_id = intval( $_GET['group_id'] );
				if ( empty( $group_id ) )
				{
						showmessage( Language::get( "param_error" ) );
				}
				if ( $this->change_groupbuy_state( array(
						"group_id" => $group_id
				), self::STATE_PROGRESS ) )
				{
						$model_group = model( "goods_group" );
						$group_info = $model_group->getOne( $group_id );
						$model_goods = model( "goods" );
						if ( $model_goods->updateGoods( array(
								"group_flag" => self::GROUP_FLAG
						), $group_info['goods_id'] ) )
						{
								showmessage( Language::get( "groupbuy_verify_success" ) );
						}
						else
						{
								showmessage( Language::get( "param_error" ), "" );
						}
				}
				else
				{
						showmessage( Language::get( "groupbuy_verify_fail" ) );
				}
		}

		public function groupbuy_verify_failOp( )
		{
				$group_id = intval( $_GET['group_id'] );
				if ( empty( $group_id ) )
				{
						showmessage( Language::get( "param_error" ) );
				}
				if ( $this->change_groupbuy_state( array(
						"group_id" => $group_id
				), self::STATE_VERIFY_FAIL ) )
				{
						showmessage( Language::get( "groupbuy_verify_success" ) );
				}
				else
				{
						showmessage( Language::get( "groupbuy_verify_fail" ) );
				}
		}

		public function groupbuy_closeOp( )
		{
				$group_id = intval( $_GET['group_id'] );
				if ( empty( $group_id ) )
				{
						showmessage( Language::get( "param_error" ) );
				}
				if ( $this->change_groupbuy_state( array(
						"group_id" => $group_id
				), self::STATE_CLOSE ) )
				{
						showmessage( Language::get( "groupbuy_close_success" ) );
				}
				else
				{
						showmessage( Language::get( "groupbuy_close_fail" ) );
				}
		}

		private function change_groupbuy_template_state( $template_id, $state )
		{
				$model = model( "groupbuy_template" );
				return $model->update( array(
						"state" => $state
				), array(
						"template_id" => $template_id
				) );
		}

		private function change_groupbuy_state( $condition, $state )
		{
				$model = model( "goods_group" );
				return $model->update( array(
						"state" => $state
				), $condition );
		}

		public function groupbuy_dropOp( )
		{
				$group_id = trim( $_POST['group_id'] );
				if ( empty( $group_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model = model( "goods_group" );
				$param = array( );
				$param['in_group_id'] = $group_id;
				if ( $model->drop( $param ) )
				{
						showmessage( Language::get( "nc_common_del_succ" ), "" );
				}
				else
				{
						showmessage( Language::get( "nc_common_del_fail" ), "" );
				}
		}

		public function recOp( )
		{
				$lang = Language::getlangcontent( );
				if ( empty( $_POST['group_id'] ) || !is_array( $_POST['group_id'] ) )
				{
						showmessage( Language::get( "groupbuy_recommend_choose" ) );
				}
				$id = "";
				if ( !empty( $_POST['group_id'] ) || is_array( $_POST['group_id'] ) )
				{
						$id = implode( ",", $_POST['group_id'] );
				}
				$goods = model( "goods" );
				if ( $goods->recGroup( $id ) )
				{
						showmessage( Language::get( "groupbuy_recommend_succ" ) );
				}
				else
				{
						showmessage( Language::get( "groupbuy_recommend_fail" ) );
				}
		}

		public function ajaxOp( )
		{
				$model = "";
				$update_array = array( );
				$where_array = array( );
				switch ( $_GET['branch'] )
				{
				case "class_sort" :
						$model = model( "groupbuy_class" );
						$update_array['sort'] = $_GET['value'];
						$where_array['class_id'] = $_GET['id'];
						break;
				case "class_name" :
						$model = model( "groupbuy_class" );
						$update_array['class_name'] = $_GET['value'];
						$where_array['class_id'] = $_GET['id'];
						break;
				case "area_sort" :
						$model = model( "groupbuy_area" );
						$update_array['area_sort'] = $_GET['value'];
						$where_array['area_id'] = $_GET['id'];
						break;
				case "area_name" :
						$model = model( "groupbuy_area" );
						$update_array['area_name'] = $_GET['value'];
						$where_array['area_id'] = $_GET['id'];
						break;
				case "recommended" :
						$model = model( "goods_group" );
						$update_array['recommended'] = $_GET['value'];
						$where_array['group_id'] = $_GET['id'];
				}
				if ( $model->update( $update_array, $where_array ) )
				{
						echo "true";
						exit( );
				}
				echo "false";
				exit( );
		}

		public function class_listOp( )
		{
				$model_groupbuy_class = model( "groupbuy_class" );
				$param = array( );
				$param['order'] = "sort asc";
				$groupbuy_class_list = $model_groupbuy_class->getTreeList( $param );
				$this->show_menu( "class_list" );
				Tpl::output( "list", $groupbuy_class_list );
				Tpl::showpage( "groupbuy_class.list" );
		}

		public function class_addOp( )
		{
				$model_groupbuy_class = model( "groupbuy_class" );
				$param = array( );
				$param['order'] = "sort asc";
				$param['class_parent_id'] = 0;
				$groupbuy_class_list = $model_groupbuy_class->getList( $param );
				Tpl::output( "list", $groupbuy_class_list );
				$this->show_menu( "class_add" );
				Tpl::output( "parent_id", $_GET['parent_id'] );
				Tpl::showpage( "groupbuy_class.add" );
		}

		public function class_editOp( )
		{
				$class_id = intval( $_GET['class_id'] );
				if ( empty( $class_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model_groupbuy_class = model( "groupbuy_class" );
				$class_info = $model_groupbuy_class->getOne( $class_id );
				if ( empty( $class_info ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				Tpl::output( "class_info", $class_info );
				Tpl::output( "parent_id", $class_info['class_parent_id'] );
				$param = array( );
				$param['order'] = "sort asc";
				$param['class_parent_id'] = 0;
				$groupbuy_class_list = $model_groupbuy_class->getList( $param );
				Tpl::output( "list", $groupbuy_class_list );
				$this->show_menu( "class_edit" );
				Tpl::showpage( "groupbuy_class.add" );
		}

		public function class_saveOp( )
		{
				$class_id = intval( $_POST['class_id'] );
				$param = array( );
				$param['class_name'] = trim( $_POST['input_class_name'] );
				if ( empty( $param['class_name'] ) )
				{
						showmessage( Language::get( "class_name_error" ), "" );
				}
				$param['sort'] = intval( $_POST['input_sort'] );
				$param['class_parent_id'] = intval( $_POST['input_parent_id'] );
				$model_groupbuy_class = model( "groupbuy_class" );
				if ( empty( $class_id ) )
				{
						if ( $model_groupbuy_class->save( $param ) )
						{
								showmessage( Language::get( "groupbuy_class_add_success" ), "index.php?act=groupbuy&op=class_list" );
						}
						else
						{
								showmessage( Language::get( "groupbuy_class_add_fail" ), "index.php?act=groupbuy&op=class_list" );
						}
				}
				else if ( $model_groupbuy_class->update( $param, array(
										"class_id" => $class_id
								) ) )
				{
						showmessage( Language::get( "groupbuy_class_edit_success" ), "index.php?act=groupbuy&op=class_list" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_class_edit_fail" ), "index.php?act=groupbuy&op=class_list" );
				}
		}

		public function class_dropOp( )
		{
				$class_id = trim( $_POST['class_id'] );
				if ( empty( $class_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model_groupbuy_class = model( "groupbuy_class" );
				$all_class_id = $model_groupbuy_class->getAllClassId( explode( ",", $class_id ) );
				$param = array( );
				$param['in_class_id'] = implode( ",", $all_class_id );
				if ( $model_groupbuy_class->drop( $param ) )
				{
						showmessage( Language::get( "groupbuy_class_drop_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_class_drop_fail" ), "" );
				}
		}

		public function area_listOp( )
		{
				$model_groupbuy_area = model( "groupbuy_area" );
				$param = array( );
				$param['order'] = "area_sort asc";
				$groupbuy_area_list = $model_groupbuy_area->getTreeList( $param, "", 2 );
				Tpl::output( "list", $groupbuy_area_list );
				$this->show_menu( "area_list" );
				Tpl::showpage( "groupbuy_area.list" );
		}

		public function area_addOp( )
		{
				$model_groupbuy_area = model( "groupbuy_area" );
				$param = array( );
				$param['order'] = "area_sort asc";
				$param['area_parent_id'] = 0;
				$groupbuy_area_list = $model_groupbuy_area->getTreeList( $param, "", 1 );
				Tpl::output( "list", $groupbuy_area_list );
				$this->show_menu( "area_add" );
				Tpl::output( "parent_id", $_GET['parent_id'] );
				Tpl::showpage( "groupbuy_area.add" );
		}

		public function area_editOp( )
		{
				$area_id = intval( $_GET['area_id'] );
				if ( empty( $area_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model_groupbuy_area = model( "groupbuy_area" );
				$area_info = $model_groupbuy_area->getOne( $area_id );
				if ( empty( $area_info ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				Tpl::output( "area_info", $area_info );
				Tpl::output( "parent_id", $area_info['area_parent_id'] );
				$param = array( );
				$param['order'] = "area_sort asc";
				$param['area_parent_id'] = 0;
				$groupbuy_area_list = $model_groupbuy_area->getTreeList( $param, "", 1 );
				Tpl::output( "list", $groupbuy_area_list );
				$this->show_menu( "area_edit" );
				Tpl::showpage( "groupbuy_area.add" );
		}

		public function area_saveOp( )
		{
				$area_id = intval( $_POST['area_id'] );
				$param = array( );
				$param['area_name'] = trim( $_POST['input_area_name'] );
				if ( empty( $param['area_name'] ) )
				{
						showmessage( Language::get( "area_name_error" ), "" );
				}
				$param['area_sort'] = intval( $_POST['input_area_sort'] );
				$param['area_parent_id'] = intval( $_POST['input_parent_id'] );
				$model_groupbuy_area = model( "groupbuy_area" );
				if ( empty( $area_id ) )
				{
						if ( $model_groupbuy_area->save( $param ) )
						{
								showmessage( Language::get( "groupbuy_area_add_success" ), "index.php?act=groupbuy&op=area_list" );
						}
						else
						{
								showmessage( Language::get( "groupbuy_area_add_fail" ), "index.php?act=groupbuy&op=area_list" );
						}
				}
				else if ( $model_groupbuy_area->update( $param, array(
										"area_id" => $area_id
								) ) )
				{
						showmessage( Language::get( "groupbuy_area_edit_success" ), "index.php?act=groupbuy&op=area_list" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_area_edit_fail" ), "index.php?act=groupbuy&op=area_list" );
				}
		}

		public function area_dropOp( )
		{
				$area_id = trim( $_POST['area_id'] );
				if ( empty( $area_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model_groupbuy_area = model( "groupbuy_area" );
				$all_area_id = $model_groupbuy_area->getAllAreaId( explode( ",", $area_id ) );
				$param = array( );
				$param['in_area_id'] = implode( ",", $all_area_id );
				if ( $model_groupbuy_area->drop( $param ) )
				{
						showmessage( Language::get( "groupbuy_area_drop_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_area_drop_fail" ), "" );
				}
		}

		public function price_listOp( )
		{
				$model = model( "groupbuy_price_range" );
				$groupbuy_price_list = $model->getList( );
				Tpl::output( "list", $groupbuy_price_list );
				$this->show_menu( "price_list" );
				Tpl::showpage( "groupbuy_price.list" );
		}

		public function price_addOp( )
		{
				$this->show_menu( "price_add" );
				Tpl::showpage( "groupbuy_price.add" );
		}

		public function price_editOp( )
		{
				$range_id = intval( $_GET['range_id'] );
				if ( empty( $range_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model = model( "groupbuy_price_range" );
				$price_info = $model->getOne( $range_id );
				if ( empty( $price_info ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				Tpl::output( "price_info", $price_info );
				$this->show_menu( "price_edit" );
				Tpl::showpage( "groupbuy_price.add" );
		}

		public function price_saveOp( )
		{
				$range_id = intval( $_POST['range_id'] );
				$param = array( );
				$param['range_name'] = trim( $_POST['range_name'] );
				if ( empty( $param['range_name'] ) )
				{
						showmessage( Language::get( "range_name_error" ), "" );
				}
				$param['range_start'] = intval( $_POST['range_start'] );
				$param['range_end'] = intval( $_POST['range_end'] );
				$model = model( "groupbuy_price_range" );
				if ( empty( $range_id ) )
				{
						if ( $model->save( $param ) )
						{
								showmessage( Language::get( "groupbuy_price_range_add_success" ), "index.php?act=groupbuy&op=price_list" );
						}
						else
						{
								showmessage( Language::get( "groupbuy_price_range_add_fail" ), "index.php?act=groupbuy&op=price_list" );
						}
				}
				else if ( $model->update( $param, array(
										"range_id" => $range_id
								) ) )
				{
						showmessage( Language::get( "groupbuy_price_range_edit_success" ), "index.php?act=groupbuy&op=price_list" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_price_range_edit_fail" ), "index.php?act=groupbuy&op=price_list" );
				}
		}

		public function price_dropOp( )
		{
				$range_id = trim( $_POST['range_id'] );
				if ( empty( $range_id ) )
				{
						showmessage( Language::get( "param_error" ), "" );
				}
				$model = model( "groupbuy_price_range" );
				$param = array( );
				$param['in_range_id'] = $range_id;
				if ( $model->drop( $param ) )
				{
						showmessage( Language::get( "groupbuy_price_range_drop_success" ), "" );
				}
				else
				{
						showmessage( Language::get( "groupbuy_price_range_drop_fail" ), "" );
				}
		}

		private function show_menu( $menu_key )
		{
				$menu_array = array(
						"groupbuy_template_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_template_list" ),
								"menu_url" => "index.php?act=groupbuy&op=groupbuy_template_list"
						),
						"groupbuy_template_add" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_template_add" ),
								"menu_url" => "index.php?act=groupbuy&op=groupbuy_template_add"
						),
						"class_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_class_list" ),
								"menu_url" => "index.php?act=groupbuy&op=class_list"
						),
						"class_add" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_class_add" ),
								"menu_url" => "index.php?act=groupbuy&op=class_add"
						),
						"class_edit" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_class_edit" ),
								"menu_url" => "index.php?act=groupbuy&op=class_edit"
						),
						"area_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_area_list" ),
								"menu_url" => "index.php?act=groupbuy&op=area_list"
						),
						"area_add" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_area_add" ),
								"menu_url" => "index.php?act=groupbuy&op=area_add"
						),
						"area_edit" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_area_edit" ),
								"menu_url" => "index.php?act=groupbuy&op=area_edit"
						),
						"price_list" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_price_list" ),
								"menu_url" => "index.php?act=groupbuy&op=price_list"
						),
						"price_add" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_price_add" ),
								"menu_url" => "index.php?act=groupbuy&op=price_add"
						),
						"price_edit" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_price_edit" ),
								"menu_url" => "index.php?act=groupbuy&op=price_edit"
						)
				);
				$menu_array[$menu_key]['menu_type'] = "text";
				if ( $menu_key != "class_edit" )
				{
						unset( $menu_array['class_edit'] );
				}
				switch ( $menu_key )
				{
				case "class_edit" :
						unset( $menu_array['area_edit'] );
						unset( $menu_array['price_edit'] );
						break;
				case "area_edit" :
						unset( $menu_array['class_edit'] );
						unset( $menu_array['price_edit'] );
						break;
				case "price_edit" :
						unset( $menu_array['area_edit'] );
						unset( $menu_array['class_edit'] );
						break;
						unset( $menu_array['area_edit'] );
						unset( $menu_array['class_edit'] );
						unset( $menu_array['price_edit'] );
				}
				Tpl::output( "menu", $menu_array );
		}

		private function show_menu2( $menu_key, $template_id )
		{
				$menu_array = array(
						"groupbuy_verify" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_verify" ),
								"menu_url" => "index.php?act=groupbuy&op=groupbuy_verify_list&template_id=".$template_id
						),
						"groupbuy_progress" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_progress" ),
								"menu_url" => "index.php?act=groupbuy&op=groupbuy_progress_list&template_id=".$template_id
						),
						"groupbuy_close" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_close" ),
								"menu_url" => "index.php?act=groupbuy&op=groupbuy_close_list&template_id=".$template_id
						),
						"groupbuy_back" => array(
								"menu_type" => "link",
								"menu_name" => Language::get( "groupbuy_back" ),
								"menu_url" => "index.php?act=groupbuy&op=groupbuy_template_list"
						)
				);
				$menu_array[$menu_key]['menu_type'] = "text";
				Tpl::output( "menu", $menu_array );
		}

}

?>
