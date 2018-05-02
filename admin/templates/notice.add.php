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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['notice_index_member_notice'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['notice_index_send'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"notice_form\" method=\"POST\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['notice_index_send_type'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <label><input type=\"radio\" checked=\"\" value=\"1\" name=\"send_type\">";
echo $lang['notice_index_spec_member'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <label><input type=\"radio\" value=\"2\" name=\"send_type\" />";
echo $lang['notice_index_all_member'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <label><input type=\"radio\" value=\"3\" name=\"send_type\">";
echo $lang['notice_index_spec_store_grade'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <label><input type=\"radio\" value=\"4\" name=\"send_type\">";
echo $lang['notice_index_all_store'];
echo "</label>\r\n              </li>\r\n            </ul>\r\n          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"user_list\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"user_name\">";
echo $lang['notice_index_member_list'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea id=\"user_name\" name=\"user_name\" rows=\"6\" class=\"tarea\" ></textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['notice_index_member_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody style=\"display: none;\" id=\"store_grade_list\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['notice_index_store_grade'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n          \t<select multiple=\"multiple\" name=\"store_grade[]\" id=\"store_grade\">\r\n              ";
if ( is_array( $output['grade_list'] ) )
{
		echo "              ";
		foreach ( $output['grade_list'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $v['sg_id'];
				echo "\">";
				echo $v['sg_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select>\r\n          </td>\r\n          <td class=\"vatop tips\">";
echo $lang['notice_index_store_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"msg\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['notice_index_content'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"vatop rowform\"><textarea name=\"content1\" rows=\"6\" class=\"tarea\"></textarea></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#notice_form\").valid()){\r\n        \$(\"#notice_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n\$(document).ready(function(){\r\n\t\$('#notice_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        rules : { \r\n            user_name : {\r\n                required : check_user_name  \r\n            },\r\n            \"store_grade[]\":{\r\n            \trequired : check_store_grade\r\n            },\r\n            content1 :{\r\n            \trequired : true\r\n            }\r\n        },\r\n        messages : {\r\n            user_name :{\r\n                required     : '";
echo $lang['notice_index_member_error'];
echo "'\r\n            },\r\n            \"store_grade[]\":{\r\n            \trequired : '";
echo $lang['notice_index_store_grade_null'];
echo "'\r\n            },\r\n            content1 :{\r\n            \trequired : '";
echo $lang['notice_index_content_null'];
echo "'\r\n            }\r\n        },\r\n\t\tsubmitHandler: function(form) {\r\n\t\t\tform.submit();\r\n\t\t}\r\n    });\r\n    function check_user_name()\r\n    {\r\n        var rs = \$(\":input[name='send_type']:checked\").val();\r\n        return rs == 1 ? true : false; \r\n    }\r\n    function check_store_grade()\r\n    {\r\n        var rs = \$(\":input[name='send_type']:checked\").val();\r\n        return rs == 3 ? true : false; \r\n    }\r\n    \r\n    \$(\"input[name='send_type']\").click(function(){\r\n        var rs = \$(this).val();\r\n        switch(rs)\r\n        {\r\n            case '1':\r\n                \$('#user_list').show();\r\n                \$('#store_grade_list').hide();\r\n                break;\r\n            case '2':\r\n                \$('#user_list').hide();\r\n                \$('#store_grade_list').hide();\r\n                break;\r\n            case '3':\r\n                \$('#store_grade_list').show();\r\n                \$('#user_list').hide();\r\n                break;\r\n            case '4':\r\n                \$('#user_list').hide();\r\n                \$('#store_grade_list').hide();\r\n                break;\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
