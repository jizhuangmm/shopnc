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
echo $lang['goods_class_index_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=goods_class&op=goods_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=goods_class&op=goods_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=goods_class&op=goods_class_export\" ><span>";
echo $lang['goods_class_index_export'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=goods_class&op=goods_class_import\" ><span>";
echo $lang['goods_class_index_import'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['goods_class_index_tag'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['goods_class_tag_prompts_one'];
echo "</li>\r\n            <li>";
echo $lang['goods_class_tag_prompts_two'];
echo "</li>\r\n            <li>";
echo $lang['goods_class_tag_prompts_three'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_tag\">\r\n    <input type=\"hidden\" value=\"ok\" name=\"form_submit\" />\r\n    <input type=\"hidden\" value=\"\" id=\"submit_type\" name=\"submit_type\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th class=\"w33pre\">";
echo $lang['goods_class_tag_name'];
echo "</th>\r\n          <th>";
echo $lang['goods_class_tag_value'];
echo "</th>\r\n          <th class=\"w48\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['tag_list'] ) || is_array( $output['tag_list'] ) )
{
		echo "        ";
		foreach ( $output['tag_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td><input class=\"checkitem\" type=\"checkbox\" value=\"";
				echo $v['gc_tag_id'];
				echo "\" name=\"tag_id[]\"></td>\r\n          <td class=\"name\">";
				echo $v['gc_tag_name'];
				echo "</td>\r\n          <td class=\"tag\"><span title=\"";
				echo $lang['nc_editable'];
				echo "\" required=\"1\" fieldid=\"";
				echo $v['gc_tag_id'];
				echo "\" ajax_branch=\"goods_class_tag_value\" fieldname=\"gc_tag_value\" nc_type=\"inline_edit\" class=\"tooltip editable\">";
				echo $v['gc_tag_value'];
				echo "</span></td>\r\n          <td><a href=\"javascript:if(confirm('";
				echo $lang['goods_class_tag_del_confirm'];
				echo "'))window.location = 'index.php?act=goods_class&op=tag_del&tag_id=";
				echo $v['gc_tag_id'];
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
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input id=\"checkallBottom\" class=\"checkall\" type=\"checkbox\"></td>\r\n          <td colspan=\"18\"><span class=\"all_checkbox\">\r\n            <label for=\"checkall_2\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            </span>&nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('del')\"><span>";
echo $lang['nc_del'];
echo "</span></a> <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"\$('#dialog').show();location.href='index.php?act=goods_class&op=update_tag_name'\"><span>";
echo $lang['goods_class_tag_update'];
echo "</span></a> <a class=\"btn\" href=\"JavaScript:void(0);\" onclick=\"if(confirm('";
echo $lang['goods_class_tag_reset_confirm'];
echo "')){location.href='index.php?act=goods_class&op=reset_tag'}\"> <span>";
echo $lang['goods_class_tag_reset'];
echo "</span> </a>\r\n            ";
if ( !empty( $output['tag_list'] ) || is_array( $output['tag_list'] ) )
{
		echo "            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<div id=\"dialog\" style=\"display: none; top: 344px; left: 430px;\">";
echo $lang['goods_class_tag_update_prompt'];
echo "</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.goods_class.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nfunction submit_form(type){\r\n\tvar id='';\r\n\t\$('input[type=checkbox]:checked').each(function(){\r\n\t\tif(!isNaN(\$(this).val())){\r\n\t\t\tid += \$(this).val();\r\n\t\t}\r\n\t});\r\n\tif(id == ''){\r\n\t\talert('";
echo $lang['goods_class_tag_choose_data'];
echo "');\r\n\t\treturn false;\r\n\t}\r\n\tif(type == 'del'){\r\n\t\tif(!confirm('";
echo $lang['goods_class_tag_del_confirm'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#submit_type').val(type);\r\n\t\$('#form_tag').submit();\r\n}\r\n</script>";
?>
