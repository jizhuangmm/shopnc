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
echo $lang['nc_coupon_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=coupon&op=apply\"><span>";
echo $lang['coupon_allow_state'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"coupon\">\r\n    <input type=\"hidden\" name=\"op\" value=\"list\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_coupon_name\">";
echo $lang['coupon_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search']['coupon_name_like'];
echo "\" name=\"search_coupon_name\" id=\"search_coupon_name\" class=\"txt\"></td>\r\n          <th><label for=\"search_store_name\">";
echo $lang['coupon_store_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"";
echo $output['search']['store_name'];
echo "\" name=\"search_store_name\" id=\"search_store_name\" class=\"txt\" style=\"width:100px;\"></td>\r\n          <th><label for=\"time_from\">";
echo $lang['coupon_lifetime'];
echo "</label></th>\r\n          <td><input type=\"text\" ";
if ( $output['search']['time_from'] != "" )
{
		echo "value=\"";
		echo date( "Y-m-d", $output['search']['time_from'] );
		echo "\"";
}
echo " id=\"time_from\" name=\"time_from\" class=\"txt date\"/>\r\n            <label for=\"time_to\">~</label>\r\n            <input type=\"text\" ";
if ( $output['search']['time_to'] != "" )
{
		echo "value=\"";
		echo date( "Y-m-d", $output['search']['time_to'] );
		echo "\"";
}
echo " id=\"time_to\" name=\"time_to\" class=\"txt date\"/></td>\r\n          <th><label for=\"\">";
echo $lang['coupon_class'];
echo "</label></th>\r\n          <td id=\"gcategory\"><select name=\"coupon_class\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
foreach ( $output['class_list'] as $val )
{
		echo "              <option value=\"";
		echo $val['class_id'];
		echo "\" ";
		if ( $output['search']['coupon_class'] == $val['class_id'] )
		{
				echo "selected";
		}
		echo ">";
		echo $val['class_name'];
		echo "</option>\r\n              ";
}
echo "            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"formProcess\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" id=\"submit_type\" name=\"submit_type\" value=\"\" />\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['coupon_help1'];
echo ",";
echo $lang['coupon_help2'];
echo "</li>\r\n            <li>";
echo $lang['coupon_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n    <table class=\"table tb-type2\">\r\n      <thead>        \r\n        <tr class=\"thead\">\r\n          <th></th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_pic'];
echo "</th>\r\n          <th>";
echo $lang['coupon_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_store_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_price'];
echo "(";
echo $lang['currency_zh'];
echo ")</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_lifetime'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['coupon_state'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_recommend'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $k => $v )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name='coupon_id[]' value=\"";
				echo $v['coupon_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <td class=\"w96 picture\"><div class=\"size-88x44\"><span class=\"thumb size-88x44\"><i></i><img height=\"44\" width=\"88\" src=\"";
				if ( stripos( $v['coupon_pic'], "http://" ) === FALSE )
				{
						echo SiteUrl."/".$v['coupon_pic'];
				}
				else
				{
						echo $v['coupon_pic'];
				}
				echo "\" onerror=\"this.src='";
				echo SiteUrl;
				echo "/templates/";
				echo TPL_NAME;
				echo "/images/default_coupon_image.png'\" onload=\"javascript:DrawImage(this,88,44);\"/></span></div></td>\r\n          <td  class=\"name w270\">";
				echo $v['coupon_title'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['store_name'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['coupon_price'];
				echo "</td>\r\n          <td class=\"nowarp align-center\"><p>";
				echo date( "Y-m-d", $v['coupon_start_date'] );
				echo "~";
				echo date( "Y-m-d", $v['coupon_end_date'] );
				echo "</p></td>\r\n          <td class=\"align-center\">";
				switch ( $v['coupon_state'] )
				{
				case "1" :
						echo $lang['nc_no'];
						break;
				case "2" :
						echo $lang['nc_yes'];
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				switch ( $v['coupon_recommend'] )
				{
				case "1" :
						echo $lang['nc_yes'];
						break;
				case "0" :
						echo $lang['nc_no'];
				}
				echo "</td>\r\n          <td class=\"w72 align-center\"><a href=\"index.php?act=coupon&op=edit&coupon_id=";
				echo $v['coupon_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a>&nbsp;\r\n          \t";
				if ( $v['coupon_state'] == "1" )
				{
						echo "          \t<a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){location.href='index.php?act=coupon&op=del&coupon_id=";
						echo $v['coupon_id'];
						echo "';}\">";
						echo $lang['nc_del'];
						echo "</a>\r\n          \t";
				}
				echo "          \t</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        <tr>\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall_1\"></td>\r\n          <td colspan=\"16\"><label for=\"checkall_2\">";
		echo $lang['nc_select_all'];
		echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('recommend');\"><span>";
		echo $lang['nc_recommend'];
		echo "</span></a>\r\n            \r\n            <div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\" charset=\"utf-8\" ></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\" ></script>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH."/js/jquery-ui/themes/ui-lightness/jquery.ui.css";
echo "\"/>\r\n<script>\r\n\$(function(){\r\n\r\n\t\$('#time_from').datepicker({onSelect:function(dateText,inst){\r\n    \tvar year2 = dateText.split('-') ;\r\n    \t\$('#time_to').datepicker( \"option\", \"minDate\", new Date(parseInt(year2[0]),parseInt(year2[1])-1,parseInt(year2[2])) );\r\n    }});\r\n    \$('#time_to').datepicker({onSelect:function(dateText,inst){\r\n    \tvar year1 = dateText.split('-') ;\r\n    \t\$('#time_from').datepicker( \"option\", \"maxDate\", new Date(parseInt(year1[0]),parseInt(year1[1])-1,parseInt(year1[2])) );\r\n    }})\r\n\t\r\n})\r\n\r\n//提交方法\r\nfunction submit_form(type){\r\n\t\$('#submit_type').val(type);\r\n\t\$('#formProcess').submit();\r\n}\r\n</script> ";
?>
