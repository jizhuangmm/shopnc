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
echo $lang['store_grade'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade\" ><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"grade_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"sg_id\" value=\"";
echo $output['grade_array']['sg_id'];
echo "\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"sg_name\">";
echo $lang['store_grade_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['grade_array']['sg_name'];
echo "\" id=\"sg_name\" name=\"sg_name\" class=\"txt\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"sg_goods_limit\">";
echo $lang['allow_pubilsh_product_num'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['grade_array']['sg_goods_limit'];
echo "\" id=\"sg_goods_limit\" name=\"sg_goods_limit\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['zero_said_no_limit'];
echo "</td>\r\n        </tr>\r\n        <!--<tr><td colspan=\"2\" class=\"required\"><label> ";
echo $lang['upload_space_size'];
echo "(MB):</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['grade_array']['sg_space_limit'];
echo "\" id=\"sg_space_limit\" name=\"sg_space_limit\" class=\"txt\"></td><td class=\"vatop tips\">";
echo $lang['zero_said_no_limit'];
echo "</td>\r\n\t\t</tr>-->\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"skin_limit\">";
echo $lang['optional_template_num'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['grade_array']['sg_template_number'];
echo " <span class=\"grey\">(";
echo $lang['in_store_grade_list_set'];
echo ")</span></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"skin_limit\">";
echo $lang['additional_features'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"checkbox\" ";
if ( @in_array( "editor_multimedia", $output['grade_array']['sg_function'] ) )
{
		echo "checked=\"checked\"";
}
echo " id=\"function_editor_multimedia\" value=\"editor_multimedia\" name=\"sg_function[]\">\r\n                <label for=\"function_editor_multimedia\">";
echo $lang['editor_media_features'];
echo "</label>\r\n              </li>\r\n              <!--<li><input type=\"checkbox\"  id=\"function_coupon\" value=\"coupon\" name=\"sg_function[]\"><label for=\"function_coupon\">&nbsp;";
echo $lang['use_coupon'];
echo "</label></li>-->\r\n             <!-- \r\n              <li>\r\n                <input type=\"checkbox\" ";
if ( @in_array( "groupbuy", $output['grade_array']['sg_function'] ) )
{
		echo "checked=\"checked\"";
}
echo " id=\"function_groupbuy\" value=\"groupbuy\" name=\"sg_function[]\">\r\n                <label for=\"function_groupbuy\">";
echo $lang['groupbuy_active'];
echo "</label>\r\n              </li>\r\n              -->\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"sg_price\">";
echo $lang['charges_standard'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['grade_array']['sg_price'];
echo "\" id=\"sg_price\" name=\"sg_price\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['charges_standard_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['need_audit'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"sg_confirm1\" class=\"cb-enable ";
if ( $output['grade_array']['sg_confirm'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"sg_confirm0\" class=\"cb-disable ";
if ( $output['grade_array']['sg_confirm'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"sg_confirm1\" name=\"sg_confirm\" ";
if ( $output['grade_array']['sg_confirm'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"sg_confirm0\" name=\"sg_confirm\" ";
if ( $output['grade_array']['sg_confirm'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['need_audit_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['application_note'];
echo ":</label></td>\r\n        </tr>\r\n        <tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea id=\"sg_description\" rows=\"6\" class=\"tarea\" name=\"sg_description\">";
echo $output['grade_array']['sg_description'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['application_note_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"sg_sort\">";
echo $lang['grade_sortname'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
if ( $output['grade_array']['sg_id'] == 1 )
{
		echo "            <input type=\"text\" value=\"";
		echo $output['grade_array']['sg_sort'];
		echo "\" id=\"sg_sort\" name=\"sg_sort\" class=\"txt\" readonly=\"readonly\">\r\n            ";
}
else
{
		echo "            <input type=\"text\" value=\"";
		echo $output['grade_array']['sg_sort'];
		echo "\" id=\"sg_sort\" name=\"sg_sort\" class=\"txt\">\r\n            ";
}
echo "</td>\r\n          <td class=\"vatop tips\">";
echo $lang['grade_sort_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#grade_form\").valid()){\r\n     \$(\"#grade_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#grade_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            sg_name : {\r\n                required : true,\r\n                remote   : {\r\n                url :'index.php?act=store_grade&op=ajax&branch=check_grade_name',\r\n                type:'get',\r\n                data:{\r\n                        sg_name : function(){\r\n                        \treturn \$('#sg_name').val();\r\n                        },\r\n                        sg_id  : '";
echo $output['grade_array']['sg_id'];
echo "'\r\n                    }\r\n                }\r\n            },\r\n\t\t\tsg_price : {\r\n                required  : true\r\n            },\r\n            sg_goods_limit : {\r\n                digits  : true\r\n            },\r\n            sg_space_limit : {\r\n                digits : true\r\n            },\r\n            sg_sort : {\r\n            \trequired  : true,\r\n                digits  : true,\r\n                remote   : {\r\n\t                url :'index.php?act=store_grade&op=ajax&branch=check_grade_sort',\r\n\t                type:'get',\r\n\t                data:{\r\n\t                        sg_sort : function(){\r\n\t                        \treturn \$('#sg_sort').val();\r\n\t                        },\r\n\t                        sg_id  : '";
echo $output['grade_array']['sg_id'];
echo "'\r\n\t                    }\r\n                }\r\n            }\r\n        },\r\n        messages : {\r\n            sg_name : {\r\n                required : '";
echo $lang['store_grade_name_no_null'];
echo "',\r\n                remote   : '";
echo $lang['now_store_grade_name_is_there'];
echo "'\r\n            },\r\n\t\t\tsg_price : {\r\n                required  : \"";
echo $lang['charges_standard_no_null'];
echo "\"\r\n            },\r\n            sg_goods_limit : {\r\n                digits : '";
echo $lang['only_lnteger'];
echo "'\r\n            },\r\n            sg_space_limit : {\r\n                digits  : '";
echo $lang['only_lnteger'];
echo "'\r\n            },\r\n            sg_sort  : {\r\n            \trequired : '";
echo $lang['grade_add_sort_null_error'];
echo "',\r\n                digits   : '";
echo $lang['only_lnteger'];
echo "',\r\n                remote   : '";
echo $lang['add_gradesortexist'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
