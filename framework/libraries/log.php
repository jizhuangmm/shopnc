<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Log
{

		public static $log = array( );

		const SQL = "SQL";
		const ERR = "ERR";

		public static function record( $message, $level = self::ERR )
		{
				$now = date( "Y-m-d H:i:s" );
				self::$log[] = "[".$now."] {$level}: {$message}\r\n";
		}

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
