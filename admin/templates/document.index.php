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
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n    <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['document_index_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2 nobdb\">\r\n    <thead>\r\n      <tr class=\"thead\">\r\n        <th>";
echo $lang['document_index_title'];
echo "</th>\r\n        <th class=\"align-center\">";
echo $lang['document_edit_time'];
echo "</th>\r\n        <th>";
echo $lang['nc_handle'];
echo "</th>\r\n      </tr>\r\n    </thead>\r\n    <tbody>\r\n      ";
if ( !empty( $output['doc_list'] ) || is_array( $output['doc_list'] ) )
{
		echo "      ";
		foreach ( $output['doc_list'] as $k => $v )
		{
				echo "      <tr class=\"hover\">\r\n        <td >";
				echo $v['doc_title'];
				echo "</td>\r\n        <td class=\"w25pre align-center\">";
				echo date( "Y-m-d H:i:s", $v['doc_time'] );
				echo "</td>\r\n        <td class=\"w96\"><a href=\"index.php?act=document&op=edit&doc_id=";
				echo $v['doc_id'];
				echo "\">";
				echo $lang['nc_edit'];
				echo "</a></td>\r\n      </tr>\r\n      ";
		}
		echo "      ";
}
else
{
		echo "      <tr class=\"no_data\">\r\n        <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n      </tr>\r\n      ";
}
echo "    </tbody>\r\n  </table>\r\n</div>\r\n";
?>
