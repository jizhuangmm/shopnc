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
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" action=\"index.php?act=groupbuy&op=area_save\">\r\n      <input name=\"area_id\" type=\"hidden\" value=\"";
echo $output['area_info']['area_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"input_area_name\" class=\"validation\">";
echo $lang['groupbuy_area_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['area_info']['area_name'];
echo "\" name=\"input_area_name\" id=\"input_area_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang[''];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"input_parent_id\">";
echo $lang['groupbuy_parent_area'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"input_parent_id\" id=\"input_parent_id\">\r\n              <option value=\"0\">";
echo $lang['groupbuy_root_area'];
echo "</option>\r\n              ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "              ";
		foreach ( $output['list'] as $val )
		{
				echo "              <option ";
				if ( $output['parent_id'] == $val['area_id'] )
				{
						echo "selected='selected'";
				}
				echo " value=\"";
				echo $val['area_id'];
				echo "\">";
				echo str_repeat( "&nbsp;&nbsp;", intval( $val['deep'] ) ).$val['area_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['groupbuy_parent_area_add_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo empty( $output['area_info'] ) ? "0" : $output['area_info']['area_sort'];
echo "\" name=\"input_area_sort\" id=\"input_area_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['sort_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr>\r\n          <td colspan=\"2\"><a id=\"submit\" href=\"JavaScript:void(0);\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    \$(\"#submit\").click(function(){\r\n        \$(\"#add_form\").submit();\r\n    });\r\n\t\$('#add_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            input_area_name : {\r\n                required : true\r\n            },\r\n            input_area_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            input_area_name: {\r\n                required : '";
echo $lang['area_name_error'];
echo "'\r\n            },\r\n            input_area_sort: {\r\n                number   : '";
echo $lang['sort_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
