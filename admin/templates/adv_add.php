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
echo "<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['adv_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=adv&op=adv\"><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_check\"><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_manage\"><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_add\"><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"adv_form\" enctype=\"multipart/form-data\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\" id=\"main_table\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"adv_name\">";
echo $lang['adv_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_name\" id=\"adv_name\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_id\">";
echo $lang['adv_ap_select'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"ap_id\" id=\"ap_id\">\r\n              <option value='' selected=\"selected\" ap_type=''></option>\r\n              ";
foreach ( $output['ap_list'] as $k => $v )
{
		echo "<option value='".$v['ap_id']."' ap_type='".$v['ap_class']."' ap_width='".$v['ap_width']."' >".$v['ap_name'];
		if ( $v['ap_class'] == "1" )
		{
				echo "(".$v['ap_width'].")";
				$word_length = $v['ap_width'];
		}
		else
		{
				echo "(".$v['ap_width']."*".$v['ap_height'].")";
		}
		echo "</option>";
}
echo "            </select>\r\n            <input type=\"hidden\" name=\"aptype_hidden\" id=\"aptype_hidden\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"adv_start_time\">";
echo $lang['adv_start_time'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"adv_start_time\" id=\"adv_start_time\" class=\"txt date\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"adv_end_time\">";
echo $lang['adv_end_time'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"adv_end_time\" id=\"adv_end_time\" class=\"txt date\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_pic\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"file_adv_pic\">";
echo $lang['adv_img_upload'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"file_adv_pic\" name=\"adv_pic\" size=\"30\"/>\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_edit_support'];
echo "gif,jpg,jpeg,png</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_pic_url\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"type_adv_pic_url\">";
echo $lang['adv_url'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_pic_url\" class=\"txt\" id=\"type_adv_pic_url\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_url_donotadd'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_word\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"type_adv_word\">";
echo $lang['adv_word_content'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_word\" id=\"type_adv_word\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_max'];
echo "<span id=\"adv_word_len\"></span>";
echo $lang['adv_byte'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_word_url\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"type_adv_word_url\">";
echo $lang['adv_url'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_word_url\" class=\"txt\" id=\"type_adv_word_url\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_url_donotadd'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_slide_pic\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"file_adv_slide_pic\">";
echo $lang['adv_slide_upload'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"file_adv_slide_pic\" name=\"adv_slide_pic\" size=\"30\" />\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_edit_support'];
echo "gif,jpg,jpeg,png</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_slide_url\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"type_adv_slide_url\">";
echo $lang['adv_url'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_slide_url\" class=\"txt\" id=\"type_adv_slide_url\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_url_donotadd'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_slide_sort\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"type_adv_slide_sort\">";
echo $lang['adv_slide_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"adv_slide_sort\" id=\"type_adv_slide_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_slide_sort_role'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_flash_swf\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"file_flash_swf\">";
echo $lang['adv_flash_upload'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type=\"file\" class=\"type-file-file\" id=\"file_flash_swf\" name=\"flash_swf\" size=\"30\" />\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_please_file_swf_file'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"adv_flash_url\">\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"type_adv_flash_url\">";
echo $lang['adv_url'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"flash_url\" class=\"txt\" id=\"type_adv_flash_url\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['adv_url_donotadd'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    \$('#adv_start_time').datepicker({dateFormat: 'yy-mm-dd'});\r\n    \$('#adv_end_time').datepicker({dateFormat: 'yy-mm-dd'});\r\n\r\n    \$('#adv_pic').hide();\r\n    \$('#adv_pic_url').hide();\r\n    \$('#adv_word').hide();\r\n    \$('#adv_word_url').hide();\r\n    \$('#adv_slide_pic').hide();\r\n    \$('#adv_slide_url').hide();\r\n    \$('#adv_slide_sort').hide();\r\n    \$('#adv_flash_swf').hide();\r\n    \$('#adv_flash_url').hide();\r\n\r\n    \$('#ap_id').change(function(){\r\n    \tvar select   = document.getElementById(\"ap_id\");\r\n    \tvar ap_type  = select.item(select.selectedIndex).getAttribute(\"ap_type\");\r\n    \tvar ap_width = select.item(select.selectedIndex).getAttribute(\"ap_width\");\r\n        if(ap_type == '0'){\r\n    \t    \$('#adv_pic').show();\r\n            \$('#adv_pic_url').show();\r\n            \$('#adv_word').hide();\r\n            \$('#adv_word_url').hide();\r\n            \$('#adv_slide_pic').hide();\r\n            \$('#adv_slide_url').hide();\r\n            \$('#adv_slide_sort').hide();\r\n            \$('#adv_flash_swf').hide();\r\n            \$('#adv_flash_url').hide();\r\n        }\r\n        if(ap_type == '1'){\r\n        \t\$('#adv_word').show();\r\n            \$('#adv_word_url').show();\r\n            \$('#adv_word_len').html(\"<span>\"+ap_width+\"</span><input type='hidden' name='adv_word_len' value='\"+ap_width+\"'>\");\r\n            \$('#adv_pic').hide();\r\n            \$('#adv_pic_url').hide();\r\n            \$('#adv_slide_pic').hide();\r\n            \$('#adv_slide_url').hide();\r\n            \$('#adv_slide_sort').hide();\r\n            \$('#adv_flash_swf').hide();\r\n            \$('#adv_flash_url').hide();\r\n            \r\n        }\r\n        if(ap_type == '2'){\r\n        \t\$('#adv_slide_pic').show();\r\n            \$('#adv_slide_url').show();\r\n            \$('#adv_slide_sort').show();\r\n        \t\$('#adv_pic').hide();\r\n            \$('#adv_pic_url').hide();\r\n            \$('#adv_word').hide();\r\n            \$('#adv_word_url').hide();\r\n            \$('#adv_flash_swf').hide();\r\n            \$('#adv_flash_url').hide();\r\n        }\r\n        if(ap_type == '3'){\r\n        \t\$('#adv_flash_swf').show();\r\n            \$('#adv_flash_url').show();\r\n            \$('#adv_pic').hide();\r\n            \$('#adv_pic_url').hide();\r\n            \$('#adv_word').hide();\r\n            \$('#adv_word_url').hide();\r\n            \$('#adv_slide_pic').hide();\r\n            \$('#adv_slide_url').hide();\r\n            \$('#adv_slide_sort').hide();\r\n        }\r\n        \$(\"#aptype_hidden\").val(ap_type);\r\n    });\r\n});\r\n</script> \r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#adv_form\").valid()){\r\n     \$(\"#adv_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#adv_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        rules : {\r\n        \tadv_name : {\r\n                required : true\r\n            },\r\n            aptype_hidden : {\r\n                required : true\r\n            },\r\n            adv_start_time  : {\r\n                required : true,\r\n                date\t : false\r\n            },\r\n            adv_end_time  : {\r\n            \trequired : true,\r\n                date\t : false\r\n            }\r\n        },\r\n        messages : {\r\n        \tadv_name : {\r\n                required : '";
echo $lang['adv_can_not_null'];
echo "'\r\n            },\r\n            aptype_hidden : {\r\n                required : '";
echo $lang['must_select_ap_id'];
echo "'\r\n            },\r\n            adv_start_time  : {\r\n                required : '";
echo $lang['adv_start_time_can_not_null'];
echo "'\r\n            },\r\n            adv_end_time  : {\r\n            \trequired   : '";
echo $lang['adv_end_time_can_not_null'];
echo "'\r\n            }\r\n        }\r\n    });\r\n});\r\n</script> \r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#file_adv_pic\");\r\n    \$(\"#file_adv_pic\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#file_adv_pic\").val());\r\n    });\r\n\t\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#file_adv_slide_pic\");\r\n    \$(\"#file_adv_slide_pic\").change(function(){\r\n\t\$(\"#textfield2\").val(\$(\"#file_adv_slide_pic\").val());\r\n    });\r\n\t\r\n\tvar textButton=\"<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='' class='type-file-button' />\"\r\n    \$(textButton).insertBefore(\"#file_flash_swf\");\r\n    \$(\"#file_flash_swf\").change(function(){\r\n\t\$(\"#textfield3\").val(\$(\"#file_flash_swf\").val());\r\n    });\r\n});\r\n</script>";
?>
