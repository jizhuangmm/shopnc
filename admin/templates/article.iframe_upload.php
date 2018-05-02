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
echo "\r\n<form action=\"index.php?act=article&op=article_iframe_upload\" method=\"post\" enctype=\"multipart/form-data\" style=\"display: inline;\" id=\"image_form\">\r\n  <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n  <input name=\"article_id\" value=\"";
echo $output['article_id'];
echo "\" type=\"hidden\">\r\n  <input name=\"file\" type=\"file\">\r\n  <input value=\"";
echo $lang['article_iframe_upload'];
echo "\" type=\"submit\">\r\n</form>\r\n<script type=\"text/javascript\">\r\n//<!CDATA[\r\n\$(function(){\r\n    \$('input[type=\"file\"]').change(function(){\r\n\t\t\tvar filepath=\$(this).val();\r\n\t\t\tvar extStart=filepath.lastIndexOf(\".\");\r\n\t\t\tvar ext=filepath.substring(extStart,filepath.length).toUpperCase();\t\t\r\n\t\t\tif(ext!=\".PNG\"&&ext!=\".GIF\"&&ext!=\".JPG\"&&ext!=\".JPEG\"){\r\n\t\t\t\talert(\"";
echo $lang['article_add_img_wrong'];
echo "\");\r\n\t\t\t\t\$(this).attr('value','');\r\n\t\t\t\treturn false;\r\n\t\t\t}\r\n    });\r\n});\r\n//]]>\r\n</script>";
?>
