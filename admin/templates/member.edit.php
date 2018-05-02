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
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=member&op=member_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"user_form\" enctype=\"multipart/form-data\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"member_id\" value=\"";
echo $output['member_array']['member_id'];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_member_avatar\" value=\"";
echo $output['member_array']['member_avatar'];
echo "\" />\r\n    <input type=\"hidden\" name=\"member_name\" value=\"";
echo $output['member_array']['member_name'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_index_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['member_array']['member_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"member_passwd\">";
echo $lang['member_edit_password'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"member_passwd\" name=\"member_passwd\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_edit_password_keep'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"member_email\">";
echo $lang['member_index_email'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['member_array']['member_email'];
echo "\" id=\"member_email\" name=\"member_email\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_index_email'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"member_truename\">";
echo $lang['member_index_true_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['member_array']['member_truename'];
echo "\" id=\"member_truename\" name=\"member_truename\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_edit_sex'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul>\r\n              <li>\r\n                <input type=\"radio\" ";
if ( $output['member_array']['member_sex'] == 0 )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"member_sex\" id=\"member_sex0\">\r\n                <label for=\"member_sex0\">";
echo $lang['member_edit_secret'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" ";
if ( $output['member_array']['member_sex'] == 1 )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"member_sex\" id=\"member_sex1\">\r\n                <label for=\"member_sex1\">";
echo $lang['member_edit_male'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" ";
if ( $output['member_array']['member_sex'] == 2 )
{
		echo "checked=\"checked\"";
}
echo " value=\"2\" name=\"member_sex\" id=\"member_sex2\">\r\n                <label for=\"member_sex2\">";
echo $lang['member_edit_female'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"member_qq\">QQ:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['member_array']['member_qq'];
echo "\" id=\"member_qq\" name=\"member_qq\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"\"member_msn>";
echo $lang['member_edit_wangwang'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['member_array']['member_ww'];
echo "\" id=\"member_ww\" name=\"member_ww\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"\"member_msn>MSN:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['member_array']['member_msn'];
echo "\" id=\"member_msn\" name=\"member_msn\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_edit_pic'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
if ( $output['member_array']['member_avatar'] != "" )
{
		echo "            <span class=\"type-file-show\"><img class=\"show_image\" src=\"";
		echo TEMPLATES_PATH;
		echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
		echo SiteUrl;
		echo "/";
		echo ATTACH_AVATAR;
		echo "/";
		echo $output['member_array']['member_avatar'];
		echo "\" onload=\"javascript:DrawImage(this,128,128);\"></div>\r\n            </span>\r\n            ";
}
echo "            <span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"member_avatar\" name=\"member_avatar\" size=\"30\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_edit_support'];
echo "gif,jpg,jpeg,png</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_index_inform'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"inform_allow1\" class=\"cb-enable ";
if ( $output['member_array']['inform_allow'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_allow'];
echo "</span></label>\r\n            <label for=\"inform_allow2\" class=\"cb-disable ";
if ( $output['member_array']['inform_allow'] == "2" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_deny'];
echo "</span></label>\r\n            <input id=\"inform_allow1\" name=\"inform_allow\" ";
if ( $output['member_array']['inform_allow'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"inform_allow2\" name=\"inform_allow\" ";
if ( $output['member_array']['inform_allow'] == "2" )
{
		echo "checked=\"checked\"";
}
echo " value=\"2\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_edit_allowbuy'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n          \t<label for=\"isbuy_1\" class=\"cb-enable ";
if ( $output['member_array']['is_buy'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_allow'];
echo "</span></label>\r\n            <label for=\"isbuy_2\" class=\"cb-disable ";
if ( $output['member_array']['is_buy'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_deny'];
echo "</span></label>\r\n            <input id=\"isbuy_1\" name=\"isbuy\" ";
if ( $output['member_array']['is_buy'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"isbuy_2\" name=\"isbuy\" ";
if ( $output['member_array']['is_buy'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_edit_allowbuy_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_edit_allowtalk'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n          \t<label for=\"allowtalk_1\" class=\"cb-enable ";
if ( $output['member_array']['is_allowtalk'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_allow'];
echo "</span></label>\r\n            <label for=\"allowtalk_2\" class=\"cb-disable ";
if ( $output['member_array']['is_allowtalk'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_deny'];
echo "</span></label>\r\n            <input id=\"allowtalk_1\" name=\"allowtalk\" ";
if ( $output['member_array']['is_allowtalk'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"allowtalk_2\" name=\"allowtalk\" ";
if ( $output['member_array']['is_allowtalk'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['member_edit_allowtalk_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_edit_allowlogin'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n          \t<label for=\"memberstate_1\" class=\"cb-enable ";
if ( $output['member_array']['member_state'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_allow'];
echo "</span></label>\r\n            <label for=\"memberstate_2\" class=\"cb-disable ";
if ( $output['member_array']['member_state'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['member_edit_deny'];
echo "</span></label>\r\n            <input id=\"memberstate_1\" name=\"memberstate\" ";
if ( $output['member_array']['member_state'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"memberstate_2\" name=\"memberstate\" ";
if ( $output['member_array']['member_state'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_index_points'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['member_index_points'];
echo "&nbsp;<strong class=\"red\">";
echo $output['member_array']['member_points'];
echo "</strong>&nbsp;";
echo $lang['points_unit'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_index_available'];
echo $lang['member_index_prestore'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['member_index_available'];
echo "&nbsp;<strong class=\"red\">";
echo $output['member_array']['available_predeposit'];
echo "</strong>&nbsp;";
echo $lang['currency_zh'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['member_index_frozen'];
echo $lang['member_index_prestore'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['member_index_frozen'];
echo "&nbsp;<strong class=\"red\">";
echo $output['member_array']['freeze_predeposit'];
echo "</strong>&nbsp;";
echo $lang['currency_zh'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#user_form\").valid()){\r\n     \$(\"#user_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(function(){\r\n    \$('#user_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            member_passwd: {\r\n                maxlength: 20,\r\n                minlength: 6\r\n            },\r\n            member_email   : {\r\n                required : true,\r\n                email : true,\r\n\t\t\t\tremote   : {\r\n                    url :'index.php?act=member&op=ajax&branch=check_email',\r\n                    type:'get',\r\n                    data:{\r\n                        user_name : function(){\r\n                            return \$('#member_email').val();\r\n                        },\r\n                        member_id : '";
echo $output['member_array']['member_id'];
echo "'\r\n                    }\r\n                }\r\n            }\r\n        },\r\n        messages : {\r\n            member_passwd : {\r\n                maxlength: '";
echo $lang['member_edit_password_tip'];
echo "',\r\n                minlength: '";
echo $lang['member_edit_password_tip'];
echo "'\r\n            },\r\n            member_email  : {\r\n                required : '";
echo $lang['member_edit_email_null'];
echo "',\r\n                email   : '";
echo $lang['member_edit_valid_email'];
echo "',\r\n\t\t\t\tremote : '";
echo $lang['member_edit_email_exists'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n\r\n\$(function(){\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#member_avatar\");\r\n    \$(\"#member_avatar\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#member_avatar\").val());\r\n    });\r\n});\r\n</script> \r\n";
?>
