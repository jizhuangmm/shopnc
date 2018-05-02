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
echo "<style>\r\n.evallist .date { color: #999999; padding-top:3px;}\r\n.rate-star em {\r\n    background-position: left top;\r\n    display: block;\r\n    float: left;\r\n    margin: 8px 100px;\r\n    position: relative;\r\n    width: 70px;\r\n    z-index: 1;\r\n}\r\n.rate-star em, .rate-star em i {\r\n    background-image: url(\"templates/images/rate_star.gif\");\r\n    background-repeat: repeat-x;\r\n    height: 12px;\r\n}\r\n.rate-star em i {\r\n    background-position: left bottom;\r\n    left: 0;\r\n    position: absolute;\r\n    top: 0;\r\n    z-index: 1;\r\n}\r\n</style>\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_goods_evaluate'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=evaluate&op=evalgoods_list\" ><span>";
echo $lang['admin_evaluate_list'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=evaluate&op=evalseller_list\" ><span>";
echo $lang['admin_evalseller_list'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_evalstore_list'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"act\" value=\"evaluate\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"evalstore_list\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"store_name\">";
echo $lang['admin_evaluate_storename'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"store_name\" id=\"store_name\" value=\"";
echo $_GET['store_name'];
echo "\" /></td>\r\n          <th><label for=\"from_name\">";
echo $lang['admin_evaluate_frommembername'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"from_name\" id=\"from_name\" value=\"";
echo $_GET['from_name'];
echo "\" /></td>\r\n          <td><select name=\"grade\">\r\n              <option value='' ";
echo $_GET['grade'] == "" ? "selected" : "";
echo ">";
echo $lang['admin_evalstore_score'];
echo "</option>\r\n              ";
$i = 1;
for ( ;	$i <= 5;	++$i	)
{
		echo "              <option value=\"";
		echo $i;
		echo "\" ";
		echo $_GET['grade'] == "{$i}" ? "selected" : "";
		echo ">";
		echo $i;
		echo $lang['admin_evalstore_score_unit'];
		echo "</option>\r\n              ";
}
echo "            </select></td>\r\n          <td>";
echo $lang['admin_evaluate_addtime'];
echo "</td>\r\n          <td><input class=\"txt date\" type=\"text\" name=\"stime\" id=\"stime\" value=\"";
echo $_GET['stime'];
echo "\" />~\r\n          \t<input class=\"txt date\" type=\"text\" name=\"etime\" id=\"etime\" value=\"";
echo $_GET['etime'];
echo "\" />\r\n          </td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['admin_evalstore_help1'];
echo "</li>\r\n            <li>";
echo $lang['admin_evalstore_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2 evallist\">\r\n    ";
if ( is_array( $output['evalstore_list'] ) )
{
		echo "    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
		echo $lang['admin_evaluate_storename'];
		echo "</th>\r\n        <th class=\"w150 align-center\">";
		echo $lang['admin_evaluate_ordersn'];
		echo "</th>\r\n        <th class=\"w150 align-center\">";
		echo $lang['admin_evaluate_frommembername'];
		echo "</th>\r\n        <th class=\"w150 align-center\">";
		echo $lang['admin_evalstore_type'];
		echo "</th>\r\n        <th class=\"w150 align-center\">";
		echo $lang['admin_evalstore_score'];
		echo "</th>\r\n        <th class=\"w150 align-center\">";
		echo $lang['admin_evaluate_addtime'];
		echo "</th>\r\n        <th class=\"w72 align-center\">";
		echo $lang['nc_handle'];
		echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
		foreach ( $output['evalstore_list'] as $v )
		{
				echo "      <tr class=\"hover\">\r\n      \t<td>";
				echo $v['seval_storename'];
				echo "</td>\r\n      \t<td class=\"align-center\">";
				echo $v['seval_orderno'];
				echo "</td>\r\n      \t<td class=\"align-center\">";
				echo $v['seval_membername'];
				echo "</td>\r\n      \t<td class=\"align-center\">";
				echo $output['evalstore_type'][$v['seval_type']];
				echo "</td>\r\n      \t<td class=\"align-center\"><dd class=\"rate-star\" title=\"";
				echo $v['seval_scores'];
				echo $lang['admin_evalstore_score_unit'];
				echo "\"><em><i style=\" width:";
				echo round( $v['seval_scores'] / 5 * 100, 2 );
				echo "%;\"></i></em></dd></td>\r\n      \t<td class=\"align-center\">";
				echo date( "Y-m-d", $v['seval_addtime'] );
				echo "</td>\r\n        <td class=\"align-center\"><a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){window.location='index.php?act=evaluate&op=evalstore_del&id=";
				echo $v['seval_id'];
				echo "';}else{return false;}\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\" id=\"dataFuncs\"><div class=\"pagination\">";
echo $output['show_page'];
echo "</div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
