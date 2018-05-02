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
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['pending'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_grade&op=store_grade_log\" ><span>";
echo $lang['grade_apply'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" value=\"store\" name=\"act\">\r\n    <input type=\"hidden\" value=\"store_audit\" name=\"op\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"store_name\">";
echo $lang['store_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"\" name=\"store_name\" id=\"store_name\" class=\"txt\"></td>\r\n          <th><label for=\"owner_and_name\">";
echo $lang['store_user'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"\" name=\"owner_and_name\" id=\"owner_and_name\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['belongs_level'];
echo "</label></th>\r\n          <td><select name=\"grade_id\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['grade_list'] ) || is_array( $output['grade_list'] ) )
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
echo "            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['owner_and_name'] != "" || $output['store_name'] != "" || $output['grade_id'] != "" )
{
		echo "            <a href=\"index.php?act=store&op=store_audit\" class=\"btns tooltip\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['store_audit_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"store_form\" name=\"store_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"type\" id=\"type\" value=\"\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['store_name'];
echo "</th>\r\n          <th>";
echo $lang['store_user_name'];
echo "</th>\r\n          <th>";
echo $lang['location'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['belongs_level'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['period_to'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['state'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['operation'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['store_list'] ) || is_array( $output['store_list'] ) )
{
		echo "        ";
		foreach ( $output['store_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td><input type=\"checkbox\" value=\"";
				echo $v['store_id'];
				echo "\" name=\"del_id[]\" class=\"checkitem\"></td>\r\n          <td class=\"w48 sort\"><span title=\"";
				echo $lang['editable'];
				echo "\" style=\"cursor:pointer;\"  fieldid=\"";
				echo $v['store_id'];
				echo "\"  ajax_branch='store_sort' fieldname=\"store_sort\" nc_type=\"inline_edit\" class=\"node_name editable\">";
				echo $v['store_sort'];
				echo "</span></td>\r\n          <td>";
				echo $v['store_name'];
				echo "</td>\r\n          <td>";
				echo $v['member_name'];
				echo "</td>\r\n          <td class=\"w150\">";
				echo $v['area_info'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['grade_name'];
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				echo $v['store_end_time'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['state'];
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=store&op=store_edit&store_id=";
				echo $v['store_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['are_you_sure_del_store'];
				echo "')){location.href='index.php?act=store&op=store_audit&type=del&id=";
				echo $v['store_id'];
				echo "';}\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"15\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\"  onclick=\"audit_submit('ok');\" name=\"id\" ><span>";
echo $lang['nc_pass'];
echo "</span></a> \r\n            <!-- <input type=\"button\" onclick=\"audit_submit('del');\" value=\"";
echo $lang['nc_refuse'];
echo "\" class=\"btn btn-red\"> -->\r\n            \r\n            <div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script>\r\nfunction audit_submit(type){\r\n\t\$('#type').val(type);\r\n\t\$(\"#store_form\").submit();\r\n\treturn true;\r\n}\r\n</script>\r\n";
?>
