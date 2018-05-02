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
echo $lang['nc_ztc_manage'];
echo "<!-- 直通车管理 --></h3>\r\n      <ul class=\"tab-base\">\r\n      \t<li><a href=\"index.php?act=ztc_class&op=ztc_setting\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_class\" ><span>";
echo $lang['admin_ztc_list_title'];
echo "<!-- 申请列表 --></span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_ztc_goodslist_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glog\" ><span>";
echo $lang['admin_ztc_loglist_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"ztc_class\">\r\n    <input type=\"hidden\" name=\"op\" value=\"ztc_glist\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"zg_name\">";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_name\" id=\"zg_name\" class=\"txt\" value='";
echo $_GET['zg_name'];
echo "'></td>\r\n          <th><label for=\"zg_sname\">";
echo $lang['admin_ztc_storename'];
echo "<!-- 店铺名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_sname\" id=\"zg_sname\" class=\"txt-short\" value='";
echo $_GET['zg_sname'];
echo "'></td>\r\n          <td><select name=\"goods_type\">\r\n              <option value=\"0\" ";
if ( !$_GET['goods_type'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_state'];
echo "<!-- 状态 --></option>\r\n              <option value=\"goods_open\" ";
if ( $_GET['goods_type'] == "goods_open" )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['admin_ztc_glist_goodsshow'];
echo "<!-- 上架 --></option>\r\n              <option value=\"goods_close\" ";
if ( $_GET['goods_type'] == "goods_close" )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['admin_ztc_glist_goodsunshow'];
echo "<!-- 下架 --></option>\r\n              <option value=\"goods_ban\" ";
if ( $_GET['goods_type'] == "goods_ban" )
{
		echo "selected=\"selected\"";
}
echo ">";
echo $lang['admin_ztc_glist_goodslock'];
echo "<!-- 禁售 --></option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"form_ztc\" action=\"index.php\">\r\n    <input type=\"hidden\" id=\"list_act\" name=\"act\" value=\"ztc_class\">\r\n    <input type=\"hidden\" id=\"list_op\" name=\"op\" value=\"\">\r\n    <table class=\"table tb-type2\">\r\n      <thead>       \r\n        <tr class=\"thead\">\r\n          <th class=\"w24\"></th>\r\n          <th colspan=\"2\" class=\"w60\">";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 --></th>\r\n          <th>";
echo $lang['admin_ztc_membername'];
echo "<!-- 会员名称 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_glist_goldresidue'];
echo "<!-- 剩余金币(枚) --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_starttime'];
echo "<!-- 开始时间 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_glist_goodsshow'];
echo "<!-- 上架 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_glist_goodslock'];
echo "<!-- 禁售 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_glist_goodsclick'];
echo "<!-- 浏览数 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_gstate_ztc'];
echo "<!-- 直通车 --></th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list_goods'] ) || is_array( $output['list_goods'] ) )
{
		echo "        ";
		foreach ( $output['list_goods'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td><input type=\"checkbox\" name=\"gid[]\" value=\"";
				echo $v['goods_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w48\"><div class=\"goods-picture\"><span class=\"thumb size-goods\"><i></i><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=goods&goods_id=";
				echo $v['goods_id'];
				echo "&id=";
				echo $v['store_id'];
				echo "\" target=\"_blank\"><img src=\"";
				echo thumb( $v, "tiny" );
				echo "\" onload=\"javascript:DrawImage(this,44,44);\"/></a></span></div></td>\r\n          <td><p><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=goods&goods_id=";
				echo $v['goods_id'];
				echo "&id=";
				echo $v['store_id'];
				echo "\" target=\"_blank\" >";
				echo $v['goods_name'];
				echo "</a></p>\r\n            <p class=\"store\">";
				echo $lang['admin_ztc_storename'];
				echo ":";
				echo $v['store_name'];
				echo "</p></td>\r\n          <td>";
				echo $v['member_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['goods_goldnum'];
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				echo date( "Y-m-d", $v['goods_ztcstartdate'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['goods_show'] == "0" )
				{
						echo $lang['admin_ztc_glist_goodsshow_no'];
				}
				else
				{
						echo $lang['admin_ztc_glist_goodsshow_yes'];
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['goods_state'] == "0" )
				{
						echo $lang['admin_ztc_glist_goodslock_yes'];
				}
				else
				{
						echo $lang['admin_ztc_glist_goodslock_no'];
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['goods_click'];
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['goods_ztcstate'] == "1" )
				{
						echo $lang['admin_ztc_gstate_ztcstate_open'];
				}
				else
				{
						echo $lang['admin_ztc_gstate_ztcstate_close'];
				}
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"batchAction\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;\r\n            <select name='type'>\r\n              <option value='open'>";
echo $lang['admin_ztc_gstate_ztcstate_open'];
echo "</option>\r\n              <option value='close'>";
echo $lang['admin_ztc_gstate_ztcstate_close'];
echo "</option>\r\n            </select>\r\n            <a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('ztc_gstate');\"><span>";
echo $lang['nc_submit'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\nfunction submit_form(op){\r\n\t\$('#list_op').val(op);\r\n\t\$('#form_ztc').submit();\r\n}\r\n</script>";
?>
