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
echo "<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_promotion_bundling'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['bundling_quota'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=promotion_bundling&op=bundling_list\"><span>";
echo $lang['bundling_list'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=promotion_bundling&op=bundling_setting\"><span>";
echo $lang['bundling_setting'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"promotion_bundling\">\r\n    <input type=\"hidden\" name=\"op\" value=\"bundling_quota\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"store_name\">";
echo $lang['bundling_quota_store_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['bundling_store_name'];
echo "\" name=\"store_name\" id=\"store_name\" class=\"txt\" style=\"width:100px;\"></td>\r\n          <th><label for=\"\">";
echo $lang['nc_state'];
echo "</label></th>\r\n          <td>\r\n              <select name=\"state\">\r\n                  <option>";
echo $lang['bundling_state_all'];
echo "</option>\r\n                  <option ";
if ( isset( $output['state'] ) && $output['state'] == 1 )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['bundling_state_1'];
echo "</option>\r\n                  <option ";
if ( isset( $output['state'] ) && $output['state'] == 0 )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['bundling_state_0'];
echo "</option>\r\n              </select>\r\n          </td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <!-- 帮助 -->\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['bundling_quota_list_prompts'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <!-- 列表 -->\r\n  <form id=\"list_form\" method=\"post\">\r\n    <input type=\"hidden\" id=\"object_id\" name=\"object_id\"  />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>";
echo $lang['bundling_quota_store_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['bundling_quota_quantity'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['bundling_quota_starttime'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['bundling_quota_endtime'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_status'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"treet1\">\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"align-left\"><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=show_store&id=";
				echo $val['store_id'];
				echo "\" target=\"_blank\"><span>";
				echo $val['store_name'];
				echo "</span></a></td>\r\n          <td class=\"align-center\">";
				echo $val['bl_quota_month'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo date( "Y-m-d", $val['bl_quota_starttime'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				echo date( "Y-m-d", $val['bl_quota_endtime'] );
				echo "</td>\r\n          <td class=\"align-center yes-onoff\">\r\n            <a href=\"JavaScript:void(0);\" class=\"tooltip ";
				echo $val['bl_quota_state'] ? "enabled" : "disabled";
				echo "\" ajax_branch=\"bl_quota_state\" nc_type=\"inline_edit\"  fieldname=\"bl_quota_state\" fieldid=\"";
				echo $val['bl_quota_id'];
				echo "\" fieldvalue=\"";
				echo $val['bl_quota_state'] ? "1" : "0";
				echo "\" title=\"";
				echo $lang['nc_editable'];
				echo "\"><img src=\"";
				echo TEMPLATES_PATH;
				echo "/images/transparent.gif\"></a>\r\n          </td>\r\n          <td class=\"nowrap align-center\">\r\n          \t<a href=\"index.php?act=promotion_bundling&op=bundling_quota_edit&quota_id=";
				echo $val['bl_quota_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a> | \r\n          \t<a href=\"index.php?act=promotion_bundling&op=bundling_list&quota_id=";
				echo $val['bl_quota_id'];
				echo "\">";
				echo $lang['nc_view'];
				echo "</a>\r\n          </td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"16\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"16\"><label>\r\n            <div class=\"pagination\">";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n      ";
}
echo "    </table>\r\n  </form>\r\n</div>\r\n\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\n</script>";
?>
