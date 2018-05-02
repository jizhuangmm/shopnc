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
echo $lang['article_class_index_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=article_class&op=article_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['article_class_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['article_class_index_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post'>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w48\"></th>\r\n          <th class=\"w48\">";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['article_class_index_name'];
echo "</th>\r\n          <th class=\"w96 align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['class_list'] ) || is_array( $output['class_list'] ) )
{
		echo "        ";
		foreach ( $output['class_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td>";
				if ( $v['ac_code'] == "" )
				{
						echo "            <input type=\"checkbox\" name='check_ac_id[]' value=\"";
						echo $v['ac_id'];
						echo "\" class=\"checkitem\">\r\n            ";
				}
				else
				{
						echo "            <input name=\"\" type=\"checkbox\" disabled=\"disabled\" value=\"\" />\r\n            ";
				}
				echo "            ";
				if ( $v['have_child'] == "1" )
				{
						echo "            <img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/tv-expandable.gif\" fieldid=\"";
						echo $v['ac_id'];
						echo "\" status=\"open\" nc_type=\"flex\">\r\n            ";
				}
				else
				{
						echo "            <img fieldid=\"";
						echo $v['ac_id'];
						echo "\" status=\"close\" nc_type=\"flex\" src=\"";
						echo TEMPLATES_PATH;
						echo "/images/tv-item.gif\">\r\n            ";
				}
				echo "</td>\r\n          <td class=\"sort\"><span title=\"";
				echo $lang['nc_editable'];
				echo "\" ajax_branch='article_class_sort' datatype=\"number\" fieldid=\"";
				echo $v['ac_id'];
				echo "\" fieldname=\"ac_sort\" nc_type=\"inline_edit\" class=\"editable\">";
				echo $v['ac_sort'];
				echo "</span></td>\r\n          <td class=\"name\"><span title=\"";
				echo $lang['nc_editable'];
				echo "\" required=\"1\" fieldid=\"";
				echo $v['ac_id'];
				echo "\" ajax_branch='article_class_name' fieldname=\"ac_name\" nc_type=\"inline_edit\" class=\"editable tooltip\">";
				echo $v['ac_name'];
				echo "</span> <a class='btn-add-nofloat marginleft' href=\"index.php?act=article_class&op=article_class_add&ac_parent_id=";
				echo $v['ac_id'];
				echo "\"><span>";
				echo $lang['nc_add_sub_class'];
				echo "</span></a></td>\r\n          <td class=\"align-center\"><a href=\"index.php?act=article_class&op=article_class_edit&ac_id=";
				echo $v['ac_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>\r\n            ";
				if ( $v['ac_code'] == "" )
				{
						echo "            | <a href=\"javascript:if(confirm('";
						echo $lang['article_class_index_ensure_del'];
						echo "'))window.location = 'index.php?act=article_class&op=article_class_del&ac_id=";
						echo $v['ac_id'];
						echo "';\">";
						echo $lang['nc_del'];
						echo "</a>\r\n            ";
				}
				echo "</td>\r\n        </tr>\r\n        ";
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
		echo "        <tr>\r\n          <td><label for=\"checkall1\">\r\n              <input type=\"checkbox\" class=\"checkall\" id=\"checkall_2\">\r\n            </label></td>\r\n          <td colspan=\"16\"><label for=\"checkall_2\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['article_class_index_ensure_del'];
		echo "')){\$('form:first').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.article_class.js\" charset=\"utf-8\"></script> \r\n";
?>
