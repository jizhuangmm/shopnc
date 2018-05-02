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
echo $lang['nc_admin_perform_opt'];
echo "</h3>\r\n      <ul class=\"tab-base\">\r\n        <li><a href=\"JavaScript:void(0);\" class=\"current\"><span>";
echo $lang['memory_set_opt'];
echo "</span></a></li>\r\n<!--        <li><a href=\"index.php?act=setting&op=captcha_setting\"><span>服务器优化";
echo $lang['v'];
echo "</span></a></li>-->\r\n      </ul>\r\n    </div>\r\n  </div>\r\n  <div class=\"fixed-empty\"></div>\r\n\t<table id=\"prompt\" class=\"table tb-type2\">\r\n\t<tbody>\r\n\t<tr class=\"space odd\" style=\"background: none repeat scroll 0% 0% rgb(255, 255, 255);\">\r\n\t<th class=\"nobg\" colspan=\"12\">\r\n\t<div class=\"title\">\r\n\t<h5>";
echo $lang['nc_prompts'];
echo "</h5>\r\n\t<span class=\"arrow\"></span>\r\n\t</div>\r\n\t</th>\r\n\t</tr>\r\n\t<tr class=\"odd\" style=\"background: none repeat scroll 0% 0% rgb(255, 255, 255); display: table-row;\">\r\n\t<td>\r\n\t<ul>\r\n\t<li>";
echo $lang['memory_set_prompt1'];
echo "</li>\r\n\t<li>";
echo $lang['memory_set_prompt2'];
echo "</li>\r\n\t<li>";
echo $lang['memory_set_prompt3'];
echo "</li>\r\n\t<li>";
echo $lang['memory_set_prompt4'];
echo "</li>\r\n\t</ul>\r\n\t</td>\r\n\t</tr>\r\n\t</tbody>\r\n\t</table>\r\n\t<table class=\"table tb-type2\">\r\n\t<thead class=\"thead\">\r\n\t\t<tr class=\"space\">\r\n\t\t<th colspan=\"15\"><label>";
echo $lang['memory_set_cur_status'];
echo "</label></th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t<th class=\"w24\"></th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_type'];
echo "</th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_php'];
echo "</th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_config'];
echo "</th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_cls'];
echo "</th><br>\r\n\t\t<th></th>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>Memcache</td>\r\n\t\t\t<td>";
echo extension_loaded( "memcache" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "cache.type" ) == "memcache" ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>\r\n\t\t\t";
if ( extension_loaded( "memcache" ) && c( "cache.type" ) == "memcache" )
{
		echo "\t\t\t<a href=\"index.php?act=setting&op=perform&type=clear\">";
		echo $lang['memory_set_cls'];
		echo "</a>";
}
else
{
		echo "--";
}
echo "\t\t\t</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>eAccelerator</td>\r\n\t\t\t<td>";
echo extension_loaded( "eAccelerator" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "cache.type" ) == "eaccelerator" ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>--</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>APC</td>\r\n\t\t\t<td>";
echo function_exists( "apc_cache_info" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "cache.type" ) == "apc" ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
if ( function_exists( "apc_cache_info" ) && c( "cache.type" ) == "apc" )
{
		echo "\t\t\t<a href=\"index.php?act=setting&op=perform&type=clear\">";
		echo $lang['memory_set_cls'];
		echo "</a>";
}
else
{
		echo "--";
}
echo "</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>Xcache</td>\r\n\t\t\t<td>";
echo function_exists( "xcache_info" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "cache.type" ) == "xcache" ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
if ( function_exists( "xcache_info" ) && c( "cache.type" ) == "xcache" )
{
		echo "\t\t\t<a href=\"index.php?act=setting&op=perform&type=clear\">";
		echo $lang['memory_set_cls'];
		echo "</a>";
}
else
{
		echo "--";
}
echo "</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t</table>\r\n<!--\t<table class=\"table tb-type2\">\r\n\t<thead class=\"thead\">\r\n\t\t<tr class=\"space\">\r\n\t\t<th colspan=\"15\"><label>";
echo $lang['memory_set_opt_moduleset'];
echo "</label></th>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t<th class=\"w24\"></th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_opt_module'];
echo "</th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_opt_ifopen'];
echo "</th>\r\n\t\t<th class=\"w84\">";
echo $lang['memory_set_opt_ttl'];
echo "</th>\r\n\t\t<th></th>\r\n\t\t</tr>\r\n\t</thead>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>商品搜索结果</td>\r\n\t\t\t<td>";
echo c( "memory.search_p.open" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "memory.search_p.ttl" );
echo "</td>\r\n\t\t\t<td class=\"vatop tips\">0表示永不过期，只缓存按商品分类、规格、属性搜索出来的数据</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>店铺搜索结果</td>\r\n\t\t\t<td>";
echo c( "memory.search_s.open" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "memory.search_s.ttl" );
echo "</td>\r\n\t\t\t<td class=\"vatop tips\">0表示永不过期，只缓存按商品分类、规格、属性搜索出来的数据</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>用户数据</td>\r\n\t\t\t<td>";
echo c( "memory.member.open" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "memory.member.ttl" );
echo "</td>\r\n\t\t\t<td class=\"vatop tips\">0表示永不过期，缓存用户常用数据（站内信数量）</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td></td>\r\n\t\t\t<td>商品数据</td>\r\n\t\t\t<td>";
echo c( "memory.product.open" ) ? "YES" : "NO";
echo "</td>\r\n\t\t\t<td>";
echo c( "memory.product.ttl" );
echo "</td>\r\n\t\t\t<td class=\"vatop tips\">0表示永不过期，缓存商品基本统计数据（浏览量、售出量）</td>\r\n\t\t\t<td></td>\r\n\t\t</tr>\r\n\t</tbody>\r\n\t</table>-->\r\n</div>";
?>
