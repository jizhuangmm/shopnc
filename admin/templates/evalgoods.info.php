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
echo $lang['nc_goods_evaluate'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n      \t";
if ( $_GET['type'] == "seller" )
{
		echo "      \t<li><a href=\"index.php?act=evaluate&op=evalseller_list\" ><span>";
		echo $lang['admin_evalseller_list'];
		echo "</span></a></li>\r\n      \t";
}
else
{
		echo "      \t<li><a href=\"index.php?act=evaluate&op=evalgoods_list\" ><span>";
		echo $lang['admin_evaluate_list'];
		echo "</span></a></li>\r\n        ";
}
echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_evaluate_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"evaluateForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\"/>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_goodsname'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><a href=\"";
echo SiteUrl.DS.ncurl( array(
		"act" => "goods",
		"goods_id" => $output['info']['geval_goodsid'],
		"id" => $output['info']['geval_storeid']
), "goods" );
echo "\" target=\"_blank\">";
echo $output['info']['geval_goodsname'];
echo "</a></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_goods_specinfo'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['geval_specinfo'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_ordersn'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['geval_orderno'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_storename'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['geval_storename'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_frommembername'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['geval_frommembername'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_tomembername'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['info']['geval_tomembername'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_grade'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['evaluate_grade'][$output['info']['geval_scores']];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_addtime'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['info']['geval_addtime'] );
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_buyerdesc'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
if ( empty( $output['info']['geval_content'] ) )
{
		echo $output['evaluate_defaulttext'][$output['info']['geval_scores']];
}
else
{
		echo $output['info']['geval_content'];
}
echo "<br>\r\n          \t";
if ( !empty( $output['info']['geval_explain'] ) )
{
		echo "          \t<div id=\"explain_div\">\r\n          \t\t<span style=\"color:#996600;padding:5px 0px;\">[";
		echo $lang['admin_evaluate_explain'];
		echo "]";
		echo $output['info']['geval_explain'];
		echo "</span>\r\n          \t\t<a class=\"btns tooltip\" onclick=\"hiddenexplain(";
		echo $output['info']['geval_id'];
		echo ");\" href=\"JavaScript:void(0);\" title=\"";
		echo $lang['admin_evaluate_delexplain'];
		echo "\"><span>";
		echo $lang['admin_evaluate_delexplain'];
		echo "</span></a>\r\n          \t</div>\r\n          \t";
}
echo "          </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_state'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">          \r\n          ";
foreach ( ( array )$output['evaluate_state'] as $k => $v )
{
		echo "          \t<input type=\"radio\" name=\"state\" value=\"";
		echo $k;
		echo "\" ";
		echo $k == $output['info']['geval_state'] ? "checked=checked" : "";
		echo "/>&nbsp;";
		echo $v;
		echo "          ";
}
echo "          </td>\r\n          <td class=\"vatop tips\">";
echo $lang['admin_evaluate_notice'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['admin_evaluate_adminremark'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea class=\"tarea\" name=\"admin_remark\" rows=\"6\">";
echo $output['info']['geval_remark'];
echo "</textarea></td><td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\" onclick=\"document.evaluateForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\nfunction hiddenexplain(id){\r\n\tif(confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\$.get(\"index.php?act=evaluate&op=delexplain\", {'id':id}, function(data){\r\n            if (data == 1)\r\n            {\r\n            \t\$(\"#explain_div\").hide();\r\n            \talert('";
echo $lang['admin_evaluate_drop_success'];
echo "');\r\n            }\r\n            else\r\n            {\r\n            \talert('";
echo $lang['admin_evaluate_drop_fail'];
echo "');\r\n            }\r\n        });\r\n\t}\r\n}\r\n</script>";
?>
