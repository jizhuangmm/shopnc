<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class voucherControl extends SystemControl
{

		private $applystate_arr = NULL;
		private $quotastate_arr = NULL;
		private $templatestate_arr = NULL;

		const SECONDS_OF_30DAY = 2592000;

	public function __construct(){
		parent::__construct();
				$FN_-2147483647;
				Language::read( "voucher" );
				if ( c( "voucher_allow" ) != 1 || c( "gold_isuse" ) != 1 || c( "points_isuse" ) != 1 )
				{
						showmessage( Language::get( "admin_voucher_unavailable" ), "index.php?act=dashboard&op=welcome" );
				}
				$this->applystate_arr = array(
						"new" => array(
								1,
								Language::get( "admin_voucher_applystate_new" )
						),
						"verify" => array(
								2,
								Language::get( "admin_voucher_applystate_verify" )
						),
						"cancel" => array(
								3,
								Language::get( "admin_voucher_applystate_cancel" )
						)
				);
				$this->quotastate_arr = array(
						"activity" => array(
								1,
								Language::get( "admin_voucher_quotastate_activity" )
						),
						"cancel" => array(
								2,
								Language::get( "admin_voucher_quotastate_cancel" )
						),
						"expire" => array(
								3,
								Language::get( "admin_voucher_quotastate_expire" )
						)
				);
				$this->templatestate_arr = array(
						"usable" => array(
								1,
								Language::get( "admin_voucher_templatestate_usable" )
						),
						"disabled" => array(
								2,
								Language::get( "admin_voucher_templatestate_disabled" )
						)
				);
				Tpl::output( "applystate_arr", $this->applystate_arr );
				Tpl::output( "quotastate_arr", $this->quotastate_arr );
				Tpl::output( "templatestate_arr", $this->templatestate_arr );
		}

		public function indexOp( )
		{
				$this->applylistOp( );
		}

		public function settingOp( )
		{
				$setting_model = model( "setting" );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['promotion_voucher_price'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_setting_price_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['promotion_voucher_storetimes_limit'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_setting_storetimes_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['promotion_voucher_buyertimes_limit'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_setting_buyertimes_error" )
						);
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						if ( $error != "" )
						{
								showmessage( Language::get( "error" ).$error, "", "", "error" );
						}
						$promotion_voucher_price = intval( $_POST['promotion_voucher_price'] );
						if ( $promotion_voucher_price < 0 )
						{
								$promotion_voucher_price = 20;
						}
						$promotion_voucher_storetimes_limit = intval( $_POST['promotion_voucher_storetimes_limit'] );
						if ( $promotion_voucher_storetimes_limit <= 0 )
						{
								$promotion_voucher_storetimes_limit = 20;
						}
						$promotion_voucher_buyertimes_limit = intval( $_POST['promotion_voucher_buyertimes_limit'] );
						if ( $promotion_voucher_buyertimes_limit <= 0 )
						{
								$promotion_voucher_buyertimes_limit = 5;
						}
						$update_array = array( );
						$update_array['promotion_voucher_price'] = $promotion_voucher_price;
						$update_array['promotion_voucher_storetimes_limit'] = $promotion_voucher_storetimes_limit;
						$update_array['promotion_voucher_buyertimes_limit'] = $promotion_voucher_buyertimes_limit;
						$result = $setting_model->updateSetting( $update_array );
						if ( $result )
						{
								showmessage( Language::get( "nc_common_save_succ" ), "" );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ), "" );
						}
				}
				else
				{
						$setting = $setting_model->GetListSetting( );
						$this->show_menu( "voucher", "setting" );
						Tpl::output( "setting", $setting );
						Tpl::showpage( "voucher.setting" );
				}
		}

		public function pricelistOp( )
		{
				$model = model( );
				$voucherprice_list = $model->table( "voucher_price" )->order( "voucher_price asc" )->page( 10 )->select( );
				Tpl::output( "list", $voucherprice_list );
				Tpl::output( "show_page", $model->showpage( 2 ) );
				$this->show_menu( "voucher", "pricelist" );
				Tpl::showpage( "voucher.pricelist" );
		}

		public function priceaddOp( )
		{
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['voucher_price'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_price_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['voucher_price_describe'],
								"require" => "true",
								"message" => Language::get( "admin_voucher_price_describe_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['voucher_points'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_price_points_error" )
						);
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						$voucher_price = intval( $_POST['voucher_price'] );
						$voucher_points = intval( $_POST['voucher_points'] );
						$model = model( );
						$voucherprice_info = $model->table( "voucher_price" )->where( array(
								"voucher_price" => $voucher_price
						) )->find( );
						if ( !empty( $voucherprice_info ) )
						{
								$error .= Language::get( "admin_voucher_price_exist" );
						}
						if ( $error != "" )
						{
								showmessage( $error );
						}
						else
						{
								$insert_arr = array(
										"voucher_price_describe" => trim( $_POST['voucher_price_describe'] ),
										"voucher_price" => $voucher_price,
										"voucher_defaultpoints" => $voucher_points
								);
								$rs = $model->table( "voucher_price" )->insert( $insert_arr );
								if ( $rs )
								{
										showmessage( Language::get( "nc_common_save_succ" ), "index.php?act=voucher&op=pricelist" );
								}
								else
								{
										showmessage( Language::get( "nc_common_save_fail" ), "index.php?act=voucher&op=priceadd" );
								}
						}
				}
				else
				{
						$this->show_menu( "voucher", "priceadd" );
						Tpl::showpage( "voucher.priceadd" );
				}
		}

		public function priceeditOp( )
		{
				$id = intval( $_GET['priceid'] );
				if ( $id <= 0 )
				{
						$id = intval( $_POST['priceid'] );
				}
				if ( $id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), "index.php?act=voucher&op=pricelist" );
				}
				$model = model( );
				if ( chksubmit( ) )
				{
						$obj_validate = new Validate( );
						$validate_arr[] = array(
								"input" => $_POST['voucher_price'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_price_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['voucher_price_describe'],
								"require" => "true",
								"message" => Language::get( "admin_voucher_price_describe_error" )
						);
						$validate_arr[] = array(
								"input" => $_POST['voucher_points'],
								"require" => "true",
								"validator" => "IntegerPositive",
								"message" => Language::get( "admin_voucher_price_points_error" )
						);
						$obj_validate->validateparam = $validate_arr;
						$error = $obj_validate->validate( );
						$voucher_price = intval( $_POST['voucher_price'] );
						$voucher_points = intval( $_POST['voucher_points'] );
						$voucherprice_info = $model->table( "voucher_price" )->where( array(
								"voucher_price" => $voucher_price,
								"voucher_price_id" => array(
										"neq",
										$id
								)
						) )->find( );
						if ( !empty( $voucherprice_info ) )
						{
								$error .= Language::get( "admin_voucher_price_exist" );
						}
						if ( $error != "" )
						{
								showmessage( $error, "", "", "error" );
						}
						else
						{
								$update_arr = array( );
								$update_arr['voucher_price_describe'] = trim( $_POST['voucher_price_describe'] );
								$update_arr['voucher_price'] = $voucher_price;
								$update_arr['voucher_defaultpoints'] = $voucher_points;
								$rs = $model->table( "voucher_price" )->where( array(
										"voucher_price_id" => $id
								) )->update( $update_arr );
								if ( $rs )
								{
										showmessage( Language::get( "nc_common_save_succ" ), "index.php?act=voucher&op=pricelist" );
								}
								else
								{
										showmessage( Language::get( "nc_common_save_fail" ), "index.php?act=voucher&op=pricelist" );
								}
						}
				}
				else
				{
						$voucherprice_info = $model->table( "voucher_price" )->where( array(
								"voucher_price_id" => $id
						) )->find( );
						if ( empty( $voucherprice_info ) )
						{
								showmessage( Language::get( "wrong_argument" ), "index.php?act=voucher&op=pricelist" );
						}
						Tpl::output( "info", $voucherprice_info );
						$this->show_menu( "priceedit", "priceedit" );
						Tpl::showpage( "voucher.priceadd" );
				}
		}

		public function pricedropOp( )
		{
				$voucher_price_id = trim( $_POST['voucher_price_id'] );
				if ( empty( $voucher_price_id ) )
				{
						showmessage( Language::get( "wrong_argument" ), "index.php?act=voucher&op=pricelist" );
				}
				$model = model( );
				$rs = $model->table( "voucher_price" )->where( array(
						"voucher_price_id" => array(
								"in",
								$voucher_price_id
						)
				) )->delete( );
				if ( $rs )
				{
						showmessage( Language::get( "nc_common_del_succ" ), "index.php?act=voucher&op=pricelist" );
				}
				else
				{
						showmessage( Language::get( "nc_common_del_fail" ), "index.php?act=voucher&op=pricelist" );
				}
		}

		public function applylistOp( )
		{
				$model = model( );
				$list = $model->table( "voucher_apply" )->order( "apply_state asc,apply_id asc" )->page( 10 )->select( );
				Tpl::output( "show_page", $model->showpage( 2 ) );
				$this->show_menu( "voucher", "applylist" );
				Tpl::output( "list", $list );
				Tpl::showpage( "voucher.applylist" );
		}

		public function apply_verifyOp( )
		{
				$apply_id = intval( $_POST['object_id'] );
				if ( $apply_id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), "", "", "error" );
				}
				$model = model( );
				$applyinfo = $model->table( "voucher_apply" )->where( array(
						"apply_id" => $apply_id,
						"apply_state" => $this->applystate_arr['new'][0]
				) )->find( );
				if ( empty( $applyinfo ) )
				{
						showmessage( Language::get( "wrong_argument" ), "", "", "error" );
				}
				$current_price = intval( c( "promotion_voucher_price" ) );
				$member_info = $model->table( "member" )->where( array(
						"member_id" => $applyinfo['apply_memberid']
				) )->find( );
				if ( empty( $member_info ) )
				{
						showdialog( Language::get( "nc_common_op_fail" ), "index.php?act=voucher&op=applylist" );
				}
				$apply_price = intval( $applyinfo['apply_quantity'] ) * $current_price;
				if ( intval( $member_info['member_goldnum'] ) < $apply_price )
				{
						showdialog( Language::get( "admin_voucher_apply_goldnotenough" ), "index.php?act=voucher&op=applylist" );
				}
				$update_array = array( );
				$update_array['member_goldnum'] = array(
						"exp",
						"member_goldnum - ".$apply_price
				);
				$update_array['member_goldnumminus'] = array(
						"exp",
						"member_goldnumminus + ".$apply_price
				);
				$result = $model->table( "member" )->where( array(
						"member_id" => $applyinfo['apply_memberid']
				) )->update( $update_array );
				if ( !$result )
				{
						showdialog( Language::get( "nc_common_op_fail" ), "index.php?act=voucher&op=applylist" );
				}
				$admin_info = $this->getAdminInfo( );
				$param = array( );
				$param['glog_memberid'] = $applyinfo['apply_memberid'];
				$param['glog_membername'] = $applyinfo['apply_membername'];
				$param['glog_storeid'] = $applyinfo['apply_storeid'];
				$param['glog_storename'] = $applyinfo['apply_storename'];
				$param['glog_adminid'] = $admin_info['id'];
				$param['glog_adminname'] = $admin_info['name'];
				$param['glog_goldnum'] = $apply_price;
				$param['glog_method'] = 2;
				$param['glog_addtime'] = time( );
				$param['glog_desc'] = sprintf( Language::get( "admin_voucher_apply_goldlog" ), $applyinfo['apply_quantity'], $current_price, $apply_price );
				$param['glog_stage'] = "voucher";
				$model->table( "gold_log" )->insert( $param );
				$last_quota = $model->table( "voucher_quota" )->where( array(
						"quota_storeid" => $applyinfo['apply_storeid'],
						"quota_state" => $this->quotastate_arr['activity'][0]
				) )->order( "quota_endtime desc" )->find( );
				$start_time = time( );
				if ( !empty( $last_quota ) )
				{
						$last_end_time = intval( $last_quota['quota_endtime'] ) + 1;
						if ( $start_time < $last_end_time )
						{
								$start_time = $last_end_time;
						}
				}
				$param = array( );
				$param['quota_applyid'] = $applyinfo['apply_id'];
				$param['quota_memberid'] = $applyinfo['apply_memberid'];
				$param['quota_membername'] = $applyinfo['apply_membername'];
				$param['quota_storeid'] = $applyinfo['apply_storeid'];
				$param['quota_storename'] = $applyinfo['apply_storename'];
				$param['quota_timeslimit'] = intval( c( "promotion_voucher_storetimes_limit" ) );
				$param['quota_state'] = 1;
				$apply_quantity = intval( $applyinfo['apply_quantity'] );
				$param_array = array( );
				$i = 0;
				for ( ;	$i < $apply_quantity;	++$i	)
				{
						$end_time = $start_time + self::SECONDS_OF_30DAY - 1;
						$param['quota_starttime'] = $start_time;
						$param['quota_endtime'] = $end_time;
						$param_array[] = $param;
						$start_time += self::SECONDS_OF_30DAY;
				}
				$reault = $model->table( "voucher_quota" )->insertAll( $param_array );
				if ( $reault !== TRUE )
				{
						showdialog( Language::get( "nc_common_op_fail" ), "index.php?act=voucher&op=applylist" );
				}
				$message = "";
				$result = $model->table( "voucher_apply" )->where( array(
						"apply_id" => $apply_id
				) )->update( array(
						"apply_state" => $this->applystate_arr['verify'][0]
				) );
				if ( $result )
				{
						$message = sprintf( Language::get( "admin_voucher_apply_message" ), $applyinfo['apply_quantity'], $current_price, $apply_price );
						$this->send_message( $applyinfo['apply_memberid'], $applyinfo['apply_membername'], $message );
						showmessage( Language::get( "admin_voucher_apply_verifysucc" ), "" );
				}
				else
				{
						showmessage( Language::get( "admin_voucher_apply_verifyfail" ), "", "", "error" );
				}
		}

		public function apply_cancelOp( )
		{
				$apply_id = intval( $_POST['object_id'] );
				if ( $apply_id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), "", "", "error" );
				}
				$model = model( );
				$result = $model->table( "voucher_apply" )->where( array(
						"apply_id" => $apply_id
				) )->update( array(
						"apply_state" => $this->applystate_arr['cancel'][0]
				) );
				if ( $result )
				{
						showmessage( Language::get( "admin_voucher_apply_cancelsucc" ), "" );
				}
				else
				{
						showmessage( Language::get( "admin_voucher_apply_cancelfail" ), "" );
				}
		}

		public function quotalistOp( )
		{
				$model = model( );
				$time = time( );
				$model->table( "voucher_quota" )->where( array(
						"quota_endtime" => array(
								"lt",
								$time
						),
						"quota_state" => "{$this->quotastate_arr['activity'][0]}"
				) )->update( array(
						"quota_state" => $this->quotastate_arr['expire'][0]
				) );
				$param = array( );
				if ( trim( $_GET['store_name'] ) )
				{
						$param['quota_storename'] = array(
								"like",
								"%".$_GET['store_name']."%"
						);
				}
				$state = intval( $_GET['state'] );
				if ( $state )
				{
						$param['quota_state'] = $state;
				}
				$list = $model->table( "voucher_quota" )->where( $param )->order( "quota_id desc" )->page( 10 )->select( );
				Tpl::output( "show_page", $model->showpage( 2 ) );
				$this->show_menu( "voucher", "quotalist" );
				Tpl::output( "list", $list );
				Tpl::showpage( "voucher.quotalist" );
		}

		public function quota_cancelOp( )
		{
				$quota_id = $_POST['object_id'];
				if ( empty( $quota_id ) )
				{
						showmessage( Language::get( "wrong_argument" ), "index.php?act=voucher&op=quotalist" );
				}
				$model = model( );
				$result = $model->table( "voucher_quota" )->where( array(
						"quota_id" => array(
								"in",
								$quota_id
						),
						"quota_state" => $this->quotastate_arr['activity'][0]
				) )->update( array(
						"quota_state" => $this->quotastate_arr['cancel'][0]
				) );
				if ( $result )
				{
						showmessage( Language::get( "admin_voucher_quota_cancelsucc" ), "index.php?act=voucher&op=quotalist" );
				}
				else
				{
						showmessage( Language::get( "admin_voucher_quota_cancelfail" ), "index.php?act=voucher&op=quotalist", "", "error" );
				}
		}

		private function send_message( $member_id, $member_name, $message )
		{
				$param = array( );
				$param['message_parent_id'] = 0;
				$param['from_member_id'] = 0;
				$param['to_member_id'] = $member_id;
				$param['message_title'] = "";
				$param['message_body'] = $message;
				$param['message_time'] = time( );
				$param['message_update_time'] = time( );
				$param['message_state'] = 0;
				$param['message_type'] = 1;
				$param['read_member_id'] = "";
				$param['del_member_id'] = "";
				$param['from_member_name'] = "";
				$param['to_member_name'] = $member_name;
				$model = model( );
				$model->table( "message" )->insert( $param );
		}

		public function templatelistOp( )
		{
				$model = model( );
				$param = array( );
				if ( trim( $_GET['store_name'] ) )
				{
						$param['voucher_t_storename'] = array(
								"like",
								"%".$_GET['store_name']."%"
						);
				}
				if ( trim( $_GET['sdate'] ) && trim( $_GET['edate'] ) )
				{
						$sdate = strtotime( $_GET['sdate'] );
						$edate = strtotime( $_GET['edate'] );
						$param['voucher_t_add_date'] = array(
								"between",
								"{$sdate},{$edate}"
						);
				}
				else if ( trim( $_GET['sdate'] ) )
				{
						$sdate = strtotime( $_GET['sdate'] );
						$param['voucher_t_add_date'] = array(
								"egt",
								$sdate
						);
				}
				else if ( trim( $_GET['edate'] ) )
				{
						$edate = strtotime( $_GET['edate'] );
						$param['voucher_t_add_date'] = array(
								"elt",
								$edate
						);
				}
				$state = intval( $_GET['state'] );
				if ( $state )
				{
						$param['voucher_t_state'] = $state;
				}
				$list = $model->table( "voucher_template" )->where( $param )->order( "voucher_t_state asc,voucher_t_id desc" )->page( 10 )->select( );
				Tpl::output( "show_page", $model->showpage( 2 ) );
				$this->show_menu( "voucher", "templatelist" );
				Tpl::output( "list", $list );
				Tpl::showpage( "voucher.templatelist" );
		}

		public function templateeditOp( )
		{
				$t_id = intval( $_GET['tid'] );
				if ( $t_id <= 0 )
				{
						$t_id = intval( $_POST['tid'] );
				}
				if ( $t_id <= 0 )
				{
						showmessage( Language::get( "wrong_argument" ), "index.php?act=voucher&op=templatelist", "", "error" );
				}
				$model = model( "voucher" );
				$param = array( );
				$param['voucher_t_id'] = $t_id;
				$t_info = $model->table( "voucher_template" )->where( $param )->find( );
				if ( empty( $t_info ) )
				{
						showmessage( Language::get( "wrong_argument" ), "index.php?act=voucher&op=templatelist", "html", "error" );
				}
				if ( chksubmit( ) )
				{
						$points = intval( $_POST['points'] );
						if ( $points <= 0 )
						{
								showmessage( Language::get( "admin_voucher_template_points_error" ), "", "html", "error" );
						}
						$update_arr = array( );
						$update_arr['voucher_t_points'] = $points;
						$update_arr['voucher_t_state'] = intval( $_POST['tstate'] ) == $this->templatestate_arr['usable'][0] ? $this->templatestate_arr['usable'][0] : $this->templatestate_arr['disabled'][0];
						$rs = $model->table( "voucher_template" )->where( array(
								"voucher_t_id" => $t_info['voucher_t_id']
						) )->update( $update_arr );
						if ( $rs )
						{
								showmessage( Language::get( "nc_common_save_succ" ), "index.php?act=voucher&op=templatelist", "succ" );
						}
						else
						{
								showmessage( Language::get( "nc_common_save_fail" ), "index.php?act=voucher&op=templatelist", "error" );
						}
				}
				else
				{
						if ( $t_info['voucher_t_customimg'] )
						{
						}
						if ( !file_exists( BasePath.DS.ATTACH_VOUCHER.DS.$t_info['voucher_t_store_id'].DS.$t_info['voucher_t_customimg'] ) )
						{
								$t_info['voucher_t_customimg'] = "";
						}
						else
						{
								$t_info['voucher_t_customimg'] = SiteUrl.DS.ATTACH_VOUCHER.DS.$t_info['voucher_t_store_id'].DS.$t_info['voucher_t_customimg'];
						}
						TPL::output( "t_info", $t_info );
						$this->show_menu( "templateedit", "templateedit" );
						Tpl::showpage( "voucher.templateedit" );
				}
		}

		private function show_menu( $menu_type, $menu_key = "" )
		{
				$menu_array = array( );
				switch ( $menu_type )
				{
				case "voucher" :
						$menu_array = array(
								1 => array(
										"menu_key" => "applylist",
										"menu_name" => Language::get( "admin_voucher_apply_manage" ),
										"menu_url" => "index.php?act=voucher&op=applylist"
								),
								2 => array(
										"menu_key" => "quotalist",
										"menu_name" => Language::get( "admin_voucher_quota_manage" ),
										"menu_url" => "index.php?act=voucher&op=quotalist"
								),
								3 => array(
										"menu_key" => "templatelist",
										"menu_name" => Language::get( "admin_voucher_template_manage" ),
										"menu_url" => "index.php?act=voucher&op=templatelist"
								),
								4 => array(
										"menu_key" => "setting",
										"menu_name" => Language::get( "admin_voucher_setting" ),
										"menu_url" => "index.php?act=voucher&op=setting"
								),
								5 => array(
										"menu_key" => "pricelist",
										"menu_name" => Language::get( "admin_voucher_pricemanage" ),
										"menu_url" => "index.php?act=voucher&op=pricelist"
								),
								6 => array(
										"menu_key" => "priceadd",
										"menu_name" => Language::get( "admin_voucher_priceadd" ),
										"menu_url" => "index.php?act=voucher&op=priceadd"
								)
						);
						break;
				case "priceedit" :
						$menu_array = array(
								1 => array(
										"menu_key" => "setting",
										"menu_name" => Language::get( "admin_voucher_setting" ),
										"menu_url" => "index.php?act=voucher&op=setting"
								),
								2 => array(
										"menu_key" => "pricelist",
										"menu_name" => Language::get( "admin_voucher_pricemanage" ),
										"menu_url" => "index.php?act=voucher&op=pricelist"
								),
								3 => array(
										"menu_key" => "priceedit",
										"menu_name" => Language::get( "admin_voucher_priceedit" ),
										"menu_url" => ""
								)
						);
						break;
				case "templateedit" :
						$menu_array = array(
								1 => array(
										"menu_key" => "templatelist",
										"menu_name" => Language::get( "admin_voucher_template_manage" ),
										"menu_url" => "index.php?act=voucher&op=templatelist"
								),
								2 => array(
										"menu_key" => "templateedit",
										"menu_name" => Language::get( "admin_voucher_template_edit" ),
										"menu_url" => ""
								)
						);
				}
				Tpl::output( "menu", $menu_array );
				Tpl::output( "menu_key", $menu_key );
		}

}

?>
