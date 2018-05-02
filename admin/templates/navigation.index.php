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
echo $lang['navigation_index_nav'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=navigation&op=navigation_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" value=\"navigation\" name=\"act\">\r\n    <input type=\"hidden\" value=\"navigation\" name=\"op\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_nav_title\">";
echo $lang['navigation_index_title'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search_nav_title'];
echo "\" name=\"search_nav_title\" id=\"search_nav_title\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['navigation_index_location'];
echo "</label></th>\r\n          <td><select name=\"search_nav_location\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              <option value=\"0\" ";
if ( $output['search_nav_location'] == "0" )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['navigation_index_top'];
echo "</option>\r\n              <option value=\"1\" ";
if ( $output['search_nav_location'] == "1" )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['navigation_index_center'];
echo "</option>\r\n              <option value=\"2\" ";
if ( $output['search_nav_location'] == "2" )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['navigation_index_bottom'];
echo "</option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_nav_title'] != "" || $output['search_nav_location'] != "" )
{
		echo "            <a class=\"btns\" href=\"index.php?act=navigation&op=navigation\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"form_nav\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\">";
echo $lang['navigation_index_nav'];
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['navigation_index_title'];
echo "</th>\r\n          <th>";
echo $lang['navigation_index_url'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['navigation_index_location'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['navigation_index_open_new'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['navigation_list'] ) || is_array( $output['navigation_list'] ) )
{
		echo "        ";
		foreach ( $output['navigation_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"del_id[]\" value=\"";
				echo $v['nav_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w48 sort\"><span title=\"";
				echo $lang['nc_editable'];
				echo "\" style=\"cursor:pointer;\"  ajax_branch='nav_sort' datatype=\"number\" fieldid=\"";
				echo $v['nav_id'];
				echo "\" fieldname=\"nav_sort\" nc_type=\"inline_edit\" class=\"editable\">";
				echo $v['nav_sort'];
				echo "</span></td>\r\n          <td>";
				echo $v['nav_title'];
				echo "</td>\r\n          <td>";
				echo $v['nav_url'];
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				echo $v['nav_location'];
				echo "</td>\r\n          <td class=\"w150 align-center\">";
				echo $v['nav_new_open'];
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=navigation&op=navigation_edit&nav_id=";
				echo $v['nav_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "'))window.location = 'index.php?act=navigation&op=navigation_del&nav_id=";
				echo $v['nav_id'];
				echo "';\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['navigation_list'] ) || is_array( $output['navigation_list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['nc_ensure_del'];
		echo "')){\$('#form_nav').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script>";
?>
