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
$lang['goods_class_index_del_succ'] = "删除分类成功";
$lang['goods_class_index_choose_del'] = "请选择要删除的内容";
$lang['goods_class_index_choose_edit'] = "请选择要编辑的内容";
$lang['goods_class_index_in_homepage'] = "首页内";
$lang['goods_class_index_display'] = "显示";
$lang['goods_class_index_hide'] = "隐藏";
$lang['goods_class_index_succ'] = "成功";
$lang['goods_class_index_choose_in_homepage'] = "请选择首页内要";
$lang['goods_class_index_content'] = "的内容!";
$lang['goods_class_index_class'] = "商品分类";
$lang['goods_class_index_export'] = "导出";
$lang['goods_class_index_import'] = "导入";
$lang['goods_class_index_tag'] = "TAG管理";
$lang['goods_class_index_name'] = "分类名称";
$lang['goods_class_index_recommended'] = "推荐";
$lang['goods_class_index_ensure_del'] = "删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗";
$lang['goods_class_index_display_tip'] = "首页默认只显示到二级分类";
$lang['goods_class_index_help1'] = "当店主添加商品时可选择商品分类，用户可根据分类查询商品列表";
$lang['goods_class_index_help2'] = "点击分类名前“+”符号，显示当前分类的下级分类";
$lang['goods_class_batch_edit_succ'] = "批量编辑成功";
$lang['goods_class_batch_edit_wrong_content'] = "批量修改内容不正确";
$lang['goods_class_batch_edit_batch'] = "批量编辑";
$lang['goods_class_batch_edit_keep'] = "保持不变";
$lang['goods_class_batch_edit_again'] = "重新编辑该分类";
$lang['goods_class_batch_edit_ok'] = "编辑分类成功。";
$lang['goods_class_batch_edit_fail'] = "编辑分类失败。";
$lang['goods_class_batch_edit_paramerror'] = "参数非法";
$lang['goods_class_add_name_null'] = "分类名称不能为空";
$lang['goods_class_add_sort_int'] = "分类排序仅能为数字";
$lang['goods_class_add_back_to_list'] = "返回分类列表";
$lang['goods_class_add_again'] = "继续新增分类";
$lang['goods_class_add_succ'] = "新增分类成功";
$lang['goods_class_add_fail'] = "新增分类失败";
$lang['goods_class_add_name_exists'] = "该分类名称已经存在了，请您换一个";
$lang['goods_class_add_sup_class'] = "上级分类";
$lang['goods_class_add_sup_class_notice'] = "如果选择上级分类，那么新增的分类则为被选择上级分类的子分类";
$lang['goods_class_add_update_sort'] = "数字范围为0~255，数字越小越靠前";
$lang['goods_class_add_display_tip'] = "分类名称是否显示";
$lang['goods_class_add_type'] = "类型";
$lang['goods_class_add_type_desc_one'] = "如果当前下拉选项中没有适合的类型，可以去";
$lang['goods_class_add_type_desc_two'] = "功能中添加新的类型";
$lang['goods_class_edit_prompts_one'] = "\"类型\"关系到商品发布时商品规格的添加，没有类型的商品分类的将不能添加规格。";
$lang['goods_class_edit_prompts_two'] = "默认勾选\"关联到子分类\"将商品类型附加到子分类，如子分类不同于上级分类的类型，可以取消勾选并单独对子分类的特定类型进行编辑选择。";
$lang['goods_class_edit_prompts_three'] = "在编辑\"类型\"和勾选\"关联到子分类\"时，涉及分类下的商品将会被进行\"违规下架\"处理，商品在重新编辑后才能正常使用，<span style=\"color:#F30\">请慎重操作</span>。";
$lang['goods_class_edit_related_to_subclass'] = "关联到子分类";
$lang['goods_class_edit_goods_close_reason'] = "分类或规格信息不符";
$lang['goods_class_import_succ'] = "导入成功";
$lang['goods_class_import_csv_null'] = "导入的csv文件不能为空";
$lang['goods_class_import_data'] = "导入数据";
$lang['goods_class_import_choose_file'] = "请选择文件";
$lang['goods_class_import_file_tip'] = "如果导入速度较慢，建议您把文件拆分为几个小文件，然后分别导入";
$lang['goods_class_import_choose_code'] = "请选择文件编码";
$lang['goods_class_import_code_tip'] = "如果文件较大，建议您先把文件转换为 utf-8 编码，这样可以避免转换编码时耗费时间";
$lang['goods_class_import_file_type'] = "文件格式";
$lang['goods_class_import_first_class'] = "一级分类";
$lang['goods_class_import_second_class'] = "二级分类";
$lang['goods_class_import_third_class'] = "三级分类";
$lang['goods_class_import_example_download'] = "例子文件下载";
$lang['goods_class_import_example_tip'] = "点击下载导入例子文件";
$lang['goods_class_import_import'] = "导入";
$lang['goods_class_export_data'] = "导出数据";
$lang['goods_class_export_if_trans'] = "导出您的商品分类数据";
$lang['goods_class_export_trans_tip'] = "";
$lang['goods_class_export_export'] = "导出";
$lang['goods_class_export_help1'] = "导出内容为商品分类信息的.csv文件";
$lang['goods_class_tag_name'] = "TAG名称";
$lang['goods_class_tag_value'] = "TAG值";
$lang['goods_class_tag_update'] = "更新TAG名称";
$lang['goods_class_tag_update_prompt'] = "更新TAG名称需要话费较长的时间，请耐心等待。";
$lang['goods_class_tag_reset'] = "导入/重置TAG";
$lang['goods_class_tag_reset_confirm'] = "您确定要重新导入TAG吗？重新导入将会重置所有TAG值信息。";
$lang['goods_class_tag_prompts_one'] = "商品分类TAG对应商品发布第一步“选择商品分类”的分类搜索功能。方便商家快速准确的找到所需的商品分类。";
$lang['goods_class_tag_prompts_two'] = "TAG值是分类搜索的关键字，请精确的填写TAG值。TAG值可以填写多个，每个值之间需要用逗号隔开。";
$lang['goods_class_tag_prompts_three'] = "导入/重置TAG功能可以根据商品分类重新更新TAG，TAG值默认为各级商品分类值。";
$lang['goods_class_tag_choose_data'] = "请选择要操作的数据项。";
$lang['goods_class_reset_tag_succ'] = "重置TAG成功。";
$lang['goods_class_reset_tag_fail'] = "重置TAG失败。";
$lang['goods_class_reset_tag_fail_no_class'] = "重置TAG失败，没查找到任何分类信息。";
$lang['goods_class_update_tag_succ'] = "TAG名称更新成功。";
$lang['goods_class_update_tag_fail'] = "TAG名称更新失败。";
$lang['goods_class_update_tag_fail_no_class'] = "TAG名称更新失败，没查找到任何分类信息。";
$lang['goods_class_tag_del_succ'] = "TAG删除成功。";
$lang['goods_class_tag_del_fail'] = "TAG删除失败。";
$lang['goods_class_tag_del_confirm'] = "你确定要删除商品分类TAG吗?";
?>
