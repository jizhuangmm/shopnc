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
echo $lang['nc_seo_set'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"rewrite\" class=\"current\"><span>";
echo $lang['nc_seo_url_rewrite'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"index\"><span>";
echo $lang['seo_set_index'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"group\"><span>";
echo $lang['seo_set_group'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"brand\"><span>";
echo $lang['seo_set_brand'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"coupon\"><span>";
echo $lang['seo_set_coupon'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"point\"><span>";
echo $lang['seo_set_point'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"article\"><span>";
echo $lang['seo_set_article'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"shop\"><span>";
echo $lang['seo_set_shop'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"product\"><span>";
echo $lang['seo_set_product'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" nctype=\"category\"><span>";
echo $lang['seo_set_category'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  \r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\" class=\"nobg\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n        \t<li>";
echo $lang['seo_set_prompt'];
echo "</li>\r\n            <li>";
echo $lang['seo_set_tips1'];
echo "</li>\r\n            <li nctype=\"vmore\">";
echo $lang['seo_set_tips2'];
echo "</li>\r\n            <li nctype=\"vmore\">";
echo $lang['seo_set_tips3'];
echo "</li>\r\n            <li nctype=\"vmore\">";
echo $lang['seo_set_tips4'];
echo "</li>\r\n            <li nctype=\"vmore\">";
echo $lang['seo_set_tips5'];
echo "</li>\r\n            <li nctype=\"vmore\">";
echo $lang['seo_set_tips6'];
echo "</li>\r\n            <li>";
echo $lang['seo_set_tips7'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method=\"post\" name=\"form_rewrite\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['open_pseudo_static'];
echo ":</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform onoff\"><label for=\"rewrite_enabled\"  class=\"cb-enable ";
if ( $output['list_setting']['rewrite_enabled'] == "1" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_yes'];
echo "\"><span>";
echo $lang['nc_yes'];
echo "</span></label>\r\n            <label for=\"rewrite_disabled\" class=\"cb-disable ";
if ( $output['list_setting']['rewrite_enabled'] == "0" )
{
		echo "selected";
}
echo "\" title=\"";
echo $lang['nc_no'];
echo "\"><span>";
echo $lang['nc_no'];
echo "</span></label>\r\n            <input id=\"rewrite_enabled\" name=\"rewrite_enabled\" ";
if ( $output['list_setting']['rewrite_enabled'] == "1" )
{
		echo "checked=\"checked\"";
}
echo " value=\"1\" type=\"radio\">\r\n            <input id=\"rewrite_disabled\" name=\"rewrite_enabled\" ";
if ( $output['list_setting']['rewrite_enabled'] == "0" )
{
		echo "checked=\"checked\"";
}
echo " value=\"0\" type=\"radio\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['open_pseudo_static_increase_search'];
echo "<br/>\r\n            ";
echo $lang['open_apache'];
echo "rewrite.module";
echo $lang['module'];
echo "\"htaccess.txt\"";
echo $lang['file_re_name'];
echo "\".htaccess\"";
echo $lang['next_choose_yes'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_rewrite.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_index\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n\t<span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_index'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[index][title]\" name=\"SEO[index][title]\" value=\"";
echo $output['seo']['index']['title'];
echo "\" class=\"w300\" type=\"text\"/></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[index][keywords]\" name=\"SEO[index][keywords]\" value=\"";
echo $output['seo']['index']['keywords'];
echo "\" class=\"w300\" type=\"text\" maxlength=\"200\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[index][description]\" name=\"SEO[index][description]\" value=\"";
echo $output['seo']['index']['description'];
echo "\" class=\"w300\" type=\"text\" maxlength=\"200\"/></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_index.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_group\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{name}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_group'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[group][title]\" name=\"SEO[group][title]\" value=\"";
echo $output['seo']['group']['title'];
echo "\" class=\"w300\" type=\"text\"/></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[group][keywords]\" name=\"SEO[group][keywords]\" value=\"";
echo $output['seo']['group']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[group][description]\" name=\"SEO[group][description]\" value=\"";
echo $output['seo']['group']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_group_content'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[group_content][title]\" name=\"SEO[group_content][title]\" value=\"";
echo $output['seo']['group_content']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[group_content][keywords]\" name=\"SEO[group_content][keywords]\" value=\"";
echo $output['seo']['group_content']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[group_content][description]\" name=\"SEO[group_content][description]\" value=\"";
echo $output['seo']['group_content']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_group.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_brand\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{name}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_brand'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[brand][title]\" name=\"SEO[brand][title]\" value=\"";
echo $output['seo']['brand']['title'];
echo "\" class=\"w300\" type=\"text\"/></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[brand][keywords]\" name=\"SEO[brand][keywords]\" value=\"";
echo $output['seo']['brand']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[brand][description]\" name=\"SEO[brand][description]\" value=\"";
echo $output['seo']['brand']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_brand_list'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[brand_list][title]\" name=\"SEO[brand_list][title]\" value=\"";
echo $output['seo']['brand_list']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[brand_list][keywords]\" name=\"SEO[brand_list][keywords]\" value=\"";
echo $output['seo']['brand_list']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[brand_list][description]\" name=\"SEO[brand_list][description]\" value=\"";
echo $output['seo']['brand_list']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_brand.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_coupon\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{name}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_coupon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[coupon][title]\" name=\"SEO[coupon][title]\" value=\"";
echo $output['seo']['coupon']['title'];
echo "\" class=\"w300\" type=\"text\"/></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[coupon][keywords]\" name=\"SEO[coupon][keywords]\" value=\"";
echo $output['seo']['coupon']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[coupon][description]\" name=\"SEO[coupon][description]\" value=\"";
echo $output['seo']['coupon']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_coupon_content'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[coupon_content][title]\" name=\"SEO[coupon_content][title]\" value=\"";
echo $output['seo']['coupon_content']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[coupon_content][keywords]\" name=\"SEO[coupon_content][keywords]\" value=\"";
echo $output['seo']['coupon_content']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[coupon_content][description]\" name=\"SEO[coupon_content][description]\" value=\"";
echo $output['seo']['coupon_content']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_coupon.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_point\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{name}</a><a>{key}</a><a>{description}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_point'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[point][title]\" name=\"SEO[point][title]\" value=\"";
echo $output['seo']['point']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[point][keywords]\" name=\"SEO[point][keywords]\" value=\"";
echo $output['seo']['point']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[point][description]\" name=\"SEO[point][description]\" value=\"";
echo $output['seo']['point']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_point_content'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[point_content][title]\" name=\"SEO[point_content][title]\" value=\"";
echo $output['seo']['point_content']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[point_content][title]\" name=\"SEO[point_content][keywords]\" value=\"";
echo $output['seo']['point_content']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[point_content][title]\" name=\"SEO[point_content][description]\" value=\"";
echo $output['seo']['point_content']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_point.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_article\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{article_class}</a><a>{name}</a><a>{key}</a><a>{description}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_atricle_list'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[article][title]\" name=\"SEO[article][title]\" value=\"";
echo $output['seo']['article']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[article][keywords]\" name=\"SEO[article][keywords]\" value=\"";
echo $output['seo']['article']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[article][description]\" name=\"SEO[article][description]\" value=\"";
echo $output['seo']['article']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_atricle_content'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[article_content][title]\" name=\"SEO[article_content][title]\" value=\"";
echo $output['seo']['article_content']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[article_content][keywords]\" name=\"SEO[article_content][keywords]\" value=\"";
echo $output['seo']['article_content']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[article_content][description]\" name=\"SEO[article_content][description]\" value=\"";
echo $output['seo']['article_content']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_article.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_shop\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{shopname}</a><a>{key}</a><a>{description}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_shop'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[shop][title]\" name=\"SEO[shop][title]\" value=\"";
echo $output['seo']['shop']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[shop][keywords]\" name=\"SEO[shop][keywords]\" value=\"";
echo $output['seo']['shop']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[shop][description]\" name=\"SEO[shop][description]\" value=\"";
echo $output['seo']['shop']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_shop.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n  <form method=\"post\" name=\"form_product\" action=\"index.php?act=setting&op=seo_setting\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{name}</a><a>{key}</a><a>{description}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_product'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"SEO[product][title]\" name=\"SEO[product][title]\" value=\"";
echo $output['seo']['product']['title'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"SEO[product][keywords]\" name=\"SEO[product][keywords]\" value=\"";
echo $output['seo']['product']['keywords'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"SEO[product][desciption]\" name=\"SEO[product][description]\" value=\"";
echo $output['seo']['product']['description'];
echo "\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_product.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>  \r\n  <form method=\"post\" name=\"form_category\" action=\"index.php?act=setting&op=seo_category\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <span style=\"display:none\" nctype=\"hide_tag\"><a>{sitename}</a><a>{name}</a></span>\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['seo_set_category'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">";
echo $lang['seo_set_category'];
echo "</td><td>\r\n          <select name=\"category\" id=\"category\">\r\n          <option value=\"\">";
echo $lang['nc_common_pselect'];
echo "</option>\r\n          ";
foreach ( ( array )$output['category'] as $key => $value )
{
		echo "          \t";
		if ( $value['gc_parent_id'] != 0 )
		{
				break;
		}
		echo "          \t<option value=\"";
		echo $value['gc_id'];
		echo "\">1 ";
		echo $value['gc_name'];
		echo "</option>\r\n\t          \t";
		foreach ( ( array )explode( ",", $value['child'] ) as $value1 )
		{
				echo "\t          \t\t<option value=\"";
				echo $output['category'][$value1]['gc_id'];
				echo "\">&nbsp;&nbsp;&nbsp;&nbsp;2 ";
				echo $output['category'][$value1]['gc_name'];
				echo "</option>\r\n\t\t\t          \t";
				foreach ( ( array )explode( ",", $output['category'][$value1]['child'] ) as $value2 )
				{
						echo "\t\t\t          \t\t<option value=\"";
						echo $output['category'][$value2]['gc_id'];
						echo "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 ";
						echo $output['category'][$value2]['gc_name'];
						echo "</option>\r\n\t\t\t          \t";
				}
				echo "\t          \t";
		}
		echo "          ";
}
echo "          </select>\r\n          </td>\r\n        </tr>        \r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">title</td><td><input id=\"cate_title\" name=\"cate_title\" value=\"\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">keywords</td><td><input id=\"cate_keywords\" name=\"cate_keywords\" value=\"\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"w96\">description</td><td><input id=\"cate_description\" name=\"cate_description\" value=\"\" class=\"w300\" type=\"text\" /></td>\r\n        </tr>       \r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"document.form_category.submit()\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n\t<div id=\"tag_tips\">\r\n\t<span class=\"dialog_title\">";
echo $lang['seo_set_insert_tips'];
echo "</span>\r\n\t<div style=\"margin: 0px; padding: 0px;line-height:25px;\"></div>\r\n\t</div>\r\n</div>\r\n<script type=\"text/javascript\">\r\n\$(function(){\r\n\t\$('.tab-base').find('a').bind('click',function(){\r\n\t\t\$(\"#tag_tips\").css('display','none');\r\n\t\t\$('.tab-base').find('a').removeClass('current');\r\n\t\t\$(this).addClass('current');\r\n\t\t\$('form').css('display','none');\r\n\t\t\$('form[name=\"form_'+\$(this).attr('nctype')+'\"]').css('display','');\r\n\t\tif (\$(this).attr('nctype') == 'rewrite'){\r\n\t\t\t\$('#prompt').css('display','none');\r\n\t\t}else{\r\n\t\t\t\$('#prompt').css('display','');\r\n\t\t}\r\n\t\t\$('span[nctype=\"hide_tag\"]').find('a').css('padding-left','5px');\r\n\t\t\$(\"#tag_tips>div\").html(\$('form[name=\"form_'+\$(this).attr('nctype')+'\"]').find('span').html());\r\n\t\t\$(\"#tag_tips\").find('a').css('cursor','pointer');\r\n\t\t\$(\"#tag_tips\").find('a').bind('click',function(){\r\n\t\t\tvar value = \$(CUR_INPUT).val();\r\n\t\t\tif(value.indexOf(\$(this).html())<0 ){\r\n\t\t\t\t\$(CUR_INPUT).val(value+\$(this).html());\r\n\t\t\t}\r\n\t\t});\r\n\t});\r\n\t\$('input[type=\"text\"]').bind('focus',function(){\r\n\t\tCUR_INPUT = this;\r\n\t\t//定位弹出层的坐标\r\n\t\tvar pos = \$(this).position();\r\n\t\tvar pos_x = pos.left+370;\r\n\t\tvar pos_y = pos.top-20;\r\n\t\t\$(\"#tag_tips\").css({'left' : pos_x, 'top' : pos_y,'position' : 'absolute','display' : 'block'});\r\n\t});\r\n\r\n\t\$('form').css('display','none');\r\n\t\$('form[name=\"form_rewrite\"]').css('display','');\r\n\t\$('#prompt').css('display','none');\r\n\r\n\t\$('#category').bind('change',function(){\r\n\t\t\$.getJSON('index.php?act=setting&op=ajax_category&id='+\$(this).val(), function(data){\r\n\t\t\tif(data){\r\n\t\t\t\t\$('#cate_title').val(data.gc_title);\r\n\t\t\t\t\$('#cate_keywords').val(data.gc_keywords);\r\n\t\t\t\t\$('#cate_description').val(data.gc_description);\r\n\t\t\t}else{\r\n\t\t\t\t\$('#cate_title').val('');\r\n\t\t\t\t\$('#cate_keywords').val('');\r\n\t\t\t\t\$('#cate_description').val('');\t\t\t\r\n\t\t\t}\r\n\t\t});\r\n\t});\r\n\t\$('#toggmore').bind('click',function(){\r\n\t\t\$('li[nctype=\"vmore\"]').toggle();\r\n\t});\r\n\t\$('li[nctype=\"vmore\"]').hide();\r\n\r\n});\r\n</script>\r\n<style>\r\n#tag_tips{\r\n\tpadding:4px;border-radius: 2px 2px 2px 2px;box-shadow: 0 0 4px rgba(0, 0, 0, 0.75);display:none;padding: 4px;width:300px;z-index:9999;background-color:#FFFFFF;\r\n}\r\n.dialog_title {\r\n    background-color: #F2F2F2;\r\n    border-bottom: 1px solid #EAEAEA;\r\n    color: #666666;\r\n    display: block;\r\n    font-weight: bold;\r\n    line-height: 14px;\r\n    padding: 5px;\r\n}\r\n</style>";
?>
