<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

defined('InShopNC') or exit('Access Invalid!');
class dashboardControl extends SystemControl{
	public function __construct(){
	parent::__construct();

				Language::read( "dashboard" );
		}

		public function welcomeOp( )
		{
				$model_admin = model( "admin" );
				$tmp = $this->getAdminInfo( );
				$condition['admin_id'] = $tmp['id'];
				$admin_info = $model_admin->infoAdmin( $condition );
				$admin_info['admin_login_time'] = date( "Y-m-d H:i:s", $admin_info['admin_login_time'] == "" ? time( ) : $admin_info['admin_login_time'] );
				require( BasePath.DS."config.ini.php" );
				if ( !empty( $config ) || is_array( $config ) )
				{
						$version = $config['version'];
						$setup_date = $config['setup_date'];
				}
				$statistics['os'] = PHP_OS;
				$statistics['web_server'] = $_SERVER['SERVER_SOFTWARE'];
				$statistics['php_version'] = PHP_VERSION;
				$statistics['sql_version'] = Db::getserverinfo( );
				$statistics['shop_version'] = $version;
				$statistics['setup_date'] = substr( $setup_date, 0, 10 );
				Tpl::output( "statistics", $statistics );
				Tpl::output( "admin_info", $admin_info );
				Tpl::showpage( "welcome" );
		}

		public function aboutusOp( )
		{
				Tpl::showpage( "aboutus" );
		}

		public function statisticsOp( )
		{
				$statistics = array( );
				$tmp_time = mktime( 0, 0, 0, date( "m" ), date( "d" ), date( "Y" ) ) - ( date( "w" ) == 0 ? 7 : date( "w" ) - 1 ) * 24 * 60 * 60;
				$param = array( );
				$param['table'] = "member";
				$param['where'] = "member_time >= '".$tmp_time."' ";
				$statistics['week_add_member'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "goods";
				$param['where'] = "goods_add_time >= '".$tmp_time."' ";
				$statistics['week_add_product'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "store";
				$param['where'] = "store_time >= '".$tmp_time."'";
				$statistics['week_add_store'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "store";
				$param['where'] = "store_time >= '".$tmp_time."' and store_audit = 0";
				$statistics['week_add_audit_store'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "order";
				$param['where'] = "add_time >= '".$tmp_time."'";
				$statistics['week_add_order_num'] = $this->getCount( $param );
				unset( $tmp_time );
				$param = array( );
				$param['table'] = "member";
				$statistics['member'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "goods";
				$statistics['goods'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "order";
				$statistics['order'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "order";
				$param['field'] = "sum(order_amount)";
				$result = Db::select( $param );
				$statistics['order_amount'] = $result[0]['sum(order_amount)'] ? $result[0]['sum(order_amount)'] : 0;
				$param = array( );
				$param['table'] = "store";
				$statistics['store'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				$param = array( );
				$param['table'] = "store";
				$param['where'] = "store_audit = 0";
				$statistics['audit_store'] = $this->getCount( $param );
				unset( $param );
				unset( $result );
				echo json_encode( $statistics );
				exit( );
		}

		public function getCount( $param_array )
		{
				$param = array( );
				$param['field'] = "count(*) as count";
				$param['table'] = $param_array['table'];
				$param['where'] = $param_array['where'];
				$result = Db::select( $param );
				return $result[0]['count'];
		}

}

?>
