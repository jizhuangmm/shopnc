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
echo $lang['goods_class_import_data'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_export\" ><span>";
echo $lang['goods_class_index_export'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['goods_class_index_import'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"charset\" value=\"gbk\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['goods_class_import_choose_file'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" name=\"csv\" id=\"csv\" class=\"type-file-file\"  size=\"30\"  />\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['goods_class_import_file_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['goods_class_import_file_type'];
echo ":</label>\r\n            <a href=\"../resource/examples/flea_class.csv\" class=\"btns\"><span>";
echo $lang['goods_class_import_example_tip'];
echo "</span></a></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><table border=\"1\" cellpadding=\"3\" cellspacing=\"3\" bordercolor=\"#CCC\">\r\n              <tbody>\r\n                <tr>\r\n                  <td bgcolor=\"#EFF8F8\">";
echo $lang['nc_sort'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">";
echo $lang['goods_class_import_first_class'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td bgcolor=\"#EFF8F8\">";
echo $lang['nc_sort'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                  <td bgcolor=\"#FFFFEC\">";
echo $lang['goods_class_import_second_class'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td bgcolor=\"#EFF8F8\">";
echo $lang['nc_sort'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                  <td bgcolor=\"#FFFFEC\">";
echo $lang['goods_class_import_second_class'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                </tr>\r\n                <tr>\r\n                  <td bgcolor=\"#EFF8F8\">";
echo $lang['nc_sort'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                  <td bgcolor=\"#FFFFEC\">&nbsp;</td>\r\n                  <td bgcolor=\"#FFFFEC\">";
echo $lang['goods_class_import_third_class'];
echo "</td>\r\n                </tr>\r\n                <tr>\r\n                  <td bgcolor=\"#EFF8F8\">";
echo $lang['nc_sort'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\">";
echo $lang['goods_class_import_first_class'];
echo "</td>\r\n                  <td bgcolor=\"#FFFFEC\"></td>\r\n                  <td bgcolor=\"#FFFFEC\"></td>\r\n                </tr>\r\n              </tbody>\r\n            </table></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\"><a href=\"JavaScript:document.form1.submit();\" class=\"btn\"><span>";
echo $lang['goods_class_import_import'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n\r\n<script type=\"text/javascript\">\r\n\t\$(function(){\r\n    var textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n\t\$(textButton).insertBefore(\"#csv\");\r\n\t\$(\"#csv\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#csv\").val());\r\n\t});\r\n});\r\n</script> \r\n";
?>
