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
echo $lang['nc_points_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['pointssettings'];
echo "</span></a></li>     \r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n       \r\n        <tr>\r\n          <td class=\"\" colspan=\"2\"><table class=\"table tb-type2 nomargin\">\r\n              <thead>\r\n                <tr class=\"space\">\r\n                  <th colspan=\"16\">";
echo $lang['points_ruletip'];
echo ":</th>\r\n                </tr>\r\n                <tr class=\"thead\">\r\n                  <th>";
echo $lang['points_item'];
echo "</th>\r\n                  <th>";
echo $lang['points_number'];
echo "</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                <tr class=\"hover\">\r\n                  <td class=\"w200\">";
echo $lang['points_number_reg'];
echo "</td>\r\n                  <td><input id=\"points_reg\" name=\"points_reg\" value=\"";
echo $output['list_setting']['points_reg'];
echo "\" class=\"txt\" type=\"text\" style=\"width:60px;\"></td>\r\n                </tr>\r\n                <tr class=\"hover\">\r\n                  <td>";
echo $lang['points_number_login'];
echo "</td>\r\n                  <td><input id=\"points_login\" name=\"points_login\" value=\"";
echo $output['list_setting']['points_login'];
echo "\" class=\"txt\" type=\"text\" style=\"width:60px;\"></td>\r\n                </tr>\r\n                <tr class=\"hover\">\r\n                  <td>";
echo $lang['points_number_comments'];
echo "</td>\r\n                  <td><input id=\"points_comments\" name=\"points_comments\" value=\"";
echo $output['list_setting']['points_comments'];
echo "\" class=\"txt\" type=\"text\" style=\"width:60px;\"></td>\r\n                </tr>\r\n              </tbody>\r\n            </table>\r\n            <table class=\"table tb-type2 nomargin\">\r\n              <thead>\r\n                <tr class=\"thead\">\r\n                  <th colspan=\"2\">";
echo $lang['points_number_order'];
echo "</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                <tr class=\"hover\">\r\n                  <td class=\"w200\">";
echo $lang['points_number_orderrate'];
echo "</td>\r\n                  <td><input id=\"points_orderrate\" name=\"points_orderrate\" value=\"";
echo $output['list_setting']['points_orderrate'];
echo "\" class=\"txt\" type=\"text\" style=\"width:60px;\">\r\n                    ";
echo $lang['points_number_orderrate_tip'];
echo "</td>\r\n                </tr>\r\n                <tr class=\"hover\">\r\n                  <td>";
echo $lang['points_number_ordermax'];
echo "</td>\r\n                  <td><input id=\"points_ordermax\" name=\"points_ordermax\" value=\"";
echo $output['list_setting']['points_ordermax'];
echo "\" class=\"txt\" type=\"text\" style=\"width:60px;\">\r\n                    ";
echo $lang['points_number_ordermax_tip'];
echo "</td>\r\n                </tr>\r\n              </tbody>\r\n            </table></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
