$(function(){
	$.fn.mp_zoom = function(param){
		var config = {
			width: 132, 
			height: 110, 
			speedView: 200, 
			speedRemove: 400
		};
		$.extend(config, param);
		$(this).hover(function(){
			var image_web = $(this).find("img");
			var image_real = new Image();
			image_real.src = image_web.attr("src");
			$(this).css({
				"position": "relative", 
				"width": image_web.width(), 
				"height": image_web.height(), 
				"z-index": 20
			});
			image_web.css({
				"top": 0, 
				"left": 0, 
				"position": "absolute", 
				"cursor": "-moz-zoom-in", 
				"boxShadow": "0 0 10px #FFF"
			}).stop().animate({
				width: image_real.width + 'px', 
				height: image_real.height + 'px', 
				left: ((image_web.width() - image_real.width) / 2) + 'px', 
				top: ((image_web.height() - image_real.height) / 2) + 'px'
			}, config.speedView);
		}, function(){
			$(this).css({"z-index": 0}).find('img').css({"boxShadow": "none"}).stop().animate({
				top: 0, 
				left: 0, 
				width: config.width + 'px', 
				height: config.height + 'px'
			}, config.speedRemove);
		});
	};
});