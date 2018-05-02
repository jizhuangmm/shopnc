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
echo "<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/i18n/zh-CN.js";
echo "\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\t\$('#quota_endtime').datepicker();\r\n\t\r\n    jQuery.validator.addMethod('dateValidate', function(value, element) {\r\n    \tvar date1 = new Date(Date.parse('";
echo date( "Y/m/d", $output['quota_info']['bl_quota_starttime'] );
echo "'));\r\n        var date2 = new Date(Date.parse(\$('#quota_endtime').val().replace(/-/g, \"/\")));\r\n        return date1 < date2;\r\n    });\r\n\r\n    \$(\"#submitBtn\").click(function(){\r\n        \$(\"#add_form\").submit();\r\n    });\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n\t\t},\r\n\t\tsuccess: function(label){\r\n\t\t\tlabel.addClass('valid');\r\n\t\t},\r\n\t\tonkeyup    : false,\r\n\t\trules : {\r\n\t\t\tquota_endtime: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdateValidate : true\r\n\t\t\t\t\r\n\t\t\t}\r\n\t\t},\r\n\t\tmessages : {\r\n\t\t\tquota_endtime: {\r\n\t\t\t\trequired : '";
echo $lang['bundling_quota_endtime_required'];
echo "',\r\n\t\t\t\tdateValidate : '";
echo $lang['bundling_quota_endtime_dateValidate'];
echo "'\r\n\t\t\t}\r\n\t\t}\r\n\t});\r\n});\r\n</script> \r\n<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_promotion_bundling'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=promotion_bundling&op=bundling_quota\"><span>";
echo $lang['bundling_quota'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=promotion_bundling&op=bundling_list\"><span>";
echo $lang['bundling_list'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"form_submit\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"quota_id\" value=\"";
echo $output['quota_info']['bl_quota_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['bundling_quota_store_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n            \t";
echo $output['quota_info']['store_name'];
echo "            </td>\r\n            <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['bundling_quota_quantity'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                ";
echo $output['quota_info']['bl_quota_month'];
echo "            </td>\r\n            <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['bundling_quota_starttime'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n            \t";
echo date( "Y-m-d", $output['quota_info']['bl_quota_starttime'] );
echo "            </td>\r\n            <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"quota_endtime\">";
echo $lang['bundling_quota_endtime'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n            \t<input type=\"text\" name=\"quota_endtime\" id=\"quota_endtime\" class=\"txt\" value=\"";
echo date( "Y-m-d", $output['quota_info']['bl_quota_endtime'] );
echo "\" />\r\n            </td>\r\n            <td class=\"vatop tips\">";
echo $lang['bundling_quota_endtime_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"quota_endtime\">";
echo $lang['nc_state'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform onoff\">\r\n            \t<label for=\"quota_state1\" class=\"cb-enable ";
if ( $output['quota_info']['bl_quota_state'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['bundling_state_1'];
echo "</span></label>\r\n            \t<label for=\"quota_state0\" class=\"cb-disable ";
if ( $output['quota_info']['bl_quota_state'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['bundling_state_0'];
echo "</span></label>\r\n            \t<input id=\"quota_state1\" name=\"quota_state\" ";
if ( $output['quota_info']['bl_quota_state'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            \t<input id=\"quota_state0\" name=\"quota_state\" ";
if ( $output['quota_info']['bl_quota_state'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\">\r\n            </td>\r\n          \t<td class=\"vatop tips\">";
echo $lang['bundling_quota_state_tips'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n";
?>
