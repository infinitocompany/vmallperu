$.ajaxSetup({
	type: 'post',
	async: false,
	error: function(data){ alert(data.responseText); }
});

$(document).ready(function(){	
	//input default value (placeholder)
	var placeholder_create = true; //if false, will only be created if not supported by your browser
    if(placeholder_create || !('placeholder' in document.createElement('input'))){
		$("input[placeholder]").each(function(){
			$(this).val($(this).attr("placeholder"));
			$(this).focus(function(){ if($(this).val() == $(this).attr("placeholder")) $(this).val(''); }).blur(function(){ if($(this).val() == '') $(this).val($(this).attr("placeholder")); });
		});
	}

	if(location.href.search(/index/) >= 0){
		//scroll list
		new dw_scrollObj('banner_container', 'banner_list').setUpScrollControls('banner_scroll');
		
		//banners
		$("ul#banner_list li img").click(function(){
			$(this).parent().parent().find("div.bg_galeria_sup_on").removeClass("bg_galeria_sup_on").addClass("bg_galeria_sup_off");
			$(this).prev().removeClass("bg_galeria_sup_off").addClass("bg_galeria_sup_on");
			$("#banner_image img").hide().attr("src", $(this).attr("src")).fadeIn();
		});
		
		//recommended effect
		var recommended_count = $('#recommended .album').size();
		if(recommended_count > 2){
			setInterval(function(){
				$('#recommended .album').filter(':visible').fadeOut(3000,function(){
					if($(this).index() <= recommended_count - 2) $(this).next().next().fadeIn(3000);
					else $('#recommended .album').eq($(this).index() - (recommended_count - 1)).fadeIn(3000);
				});
			}, 5000);
		}
	}
	
	if(location.href.search(/interior/) >= 0){
		//scroll list
		new dw_scrollObj('album_container', 'album_list').setUpScrollControls('album_scroll');
		
		//albums
		var album_middle = $("#album_container").offset().left + ($("#album_container").width() / 2);
		$("ul#album_list li ul li").hover(function(e){
			$(this).children().css({
				"left": (e.pageX < album_middle ? "160px" : "-220px"), 
				"text-align": (e.pageX < album_middle ? "left" : "right")
			}).next().stop().animate({"opacity": 1, "filter": "alpha(opacity=100)"}, 500);
		}, function(){
			$(this).children().next().stop().animate({"opacity": 0.25, "filter": "alpha(opacity=25)"}, 200);
		});
		
		//add color even & odd to comments
		$("#body ul#comments li:nth-child(odd)").addClass("odd");
		
		//scroll videos with click animation
		var videos_li_width = $("#videos_container ul > li").width();
		var videos_width = videos_li_width * $("#videos_container ul > li").size();
		$("#videos_container ul").css("width", videos_width);
		$("#videos_scroll a.mouseover_left").click(function(){
			if(Math.abs($("#videos_container ul").css("left").replace("px", "")) - videos_li_width >= 0) 
				$("#videos_container ul").animate({left: "+=" + videos_li_width});
			return false;
		});
		$("#videos_scroll a.mouseover_right").click(function(){
			if(Math.abs($("#videos_container ul").css("left").replace("px", "")) + videos_li_width < videos_width) 
				$("#videos_container ul").animate({left: "-=" + videos_li_width});
			return false;
		});
	}
	
	if(location.href.search(/detalle/) >= 0){
		//scroll list
		new dw_scrollObj('gallery_container', 'gallery_list').setUpScrollControls('gallery_scroll');
		
		//albums detail
		$("ul#gallery_list li img").click(function(){
			$("ul#gallery_list li").removeClass("on");
			$(this).parent().addClass("on");
			$("#album_image img").hide().attr("src", $(this).attr("src")).fadeIn();
			$(".album_info_10").children().text($(this).attr("alt")).next().text($(this).attr("title"));
		});
		
		//add color even & odd to comments
		$("#body ul#comments li:nth-child(odd)").addClass("odd");
		
		//scroll list
		new dw_scrollObj('album_container', 'album_list').setUpScrollControls('album_scroll');
	}
	
	if(location.href.search(/tv/) >= 0){
		//scroll list
		new dw_scrollObj('gallery_container', 'gallery_list').setUpScrollControls('gallery_scroll');
		
		//albums detail
		$("ul#gallery_list li a").click(function(){
			$("ul#gallery_list li").removeClass("on");
			$(this).parent().addClass("on");
			$("#album_image iframe").attr("src", "http://player.vimeo.com/video/" + $(this).attr("rel"));
			$(".album_info_10 h3").text($(this).children().attr("alt"));
			$(".album_info_4 p").text($(this).children().attr("title"))
			return false;
		});
		
		//add color even & odd to comments
		$("#body ul#comments li:nth-child(odd)").addClass("odd");
		
		//scroll list
		new dw_scrollObj('album_container', 'album_list').setUpScrollControls('album_scroll');
	}
	
	//images zoom
	$("#images_bottom ul li").mp_zoom();
});