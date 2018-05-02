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
echo $lang['nc_domain_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n\t\t<li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_domain\"><span>";
echo $lang['nc_domain_shop'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" id=\"settingForm\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['if_open_domain'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"enabled_subdomain1\" class=\"cb-enable ";
if ( $output['list_setting']['enabled_subdomain'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"enabled_subdomain0\" class=\"cb-disable ";
if ( $output['list_setting']['enabled_subdomain'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"enabled_subdomain1\" ";
if ( $output['list_setting']['enabled_subdomain'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"enabled_subdomain\">\r\n            <input type=\"radio\" id=\"enabled_subdomain0\" ";
if ( $output['list_setting']['enabled_subdomain'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"enabled_subdomain\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['open_domain_document'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['domain_edit'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"subdomain_edit1\" class=\"cb-enable ";
if ( $output['list_setting']['subdomain_edit'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"subdomain_edit0\" class=\"cb-disable ";
if ( $output['list_setting']['subdomain_edit'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input type=\"radio\" id=\"subdomain_edit1\" ";
if ( $output['list_setting']['subdomain_edit'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" name=\"subdomain_edit\">\r\n            <input type=\"radio\" id=\"subdomain_edit0\" ";
if ( $output['list_setting']['subdomain_edit'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" name=\"subdomain_edit\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['domain_edit_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"subdomain_times\">";
echo $lang['domain_times'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['subdomain_times'];
echo "\" name=\"subdomain_times\" id=\"subdomain_times\" class=\"txt\" style=\" width:50px;\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['domain_times_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"subdomain_suffix\">";
echo $lang['suffix'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['subdomain_suffix'];
echo "\" name=\"subdomain_suffix\" id=\"subdomain_suffix\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['demo'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"subdomain_reserved\">";
echo $lang['reservations_domain'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['subdomain_reserved'];
echo "\" name=\"subdomain_reserved\" id=\"subdomain_reserved\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['please_input_domain'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"subdomain_length\">";
echo $lang['length_limit'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['list_setting']['subdomain_length'];
echo "\" name=\"subdomain_length\" id=\"subdomain_length\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['domain_length'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#settingForm\").valid()){\r\n     \$(\"#settingForm\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\tjQuery.validator.addMethod(\"domain_length\", function(value, element) {\r\n\t\t\tvar success = this.optional(element) || /^(\\d+)[\\/-](\\d+)\$/i.test(value);\r\n\t\t\treturn success && (parseInt(RegExp.\$1)<parseInt(RegExp.\$2)) && (parseInt(RegExp.\$1)>0);\r\n\t\t}, \"\"); \r\n\t\$(\"#settingForm\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            subdomain_times : {\r\n                required : true,\r\n                digits   : true,\r\n                min    :1\r\n            },\r\n            subdomain_suffix : {\r\n                required : \"#enabled_subdomain1:checked\"\r\n            },\r\n            subdomain_length : {\r\n                required : true,\r\n                domain_length   : true\r\n            }\r\n        },\r\n        messages : {\r\n            subdomain_times  : {\r\n                required : '";
echo $lang['domain_times_null'];
echo "',\r\n                digits   : '";
echo $lang['domain_times_digits'];
echo "',\r\n                min    :'";
echo $lang['domain_times_min'];
echo "'\r\n            },\r\n            subdomain_suffix : {\r\n                required : '";
echo $lang['domain_suffix_null'];
echo "'\r\n            },\r\n            subdomain_length  : {\r\n                required : '";
echo $lang['domain_length_tips'];
echo "',\r\n                domain_length   : '";
echo $lang['domain_length_tips'];
echo "'\r\n            }\r\n        }\r\n\t});\r\n});\r\n</script>";
?>
