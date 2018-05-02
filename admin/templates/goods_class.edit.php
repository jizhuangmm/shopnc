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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=goods_class&op=goods_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=goods_class&op=goods_class_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['goods_class_edit_prompts_one'];
echo "</li>\r\n            <li>";
echo $lang['goods_class_edit_prompts_two'];
echo "</li>\r\n            <li>";
echo $lang['goods_class_edit_prompts_three'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"goods_class_form\" name=\"goodsClassForm\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"gc_id\" value=\"";
echo $output['class_array']['gc_id'];
echo "\" />\r\n    <input type=\"hidden\" name=\"gc_parent_id\" id=\"gc_parent_id\" value=\"";
echo $output['class_array']['gc_parent_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"gc_name validation\">";
echo $lang['goods_class_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class_array']['gc_name'];
echo "\" name=\"gc_name\" id=\"gc_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"gc_name\">";
echo $lang['goods_class_add_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n          <input type=\"hidden\" name=\"t_name\" id=\"t_name\" value=\"";
echo $output['class_array']['type_name'];
echo "\" />\r\n          <input type=\"hidden\" name=\"t_sign\" id=\"t_sign\" value=\"\" />\r\n          <select name=\"t_id\" id=\"t_id\">\r\n          \t<option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n          \t";
if ( is_array( $output['type_list'] ) && !empty( $output['type_list'] ) )
{
		echo "          \t";
		foreach ( $output['type_list'] as $val )
		{
				echo "          \t<option value=\"";
				echo $val['type_id'];
				echo "\" ";
				if ( $output['class_array']['type_id'] == $val['type_id'] )
				{
						echo "selected=\"selected\"";
				}
				echo ">";
				echo $val['type_name'];
				echo "</option>\r\n          \t";
		}
		echo "          \t";
}
echo "          </select>\r\n          <div class=\" mtm\"><input type=\"checkbox\" name=\"t_associated\" value=\"1\" checked=\"checked\" id=\"t_associated\" /><label for=\"t_associated\">";
echo $lang['goods_class_edit_related_to_subclass'];
echo "</label></div>\r\n          </td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_type_desc_one'];
echo "<a onclick=\"window.parent.openItem('type,type,goods')\" href=\"JavaScript:void(0);\">";
echo $lang['nc_type_manage'];
echo "</a>";
echo $lang['goods_class_add_type_desc_two'];
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
echo " value=\"0\" type=\"radio\">\r\n          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['goods_class_index_recommended'];
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
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"gc_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['class_array']['gc_sort'] == "" ? 0 : $output['class_array']['gc_sort'];
echo "\" name=\"gc_sort\" id=\"gc_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_add_update_sort'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\t//按钮先执行验证再提交表单\r\n\t\$(\"#submitBtn\").click(function(){\r\n\t    if(\$(\"#goods_class_form\").valid()){\r\n\t     \$(\"#goods_class_form\").submit();\r\n\t\t}\r\n\t});\r\n\r\n\t\$('#t_id').change(function(){\r\n\t\t// 标记类型时候修改 修改为ok\r\n\t\tvar t_id = ";
echo $output['class_array']['type_id'];
echo ";\r\n\t\tif(t_id != \$(this).val()){\r\n\t\t\t\$('#t_sign').val('ok');\r\n\t\t}else{\r\n\t\t\t\$('#t_sign').val('');\r\n\t\t}\r\n\t\t\t\r\n\t\tif(\$(this).val() == '0'){\r\n\t\t\t\$('#t_name').val('');\r\n\t\t}else{\r\n\t\t\t\$('#t_name').val(\$(this).find('option:selected').text());\r\n\t\t}\r\n\t});\r\n\t\r\n\t\$('#goods_class_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            gc_name : {\r\n                required : true,\r\n                remote   : {                \r\n                url :'index.php?act=goods_class&op=ajax&branch=check_class_name',\r\n                type:'get',\r\n                data:{\r\n                    gc_name : function(){\r\n                        return \$('#gc_name').val();\r\n                    },\r\n                    gc_parent_id : function() {\r\n                        return \$('#gc_parent_id').val();\r\n                    },\r\n                    gc_id : '";
echo $output['class_array']['gc_id'];
echo "'\r\n                  }\r\n                }\r\n            },\r\n            gc_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n             gc_name : {\r\n                required : '";
echo $lang['goods_class_add_name_null'];
echo "',\r\n                remote   : '";
echo $lang['goods_class_add_name_exists'];
echo "'\r\n            },\r\n            gc_sort  : {\r\n                number   : '";
echo $lang['goods_class_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n\r\n    \r\n});\r\n</script>";
?>
