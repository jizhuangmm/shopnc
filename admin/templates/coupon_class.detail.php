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
echo $lang['nc_coupon_class_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=coupon_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        ";
if ( $output['type'] == "add" )
{
		echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
		echo $lang['nc_new'];
		echo "</span></a></li>\r\n        ";
}
else if ( $output['type'] == "edit" )
{
		echo "        <li><a href=\"index.php?act=coupon_class&op=update\"><span>";
		echo $lang['nc_new'];
		echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
		echo $lang['nc_edit'];
		echo "</span></a> </li>\r\n        ";
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"coupon_class\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"class_id\" value=\"";
echo $output['class']['class_id'];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_name\" value=\"";
echo $output['class']['class_name'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"class_name\">";
echo $lang['coupon_class_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class']['class_name'];
echo "\" name=\"class_name\" id=\"class_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['coupon_class_name_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"class_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class']['class_sort'] ? $output['class']['class_sort'] : 0;
echo "\" name=\"class_sort\" id=\"class_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['coupon_class_sort_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_display'];
echo ":</label></td>\r\n        </tr>\r\n        ";
if ( $output['type'] == "add" )
{
		echo "        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"class_show1\" class=\"cb-enable selected\"><span>";
		echo $lang['nc_yes'];
		echo "</span></label>\r\n            <label for=\"class_show0\" class=\"cb-disable\"><span>";
		echo $lang['nc_no'];
		echo "</span></label>\r\n            <input type=\"radio\" checked=\"checked\" value=\"1\" name=\"class_show\" id=\"class_show1\">\r\n            <input type=\"radio\" value=\"0\" name=\"class_show\" id=\"class_show0\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
		echo $lang['coupon_class_show_notice'];
		echo "</span></td>\r\n        </tr>\r\n        ";
}
else if ( $output['type'] == "edit" )
{
		echo "        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"class_show1\" class=\"cb-enable ";
		if ( $output['class']['class_show'] == "1" )
		{
				echo "selected";
		}
		echo "\"><span>";
		echo $lang['nc_yes'];
		echo "</span></label>\r\n            <label for=\"class_show0\" class=\"cb-disable ";
		if ( $output['class']['class_show'] == "0" )
		{
				echo "selected";
		}
		echo "\"><span>";
		echo $lang['nc_no'];
		echo "</span></label>\r\n            <input type=\"radio\" ";
		if ( $output['class']['class_show'] == "1" )
		{
				echo "checked=\"checked\"";
		}
		echo " value=\"1\" name=\"class_show\" id=\"class_show1\">\r\n            <input type=\"radio\" ";
		if ( $output['class']['class_show'] == "0" )
		{
				echo "checked=\"checked\"";
		}
		echo " value=\"0\" name=\"class_show\" id=\"class_show0\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
		echo $lang['coupon_class_show_notice'];
		echo "</span></td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#coupon_class\").valid()){\r\n     \$(\"#coupon_class\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#coupon_class').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n           class_name : {\r\n                required : true,\r\n\t                remote   : {                \r\n\t                url :'index.php?act=coupon_class&op=ajax&branch=coupon_class_name',\r\n\t                type:'get',\r\n\t                data:{\r\n\t                    class_name : function(){\r\n\t                        return \$('#class_name').val();\r\n\t                    },\r\n\t                    old_name : function(){\r\n\t\t\t\t\t\t\treturn \$('input[name=old_name]').val() ;\r\n\t\t                }\r\n\t                  }\r\n\t                }\r\n                \r\n            },\r\n            class_sort : {\r\n                required : true,\r\n                digits   : true,\r\n                min : 0,\r\n                max : 255\r\n            }\r\n        },\r\n        messages : {\r\n            class_name : {\r\n                required : '";
echo $lang['coupon_class_name_null'];
echo "',\r\n                remote   : '";
echo $lang['coupon_class_name_error'];
echo "'\r\n            },\r\n            class_sort  : {\r\n                required   : '";
echo $lang['coupon_class_sort_null'];
echo "',\r\n                digits   : '";
echo $lang['coupon_class_sort_null'];
echo "',\r\n                min: '";
echo $lang['coupon_class_sort_min'];
echo "',\r\n                max: '";
echo $lang['coupon_class_sort_max'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
