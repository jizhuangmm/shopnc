<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
class Tpl implements BaseTpl
{

		private static $instance = NULL;
		private static $output_value = array( );
		private static $tpl_dir = "";
		private static $layout_file = "layout";

		private function __construct( )
		{
		}

		public static function getInstance( )
		{
				if ( self::$instance === NULL || !self::$instance instanceof Tpl )
				{
						self::$instance = new Tpl( );
				}
				return self::$instance;
		}

		public static function setDir( $dir )
		{
				self::$tpl_dir = $dir;
				return TRUE;
		}

		public static function setLayout( $layout )
		{
				self::$layout_file = $layout;
				return TRUE;
		}

		public static function output( $output, $input = "" )
		{
				self::getinstance( );
				self::$output_value[$output] = $input;
		}

		public static function showpage( $page_name = "", $layout = "", $time = 2000 )
		{
				self::getinstance( );
				try
				{
						if ( !empty( self::$tpl_dir ) )
						{
								$tpl_dir = self::$tpl_dir.DS;
						}
						else
						{
								$tpl_dir = DS;
						}
						if ( defined( "ProjectName" ) && ProjectName == "" )
						{
								$tpl_dir = TPL_NAME.DS.$tpl_dir;
						}
						if ( empty( $layout ) )
						{
								$layout = "layout".DS.self::$layout_file.".php";
						}
						else
						{
								$layout = "layout".DS.$layout.".php";
						}
						if ( defined( "ProjectName" ) && ProjectName != "" )
						{
								$tpl_file = BasePath.DS.ProjectName.DS."templates".DS.$tpl_dir.$page_name.".php";
								$layout_file = BasePath.DS.ProjectName.DS."templates".DS.$layout;
						}
						else
						{
								$tpl_file = BasePath.DS."templates".DS.$tpl_dir.$page_name.".php";
								$layout_file = BasePath.DS."templates".DS.TPL_NAME.DS.$layout;
						}
						if ( file_exists( $tpl_file ) )
						{
								$output = self::$output_value;
								$output['html_title'] = ( $output['html_title'] != "" ? $output['html_title']." - " : "" ).$GLOBALS['setting_config']['site_title']." - Powered by ShopNC";
								$output['ref_url'] = getreferer( );
								$output['gzip_open'] = defined( "GZIP" ) && GZIP == "1" ? GZIP : "0";
								Language::read( "common" );
								$lang = Language::getlangcontent( );
								@header( "Content-type: text/html; charset=".CHARSET );
								if ( $layout != "" )
								{
										if ( file_exists( $layout_file ) )
										{
												include_once( $layout_file );
										}
										else
										{
												$error = "Tpl ERROR:templates".DS.$layout." is not exists";
												throw new Exception( $error );
										}
								}
								include_once( $tpl_file );
						}
						else
						{
								$error = "Tpl ERROR:templates".DS.$tpl_dir.$page_name.".php is not exists";
								throw new Exception( $error );
						}
				}
				catch ( Exception $e )
				{
						showmessage( $e->getMessage( ), "", "exception" );
				}
		}

		public function showTrace( )
		{
				$trace = array( );
				$trace[Language::get( "nc_debug_current_page" )] = $_SERVER['REQUEST_URI']."<br>";
				$trace[Language::get( "nc_debug_request_time" )] = date( "Y-m-d H:i:s", $_SERVER['REQUEST_TIME'] )."<br>";
				$query_time = number_format( microtime( TRUE ) - StartTime, 3 )."s";
				$trace[Language::get( "nc_debug_execution_time" )] = $query_time."<br>";
				$trace[Language::get( "nc_debug_memory_consumption" )] = number_format( memory_get_usage( ) / 1024 / 1024, 2 )."MB<br>";
				$trace[Language::get( "nc_debug_request_method" )] = $_SERVER['REQUEST_METHOD']."<br>";
				$trace[Language::get( "nc_debug_communication_protocol" )] = $_SERVER['SERVER_PROTOCOL']."<br>";
				$trace[Language::get( "nc_debug_user_agent" )] = $_SERVER['HTTP_USER_AGENT']."<br>";
				$trace[Language::get( "nc_debug_session_id" )] = session_id( )."<br>";
				$log = Log::$log;
				$trace[Language::get( "nc_debug_logging" )] = count( $log ) ? count( $log ).Language::get( "nc_debug_logging_1" )."<br/>".implode( "<br/>", $log ) : Language::get( "nc_debug_logging_2" );
				$trace[Language::get( "nc_debug_logging" )] = $trace[Language::get( "nc_debug_logging" )]."<br>";
				$files = get_included_files( );
				$trace[Language::get( "nc_debug_load_files" )] = count( $files ).str_replace( "\n", "<br/>", substr( substr( print_r( $files, TRUE ), 7 ), 0, -2 ) )."<br>";
				return $trace;
		}

}

?>
