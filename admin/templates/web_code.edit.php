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
echo "<style type=\"text/css\">\r\nh3.dialog_head {\r\n\tmargin: 0 !important;\r\n}\r\n.dialog_content {\r\n\twidth: 610px;\r\n\tpadding: 0 15px 15px 15px !important;\r\n\toverflow: hidden;\r\n}\r\n</style>\r\n<script type=\"text/javascript\">\r\nvar SITE_URL = \"";
echo SiteUrl;
echo "\";\r\n</script>\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['web_config_index'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=web_config&op=web_config\"><span>";
echo $lang['nc_manage'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=web_config&op=web_edit&web_id=";
echo $_GET['web_id'];
echo "\"><span>";
echo $lang['web_config_web_edit'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['web_config_code_edit'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <table class=\"tb-type1 noborder\">\r\n    <tbody>\r\n      <tr>\r\n        <th><label>";
echo $lang['web_config_web_name'];
echo ":</label></th>\r\n        <td><label>";
echo $output['web_array']['web_name'];
echo "</label></td>\r\n        <th><label>";
echo $lang['web_config_style_name'];
echo ":</label></th>\r\n        <td><label>";
echo $output['style_array'][$output['web_array']['style_name']];
echo "</label></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['web_config_edit_help1'];
echo "</li>\r\n            <li>";
echo $lang['web_config_edit_help2'];
echo "</li>\r\n            <li>";
echo $lang['web_config_edit_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <table class=\"table tb-type2 nohover\">\r\n    <tbody>\r\n      <tr>\r\n        <td colspan=\"2\" class=\"required\"><label>";
echo $lang['web_config_edit_html'].$lang['nc_colon'];
echo "</label></td>\r\n      </tr>\r\n      <tr class=\"noborder\">\r\n        <td colspan=\"2\" class=\"vatop\"><div class=\"home-templates-board-layout\">\r\n            <div class=\"left\">\r\n              <dl>\r\n                <dt>\r\n                  <h4>";
echo $lang['web_config_picture_tit'];
echo "</h4>\r\n                  <a href=\"JavaScript:show_dialog('upload_tit');\">";
echo $lang['nc_edit'];
echo "</a></dt>\r\n                <dd class=\"tit-pic\">\r\n                  <div id=\"picture_tit\" class=\"picture\">\r\n                    ";
if ( !empty( $output['code_tit']['code_info']['pic'] ) )
{
		echo "                    <img src=\"";
		echo SiteUrl."/".$output['code_tit']['code_info']['pic'];
		echo "\"/>\r\n                    ";
}
echo "                  </div>\r\n                </dd>\r\n              </dl>\r\n              <dl>\r\n                <dt>\r\n                  <h4>";
echo $lang['web_config_edit_category'];
echo "</h4>\r\n                  <a href=\"JavaScript:show_dialog('category_list');\">";
echo $lang['nc_edit'];
echo "</a></dt>\r\n                <dd class=\"category-list\">\r\n                  ";
if ( is_array( $output['code_category_list']['code_info'] ) && !empty( $output['code_category_list']['code_info'] ) )
{
		echo "                  ";
		foreach ( $output['code_category_list']['code_info'] as $key => $val )
		{
				echo "                  <dl>\r\n                    <dt title=\"";
				echo $val['gc_parent']['gc_name'];
				echo "\">";
				echo $val['gc_parent']['gc_name'];
				echo "</dt>\r\n                    ";
				if ( is_array( $val['goods_class'] ) && !empty( $val['goods_class'] ) )
				{
						echo "                    ";
						foreach ( $val['goods_class'] as $k => $v )
						{
								echo "                    <dd title=\"";
								echo $v['gc_name'];
								echo "\">";
								echo $v['gc_name'];
								echo "</dd>\r\n                    ";
						}
						echo "                    ";
				}
				echo "                  </dl>\r\n                  ";
		}
		echo "                  ";
}
else
{
		echo "                  <dl>\r\n                    <dt>";
		echo $lang['web_config_category_name'];
		echo "</dt>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                  </dl>\r\n                  <dl>\r\n                    <dt>";
		echo $lang['web_config_category_name'];
		echo "</dt>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                  </dl>\r\n                  <dl>\r\n                    <dt>";
		echo $lang['web_config_category_name'];
		echo "</dt>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                    <dd>";
		echo $lang['web_config_gc_name'];
		echo "</dd>\r\n                  </dl>\r\n                  ";
}
echo "                </dd>\r\n              </dl>\r\n              <dl>\r\n                <dt>\r\n                  <h4>";
echo $lang['web_config_picture_act'];
echo "</h4>\r\n                  <a href=\"JavaScript:show_dialog('upload_act');\">";
echo $lang['nc_edit'];
echo "</a></dt>\r\n                <dd class=\"act-pic\">\r\n                  <div id=\"picture_act\" class=\"picture\">\r\n                    ";
if ( $output['code_act']['code_info']['type'] == "adv" && 0 < $output['code_act']['code_info']['ap_id'] )
{
		echo "                    <script type=\"text/javascript\" src=\"";
		echo SiteUrl;
		echo "/api.php?act=adv&op=advshow&ap_id=";
		echo $output['code_act']['code_info']['ap_id'];
		echo "\"></script>\r\n                    ";
}
else
{
		echo "                    <img src=\"";
		echo SiteUrl."/".$output['code_act']['code_info']['pic'];
		echo "\"/>\r\n                    ";
}
echo "                  </div>\r\n                </dd>\r\n              </dl>\r\n            </div>\r\n            <div class=\"middle\">\r\n              ";
if ( is_array( $output['code_recommend_list']['code_info'] ) && !empty( $output['code_recommend_list']['code_info'] ) )
{
		echo "              ";
		foreach ( $output['code_recommend_list']['code_info'] as $key => $val )
		{
				echo "              <dl recommend_id=\"";
				echo $key;
				echo "\">\r\n                <dt>\r\n                  <h4>";
				echo $val['recommend']['name'];
				echo "</h4>\r\n                  ";
				if ( 1 < $key )
				{
						echo "                  <a href=\"JavaScript:del_recommend(";
						echo $key;
						echo ");\">";
						echo $lang['nc_del'];
						echo "</a>\r\n                  ";
				}
				echo "                  <a href=\"JavaScript:show_recommend_dialog(";
				echo $key;
				echo ");\">";
				echo $lang['nc_edit'];
				echo "</a></dt>\r\n                <dd>\r\n                  <ul class=\"goods-list\">\r\n                    ";
				if ( !empty( $val['goods_list'] ) || is_array( $val['goods_list'] ) )
				{
						echo "                    ";
						foreach ( $val['goods_list'] as $k => $v )
						{
								echo "                    <li>\r\n                      <div class=\"goods-pic\"><span class=\"thumb size-106x106\"><i></i><img title=\"";
								echo $v['goods_name'];
								echo "\" src=\"";
								echo strpos( $v['goods_pic'], "http" ) === 0 ? $v['goods_pic'] : SiteUrl."/".$v['goods_pic'];
								echo "\" onload=\"javascript:DrawImage(this,106,106);\" /></span></div>\r\n                    </li>\r\n                    ";
						}
						echo "                    ";
				}
				echo "                  </ul>\r\n                </dd>\r\n              </dl>\r\n              ";
		}
		echo "              ";
}
echo "              <div class=\"add-tab\" id=\"btn_add_list\"><a class=\"btn-add-nofloat\" href=\"JavaScript:add_recommend();\">";
echo $lang['web_config_add_recommend'];
echo "</a>";
echo $lang['web_config_recommend_max'];
echo "</div>\r\n            </div>\r\n            <div class=\"right\">\r\n              <dl id=\"goods_order_list\">\r\n                <dt>\r\n                  <h4>";
echo !empty( $output['code_goods_list']['code_info']['name'] ) ? $output['code_goods_list']['code_info']['name'] : $lang['web_config_goods_order'];
echo "</h4>\r\n                  <a href=\"JavaScript:show_dialog('goods_list');\">";
echo $lang['nc_edit'];
echo "</a></dt>\r\n                <dd class=\"top-list\">\r\n                  <ol>\r\n                    ";
if ( !empty( $output['code_goods_list']['code_info']['goods'] ) || is_array( $output['code_goods_list']['code_info']['goods'] ) )
{
		$i = 0;
		echo "                    ";
		foreach ( $output['code_goods_list']['code_info']['goods'] as $k => $v )
		{
				++$i;
				echo "                    ";
				if ( $i <= 3 )
				{
						echo "                    <li class=\"goods-list\">\r\n                      <div class=\"goods-pic\"> <img select_goods_id=\"";
						echo $v['goods_id'];
						echo "\" title=\"";
						echo $v['goods_name'];
						echo "\" src=\"";
						echo strpos( $v['goods_pic'], "http" ) === 0 ? $v['goods_pic'] : SiteUrl."/".$v['goods_pic'];
						echo "\" onload=\"javascript:DrawImage(this,60,60);\" /></div>\r\n                      <div class=\"goods-name\">";
						echo $v['goods_name'];
						echo "</div>\r\n                      <div class=\"goods-price\"><em>";
						echo $v['goods_price'];
						echo "</em></div>\r\n                    </li>\r\n                    ";
				}
				else
				{
						echo "                    <li>";
						echo $v['goods_name'];
						echo "</li>\r\n                    ";
				}
				echo "                    ";
		}
		echo "                    ";
}
else
{
		echo "                    <li>\r\n                      <div class=\"goods-pic\"></div>\r\n                      <div class=\"goods-name\">";
		echo $lang['web_config_goods_name'];
		echo "</div>\r\n                      <div class=\"goods-price\">";
		echo $lang['web_config_goods_price'];
		echo "</div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"goods-pic\"></div>\r\n                      <div class=\"goods-name\">";
		echo $lang['web_config_goods_name'];
		echo "</div>\r\n                      <div class=\"goods-price\">";
		echo $lang['web_config_goods_price'];
		echo "</div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"goods-pic\"></div>\r\n                      <div class=\"goods-name\">";
		echo $lang['web_config_goods_name'];
		echo "</div>\r\n                      <div class=\"goods-price\">";
		echo $lang['web_config_goods_price'];
		echo "</div>\r\n                    </li>\r\n                    <li>";
		echo $lang['web_config_goods_name'];
		echo "</li>\r\n                    <li>";
		echo $lang['web_config_goods_name'];
		echo "</li>\r\n                    <li>";
		echo $lang['web_config_goods_name'];
		echo "</li>\r\n                    <li>";
		echo $lang['web_config_goods_name'];
		echo "</li>\r\n                    ";
}
echo "                  </ol>\r\n                </dd>\r\n              </dl>\r\n              <dl>\r\n                <dt>\r\n                  <h4>";
echo $lang['web_config_picture_adv'];
echo "</h4>\r\n                  <a href=\"JavaScript:show_dialog('upload_adv');\">";
echo $lang['nc_edit'];
echo "</a></dt>\r\n                <dd class=\"adv-pic\">\r\n                  <div id=\"picture_adv\" class=\"picture\">\r\n                    ";
if ( $output['code_adv']['code_info']['type'] == "adv" && 0 < $output['code_adv']['code_info']['ap_id'] )
{
		echo "                    <script type=\"text/javascript\" src=\"";
		echo SiteUrl;
		echo "/api.php?act=adv&op=advshow&ap_id=";
		echo $output['code_adv']['code_info']['ap_id'];
		echo "\"></script>\r\n                    ";
}
else
{
		echo "                    <img src=\"";
		echo SiteUrl."/".$output['code_adv']['code_info']['pic'];
		echo "\"/>\r\n                    ";
}
echo "                  </div>\r\n                </dd>\r\n              </dl>\r\n            </div>\r\n            <div class=\"bottom\">\r\n              <dl>\r\n                <dt>\r\n                  <h4>";
echo $lang['web_config_brand_list'];
echo "</h4>\r\n                  <a href=\"JavaScript:show_dialog('brand_list');\">";
echo $lang['nc_edit'];
echo "</a></dt>\r\n                </dt>\r\n                <dd>\r\n                  <ul class=\"brands\">\r\n                    ";
if ( is_array( $output['code_brand_list']['code_info'] ) && !empty( $output['code_brand_list']['code_info'] ) )
{
		echo "                    ";
		foreach ( $output['code_brand_list']['code_info'] as $key => $val )
		{
				echo "                    <li>\r\n                      <div class=\"picture\"> <img width=\"88\" height=\"44\" title=\"";
				echo $val['brand_name'];
				echo "\" src=\"";
				echo SiteUrl."/".$val['brand_pic'];
				echo "\" onload=\"javascript:DrawImage(this,88,44);\" /> </div>\r\n                    </li>\r\n                    ";
		}
		echo "                    ";
}
else
{
		echo "                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    <li>\r\n                      <div class=\"picture\"></div>\r\n                    </li>\r\n                    ";
}
echo "                  </ul>\r\n                </dd>\r\n              </dl>\r\n            </div>\r\n          </div></td>\r\n      </tr>\r\n    </tbody>\r\n    <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"2\" ><a href=\"index.php?act=web_config&op=web_html&web_id=";
echo $_GET['web_id'];
echo "\" class=\"btn\" id=\"submitBtn\"><span>";
echo $lang['web_config_web_html'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n  </table>\r\n</div>\r\n\r\n<!-- 标题图片 -->\r\n<div id=\"upload_tit_dialog\" style=\"display:none;\">\r\n  <table class=\"table tb-type2\">\r\n    <tbody>\r\n      <tr class=\"space odd\" id=\"prompt\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['web_config_prompt_tit'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"upload_tit_form\" name=\"upload_tit_form\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php?act=web_api&op=upload_pic\" target=\"upload_pic\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_tit']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_tit']['code_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"tit[pic]\" value=\"";
echo $output['code_tit']['code_info']['pic'];
echo "\">\r\n    <table class=\"table tb-type2\">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['web_config_upload_tit'].$lang['nc_colon'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type='text' name='textfield' id='textfield1' class='type-file-text' />\r\n            <input type='button' name='button' id='button1' value='' class='type-file-button' />\r\n            <input name=\"pic\" id=\"pic\" type=\"file\" class=\"type-file-file\" size=\"30\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_tit_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['web_config_upload_url'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"tit[url]\" value=\"";
echo !empty( $output['code_tit']['code_info']['url'] ) ? $output['code_tit']['code_info']['url'] : SiteUrl;
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_url_tips'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"15\" ><a href=\"JavaScript:void(0);\" onclick=\"\$('#upload_tit_form').submit();\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<!-- 推荐分类模块 -->\r\n<div id=\"category_list_dialog\" style=\"display:none;\">\r\n  <div class=\"dialog-handle\">\r\n    <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_category_title'];
echo "</h4>\r\n    <p><span class=\"handle\">\r\n      <select name=\"gc_parent_id\" id=\"gc_parent_id\" class=\" w200\" onchange=\"get_goods_class();\">\r\n        <option value=\"0\">-";
echo $lang['nc_please_choose'];
echo "-</option>\r\n        ";
if ( !empty( $output['parent_goods_class'] ) || is_array( $output['parent_goods_class'] ) )
{
		echo "        ";
		foreach ( $output['parent_goods_class'] as $k => $v )
		{
				echo "        <option value=\"";
				echo $v['gc_id'];
				echo "\">";
				echo $v['gc_name'];
				echo "</option>\r\n        ";
		}
		echo "        ";
}
echo "      </select>\r\n      </span> <span class=\"note\">";
echo $lang['web_config_category_note'];
echo "</span></p>\r\n  </div>\r\n  <form id=\"category_list_form\">\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_category_list']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_category_list']['code_id'];
echo "\">\r\n      <div class=\"s-tips\"><i></i>";
echo $lang['web_config_category_tips'];
echo "</div>\r\n    <div class=\"category-list category-list-edit\">\r\n      ";
if ( is_array( $output['code_category_list']['code_info'] ) && !empty( $output['code_category_list']['code_info'] ) )
{
		echo "      ";
		foreach ( $output['code_category_list']['code_info'] as $key => $val )
		{
				echo "      <dl>\r\n        <dt select_class_id=\"";
				echo $val['gc_parent']['gc_id'];
				echo "\" title=\"";
				echo $val['gc_parent']['gc_name'];
				echo "\" ondblclick=\"del_gc_parent(";
				echo $val['gc_parent']['gc_id'];
				echo ");\">\r\n        \t<i onclick=\"del_gc_parent(";
				echo $val['gc_parent']['gc_id'];
				echo ");\"></i>";
				echo $val['gc_parent']['gc_name'];
				echo "</dt>\r\n        <div class=\"clear\"></div>\r\n        <input name=\"category_list[";
				echo $val['gc_parent']['gc_id'];
				echo "][gc_parent][gc_id]\" value=\"";
				echo $val['gc_parent']['gc_id'];
				echo "\" type=\"hidden\">\r\n        <input name=\"category_list[";
				echo $val['gc_parent']['gc_id'];
				echo "][gc_parent][gc_name]\" value=\"";
				echo $val['gc_parent']['gc_name'];
				echo "\" type=\"hidden\">\r\n        ";
				if ( !empty( $val['goods_class'] ) || is_array( $val['goods_class'] ) )
				{
						echo "        ";
						foreach ( $val['goods_class'] as $k => $v )
						{
								echo "        <dd gc_id=\"";
								echo $v['gc_id'];
								echo "\" title=\"";
								echo $v['gc_name'];
								echo "\" ondblclick=\"del_goods_class(";
								echo $v['gc_id'];
								echo ");\">\r\n        \t<i onclick=\"del_goods_class(";
								echo $v['gc_id'];
								echo ");\"></i>";
								echo $v['gc_name'];
								echo "          <input name=\"category_list[";
								echo $val['gc_parent']['gc_id'];
								echo "][goods_class][";
								echo $v['gc_id'];
								echo "][gc_id]\" value=\"";
								echo $v['gc_id'];
								echo "\" type=\"hidden\">\r\n          <input name=\"category_list[";
								echo $val['gc_parent']['gc_id'];
								echo "][goods_class][";
								echo $v['gc_id'];
								echo "][gc_name]\" value=\"";
								echo $v['gc_name'];
								echo "\" type=\"hidden\">\r\n        </dd>\r\n        ";
						}
						echo "        ";
				}
				echo "      </dl>\r\n      ";
		}
		echo "      ";
}
echo "    </div>\r\n    <a href=\"JavaScript:void(0);\" onclick=\"update_category();\" class=\"btn ml30\"><span>";
echo $lang['web_config_save'];
echo "</span></a>\r\n  </form>\r\n</div>\r\n<!-- 活动图片 -->\r\n<div id=\"upload_act_dialog\" class=\"upload_act_dialog\" style=\"display:none;\">\r\n  <table class=\"table tb-type2\">\r\n    <tbody>\r\n      <tr class=\"space odd\" id=\"prompt\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['web_config_prompt_act'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"upload_act_form\" name=\"upload_act_form\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php?act=web_api&op=upload_pic\" target=\"upload_pic\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_act']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_act']['code_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"act[pic]\" value=\"";
echo $output['code_act']['code_info']['pic'];
echo "\">\r\n\t  <table class=\"table tb-type2\" id=\"upload_adv_type\">\r\n\t    <tbody>\r\n\t      <tr>\r\n\t        <td colspan=\"2\" class=\"required\">";
echo $lang['web_config_upload_type'].$lang['nc_colon'];
echo "\t          </td>\r\n\t      </tr>\r\n\t      <tr class=\"noborder\">\r\n\t        <td class=\"vatop rowform\">\r\n\t        \t<label title=\"";
echo $lang['web_config_upload_pic'];
echo "\">\r\n\t        \t\t<input type=\"radio\" name=\"act[type]\" value=\"pic\" onclick=\"adv_type('act');\" ";
if ( $output['code_act']['code_info']['type'] != "adv" )
{
		echo "checked=\"checked\"";
}
echo ">\r\n\t        \t<span>";
echo $lang['web_config_upload_pic'];
echo "</span></label>\r\n\t          <label title=\"";
echo $lang['web_config_upload_adv'];
echo "\">\r\n\t          \t<input type=\"radio\" name=\"act[type]\" value=\"adv\" onclick=\"adv_type('act');\" ";
if ( $output['code_act']['code_info']['type'] == "adv" )
{
		echo "checked=\"checked\"";
}
echo ">\r\n\t          \t<span>";
echo $lang['web_config_upload_adv'];
echo "</span></label>\r\n\t        </td>\r\n\t        <td class=\"vatop tips\"></td>\r\n\t      </tr>\r\n\t  </tbody>\r\n\t  </table>\r\n    <table class=\"table tb-type2\" id=\"upload_act_type_pic\" ";
if ( $output['code_act']['code_info']['type'] == "adv" )
{
		echo "style=\"display:none;\"";
}
echo ">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['web_config_upload_act'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type='text' name='textfield' id='textfield1' class='type-file-text' />\r\n            <input type='button' name='button' id='button1' value='' class='type-file-button' />\r\n            <input name=\"pic\" id=\"pic\" type=\"file\" class=\"type-file-file\" size=\"30\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_act_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['web_config_upload_url'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"act[url]\" value=\"";
echo !empty( $output['code_act']['code_info']['url'] ) ? $output['code_act']['code_info']['url'] : SiteUrl;
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_act_url'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n    <table class=\"table tb-type2\" id=\"upload_act_type_adv\" ";
if ( $output['code_act']['code_info']['type'] != "adv" )
{
		echo "style=\"display:none;\"";
}
echo ">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n\t\t        <select name=\"act[ap_id]\" class=\"w200\">\r\n\t\t          <option value=\"0\">-";
echo $lang['nc_please_choose'];
echo "-</option>\r\n\t\t          ";
if ( !empty( $output['act_adv_list'] ) || is_array( $output['act_adv_list'] ) )
{
		echo "\t\t          ";
		foreach ( $output['act_adv_list'] as $k => $v )
		{
				echo "\t\t          <option value=\"";
				echo $v['ap_id'];
				echo "\" ";
				if ( $output['code_act']['code_info']['ap_id'] == $v['ap_id'] )
				{
						echo "selected";
				}
				echo ">";
				echo $v['ap_name'];
				echo "</option>\r\n\t\t          ";
		}
		echo "\t\t          ";
}
echo "\t\t        </select>\r\n          \t</td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_act_adv'];
echo "</td>\r\n        </tr>\r\n\t  \t</tbody>\r\n    </table>\r\n    <a href=\"JavaScript:void(0);\" onclick=\"\$('#upload_act_form').submit();\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a>\r\n  </form>\r\n</div>\r\n<!-- 商品推荐模块 -->\r\n<div id=\"recommend_list_dialog\" style=\"display:none;\">\r\n  <form id=\"recommend_list_form\">\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_recommend_list']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_recommend_list']['code_id'];
echo "\">\r\n    ";
if ( is_array( $output['code_recommend_list']['code_info'] ) && !empty( $output['code_recommend_list']['code_info'] ) )
{
		echo "    ";
		foreach ( $output['code_recommend_list']['code_info'] as $key => $val )
		{
				echo "    <dl select_recommend_id=\"";
				echo $key;
				echo "\">\r\n      <dt>\r\n        <h4 class=\"dialog-handle-title\">";
				echo $lang['web_config_recommend_title'];
				echo "</h4>\r\n        <div class=\"dialog-handle-box\"><span class=\"left\">\r\n          <input name=\"recommend_list[";
				echo $key;
				echo "][recommend][name]\" value=\"";
				echo $val['recommend']['name'];
				echo "\" type=\"text\" class=\"w200\">\r\n          </span><span class=\"right\">";
				echo $lang['web_config_recommend_tips'];
				echo "</span>\r\n          <div class=\"clear\"></div>\r\n        </div>\r\n      </dt>\r\n      <dd>\r\n        <h4 class=\"dialog-handle-title\">";
				echo $lang['web_config_recommend_goods'];
				echo "</h4>\r\n          <div class=\"s-tips\"><i></i>";
				echo $lang['web_config_recommend_goods_tips'];
				echo "</div>\r\n        <ul class=\"dialog-goodslist-s1 goods-list\">\r\n          ";
				if ( !empty( $val['goods_list'] ) || is_array( $val['goods_list'] ) )
				{
						echo "          ";
						foreach ( $val['goods_list'] as $k => $v )
						{
								echo "          <li>\r\n            <div ondblclick=\"del_recommend_goods(";
								echo $v['goods_id'];
								echo ");\" class=\"goods-pic\">\r\n            <span class=\"ac-ico\" onclick=\"del_recommend_goods(";
								echo $v['goods_id'];
								echo ");\"></span> <span class=\"thumb size-72x72\"><i></i><img select_goods_id=\"";
								echo $v['goods_id'];
								echo "\" title=\"";
								echo $v['goods_name'];
								echo "\" src=\"";
								echo strpos( $v['goods_pic'], "http" ) === 0 ? $v['goods_pic'] : SiteUrl."/".$v['goods_pic'];
								echo "\" onload=\"javascript:DrawImage(this,72,72);\" /></span></div>\r\n            <div class=\"goods-name\"><a href=\"";
								echo SiteUrl."/index.php?act=goods&goods_id=".$v['goods_id']."&id=".$v['store_id'];
								echo "\" target=\"_blank\">";
								echo $v['goods_name'];
								echo "</a></div>\r\n            <input name=\"recommend_list[";
								echo $key;
								echo "][goods_list][";
								echo $v['goods_id'];
								echo "][goods_id]\" value=\"";
								echo $v['goods_id'];
								echo "\" type=\"hidden\">\r\n            <input name=\"recommend_list[";
								echo $key;
								echo "][goods_list][";
								echo $v['goods_id'];
								echo "][store_id]\" value=\"";
								echo $v['store_id'];
								echo "\" type=\"hidden\">\r\n            <input name=\"recommend_list[";
								echo $key;
								echo "][goods_list][";
								echo $v['goods_id'];
								echo "][goods_name]\" value=\"";
								echo $v['goods_name'];
								echo "\" type=\"hidden\">\r\n            <input name=\"recommend_list[";
								echo $key;
								echo "][goods_list][";
								echo $v['goods_id'];
								echo "][goods_price]\" value=\"";
								echo $v['goods_price'];
								echo "\" type=\"hidden\">\r\n            <input name=\"recommend_list[";
								echo $key;
								echo "][goods_list][";
								echo $v['goods_id'];
								echo "][goods_pic]\" value=\"";
								echo $v['goods_pic'];
								echo "\" type=\"hidden\">\r\n          </li>\r\n          ";
						}
						echo "          ";
				}
				echo "        </ul>\r\n      </dd>\r\n    </dl>\r\n    ";
		}
		echo "    ";
}
echo "    <div id=\"add_recommend_list\" style=\"display:none;\"></div>\r\n    <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_recommend_add_goods'];
echo "</h4>\r\n    <div class=\"dialog-show-box\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label>";
echo $lang['web_config_recommend_gcategory'];
echo "</label></th>\r\n          <td class=\"dialog-select-bar\" id=\"recommend_gcategory\">\r\n\t\t        <input type=\"hidden\" id=\"cate_id\" name=\"cate_id\" value=\"0\" class=\"mls_id\" />\r\n\t\t        <input type=\"hidden\" id=\"cate_name\" name=\"cate_name\" value=\"\" class=\"mls_names\" />\r\n\t\t        <select>\r\n\t\t          <option value=\"0\">-";
echo $lang['nc_please_choose'];
echo "-</option>\r\n\t\t          ";
if ( !empty( $output['goods_class'] ) || is_array( $output['goods_class'] ) )
{
		echo "\t\t          ";
		foreach ( $output['goods_class'] as $k => $v )
		{
				echo "\t\t          <option value=\"";
				echo $v['gc_id'];
				echo "\">";
				echo $v['gc_name'];
				echo "</option>\r\n\t\t          ";
		}
		echo "\t\t          ";
}
echo "\t\t        </select>\r\n\t\t      </td>\r\n        </tr>\r\n        <tr>\r\n          <th><label for=\"recommend_goods_name\">";
echo $lang['web_config_recommend_goods_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"\" name=\"recommend_goods_name\" id=\"recommend_goods_name\" class=\"txt\">\r\n\t\t        <a href=\"JavaScript:void(0);\" onclick=\"get_recommend_goods();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\"></a> \r\n          \t</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n      <div id=\"show_recommend_goods_list\" class=\"show-recommend-goods-list\"></div>\r\n      <div class=\"clear\"></div>\r\n    </div>\r\n    <div class=\"clear\"></div>\r\n    <a href=\"JavaScript:void(0);\" onclick=\"update_recommend();\" class=\"btn\"><span>";
echo $lang['web_config_save'];
echo "</span></a>\r\n  </form>\r\n</div>\r\n<!-- 排行类型模块 -->\r\n<div id=\"goods_list_dialog\" style=\"display:none;\">\r\n  <form id=\"goods_list_form\">\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_goods_list']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_goods_list']['code_id'];
echo "\">\r\n    <dl>\r\n      <dt>\r\n        <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_goods_order_title'];
echo "</h4>\r\n        <div class=\"dialog-handle-box\"><span class=\"left\">\r\n          <input name=\"goods_list[name]\" value=\"";
echo !empty( $output['code_goods_list']['code_info']['name'] ) ? $output['code_goods_list']['code_info']['name'] : $lang['web_config_goods_order'];
echo "\" type=\"text\" class=\"w200\">\r\n          </span><span class=\"right\">";
echo $lang['web_config_goods_order_tips'];
echo "</span>\r\n          <div class=\"clear\"></div>\r\n        </div>\r\n      </dt>\r\n      <dd class=\"top-list\">\r\n        <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_goods_list'];
echo "</h4>\r\n          <div class=\"s-tips\"><i></i>";
echo $lang['web_config_goods_list_tips'];
echo "</div>\r\n        <ul class=\"dialog-goodslist-s3\">\r\n          ";
if ( !empty( $output['code_goods_list']['code_info']['goods'] ) || is_array( $output['code_goods_list']['code_info']['goods'] ) )
{
		echo "          ";
		foreach ( $output['code_goods_list']['code_info']['goods'] as $k => $v )
		{
				echo "          <li>\r\n            <div ondblclick=\"del_goods_order(";
				echo $v['goods_id'];
				echo ");\" class=\"goods-pic\"><span class=\"ac-ico\" onclick=\"del_goods_order(";
				echo $v['goods_id'];
				echo ");\"></span><span class=\"thumb size-64x64\"><i></i><img select_goods_id=\"";
				echo $v['goods_id'];
				echo "\" goods_price=\"";
				echo $v['goods_price'];
				echo "\" title=\"";
				echo $v['goods_name'];
				echo "\" src=\"";
				echo strpos( $v['goods_pic'], "http" ) === 0 ? $v['goods_pic'] : SiteUrl."/".$v['goods_pic'];
				echo "\" onload=\"javascript:DrawImage(this,64,64);\"/></span></div>\r\n            <div class=\"goods-name\"><a href=\"";
				echo SiteUrl."/index.php?act=goods&goods_id=".$v['goods_id']."&id=".$v['store_id'];
				echo "\" target=\"_blank\">";
				echo $v['goods_name'];
				echo "</a></div>\r\n            <input name=\"goods_list[goods][";
				echo $v['goods_id'];
				echo "][goods_id]\" value=\"";
				echo $v['goods_id'];
				echo "\" type=\"hidden\">\r\n            <input name=\"goods_list[goods][";
				echo $v['goods_id'];
				echo "][store_id]\" value=\"";
				echo $v['store_id'];
				echo "\" type=\"hidden\">\r\n            <input name=\"goods_list[goods][";
				echo $v['goods_id'];
				echo "][goods_name]\" value=\"";
				echo $v['goods_name'];
				echo "\" type=\"hidden\">\r\n            <input name=\"goods_list[goods][";
				echo $v['goods_id'];
				echo "][goods_price]\" value=\"";
				echo $v['goods_price'];
				echo "\" type=\"hidden\">\r\n            <input name=\"goods_list[goods][";
				echo $v['goods_id'];
				echo "][goods_pic]\" value=\"";
				echo $v['goods_pic'];
				echo "\" type=\"hidden\">\r\n          </li>\r\n          ";
		}
		echo "          ";
}
echo "        </ul>\r\n      </dd>\r\n    </dl>\r\n    <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_goods_order_add'];
echo "</h4>\r\n    <div class=\"dialog-show-box\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label>";
echo $lang['web_config_goods_order_gcategory'];
echo "</label></th>\r\n          <td colspan=\"3\" class=\"dialog-select-bar\" id=\"gcategory\">\r\n\t\t        <input type=\"hidden\" id=\"cate_id\" name=\"cate_id\" value=\"0\" class=\"mls_id\" />\r\n\t\t        <input type=\"hidden\" id=\"cate_name\" name=\"cate_name\" value=\"\" class=\"mls_names\" />\r\n\t\t        <select>\r\n\t\t          <option value=\"0\">-";
echo $lang['nc_please_choose'];
echo "-</option>\r\n\t\t          ";
if ( !empty( $output['goods_class'] ) || is_array( $output['goods_class'] ) )
{
		echo "\t\t          ";
		foreach ( $output['goods_class'] as $k => $v )
		{
				echo "\t\t          <option value=\"";
				echo $v['gc_id'];
				echo "\">";
				echo $v['gc_name'];
				echo "</option>\r\n\t\t          ";
		}
		echo "\t\t          ";
}
echo "\t\t        </select>\r\n\t\t      </td>\r\n        </tr>\r\n        <tr>\r\n          <th><label>";
echo $lang['web_config_goods_order_type'];
echo "</label></th>\r\n          <td>\r\n          \t<select name=\"goods_order\" id=\"goods_order\">\r\n              <option value=\"salenum\" selected>";
echo $lang['web_config_goods_order_sale'];
echo "</option>\r\n              <option value=\"goods_click\" >";
echo $lang['web_config_goods_order_click'];
echo "</option>\r\n              <option value=\"commentnum\" >";
echo $lang['web_config_goods_order_comment'];
echo "</option>\r\n              <option value=\"goods_collect\" >";
echo $lang['web_config_goods_order_collect'];
echo "</option>\r\n            </select>\r\n          \t</td>\r\n          <th><label for=\"order_goods_name\">";
echo $lang['web_config_goods_order_name'];
echo "</label></th>\r\n          <td><input type=\"text\" value=\"\" name=\"order_goods_name\" id=\"order_goods_name\" class=\"txt\">\r\n\t\t        <a href=\"JavaScript:void(0);\" onclick=\"get_goods_list();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\"></a> \r\n          \t</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n      <div id=\"show_goods_order_list\"></div>\r\n    </div>\r\n    <a href=\"JavaScript:void(0);\" onclick=\"update_goods_order();\" class=\"btn\"><span>";
echo $lang['web_config_save'];
echo "</span></a>\r\n  </form>\r\n</div>\r\n<!-- 品牌模块 -->\r\n<div id=\"brand_list_dialog\" class=\"brand_list_dialog\" style=\"display:none;\">\r\n  <form id=\"brand_list_form\">\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_brand_list']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_brand_list']['code_id'];
echo "\">\r\n    <dd>\r\n      <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_brand_title'];
echo "</h4>\r\n          <div class=\"s-tips\"><i></i>";
echo $lang['web_config_brand_tips'];
echo "</div>\r\n      <ul class=\"brands dialog-brandslist-s1\">\r\n        ";
if ( is_array( $output['code_brand_list']['code_info'] ) && !empty( $output['code_brand_list']['code_info'] ) )
{
		echo "        ";
		foreach ( $output['code_brand_list']['code_info'] as $key => $val )
		{
				echo "        <li>\r\n          <div class=\"brands-pic\"><span class=\"ac-ico\" onclick=\"del_brand(";
				echo $val['brand_id'];
				echo ");\"></span><span class=\"thumb size-68x34\"><i></i><img ondblclick=\"del_brand(";
				echo $val['brand_id'];
				echo ");\" select_brand_id=\"";
				echo $val['brand_id'];
				echo "\" src=\"";
				echo SiteUrl."/".$val['brand_pic'];
				echo "\" onload=\"javascript:DrawImage(this,68,34);\" /></span></div>\r\n          <div class=\"brands-name\">";
				echo $val['brand_name'];
				echo "</div>\r\n          <input name=\"brand_list[";
				echo $val['brand_id'];
				echo "][brand_id]\" value=\"";
				echo $val['brand_id'];
				echo "\" type=\"hidden\">\r\n          <input name=\"brand_list[";
				echo $val['brand_id'];
				echo "][brand_name]\" value=\"";
				echo $val['brand_name'];
				echo "\" type=\"hidden\">\r\n          <input name=\"brand_list[";
				echo $val['brand_id'];
				echo "][brand_pic]\" value=\"";
				echo $val['brand_pic'];
				echo "\" type=\"hidden\">\r\n        </li>\r\n        ";
		}
		echo "        ";
}
echo "      </ul>\r\n    </dd>\r\n    <h4 class=\"dialog-handle-title\">";
echo $lang['web_config_brand_list'];
echo "</h4>\r\n    <div class=\"dialog-show-box\">\r\n    <div id=\"show_brand_list\"></div></div>\r\n    \r\n    <a href=\"JavaScript:void(0);\" onclick=\"update_brand();\" class=\"btn\"><span>";
echo $lang['web_config_save'];
echo "</span></a>\r\n  </form>\r\n</div>\r\n<!-- 广告图片 -->\r\n<div id=\"upload_adv_dialog\" class=\"upload_adv_dialog\" style=\"display:none;\">\r\n  <table class=\"table tb-type2\">\r\n    <tbody>\r\n      <tr class=\"space odd\" id=\"prompt\">\r\n        <th class=\"nobg\" colspan=\"12\"><div class=\"title\">\r\n            <h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n            <span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td><ul>\r\n            <li>";
echo $lang['web_config_upload_adv_tips'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form id=\"upload_adv_form\" name=\"upload_adv_form\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php?act=web_api&op=upload_pic\" target=\"upload_pic\">\r\n    <input type=\"hidden\" name=\"form_submit\" value=\"ok\" />\r\n    <input type=\"hidden\" name=\"web_id\" value=\"";
echo $output['code_adv']['web_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"code_id\" value=\"";
echo $output['code_adv']['code_id'];
echo "\">\r\n    <input type=\"hidden\" name=\"adv[pic]\" value=\"";
echo $output['code_adv']['code_info']['pic'];
echo "\">\r\n\t  <table class=\"table tb-type2\" id=\"upload_adv_type\">\r\n\t    <tbody>\r\n\t      <tr>\r\n\t        <td colspan=\"2\" class=\"required\">";
echo $lang['web_config_upload_type'].$lang['nc_colon'];
echo "\t          </td>\r\n\t      </tr>\r\n\t      <tr class=\"noborder\">\r\n\t        <td class=\"vatop rowform\">\r\n\t        \t<label title=\"";
echo $lang['web_config_upload_pic'];
echo "\">\r\n\t        \t\t<input type=\"radio\" name=\"adv[type]\" value=\"pic\" onclick=\"adv_type('adv');\" ";
if ( $output['code_adv']['code_info']['type'] != "adv" )
{
		echo "checked=\"checked\"";
}
echo ">\r\n\t        \t<span>";
echo $lang['web_config_upload_pic'];
echo "</span></label>\r\n\t          <label title=\"";
echo $lang['web_config_upload_adv'];
echo "\">\r\n\t          \t<input type=\"radio\" name=\"adv[type]\" value=\"adv\" onclick=\"adv_type('adv');\" ";
if ( $output['code_adv']['code_info']['type'] == "adv" )
{
		echo "checked=\"checked\"";
}
echo ">\r\n\t          \t<span>";
echo $lang['web_config_upload_adv'];
echo "</span></label>\r\n\t        </td>\r\n\t        <td class=\"vatop tips\"></td>\r\n\t      </tr>\r\n\t  </tbody>\r\n\t  </table>\r\n    <table class=\"table tb-type2\" id=\"upload_adv_type_pic\" ";
if ( $output['code_adv']['code_info']['type'] == "adv" )
{
		echo "style=\"display:none;\"";
}
echo ">\r\n      <tbody>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\">";
echo $lang['web_config_upload_adv_pic'].$lang['nc_colon'];
echo "</td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><span class=\"type-file-box\">\r\n            <input type='text' name='textfield' id='textfield1' class='type-file-text' />\r\n            <input type='button' name='button' id='button1' value='' class='type-file-button' />\r\n            <input name=\"pic\" id=\"pic\" type=\"file\" class=\"type-file-file\" size=\"30\">\r\n            </span></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_pic_tips'];
echo "</td>\r\n        </tr>\r\n        <tr>\r\n          <td colspan=\"2\" class=\"required\"><label>";
echo $lang['web_config_upload_adv_url'].$lang['nc_colon'];
echo "</label></td>\r\n        </tr>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\"><input name=\"adv[url]\" value=\"";
echo !empty( $output['code_adv']['code_info']['url'] ) ? $output['code_adv']['code_info']['url'] : SiteUrl;
echo "\" class=\"txt\" type=\"text\"></td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_upload_pic_url_tips'];
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n\t  </table>\r\n    <table class=\"table tb-type2\" id=\"upload_adv_type_adv\" ";
if ( $output['code_adv']['code_info']['type'] != "adv" )
{
		echo "style=\"display:none;\"";
}
echo ">\r\n      <tbody>\r\n        <tr class=\"noborder\">\r\n          <td class=\"vatop rowform\">\r\n\t\t        <select name=\"adv[ap_id]\" class=\"w200\">\r\n\t\t          <option value=\"0\">-";
echo $lang['nc_please_choose'];
echo "-</option>\r\n\t\t          ";
if ( !empty( $output['adv_list'] ) || is_array( $output['adv_list'] ) )
{
		echo "\t\t          ";
		foreach ( $output['adv_list'] as $k => $v )
		{
				echo "\t\t          <option value=\"";
				echo $v['ap_id'];
				echo "\" ";
				if ( $output['code_adv']['code_info']['ap_id'] == $v['ap_id'] )
				{
						echo "selected";
				}
				echo ">";
				echo $v['ap_name'];
				echo "</option>\r\n\t\t          ";
		}
		echo "\t\t          ";
}
echo "\t\t        </select>\r\n          \t</td>\r\n          <td class=\"vatop tips\">";
echo $lang['web_config_adv_url_tips'];
echo "</td>\r\n        </tr>\r\n\t  \t</tbody>\r\n    </table>\r\n    <a href=\"JavaScript:void(0);\" onclick=\"\$('#upload_adv_form').submit();\" class=\"btn\"><span>";
echo $lang['nc_submit'];
echo "</span></a>\r\n  </form>\r\n</div>\r\n<iframe style=\"display:none;\" src=\"\" name=\"upload_pic\"></iframe>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.ajaxContent.pack.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/dialog/dialog.js\" id=\"dialog_js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/web_config/web_index.js\" charset=\"utf-8\"></script> ";
?>
