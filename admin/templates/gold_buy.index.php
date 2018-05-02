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
echo $lang['nc_gold_buy'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['gbuy_log'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=gold_buy&op=gold_log\" ><span>";
echo $lang['gold_log'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php\" id=\"submit_form\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"gold_buy\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"gold_buy\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"storename\">";
echo $lang['store_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" value=\"";
echo $output['search']['storename'];
echo "\" id=\"storename\" name=\"storename\" /></td>\r\n          <th><label for=\"membername\">";
echo $lang['buyer_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" value=\"";
echo $output['search']['membername'];
echo "\" id=\"membername\" name=\"membername\" /></td>\r\n          <td>\r\n          \t<select name=\"payment\">\r\n          \t\t<option value=\"\" ";
echo $output['search']['payment'] == "" ? "selected" : "";
echo ">";
echo $lang['payment'];
echo "</option>\r\n\t\t\t";
if ( !empty( $output['payment_array'] ) )
{
		echo "          \t\t";
		foreach ( $output['payment_array'] as $k => $v )
		{
				echo "          \t\t\t<option value=\"";
				echo $k;
				echo "\" ";
				echo $output['search']['payment'] == $k ? "selected" : "";
				echo ">";
				echo $v;
				echo "</option>\r\n          \t\t";
		}
		echo "          \t";
}
echo "          \t</select>\r\n          </td>\r\n          <td>\r\n          \t<select name=\"ispay\">\r\n          \t\t<option value=\"\" ";
echo $output['search']['ispay'] == "" ? "selected" : "";
echo ">";
echo $lang['gbuy_state'];
echo "</option>\r\n          \t\t<option value=\"0\" ";
echo $output['search']['ispay'] == "0" ? "selected" : "";
echo ">";
echo $lang['gbuy_pay'];
echo "</option>\r\n          \t\t<option value=\"1\" ";
echo $output['search']['ispay'] == "1" ? "selected" : "";
echo ">";
echo $lang['gbuy_pay_success'];
echo "</option>\r\n          \t</select>\r\n          </td>\r\n          <th><label for=\"add_time_from\">";
echo $lang['gbuy_time_from'];
echo "</label></th>\r\n          <td><input class=\"txt date\" type=\"text\" value=\"";
echo $output['search']['add_time_from'];
echo "\" id=\"add_time_from\" name=\"add_time_from\" />\r\n            <label for=\"add_time_to\">~</label>\r\n            <input class=\"txt date\" type=\"text\" value=\"";
echo $output['search']['add_time_to'];
echo "\" id=\"add_time_to\" name=\"add_time_to\"  /></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\">\r\n    <thead>\r\n     \r\n      <tr class=\"thead\">\r\n        <th></th>\r\n        <th>";
echo $lang['gbuy_add_time'];
echo "</th>\r\n        <th>";
echo $lang['store_name'];
echo "</th>\r\n        <th class=\"w156 align-center\">";
echo $lang['buyer_name'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['gbuy_price'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['gbuy_gold_num'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['payment'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['gbuy_state'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( 0 < count( $output['gbuy_list'] ) )
{
		echo "      ";
		foreach ( $output['gbuy_list'] as $key => $val )
		{
				echo "      <tr class=\"hover\">\r\n        <td class=\"w12\"></td>\r\n        <td class=\"w156\">";
				echo date( "Y-m-d H:i:s", $val['gbuy_addtime'] );
				echo "</td>\r\n        <td class=\"w18pre\">";
				echo $val['gbuy_storename'];
				echo "</td>\r\n        <td class=\"align-center\">";
				echo $val['gbuy_membername'];
				echo "</td>\r\n        <td class=\"w120 align-center\">";
				echo $val['gbuy_price'];
				echo "</td>\r\n        <td class=\"w120 align-center\">";
				echo $val['gbuy_num'];
				echo "</td>\r\n        <td class=\"w120 align-center\">";
				echo $output['payment_array'][$val['gbuy_check_type']];
				echo "</td>\r\n        <td class=\"w120 align-center\">";
				if ( $val['gbuy_ispay'] == 0 )
				{
						echo "          ";
						echo $lang['gbuy_pay'];
						echo "          ";
				}
				echo "          ";
				if ( $val['gbuy_ispay'] == 1 )
				{
						echo "          ";
						echo $lang['gbuy_pay_success'];
						echo "          ";
				}
				echo "</td>\r\n        <td class=\"w132 align-center\">";
				if ( $val['gbuy_ispay'] == 0 )
				{
						echo "          <a href=\"index.php?act=gold_buy&op=edit&gbuy_id=";
						echo $val['gbuy_id'];
						echo "\">";
						echo $lang['nc_edit'];
						echo "</a> | <a href=\"javascript:if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')) window.location = 'index.php?act=gold_buy&op=del&gbuy_id=";
						echo $val['gbuy_id'];
						echo "';\"> ";
						echo $lang['nc_del'];
						echo "</a>\r\n          ";
				}
				echo "          ";
				if ( $val['gbuy_ispay'] == 1 )
				{
						echo "          <a href=\"index.php?act=gold_buy&op=edit&gbuy_id=";
						echo $val['gbuy_id'];
						echo "\">";
						echo $lang['nc_view'];
						echo "</a>\r\n          ";
				}
				echo "</td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"15\"><div class=\"pagination\"> ";
echo $output['show_page'];
echo " </div></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \r\n\t\$('#submit_form').validate({\r\n        errorPlacement: function(error, element){\r\n            \$(element).next('.field_notice').hide();\r\n            \$(element).after(error);\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            gbuy_num_from : {\r\n                number : true,\r\n                min:1\r\n            },\r\n            gbuy_num_to : {\r\n                number   : true,\r\n                min:1\r\n            }\r\n        },\r\n        messages : {\r\n            gbuy_num_from : {\r\n                number : '";
echo $lang['gbuy_number'];
echo "',\r\n                min   : '";
echo $lang['gbuy_number'];
echo "'\r\n            },\r\n            gbuy_num_to  : {\r\n                number   : '";
echo $lang['gbuy_number'];
echo "',\r\n                min   : '";
echo $lang['gbuy_number'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
