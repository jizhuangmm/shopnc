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
echo $lang['brand_index_brand'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=brand&op=brand\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=brand&op=brand_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['brand_index_to_audit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"POST\" name=\"formSearch\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_brand_name\">";
echo $lang['brand_index_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" name=\"search_brand_name\" id=\"search_brand_name\" value=\"";
echo $output['search_brand_name'];
echo "\" type=\"text\"></td>\r\n          <th><label for=\"search_brand_class\">";
echo $lang['brand_index_class'];
echo "</label></th>\r\n          <td><input class=\"txt\" name=\"search_brand_class\" id=\"search_brand_class\" value=\"";
echo $output['search_brand_class'];
echo "\" type=\"text\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"form_brand\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"type\" id=\"type\" value=\"\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\">";
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th>";
echo $lang['brand_index_name'];
echo "</th>\r\n          <th>";
echo $lang['brand_index_class'];
echo "</th>\r\n          <th>";
echo $lang['brand_index_pic_sign'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['brand_list'] ) || is_array( $output['brand_list'] ) )
{
		echo "        ";
		foreach ( $output['brand_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" class=\"checkitem\" name=\"del_id[]\" value=\"";
				echo $v['brand_id'];
				echo "\"></td>\r\n          <td class=\"name w270\"><span nc_type=\"inline_edit\" fieldname=\"brand_name\" ajax_branch='brand_name' fieldid=\"";
				echo $v['brand_id'];
				echo "\" required=\"1\" class=\"editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\">";
				echo $v['brand_name'];
				echo "</span></td>\r\n          <td class=\"class\"><span nc_type=\"inline_edit\" fieldname=\"brand_class\" ajax_branch='brand_class' fieldid=\"";
				echo $v['brand_id'];
				echo "\" required=\"1\" class=\"editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\">";
				echo $v['brand_class'];
				echo "</span></td>\r\n          <td><div class=\"brand-picture\"><span class=\"thumb size-brand\"><i></i><img src=\"";
				if ( !empty( $v['brand_pic'] ) )
				{
						echo SiteUrl."/".ATTACH_BRAND."/".$v['brand_pic'];
				}
				else
				{
						echo SiteUrl."/templates/".TPL_NAME."/images/default_brand_image.gif";
				}
				echo "\" onload=\"javascript:DrawImage(this,88,44);\" /></span></div></td>\r\n          <td class=\"w96 align-center\"><a href=\"index.php?act=brand&op=brand_apply_set&state=pass&brand_id=";
				echo $v['brand_id'];
				echo "\">";
				echo $lang['nc_pass'];
				echo "</a> | <a href=\"index.php?act=brand&op=brand_apply_set&state=refuse&brand_id=";
				echo $v['brand_id'];
				echo "\">";
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
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['brand_list'] ) || is_array( $output['brand_list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('pass');\" name=\"id\"><span>";
		echo $lang['nc_pass'];
		echo "</span></a><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('refuse');\" name=\"id\"><span>";
		echo $lang['nc_refuse'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script>\r\nfunction submit_form(type){\r\n\tif(confirm('";
echo $lang['brand_apply_handle_ensure'];
echo "?')){\r\n\t\t\$('#type').val(type);\r\n\t\t\$('#form_brand').submit();\r\n\t}\r\n}\r\n</script>";
?>
