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
echo $lang['goods_class_export_data'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_add\" ><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['goods_class_index_export'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=flea_class&op=goods_class_import\"><span>";
echo $lang['goods_class_index_import'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n    <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['goods_class_export_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"if_convert\" value=\"1\" />\r\n    <table class=\"table tb-type2\">\r\n    <thead>\r\n        <tr class=\"thead\">\r\n          <th>";
echo $lang['goods_class_export_if_trans'];
echo "?</th>\r\n      </tr></thead>\r\n      <tfoot><tr class=\"tfoot\">\r\n        <td><a href=\"JavaScript:document.form1.submit();\" class=\"btn\"><span>";
echo $lang['goods_class_export_export'];
echo "</span></a></td>\r\n      </tr></tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n";
?>
