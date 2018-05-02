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
echo $lang['web_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=setting&op=base_information\"><span>";
echo $lang['basic_info'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=captcha_setting\"><span>";
echo $lang['manage_about'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=creditgrade\"><span>";
echo $lang['setting_store_creditrule'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ucenter_setting\"><span>";
echo $lang['ucenter_integration'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=qq_setting\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=sina_setting\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['login_set_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>  \r\n  <form method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"old_login_pic1\" value=\"";
echo $output['list'][0];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_login_pic2\" value=\"";
echo $output['list'][1];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_login_pic3\" value=\"";
echo $output['list'][2];
echo "\" />\r\n    <input type=\"hidden\" name=\"old_login_pic4\" value=\"";
echo $output['list'][3];
echo "\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>IMG1:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_PATH."/login/".$output['list'][0] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input name=\"login_pic1\" type=\"file\" class=\"type-file-file\" id=\"login_pic1\" size=\"30\" hidefocus=\"true\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">450px * 350px</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>IMG2:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_PATH."/login/".$output['list'][1] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input name=\"login_pic2\" type=\"file\" class=\"type-file-file\" id=\"login_pic2\" size=\"30\" hidefocus=\"true\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">450px * 350px</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>IMG3:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_PATH."/login/".$output['list'][2] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input name=\"login_pic3\" type=\"file\" class=\"type-file-file\" id=\"login_pic3\" size=\"30\" hidefocus=\"true\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">450px * 350px</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>IMG4:</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-show\"><img class=\"show_image\" src=\"";
echo TEMPLATES_PATH;
echo "/images/preview.png\">\r\n            <div class=\"type-file-preview\"><img src=\"";
echo SiteUrl."/".( ATTACH_PATH."/login/".$output['list'][3] );
echo "\"></div>\r\n            </span><span class=\"type-file-box\">\r\n            <input name=\"login_pic4\" type=\"file\" class=\"type-file-file\" id=\"login_pic4\" size=\"30\" hidefocus=\"true\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">450px * 350px</td>\r\n        </tr>                        \r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n// 模拟网站LOGO上传input type='file'样式\r\n\$(function(){\r\n    var textButton1=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    var textButton2=\"<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='' class='type-file-button' />\"\r\n    var textButton3=\"<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='' class='type-file-button' />\"\r\n    var textButton4=\"<input type='text' name='textfield' id='textfield4' class='type-file-text' /><input type='button' name='button' id='button4' value='' class='type-file-button' />\"\r\n\t\$(textButton1).insertBefore(\"#login_pic1\");\r\n\t\$(textButton2).insertBefore(\"#login_pic2\");\r\n\t\$(textButton3).insertBefore(\"#login_pic3\");\r\n\t\$(textButton4).insertBefore(\"#login_pic4\");\r\n\t\$(\"#login_pic1\").change(function(){\$(\"#textfield1\").val(\$(\"#login_pic1\").val());});\r\n\t\$(\"#login_pic2\").change(function(){\$(\"#textfield2\").val(\$(\"#login_pic2\").val());});\r\n\t\$(\"#login_pic3\").change(function(){\$(\"#textfield3\").val(\$(\"#login_pic3\").val());});\r\n\t\$(\"#login_pic4\").change(function(){\$(\"#textfield4\").val(\$(\"#login_pic4\").val());});\r\n// 上传图片类型\r\n\$('input[class=\"type-file-file\"]').change(function(){\r\n\tvar filepatd=\$(this).val();\r\n\tvar extStart=filepatd.lastIndexOf(\".\");\r\n\tvar ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();\t\t\r\n\t\tif(ext!=\".PNG\"&&ext!=\".GIF\"&&ext!=\".JPG\"&&ext!=\".JPEG\"){\r\n\t\t\talert(\"";
echo $lang['default_img_wrong'];
echo "\");\r\n\t\t\t\t\$(this).attr('value','');\r\n\t\t\treturn false;\r\n\t\t}\r\n\t});\r\n\t\r\n\$('#time_zone').attr('value','";
echo $output['list_setting']['time_zone'];
echo "');\t\r\n});\r\n</script>";
?>
