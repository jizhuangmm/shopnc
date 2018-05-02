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
echo $lang['nc_coupon_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=coupon&op=list\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['coupon_allow_state'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method='post' id=\"formProcess\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" id=\"coupon_allowstate\" name=\"coupon_allowstate\" value=\"0\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\" class=\"nobg\">";
echo $lang['nc_list'];
echo "</th>\r\n        </tr>\r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_pic'];
echo "</th>\r\n          <th>";
echo $lang['coupon_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_store_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_price'];
echo "(";
echo $lang['currency_zh'];
echo ")</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_lifetime'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_allow'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name='coupon_id[]' value=\"";
				echo $v['coupon_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w96 picture\"><div class=\"size-88x44\"><span class=\"thumb size-88x44\"><i></i><img src=\"";
				if ( stripos( $v['coupon_pic'], "http://" ) === FALSE )
				{
						echo SiteUrl."/".$v['coupon_pic'];
				}
				else
				{
						echo $v['coupon_pic'];
				}
				echo "\" onerror=\"this.src='";
				echo SiteUrl;
				echo "/templates/";
				echo TPL_NAME;
				echo "/images/default_coupon_image.png'\" onload=\"javascript:DrawImage(this,88,44);\"/></span></div></td>\r\n          <td  class=\"name w270\">";
				echo $v['coupon_title'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['store_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['coupon_price'];
				echo "</td>\r\n          <td class=\"nowarp align-center\"><p>";
				echo date( "Y-m-d", $v['coupon_start_date'] );
				echo "~";
				echo date( "Y-m-d", $v['coupon_end_date'] );
				echo "</p></td>\r\n          <td class=\"align-center\">";
				switch ( $v['coupon_allowstate'] )
				{
				case "0" :
						echo $lang['coupon_allow_state'];
						break;
				case "1" :
						echo $lang['coupon_allow_yes'];
						break;
				case "2" :
						echo $lang['coupon_allow_no'];
				}
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=coupon&op=apply_edit&coupon_id=";
				echo $v['coupon_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>&nbsp;</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\"></td>\r\n          <td colspan=\"16\"><label for=\"checkall_2\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('1');\"><span>";
		echo $lang['nc_pass'];
		echo "</span></a>\r\n            \r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\nfunction submit_form(state){\r\n\t\$('#coupon_allowstate').val(state);\r\n\t\$('#formProcess').submit();\r\n}\r\n</script> ";
?>
