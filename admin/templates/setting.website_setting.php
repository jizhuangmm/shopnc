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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_website_setting'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_website_setting'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\" id=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['share_allow'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"share_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['share_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['setting_on'];
echo "\"><span>";
echo $lang['setting_on'];
echo "</span></label>\r\n            <label for=\"share_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['share_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['setting_off'];
echo "\"><span>";
echo $lang['setting_off'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"share_isuse_1\" name=\"share_isuse\" value=\"1\" ";
echo $output['list_setting']['share_isuse'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"share_isuse_0\" name=\"share_isuse\" value=\"0\" ";
echo $output['list_setting']['share_isuse'] == 0 ? "checked=checked" : "";
echo ">\r\n          <td class=\"vatop tips\">";
echo $lang['share_notice'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n\t\$(\"#settingForm\").submit();\r\n});\r\n});\r\n</script>";
?>
