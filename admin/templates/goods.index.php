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
echo $lang['goods_index_goods'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['goods_index_all_goods'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=goods&op=goods&goods_state=1\" ><span>";
echo $lang['goods_index_lock_goods'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"goods\">\r\n    <input type=\"hidden\" name=\"op\" value=\"goods\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_goods_name\"> ";
echo $lang['goods_index_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search']['search_goods_name'];
echo "\" name=\"search_goods_name\" id=\"search_goods_name\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['goods_index_brand'];
echo "</label></th>\r\n          <td><select name=\"search_brand_id\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['brand_list'] ) || is_array( $output['brand_list'] ) )
{
		echo "              ";
		foreach ( $output['brand_list'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $v['brand_id'];
				echo "\" ";
				if ( $output['search']['search_brand_id'] == $v['brand_id'] )
				{
						echo "selected";
				}
				echo ">";
				echo $v['brand_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <th><label>";
echo $lang['goods_index_class_name'];
echo "</label></th>\r\n          <td id=\"gcategory\"><input type=\"hidden\" id=\"cate_id\" name=\"cate_id\" value=\"\" class=\"mls_id\" />\r\n            <input type=\"hidden\" id=\"cate_name\" name=\"cate_name\" value=\"\" class=\"mls_names\" />\r\n            <select class=\"querySelect\">\r\n              <option>";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['goods_class'] ) || is_array( $output['goods_class'] ) )
{
		echo "              ";
		foreach ( $output['goods_class'] as $val )
		{
				echo "              <option value=\"";
				echo $val['gc_id'];
				echo "\" ";
				if ( $output['search']['cate_id'] == $val['gc_id'] )
				{
						echo "selected";
				}
				echo ">";
				echo $val['gc_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n        </tr>\r\n        <tr>\r\n          <th><label for=\"search_store_name\">";
echo $lang['goods_index_store_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search']['search_store_name'];
echo "\" name=\"search_store_name\" id=\"search_store_name\" class=\"txt\"></td>\r\n          <th><label>";
echo $lang['goods_index_show'];
echo "</label></th>\r\n          <td><select name=\"search_show\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              <option value=\"1\" ";
if ( $output['search']['search_show'] == "1" )
{
		echo "selected";
}
echo ">";
echo $lang['nc_yes'];
echo "</option>\r\n              <option value=\"0\" ";
if ( $output['search']['search_show'] == "0" )
{
		echo "selected";
}
echo ">";
echo $lang['nc_no'];
echo "</option>\r\n            </select></td>\r\n          <th><label>";
echo $lang['goods_index_lock'];
echo "</label></th>\r\n          <td><select name=\"search_lock\">\r\n              <option>";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              <option value=\"1\" ";
if ( $output['search']['search_lock'] == "1" )
{
		echo "selected";
}
echo ">";
echo $lang['nc_yes'];
echo "</option>\r\n              <option value=\"0\" ";
if ( $output['search']['search_lock'] == "0" )
{
		echo "selected";
}
echo ">";
echo $lang['nc_no'];
echo "</option>\r\n            </select>\r\n            <a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['goods_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['goods_index_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_goods\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"type\" id=\"type\" value=\"\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th colspan=\"2\">";
echo $lang['goods_index_name'];
echo "</th>\r\n          <th class=\"w156\">";
echo $lang['goods_index_brand'];
echo "</th>\r\n          <th>";
echo $lang['goods_index_class_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['goods_index_show'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['goods_index_lock'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['goods_index_click'];
echo "</th>\r\n          <th class=\"w48 align-center\">";
echo $lang['nc_handle'];
echo " </th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['goods_list'] ) || is_array( $output['goods_list'] ) )
{
		echo "        ";
		foreach ( $output['goods_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td><input type=\"checkbox\" name=\"del_id[]\" value=\"";
				echo $v['goods_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w60 picture\"><div class=\"size-56x56\"><span class=\"thumb size-56x56\"><i></i><img src=\"";
				echo thumb( $v, "tiny" );
				echo "\" onload=\"javascript:DrawImage(this,56,56);\"/></span></div></td>\r\n          <td class=\"goods-name w270\"><p><span title=\"";
				echo $lang['nc_editable'];
				echo "\" class=\"editable-tarea tooltip\" required=\"1\" ajax_branch_textarea=\"goods_name\" fieldid=\"";
				echo $v['goods_id'];
				echo "\" fieldname=\"goods_name\" nc_type=\"inline_edit_textarea\">";
				echo $v['goods_name'];
				echo "</span></p>\r\n            <p class=\"store\">";
				echo $lang['goods_index_store_name'];
				echo ":";
				echo $v['store_name'];
				echo "</p></td>\r\n          <td>";
				echo $v['brand_name'];
				echo "</td>\r\n          <td>";
				echo $v['gc_name'];
				echo "</td>\r\n          <td class=\"align-center yes-onoff\">\r\n            <a href=\"JavaScript:void(0);\" class=\"tooltip ";
				echo $v['goods_show'] ? "enabled" : "disabled";
				echo "\" ajax_branch=\"goods_show\" ";
				if ( $v['goods_state'] == "0" )
				{
						echo "nc_type=\"inline_edit\"";
				}
				echo "  fieldname=\"goods_show\" fieldid=\"";
				echo $v['goods_id'];
				echo "\" fieldvalue=\"";
				echo $v['goods_show'] ? "1" : "0";
				echo "\" title=\"";
				echo $v['goods_state'] ? $lang['goods_index_nolock_info'] : $lang['nc_editable'];
				echo "\"><img src=\"";
				echo TEMPLATES_PATH;
				echo "/images/transparent.gif\"></a>\r\n         </td>\r\n          <td class=\"align-center no-onoff\">";
				if ( $v['goods_state'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch=\"goods_state\" nc_type=\"inline_edit\" fieldname=\"goods_state\" fieldid=\"";
						echo $v['goods_id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch=\"goods_state\" nc_type=\"inline_edit\" fieldname=\"goods_state\" fieldid=\"";
						echo $v['goods_id'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['goods_click'];
				echo "</td>\r\n          <td class=\"align-center\"><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=goods&goods_id=";
				echo $v['goods_id'];
				echo "&id=";
				echo $v['store_id'];
				echo "\" target=\"_blank\">";
				echo $lang['nc_view'];
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
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('recommend');\"><span>";
echo $lang['nc_recommend'];
echo "</span></a><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('edit');\"><span>";
echo $lang['nc_edit'];
echo "</span></a><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('del');\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script>\r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\nfunction submit_form(type){\r\n\tif(type=='del'){\r\n\t\tif(!confirm('";
echo $lang['goods_index_ensure_handle'];
echo "?')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#type').val(type);\r\n\t\$('#form_goods').submit();\r\n}\r\n\$(function(){\r\n\tgcategoryInit(\"gcategory\");\r\n});\r\n</script>";
?>
