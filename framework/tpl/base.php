<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

interface BaseTpl
{

		public static function getInstance( );

		public static function setDir($dir);

		public static function output($output, $input);
                
		public static function showpage($page_name, $layout);
 
}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
