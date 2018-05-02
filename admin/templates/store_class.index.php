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
echo $lang['store_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_class&op=store_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_class&op=store_class_export\" ><span>";
echo $lang['export'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=store_class&op=store_class_import\" ><span>";
echo $lang['import'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['store_class_help1'];
echo "</li>\r\n            <li>";
echo $lang['store_class_help2'];
echo "</li>\r\n            <li>";
echo $lang['store_class_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' onsubmit=\"return false;\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th><input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\"></th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['store_class_name'];
echo "</th>\r\n          <th>";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['class_list'] ) || is_array( $output['class_list'] ) )
{
		echo "        ";
		foreach ( $output['class_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w36\"><input type=\"checkbox\" name='check_sc_id[]' value=\"";
				echo $v['sc_id'];
				echo "\" class=\"checkitem\">\r\n            ";
				if ( $v['have_child'] == "1" )
				{
						echo "            <img fieldid=\"";
						echo $v['sc_id'];
						echo "\" status=\"open\" nc_type=\"flex\" src=\"";
						echo TEMPLATES_PATH;
						echo "/images/tv-expandable.gif\">\r\n            ";
				}
				else
				{
						echo "            <img fieldid=\"";
						echo $v['sc_id'];
						echo "\" status=\"close\" nc_type=\"flex\" src=\"";
						echo TEMPLATES_PATH;
						echo "/images/tv-item.gif\">\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w48 sort\"><span title=\"";
				echo $lang['can_edit'];
				echo "\" ajax_branch='store_class_sort' datatype=\"number\" fieldid=\"";
				echo $v['sc_id'];
				echo "\" fieldname=\"sc_sort\" nc_type=\"inline_edit\" class=\"editable\">";
				echo $v['sc_sort'];
				echo "</span></td>\r\n          <td class=\"name\">\r\n          \t<span title=\"";
				echo $lang['store_class_name'];
				echo "\" required=\"1\" fieldid=\"";
				echo $v['sc_id'];
				echo "\" ajax_branch='store_class_name' fieldname=\"sc_name\" nc_type=\"inline_edit\" class=\"node_name editable\">";
				echo $v['sc_name'];
				echo "</span>\r\n          \t<a class='btn-add-nofloat marginleft' href=\"index.php?act=store_class&op=store_class_add&sc_parent_id=";
				echo $v['sc_id'];
				echo "\">";
				echo $lang['add_lower'];
				echo "</a>\r\n          </td>\r\n          <td class=\"w84\"><span><a href=\"index.php?act=store_class&op=store_class_edit&sc_id=";
				echo $v['sc_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:if(confirm('";
				echo $lang['del_store_class'];
				echo "'))window.location = 'index.php?act=store_class&op=store_class_del&sc_id=";
				echo $v['sc_id'];
				echo "';\">";
				echo $lang['nc_del'];
				echo "</a> </span></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['class_list'] ) || is_array( $output['class_list'] ) )
{
		echo "        <tr id=\"batchAction\" >\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"dataFuncs\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['del_store_class'];
		echo "')){\$('form:first').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.store_class.js\" charset=\"utf-8\"></script> ";
?>
