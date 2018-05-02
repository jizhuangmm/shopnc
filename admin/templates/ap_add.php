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
echo $lang['adv_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=adv&op=adv\"><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_check\"><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_add\"><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_manage\"><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['ap_add'];
echo "</span></a><em></em></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"link_form\" enctype=\"multipart/form-data\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_name\">";
echo $lang['ap_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"ap_name\" id=\"ap_name\" class=\"txt\">\r\n            </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"sg_description\">";
echo $lang['ap_intro'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea id=\"sg_description\" name=\"ap_intro\" class=\"tarea\" ></textarea>\r\n            </td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['ap_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"ap_class\" id=\"ap_class\">\r\n              <option value=\"0\">";
echo $lang['adv_pic'];
echo "</option>\r\n              <option value=\"1\">";
echo $lang['adv_word'];
echo "</option>\r\n              <option value=\"2\">";
echo $lang['adv_slide'];
echo "</option>\r\n              <option value=\"3\">Flash</option>\r\n            </select>\r\n\t\t  </td>\r\n          <td class=\"vatop tips\">";
echo $lang['ap_select_showstyle'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ap_price\" class=\"validation\">";
echo $lang['ap_price_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"ap_price\" id=\"ap_price\" class=\"txt\"></td>\r\n            <td class=\"vatop tips\">";
echo $lang['ap_price_unit'];
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['ap_is_use'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n\t\t\t<td class=\"vatop rowform\"><ul>\r\n              <li>\r\n                <input name=\"is_use\" type=\"radio\" value=\"1\" checked=\"checked\">\r\n                <label>";
echo $lang['ap_use_s'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" name=\"is_use\" value=\"0\">\r\n                <label>";
echo $lang['ap_not_use_s'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"ap_display\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['ap_show_style'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n \t\t<td class=\"vatop rowform\"><ul class=\"nofloat\">\r\n              <li>\r\n                <input type=\"radio\" name=\"ap_display\" value=\"1\">\r\n                <label>";
echo $lang['ap_allow_mul_adv'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" name=\"ap_display\" value=\"2\" checked=\"checked\">\r\n                <label>";
echo $lang['ap_allow_one_adv'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"ap_width_media\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_width_media_input\">";
echo $lang['ap_width_l'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"ap_width_media\"  class=\"txt\" id=\"ap_width_media_input\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_pix'];
echo "</td>\r\n        </tr>\r\n      <tbody id=\"ap_width_word\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_width_word_input\">";
echo $lang['ap_word_num'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"ap_width_word\"  class=\"txt\" id=\"ap_width_word_input\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_byte'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"ap_height\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_height_input\">";
echo $lang['ap_height_l'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"ap_height\" class=\"txt\" id=\"ap_height_input\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_pix'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"default_pic\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"change_default_pic\">";
echo $lang['ap_default_pic'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform type-file-box\"><input type=\"file\" name=\"default_pic\" id=\"change_default_pic\" size=\"30\" hidefocus=\"true\" nc_type=\"change_default_pic\">\r\n            </td>\r\n          <td class=\"vatop tips\">";
echo $lang['ap_show_defaultpic_when_nothing'];
echo ",";
echo $lang['adv_edit_support'];
echo "gif,jpg,jpeg,png</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"default_word\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"default_word\" class=\"validation\">";
echo $lang['ap_default_word'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" id=\"default_word\" value=\"\" name=\"default_word\" class=\"txt\">\r\n            </td>\r\n          <td class=\"vatop tips\">";
echo $lang['ap_show_defaultword_when_nothing'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\t\$(\"#ap_width_word\").hide();\r\n\t\$(\"#default_word\").hide();\r\n\t\$(\"#ap_class\").change(function(){\r\n\t// \$(\"label\").remove();\r\n\tif(\$(\"#ap_class\").val() == '1'){\r\n\t\t\$(\"#ap_height\").hide();\r\n\t\t\$(\"#ap_width_media\").hide();\r\n\t\t\$(\"#default_pic\").hide();\r\n\t\t\$(\"#default_word\").show();\r\n\t\t\$(\"#ap_width_word\").show();\r\n\t\t\$(\"#ap_display\").show();\r\n\t}else if(\$(\"#ap_class\").val() == '0'||\$(\"#ap_class\").val() == '3'){\r\n\t\t\$(\"#ap_height\").show();\r\n\t\t\$(\"#ap_width_media\").show();\r\n\t\t\$(\"#default_pic\").show();\r\n\t\t\$(\"#default_word\").hide();\r\n\t\t\$(\"#ap_width_word\").hide();\r\n\t\t\$(\"#ap_display\").show();\r\n\t}else{\r\n\t\t\$(\"#ap_height\").show();\r\n\t\t\$(\"#ap_width_media\").show();\r\n\t\t\$(\"#default_pic\").show();\r\n\t\t\$(\"#default_word\").hide();\r\n\t\t\$(\"#ap_width_word\").hide();\r\n\t\t\$(\"#ap_display\").hide();\r\n\t}\r\n  });\r\n});\r\n</script> \r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#link_form\").valid()){\r\n     \$(\"#link_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\r\n\t\$('#link_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        rules : {\r\n        \tap_name : {\r\n                required : true\r\n            },\r\n            ap_price  : {\r\n                required : true,\r\n                digits:true\r\n            },\r\n            ap_intro  : {\r\n            \trequired : true\r\n            },\r\n\t\t\tap_width_media:{\r\n\t\t\t\trequired :function(){return \$(\"#ap_class\").val()!=1;},\r\n\t\t\t\tdigits\t :true,\r\n\t\t\t\tmin:1\r\n\t\t\t},\r\n\t\t\tap_height:{\r\n\t\t\t\trequired :function(){return \$(\"#ap_class\").val()!=1;},\r\n\t\t\t\tdigits\t :true,\r\n\t\t\t\tmin:1\r\n\t\t\t},\r\n\t\t\tap_width_word :{\r\n\t\t\t\trequired :function(){return \$(\"#ap_class\").val()==1;},\r\n\t\t\t\tdigits\t :true,\r\n\t\t\t\tmin:1\r\n\t\t\t},\r\n\t\t\tdefault_word  :{\r\n\t\t\t\trequired :function(){return \$(\"#ap_class\").val()==1;}\r\n\t\t\t},\r\n\t\t\tchange_default_pic:{\r\n\t\t\t\trequired :true\r\n\t\t\t}\r\n        },\r\n        messages : {\r\n        \tap_name : {\r\n                required : '";
echo $lang['ap_can_not_null'];
echo "'\r\n            },\r\n            ap_price  : {\r\n                required : '";
echo $lang['ap_price_can_not_null'];
echo "',\r\n                digits\t:'";
echo $lang['ap_input_digits_pixel'];
echo "'\r\n            },\r\n            ap_intro  : {\r\n            \trequired   : '";
echo $lang['ap_intro_can_not_null'];
echo "'\r\n            },\r\n            ap_width_media\t:{\r\n            \trequired   : '";
echo $lang['ap_input_digits_pixel'];
echo "',\r\n            \tdigits\t:'";
echo $lang['ap_input_digits_pixel'];
echo "',\r\n            \tmin\t:'";
echo $lang['ap_input_digits_pixel'];
echo "'\r\n            },\r\n            ap_height\t:{\r\n            \trequired   : '";
echo $lang['ap_input_digits_pixel'];
echo "',\r\n            \tdigits\t:'";
echo $lang['ap_input_digits_pixel'];
echo "',\r\n            \tmin\t:'";
echo $lang['ap_input_digits_pixel'];
echo "'\r\n            }, \r\n            ap_width_word\t:{\r\n            \trequired   : '";
echo $lang['ap_input_digits_pixel'];
echo "',\r\n            \tdigits\t:'";
echo $lang['ap_input_digits_pixel'];
echo "',\r\n            \tmin\t:'";
echo $lang['ap_input_digits_pixel'];
echo "'\r\n            },            \r\n            default_word\t:{\r\n            \trequired   : '";
echo $lang['ap_default_word_can_not_null'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script>";
?>
