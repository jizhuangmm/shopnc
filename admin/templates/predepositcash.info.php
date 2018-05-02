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
echo $lang['nc_member_predepositmanage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=predeposit&op=predeposit\"><span>";
echo $lang['admin_predeposit_rechargelist'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_predeposit_cashmanage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=predeposit&op=artificial\"><span>";
echo $lang['admin_predeposit_artificial'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2 nobdb\">\r\n    <tbody>\r\n      <tr class=\"noborder\">\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_sn'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['info']['pdcash_sn'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_membername'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['info']['pdcash_membername'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_payment'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['payment_info']['payment_name'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_cash_price'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['info']['pdcash_price'];
echo "&nbsp;";
echo $lang['currency_zh'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
if ( $output['info']['pdcash_payment'] == "offline" )
{
		echo "      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_cash_shoukuanname'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_toname'];
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_cash_shoukuanbank'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_tobank'];
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
}
echo "      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_cash_shoukuanaccount'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['info']['pdcash_paymentaccount'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_addtime'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['info']['pdcash_addtime'] );
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_memberremark'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['info']['pdcash_memberremark'];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_paystate'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['cashpaystate'][$output['info']['pdcash_paystate']];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_recordstate'];
echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
echo $output['cashstate'][$output['info']['pdcash_state']];
echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      <!-- 显示管理员名称 -->\r\n      ";
if ( trim( $output['info']['pdcash_adminname'] ) != "" )
{
		echo "      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_adminname'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_adminname'];
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
}
echo "      ";
if ( trim( $output['info']['pdcash_adminremark'] ) != "" )
{
		echo "      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_adminremark'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_adminremark'];
		echo "          &nbsp;";
		echo $lang['admin_predeposit_cash_remark_tip1'];
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
}
echo "      ";
if ( trim( $output['info']['pdcash_remark'] ) != "" )
{
		echo "      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_remark'];
		echo ":</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_remark'];
		echo "          &nbsp;";
		echo $lang['admin_predeposit_cash_remark_tip2'];
		echo "</td>\r\n        <td class=\"vatop tips\"></td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n  \r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"window.location.href='index.php?act=predeposit&op=cashlist'\"><span>";
echo $lang['admin_predeposit_backlist'];
echo "</span></a></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n";
?>
