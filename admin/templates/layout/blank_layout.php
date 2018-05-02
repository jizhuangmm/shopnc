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
echo "<!doctype html>\r\n<html><head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
echo CHARSET;
echo "\">\r\n<title>";
echo $output['html_title'];
echo "</title>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.js\"></script>\r\n</head>\r\n<body>\r\n";
require_once( $tpl_file );
echo "</body>\r\n</html>";
?>
