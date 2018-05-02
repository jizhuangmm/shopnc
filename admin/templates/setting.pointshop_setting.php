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
echo $lang['nc_pointshop_setting'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_pointshop_setting'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\" id=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['open_pointprod_isuse'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"pointprod_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['pointprod_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['open_pointprod_yes'];
echo "\"><span>";
echo $lang['open_pointprod_yes'];
echo "</span></label>\r\n            <label for=\"pointprod_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['pointprod_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['open_pointprod_no'];
echo "\"><span>";
echo $lang['open_pointprod_no'];
echo "</span></label>\r\n            <input id=\"pointprod_isuse_1\" name=\"pointprod_isuse\" ";
if ( $output['list_setting']['pointprod_isuse'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"pointprod_isuse_0\" name=\"pointprod_isuse\" ";
if ( $output['list_setting']['pointprod_isuse'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['open_pointprod_isuse_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['voucher_allow'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"voucher_allow_1\" class=\"cb-enable ";
if ( $output['list_setting']['voucher_allow'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['voucher_allow_yes'];
echo "\"><span>";
echo $lang['voucher_allow_yes'];
echo "</span></label>\r\n            <label for=\"voucher_allow_0\" class=\"cb-disable ";
if ( $output['list_setting']['voucher_allow'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['voucher_allow_no'];
echo "\"><span>";
echo $lang['voucher_allow_no'];
echo "</span></label>\r\n            <input id=\"voucher_allow_1\" name=\"voucher_allow\" ";
if ( $output['list_setting']['voucher_allow'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"voucher_allow_0\" name=\"voucher_allow\" ";
if ( $output['list_setting']['voucher_allow'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['voucher_allow_notice'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n     \$(\"#settingForm\").submit();\r\n});\r\n});\r\n</script> \r\n";
?>
