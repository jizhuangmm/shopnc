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
echo $lang['inform_manage_title'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		echo "        <li><a href=\"";
		echo $menu['menu_url'];
		echo "\" ><span>";
		echo $menu['menu_name'];
		echo "</span></a></li>\r\n        ";
}
echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['inform_text_handle'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"handle_form\" method=\"post\"  action=\"index.php?act=inform&op=inform_handle\" name=\"form1\">\r\n    <input id=\"inform_id\" name=\"inform_id\" type=\"hidden\" value=\"";
echo $output['inform_id'];
echo "\"/>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label> ";
echo $lang['inform_goods_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\" id=\"goods_name\">";
echo $output['inform_goods_name'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['inform_handle_type'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul>\r\n              <li><label>\r\n                <input type=\"radio\" value=\"1\" name=\"inform_handle_type\">\r\n                ";
echo $lang['inform_handle_type_unuse_message'];
echo " </label></li>\r\n              <li><label>\r\n                <input type=\"radio\" value=\"2\" name=\"inform_handle_type\">\r\n                ";
echo $lang['inform_handle_type_venom_message'];
echo " </label></li>\r\n              <li><label>\r\n                <input type=\"radio\" value=\"3\" name=\"inform_handle_type\">\r\n                ";
echo $lang['inform_handle_type_valid_message'];
echo " </label></li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['inform_handle_message'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea class=\"tarea\" name=\"inform_handle_message\" rows=\"6\" id=\"inform_handle_message\"></textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"btn_handle_submit\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    //默认选中第一个radio\r\n    \$(\":radio\").first().attr(\"checked\",true);\r\n    \$(\"#btn_handle_submit\").click(function(){\r\n        if(\$(\"#inform_handle_message\").val()=='') {\r\n            alert(\"";
echo $lang['inform_handle_message_null'];
echo "\");\r\n        }\r\n        else {\r\n            if(confirm(\"";
echo $lang['inform_handle_confirm'];
echo "\")) {\r\n                \$(\"#handle_form\").submit();\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>\r\n";
?>
