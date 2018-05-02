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
echo "<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/jquery.ui.js\"></script>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/i18n/zh-CN.js\" charset=\"utf-8\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"";
echo RESOURCE_PATH;
echo "/js/jquery-ui/themes/ui-lightness/jquery.ui.css\"  />\r\n\r\n<div class=\"page\">\r\n  <div class=\"fixed-bar\">\r\n    <div class=\"item-title\">\r\n      <h3>";
echo $lang['nc_ztc_manage'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n      \t<li><a href=\"index.php?act=ztc_class&op=ztc_setting\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_class\" ><span>";
echo $lang['admin_ztc_list_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glist\" ><span>";
echo $lang['admin_ztc_goodslist_title'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_ztc_loglist_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"ztc_class\">\r\n    <input type=\"hidden\" name=\"op\" value=\"ztc_glog\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"zg_name\">";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_name\" id=\"zg_name\" class=\"txt\" value='";
echo $_GET['zg_name'];
echo "'></td>\r\n          <th><label for=\"zg_sname\">";
echo $lang['admin_ztc_storename'];
echo "<!-- 店铺名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_sname\" id=\"zg_sname\" class=\"txt-short\" value='";
echo $_GET['zg_sname'];
echo "'></td>\r\n          <th><label for=\"zg_stime\">";
echo $lang['admin_ztc_addtime'];
echo "<!-- 添加时间 --></label></th>\r\n          <td><input type=\"text\" id=\"zg_stime\" name=\"zg_stime\" class=\"txt date\" value=\"";
echo $_GET['zg_stime'];
echo "\" >\r\n            <label for=\"zg_etime\">";
echo $lang['admin_ztc_addtime_to'];
echo "<!-- 至 --></label>\r\n            <input type=\"text\" id=\"zg_etime\" name=\"zg_etime\" class=\"txt date\" value=\"";
echo $_GET['zg_etime'];
echo "\" ></td>\r\n          <td><select name=\"zg_type\">\r\n              <option value=\"0\" ";
if ( !$_GET['zg_type'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_glog_recordtype'];
echo "<!-- 类型 --></option>\r\n              <option value=\"1\" ";
if ( $_GET['zg_type'] == 1 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_glog_recordtype_add'];
echo "<!-- 增加 --></option>\r\n              <option value=\"2\" ";
if ( $_GET['zg_type'] == 2 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_glog_recordtype_reduce'];
echo "<!-- 减少 --></option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['nc_query'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <form method='post' id=\"form_ztc\" action=\"index.php\">\r\n    <input type=\"hidden\" id=\"list_act\" name=\"act\" value=\"ztc_class\">\r\n    <input type=\"hidden\" id=\"list_op\" name=\"op\" value=\"dropall_ztc\">\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w32\">";
echo $lang['admin_ztc_list_number'];
echo "<!-- 序号 --></th>\r\n          <th>";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 --></th>\r\n          <th>";
echo $lang['admin_ztc_storename'];
echo "<!-- 店铺名称 --></th>\r\n          <th>";
echo $lang['admin_ztc_membername'];
echo "<!-- 会员名称 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_glog_list_goldnum'];
echo "<!-- 金币数量(枚) --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_addtime'];
echo "<!-- 添加时间 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_glog_recordtype'];
echo "<!-- 类型 --></th>\r\n          <th>";
echo $lang['admin_ztc_glog_list_desc'];
echo "<!-- 描述 --></th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['list_log'] ) || is_array( $output['list_log'] ) )
{
		echo "        ";
		foreach ( $output['list_log'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td>";
				echo $v['glog_id'];
				echo "</td>\r\n          <td><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=goods&goods_id=";
				echo $v['glog_goodsid'];
				echo "&id=";
				echo $v['glog_storeid'];
				echo "\" target=\"_blank\" >";
				echo $v['glog_goodsname'];
				echo "</a></td>\r\n          <td>";
				echo $v['glog_storename'];
				echo "</td>\r\n          <td>";
				echo $v['glog_membername'];
				echo "</td>\r\n          <td class=\"align-center\">";
				echo $v['glog_goldnum'];
				echo "</td>\r\n          <td class=\"nowarp align-center\">";
				echo date( "Y-m-d", $v['glog_addtime'] );
				echo "</td>\r\n          <td class=\"align-center\">";
				if ( $v['glog_type'] == 1 )
				{
						echo $lang['admin_ztc_glog_recordtype_add'];
				}
				else
				{
						echo $lang['admin_ztc_glog_recordtype_reduce'];
				}
				echo "</td>\r\n          <td>";
				echo $v['glog_desc'];
				echo "</td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"10\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td colspan=\"16\"><div class=\"pagination\">";
echo $output['show_page'];
echo "</div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n    <div class=\"clear\"></div>\r\n  </form>\r\n</div>\r\n<script language=\"javascript\">\r\n\$(function(){\r\n\t\$('#zg_stime').datepicker({dateFormat: 'yy-mm-dd'});\r\n\t\$('#zg_etime').datepicker({dateFormat: 'yy-mm-dd'});\r\n});\r\n</script>";
?>
