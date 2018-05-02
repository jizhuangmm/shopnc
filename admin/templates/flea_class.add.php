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
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_export\" ><span>";
echo $lang['goods_class_index_export'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_import\" ><span>";
echo $lang['goods_class_index_import'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"goods_class_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"gc_name\">";
echo $lang['goods_class_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"gc_name\" id=\"gc_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"parent_id\">";
echo $lang['goods_class_add_sup_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"gc_parent_id\" id=\"gc_parent_id\">\r\n              <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['parent_list'] ) || is_array( $output['parent_list'] ) )
{
		echo "              ";
		foreach ( $output['parent_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['gc_parent_id'] == $v['gc_id'] )
				{
						echo "selected='selected'";
				}
				echo " value=\"";
				echo $v['gc_id'];
				echo "\">";
				echo $v['gc_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_sup_class_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_display'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"gc_show1\" class=\"cb-enable selected\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"gc_show0\" class=\"cb-disable\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"gc_show1\" name=\"gc_show\" checked=\"checked\" value=\"1\" type=\"radio\">\r\n            <input id=\"gc_show0\" name=\"gc_show\" value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_display_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['goods_class_index_display_in_homepage'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"gc_index_show1\" class=\"cb-enable selected\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"gc_index_show0\" class=\"cb-disable\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"gc_index_show1\" name=\"gc_index_show\" checked=\"checked\" value=\"1\" type=\"radio\">\r\n            <input id=\"gc_index_show0\" name=\"gc_index_show\" value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_display_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"255\" name=\"gc_sort\" id=\"gc_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_update_sort'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr>\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\r\n\r\n\t\$(\"#submitBtn\").click(function(){\r\n\t\tif(\$(\"#goods_class_form\").valid()){\r\n\t\t\t\$(\"#goods_class_form\").submit();\r\n\t\t}\r\n\t});\r\n\t\r\n\t\$('#t_id').change(function(){\r\n\t\tif(\$(this).val() == '0'){\r\n\t\t\t\$('#t_name').val('');\r\n\t\t}else{\r\n\t\t\t\$('#t_name').val(\$(this).find('option:selected').text());\r\n\t\t}\r\n\t});\r\n\t\r\n\t\$('#goods_class_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            gc_name : {\r\n                required : true,\r\n                remote   : {                \r\n                url :'index.php?act=flea_class&op=ajax&branch=check_class_name',\r\n                type:'get',\r\n                data:{\r\n                    gc_name : function(){\r\n                        return \$('#gc_name').val();\r\n                    },\r\n                    gc_parent_id : function() {\r\n                        return \$('#gc_parent_id').val();\r\n                    },\r\n                    gc_id : ''\r\n                  }\r\n                }\r\n            },\r\n            gc_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            gc_name : {\r\n                required : '";
echo $lang['goods_class_add_name_null'];
echo "',\r\n                remote   : '";
echo $lang['goods_class_add_name_exists'];
echo "'\r\n            },\r\n            gc_sort  : {\r\n                number   : '";
echo $lang['goods_class_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
