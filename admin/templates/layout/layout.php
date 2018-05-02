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
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" >\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
echo CHARSET;
echo "\">\r\n<title>";
echo $output['html_title'];
echo "</title>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.validation.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/admincp.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.tooltip.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.cookie.js\"></script>\r\n<link href=\"";
echo TEMPLATES_PATH;
echo "/css/skin_0.css\" rel=\"stylesheet\" type=\"text/css\" id=\"cssfile2\" />\r\n<script type=\"text/javascript\">\r\n//换肤\r\ncookie_skin = \$.cookie(\"MyCssSkin\");\r\nif (cookie_skin) {\r\n\t\$('#cssfile2').attr(\"href\",\"";
echo TEMPLATES_PATH;
echo "/css/\"+ cookie_skin +\".css\");\r\n} \r\n</script>\r\n</head>\r\n<body>\r\n";
require_once( $tpl_file );
if ( $GLOBALS['setting_config']['debug'] == 1 )
{
		echo "<div id=\"think_page_trace\" class=\"trace\">\r\n  <fieldset id=\"querybox\">\r\n    <legend>";
		echo $lang['nc_debug_trace_title'];
		echo "</legend>\r\n    <div>\r\n      ";
		print_r( Tpl::showtrace( ) );
		echo "    </div>\r\n  </fieldset>\r\n</div>\r\n";
}
echo "<script>\r\n\$(function(){\r\n\t\$(function(){\r\n\t\t// 商品自动上下架\r\n\t\tvar COOKIE_NAME = 'goods_commodity_scanning'; \r\n\t\tvar date = new Date();\r\n\t\tdate.setTime(date.getTime() + ( 60 * 60 * 1000 ));\t// cookie过期时间  单位毫秒 默认1小时\r\n\t\tif(!\$.cookie(COOKIE_NAME)){\r\n\t\t\t\$('body').append('<iframe style=\"display:none\" src=\"";
echo SiteUrl.DS.ProjectName;
echo "/index.php?act=index&op=goods_commodity_scanning\"></iframe>');\r\n\t\t\t\$.cookie(COOKIE_NAME, 'test', { path: '/', expires: date });\r\n\t\t}\r\n\r\n\t\t\r\n\t\t// 过期店铺自动关闭，商品自动下架\r\n\t\tvar\tCOOKIE_NAME_S = 'shops_shut_down';\r\n\t\tdate.setTime(date.getTime() + ( 24 * 60 * 60 * 1000 ));\t// cookie过期时间 单位毫秒 默认1天\r\n\t\tif(!\$.cookie(COOKIE_NAME_S)){\r\n\t\t\t\$('body').append('<iframe style=\"display:none\" src=\"";
echo SiteUrl.DS.ProjectName;
echo "/index.php?act=index&op=shops_shut_down\"></iframe>');\r\n\t\t\t\$.cookie(COOKIE_NAME_S, 'test', { path: '/', expires: date});\r\n\t\t}\r\n\t});\r\n});\r\n</script>\r\n</body>\r\n</html>";
?>
