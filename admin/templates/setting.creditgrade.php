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
echo $lang['nc_store'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=setting&op=base_information\"><span>";
echo $lang['basic_info'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=captcha_setting\"><span>";
echo $lang['manage_about'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['setting_store_creditrule'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=ucenter_setting\"><span>";
echo $lang['ucenter_integration'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=qq_setting\"><span>";
echo $lang['qqSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=sina_setting\"><span>";
echo $lang['sinaSettings'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=setting&op=login_setting\"><span>";
echo $lang['loginSettings'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"post\" id=\"form_email\" name=\"settingForm\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />          \r\n    <table class=\"table tb-type2 nomargin\">\r\n        <thead>\r\n          <!-- <tr class=\"space\">\r\n            <th colspan=\"16\">";
echo $lang['setting_store_creditrule'];
echo "</th>\r\n          </tr> -->\r\n          <tr class=\"thead\">\r\n            <th>";
echo $lang['setting_store_creditrule_grade'];
echo "</th>\r\n            <th>";
echo $lang['setting_store_creditrule_gradenum'];
echo "</th>\r\n          </tr>\r\n        </thead>\r\n        <tbody>\r\n          ";
$i = 1;
for ( ;	$i <= 5;	++$i	)
{
		echo "          <tr class=\"hover\">\r\n            <td class=\"w200\"><span class=\"heart level-";
		echo $i;
		echo "\"><img src=\"";
		echo TEMPLATES_PATH;
		echo "/images/transparent.gif\"/></span></td>\r\n            <td><input name=\"credit[heart][";
		echo $i;
		echo "][0]\" type=\"text\" class=\"txt\" value=\"";
		echo $output['list_setting']['creditrule_arr']['heart'][$i][0];
		echo "\" style=\" width:60px;\" >\r\n              -&nbsp;&nbsp;\r\n              <input name=\"credit[heart][";
		echo $i;
		echo "][1]\" value=\"";
		echo $output['list_setting']['creditrule_arr']['heart'][$i][1];
		echo "\" class=\"txt\" type=\"text\" style=\" width:60px;\" ></td>\r\n          </tr>\r\n          ";
}
echo "          ";
$i = 1;
for ( ;	$i <= 5;	++$i	)
{
		echo "          <tr class=\"hover\">\r\n            <td><span class=\"diamond level-";
		echo $i;
		echo "\"><img src=\"";
		echo TEMPLATES_PATH;
		echo "/images/transparent.gif\"/></span></td>\r\n            <td><input name=\"credit[diamond][";
		echo $i;
		echo "][0]\" value=\"";
		echo $output['list_setting']['creditrule_arr']['diamond'][$i][0];
		echo "\" class=\"txt\" type=\"text\" style=\" width:60px;\" >\r\n              -&nbsp;&nbsp;\r\n              <input name=\"credit[diamond][";
		echo $i;
		echo "][1]\" value=\"";
		echo $output['list_setting']['creditrule_arr']['diamond'][$i][1];
		echo "\" class=\"txt\" type=\"text\" style=\" width:60px;\" ></td>\r\n          </tr>\r\n          ";
}
echo "          ";
$i = 1;
for ( ;	$i <= 5;	++$i	)
{
		echo "          <tr class=\"hover\">\r\n            <td><span class=\"crown level-";
		echo $i;
		echo "\"><img src=\"";
		echo TEMPLATES_PATH;
		echo "/images/transparent.gif\"/></span></td>\r\n            <td><input name=\"credit[crown][";
		echo $i;
		echo "][0]\" value=\"";
		echo $output['list_setting']['creditrule_arr']['crown'][$i][0];
		echo "\" class=\"txt\" type=\"text\" style=\" width:60px;\" >\r\n              -&nbsp;&nbsp;\r\n              <input name=\"credit[crown][";
		echo $i;
		echo "][1]\" value=\"";
		echo $output['list_setting']['creditrule_arr']['crown'][$i][1];
		echo "\" class=\"txt\" type=\"text\" style=\" width:60px;\" ></td>\r\n          </tr>\r\n          ";
}
echo "        </tbody>\r\n        <tfoot>\r\n\t    <tr class=\"tfoot\">\r\n\t      <td colspan=\"2\"><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.settingForm.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n\t    </tr>\r\n\t  </tfoot>\r\n \t</table>\r\n </form>\r\n</div>\r\n";
?>
