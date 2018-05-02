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
echo $lang['nc_admin_search_set'];
echo "</h3>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n\t<table id=\"prompt\" class=\"table tb-type2\">\r\n\t<tbody>\r\n\t<tr class=\"space odd\" style=\"background: none repeat scroll 0% 0% rgb(255, 255, 255);\">\r\n\t<th class=\"nobg\" colspan=\"12\">\r\n\t<div class=\"title\">\r\n\t<h5>";
echo $lang['fulltext_set'];
echo "</h5>\r\n\t<span class=\"arrow\"></span>\r\n\t</div>\r\n\t</th>\r\n\t</tr>\r\n\t<tr class=\"odd\" style=\"background: none repeat scroll 0% 0% rgb(255, 255, 255); display: table-row;\">\r\n\t<td>\r\n\t<ul>\r\n\t<li>";
echo $lang['fulltext_set_prompt1'];
echo "</li>\r\n\t<li>";
echo $lang['fulltext_set_prompt2'];
echo "</li>\r\n\t<li>";
echo $lang['fulltext_set_prompt3'];
echo "</li>\r\n\t</ul>\r\n\t</td>\r\n\t</tr>\r\n\t</tbody>\r\n\t</table>\r\n  <form id=\"form\" method=\"post\" enctype=\"multipart/form-data\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"hot_search\">";
echo $lang['hot_search'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"hot_search\" name=\"hot_search\" value=\"";
echo $output['list_setting']['hot_search'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['field_notice'];
echo "</span></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>";
?>
