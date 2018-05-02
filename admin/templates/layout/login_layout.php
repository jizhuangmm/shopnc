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
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\"><head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
echo CHARSET;
echo "\">\r\n<title>";
echo $output['html_title'];
echo "</title>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/ie6.js\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.tscookie.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.validation.min.js\"></script>\r\n<link href=\"";
echo TEMPLATES_PATH;
echo "/css/login.css\" rel=\"stylesheet\" type=\"text/css\">\r\n</head>\r\n<body>\r\n";
require_once( $tpl_file );
echo "</body>\r\n</html>";
?>
