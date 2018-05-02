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
echo $lang['goods_class_index_class'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['goods_class_batch_edit_batch'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"goods_class_form\" method=\"post\" action=\"index.php?act=flea_class&op=brach_edit_save\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['nc_display'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" checked=\"checked\" value=\"-1\" name=\"gc_show\" id=\"gc_show-1\">\r\n                <label for=\"gc_show-1\">";
echo $lang['goods_class_batch_edit_keep'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"1\" name=\"gc_show\" id=\"gc_show1\">\r\n                <label for=\"gc_show1\">";
echo $lang['nc_yes'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" value=\"0\" name=\"gc_show\" id=\"gc_show0\">\r\n                <label for=\"gc_show\">";
echo $lang['nc_no'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
