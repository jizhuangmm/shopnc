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
echo $lang['member_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=member&op=member\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"user_form\" enctype=\"multipart/form-data\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_name\">";
echo $lang['member_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"member_name\" id=\"member_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_passwd\">";
echo $lang['member_edit_password'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"member_passwd\" name=\"member_passwd\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_email\">";
echo $lang['member_index_email'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"member_email\" name=\"member_email\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"member_truename\">";
echo $lang['member_index_true_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"member_truename\" name=\"member_truename\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['member_edit_sex'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul>\r\n              <li>\r\n                <label>\r\n                  <input type=\"radio\" checked=\"checked\" value=\"0\" name=\"member_sex\">\r\n                  ";
echo $lang['member_edit_secret'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <label>\r\n                  <input type=\"radio\" value=\"1\" name=\"member_sex\">\r\n                  ";
echo $lang['member_edit_male'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <label>\r\n                  <input type=\"radio\" value=\"2\" name=\"member_sex\">\r\n                  ";
echo $lang['member_edit_female'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"member_qq\">QQ:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"member_qq\" name=\"member_qq\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"\"member_msn>";
echo $lang['member_edit_wangwang'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"member_ww\" name=\"member_ww\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"member_msn\">MSN:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"member_msn\" name=\"member_msn\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_edit_pic'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"member_avatar\" name=\"member_avatar\" size=\"30\">\r\n            </span>\r\n            <input name=\"link_pic\" type=\"file\" class=\"type-file-file\" id=\"link_pic\" size=\"30\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_edit_support'];
echo "gif,jpg,jpeg,png</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#user_form\").valid()){\r\n     \$(\"#user_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(function(){\r\n    \$('#user_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n\t\t\tmember_name: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tminlength: 3,\r\n\t\t\t\tmaxlength: 20,\r\n\t\t\t\tremote   : {\r\n                    url :'index.php?act=member&op=ajax&branch=check_user_name',\r\n                    type:'get',\r\n                    data:{\r\n                        user_name : function(){\r\n                            return \$('#member_name').val();\r\n                        },\r\n                        member_id : ''\r\n                    }\r\n                }\r\n\t\t\t},\r\n            member_passwd: {\r\n                maxlength: 20,\r\n                minlength: 6\r\n            },\r\n            member_email   : {\r\n                required : true,\r\n                email : true,\r\n\t\t\t\tremote   : {\r\n                    url :'index.php?act=member&op=ajax&branch=check_email',\r\n                    type:'get',\r\n                    data:{\r\n                        user_name : function(){\r\n                            return \$('#member_email').val();\r\n                        },\r\n                        member_id : '";
echo $output['member_array']['member_id'];
echo "'\r\n                    }\r\n                }\r\n            },\r\n\t\t\tmember_qq : {\r\n\t\t\t\tdigits: true,\r\n\t\t\t\tminlength: 5,\r\n\t\t\t\tmaxlength: 11\r\n\t\t\t},\r\n\t\t\tmember_msn : {\r\n\t\t\t\temail: true\r\n\t\t\t}\r\n        },\r\n        messages : {\r\n\t\t\tmember_name: {\r\n\t\t\t\trequired : '";
echo $lang['member_add_name_null'];
echo "',\r\n\t\t\t\tmaxlength: '";
echo $lang['member_add_name_length'];
echo "',\r\n\t\t\t\tminlength: '";
echo $lang['member_add_name_length'];
echo "',\r\n\t\t\t\tremote   : '";
echo $lang['member_add_name_exists'];
echo "'\r\n\t\t\t},\r\n            member_passwd : {\r\n                maxlength: '";
echo $lang['member_edit_password_tip'];
echo "',\r\n                minlength: '";
echo $lang['member_edit_password_tip'];
echo "'\r\n            },\r\n            member_email  : {\r\n                required : '";
echo $lang['member_edit_email_null'];
echo "',\r\n                email   : '";
echo $lang['member_edit_valid_email'];
echo "',\r\n\t\t\t\tremote : '";
echo $lang['member_edit_email_exists'];
echo "'\r\n            },\r\n\t\t\tmember_qq : {\r\n\t\t\t\tdigits: '";
echo $lang['member_edit_qq_wrong'];
echo "',\r\n\t\t\t\tminlength: '";
echo $lang['member_edit_qq_wrong'];
echo "',\r\n\t\t\t\tmaxlength: '";
echo $lang['member_edit_qq_wrong'];
echo "'\r\n\t\t\t},\r\n\t\t\tmember_msn : {\r\n\t\t\t\temail:'";
echo $lang['member_edit_msn_wrong'];
echo "'\r\n\t\t\t}\r\n        }\r\n    });\r\n});\r\n\r\n\$(function(){\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#member_avatar\");\r\n    \$(\"#member_avatar\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#member_avatar\").val());\r\n    });\r\n});\r\n</script>";
?>
