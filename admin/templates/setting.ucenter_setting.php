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
echo $lang['web_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=setting&op=base_information\"><span>";
echo $lang['basic_info'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=captcha_setting\"><span>";
echo $lang['manage_about'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=creditgrade\"><span>";
echo $lang['setting_store_creditrule'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['ucenter_integration'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=qq_setting\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=sina_setting\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=login_setting\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['ucenter_integration'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"ucenter_status1\" class=\"cb-enable ";
if ( $output['list_setting']['ucenter_status'] == "1" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['ztc_isuse_open'];
echo "</span></label>\r\n            <label for=\"ucenter_status0\" class=\"cb-disable ";
if ( $output['list_setting']['ucenter_status'] == "0" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['ztc_isuse_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"ucenter_status1\" name=\"ucenter_status\" value=\"1\" ";
echo $output['list_setting']['ucenter_status'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"ucenter_status0\" name=\"ucenter_status\" value=\"0\" ";
echo $output['list_setting']['ucenter_status'] == 0 ? "checked=checked" : "";
echo ">\r\n            &nbsp;&nbsp; <a href=\"http://bbs.shopnc.net/viewthread.php?tid=8663&extra=page%3D1\" target=\"_blank\">";
echo $lang['ucenter_help_url'];
echo "</a></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n        <tr class=\"member_clear\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['user_info_del'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"vatop rowform\"><a href=\"JavaScript:void(0);\" onclick=\"javascript:if(confirm('";
echo $lang['user_info_clear'];
echo "'))window.location ='index.php?act=setting&op=member_clear';\" class=\"btns tooltip\" title=\"";
echo $lang['click_clear'];
echo "\"><span>";
echo $lang['click_clear'];
echo "</span></a> &nbsp;";
echo $lang['first_integration'];
echo "&nbsp; <a href=\"JavaScript:void(0);\" onclick=\"javascript:window.location ='index.php?act=db&op=db';\" class=\"btns tooltip\" title=\"";
echo $lang['click_bak'];
echo "\"><span>";
echo $lang['click_bak'];
echo "</span></a></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_app_id\">";
echo $lang['ucenter_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n            <ul class=\"nofloat\">\r\n              <li>\r\n                <input id=\"ucenter_type_dx\" name=\"ucenter_type\" ";
if ( $output['list_setting']['ucenter_type'] != "phpwind" )
{
		echo "checked=\"checked\"";
}
echo " value=\"discuz\" type=\"radio\">\r\n                <label for=\"ucenter_type_dx\">";
echo $lang['ucenter_uc_discuz'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input id=\"ucenter_type_pw\" name=\"ucenter_type\" ";
if ( $output['list_setting']['ucenter_type'] == "phpwind" )
{
		echo "checked=\"checked\"";
}
echo " value=\"phpwind\" type=\"radio\">\r\n                <label for=\"ucenter_type_pw\">";
echo $lang['ucenter_uc_phpwind'];
echo "</label>\r\n              </li>\r\n            </ul>\r\n          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_app_id\">";
echo $lang['ucenter_application_id'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_app_id\" name=\"ucenter_app_id\" value=\"";
echo $output['list_setting']['ucenter_app_id'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_application_id_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_url\">";
echo $lang['ucenter_address'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_url\" name=\"ucenter_url\" value=\"";
echo $output['list_setting']['ucenter_url'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_address_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['ucenter_key'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_app_key\" name=\"ucenter_app_key\" value=\"";
echo $output['list_setting']['ucenter_app_key'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['ucenter_ip'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_ip\" name=\"ucenter_ip\" value=\"";
echo $output['list_setting']['ucenter_ip'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_ip_tips'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"db_type\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_mysql_server\">";
echo $lang['ucenter_mysql_server'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_mysql_server\" name=\"ucenter_mysql_server\" value=\"";
echo $output['list_setting']['ucenter_mysql_server'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_mysql_server_tips'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"db_type\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_mysql_username\">";
echo $lang['ucenter_mysql_username'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_mysql_username\" name=\"ucenter_mysql_username\" value=\"";
echo $output['list_setting']['ucenter_mysql_username'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_mysql_username_tips'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"db_type\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_mysql_passwd\">";
echo $lang['ucenter_mysql_passwd'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_mysql_passwd\" name=\"ucenter_mysql_passwd\" value=\"";
echo $output['list_setting']['ucenter_mysql_passwd'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_mysql_passwd_tips'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"db_type\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_mysql_name\">";
echo $lang['ucenter_mysql_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_mysql_name\" name=\"ucenter_mysql_name\" value=\"";
echo $output['list_setting']['ucenter_mysql_name'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_mysql_name_tips'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"db_type\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ucenter_mysql_pre\">";
echo $lang['ucenter_mysql_pre'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ucenter_mysql_pre\" name=\"ucenter_mysql_pre\" value=\"";
echo $output['list_setting']['ucenter_mysql_pre'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ucenter_mysql_pre_tips'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" >\r\n          <input type=\"hidden\" name=\"ucenter_connect_type\" value=\"0\" />\r\n          <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a>\r\n          </td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script language=\"javascript\">\r\nfunction change_type(type) {\r\n\tif(type == 1) {\r\n\t\t\$(\".db_type\").css(\"display\",\"none\");\r\n\t} else {\r\n\t\t\$(\".db_type\").css(\"display\",\"\");\r\n\t}\r\n}\r\n";
if ( $output['list_setting']['ucenter_connect_type'] == "1" )
{
		echo "change_type(1);\r\n";
}
echo "</script>";
?>
