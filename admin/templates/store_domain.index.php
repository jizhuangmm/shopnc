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
echo $lang['nc_domain_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n     \t<li><a href=\"index.php?act=setting&op=subdomain_setting\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\r\n      \t<li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_domain_shop'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n  <input type=\"hidden\" value=\"store\" name=\"act\">\r\n  <input type=\"hidden\" value=\"store_domain\" name=\"op\">\r\n  <table class=\"tb-type1 noborder search\">\r\n  <tbody>\r\n    <tr>\r\n      <th><label for=\"store_name\">";
echo $lang['store_name'];
echo "</label></th>\r\n      <td><input type=\"text\" value=\"";
echo $_GET['store_name'];
echo "\" name=\"store_name\" id=\"store_name\" class=\"txt\"></td>\r\n      <th><label for=\"owner_and_name\">";
echo $lang['store_domain'];
echo "</label></th>\r\n      <td><input type=\"text\" value=\"";
echo $_GET['store_domain'];
echo "\" name=\"store_domain\" id=\"store_domain\" class=\"txt\"></td>\r\n      \r\n      <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n    </tr></tbody>\r\n  </table>\r\n  </form>\r\n  <form method=\"post\" id=\"store_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th>";
echo $lang['store_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['store_domain'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['store_domain_times'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['store_user_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['operation'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['store_list'] ) || is_array( $output['store_list'] ) )
{
		echo "        ";
		foreach ( $output['store_list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td></td>\r\n          <td>";
				echo $v['store_name'];
				echo "&nbsp;</td>\r\n          <td class=\"align-center\">";
				echo $v['store_domain'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['store_domain_times'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['member_name'];
				echo "</td>\r\n          <td class=\"w150 align-center\"><a href=\"index.php?act=store&op=store_domain_edit&store_id=";
				echo $v['store_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> \r\n\t\t\t \t\t</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"16\">\r\n            <div class=\"pagination\">";
echo $output['page'];
echo "</div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>";
?>
