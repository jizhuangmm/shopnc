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
echo $lang['nc_coupon_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=coupon&op=list\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=coupon&op=apply\"><span>";
echo $lang['coupon_allow_state'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"coupon_id\" value=\"";
echo $output['coupon']['coupon_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\">";
echo $lang['coupon_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['coupon']['coupon_title'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_price'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $lang['currency'].$output['coupon']['coupon_price'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_store_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['coupon']['store_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_class'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['class_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_lifetime'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['coupon']['coupon_start_date'] );
echo "            ~\r\n            ";
echo date( "Y-m-d", $output['coupon']['coupon_end_date'] );
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_pic'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\" style=\" float:left;\"><img src=\"";
if ( stripos( $output['coupon']['coupon_pic'], "http://" ) === FALSE )
{
		echo SiteUrl."/".$output['coupon']['coupon_pic'];
}
else
{
		echo $output['coupon']['coupon_pic'];
}
echo "\" onload=\"javascript:DrawImage(this,320,145);\" onerror=\"this.src='";
echo TEMPLATES_PATH;
echo "/images/default_coupon_image.png'\" />\r\n            <div class=\"type-file-preview\"><img src=\"";
if ( stripos( $output['coupon']['coupon_pic'], "http://" ) === FALSE )
{
		echo SiteUrl."/".$output['coupon']['coupon_pic'];
}
else
{
		echo $output['coupon']['coupon_pic'];
}
echo "\"></div>\r\n            </span></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_notice'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['coupon']['coupon_desc'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_state'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"state1\" class=\"cb-enable ";
if ( $output['coupon']['coupon_state'] == "2" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"state0\" class=\"cb-disable ";
if ( $output['coupon']['coupon_state'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"state1\" name=\"coupon_state\" ";
if ( $output['coupon']['coupon_state'] == "2" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"2\" type=\"radio\">\r\n            <input id=\"state0\" name=\"coupon_state\" ";
if ( $output['coupon']['coupon_state'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_help1'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['nc_recommend'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"lock1\" class=\"cb-enable ";
if ( $output['coupon']['coupon_recommend'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"lock2\" class=\"cb-disable ";
if ( $output['coupon']['coupon_recommend'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"lock1\" name=\"coupon_recommend\" ";
if ( $output['coupon']['coupon_recommend'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"lock2\" name=\"coupon_recommend\" ";
if ( $output['coupon']['coupon_recommend'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_help3'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['nc_pass'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"allowstate1\" class=\"cb-enable ";
if ( $output['coupon']['coupon_allowstate'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"allowstate2\" class=\"cb-disable ";
if ( $output['coupon']['coupon_allowstate'] == "2" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"allowstate1\" name=\"coupon_allowstate\" ";
if ( $output['coupon']['coupon_allowstate'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"allowstate2\" name=\"coupon_allowstate\" ";
if ( $output['coupon']['coupon_allowstate'] == "2" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"2\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_allow_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\">";
echo $lang['coupon_allow_remark'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"coupon_allowremark\" id=\"coupon_allowremark\" class=\"text\" >";
echo $output['coupon']['coupon_allowremark'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['coupon_remark_tips'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\"><td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    \$(\"#add_form\").submit();\r\n\t});\r\n});\r\n</script>";
?>
