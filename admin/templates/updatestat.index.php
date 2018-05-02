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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['admin_updatestat'];
echo "</h3>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n    \t<thead>\r\n    \t\t<tr class=\"noborder\">\r\n    \t\t\t<td>";
echo $lang['points_item'];
echo "</td>\r\n    \t\t\t<td>";
echo $lang['admin_fornum'];
echo "</th>\r\n    \t\t</tr>\r\n    \t</thead>\r\n    \t<tbody>\r\n    \t\t<tr class=\"hover\">\r\n    \t\t\t<td class=\"w150\">";
echo $lang['admin_buyerevalstat'];
echo "</td>\r\n    \t\t\t<td class=\"w200\"><input id=\"buyerevalnum\" value=\"100\" class=\"txt\" type=\"text\" style=\"width:100px;\"></td>\r\n    \t\t\t<td><input type=\"button\" class=\"btn\" value=\"";
echo $lang['admin_update'];
echo "\" onclick=\"submitform('buyereval');\"></td>\r\n    \t\t</tr>\r\n    \t\t<tr class=\"hover\">\r\n    \t\t\t<td class=\"w150\">";
echo $lang['admin_sellerevalstat'];
echo "</td>\r\n    \t\t\t<td><input id=\"sellerevalnum\" value=\"100\" class=\"txt\" type=\"text\" style=\"width:100px;\"></td>\r\n    \t\t\t<td><input type=\"button\" class=\"btn\" value=\"";
echo $lang['admin_update'];
echo "\" onclick=\"submitform('sellereval');\"></td>\r\n    \t\t</tr>\r\n    \t\t<tr class=\"hover\">\r\n    \t\t\t<td class=\"w150\">";
echo $lang['admin_storeevalstat'];
echo "</td>\r\n    \t\t\t<td><input id=\"storeevalnum\" value=\"100\" class=\"txt\" type=\"text\" style=\"width:100px;\"></td>\r\n    \t\t\t<td><input type=\"button\" class=\"btn\" value=\"";
echo $lang['admin_update'];
echo "\" onclick=\"submitform('storeeval');\"></td>\r\n    \t\t</tr>\r\n    \t\t<tr class=\"hover\">\r\n    \t\t\t<td class=\"w150\">";
echo $lang['admin_goodsevalcount'];
echo "</td>\r\n    \t\t\t<td><input id=\"goodsevalnum\" value=\"100\" class=\"txt\" type=\"text\" style=\"width:100px;\"></td>\r\n    \t\t\t<td><input type=\"button\" class=\"btn\" value=\"";
echo $lang['admin_update'];
echo "\" onclick=\"submitform('goodseval');\"></td>\r\n    \t\t</tr>\r\n    \t</tbody>\r\n    </table>\r\n</div>\r\n<script>\r\nfunction submitform(type){\r\n\tvar url ='index.php?act=updatestat';\r\n\tif(type != ''){\r\n\t\tvar num = \$(\"#\"+type+\"num\").val();\r\n\t\tnum = parseInt(num) > 0? parseInt(num) : 100;\r\n\t\turl = url+'&op='+type+\"&num=\"+num;\r\n\t}\r\n\twindow.location=url;\r\n}\r\n</script>";
?>
