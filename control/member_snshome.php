<?php
/**
 * SNS我的空间
 *
 * @copyright  Copyright (c) 2007-2012 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');

class member_snshomeControl extends BaseHomeControl {
	private $relation = 0;//浏览者与主人的关系：0 表示游客 1 表示一般普通会员 2表示朋友 3表示自己
	private $member_id = 0; //主人编号
	const MAX_RECORDNUM = 20;//允许插入新记录的最大条数
	
	public function __construct(){
		parent::__construct();
		Language::read('member_sns');
		
		//验证主人会员编号
		$this->member_id = intval($_GET['mid']);
		if ($this->member_id <= 0){
			if ($_SESSION['is_login'] == 1){
				$this->member_id = $_SESSION['member_id'];
			}else {
				@header("location: index.php?act=login&ref_url=".urlencode('index.php?act=member_snshome'));
			}
		}
		if ($this->member_id <= 0){
			showDialog(Language::get('wrong_argument'),'index.php','error');
		}
		//查询会员信息
		$member_model = Model('member');
		$member_info = $member_model->infoMember(array('member_id'=>"{$this->member_id}",'member_state'=>'1'));
		if (empty($member_info)){
			showDialog(Language::get('sns_member_error'),'index.php','error');
		}
		//信用度
		$member_info['credit_arr'] = getCreditArr(intval($member_info['member_credit']));
		Tpl::output('member_info',$member_info);
		//判断浏览者与主人的关系
		if ($_SESSION['is_login'] == '1'){
			if ($this->member_id == $_SESSION['member_id']){//主人自己
				$this->relation = 3;
			}else{
				$this->relation = 1;
				//查询好友表
				$friend_model = Model('sns_friend');
				$friend_arr = $friend_model->listFriend(array('friend_frommid'=>"{$this->member_id}",'friend_tomid'=>"{$_SESSION['member_id']}",'friend_followstate'=>'2'),'*','','simple');
				if (!empty($friend_arr) && count($friend_arr)>0){
					$this->relation = 2;
				}
			}
		}
		Tpl::output('relation',$this->relation);
		//粉丝数
		$friend_model = Model('sns_friend');
		$fan_count = $friend_model->countFriend(array('friend_tomid'=>"{$this->member_id}"));
		$fan_count = $fan_count > 0?$fan_count:0;
		Tpl::output('fan_count',$fan_count);
		//记录访客
		$visitor_model = Model('sns_visitor');
		if ($_SESSION['is_login'] == '1' && $_SESSION['member_id'] != $this->member_id){
			//访客为会员且不是空间主人则添加访客记录
			$visitor_info = $member_model->infoMember(array('member_id'=>"{$_SESSION['member_id']}",'member_state'=>'1'));
			if (!empty($visitor_info)){
				//查询访客记录是否存在
				$existevisitor_info = $visitor_model->getVisitorRow(array('v_ownermid'=>"{$this->member_id}",'v_mid'=>"{$visitor_info['member_id']}"));				
				if (!empty($existevisitor_info)){//访问记录存在则更新访问时间
					$update_arr = array();
					$update_arr['v_addtime'] = time();
					$visitor_model->visitorEdit($update_arr,array('v_id'=>"{$existevisitor_info['v_id']}"));
				}else {//添加新访问记录
					$insert_arr = array();
					$insert_arr['v_mid'] = "{$visitor_info['member_id']}";
					$insert_arr['v_mname'] = "{$visitor_info['member_name']}";
					$insert_arr['v_mavatar'] = "{$visitor_info['member_avatar']}";
					$insert_arr['v_ownermid'] = "{$member_info['member_id']}";
					$insert_arr['v_ownermname'] = "{$member_info['member_name']}";
					$insert_arr['v_ownermavatar'] = "{$member_info['member_avatar']}";
					$insert_arr['v_addtime'] = time();
					$visitor_model->visitorAdd($insert_arr);
				}
			}
		}
		//增加访问次数
		$cookie_str = cookie('visitor');
		$cookie_arr = array();
		$is_increase = false;
		if (empty($cookie_str)){//cookie不存在则直接增加访问次数
			$is_increase = true;
		}
		if ($is_increase == false){
			//cookie存在但是为空则直接增加访问次数
			$cookie_arr = explode('_',$cookie_str);
			if (empty($cookie_arr)){
				$is_increase = true;
			}
		}
		if ($is_increase == false && !in_array($this->member_id,$cookie_arr)){
			$is_increase = true;
		}
		if ($is_increase == true){
			//增加访问次数
			$member_model->updateMember(array('member_snsvisitnum'=>array('sign'=>'increase','value'=>1)),$this->member_id);
			//设置cookie，24小时之内不再累加
			$cookie_arr[] = $this->member_id;			
			setNcCookie('visitor',implode('_',$cookie_arr),24*3600);//保存24小时
		}		
		//允许插入新记录的最大条数
		Tpl::output('max_recordnum',self::MAX_RECORDNUM);
		
		Language::read('member_layout');
		Tpl::setDir('member');
		Tpl::setLayout('member_sns_layout');
		Tpl::output('header_menu_sign','snshome');//默认选中顶部“我的空间”菜单
	}
	/**
	 * SNS首页(不登录就可以查看)
	 */
	public function indexOp(){
		$this->shareglistOp();
	}
	/**
	 * 获取分享和喜欢商品列表(不登录就可以查看)
	 */
	public function shareglistOp(){
		//查询分享商品信息
		$page	= new Page();
		$page->setEachNum(20);
		$page->setStyle('admin');		
		//动态列表
		$condition = array();
		$condition['share_memberid'] = "{$this->member_id}";
		switch ($this->relation){
			case 3:
				$condition['share_privacyin'] = "";
				break;
			case 2:
				$condition['share_privacyin'] = "0','1";
				break;
			case 1:
				$condition['share_privacyin'] = "0";
				break;
			default:
				$condition['share_privacyin'] = "0";
				break;
		}
		if ($_GET['type'] == 'like'){
			$condition['share_islike'] = "1";//喜欢的商品
			$condition['order'] = " share_likeaddtime desc";
		}else {
			$condition['share_isshare'] = "1";//分享的商品
			$condition['order'] = " share_addtime desc";
		}
		$sharegoods_model = Model('sns_sharegoods');
		$goodslist = $sharegoods_model->getSharegoodsList($condition,$page,'*','detail');
		if ($_SESSION['is_login'] == '1' && !empty($goodslist)){
			foreach ($goodslist as $k=>$v){
				if (!empty($v['snsgoods_likemember'])){
					$v['snsgoods_likemember_arr'] = explode(',',$v['snsgoods_likemember']);
					$v['snsgoods_havelike'] = in_array($_SESSION['member_id'],$v['snsgoods_likemember_arr'])?1:0;
				}
				$goodslist[$k] = $v;
			}
		}
		//信息输出
		Tpl::output('goodslist',$goodslist);
		Tpl::output('show_page',$page->show());
		if ($_GET['type'] == 'like'){
			Tpl::output('tpl_name','member_snslikegoodslist');
		}else {
			Tpl::output('tpl_name','member_snssharegoodslist');
		}
		Tpl::output('menu_sign','snshome');
		Tpl::showpage('member_snshome');
	}
	/**
	 * 分享和喜欢商品详细页面
	 */
	public function goodsinfoOp(){
		$share_id = intval($_GET['id']);
		if ($share_id <= 0){
			showDialog(Language::get('wrong_argument'),"index.php?act=member_snshome&mid={$this->member_id}",'error');
		}
		//查询分享和喜欢商品信息
		$sharegoods_model = Model('sns_sharegoods');
		$condition = array();
		$condition['share_id'] = "$share_id";
		$condition['share_memberid'] = "{$this->member_id}";
		$sharegoods_list = $sharegoods_model->getSharegoodsList($condition,'','','detail');
		unset($condition);
		if (empty($sharegoods_list)){
			showDialog(Language::get('wrong_argument'),"index.php?act=member_snshome&mid={$this->member_id}",'error');
		}
		$sharegoods_info = $sharegoods_list[0];
		if (!empty($sharegoods_info['snsgoods_goodsimage'])){
			$image_arr = explode('_',$sharegoods_info['snsgoods_goodsimage']);
			$sharegoods_info['snsgoods_goodsimage'] = $image_arr[0];		
		}
		$sharegoods_info['snsgoods_goodsurl'] = ncUrl(array('act'=>'goods','goods_id'=>$sharegoods_info['snsgoods_goodsid'],'id'=>$sharegoods_info['snsgoods_storeid']), 'goods');
		if ($_SESSION['is_login'] == '1'){
			if (!empty($sharegoods_info['snsgoods_likemember'])){
				$sharegoods_info['snsgoods_likemember_arr'] = explode(',',$sharegoods_info['snsgoods_likemember']);
				$sharegoods_info['snsgoods_havelike'] = in_array($_SESSION['member_id'],$sharegoods_info['snsgoods_likemember_arr'])?1:0;
			}
		}
		unset($sharegoods_list);
		
		//查询上一条记录
		$condition = array();
		$condition['share_memberid'] = "{$this->member_id}";
		if ($_GET['type'] == 'like'){
			$condition['share_likeaddtime_gt'] = "{$sharegoods_info['share_likeaddtime']}";
			$condition['share_islike'] = "1";
			$condition['order'] = "share_likeaddtime asc";
		}else {
			$condition['share_addtime_gt'] = "{$sharegoods_info['share_addtime']}";
			$condition['share_isshare'] = "1";
			$condition['order'] = "share_addtime asc";
		}
		$condition['limit'] = "1";
		$sharegoods_list = $sharegoods_model->getSharegoodsList($condition);
		unset($condition);
		if (empty($sharegoods_list)){
			$sharegoods_info['snsgoods_isfirst'] = true;
		}else {
			$sharegoods_info['snsgoods_isfirst'] = false;
			$sharegoods_info['snsgoods_previd'] = $sharegoods_list[0]['share_id'];
		}
		unset($sharegoods_list);
		//查询下一条记录
		$condition = array();
		$condition['share_memberid'] = "{$this->member_id}";
		if ($_GET['type'] == 'like'){
			$condition['share_likeaddtime_lt'] = "{$sharegoods_info['share_likeaddtime']}";
			$condition['share_islike'] = "1";
			$condition['order'] = "share_likeaddtime desc";
		}else {
			$condition['share_addtime_lt'] = "{$sharegoods_info['share_addtime']}";
			$condition['share_isshare'] = "1";
			$condition['order'] = "share_addtime desc";
		}
		$condition['limit'] = "1";
		
		$sharegoods_list = $sharegoods_model->getSharegoodsList($condition);
		unset($condition);
		if (empty($sharegoods_list)){
			$sharegoods_info['snsgoods_islast'] = true;
		}else {
			$sharegoods_info['snsgoods_islast'] = false;
			$sharegoods_info['snsgoods_nextid'] = $sharegoods_list[0]['share_id'];
		}
		unset($sharegoods_list);
		Tpl::output('sharegoods_info',$sharegoods_info);
		Tpl::output('menu_sign','snshome');
		Tpl::output('tpl_name','member_snsgoodsinfo');
		Tpl::showpage('member_snshome');
	}
	/**
	 * 评论前10条记录
	 */
	public function commenttopOp(){
		$comment_model = Model('sns_comment');
		//查询评论总数
		$condition = array();
		$condition['comment_originalid'] = "{$_GET['id']}";
		$condition['comment_originaltype'] = "{$_GET['type']}";//原帖类型 0表示动态信息 1表示分享商品 2表示喜欢商品
		$condition['comment_state'] = "0";//0表示正常，1表示屏蔽
		$countnum = $comment_model->getCommentCount($condition);
		//动态列表
		$condition['limit'] = "10";
		$commentlist = $comment_model->getCommentList($condition);
		$showmore = '0';//是否展示更多的连接
		if ($countnum > count($commentlist)){
			$showmore = '1';
		}
		Tpl::output('countnum',$countnum);
		Tpl::output('showmore',$showmore);
		Tpl::output('showtype',1);//页面展示类型 0表示分页 1表示显示前几条
		Tpl::output('tid',$_GET['id']);
		Tpl::output('type',$_GET['type']);
		//验证码
		Tpl::output('nchash',substr(md5(SiteUrl.$_GET['act'].$_GET['op']),0,8));
		Tpl::output('commentlist',$commentlist);
		Tpl::showpage('member_snscommentlist','null_layout');
	}
	/**
	 * 评论列表
	 */
	public function commentlistOp(){
		$comment_model = Model('sns_comment');
		//查询评论总数
		$condition = array();
		$condition['comment_originalid'] = "{$_GET['id']}";
		$condition['comment_originaltype'] = "{$_GET['type']}";//原帖类型 0表示动态信息 1表示分享商品 
		$condition['comment_state'] = "0";//0表示正常，1表示屏蔽
		$countnum = $comment_model->getCommentCount($condition);
		//评价列表
		$page	= new Page();
		$page->setEachNum(10);
		$page->setStyle('admin');
		$commentlist = $comment_model->getCommentList($condition,$page);
		
		Tpl::output('countnum',$countnum);
		Tpl::output('tid',$_GET['id']);
		Tpl::output('type',$_GET['type']);
		Tpl::output('showtype','0');//页面展示类型 0表示分页 1表示显示前几条
		//验证码
		Tpl::output('nchash',substr(md5(SiteUrl.$_GET['act'].$_GET['op']),0,8));
		Tpl::output('commentlist',$commentlist);
		Tpl::output('show_page',$page->show());
		Tpl::showpage('member_snscommentlist','null_layout');
	}
	/**
	 * 获取店铺列表(不登录就可以查看)
	 */
	public function storelistOp(){
		//查询分享店铺信息
		$page	= new Page();
		$page->setEachNum(10);
		$page->setStyle('admin');		
		//动态列表
		$condition = array();
		$condition['share_memberid'] = "{$this->member_id}";
		switch ($this->relation){
			case 3:
				$condition['share_privacyin'] = "";
				break;
			case 2:
				$condition['share_privacyin'] = "0','1";
				break;
			case 1:
				$condition['share_privacyin'] = "0";
				break;
			default:
				$condition['share_privacyin'] = "0";
				break;
		}
		$sharestore_model = Model("sns_sharestore");
		$storelist = $sharestore_model->getShareStoreList($condition,$page,'*','detail');
		$storelist_new = array();
		if (!empty($storelist)){
			$store_model = Model('store');
			$storelist = $store_model->getStoreGoods($storelist);
			//获得店铺ID
			$storeid_arr = '';
			foreach ($storelist as $k=>$v){
				$storelist_new[$v['store_id']] = $v;
			}			
			$storeid_arr = array_keys($storelist_new);
			$storeid_str = implode("','",$storeid_arr);
			//查询店铺推荐商品
			$goods_model = Model('goods');
			$goodslist = $goods_model->getCommenGoods(array('store_id_in'=>"$storeid_str"));
			if (!empty($goodslist)){
				foreach ($goodslist as $k=>$v){
					$v['goodsurl'] = ncUrl(array('act'=>'goods','goods_id'=>$v['goods_id'],'id'=>$v['store_id']), 'goods');
					//$v['goodsimg_url'] = SiteUrl.DS.ATTACH_GOODS.DS.$v['store_id'].DS.$v['goods_image'];
					$storelist_new[$v['store_id']]['goods'][] = $v;
				}
			}
		}
		//信息输出
		Tpl::output('storelist',$storelist_new);
		Tpl::output('show_page',$page->show());
		Tpl::output('menu_sign','snsstore');
		Tpl::output('tpl_name','member_snsstorelist');
		Tpl::showpage('member_snshome');
	}
	/**
	 * 动态列表页面
	 */
	public function traceOp(){
		Tpl::output('menu_sign','snstrace');
		Tpl::output('tpl_name','member_snshometrace');
		Tpl::showpage('member_snshome');
	}
	/**
	 * 某会员的SNS动态列表
	 */
	public function tracelistOp(){
		$tracelog_model = Model('sns_tracelog');
		$condition = array();
		$condition['trace_memberid'] = "{$this->member_id}";
		switch ($this->relation){
			case 3:
				$condition['trace_privacyin'] = "";
				break;
			case 2:
				$condition['trace_privacyin'] = "0','1";
				break;
			case 1:
				$condition['trace_privacyin'] = "0";
				break;
			default:
				$condition['trace_privacyin'] = "0";
				break;
		}
		$condition['trace_state'] = "0";
		$count = $tracelog_model->countTrace($condition);
		//分页
		$page	= new Page();
		$page->setEachNum(30);
		$page->setStyle('admin');
		$page->setTotalNum($count);
		$delaypage = intval($_GET['delaypage'])>0?intval($_GET['delaypage']):1;//本页延时加载的当前页数
		$lazy_arr = lazypage(10,$delaypage,$count,true,$page->getNowPage(),$page->getEachNum(),$page->getLimitStart());		
		//动态列表
		$condition['limit'] = $lazy_arr['limitstart'].",".$lazy_arr['delay_eachnum'];
		$tracelist = $tracelog_model->getTracelogList($condition);
		if (!empty($tracelist)){
			foreach ($tracelist as $k=>$v){
				if ($v['trace_title']){
					$v['trace_title'] = str_replace("%siteurl%", SiteUrl.DS, $v['trace_title']);
					$v['trace_title_forward'] = '|| @'.$v['trace_membername'].Language::get('nc_colon').preg_replace("/<a(.*?)href=\"(.*?)\"(.*?)>@(.*?)<\/a>([\s|:]|$)/is",'@${4}${5}',$v['trace_title']);
				}
				if(!empty($v['trace_content'])){
					//替换内容中的siteurl
					$v['trace_content'] = str_replace("%siteurl%", SiteUrl.DS, $v['trace_content']);
				}
				$tracelist[$k] = $v;
			}
		}
		Tpl::output('hasmore',$lazy_arr['hasmore']);
		Tpl::output('tracelist',$tracelist);
		Tpl::output('show_page',$page->show());
		Tpl::output('type','home');
		//验证码
		Tpl::output('nchash',substr(md5(SiteUrl.$_GET['act'].$_GET['op']),0,8));
		Tpl::showpage('member_snstracelist','null_layout');
	}
	/**
	 * 一条SNS动态及其评论
	 */
	public function traceinfoOp(){
		$id = intval($_GET['id']);
		if ($id<=0){
			showDialog(Language::get('wrong_argument'),'','error');
		}
		//查询动态详细
		$tracelog_model = Model('sns_tracelog');
		$condition = array();
		$condition['trace_id'] = "$id";
		$condition['trace_memberid'] = "{$this->member_id}";
		switch ($this->relation){
			case 3:
				$condition['trace_privacyin'] = "";
				break;
			case 2:
				$condition['trace_privacyin'] = "0','1";
				break;
			case 1:
				$condition['trace_privacyin'] = "0";
				break;
			default:
				$condition['trace_privacyin'] = "0";
				break;
		}
		$condition['trace_state'] = "0";
		$tracelist = $tracelog_model->getTracelogList($condition);
		$traceinfo = array();
		if (!empty($tracelist)){
			$traceinfo = $tracelist[0];
			if ($traceinfo['trace_title']){
				$traceinfo['trace_title'] = str_replace("%siteurl%", SiteUrl.DS, $traceinfo['trace_title']);
				$traceinfo['trace_title_forward'] = '|| @'.$traceinfo['trace_membername'].':'.preg_replace("/<a(.*?)href=\"(.*?)\"(.*?)>@(.*?)<\/a>([\s|:]|$)/is",'@${4}${5}',$traceinfo['trace_title']);
			}
			if(!empty($traceinfo['trace_content'])){
				//替换内容中的siteurl
				$traceinfo['trace_content'] = str_replace("%siteurl%", SiteUrl.DS, $traceinfo['trace_content']);
			}
		}
		Tpl::output('traceinfo',$traceinfo);
		Tpl::output('menu_sign','snshome');
		Tpl::output('tpl_name','member_snstraceinfo');
		//验证码
		Tpl::output('nchash',substr(md5(SiteUrl.$_GET['act'].$_GET['op']),0,8));
		Tpl::showpage('member_snshome');
	}
}