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
echo $lang['goods_recommend_batch_handle'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" value=\"";
echo $output['goods_id'];
echo "\" name=\"goods_id\">\r\n    <input type=\"hidden\" value=\"ok\" name=\"form_submit\">\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td class=\"required\"><label>";
echo $lang['goods_recommend_to'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat w830\" >\r\n              ";
if ( !empty( $output['recommend_list'] ) || is_array( $output['recommend_list'] ) )
{
		echo "              ";
		foreach ( $output['recommend_list'] as $k => $v )
		{
				echo "              <li class=\"left w18pre h36\">\r\n                <input type=\"radio\" value=\"";
				echo $v['recommend_id'];
				echo "\" name=\"recommend_id\" id=\"recommend_id";
				echo $v['recommend_id'];
				echo "\">\r\n                <label for=\"recommend_id";
				echo $v['recommend_id'];
				echo "\">";
				echo $v['recommend_name'];
				echo "</label>\r\n              </li>\r\n              ";
		}
		echo "              ";
}
echo "            </ul></td>\r\n        </tr>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
