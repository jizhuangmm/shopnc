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
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\"  name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\"/>\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_sn'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['pdcash_sn'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_membername'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['pdcash_membername'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_payment'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['payment_info']['payment_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_cash_price'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['pdcash_price'];
echo "&nbsp;";
echo $lang['currency_zh'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
if ( $output['info']['pdcash_payment'] == "offline" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_cash_shoukuanname'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_toname'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_cash_shoukuanbank'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_tobank'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_cash_shoukuanaccount'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['pdcash_paymentaccount'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_addtime'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['info']['pdcash_addtime'] );
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_memberremark'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['pdcash_memberremark'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_paystate'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
if ( is_array( $output['cashpaystate'] ) && 0 < count( $output['rechargepaystate'] ) )
{
		echo "            ";
		foreach ( $output['cashpaystate'] as $k => $v )
		{
				echo "            <input type=\"radio\" name=\"paystate\" class=\"paystateclass\" value=\"";
				echo $k;
				echo "\" ";
				echo $k == $output['info']['pdcash_paystate'] ? "checked=checked" : "";
				echo "/>\r\n            &nbsp;";
				echo $v;
				echo "            ";
		}
		echo "            ";
}
echo "            <input type=\"hidden\" id=\"paystate_hidden\" name=\"paystate_hidden\" value=\"";
echo $output['info']['pdcash_paystate'];
echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_recordstate'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
if ( is_array( $output['cashstate'] ) && 0 < count( $output['cashstate'] ) )
{
		echo "            ";
		foreach ( $output['cashstate'] as $k => $v )
		{
				echo "            <span id=\"recordstate_";
				echo $k;
				echo "\">\r\n            <input type=\"radio\" name=\"recordstate\" value=\"";
				echo $k;
				echo "\" ";
				echo $k == $output['info']['pdcash_state'] ? "checked=checked" : "";
				echo "/>\r\n            &nbsp;";
				echo $v;
				echo "</span>\r\n            ";
		}
		echo "            ";
}
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <!-- 显示管理员名称 -->\r\n        ";
if ( trim( $output['info']['pdcash_adminname'] ) != "" )
{
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['admin_predeposit_adminname'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
		echo $output['info']['pdcash_adminname'];
		echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
}
echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_adminremark'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"admin_remark\" rows=\"6\" class=\"tarea\">";
echo $output['info']['pdcash_adminremark'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_predeposit_cash_remark_tip1'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_predeposit_remark'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"remark\" rows=\"6\" class=\"tarea\">";
echo $output['info']['pdcash_remark'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_predeposit_cash_remark_tip2'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(function(){\r\n\tshowstate();\r\n\t\$('[name=\"paystate\"]').change(function(){\r\n\t\tchangepaystate();\r\n\t\tshowstate();\r\n\t});\r\n});\r\nfunction changepaystate(){\r\n\tvar paystate = \$('input[name=\"paystate\"]:checked').val();\r\n\t\$(\"#paystate_hidden\").val(paystate);\r\n}\r\nfunction showstate(){\r\n\tvar paystate = \$('#paystate_hidden').val();\r\n\tif(paystate == 1){\r\n\t\t\$(\"#recordstate_2\").hide();\r\n\t\t\$(\"#recordstate_1\").show();\r\n\t}else{\r\n\t\t\$(\"#recordstate_2\").show();\r\n\t\t\$(\"#recordstate_1\").hide();\r\n\t}\r\n}\r\n</script>";
?>
