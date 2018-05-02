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
echo $lang['nc_type_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a class=\"current\" href=\"JavaScript:void(0);\"><span>";
echo $lang['nc_list'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=type&op=type_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table id=\"prompt\" class=\"table tb-type2\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"> <div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span> </div>\r\n        </th>\r\n      </tr>\r\n      <tr class=\"odd\">\r\n        <td><ul>\r\n            <li>";
echo $lang['type_index_prompts_one'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"form_spec\" method=\"get\">\r\n    <input type=\"hidden\" name=\"act\" value=\"type\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"type_del\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['type_index_type_name'];
echo "</th>\r\n          <th>";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['type_list'] ) || is_array( $output['type_list'] ) )
{
		echo "        ";
		foreach ( $output['type_list'] as $val )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" class=\"checkitem\" name=\"del_id[]\" value=\"";
				echo $val['type_id'];
				echo "\" /></td>\r\n          <td class=\"w48 sort\"><span class=\"tooltip editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\" maxvalue=\"255\" datatype=\"pint\" fieldid=\"";
				echo $val['type_id'];
				echo "\" ajax_branch=\"sort\" fieldname=\"type_sort\" nc_type=\"inline_edit\">";
				echo $val['type_sort'];
				echo "</span></td>\r\n          <td class=\"name\"><span>";
				echo $val['type_name'];
				echo "</span></td>\r\n          <td class=\"w150\"><a href=\"index.php?act=type&op=type_edit&t_id=";
				echo $val['type_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){location.href='index.php?act=type&op=type_del&del_id=";
				echo $val['type_id'];
				echo "';}else{return false;}\" href=\"javascript:void(0)\">";
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
if ( !empty( $output['type_list'] ) || is_array( $output['type_list'] ) )
{
		echo "      <tfoot>\r\n        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\" /></td>\r\n          <td id=\"dataFuncs\" colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>&nbsp;&nbsp;\r\n            <a class=\"btn\" onclick=\"submit_form('recommend');\" href=\"JavaScript:void(0);\"> <span>";
		echo $lang['nc_del'];
		echo "</span> </a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        <tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nfunction submit_form(type){\r\n\tvar id='';\r\n\t\$('input[type=checkbox]:checked').each(function(){\r\n\t\tif(!isNaN(\$(this).val())){\r\n\t\t\tid += \$(this).val();\r\n\t\t}\r\n\t});\r\n\tif(id == ''){\r\n\t\talert('";
echo $lang['nc_ensure_del'];
echo "');\r\n\t\treturn false;\r\n\t}\r\n\tif(type=='del'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#form_spec').submit();\r\n}\r\n</script>";
?>
