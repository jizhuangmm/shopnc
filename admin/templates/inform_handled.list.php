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
echo $lang['inform_manage_title'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        ";
foreach ( $output['menu'] as $menu )
{
		if ( $menu['menu_type'] == "text" )
		{
				echo "        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
		else
		{
				echo "        <li><a href=\"";
				echo $menu['menu_url'];
				echo "\" ><span>";
				echo $menu['menu_name'];
				echo "</span></a></li>\r\n        ";
		}
}
echo "      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form id=\"search_form\" method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" id=\"act\" name=\"act\" value=\"inform\" />\r\n    <input type=\"hidden\" id=\"op\" name=\"op\" value=\"inform_handled_list\" />\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"input_inform_goods_name\">";
echo $lang['inform_goods_name'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"input_inform_goods_name\" id=\"input_inform_goods_name\" value=\"";
echo $_GET['input_inform_goods_name'];
echo "\"></td>\r\n          <th><label for=\"input_inform_type\">";
echo $lang['inform_type'];
echo "</label></th>\r\n          <td colspan=\"2\"><input class=\"txt\" type=\"text\" name=\"input_inform_type\" id=\"input_inform_type\" value=\"";
echo $_GET['input_inform_type'];
echo "\"  style=\" width:100px;\">\r\n            <label for=\"input_inform_member_name\">";
echo $lang['inform_member_name'];
echo "</label>\r\n            <input class=\"txt\" type=\"text\" name=\"input_inform_member_name\" id=\"input_inform_member_name\" value=\"";
echo $_GET['input_inform_member_name'];
echo "\" style=\" width:100px;\"></td>\r\n        </tr>\r\n        <tr>\r\n          <th><label for=\"input_inform_subject\">";
echo $lang['inform_subject'];
echo "</label></th>\r\n          <td><input class=\"txt\" type=\"text\" name=\"input_inform_subject\" id=\"input_inform_subject\" value=\"";
echo $_GET['input_inform_subject'];
echo "\"></td>\r\n          <th><label for=\"time_from\">";
echo $lang['inform_datetime'];
echo "</label></th>\r\n          <td><input id=\"time_from\" class=\"txt date\" type=\"text\" name=\"input_inform_datetime_start\" value=\"";
echo $_GET['input_inform_datetime_start'];
echo "\">\r\n            <label for=\"time_to\">~</label>\r\n            <input id=\"time_to\" class=\"txt date\" type=\"text\" name=\"input_inform_datetime_end\" value=\"";
echo $_GET['input_inform_datetime_end'];
echo "\"></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a>\r\n            ";
if ( !empty( $_GET['input_inform_goods_name'] ) && !empty( $_GET['input_inform_member_name'] ) && !empty( $_GET['input_inform_type'] ) && !empty( $_GET['input_inform_subject'] ) && !empty( $_GET['input_inform_datetime_start'] ) && !empty( $_GET['input_inform_datetime_end'] ) )
{
		echo "            <a href=\"index.php?act=inform&op=inform_list\" class=\"btns tooltip\" title=\"";
		echo $lang['nc_cancel_search'];
		echo "\"><span>";
		echo $lang['nc_cancel_search'];
		echo "</span></a>\r\n            ";
}
echo "</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n            <li>";
echo $lang['inform_help3'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"list_form\" action=\"index.php?act=voucher_price&op=voucher_price_drop\">\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th>";
echo $lang['inform_goods_name'];
echo "</th>\r\n          <th>";
echo $lang['inform_member_name'];
echo "</th>\r\n          <th>";
echo $lang['inform_type'];
echo "</th>\r\n          <th>";
echo $lang['inform_subject'];
echo "</th>\r\n          <th>";
echo $lang['inform_pic'];
echo "</th>\r\n          <th>";
echo $lang['inform_datetime'];
echo "</th>\r\n          <th>";
echo $lang['inform_handle_type'];
echo "</th>\r\n          <th>";
echo $lang['nc_handle'];
echo "</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        ";
		foreach ( $output['list'] as $v )
		{
				echo "        <tr class=\"line hover\">\r\n          <td><a href=\"";
				echo SiteUrl.DS.ncurl( array(
						"act" => "goods",
						"goods_id" => $v['inform_goods_id'],
						"id" => $v['inform_store_id']
				), "goods" );
				echo "\" target=\"_blank\">";
				echo $v['inform_goods_name'];
				echo "</a></td>\r\n          <td>";
				echo $v['inform_member_name'];
				echo "</td>\r\n          <td>";
				echo $v['inform_subject_type_name'];
				echo "</td>\r\n          <td>";
				echo $v['inform_subject_content'];
				echo "</td>\r\n          <td>";
				if ( empty( $v['inform_pic1'] ) && empty( $v['inform_pic2'] ) && empty( $v['inform_pic3'] ) )
				{
						echo $lang['inform_pic_none'];
				}
				else
				{
						$pic_link = "/index.php?act=show_pics&type=inform&pics=";
						if ( !empty( $v['inform_pic1'] ) )
						{
								$pic_link .= $v['inform_pic1']."|";
						}
						if ( !empty( $v['inform_pic2'] ) )
						{
								$pic_link .= $v['inform_pic2']."|";
						}
						if ( !empty( $v['inform_pic3'] ) )
						{
								$pic_link .= $v['inform_pic3']."|";
						}
						$pic_link = rtrim( $pic_link, "|" );
						echo "            <a href=\"";
						echo $pic_link;
						echo "\" target=\"_blank\">";
						echo $lang['inform_pic_view'];
						echo "</a>\r\n            ";
				}
				echo "</td>\r\n          <td><span>";
				echo date( "Y-m-d", $v['inform_datetime'] );
				echo "</span></td>\r\n          <td>";
				if ( $v['inform_handle_type'] === "1" )
				{
						echo $lang['inform_handle_type_unuse'];
				}
				if ( $v['inform_handle_type'] === "2" )
				{
						echo $lang['inform_handle_type_venom'];
				}
				if ( $v['inform_handle_type'] === "3" )
				{
						echo $lang['inform_handle_type_valid'];
				}
				echo "</td>\r\n          <td><a href=\"JavaScript:void(0);\" class=\"show_detail\">";
				echo $lang['nc_detail'];
				echo "</a></td>\r\n        </tr>\r\n        <tr class=\"inform_detail\">\r\n          <td colspan=\"15\"><div class=\"shadow2\">\r\n              <div class=\"content\">\r\n                <dl>\r\n                  <dt>";
				echo $lang['inform_content'];
				echo "</dt>\r\n                  <dd>";
				echo $v['inform_content'];
				echo "</dd>\r\n                </dl>\r\n                <dl style=\" border: none;\">\r\n                  <dt>";
				echo $lang['inform_handle_message'];
				echo "</dt>\r\n                  <dd>\r\n                    ";
				if ( empty( $v['inform_handle_message'] ) )
				{
						echo $lang['inform_text_none'];
				}
				else
				{
						echo $v['inform_handle_message']."(".date( "Y-m-d", $v['inform_handle_datetime'] ).")";
				}
				echo "                  </dd>\r\n                </dl>\r\n                <div class=\"close_detail\"><a href=\"JavaScript:void(0);\" title=\"";
				echo $lang['nc_close'];
				echo "\">";
				echo $lang['nc_close'];
				echo "</a></div>\r\n              </div>\r\n            </div></td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"8\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        ";
if ( !empty( $output['list'] ) || is_array( $output['list'] ) )
{
		echo "        <tr class=\"tfoot\">\r\n          <td  colspan=\"15\"><div class=\"pagination\"> ";
		echo $output['show_page'];
		echo " </div></td>\r\n        </tr>\r\n        ";
}
echo "      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\" charset=\"utf-8\" ></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\" ></script>\r\n<link type=\"text/css\" rel=\"stylesheet\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"/>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n    //详细信息显示\r\n    \$(\".inform_detail\").hide();\r\n    \$(\".show_detail\").click(function(){\r\n        \$(\".inform_detail\").hide();\r\n        \$(this).parents(\"tr\").next(\".inform_detail\").show();\r\n    });\r\n    \$(\".close_detail\").click(function(){\r\n        \$(this).parents(\".inform_detail\").hide();\r\n    });\r\n\r\n    //表格移动变色\r\n\t\r\n    \$('#time_from').datepicker({onSelect:function(dateText,inst){\r\n        var year2 = dateText.split('-') ;\r\n        \$('#time_to').datepicker( \"option\", \"minDate\", new Date(parseInt(year2[0]),parseInt(year2[1])-1,parseInt(year2[2])) );\r\n    }});\r\n    \$('#time_to').datepicker({onSelect:function(dateText,inst){\r\n        var year1 = dateText.split('-') ;\r\n        \$('#time_from').datepicker( \"option\", \"maxDate\", new Date(parseInt(year1[0]),parseInt(year1[1])-1,parseInt(year1[2])) );\r\n    }});\r\n});\r\n</script> \r\n";
?>
