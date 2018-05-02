//幻灯片广告控制	
	$(function(){
		$("#KinSlideshow").KinSlideshow({
			moveStyle:"left",
			titleBar:{titleBar_height:30,titleBar_bgColor:"#FFF",titleBar_alpha:0.5},
			titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
			btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
		});
		get_mini_cart();
		$('#top_cartlist .price a').live('click', function() {
		  setTimeout("get_mini_cart();", 500);
		});
	$(".minicart_box").mouseover(
		function(){
			$(".minicart_list").css("display","block");
			});
	$(".minicart_box").mouseout(
		function(){
			$(".minicart_list").css("display","none");
			});
	})
function get_mini_cart(){//小购物车数据
			$.getJSON('index.php?act=cart&op=ajaxcart', function(result){
			    if(result){
			        var result  = result;
			       	$('.mini_cart_goods_num').html(result.goods_all_num);
			       	var html = '';
			       	if(result.goods_all_num >0){
			       		html+="<div class='order'><table border='0' cellpadding='0' cellspacing='0'>";
			       		var i= 0;
			       		var data = result['goodslist'];
			            for (i = 0; i < data.length; i++)
			            {
			            	html+="<tr>";
			            	html+="<td class='picture'><span class='thumb size40'><i></i><img src='"+data[i]['images']+"' title='"+data[i]['gname']+"' onload='javascript:DrawImage(this,40,40);' ></span></td>";
			            	html+="<td class='name'><a href='index.php?act=goods&goods_id="+data[i]['goodsid']+"&id="+data[i]['storeid']+"' title='"+data[i]['gname']+"' target='_top'>"+data[i]['gname']+"</a></td>";
		          			html+="<td class='price'><p>&yen;"+data[i]['price']+"×"+data[i]['num']+"</p></td>";
				          	html+="</tr>";
					        }
			         	html+="<tr><td colspan='3' class='no-border'><span class='all'>共<strong class='goods_num'>"+result.goods_all_num+"</strong>种商品   金额总计：<strong id='cart_amount'>&yen;"+result.goods_all_price+"</strong></span><span class='button' ></span></td></tr>";
				        html+="</table></div>";
			      }else{
			      	html="<div class=\"none_tips\">您的购物车中暂无商品，赶快选择心爱的商品吧！</div>";
			        }
			        $(".minicart_box .list_detail").html(html);
			   }
			});
}
//精选推荐左右按钮控制显示
	$(function(){
         
	     var $obj = $('#slideshow ul');
		 var len  = $obj.length;
		 var i = 0;
		 $("#next").click(function(){
		      i++;
			  if(i==len){
			    i = 0;
			  }
			  $obj.stop(true,true).hide().eq(i).fadeIn(2000);
			  return false;
		 });	
		 $("#previous").click(function(){
		      i--;
			  if(i==-1){
			    i = len-1;
			  }
             $obj.stop(true,true).hide().eq(i).fadeIn(2000);
			  return false;
		 });
         
		 //滑入div 停止动画，滑出开始动画.
         $('#slideshow').hover(function(){
		      if(MyTime){
			     clearInterval(MyTime);
			  }
		 },function(){
              MyTime = setInterval(function(){
				 $("#next").trigger("click");
			  } , 5000);
		 })

		 //每2秒，自动切换。触发".next"的click事件.
		 var MyTime = setInterval(function(){
		    $("#next").trigger("click");
		 } , 5000);
	})





	// 页面返回顶部控制
		$(function() {
	    var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
	        .text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
	            $("html, body").animate({ scrollTop: 0 }, 120);
	    }), $backToTopFun = function() {
	        var st = $(document).scrollTop(), winh = $(window).height();
	        (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
	        //IE6下的定位
	        if (!window.XMLHttpRequest) {
	            $backToTopEle.css("top", st + winh - 166);
	        }
	    };
	    $(window).bind("scroll", $backToTopFun);
	    $(function() { $backToTopFun(); });
		});




		$(function(){
		var i = 0;
		$('#navbar').children('ul').children('li').mouseover(function(){
			if($(this).children('a')[0].className == 'link'){
				i = 1;
			}
			$(this).children('a').removeClass();
			$(this).children('a').addClass('link');
		}).mouseout(function(){
			if(i != 1){
				$(this).children('a').removeClass();
				$(this).children('a').addClass('hover');
			}
			i = 0;
		});
		//search
		$("#details").children('ul').children('li').click(function(){
			$(this).parent().children('li').removeClass("current");
			$(this).addClass("current");
			$('#search_act').attr("value",$(this).attr("act"));
		});
		var search_act = $("#details").find("li[class='current']").attr("act");
		$('#search_act').attr("value",search_act);
		$("#keyword").blur();
	});

//首页Tab标签卡滑门切换
$(function() {
$(".tabs-nav > li > a").mouseover(function(e) {
	if (e.target == this) {
		var tabs = $(this).parent().parent().children("li");
		var panels = $(this).parent().parent().parent().children(".tabs-panel");
		var index = $.inArray(this, $(this).parent().parent().find("a"));
	if (panels.eq(index)[0]) {
		tabs.removeClass("tabs-selected")
			.eq(index).addClass("tabs-selected");
		panels.addClass("tabs-hide")
			.eq(index).removeClass("tabs-hide");
		}
	}
}); 
});


// 首页图片延时加载
	$(function() {
		$(".goodslist-content img").lazyload({
			placeholder : "./templates/default/images/loading.gif", 
			event : "sporty" 
		});
		$(".goodslist-content img").lazyload({
			placeholder : "./templates/default/images/loading.gif",
			event : "scroll"
		});
	});
	$(window).bind("load", function() { 
		var timeout = setTimeout(function() {$("img").trigger("sporty")}, 2000);
	});


