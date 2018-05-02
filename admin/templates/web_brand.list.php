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
if ( !empty( $output['brand_list'] ) || is_array( $output['brand_list'] ) )
{
		echo "\r\n<ul class=\"brands dialog-brandslist-s2\">\r\n  ";
		foreach ( $output['brand_list'] as $k => $v )
		{
				echo "  <li>\r\n    <div class=\"brands-pic\" onclick=\"select_brand(";
				echo $v['brand_id'];
				echo ");\"><span class=\"ac-ico\"></span><span class=\"thumb size-88x44\"><i></i><img brand_id=\"";
				echo $v['brand_id'];
				echo "\" title=\"";
				echo $v['brand_name'];
				echo "\" src=\"";
				if ( !empty( $v['brand_pic'] ) )
				{
						echo SiteUrl."/".ATTACH_BRAND."/".$v['brand_pic'];
				}
				else
				{
						echo SiteUrl."/templates/".TPL_NAME."/images/default_brand_image.gif";
				}
				echo "\" onload=\"javascript:DrawImage(this,88,44);\" /></span></div>\r\n    <div class=\"brands-name\">";
				echo $v['brand_name'];
				echo "</div>\r\n  </li>\r\n  ";
		}
		echo "</ul>\r\n<div id=\"show_page_brand\" class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div>\r\n<div class=\"clear\"></div>\r\n";
}
else
{
		echo $lang['nc_no_record'];
}
echo "<script type=\"text/javascript\">\r\n\t\$('#show_page_brand .demo').ajaxContent({\r\n\t\ttarget:'#show_brand_list'\r\n\t});\r\n</script>";
?>
