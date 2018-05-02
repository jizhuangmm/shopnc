<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<table class=\"table tb-type2 order mtw\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
echo $lang['complain_progress'];
echo "</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td class=\"progress\"><span id=\"state_new\" class=\"text\">";
echo $lang['complain_state_new'];
echo "</span> <span class=\"next-step\"></span> <span id=\"state_appeal\" class=\"text\">";
echo $lang['complain_state_appeal'];
echo "</span> <span class=\"next-step\"></span> <span id=\"state_talk\" class=\"text\">";
echo $lang['complain_state_talk'];
echo "</span>\r\n          <span class=\"next-step\">\r\n          </span> <span id=\"state_handle\" class=\"text\">";
echo $lang['complain_state_handle'];
echo "</span> <span class=\"next-step\"></span> <span id=\"state_finish\" class=\"text\">";
echo $lang['complain_state_finish'];
echo "</span></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<table class=\"table tb-type2 order\">\r\n  <thead class=\"thead\">\r\n    <tr class=\"space\">\r\n      <th>";
echo $lang['order_detail'];
echo "</th>\r\n    </tr></thead>\r\n    <tbody>\r\n    <tr>\r\n      <th>";
echo $lang['order_message'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td><ul>\r\n          <li><strong>";
echo $lang['order_state'];
echo ":</strong><b>";
echo $output['order_info']['order_state_text'];
echo "</b></li>\r\n          <li><strong>";
echo $lang['order_sn'];
echo ":</strong><a href=\"index.php?act=trade&op=show_order&order_id=";
echo $output['order_info']['order_id'];
echo "\" target=\"_blank\">";
echo $output['order_info']['order_sn'];
echo "</a> </li>\r\n          <li><strong>";
echo $lang['order_datetime'];
echo ":</strong>";
echo date( "Y-m-d H:i:s", $output['order_info']['add_time'] );
echo "</li>\r\n          <li><strong>";
echo $lang['order_price'];
echo ":</strong>";
echo $lang['currency'].$output['order_info']['order_amount'];
echo "</li>\r\n          ";
if ( !empty( $output['order_info']['voucher_price'] ) )
{
		echo "          <li><strong>";
		echo $lang['order_voucher_price'];
		echo ":</strong>";
		echo $lang['currency'].$output['order_info']['voucher_price'].".00";
		echo "</li>\r\n          <li><strong>";
		echo $lang['order_voucher_sn'];
		echo ":</strong>";
		echo $output['order_info']['voucher_code'];
		echo "</li>\r\n          ";
}
echo "        </ul></td>\r\n    </tr>\r\n    <tr>\r\n      <th>";
echo $lang['order_seller_message'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td><ul>\r\n          <li><strong>";
echo $lang['order_shop_name'];
echo ":</strong><a href=\"";
echo SiteUrl;
echo "/index.php?act=show_store&id=";
echo $output['order_info']['store_id'];
echo "\" target=\"_blank\"> ";
echo $output['order_info']['store_name'];
echo " </a> </li>\r\n          </a>\r\n        </ul></td>\r\n    </tr>\r\n    <tr>\r\n      <th>";
echo $lang['order_buyer_message'];
echo "</th>\r\n    </tr>\r\n    <tr class=\"noborder\">\r\n      <td><ul>\r\n          <li><strong>";
echo $lang['order_buyer_name'];
echo ":</strong>";
echo $output['order_info']['buyer_name'];
echo "</li>\r\n        </ul></td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    var state = ";
echo empty( $output['complain_info']['complain_state'] ) ? 0 : $output['complain_info']['complain_state'];
echo ";\r\n    if(state <= 10) {\r\n        \$(\"#state_new\").addClass('red');\r\n    }\r\n    if(state == 20 ){\r\n        \$(\"#state_new\").addClass('green');\r\n        \$(\"#state_appeal\").addClass('red');\r\n    }\r\n    if(state == 30 ){\r\n        \$(\"#state_new\").addClass('green');\r\n        \$(\"#state_appeal\").addClass('green');\r\n        \$(\"#state_talk\").addClass('red');\r\n    }\r\n    if(state == 40 ){\r\n        \$(\"#state_new\").addClass('green');\r\n        \$(\"#state_appeal\").addClass('green');\r\n        \$(\"#state_talk\").addClass('green');\r\n        \$(\"#state_handle\").addClass('red');\r\n    }\r\n    if(state == 99 ){\r\n        \$(\"#state_new\").addClass('green');\r\n        \$(\"#state_appeal\").addClass('green');\r\n        \$(\"#state_talk\").addClass('green');\r\n        \$(\"#state_handle\").addClass('green');\r\n        \$(\"#state_finish\").addClass('green');\r\n    }\r\n});\r\n</script> \r\n";
?>
