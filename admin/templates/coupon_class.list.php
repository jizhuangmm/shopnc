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
echo "\r\n<div class=\"page\">\r\n<div class=\"fixed-bar\">\r\n  <div class=\"item-title\">\r\n    <h3>";
echo $lang['nc_coupon_class_manage'];
echo "</h3>\r\n    <ul class=\"tab-base\">\r\n      <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n      <li><a href=\"index.php?act=coupon_class&op=update\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n    </ul>\r\n  </div>\r\n</div>\r\n<div class=\"fixed-empty\"></div>\r\n<div class=\"info2\">\r\n  <form method='post' id=\"list\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\" id=\"prompt\">\r\n      <tbody>\r\n        <tr class=\"space odd\">\r\n          <th colspan=\"12\"><div class=\"title\">\r\n              <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n              <span class=\"arrow\"></span></div></th>\r\n        </tr>\r\n        <tr>\r\n          <td><ul>\r\n              <li>";
echo $lang['coupon_class_help1'];
echo "</li>\r\n            </ul></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>";
echo $lang['coupon_class_sort'];
echo "</th>\r\n          <th>";
echo $lang['coupon_class_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_display'];
echo " </th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w48\">";
				echo $v['class_sort'];
				echo "</td>\r\n          <td class=\"w50pre\">";
				echo $v['class_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				switch ( $v['class_show'] )
				{
				case "0" :
						echo $lang['nc_no'];
						break;
				case "1" :
						echo $lang['nc_yes'];
				}
				echo "</td>\r\n          <td class=\"w150 align-center\"><a href=\"index.php?act=coupon_class&op=update&class_id=";
				echo $v['class_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){location.href='index.php?act=coupon_class&form_submit=ok&class_id=";
				echo $v['class_id'];
				echo "';}else{return false;}\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n          ";
		}
		echo "          ";
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
		echo "        <tr>\r\n          <td id=\"batchAction\" colspan=\"16\"><div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
