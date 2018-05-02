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
echo $lang['link_index_partner'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=link&op=link\" ><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"link_form\" enctype=\"multipart/form-data\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"link_title\"> ";
echo $lang['link_index_title'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"link_title\" id=\"link_title\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['link_add_name'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"link_url\"> ";
echo $lang['link_index_link'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"http://\" name=\"link_url\" id=\"link_url\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['link_add_href'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"link_pic\">";
echo $lang['link_index_pic_sign'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" name=\"link_pic\" id=\"link_pic\" class=\"type-file-file\" size=\"30\" >\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['link_add_sign'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"link_sort\">";
echo $lang['nc_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"255\" name=\"link_sort\" id=\"link_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['link_add_sort_tip'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#link_form\").valid()){\r\n     \$(\"#link_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#link_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        rules : {\r\n            link_title : {\r\n                required : true\r\n            },\r\n            link_url  : {\r\n                required : true,\r\n                url      : true\r\n            },\r\n            link_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            link_title : {\r\n                required : '";
echo $lang['link_add_title_null'];
echo "'\r\n            },\r\n            link_url  : {\r\n                required : '";
echo $lang['link_add_url_null'];
echo "',\r\n                url      : '";
echo $lang['link_add_url_wrong'];
echo "'\r\n            },\r\n            link_sort  : {\r\n                number   : '";
echo $lang['link_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script> \r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    var textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n\t\$(textButton).insertBefore(\"#link_pic\");\r\n\t\$(\"#link_pic\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#link_pic\").val());\r\n});\r\n});\r\n</script>";
?>
