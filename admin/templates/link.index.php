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
echo $lang['link_index_partner'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=link&op=link_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" value=\"link\" name=\"act\">\r\n    <input type=\"hidden\" value=\"link\" name=\"op\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th>";
echo $lang['link_index_title'];
echo "</th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search_link_title'];
echo "\" name=\"search_link_title\" class=\"txt\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_link_title'] != "" )
{
		echo "            <a href=\"index.php?act=link&op=link\" class=\"btns tooltip\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "            <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=link&op=link'\" class=\"btns tooltip\" title=\"";
echo $lang['link_all'];
echo "\"><span>";
echo $lang['link_all'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=link&op=link&type=0'\" class=\"btns tooltip\" title=\"";
echo $lang['link_pic'];
echo "\"><span>";
echo $lang['link_pic'];
echo "</span></a> <a href=\"JavaScript:void(0);\" onclick=\"window.location.href='index.php?act=link&op=link&type=1'\" class=\"btns tooltip\" title=\"";
echo $lang['link_word'];
echo "\"><span>";
echo $lang['link_word'];
echo "</span></a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['link_help1'];
echo "</li>\r\n            <li>";
echo $lang['link_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_link\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>&nbsp;</th>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['link_index_title'];
echo "</th>\r\n          <th>";
echo $lang['link_index_pic_sign'];
echo "</th>\r\n          <th>";
echo $lang['link_index_link'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['link_list'] ) || is_array( $output['link_list'] ) )
{
		echo "        ";
		foreach ( $output['link_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"del_id[]\" value=\"";
				echo $v['link_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w48 sort\"><span class=\"tooltip editable\" title=\"";
				echo $lang['nc_editable'];
				echo "\" ajax_branch='link_sort' datatype=\"number\" fieldid=\"";
				echo $v['link_id'];
				echo "\" fieldname=\"link_sort\" nc_type=\"inline_edit\">";
				echo $v['link_sort'];
				echo "</span></td>\r\n          <td>";
				echo $v['link_title'];
				echo "</td>\r\n          <td class=\"picture\">";
				if ( $v['link_pic'] != "" )
				{
						echo "<div class='size-88x31'><span class='thumb size-88x31'><i></i><img width=\"88\" height=\"31\" src='".$v['link_pic']."' onload='javascript:DrawImage(this,88,31);' /></span></div>";
				}
				else
				{
						echo $v['link_title'];
				}
				echo "</td>\r\n          <td>";
				echo $v['link_url'];
				echo "</td>\r\n          <td class=\"w96 align-center\"><a href=\"index.php?act=link&op=link_edit&link_id=";
				echo $v['link_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "'))window.location = 'index.php?act=link&op=link_del&link_id=";
				echo $v['link_id'];
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
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['link_list'] ) || is_array( $output['link_list'] ) )
{
		echo "        <tr class=\"tfoot\" id=\"dataFuncs\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"batchAction\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp; <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['nc_ensure_del'];
		echo "')){\$('#form_link').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script>";
?>
