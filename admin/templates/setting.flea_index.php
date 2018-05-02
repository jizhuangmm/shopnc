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
echo $lang['flea_index_setting'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['flea_index_seo_setting'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_site_name\">";
echo $lang['flea_site_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"flea_site_name\" name=\"flea_site_name\" value=\"";
echo $output['list_setting']['flea_site_name'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['web_name_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_site_title\">";
echo $lang['flea_site_title'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"flea_site_title\" name=\"flea_site_title\" value=\"";
echo $output['list_setting']['flea_site_title'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['web_title_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_site_description\">";
echo $lang['flea_site_description'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"flea_site_description\" rows=\"6\" class=\"tarea\" id=\"flea_site_description\">";
echo $output['list_setting']['flea_site_description'];
echo "</textarea></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['site_description_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['flea_site_keywords'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"flea_site_keywords\" name=\"flea_site_keywords\" value=\"";
echo $output['list_setting']['flea_site_keywords'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['site_keyword_notice'];
echo "</span></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"flea_hot_search\">";
echo $lang['flea_hot_search'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input id=\"flea_hot_search\" name=\"flea_hot_search\" value=\"";
echo $output['list_setting']['flea_hot_search'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['field_notice'];
echo "</span></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n// 模拟网站LOGO上传input type='file'样式\r\n\$(function(){\r\n    var textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n\t\$(textButton).insertBefore(\"#site_logo\");\r\n\t\$(\"#site_logo\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#site_logo\").val());\r\n});\r\n// 上传图片类型\r\n\$('input[class=\"type-file-file\"]').change(function(){\r\n\tvar filepatd=\$(this).val();\r\n\tvar extStart=filepatd.lastIndexOf(\".\");\r\n\tvar ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();\t\t\r\n\t\tif(ext!=\".PNG\"&&ext!=\".GIF\"&&ext!=\".JPG\"&&ext!=\".JPEG\"){\r\n\t\t\talert(\"";
echo $lang['default_img_wrong'];
echo "\");\r\n\t\t\t\t\$(this).attr('value','');\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n});\r\n</script> \r\n";
?>
