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
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['manage_about'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=creditgrade\"><span>";
echo $lang['setting_store_creditrule'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ucenter_setting\"><span>";
echo $lang['ucenter_integration'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=qq_setting\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=sina_setting\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=login_setting\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" id=\"settingForm\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['allowed_visitors_consult'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"guest_comment_enable\" class=\"cb-enable ";
if ( $output['list_setting']['guest_comment'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"guest_comment_disabled\" class=\"cb-disable ";
if ( $output['list_setting']['guest_comment'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"guest_comment_enable\" name=\"guest_comment\" ";
if ( $output['list_setting']['guest_comment'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"guest_comment_disabled\" name=\"guest_comment\" ";
if ( $output['list_setting']['guest_comment'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['allowed_visitors_consult_notice'];
echo "</td>\r\n        </tr>\r\n        ";
if ( $output['list_setting']['flea_app_open'] == "1" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
		echo $lang['flea_allow'];
		echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n\t\t\t<label for=\"flea_allow_1\" class=\"cb-enable ";
		if ( $output['list_setting']['flea_isuse'] == "1" )
		{
				echo "selected";
		}
		echo "\" title=\"";
		echo $lang['flea_allow_yes'];
		echo "\"><span>";
		echo $lang['nc_yes'];
		echo "</span></label>\r\n            <label for=\"flea_allow_0\" class=\"cb-disable ";
		if ( $output['list_setting']['flea_isuse'] == "0" )
		{
				echo "selected";
		}
		echo "\" title=\"";
		echo $lang['flea_allow_no'];
		echo "\"><span>";
		echo $lang['nc_no'];
		echo "</span></label>\r\n            <input id=\"flea_allow_1\" name=\"flea_allow\" ";
		if ( $output['list_setting']['flea_isuse'] == "1" )
		{
				echo "checked=\"checked\"";
		}
		echo " value=\"1\" type=\"radio\">\r\n            <input id=\"flea_allow_0\" name=\"flea_allow\" ";
		if ( $output['list_setting']['flea_isuse'] == "0" )
		{
				echo "checked=\"checked\"";
		}
		echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['allow_open_store'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"store_allow1\" class=\"cb-enable ";
if ( $output['list_setting']['store_allow'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['gold_isuse_open'];
echo "\"><span>";
echo $lang['nc_open'];
echo "</span></label>\r\n            <label for=\"store_allow0\"class=\"cb-disable ";
if ( $output['list_setting']['store_allow'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['gold_isuse_close'];
echo "\"><span>";
echo $lang['nc_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"store_allow1\" name=\"store_allow\" value=\"1\" ";
echo $output['list_setting']['store_allow'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"store_allow0\" name=\"store_allow\" value=\"0\" ";
echo $output['list_setting']['store_allow'] == 0 ? "checked=checked" : "";
echo "></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>      \r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['open_checkcode'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"checkbox\" value=\"1\" name=\"captcha_status_login\" id=\"captcha_status1\" ";
if ( $output['list_setting']['captcha_status_login'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " />\r\n                <label for=\"captcha_status1\">";
echo $lang['front_login'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"checkbox\" value=\"1\" name=\"captcha_status_register\" id=\"captcha_status2\" ";
if ( $output['list_setting']['captcha_status_register'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " />\r\n                <label for=\"captcha_status2\">";
echo $lang['front_regist'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"checkbox\" value=\"1\" name=\"captcha_status_goodsqa\" id=\"captcha_status3\" ";
if ( $output['list_setting']['captcha_status_goodsqa'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " />\r\n                <label for=\"captcha_status3\">";
echo $lang['front_goodsqa'];
echo "</label>\r\n              </li>\r\n              \r\n              <!--</li> <input type=\"checkbox\" value=\"1\" name=\"captcha_status_backend\" id=\"captcha_status4\" ";
if ( $output['list_setting']['captcha_status_backend'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " /> <label for=\"captcha_status4\">";
echo $lang['backstage_login'];
echo "</label> </li>-->\r\n            </ul></td>\r\n          <td class=\"vatop tips\" >&nbsp;</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
