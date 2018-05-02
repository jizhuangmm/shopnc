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
echo "<div class=\"page\">\n  <div class=\"fixed-bar\">\n    <div class=\"item-title\">\n      <h3>";
echo $lang['nc_domain_manage'];
echo "</h3>\n      <ul class=\"tab-base\">\n     \t\t<li><a href=\"index.php?act=setting&op=subdomain_setting\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\n        <li><a href=\"index.php?act=store&op=store_domain\"><span>";
echo $lang['nc_domain_shop'];
echo "</span></a></li>\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"fixed-empty\"></div>\n  <form id=\"store_form\" method=\"post\">\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\n    <input type=\"hidden\" name=\"store_id\" value=\"";
echo $output['store_array']['store_id'];
echo "\" />\n    <table class=\"table tb-type2\">\n      <tbody>\n        <tr class=\"noborder\">\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['store_user_name'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\">";
echo $output['store_array']['member_name'];
echo "</td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['store_name'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\">";
echo $output['store_array']['store_name'];
echo "</td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['store_domain'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_domain'];
echo "\" id=\"store_domain\" name=\"store_domain\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['store_domain_times'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_domain_times'];
echo "\" id=\"store_domain_times\" name=\"store_domain_times\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n      </tbody>\n      <tfoot>\n        <tr class=\"tfoot\">\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\n        </tr>\n      </tfoot>\n    </table>\n  </form>\n</div>\n<script type=\"text/javascript\">\n//按钮先执行验证再提交表单\n\$(function(){\$(\"#submitBtn\").click(function(){\n    if(\$(\"#store_form\").valid()){\n     \$(\"#store_form\").submit();\n\t}\n\t});\n\tjQuery.validator.addMethod(\"domain\", function(value, element) {\n\t\t\treturn this.optional(element) || /^[\\w\\-]+\$/i.test(value);\n\t\t}, \"\"); \n\t\$('#store_form').validate({\n\t\terrorPlacement: function(error, element){\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\n        },\n        success: function(label){\n            label.addClass('valid');\n        },\n\t\tonkeyup    : false,\n\t\trules : {\n\t\t\tstore_domain: {\n\t\t\t\tdomain: true,\n        rangelength:[";
echo $output['subdomain_length'][0];
echo ", ";
echo $output['subdomain_length'][1];
echo "]\n\t\t\t},\n\t\t\tstore_domain_times: {\n\t\t\t\tdigits : true,\n        max:";
echo $GLOBALS['setting_config']['subdomain_times'];
echo "\t\t\t}\n\t\t},\n\t\tmessages : {\n\t\t\tstore_domain: {\n\t\t\t\tdomain: '";
echo $lang['store_domain_valid'];
echo "',\n        rangelength:'";
echo $lang['store_domain_rangelength'];
echo "'\n\t\t\t},\n\t\t\tstore_domain_times: {\n\t\t\t\tdigits: '";
echo $lang['store_domain_times_digits'];
echo "',\n        max:'";
echo $lang['store_domain_times_max'];
echo "'\n\t\t\t}\n\t\t}\n\t});\n});\n</script>";
?>
