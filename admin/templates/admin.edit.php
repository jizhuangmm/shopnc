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
echo $lang['admin_index_admin_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=admin&op=admin\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=admin&op=admin_add\" ><span>";
echo $lang['nc_add'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"admin_form\" method=\"post\" action='index.php?act=admin&op=admin_edit&admin_id=";
echo $output['admininfo']['admin_id'];
echo "'>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_index_username'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['admininfo']['admin_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"new_pw\">";
echo $lang['admin_edit_admin_pw'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"new_pw\" name=\"new_pw\" class=\"txt\" type=\"password\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"new_pw2\">";
echo $lang['admin_edit_admin_pw2'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"new_pw2\" name=\"new_pw2\" class=\"txt\" type=\"password\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#admin_form\").valid()){\r\n     \$(\"#admin_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$(\"#admin_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tnew_pw : {\r\n                required : true,\r\n\t\t\t\tminlength: 6,\r\n\t\t\t\tmaxlength: 20\r\n            },\r\n            new_pw2 : {\r\n                required : true,\r\n\t\t\t\tminlength: 6,\r\n\t\t\t\tmaxlength: 20,\r\n\t\t\t\tequalTo: '#new_pw'\r\n            }\r\n        },\r\n        messages : {\r\n        \tnew_pw : {\r\n                required : '";
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
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.ipassword.js\"></script>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\t\r\n\t// to enable iPass plugin\r\n\t\$(\"input[type=password]\").iPass();\r\n});\t\r\n</script>";
?>
