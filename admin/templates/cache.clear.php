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
echo $lang['cache_cls_operate'];
echo "</h3>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"cache_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\"><table class=\"table nomargin\">\r\n              <tbody>\r\n                <tr>\r\n                  <td class=\"required\"><input id=\"cls_full\" name=\"cls_full\" value=\"1\" type=\"checkbox\">\r\n                    &nbsp;\r\n                    <label for=\"cls_full\">";
echo $lang['cache_cls_all'];
echo "</label></td>\r\n                </tr>\r\n                <tr class=\"noborder\">\r\n                  <td class=\"vatop rowform\"><ul class=\"nofloat w830\">\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" value=\"setting\" >\r\n                          &nbsp;";
echo $lang['cache_cls_seting'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" value=\"goodsclass\" >\r\n                          &nbsp;";
echo $lang['cache_cls_category'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" value=\"adv\" >\r\n                          &nbsp;";
echo $lang['cache_cls_adv'];
echo "</label>\r\n                      </li>\r\n                     <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"link\" value=\"link\" >\r\n                          &nbsp;";
echo $lang['cache_cls_link'];
echo "</label>\r\n                      </li>                      \r\n                      <li class=\"left\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"groupbuy\" value=\"groupbuy\" >\r\n                          &nbsp;";
echo $lang['cache_cls_group'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"nav\" value=\"nav\" >\r\n                          &nbsp;";
echo $lang['cache_cls_nav'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"index\" value=\"index\" >\r\n                          &nbsp;";
echo $lang['cache_cls_index'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"table\" value=\"table\" >\r\n                          &nbsp;";
echo $lang['cache_cls_table'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"seo\" value=\"seo\" >\r\n                          &nbsp;SEO</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"express\" value=\"express\" >\r\n                          &nbsp;";
echo $lang['cache_cls_express'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"store_class\" value=\"store_class\" >\r\n                          &nbsp;";
echo $lang['cache_cls_store_class'];
echo "</label>\r\n                      </li>\r\n                      <li class=\"left w18pre\">\r\n                        <label>\r\n                          <input type=\"checkbox\" name=\"cache[]\" id=\"store_grade\" value=\"store_grade\" >\r\n                          &nbsp;";
echo $lang['cache_cls_store_grade'];
echo "</label>\r\n                      </li>\r\n                    </ul></td>\r\n                </tr>\r\n              </tbody>\r\n            </table></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表\r\n\$(function(){\r\n\t\$(\"#submitBtn\").click(function(){\r\n\t\tif(\$('input[name=\"cache[]\"]:checked').size()>0){\r\n\t\t\t\$(\"#cache_form\").submit();\r\n\t\t}\r\n\t});\r\n\r\n\t\$('#cls_full').click(function(){\r\n\t\t\$('input[name=\"cache[]\"]').attr('checked',\$(this).attr('checked'));\r\n\t});\r\n});\r\n</script> \r\n";
?>
