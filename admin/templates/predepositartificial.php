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
echo $lang['nc_member_predepositmanage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=predeposit&op=predeposit\"><span>";
echo $lang['admin_predeposit_rechargelist'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=predeposit&op=cashlist\"><span>";
echo $lang['admin_predeposit_cashmanage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_predeposit_artificial'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"artificial_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_name\">";
echo $lang['admin_predeposit_membername'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"member_name\" id=\"member_name\" class=\"txt\" onchange=\"javascript:checkmember();\">\r\n            <input type=\"hidden\" name=\"member_id\" id=\"member_id\" value='0'/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr id=\"tr_memberinfo\" class=\"noborder\">\r\n          <td colspan=\"2\"  style=\"font-weight:bold;\" id=\"td_memberinfo\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_pricetype'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select id=\"pricetype\" name=\"pricetype\">\r\n              <option value=\"1\">";
echo $lang['admin_predeposit_pricetype_available'];
echo "</option>\r\n              <option value=\"2\">";
echo $lang['admin_predeposit_pricetype_freeze'];
echo "</option>\r\n            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_predeposit_artificial_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_artificial_operatetype'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select id=\"operatetype\" name=\"operatetype\">\r\n              <option value=\"1\">";
echo $lang['admin_predeposit_artificial_operatetype_add'];
echo "</option>\r\n              <option value=\"2\">";
echo $lang['admin_predeposit_artificial_operatetype_reduce'];
echo "</option>\r\n            </select></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"price\">";
echo $lang['admin_predeposit_price'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"price\" name=\"price\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_remark'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"remark\" rows=\"6\" class=\"tarea\"></textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_predeposit_cash_remark_tip2'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\nfunction checkmember(){\r\n\tvar membername = \$.trim(\$(\"#member_name\").val());\r\n\tif(membername == ''){\r\n\t\t\$(\"#member_id\").val('0');\r\n\t\talert('";
echo $lang['admin_predeposit_artificial_membernamenull_error'];
echo "');\r\n\t\treturn false;\r\n\t}\r\n\t\$.getJSON(\"index.php?act=predeposit&op=checkmember\", {'name':membername}, function(data){\r\n\t        if (data)\r\n\t        {\r\n\t\t        \$(\"#tr_memberinfo\").show();\r\n\t\t\t\tvar msg= \"";
echo $lang['admin_predeposit_artificial_member_tip_1'];
echo "\"+ data.name + \"";
echo $lang['admin_predeposit_artificial_member_tip_2'];
echo "\" + data.availableprice + \"";
echo $lang['admin_predeposit_artificial_member_tip_3'];
echo "\" + data.freezeprice;\r\n\t\t\t\t\$(\"#member_name\").val(data.name);\r\n\t\t\t\t\$(\"#member_id\").val(data.id);\r\n\t\t        \$(\"#td_memberinfo\").text(msg);\r\n\t        }\r\n\t        else\r\n\t        {\r\n\t        \t\$(\"#member_name\").val('');\r\n\t        \t\$(\"#member_id\").val('0');\r\n\t\t        alert(\"";
echo $lang['admin_predeposit_artificial_membername_error'];
echo "\");\r\n\t        }\r\n\t});\r\n}\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#artificial_form\").valid()){\r\n     \$(\"#artificial_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(function(){\r\n\t\$(\"#tr_memberinfo\").hide();\r\n\t\r\n    \$('#artificial_form').validate({\r\n         errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        rules : {\r\n        \tmember_name: {\r\n\t\t\t\trequired : true\r\n\t\t\t},\r\n\t\t\tmember_id: {\r\n\t\t\t\trequired : true\r\n            },\r\n            price   : {\r\n                required : true,\r\n                min : 1\r\n            }\r\n        },\r\n        messages : {\r\n\t\t\tmember_name: {\r\n\t\t\t\trequired : '";
echo $lang['admin_predeposit_artificial_membernamenull_error'];
echo "'\r\n\t\t\t},\r\n\t\t\tmember_id : {\r\n\t\t\t\trequired : '";
echo $lang['admin_predeposit_artificial_membername_error'];
echo "'\r\n            },\r\n            price  : {\r\n                required : '";
echo $lang['admin_predeposit_artificial_pricenull_error'];
echo "',\r\n                min : '";
echo $lang['admin_predeposit_artificial_pricemin_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
