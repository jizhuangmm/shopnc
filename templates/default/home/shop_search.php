<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo RESOURCE_PATH;?>/js/jcarousel/skins/tango/skin.css" rel="stylesheet" type="text/css">
<style type="text/css">
.sticky #main-nav { width: 998px;}
/*.jcarousel-skin-tango .jcarousel-prev-horizontal, .jcarousel-skin-tango .jcarousel-next-horizontal { margin-top: -60px;}*/
.jcarousel-skin-tango .jcarousel-clip-horizontal { width: 800px !important; height: 225px !important;}
.jcarousel-skin-tango .jcarousel-item { height: 225px !important;}
.jcarousel-skin-tango .jcarousel-container-horizontal { width: 800px !important;}
.jcarousel-list-horizontal { z-index:99;}


</style>
<script type="text/javascript" src="<?php echo RESOURCE_PATH.'/js/search_goods.js';?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH.'/js/class_area_array.js';?>" charset="utf-8"></script>

<?php include template('home/cur_local');?>
<script type="text/javascript">
//<!CDATA[
$(function (){
    var order = '<?php echo $_GET['order'];?>';
    var arrow = '';
    var class_val = 'sort_desc';

    switch (order){
        case 'store_credit desc' : order = 'store_credit asc';  class_val = 'sort_desc'; break;
        case 'store_credit asc'  : order = 'store_credit desc'; class_val = 'sort_asc' ; break;
        default : order = 'store_credit asc';
    }
    $('#credit_grade').addClass(class_val);
    $('#credit_grade').click(function(){query('order', order);return false;});
}
);
function query(name, value){
    $("input[name='"+name+"']").val(value);
    $('#searchStore').submit();
}

//]]>
</script>

<div class="content">
<div class="nc-store-class">
  <?php if(!empty($output['class_list']) && is_array($output['class_list'])){?>
  <dl>
    <dt><?php echo $lang['store_class_index_store_class'].$lang['nc_colon'];?></dt>
    <dd>
      <?php foreach($output['class_list'] as $k=>$v){?>
	      <?php if ($_GET['cate_id'] == $v['sc_parent_id']){?>
	      <a href="<?php echo ncUrl(array('act'=>'shop_search','cate_id'=>$k));?>"><?php echo $v['sc_name'];?></a>
	      <?php }elseif (!isset($v['child']) && $output['class_list'][$_GET['cate_id']]['sc_parent_id'] == $v['sc_parent_id']){?>
	      <a href="<?php echo ncUrl(array('act'=>'shop_search','cate_id'=>$k));?>"><?php echo $v['sc_name'];?></a>
	      <?php }?>
      <?php }?>
    </dd>
  </dl>
  <?php }?>
</div>

<div class="sort-bar">
  <div class="shop_con_list" id="main-nav-holder">
    <nav class="nc-gl-sort-bar" id="main-nav">
      <form id="searchStore" method="GET" action="index.php">
        <input type="hidden" name="order" value="<?php echo $_GET['order'];?>"/>
        <input type="hidden" name="act" value="shop_search"/>
        <input type="hidden" name="cate_id" value="<?php echo $_GET['cate_id'];?>"/>
        <div class="sort-bar"><!-- 排序方式S -->
          <ul class="array">
          <!-- 默认 -->
            <li <?php if(!$_GET['key']){?>class="selected"<?php }?>><a href="javascript:void(0)" class="nobg" onClick="javascript:dropParam(['key','order'],'','array');" title="<?php echo $lang['goods_class_index_default_sort'];?>"><?php echo $lang['store_class_index_default'];?></a></li>
            <!-- 销量 -->
            <li <?php if($_GET['key'] == 'sales'){?>class="selected"<?php }?>><a href="javascript:void(0)" <?php if($_GET['key'] == 'sales'){?>class="<?php echo $_GET['order'];?>"<?php }?> onClick="javascript:replaceParam(['key','order'],['sales','<?php echo ($_GET['order'] == 'desc' && $_GET['key'] == 'sales')?'asc':'desc' ?>'],'array');" title="<?php echo ($_GET['order'] == 'desc' && $_GET['key'] == 'sales')?$lang['store_class_index_sold_asc']:$lang['store_class_index_sold_desc']; ?>"><?php echo $lang['store_class_index_sold'];?></a></li>
            <!-- 信用 -->
            <li <?php if($_GET['key'] == 'store_credit'){?>class="selected"<?php }?>><a href="javascript:void(0)" <?php if($_GET['key'] == 'store_credit'){?>class="<?php echo $_GET['order'];?>"<?php }?> onClick="javascript:replaceParam(['key','order'],['store_credit','<?php  echo ($_GET['order'] == 'desc' && $_GET['key'] == 'store_credit')?'asc':'desc' ?>'],'array');" title="<?php  echo ($_GET['order'] == 'desc' && $_GET['key'] == 'store_credit')?$lang['store_class_index_credit_asc']:$lang['store_class_index_credit_desc']; ?>"><?php echo $lang['store_class_index_credit'];?></a></li>
          </ul>
          <!-- 排序方式E -->
          <?php if (!C('fullindexer.open')){?>
          <div class="sidebox w150">
            <h5 class="title"><?php echo $lang['store_class_index_store_name'].$lang['nc_colon'];?></h5>
            <div class="selectbox">
              <input class="text" type="text" name="keyword" value="<?php echo $_GET['keyword'];?>" style=" width:80px;"/>
            </div>
          </div>
          <div class="sidebox w150">
            <h5><?php echo $lang['store_class_index_owner'].$lang['nc_colon'];?></h5>
            <div class="selectbox">
              <input class="text" type="text" name="user_name" value="<?php echo $_GET['user_name'];?>" style=" width:80px;"/>
            </div>
          </div>
          <div class="sidebox width5" style=" background-image: none">
            <div class="selectbox">
              <input class="btn" type="submit" value="<?php echo $lang['nc_search'];?>" />
            </div>
          </div>
          <?php }?>
          <div class="sidebox" style="background-image: none; float:right;">
            <div class="selectbox select-layer" style="margin:0;">
              <div class="holder"><em nc_type="area_name"><?php echo $lang['store_class_index_location'];?><!-- 所在地 --></em></div>
              <div class="selected"><a nc_type="area_name"><?php echo $lang['store_class_index_location'];?><!-- 所在地 --></a></div>
              <i class="direction"></i>
              <ul class="options">
                <?php require(BASE_TPL_PATH.'/home/goods_class_area_'.(strtolower(CHARSET)=='utf-8'?'utf-8':'gbk').'.html');?>
              </ul>
            </div>
          </div>
        </div>
      </form>
    </nav>
  </div>
