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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=recommend&op=recommend\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['recommend_goods_recommend'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th>";
echo $lang['recommend_index_type'];
echo "</th>\r\n          <td><select onchange=\"location='index.php?act=recommend&op=recommend_goods&recommend_id=' + this.value\" class=\"infoTableSelect\">\r\n              ";
if ( !empty( $output['recommend_list'] ) || is_array( $output['recommend_list'] ) )
{
		echo "              ";
		foreach ( $output['recommend_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $v['recommend_id'] == $output['recommend_id'] )
				{
						echo "selected=\"\"";
				}
				echo " value=\"";
				echo $v['recommend_id'];
				echo "\">";
				echo $v['recommend_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  <form method='post' onsubmit=\"if(confirm('";
echo $lang['recommend_goods_ensure_cancel'];
echo "?')){return true;}else{return false;}\" name=\"postForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"recommend_id\" value=\"";
echo $output['recommend_id'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead><tr class=\"space\">\r\n        <th colspan=\"15\">";
echo $lang['nc_list'];
echo "</th>\r\n      </tr>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th class=\"w48\">";
echo $lang['nc_sort'];
echo "</th>\r\n          <th class=\"w48\" colspan=\"2\">";
echo $lang['recommend_goods_name'];
echo "</th>\r\n          <th>";
echo $lang['recommend_goods_class_name'];
echo "</th>\r\n          <th class=\"w156\">";
echo $lang['recommend_goods_brand'];
echo "</th>\r\n          <th>";
echo $lang['recommend_goods_click'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['goods_list'] ) || is_array( $output['goods_list'] ) )
{
		echo "        ";
		foreach ( $output['goods_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><input type=\"checkbox\" name=\"goods_id[]\" value=\"";
				echo $v['goods_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"sort\"><span title=\"";
				echo $lang['nc_editable'];
				echo "\" style=\"cursor:pointer;\"  class=\"editable\" maxvalue=\"255\" datatype=\"pint\" fieldid=\"";
				echo $v['goods_id'].",".$output['recommend_id'];
				echo "\" ajax_branch=\"sort\" fieldname=\"sort\" nc_type=\"inline_edit\">";
				echo $v['sort'];
				echo "</span></td>\r\n          <td><div class=\"goods-picture\"><span class=\"thumb size44 \"><i></i><img src=\"";
				echo thumb( $v, "tiny" );
				echo "\"  onload=\"javascript:DrawImage(this,44,44);\"/></span></div></td>\r\n          <td><p><a href=\"";
				echo SiteUrl."/index.php?act=goods&goods_id=".$v['goods_id']."&id=".$v['store_id'];
				echo "\" target=\"_blank\">";
				echo $v['goods_name'];
				echo "</a></p>\r\n            <p class=\"store\">";
				echo $lang['recommend_goods_store_name'];
				echo ":<a href=\"";
				echo SiteUrl."/index.php?act=show_store&id=".$v['store_id'];
				echo "\" target=\"_blank\">";
				echo $v['store_name'];
				echo "</a></p></td>\r\n          <td>";
				echo $v['gc_name'];
				echo "</td>\r\n          <td>";
				echo $v['brand_name'];
				echo "</td>\r\n          <td>";
				echo $v['goods_click'];
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo $lang['recommend_goods_choose'];
		echo " <a href=\"index.php?act=goods&op=goods&search_show=1\" style=\" color: red; margin: 0 4px; text-decoration:underline;\">";
		echo $lang['recommend_goods_choose1'];
		echo "</a> ";
		echo $lang['recommend_goods_choose2'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\">\r\n          \t<label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n          \t<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.postForm.submit()\"><span>";
echo $lang['recommend_goods_cancel_recommend'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script>";
?>
