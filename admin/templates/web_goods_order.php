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
if ( !empty( $output['goods_list'] ) || is_array( $output['goods_list'] ) )
{
		echo "\r\n<ul class=\"dialog-goodslist-s2\">\r\n  ";
		foreach ( $output['goods_list'] as $k => $v )
		{
				echo "  <li>\r\n    <div onclick=\"select_goods_order(";
				echo $v['goods_id'];
				echo ");\" class=\"goods-pic\"><span class=\"ac-ico\"></span><span class=\"thumb size-72x72\"><i></i><img goods_id=\"";
				echo $v['goods_id'];
				echo "\" store_id=\"";
				echo $v['store_id'];
				echo "\" goods_price=\"";
				echo $v['goods_store_price'];
				echo "\" title=\"";
				echo $v['goods_name'];
				echo "\" src=\"";
				echo thumb( $v, "small" );
				echo "\" onload=\"javascript:DrawImage(this,72,72);\" /></span></div>\r\n    <div class=\"goods-name\"><a href=\"";
				echo SiteUrl."/index.php?act=goods&goods_id=".$v['goods_id']."&id=".$v['store_id'];
				echo "\" target=\"_blank\">";
				echo $v['goods_name'];
				echo "</a></div>\r\n  </li>\r\n  ";
		}
		echo "</ul>\r\n<div class=\"clear\"></div>\r\n<div id=\"show_goods_order\" class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div>\r\n";
}
else
{
		echo "<p class=\"no-record\">";
		echo $lang['nc_no_record'];
		echo "</p>\r\n";
}
echo "<div class=\"clear\"></div>\r\n<script type=\"text/javascript\">\r\n\t\$('#show_goods_order .demo').ajaxContent({\r\n\t\ttarget:'#show_goods_order_list'\r\n\t});\r\n</script>";
?>
