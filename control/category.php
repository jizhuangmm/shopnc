<?php
/**
 * 前台分类
 *
 * 
 *
 *
 * @copyright  Copyright (c) 2007-2012 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');

class categoryControl extends BaseHomeControl {
	/**
	 * 分类列表
	 */
	public function indexOp(){
		Language::read('home_category_index');
		$lang	= Language::getLangContent();
		//得到分类类型
		$type = trim($_GET['type']);
		switch ($type){
			case 'store':
				$model_sc = Model('store_class');
				$sc_list = $model_sc->getTreeList();;
				//导航
				$nav_link = array(
					'0'=>array('title'=>$lang['homepage'],'link'=>SiteUrl.'/index.php'),
					'1'=>array('title'=>$lang['category_index_store_class'])
				);
				//推荐店铺
				$model_store = Model('store');
				$recommend_store = $model_store->getStoreList(array(
					'store_recommend'=>'1',
					'order'=>'store_time desc',
					'limit'=>'0,5'
				));
				//商品数量
				$recommend_store = $model_store->getStoreGoods($recommend_store);
				Tpl::output('recommend_store',$recommend_store);
				//最新店铺
				$new_store = $model_store->getStoreList(array(
					'order'=>'store_time desc',
					'limit'=>'0,5'
				));
				//商品数量

				$new_store = $model_store->getStoreGoods($new_store);
				Tpl::output('new_store',$new_store);
				Tpl::output('nav_link_list',$nav_link);
				Tpl::output('sc_list',$sc_list);
				Tpl::showpage('category_store');
				break;
			default :

				//导航
				$nav_link = array(
					'0'=>array('title'=>$lang['homepage'],'link'=>SiteUrl.'/index.php'),
					'1'=>array('title'=>$lang['category_index_goods_class'])
				);
				
				//分类
				$show_goods_class = ($g = F('goods_class')) ? $g : H('goods_class',true,'file');

				Tpl::output('nav_link_list',$nav_link);
				Tpl::output('gc_list',$show_goods_class);
				Tpl::output('html_title',C('site_name').' - '.Language::get('category_index_goods_class'));
				Tpl::showpage('category_goods');
				break;
		}
	}
}