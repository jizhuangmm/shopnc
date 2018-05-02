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
echo $lang['nc_member_pointsmanage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"points_form\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['admin_points_membername'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"member_name\" id=\"member_name\" class=\"txt\" onchange=\"javascript:checkmember();\">\r\n            <input type=\"hidden\" name=\"member_id\" id=\"member_id\" value='0'/></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_index_name'];
echo "</td>\r\n        </tr>\r\n        <tr id=\"tr_memberinfo\">\r\n          <td colspan=\"2\" style=\"font-weight:bold;\" id=\"td_memberinfo\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_points_operatetype'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select id=\"operatetype\" name=\"operatetype\">\r\n              <option value=\"1\">";
echo $lang['admin_points_operatetype_add'];
echo "</option>\r\n              <option value=\"2\">";
echo $lang['admin_points_operatetype_reduce'];
echo "</option>\r\n            </select></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['admin_points_pointsnum'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"pointsnum\" name=\"pointsnum\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_index_email'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['admin_points_pointsdesc'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"pointsdesc\" rows=\"6\" class=\"tarea\"></textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_points_pointsdesc_notice'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\nfunction checkmember(){\r\n\tvar membername = \$.trim(\$(\"#member_name\").val());\r\n\tif(membername == ''){\r\n\t\t\$(\"#member_id\").val('0');\r\n\t\talert(";
echo $lang['admin_points_addmembername_error'];
echo ");\r\n\t\treturn false;\r\n\t}\r\n\t\$.getJSON(\"index.php?act=points&op=checkmember\", {'name':membername}, function(data){\r\n\t        if (data)\r\n\t        {\r\n\t\t        \$(\"#tr_memberinfo\").show();\r\n\t\t\t\tvar msg= \"";
echo $lang['admin_points_member_tip'];
echo " \"+ data.name + \"";
echo $lang['admin_points_member_tip_2'];
echo "\" + data.points;\r\n\t\t\t\t\$(\"#member_name\").val(data.name);\r\n\t\t\t\t\$(\"#member_id\").val(data.id);\r\n\t\t        \$(\"#td_memberinfo\").text(msg);\r\n\t        }\r\n\t        else\r\n\t        {\r\n\t        \t\$(\"#member_name\").val('');\r\n\t        \t\$(\"#member_id\").val('0');\r\n\t\t        alert(\"";
echo $lang['admin_points_userrecord_error'];
echo "\");\r\n\t        }\r\n\t});\r\n}\r\n\$(function(){\r\n\t\$(\"#tr_memberinfo\").hide();\r\n\t\r\n    \$('#points_form').validate({\r\n        errorPlacement: function(error, element){\r\n            \$(element).next('.field_notice').hide();\r\n            \$(element).after(error);\r\n        },\r\n        rules : {\r\n        \tmember_name: {\r\n\t\t\t\trequired : true\r\n\t\t\t},\r\n\t\t\tmember_id: {\r\n\t\t\t\trequired : true\r\n            },\r\n            pointsnum   : {\r\n                required : true,\r\n                min : 1\r\n            }\r\n        },\r\n        messages : {\r\n\t\t\tmember_name: {\r\n\t\t\t\trequired : '";
echo $lang['admin_points_addmembername_error'];
echo "'\r\n\t\t\t},\r\n\t\t\tmember_id : {\r\n\t\t\t\trequired : '";
echo $lang['admin_points_member_error_again'];
echo "'\r\n            },\r\n            pointsnum  : {\r\n                required : '";
echo $lang['admin_points_points_null_error'];
echo "',\r\n                min : '";
echo $lang['admin_points_points_min_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
