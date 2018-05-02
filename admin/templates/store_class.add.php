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
echo $lang['store_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store_class&op=store_class\"><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_class&op=store_class_export\" ><span>";
echo $lang['export'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_class&op=store_class_import\" ><span>";
echo $lang['import'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"store_class_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"sc_name\">";
echo $lang['store_class_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"sc_name\" id=\"sc_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['higher_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"sc_parent_id\" id=\"sc_parent_id\">\r\n              <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['parent_list'] ) || is_array( $output['parent_list'] ) )
{
		echo "              ";
		foreach ( $output['parent_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['sc_parent_id'] == $v['sc_id'] )
				{
						echo "selected='selected'";
				}
				echo " value=\"";
				echo $v['sc_id'];
				echo "\">";
				echo $v['sc_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['store_class_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"sc_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"255\" name=\"sc_sort\" id=\"sc_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['update_sort'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#store_class_form\").valid()){\r\n     \$(\"#store_class_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#store_class_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            sc_name : {\r\n                required : true,\r\n                remote   : {                \r\n                url :'index.php?act=store_class&op=ajax&branch=check_class_name',\r\n                type:'get',\r\n                data:{\r\n                    sc_name : function(){\r\n                        return \$('#sc_name').val();\r\n                    },\r\n                    sc_parent_id : function() {\r\n                        return \$('#sc_parent_id').val();\r\n                    },\r\n                    sc_id : ''\r\n                  }\r\n                }\r\n            },\r\n            sc_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            sc_name : {\r\n                required : '";
echo $lang['store_class_name_no_null'];
echo "',\r\n                remote   : '";
echo $lang['store_class_name_is_there'];
echo "'\r\n            },\r\n            sc_sort  : {\r\n                number   : '";
echo $lang['store_class_sort_only_number'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
