<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class store_gradeControl extends SystemControl{
	public function __construct(){
	parent::__construct();
				$FN_-2147483647;
				Language::read( "store_grade,store" );
		}

		public function store_gradeOp( )
		{
				$lang = Language::getlangcontent( );
				$model_grade = model( "store_grade" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !empty( $_POST['check_sg_id'] ) )
						{
								if ( is_array( $_POST['check_sg_id'] ) )
								{
										$model_store = model( "store" );
										foreach ( $GLOBALS['_POST']['check_sg_id'] as $k => $v )
										{
												$v = intval( $v );
												if ( $v == 1 )
												{
														showmessage( $lang['default_store_grade_no_del'], "index.php?act=store_grade&op=store_grade" );
												}
												if ( $this->isable_delGrade( $v ) )
												{
														$model_grade->del( $v );
												}
										}
								}
								$model_grade->setGradeCache( );
								showmessage( $lang['del_store_grade_ok'] );
						}
						else
						{
								showmessage( $lang['sel_del_store_grade'] );
						}
				}
				$condition['like_sg_name'] = trim( $_POST['like_sg_name'] );
				$condition['order'] = "sg_sort";
				$grade_list = $model_grade->getGradeList( $condition );
				Tpl::output( "like_sg_name", trim( $_POST['like_sg_name'] ) );
				Tpl::output( "grade_list", $grade_list );
				Tpl::showpage( "store_grade.index" );
		}

		public function store_grade_addOp( )
		{
				$lang = Language::getlangcontent( );
				$model_grade = model( "store_grade" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['sg_name'],
										"require" => "true",
										"message" => $lang['store_grade_name_no_null']
								),
								array(
										"input" => $_POST['sg_price'],
										"require" => "true",
										"message" => $lang['charges_standard_no_null']
								),
								array(
										"input" => $_POST['sg_goods_limit'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['allow_pubilsh_product_num_only_lnteger']
								),
								array(
										"input" => $_POST['sg_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['sort_only_lnteger']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								if ( !$this->checkGradeName( array(
										"sg_name" => trim( $_POST['sg_name'] )
								) ) )
								{
										showmessage( $lang['now_store_grade_name_is_there'] );
								}
								if ( !$this->checkGradeSort( array(
										"sg_sort" => trim( $_POST['sg_sort'] )
								) ) )
								{
										showmessage( $lang['add_gradesortexist'] );
								}
								$insert_array = array( );
								$insert_array['sg_name'] = trim( $_POST['sg_name'] );
								$insert_array['sg_goods_limit'] = trim( $_POST['sg_goods_limit'] );
								$insert_array['sg_space_limit'] = "100";
								$insert_array['sg_function'] = $_POST['sg_function'] ? implode( "|", $_POST['sg_function'] ) : "";
								$insert_array['sg_price'] = trim( $_POST['sg_price'] );
								$insert_array['sg_confirm'] = trim( $_POST['sg_confirm'] );
								$insert_array['sg_description'] = trim( $_POST['sg_description'] );
								$insert_array['sg_sort'] = trim( $_POST['sg_sort'] );
								$insert_array['sg_template'] = "default";
								$result = $model_grade->add( $insert_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=store_grade&op=store_grade_add",
														"msg" => $lang['continue_add_store_grade']
												),
												array(
														"url" => "index.php?act=store_grade&op=store_grade",
														"msg" => $lang['back_store_grade_list']
												)
										);
										$model_grade->setGradeCache( );
										showmessage( $lang['add_store_grade_ok'], $url );
								}
								else
								{
										showmessage( $lang['add_store_grade_fail'] );
								}
						}
				}
				Tpl::showpage( "store_grade.add" );
		}

		public function store_grade_editOp( )
		{
				$lang = Language::getlangcontent( );
				$model_grade = model( "store_grade" );
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( !$_POST['sg_id'] )
						{
								showmessage( $lang['grade_parameter_error'], "index.php?act=store_grade&op=store_grade" );
						}
						$obj_validate = new Validate( );
						$obj_validate->validateparam = array(
								array(
										"input" => $_POST['sg_name'],
										"require" => "true",
										"message" => $lang['store_grade_name_no_null']
								),
								array(
										"input" => $_POST['sg_price'],
										"require" => "true",
										"message" => $lang['charges_standard_no_null']
								),
								array(
										"input" => $_POST['sg_goods_limit'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['allow_pubilsh_product_num_only_lnteger']
								),
								array(
										"input" => $_POST['sg_sort'],
										"require" => "true",
										"validator" => "Number",
										"message" => $lang['sort_only_lnteger']
								)
						);
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								if ( $_POST['sg_id'] == 1 )
								{
										$GLOBALS['_POST']['sg_sort'] = 0;
								}
								if ( !$this->checkGradeName( array(
										"sg_name" => trim( $_POST['sg_name'] ),
										"sg_id" => intval( $_POST['sg_id'] )
								) ) )
								{
										showmessage( $lang['now_store_grade_name_is_there'], "index.php?act=store_grade&op=store_grade_edit&sg_id=".intval( $_POST['sg_id'] ) );
								}
								if ( !$this->checkGradeSort( array(
										"sg_sort" => trim( $_POST['sg_sort'] ),
										"sg_id" => intval( $_POST['sg_id'] )
								) ) )
								{
										showmessage( $lang['add_gradesortexist'], "index.php?act=store_grade&op=store_grade_edit&sg_id=".intval( $_POST['sg_id'] ) );
								}
								$update_array = array( );
								$update_array['sg_id'] = intval( $_POST['sg_id'] );
								$update_array['sg_name'] = trim( $_POST['sg_name'] );
								$update_array['sg_goods_limit'] = trim( $_POST['sg_goods_limit'] );
								$update_array['sg_function'] = $_POST['sg_function'] ? implode( "|", $_POST['sg_function'] ) : "";
								$update_array['sg_price'] = trim( $_POST['sg_price'] );
								$update_array['sg_confirm'] = trim( $_POST['sg_confirm'] );
								$update_array['sg_description'] = trim( $_POST['sg_description'] );
								$update_array['sg_sort'] = trim( $_POST['sg_sort'] );
								$result = $model_grade->update( $update_array );
								if ( $result )
								{
										$url = array(
												array(
														"url" => "index.php?act=store_grade&op=store_grade_add",
														"msg" => $lang['continue_add_store_grade']
												),
												array(
														"url" => "index.php?act=store_grade&op=store_grade",
														"msg" => $lang['back_store_grade_list']
												)
										);
										$model_grade->setGradeCache( );
										showmessage( $lang['update_store_grade_ok'], $url );
								}
								else
								{
										showmessage( $lang['update_store_grade_fail'] );
								}
						}
				}
				$grade_array = $model_grade->getOneGrade( intval( $_GET['sg_id'] ) );
				if ( empty( $grade_array ) )
				{
						showmessage( $lang['illegal_parameter'] );
				}
				$grade_array['sg_function'] = explode( "|", $grade_array['sg_function'] );
				Tpl::output( "grade_array", $grade_array );
				Tpl::showpage( "store_grade.edit" );
		}

		public function store_grade_delOp( )
		{
				$lang = Language::getlangcontent( );
				$model_grade = model( "store_grade" );
				if ( 0 < intval( $_GET['sg_id'] ) )
				{
						if ( $_GET['sg_id'] == 1 )
						{
								showmessage( $lang['default_store_grade_no_del'], "index.php?act=store_grade&op=store_grade" );
						}
						if ( !$this->isable_delGrade( intval( $_GET['sg_id'] ) ) )
						{
								showmessage( $lang['del_gradehavestore'], "index.php?act=store_grade&op=store_grade" );
						}
						$model_grade->del( intval( $_GET['sg_id'] ) );
						unset( $brand_array );
						$model_grade->setGradeCache( );
						showmessage( $lang['del_store_grade_ok'], "index.php?act=store_grade&op=store_grade" );
				}
				else
				{
						showmessage( $lang['del_store_grade_fail'], "index.php?act=store_grade&op=store_grade" );
				}
		}

		public function store_grade_templatesOp( )
		{
				$lang = Language::getlangcontent( );
				$model_grade = model( "store_grade" );
				if ( $_POST['form_submit'] == "ok" )
				{
						$update_array = array( );
						$update_array['sg_id'] = $_POST['sg_id'];
						if ( !in_array( "default", $_POST['template'] ) )
						{
								$GLOBALS['_POST']['template'][] = "default";
						}
						$update_array['sg_template'] = $_POST['template'] ? implode( "|", $_POST['template'] ) : "";
						$update_array['sg_template_number'] = count( $_POST['template'] );
						$result = $model_grade->update( $update_array );
						if ( $result )
						{
								$url = array(
										array(
												"url" => "index.php?act=store_grade&op=store_grade",
												"msg" => $lang['back_store_grade_list']
										)
								);
								showmessage( $lang['set_store_grade_ok'], $url );
						}
						else
						{
								showmessage( $lang['set_store_grade_fail'] );
						}
				}
				$style_data = array( );
				$style_configurl = BASE_TPL_PATH.DS."store".DS."style".DS."styleconfig.php";
				if ( file_exists( $style_configurl ) )
				{
						include_once( $style_configurl );
						if ( strtoupper( CHARSET ) == "GBK" )
						{
								$style_data = Language::getgbk( $style_data );
						}
						$dir_list = array_keys( $style_data );
				}
				$grade_array = $model_grade->getOneGrade( intval( $_GET['sg_id'] ) );
				if ( empty( $grade_array ) )
				{
						showmessage( $lang['illegal_parameter'] );
				}
				$grade_array['sg_template'] = explode( "|", $grade_array['sg_template'] );
				Tpl::output( "dir_list", $dir_list );
				Tpl::output( "grade_array", $grade_array );
				Tpl::showpage( "store_grade_template.edit" );
		}

		public function ajaxOp( )
		{
				switch ( $_GET['branch'] )
				{
				case "check_grade_name" :
						if ( $this->checkGradeName( $_GET ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				case "check_grade_sort" :
						if ( $this->checkGradeSort( $_GET ) )
						{
								echo "true";
								exit( );
						}
						echo "false";
						exit( );
				}
		}

		private function checkGradeName( $param )
		{
				$model_grade = model( "store_grade" );
				$condition['sg_name'] = $param['sg_name'];
				$condition['no_sg_id'] = $param['sg_id'];
				$list = $model_grade->getGradeList( $condition );
				if ( empty( $list ) )
				{
						return TRUE;
				}
				return FALSE;
		}

		private function checkGradeSort( $param )
		{
				$model_grade = model( "store_grade" );
				$condition = array( );
				$condition['sg_sort'] = "{$param['sg_sort']}";
				$condition['no_sg_id'] = "";
				if ( $param['sg_id'] )
				{
						$condition['no_sg_id'] = "{$param['sg_id']}";
				}
				$list = array( );
				$list = $model_grade->getGradeList( $condition );
				if ( is_array( $list ) && 0 < count( $list ) )
				{
						return FALSE;
				}
				return TRUE;
		}

		public function isable_delGrade( $sg_id )
		{
				$model_store = model( "store" );
				$count = $model_store->countStore( array(
						"grade_id" => $sg_id
				) );
				if ( 0 < $count )
				{
						return FALSE;
				}
				return TRUE;
		}

		public function store_grade_logOp( )
		{
				$condition = array( );
				if ( trim( $_GET['storename'] ) )
				{
						$condition['gl_shopname_like'] = trim( $_GET['storename'] );
				}
				if ( trim( $_GET['membername'] ) )
				{
						$condition['gl_membername_like'] = trim( $_GET['membername'] );
				}
				if ( trim( $_GET['gradename'] ) )
				{
						$condition['gl_sgname_like'] = trim( $_GET['gradename'] );
				}
				if ( $_GET['allowstate'] )
				{
						$condition['gl_allowstate'] = intval( $_GET['allowstate'] ) - 1;
				}
				$page = new Page( );
				$page->setEachNum( 10 );
				$page->setStyle( "admin" );
				$model_gradelog = model( "store_gradelog" );
				$condition['order'] = " gl_allowstate asc,gl_id desc ";
				$log_list = $model_gradelog->getLogList( $condition, $page );
				Tpl::output( "log_list", $log_list );
				Tpl::output( "page", $page->show( ) );
				Tpl::showpage( "store_grade.log" );
		}

		public function sg_logeditOp( )
		{
				if ( !$_GET['id'] )
				{
						showmessage( Language::get( "grade_parameter_error" ), "index.php?act=store_grade&op=store_grade_log" );
				}
				$model_gradelog = model( "store_gradelog" );
				$log_info = $model_gradelog->getLogInfo( array(
						"gl_id" => intval( $_GET['id'] )
				), $page );
				if ( !is_array( $log_info ) && count( $log_info ) <= 0 )
				{
						showmessage( Language::get( "record_error" ), "index.php?act=store_grade&op=store_grade_log" );
				}
				if ( $_POST['form_submit'] == "ok" )
				{
						if ( 0 < $log_info['gl_allowstate'] )
						{
								showmessage( Language::get( "grade_edit_success" ), "index.php?act=store_grade&op=store_grade_log" );
						}
						$model_grade = model( "store_grade" );
						$grade_info = $model_grade->getOneGrade( $log_info['gl_sgid'] );
						if ( !is_array( $grade_info ) && count( $grade_info ) <= 0 )
						{
								showmessage( Language::get( "grade_edit_gradeerror" ), "index.php?act=store_grade&op=store_grade" );
						}
						if ( $grade_info['sg_sort'] != $log_info['gl_sgsort'] )
						{
								showmessage( Language::get( "grade_edit_grade_same_error" ), "index.php?act=store_grade&op=store_grade" );
						}
						$store_info = $model_grade->getGradeShopList( array(
								"store_id" => $log_info['gl_shopid']
						) );
						if ( !is_array( $store_info ) && count( $store_info ) <= 0 )
						{
								showmessage( Language::get( "grade_edit_grade_store_error" ), "index.php?act=store_grade&op=store_grade_log" );
						}
						if ( $log_info['gl_sgsort'] <= $store_info[0]['sg_sort'] )
						{
								showmessage( Language::get( "grade_edit_grade_sort_error" ) );
						}
						$up_arr = array( );
						$up_arr['gl_allowstate'] = trim( $_POST['gl_state'] );
						$admininfo = $this->getAdminInfo( );
						$up_arr['gl_allowadminid'] = $admininfo['id'];
						$up_arr['gl_allowadminname'] = $admininfo['name'];
						$up_arr['gl_allowremark'] = trim( $_POST['remark'] );
						$result = $model_gradelog->updateLogOne( $up_arr, array(
								"gl_id" => $log_info['gl_id']
						) );
						if ( $result )
						{
								if ( $up_arr['gl_allowstate'] == 1 )
								{
										$model_store = model( "store" );
										$array = array( );
										$array['grade_id'] = $log_info['gl_sgid'];
										$array['store_id'] = $log_info['gl_shopid'];
										$update_state = $model_store->storeUpdate( $array );
								}
								showmessage( Language::get( "grade_edit_success" ), "index.php?act=store_grade&op=store_grade_log" );
						}
						else
						{
								showmessage( Language::get( "grade_edit_fail" ), "index.php?act=store_grade&op=store_grade_log" );
						}
				}
				Tpl::output( "log_info", $log_info );
				Tpl::showpage( "store_grade.logedit" );
		}

		public function sg_logdelOp( )
		{
				$gl_id = $_POST['check_gl_id'];
				if ( !$gl_id )
				{
						showmessage( Language::get( "grade_del_please_choose_error" ), "index.php?act=store_grade&op=store_grade_log" );
				}
				$gl_id = "'".implode( "','", $gl_id )."'";
				$model_gradelog = model( "store_gradelog" );
				$log_list = $model_gradelog->getLogList( array(
						"gl_id_in" => $gl_id,
						"gl_allowstate" => "0"
				) );
				$gl_idnew = array( );
				if ( is_array( $log_list ) && 0 < count( $log_list ) )
				{
						foreach ( $log_list as $k => $v )
						{
								$gl_idnew[] = $v['gl_id'];
						}
				}
				$result = TRUE;
				if ( is_array( $gl_idnew ) && 0 < count( $gl_idnew ) )
				{
						$result = $model_gradelog->dropLogById( $gl_idnew );
				}
				if ( $result )
				{
						showmessage( Language::get( "grade_del_success" ), "index.php?act=store_grade&op=store_grade_log" );
				}
				else
				{
						showmessage( Language::get( "grade_del_fail" ), "index.php?act=store_grade&op=store_grade_log" );
				}
		}

}

?>
