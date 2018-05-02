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
echo $lang['document_index_document'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=document&op=document\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"doc_form\" method=\"post\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"doc_id\" value=\"";
echo $output['doc']['doc_id'];
echo "\" />\r\n    <table class=\"table tb-type2 nobdb\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['document_index_title'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input type=\"text\" value=\"";
echo $output['doc']['doc_title'];
echo "\" name=\"doc_title\" id=\"doc_title\" class=\"infoTableInput\"></td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label class=\"validation\">";
echo $lang['document_index_content'];
echo ": </label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
showeditor( "doc_content", $output['doc']['doc_content'] );
echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['document_index_pic_upload'];
echo ":</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\"><div id=\"divUploadTypeContainer\">\r\n              <input name=\"upload_types\" id=\"bat_upload\" type=\"radio\" value=\"bat_upload\" checked=\"checked\" />\r\n              <label for=\"bat_upload\">";
echo $lang['document_index_batch_upload'];
echo "</label>\r\n              <input name=\"upload_types\" id=\"com_upload\" type=\"radio\" value=\"com_upload\" />\r\n              <label for=\"com_upload\">";
echo $lang['document_index_normal_upload'];
echo "</label>\r\n            </div>\r\n            <div id=\"divSwfuploadContainer\">\r\n              <div id=\"divButtonContainer\"> <span id=\"spanButtonPlaceholder\"></span> </div>\r\n              <div id=\"divFileProgressContainer\"></div>\r\n            </div>\r\n            <iframe id=\"divComUploadContainer\" style=\"display:none;\" src=\"index.php?act=document&op=document_iframe_upload&doc_id=";
echo $output['doc']['doc_id'];
echo "\" width=\"500\" height=\"46\" scrolling=\"no\" frameborder=\"0\"> </iframe></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['document_index_uploaded_pic'];
echo ":</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" ><div class=\"tdare\">\r\n              <table width=\"600px\" cellspacing=\"0\" class=\"dataTable\">\r\n                <tbody id=\"thumbnails\">\r\n                  ";
if ( is_array( $output['file_upload'] ) )
{
		echo "                  ";
		foreach ( $output['file_upload'] as $k => $v )
		{
				echo "                  <tr id=\"";
				echo $v['upload_id'];
				echo "\" class=\"tatr2\">\r\n                    <input type=\"hidden\" name=\"file_id[]\" value=\"";
				echo $v['upload_id'];
				echo "\" />\r\n                    <td><img width=\"40px\" height=\"40px\" src=\"";
				echo $v['upload_path'];
				echo "\" /></td>\r\n                    <td>";
				echo $v['file_name'];
				echo "</td>\r\n                    <td><a href=\"javascript:insert_editor('";
				echo $v['upload_path'];
				echo "');\">";
				echo $lang['document_index_insert'];
				echo "</a> | <a href=\"javascript:del_file_upload('";
				echo $v['upload_id'];
				echo "');\">";
				echo $lang['nc_del'];
				echo "</a></td>\r\n                  </tr>\r\n                  ";
		}
		echo "                  ";
}
echo "                </tbody>\r\n              </table>\r\n            </div></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/swfupload.js\"></script> \r\n<script type=\"text/javascript\" charset=\"utf-8\" src=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/js/handlers.js\"></script>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH;
echo "/js/swfupload/css/default.css\"/>\r\n<script>\r\n//按钮先执行验证再提交表单\r\n\$(function(){\$(\"#submitBtn\").click(function(){\r\n    if(\$(\"#doc_form\").valid()){\r\n     \$(\"#doc_form\").submit();\r\n\t}\r\n\t});\r\n});\r\n//\r\n\$(document).ready(function(){\r\n\t\$('#doc_form').validate({\r\n        errorPlacement: function(error, element){\r\n\t\t\terror.appendTo(element.parent().parent().prev().find('td:first'));\r\n        },\r\n        success: function(label){\r\n            label.addClass('valid');\r\n        },\r\n        onfocusout : false,\r\n        onkeyup    : false,\r\n        rules : {\r\n            doc_title : {\r\n                required   : true\r\n            },\r\n\t\t\tdoc_content : {\r\n                required   : true\r\n            }\r\n        },\r\n        messages : {\r\n            doc_title : {\r\n                required   : '";
echo $lang['document_index_title_null'];
echo "'\r\n            },\r\n\t\t\tdoc_content : {\r\n                required   : '";
echo $lang['document_index_content_null'];
echo "'\r\n            }\r\n        }\r\n    });\r\n\r\n\tnew SWFUpload({\r\n\t\tupload_url: \"index.php?act=swfupload&op=document_pic_upload\",\r\n\t\tflash_url: \"";
echo RESOURCE_PATH;
echo "/js/swfupload/swfupload.swf\",\r\n\t\tpost_params: {\r\n\t\t\t\"PHPSESSID\": \"";
echo $output['PHPSESSID'];
echo "\",\r\n\t\t\t'item_id': ";
echo $output['doc']['doc_id'];
echo "\t\t},\r\n\t\tfile_size_limit: \"2 MB\",\r\n\t\tfile_types: \"*.gif;*.jpg;*.jpeg;*.png\",\r\n\t\tcustom_settings: {\r\n\t\t\tupload_target: \"divFileProgressContainer\",\r\n\t\t\tif_multirow: 0\r\n\t\t},\r\n\r\n\t\t// Button Settings\r\n\t\tbutton_image_url: \"";
echo RESOURCE_PATH;
echo "/js/swfupload/images/SmallSpyGlassWithTransperancy_17x18.png\",\r\n\t\tbutton_width: 86,\r\n\t\tbutton_height: 18,\r\n\t\tbutton_text: '<span class=\"button\">";
echo $lang['document_index_batch_upload'];
echo "</span>',\r\n\t\tbutton_text_style: '.button {font-family: Helvetica, Arial, sans-serif; font-size: 12pt; font-weight: bold; color: #3F3D3E;} .buttonSmall {font-size: 10pt;}',\r\n\t\tbutton_text_top_padding: 0,\r\n\t\tbutton_text_left_padding: 18,\r\n\t\tbutton_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,\r\n\t\tbutton_cursor: SWFUpload.CURSOR.HAND,\r\n\r\n\t\t// The event handler functions are defined in handlers.js\r\n\t\tfile_queue_error_handler: fileQueueError,\r\n\t\tfile_dialog_complete_handler: fileDialogComplete,\r\n\t\tupload_progress_handler: uploadProgress,\r\n\t\tupload_error_handler: uploadError,\r\n\t\tupload_success_handler: uploadSuccess,\r\n\t\tupload_complete_handler: uploadComplete,\r\n\t\tbutton_placeholder_id: \"spanButtonPlaceholder\",\r\n\t\tfile_queued_handler : fileQueued\r\n\t});\r\n\r\n\t\$(\"input[name='upload_types']\").click(\r\n\t\tfunction()\r\n\t\t{\r\n\t\t\t\$('#divSwfuploadContainer').hide();\r\n\t\t\t\$('#divComUploadContainer').hide();\r\n\t\t\t\$('#divRemUploadContainer').hide();\r\n\t\t\tswitch(\$(this).val())\r\n\t\t\t{\r\n\t\t\t\tcase 'com_upload' :  \$('#divComUploadContainer').show(); break;\r\n\t\t\t\tcase 'bat_upload' :  \$('#divSwfuploadContainer').show(); break;\r\n\t\t\t\tcase 'rem_upload' :  \$('#divRemUploadContainer').show(); break;\r\n\t\t\t}\r\n\t\t}\r\n\t);\r\n});\r\nfunction add_uploadedfile(file_data)\r\n{\r\n\tfile_data = jQuery.parseJSON(file_data);\r\n    var newImg = '<tr id=\"' + file_data.file_id + '\" class=\"tatr2\"><input type=\"hidden\" name=\"file_id[]\" value=\"' + file_data.file_id + '\" /><td><img width=\"40px\" height=\"40px\" src=\"";
echo SiteUrl."/".ATTACH_ARTICLE."/";
echo "' + file_data.file_name + '\" /></td><td>' + file_data.file_name + '</td><td><a href=\"javascript:insert_editor(\\'";
echo SiteUrl."/".ATTACH_ARTICLE."/";
echo "' + file_data.file_name + '\\');\">";
echo $lang['document_index_insert'];
echo "</a> | <a href=\"javascript:del_file_upload(' + file_data.file_id + ');\">";
echo $lang['nc_del'];
echo "</a></td></tr>';\r\n    \$('#thumbnails').prepend(newImg);\r\n}\r\nfunction insert_editor(file_path){\r\n\tKE.appendHtml('doc_content', '<img src=\"'+ file_path + '\" alt=\"'+ file_path + '\">');\r\n}\r\nfunction del_file_upload(file_id)\r\n{\r\n    if(!window.confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n        return;\r\n    }\r\n    \$.getJSON('index.php?act=document&op=ajax&branch=del_file_upload&file_id=' + file_id, function(result){\r\n        if(result){\r\n            \$('#' + file_id).remove();\r\n        }else{\r\n            alert('";
echo $lang['document_index_del_fail'];
echo "');\r\n        }\r\n    });\r\n}\r\n</script>";
?>
