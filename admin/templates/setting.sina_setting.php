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
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ucenter_setting\"><span>";
echo $lang['ucenter_integration'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=qq_setting\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=login_setting\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  ";
if ( $output['is_exist'] )
{
		echo "  <form method=\"post\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['sina_isuse'];
		echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"sina_isuse_1\" class=\"cb-enable ";
		if ( $output['list_setting']['sina_isuse'] == "1" )
		{
				echo "selected";
		}
		echo "\" title=\"";
		echo $lang['sina_isuse_open'];
		echo "\"><span>";
		echo $lang['sina_isuse_open'];
		echo "</span></label>\r\n            <label for=\"sina_isuse_0\" class=\"cb-disable ";
		if ( $output['list_setting']['sina_isuse'] == "0" )
		{
				echo "selected";
		}
		echo "\" title=\"";
		echo $lang['sina_isuse_close'];
		echo "\"><span>";
		echo $lang['sina_isuse_close'];
		echo "</span></label>\r\n            <input type=\"radio\" id=\"sina_isuse_1\" name=\"sina_isuse\" value=\"1\" ";
		echo $output['list_setting']['sina_isuse'] == 1 ? "checked=checked" : "";
		echo ">\r\n            <input type=\"radio\" id=\"sina_isuse_0\" name=\"sina_isuse\" value=\"0\" ";
		echo $output['list_setting']['sina_isuse'] == 0 ? "checked=checked" : "";
		echo "></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"sina_appcode\">";
		echo $lang['sina_appcode'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"sina_appcode\" rows=\"6\" class=\"tarea\" id=\"sina_appcode\">";
		echo $output['list_setting']['sina_appcode'];
		echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"sina_wb_akey\" class=\"validation\">";
		echo $lang['sina_wb_akey'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"sina_wb_akey\" name=\"sina_wb_akey\" value=\"";
		echo $output['list_setting']['sina_wb_akey'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><a style=\"color:#ffffff; font-weight:bold;\" target=\"_blank\" href=\"http://open.weibo.com/developers\">";
		echo $lang['sina_apply_link'];
		echo "</a></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"sina_wb_skey\" class=\"validation\">";
		echo $lang['sina_wb_skey'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"sina_wb_skey\" name=\"sina_wb_skey\" value=\"";
		echo $output['list_setting']['sina_wb_skey'];
		echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
		echo $lang['nc_submit'];
		echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  ";
}
else
{
		echo "  <table class=\"table tb-type2\">\r\n    <tbody>\r\n      <tr class=\"noborder\">\r\n        <td colspan=\"2\" class=\"no_data\">";
		echo $lang['sina_function_fail_tip'];
		echo "</td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  ";
}
echo "</div>\r\n";
?>
