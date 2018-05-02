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
echo $lang['nc_email_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_email_set'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" id=\"form_email\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"email_type\">";
echo $lang['email_type_open'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"email_enabled_1\" class=\"cb-enable ";
if ( $output['list_setting']['email_enabled'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['open'];
echo "\"><span>";
echo $lang['open'];
echo "</span></label>\r\n            <label for=\"email_enabled_0\" class=\"cb-disable ";
if ( $output['list_setting']['email_enabled'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['close'];
echo "\"><span>";
echo $lang['close'];
echo "</span></label>\r\n            <input type=\"radio\" ";
if ( $output['list_setting']['email_enabled'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"email_enabled\" id=\"email_enabled_1\" />\r\n            <input type=\"radio\" ";
if ( $output['list_setting']['email_enabled'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"email_enabled\" id=\"email_enabled_0\" />\r\n            <input type=\"hidden\" name=\"email_type\" value=\"1\" /></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n        <!--<tr>\r\n          <td colspan=\"2\" class=\"required\">\r\n\t\t\t\t<label for=\"email_type\">";
echo $lang['email_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n\t\t\t\t\t<label><input type=\"radio\" ";
if ( $output['list_setting']['email_type'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"email_type\" id=\"email_type_1\" />&nbsp;";
echo $lang['use_other_smtp_service'];
echo "</label>&nbsp;\r\n\t\t\t\t\t<label><input type=\"radio\" ";
if ( $output['list_setting']['email_type'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"email_type\" id=\"email_type_0\" />&nbsp;";
echo $lang['use_server_mail_service'];
echo "</label>&nbsp;\r\n\t\t\t\t\t<label class=\"field_notice\">";
echo $lang['if_choose_server_mail_no_input_follow'];
echo "</label>\r\n\t\t\t\t</td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>-->\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['smtp_server'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['email_host'];
echo "\" name=\"email_host\" id=\"email_host\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><label class=\"field_notice\">";
echo $lang['set_smtp_server_address'];
echo "</label></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['smtp_port'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['email_port'];
echo "\" name=\"email_port\" id=\"email_port\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><label class=\"field_notice\">";
echo $lang['set_smtp_port'];
echo "</label></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['sender_mail_address'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['email_addr'];
echo "\" name=\"email_addr\" id=\"email_addr\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><label class=\"field_notice\">";
echo $lang['if_smtp_authentication'];
echo "</label></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['smtp_user_name'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['email_id'];
echo "\" name=\"email_id\" id=\"email_id\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><label class=\"field_notice\">";
echo $lang['smtp_user_name_tip'];
echo "</label></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['smtp_user_pwd'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"password\" value=\"";
echo $output['list_setting']['email_pass'];
echo "\" name=\"email_pass\" id=\"email_pass\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><label class=\"field_notice\">";
echo $lang['smtp_user_pwd_tip'];
echo "</label></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['test_mail_address'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"email_test\" id=\"email_test\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"><input type=\"button\" value=\"";
echo $lang['test'];
echo "\" name=\"send_test_email\" class=\"btn\" id=\"send_test_email\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\t/*\$(\"#form_email\").validate({\r\n\t\trules: {\r\n\t\t\temail_host: {required:\"#email_type_1:checked\"},\r\n\t\t\temail_port: {required:\"#email_type_1:checked\"},\r\n\t\t\temail_addr: {required:\"#email_type_1:checked\"},\r\n\t\t\temail_id: {required:\"#email_type_1:checked\"},\r\n\t\t\temail_pass: {required:\"#email_type_1:checked\"}\r\n\t\t},\r\n\t\tmessages: {\r\n\t\t\temail_host: {required:\"\"},\r\n\t\t\temail_port: {required:\"\"},\r\n\t\t\temail_addr: {required:\"\"},\r\n\t\t\temail_id: {required:\"\"},\r\n\t\t\temail_pass: {required:\"\"}\r\n\t\t}\r\n\t});*/\r\n\t\$('#send_test_email').click(function(){\r\n\t\t\$.ajax({\r\n\t\t\ttype:'POST',\r\n\t\t\turl:'index.php',\r\n\t\t\tdata:'act=setting&op=email_testing&email_host='+\$('#email_host').val()+'&email_port='+\$('#email_port').val()+'&email_addr='+\$('#email_addr').val()+'&email_id='+\$('#email_id').val()+'&email_pass='+\$('#email_pass').val()+'&email_type='+1+'&email_test='+\$('#email_test').val(),\r\n\t\t\terror:function(){\r\n\t\t\t\t\talert('";
echo $lang['test_email_send_fail'];
echo "');\r\n\t\t\t\t},\r\n\t\t\tsuccess:function(html){\r\n\t\t\t\talert(html.msg);\r\n\t\t\t},\r\n\t\t\tdataType:'json'\r\n\t\t});\r\n\t});\r\n});\r\n</script>";
?>
