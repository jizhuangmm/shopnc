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
echo "\r\n<div class=\"page\">\r\n  <form id=\"admin_form\" method=\"post\" action='index.php?act=index&op=modifypw' name=\"adminForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"old_pw\">";
echo $lang['index_modifypw_oldpw'];
echo "<!-- 原密码 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"old_pw\" name=\"old_pw\" class=\"infoTableInput\" type=\"password\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"new_pw\">";
echo $lang['index_modifypw_newpw'];
echo "<!-- 新密码 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"new_pw\" name=\"new_pw\" class=\"infoTableInput\" type=\"password\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"new_pw2\">";
echo $lang['index_modifypw_newpw2'];
echo "<!-- 确认密码-->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"new_pw2\" name=\"new_pw2\" class=\"infoTableInput\" type=\"password\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#admin_form\").valid()){\r\n     \$(\"#admin_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$(\"#admin_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \told_pw : {\r\n        \t\trequired : true\r\n            },\r\n        \tnew_pw : {\r\n                required : true,\r\n\t\t\t\tminlength: 6,\r\n\t\t\t\tmaxlength: 20\r\n            },\r\n            new_pw2 : {\r\n                required : true,\r\n\t\t\t\tminlength: 6,\r\n\t\t\t\tmaxlength: 20,\r\n\t\t\t\tequalTo: '#new_pw'\r\n            }\r\n        },\r\n        messages : {\r\n        \told_pw : {\r\n        \t\trequired : '";
echo $lang['admin_add_password_null'];
echo "'\r\n            },\r\n        \tnew_pw : {\r\n                required : '";
echo $lang['admin_add_password_null'];
echo "',\r\n\t\t\t\tminlength: '";
echo $lang['admin_add_password_max'];
echo "',\r\n\t\t\t\tmaxlength: '";
echo $lang['admin_add_password_max'];
echo "'\r\n            },\r\n            new_pw2 : {\r\n                required : '";
echo $lang['admin_add_password_null'];
echo "',\r\n\t\t\t\tminlength: '";
echo $lang['admin_add_password_max'];
echo "',\r\n\t\t\t\tmaxlength: '";
echo $lang['admin_add_password_max'];
echo "',\r\n\t\t\t\tequalTo:   '";
echo $lang['admin_edit_repeat_error'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.ipassword.js\"></script>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\t\r\n\t// to enable iPass plugin\r\n\t\$(\"input[type=password]\").iPass();\r\n});\t\r\n</script>";
?>
