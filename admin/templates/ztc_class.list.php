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
echo $lang['nc_ztc_manage'];
echo "<!-- 直通车管理 --></h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_setting\"><span>";
echo $lang['nc_config'];
echo "</span></a></li>\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['admin_ztc_list_title'];
echo "<!-- 申请列表 --></span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glist\" ><span>";
echo $lang['admin_ztc_goodslist_title'];
echo "</span></a></li>\r\n        <li><a href=\"index.php?act=ztc_class&op=ztc_glog\" ><span>";
echo $lang['admin_ztc_loglist_title'];
echo "</span></a></li>\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n  <form method=\"get\" name=\"formSearch\">\r\n    <input type=\"hidden\" name=\"act\" value=\"ztc_class\">\r\n    <input type=\"hidden\" name=\"op\" value=\"ztc_class\">\r\n    <table class=\"tb-type1 noborder search\">\r\n      <tbody>\r\n        <tr>\r\n          <th><label for=\"zg_name\">";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_name\" id=\"zg_name\" class=\"txt\" value='";
echo $_GET['zg_name'];
echo "'></td>\r\n          <th colspan=\"1\"><label for=\"zg_membername\">";
echo $lang['admin_ztc_membername'];
echo "<!-- 会员名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_membername\" id=\"zg_membername\" class=\"txt-short\" value='";
echo $_GET['zg_membername'];
echo "'></td>\r\n          <th> <label for=\"zg_storename\">";
echo $lang['admin_ztc_storename'];
echo "<!-- 店铺名称 --></label></th>\r\n          <td><input type=\"text\" name=\"zg_storename\" id=\"zg_storename\" class=\"txt-short\" value='";
echo $_GET['zg_storename'];
echo "'></td>\r\n          <td colspan=\"3\"><select name=\"zg_state\">\r\n              <option value=\"0\" ";
if ( !$_GET['zg_state'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_auditstate'];
echo "<!-- 审核状态 --></option>\r\n              <option value=\"1\" ";
if ( $_GET['zg_state'] == 1 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_auditing'];
echo "<!-- 等待审核 --></option>\r\n              <option value=\"2\" ";
if ( $_GET['zg_state'] == 2 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_auditpass'];
echo "<!-- 通过审核 --></option>\r\n              <option value=\"3\" ";
if ( $_GET['zg_state'] == 3 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_auditnopass'];
echo "<!-- 审核失败 --></option>\r\n            </select>\r\n            <select name=\"zg_paystate\">\r\n              <option value=\"0\" ";
if ( !$_GET['zg_paystate'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_paystate'];
echo "<!-- 支付状态 --></option>\r\n              <option value=\"1\" ";
if ( $_GET['zg_paystate'] == 1 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_waitpaying'];
echo "<!-- 等待支付 --></option>\r\n              <option value=\"2\" ";
if ( $_GET['zg_paystate'] == 2 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_paysuccess'];
echo "<!-- 支付成功 --></option>\r\n            </select>\r\n            <select name=\"zg_type\">\r\n              <option value=\"0\" ";
if ( !$_GET['zg_type'] )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_applytype'];
echo "<!-- 申请类型 --></option>\r\n              <option value=\"1\" ";
if ( $_GET['zg_type'] == 1 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_applyrecord'];
echo "<!-- 申请记录 --></option>\r\n              <option value=\"2\" ";
if ( $_GET['zg_type'] == 2 )
{
		echo "selected=selected";
}
echo ">";
echo $lang['admin_ztc_rechargerecord'];
echo "<!-- 充值记录 --></option>\r\n            </select></td>\r\n          <td><a href=\"javascript:document.formSearch.submit();\" class=\"btn-search tooltip\" title=\"";
echo $lang['admin_ztc_searchtext'];
echo "\">&nbsp;</a></td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </form>\r\n  <table class=\"table tb-type2\" id=\"prompt\">\r\n    <tbody>\r\n      <tr class=\"space odd\">\r\n        <th colspan=\"12\"><div class=\"title\"><h5>";
echo $lang['nc_prompts'];
echo "</h5><span class=\"arrow\"></span></div></th>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n        <ul>\r\n\t\t\t<li>";
echo $lang['admin_ztc_index_help1'];
echo "</li>\r\n          </ul></td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n  <form method='post' id=\"form_ztc\" action=\"index.php\">\r\n    <input type=\"hidden\" id=\"list_act\" name=\"act\" value=\"ztc_class\">\r\n    <input type=\"hidden\" id=\"list_op\" name=\"op\" value=\"dropall_ztc\">\r\n    <table class=\"table tb-type2\">\r\n      <thead>\r\n        <tr class=\"thead\">\r\n          <th class=\"w24\">&nbsp;</th>\r\n          <th colspan=\"2\">";
echo $lang['admin_ztc_goodsname'];
echo "<!-- 商品名称 --></th>\r\n          <th>";
echo $lang['admin_ztc_membername'];
echo "<!-- 会员名称 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_list_gold'];
echo "<!-- 消耗金币(枚) --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_starttime'];
echo "<!-- 开始时间 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_applytype'];
echo "<!-- 申请类型 --></th>\r\n          <th class=\"align-center\">";
echo $lang['admin_ztc_state'];
echo "<!-- 状态 --></th>\r\n          <th class=\"align-center\">";
echo $lang['nc_handle'];
echo "<!-- 操作 --></th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        ";
if ( !empty( $output['ztc_list'] ) || is_array( $output['ztc_list'] ) )
{
		echo "        ";
		foreach ( $output['ztc_list'] as $k => $v )
		{
				echo "        <tr class=\"hover\">\r\n          <td class=\"w24\"><input type=\"checkbox\" name=\"z_id[]\" value=\"";
				echo $v['ztc_id'];
				echo "\" class=\"checkitem\"></td>\r\n          <!--<td class=\"w24\">";
				echo $v['ztc_id'];
				echo "</td>-->\r\n          <td class=\"w48\"><div class=\"goods-picture\"><span class=\"thumb size-goods\"><i></i><img src=\"";
				echo cthumb( $v['ztc_goodsimage'], "small", $v['ztc_storeid'] );
				echo "\"  onload=\"javascript:DrawImage(this,44,44);\"/></span></div></td>\r\n          <td><p><a href=\"";
				echo SiteUrl;
				echo "/index.php?act=goods&goods_id=";
				echo $v['ztc_goodsid'];
				echo "&id=";
				echo $v['ztc_storeid'];
				echo "\" target=\"_blank\" >";
				echo $v['ztc_goodsname'];
				echo "</a></p>\r\n            <p class=\"store\">";
				echo $lang['admin_ztc_storename'];
				echo ":";
				echo $v['ztc_storename'];
				echo "</p></td>\r\n          <td>";
				echo $v['ztc_membername'];
				echo "</td>\r\n          <td class=\"w84 align-center\">";
				echo $v['ztc_gold'];
				echo "</td>\r\n          <td class=\"w84 align-center\">";
				if ( $v['ztc_startdate'] )
				{
						echo date( "Y-m-d", $v['ztc_startdate'] );
				}
				else
				{
						echo $lang['admin_ztc_null'];
				}
				echo "</td>\r\n          <td class=\"w84 align-center\">";
				if ( $v['ztc_type'] == 1 )
				{
						echo $lang['admin_ztc_rechargerecord'];
				}
				else
				{
						echo $lang['admin_ztc_applyrecord'];
				}
				echo "</td>\r\n          <td class=\"w120 align-center\">";
				if ( $v['ztc_state'] == 0 )
				{
						if ( $v['ztc_paystate'] == 1 )
						{
								echo $lang['admin_ztc_list_paysucc_auditing'];
						}
						else
						{
								echo $lang['admin_ztc_waitpaying'];
						}
				}
				else if ( $v['ztc_state'] == 1 )
				{
						echo $lang['admin_ztc_auditpass'];
				}
				else if ( $v['ztc_state'] == 2 )
				{
						echo $lang['admin_ztc_auditnopass'];
				}
				echo "</td>\r\n          <td class=\"w96 align-center\">";
				if ( $v['ztc_paystate'] == 1 && $v['ztc_state'] == 0 && $v['ztc_type'] == 0 )
				{
						echo "            <a href=\"index.php?act=ztc_class&op=edit_ztc&z_id=";
						echo $v['ztc_id'];
						echo "\" class=\"edit\">";
						echo $lang['nc_edit'];
						echo "</a>\r\n            ";
				}
				echo "            ";
				if ( $v['ztc_paystate'] == 0 && $v['ztc_state'] == 0 )
				{
						echo "            <a href=\"javascript:void(0)\" onclick=\"if(confirm('";
						echo $lang['nc_ensure_del'];
						echo "')){window.location='index.php?act=ztc_class&op=drop_ztc&z_id=";
						echo $v['ztc_id'];
						echo "';}else{return false;}\">";
						echo $lang['nc_del'];
						echo "</a>\r\n            ";
				}
				echo "                        <a href=\"index.php?act=ztc_class&op=info_ztc&z_id=";
				echo $v['ztc_id'];
				echo "\" class=\"edit\">";
				echo $lang['nc_view'];
				echo "</a>\r\n            </td>\r\n        </tr>\r\n        ";
		}
		echo "        ";
}
else
{
		echo "        <tr class=\"no_data\">\r\n          <td colspan=\"15\">";
		echo $lang['nc_no_record'];
		echo "</td>\r\n        </tr>\r\n        ";
}
echo "      </tbody>\r\n      <tfoot>\r\n        <tr class=\"tfoot\">\r\n          <td><input type=\"checkbox\" class=\"checkall\" id=\"checkallBottom\"></td>\r\n          <td colspan=\"16\" id=\"batchAction\"><label for=\"checkallBottom\">";
echo $lang['nc_select_all'];
echo "</label>\r\n            &nbsp;&nbsp;<a href=\"JavaScript:void(0);\" class=\"btn\" onclick=\"submit_form('dropall_ztc');\"><span>";
echo $lang['nc_del'];
echo "</span></a>\r\n            <div class=\"pagination\"> ";
echo $output['page'];
echo " </div></td>\r\n        </tr>\r\n      </tfoot>\r\n    </table>\r\n  </form>\r\n</div>\r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/jquery.edit.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\" src=\"";
echo RESOURCE_PATH;
echo "/js/common_select.js\" charset=\"utf-8\"></script> \r\n<script type=\"text/javascript\">\r\nfunction submit_form(op){\r\n\tif(op=='dropall_ztc'){\r\n\t\tif(!confirm('";
echo $lang['nc_ensure_del'];
echo "')){\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\t\$('#list_op').val(op);\r\n\t\$('#form_ztc').submit();\r\n}\r\n</script>";
?>
