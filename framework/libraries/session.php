<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Session
{

		public static function startSession( )
		{
				@ini_set( "session.cookie_domain", $GLOBALS['setting_config']['subdomain_suffix'] );
				session_save_path( BasePath.DS."cache".DS."session" );
				session_start( );
		}

		public static function destroySession( )
		{
				session_unset( );
				session_destroy( );
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
