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
echo $lang['store'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store&op=store\" ><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_audit\" ><span>";
echo $lang['pending'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_log\" ><span>";
echo $lang['grade_apply'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit_all'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"form1\" id=\"store_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"id\" value=\"";
echo $output['id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['location'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><div class=\"select_add\" id=\"region\" style=\"width:500px;border:1px solide red;\">\r\n              <input type=\"hidden\" name=\"area_id\" id=\"area_id\" value=\"\" class=\"area_ids\" />\r\n              <input type=\"hidden\" name=\"area_info\" value=\"\" class=\"area_names\" />\r\n              <select class=\"d_inline\">\r\n              </select>\r\n            </div></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['belongs_level'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select id=\"grade_id\" name=\"grade_id\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( is_array( $output['grade_list'] ) )
{
		echo "              ";
		foreach ( $output['grade_list'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $v['sg_id'];
				echo "\">";
				echo $v['sg_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['no_edit_please_no_choose'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['certification'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" checked=\"checked\" value=\"0\" name=\"certification\" id=\"certification0\">\r\n                <label for=\"certification0\">";
echo $lang['unchanged'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"1\" name=\"certification\" id=\"certification1\">\r\n                <label for=\"certification1\">";
echo $lang['to'];
echo "</label>\r\n                (\r\n                <input type=\"checkbox\" disabled=\"disabled\" class=\"certification\" value=\"1\" id=\"name_auth\" name=\"name_auth\">\r\n                <label for=\"name_auth\">";
echo $lang['owner_certification'];
echo "</label>\r\n                <input type=\"checkbox\" disabled=\"disabled\" class=\"certification\" id=\"store_auth\" value=\"1\" name=\"store_auth\">\r\n                <label for=\"store_auth\">";
echo $lang['entity_store_certification'];
echo "</label>\r\n                )</li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['recommended'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" checked=\"checked\" value=\"-1\" name=\"store_recommend\" id=\"store_recommend-1\">\r\n                <label for=\"store_recommend-1\">";
echo $lang['unchanged'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"1\" name=\"store_recommend\" id=\"store_recommend1\">\r\n                <label for=\"store_recommend1\">";
echo $lang['nc_yes'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"0\" name=\"store_recommend\" id=\"store_recommend0\">\r\n                <label for=\"store_recommend0\">";
echo $lang['nc_no'];
echo "</label>\r\n              </li>\r\n            </ul>\r\n            </p></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"store_sort\" name=\"store_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['no_edit_please_null'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script>\r\n<style type=\"text/css\">\r\n.d_inline{display:inline;}\r\n</style>\r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\n\$(function(){\r\n\tregionInit(\"region\");\r\n\t\r\n\t\$(\"#submitBtn\").click(function(){\r\n    \tif(\$(\"#store_form\").valid()){\r\n    \t\t\$(\"#store_form\").submit();\r\n\t\t}\r\n\t});\r\n\t\$('#store_form').validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n\t\trules : {\r\n\t\t\tarea_id: {\r\n\t\t\t\tcheckarea : true\r\n\t\t\t}\r\n\t\t},\r\n\t\tmessages : {\r\n\t\t\tarea_id: {\r\n\t\t\t\tcheckarea: '";
echo $lang['please_input_address'];
echo "'\r\n\t\t\t}\r\n\t\t}\r\n\t});\r\n\t\$('input[name=certification]').click(function(){\r\n\t\tif(\$(this).val() == 1){\r\n\t\t\t\$('#name_auth').attr('disabled',false);\r\n\t\t\t\$('#store_auth').attr('disabled',false);\r\n\t\t}else {\r\n\t\t\t\$('#name_auth').attr('disabled',true);\r\n\t\t\t\$('#store_auth').attr('disabled',true);\r\n\t\t}\r\n\t});\r\n})\r\n</script>";
?>
