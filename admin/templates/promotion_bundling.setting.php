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
echo "<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\t\$(\"#submitBtn\").click(function(){ \r\n \t\t\$(\"#add_form\").submit();\r\n\t});\r\n    //页面输入内容验证\r\n\t\$(\"#add_form\").validate({\r\n\t\terrorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n\t\t},\r\n\t\tsuccess: function(label){\r\n\t\t\tlabel.addClass('valid');\r\n\t\t},\r\n\t\tonkeyup    : false,\r\n\t\trules : {\r\n\t\t\tpromotion_bundling_price: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdigits : true,\r\n\t\t\t\tmin : 1\r\n\t\t\t},\r\n\t\t\tpromotion_bundling_sum: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdigits : true\r\n\t\t\t},\r\n\t\t\tpromotion_bundling_goods_sum: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdigits : true,\r\n\t\t\t\tmin : 1,\r\n\t\t\t\tmax : 5\r\n\t\t\t}\r\n\t\t},\r\n\t\tmessages : {\r\n\t\t\tpromotion_bundling_price: {\r\n\t\t\t\trequired : '";
echo $lang['bundling_price_error'];
echo "',\r\n\t\t\t\tdigits : '";
echo $lang['bundling_price_error'];
echo "',\r\n\t\t\t\tmin : '";
echo $lang['bundling_price_error'];
echo "'\r\n\t\t\t},\r\n\t\t\tpromotion_bundling_sum: {\r\n\t\t\t\trequired : '";
echo $lang['bundling_sum_error'];
echo "',\r\n\t\t\t\tdigits : '";
echo $lang['bundling_sum_error'];
echo "'\r\n\t\t\t},\r\n\t\t\tpromotion_bundling_goods_sum: {\r\n\t\t\t\trequired : '";
echo $lang['bundling_goods_sum_error'];
echo "',\r\n\t\t\t\tdigits : '";
echo $lang['bundling_goods_sum_error'];
echo "',\r\n\t\t\t\tmin : '";
echo $lang['bundling_goods_sum_error'];
echo "',\r\n\t\t\t\tmax : '";
echo $lang['bundling_goods_sum_error'];
echo "'\r\n\t\t\t}\r\n\t\t}\r\n\t});\r\n});\r\n</script> \r\n<div class=\"page\">\r\n  <!-- 页面导航 -->\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_promotion_bundling'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=promotion_bundling&op=bundling_quota\"><span>";
echo $lang['bundling_quota'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=promotion_bundling&op=bundling_list\"><span>";
echo $lang['bundling_list'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['bundling_setting'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"add_form\" method=\"post\" action=\"index.php?act=promotion_bundling&op=bundling_setting\">\r\n    <input type=\"hidden\" id=\"form_submit\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"promotion_bundling_price\">";
echo $lang['bundling_gold_price'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" id=\"promotion_bundling_price\" name=\"promotion_bundling_price\" value=\"";
echo $output['setting']['promotion_bundling_price'];
echo "\" class=\"txt\">\r\n            </td>\r\n            <td class=\"vatop tips\">";
echo $lang['bundling_price_prompt'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"promotion_bundling_sum\">";
echo $lang['bundling_sum'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" id=\"promotion_bundling_sum\" name=\"promotion_bundling_sum\" value=\"";
echo $output['setting']['promotion_bundling_sum'];
echo "\" class=\"txt\">\r\n            </td>\r\n            <td class=\"vatop tips\">";
echo $lang['bundling_sum_prompt'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"promotion_bundling_goods_sum\">";
echo $lang['bundling_goods_sum'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n            <td class=\"vatop rowform\">\r\n                <input type=\"text\" id=\"promotion_bundling_goods_sum\" name=\"promotion_bundling_goods_sum\" value=\"";
echo $output['setting']['promotion_bundling_goods_sum'];
echo "\" class=\"txt\">\r\n            </td>\r\n            <td class=\"vatop tips\">";
echo $lang['bundling_goods_sum_prompt'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n";
?>
