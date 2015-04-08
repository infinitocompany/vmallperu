//checkbox and radio styles
$("label.checkbox span").click(function(){
	$(this).parent().toggleClass("on");
});
$("label.checkbox").click(function(){
	$(this).toggleClass("on");
});
$("label.radio").click(function(){
	$("label.radio").removeClass("on");
	$(this).addClass("on");
});