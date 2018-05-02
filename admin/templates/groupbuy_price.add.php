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
echo "\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['groupbuy_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n          ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "          <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n          ";
		}
		else
		{
				echo "          <li><a href=\"";
				echo $menu['menu_url'];
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n          ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" action=\"index.php?act=groupbuy&op=price_save\">\r\n      <input name=\"range_id\" type=\"hidden\" value=\"";
echo $output['price_info']['range_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"range_name\" class=\"validation\">";
echo $lang['range_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['price_info']['range_name'];
echo "\" name=\"range_name\" id=\"range_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['price_range_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"range_start\" class=\"validation\">";
echo $lang['range_start'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" value=\"";
echo $output['price_info']['range_start'];
echo "\" name=\"range_start\" id=\"range_start\" class=\"txt\">\r\n        </td>\r\n          <td class=\"vatop tips\">";
echo $lang['price_range_price_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"range_end\" class=\"validation\">";
echo $lang['range_end'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" value=\"";
echo $output['price_info']['range_end'];
echo "\" name=\"range_end\" id=\"range_end\" class=\"txt\">\r\n            </td>\r\n          <td class=\"vatop tips\">";
echo $lang['price_range_price_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr>\r\n          <td colspan=\"2\"><a id=\"submit\" href=\"JavaScript:void(0);\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    \$(\"#submit\").click(function(){\r\n        \$(\"#add_form\").submit();\r\n    });\r\n\r\n\t\$('#add_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            range_name : {\r\n                required : true\r\n            },\r\n            range_start : {\r\n                required : true,\r\n                digits : true\r\n            },\r\n            range_end : {\r\n                required : true,\r\n                digits : true\r\n            }\r\n        },\r\n        messages : {\r\n            range_name : {\r\n                required :  '";
echo $lang['range_name_error'];
echo "'\r\n            },\r\n            range_start : {\r\n                required : '";
echo $lang['range_start_error'];
echo "',\r\n                digits : '";
echo $lang['range_start_error'];
echo "'\r\n            },\r\n            range_end : {\r\n                required : '";
echo $lang['range_end_error'];
echo "',\r\n                digits : '";
echo $lang['range_end_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
