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
echo $lang['article_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=article&op=article_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" value=\"article\" name=\"act\">\r\n    <input type=\"hidden\" value=\"article\" name=\"op\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_title\">";
echo $lang['article_index_title'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search_title'];
echo "\" name=\"search_title\" id=\"search_title\" class=\"txt\"></td>\r\n          <th><label for=\"search_ac_id\">";
echo $lang['article_index_class'];
echo "</label></th>\r\n          <td><select name=\"search_ac_id\" id=\"search_ac_id\" class=\"\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['parent_list'] ) || is_array( $output['parent_list'] ) )
{
		echo "              ";
		foreach ( $output['parent_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['search_ac_id'] == $v['ac_id'] )
				{
						echo "selected='selected'";
				}
				echo " value=\"";
				echo $v['ac_id'];
				echo "\">";
				echo $v['ac_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_title'] != "" || $output['search_ac_id'] != "" )
{
		echo "            <a href=\"index.php?act=article&op=article\" class=\"btns tooltip\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['article_index_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"form_article\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th class=\"w48\">";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['article_index_title'];
echo "</th>\r\n          <th>";
echo $lang['article_index_class'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['article_index_show'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['article_index_addtime'];
echo "</th>\r\n          <th class=\"w60 align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['article_list'] ) || is_array( $output['article_list'] ) )
{
		echo "        ";
		foreach ( $output['article_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><input type=\"checkbox\" name='del_id[]' value=\"";
				echo $v['article_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td>";
				echo $v['article_sort'];
				echo "</td>\r\n          <td>";
				echo $v['article_title'];
				echo "</td>\r\n          <td>";
				echo $v['ac_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['article_show'] == "0" )
				{
						echo $lang['nc_no'];
				}
				else
				{
						echo $lang['nc_yes'];
				}
				echo "</td>\r\n          <td class=\"nowrap align-center\">";
				echo $v['article_time'];
				echo "</td>\r\n          <td class=\"align-center\"><a href=\"index.php?act=article&op=article_edit&article_id=";
				echo $v['article_id'];
				echo "\">";
				echo $lang['nc_edit'];
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
if ( !empty( $output['article_list'] ) || is_array( $output['article_list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\"><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
		echo $lang['nc_ensure_del'];
		echo "')){\$('#form_article').submit();}\"><span>";
		echo $lang['nc_del'];
		echo "</span></a>\r\n            <div class=\"pagination\"> ";
		echo $output['page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
