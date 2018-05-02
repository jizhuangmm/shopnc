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
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=sina_setting\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=login_setting\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['qq_isuse'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"qq_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['qq_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['qq_isuse_open'];
echo "\"><span>";
echo $lang['qq_isuse_open'];
echo "</span></label>\r\n            <label for=\"qq_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['qq_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['qq_isuse_close'];
echo "\"><span>";
echo $lang['qq_isuse_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"qq_isuse_1\" name=\"qq_isuse\" value=\"1\" ";
echo $output['list_setting']['qq_isuse'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"qq_isuse_0\" name=\"qq_isuse\" value=\"0\" ";
echo $output['list_setting']['qq_isuse'] == 0 ? "checked=checked" : "";
echo "></td>\r\n          <td class=\"vatop tips\">";
echo $lang['qqSettings_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"qq_appcode\">";
echo $lang['qq_appcode'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"qq_appcode\" rows=\"6\" class=\"tarea\" id=\"qq_appcode\">";
echo $output['list_setting']['qq_appcode'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"qq_appid\">";
echo $lang['qq_appid'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"qq_appid\" name=\"qq_appid\" value=\"";
echo $output['list_setting']['qq_appid'];
echo "\" class=\"txt\" type=\"text\">\r\n            </td>\r\n          <td class=\"vatop tips\"><a style=\"color:#ffffff; font-weight:bold;\" target=\"_blank\" href=\"http://connect.qq.com\">";
echo $lang['qq_apply_link'];
echo "</a></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"qq_appkey\">";
echo $lang['qq_appkey'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"qq_appkey\" name=\"qq_appkey\" value=\"";
echo $output['list_setting']['qq_appkey'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