</div>
<ul class="nc-store-list">
<?php if(!empty($output['store_list']) && is_array($output['store_list'])){?>
<?php foreach($output['store_list'] as $skey => $store){?>

    <li class="item">
      <dl class="shop-info">
        <dt class="shop-name"><a href="<?php echo ncUrl(array('act'=>'show_store','id'=>$store['store_id']),'store',$store['store_domain']);?>"><?php echo $store['store_name'];?></a></dt>
        <dd class="shop-pic"><a href="<?php echo ncUrl(array('act'=>'show_store','id'=>$store['store_id']),'store',$store['store_domain']);?>" title=""><span class="thumb size72"><i></i><img src="<?php echo empty($store['store_logo']) ? ATTACH_COMMON.DS.$GLOBALS['setting_config']['default_store_logo'] : ATTACH_STORE.'/'.$store['store_logo'];?>" onload="javascript:DrawImage(this,72,72);" /></span></a></dd>
        <dd class="main-runs" title="<?php echo $store['store_zy']?>"><?php echo $lang['store_class_index_store_zy'].$lang['nc_colon'];?><?php echo $store['store_zy']?></dd>
        <dd class="shopkeeper"><?php echo $lang['store_class_index_owner'].$lang['nc_colon'];?><?php echo $store['member_name'];?><a target="_blank" class="message" href="index.php?act=home&op=sendmsg&member_id=<?php echo $store['member_id'];?>"></a><span><?php if(!empty($goods_list[0]['goods']['store_qq'])){?>
         <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $goods_list[0]['goods']['store_qq'];?>&amp;Site=<?php echo $goods_list[0]['goods']['store_qq'];?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo $goods_list[0]['goods']['store_qq'];?>}:4" alt="QQ"></a>
          <?php }?>
          <?php if(!empty($goods_list[0]['goods']['store_ww'])){?>
          <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo $goods_list[0]['goods']['store_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $goods_list[0]['goods']['store_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" alt="Wang Wang" /></a>
          <?php }?>
          <?php if(!empty($goods_list[0]['goods']['store_msn'])){?>
          <a target="_blank" href="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=<?php echo $goods_list[0]['goods']['store_msn'];?>"><img src="http://messenger.services.live.com/users/<?php echo $goods_list[0]['goods']['store_msn'];?>/presenceimage/" alt="status" /></a>
          <?php }?></span></dd>
      </dl>
      <dl class="w200">
        <dd><?php echo ($tmp = $output['cache_store'][$store['store_id']]['num_selling']) ? $lang['store_class_index_goods_amount'].$tmp.$lang['piece'] : $lang['nc_common_goods_null'];?></dd>
        <dd><?php echo ($tmp = $output['cache_store'][$store['store_id']]['num_sales_jq']) ? $lang['store_class_index_deal'].$tmp.$lang['store_class_index_jian'] : $lang['nc_common_sell_null'];?></dd>
        <?php if (is_array($output['goods_list'][$store['store_id']])){?>
        <dd class="more-on" attr='morep' nc_type='<?php echo $skey;?>'><span><?php echo $lang['store_class_index_goods_hiden'];?></span><i></i></dd>
        <?php }?>
      </dl>
      <dl class="w150">
      	<!-- 店铺信用度 -->
        <dd><?php if (empty($store['credit_arr'])){ echo $lang['nc_common_credit_null']; }else {?>
          <?php echo $lang['store_class_index_credit_value'].$lang['nc_colon'];?>
          <span class="seller-<?php echo $store['credit_arr']['grade']; ?> level-<?php echo $store['credit_arr']['songrade']; ?>"></span>
          <?php }?>
        </dd>
        <!-- 店铺好评率 -->
        <dd>
        <?php if (empty($store['praise_rate'])){?>
        	<?php echo $lang['nc_common_rate_null'];?>
        <?php }else{?>	
        	<?php echo $lang['store_class_index_praise_rate'].$lang['nc_colon'].$store['praise_rate'];?>%
        <?php }?>
        </dd>
        <!-- 店铺动态评分 -->
        <dd class="shop-rate" nc_type="shop-rate" store_id='<?php echo $store['store_id'];?>'><?php echo $lang['store_class_index_shop_rate'].$lang['nc_colon'];?><span><i></i></span>
          <div class="shop-rate-con">
			<?php echo $lang['nc_common_loading'];?>
          </div>
        </dd>
      </dl>
      <dl class="w120">
        <dd class="tr"><?php echo $store['area_info'];?></dd>
      </dl>
      <?php if (is_array($output['goods_list'][$store['store_id']])){?>
      <div class="nc-shop-goodslist" nc_type='goods_<?php echo $skey;?>'>
        <div class="arrow"></div>
        <ul class="jcarousel-skin-tango" nc_type="jcarousel" >
        <?php if (is_array($output['goods_list'][$store['store_id']])){?>
        <?php foreach($output['goods_list'][$store['store_id']] as $k=>$v){?>
        <li>
            <dl>
              <dt class="goods-pic"><span class="thumb size160"> <i></i> <a href="index.php?act=goods&goods_id=<?php echo $v['goods_id'];?>&id=<?php echo $store['store_id'];?>" target="_blank"> <img  onload="javascript:DrawImage(this,160,160);" alt="<?php echo $v['goods_name'];?>" src="<?php echo thumb($v,'small');?>"></a></span></dt>
              <dd class="goods-name"><a href="<?php echo ncUrl(array('act'=>'goods','goods_id'=>$v['goods_id'],'id'=>$store['store_id']),'goods');?>" title="<?php echo $v['goods_name'];?>" target="_blank"><?php echo $v['goods_name'];?></a></dd>
              <dd class="goods-price"><em><?php echo $v['goods_store_price'];?></em></dd>
              <dd class="goods-sales"><?php echo $lang['store_class_index_deal'];?><?php echo $v['salenum'];?><?php echo $lang['store_class_index_jian'];?></dd>
            </dl>
          </li>
         <?php }?>
         <?php }?>
        </ul>
      </div>
      <?php }?>
    </li>

<?php }?>

<?php }else{?>
<div id="no_results"><?php echo $lang['store_class_index_no_record'];?></div>
<?php }?>
</ul>
<div class="pagination"> <?php echo $output['show_page'];?> </div>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/waypoints.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jcarousel/jquery.jcarousel.min.js"></script> 
<script>
$(function(){    
	<?php if(isset($_GET['area_id']) && intval($_GET['area_id']) > 0){?>
	//选择地区后的地区显示
	$('[nc_type="area_name"]').html(nc_class_a[<?php echo intval($_GET['area_id']);?>]);
	<?php }?>
});
</script> 
<script type="text/javascript">
    //浮动导航  waypoints.js
    $('#main-nav-holder').waypoint(function(event, direction) {
        $(this).parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
    });
$(function(){
	//图片轮换
	 $('[nc_type="shop-rate"]').one("mouseover", function(){
		$(this).find('.shop-rate-con').load('index.php?act=shop_search&op=get_eval_stat&store_id='+$(this).attr('store_id'));
		});
    $('[nc_type="jcarousel"]').jcarousel({visible: 4});
    $('[attr="morep"]').click(function(){
    	var id = $(this).attr('nc_type');
    	if($(this).attr('class')=='more-off'){
    		$(this).addClass('more-on').removeClass('more-off').html('<?php echo $lang['store_class_index_goods_hiden'];?><i></i>');
    		$('div[nc_type="goods_'+id+'"]').show();
    	}else{
    		$(this).addClass('more-off').removeClass('more-on').html('<?php echo $lang['store_class_index_goods_show'];?><i></i>');
    		$('div[nc_type="goods_'+id+'"]').hide();
    	}
    });
   
});
</script>