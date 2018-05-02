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
echo $lang['nc_type_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=type&op=type\"><span>";
echo $lang['nc_list'];
echo "</span></a></li>\r\n        <li><a class=\"current\" href=\"JavaScript:void(0);\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"type_form\" method=\"post\">\r\n    <table id=\"prompt\" class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"space odd\">\r\n          <th colspan=\"12\" class=\"nobg\"> <div class=\"title\">\r\n              <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n              <span class=\"arrow\"></span> </div>\r\n          </th>\r\n        </tr>\r\n        <tr class=\"odd\">\r\n          <td><ul>\r\n              <li>";
echo $lang['type_add_prompts_one'];
echo "</li>\r\n              <li>";
echo $lang['type_add_prompts_two'];
echo "</li>\r\n              <li>";
echo $lang['type_add_prompts_three'];
echo "</li>\r\n              <li>";
echo $lang['type_add_prompts_four'];
echo "</li>\r\n            </ul></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n    <input type=\"hidden\" value=\"ok\" name=\"form_submit\">\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td class=\"required\" colspan=\"2\"><label class=\"validation\" for=\"t_mane\">";
echo $lang['type_index_type_name'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" name=\"t_mane\" id=\"t_mane\" /></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td class=\"required\" colspan=\"2\"><label class=\"validation\" for=\"t_sort\">";
echo $lang['nc_sort'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" class=\"txt\" name=\"t_sort\" id=\"t_sort\" /></td>\r\n          <td class=\"vatop tips\">";
echo $lang['type_add_sort_desc'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n    <table class=\"table tb-type2\">\r\n      \r\n      <thead class=\"thead\">\r\n        <tr class=\"space\">\r\n          <th class=\"required\" colspan=\"15\"><label>";
echo $lang['type_add_related_spec'];
echo "</label></th>\r\n        </tr>\r\n      ";
if ( is_array( $output['spec_list'] ) && !empty( $output['spec_list'] ) )
{
		echo "        <tr>\r\n          <th></th>\r\n          <th>";
		echo $lang['type_add_spec_name'];
		echo "</th>\r\n          <th>";
		echo $lang['type_add_spec_value'];
		echo "</th>\r\n        </tr>\r\n      ";
}
echo "      ";
if ( is_array( $output['spec_list'] ) && !empty( $output['spec_list'] ) )
{
		echo "      </thead>\r\n      <tbody>\r\n        ";
		foreach ( $output['spec_list'] as $val )
		{
				echo "        <tr class=\"hover edit\">\r\n          <td class=\"w24\"><input class=\"checkitem\" nc_type=\"change_default_spec_value\" type=\"checkbox\" value=\"";
				echo $val['sp_id'];
				echo "\" name=\"spec_id[]\"></td>\r\n          <td class=\"w18pre\">";
				echo $val['sp_name'];
				echo "</td>\r\n          <td>";
				echo $val['sp_value'];
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "      </tbody>\r\n      ";
}
else
{
		echo "      <tbody>\r\n        <tr>\r\n          <td class=\"tips\" colspan=\"15\">";
		echo $lang['type_add_spec_null_one'];
		echo "<a href=\"JavaScript:void(0);\" onclick=\"window.parent.openItem('spec,spec,goods')\">";
		echo $lang['nc_spec_manage'];
		echo "</a>";
		echo $lang['type_add_spec_null_two'];
		echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      ";
}
echo "      \r\n    </table>\r\n    <table class=\"table tb-type2\">\r\n      <thead class=\"thead\">\r\n        <tr class=\"space\">\r\n          <th colspan=\"2\"><label for=\"member_name\">";
echo $lang['type_add_related_brand'];
echo "</label></th>\r\n        </tr>\r\n      </thead>\r\n      ";
if ( is_array( $output['brand_list'] ) && !empty( $output['brand_list'] ) )
{
		echo "      <tbody>\r\n      ";
		foreach ( $output['brand_list'] as $k => $val )
		{
				echo "        <tr class=\"hover\">\r\n          <td>\r\n            <h6 class=\"clear\">";
				echo $k;
				echo "</h6>\r\n            <ul class=\"nofloat\">\r\n              ";
				if ( is_array( $output['brand_list'] ) && !empty( $output['brand_list'] ) )
				{
						echo "              ";
						foreach ( $val as $bval )
						{
								echo "              <li class=\"left w25pre h36\">\r\n                <input type=\"checkbox\" name=\"brand_id[]\" value=\"";
								echo $bval['brand_id'];
								echo "\" id=\"brand_";
								echo $bval['brand_id'];
								echo "\" />\r\n                <label for=\"brand_";
								echo $bval['brand_id'];
								echo "\">";
								echo $bval['brand_name'];
								echo "</label>\r\n              </li>\r\n              ";
						}
						echo "              ";
				}
				echo "            </ul>\r\n            </td>\r\n        </tr>\r\n      ";
		}
		echo "      </tbody>\r\n      ";
}
else
{
		echo "      <tbody>\r\n        <tr>\r\n          <td class=\"tips\" colspan=\"15\">";
		echo $lang['type_add_brand_null_one'];
		echo "<a href=\"JavaScript:void(0);\" onclick=\"window.parent.openItem('brand,brand,goods')\">";
		echo $lang['nc_brand_manage'];
		echo "</a>";
		echo $lang['type_add_brand_null_two'];
		echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      ";
}
echo "    </table>\r\n    <table class=\"table tb-type2 mtw\">\r\n      <thead class=\"thead\">\r\n        <tr class=\"space\">\r\n          <th colspan=\"15\">";
echo $lang['type_add_attr_add'];
echo "</th>\r\n        </tr>\r\n        <tr>\r\n          <th>";
echo $lang['nc_sort'];
echo "</th>\r\n          <th>";
echo $lang['type_add_attr_name'];
echo "</th>\r\n          <th>";
echo $lang['type_add_attr_value'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_display'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody id=\"tr_model\">\r\n      \t<tr></tr>\r\n        <tr class=\"hover edit\">\r\n          <td class=\"w48 sort\"><input type=\"text\" name=\"at_value[key][sort]\" value=\"0\" /></td>\r\n          <td class=\"w25pre name\"><input type=\"text\" name=\"at_value[key][name]\" value=\"\" /></td>\r\n          <td class=\"w50pre name\"><input type=\"text\" name=\"at_value[key][value]\" value=\"\" /></td>\r\n          <td class=\"align-center power-onoff\"><input type=\"checkbox\" checked=\"checked\" nc_type=\"checked_show\" />\r\n            <input type=\"hidden\" name=\"at_value[key][show]\" value=\"1\" /></td>\r\n          <td class=\"align-center w60\"><a onclick=\"remove_tr(\$(this));\" href=\"JavaScript:void(0);\">";
echo $lang['type_add_remove'];
echo "</a></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"15\"><a id=\"add_type\" class=\"btn-add marginleft\" href=\"JavaScript:void(0);\"> <span>";
echo $lang['type_add_attr_add_one'];
echo "</span> </a></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a id=\"submitBtn\" class=\"btn\" href=\"JavaScript:void(0);\"> <span>";
echo $lang['nc_submit'];
echo "</span> </a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script>\r\n\$(function(){\r\n\tvar i = 0;\r\n\tvar tr_model = '<tr class=\"hover edit\">'+\r\n\t\t'<td class=\"w48 sort\"><input type=\"text\" name=\"at_value[key][sort]\" value=\"0\" /></td>'+\r\n\t\t'<td class=\"w25pre name\"><input type=\"text\" name=\"at_value[key][name]\" value=\"\" /></td>'+\r\n\t\t'<td class=\"w50pre name\"><input type=\"text\" name=\"at_value[key][value]\" value=\"\" /></td>'+\r\n\t\t'<td class=\"align-center power-onoff\"><input type=\"checkbox\" checked=\"checked\" nc_type=\"checked_show\" /><input type=\"hidden\" name=\"at_value[key][show]\" value=\"1\" /></td>'+\r\n\t\t'<td class=\"align-center w60\"><a onclick=\"remove_tr(\$(this));\" href=\"JavaScript:void(0);\">";
echo $lang['type_add_remove'];
echo "</a></td>'+\r\n\t'</tr>';\r\n\t\$(\"#add_type\").click(function(){\r\n\t\t\$('#tr_model > tr:last').after(tr_model.replace(/key/g, i));\r\n\t\t\$.getScript(\"../resource/js/admincp.js\");\r\n\t\ti++;\r\n\t});\r\n\r\n\t\$('input[nc_type=\"checked_show\"]').live('click', function(){\r\n\t\tvar o = \$(this).next();\r\n\t\t//alert(o.val());\r\n\t\tif(o.val() == '1'){\r\n\t\t\to.val('0');\r\n\t\t}else if(o.val() == '0'){\r\n\t\t\to.val('1');\r\n\t\t}\r\n\t});\r\n\r\n\r\n\t//表单验证\r\n    \$('#type_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onkeyup    : false,\r\n        rules : {\r\n        \tt_mane: {\r\n        \t\trequired : true,\r\n                maxlength: 10,\r\n                minlength: 1\r\n            },\r\n            t_sort: {\r\n\t\t\t\trequired : true,\r\n\t\t\t\tdigits\t : true\r\n            }\r\n        },\r\n        messages : {\r\n        \tt_mane : {\r\n        \t\trequired : '";
echo $lang['type_add_name_no_null'];
echo "',\r\n        \t\tmaxlength: '";
echo $lang['type_add_name_max'];
echo "',\r\n        \t\tminlength: '";
echo $lang['type_add_name_max'];
echo "' \r\n            },\r\n            t_sort: {\r\n            \trequired : '";
echo $lang['type_add_sort_no_null'];
echo "',\r\n            \tdigits : '";
echo $lang['type_add_sort_no_digits'];
echo "' \r\n            }\r\n        }\r\n    });\r\n\r\n    //按钮先执行验证再提交表单\r\n    \$(\"#submitBtn\").click(function(){\r\n    \tspec_check();\r\n        if(\$(\"#type_form\").valid()){\r\n        \t\$(\"#type_form\").submit();\r\n    \t}\r\n    });\r\n    \r\n});\r\n\r\nfunction spec_check(){\r\n\tvar id='';\r\n\t\$('input[nc_type=\"change_default_spec_value\"]:checked').each(function(){\r\n\t\tif(!isNaN(\$(this).val())){\r\n\t\t\tid += \$(this).val();\r\n\t\t}\r\n\t});\r\n\tif(id != ''){\r\n\t\t\$('#spec_checkbox').val('ok');\r\n\t}else{\r\n\t\t\$('#spec_checkbox').val('');\r\n\t}\r\n}\r\n\r\n\r\nfunction remove_tr(o){\r\n\to.parents('tr:first').remove();\r\n}\r\n</script>";
?>
