$(function(){
		$("#showcode_html").hide();
		$("#showcode_css").hide();
		$("#showcode_js").hide();

	$(".xs-canvas-toggle, .exit-off-canvas").click(function(){
		$(".top-bar-xs").toggleClass("top-bar-xs-close");
		$(".middle-bar-xs").toggleClass("middle-bar-xs-close");
		$(".bottom-bar-xs").toggleClass("bottom-bar-xs-close");
	});

	$("#toggle_button").click(function(){
		$("#showcode_html").toggle();
		$("#showcode_css").toggle();
		$("#showcode_js").toggle();
	});
});