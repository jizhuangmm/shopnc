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
echo $lang['activity_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=activity&op=activity\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" enctype=\"multipart/form-data\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\"><label class=\"validation\" for=\"activity_title\">";
echo $lang['activity_index_title'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"activity_title\" name=\"activity_title\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr style=\"display:none;\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" >";
echo $lang['activity_index_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\" style=\"display:none;\">\r\n          <td class=\"vatop rowform\"><select name=\"activity_type\">\r\n              <option value=\"1\">";
echo $lang['activity_index_goods'];
echo "</option>\r\n              <option value=\"2\">";
echo $lang['activity_index_group'];
echo "</option>\r\n              </optgroup>\r\n            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['activity_new_type_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" >";
echo $lang['activity_index_start'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"activity_start_date\" name=\"activity_start_date\" class=\"txt date\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" >";
echo $lang['activity_index_end'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"activity_end_date\" name=\"activity_end_date\" class=\"txt date\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" >";
echo $lang['activity_index_banner'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform type-file-box\">\r\n              <input type=\"file\" class=\"type-file-file\" id=\"activity_banner\" name=\"activity_banner\" size=\"30\" hidefocus=\"true\"  nc_type=\"upload_activity_banner\" title=\"";
echo $lang['activity_index_banner'];
echo "\">\r\n          </td>\r\n          <td class=\"vatop tips\">";
echo $lang['activity_new_banner_tip'];
echo "</td>\r\n        </tr>\r\n        <tr style=\"display:none;\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['activity_new_style'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\" style=\"display:none;\">\r\n          <td class=\"vatop rowform\"><select id=\"activity_style\" name=\"activity_style\">\r\n              <option value=\"default_style\">";
echo $lang['activity_index_default'];
echo "</option>\r\n            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['activity_new_style_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"activity_desc\">";
echo $lang['activity_new_desc'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"activity_desc\" id=\"activity_desc\" rows=\"6\" class=\"tarea\"></textarea></td>\r\n          <td class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\"  for=\"activity_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"activity_sort\" name=\"activity_sort\" class=\"txt\" value=\"0\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['activity_new_sort_tip1'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"activity_sort\">";
echo $lang['activity_openstate'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\">\r\n          \t<label for=\"activity_state1\" class=\"cb-enable selected\" ><span>";
echo $lang['activity_openstate_open'];
echo "</span></label>\r\n            <label for=\"activity_state0\" class=\"cb-disable\"><span>";
echo $lang['activity_openstate_close'];
echo "</span></label>\r\n            <input id=\"activity_state1\" name=\"activity_state\" checked=\"checked\" value=\"1\" type=\"radio\">\r\n            <input id=\"activity_state0\" name=\"activity_state\" value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH."/js/jquery-ui/themes/ui-lightness/jquery.ui.css";
echo "\"/>\r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/jquery.ui.js";
echo "\"></script> \r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/i18n/zh-CN.js";
echo "\" charset=\"utf-8\"></script> \r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#add_form\").valid()){\r\n     \$(\"#add_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n\$(document).ready(function(){\r\n\t\$(\"#activity_start_date\").datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$(\"#activity_end_date\").datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tactivity_title: {\r\n        \t\trequired : true\r\n        \t},\r\n        \tactivity_start_date: {\r\n        \t\trequired : true,\r\n\t\t\t\tdate      : false\r\n        \t},\r\n        \tactivity_end_date: {\r\n        \t\trequired : true,\r\n\t\t\t\tdate      : false\r\n        \t},\r\n        \tactivity_desc: {\r\n        \t\trequired : true\r\n        \t},\r\n        \tactivity_banner: {\r\n        \t\trequired: true,\r\n\t\t\t\taccept : 'png|jpe?g|gif'\t\r\n\t\t\t},\r\n        \tactivity_sort: {\r\n        \t\trequired : true,\r\n        \t\tmin:0,\r\n        \t\tmax:255\r\n        \t}\r\n        },\r\n        messages : {\r\n        \tactivity_title: {\r\n        \t\trequired : '";
echo $lang['activity_new_title_null'];
echo "'\r\n        \t},\r\n        \tactivity_start_date: {\r\n        \t\trequired : '";
echo $lang['activity_new_startdate_null'];
echo "'\r\n        \t},\r\n        \tactivity_end_date: {\r\n        \t\trequired : '";
echo $lang['activity_new_enddate_null'];
echo "'\r\n        \t},\r\n        \tactivity_desc: {\r\n        \t\trequired : '";
echo $lang['activity_new_desc_null'];
echo "'\r\n        \t},\r\n\t\t\tactivity_banner: {\r\n        \t\trequired : '";
echo $lang['activity_new_banner_null'];
echo "',\r\n\t\t\t\taccept   : '";
echo $lang['activity_new_ing_wrong'];
echo "'\t\r\n\t\t\t},\r\n        \tactivity_sort: {\r\n        \t\trequired : '";
echo $lang['activity_new_sort_null'];
echo "',\r\n        \t\tmin:'";
echo $lang['activity_new_sort_minerror'];
echo "',\r\n        \t\tmax:'";
echo $lang['activity_new_sort_maxerror'];
echo "'\r\n        \t}\r\n        }\r\n\t});\r\n});\r\n\r\n\$(function(){\r\n// 模拟活动页面横幅Banner上传input type='file'样式\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#activity_banner\");\r\n    \$(\"#activity_banner\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#activity_banner\").val());\r\n    });\r\n});\r\n</script> ";
?>
