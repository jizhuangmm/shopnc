/*
 * 	Character Count Plugin - jQuery plugin
 * 	Dynamic character count for text areas and input fields
 *	written by Alen Grakalic	
 *	http://cssglobe.com/post/7161/jquery-plugin-simplest-twitterlike-dynamic-character-count-for-textareas
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 
(function($) {

	$.fn.charCount = function(options){
	  
		// default configuration properties
		var defaults = {	
			allowed: 140,		
			warning: 25,
			css: 'counter',
			counterElement: 'span',
			counterContainerID:'',
			cssWarning: 'warning',
			cssExceeded: 'exceeded',
			firstCounterText: '',
			endCounterText: ''
		}; 
		var options = $.extend(defaults, options); 
		
		function calculate(obj,containerID){
			var count = $(obj).val().length;
			var containerObj = $(obj);
			if(containerID != ''){
				containerObj = $("#"+containerID);
			}
			var available = options.allowed - count;
			if(available <= options.warning && available >= 0){
				$(containerObj).children().addClass(options.cssWarning);
			} else {
				$(containerObj).children().removeClass(options.cssWarning);
			}
			if(available < 0){
				$(containerObj).children().addClass(options.cssExceeded);
			} else {
				$(containerObj).children().removeClass(options.cssExceeded);
			}
			$(containerObj).children().html(options.firstCounterText + available + options.endCounterText);
		};
		/*this.each(function() {
			$(this).after('<'+ options.counterElement +' class="' + options.css + '">'+ options.counterText +'</'+ options.counterElement +'>');
			calculate(this);
			$(this).keyup(function(){calculate(this)});
			$(this).change(function(){calculate(this)});
		});*/
		if(options.counterContainerID != ''){
			$("#"+options.counterContainerID).append('<'+ options.counterElement +' class="' + options.css + '">'+ options.counterText +'</'+ options.counterElement +'>');
		}else{
			$(this).after('<'+ options.counterElement +' class="' + options.css + '">'+ options.counterText +'</'+ options.counterElement +'>');
		}
		calculate(this,options.counterContainerID);
		$(this).keyup(function(){calculate(this,options.counterContainerID)});
		$(this).change(function(){calculate(this,options.counterContainerID)});
		$(this).focus(function(){calculate(this,options.counterContainerID)});
	};

})(jQuery);
