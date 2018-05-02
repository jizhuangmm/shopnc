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
echo "<!DOCTYPE HTML>\r\n<html>\r\n<head>\r\n<meta charset=\"";
echo CHARSET;
echo "\">\r\n<title>";
echo $output['html_title'];
echo "</title>\r\n<link href=\"";
echo TEMPLATES_PATH;
echo "/css/skin_0.css\" rel=\"stylesheet\" type=\"text/css\">\r\n</head>\r\n<body>\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_shopnc_message'];
echo "</h3>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2 msg\">\r\n    <tbody class=\"noborder\">\r\n      <tr>\r\n        <td rowspan=\"5\" class=\"msgbg\"></td>\r\n        <td class=\"tip\">";
require_once( $tpl_file );
echo "</td>\r\n      </tr>\r\n      ";
if ( $output['is_show'] == 1 )
{
		echo "      <tr>\r\n        <td class=\"tip2\">";
		echo $lang['nc_auto_redirect'];
		echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td>";
		if ( is_array( $output['url'] ) )
		{
				foreach ( $output['url'] as $k => $v )
				{
						echo "          <a href=\"";
						echo $v['url'];
						echo "\" class=\"btns\"><span>";
						echo $v['msg'];
						echo "</span></a>\r\n          ";
				}
				echo "          <script type=\"text/javascript\"> window.setTimeout(\"javascript:location.href='";
				echo $output['url'][0]['url'];
				echo "'\", ";
				echo $time;
				echo "); </script>\r\n          ";
		}
		else if ( $output['url'] != "" )
		{
				echo "          <a href=\"";
				echo $output['url'];
				echo "\" class=\"btns\"><span>";
				echo $lang['nc_back_to_pre_page'];
				echo "</span></a> \r\n          <script type=\"text/javascript\"> window.setTimeout(\"javascript:location.href='";
				echo $output['url'];
				echo "'\", ";
				echo $time;
				echo "); </script>\r\n          ";
		}
		else
		{
				echo "          <a href=\"javascript:history.back()\" class=\"btns\"><span>";
				echo $lang['nc_back_to_pre_page'];
				echo "</span></a> \r\n          <script type=\"text/javascript\"> window.setTimeout(\"javascript:history.back()\", ";
				echo $time;
				echo "); </script>\r\n          ";
		}
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n  </table>\r\n</div>\r\n</body>\r\n</html>";
?>
