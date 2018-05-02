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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=adv&op=adv\" ><span>";
echo $lang['adv_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_check\" ><span>";
echo $lang['adv_wait_check'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=adv_add\" ><span>";
echo $lang['adv_add'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['ap_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=adv&op=ap_add\" ><span>";
echo $lang['ap_add'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" action=\"index.php?act=adv&op=ap_manage\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"adv\" />\r\n    <input type=\"hidden\" name=\"op\" value=\"ap_manage\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"search_name\">";
echo $lang['ap_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"search_name\" id=\"search_name\" value=\"";
echo $_GET['search_name'];
echo "\" /></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( $output['search_title'] != "" || $output['search_ac_id'] != "" )
{
		echo "            <a href=\"JavaScript:void(0);\" onclick=window.location.href='index.php?act=adv&op=ap_manage' class=\"btns tooltip\" title=\"";
		echo $lang['adv_all'];
		echo "\"><span>";
		echo $lang['adv_all'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['ap_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" id=\"store_form\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th><input type=\"checkbox\" class=\"checkall\"/></th>\r\n          <th>";
echo $lang['ap_name'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['adv_class'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_show_style'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_width'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_height'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_price'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_show_num'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_publish_num'];
echo "</th>\r\n          <th class=\"align-center\">";
echo $lang['ap_is_use'];
echo "</th>\r\n          <th class=\"align-center\"><span class=\"paixv\"><a href=\"index.php?act=adv&op=ap_manage&order=clicknum\">";
echo $lang['ap_click_num'];
echo "ˇ</a></span></th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['ap_list'] ) || is_array( $output['ap_list'] ) )
{
		echo "        ";
		foreach ( $output['ap_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" class=\"checkitem\" name=\"del_id[]\" value=\"";
				echo $v['ap_id'];
				echo "\" /></td>\r\n          <td><span title=\"";
				echo $v['ap_name'];
				echo "\">";
				echo str_cut( $v['ap_name'], "40" );
				echo "</span></td>\r\n          <td class=\"align-center\">";
				switch ( $v['ap_class'] )
				{
				case "0" :
						echo $lang['adv_pic'];
						break;
				case "1" :
						echo $lang['adv_word'];
						break;
				case "2" :
						echo $lang['adv_slide'];
						break;
				case "3" :
						echo "Flash";
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				switch ( $v['ap_display'] )
				{
				case "0" :
						echo $lang['ap_slide_show'];
						break;
				case "1" :
						echo $lang['ap_mul_adv'];
						break;
				case "2" :
						echo $lang['ap_one_adv'];
						break;
				default :
						echo $lang['adv_index_unknown'];
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['ap_width'];
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['ap_class'] == "1" )
				{
						echo "";
				}
				else
				{
						echo "".$v['ap_height']."";
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['ap_price'];
				echo "</td>\r\n          <td class=\"align-center\">";
				$i = 0;
				$time = time( );
				if ( !empty( $output['adv_list'] ) )
				{
						foreach ( $output['adv_list'] as $adv_k => $adv_v )
						{
								if ( !( $adv_v['ap_id'] == $v['ap_id'] ) && !( $time < $adv_v['adv_end_date'] ) && !( $adv_v['adv_start_date'] < $time ) && !( $adv_v['is_allow'] == "1" ) )
								{
										++$i;
								}
						}
				}
				echo $i;
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['adv_num'];
				echo "</td>\r\n          <td class=\"align-center yes-onoff\">";
				if ( $v['is_use'] == "0" )
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip disabled\" ajax_branch=\"is_use\" nc_type=\"inline_edit\" fieldname=\"is_use\" fieldid=\"";
						echo $v['ap_id'];
						echo "\" fieldvalue=\"0\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				else
				{
						echo "            <a href=\"JavaScript:void(0);\" class=\"tooltip enabled\" ajax_branch=\"is_use\" nc_type=\"inline_edit\" fieldname=\"is_use\" fieldid=\"";
						echo $v['ap_id'];
						echo "\" fieldvalue=\"1\" title=\"";
						echo $lang['nc_editable'];
						echo "\"><img src=\"";
						echo TEMPLATES_PATH;
						echo "/images/transparent.gif\"></a>\r\n            ";
				}
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['click_num'];
				echo "</td>\r\n          <td class=\"w132 align-center\"><a href='index.php?act=adv&op=ap_edit&ap_id=";
				echo $v['ap_id'];
				echo "'>";
				echo $lang['nc_edit'];
				echo "</a> | <a href=\"javascript:if(confirm('";
				echo $lang['nc_ensure_del'];
				echo "'))window.location = 'index.php?act=adv&op=ap_manage&do=del&ap_id=";
				echo $v['ap_id'];
				echo "';\">";
				echo $lang['nc_del'];
				echo "</a> | <input name=\"ap_code\" id=\"ap_code_";
				echo $v['ap_id'];
				echo "\" type=\"hidden\" value='<script type=\"text/javascript\" src=\"";
				echo "<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=".$v['ap_id'];
				echo "\"></script>' /><a href=\"javascript:void(0)\" id=\"get_code_";
				echo $v['ap_id'];
				echo "\">";
				echo $lang['ap_get_js'];
				echo "</a></td>\r\n          <script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\t\$(\"#get_code_";
				echo $v['ap_id'];
				echo "\").click(function(){\r\n\t\tcopyToClipBoard(\$(\"#ap_code_";
				echo $v['ap_id'];
				echo "\").val(),";
				echo $v['ap_id'];
				echo ");\r\n\t});\r\n});\r\n</script> \r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkall\"/></td>\r\n          <td id=\"batchAction\" colspan=\"15\"><span class=\"all_checkbox\">\r\n            <label for=\"checkall\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            </span>&nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"if(confirm('";
echo $lang['ap_del_sure'];
echo "')){\$('#store_form').submit();}\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/dialog/dialog.js\" id=\"dialog_js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script type=\"text/javascript\">\r\n//复制到剪贴板\r\nfunction copyToClipBoard(txt, id)\r\n{\r\n    if(window.clipboardData)\r\n    { \r\n        // the IE-manier\r\n        window.clipboardData.clearData();alert(txt);\r\n        window.clipboardData.setData(\"Text\", txt);\r\n        alert(\"";
echo $lang['adv_index_copy_to_clipboard_succ'];
echo "!\");\r\n    }\r\n    else if(navigator.userAgent.indexOf(\"Opera\") != -1)\r\n    {\r\n        window.location = txt;\r\n        alert(\"";
echo $lang['adv_index_copy_to_clipboard_succ'];
echo "!\");\r\n    }\r\n    else\r\n    {\r\n        ajax_form('copy_adv', '";
echo $lang['ap_get_js'];
echo "', 'index.php?act=adv&op=ap_copy&id='+id);\r\n    }\r\n}\r\n</script>";
?>
