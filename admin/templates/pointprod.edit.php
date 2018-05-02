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
echo $lang['nc_pointprod'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_pointprod_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointprod&op=prod_add\" ><span>";
echo $lang['admin_pointprod_add_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=pointorder&op=pointorder_list\" ><span>";
echo $lang['admin_pointorder_list_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"pointprod_form\" method=\"post\" enctype=\"multipart/form-data\" >\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"space\">\r\n          <th colspan=\"3\">";
echo $lang['admin_pointprod_baseinfo'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        <tr class-\"noborder\">\r\n          <th class=\"required\" style=\"line-height:normal; border-top: 1px dotted #CBE9F3;\"><label for=\"\">";
echo $lang['admin_pointprod_goods_image'];
echo ":</label></th>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"goodsname\">";
echo $lang['admin_pointprod_goods_name'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <th rowspan=\"6\" class=\"picture\"><div class=\"size-200x200\"><span class=\"thumb size-200x200\"><i></i><img src=\"";
echo SiteUrl.DS.ATTACH_POINTPROD.DS.$output['prod_info']['pgoods_image'];
echo "\" onerror=\"this.src='";
echo SiteUrl.DS.ATTACH_COMMON.DS.c( "default_goods_image" );
echo "'\" onload=\"javascript:DrawImage(this,200,200);\" nc_type=\"goods_image\" /></span></div>\r\n          </th>\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"goodsname\" id=\"goodsname\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_name'];
echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label class=\"validation\" for=\"goodsserial\">";
echo $lang['admin_pointprod_goods_serial'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"goodsserial\" id=\"goodsserial\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_serial'];
echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label class=\"validation\" for=\"goodsprice\">";
echo $lang['admin_pointprod_goods_price'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"goodsprice\" id=\"goodsprice\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_price'];
echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label class=\"validation\" for=\"goodspoints\">";
echo $lang['admin_pointprod_goods_points'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <th style=\"line-height:normal;\"><span class=\"type-file-box\">\r\n            <input name=\"goods_images\" type=\"file\" class=\"type-file-file\" id=\"goods_images\" size=\"30\" hidefocus=\"true\" nc_type=\"change_goods_image\">\r\n            </span> </th>\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"goodspoints\" id=\"goodspoints\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_points'];
echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <th class=\"required\"><label for=\"goodstag\">";
echo $lang['admin_pointprod_goods_tag'];
echo ":</label></th>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"goodsstorage\">";
echo $lang['admin_pointprod_goods_storage'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"goodstag\" id=\"goodstag\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_tag'];
echo "\"/></td>\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"goodsstorage\" id=\"goodsstorage\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_storage'];
echo "\"/></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"space\">\r\n          <th colspan=\"10\">";
echo $lang['admin_pointprod_requireinfo'];
echo "</th>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_limittip'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"radio\" name=\"islimit\" id=\"islimit_1\" value=\"1\" ";
if ( $output['prod_info']['pgoods_islimit'] == 1 )
{
		echo "checked=checked";
}
echo "  onclick=\"showlimit();\"/>\r\n            <label for=\"\">";
echo $lang['admin_pointprod_limit_yes'];
echo "</label>\r\n            <input type=\"radio\" name=\"islimit\" id=\"islimit_0\" value=\"0\" ";
if ( $output['prod_info']['pgoods_islimit'] == 0 )
{
		echo "checked=checked";
}
echo " onclick=\"showlimit();\"/>\r\n            <label>";
echo $lang['admin_pointprod_limit_no'];
echo "</label></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"limitnum_div\">\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label for=\"limitnum\">";
echo $lang['admin_pointprod_limitnum'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"limitnum\" id=\"limitnum\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_limitnum'];
echo "\"/></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_freightcharge'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"radio\" name=\"freightcharge\" id=\"freightcharge_0\" value=\"0\" ";
if ( $output['prod_info']['pgoods_freightcharge'] == 0 )
{
		echo "checked=checked";
}
echo " onclick=\"showfreightcharge();\"/>\r\n            <label>";
echo $lang['admin_pointprod_freightcharge_saler'];
echo "</label>\r\n            <input type=\"radio\" name=\"freightcharge\" id=\"freightcharge_1\" value=\"1\" ";
if ( $output['prod_info']['pgoods_freightcharge'] == 1 )
{
		echo "checked=checked";
}
echo " onclick=\"showfreightcharge();\"/>\r\n            <label>";
echo $lang['admin_pointprod_freightcharge_buyer'];
echo "</label></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"freightcharge_div\">\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label for=\"freightprice\">";
echo $lang['admin_pointprod_freightprice'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"freightprice\" id=\"freightprice\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_freightprice'];
echo "\"/></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_limittimetip'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"radio\" name=\"islimittime\" id=\"islimittime_1\" value=\"1\" ";
if ( $output['prod_info']['pgoods_islimittime'] == 1 )
{
		echo "checked=checked";
}
echo " onclick=\"showlimittime();\"/>\r\n            <label for=\"islimittime_1\">";
echo $lang['admin_pointprod_limittime_yes'];
echo "</label>\r\n            <input type=\"radio\" name=\"islimittime\" id=\"islimittime_0\" value=\"0\" ";
if ( $output['prod_info']['pgoods_islimittime'] == 0 )
{
		echo "checked=checked";
}
echo " onclick=\"showlimittime();\"/>\r\n            <label for=\"islimittime_0\">";
echo $lang['admin_pointprod_limittime_no'];
echo "</label></td>\r\n          <td class=\"vatop tips\" colspan=\"10\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody name=\"limittime_div\">\r\n        <tr>\r\n          <td class=\"required\">";
echo $lang['admin_pointprod_starttime'];
echo ":\r\n            </label></td>\r\n          <td colspan=\"9\" class=\"required\"><label>";
echo $lang['admin_pointprod_endtime'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"starttime\" id=\"starttime\" class=\"txt date\" style=\"width:100px;\" value=\"";
echo $output['prod_info']['pgoods_starttime'] ? date( "Y-m-d", $output['prod_info']['pgoods_starttime'] ) : date( "Y-m-d", @time( ) );
echo "\"/>\r\n            ";
echo $lang['admin_pointprod_time_day'];
echo "            <select id=\"starthour\" name=\"starthour\" style=\"width:50px; margin-left: 8px; _margin-left: 4px;\">\r\n              ";
foreach ( $output['hourarr'] as $item )
{
		echo "              <option value=\"";
		echo $item;
		echo "\" ";
		if ( $item == @date( "H", $output['prod_info']['pgoods_starttime'] ) )
		{
				echo "selected";
		}
		echo ">";
		echo $item;
		echo "</option>\r\n              ";
}
echo "            </select>\r\n            ";
echo $lang['admin_pointprod_time_hour'];
echo "</td>\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"endtime\" id=\"endtime\" class=\"txt date\" style=\"width:100px;\" value=\"";
echo $output['prod_info']['pgoods_endtime'] ? date( "Y-m-d", $output['prod_info']['pgoods_endtime'] ) : date( "Y-m-d", @time( ) );
echo "\"/>\r\n            ";
echo $lang['admin_pointprod_time_day'];
echo "            <select id=\"endhour\" name=\"endhour\" style=\"width:50px; margin-left: 8px; _margin-left: 4px;\">\r\n              ";
foreach ( $output['hourarr'] as $item )
{
		echo "              <option value=\"";
		echo $item;
		echo "\" ";
		if ( $item == @date( "H", $output['prod_info']['pgoods_endtime'] ) )
		{
				echo "selected";
		}
		echo ">";
		echo $item;
		echo "</option>\r\n              ";
}
echo "            </select>\r\n            ";
echo $lang['admin_pointprod_time_hour'];
echo "</td>\r\n          <td colspan=\"9\" class=\"vatop tips\">&nbsp;</td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr class=\"space\">\r\n          <th colspan=\"10\">";
echo $lang['admin_pointprod_stateinfo'];
echo "</th>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_isshow'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"showstate_1\" class=\"cb-enable ";
if ( $output['prod_info']['pgoods_show'] == "1" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['admin_pointprod_yes'];
echo "</span></label>\r\n            <label for=\"showstate_0\" class=\"cb-disable ";
if ( $output['prod_info']['pgoods_show'] == "0" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['admin_pointprod_no'];
echo "</span></label>\r\n            <input id=\"showstate_1\" name=\"showstate\" ";
if ( $output['prod_info']['pgoods_show'] == "1" )
{
		echo "checked=checked";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"showstate_0\" name=\"showstate\" ";
if ( $output['prod_info']['pgoods_show'] == "0" )
{
		echo "checked=checked";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_iscommend'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"commendstate_1\" class=\"cb-enable ";
if ( $output['prod_info']['pgoods_commend'] == "1" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['admin_pointprod_yes'];
echo "</span></label>\r\n            <label for=\"commendstate_0\" class=\"cb-disable ";
if ( $output['prod_info']['pgoods_commend'] == "0" )
{
		echo "selected";
}
echo "\"><span>";
echo $lang['admin_pointprod_no'];
echo "</span></label>\r\n            <input id=\"commendstate_1\" name=\"commendstate\" ";
if ( $output['prod_info']['pgoods_commend'] == "1" )
{
		echo "checked=checked";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"commendstate_0\" name=\"commendstate\" ";
if ( $output['prod_info']['pgoods_commend'] == "0" )
{
		echo "checked=checked";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody id=\"forbidreason_div\">\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label for=\"forbidreason\">";
echo $lang['admin_pointprod_forbidreason'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"forbidreason\" id=\"forbidreason\" rows=\"6\">";
echo $output['prod_info']['pgoods_close_reason'];
echo "</textarea></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr class=\"space\">\r\n          <th colspan=\"10\">";
echo $lang['admin_pointprod_seoinfo'];
echo "</th>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label for=\"keywords\">";
echo $lang['admin_pointprod_seokey'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"keywords\" id=\"keywords\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_keywords'];
echo "\"/></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_seodescription'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><textarea name=\"description\" rows=\"6\">";
echo $output['prod_info']['pgoods_description'];
echo "</textarea></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n      </tbody>\r\n      <tbody>\r\n        <tr class=\"space\">\r\n          <th colspan=\"10\">";
echo $lang['admin_pointprod_otherinfo'];
echo "</th>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_sort'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" name=\"sort\" id=\"sort\" class=\"txt\" value=\"";
echo $output['prod_info']['pgoods_sort'];
echo "\"/></td>\r\n          <td colspan=\"10\" class=\"vatop tips\">";
echo $lang['admin_pointprod_sorttip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_edit_addtime'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo date( "Y-m-d", $output['prod_info']['pgoods_add_time'] );
echo "</td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_edit_viewnum'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['prod_info']['pgoods_view'];
echo "</td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\"><label>";
echo $lang['admin_pointprod_edit_salenum'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
echo $output['prod_info']['pgoods_salenum'];
echo "</td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr class=\"space\">\r\n          <th colspan=\"10\">";
echo $lang['admin_pointprod_descriptioninfo'];
echo "</th>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\">";
showeditor( "pgoods_body", $output['prod_info']['pgoods_body'], "600px", "400px", "visibility:hidden;", "false", $output['editor_multimedia'] );
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\">";
echo $lang['admin_pointprod_uploadimg'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul id=\"divUploadTypeContainer\">\r\n              <li>\r\n                <input name=\"upload_types\" id=\"bat_upload\" type=\"radio\" value=\"bat_upload\" checked=\"checked\" />\r\n                <label for=\"bat_upload\">";
echo $lang['admin_pointprod_uploadimg_more'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input name=\"upload_types\" id=\"com_upload\" type=\"radio\" value=\"com_upload\" />\r\n                <label for=\"com_upload\">";
echo $lang['admin_pointprod_uploadimg_common'];
echo "</label>\r\n              </li>\r\n            </ul></td>\r\n          <td colspan=\"10\" class=\"vatop tips\"></td>\r\n        <tr class=\"noborder\" id=\"divSwfuploadContainer\">\r\n          <td colspan=\"10\"><div id=\"divButtonContainer\"> <span id=\"spanButtonPlaceholder\"></span> </div>\r\n            <div id=\"divFileProgressContainer\"></div></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td id=\"divComUploadContainer\"  colspan=\"10\" style=\"display:none;\"  ><iframe src=\"index.php?act=pointprod&op=pointprod_iframe_upload&item_id=";
echo $output['prod_info']['pgoods_id'];
echo "\" width=\"500\" height=\"46\" scrolling=\"no\" frameborder=\"0\"> </iframe></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"10\" class=\"required\">";
echo $lang['admin_pointprod_uploadimg_complete'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"10\"><ul id=\"thumbnails\" class=\"thumblists\">\r\n              ";
if ( is_array( $output['file_upload'] ) )
{
		echo "              ";
		foreach ( $output['file_upload'] as $k => $v )
		{
				echo "              <li id=\"";
				echo $v['upload_id'];
				echo "\" class=\"picture\" >\r\n                <input type=\"hidden\" name=\"file_id[]\" value=\"";
				echo $v['upload_id'];
				echo "\" />\r\n                <div class=\"size-64x64\"><span class=\"thumb\"><i></i><img src=\"";
				echo $v['upload_path'];
				echo "\" alt=\"";
				echo $v['file_name'];
				echo "\" onload=\"javascript:DrawImage(this,64,64);\"/></span></div>\r\n                <p><span><a href=\"javascript:insert_editor('";
				echo $v['upload_path'];
				echo "');\">";
				echo $lang['nc_insert'];
				echo "</a></span><span><a href=\"javascript:del_file_upload('";
				echo $v['upload_id'];
				echo "');\">";
				echo $lang['nc_del'];
				echo "</a></span></p>\r\n              </li>\r\n              ";
		}
		echo "              ";
}
echo "            </ul></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\"><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/swfupload.js\"></script> \r\n<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/js/handlers.js\"></script>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/css/default.css\"/>\r\n<script>\r\n\r\nfunction showlimit(){\r\n\tvar islimit = \$(\":radio[name=islimit]:checked\").val();\r\n\tif(islimit == '1'){\r\n\t\t\$(\"#limitnum_div\").show();\r\n\t}else{ \r\n\t\t\$(\"#limitnum_div\").hide();\r\n\t\t\$(\"#limitnum\").val('1');//为了减少提交表单的验证，所以添加一个虚假值\r\n\t}\r\n}\r\nfunction showfreightcharge(){\r\n\tvar freightcharge = \$(\":radio[name=freightcharge]:checked\").val();\r\n\tif(freightcharge == '1'){\r\n\t\t\$(\"#freightcharge_div\").show();\r\n\t}else{\r\n\t\t\$(\"#freightcharge_div\").hide();\r\n\t\t\$(\"#freightprice\").val('1');//为了减少提交表单的验证，所以添加一个虚假值\r\n\t}\r\n}\r\nfunction showforbidreason(){\r\n\tvar forbidstate = \$(\":radio[name=forbidstate]:checked\").val();\r\n\tif(forbidstate == '1'){\r\n\t\t\$(\"#forbidreason_div\").show();\r\n\t}else{\r\n\t\t\$(\"#forbidreason_div\").hide();\r\n\t}\r\n}\r\nfunction showlimittime(){\r\n\tvar islimit = \$(\":radio[name=islimittime]:checked\").val();\r\n\tif(islimit == '1'){\r\n\t\t\$(\"[name=limittime_div]\").show();\r\n\t}else{\r\n\t\t\$(\"[name=limittime_div]\").hide();\r\n\t\t\$(\"#starttime\").val('";
echo date( "Y-m-d", @time( ) );
echo "');\r\n\t\t\$(\"#endtime\").val('";
echo date( "Y-m-d", @time( ) );
echo "');\r\n\t}\r\n}\r\n\$(function(){\r\n\t\r\n\t// 模拟上传input type='file'样式\r\n\t\$(function(){\r\n\t    var textButton=\"<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />\"\r\n\t\t\$(textButton).insertBefore(\"#goods_images\");\r\n\t\t\$(\"#goods_images\").change(function(){\r\n\t\t\$(\"#textfield1\").val(\$(\"#goods_images\").val());\r\n\t\t});\r\n\t});\t\r\n\t\r\n\t\$('input[nc_type=\"change_goods_image\"]').change(function(){\r\n\t\tvar src = getFullPath(\$(this)[0]);\r\n\t\t\$('img[nc_type=\"goods_image\"]').attr('src', src);\r\n\t\t\$('input[nc_type=\"change_goods_image\"]').removeAttr('name');\r\n\t\t\$(this).attr('name', 'goods_image');\r\n\t});\r\n\t\r\n\tshowlimit();\r\n\tshowfreightcharge();\r\n\tshowforbidreason();\r\n\tshowlimittime();\r\n\t\r\n\t\$('#starttime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$('#endtime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#pointprod_form\").valid()){\r\n     \$(\"#pointprod_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n    \$('#pointprod_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        rules : {\r\n        \tgoodsname : {\r\n                required   : true\r\n            },\r\n            goodsprice    : {\r\n\t\t\t\trequired  : true,\r\n                number    : true,\r\n                min       : 0\r\n            },\r\n            goodspoints : {\r\n\t\t\t\trequired   : true,\r\n\t\t\t\tdigits     : true,\r\n\t\t\t\tmin\t\t   :0\r\n            },\r\n            goodsserial : {\r\n                required   : true\r\n            },\r\n            goodsstorage  : {\r\n\t\t\t\trequired  : true,\r\n                digits    : true\r\n            },\r\n            limitnum  : {\r\n\t\t\t\trequired   : true,\r\n\t\t\t\tdigits     : true,\r\n\t\t\t\tmin        : 0\r\n            },\r\n            freightprice  : {\r\n\t\t\t\trequired  : true,\r\n\t\t\t\tnumber    : true,\r\n\t\t\t\tmin       : 0\r\n            },\r\n            starttime  : {\r\n\t\t\t\trequired  : true,\r\n\t\t\t\tdate      : false\r\n            },\r\n            endtime  : {\r\n\t\t\t\trequired  : true,\r\n\t\t\t\tdate      : false\r\n            },\r\n            sort : {\r\n\t\t\t\trequired  : true,\r\n\t\t\t\tdigits    : true,\r\n\t\t\t\tmin\t\t  :0\r\n            }\r\n        },\r\n        messages : {\r\n        \tgoodsname  : {\r\n                required   : '";
echo $lang['admin_pointprod_add_goodsname_error'];
echo "'\r\n            },\r\n            goodsprice : {\r\n\t\t\t\trequired: '";
echo $lang['admin_pointprod_add_goodsprice_null_error'];
echo "',\r\n                number  : '";
echo $lang['admin_pointprod_add_goodsprice_number_error'];
echo "',\r\n                min     : '";
echo $lang['admin_pointprod_add_goodsprice_number_error'];
echo "'\r\n            },\r\n            goodspoints : {\r\n\t\t\t\trequired: '";
echo $lang['admin_pointprod_add_goodspoint_null_error'];
echo "',\r\n\t\t\t\tdigits     : '";
echo $lang['admin_pointprod_add_goodspoint_number_error'];
echo "',\r\n\t\t\t\tmin\t\t   : '";
echo $lang['admin_pointprod_add_goodspoint_number_error'];
echo "'\r\n            },\r\n            goodsserial:{\r\n                required : '";
echo $lang['admin_pointprod_add_goodsserial_null_error'];
echo "'\r\n            },\r\n            goodsstorage : {\r\n\t\t\t\trequired: '";
echo $lang['admin_pointprod_add_storage_null_error'];
echo "',\r\n\t\t\t\tdigits  : '";
echo $lang['admin_pointprod_add_storage_number_error'];
echo "'\r\n            },\r\n            limitnum : {\r\n\t\t\t\trequired: '";
echo $lang['admin_pointprod_add_limitnum_error'];
echo "',\r\n\t\t\t\tdigits  : '";
echo $lang['admin_pointprod_add_limitnum_digits_error'];
echo "',\r\n\t\t\t\tmin\t\t: '";
echo $lang['admin_pointprod_add_limitnum_digits_error'];
echo "'\r\n            },\r\n            freightprice : {\r\n\t\t\t\trequired: '";
echo $lang['admin_pointprod_add_freightprice_null_error'];
echo "',\r\n\t\t\t\tnumber  : '";
echo $lang['admin_pointprod_add_freightprice_number_error'];
echo "',\r\n\t\t\t\tmin     : '";
echo $lang['admin_pointprod_add_freightprice_number_error'];
echo "'\r\n            },\r\n            starttime  : {\r\n            \trequired: '";
echo $lang['admin_pointprod_add_limittime_null_error'];
echo "'\r\n            },\r\n            endtime  : {\r\n            \trequired: '";
echo $lang['admin_pointprod_add_limittime_null_error'];
echo "'\r\n            },\r\n            sort : {\r\n\t\t\t\trequired: '";
echo $lang['admin_pointprod_add_sort_null_error'];
echo "',\r\n\t\t\t\tdigits  : '";
echo $lang['admin_pointprod_add_sort_number_error'];
echo "',\r\n\t\t\t\tmin\t\t: '";
echo $lang['admin_pointprod_add_sort_number_error'];
echo "'\r\n            }\r\n        }\r\n    });\r\n    new SWFUpload({\r\n\t\tupload_url: \"index.php?act=swfupload&op=pointprod_pic_upload\",\r\n\t\tflash_url: \"";
echo RESOURCE_PATH;
echo "/js/swfupload/swfupload.swf\",\r\n\t\tpost_params: {\r\n\t\t\t\"PHPSESSID\": \"";
echo $output['PHPSESSID'];
echo "\",\r\n\t\t\t'item_id': '";
echo $output['prod_info']['pgoods_id'];
echo "'\r\n\t\t},\r\n\t\tfile_size_limit: \"2 MB\",\r\n\t\tfile_types: \"*.gif;*.jpg;*.jpeg;*.png\",\r\n\t\tcustom_settings: {\r\n\t\t\tupload_target: \"divFileProgressContainer\",\r\n\t\t\tif_multirow: 0\r\n\t\t},\r\n\r\n\t\t// Button Settings\r\n\t\tbutton_image_url: \"";
echo RESOURCE_PATH;
echo "/js/swfupload/images/SmallSpyGlassWithTransperancy_17x18.png\",\r\n\t\tbutton_width: 86,\r\n\t\tbutton_height: 18,\r\n\t\tbutton_text: '<span class=\"button\">";
echo $lang['admin_pointprod_uploadimg_more'];
echo "</span>',\r\n\t\tbutton_text_style: '.button {font-family: Helvetica, Arial, sans-serif; font-size: 12pt; font-weight: bold; color: #3F3D3E;} .buttonSmall {font-size: 10pt;}',\r\n\t\tbutton_text_top_padding: 0,\r\n\t\tbutton_text_left_padding: 18,\r\n\t\tbutton_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,\r\n\t\tbutton_cursor: SWFUpload.CURSOR.HAND,\r\n\r\n\t\t// The event handler functions are defined in handlers.js\r\n\t\tfile_queue_error_handler: fileQueueError,\r\n\t\tfile_dialog_complete_handler: fileDialogComplete,\r\n\t\tupload_progress_handler: uploadProgress,\r\n\t\tupload_error_handler: uploadError,\r\n\t\tupload_success_handler: uploadSuccess,\r\n\t\tupload_complete_handler: uploadComplete,\r\n\t\tbutton_placeholder_id: \"spanButtonPlaceholder\",\r\n\t\tfile_queued_handler : fileQueued\r\n\t});\r\n    \$(\"input[name='upload_types']\").click(\r\n   \t\tfunction()\r\n   \t\t{\r\n   \t\t\t\$('#divSwfuploadContainer').hide();\r\n   \t\t\t\$('#divComUploadContainer').hide();\r\n   \t\t\t\$('#divRemUploadContainer').hide();\r\n   \t\t\tswitch(\$(this).val())\r\n   \t\t\t{\r\n   \t\t\t\tcase 'com_upload' :  \$('#divComUploadContainer').show(); break;\r\n   \t\t\t\tcase 'bat_upload' :  \$('#divSwfuploadContainer').show(); break;\r\n   \t\t\t\tcase 'rem_upload' :  \$('#divRemUploadContainer').show(); break;\r\n   \t\t\t}\r\n   \t\t}\r\n   \t);\r\n});\r\nfunction add_uploadedfile(file_data)\r\n{\r\n\tfile_data = jQuery.parseJSON(file_data);\r\n\tvar newImg = '<li id=\"' + file_data.file_id + '\" class=\"picture\"><input type=\"hidden\" name=\"file_id[]\" value=\"' + file_data.file_id + '\" /><div class=\"size-64x64\"><span class=\"thumb\"><i></i><img src=\"";
echo SiteUrl."/".ATTACH_POINTPROD."/";
echo "' + file_data.file_name + '\" alt=\"' + file_data.file_name + '\" width=\"64px\" height=\"64px\"/></span></div><p><span><a href=\"javascript:insert_editor(\\'";
echo SiteUrl."/".ATTACH_POINTPROD."/";
echo "' + file_data.file_name + '\\');\">";
echo $lang['admin_pointprod_uploadimg_add'];
echo "</a></span><span><a href=\"javascript:del_file_upload(' + file_data.file_id + ');\">";
echo $lang['nc_del'];
echo "</a></span></p></li>';\r\n    \$('#thumbnails').prepend(newImg);\r\n}\r\nfunction insert_editor(file_path){\r\n\tKE.appendHtml('pgoods_body', '<img src=\"'+ file_path + '\" alt=\"'+ file_path + '\">');\r\n}\r\nfunction del_file_upload(file_id)\r\n{\r\n    if(!window.confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n        return;\r\n    }\r\n    \$.getJSON('index.php?act=pointprod&op=ajaxdelupload&file_id=' + file_id, function(result){\r\n        if(result){\r\n            \$('#' + file_id).remove();\r\n        }else{\r\n            alert('";
echo $lang['admin_pointprod_delfail'];
echo "');\r\n        }\r\n    });\r\n}\r\n</script>";
?>
