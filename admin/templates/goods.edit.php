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
echo "\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3> ";
echo $lang['goods_recommend_batch_handle'];
echo " </h3>\r\n      <ul class=\"tab-base\">\r\n      <li><a href=\"index.php?act=goods&op=goods\" ><span>";
echo $lang['goods_index_all_goods'];
echo "</span></a></li>\r\n      <li><a href=\"index.php?act=goods&op=goods&goods_state=1\" ><span>";
echo $lang['goods_index_lock_goods'];
echo "</span></a></li>\r\n      <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_edit_all'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" value=\"";
echo $output['goods_id'];
echo "\" name=\"goods_id\">\r\n    <input type=\"hidden\" value=\"";
echo $output['goods_state'];
echo "\" name=\"goods_state\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['goods_index_class_name'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><div id=\"gcategory\" class=\"change-select-3\">\r\n              <select>\r\n                <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n                ";
foreach ( $output['goods_class'] as $val )
{
		echo "                <option value=\"";
		echo $val['gc_id'];
		echo "\">";
		echo $val['gc_name'];
		echo "</option>\r\n                ";
}
echo "              </select>\r\n              <input type=\"hidden\" id=\"cate_id\" name=\"cate_id\" value=\"\" class=\"mls_id\" />\r\n              <input type=\"hidden\" id=\"cate_name\" name=\"cate_name\" value=\"\" class=\"mls_names\" />\r\n            </div></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_edit_not_choose'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['goods_index_brand'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"brand_id\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( is_array( $output['brand_list'] ) )
{
		echo "              ";
		foreach ( $output['brand_list'] as $k => $v )
		{
				echo "              <option value=\"";
				echo $v['brand_id'];
				echo "\">";
				echo $v['brand_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_edit_keep_blank'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['goods_edit_lock_state'];
echo ": </td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" checked=\"checked\" value=\"-1\" name=\"set_goods_state\" id=\"goods_index_unchanged\">\r\n                <label for=\"goods_index_unchanged\">";
echo $lang['goods_index_unchanged'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"1\" name=\"set_goods_state\" id=\"goods_index_lock\">\r\n                <label for=\"goods_index_lock\">";
echo $lang['goods_index_lock'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"0\" name=\"set_goods_state\" id=\"goods_edit_allow_sell\">\r\n                <label for=\"goods_edit_allow_sell\">";
echo $lang['goods_edit_allow_sell'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr style=\"display: none;\" id=\"close_reason\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"close_reason\">";
echo $lang['goods_edit_lock_reason'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea rows=\"6\" class=\"tarea\" cols=\"60\" name=\"goods_close_reason\" id=\"goods_close_reason\"></textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"javascript:document.form1.submit();\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\n\$(function(){\r\n\tgcategoryInit(\"gcategory\");\r\n});\r\n</script>";
?>
