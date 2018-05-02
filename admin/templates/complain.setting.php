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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3> ";
echo $lang['complain_manage_title'];
echo " </h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
		else
		{
				echo "        <li><a href=\"";
				echo $menu['menu_url'];
				echo "\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"index.php?act=complain&op=complain_setting_save\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"complain_time_limit\">";
echo $lang['complain_time_limit'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"complain_time_limit\" id=\"complain_time_limit\" value=\"";
echo intval( $output['list_setting']['complain_time_limit'] ) / 86400;
echo "\" type=\"text\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['complain_time_limit_desc'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"btn_add\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//\r\n\$(document).ready(function(){\r\n    //添加按钮的单击事件\r\n    \$(\"#btn_add\").click(function(){\r\n        \$(\"#add_form\").submit();\r\n    });\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tcomplain_time_limit: {\r\n                required : true,\r\n                digits : true\r\n            }\r\n        },\r\n        messages : {\r\n      \t\tcomplain_time_limit: {\r\n       \t\t\trequired : '";
echo $lang['complain_time_limit_error'];
echo "',\r\n                digits : '";
echo $lang['complain_time_limit_error'];
echo "'\r\n\t    \t}\r\n        }\r\n\t});\r\n});\r\n</script>\r\n";
?>
