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
echo $lang['nc_goods_evaluate'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n      \t<li><a href=\"index.php?act=evaluate&op=evalgoods_list\" ><span>";
echo $lang['admin_evaluate_list'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_evalseller_list'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=evaluate&op=evalstore_list\" ><span>";
echo $lang['admin_evalstore_list'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"act\" value=\"evaluate\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"evalseller_list\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"goods_name\">";
echo $lang['admin_evaluate_goodsname'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"goods_name\" id=\"goods_name\" value=\"";
echo $_GET['goods_name'];
echo "\" /></td>\r\n          <th><label for=\"store_name\">";
echo $lang['admin_evaluate_tomembername'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"to_name\" id=\"to_name\" value=\"";
echo $_GET['to_name'];
echo "\" /></td>\r\n          <td><select name=\"grade\">\r\n              <option value='' ";
echo $_GET['grade'] == "" ? "selected" : "";
echo ">";
echo $lang['admin_evaluate_grade'];
echo "</option>\r\n              ";
foreach ( ( array )$output['evaluate_grade'] as $k => $v )
{
		echo "              <option value=\"";
		echo $k;
		echo "\" ";
		echo $_GET['grade'] == "{$k}" ? "selected" : "";
		echo ">";
		echo $v;
		echo "</option>\r\n              ";
}
echo "            </select></td>\r\n          <td><select name=\"state\">\r\n              <option value='' ";
echo $_GET['state'] == "" ? "selected" : "";
echo ">";
echo $lang['admin_evaluate_state'];
echo "</option>\r\n              ";
foreach ( ( array )$output['evaluate_state'] as $k => $v )
{
		echo "              <option value=\"";
		echo $k;
		echo "\" ";
		echo $_GET['state'] == "{$k}" ? "selected" : "";
		echo ">";
		echo $v;
		echo "</option>\r\n              ";
}
echo "            </select></td>\r\n          <td>";
echo $lang['admin_evaluate_addtime'];
echo "</td>\r\n          <td><input class=\"txt date\" type=\"text\" name=\"stime\" id=\"stime\" value=\"";
echo $_GET['stime'];
echo "\" />~\r\n          \t  <input class=\"txt date\" type=\"text\" name=\"etime\" id=\"etime\" value=\"";
echo $_GET['etime'];
echo "\" />\r\n          </td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['admin_evaluate_help1'];
echo "</li>\r\n            <li>";
echo $lang['admin_evaluate_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    ";
if ( !empty( $output['evalgoods_list'] ) )
{
		echo "    <thead>\r\n      <tr class=\"thead\">\r\n        <th class=\"w72 align-center\">";
		echo $lang['admin_evaluate_grade'];
		echo "</th>\r\n        <th>";
		echo $lang['admin_evaluate_buyerdesc'];
		echo "</th>\r\n        <th class=\"w108 align-center\">";
		echo $lang['admin_evaluate_tomembername'];
		echo " </th>\r\n        <th class=\"w270\">";
		echo $lang['admin_evaluate_goodsname'];
		echo " </th>\r\n        <th class=\"w108 align-center\">";
		echo $lang['admin_evaluate_storename'];
		echo "</th>\r\n        <th class=\"align-center\">";
		echo $lang['admin_evaluate_state'];
		echo "</th>\r\n        <th class=\"w72 align-center\">";
		echo $lang['nc_handle'];
		echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
		foreach ( $output['evalgoods_list'] as $v )
		{
				echo "      <tr class=\"hover\">\r\n      \t<td class=\"align-center\">";
				echo $output['evaluate_grade'][$v['geval_scores']];
				echo "</td>\r\n      \t<td>\r\n      \t\t<div>";
				if ( empty( $v['geval_content'] ) )
				{
						echo $output['evaluate_defaulttext'][$v['geval_scores']];
				}
				else
				{
						echo $v['geval_content'];
				}
				echo "</div>\r\n      \t\t";
				if ( !empty( $v['geval_explain'] ) )
				{
						echo "      \t\t<div id=\"explain_div_";
						echo $v['geval_id'];
						echo "\">\r\n      \t\t<span style=\"color:#996600;padding:5px 0px;\">[";
						echo $lang['admin_evaluate_explain'];
						echo "]";
						echo $v['geval_explain'];
						echo "</span>\r\n      \t\t<a class=\"btns tooltip\" onclick=\"hiddenexplain(";
						echo $v['geval_id'];
						echo ");\" href=\"JavaScript:void(0);\" title=\"";
						echo $lang['admin_evaluate_delexplain'];
						echo "\"><span>";
						echo $lang['admin_evaluate_delexplain'];
						echo "</span></a>\r\n      \t\t</div>\r\n      \t\t";
				}
				echo "      \t\t<div style=\"color: #999999; padding-top:3px;\">[";
				echo date( "Y-m-d", $v['geval_addtime'] );
				echo "]</div>\r\n      \t</td>\r\n      \t<td class=\"align-center\">";
				echo $v['geval_tomembername'];
				echo "</td>\r\n        <td><a href=\"";
				echo SiteUrl.DS.ncurl( array(
						"act" => "goods",
						"goods_id" => $v['geval_goodsid'],
						"id" => $v['geval_storeid']
				), "goods" );
				echo "\" target=\"_blank\">";
				echo $v['geval_goodsname'];
				echo "</a></td>\r\n        <td class=\"align-center\">";
				echo $v['geval_storename'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $output['evaluate_state'][$v['geval_state']];
				echo "</td>\r\n        <td class=\"align-center\">\r\n        \t<a href=\"index.php?act=evaluate&op=evalgoods_info&type=seller&id=";
				echo $v['geval_id'];
				echo "\" >";
				echo $lang['nc_edit'];
				echo "</a>\r\n        \t<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "')){window.location='index.php?act=evaluate&op=evalgoods_del&id=";
				echo $v['geval_id'];
				echo "';}else{return false;}\">";
				echo $lang['nc_del'];
				echo "</a>\r\n        </td>\r\n      </tr>\r\n      ";
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
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\nfunction hiddenexplain(id){\r\n\tif(confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\$.get(\"index.php?act=evaluate&op=delexplain\", {'id':id}, function(data){\r\n            if (data == 1)\r\n            {\r\n            \t\$(\"#explain_div_\"+id).hide();\r\n            \talert('";
echo $lang['admin_evaluate_drop_success'];
echo "');\r\n            }\r\n            else\r\n            {\r\n            \talert('";
echo $lang['admin_evaluate_drop_fail'];
echo "');\r\n            }\r\n        });\r\n\t}\r\n}\r\n</script>";
?>
