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
echo $lang['nc_spec_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=spec&op=spec\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a class=\"current\" href=\"JavaScript:void(0);\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"spec_form\" method=\"post\" enctype=\"multipart/form-data\">\r\n    <input type=\"hidden\" value=\"ok\" name=\"form_submit\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td class=\"required\" colspan=\"2\"><label class=\"validation\" for=\"s_name\">";
echo $lang['spec_index_spec_name'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" name=\"s_name\" id=\"s_name\" /></td>\r\n          <td class=\"vatop tips\">";
echo $lang['spec_index_spec_name_desc'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td class=\"required\" colspan=\"2\"><label class=\"validation\" for=\"s_sort\">";
echo $lang['nc_sort'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" name=\"s_sort\" id=\"s_sort\" value=\"0\" /></td>\r\n          <td class=\"vatop tips\">";
echo $lang['spec_index_spec_sort_desc'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td class=\"required\" colspan=\"2\"><label>";
echo $lang['spec_index_spec_type'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul>\r\n              <li>\r\n                <input type=\"radio\" name=\"s_dtype\" id=\"s_dtype_text\" value=\"text\" checked=\"checked\" />\r\n                <label for=\"s_dtype_text\">";
echo $lang['spec_index_text'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" name=\"s_dtype\" id=\"s_dtype_image\" value=\"image\" />\r\n                <label for=\"s_dtype_image\">";
echo $lang['spec_index_image'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\">";
echo $lang['spec_index_spec_type_desc'];
echo "</td>\r\n        </tr>\r\n        </tbody></table>\r\n        <table class=\"table tb-type2\">\r\n              <thead class=\"thead\">\r\n              <tr class=\"space\"><th colspan=\"15\"><label>";
echo $lang['spec_add_spec_add'];
echo "</label></th></tr>\r\n                <tr class=\"noborder\">\r\n                  <th>";
echo $lang['nc_sort'];
echo "</th>\r\n                  <th>";
echo $lang['spec_index_spec_value'];
echo "</th>\r\n                  <th class=\"image_display\">";
echo $lang['spec_add_spec_image'];
echo "</th>\r\n                  <th></th>\r\n                  <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody id=\"tr_model\">\r\n              \t<tr></tr>\r\n                <tr class=\"hover edit\">\r\n                  <td class=\"w48 sort\"><input type=\"text\" name=\"s_value[key][sort]\" value=\"0\" /></td>\r\n                  <td class=\"name w270\"><input type=\"text\" name=\"s_value[key][name]\" value=\"\" /></td>\r\n                  <td class=\"image_display vatop rowform w300\">\r\n                  <span class=\"type-file-show\"><img class=\"low_source\" width=\"16\" height=\"16\" src=\"";
echo TEMPLATES_PATH;
echo "/images/transparent.gif\"></span><span class=\"type-file-box\">\r\n                    <input type=\"text\" name=\"textfield\" class=\"type-file-text\" /><input type=\"button\" name=\"button\" value=\"\" class=\"type-file-button\" />\r\n                    <input class=\"type-file-file\" type=\"file\" title=\"\" nc_type=\"change_default_goods_image\" hidefocus=\"true\" size=\"30\" name=\"s_value_key\"></span></td><td></td>\r\n                  <td class=\"w150 align-center\"><a onclick=\"remove_tr(\$(this));\" href=\"JavaScript:void(0);\">";
echo $lang['spec_add_remove'];
echo "</a></td>\r\n                </tr>\r\n              </tbody>\r\n              <tbody>\r\n                <tr>\r\n                  <td colspan=\"15\"><a class=\"btn-add marginleft\" id=\"add_type\" href=\"JavaScript:void(0);\"> <span>";
echo $lang['spec_add_spec_add_one'];
echo "</span> </a></td>\r\n                </tr>\r\n              </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a id=\"submitBtn\" class=\"btn\" href=\"JavaScript:void(0);\"> <span>";
echo $lang['nc_submit'];
echo "</span> </a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    var i=0;\r\n\tvar tr_model = '<tr class=\"hover edit\">'+\r\n\t\t'<td class=\"w48 sort\"><input type=\"text\" name=\"s_value[key][sort]\" value=\"0\" /></td>'+\r\n\t\t'<td class=\"w270 name\"><input type=\"text\" name=\"s_value[key][name]\" value=\"\" /></td>'+\r\n\t\t'<td class=\"w300 image_display vatop rowform\">'+\r\n\t\t\t'<span class=\"type-file-show\">'+\r\n\t\t\t\t'<img class=\"low_source\" width=\"16\" height=\"16\" src=\"";
echo TEMPLATES_PATH;
echo "/images/transparent.gif\">'+\r\n\t\t\t'</span>'+\r\n\t\t\t'<span class=\"type-file-box\">'+\r\n\t\t\t\t'<input type=\"text\" name=\"textfield\" class=\"type-file-text\" /><input type=\"button\" name=\"button\" value=\"\" class=\"type-file-button\" />'+\r\n\t\t\t\t'<input class=\"type-file-file\" type=\"file\" title=\"\" nc_type=\"change_default_goods_image\" hidefocus=\"true\" size=\"30\" name=\"s_value_key\">'+\r\n\t\t\t'</span>'+\r\n\t\t'</td>'+\r\n\t\t'<td></td><td class=\"w150 align-center\"><a onclick=\"remove_tr(\$(this));\" href=\"JavaScript:void(0);\">";
echo $lang['spec_add_remove'];
echo "</a></td>'+\r\n\t'</tr>';\r\n\t\$(\"#add_type\").click(function(){\r\n\t\t\$('#tr_model > tr:last').after(tr_model.replace(/key/g,i));\r\n\t\tif(\$('.image_display').is(\":hidden\")){\r\n\t\t\t\$('.image_display').hide();\r\n\t\t}\r\n\t\t\$.getScript(\"../resource/js/admincp.js\");\r\n\t\ti++;\r\n\t});\r\n\r\n\t//规格图片显示与隐藏操作\r\n\t\$('.image_display').hide();\r\n\t\$('#s_dtype_image').click(function(){\r\n\t\t\$('.image_display').show();\r\n\t});\r\n\t\$('#s_dtype_text').click(function(){\r\n\t\t\$('.image_display').hide();\r\n\t});\r\n\r\n\t//表单验证\r\n    \$('#spec_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \ts_name: {\r\n        \t\trequired : true,\r\n                maxlength: 10,\r\n                minlength: 1\r\n            },\r\n            s_sort: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdigits\t : true\r\n            }\r\n        },\r\n        messages : {\r\n        \ts_name : {\r\n            \trequired : '";
echo $lang['spec_add_name_no_null'];
echo "',\r\n                maxlength: '";
echo $lang['spec_add_name_max'];
echo "',\r\n                minlength: '";
echo $lang['spec_add_name_max'];
echo "'\r\n            },\r\n            s_sort: {\r\n\t\t\t\trequired : '";
echo $lang['spec_add_sort_no_null'];
echo "',\r\n\t\t\t\tdigits   : '";
echo $lang['spec_add_sort_no_digits'];
echo "'\r\n            }\r\n        }\r\n    });\r\n\r\n    //按钮先执行验证再提交表单\r\n    \$(\"#submitBtn\").click(function(){\r\n        if(\$(\"#spec_form\").valid()){\r\n        \t\$(\"#spec_form\").submit();\r\n    \t}\r\n    });\r\n\r\n    //预览图片\r\n    \$(\"input[nc_type='change_default_goods_image']\").live(\"change\", function(){\r\n\t\tvar src = getFullPath(\$(this)[0]);\r\n\t\t\$(this).parent().prev().find('.low_source').attr('src',src);\r\n\t});\r\n\t\r\n});\r\n\r\nfunction remove_tr(o){\r\n\to.parents('tr:first').remove();\r\n}\r\n</script>\r\n\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\t\$('input[nc_type=\"change_default_goods_image\"]').live(\"change\", function(){\r\n\t\t\$(this).parent().find('input[class=\"type-file-text\"]').val(\$(this).val());\r\n\t});\r\n});\r\n</script> \r\n";
?>
