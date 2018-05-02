<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

echo "<div class=\"page\">\r\n  <div class=\"item-title\">\r\n    <h3>";
echo $lang['dashboard_welcome_welcome'];
echo ",";
echo $output['admin_info']['admin_name'];
echo ",";
echo $lang['dashboard_welcome_to_use'];
echo ".  ";
echo $lang['dashboard_welcome_lase_login'];
echo $output['admin_info']['admin_login_time'];
echo "</h3>\r\n  </div>\r\n  <table class=\"table tb-type2\">\r\n    <thead class=\"thead\">\r\n      <tr>\r\n        <th colspan=\"10\">\r\n        <iframe src=\"http://www.shopnc.net/updates.php\" frameborder=\"0\" scrolling=\"No\" width=\"1000px\" height=\"30px\"></iframe>\r\n        </th>\r\n      </tr>\r\n      <tr class=\"space\">\r\n        <th colspan=\"10\">";
echo $lang['dashboard_welcome_week_info'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      <tr>\r\n        <td class=\"w12\"></td>\r\n        <td class=\"w108\"><strong>";
echo $lang['dashboard_welcome_new_member'];
echo ":</strong></td>\r\n        <td class=\"w25pre\"><span id=\"statistics_week_add_member\">0</span></td>\r\n        <td class=\"w120\"><strong>";
echo $lang['dashboard_welcome_new_store'];
echo "/";
echo $lang['dashboard_welcome_new_apply'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_week_add_store\">0</span>/<span id=\"statistics_week_add_audit_store\">0</span></td>\r\n      </tr>\r\n      <tr>\r\n        <td></td>\r\n        <td><strong>";
echo $lang['dashboard_welcome_new_goods'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_week_add_product\">0</span></td>\r\n        <td><strong>";
echo $lang['dashboard_welcome_new_order'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_week_add_order_num\">0</span></td>\r\n      </tr>\r\n    </tbody>\r\n    <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"10\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead class=\"thead\">\r\n      <tr class=\"space\">\r\n        <th colspan=\"10\">";
echo $lang['dashboard_welcome_total_info'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      <tr>\r\n        <td class=\"w12\"></td>\r\n        <td class=\"w108\"><strong>";
echo $lang['dashboard_welcome_total_member'];
echo ":</strong></td>\r\n        <td class=\"w25pre\"><span id=\"statistics_member\">0</span></td>\r\n        <td class=\"w120\"><strong>";
echo $lang['dashboard_welcome_total_store'];
echo "/";
echo $lang['dashboard_welcome_total_apply'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_store\">0</span>/<span id=\"statistics_audit_store\">0</span></td>\r\n      </tr>\r\n      <tr>\r\n        <td></td>\r\n        <td><strong>";
echo $lang['dashboard_welcome_total_goods'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_goods\">0</span></td>\r\n        <td><strong>";
echo $lang['dashboard_welcome_total_order'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_order\">0</span></td>\r\n      </tr>\r\n      <tr>\r\n        <td></td>\r\n        <td><strong>";
echo $lang['dashboard_welcome_total_price'];
echo ":</strong></td>\r\n        <td><span id=\"statistics_order_amount\">0</span></td>\r\n        <td></td>\r\n        <td></td>\r\n      </tr>\r\n    </tbody> <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"10\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n  <table class=\"table tb-type2\">\r\n    <thead class=\"thead\">\r\n      <tr class=\"space\">\r\n        <th colspan=\"10\">";
echo $lang['dashboard_welcome_sys_info'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      <tr>\r\n        <td class=\"w12\"></td>\r\n        <td class=\"w108\"><strong>";
echo $lang['dashboard_welcome_server_os'];
echo ":</strong></td>\r\n        <td class=\"w25pre\">";
echo $output['statistics']['os'];
echo "</td>\r\n        <td class=\"w120\"><strong>WEB ";
echo $lang['dashboard_welcome_server'];
echo ":</strong></td>\r\n        <td>";
echo $output['statistics']['web_server'];
echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td></td>\r\n        <td><strong>PHP ";
echo $lang['dashboard_welcome_version'];
echo ":</strong></td>\r\n        <td>";
echo $output['statistics']['php_version'];
echo "</td>\r\n        <td><strong>MYSQL ";
echo $lang['dashboard_welcome_version'];
echo ":</strong></td>\r\n        <td>";
echo $output['statistics']['sql_version'];
echo "</td>\r\n      </tr>\r\n      <tr>\r\n        <td></td>\r\n        <td><strong>ShopNC ";
echo $lang['dashboard_welcome_version'];
echo ":</strong></td>\r\n        <td>";
echo $output['statistics']['shop_version'];
echo "</td>\r\n        <td><strong>";
echo $lang['dashboard_welcome_install_date'];
echo ":</strong></td>\r\n        <td>";
echo $output['statistics']['setup_date'];
echo "</td>\r\n      </tr>\r\n    </tbody> <tfoot>\r\n      <tr class=\"tfoot\">\r\n        <td colspan=\"10\"></td>\r\n      </tr>\r\n    </tfoot>\r\n  </table>\r\n</div>\r\n\r\n<script type=\"text/javascript\"> \r\n\$(function(){\r\n\t\$.getJSON(\"index.php?act=dashboard&op=statistics\", function(data){\r\n\t  \$.each(data, function(k,v){\r\n\t    \$(\"#statistics_\"+k).html(v);\r\n\t  });\r\n\t});\r\n});\r\n</script>";
?>
