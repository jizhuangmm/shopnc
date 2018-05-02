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
echo "<style type=\"text/css\">\n.d_inline {\n\tdisplay:inline;\n}\n</style>\n\n<div class=\"page\">\n  <div class=\"fixed-bar\">\n    <div class=\"item-title\">\n      <h3>";
echo $lang['store'];
echo "</h3>\n      <ul class=\"tab-base\">\n        <li><a href=\"index.php?act=store&op=store\" ><span>";
echo $lang['manage'];
echo "</span></a></li>\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\n        <li><a href=\"index.php?act=store&op=store_audit\" ><span>";
echo $lang['pending'];
echo "</span></a></li>\n        <li><a href=\"index.php?act=store_grade&op=store_grade_log\" ><span>";
echo $lang['grade_apply'];
echo "</span></a></li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"fixed-empty\"></div>\n  <form id=\"store_form\" method=\"post\">\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\n    <input type=\"hidden\" name=\"step\" value=\"two\" />\n    <input type=\"hidden\" name=\"member_name\" value=\"";
echo $output['member_array']['member_name'];
echo "\" />\n    <input type=\"hidden\" name=\"member_id\" value=\"";
echo $output['member_array']['member_id'];
echo "\" />\n    <table class=\"table tb-type2 nobdb\">\n      <tbody>\n        <tr class=\"noborder\">\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['store_user_name'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\">";
echo $output['member_array']['member_name'];
echo "</td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"store_owner_card\">";
echo $lang['store_user_id'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"store_owner_card\" name=\"store_owner_card\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"store_name\">";
echo $lang['store_name'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"store_name\" name=\"store_name\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['belongs_class'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><select name=\"sc_id\">\n              <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\n              ";
if ( is_array( $output['class_list'] ) )
{
		echo "              ";
		foreach ( $output['class_list'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $v['sc_id'];
				echo "\">";
				echo $v['sc_name'];
				echo "</option>\n              ";
		}
		echo "              ";
}
echo "            </select></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\"> ";
echo $lang['location'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><div class=\"select_add change-select-2\" id=\"region\">\n              <input type=\"hidden\" name=\"area_id\" value=\"\" class=\"area_ids\" />\n              <input type=\"hidden\" name=\"area_info\" value=\"\" class=\"area_names \" />\n              <select class=\"d_inline\">\n              </select>\n            </div></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"store_address\">";
echo $lang['details_address'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"store_address\" name=\"store_address\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"store_zip\">";
echo $lang['zip'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"store_zip\" name=\"store_zip\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"store_tel\">";
echo $lang['tel_phone'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" id=\"store_tel\" name=\"store_tel\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"grade_id\">";
echo $lang['belongs_level'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><select id=\"grade_id\" name=\"grade_id\">\n              ";
if ( is_array( $output['grade_list'] ) )
{
		echo "              ";
		foreach ( $output['grade_list'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $v['sg_id'];
				echo "\">";
				echo $v['sg_name'];
				echo "</option>\n              ";
		}
		echo "              ";
}
echo "            </select></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"end_time\">";
echo $lang['period_to'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"end_time\" name=\"end_time\" class=\"txt date\"></td>\n          <td class=\"vatop tips\">";
echo $lang['formart'];
echo "</td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"state\">";
echo $lang['state'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform onoff\"><label for=\"store_state1\" class=\"cb-enable selected\"><span>";
echo $lang['open'];
echo "</span></label>\n            <label for=\"store_state0\" class=\"cb-disable\" ><span>";
echo $lang['close'];
echo "</span></label>\n            <input id=\"store_state1\" name=\"store_state\" checked=\"\" onclick=\"\$('#tr_store_close_info').hide();\" value=\"1\" type=\"radio\">\n            <input id=\"store_state0\" name=\"store_state\" onclick=\"\$('#tr_store_close_info').show();\" value=\"0\" type=\"radio\"></td>\n        </tr>\n      </tbody>\n      <tbody id=\"tr_store_close_info\">\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label for=\"\">";
echo $lang['close_reason'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><label for=\"store_close_info\"></label>\n            <textarea rows=\"6\" class=\"tarea\" id=\"store_close_info\" name=\"store_close_info\"></textarea></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n      </tbody>\n      <tbody>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['certification'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\n              <li>\n                <label for=\"name_auth\">\n                  <input type=\"checkbox\" value=\"1\" id=\"name_auth\" name=\"name_auth\">\n                  ";
echo $lang['owner_certification'];
echo "</label>\n              </li>\n              <li>\n                <label for=\"material\">\n                  <input type=\"checkbox\" id=\"store_auth\" value=\"1\" name=\"store_auth\">\n                  ";
echo $lang['entity_store_certification'];
echo "</label>\n              </li>\n            </ul></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['recommended'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform onoff\"><label for=\"store_recommend1\" class=\"cb-enable selected\" ><span>";
echo $lang['nc_yes'];
echo "</span></label>\n            <label for=\"store_recommend0\" class=\"cb-disable\" ><span>";
echo $lang['nc_no'];
echo "</span></label>\n            <input id=\"store_recommend1\" name=\"store_recommend\" checked=\"\" value=\"1\" type=\"radio\">\n            <input id=\"store_recommend0\" name=\"store_recommend\" value=\"0\" type=\"radio\"></td>\n          <td class=\"vatop tips\">";
echo $lang['recommended_tips'];
echo "</td>\n        </tr>\n        <tr>\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_sort'];
echo ":</label></td>\n        </tr>\n        <tr class=\"noborder\">\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"0\" id=\"store_sort\" name=\"store_sort\" class=\"txt\"></td>\n          <td class=\"vatop tips\"></td>\n        </tr>\n      </tbody>\n      <tfoot>\n        <tr class=\"tfoot\">\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\n        </tr>\n      </tfoot>\n    </table>\n  </form>\n</div>\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/i18n/zh-CN.js";
echo "\" charset=\"utf-8\"></script>\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script> \n<script type=\"text/javascript\">\n\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\n\$(function(){\n\t\$('#end_time').datepicker();\n\tregionInit(\"region\");\t\n\t\$(\"#tr_store_close_info\").hide();\n//按钮先执行验证再提交表单\n\$(function(){\$(\"#submitBtn\").click(function(){\n    if(\$(\"#store_form\").valid()){\n     \$(\"#store_form\").submit();\n\t}\n\t});\n});\n//\t\n\t\$('#store_form').validate({\n\t\terrorPlacement: function(error, element){\n\t\t\terror.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));\n        },\n        success: function(label){\n            label.addClass('valid');\n        },\n\t\tonkeyup    : false,\n\t\trules : {\n\t\t\tstore_name: {\n\t\t\t\trequired : true\n\t\t\t},\n\t\t\tarea_id: {\n\t\t\t\trequired: true,\n\t\t\t\tcheckarea : true\n\t\t\t},\n\t\t\tend_time\t: {\n\t\t\t\tdate\t: false\n\t\t\t}\n\t\t},\n\t\tmessages : {\n\t\t\tstore_name: {\n\t\t\t\trequired: '";
echo $lang['please_input_store_name'];
echo "'\n\t\t\t},\n      area_id: {\n        required: '";
echo $lang['please_input_address'];
echo "',\n        checkarea: '";
echo $lang['please_input_address'];
echo "'\n\t\t\t}\n\t\t}\n\t});\n});\n</script>";
?>
