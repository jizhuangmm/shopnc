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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=brand&op=brand_add\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=brand&op=brand_apply\"><span>";
echo $lang['brand_index_to_audit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"brand\">\r\n    <input type=\"hidden\" name=\"op\" value=\"brand\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_brand_name\">";
echo $lang['brand_index_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" name=\"search_brand_name\" id=\"search_brand_name\" value=\"";
echo $output['search_brand_name'];
echo "\" type=\"text\"></td>\r\n          <th><label for=\"search_brand_class\">";
echo $lang['brand_index_class'];
echo "</label></th>\r\n          <td><input class=\"txt\" name=\"search_brand_class\" id=\"search_brand_class\" value=\"";
echo $output['search_brand_class'];
echo "\" type=\"text\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_brand_name'] != "" || $output['search_brand_class'] != "" )
{
		echo "            <a class=\"btns tooltip\" href=\"index.php?act=brand&op=brand\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['brand_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['brand_index_help2'];
echo "</li>\r\n            <li>";
echo $lang['brand_index_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' onsubmit=\"if(confirm('";
echo $lang['nc_ensure_del'];
echo "')){return true;}else{return false;}\" name=\"brandForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th class=\"w48\">";
echo $lang['nc_sort'];
echo "</th>\r\n          <th class=\"w270\">";
echo $lang['brand_index_name'];
echo "</th>\r\n          <th class=\"w150\">";
echo $lang['brand_index_class'];
echo "</th>\r\n          <th>";
echo $lang['brand_index_pic_sign'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_recommend'];
echo "</th>\r\n          <th class=\"w72 align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['brand_list'] ) || is_array( $output['brand_list'] ) )
{
		echo "        ";
		foreach ( $output['brand_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td><input value=\"";
				echo $v['brand_id'];
				echo "\" class=\"checkitem\" type=\"checkbox\" name=\"del_brand_id[]\"></td>\r\n          <td class=\"sort\"><span class=\"tooltip editable\"  nc_type=\"inline_edit\" fieldname=\"brand_sort\" ajax_branch='brand_sort' fieldid=\"";
				echo $v['brand_id'];
				echo "\" datatype=\"pint\" maxvalue=\"255\" title=\"";
				echo $lang['nc_editable'];
				echo "\">";
				echo $v['brand_sort'];
				echo "</span></td>\r\n          <td class=\"name\"><span class=\"tooltip editable\" nc_type=\"inline_edit\" fieldname=\"brand_name\" ajax_branch='brand_name' fieldid=\"";
				echo $v['brand_id'];
				echo "\" required=\"1\"  title=\"";
				echo $lang['nc_editable'];
				echo "\">";
				echo $v['brand_name'];
				echo "</span></td>\r\n          <td class=\"class\"><span class=\"tooltip editable\" nc_type=\"inline_edit\" fieldname=\"brand_class\" ajax_branch='brand_class' fieldid=\"";
				echo $v['brand_id'];
				echo "\" required=\"1\"  title=\"";
				echo $lang['nc_editable'];
				echo "\">";
				echo $v['brand_class'];
				echo "</span></td>\r\n          <td class=\"picture\"><div class=\"size-88x44\"><span class=\"thumb size-88x44\"><i></i><img width=\"88\" height=\"44\" src=\"";
				if ( !empty( $v['brand_pic'] ) )
				{
						echo SiteUrl."/".ATTACH_BRAND."/".$v['brand_pic'];
				}
				else
				{
						echo SiteUrl."/templates/".TPL_NAME."/images/default_brand_image.gif";
				}
				echo "\" onload=\"javascript:DrawImage(this,88,44);\" /></span></div></td>\r\n          <td class=\"align-center yes-onoff\">";
				if ( $v['brand_recommend'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch='brand_recommend' nc_type=\"inline_edit\" fieldname=\"brand_recommend\" fieldid=\"";
						echo $v['brand_id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch='brand_recommend' nc_type=\"inline_edit\" fieldname=\"brand_recommend\" fieldid=\"";
						echo $v['brand_id'];
						echo "\" fieldvalue=\"1\"  title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"align-center\"><a href=\"index.php?act=brand&op=brand_edit&brand_id=";
				echo $v['brand_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>&nbsp;|&nbsp;<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){location.href='index.php?act=brand&op=brand_del&del_brand_id=";
				echo $v['brand_id'];
				echo "';}else{return false;}\">";
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
		echo "        <tr colspan=\"15\" class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.brandForm.submit()\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n  <div class=\"clear\"></div>\r\n</div>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script>";
?>
