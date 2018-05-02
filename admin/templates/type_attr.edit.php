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
echo $lang['nc_type_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=type&op=type\"><span>";
echo $lang['nc_list'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=type&op=type_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a class=\"current\" href=\"JavaScript:void(0);\"><span>";
echo $lang['type_edit_type_attr_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"attr_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"attr_id\" value=\"";
echo $output['attr_info']['attr_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td class=\"required\" colspan=\"2\"><label class=\"validation\" for=\"attr_name\">";
echo $lang['type_add_attr_name'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" name=\"attr_name\" id=\"attr_name\" value=\"";
echo $output['attr_info']['attr_name'];
echo "\" /></td>\r\n          <td class=\"vatop tips\">";
echo $lang['type_attr_edit_name_desc'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td class=\"required\" colspan=\"2\"><label class=\"validation\" for=\"attr_sort\">";
echo $lang['nc_sort'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" name=\"attr_sort\" id=\"attr_sort\" value=\"";
echo $output['attr_info']['attr_sort'];
echo "\" /></td>\r\n          <td class=\"vatop tips\">";
echo $lang['type_attr_edit_sort_desc'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td class=\"required\" colspan=\"2\"><label>";
echo $lang['type_edit_type_attr_is_show'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n\t\t  <td class=\"vatop rowform onoff\"><label for=\"attr_show1\" class=\"cb-enable ";
if ( $output['attr_info']['attr_show'] == "1" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"attr_show0\" class=\"cb-disable ";
if ( $output['attr_info']['attr_show'] == "0" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"attr_show1\" name=\"attr_show\" ";
if ( $output['attr_info']['attr_show'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\" />\r\n            <input id=\"attr_show0\" name=\"attr_show\" ";
if ( $output['attr_info']['attr_show'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\" />\r\n          </td>\r\n          </tr>\r\n      </tbody>\r\n    </table>\r\n    <table class=\"table tb-type2 \">\r\n      <thead class=\"thead\">\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\">";
echo $lang['spec_add_spec_add'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <th>";
echo $lang['nc_del'];
echo "</th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['type_add_attr_value'];
echo "</th>\r\n          <th></th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"tr_model\">\r\n        <tr></tr>\r\n        ";
if ( is_array( $output['attr_value_list'] ) && !empty( $output['attr_value_list'] ) )
{
		echo "        ";
		foreach ( $output['attr_value_list'] as $val )
		{
				echo "        <tr class=\"hover edit\">\r\n          <input type=\"hidden\" nc_type=\"submit_value\" name='attr_value[";
				echo $val['attr_value_id'];
				echo "][form_submit]' value='' />\r\n          <td class=\"w48\"><input type=\"checkbox\" name=\"attr_del[";
				echo $val['attr_value_id'];
				echo "]\" value=\"";
				echo $val['attr_value_id'];
				echo "\" /></td>\r\n          <td class=\"w48 sort\"><input type=\"text\" nc_type=\"change_default_submit_value\" name=\"attr_value[";
				echo $val['attr_value_id'];
				echo "][sort]\" value=\"";
				echo $val['attr_value_sort'];
				echo "\" /></td>\r\n          <td class=\"w270 name\"><input type=\"text\" nc_type=\"change_default_submit_value\" name=\"attr_value[";
				echo $val['attr_value_id'];
				echo "][name]\" value=\"";
				echo $val['attr_value_name'];
				echo "\" /></td>\r\n          <td></td>\r\n          <td class=\"w150 align-center\"></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['spec_edit_spec_value_null'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"15\"><a class=\"btn-add marginleft\" id=\"add_type\" href=\"JavaScript:void(0);\"> <span>";
echo $lang['type_add_attr_add_one_value'];
echo "</span> </a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['type_edit_type_off_shelf'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"off_shelf1\" class=\"cb-enable\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"off_shelf0\" class=\"cb-disable selected\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"off_shelf1\" name=\"off_shelf\" value=\"1\" type=\"radio\" />\r\n            <input id=\"off_shelf0\" name=\"off_shelf\" checked=\"checked\" value=\"0\" type=\"radio\" />\r\n          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a id=\"submitBtn\" class=\"btn\" href=\"JavaScript:void(0);\"> <span>";
echo $lang['nc_submit'];
echo "</span> </a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    var i=0;\r\n\tvar tr_model = '<tr class=\"hover edit\">'+\r\n\t\t'<td class=\"w48\"></td><td class=\"w48 sort\"><input type=\"text\" name=\"attr_value[key][sort]\" value=\"0\" /></td>'+\r\n\t\t'<td class=\"w270 name\"><input type=\"text\" name=\"attr_value[key][name]\" value=\"\" /></td>'+\r\n\t\t'<td></td><td class=\"w150 align-center\"><a onclick=\"remove_tr(\$(this));\" href=\"JavaScript:void(0);\">";
echo $lang['nc_del'];
echo "</a></td>'+\r\n\t'</tr>';\r\n\t\$(\"#add_type\").click(function(){\r\n\t\t\$('#tr_model > tr:last').after(tr_model.replace(/key/g,'s_'+i));\r\n\t\t";
if ( empty( $output['attr_value_list'] ) )
{
		echo "\t\t\$('.no_data').hide();\r\n\t\t";
}
echo "\t\t\$.getScript(\"../resource/js/admincp.js\");\r\n\t\ti++;\r\n\t});\r\n\r\n\t//表单验证\r\n    \$('#attr_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tattr_name: {\r\n        \t\trequired : true,\r\n                maxlength: 10,\r\n                minlength: 1\r\n            },\r\n            attr_sort: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdigits\t : true\r\n            }\r\n        },\r\n        messages : {\r\n        \tattr_name : {\r\n            \trequired : '";
echo $lang['type_edit_type_attr_name_no_null'];
echo "',\r\n                maxlength: '";
echo $lang['type_edit_type_attr_name_max'];
echo "',\r\n                minlength: '";
echo $lang['type_edit_type_attr_name_max'];
echo "'\r\n            },\r\n            attr_sort: {\r\n\t\t\t\trequired : '";
echo $lang['type_edit_type_attr_sort_no_null'];
echo "',\r\n\t\t\t\tdigits   : '";
echo $lang['type_edit_type_attr_sort_no_digits'];
echo "'\r\n            }\r\n        }\r\n    });\r\n\r\n    //按钮先执行验证再提交表单\r\n    \$(\"#submitBtn\").click(function(){\r\n        if(\$(\"#attr_form\").valid()){\r\n        \t\$(\"#attr_form\").submit();\r\n    \t}\r\n    });\r\n\r\n    //预览图片\r\n    \$(\"input[nc_type='change_default_goods_image']\").live(\"change\", function(){\r\n\t\tvar src = getFullPath(\$(this)[0]);\r\n\t\t\$(this).parent().prev().find('.low_source').attr('src',src);\r\n\t});\r\n\r\n    \$(\"input[nc_type='change_default_goods_image']\").change(function(){\r\n\t\t\$(this).parents('tr:first').find(\"input[nc_type='submit_value']\").val('ok');\r\n\t});\r\n\r\n    \$(\"input[nc_type='change_default_submit_value']\").change(function(){\r\n    \t\$(this).parents('tr:first').find(\"input[nc_type='submit_value']\").val('ok');\r\n    });\r\n\t\r\n});\r\n\r\nfunction remove_tr(o){\r\n\to.parents('tr:first').remove();\r\n}\r\n</script> \r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\t\$('input[nc_type=\"change_default_goods_image\"]').live(\"change\", function(){\r\n\t\t\$(this).parent().find('input[class=\"type-file-text\"]').val(\$(this).val());\r\n\t});\r\n});\r\n</script> ";
?>
