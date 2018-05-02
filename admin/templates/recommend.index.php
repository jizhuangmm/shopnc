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
echo $lang['recommend_index_type'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=recommend&op=recommend_add\" ><span>";
echo $lang['nc_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"recommend\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"recommend\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th>";
echo $lang['recommend_index_type_name'];
echo "</th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search_recommend_name'];
echo "\" name=\"search_recommend_name\" class=\"txt\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['recommend_index_help1'];
echo "</li>\r\n            <li>";
echo $lang['recommend_index_help2'];
echo "</li>\r\n            <li>";
echo $lang['recommend_index_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' onsubmit=\"if(confirm('";
echo $lang['nc_ensure_del'];
echo "')){return true;}else{return false;}\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['recommend_index_type_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['recommend_list'] ) || is_array( $output['recommend_list'] ) )
{
		echo "        ";
		foreach ( $output['recommend_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><!-- <input value=\"";
				echo $v['recommend_id'];
				echo "\" class=\"checkitem\" type=\"checkbox\" name=\"del_recommend_id[]\"> --></td>\r\n          <td>";
				echo $v['recommend_name'];
				echo "</td>\r\n          <td class=\"w270 align-center\"><a href=\"index.php?act=recommend&op=recommend_edit&recommend_id=";
				echo $v['recommend_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>\r\n            ";
				if ( !in_array( $v['recommend_code'], $output['recommend_retrieval'] ) )
				{
						echo "            | <a href=\"javascript:if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){window.location='index.php?act=recommend&op=recommend_del&del_recommend_id=";
						echo $v['recommend_id'];
						echo "';}\">";
						echo $lang['nc_del'];
						echo "</a>\r\n            ";
				}
				echo "            | <a href=\"index.php?act=recommend&op=recommend_goods&recommend_id=";
				echo $v['recommend_id'];
				echo "\">";
				echo $lang['recommend_index_view_goods'];
				echo "</a> | <a href=\"javascript:void(0)\" onclick=\"prompt('";
				echo $lang['recommend_show'];
				echo "', '<script type=&quot;text/javascript&quot; src=&quot;";
				echo SiteUrl;
				echo "/api/goods/index.php?id=";
				echo $v['recommend_id'];
				echo "&quot;></script>')\">";
				echo $lang['recommend_http'];
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
if ( !empty( $output['recommend_list'] ) || is_array( $output['recommend_list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><!--<input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td><label for=\"checkallBottom\">";
		echo $lang['nc_select_all'];
		echo "</label></td>\r\n          <td> <input type=\"submit\" value=\"";
		echo $lang['nc_del'];
		echo "\" class=\"btn btn-red\"> -->\r\n            \r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n";
?>
