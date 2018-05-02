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
echo $lang['nc_operation_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_operation_set'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\" id=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <!-- 预存款开启 -->\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['open_predeposit_isuse'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"predeposit_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['predeposit_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['open_predeposit_yes'];
echo "\"><span>";
echo $lang['open_predeposit_yes'];
echo "</span></label>\r\n            <label for=\"predeposit_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['predeposit_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['open_predeposit_no'];
echo "\"><span>";
echo $lang['open_predeposit_no'];
echo "</span></label>\r\n            <input id=\"predeposit_isuse_1\" name=\"predeposit_isuse\" ";
if ( $output['list_setting']['predeposit_isuse'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"predeposit_isuse_0\" name=\"predeposit_isuse\" ";
if ( $output['list_setting']['predeposit_isuse'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['open_predeposit_isuse_notice'];
echo "</td>\r\n        </tr>\r\n        <!-- 金币启用 -->\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['gold_isuse'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"gold_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['gold_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['gold_isuse_open'];
echo "\"><span>";
echo $lang['gold_isuse_open'];
echo "</span></label>\r\n            <label for=\"gold_isuse_0\"class=\"cb-disable ";
if ( $output['list_setting']['gold_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['gold_isuse_close'];
echo "\"><span>";
echo $lang['gold_isuse_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"gold_isuse_1\" name=\"gold_isuse\" value=\"1\" ";
echo $output['list_setting']['gold_isuse'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"gold_isuse_0\" name=\"gold_isuse\" value=\"0\" ";
echo $output['list_setting']['gold_isuse'] == 0 ? "checked=checked" : "";
echo "></td>\r\n          <td class=\"vatop tips\">";
echo $lang['gold_isuse_notice'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"site_name\">";
echo $lang['gold_rmbratio'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span>";
echo $lang['gold_rmbratiodesc_1'];
echo " </span>\r\n            <input id=\"gold_rmbratio\" name=\"gold_rmbratio\" value=\"";
echo $output['list_setting']['gold_rmbratio'];
echo "\" class=\"txt\" type=\"text\" style=\" width:50px;\">\r\n            <span>";
echo $lang['gold_rmbratiodesc_2'];
echo "</span></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n        <!-- 积分启用 -->\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['points_isuse'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"points_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['points_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['gold_isuse_open'];
echo "\"><span>";
echo $lang['points_isuse_open'];
echo "</span></label>\r\n            <label for=\"points_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['points_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['gold_isuse_close'];
echo "\"><span>";
echo $lang['points_isuse_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"points_isuse_1\" name=\"points_isuse\" value=\"1\" ";
echo $output['list_setting']['points_isuse'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"points_isuse_0\" name=\"points_isuse\" value=\"0\" ";
echo $output['list_setting']['points_isuse'] == 0 ? "checked=checked" : "";
echo ">\r\n          <td class=\"vatop tips\">";
echo $lang['points_isuse_notice'];
echo "</td>\r\n        </tr>\r\n        \r\n        \r\n        <tr >\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['open_pointshop_isuse'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"pointshop_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['pointshop_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_open'];
echo "\"><span>";
echo $lang['nc_open'];
echo "</span></label>\r\n            <label for=\"pointshop_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['pointshop_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_close'];
echo "\"><span>";
echo $lang['nc_close'];
echo "</span></label>\r\n            <input id=\"pointshop_isuse_1\" name=\"pointshop_isuse\" ";
if ( $output['list_setting']['pointshop_isuse'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"pointshop_isuse_0\" name=\"pointshop_isuse\" ";
if ( $output['list_setting']['pointshop_isuse'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo sprintf( $lang['open_pointshop_isuse_notice'], "index.php?act=setting&op=pointshop_setting" );
echo "</td>\r\n        </tr>\r\n        <!-- 促销开启 -->\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['promotion_allow'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"promotion_allow_1\" class=\"cb-enable ";
if ( $output['list_setting']['promotion_allow'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['setting_on'];
echo "\"><span>";
echo $lang['setting_on'];
echo "</span></label>\r\n            <label for=\"promotion_allow_0\" class=\"cb-disable ";
if ( $output['list_setting']['promotion_allow'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['setting_off'];
echo "\"><span>";
echo $lang['setting_off'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"promotion_allow_1\" name=\"promotion_allow\" value=\"1\" ";
echo $output['list_setting']['promotion_allow'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"promotion_allow_0\" name=\"promotion_allow\" value=\"0\" ";
echo $output['list_setting']['promotion_allow'] == 0 ? "checked=checked" : "";
echo ">\r\n          <td class=\"vatop tips\">";
echo $lang['promotion_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['groupbuy_allow'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"groupbuy_allow_1\" class=\"cb-enable ";
if ( $output['list_setting']['groupbuy_allow'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['groupbuy_allow_yes'];
echo "\"><span>";
echo $lang['groupbuy_allow_yes'];
echo "</span></label>\r\n            <label for=\"groupbuy_allow_0\" class=\"cb-disable ";
if ( $output['list_setting']['groupbuy_allow'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['groupbuy_allow_no'];
echo "\"><span>";
echo $lang['groupbuy_allow_no'];
echo "</span></label>\r\n            <input id=\"groupbuy_allow_1\" name=\"groupbuy_allow\" ";
if ( $output['list_setting']['groupbuy_allow'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"groupbuy_allow_0\" name=\"groupbuy_allow\" ";
if ( $output['list_setting']['groupbuy_allow'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['groupbuy_isuse_notice'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#settingForm\").valid()){\r\n     \$(\"#settingForm\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$(\"#settingForm\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            gold_rmbratio : {\r\n                required : true,\r\n                digits   : true,\r\n                min    :1\r\n            }\r\n        },\r\n        messages : {\r\n            gold_rmbratio  : {\r\n                required : '";
echo $lang['gold_rmbratio_isnum'];
echo "',\r\n                digits   : '";
echo $lang['gold_rmbratio_isnum'];
echo "',\r\n                min    :'";
echo $lang['gold_rmbratio_min'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script> \r\n";
?>
