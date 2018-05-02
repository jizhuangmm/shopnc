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
echo $lang['goods_class_index_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"goods_class_form\" name=\"goodsClassForm\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"gc_id\" value=\"";
echo $output['class_array']['gc_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"gc_name validation\">";
echo $lang['goods_class_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class_array']['gc_name'];
echo "\" name=\"gc_name\" id=\"gc_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_index_name'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_display'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"gc_show1\" class=\"cb-enable ";
if ( $output['class_array']['gc_show'] == "1" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"gc_show0\" class=\"cb-disable ";
if ( $output['class_array']['gc_show'] == "0" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"gc_show1\" name=\"gc_show\" ";
if ( $output['class_array']['gc_show'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"gc_show0\" name=\"gc_show\" ";
if ( $output['class_array']['gc_show'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\">\r\n           \r\n            \r\n            </td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_display_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['goods_class_index_display_in_homepage'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"gc_index_show1\" class=\"cb-enable ";
if ( $output['class_array']['gc_index_show'] == "1" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"gc_index_show0\" class=\"cb-disable ";
if ( $output['class_array']['gc_index_show'] == "0" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"gc_index_show1\" name=\"gc_index_show\" ";
if ( $output['class_array']['gc_index_show'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"gc_index_show0\" name=\"gc_index_show\" ";
if ( $output['class_array']['gc_index_show'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_display_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"gc_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class_array']['gc_sort'];
echo "\" name=\"gc_sort\" id=\"gc_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_update_sort'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\t//按钮先执行验证再提交表单\r\n\t\$(\"#submitBtn\").click(function(){\r\n\t    if(\$(\"#goods_class_form\").valid()){\r\n\t     \$(\"#goods_class_form\").submit();\r\n\t\t}\r\n\t});\r\n\r\n\t\$('#t_id').change(function(){\r\n\t\tif(\$(this).val() == '0'){\r\n\t\t\t\$('#t_name').val('');\r\n\t\t}else{\r\n\t\t\t\$('#t_name').val(\$(this).find('option:selected').text());\r\n\t\t}\r\n\t});\r\n\t\r\n\t\$('#goods_class_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            gc_name : {\r\n                required : true,\r\n                remote   : {                \r\n                url :'index.php?act=flea_class&op=ajax&branch=check_class_name',\r\n                type:'get',\r\n                data:{\r\n                    gc_name : function(){\r\n                        return \$('#gc_name').val();\r\n                    },\r\n                    gc_parent_id : function() {\r\n                        return \$('#gc_parent_id').val();\r\n                    },\r\n                    gc_id : '";
echo $output['class_array']['gc_id'];
echo "'\r\n                  }\r\n                }\r\n            },\r\n            gc_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n             gc_name : {\r\n                required : '";
echo $lang['goods_class_add_name_null'];
echo "',\r\n                remote   : '";
echo $lang['goods_class_add_name_exists'];
echo "'\r\n            },\r\n            gc_sort  : {\r\n                number   : '";
echo $lang['goods_class_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
