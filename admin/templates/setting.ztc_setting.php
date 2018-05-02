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
echo $lang['nc_ztc_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_class\"><span>";
echo $lang['admin_ztc_list_title'];
echo "<!-- 申请列表 --></span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glist\" ><span>";
echo $lang['admin_ztc_goodslist_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glog\" ><span>";
echo $lang['admin_ztc_loglist_title'];
echo "</span></a></li>        \r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"settingForm\" id=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['ztc_isuse'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"ztc_isuse_1\" class=\"cb-enable ";
if ( $output['list_setting']['ztc_isuse'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['ztc_isuse_open'];
echo "\"><span>";
echo $lang['ztc_isuse_open'];
echo "</span></label>\r\n            <label for=\"ztc_isuse_0\" class=\"cb-disable ";
if ( $output['list_setting']['ztc_isuse'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['ztc_isuse_close'];
echo "\"><span>";
echo $lang['ztc_isuse_close'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"ztc_isuse_1\" name=\"ztc_isuse\" value=\"1\" ";
echo $output['list_setting']['ztc_isuse'] == 1 ? "checked=checked" : "";
echo ">\r\n            <input type=\"radio\" id=\"ztc_isuse_0\" name=\"ztc_isuse\" value=\"0\" ";
echo $output['list_setting']['ztc_isuse'] == 0 ? "checked=checked" : "";
echo "></td>\r\n          <td class=\"vatop tips\">";
echo $lang['ztc_isuse_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"site_name\">";
echo $lang['ztc_dayprod'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"ztc_dayprod\" name=\"ztc_dayprod\" value=\"";
echo $output['list_setting']['ztc_dayprod'];
echo "\" class=\"infoTableInput\" type=\"text\" style=\"width:50px;\">\r\n            ";
echo $lang['ztc_unit'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#settingForm\").valid()){\r\n     \$(\"#settingForm\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$(\"#settingForm\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            ztc_dayprod : {\r\n                required : true,\r\n                digits   : true,\r\n                min    :1\r\n            }\r\n        },\r\n        messages : {\r\n            ztc_dayprod  : {\r\n                required : '";
echo $lang['ztc_dayprod_isnum'];
echo "',\r\n                digits   : '";
echo $lang['ztc_dayprod_isnum'];
echo "',\r\n                min    :'";
echo $lang['ztc_dayprod_min'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script>";
?>
