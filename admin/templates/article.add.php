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
echo $lang['article_index_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=article&op=article\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_new'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"article_form\" method=\"post\" name=\"articleForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['article_index_title'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"article_title\" id=\"article_title\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\" for=\"cate_id\">";
echo $lang['article_add_class'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><select name=\"ac_id\" id=\"ac_id\">\r\n              <option value=\"\">";
echo $lang['nc_please_choose'];
echo "...</option>\r\n              ";
if ( !empty( $output['parent_list'] ) || is_array( $output['parent_list'] ) )
{
		echo "              ";
		foreach ( $output['parent_list'] as $k => $v )
		{
				echo "              <option ";
				if ( $output['ac_id'] == $v['ac_id'] )
				{
						echo "selected='selected'";
				}
				echo " value=\"";
				echo $v['ac_id'];
				echo "\">";
				echo $v['ac_name'];
				echo "</option>\r\n              ";
		}
		echo "              ";
}
echo "            </select></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label for=\"articleForm\">";
echo $lang['article_add_url'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"\" name=\"article_url\" id=\"article_url\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['article_add_url_tip'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['article_add_show'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"article_show1\" class=\"cb-enable selected\" ><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"article_show0\" class=\"cb-disable\" ><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"article_show1\" name=\"article_show\" checked=\"checked\" value=\"1\" type=\"radio\">\r\n            <input id=\"article_show0\" name=\"article_show\" value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['nc_sort'];
echo ": \r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"255\" name=\"article_sort\" id=\"article_sort\" class=\"txt\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['article_add_content'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"vatop rowform\">";
showeditor( "article_content" );
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['article_add_upload'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><ul id=\"divUploadTypeContainer\">\r\n              <li>\r\n                <input name=\"upload_types\" id=\"bat_upload\" type=\"radio\" value=\"bat_upload\" checked=\"checked\" />\r\n                <label for=\"bat_upload\">";
echo $lang['article_add_batch_upload'];
echo "</label>\r\n              </li>\r\n              <li>\r\n                <input name=\"upload_types\" id=\"com_upload\" type=\"radio\" value=\"com_upload\" />\r\n                <label for=\"com_upload\">";
echo $lang['article_add_normal_upload'];
echo "</label>\r\n              </li>\r\n            </ul>\r\n            <div id=\"divSwfuploadContainer\">\r\n              <div id=\"divButtonContainer\"> <span id=\"spanButtonPlaceholder\"></span> </div>\r\n              <div id=\"divFileProgressContainer\"></div>\r\n            </div>\r\n            <iframe id=\"divComUploadContainer\" style=\"display:none;\" src=\"index.php?act=article&op=article_iframe_upload&article_id=";
echo $output['article_array']['article_id'];
echo "\" width=\"500\" height=\"46\" scrolling=\"no\" frameborder=\"0\"> </iframe></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['article_add_uploaded'];
echo ":</td>\r\n        <tr>\r\n          <td colspan=\"2\"><ul id=\"thumbnails\" class=\"thumblists\">\r\n              ";
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
				echo $lang['article_add_insert'];
				echo "</a></span><span><a href=\"javascript:del_file_upload('";
				echo $v['upload_id'];
				echo "');\">";
				echo $lang['nc_del'];
				echo "</a></span></p>\r\n              </li>\r\n              ";
		}
		echo "              ";
}
echo "            </ul><div class=\"tdare\">\r\n              \r\n          </div></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/swfupload.js\"></script> \r\n<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/js/handlers.js\"></script>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/css/default.css\"/>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#article_form\").valid()){\r\n     \$(\"#article_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#article_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            article_title : {\r\n                required   : true\r\n            },\r\n\t\t\tac_id : {\r\n                required   : true\r\n            },\r\n\t\t\tarticle_url : {\r\n\t\t\t\turl : true\r\n            },\r\n\t\t\tarticle_content : {\r\n                required   : true\r\n            },\r\n            article_sort : {\r\n                number   : true\r\n            }\r\n        },\r\n        messages : {\r\n            article_title : {\r\n                required   : '";
echo $lang['article_add_title_null'];
echo "'\r\n            },\r\n\t\t\tac_id : {\r\n                required   : '";
echo $lang['article_add_class_null'];
echo "'\r\n            },\r\n\t\t\tarticle_url : {\r\n\t\t\t\turl : '";
echo $lang['article_add_url_wrong'];
echo "'\r\n            },\r\n\t\t\tarticle_content : {\r\n                required   : '";
echo $lang['article_add_content_null'];
echo "'\r\n            },\r\n            article_sort  : {\r\n                number   : '";
echo $lang['article_add_sort_int'];
echo "'\r\n            }\r\n        }\r\n    });\r\n\r\n\tnew SWFUpload({\r\n\t\tupload_url: \"index.php?act=swfupload&op=article_pic_upload\",\r\n\t\tflash_url: \"";
echo RESOURCE_PATH;
echo "/js/swfupload/swfupload.swf\",\r\n\t\tpost_params: {\r\n\t\t\t\"PHPSESSID\": \"";
echo $output['PHPSESSID'];
echo "\",\r\n\t\t\t'item_id': 0\r\n\t\t},\r\n\t\tfile_size_limit: \"2 MB\",\r\n\t\tfile_types: \"*.gif;*.jpg;*.jpeg;*.png\",\r\n\t\tcustom_settings: {\r\n\t\t\tupload_target: \"divFileProgressContainer\",\r\n\t\t\tif_multirow: 0\r\n\t\t},\r\n\r\n\t\t// Button Settings\r\n\t\tbutton_image_url: \"";
echo RESOURCE_PATH;
echo "/js/swfupload/images/SmallSpyGlassWithTransperancy_17x18.png\",\r\n\t\tbutton_width: 86,\r\n\t\tbutton_height: 18,\r\n\t\tbutton_text: '<span class=\"button\">";
echo $lang['article_add_batch_upload'];
echo "</span>',\r\n\t\tbutton_text_style: '.button {font-family: Helvetica, Arial, sans-serif; font-size: 12pt; font-weight: bold; color: #3F3D3E;} .buttonSmall {font-size: 10pt;}',\r\n\t\tbutton_text_top_padding: 0,\r\n\t\tbutton_text_left_padding: 18,\r\n\t\tbutton_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,\r\n\t\tbutton_cursor: SWFUpload.CURSOR.HAND,\r\n\r\n\t\t// The event handler functions are defined in handlers.js\r\n\t\tfile_queue_error_handler: fileQueueError,\r\n\t\tfile_dialog_complete_handler: fileDialogComplete,\r\n\t\tupload_progress_handler: uploadProgress,\r\n\t\tupload_error_handler: uploadError,\r\n\t\tupload_success_handler: uploadSuccess,\r\n\t\tupload_complete_handler: uploadComplete,\r\n\t\tbutton_placeholder_id: \"spanButtonPlaceholder\",\r\n\t\tfile_queued_handler : fileQueued\r\n\t});\r\n\r\n\t\$(\"input[name='upload_types']\").click(\r\n\t\tfunction()\r\n\t\t{\r\n\t\t\t\$('#divSwfuploadContainer').hide();\r\n\t\t\t\$('#divComUploadContainer').hide();\r\n\t\t\t\$('#divRemUploadContainer').hide();\r\n\t\t\tswitch(\$(this).val())\r\n\t\t\t{\r\n\t\t\t\tcase 'com_upload' :  \$('#divComUploadContainer').show(); break;\r\n\t\t\t\tcase 'bat_upload' :  \$('#divSwfuploadContainer').show(); break;\r\n\t\t\t\tcase 'rem_upload' :  \$('#divRemUploadContainer').show(); break;\r\n\t\t\t}\r\n\t\t}\r\n\t);\r\n\t\r\n});\r\n\r\n\r\nfunction add_uploadedfile(file_data)\r\n{\r\n\tfile_data = jQuery.parseJSON(file_data);\r\n    var newImg = '<li id=\"' + file_data.file_id + '\" class=\"picture\"><input type=\"hidden\" name=\"file_id[]\" value=\"' + file_data.file_id + '\" /><div class=\"size-64x64\"><span class=\"thumb\"><i></i><img src=\"";
echo SiteUrl."/".ATTACH_ARTICLE."/";
echo "' + file_data.file_name + '\" alt=\"' + file_data.file_name + '\" width=\"64px\" height=\"64px\"/></span></div><p><span><a href=\"javascript:insert_editor(\\'";
echo SiteUrl."/".ATTACH_ARTICLE."/";
echo "' + file_data.file_name + '\\');\">";
echo $lang['article_add_insert'];
echo "</a></span><span><a href=\"javascript:del_file_upload(' + file_data.file_id + ');\">";
echo $lang['nc_del'];
echo "</a></span></p></li>';\r\n    \$('#thumbnails').prepend(newImg);\r\n}\r\nfunction insert_editor(file_path){\r\n\tKE.appendHtml('article_content', '<img src=\"'+ file_path + '\" alt=\"'+ file_path + '\">');\r\n}\r\nfunction del_file_upload(file_id)\r\n{\r\n    if(!window.confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n        return;\r\n    }\r\n    \$.getJSON('index.php?act=article&op=ajax&branch=del_file_upload&file_id=' + file_id, function(result){\r\n        if(result){\r\n            \$('#' + file_id).remove();\r\n        }else{\r\n            alert('";
echo $lang['article_add_del_fail'];
echo "');\r\n        }\r\n    });\r\n}\r\n\r\n\r\n</script>";
?>
