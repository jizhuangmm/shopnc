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
echo $lang['upload_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=setting&op=image_setting\"><span>";
echo $lang['upload_pic_base'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['font_set'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=base_setting\"><span>";
echo $lang['upload_set_base'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ftp_setting\"><span>";
echo $lang['upload_set_ftp'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n   <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['font_help1'];
echo "&nbsp;&nbsp; <a href=\"http://www.shopnc.net/download/\" target=\"_blank\">";
echo $lang['font_download'];
echo "</a></li>\r\n            <li>";
echo $lang['font_help2'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\"><label>";
echo $lang['font_info'];
echo ":</label></td>\r\n        </tr>\r\n    \t\t";
if ( !empty( $output['file_list'] ) || is_array( $output['file_list'] ) )
{
		echo "        ";
		foreach ( $output['file_list'] as $key => $value )
		{
				echo "        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">";
				echo $key;
				echo $lang['nc_colon'];
				echo $value;
				echo "</td>\r\n          <td class=\"vatop tips\"></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
echo "      </tbody>\r\n    </table>\r\n</div>\r\n";
?>
