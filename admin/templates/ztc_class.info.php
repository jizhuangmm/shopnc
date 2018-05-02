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
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_ztc_list_title'];
echo "<!-- 申请列表 --></span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glist\"><span>";
echo $lang['admin_ztc_goodslist_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glog\"><span>";
echo $lang['admin_ztc_loglist_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <!-- <form id=\"ztc_form\" method=\"post\" action=\"index.php?act=ztc_class&op=edit_ztc&z_id=";
echo $output['ztc_info']['ztc_id'];
echo "\"> -->\r\n  <form id=\"ztc_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_applytype'];
echo "<!-- 申请类型 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['ztc_info']['ztc_type'] == 1 ? $lang['admin_ztc_rechargerecord'] : $lang['admin_ztc_applyrecord'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_membername'];
echo "<!-- 会员名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['ztc_info']['ztc_membername'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_storename'];
echo "<!-- 店铺名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['ztc_info']['ztc_storename'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['ztc_info']['ztc_goodsname'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_edit_costgold'];
echo "<!-- 消耗金币 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['ztc_info']['ztc_gold'];
echo " ";
echo $lang['admin_ztc_goldunit'];
echo "\" readonly />\r\n            \r\n            <!-- 枚 --></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_edit_remark'];
echo "<!-- 备注信息 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea rows=\"6\" readonly=\"readonly\" class=\"readonly tarea\">";
echo $output['ztc_info']['ztc_remark'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_addtime'];
echo " <!-- 添加时间 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo date( "Y-m-d", $output['ztc_info']['ztc_addtime'] );
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_ztc_paystate'];
echo "<!-- 支付状态 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
echo $output['ztc_info']['ztc_paystate'] == 1 ? $lang['admin_ztc_paysuccess'] : $lang['admin_ztc_waitpaying'];
echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
if ( $output['ztc_info']['ztc_type'] == 0 )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_ztc_starttime'];
		echo "<!-- 开始时间 -->:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
		echo date( "Y-m-d", $output['ztc_info']['ztc_startdate'] );
		echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_ztc_auditstate'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"readonly txt\" value=\"";
		if ( $output['ztc_info']['ztc_state'] == 0 )
		{
				echo $lang['admin_ztc_auditing'];
		}
		echo "            ";
		if ( $output['ztc_info']['ztc_state'] == 1 )
		{
				echo $lang['admin_ztc_auditpass'];
		}
		echo "            ";
		if ( $output['ztc_info']['ztc_state'] == 2 )
		{
				echo $lang['admin_ztc_auditnopass'];
		}
		echo "\" readonly /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"window.location.href= 'index.php?act=ztc_class&op=ztc_class'\"><span>";
echo $lang['admin_ztc_index_backlist'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
