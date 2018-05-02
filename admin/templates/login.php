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
echo "\r\n<div id=\"loginBox\">\r\n  <form method=\"post\" id=\"form_login\">\r\n    ";
Security::gettoken( );
echo "    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"SiteUrl\" id=\"SiteUrl\" value=\"";
echo SiteUrl;
echo "\" />\r\n    <div class=\"username\">\r\n      <h5>";
echo $lang['login_index_username'];
echo ":</h5>\r\n      <input class=\"text\" id=\"user_name\" name=\"user_name\" autocomplete=\"off\" type=\"text\" style=\"width:300px;\">\r\n    </div>\r\n    <div class=\"password\">\r\n      <h5>";
echo $lang['login_index_password'];
echo ":</h5>\r\n      <input class=\"text\" name=\"password\" id=\"password\" autocomplete=\"off\"  type=\"password\" style=\"width:300px;\">\r\n    </div>\r\n    <div class=\"code\">\r\n      <h5>";
echo $lang['login_index_checkcode'];
echo ":</h5>\r\n      <input class=\"text\" name=\"captcha\" id=\"captcha\" autocomplete=\"off\"  type=\"text\" style=\"width:120px;\"><span><a href=\"JavaScript:void(0);\" onclick=\"javascript:document.getElementById('codeimage').src='../index.php?act=seccode&op=makecode&nchash=";
echo $output['nchash'];
echo "&t=' + Math.random();\"> <img src=\"../index.php?act=seccode&op=makecode&nchash=";
echo $output['nchash'];
echo "\" title=\"";
echo $lang['login_index_change_checkcode'];
echo "\" name=\"codeimage\" border=\"0\" id=\"codeimage\" onclick=\"this.src='../index.php?act=seccode&op=makecode&nchash=";
echo $output['nchash'];
echo "&t=' + Math.random()\" /></a></span>\r\n    </div>\r\n    <div class=\"button\">\r\n    <input name=\"nchash\" type=\"hidden\" value=\"";
echo $output['nchash'];
echo "\" />\r\n      <input class=\"btnEnter\" value=\"\" type=\"submit\">\r\n    </div>\r\n    <div class=\"back\"><a href=\"";
echo SiteUrl;
echo "\" target=\"_blank\">";
echo $lang['login_index_back_to_homepage'];
echo "</a></div>\r\n  </form>\r\n  <div class=\"copyright\">Copyright 2007-2013 <a href=\"http://www.shopnc.net/\" target=\"_blank\">ShopNC</a>, All Rights Reserved <br>\r\n  ";
echo $lang['login_index_shopnc'];
echo "</div>\r\n</div>\r\n<script>\r\n\$(document).ready(function(){\r\n\tif(top.location!=this.location)\ttop.location=this.location;//跳出框架在主窗口登录\r\n\t\$('#user_name').focus();\r\n\tif (\$.browser.msie && \$.browser.version==\"6.0\"){\r\n\t\twindow.location.href='templates/ie6update.html';\r\n\t}\r\n});\r\n</script>";
?>
