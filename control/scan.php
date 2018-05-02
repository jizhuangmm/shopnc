<?php
/**
 * 完成AJAX检测状态并进行更新
 *
 *
 *
 * @copyright  Copyright (c) 2007-2012 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');
define('MYSQL_RESULT_TYPE',1);
class scanControl extends BaseHomeControl{

	public function indexOp(){
		if (empty($_GET['type'])) return ;
		foreach (explode('|',$_GET['type']) as $v) {
			$func = $v.'Op';
			if (method_exists($this,$func)){
				$this->$func();
			}
		}
	}

	/**
	 * 商品自动上下架
	 *
	 */
	private function updownOp(){
		if (!$_SESSION['store_id'] || C('cron_product') != 1) return false;
		$model_goods	= Model('goods');
		$model_goods->updateGoodsWhere(array('goods_show'=>1), array('gt_goods_starttime'=>time(),'lt_goods_endtime'=>time(), 'store_id'=>$_SESSION['store_id']));	// 上架
		$model_goods->updateGoodsWhere(array('goods_starttime'=>time(),'goods_endtime'=>array("sign"=>'calc','value'=>time().'+`goods_indate`*86400')), array('gt_goods_endtime'=>time(), 'store_id'=>$_SESSION['store_id'], 'goods_show'=>1));	// 更新上下架时间
		$model_goods->updateGoodsWhere(array('goods_show'=>'0'), array('store_id'=>$_SESSION['store_id'],'goods_show'=>1,'goods_state'=>1));	// 将已违规并且上架的商品置为下架状态
	}

	/**
	 * 更新店铺缓存信息
	 *
	 */
	private function storeOp(){

		//将cookie设置失效，下次不再发送http请求
		if (cookie('ifcronstore')) exit();
		setNcCookie('cron_store','',-3600);
		if (!isset($_GET['id'])) exit();
		$id = decrypt($_GET['id'],MD5_KEY);
		if (!is_numeric($id) || $id <= 0) exit();

		$model = Model();
		$data = array();

		//店铺总销量
		$model = Model();
		$data['num_sales'] = $model->table('order_goods')->where(array('stores_id'=>$id))->sum('goods_num');
		if (empty($data['num_sales'])){
			$data['num_sales'] = 0;
		}
		//店铺8个优秀商品ID，按销量排
		$data['goods_str1'] = $model->table('goods')->field('goods_id')->where(array('store_id'=>$id,'goods_show'=>1))->order('salenum desc')->limit(8)->select();
		if (is_array($data['goods_str1'])){
			$data['goods_str1'] = array_under_reset($data['goods_str1'],'goods_id');
			$data['goods_str1'] = implode(',',array_keys($data['goods_str1']));				
		}else{
			$data['goods_str1'] = '';
		}

		//近期售出(3个月内)
		$data['num_sales_jq'] = $model->table('order')->where(array('store_id'=>$id,'add_time'=>array('gt',TIMESTAMP-3600*24*90)))->count();
//		
//		//上架在售商品数
		$data['num_selling'] = $model->table('goods')->where(array('store_id'=>$id,'goods_show'=>1))->count();
//
//		//仓库中待上架的商品数
//		$data['num_storage'] = $model->table('goods')->where(array('store_id'=>$id,'goods_state'=>0,'goods_show'=>0))->count();
//
//		//违规下架的商品
//		$data['num_wg'] = $model->table('goods')->where(array('store_id'=>$id,'goods_state'=>1))->count();
//		
//		//交易中的订单
//		$data['num_ordering'] = $model->table('order')->where(array('store_id'=>$id,'order_state'=>array('gt',0),'finnshed_time'=>array('eq','')))->count();
//		
//		//被投诉数
//		$member_id = $model->table('member')->getfby_store_id($id,'member_id');
//		$data['num_accused'] = $model->table('complain')->where(array('accused_id'=>$member_id,'complain_state'=>array(array('gt',10),array('lt',90),'and')))->count();
//
//		//被收藏数
//		$data['num_collect'] = $model->table('favorites')->where(array('fav_id'=>$id,'fav_type'=>'store'))->count();

		if ($model->table('cache_store')->find($id)){
			$result = $model->table('cache_store')->where(array('store_id'=>$id))->update($data);
		}else{
			$data['store_id'] = $id;
			$result = $model->table(cache_store)->insert($data);
		}

		//10分钟执行一次店铺缓存信息
		setNcCookie('ifcronstore',1,600);
	}
}