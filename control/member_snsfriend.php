<?php
/**
 * SNS首页
 *
 * @copyright  Copyright (c) 2007-2012 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');

class member_snsfriendControl extends BaseMemberControl {
	public function __construct(){
		parent::__construct();
		Language::read('member_sns_friend');
	}
	private function m_sex($sextype){
		switch ($sextype){
			case 1:
				return 'male';
				break;
			case 2:
				return 'female';
				break;
			default:
				return '';
				break;
		}
	}
	/**
	 * 好友首页
	 */
	public function indexOp(){
		$this->findOp();
	}
	/**
	 * 找人首页
	 */
	public function findOp(){
		if(chksubmit()) {
			Tpl::output('type','list');
		}else{
			//查询最近粉丝
			$friend_model = Model('sns_friend');
			$condition_arr = array();
			$condition_arr['friend_tomid'] = "{$_SESSION['member_id']}";
			$condition_arr['friend_followstate'] = "1";
			$condition_arr['limit'] = "6";
			$fanlist = $friend_model->listFriend($condition_arr,'*','','fromdetail');
			if (!empty($fanlist)){
				foreach ($fanlist as $k=>$v){
					$v['credit_arr'] = getCreditArr(intval($v['member_credit']));
					$v['sex_class'] = $this->m_sex($v['member_sex']);
					$fanlist[$k] = $v;
				}
			}
			Tpl::output('type','index');
			Tpl::output('fanlist',$fanlist);
		}
		self::profile_menu('find');
		Tpl::output('menu_sign','friend');
		//查询会员信息
		$this->get_member_info();
		Tpl::output('header_menu_sign','friend');//默认选中顶部“好友”菜单
		Tpl::showpage('member_snsfriend_find');
	}
	/**
	 * 找人搜索列表
	 */
	public function findlistOp(){
		if (strtoupper(CHARSET) == 'GBK'){
			$_GET = Language::getGBK($_GET);
		}
		if(!empty($_GET['searchname'])){
			//查询关注会员id
			$friend_model = Model('sns_friend');
			$condition_arr = array();
			$condition_arr['friend_frommid'] = "{$_SESSION['member_id']}";
			$followlist = $friend_model->listFriend($condition_arr,'friend_tomid,friend_followstate');
			unset($condition_arr);
			$followlist_new = array();
			if(!empty($followlist)){
				foreach($followlist as $k=>$v){
					$followlist_new[$v['friend_tomid']] = $v;
				}
			}
			//查询会员
			$member_model = Model('member');
			$condition_arr = array();
			$condition_arr['member_state'] = "1";
			$condition_arr['like_member_name'] = $_GET['searchname'];
			$condition_arr['no_member_id'] = "{$_SESSION['member_id']}";
			$count = $member_model->countMember($condition_arr);
			$memberlist = array();
			if($count > 0){
				$delaypage = intval($_GET['delaypage'])>0?intval($_GET['delaypage']):1;//本页延时加载的当前页数
				$lazy_arr = lazypage(15,$delaypage,$count);
				$condition_arr['limit'] = $lazy_arr['limitstart'].",".$lazy_arr['delay_eachnum'];
				$memberlist = $member_model->getMemberList($condition_arr);
				if(!empty($memberlist)){
					$followid_arr = array_keys($followlist_new);
					foreach($memberlist as $k=>$v){
						if(in_array($v['member_id'],$followid_arr)){
							$v['followstate'] = $followlist_new[$v['member_id']]['friend_followstate'];
						}else{
							$v['followstate'] = 0;
						}
						//信用
						$v['credit_arr'] = getCreditArr(intval($v['member_credit']));
						//性别
						$v['sex_class'] = $this->m_sex($v['member_sex']);
						$memberlist[$k] = $v;
					}
				}
				Tpl::output('hasmore',$lazy_arr['hasmore']);
			}
		}
		Tpl::output('memberlist',$memberlist);
		self::profile_menu('find');
		Tpl::output('menu_sign','friend');
		Tpl::showpage('member_snsfriend_findlist','null_layout');
	}
	/**
	 * 加关注
	 */
	public function addfollowOp() {
		$mid = intval($_GET['mid']);
		if($mid<=0){
			showDialog(Language::get('wrong_argument'),'','error');
		}
		//验证会员信息
		$member_model = Model('member');
		$condition_arr = array();
		$condition_arr['member_state'] = "1";
		$condition_arr['in_member_id'] = "'".implode("','",array($mid,$_SESSION['member_id']))."'";
		$member_list = $member_model->getMemberList($condition_arr);
		unset($condition_arr);
		if(empty($member_list)){
			showDialog(Language::get('snsfriend_member_error'),'','error');
		}
		$self_info = array();
		$member_info = array();
		foreach($member_list as $k=>$v){
			if($v['member_id'] == $_SESSION['member_id']){
				$self_info = $v;
			}else{
				$member_info = $v;
			}
		}
		if(empty($self_info) || empty($member_info)){
			showDialog(Language::get('snsfriend_member_error'),'','error');
		}
		//验证是否已经存在好友记录
		$friend_model = Model('sns_friend');
		$friend_count = $friend_model->countFriend(array('friend_frommid'=>"{$_SESSION['member_id']}",'friend_tomid'=>"$mid"));
		if($friend_count >0 ){
			showDialog(Language::get('snsfriend_havefollowed'),'','error');
		}
		//查询对方是否已经关注我，从而判断关注状态
		$friend_info = $friend_model->getFriendRow(array('friend_frommid'=>"{$mid}",'friend_tomid'=>"{$_SESSION['member_id']}"));
		$insert_arr = array();	
		$insert_arr['friend_frommid'] = "{$self_info['member_id']}";
		$insert_arr['friend_frommname'] = "{$self_info['member_name']}";
		$insert_arr['friend_frommavatar'] = "{$self_info['member_avatar']}";
		$insert_arr['friend_tomid'] = "{$member_info['member_id']}";
		$insert_arr['friend_tomname'] = "{$member_info['member_name']}";
		$insert_arr['friend_tomavatar'] = "{$member_info['member_avatar']}";
		$insert_arr['friend_addtime'] = time();
		if(empty($friend_info)){
			$insert_arr['friend_followstate'] = '1';//单方关注
		}else{
			$insert_arr['friend_followstate'] = '2';//双方关注
		}
		$result = $friend_model->addFriend($insert_arr);
		if($result){
			//更新对方关注状态
			if(!empty($friend_info)){
				$friend_model->editFriend(array('friend_followstate'=>'2'),array('friend_id'=>"{$friend_info['friend_id']}"));
			}
			$js = "var obj = $('#recordone_".$mid."'); $(obj).find('[nc_type=\"signmodule\"]').children().hide();";
			if($insert_arr['friend_followstate'] == 2){
				$js .= "$(obj).find('[nc_type=\"mutualsign\"]').show();";
			}else{
				$js .= "$(obj).find('[nc_type=\"followsign\"]').show();";
			}
			showDialog(Language::get('snsfriend_follow_succ'),'','succ',$js);
		}else{
			showDialog(Language::get('snsfriend_follow_fail'),'','succ');	
		}
	}
	/**
	 * 加关注
	 */
	public function delfollowOp() {
		$mid = intval($_GET['mid']);
		if($mid<=0){
			showDialog(Language::get('wrong_argument'),'','error');
		}
		//取消关注
		$friend_model = Model('sns_friend');
		$result = $friend_model->delFriend(array('friend_frommid'=>"{$_SESSION['member_id']}",'friend_tomid'=>"$mid"));
		if($result){
			//更新对方的关注状态
			$friend_model->editFriend(array('friend_followstate'=>'1'),array('friend_frommid'=>"$mid",'friend_tomid'=>"{$_SESSION['member_id']}"));
			$js = "$('#recordone_".$mid."').hide();";
			showDialog(Language::get('snsfriend_cancel_succ'),'','succ',$js);
		}else{
			showDialog(Language::get('snsfriend_cancel_fail'),'','error');
		}
	}
	/**
	 * 关注列表页面
	 */
	public function followOp() {
		$friend_model = Model('sns_friend');
		//关注列表
		$page	= new Page();
		$page->setEachNum(15);
		$page->setStyle('admin');
		$follow_list = $friend_model->listFriend(array('friend_frommid'=>"{$_SESSION['member_id']}"),'*',$page,'detail');
		if (!empty($follow_list)){
			foreach ($follow_list as $k=>$v){
				$v['credit_arr'] = getCreditArr(intval($v['member_credit']));
				$v['sex_class'] = $this->m_sex($v['member_sex']);
				$follow_list[$k] = $v;
			}
		}
		Tpl::output('follow_list',$follow_list);
		Tpl::output('show_page',$page->show());
		self::profile_menu('follow');
		Tpl::output('menu_sign','friend');
		//查询会员信息
		$this->get_member_info();
		Tpl::output('header_menu_sign','friend');//默认选中顶部“好友”菜单
		Tpl::showpage('member_snsfriend_follow');
	}
	/**
	 * 粉丝列表
	 */
	public function fanOp() {
		$friend_model = Model('sns_friend');
		//关注列表
		$page	= new Page();
		$page->setEachNum(15);
		$page->setStyle('admin');
		$fan_list = $friend_model->listFriend(array('friend_tomid'=>"{$_SESSION['member_id']}"),'*',$page,'fromdetail');
		if (!empty($fan_list)){
			foreach ($fan_list as $k=>$v){
				$v['credit_arr'] = getCreditArr(intval($v['member_credit']));
				$v['sex_class'] = $this->m_sex($v['member_sex']);
				$fan_list[$k] = $v;
			}
		}
		Tpl::output('fan_list',$fan_list);
		Tpl::output('show_page',$page->show());
		self::profile_menu('fan');
		Tpl::output('menu_sign','friend');
		//查询会员信息
		$this->get_member_info();
		Tpl::output('header_menu_sign','friend');//默认选中顶部“好友”菜单
		Tpl::showpage('member_snsfriend_fan');
	}
	/**
	 * 用户中心右边，小导航
	 * 
	 * @param string	$menu_type	导航类型
	 * @param string 	$menu_key	当前导航的menu_key
	 * @return 
	 */
	private function profile_menu($menu_key) {
		$menu_array = array(
			1=>array('menu_key'=>'find',	'menu_name'=>Language::get('snsfriend_findmember'),	'menu_url'=>'index.php?act=member_snsfriend&op=find'),
			2=>array('menu_key'=>'follow',	'menu_name'=>Language::get('snsfriend_follow'),	'menu_url'=>'index.php?act=member_snsfriend&op=follow'),
			3=>array('menu_key'=>'fan',		'menu_name'=>Language::get('snsfriend_fans'),	'menu_url'=>'index.php?act=member_snsfriend&op=fan')
		);
		Tpl::output('member_menu',$menu_array);
		Tpl::output('menu_key',$menu_key);
	}
}