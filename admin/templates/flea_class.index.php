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
echo $lang['flea_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_export\" ><span>";
echo $lang['goods_class_index_export'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_import\" ><span>";
echo $lang['goods_class_index_import'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n   <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['flea_class_help1'];
echo "</li>\r\n            <li>";
echo $lang['flea_class_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post'>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"submit_type\" id=\"submit_type\" value=\"\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['goods_class_index_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_display'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['goods_class_index_display_in_homepage'];
echo "</th>\r\n          <th>";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['class_list'] ) || is_array( $output['class_list'] ) )
{
		echo "        ";
		foreach ( $output['class_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w36\"><input type=\"checkbox\" name=\"check_gc_id[]\" value=\"";
				echo $v['gc_id'];
				echo "\" class=\"checkitem\">\r\n            ";
				if ( $v['have_child'] == "1" )
				{
						echo "            <img fieldid=\"";
						echo $v['gc_id'];
						echo "\" status=\"open\" nc_type=\"flex\" src=\"";
						echo TEMPLATES_PATH;
						echo "/images/tv-expandable.gif\">\r\n            ";
				}
				else
				{
						echo "            <img fieldid=\"";
						echo $v['gc_id'];
						echo "\" status=\"close\" nc_type=\"flex\" src=\"";
						echo TEMPLATES_PATH;
						echo "/images/tv-item.gif\">\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w48 sort\"><span title=\"";
				echo $lang['nc_editable'];
				echo "\" ajax_branch=\"goods_class_sort\" datatype=\"number\" fieldid=\"";
				echo $v['gc_id'];
				echo "\" fieldname=\"gc_sort\" nc_type=\"inline_edit\" class=\"editable tooltip\">";
				echo $v['gc_sort'];
				echo "</span></td>\r\n          <td class=\"w50pre name\">\r\n          <span title=\"";
				echo $lang['nc_editable'];
				echo "\" required=\"1\" fieldid=\"";
				echo $v['gc_id'];
				echo "\" ajax_branch=\"goods_class_name\" fieldname=\"gc_name\" nc_type=\"inline_edit\" class=\"editable tooltip\">";
				echo $v['gc_name'];
				echo "</span>\r\n          <a class=\"btn-add-nofloat marginleft\" href=\"index.php?act=flea_class&op=goods_class_add&gc_parent_id=";
				echo $v['gc_id'];
				echo "\"><span>";
				echo $lang['nc_add_sub_class'];
				echo "</span></a>\r\n          </td>\r\n          <td class=\"align-center power-onoff\">";
				if ( $v['gc_show'] == 0 )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" fieldvalue=\"0\" fieldid=\"";
						echo $v['gc_id'];
						echo "\" ajax_branch=\"goods_class_show\" fieldname=\"gc_show\" nc_type=\"inline_edit\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" fieldvalue=\"1\" fieldid=\"";
						echo $v['gc_id'];
						echo "\" ajax_branch=\"goods_class_show\" fieldname=\"gc_show\" nc_type=\"inline_edit\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"align-center power-onoff\">";
				if ( $v['gc_index_show'] == 0 )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" fieldvalue=\"0\" fieldid=\"";
						echo $v['gc_id'];
						echo "\" ajax_branch=\"goods_class_index_show\" fieldname=\"gc_index_show\" nc_type=\"inline_edit\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" fieldvalue=\"1\" fieldid=\"";
						echo $v['gc_id'];
						echo "\" ajax_branch=\"goods_class_index_show\" fieldname=\"gc_index_show\" nc_type=\"inline_edit\"  title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"w84\"><a href=\"index.php?act=flea_class&op=goods_class_edit&gc_id=";
				echo $v['gc_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:if(confirm('";
				echo $lang['goods_class_index_ensure_del'];
				echo "'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=";
				echo $v['gc_id'];
				echo "';\">";
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
echo "      </tbody>\r\n      ";
if ( !empty( $output['class_list'] ) || is_array( $output['class_list'] ) )
{
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\"></td>\r\n          <td id=\"batchAction\" colspan=\"15\"><span class=\"all_checkbox\">\r\n            <label for=\"checkall_2\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            </span>&nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['goods_class_index_ensure_del'];
		echo "')){\$('#submit_type').val('del');\$('form:first').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"\$('#submit_type').val('brach_edit');\$('form:first').submit();\"><span>";
		echo $lang['nc_edit'];
		echo "</span></a><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"\$('#submit_type').val('index_show');\$('form:first').submit();\"><span>";
		echo $lang['goods_class_index_display_in_homepage'];
		echo "</span></a> \r\n            \r\n            <!--<span>";
		echo $lang['goods_class_index_display_tip'];
		echo "</span>--></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.flea_class.js\" charset=\"utf-8\"></script> \r\n";
?>
