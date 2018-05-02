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
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_add\"><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['ap_change'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"link_form\" enctype=\"multipart/form-data\" method=\"post\" name=\"form1\">\r\n    <input type=\"hidden\" name=\"ref_url\" value=\"";
echo $output['ref_url'];
echo "\" />\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      ";
foreach ( $output['ap_list'] as $k => $v )
{
		echo "      <input type=\"hidden\" name=\"ap_class\" value=\"";
		echo $v['ap_class'];
		echo "\" />\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_name\">";
		echo $lang['ap_name'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"ap_name\" id=\"ap_name\" class=\"txt\" value=\"";
		echo $v['ap_name'];
		echo "\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"sg_description\">";
		echo $lang['ap_intro'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea class=\"tarea\" id=\"sg_description\" name=\"ap_intro\" >";
		echo $v['ap_intro'];
		echo "</textarea></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
		switch ( $v['ap_class'] )
		{
		case "0" :
				if ( $v['ap_display'] == "1" )
				{
						$display_state1 = "checked";
						$display_state2 = "";
				}
				else
				{
						$display_state1 = "";
						$display_state2 = "checked";
				}
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_class'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>".$lang['adv_pic']."</td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label class='validation' for='ap_width_input'>".$lang['ap_width_l'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['ap_width']."' name='ap_width' class='txt' id='ap_width_input'></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['adv_pix']."</td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label class='validation' for='ap_height_input'>".$lang['ap_height_l'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['ap_height']."' name='ap_height' id='ap_height_input' class='txt'></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['adv_pix']."</td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_show_style'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>\r\n\t\t\t\t\t\t\t\t<ul class='nofloat'>\r\n\t\t\t\t\t\t\t\t\t<li><input type='radio' name='ap_display' id='ap_display_1' value='1' ".$display_state1."><label for='ap_display_1'>".$lang['ap_allow_mul_adv']."</label></li>\r\n\t\t\t\t\t\t\t\t\t<li><input type='radio' name='ap_display' id='ap_display_2' value='2' ".$display_state2."><label for='ap_display_2'>".$lang['ap_allow_one_adv']."</label></li>\r\n\t\t\t\t\t\t\t\t</ul></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</tbody>";
				echo "<tbody id='adv_pic'>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_default_pic_upload']."</label></td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t\t<td class='vatop rowform'><span class='type-file-show'><img class='show_image' src='".TEMPLATES_PATH."/images/preview.png'>\r\n\t\t\t\t\t\t\t\t<div class='type-file-preview'><img src='".SiteUrl."/".ATTACH_ADV."/".$v['default_content']."'>\r\n\t\t\t\t\t\t\t\t</div></span><span class='type-file-box'><input name='default_pic' type='file' class='type-file-file' id='change_default_pic' size='30'></span></td>\r\n\t\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['ap_show_defaultpic_when_nothing'].",".$lang['adv_edit_support']."gif,jpg,jpeg,png</td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t\t<tbody>";
				break;
		case "1" :
				if ( $v['ap_display'] == "1" )
				{
						$display_state1 = "checked";
						$display_state2 = "";
				}
				else
				{
						$display_state1 = "";
						$display_state2 = "checked";
				}
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_class'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>".$lang['adv_word']."</td><td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label class='validation' for='ap_width_input'>".$lang['ap_word_num'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['ap_width']."' name='ap_width' id='ap_width_input' class='txt'></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['adv_byte']."</td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_show_style'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>\r\n\t\t\t\t\t\t\t\t<ul class='nofloat'>\r\n\t\t\t\t\t\t\t\t\t<li><input type='radio' name='ap_display' value='1' id='ap_display_1' ".$display_state1."><label for='ap_display_1'>".$lang['ap_allow_mul_adv']."</label></li>\r\n\t\t\t\t\t\t\t\t\t<li><input type='radio' name='ap_display' id='ap_display_2' value='2' ".$display_state2."><label for='ap_display_2'>".$lang['ap_allow_one_adv']."</label></li>\r\n\t\t\t\t\t\t\t\t\t</ul></td></tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label class='validation' for='default_word'>".$lang['ap_default_word']."</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['default_content']."' name='default_word' class='txt' id='default_word'></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>";
				break;
		case "2" :
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_class'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t<tr class='noborder'><td class='vatop rowform'>".$lang['adv_slide']."</td>\r\n\t\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label class='validation' for='ap_width'>".$lang['ap_width_l'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['ap_width']."' name='ap_width' class='txt' id='ap_width'>".$lang['adv_pix']."</td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label class='validation' for='ap_height'>".$lang['ap_height_l'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['ap_height']."' name='ap_height' class='txt' id='ap_height'></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['adv_pix']."</td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</tbody>";
				echo "<tbody id='adv_pic'>\r\n\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_default_pic_upload']."</label></td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t\t<td class='vatop rowform'><span class='type-file-show'><img class='show_image' src='".TEMPLATES_PATH."/images/preview.png'>\r\n\t\t\t\t\t\t\t\t<div class='type-file-preview'><img src='".SiteUrl."/".ATTACH_ADV."/".$v['default_content']."' /></div></span><span class='type-file-box'><input name='default_pic' type='file' class='type-file-file' id='change_default_pic' size='30'></span>\r\n\t\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['ap_show_defaultpic_when_nothing'].",".$lang['adv_edit_support']."gif,jpg,jpeg,png</td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t</tbody>";
				echo "</tbody><tbody>";
				break;
		case "3" :
				if ( $v['ap_display'] == "1" )
				{
						$display_state1 = "checked";
						$display_state2 = "";
				}
				else
				{
						$display_state1 = "";
						$display_state2 = "checked";
				}
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_class'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>Flash</td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label for='ap_width' class='validation'>".$lang['ap_width_l'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>\r\n\t\t\t\t\t\t\t\t<input type='text' value='".$v['ap_width']."' name='ap_width' class='txt' id='ap_width'>\r\n\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['adv_pix']."</td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label for='ap_height_input' class='validation'>".$lang['ap_height_l'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'><input type='text' value='".$v['ap_height']."' name='ap_height' id='ap_height_input' class='txt'></td>\r\n\t\t\t\t\t\t\t<td class='vatop tips'>".$lang['adv_pix']."</td>\r\n\t\t\t\t\t\t</tr>";
				echo "<tr>\r\n\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_show_style'].":</label></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t<td class='vatop rowform'>\r\n\t\t\t\t\t\t\t\t<ul class='nofloat'>\r\n\t\t\t\t\t\t\t\t\t<li><input type='radio' id='ap_display_1' name='ap_display' value='1' ".$display_state1."><label for='ap_display_1'>".$lang['ap_allow_mul_adv']."</label></li>\r\n\t\t\t\t\t\t\t\t\t<li><input type='radio' id='ap_display_2' name='ap_display' value='2' ".$display_state2."><label for='ap_display_2'>".$lang['ap_allow_one_adv']."</label></li></ul>\r\n\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td class='vatop tips'></td>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t</tbody>";
				echo "<tbody >\r\n\t\t\t\t\t\t\t<tr id='adv_pic'>\r\n\t\t\t\t\t\t\t\t<td colspan='2' class='required'><label>".$lang['ap_default_pic_upload']."</label></td>\r\n\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t<tr class='noborder'>\r\n\t\t\t\t\t\t\t\t<td class='vatop rowform'>\r\n\t\t\t\t\t\t\t\t<span class='type-file-show'><img class='show_image' src='".TEMPLATES_PATH."/images/preview.png'>\r\n\t\t\t\t\t\t\t\t\t<div class='type-file-preview'><img src='".SiteUrl."/".ATTACH_ADV."/".$v['default_content']."' /></div></span><span class='type-file-box'><input name='default_pic' type='file' class='type-file-file' id='change_default_pic' size='30'></span></td><td class='vatop tips'>".$lang['ap_show_defaultpic_when_nothing'].",".$lang['adv_edit_support']."gif,jpg,jpeg,png</td></tbody></tr>";
		}
		echo "        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
		echo $lang['ap_is_use'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul>\r\n              <li>\r\n                <input type=\"radio\" id=\"is_use_1\" name=\"is_use\" value=\"1\" ";
		if ( $v['is_use'] == "1" )
		{
				echo "checked";
		}
		echo ">\r\n                <label for=\"is_use_1\">";
		echo $lang['ap_use_s'];
		echo "</label>\r\n              </li>\r\n              <li>\r\n                <input type=\"radio\" id=\"is_use_0\" name=\"is_use\" value=\"0\" ";
		if ( $v['is_use'] == "0" )
		{
				echo "checked";
		}
		echo ">\r\n                <label for=\"is_use_0\">";
		echo $lang['ap_not_use_s'];
		echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"ap_price\">";
		echo $lang['ap_price_name'];
		echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
		echo $v['ap_price'];
		echo "\" name=\"ap_price\" class=\"txt\" id='ap_price'></td>\r\n          <td class=\"vatop tips\">";
		echo $lang['ap_price_unit'];
		echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      ";
}
echo "      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\">\r\n          <a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\" onclick=\"document.form1.submit()\"><span>";
echo $lang['adv_change'];
echo "</span></a>\r\n          </td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n    var textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n\t\$(textButton).insertBefore(\"#change_default_pic\");\r\n\t\$(\"#change_default_pic\").change(function(){\r\n\t\$(\"#textfield1\").val(\$(\"#change_default_pic\").val());\r\n\t});\r\n});\r\n</script> ";
?>
