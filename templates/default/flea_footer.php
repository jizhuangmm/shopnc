<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="clear">&nbsp;</div>
<div id="footer">
	<p><a href="<?php echo SiteUrl;?>"><?php echo $lang['nc_index'];?></a>
	<?php if(!empty($output['nav_list']) && is_array($output['nav_list'])){?>
	<?php foreach($output['nav_list'] as $nav){?>
	<?php if($nav['nav_location'] == '2'){?>
	| <a  <?php if($nav['nav_new_open']){?>target="_blank" <?php }?>href="<?php switch($nav['nav_type']){
    	case '0':echo $nav['nav_url'];break;
    	case '1':echo ncUrl(array('act'=>'search','nav_id'=>$nav['nav_id'],'cate_id'=>$nav['item_id']), '', 'www');break;
    	case '2':echo ncUrl(array('act'=>'article','nav_id'=>$nav['nav_id'],'ac_id'=>$nav['item_id']), '', 'www');break;
    	case '3':echo ncUrl(array('act'=>'activity','activity_id'=>$nav['item_id'],'nav_id'=>$nav['nav_id']), 'activity', 'www');break;
    }?>"><?php echo $nav['nav_title'];?></a>
	<?php }?>
	<?php }?>
	<?php }?>
	</p>
  Copyright 2007-2013 ShopNC Inc.,All rights reserved.<br />
  <?php echo $GLOBALS['setting_config']['icp_number']; ?><br />
	<?php echo html_entity_decode($GLOBALS['setting_config']['statistics_code'],ENT_QUOTES); ?>
</div>
<?php if ($GLOBALS['setting_config']['debug'] == 1){?>
<div id="think_page_trace" class="trace">
  <fieldset id="querybox">
    <legend><?php echo $lang['nc_debug_trace_title'];?></legend>
    <div>
      <?php print_r(Tpl::showTrace());?>
    </div>
  </fieldset>
</div>
<?php }?>
<script language="javascript">
var searchTxt = '<?php echo $lang['nc_searchdefault']; ?>';
function searchFocus(e){
	if(e.value == searchTxt){
		e.value='';
		$('#keyword').css("color","");
	}
}
function searchBlur(e){
	if(e.value == ''){
		e.value=searchTxt;
		$('#keyword').css("color","#999999");
	}
}
function searchInput() {
	if($('#keyword').val()==searchTxt)
		$('#keyword').attr("value","");
	return true;
}
<?php
if(isset($_GET['key_input'])) {
?>
$('#keyword').attr("value","<?php echo trim($_GET['key_input']); ?>");
<?php
} else {
?>
$('#keyword').css("color","#999999");
<?php
}
?>
//���ع��ﳵ��Ϣ
$.getJSON('index.php?act=cart&op=ajaxcart', function(result){
    if(result){
        var result  = result;
       	$('.goods_num').html(result.goods_all_num);
       	var html = '';
       	if(result.goods_all_num >0){
       		html+="<div class='order'><table border='0' cellpadding='0' cellspacing='0'>";
       		var i= 0;
       		var data = result['goodslist'];
            for (i = 0; i < data.length; i++)
            {
            	html+="<tr id='cart_item_"+data[i]['specid']+"' count='"+data[i]['num']+"'>";
            	html+="<td class='picture'><span class='thumb size40'><i></i><img src='"+data[i]['images']+"' title='"+data[i]['gname']+"' onload='javascript:DrawImage(this,40,40);' ></span></td>";
            	html+="<td class='name'><a href='<?php echo SiteUrl.'/';?>index.php?act=goods&goods_id="+data[i]['goodsid']+"&id="+data[i]['storeid']+"' title='"+data[i]['gname']+"' target='_top'>"+data[i]['gname']+"</a></td>";
	          	html+="<td class='price'><p><?php echo $lang['currency'];?>"+data[i]['price']+"<?php echo $lang['nc_sign_multiply']; ?>"+data[i]['num']+"</p><p><a href='javascript:void(0)' onClick='drop_topcart_item("+data[i]['storeid']+","+data[i]['specid']+");' style='color: #999;'><?php echo $lang['nc_delete'];?></a></p></td>";
	          	html+="</tr>";
	        }
         	html+="<tr><td colspan='3' class='no-border'><span class='all'><?php echo $lang['nc_goods_num_one'];?><strong class='goods_num'>"+result.goods_all_num+"</strong><?php echo $lang['nc_goods_num_two'];?>: <strong id='cart_amount'><?php echo $lang['currency'];?>"+result.goods_all_price+"</strong></span><span class='button' ><a href='<?php echo SiteUrl.'/';?>index.php?act=cart' target='_top' title='<?php echo $lang['nc_accounts_goods'];?>' style='color: #FFF;' ><?php echo $lang['nc_accounts_goods'];?></a></span></td></tr>";
      }else{
      	html="<div class='no-order'><span><?php echo $lang['nc_cart_no_goods'];?></span><a href='<?php echo SiteUrl.'/';?>index.php?act=cart' class='button' target='_top' title='<?php echo $lang['nc_check_cart'];?>' style=' color: #FFF;' ><?php echo $lang['nc_check_cart'];?></a></div>";
        }
        $("#top_cartlist").html(html);
   }
});

//ͷ��ɾ���ﳵ��Ϣ
function drop_topcart_item(store_id, spec_id){
    var tr = $('#cart_item_' + spec_id);
    var amount_span = $('#cart_amount');
    var cart_goods_kinds = $('.goods_num');
    $.getJSON('index.php?act=cart&op=drop&specid=' + spec_id + '&storeid=' + store_id, function(result){
        if(result.done){
            //ɾ��ɹ�
            if(result.quantity == 0){
            	$('.goods_num').html('0');
            	var html = '';
            	html="<div class='no-order'><span><?php echo $lang['nc_cart_no_goods'];?></span><a href='<?php echo SiteUrl.'/';?>index.php?act=cart' class='button' target='_top' title='<?php echo $lang['nc_check_cart'];?>' style=' color: #FFF;' ><?php echo $lang['nc_check_cart'];?></a></div>";
            	$("#top_cartlist").html(html);
            }
            else{
                tr.remove();        //�Ƴ�
                amount_span.html(price_format(result.amount));  //ˢ���ܷ���
                cart_goods_kinds.html(result.quantity);       //ˢ����Ʒ����
            }
        }else{
            alert(result.msg);
        }
    });
}
</script>
<style type="text/css">
.trace { background:white;margin:6px;font-size:14px;border:1px dashed silver;padding:8px}
.trace fieldset { margin:5px;}
.trace fieldset legend {color:gray;font-weight:bold}
.trace fieldset div {overflow:auto;height:300px;text-align:left;}
</style>