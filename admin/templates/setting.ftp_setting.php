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
echo $lang['upload_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=setting&op=image_setting\"><span>";
echo $lang['upload_pic_base'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=font_setting\"><span>";
echo $lang['font_set'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=base_setting\"><span>";
echo $lang['upload_set_base'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['upload_set_ftp'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" name=\"form1\" id=\"form1\" action=\"index.php?act=setting&op=ftp_test\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['ftp_state'];
echo ":</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"ftp_open1\" class=\"cb-enable ";
if ( $output['list_setting']['ftp_open'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['open'];
echo "</span></label>\r\n            <label for=\"ftp_open0\" class=\"cb-disable ";
if ( $output['list_setting']['ftp_open'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['close'];
echo "</span></label>\r\n            <input id=\"ftp_open1\" name=\"ftp_open\" ";
if ( $output['list_setting']['ftp_open'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"ftp_open0\" name=\"ftp_open\" ";
if ( $output['list_setting']['ftp_open'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_state_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"site_name\">";
echo $lang['ftp_ssl_state'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"ftp_ssl_state1\" class=\"cb-enable ";
if ( $output['list_setting']['ftp_ssl_state'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['open'];
echo "</span></label>\r\n            <label for=\"ftp_ssl_state0\" class=\"cb-disable ";
if ( $output['list_setting']['ftp_ssl_state'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['close'];
echo "</span></label>\r\n            <input id=\"ftp_ssl_state1\" name=\"ftp_ssl_state\" ";
if ( $output['list_setting']['ftp_ssl_state'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"ftp_ssl_state0\" name=\"ftp_ssl_state\" ";
if ( $output['list_setting']['ftp_ssl_state'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_ssl_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_server\">";
echo $lang['ftp_server'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_server\" name=\"ftp_server\" value=\"";
echo $output['list_setting']['ftp_server'];
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_server_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_port\">";
echo $lang['ftp_port'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_port\" name=\"ftp_port\" value=\"";
echo ( $port = $output['list_setting']['ftp_port'] ) ? $port : "21";
echo "\" class=\"txt\" type=\"text\" /></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_port_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_username\">";
echo $lang['ftp_username'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_username\" name=\"ftp_username\" value=\"";
echo $output['list_setting']['ftp_username'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_username_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_password\">";
echo $lang['ftp_password'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_password\" name=\"ftp_password\" value=\"";
echo $output['list_setting']['ftp_password'];
echo "\" class=\"txt\" type=\"password\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\"></span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_pasv\">";
echo $lang['ftp_pasv'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"ftp_pasv1\" class=\"cb-enable ";
if ( $output['list_setting']['ftp_pasv'] == "1" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['open_yes'];
echo "</span></label>\r\n            <label for=\"ftp_pasv0\" class=\"cb-disable ";
if ( $output['list_setting']['ftp_pasv'] == "0" )
{
		echo "selected";
}
echo "\" ><span>";
echo $lang['open_no'];
echo "</span></label>\r\n            <input id=\"ftp_pasv1\" name=\"ftp_pasv\" ";
if ( $output['list_setting']['ftp_pasv'] == "1" )
{
		echo "checked=\"checked\"";
}
echo "  value=\"1\" type=\"radio\">\r\n            <input id=\"ftp_pasv0\" name=\"ftp_pasv\" ";
if ( $output['list_setting']['ftp_pasv'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_pasv_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_attach_dir\">";
echo $lang['ftp_attach_dir'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_attach_dir\" name=\"ftp_attach_dir\" value=\"";
echo $output['list_setting']['ftp_attach_dir'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_attach_dir_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_access_url\">";
echo $lang['ftp_access_url'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_access_url\" name=\"ftp_access_url\" value=\"";
echo $output['list_setting']['ftp_access_url'];
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_access_url_tip'];
echo "</span></td>\r\n        </tr>\r\n         <tr class=\"_ftp\">\r\n          <td colspan=\"2\" class=\"required\"><label for=\"ftp_timeout\">";
echo $lang['ftp_timeout'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder _ftp\">\r\n          <td class=\"vatop rowform\"><input id=\"ftp_timeout\" name=\"ftp_timeout\" value=\"";
echo ( $ttl = $output['list_setting']['ftp_timeout'] ) ? $ttl : "0";
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_timeout_tip'];
echo "</span></td>\r\n        </tr>\r\n        <tr class=\"_ftp\">\r\n          <td class=\"vatop rowform\">\r\n          <input id=\"ftp_test\" name=\"ftp_test\" value=\"";
echo $lang['ftp_test'];
echo "\" class=\"btn\" type=\"button\"></td>\r\n          <td class=\"vatop tips\"><span class=\"vatop rowform\">";
echo $lang['ftp_test_tip'];
echo "</span></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form1.action='index.php?act=setting&op=ftp_setting';document.form1.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\t\$('#ftp_test').click(function(){\r\n\t\t\$(this).val('loading......');\r\n\t\t\$(this).attr('disabled',true);\r\n\t\tif (\$('#ftp_ssl_state1').attr('checked')){\r\n\t\t\tftp_ssl_state = 1;\r\n\t\t}else{\r\n\t\t\tftp_ssl_state = 0;\r\n\t\t}\r\n\t\tif (\$('#ftp_pasv1').attr('checked')){\r\n\t\t\tftp_pasv = 1;\r\n\t\t}else{\r\n\t\t\tftp_pasv = 0;\r\n\t\t}\r\n\t\t\$.ajax({\r\n\t\t\ttype:'POST',\r\n\t\t\turl:'index.php',\r\n\t\t\tdata:'act=setting&op=ftp_test&ftp_ssl_state='+ftp_ssl_state+'&ftp_port='+\$('#ftp_port').val()+'&ftp_server='+\$('#ftp_server').val()+'&ftp_username='+\$('#ftp_username').val()+'&ftp_password='+\$('#ftp_password').val()+'&ftp_pasv='+ftp_pasv+'&ftp_attach_dir='+\$('#ftp_attach_dir').val()+'&ftp_access_url='+\$('#ftp_access_url').val()+'&ftp_timeout='+\$('#ftp_timeout').val(),\r\n\t\t\terror:function(){\r\n\t\t\t\t\talert('";
echo $lang['ftp_error-102'];
echo "');\r\n\t\t\t\t\t\$('#ftp_test').val('";
echo $lang['ftp_test'];
echo "');\r\n\t\t\t\t},\r\n\t\t\tsuccess:function(html){\r\n\t\t\t\talert(html.msg);\r\n\t\t\t\t\$('#ftp_test').val('";
echo $lang['ftp_test'];
echo "');\r\n\t\t\t\t\$('#ftp_test').attr('disabled',false);\r\n\t\t\t},\r\n\t\t\tdataType:'json'\r\n\t\t});\r\n\t});\r\n\t\$('#ftp_open1').click(function(){\r\n\t\t\$('._ftp').css('display','');\r\n\t});\r\n\t\$('#ftp_open0').click(function(){\r\n\t\t\$('._ftp').css('display','none');\r\n\t});\r\n\t";
if ( $output['list_setting']['ftp_open'] == "0" )
{
		echo "\t\t\$('._ftp').css('display','none');\r\n\t";
}
echo "});\r\n\r\n</script>";
?>
