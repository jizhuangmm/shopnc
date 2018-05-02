<?php
/**
 * 交易新模型
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
class tradeModel extends Model{
	public function __construct(){
		parent::__construct();
	}
	public function order_list($condition = array(), $page=10, $field = '*'){
		$table = 'order,order_address,payment';
		$on = 'order.order_id=order_address.order_id,order.payment_id=payment.payment_id';
		$order = 'order.add_time desc';
		$list = $this->table($table)->on($on)->join('left,left')->where($condition)->page($page)->order($order)->select();
		return $list;
	}
}
?>