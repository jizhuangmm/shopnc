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
echo $lang['nc_spec_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a class=\"current\" href=\"JavaScript:void(0);\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=spec&op=spec_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table id=\"prompt\" class=\"table tb-type2\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"> <div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span> </div>\r\n        </th>\r\n      </tr>\r\n      <tr class=\"odd\">\r\n        <td><ul>\r\n            <li>";
echo $lang['spec_index_prompts_one'];
echo "</li>\r\n            <li>";
echo $lang['spec_index_prompts_two'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"form_spec\" method=\"get\">\r\n    <input type=\"hidden\" name=\"act\" value=\"spec\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"spec_del\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['spec_index_spec_name'];
echo "</th>\r\n          <th>";
echo $lang['spec_index_spec_value'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['spec_list'] ) || is_array( $output['spec_list'] ) )
{
		echo "        ";
		foreach ( $output['spec_list'] as $val )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"del_id[]\" value=\"";
				echo $val['sp_id'];
				echo "\" ";
				if ( $val['sp_id'] == "1" )
				{
						echo "disabled=\"disabled\"";
				}
				else
				{
						echo "class=\"checkitem\"";
				}
				echo " /></td>\r\n          <td class=\"w48 sort\"><span class=\"tooltip editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\" maxvalue=\"255\" datatype=\"pint\" fieldid=\"";
				echo $val['sp_id'];
				echo "\" ajax_branch=\"sort\" fieldname=\"sp_sort\" nc_type=\"inline_edit\">";
				echo $val['sp_sort'];
				echo "</span></td>\r\n          <td class=\"w270 name\"><span>";
				echo $val['sp_name'];
				echo "</span></td>\r\n          <td class=\"name\">";
				echo $val['sp_value'];
				echo "</td>\r\n          <td class=\"w96 align-center\"><a href=\"index.php?act=spec&op=spec_edit&sp_id=";
				echo $val['sp_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> ";
				if ( $val['sp_id'] != "1" )
				{
						echo "| <a onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){location.href='index.php?act=spec&op=spec_del&del_id=";
						echo $val['sp_id'];
						echo "';}else{return false;}\" href=\"javascript:void(0)\">";
						echo $lang['nc_del'];
						echo "</a>";
				}
				echo " </td>\r\n        </tr>\r\n        ";
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
if ( !empty( $output['spec_list'] ) || is_array( $output['spec_list'] ) )
{
		echo "      <tfoot>\r\n        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\" /></td>\r\n          <td id=\"dataFuncs\" colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            <a class=\"btn\" onclick=\"submit_form('del');\" href=\"JavaScript:void(0);\"> <span>";
		echo $lang['nc_del'];
		echo "</span> </a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        <tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nfunction submit_form(type){\r\n\tvar id='';\r\n\t\$('input[type=checkbox]:checked').each(function(){\r\n\t\tif(!isNaN(\$(this).val())){\r\n\t\t\tid += \$(this).val();\r\n\t\t}\r\n\t});\r\n\tif(id == ''){\r\n\t\talert('";
echo $lang['spec_index_no_checked'];
echo "');\r\n\t\treturn false;\r\n\t}\r\n\tif(type=='del'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#form_spec').submit();\r\n}\r\n</script>";
?>
