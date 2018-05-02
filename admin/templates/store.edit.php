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
echo "<style type=\"text/css\">\r\n.d_inline {\r\n\tdisplay:inline;\r\n}\r\n</style>\r\n\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['store'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=store&op=store\"><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store&op=store_audit\" ><span>";
echo $lang['pending'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_log\" ><span>";
echo $lang['grade_apply'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"store_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"store_id\" value=\"";
echo $output['store_array']['store_id'];
echo "\" />\r\n    <input type=\"hidden\" name=\"store_audit\" value=\"";
echo $output['store_array']['store_audit'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['store_user_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['store_array']['member_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_owner_card\">";
echo $lang['store_user_id'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_owner_card'];
echo "\" id=\"store_owner_card\" name=\"store_owner_card\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"store_name\"> ";
echo $lang['store_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_name'];
echo "\" id=\"store_name\" name=\"store_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['belongs_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"sc_id\">\r\n              <option value=\"0\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( is_array( $output['class_list'] ) )
{
		echo "              ";
		foreach ( $output['class_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['store_array']['sc_id'] == $v['sc_id'] )
				{
						echo "selected=\"selected\"";
				}
				echo " value=\"";
				echo $v['sc_id'];
				echo "\">";
				echo $v['sc_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['location'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><div id=\"region\" class=\"change-select-2\">\r\n              ";
if ( !empty( $output['store_array']['area_id'] ) )
{
		echo "              <span>";
		echo $output['store_array']['area_info'];
		echo "</span>\r\n              <input type=\"button\" value=\"";
		echo $lang['nc_edit'];
		echo "\" class=\"edit_region\" />\r\n              <select style=\"display:none\">\r\n              </select>\r\n              ";
}
else
{
		echo "              <select>\r\n              </select>\r\n              ";
}
echo "              <input type=\"hidden\" name=\"area_id\" id=\"area_id\" value=\"";
echo $output['store_array']['area_id'];
echo "\" class=\"area_ids\" />\r\n              <input type=\"hidden\" name=\"area_info\" value=\"";
echo $output['store_array']['area_info'];
echo "\" class=\"area_names\" />\r\n            </div></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_address\">";
echo $lang['details_address'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_address'];
echo "\" id=\"store_address\" name=\"store_address\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_zip\">";
echo $lang['zip'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_zip'];
echo "\" id=\"store_zip\" name=\"store_zip\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_tel\">";
echo $lang['tel_phone'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_tel'];
echo "\" id=\"store_tel\" name=\"store_tel\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>\r\n            <label for=\"grade_id\"> ";
echo $lang['belongs_level'];
echo ": </label>\r\n            </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select id=\"grade_id\" name=\"grade_id\">\r\n              ";
if ( is_array( $output['grade_list'] ) )
{
		echo "              ";
		foreach ( $output['grade_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['store_array']['grade_id'] == $v['sg_id'] )
				{
						echo "selected=\"selected\"";
				}
				echo " value=\"";
				echo $v['sg_id'];
				echo "\">";
				echo $v['sg_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['period_to'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_end_time'];
echo "\" id=\"end_time\" name=\"end_time\" class=\"txt date\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['formart'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>\r\n            <label for=\"state\">";
echo $lang['state'];
echo ":</label>\r\n            </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"store_state1\" class=\"cb-enable ";
if ( $output['store_array']['store_state'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['open'];
echo "</span></label>\r\n            <label for=\"store_state0\" class=\"cb-disable ";
if ( $output['store_array']['store_state'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['close'];
echo "</span></label>\r\n            <input id=\"store_state1\" name=\"store_state\" ";
if ( $output['store_array']['store_state'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " onclick=\"\$('#tr_store_close_info').hide();\" value=\"1\" type=\"radio\">\r\n            <input id=\"store_state0\" name=\"store_state\" ";
if ( $output['store_array']['store_state'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " onclick=\"\$('#tr_store_close_info').show();\" value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"tr_store_close_info\">\r\n        <tr >\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_close_info\">";
echo $lang['close_reason'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"store_close_info\" rows=\"6\" class=\"tarea\" id=\"store_close_info\">";
echo $output['store_array']['store_close_info'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['certification'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <label for=\"name_auth\">\r\n                  <input type=\"checkbox\" ";
if ( $output['store_array']['name_auth'] == 1 )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" id=\"name_auth\" name=\"name_auth\">\r\n                  ";
echo $lang['owner_certification'];
echo "</label>\r\n                &nbsp;\r\n                ";
if ( $output['store_array']['store_image'] != "" )
{
		echo "                <a id=\"store_image\" href=\"../";
		echo ATTACH_AUTH.DS.$output['store_array']['store_image'];
		echo "\" target=\"_blank\">";
		echo $lang['view_owner_certification_file'];
		echo "</a>\r\n                <span id=\"store_image_del\" onclick=\"if(confirm('";
		echo $lang['owner_certification_del'];
		echo "')){del_auth('store_image');}\">";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;".$lang['nc_del'];
		echo "</span>\r\n\t\t\t\t";
}
echo "              </li>\r\n              <li>\r\n                <label for=\"material\">\r\n                  <input type=\"checkbox\" ";
if ( $output['store_array']['store_auth'] == 1 )
{
		echo "checked=\"checked\"";
}
echo " id=\"store_auth\" value=\"1\" name=\"store_auth\">\r\n                  ";
echo $lang['entity_store_certification'];
echo "</label>\r\n                &nbsp;\r\n                ";
if ( $output['store_array']['store_image1'] != "" )
{
		echo "                <a id=\"store_image1\" href=\"../";
		echo ATTACH_AUTH.DS.$output['store_array']['store_image1'];
		echo "\" target=\"_blank\">";
		echo $lang['view_entity_store_certification_file'];
		echo "</a><span id=\"store_image1_del\" onclick=\"if(confirm('";
		echo $lang['entity_store_certification_del'];
		echo "')){del_auth('store_image1');}\">";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;".$lang['nc_del'];
		echo "</span>\r\n                ";
}
echo "\t\t\t\t\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['recommended'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"store_recommend1\" class=\"cb-enable ";
if ( $output['store_array']['store_recommend'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"store_recommend0\" class=\"cb-disable ";
if ( $output['store_array']['store_recommend'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"store_recommend1\" name=\"store_recommend\" ";
if ( $output['store_array']['store_recommend'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"store_recommend0\" name=\"store_recommend\" ";
if ( $output['store_array']['store_recommend'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['recommended_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"store_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['store_array']['store_sort'];
echo "\" id=\"store_sort\" name=\"store_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script src=\"";
echo RESOURCE_PATH."/js/jquery-ui/i18n/zh-CN.js";
echo "\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\nfunction del_auth(key){\r\nvar store_id='";
echo $output['store_array']['store_id'];
echo "';\r\n\t\$.get(\"index.php?act=store&&op=del_auth\",{'key':key,'store_id':store_id},function(date){\r\n\t\tif(date){\r\n\t\t\t\$(\"#\"+key).remove();\r\n\t\t\t\$(\"#\"+key+\"_del\").remove();\r\n\t\t\talert('";
echo $lang['certification_del_success'];
echo "');\r\n\t\t}\r\n\t\telse{\r\n\t\t\talert('";
echo $lang['certification_del_fail'];
echo "');\r\n\t\t}\r\n\t});\r\n}\r\n\$(function(){\r\n\t\r\n\t\$('#end_time').datepicker();\r\n\t\$('input[name=store_state][value=";
echo $output['store_array']['store_state'];
echo "]').trigger('click');\r\n\tregionInit(\"region\");\r\n\t\$('input[class=\"edit_region\"]').click(function(){\r\n\t\t\$(this).css('display','none');\r\n\t\t\$(this).parent().children('select').css('display','');\r\n\t\t\$(this).parent().children('span').css('display','none');\r\n\t});\r\n//按钮先执行验证再提交表单\r\n\r\n\t\$(\"#submitBtn\").click(function(){\r\n    \tif(\$(\"#store_form\").valid()){\r\n    \t\t\$(\"#store_form\").submit();\r\n\t\t}\r\n\t});\r\n\r\n//\t\t\r\n\t\$('#store_form').validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n\t\tonkeyup    : false,\r\n\t\trules : {\r\n\t\t\tstore_name: {\r\n\t\t\t\trequired : true\r\n\t\t\t},\r\n\t\t\tarea_id: {\r\n\t\t\t\trequired: true,\r\n\t\t\t\tcheckarea : true\r\n\t\t\t},\r\n\t\t\tend_time\t: {\r\n\t\t\t\tdate\t: false\r\n\t\t\t}\r\n\t\t},\r\n\t\tmessages : {\r\n\t\t\tstore_name: {\r\n\t\t\t\trequired: '";
echo $lang['please_input_store_name'];
echo "'\r\n\t\t\t},\r\n            area_id: {\r\n            \trequired: '";
echo $lang['please_input_address'];
echo "',\r\n            \tcheckarea: '";
echo $lang['please_input_address'];
echo "'\r\n\t\t\t}\r\n\t\t}\r\n\t});\r\n});\r\n</script>";
?>
