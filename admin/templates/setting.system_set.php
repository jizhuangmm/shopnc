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
echo $lang['upload_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=setting&op=image_setting\"><span>";
echo $lang['upload_pic_base'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=font_setting\"><span>";
echo $lang['font_set'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['upload_set_base'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ftp_setting\"><span>";
echo $lang['upload_set_ftp'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"MySubmit();return false;\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"old_goods_image\" value=\"";
echo $output['list_setting']['default_goods_image'];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_store_logo\" value=\"";
echo $output['list_setting']['default_store_logo'];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_user_portrait\" value=\"";
echo $output['list_setting']['default_user_portrait'];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"default_goods_image\">";
echo $lang['default_product_pic'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_COMMON."/".$output['list_setting']['default_goods_image'] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input class=\"type-file-file\" id=\"default_goods_image\" name=\"default_goods_image\" type=\"file\" size=\"30\" hidefocus=\"true\"  nc_type=\"change_default_goods_image\" title=\"";
echo $lang['default_product_pic'];
echo "\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">300px * 300px</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"default_store_logo\">";
echo $lang['default_store_logo'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_COMMON."/".$output['list_setting']['default_store_logo'] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input class=\"type-file-file\" id=\"default_store_logo\" name=\"default_store_logo\" type=\"file\" size=\"30\" hidefocus=\"true\" nc_type=\"change_default_store_logo\" title=\"";
echo $lang['default_store_logo'];
echo "\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">100px * 100px</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"default_user_portrait\">";
echo $lang['default_user_pic'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_COMMON."/".$output['list_setting']['default_user_portrait'] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input class=\"type-file-file\" id=\"default_user_portrait\" name=\"default_user_portrait\" type=\"file\" size=\"30\" hidefocus=\"true\" nc_type=\"change_default_user_portrait\" title=\"";
echo $lang['default_user_pic'];
echo "\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">128px * 128px</td>\r\n        </tr>\r\n\r\n\t\t\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n// 模拟默认商品图片上传input type='file'样式\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#default_goods_image\");\r\n    \$(\"#default_goods_image\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#default_goods_image\").val());\r\n    });\r\n// 模拟默认店铺图片上传input type='file'样式\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#default_store_logo\");\r\n    \$(\"#default_store_logo\").change(function(){\r\n\t\$(\"#textfield2\").val(\$(\"#default_store_logo\").val());\r\n    });\r\n// 模拟默认用户图片上传input type='file'样式\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#default_user_portrait\");\r\n    \$(\"#default_user_portrait\").change(function(){\r\n\t\$(\"#textfield3\").val(\$(\"#default_user_portrait\").val());\r\n    });\r\n// 上传图片类型\r\n\t\$('input[class=\"type-file-file\"]').change(function(){\r\n\t\tvar filepatd=\$(this).val();\r\n\t\tvar extStart=filepatd.lastIndexOf(\".\");\r\n\t\tvar ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();\t\t\r\n\t\tif(ext!=\".PNG\"&&ext!=\".GIF\"&&ext!=\".JPG\"&&ext!=\".JPEG\"){\r\n\t\t\talert(\"";
echo $lang['default_img_wrong'];
echo "\");\r\n\t\t\t\t\$(this).attr('value','');\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n});\r\n</script> \r\n<script>\r\n\$(document).ready(function(){\r\n\t\$('#time_zone').attr('value','";
echo $output['list_setting']['time_zone'];
echo "');\r\n});\r\n</script> \r\n";
?>
