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
echo $lang['web_config_index'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=web_config&op=web_config\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['web_config_web_edit'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=web_config&op=code_edit&web_id=";
echo $_GET['web_id'];
echo "\"><span>";
echo $lang['web_config_code_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"web_form\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['web_array']['web_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n      \t<tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['web_config_web_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"web_name\" name=\"web_name\" value=\"";
echo $output['web_array']['web_name'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_web_name_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['web_config_style_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" style=\" height:48px;\">\r\n          \t<input type=\"hidden\" value=\"";
echo $output['web_array']['style_name'];
echo "\" name=\"style_name\" id=\"style_name\">\r\n          \t<ul class=\"home-templates-board-style\">\r\n              <li class=\"red\"><em></em><i></i>";
echo $lang['web_config_style_red'];
echo "</li>\r\n              <li class=\"pink\"><em></em><i></i>";
echo $lang['web_config_style_pink'];
echo "</li>\r\n              <li class=\"orange\"><em></em><i></i>";
echo $lang['web_config_style_orange'];
echo "</li>\r\n              <li class=\"green\"><em></em><i></i>";
echo $lang['web_config_style_green'];
echo "</li>\r\n              <li class=\"blue\"><em></em><i></i>";
echo $lang['web_config_style_blue'];
echo "</li>\r\n              <li class=\"purple\"><em></em><i></i>";
echo $lang['web_config_style_purple'];
echo "</li>\r\n              <li class=\"brown\"><em></em><i></i>";
echo $lang['web_config_style_brown'];
echo "</li>\r\n              <li class=\"gray\"><em></em><i></i>";
echo $lang['web_config_style_gray'];
echo "</li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_style_name_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['nc_sort'];
echo ":</label>\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['web_array']['web_sort'];
echo "\" name=\"web_sort\" id=\"web_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_sort_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['nc_display'];
echo ":\r\n            </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"show1\" class=\"cb-enable ";
if ( $output['web_array']['web_show'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"show0\" class=\"cb-disable ";
if ( $output['web_array']['web_show'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"show1\" name=\"web_show\" ";
if ( $output['web_array']['web_show'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"show0\" name=\"web_show\" ";
if ( $output['web_array']['web_show'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\r\n\t\$(\".home-templates-board-style .";
echo $output['web_array']['style_name'];
echo "\").addClass(\"selected\");\r\n\t\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#web_form\").valid()){\r\n     \$(\"#web_form\").submit();\r\n\t\t}\r\n\t});\r\n\t\$(\".home-templates-board-style li\").click(function(){\r\n    \$(\".home-templates-board-style li\").removeClass(\"selected\");\r\n    \$(\"#style_name\").val(\$(this).attr(\"class\"));\r\n    \$(this).addClass(\"selected\");\r\n\t});\r\n\t\$(\"#web_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n            web_name : {\r\n                required : true\r\n            },\r\n            web_sort : {\r\n                required : true,\r\n                digits   : true\r\n            }\r\n        },\r\n        messages : {\r\n            web_name : {\r\n                required : \"";
echo $lang['web_config_add_name_null'];
echo "\"\r\n            },\r\n            web_sort  : {\r\n                required : \"";
echo $lang['web_config_sort_int'];
echo "\",\r\n                digits   : \"";
echo $lang['web_config_sort_int'];
echo "\"\r\n            }\r\n        }\r\n\t});\r\n});\r\n\r\n</script> \r\n";
?>
